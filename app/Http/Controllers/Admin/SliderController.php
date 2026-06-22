<?php

namespace App\Http\Controllers\Admin;
use App\Helpers\ImageUpload;
use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::orderBy('serial', 'asc')->get();
        return view('backEnd.slider.index', compact('sliders'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:3072',
            'heading_top' => 'nullable|string|max:255',
            'heading_one' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'button_one' => 'nullable|string|max:255',
            'button_one_url' => 'nullable|string',
            'button_two' => 'nullable|string|max:255',
            'button_two_url' => 'nullable|string',
            'serial' => 'nullable|integer',
        ]);

        $dbPath = null;
        if ($request->hasFile('image')) {
            $dbPath = ImageUpload::upload($request->file('image'),'uploads/sliders','1920','800');
        }
        Slider::create([
            'image' => $dbPath,
            'heading_top' => $request->heading_top,
            'heading_one' => $request->heading_one,
            'description' => $request->description,
            'button_one' => $request->button_one,
            'button_one_url' => $request->button_one_url,
            'button_two' => $request->button_two,
            'button_two_url' => $request->button_two_url,
            'serial' => $request->serial,
            'status' => $request->has('status') ? 1 : 0,
        ]);
        return redirect()->back()->with('success', 'Slider created successfully.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:3072',
            'heading_top' => 'nullable|string|max:255',
            'heading_one' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'button_one' => 'nullable|string|max:255',
            'button_one_url' => 'nullable|string',
            'button_two' => 'nullable|string|max:255',
            'button_two_url' => 'nullable|string',
            'serial' => 'nullable|integer',
        ]);

        $slider = Slider::findOrFail($id);
        $dbPath = $slider->image;

        if ($request->hasFile('image')) {
            $dbPath = ImageUpload::upload($request->file('image'),'uploads/sliders','1920','800', $slider->image);
        }

        $slider->update([
            'image' => $dbPath,
            'heading_top' => $request->heading_top,
            'heading_one' => $request->heading_one,
            'description' => $request->description,
            'button_one' => $request->button_one,
            'button_one_url' => $request->button_one_url,
            'button_two' => $request->button_two,
            'button_two_url' => $request->button_two_url,
            'serial' => $request->serial,
            'status' => $request->has('status') ? 1 : 0,
        ]);

        return redirect()->back()->with('success', 'Slider updated successfully.');
    }

    public function destroy($id)
    {
        $slider = Slider::findOrFail($id);
        if ($slider->image && file_exists(public_path($slider->image))) {
            @unlink(public_path($slider->image));
        }
        $slider->delete();
        return redirect()->back()->with('success', 'Slider deleted successfully.');
    }
}
