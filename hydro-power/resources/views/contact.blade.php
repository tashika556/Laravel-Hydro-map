@extends('home-layout')
@section('page_title','Contact')
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
@foreach($data as $company)
<section class="contact image-bg relative">
    <div class="mx-auto max-w-7xl lg:px-0 md:px-8 px-5 z-10 relative">
        <div class="grid lg:grid-cols-9">
            <div class="col-start-2 col-span-7">
                <div class="content-div relative flex flex-col justify-center">
                    <div class="contact-box bg-gray-700 lg:p-10 p-5 rounded-2xl shadow-2xl">
                        <div class="contact_wrap">
                            <div class="div-title">
                               
                                <h2 class=" text-white">
                                @yield('page_title')</h2>
                            </div>
                            <div class="text-contact border-b-2 border-opacity-10 py-4">
                                <h3 class="text-white lg:text-4xl text-3x1  mb-2">Address</h2>
                                    <p class="text-white text-lg"><i class="fa fa-map-marker" aria-hidden="true"></i>{{$company['address1']}}</p>
                            </div>
                            <div class="text-contact border-b-2 border-opacity-10 py-4">
                                <h3 class="text-white lg:text-4xl text-3x1  mb-2">Phone</h2>
                                    <p class="text-white text-lg"><i class="fa fa-phone transform rotate-90" aria-hidden="true"></i>{{$company['phone1']}}</p>
                            </div>
                            <div class="text-contact border-b-2 border-opacity-10 py-4">
                                <h3 class="text-white lg:text-4xl text-3x1  mb-2">Email</h2>
                                    <p class="text-white text-lg"><i class="fa fa-envelope" aria-hidden="true"></i>{{$company['email1']}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

</div>@endsection

@section('content-link')
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
    </div>@endforeach
    @endsection