@extends('home-layout')
@section('page_title','Blog Details')
@section('container')



<section class="banner_div text-center">
    <div class="mx-auto max-w-7xl lg:px-0 md:px-8 px-5">
        <div class="grid grid-cols-1">
            <div class="col-span-1">
                <div class="banner_div">
                    <h1 class="relative">{{$blog_details['title']}}</h1>
                </div>
            </div>
        </div>
    </div>
</section>



<section class="blog_detail-page pt-0 relative bg-gray-200">
    <div class="mx-auto max-w-7xl lg:px-0 md:px-8 px-5">
        <div class="grid lg:grid-cols-7">
            <div class="col-start-2 col-span-5">
                <div class="news_block bg-white mb-md-4 mb-3">
                    <div class="blog_detail">
                        <img src="/public//uploads/blogdetails/{{$blog_details->image}}" class="img-fluid w-full">
                    </div>

                    <div class="news_content p-md-5 p-4">
                        <div class="date_blog_detail">
                            <span> {{$blog_details['month']}} , {{$blog_details['date']}}, {{$blog_details['year']}}</span>
                        </div>
                        <div class="mb-3">
                            <h2>{{$blog_details['title']}}</h2>
                        </div>
    <p>{{$blog_details['description']}}</p>
                        <br>
                    </div>
                </div>

            </div>

        </div>
    </div>
</section>

@endsection