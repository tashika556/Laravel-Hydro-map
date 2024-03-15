@extends('admin/layout-admin')
@section('page_title','Add Gallery Album')

@section('content')
<div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
    <div class="pe-md-3 d-flex align-items-center">
        <a href="{{url('admin/gallery')}}">
            <i class="fa fa-arrow-left" aria-hidden="true"></i>
        </a>
    </div>
</div>





@section('container')


<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="bg-white p-4">
                <form action="{{route('gallery.store')}}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group mb-4">
                                <label for="title">Album Title</label>
                                <input type="text" name="name" class="form-control" required>

                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group mb-4 border-bottom pb-4">
                                <label for="title">Featured Image</label><br>

                                <input type="file" name="featured_image" id="featuredImageInput" accept="image/*"
                                    onchange="previewImage(this, 'featuredImagePreview')">

                                <div id="featuredImagePreview" class="image-preview"></div>
                            </div>
                        </div>

                        <div class="col-12">
    <div class="form-group mb-4 border-bottom pb-4">
        <label for="title">Images</label><br>

        <input type="file" name="images[]" id="imagesInput" accept="image/*" multiple
               onchange="previewImages(this, 'imagesPreview')">


        <div id="imagesPreview" class="image-preview"></div>
    </div>
</div>






                    </div>

                    <div class="form-group">
                        <input type="submit" class="btn btn-danger" value="Add Gallery">

                    </div>

                    @if(Session::has('success'))
                    <button class="btn btn-success">{{Session::get('success')}}</button> @endif
                </form>
            </div>
        </div>
    </div>
</div>



@endsection