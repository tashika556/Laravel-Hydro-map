<?php

namespace App\Http\Controllers;

use App\Project;
use App\Companies;
use App\InternationalFinances;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin/project');
    }

    public function add_projectdetails()
    {
        $data['companies']=Companies::all();
        $dataa['financiers']=InternationalFinances::all();

        return view('admin/add_project_details',compact('data','dataa'));
    }
    public function store(Request $request)
    {
        $project_details=new Project;
    
        $project_details->project_name = $request->input('project_name');
        $project_details->latitude = $request->input('latitude');
        $project_details->longitude = $request->input('longitude');
        $project_details->summary = $request->input('summary');
        $project_details->description = $request->input('description');
        $project_details->impacts = $request->input('impacts');
        $project_details->advocacies_undertaken = $request->input('advocacies_undertaken');
        $project_details->rights = $request->input('rights');
        $project_details->location = $request->input('location');
        $project_details->budget = $request->input('budget');
        $project_details->affected_communities = $request->input('affected_communities');
        $project_details->conflict_start = $request->input('conflict_start');
        $project_details->government_actors = $request->input('government_actors');
        $project_details->advocacy_org = $request->input('advocacy_org');
        $project_details->relevant_link = $request->input('relevant_link');
        $project_details->dateentry = $request->input('dateentry');
    

        if($request->hasfile('icon'))
        {
    $file =$request->file('icon');
    $extension=$file->getClientOriginalExtension();
    $filename=time().'.'.$extension;
    $file->move('uploads/iconsproject/',$filename);
     $project_details-> icon = $filename;
        }



        $project_details->save();
        $project_details->companies()->attach($request->input('companies', []));
        $project_details->international_finances()->attach($request->input('international_finances', []));
    
        return redirect()->back()->with('success', 'Project Details Added Successfully');
    }
    
    function show(){
        $members=Project::all();
       return view('admin/project',compact('members'));
}


public function search(Request $request)
{
    $searchTerm = $request->input('search');

    $projects = Project::with(['companies', 'international_finances'])
        ->where(function($query) use ($searchTerm) {
            $query->where('project_name', 'like', "%$searchTerm%")
                  ->orWhere('location', 'like', "%$searchTerm%")
                  ->orWhere('affected_communities', 'like', "%$searchTerm%")
                  ->orWhere('government_actors', 'like', "%$searchTerm%");
        })
        ->get();

    return response()->json($projects);
}


public function editprojectdetails($id){
    $data['companies']=Companies::all();
    $dataa['financiers']=InternationalFinances::all();
    $project_details=Project::find($id);
    return view('admin/editprojectdetails',compact('project_details','data','dataa'));
}
public function updateprojectdetails(Request $request, $id)
{
    $project_details = Project::find($id);

    $project_details->project_name = $request->input('project_name');
    $project_details->latitude = $request->input('latitude');
    $project_details->longitude = $request->input('longitude');
    $project_details->summary = $request->input('summary');
    $project_details->description = $request->input('description');
    $project_details->impacts = $request->input('impacts');
    $project_details->advocacies_undertaken = $request->input('advocacies_undertaken');
    $project_details->rights = $request->input('rights');
    $project_details->location = $request->input('location');
    $project_details->budget = $request->input('budget');
    $project_details->affected_communities = $request->input('affected_communities');
    $project_details->conflict_start = $request->input('conflict_start');
    $project_details->government_actors = $request->input('government_actors');
    $project_details->advocacy_org = $request->input('advocacy_org');
    $project_details->relevant_link = $request->input('relevant_link');
    $project_details->dateentry = $request->input('dateentry');

    if ($request->hasFile('icon')) {
        $destination = 'uploads/iconsproject/' . $project_details->icon;

        if (File::exists($destination)) {
            File::delete($destination);
        }

        $file = $request->file('icon');
        $extension = $file->getClientOriginalExtension();
        $filename = time() . '.' . $extension;
        $file->move('uploads/iconsproject', $filename);

        $project_details->icon = $filename;
    }

    $project_details->update(); 
    $project_details->companies()->sync($request->input('companies', []));

    // Sync associated international finances
    $project_details->international_finances()->sync($request->input('international_finances', []));

    return redirect()->back()->with('success', 'Project Details Updated Successfully');
}


public function delete(Request $request,$id){
$model=Project::find($id);
$model->delete();
$request->session()->flash('fail','project Details Deleted');
return redirect('admin/project');

} 

}