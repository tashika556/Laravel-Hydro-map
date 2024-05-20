@extends('home-layout')
@section('page_title','Album Details')
@section('container')



<section class="banner_div text-center">
    <div class="mx-auto max-w-7xl lg:px-0 md:px-8 px-5">
        <div class="grid grid-cols-1">
            <div class="col-span-1">
                <div class="banner_div">
                    <h1 class="relative">{{$gallery['name']}}</h1>
                </div>
            </div>
        </div>
    </div>
</section>



<section id="gallery">
    <div class="mx-auto max-w-7xl lg:px-0 md:px-8 px-5">

        <div class="grid grid-cols-3 gap-7">
        @foreach($gallery->photos as $photo)
    <div class="col-span-1">
        <div class="img-wrapper">
            <a href="{{ asset('public/images/' . $photo->image) }}" data-lightbox="gallery" data-title="Image {{ $loop->iteration }}">
                <img src="{{ asset('public/images/' . $photo->image) }}" class="img-responsive">
            </a>
        </div>
    </div>
@endforeach

            <!-- Add this to your HTML file -->
<script>

</script>

        </div><!-- End row -->

    </div><!-- End container -->
</section>



@endsection


@section('content-link')
@foreach($datas as $company)
<div class="flex justify-center space-x-5">
        <a href="{{$company['facebook']}}" target="_blank" rel="noopener noreferrer">
            <img class="icons_footer" src="https://img.icons8.com/fluent/30/000000/facebook-new.png" />
        </a>

        <a href="{{$company['instagram']}}" target="_blank" rel="noopener noreferrer">
            <img class="icons_footer" src="https://img.icons8.com/fluent/30/000000/instagram-new.png" />
        </a>
        <a href="{{$company['youtube']}}" target="_blank" rel="noopener noreferrer">
            <img class="icons_footer" src="https://img.icons8.com/fluent/30/000000/youtube.png" />
        </a>
        <a href="{{$company['twitter']}}" target="_blank" rel="noopener noreferrer">
            <img class="icons_footer" src="https://img.icons8.com/fluent/30/000000/twitter.png" />
        </a>
    </div>
    @endforeach
    @endsection

