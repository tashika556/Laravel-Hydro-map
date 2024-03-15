<?php

namespace App\Http\Controllers;

use App\Blog;

use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin/blog');
    }

    public function add_blogdetails()
    {
        return view('admin/add_blog_details');
    }
 
    
        public function store(Request $request)
        {
            $blog=new Blog;
            $blog->title=$request->input('title');
            $blog->description=$request->input('description');
            $blog->month=$request->input('month');
            $blog->date=$request->input('date');
            $blog->year=$request->input('year');
 
  
            if($request->hasfile('image'))
            {
    $file =$request->file('image');
    $extension=$file->getClientOriginalExtension();
    $filename=time().'.'.$extension;
        $file->move('uploads/blogdetails',$filename);
    $blog-> image = $filename;
            }
    $blog->save();
            return redirect()->back()->with('success','Blog Details Added Successfully');
        }

    
    function show(){
        $members=Blog::all();
       return view('admin/blog',compact('members'));
}

public function editblogdetails($id){
    $blog_details=Blog::find($id);
    return view('admin/editblogdetails',compact('blog_details'));
}

public function updateblogdetails(Request $request, $id)
{
    $blog_details = Blog::find($id);

    $blog_details->title = $request->input('title');
    $blog_details->description = $request->input('description');
    $blog_details->month = $request->input('month');
    $blog_details->date = $request->input('date');
    $blog_details->year = $request->input('year');


    if ($request->hasFile('image')) {
        $destination = 'uploads/blogdetails/' . $blog_details->image;

        if (File::exists($destination)) {
            File::delete($destination);
        }

        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();
        $filename = time() . '.' . $extension;
        $file->move('uploads/blogdetails', $filename);

        $blog_details->image = $filename;
    }

    $blog_details->update(); // Use save() instead of update()

    return redirect()->back()->with('success', 'Blog Details Updated Successfully');
}

public function delete(Request $request,$id){
    $model=Blog::find($id);
    $model->delete();
    $request->session()->flash('fail','Blog Details Deleted');
  return redirect('admin/blog');

}

}