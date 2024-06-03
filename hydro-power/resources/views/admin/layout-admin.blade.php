<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="apple-touch-icon" sizes="76x76" href="{{asset('admin_assets/img/apple-icon.png')}}">
  <link rel="icon" type="image/png" href="{{asset('admin_assets/img/favicon.png')}}')}}">
  <title>@yield('page_title')</title>
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <link href="{{asset('admin_assets/css/nucleo-icons.css')}}" rel="stylesheet" />
  <link href="{{asset('admin_assets/css/custom.css')}}" rel="stylesheet" />
  <link href="{{asset('admin_assets/css/nucleo-svg.css')}}" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <link id="pagestyle" href="{{asset('admin_assets/css/material-dashboard.css')}}?v=3.1.0" rel="stylesheet" />
  <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>

 
</head>

<body class="g-sidenav-show  bg-gray-200">
  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/material-dashboard/pages/dashboard " target="_blank">
        <img src="{{asset('admin_assets/img/logo-ct.png')}}" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold text-white">Hydropower Project</span>
      </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link text-white active" href="{{url('admin/dashboard')}}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">dashboard</i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="{{url('admin/company')}}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">table_view</i>
            </div>
            <span class="nav-link-text ms-1">Business/Enterprises  <br> Involved</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="{{url('admin/inter_finance')}}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">receipt_long</i>
            </div>
            <span class="nav-link-text ms-1">Financiers Involved</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="{{url('admin/project')}}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">view_in_ar</i>
            </div>
            <span class="nav-link-text ms-1">Project Items</span>
          </a>
        </li>

        <li class="nav-item mt-3 border-top p-2">
          <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Hydropower Pages</h6>
        </li>

        <li class="nav-item">
          <a class="nav-link text-white " href="{{url('admin/about')}}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">notifications</i>
            </div>
            <span class="nav-link-text ms-1">About</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="{{url('admin/blog')}}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">person</i>
            </div>
            <span class="nav-link-text ms-1">Blog</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link text-white " href="{{url('admin/gallery')}}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">format_textdirection_r_to_l</i>
            </div>
            <span class="nav-link-text ms-1">Gallery</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link text-white " href="{{url('admin/contact')}}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">assignment</i>
            </div>
            <span class="nav-link-text ms-1">Contact</span>
          </a>
        </li>
    <li class="nav-item border-top p-2">
          <a class="nav-link text-white bg-green-600" href="{{url('admin/updatepsd')}}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10">settings</i>
            </div>
            <span class="nav-link-text ms-1">Update Password</span>
          </a>
        </li>
        
        <li class="nav-item border-top p-2">
          <a class="nav-link text-white bg-gradient-primary" href="logout">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10">login</i>
            </div>
            <span class="nav-link-text ms-1">Log Out</span>
          </a>
        </li>
      </ul>
    </div>

  </aside>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">@yield('page_title')</li>
          </ol>
          <h6 class="font-weight-bolder mb-0">@yield('page_title')</h6>
        </nav>
        @section('content') @show
      </div>
    </nav>
    <!-- End Navbar -->


    @section('container') @show
 
  </main>
 



  <script src="{{asset('admin_assets/js/core/popper.min.js')}}"></script>
  <script src="{{asset('admin_assets/js/core/bootstrap.min.js')}}"></script>
  <script src="{{asset('admin_assets/js/plugins/perfect-scrollbar.min.js')}}"></script>
  <script src="{{asset('admin_assets/js/plugins/smooth-scrollbar.min.js')}}"></script>
  <script src="{{asset('admin_assets/js/plugins/chartjs.min.js')}}"></script>
