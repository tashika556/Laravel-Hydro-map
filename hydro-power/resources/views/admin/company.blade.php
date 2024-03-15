@extends('admin/layout-admin')
@section('page_title','Company List')

@section('content')
<div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="pe-md-3 d-flex align-items-center">
          <a href="{{route('add_company')}}">
  <button class="btn btn-danger">Add Company Details</button>
</a>
          </div>
@endsection


@section('container')
<div class="container-fluid">
    <div class="row">
        <div class="col-10">
            <table class="bg-white table">
                <thead>
                    <tr>
                        <th>S.No.</th>
                        <th>Company Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($members as $company)
                    <tr>

                        <td>{{$loop->index+1}}</td>
                        <td>{{$company['company_name']}}</td>
                        <td>
                        <a href="{{url('admin/editcompanydetails')}}/{{$company->id}}" class="btn btn-success">Edit</a>
                        <a href="{{url('admin/company/delete')}}/{{$company->id}}" class="btn btn-danger" title="Delete">Delete</a>
                        </td>
                    </tr> @endforeach
                    @if(Session::has('fail'))
                <button class="btn btn-danger">{{Session::get('fail')}}</button>    @endif  
                    <!-- Add more rows as needed -->
                </tbody>
            </table>
        </div>
    </div>
</div>


@endsection