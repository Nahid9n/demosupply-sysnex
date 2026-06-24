<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ImageUpload;
use App\Helpers\SeoHelper;
use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\ServiceGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::withCount(['items', 'pricings', 'gallery'])->latest()->get();
        return view('backEnd.services.index', compact('services'));
    }

    public function create()
    {
        return view('backEnd.services.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'service_name' => 'required|string|max:255',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        // ডাইনামিক ইউনিক স্লাগ জেনারেশন
        $slug = Str::slug($request->service_name);
        $originalSlug = $slug;
        $count = 1;
        while (Service::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count;
            $count++;
        }

        $heroPath = null;
        if ($request->hasFile('cover_image')) {
            $heroPath = ImageUpload::upload($request->file('cover_image'), 'uploads/service/cover');
        }

        // FAQs Mapping
        $faqs = [];
        if ($request->has('questions')) {
            foreach ($request->questions as $key => $question) {
                if (!empty($question)) {
                    $faqs[] = [
                        'question' => $question,
                        'answer' => $request->answers[$key] ?? ''
                    ];
                }
            }
        }

        $service = Service::create([
            'name' => $request->service_name,
            'slug' => $slug, // ইউনিক স্লাগটি এখানে সেভ হবে
            'icon_class' => $request->sidebar_icon ?? 'fa-solid fa-bolt',
            'phone' => $request->phone_number,
            'whatsApp' => $request->whatsapp_number,
            'status' => $request->is_active ?? 1,
            'hero_image' => $heroPath,
            'page_title' => $request->banner_title,
            'short_description' => $request->teaser_text,
            'long_description' => $request->details_content,
            'features_title' => $request->features_section_title,
            'pricing_title' => $request->pricing_section_title,
            'gallery_title' => $request->gallery_section_title,
            'faq_title' => $request->faq_section_title,
            'cta_title' => $request->action_title,
            'cta_subtitle' => $request->action_subtitle,
            'meta_title' => $request->seo_title,
            'meta_description' => $request->seo_description,
            'faqs' => $faqs
        ]);

        $service->seo()->updateOrCreate(
            [
                'model_type' => Service::class,
                'model_id'   => $service->id,
            ],
            [
                'page_name'        => $service->name . ' - Service Page',
                'page_slug'        => $service->slug, // এসইও হাবের জন্য ট্র্যাকিং স্লাগ
                'meta_title'       => $request->meta_title ?? $request->seo_title ?? $service->name,
                'meta_description' => $request->meta_description ?? $request->seo_description,
                'meta_keywords'    => $request->meta_keywords,
                'canonical_url'    => $request->canonical_url,
                'schema_script'    => $request->schema_script,
                'datalayer_json'   => $request->datalayer_json,
                'meta_robots'      => 'index, follow',
            ]
        );

        // Sub-Items
        if ($request->has('item_titles')) {
            foreach ($request->item_titles as $key => $title) {
                if (!empty($title)) {
                    $service->items()->create([
                        'service_id' => $service->id,
                        'title' => $title,
                        'description' => $request->item_details[$key] ?? ''
                    ]);
                }
            }
        }

        // Pricing Cards
        if ($request->has('rates_titles')) {
            foreach ($request->rates_titles as $key => $title) {
                if (!empty($title)) {
                    $service->pricings()->create([
                        'service_id' => $service->id,
                        'scope_name' => $title,
                        'estimated_rate' => $request->rates_prices[$key] ?? 'Quote Required'
                    ]);
                }
            }
        }

        // Gallery upload
        if ($request->hasFile('portfolio_images')) {
            foreach ($request->file('portfolio_images') as $key => $file) {
                $path = ImageUpload::upload($file, 'uploads/service/gallery');
                $service->gallery()->create([
                    'service_id' => $service->id,
                    'image_path' => $path,
                    'caption' => $request->portfolio_captions[$key] ?? null
                ]);
            }
        }

        return redirect()->route('admin.services.index')->with('success', 'Service deployed successfully.');
    }

    public function edit($id)
    {
        $service = Service::with('items', 'pricings', 'gallery')->find($id);
        return view('backEnd.services.edit', compact('service'));
    }

    public function update(Request $request, $id)
    {
        $service = Service::find($id);

        $request->validate([
            'service_name' => 'required|string|max:255',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        // ডাইনামিক ইউনিক স্লাগ জেনারেশন (নিজেকে বাদ দিয়ে চেক করবে)
        $slug = Str::slug($request->service_name);
        $originalSlug = $slug;
        $count = 1;
        while (Service::where('slug', $slug)->where('id', '!=', $id)->exists()) {
            $slug = $originalSlug . '-' . $count;
            $count++;
        }

        // ইমেজ আপলোড
        $hero_image_path = $service->hero_image;
        if ($request->hasFile('cover_image')) {
            $hero_image_path = ImageUpload::upload(
                $request->file('cover_image'),
                'uploads/service/cover',
                null,
                null,
                $service->cover_image
            );
        }

        $faqs = [];
        if ($request->has('questions')) {
            foreach ($request->questions as $key => $question) {
                if (!empty($question)) {
                    $faqs[] = [
                        'question' => $question,
                        'answer' => $request->answers[$key] ?? ''
                    ];
                }
            }
        }

        // সার্ভিস টেবিল আপডেট
        $service->update([
            'name' => $request->service_name,
            'slug' => $slug, // জেনারেট হওয়া ইউনিক স্লাগ
            'hero_image' => $hero_image_path,
            'icon_class' => $request->sidebar_icon,
            'phone' => $request->phone_number,
            'whatsApp' => $request->whatsapp_number,
            'status' => $request->is_active,
            'page_title' => $request->banner_title,
            'short_description' => $request->teaser_text,
            'long_description' => $request->details_content,
            'features_title' => $request->features_section_title,
            'pricing_title' => $request->pricing_section_title,
            'gallery_title' => $request->gallery_section_title,
            'faq_title' => $request->faq_section_title,
            'cta_title' => $request->action_title,
            'cta_subtitle' => $request->action_subtitle,
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'faqs' => $faqs
        ]);

        SeoHelper::generateAutoSeo($service, $request, 'Service');

        // সার্ভিস আইটেম প্রসেস
        $service->items()->delete();
        if ($request->has('item_titles')) {
            foreach ($request->item_titles as $key => $title) {
                if (!empty($title)) {
                    $service->items()->create([
                        'service_id' => $service->id,
                        'title' => $title,
                        'description' => $request->item_details[$key] ?? ''
                    ]);
                }
            }
        }

        // প্রাইসিং প্রসেস
        $service->pricings()->delete();
        if ($request->has('rates_titles')) {
            foreach ($request->rates_titles as $key => $title) {
                if (!empty($title)) {
                    $service->pricings()->create([
                        'service_id' => $service->id,
                        'scope_name' => $title,
                        'estimated_rate' => $request->rates_prices[$key] ?? ''
                    ]);
                }
            }
        }

        // গ্যালারি পোর্টফোলিও প্রসেস
        if ($request->hasFile('portfolio_images')) {
            foreach ($request->file('portfolio_images') as $key => $file) {
                $path = ImageUpload::upload($file, 'uploads/service/gallery', null, null);
                $service->gallery()->create([
                    'service_id' => $service->id,
                    'image_path' => $path,
                    'caption' => $request->portfolio_captions[$key] ?? null
                ]);
            }
        }

        return redirect()->route('admin.services.index')->with('success', 'Service and SEO updated successfully.');
    }
    public function deleteGalleryImage($id)
    {
        $galleryItem = ServiceGallery::find($id);
        if (!$galleryItem) {
            return response()->json([
                'success' => false,
                'message' => 'Image Not Found'
            ], 404);
        }

        if (file_exists($galleryItem->image_path)) {
            @unlink($galleryItem->image_path);
        }
        $galleryItem->delete();
        return response()->json([
            'success' => true,
            'message' => 'File Deleted Successfully'
        ]);
    }
    public function destroy(Request $request, $id)
    {
        $service = Service::find($id);
        if (!$service) {
            return redirect()->route('admin.services.index')->with('error', 'সার্ভিসটি পাওয়া যায়নি!');
        }
        if ($service->hero_image && file_exists(public_path($service->hero_image))) {
            @unlink(public_path($service->hero_image));
        }
        foreach ($service->gallery as $img) {
            if ($img->image_path && file_exists(public_path($img->image_path))) {
                @unlink(public_path($img->image_path));
            }
            $img->delete();
        }
        if ($service->seo) {
            $service->seo()->delete();
        }

        $service->delete();
        return redirect()->route('admin.services.index')->with('success', 'Service purged.');
    }
}
