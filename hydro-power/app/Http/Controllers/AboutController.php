<?php

namespace App\Http\Controllers;

use App\About;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class AboutController extends Controller
{

    public function index()
    {
        $members=About::all();
        return view('admin/about',compact('members'));
    }
    public function editaboutdetails($id){
        $about_details=About::find($id);
        return view('admin/editaboutdetails',compact('about_details'));
    }
    
public function updateaboutdetails(Request $request, $id)
{
    $about_details = About::find($id);

    $about_details->introduction = $request->input('introduction');
    $about_details->video_url = $request->input('video_url');
    $about_details->count_hydropower = $request->input('count_hydropower');
    $about_details->count_runproject = $request->input('count_runproject');
    $about_details->count_company = $request->input('count_company');
    $about_details->count_intfinancier = $request->input('count_intfinancier');

    if ($request->hasFile('photo')) {
        $destination = 'uploads/aboutdetails/' . $about_details->photo;

        if (File::exists($destination)) {
            File::delete($destination);
        }

        $file = $request->file('photo');
        $extension = $file->getClientOriginalExtension();
        $filename = time() . '.' . $extension;
        $file->move('uploads/aboutdetails', $filename);

        $about_details->photo = $filename;
    }

    $about_details->update(); // Use save() instead of update()

    return redirect()->back()->with('success', 'About Details Updated Successfully');
}



}
