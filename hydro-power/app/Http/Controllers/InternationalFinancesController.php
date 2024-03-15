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
    
        // Array of FontAwesome icon classes representing shapes
        $shapeIcons = [
            'fa fa-square',
            'fa fa-circle',
'fa fa-plus-square',

            'fa fa-star',
            'fa fa-stop-circle',
            'fa fa-eject',
            'fa fa-play',
            'fa fa-chevron-circle-left',
            'fa fa-times',
            'fa fa-plus',
     'fa fa-th-large',
     'fa fa-file',
     'fa fa-map',
     'fa fa-archive',
     'fa fa-bookmark',
'fa fa-arrows',
'fa fa-check-circle',
'fa fa-cloud',
'fa fa-certificate',
'fa fa-flag',
'fa fa-building',
'fa fa-map-marker',
'fa fa-bandcamp',
            // Add more shapes as needed
        ];
    
        $randomShapeIcon = $shapeIcons[array_rand($shapeIcons)];

        $finance_details->fin_icon = $randomShapeIcon;
    
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