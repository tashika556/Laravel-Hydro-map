@extends('admin/layout-admin')
@section('page_title', 'Gallery List')

@section('content')
    <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
        <div class="pe-md-3 d-flex align-items-center">
            <a href="{{ route('add_gallery') }}">
                <button class="btn btn-danger">Add Gallery Album</button>
            </a>
        </div>
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
                            <th>Album Name</th>
                            <th>Number of Photos</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($galleries as $index => $gallery)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $gallery->name }}</td>
                                <td>{{ $gallery->photos_count }}</td>
                                <td>
                                <a href="{{url('admin/editgallerydetails')}}/{{$gallery->id}}" class="btn btn-success">Edit</a>
                        <a href="{{url('admin/gallery/delete')}}/{{$gallery->id}}" class="btn btn-danger" title="Delete">Delete</a>
                        </td>
                    </tr> @endforeach
                    @if(Session::has('fail'))
                <button class="btn btn-danger">{{Session::get('fail')}}</button>    @endif
                            </tr>
                    
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
