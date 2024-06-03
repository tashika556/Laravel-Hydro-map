@extends('home-layout')
@section('page_title','Nepal Hydropower')
@section('container')

<div id="map" class="relative leaflet-container leaflet-fade-anim leaflet-grab leaflet-touch-drag" tabindex="0" style="outline: none;"></div>
<div class="geo-btn">
    <button onclick="toggleGeologicalLayer()"><img src ="{{asset('images/geological.png')}}"></button>
    <button onclick="toggleSatelliteLayer()"><img src ="{{asset('images/satellite.png')}}"></button>

</div>




<!-- Add this input element to your HTML for search -->
<div class="search_btn relative">
<input type="search" name="search" id="search_text" class="search-input rounded-md" placeholder="Search...">

    <button type="submit" class="btn-submit"><i class="fa fa-search"></i></button>


<!-- Add this button to your HTML for displaying search results -->

<div id="suggestion-list" class="suggestion-list"></div>

</div>

<!-- Include your map container here -->


<!-- filter start  -->
<div class="filter_wrap-div">
    <button id="closeFilter"><i class="far fa-window-close"></i></button>
    <button id="showFilter" style="display: none;"><img src="https://beta.kathmandulivinglabs.org/demos/hydropower/css/img/layers.png" alt=""></button>
</div>
<!-- Add the following HTML for checkboxes -->
<div class="filter_wrap">
    <div class="company_block collapsed" id="business-container">
        <h5 class="font-semibold mb-2 flex items-center justify-between cursor-pointer" onclick="toggleSection('business-container', 'business-section')"> 
            <span><i class="fas fa-building mr-1" aria-hidden="true"></i> Business/Enterprises Involved</span>
            <i class="fas fa-chevron-down"></i>
        </h5>
        <div id="business-section" class="hidden">
            @foreach($data as $product)
                <div class="flex items-center py-3">
                    <input type="checkbox" class="company-checkbox input_width border-gray-300 rounded" value="{{ $product->id }}" />
                    <div class="flex flex-col">
                        <h6 class="text-gray-700 font-medium leading-none flex items-center">
                            <span class="mx-1">{{$product->company_name}}</span>
                        </h6>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="international_div collapsed" id="finance-container">
        <h5 class="font-semibold mb-2 flex items-center justify-between cursor-pointer" onclick="toggleSection('finance-container', 'finance-section')"> 
            <span class="flex items-center">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSl0XarROZzuUkPwHHjTJNTmabVws-ueQ4J4-TNACawmKAGiRoEIeVC6PllF0SS4Bo-jOE&usqp=CAU" alt="" class="mr-1">
                Financiers Involved
            </span>
            <i class="fas fa-chevron-down"></i>
        </h5>
        <div id="finance-section" class="hidden">
            @foreach($finances as $product)
                <div class="flex items-center py-3">
                    <input type="checkbox" class="finance-checkbox input_width border-gray-300 rounded" value="{{ $product->id }}" />
                    <div class="flex flex-col">
                        <h6 class="text-gray-700 font-medium leading-none flex items-center">
                            <span class="mx-1"></span> {{$product->fin_name}}
                        </h6>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>



<div id="sidebar" style="width: 0; background-color: white;  transition: 0.5s;">

</div>@endsection

