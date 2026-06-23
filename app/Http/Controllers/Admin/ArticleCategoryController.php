<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ArticleCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ArticleCategoryController extends Controller
{
    public function index()
    {
        $categories = ArticleCategory::withCount('articles')->latest()->paginate(20);
        return view('backEnd.articles.category', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:article_categories,name',
        ]);

        ArticleCategory::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);

        return redirect()->route('admin.article.category.index')->with('success', 'ArticleCategory created successfully!');
    }



    // ৫. ডাটাবেজে ক্যাটাগরি আপডেট করা (Update)
    public function update(Request $request, $id)
    {
        $category = ArticleCategory::find($id);
        $request->validate([
            'name' => 'required|string|max:255|unique:article_categories,name,' . $category->id,
        ]);

        $category->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);

        return redirect()->route('admin.article.category.index')->with('success', 'Category updated successfully!');
    }

    // ৬. ক্যাটাগরি ডিলিট করা (Destroy)
    public function destroy($id)
    {
        $category = ArticleCategory::find($id);
        if ($category->articles()->count() > 0) {
            return redirect()->back()->with('error', 'Cannot delete! This Category has articles attached to it.');
        }

        $category->delete();
        return redirect()->route('admin.article.category.index')->with('success', 'Category deleted successfully!');
    }
}
