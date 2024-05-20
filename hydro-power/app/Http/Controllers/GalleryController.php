<?php

namespace App\Http\Controllers;

use App\Gallery;
use App\Image;
use Illuminate\Http\Request;
use App\Http\Livewire\ImageUploader;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::withCount('photos')->get();

        return view('admin/gallery', compact('galleries'));
    }

    public function add_gallerydetails()
    {
        
        return view('admin/add_gallery_details');
    }


    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string',
            'featured_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:4096', // Update the max size
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2097152', // Update the max size
        ]);
        
    
        // Save gallery details
        $gallery = new Gallery;
        $gallery->name = $request->name;
    
        if ($request->hasFile('featured_image')) {
            $featuredImage = $request->file('featured_image');
            $featuredImageName = time() . '_' . $featuredImage->getClientOriginalName();
            $featuredImage->move(public_path('images'), $featuredImageName);
            $gallery->featured_image = $featuredImageName;
        }
    
        $gallery->save();
    
        // Save images related to the gallery
        $numImages = $request->input('images_count');
        
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('images'), $imageName);
    
                $gallery->photos()->create([
                    'image' => $imageName,
                ]);
    
                $numImages--; // Decrease the count as images are stored
            }
        }
    
        return redirect()->back()->with('success', 'Gallery Details Added Successfully');
    }

     public function editgallerydetails($id)
    {
        $gallery_details = Gallery::with('photos')->find($id);
        return view('admin/editgallerydetails', compact('gallery_details'));
    }
public function updategallerydetails(Request $request, $id)
{
    $request->validate([
        'name' => 'required',
        'featured_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    $gallery = Gallery::find($id);
    $gallery->name = $request->name;

    // Update Cover Image
    if ($request->hasFile('featured_image')) {
        $coverImage = $request->file('featured_image');
        $coverImageName = 'cover_' . time() . '.' . $coverImage->getClientOriginalExtension();
        $coverImage->move(public_path('images'), $coverImageName);
        $gallery->featured_image = $coverImageName;
    }

    // Update or Add Gallery Images
    if ($request->hasFile('images')) {
        foreach ($request->file('images') as $image) {
            $imageName = 'gallery_' . time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('images'), $imageName);

            // Check if the image already exists
            $existingImage = $gallery->photos()->where('image', $imageName)->first();

            if ($existingImage) {
                // If the image exists, update it
                $existingImage->update(['image' => $imageName]);
            } else {
                // If the image doesn't exist, create a new one
                $photo = new Image(['image' => $imageName]);
                $gallery->photos()->save($photo);
            }
        }
    }

    $gallery->update();

    return redirect()->back()->with('success', 'Gallery Details Updated Successfully');
}

    
    public function delete(Request $request,$id){
        $model=Gallery::find($id);
        $model->delete();
        $request->session()->flash('fail','Gallery Details Deleted');
        return redirect('admin/gallery');
        
        } 

        public function removeImage(Request $request, $id)
{
    // Find the image by ID and delete it
    $image = Image::findOrFail($id);
    $image->delete();

    // Return a response indicating success
    return response()->json(['message' => 'Image removed successfully']);
}
        
}
