<a id="button"></a>
<footer class="flex flex-col space-y-10 justify-center py-12 bg-black">

    <nav class="footer_link flex justify-center flex-wrap lg:gap-6 gap-4 text-gray-500">
        <a class="text-gray-300" href="#">Home</a>
        <a class="text-gray-300" href="#">About</a>
        <a class="text-gray-300" href="#">Blog</a>

        <a class="text-gray-300" href="#">Gallery</a>
        <a class="text-gray-300" href="#">Contact</a>
    </nav>

    <div class="flex justify-center space-x-5">
        <a href="https://facebook.com" target="_blank" rel="noopener noreferrer">
            <img class="icons_footer" src="https://img.icons8.com/fluent/30/000000/facebook-new.png" />
        </a>

        <a href="https://instagram.com" target="_blank" rel="noopener noreferrer">
            <img class="icons_footer" src="https://img.icons8.com/fluent/30/000000/instagram-new.png" />
        </a>
        <a href="https://messenger.com" target="_blank" rel="noopener noreferrer">
            <img class="icons_footer" src="https://img.icons8.com/fluent/30/000000/facebook-messenger--v2.png" />
        </a>
        <a href="https://twitter.com" target="_blank" rel="noopener noreferrer">
            <img class="icons_footer" src="https://img.icons8.com/fluent/30/000000/twitter.png" />
        </a>
    </div>

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
        <div class="item"><a href="contact.php"> Home</a></div>
        <div class="item">
            <a class="sub-btn">
                Product
                <i class="fa fa-angle-right dropdown"></i></a>
            <div class="sub-menu">
                <a href="" class="sub-item">Product overview </a>
                <a href="" class="sub-item">Integrations </a>
                <a href="" class="sub-item">Security</a>
                <a href="" class="sub-item">Observable Plot</a>
                <a href="" class="sub-item">Customer stories</a>
                <a href="" class="sub-item">Release notes</a>
                <a class="py-3 px-5 uppercase font-bold text-sm" href="">Try Observable</a>
            </div>
        </div>
        <div class="item">
            <a class="sub-btn">
                Resources
                <i class="fa fa-angle-right dropdown"></i></a>
            <div class="sub-menu">
                <a href="" class="sub-item">Tutorials </a>
                <a href="" class="sub-item">Explore </a>
                <a href="" class="sub-item">Community </a>
                <a href="" class="sub-item">Documentation </a>
                <a href="" class="sub-item">Blog </a>
            </div>
        </div>
        <div class="item"><a href=""> Enterprise</a></div>
        <div class="item"><a href=""> Pricing</a></div>
    </div>
</div>
<!-- mobile menu end  -->

<script src="{{asset('admin_assets/js/jquery-3.2.1.minn.js')}}"></script>
<script src="{{asset('admin_assets/js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('admin_assets/js/slick.js')}}"></script>
<script src="{{asset('admin_assets/js/slick-animation.min.js')}}"></script>
<script src="{{asset('admin_assets/js/font-awesom.js')}} "></script>
<script src="{{asset('admin_assets/js/typed.min.js')}}" integrity="sha512-BdHyGtczsUoFcEma+MfXc71KJLv/cd+sUsUaYYf2mXpfG/PtBjNXsPo78+rxWjscxUYN2Qr2+DbeGGiJx81ifg==" crossorigin="anonymous"></script>
<script src="https://unpkg.com/alpinejs@3.10.3/dist/cdn.min.js"></script>
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js" integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew==" crossorigin=""></script>
<script type="text/javascript" src="{{asset('admin_assets/js/nepal-province.js')}}"></script>
<script type="text/javascript" src="{{asset('admin_assets/js/all-districts.js')}}"></script>
<script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js" integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew==" crossorigin=""></script>
<script src="{{asset('admin_assets/js/main.js')}}"></script>
</body>

</html>