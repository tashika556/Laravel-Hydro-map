@extends('admin/layout-admin')
@section('page_title', 'Edit Gallery Details')

@section('content')
    <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
        <div class="pe-md-3 d-flex align-items-center">
            <a href="{{ url('admin/gallery') }}">
                <i class="fa fa-arrow-left" aria-hidden="true"></i>
            </a>
        </div>
    </div>

@endsection



@section('container')


<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="bg-white p-4">
            <form action="{{ route('update_gallery', $gallery_details->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group mb-4">
                                <label for="title">Album Title</label>
                                <input type="text" name="name" value="{{ $gallery_details->name }}" required>

                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group image-preview mb-4 border-bottom pb-4">
                                <label for="title">Featured Image</label><br>
                                <input type="file" name="featured_image" accept="image/*">
        <img src="{{ asset('public/images/' . $gallery_details->featured_image) }}" alt="Cover Image">
                            </div>
                        </div>

                        <div class="col-12">
    <div class="form-group image-preview mb-4 border-bottom pb-4">
        <label for="title">Images</label><br>
        <input type="file" name="images[]" accept="image/*" multiple>
        @foreach($gallery_details->photos as $photo)
        <div class="relative image-container">
            <img src="{{ asset('public/images/' . $photo->image) }}" alt="Gallery Image">
            <span class="remove-icon remove-image-btn" data-image-id="{{ $photo->id }}"><i class="fa fa-times" aria-hidden="true"></i></span>

            </div>
        @endforeach
    </div>
</div>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-danger" value="Update Gallery">
                    </div>
                    @if(Session::has('success'))
                    <button class="btn btn-success">{{Session::get('success')}}</button> @endif
                </form>
            </div>
        </div>
    </div>
</div>



@endsection