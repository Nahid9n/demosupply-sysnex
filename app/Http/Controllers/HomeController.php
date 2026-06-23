<?php

namespace App\Http\Controllers;

use App\Mail\ContactMessageMail;
use App\Mail\SenderConfirmationMail;
use App\Models\Article;
use App\Models\Message;
use App\Models\Service;
use App\Models\Slider;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public function index(){
        $sliders = Slider::orderBy('serial','asc')->where('status',1)->get();
        $services = Service::with('items')->latest()->where('status',1)->get()->take(6);
        $testimonials = Testimonial::latest()->where('status',1)->get();
        $articles = Article::latest()->where('status',1)->get()->take(3);
        return view('frontEnd.home.index',compact('sliders','services','testimonials','articles'));
    }
    public function services(){
        return view('frontEnd.services.index');
    }
    public function serviceDetails($slug){
        $service = Service::where('slug',$slug)->with('seo')->first();
        $seo = $service->seo;
        return view('frontEnd.services.details',compact('service','seo'));
    }
    public function articles(){
        $articles = Article::latest()->where('status',1)->get();
        return view('frontEnd.articles.index',compact('articles'));
    }
    public function articlesDetails($slug){
        $article = Article::where('slug',$slug)->with('seo')->first();
        return view('frontEnd.articles.details',compact('article'));
    }
    public function about(){
        return view('frontEnd.about-us.index');
    }
    public function device(){
        return view('frontEnd.product.device');
    }
    public function electrolite(){
        return view('frontEnd.product.electrolite');
    }
    public function water(){
        return view('frontEnd.product.water');
    }
    public function contact(){
        return view('frontEnd.contact-us.index');
    }
    public function contactFormSubmit(Request $request)
    {
        // ১. ফর্ম ভ্যালিডেশন (ডাটাবেজ সেফটি এবং রিকোয়ার্ড ফিল্ড নিশ্চিত করতে)
        $validatedData = $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|max:255',
            'phone'    => 'nullable|string|max:20',
            'interest' => 'required',
            'message'  => 'required|string',
        ]);
        $messageData = Message::create($validatedData);
        try {
            $adminMail = env('MAIL_FROM_ADDRESS');
            Mail::to($adminMail)->send(new ContactMessageMail($messageData));
            Mail::to($messageData->email)->send(new SenderConfirmationMail($messageData));
        } catch (\Exception $e) {

        }

        // AJAX এর জন্য JSON রেসপন্স
        return response()->json([
            'success' => true,
            'message' => 'Form Submit Success.'
        ], 200);
    }
}
