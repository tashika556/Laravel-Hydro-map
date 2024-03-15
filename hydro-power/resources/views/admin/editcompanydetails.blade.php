@extends('admin/layout-admin')
@section('page_title','Edit Company Details')

@section('content')
<div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
    <div class="pe-md-3 d-flex align-items-center">
        <a href="{{url('admin/company')}}">
            <i class="fa fa-arrow-left" aria-hidden="true"></i>
        </a>
    </div>
    @endsection

    @section('container')


    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="bg-white p-4">
                <form action="{{url('admin/editscompanydetails/'.$company_details->id)}}" method="post" enctype="multipart/form-data">
   
                        @csrf
                        @method('PUT')

                        <div class="row">
                        <div class="col-4">
                                <div class="form-group mb-4">
                                <label for="modelyear">Company Name</label>
                    <input type="text" name="company_name" class="form-control" value="{{$company_details['company_name']}}">

                                </div>
                            </div>

                       
                      
                                              

                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-danger" value="Edit Company Details">
                        </div>

                        @if(Session::has('success'))
                        <button class="btn btn-success">{{Session::get('success')}}</button> @endif
                    </form>
                </div>
            </div>
        </div>
    </div>

    @endsection