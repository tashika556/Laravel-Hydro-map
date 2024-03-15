@extends('admin/layout-admin')
@section('page_title','Edit Project Details')

@section('content')
<div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
    <div class="pe-md-3 d-flex align-items-center">
        <a href="{{url('admin/project')}}">
            <i class="fa fa-arrow-left" aria-hidden="true"></i>
        </a>
    </div>
    @endsection

    @section('container')


    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="bg-white p-4">
                <form action="{{url('admin/editsprojectdetails/'.$project_details->id)}}" method="post" enctype="multipart/form-data">
   
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-4">
                                <div class="form-group mb-4">
                                    <label for="title">Project Name</label>
                                    <input type="text" name="project_name" class="form-control" value="{{$project_details['project_name']}}" required>

                                </div>
                            </div>

                            <div class="col-4">
                                <div class="form-group mb-4">
                                    <label for="title">Latitude</label>
                                    <input type="text" name="latitude" class="form-control" value="{{$project_details['latitude']}}" required>

                                </div>
                            </div>

                            <div class="col-4">
                                <div class="form-group mb-4">
                                    <label for="title">Longitude</label>
                                    <input type="text" name="longitude" class="form-control" value="{{$project_details['longitude']}}" required>

                                </div>
                            </div>



                            <div class="col-4">
                                <div class="form-group mb-4">
                                    <label for="title">Description</label>
                                    <textarea name="description" class="form-control">{{$project_details['description']}}</textarea>
                                </div>
                            </div>

                            <div class="col-4">
                                <div class="form-group mb-4">
                                    <label for="title">Summary</label>
                                    <textarea name="summary" class="form-control">{{$project_details['summary']}}</textarea>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group mb-4">
                                    <label for="title">Project Impacts</label>
                                    <textarea name="impacts" class="form-control">{{$project_details['impacts']}}</textarea>
                                </div>
                            </div>

                            <div class="col-4">
                                <div class="form-group mb-4">
                                    <label for="title">Advocacies Undertaken</label>
                                    <textarea name="advocacies_undertaken" class="form-control">{{$project_details['advocacies_undertaken']}}</textarea>
                                </div>
                            </div>


                            <div class="col-4">
                                <div class="form-group mb-4">
                                    <label for="title">Rights violated as per national/international laws</label>
                                    <textarea name="rights" class="form-control">{{$project_details['rights']}}</textarea>
                                </div>
                            </div>

                            <div class="col-4">
                                <div class="form-group mb-4">
                                    <label for="title">Location</label>
                                    <input type="text" name="location" class="form-control" value="{{$project_details['location']}}">
                                </div>
                            </div>

                            <div class="col-4">
                                <div class="form-group mb-4">
                                    <label for="title">Budget</label>
                                    <input type="text" name="budget" class="form-control" value="{{$project_details['budget']}}">
                                </div>
                            </div>

                            <div class="col-4">
                                <div class="form-group mb-4">
                                    <label for="title">Affected Communities</label>
                                    <input type="text" name="affected_communities" class="form-control" value="{{$project_details['affected_communities']}}">
                                </div>
                            </div>

                            <div class="col-4">
                                <div class="form-group mb-4">
                                    <label for="title">Start of Conflict</label>
                                    <input type="text" name="conflict_start" class="form-control" value="{{$project_details['conflict_start']}}">
                                </div>
                            </div>

                            <div class="col-4">
    <div class="form-group mb-4">
        <label for="title">Company Name</label>
        @foreach($data['companies'] as $company)
            <div class="d-flex items-center py-3">
                <input type="checkbox" name="companies[]" class="company-checkbox input_width border-gray-300 rounded" value="{{$company->id}}"
                    @if(in_array($company->id, $project_details->companies->pluck('id')->toArray())) checked @endif />
                <span class="mx-1">{{$company->company_name}}</span>
            </div>
        @endforeach
    </div>
</div>

                            <div class="col-4">
                                <div class="form-group mb-4">
                                    <label for="title">Relevant Government Actors</label>
                                    <textarea name="government_actors" class="form-control">{{$project_details['government_actors']}}</textarea>
                                </div>
                            </div>

                            <div class="col-4">
    <div class="form-group mb-4">
        <label for="title">International Financiers</label>
        @foreach($dataa['financiers'] as $financier)
            <div class="d-flex items-center py-3">
                <input type="checkbox" name="international_finances[]" class="input_width border-gray-300 rounded" value="{{$financier->id}}"
                    @if(in_array($financier->id, $project_details->international_finances->pluck('id')->toArray())) checked @endif />
                <span class="mx-1">{{$financier->fin_name}}</span>
            </div>
        @endforeach
    </div>
</div>

                            <div class="col-4">
                                <div class="form-group mb-4">
                                    <label for="title">Advocacy Organizations</label>
                                    <textarea name="advocacy_org" class="form-control">{{$project_details['advocacy_org']}}</textarea>
                                </div>
                            </div>

                            <div class="col-4">
                                <div class="form-group mb-4">
                                    <label for="title">Relevant Links</label>
                                    <textarea name="relevant_link" class="form-control">{{$project_details['relevant_link']}}</textarea>
                                </div>
                            </div>

                        </div>

                        <div class="form-group">
                            <input type="submit" class="btn btn-danger" value="Edit project Details">
                        </div>

                        @if(Session::has('success'))
                        <button class="btn btn-success">{{Session::get('success')}}</button> @endif
                    </form>
                </div>
            </div>
        </div>
    </div>

    @endsection