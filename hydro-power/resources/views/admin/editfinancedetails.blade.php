@extends('admin/layout-admin')
@section('page_title','Edit Financiers Involved Details')

@section('content')
<div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
    <div class="pe-md-3 d-flex align-items-center">
        <a href="{{url('admin/inter_finance')}}">
            <i class="fa fa-arrow-left" aria-hidden="true"></i>
        </a>
    </div>
    @endsection

    @section('container')


    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="bg-white p-4">
                <form action="{{url('admin/editsfinancedetails/'.$finance_details->id)}}" method="post" enctype="multipart/form-data">
   
                        @csrf
                        @method('PUT')

                        <div class="row">
                        <div class="col-md-4 col-12">
                                <div class="form-group mb-4">
                                <label for="modelyear">Financiers Involved Name</label>
                    <input type="text" name="fin_name" class="form-control" value="{{$finance_details['fin_name']}}">

                                </div>
                            </div>

                       
                      
                                              

                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-danger" value="Edit Financiers Involved Details">
                        </div>

                        @if(Session::has('success'))
                        <button class="btn btn-success">{{Session::get('success')}}</button> @endif
                    </form>
                </div>
            </div>
        </div>
    </div>

    @endsection