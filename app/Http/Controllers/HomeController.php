<?php

namespace App\Http\Controllers;

use App\Mail\ContactMessageMail;
use App\Mail\SenderConfirmationMail;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public function index(){

        return view('frontEnd.home.index');
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
}
