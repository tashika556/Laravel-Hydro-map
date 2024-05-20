@extends('admin/layout-admin')
@section('page_title','Blog List')

@section('content')
<div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="pe-md-3 d-flex align-items-center">
          <a href="{{route('add_blog')}}">
  <button class="btn btn-danger">Add Blog Details</button>
</a>
          </div>
@endsection


@section('container')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-10 col-12">
            <table class="bg-white table">
                <thead>
                    <tr>
                        <th>S.No.</th>
                        <th>Blog Title</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($members as $company)
                    <tr>

                        <td>{{$loop->index+1}}</td>
                        <td>{{$company['title']}}</td>
                        <td>
                        <a href="{{url('admin/editblogdetails')}}/{{$company->id}}" class="btn btn-success">Edit</a>
                            <a href="{{url('admin/blog/delete')}}/{{$company->id}}" class="btn btn-danger" title="Delete">Delete</a>
              
                        </td>
   
                    </tr> @endforeach
                    <!-- Add more rows as needed -->                     @if(Session::has('fail'))
                <button class="btn btn-danger">{{Session::get('fail')}}</button>    @endif  
                </tbody>
            </table>
        </div>
    </div>
</div>


@endsection