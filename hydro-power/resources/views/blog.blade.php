@extends('home-layout')
@section('page_title','Blog')
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

<section class="relative bg-gray-200">
    <div class="mx-auto max-w-7xl lg:px-0 md:px-8 px-5">
        <div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 lg:gap-8 gap-4">

        @foreach($data as $company)
            <div class="col-span-1">
                <div class=" bg-white mb-md-4 mb-3 relative">
                    <div class="news_img">
                        <img src="{{asset('uploads/blogdetails/'.$company->image)}}" class="img-fluid w-full">
                    </div>
                    <div class="blog_date">
                        <h5><strong>{{$company['date']}}</strong> <span>{{$company['month']}}</span></h5>
                    </div>
                    <div class="news_content flex justify-center flex-col">
                        <div class="my-3">
                            <h4>{{$company['title']}}</h4>
                        </div>

                        <div class="readmore-line">
                            <a href="ViewBlogDetails/{{$company->id}}" class="site-button-link" data-hover="Read More">Read More <i class="fa fa-angle-right arrow-animation" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>

            </div>
            @endforeach


        </div>
    </div>
</section>

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