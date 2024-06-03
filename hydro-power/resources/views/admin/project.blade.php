@extends('admin/layout-admin')
@section('page_title','Project List')

@section('content')
<div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
    <div class="pe-md-3 d-flex align-items-center">
        <a href="{{route('add_project')}}">
            <button class="btn btn-danger">Add Project</button>
        </a>
    </div>
    @endsection


    @section('container')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <table class="bg-white table">
                    <thead>
                        <tr>
                            <th class="border">S.No.</th>
                            <th class="border">Project Name</th>
                         
                            <th class="border">Date of project Entry/Update</th>
                            <th class="border">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($members as $member)
                        <tr>
                            <td class="border">{{$loop->index+1}}</td>
                            <td  class="border">{{ $member->project_name }}</td>
                            <td  class="border">{{ $member->dateentry }}</td>
             
<td  class="border">
<a href="{{url('admin/editprojectdetails')}}/{{$member->id}}" class="btn btn-success">Edit</a>
                        <a href="{{url('admin/project/delete')}}/{{$member->id}}" class="btn btn-danger" title="Delete">Delete</a>
                        </td>
                    </tr> @endforeach
                    @if(Session::has('fail'))
                <button class="btn btn-danger">{{Session::get('fail')}}</button>    @endif  
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    @endsection