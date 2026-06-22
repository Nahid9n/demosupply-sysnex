<?php

namespace App\Http\Controllers;

use App\Models\SeoManagement;
use App\Models\Service;
use Illuminate\Http\Request;

class SitemapController extends Controller
{
    public function index()
    {
        $staticPages = SeoManagement::whereNotNull('page_slug')->get();
        $services = Service::get();
        return response()->view('frontEnd.sitemap', [
            'staticPages' => $staticPages,
            'services' => $services
        ])->header('Content-Type', 'text/xml');
    }
}
