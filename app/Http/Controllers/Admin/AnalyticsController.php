<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\ClickLog;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AnalyticsController extends Controller
{
    // 🌐 ১. Real-time Traffic Logs
    public function trafficLogs()
    {
        $logs = ClickLog::latest()->paginate(50);
        return view('backEnd.logs.clicks', compact('logs'));
    }

    // 📊 ২. Performance Reports
    public function performanceReports(Request $request)
    {
        // 🗓️ ফিল্টারিং লজিক (Default: today)
        $filter = $request->get('filter', 'today');
        $query = ClickLog::query();

        if ($filter == 'today') {
            $query->whereDate('created_at', \Carbon\Carbon::today());
        } elseif ($filter == 'yesterday') {
            $query->whereDate('created_at', \Carbon\Carbon::yesterday());
        } elseif ($filter == 'last_7_days') {
            $query->where('created_at', '>=', \Carbon\Carbon::now()->subDays(7));
        } elseif ($filter == 'last_30_days') {
            $query->where('created_at', '>=', \Carbon\Carbon::now()->subDays(30));
        }

        // ক) কাউন্টার উইজেটস ডেটা
        $totalClicks = (clone $query)->count();
        $uniqueVisitors = (clone $query)->distinct('ip_address')->count();
        $bounceRateEstimate = $totalClicks > 0 ? round(((clone $query)->select('ip_address')->groupBy('ip_address')->having(\DB::raw('count(*)'), '=', 1)->get()->count() / $uniqueVisitors) * 100, 1) : 0;

        // খ) Top 5 Pages
        $topPages = (clone $query)->select('url', DB::raw('count(*) as total'))
            ->groupBy('url')
            ->orderByDesc('total')
            ->take(5)
            ->get();

        // গ) Top 5 Referrers
        $topReferrers = (clone $query)->select('referrer', DB::raw('count(*) as total'))
            ->groupBy('referrer')
            ->orderByDesc('total')
            ->take(5)
            ->get();

        // ঘ) ডিভাইস ব্রেকডাউন (Chart)
        $deviceData = (clone $query)->select('device', DB::raw('count(*) as total'))
            ->groupBy('device')
            ->get();

        // ঙ) ব্রাউজার ব্রেকডাউন (New Chart)
        $browserData = (clone $query)->select('browser', DB::raw('count(*) as total'))
            ->groupBy('browser')
            ->orderByDesc('total')
            ->take(5)
            ->get();

        // 🌍 চ) রিয়েল কান্ট্রি ব্রেকডাউন (যা আগে মিসিং ছিল)
        $countryData = (clone $query)->select('country', DB::raw('count(*) as total'))
            ->groupBy('country')
            ->orderByDesc('total')
            ->take(5)
            ->get();

        $topServices = Service::select('services.id', 'services.name', 'services.slug', DB::raw('count(click_logs.id) as total_views'))
            ->join('click_logs', 'click_logs.url', 'LIKE', DB::raw("CONCAT('%/service/', services.slug, '%')"))
            // উপরে ফিল্টারিং কুয়েরি অ্যাপ্লাই করার জন্য (যেমন আজ, গতকাল ইত্যাদি)
            ->where(function($q) use ($filter) {
                if ($filter == 'today') {
                    $q->whereDate('click_logs.created_at', \Carbon\Carbon::today());
                } elseif ($filter == 'yesterday') {
                    $q->whereDate('click_logs.created_at', \Carbon\Carbon::yesterday());
                } elseif ($filter == 'last_7_days') {
                    $q->where('click_logs.created_at', '>=', \Carbon\Carbon::now()->subDays(7));
                } elseif ($filter == 'last_30_days') {
                    $q->where('click_logs.created_at', '>=', \Carbon\Carbon::now()->subDays(30));
                }
            })
            ->groupBy('services.id', 'services.name', 'services.slug')
            ->orderByDesc('total_views')
            ->take(5)
            ->get();

        // ছ) Hourly Traffic Trend (Line Chart - ২৪ ঘণ্টার ট্রেন্ড)
        $hourlyData = (clone $query)->select(DB::raw('HOUR(created_at) as hour'), DB::raw('count(*) as total'))
            ->groupBy('hour')
            ->orderBy('hour')
            ->get();

        // ২৪ ঘণ্টার সব আওয়ার জিরো দিয়ে ইনিশিয়ালের জন্য অ্যারে প্রিপেয়ার
        $hourlyTicks = array_fill(0, 24, 0);
        foreach ($hourlyData as $data) {
            $hourlyTicks[$data->hour] = $data->total;
        }

        // সব ডেটা একসাথে ভিউতে পাঠানো হলো
        return view('backEnd.logs.reports', compact(
            'totalClicks', 'uniqueVisitors', 'bounceRateEstimate','topServices',
            'topPages', 'topReferrers', 'deviceData', 'browserData', 'countryData', 'hourlyTicks', 'filter'
        ));
    }
}
