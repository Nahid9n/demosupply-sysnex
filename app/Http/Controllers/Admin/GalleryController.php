<?php

namespace App\Http\Controllers\Admin;
use App\Helpers\ImageUpload;
use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index(){
        $galleries = Gallery::paginate(100);
        return view('backEnd.gallery.index',compact('galleries'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'images' => 'required|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'alt_texts' => 'nullable|array',
            'serials' => 'nullable|array',
        ]);

        if ($request->hasFile('images')) {
            $images = $request->file('images');
            $alt_texts = $request->input('alt_texts', []);
            $serials = $request->input('serials', []);
            // প্রতিটা ইমেজের ওপর লুপ চালিয়ে ডাটাবেজে আলাদা রো তৈরি করা হচ্ছে
            foreach ($images as $index => $image) {;
                $fullPath = ImageUpload::upload($image, 'uploads/gallery', null, null);
                Gallery::create([
                    'image'     => $fullPath,
                    'alt_text'  => $alt_texts[$index] ?? null,
                    'serial'    => $serials[$index] ?? null,
                ]);
            }

            return redirect()->back()->with('success', 'Images uploaded successfully inside gallery!');
        }

        return redirect()->back()->with('error', 'No images selected for upload.');
    }
    public function edit($id)
    {
        $gallery = Gallery::findOrFail($id);
        return response()->json($gallery);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'alt_text' => 'nullable|string',
            'serial'   => 'nullable|integer',
            'image'    => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048'
        ]);

        $gallery = Gallery::findOrFail($id);
        if ($request->hasFile('image')) {
            $gallery->image = ImageUpload::upload($request->image, 'uploads/gallery', null, null, $gallery->image);
        }
        $gallery->alt_text = $request->alt_text;
        $gallery->serial = $request->serial;
        $gallery->save();
        return redirect()->back()->with('success', 'Gallery item updated successfully.');
    }

    public function destroy($id)
    {
        $gallery = Gallery::findOrFail($id);
        if (file_exists($gallery->image)) {
            unlink($gallery->image);
        }
        $gallery->delete();
        return redirect()->back()->with('success', 'Image removed from gallery permanently.');
    }
    public function bulkDelete(Request $request)
    {
        $request->validate([
            'ids' => 'required|array',
            'ids.*' => 'exists:galleries,id'
        ]);
        $items = Gallery::whereIn('id', $request->ids)->get();
        foreach ($items as $item) {
            if ($item->image && file_exists($item->image)) {
                @unlink($item->image);
            }
            $item->delete();
        }
        return redirect()->back()->with('success', 'Selected gallery items deleted successfully.');
    }
}
