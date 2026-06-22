<?php

namespace App\Http\Controllers\Admin;
use App\Helpers\ImageUpload;
use App\Http\Controllers\Controller;

use App\Models\AboutSetting;
use App\Models\WebSetting;
use Illuminate\Http\Request;

class WebSettingController extends Controller
{
    public function index(){
        return view('backEnd.settings.general');
    }
    public function settingsUpdate(Request $request){
        $webSetting = WebSetting::first();
        $input = $request->all();

        if ($request->file('header_logo')){
            if (file_exists($webSetting->header_logo)){
                unlink($webSetting->header_logo);
            }
            $headerLogoImage = $request->file('header_logo');
            $headerLogoImageNewName = rand().'.'.$headerLogoImage->extension();
            $dir = 'uploads/settings/';
            $headerLogoImage->move($dir,$headerLogoImageNewName);
            $input['header_logo'] =  $dir.$headerLogoImageNewName;
        }
        if ($request->file('footer_logo')){

            if (file_exists($webSetting->footer_logo)){
                unlink($webSetting->footer_logo);
            }
            $footerLogoImage = $request->file('footer_logo');
            $footerLogoImageNewName = rand().'.'.$footerLogoImage->extension();
            $dir = 'uploads/settings/';
            $footerLogoImage->move($dir,$footerLogoImageNewName);
            $input['footer_logo'] =  $dir.$footerLogoImageNewName;
        }
        if ($request->file('favicon_logo')){
            if (file_exists($webSetting->favicon_logo)){
                unlink($webSetting->favicon_logo);
            }
            $faviconLogoImage = $request->file('favicon_logo');
            $faviconLogoImageNewName = rand().'.'.$faviconLogoImage->extension();
            $dir = 'uploads/settings/';
            $faviconLogoImage->move($dir,$faviconLogoImageNewName);
            $input['favicon_logo'] =  $dir.$faviconLogoImageNewName;
        }

        $webSetting->update($input);
        return back()->with('success','Settings Update Successfully.');
    }

    public function aboutUs(){
        $about = AboutSetting::firstOrCreate(['id' => 1]);
        return view('backEnd.settings.about',compact('about'));
    }
    // ডাইনামিক সিঙ্গেল রো আপডেট
    public function updateAboutUs(Request $request)
    {
        $about = AboutSetting::firstOrCreate(['id' => 1]);
        $data = $request->except(['hero_image', 'story_image']);
        if ($request->hasFile('hero_image')) {
            $data['hero_image'] = ImageUpload::upload($request->file('hero_image'),'uploads/settings',null,null,$about->hero_image);
        }
        if ($request->hasFile('story_image')) {
            $data['story_image'] = ImageUpload::upload($request->file('story_image'),'uploads/settings',null,null,$about->story_image);
        }
        $about->update($data);
        return redirect()->back()->with('success', 'About Us settings updated successfully.');
    }

    // ফ্রন্টএন্ডে ডেটা পাস করার মেথড
    public function frontView()
    {
        $about = AboutSetting::firstOrCreate(['id' => 1]);
        return view('frontEnd.about', compact('about'));
    }
}
