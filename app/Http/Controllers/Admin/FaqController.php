<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {
        $faqs = Faq::latest()->paginate(20);
        return view('backEnd.faq.index', compact('faqs'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
            'is_show_home' => 'nullable|boolean',
            'status' => 'nullable|boolean',
        ]);

        Faq::create([
            'question' => $request->question,
            'answer' => $request->answer,
            'is_show_home' => $request->has('is_show_home') ? 1 : 0,
            'status' => $request->has('status') ? 1 : 0,
        ]);

        return redirect()->route('admin.faq.index')->with('success', 'FAQ created successfully.');
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
            'is_show_home' => 'nullable|boolean',
            'status' => 'nullable|boolean',
        ]);

        $faq = Faq::findOrFail($id);
        $faq->update([
            'question' => $request->question,
            'answer' => $request->answer,
            'is_show_home' => $request->has('is_show_home') ? 1 : 0,
            'status' => $request->has('status') ? 1 : 0,
        ]);

        return redirect()->route('admin.faq.index')->with('success', 'FAQ updated successfully.');
    }

    public function destroy($id)
    {
        $faq = Faq::findOrFail($id);
        $faq->delete();
        return redirect()->back()->with('success', 'FAQ deleted successfully.');
    }
}
