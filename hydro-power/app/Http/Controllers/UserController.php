<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Companies;
use App\Project;
use App\About;
use App\Contact;
use App\Blog;
use App\Gallery;
use App\InternationalFinances;

class UserController extends Controller
{
    public function display()
    {
            $data = Companies::all();
            $finances = InternationalFinances::all();
            return view('index', compact('data','finances'));
        }

        public function about()
        {
            $datas = Contact::all();
            $data = About::all();
    return view('about', compact('data','datas'));
            }

            public function Contact()
            {
                $data = Contact::all();
        return view('contact', compact('data'));
                }

 public function blog()
                {
                        $datas = Contact::all();
                    $data = Blog::all();
            return view('blog', compact('data','datas'));
                    }

                    public function gallery()
                    {
                        $galleries = Gallery::withCount('photos')->get();
                            $datas = Contact::all();
              
                return view('gallery', compact('datas','galleries'));
                        }

public function gallerydetails($id)
{
    $gallery = Gallery::find($id);
    $datas = Contact::all();
    return view('gallerydetails', compact('gallery','datas'));
}


 public function ViewBlogDetails($id)
                    {
                            $blog_details = Blog::find($id);
                            return view('ViewBlogDetails', compact('blog_details'));

                    }
                
}