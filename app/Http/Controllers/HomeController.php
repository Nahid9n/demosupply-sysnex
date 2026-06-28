<?php

namespace App\Http\Controllers;

use App\Mail\ContactMessageMail;
use App\Mail\SenderConfirmationMail;
use App\Models\AboutSetting;
use App\Models\Article;
use App\Models\Gallery;
use App\Models\Message;
use App\Models\Newsletter;
use App\Models\Service;
use App\Models\Slider;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public function index(){
        $sliders = Slider::orderBy('serial','asc')->where('status',1)->get();
        $services = Service::with('items')->whereNull('parent_id')->latest()->where('status',1)->get()->take(6);
        $testimonials = Testimonial::latest()->where('status',1)->get();
        $articles = Article::latest()->where('status',1)->get()->take(3);
        return view('frontEnd.home.index',compact('sliders','services','testimonials','articles'));
    }
    public function services(){
        $services = Service::where('status',1)->whereNull('parent_id')->latest()->paginate(12);
        return view('frontEnd.services.index',compact('services'));
    }
    public function serviceDetails($slug){
        $service = Service::where('slug',$slug)->with('seo','pricings','gallery')->first();
        $seo = $service->seo;
        $services = Service::where('status',1)->latest()->whereNull('parent_id')->get()->take(15);
        return view('frontEnd.services.details',compact('service','seo','services'));
    }
    public function articles(Request $request){
        // Eikhane standard pagination dynamically set hobe (ধরি, প্রতি পেজে ৯টি পোস্ট)
        $articles = Article::latest()->where('status',1)->paginate(3);

        // Dynamic handling for AJAX Load More
        if ($request->ajax()) {
            $view = '';
            foreach ($articles as $article) {
                // dynamic string output banano hocche loop loop kore layout standard rekhe
                $view .= '<div class="col-md-6 col-lg-4 reveal article-item">' .
                    view('frontEnd.component.articleCard', compact('article'))->render() .
                    '</div>';
            }

            return response()->json([
                'html' => $view,
                'hasMore' => $articles->hasMorePages()
            ]);
        }
        return view('frontEnd.articles.index',compact('articles'));
    }
    public function articlesDetails($slug)
    {
        $article = Article::where('slug', $slug)->firstOrFail(); // first()-er jaygay firstOrFail() use kora bhalo, jeno vul slug hole 404 error dey
        $trending_articles = Article::where('category_id', $article->category_id)
            ->where('id', '!=', $article->id)
            ->where('status', 1)
            ->orderBy('read_time', 'desc')
            ->take(4)
            ->get();

        // 3. View-te data pass kora
        return view('frontEnd.articles.details', compact('article', 'trending_articles'));
    }
    public function suggestions(Request $request)
    {
        $keyword = $request->get('search');

        if (!empty($keyword)) {
            $articles = Article::where('status', 1)
                ->where(function($query) use ($keyword) {
                    $query->where('title', 'LIKE', '%' . $keyword . '%')
                        ->orWhere('summary', 'LIKE', '%' . $keyword . '%');
                })
                ->select('title', 'slug', 'image', 'created_at') // image ar date jukto kora holo
                ->take(5)
                ->get()
                ->map(function($article) {
                    return [
                        'title' => $article->title,
                        'slug' => $article->slug,
                        'image' => $article->image ? asset($article->image) : asset('assets/images/default.jpg'),
                        'date' => $article->created_at->format('M d, Y') // readable date format "Jun 24, 2026"
                    ];
                });

            return response()->json($articles);
        }

        return response()->json([]);
    }
    public function about(){
        $about = AboutSetting::first();
        return view('frontEnd.about-us.index',compact('about'));
    }
    public function projectGallery(){
        $galleries = Gallery::where('status',1)->get();
        return view('frontEnd.gallery.index',compact('galleries'));
    }
    public function contact(){
        $services = Service::where('status',1)->get();
        return view('frontEnd.contact-us.index',compact('services'));
    }
    public function contactFormSubmit(Request $request)
    {
        // ১. নতুন ফিল্ডগুলোর ভ্যালিডেশন
        $validatedData = $request->validate([
            'first_name'     => 'required|string|max:120',
            'last_name'      => 'required|string|max:120',
            'email'          => 'required|email|max:255',
            'phone'          => 'required|string|max:20', // ছবিতে রিকোয়ার্ড ছিল
            'zip_code'       => 'required|string|max:20',
            'street_address' => 'required|string|max:255',
            'apartment'      => 'nullable|string|max:100',
            'interest'       => 'required',
            'frequency'      => 'required|string|max:50',
            'sms_opt_in'     => 'nullable|boolean',
            'message'        => 'nullable|string', // অপশনাল করা হয়েছে
        ]);

        // ২. ডাটাবেজের 'name' কলামের জন্য ফার্স্ট ও লাস্ট নেম যুক্ত করা
        $fullName = $validatedData['first_name'] . ' ' . $validatedData['last_name'];

        // ৩. ডাটাবেজে সেভ করার জন্য অ্যারে তৈরি
        $insertData = [
            'name'           => $fullName,
            'email'          => $validatedData['email'],
            'phone'          => $validatedData['phone'],
            'interest'       => $validatedData['interest'],
            'zip_code'       => $validatedData['zip_code'],
            'street_address' => $validatedData['street_address'],
            'apartment'      => $validatedData['apartment'],
            'frequency'      => $validatedData['frequency'],
            'sms_opt_in'     => $request->has('sms_opt_in') ? 1 : 0, // চেকড থাকলে ১, না থাকলে ০
            'message'        => $validatedData['message'],
        ];

        // ৪. ডাটাবেজে ইনসার্ট
        $messageData = Message::create($insertData);

        // ৫. মেইল পাঠানো
        try {
            $adminMail = env('MAIL_FROM_ADDRESS');
            Mail::to($adminMail)->send(new ContactMessageMail($messageData));
            Mail::to($messageData->email)->send(new SenderConfirmationMail($messageData));
        } catch (\Exception $e) {
            // মেইল সার্ভারে সমস্যা হলেও যেন ফর্ম সাবমিট আটকে না যায়
        }

        // AJAX এর জন্য JSON রেসপন্স
        return response()->json([
            'success' => true,
            'message' => 'Form Submit Success.'
        ], 200);
    }
    public function subscribe(Request $request)
    {
        // 1. Core Verification / Validation Check
        $request->validate([
            'email' => 'required|email|unique:newsletters,email',
        ], [
            'email.required' => 'Please provide a valid email address.',
            'email.email'    => 'The email address format is invalid.',
            'email.unique'   => 'This email is already subscribed to our hub!',
        ]);

        // 2. Data Create Logic Execution
        Newsletter::create([
            'email' => $request->email
        ]);

        // 3. Response Status JSON mapping back dynamic code
        return response()->json([
            'success' => true,
            'message' => 'Thank you for subscribing! Welcome to Hub.'
        ]);
    }
    public function requestQuote(){
        $services = Service::where('status',1)->get();
        return view('frontEnd.request-quote.index',compact('services'));
    }
}