<script src="{{asset('admin_assets/js/main.js')}}"></script>
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <script src="{{asset('admin_assets/js/material-dashboard.min.js?v=3.1.0')}}"></script>
    <!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
    <script>
    // Initialize CKEditor
    CKEDITOR.replace('description');
    CKEDITOR.replace('summary');
    CKEDITOR.replace('impacts');
    CKEDITOR.replace('relevant_link');
    CKEDITOR.replace('advocacy_org');
    CKEDITOR.replace('rights');
    CKEDITOR.replace('advocacies_undertaken');
    CKEDITOR.replace('government_actors');
</script>
<script>
    let uniqueImageId = 0; // Initialize a counter for unique image IDs

    function previewImage(input, previewId) {
        const preview = document.getElementById(previewId);
        preview.innerHTML = ''; // Clear previous preview

        if (input.files && input.files[0]) {
            const reader = new FileReader();

            reader.onload = function (e) {
                const imgWrapper = createImageWrapper(e.target.result, input, 0);
                preview.appendChild(imgWrapper);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

    function previewImages(input, previewId) {
        const preview = document.getElementById(previewId);
        const existingImages = preview.getElementsByClassName('image-wrapper');

        // Clear previous preview
        preview.innerHTML = '';

        if (input.files) {
            for (let i = 0; i < input.files.length; i++) {
                const reader = new FileReader();

                reader.onload = function (e) {
                    const imgWrapper = createImageWrappers(e.target.result, input, uniqueImageId++);
                    preview.appendChild(imgWrapper);
                };

                reader.readAsDataURL(input.files[i]);
            }
        }

        // Add back existing images
        for (let i = 0; i < existingImages.length; i++) {
            preview.appendChild(existingImages[i].cloneNode(true));
        }
    }

    function createImageWrappers(src, input, imageId) {
        const imgWrapper = document.createElement('div');
        imgWrapper.setAttribute('class', 'image-wrapper');
        imgWrapper.setAttribute('data-image-id', imageId);

        const img = document.createElement('img');
        img.setAttribute('src', src);
        img.setAttribute('class', 'img-thumbnail');
        imgWrapper.appendChild(img);


        return imgWrapper;
    }

    function createImageWrapper(src, input, imageId) {
        const imgWrapper = document.createElement('div');
        imgWrapper.setAttribute('class', 'image-wrapper');
        imgWrapper.setAttribute('data-image-id', imageId);

        const img = document.createElement('img');
        img.setAttribute('src', src);
        img.setAttribute('class', 'img-thumbnail');
        imgWrapper.appendChild(img);

        const removeIcon = document.createElement('span');
        removeIcon.setAttribute('class', 'remove-icon');
        removeIcon.innerHTML = '&#10060;';
        removeIcon.addEventListener('click', function () {
            imgWrapper.remove();
            clearInput(input, imageId);
        });
        imgWrapper.appendChild(removeIcon);

        return imgWrapper;
    }

    function clearInput(input, imageId) {
    // Clear the specific file input value
    input.value = '';

    // Remove the corresponding image preview
    const imagesPreview = document.getElementById('imagesPreview');
    const imageWrappers = imagesPreview.getElementsByClassName('image-wrapper');

    for (let i = 0; i < imageWrappers.length; i++) {
        if (imageWrappers[i].dataset.imageId == imageId) {
            imageWrappers[i].remove();
            break; // Stop searching after removing the corresponding image
        }
    }
}

$(document).ready(function () {
           $('.remove-image-btn').on('click', function () {
               var imageId = $(this).data('image-id');
               var imageContainer = $(this).closest('.image-container'); // Capture the image container reference

               // Update the URL to match your route
               var url = '/remove-image/' + imageId;
               console.log('AJAX URL:', url);

               $.ajax({
                   url: url,
                   type: 'DELETE',
                   headers: {
                       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                   },
                   success: function () {
                       // Remove the image container from the DOM
                       imageContainer.remove();

                       // Optional: Show a success message or perform any other UI updates
                       console.log('Image removed successfully!');
                   },
                   error: function (error) {
                       console.log(error);
                   }
               });
           });
       });


    
 
   </script>


</body>

</html>