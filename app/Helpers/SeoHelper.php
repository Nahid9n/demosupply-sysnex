<?php

namespace App\Helpers;

use App\Models\WebSetting;
use Illuminate\Support\Str;
use App\Models\SeoManagement;

class SeoHelper
{
    public static function generateAutoSeo($model, $request, $type = 'Service')
    {
        $siteUrl = url('/');
        $web_Setting = WebSetting::latest()->first();

        // লোগো ডাইনামিক করা হলো, ব্যাকআপ হিসেবে ডিফল্ট পাথ রাখা হয়েছে
        $logo = ($web_Setting && $web_Setting->header_logo) ? asset($web_Setting->header_logo) : $siteUrl . '/assets/images/logo.png';

        // 🚀 ১. কাস্টম বা স্ট্যাটিক পেজের জন্য লজিক (যখন কোনো Eloquent Model থাকবে না)
        if ($type === 'Custom') {
            $slugField = Str::slug($request->page_slug);
            $pageUrl = url("/{$slugField}");
            $title = $request->page_name;

            // কাস্টম পেজের জন্য WebPage স্কিমা
            $schema = '<script type="application/ld+json">' . "\n" .
                json_encode([
                    "@context" => "https://schema.org",
                    "@type" => "WebPage",
                    "name" => $title,
                    "url" => $pageUrl,
                    "description" => $title . " page of " . env('APP_NAME'),
                    "publisher" => [
                        "@type" => "Organization",
                        "name" => env('APP_NAME'),
                        "logo" => $logo,
                        "url" => $siteUrl
                    ]
                ], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . "\n" .
                '</script>';

            // কাস্টম পেজের ডাটালায়ার
            $dataLayerJson = json_encode([
                "event" => "view_item",
                "page_type" => "custom_page",
                "page_title" => $title
            ], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

            return SeoManagement::create([
                'page_name'        => $title . ' - Custom Page',
                'page_slug'        => $slugField,
                'meta_title'       => $title,
                'meta_description' => $title . " - Explore more details on our official website.",
                'canonical_url'    => $pageUrl,
                'meta_robots'      => 'index, follow',
                'schema_script'    => $schema,
                'datalayer_json'   => $dataLayerJson,
                'meta_image'       => $logo,
            ]);
        }

        $slugField = $model->slug;

        // টাইপ অনুযায়ী ডাইনামিক URL এবং ফিল্ড সিলেকশন
        if ($type === 'Article') {
            $pageUrl = url("/article/{$slugField}");
            $title = $model->title;
            $description = $model->summary;
            $schemaType = 'BlogPosting';
            $page_slug = "article/{$slugField}";
            $imageUrl = $model->image ? asset($model->image) : $siteUrl . '/default.jpg';
        } else {
            $pageUrl = url("/service/{$slugField}");
            $title = $model->name;
            $description = $model->short_description;
            $schemaType = 'Service';
            $page_slug = "service/{$slugField}";
            $serviceType = $model->name;
            // আপনার মাইগ্রেশন অনুযায়ী hero_image কলামটি ট্র্যাক করা হয়েছে
            $imageUrl = $model->hero_image ? asset($model->hero_image) : $siteUrl . '/default.jpg';
        }

        // HTML ট্যাগ ক্লিন করা
        $cleanDesc = strip_tags($description);

        // 🚀 ২. মাল্টিপল টার্গেট সিটি (Comma Separated) হ্যান্ডেল করার লজিক
        $servedAreas = [
            ["@type" => "Country", "name" => "USA"]
        ];

        if ($type === 'Service' && !empty($model->target_city)) {
            $cityArray = array_map('trim', explode(',', $model->target_city));
            foreach ($cityArray as $cityName) {
                if (!empty($cityName)) {
                    $servedAreas[] = [
                        "@type" => "AdministrativeArea",
                        "name" => $cityName
                    ];
                }
            }
        } else {
            $servedAreas[] = [
                "@type" => "AdministrativeArea",
                "name" => "New York"
            ];
        }

        // জেনারেট স্কিমা (JSON-LD)
        $schema = '<script type="application/ld+json">' . "\n";
        if ($schemaType === 'BlogPosting') {
            $schema .= json_encode([
                "@context" => "https://schema.org",
                "@type" => "BlogPosting",
                "mainEntityOfPage" => ["@type" => "WebPage", "@id" => $pageUrl],
                "headline" => $title,
                "description" => Str::limit($cleanDesc, 160),
                "image" => $imageUrl,
                "author" => ["@type" => "Organization", "name" => env('APP_NAME'), "url" => $siteUrl],
                "publisher" => ["@type" => "Organization", "name" => env('APP_NAME'), "logo" => ["@type" => "ImageObject", "url" => $logo]]
            ], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
        } else {
            // USA Local SEO-র জন্য ডাইনামিক সার্ভিস স্কিমা
            $schema .= json_encode([
                "@context" => "https://schema.org",
                "@type" => "Service",
                "name" => $title,
                "description" => Str::limit($cleanDesc, 160),
                "logo" => $logo,
                "image" => $imageUrl,
                "serviceType" => $serviceType,
                "areaServed" => $servedAreas, // এখানে মাল্টিপল সিটি অ্যারে পুশ হচ্ছে
                "provider" => [
                    "@type" => "LocalBusiness",
                    "name" => env('APP_NAME'),
                    "url" => $siteUrl,
                    "logo" => $logo,
                    "telephone" => $model->phone ?? ($web_Setting->phone ?? ''),
                    "priceRange" => "$$"
                ]
            ], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
        }
        $schema .= "\n</script>";

        // জেনারেট ডাটালায়ার (Currency "USD" করা হয়েছে ইউএসএ মার্কেটের জন্য)
        $dataLayerObj = [
            "event" => "view_item",
            "page_type" => strtolower($type) . "_detail",
            "ecommerce" => [
                "currency" => "USD",
                "value" => 0.00,
                "items" => [[
                    "item_name" => $title,
                    "item_category" => $type . "s",
                    "item_id" => (string)$model->id
                ]]
            ]
        ];
        $dataLayerJson = json_encode($dataLayerObj, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

        // ডাটাবেজ অপারেশন (মডেল অনুযায়ী সেভ বা আপডেট)
        return $model->seo()->updateOrCreate(
            [
                'model_type' => get_class($model),
                'model_id'   => $model->id,
            ],
            [
                'page_name'        => $title . " - {$type} Page",
                'page_slug'        => $page_slug,
                'meta_title'       => $request->meta_title ?? ($model->page_title ?? $title),
                'meta_description' => $request->meta_description ?? Str::limit($cleanDesc, 160),
                'meta_keywords'    => $request->meta_keywords,
                'canonical_url'    => $request->canonical_url ?? $pageUrl,
                'meta_robots'      => $request->meta_robots ?? 'index, follow',
                'schema_script'    => $request->schema_script ?? $schema,
                'datalayer_json'   => $request->datalayer_json ?? $dataLayerJson,
                'meta_image'       => $imageUrl,
            ]
        );
    }
}
