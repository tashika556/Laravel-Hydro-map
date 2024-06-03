<?php

namespace App\Http\Controllers;

use App\InternationalFinances;
use App\Companies;
use Illuminate\Support\Facades\Cache;

use Illuminate\Http\Request;

class InternationalFinancesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin/inter_finance');
    }



    
    public function add_financedetails()
    {
        $data['companies']=Companies::all();

        return view('admin/add_finance_details',compact('data'));
    }
    public function store(Request $request)
    {
        
        $finance_details = new InternationalFinances;
        $finance_details->fin_name = $request->input('fin_name');
    
     
    
        $finance_details->save();

        
    
        return redirect()->back()->with('success', 'International Financier Details Added Successfully');
    }
    

    function show(){
        $members=InternationalFinances::all();
       return view('admin/inter_finance',compact('members'));
}

function display(){
    $members=InternationalFinances::all();
   return view('index',compact('members'));
}

public function editfinancedetails($id){
    $finance_details=InternationalFinances::find($id);
    return view('admin/editfinancedetails',compact('finance_details'));
}

public function updatefinancedetails(Request $request, $id)
{
$finance_details = InternationalFinances::find($id);

$finance_details->fin_name = $request->input('fin_name');

$finance_details->update(); 

return redirect()->back()->with('success', 'Finance Details Updated Successfully');
}

public function delete(Request $request,$id){
$model=InternationalFinances::find($id);
$model->delete();
$request->session()->flash('fail','Finance Details Deleted');
return redirect('admin/inter_finance');

} 

}