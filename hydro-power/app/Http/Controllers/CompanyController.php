<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Companies;
use App\Project;
use App\InternationalFinances;

class CompanyController extends Controller
{
    public function index()
    {
        return view('admin/company');
    }

    public function add_companydetails()
    {
        return view('admin/add_company_details');
    }



    public function store(Request $request)
    {
        $company_details = new Companies;
        $company_details->company_name = $request->input('company_name');
        
        // Generate a random color (hex format)
        $randomColor = '#' . str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);
        
        $company_details->icon = $randomColor;
        
        $company_details->save();
        
        return redirect()->back()->with('success', 'Company Details Added Successfully');
    }

    function show(){
        $members=Companies::all();
       return view('admin/company',compact('members'));
}

    public function getProjectDetails()
    {
        $projects = Project::with(['companies:id,company_name,icon', 'international_finances:id,fin_name,fin_icon'])->get();
        
        return response()->json($projects);
    }

    public function editcompanydetails($id){
        $company_details=Companies::find($id);
        return view('admin/editcompanydetails',compact('company_details'));
    }
    
public function updatecompanydetails(Request $request, $id)
{
    $company_details = Companies::find($id);

    $company_details->company_name = $request->input('company_name');

    $company_details->update(); 

    return redirect()->back()->with('success', 'Company Details Updated Successfully');
}

public function delete(Request $request,$id){
    $model=Companies::find($id);
    $model->delete();
    $request->session()->flash('fail','Company Details Deleted');
  return redirect('admin/company');

} 
    
}