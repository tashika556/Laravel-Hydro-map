@extends('admin/layout-admin')
@section('page_title','Edit About Details')

@section('content')
<div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
    <div class="pe-md-3 d-flex align-items-center">
        <a href="{{url('admin/about')}}">
            <i class="fa fa-arrow-left" aria-hidden="true"></i>
        </a>
    </div>
    @endsection

    @section('container')


    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="bg-white p-4">
                <form action="{{url('admin/editsaboutdetails/'.$about_details->id)}}" method="post" enctype="multipart/form-data">
   
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-4">
                                <div class="form-group mb-4">
                                    <label for="introduction">Introduction</label>
                                    <textarea name="introduction"
                                        class="form-control">{{$about_details['introduction']}}</textarea>

                                </div>
                            </div>

                            <div class="col-4">
                                <div class="form-group mb-4">
                                    <label for="photos">Featured Image</label>
                    <input type="file" name="photo" class="form-control">
                    <img src="{{asset('uploads/aboutdetails/'.$about_details->photo)}}">

                                </div>
                            </div>

                            <div class="col-4">
                                <div class="form-group mb-4">
                                <label for="modelyear">Video URL</label>
                    <input type="text" name="video_url" class="form-control" value="{{$about_details['video_url']}}">

                                </div>
                            </div>

                            <div class="col-4">
                                <div class="form-group mb-4">
                                <label for="modelyear">Hydropower Total</label>
                    <input type="text" name="count_hydropower" class="form-control" value="{{$about_details['count_hydropower']}}">

                                </div>
                            </div>

                            <div class="col-4">
                                <div class="form-group mb-4">
                                <label for="modelyear">Running Projects Total</label>
                    <input type="text" name="count_runproject" class="form-control" value="{{$about_details['count_runproject']}}">

                                </div>
                            </div>

                            
                            <div class="col-4">
                                <div class="form-group mb-4">
                                <label for="count_company">Companies Total</label>
                    <input type="text" name="count_company" class="form-control" value="{{$about_details['count_company']}}">

                                </div>
                            </div>

                            
                            <div class="col-4">
                                <div class="form-group mb-4">
                                <label for="modelyear">International Financiers Total</label>
                    <input type="text" name="count_intfinancier" class="form-control" value="{{$about_details['count_intfinancier']}}">

                                </div>
                            </div>

                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-danger" value="Edit About Details">
                        </div>

                        @if(Session::has('success'))
                        <button class="btn btn-success">{{Session::get('success')}}</button> @endif
                    </form>
                </div>
            </div>
        </div>
    </div>

    @endsection