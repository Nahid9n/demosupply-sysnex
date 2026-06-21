<?php

namespace App\Http\Controllers\Admin;
use App\Helpers\ImageUpload;
use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::paginate(20);
        return view('backEnd.testimonial.index',compact('testimonials'));
    }
    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
                'review' => 'required',
                'rating' => 'required',
                'image' => [
                    'image',
                    'mimes:jpeg,png,jpg,gif,svg,webp',
                    'max:2048',
//                    'dimensions:min_width=300,min_height=300',
                ],
            ]);

            $input = $request->all();

            //upload meta image
            if($request->hasFile('image'))
            {
                $input['image'] = ImageUpload::upload($request->file('image'), 'uploads/testimonial', null, null);
            }

            Testimonial::create($input);
            return back()->with('success','Create Success.');
        }
        catch (\Exception $e){
            return back()->with('error',$e->getMessage());
        }
    }
    public function update(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
                'review' => 'required',
                'rating' => 'required',
                'image' => [
                    'image',
                    'mimes:jpeg,png,jpg,gif,svg,webp',
                    'max:2048',
//                    'dimensions:min_width=300,min_height=300',
                ],
            ]);

            $input = $request->all();
            $testimonial = Testimonial::findOrFail($request->id);

            //upload meta image
            if($request->hasFile('image'))
            {
                $input['image'] = ImageUpload::upload($request->file('image'), 'uploads/testimonial', null, null, $testimonial->image);
            }

            $testimonial->update($input);
            return back()->with('success','Update Success.');
        }
        catch (\Exception $e){
            return back()->with('error',$e->getMessage());
        }
    }
    public function destroy($id)
    {
        try {
            $testimonial = Testimonial::findOrFail($id);
            if (file_exists($testimonial->image)){
                unlink($testimonial->image);
            }
            $testimonial->delete();
            return back()->with('success','Delete Successfully');
        }
        catch (\Exception $e){
            return back()->with('error',$e->getMessage());
        }
    }
    public function statusUpdate($id,$status)
    {
        try {
            Testimonial::findOrFail($id)->update(['status' => $status]);
            return back()->with('success','Status Update Successfully');
        }
        catch (\Exception $e){
            return back()->with('error',$e->getMessage());
        }
    }
}
