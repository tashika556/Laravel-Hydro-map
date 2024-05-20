@extends('home-layout')
@section('page_title', 'Gallery')
@section('container')

<!-- Banner Section -->
<section class="banner_div text-center">
    <div class="mx-auto max-w-7xl lg:px-0 md:px-8 px-5">
        <div class="grid grid-cols-1">
            <div class="col-span-1">
                <div class="banner_div">
                    <h1 class="relative">@yield('page_title')</h1>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="relative">
    <div class="mx-auto max-w-7xl lg:px-0 md:px-8 px-5">
        <div class="grid grid-cols-3 gap-8">

        @foreach($galleries as $gallery)

            <div class="col-span-1" id="album{{$gallery->id}}">
            <div class="gallery-box">
                <div class="gallery_img-main">

                    <a href="gallerydetails/{{$gallery->id}}">
                    <img src="{{ asset('public/images/' . $gallery->featured_image) }}" alt="{{$gallery->name}}">
                    </a>
       
                </div>
                <h3>{{$gallery->name}}</h3>
            <p>Number of Photos: {{$gallery->photos->count()}}</p>
            </div></div>
            @endforeach
        </div>
    </div>
</section>

@endsection
<!-- Social Links Section -->
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
