<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
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

        $heroPath = null;
        if ($request->hasFile('cover_image')) {
            $heroPath = $request->file('cover_image')->store('services/heroes', 'public');
        }

        // FAQs Mapping from clean names
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
            'slug' => Str::slug($request->service_name),
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

        // Sub-Items
        if ($request->has('item_titles')) {
            foreach ($request->item_titles as $key => $title) {
                if (!empty($title)) {
                    $service->items()->create([
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
                        'scope_name' => $title,
                        'estimated_rate' => $request->rates_prices[$key] ?? 'Quote Required'
                    ]);
                }
            }
        }

        // Gallery upload
        if ($request->hasFile('portfolio_images')) {
            foreach ($request->file('portfolio_images') as $key => $file) {
                $path = $file->store('services/galleries', 'public');
                $service->gallery()->create([
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

    public function update(Request $request, Service $service)
    {
        $request->validate([
            'service_name' => 'required|string|max:255',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        if ($request->hasFile('cover_image')) {
            if ($service->hero_image) { Storage::disk('public')->delete($service->hero_image); }
            $service->hero_image = $request->file('cover_image')->store('services/heroes', 'public');
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

        $service->update([
            'name' => $request->service_name,
            'slug' => Str::slug($request->service_name),
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
            'meta_title' => $request->seo_title,
            'meta_description' => $request->seo_description,
            'faqs' => $faqs
        ]);

        $service->items()->delete();
        if ($request->has('item_titles')) {
            foreach ($request->item_titles as $key => $title) {
                if (!empty($title)) {
                    $service->items()->create(['title' => $title, 'description' => $request->item_details[$key] ?? '']);
                }
            }
        }

        $service->pricings()->delete();
        if ($request->has('rates_titles')) {
            foreach ($request->rates_titles as $key => $title) {
                if (!empty($title)) {
                    $service->pricings()->create(['scope_name' => $title, 'estimated_rate' => $request->rates_prices[$key] ?? '']);
                }
            }
        }

        if ($request->hasFile('portfolio_images')) {
            foreach ($request->file('portfolio_images') as $key => $file) {
                $path = $file->store('services/galleries', 'public');
                $service->gallery()->create(['image_path' => $path, 'caption' => $request->portfolio_captions[$key] ?? null]);
            }
        }

        return redirect()->route('admin.services.index')->with('success', 'Service updated successfully.');
    }

    public function destroy(Service $service)
    {
        if ($service->hero_image) { Storage::disk('public')->delete($service->hero_image); }
        foreach($service->gallery as $img) { Storage::disk('public')->delete($img->image_path); }
        $service->delete();
        return redirect()->route('admin.services.index')->with('success', 'Service purged.');
    }
}
