<?php

namespace App\Http\Controllers\Admin;
use App\Helpers\ImageUpload;
use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\ArticleCategory;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    // Admin View: List Articles
    public function index() {
        $articles = Article::with('category')->latest()->get();
        return view('backEnd.articles.index', compact('articles'));
    }

    // Admin View: Create Form
    public function create() {
        $categories = ArticleCategory::all();
        return view('backEnd.articles.create', compact('categories'));
    }

    // Admin Action: Store Article & SEO
    public function store(Request $request)
    {
        $request->validate([
            'title'            => 'required|string|max:255',
            'category_id'      => 'required|exists:article_categories,id',
            'summary'          => 'required|string',
            'content'          => 'required',
            'image'            => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'read_time'        => 'nullable|integer|min:1',
            'meta_title'       => 'nullable|string|max:60',
            'meta_robots'      => 'nullable|string',
            'meta_description' => 'nullable|string|max:160',
            'meta_keywords'    => 'nullable|string',
            'canonical_url'    => 'nullable|url',
        ]);

        // ১. আর্টিকেল ডাটা সেভ
        $articleData = $request->only(['title', 'category_id', 'summary', 'content', 'read_time']);
        if ($request->hasFile('image')) {
            // আপনার কাস্টম ইমেজ আপলোড ক্লাস অনুযায়ী
            $articleData['image'] = ImageUpload::upload($request->file('image'), 'uploads/article', null, null);
        }
        $article = Article::create($articleData);

        // 🚀 ২. ব্যাকএন্ডে অটোমেটিক Schema Script (JSON-LD) তৈরি
        $siteUrl = url('/');
        $articleUrl = url("/article/{$article->slug}");
        $imageUrl = $article->image ? asset($article->image) : $siteUrl . '/assets/images/default.jpg';

        // কোটেশন এরর হ্যান্ডেল করার জন্য ক্লিনআপ
        $cleanTitle = str_replace('"', '\\"', $article->title);
        $cleanSummary = str_replace('"', '\\"', strip_tags($article->summary));

        $autoSchema = '<script type="application/ld+json">' . "\n" .
            '{' . "\n" .
            '  "@context": "https://schema.org",' . "\n" .
            '  "@type": "BlogPosting",' . "\n" .
            '  "mainEntityOfPage": {' . "\n" .
            '    "@type": "WebPage",' . "\n" .
            '    "@id": "' . $articleUrl . '"' . "\n" .
            '  },' . "\n" .
            '  "headline": "' . $cleanTitle . '",' . "\n" .
            '  "description": "' . $cleanSummary . '",' . "\n" .
            '  "image": "' . $imageUrl . '",' . "\n" .
            '  "author": {' . "\n" .
            '    "@type": "Organization",' . "\n" .
            '    "name": "AquaNova Wellness"' . "\n" .
            '  },' . "\n" .
            '  "publisher": {' . "\n" .
            '    "@type": "Organization",' . "\n" .
            '    "name": "AquaNova Wellness"' . "\n" .
            '  }' . "\n" .
            '}' . "\n" .
            '</script>';

        // 🚀 ৩. ব্যাকএন্ডে অটোমেটিক DataLayer JSON তৈরি
        // যদি Article মডেলে category রিলেশন সেট করা থাকে, তবে ক্যাটাগরির নাম আসবে
        $categoryName = $article->category ? $article->category->name : 'Category';

        $autoDatalayerObj = [
            "event" => "view_item",
            "page_type" => "article_detail",
            "ecommerce" => [
                "items" => [[
                    "item_name" => $article->title,
                    "item_category" => $categoryName,
                    "item_author" => "Admin"
                ]]
            ]
        ];
        $autoDatalayerJson = json_encode($autoDatalayerObj, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);

        // ৪. SEO Management টেবিলে পলিওমরফিক ডাটা ইনসার্ট
        $article->seo()->create([
            'page_name'        => 'Article: ' . $article->title,
            'page_slug'        => $article->slug, // আপনার মাইগ্রেশনের 'page_slug' ফিল্ডের জন্য
            'meta_title'       => $request->meta_title ?? $article->title,
            'meta_description' => $request->meta_description ?? substr($cleanSummary, 0, 160),
            'meta_keywords'    => $request->meta_keywords,
            'canonical_url'    => $request->canonical_url ?? $articleUrl,
            'meta_robots'      => $request->meta_robots ?? 'index, follow',
            'schema_script'    => $autoSchema,
            'datalayer_json'   => $autoDatalayerJson,
            'meta_image'       => $imageUrl,
        ]);

        return redirect()->route('admin.article.index')->with('success', 'Article & SEO Meta published successfully.');
    }

    // Admin View: Edit Form
    public function edit($id)
    {
        $article = Article::find($id);
        $categories = ArticleCategory::all();
        $article->load('seo');
        return view('backEnd.articles.edit', compact('article', 'categories'));
    }

    // Admin Action: Update Article & SEO
    public function update(Request $request, $id)
    {
        $article = Article::findOrFail($id);

        $request->validate([
            'title'            => 'required|string|max:255',
            'category_id'      => 'required|exists:article_categories,id', // আপনার টেবিলের নাম অনুযায়ী নিশ্চিত করুন
            'summary'          => 'required|string',
            'content'          => 'required',
            'image'            => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'read_time'        => 'nullable|integer|min:1',
            'meta_title'       => 'nullable|string|max:60',
            'meta_robots'      => 'nullable|string',
            'meta_description' => 'nullable|string|max:160',
            'meta_keywords'    => 'nullable|string',
            'canonical_url'    => 'nullable|url',
        ]);

        // ১. আর্টিকেল ডাটা আপডেট
        $articleData = $request->only(['title', 'category_id', 'summary', 'content', 'read_time']);
        if ($request->hasFile('image')) {
            $articleData['image'] = ImageUpload::upload($request->file('image'), 'uploads/article', null, null, $article->image);
        }
        $article->update($articleData);

        // 🚀 ২. ব্যাকএন্ডে অটোমেটিক Schema Script (JSON-LD) তৈরি
        $siteUrl = url('/');
        $articleUrl = url("/article/{$article->slug}");
        $imageUrl = $article->image ? asset($article->image) : $siteUrl . '/assets/images/default.jpg';

        // কোটেশন এরর হ্যান্ডেল করার জন্য ক্লিনআপ
        $cleanTitle = str_replace('"', '\\"', $article->title);
        $cleanSummary = str_replace('"', '\\"', strip_tags($article->summary));

        $autoSchema = '<script type="application/ld+json">' . "\n" .
            '{' . "\n" .
            '  "@context": "https://schema.org",' . "\n" .
            '  "@type": "BlogPosting",' . "\n" .
            '  "mainEntityOfPage": {' . "\n" .
            '    "@type": "WebPage",' . "\n" .
            '    "@id": "' . $articleUrl . '"' . "\n" .
            '  },' . "\n" .
            '  "headline": "' . $cleanTitle . '",' . "\n" .
            '  "description": "' . $cleanSummary . '",' . "\n" .
            '  "image": "' . $imageUrl . '",' . "\n" .
            '  "author": {' . "\n" .
            '    "@type": "Organization",' . "\n" .
            '    "name": "AquaNova Wellness"' . "\n" .
            '  },' . "\n" .
            '  "publisher": {' . "\n" .
            '    "@type": "Organization",' . "\n" .
            '    "name": "AquaNova Wellness"' . "\n" .
            '  }' . "\n" .
            '}' . "\n" .
            '</script>';

        // ব্যাকএন্ডে অটোমেটিক DataLayer JSON তৈরি
        $categoryName = $article->category ? $article->category->name : 'Category';

        $autoDatalayerObj = [
            "event" => "view_item",
            "page_type" => "article_detail",
            "ecommerce" => [
                "items" => [[
                    "item_name" => $article->title,
                    "item_category" => $categoryName,
                    "item_author" => "Admin"
                ]]
            ]
        ];
        $autoDatalayerJson = json_encode($autoDatalayerObj, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);

        // SEO Management টেবিলে পলিওমরফিক ডাটা আপডেট বা ক্রিয়েট
        $article->seo()->updateOrCreate(
        // আপনার মাইগ্রেশন অনুযায়ী কন্ডিশন ম্যাচিং ফিল্ড
            [
                'model_id'   => $article->id,
                'model_type' => get_class($article),
            ],
            [
                'page_name'        => 'Article: ' . $article->title,
                'page_slug'        => $article->slug, // আপনার স্কিমার 'page_slug' ফিল্ডের জন্য
                'meta_title'       => $request->meta_title ?? $article->title,
                'meta_description' => $request->meta_description ?? substr($cleanSummary, 0, 160),
                'meta_keywords'    => $request->meta_keywords,
                'canonical_url'    => $request->canonical_url ?? $articleUrl,
                'meta_robots'      => $request->meta_robots ?? 'index, follow',
                'schema_script'    => $autoSchema,         // অটো-জেনারেটেড স্কিমা
                'datalayer_json'   => $autoDatalayerJson,  // অটো-জেনারেটেড ডাটালায়ার
                'meta_image'       => $imageUrl,
            ]
        );

        return redirect()->route('admin.article.index')->with('success', 'Article & SEO Meta updated successfully.');
    }

    // Admin Action: Delete
    public function destroy($id)
    {
        $article = Article::findOrFail($id);

        // ১. আপনার কাস্টম ইমেজ ডিলিট লজিক (যদি ইমেজ থাকে)
        if ($article->image && file_exists(public_path($article->image))) {
            @unlink(public_path($article->image));
        }

        // 🚀 ২. আর্টিকেলের সাথে যুক্ত SEO ডাটা ডিলিট করা
        if ($article->seo) {
            $article->seo()->delete();
        }

        // ৩. মেইন আর্টিকেল ডিলিট করা
        $article->delete();

        return redirect()->route('admin.article.index')->with('success', 'Article and its SEO Meta Deleted successfully.');
    }
}
