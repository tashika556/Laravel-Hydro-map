@extends('admin/layout-admin')
@section('page_title','Add Blog Details')

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
                    <form action="{{route('added_blog')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group mb-4">
                                    <label for="title">Title</label>
                                    <input type="text" name="title" class="form-control" required>

                                </div>
                            </div>

                            <div class="col-4">
                                <div class="form-group mb-4">
                                    <label for="title">Month</label>
                                    <input type="text" name="month" class="form-control" required>

                                </div>
                            </div>

                            <div class="col-4">
                                <div class="form-group mb-4">
                                    <label for="title">Date</label>
                                    <input type="text" name="date" class="form-control" required>

                                </div>
                            </div>



                            <div class="col-4">
                                <div class="form-group mb-4">
                                    <label for="title">Year</label>
                                    <input type="text" name="year" class="form-control" required>
                                </div>
                            </div>

                            <div class="col-4">
                                <div class="form-group mb-4">
                                    <label for="title">Description</label>
                                    <textarea name="description" class="form-control"></textarea>
                                </div>
                            </div>
                       
                            <div class="col-4">
                                <div class="form-group mb-4">
                                <label for="image">Image</label>
                    <input type="file" name="image" class="form-control">
                                </div>
                            </div>
                        </div>      

                        <div class="form-group">
                            <input type="submit" class="btn btn-danger" value="Add Blog Details">
                        </div>
                        
                        @if(Session::has('success'))
                <button class="btn btn-success">{{Session::get('success')}}</button>    @endif  
                    </form>
                </div>
            </div>
        </div>
    </div>

    @endsection