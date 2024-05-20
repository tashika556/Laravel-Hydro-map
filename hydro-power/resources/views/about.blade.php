@extends('home-layout')
@section('page_title','About')
@section('container')



@section('content')
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
@endsection

@foreach($data as $product)
<section class="about lg:pt-0 image-bg relative">
    <div class="mx-auto max-w-7xl lg:px-0 md:px-8 px-5">
        <div class="grid md:grid-cols-7 grid-cols-1">
            <div class="md:col-start-2 md:col-span-5 col-span-1">
                <div class="relative">
                    <div class="about_img">
                        <img src="public/uploads/aboutdetails/{{$product->photo}}" alt="" loading="lazy" class="object-cover border border-2">
                    </div>
                    <div class="video_button">
                        <a href="{{ $product->video_url }}" id="play-video" class="video-play-button youtube">
                            <span></span>
                        </a>
                        <!-- video end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>  
<section class="counter-section relative">
    <div class="mx-auto max-w-7xl lg:px-0 md:px-8 px-5">
        <div class="grid lg:grid-cols-2 md:grid-cols-1 lg:gap-11">
            <div class="col-span-1">
                <div class="">
                    <div class="div-title mb-4">
                        <h2 class="pl-2 mb-4  font-bold text-gray-700 border-l-4 border-blue-500 dark:border-blue-400 dark:text-gray-300">
                            Introduction</h2>
                        <p class="text-gray-500 text-justify">{{ $product->introduction }}</p>
                    </div>
                </div>
            </div>
            <div class="col-span-1">
                <div class="grid grid-cols-2 lg:gap-10 mb-5">
                    <div class="col-span-1">
                        <div id="counter-box" class="bg-white border border-blue-500 shadow-lg shadow-blue-500/50 lg:p-10 p-5 border-opacity-10">
                            <div class="flex">
                                <h2 class="counter text-blue-800" data-number="{{ $product->count_hydropower}}"></h2>
                            </div>
                            <p class="text-gray-500">Hydropower
                            </p>
                        </div>
                    </div>
                    <div class="col-span-1">
                        <div id="counter-box" class="bg-blue-800 border border-blue-500 shadow-lg shadow-blue-500/50 lg:p-10 p-5 border-opacity-10">
                            <div class="flex">
                                <h2 class="counter text-white" data-number="{{ $product->count_runproject}}"></h2>
                            </div>
                            <p class="text-white">Running Project
                            </p>
                        </div>
                    </div>
                    <div class="col-span-1">
                        <div id="counter-box" class="bg-blue-800 border border-blue-500 shadow-lg shadow-blue-500/50 lg:p-10 p-5 border-opacity-10">
                            <div class="flex">
                                <h2 class="counter text-white" data-number="{{ $product->count_company}}"></h2>
                                <h2 class="text-white">+</h2>
                            </div>
                            <p class="text-white"> Companies
                            </p>
                        </div>
                    </div>
                    <div class="col-span-1">
                        <div id="counter-box" class="bg-white border border-blue-500 shadow-lg shadow-blue-500/50 lg:p-10 p-5 border-opacity-10">
                            <div class="flex">
                                <h2 class="counter text-blue-800" data-number="{{ $product->count_intfinancier}}"></h2>
                                <h2 class="text-blue-800">+</h2>
                            </div>
                            <p class="text-gray-500"> International Financiers
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endforeach
</div>@endsection

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