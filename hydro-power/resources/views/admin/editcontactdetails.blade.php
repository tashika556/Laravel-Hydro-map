@extends('admin/layout-admin')
@section('page_title','Edit Contact Details')

@section('content')
<div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
    <div class="pe-md-3 d-flex align-items-center">
        <a href="{{url('admin/contact')}}">
            <i class="fa fa-arrow-left" aria-hidden="true"></i>
        </a>
    </div>
    @endsection

    @section('container')


    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="bg-white p-4">
                <form action="{{url('admin/editscontactdetails/'.$contact_details->id)}}" method="post" enctype="multipart/form-data">
   
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-md-4 col-12">
                                <div class="form-group mb-4">
                                <label for="modelyear">Address One</label>
                    <input type="text" name="address1" class="form-control" value="{{$contact_details['address1']}}">


                                </div>
                            </div>


                            <div class="col-md-4 col-12">
                                <div class="form-group mb-4">
                                <label for="modelyear">Address Two</label>
                    <input type="text" name="address2" class="form-control" value="{{$contact_details['address2']}}">

                                </div>
                            </div>

                            <div class="col-md-4 col-12">
                                <div class="form-group mb-4">
                                <label for="modelyear">Phone One</label>
                    <input type="text" name="phone1" class="form-control" value="{{$contact_details['phone1']}}">

                                </div>
                            </div>

                            <div class="col-md-4 col-12">
                                <div class="form-group mb-4">
                                <label for="modelyear">Phone Two</label>
                    <input type="text" name="phone2" class="form-control" value="{{$contact_details['phone2']}}">

                                </div>
                            </div>
                            
                            <div class="col-md-4 col-12">
                                <div class="form-group mb-4">
                                <label for="modelyear">Email One</label>
                    <input type="text" name="email1" class="form-control" value="{{$contact_details['email1']}}">

                                </div>
                            </div>

                            <div class="col-md-4 col-12">
                                <div class="form-group mb-4">
                                <label for="modelyear">Email Two</label>
                    <input type="text" name="email2" class="form-control" value="{{$contact_details['email2']}}">

                                </div>
                            </div>

                            <div class="col-md-4 col-12">
                                <div class="form-group mb-4">
                                <label for="modelyear">Facebook</label>
                    <input type="text" name="facebook" class="form-control" value="{{$contact_details['facebook']}}">

                                </div>
                            </div>

                            
                            <div class="col-md-4 col-12">
                                <div class="form-group mb-4">
                                <label for="modelyear">Instagram</label>
                    <input type="text" name="instagram" class="form-control" value="{{$contact_details['instagram']}}">

                                </div>
                            </div>

                            <div class="col-md-4 col-12">
                                <div class="form-group mb-4">
                                <label for="modelyear">Youtube</label>
                    <input type="text" name="youtube" class="form-control" value="{{$contact_details['youtube']}}">

                                </div>
                            </div>

                            <div class="col-md-4 col-12">
                                <div class="form-group mb-4">
                                <label for="modelyear">Twitter</label>
                    <input type="text" name="twitter" class="form-control" value="{{$contact_details['twitter']}}">

                                </div>
                            </div>

                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-danger" value="Edit contact Details">
                        </div>

                        @if(Session::has('success'))
                        <button class="btn btn-success">{{Session::get('success')}}</button> @endif
                    </form>
                </div>
            </div>
        </div>
    </div>

    @endsection