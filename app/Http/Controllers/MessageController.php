<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index()
    {
        $messages = Message::latest()->get();
        return view('backEnd.message.index', compact('messages'));
    }

    public function destroy(Request $request)
    {
        $message = Message::findOrFail($request->id);
        $message->delete();
        return response()->json(['success' => true]);
    }
}
