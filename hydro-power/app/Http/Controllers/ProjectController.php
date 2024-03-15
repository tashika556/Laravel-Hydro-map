<?php

namespace App\Http\Controllers;

use App\Project;
use App\Companies;
use App\InternationalFinances;
use Illuminate\Http\Request;

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
        // Validate your request data here if needed
    
        $project_details = Project::create([
            'project_name' => $request->input('project_name'),
            'latitude' => $request->input('latitude'),
            'longitude' => $request->input('longitude'),
            'summary' => $request->input('summary'),
            'description' => $request->input('description'),
            'impacts' => $request->input('impacts'),
            'advocacies_undertaken' => $request->input('advocacies_undertaken'),
            'rights' => $request->input('rights'),
            'location' => $request->input('location'),
            'budget' => $request->input('budget'),
            'affected_communities' => $request->input('affected_communities'),
            'conflict_start' => $request->input('conflict_start'),
            'government_actors' => $request->input('government_actors'),
            'advocacy_org' => $request->input('advocacy_org'),
            'relevant_link' => $request->input('relevant_link'),
        ]);
    
        // Attach selected companies to the project
        $project_details->companies()->attach($request->input('companies', []));
        $project_details->international_finances()->attach($request->input('international_finances', []));
    
        return redirect()->back()->with('success', 'Project Details Added Successfully');
    }
    
    function show(){
        $members=Project::all();
       return view('admin/project',compact('members'));
}
// YourControllerName.php
public function search(Request $request)
{
    $searchTerm = $request->input('search');

    $projects = Project::with(['companies', 'international_finances'])
        ->where('project_name', 'like', "%$searchTerm%")
        ->orWhere('location', 'like', "%$searchTerm%")
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

    $project_details->update([
        'project_name' => $request->input('project_name'),
        'latitude' => $request->input('latitude'),
        'longitude' => $request->input('longitude'),
        'summary' => $request->input('summary'),
        'description' => $request->input('description'),
        'impacts' => $request->input('impacts'),
        'advocacies_undertaken' => $request->input('advocacies_undertaken'),
        'rights' => $request->input('rights'),
        'location' => $request->input('location'),
        'budget' => $request->input('budget'),
        'affected_communities' => $request->input('affected_communities'),
        'conflict_start' => $request->input('conflict_start'),
        'government_actors' => $request->input('government_actors'),
        'advocacy_org' => $request->input('advocacy_org'),
        'relevant_link' => $request->input('relevant_link'),
    ]);

    // Sync associated companies
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