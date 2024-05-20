@extends('admin/layout-admin')
@section('page_title','Add International Financiers Details')

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
        <div class="col-md-4 col-12">
        <div class="bg-white p-4">
        <form action="{{route('added_finance')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group mb-4">
                    <label for="title">International Financier Name</label>
                    <input type="text" name="fin_name" class="form-control" required>

                </div>

                <div class="form-group">
                    <input type="submit" class="btn btn-danger" value="Add International Financier Details">
                </div>
   @if(Session::has('success'))
                <button class="btn btn-success">{{Session::get('success')}}</button>    @endif  
            </form>
        </div>       </div>
    </div>
</div>

@endsection