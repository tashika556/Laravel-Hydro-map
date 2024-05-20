@extends('admin/layout-admin')
@section('page_title','Edit Blog Details')

@section('content')
<div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
    <div class="pe-md-3 d-flex align-items-center">
        <a href="{{url('admin/blog')}}">
            <i class="fa fa-arrow-left" aria-hidden="true"></i>
        </a>
    </div>
    @endsection

    @section('container')


    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="bg-white p-4">
                <form action="{{url('admin/editsblogdetails/'.$blog_details->id)}}" method="post" enctype="multipart/form-data">
   
                        @csrf
                        @method('PUT')

                        <div class="row">
                        <div class="col-md-4 col-12">
                                <div class="form-group mb-4">
                                <label for="modelyear">Title</label>
                    <input type="text" name="title" class="form-control" value="{{$blog_details['title']}}">

                                </div>
                            </div>

                       
                            <div class="col-md-4 col-12">
                                <div class="form-group mb-4">
                                    <label for="introduction">Description</label>
                                    <textarea name="description" class="form-control">{{$blog_details['description']}}</textarea>

                                </div>
                            </div>

                            <div class="col-md-4 col-12">
                                <div class="form-group mb-4">
                                <label for="modelyear">Month</label>
                    <input type="text" name="month" class="form-control" value="{{$blog_details['month']}}">

                                </div>
                            </div>

                            <div class="col-md-4 col-12">
                                <div class="form-group mb-4">
                                <label for="modelyear">Date</label>
                    <input type="text" name="date" class="form-control" value="{{$blog_details['date']}}">

                                </div>
                            </div>

                            
                            <div class="col-md-4 col-12">
                                <div class="form-group mb-4">
                                <label for="count_company">Year</label>
                    <input type="text" name="year" class="form-control" value="{{$blog_details['year']}}">

                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="form-group mb-4">
                                    <label for="photos">Featured Image</label>
                    <input type="file" name="image" class="form-control">
                    <img src="{{asset('public/uploads/blogdetails/'.$blog_details->image)}}">

                                </div>
                            </div>
                            
                                              

                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-danger" value="Edit blog Details">
                        </div>

                        @if(Session::has('success'))
                        <button class="btn btn-success">{{Session::get('success')}}</button> @endif
                    </form>
                </div>
            </div>
        </div>
    </div>

    @endsection