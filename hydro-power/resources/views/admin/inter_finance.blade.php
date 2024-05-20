@extends('admin/layout-admin')
@section('page_title','International Financiers List')

@section('content')
<div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="pe-md-3 d-flex align-items-center">
          <a href="{{route('add_finance')}}">
  <button class="btn btn-danger">Add International Financiers</button>
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
                        <th>International Financiers</th>

                        <th>Icon</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
             
                @foreach($members as $member)
            <tr>
            <td>{{$loop->index+1}}</td>
                <td>{{ $member->fin_name }}</td>

                <td><i class="{{ $member->fin_icon }}"></i></td>

                        <td>
                        <a href="{{url('admin/editfinancedetails')}}/{{$member->id}}" class="btn btn-success">Edit</a>
                        <a href="{{url('admin/finance/delete')}}/{{$member->id}}" class="btn btn-danger" title="Delete">Delete</a>
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