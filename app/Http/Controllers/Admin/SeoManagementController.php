<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Helpers\ImageUpload;
use App\Models\SeoGlobal;
use App\Models\SeoManagement;
use Illuminate\Http\Request;

class SeoManagementController extends Controller
{
    // সব পেজের লিস্ট (অ্যাডমিন ড্যাশবোর্ড)
    public function index()
    {
        $pages = SeoManagement::whereNotNull('page_slug')->get(); // স্ট্যাটিক পেজসমূহ
        $global = SeoGlobal::firstOrCreate(['id' => 1]);
        return view('backEnd.seo.index', compact('pages', 'global'));
    }

    // পেজ এসইও এডিট ফরম
    public function editPage($id)
    {
        $page = SeoManagement::findOrFail($id);
        return view('backEnd.seo.edit_page', compact('page'));
    }

    // পেজ এসইও আপডেট
    public function updatePage(Request $request, $id)
    {
        $page = SeoManagement::findOrFail($id);
        $data = $request->except(['meta_image']);

        if ($request->hasFile('meta_image')) {
            $data['meta_image'] = ImageUpload::upload($request->file('meta_image'),'uploads/seo',null,null,$page->meta_image);
        }
        $page->update($data);
        return redirect()->route('admin.seo.index')->with('success', 'Page SEO configuration updated!');
    }

    // গ্লোবাল স্ক্রিপ্ট ও Robots.txt আপডেট
    public function updateGlobal(Request $request)
    {
        $global = SeoGlobal::firstOrCreate(['id' => 1]);
        $global->update([
            'robots_txt' => $request->robots_txt,
            'header_scripts' => $request->header_scripts,
            'footer_scripts' => $request->footer_scripts,
        ]);

        // public/robots.txt ফাইলটি সরাসরি ডাইনামিকলি রাইট করা
        File::put(public_path('robots.txt'), $request->robots_txt);

        return redirect()->back()->with('success', 'Global SEO & Robots.txt updated successfully.');
    }
}
