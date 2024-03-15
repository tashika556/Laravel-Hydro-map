<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{

    public function index()
    {
        $members=Contact::all();
        return view('admin/contact',compact('members'));
    }
    public function editcontactdetails($id){
        $contact_details=contact::find($id);
        return view('admin/editcontactdetails',compact('contact_details'));
    }
    
public function updatecontactdetails(Request $request, $id)
{
    $contact_details = contact::find($id);

    $contact_details->address1 = $request->input('address1');
    $contact_details->address2 = $request->input('address2');
    $contact_details->phone1 = $request->input('phone1');
    $contact_details->phone2 = $request->input('phone2');
    $contact_details->email1 = $request->input('email1');
    $contact_details->email2 = $request->input('email2');
    $contact_details->facebook = $request->input('facebook');
    $contact_details->twitter = $request->input('twitter');
    $contact_details->youtube = $request->input('youtube');
    $contact_details->instagram = $request->input('instagram');

    $contact_details->update(); // Use save() instead of update()

    return redirect()->back()->with('success', 'contact Details Updated Successfully');
}



}
