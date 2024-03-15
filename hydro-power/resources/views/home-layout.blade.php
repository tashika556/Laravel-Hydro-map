<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('page_title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="icon" href="{{asset('img/fav.png')}}">
    <link rel="stylesheet" href="{{asset('css/slick.css')}}" />
    <link rel="stylesheet" href="{{asset('css/slick-theme.css')}}" />
    <link rel="stylesheet" href="{{asset('css/magnific-popup.css')}}" />
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/jquery-ui.css')}}">
    <link rel="stylesheet" href="{{asset('css/custom.css')}}" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==" crossorigin="" />
    <link rel="stylesheet" href="{{asset('css/responsive.css')}}" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css">
</head>




<body class="custom_body">
    <div class="menu-btn d-lg-none d-block">
        <i class="fa fa-bars" aria-hidden="true"></i><!-- Add these links to your HTML head section -->


    </div>

    <div class="header_box fixed w-full z-20 bg-blue py-4 top-0">
        <div class="header">
            <nav class=" md:px-8 px-5">
            <ul class="navbar-links  w-full flex">
                    <div class="flex items-center">
                        <li class="navbar-dropdown relative pr-12">
                            <a class="text-white uppercase font-bold text-sm" href="{{url('')}}"> Home </a>
                        </li>

                        <li class="navbar-dropdown relative pr-12">
                            <a class="text-white uppercase font-bold text-sm" href="{{url('about')}}"> About </a>
                        </li>
                        <li class="navbar-dropdown relative pr-12">
                            <a class="text-white uppercase font-bold text-sm" href="{{url('blog')}}"> Blog </a>
                        </li>
                        <li class="navbar-dropdown relative pr-12">
                            <a class="text-white uppercase font-bold text-sm" href="{{url('gallery')}}"> Gallery </a>
                        </li>

                        <li class="navbar-dropdown relative pr-12">
                            <a class="text-white uppercase font-bold text-sm" href="{{url('contact')}}">Contact</a>
                        </li>
                    </div>

                </ul>



            </nav>
        </div>
    </div>

    @section('content') @show
    @section('container')
                    @show

 

                    <a id="button"></a>
<footer class="flex flex-col space-y-10 justify-center py-12 bg-black">

    <nav class="footer_link flex justify-center flex-wrap lg:gap-6 gap-4 text-gray-500">
        <a class="text-gray-300" href="{{url('')}}">Home</a>
        <a class="text-gray-300" href="{{url('about')}}">About</a>
        <a class="text-gray-300" href="{{url('blog')}}">Blog</a>

        <a class="text-gray-300" href="{{url('gallery')}}">Gallery</a>
        <a class="text-gray-300" href="{{url('contact')}}">Contact</a>
    </nav>


    @section('content-link') @show


</footer>
<div class="footer_bottom bg-gray-900 py-4">
    <div class="mx-auto max-w-7xl lg:px-0 md:px-8 px-5">
        <div class="flex justify-between lg:flex-row flex-col">
            <p class="text-center text-gray-300">©2024 Hydropower | All rights reserved.</p>
            <p class="text-center text-gray-300"> || Website by <a href="http://archiesoft.com.np/">ArchieSoft Technology</a></p>
        </div>

    </div>
</div>
<!-- mobile menu start  -->
<div class="side-bar sidebar_lg">
    <header>
        <div class="close-btn">
            <i class="fa fa-times"></i>
        </div>
    </header>
    <div class="menu_mobile pt-3">
        <div class="item"><a href="{{url('')}}"> Home</a></div>
        
       
        <div class="item"><a href="{{url('about')}}"> About</a></div>
        <div class="item"><a href="{{url('blog')}}"> Blog</a></div>
        <div class="item"><a href="{{url('gallery')}}"> Gallery</a></div>
        <div class="item"><a href="{{url('contact')}}"> Contact</a></div>
    </div>
</div>
<!-- mobile menu end  -->

<script src="{{asset('js/jquery-3.2.1.minn.js')}}"></script>
<script src="{{asset('js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('js/slick.js')}}"></script>
<script src="{{asset('js/slick-animation.min.js')}}"></script>
<script src="{{asset('js/font-awesom.js')}}"></script>
<script src="{{asset('js/typed.min.js')}}" integrity="sha512-BdHyGtczsUoFcEma+MfXc71KJLv/cd+sUsUaYYf2mXpfG/PtBjNXsPo78+rxWjscxUYN2Qr2+DbeGGiJx81ifg==" crossorigin="anonymous"></script>
<script src="https://unpkg.com/alpinejs@3.10.3/dist/cdn.min.js"></script>
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js" integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew==" crossorigin=""></script>
<script type="text/javascript" src="{{asset('js/nepal-province.js')}}"></script>
<script type="text/javascript" src="{{asset('js/all-districts.js')}}"></script>
<script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js" integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew==" crossorigin=""></script>
<script src="{{asset('js/main.js')}}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>

</body>

</html><!-- Add this to your HTML file -->
