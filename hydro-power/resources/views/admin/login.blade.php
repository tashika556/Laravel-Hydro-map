<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="{{asset('admin_assets/img/apple-icon.png')}}">
  <link rel="icon" type="image/png" href="{{asset('admin_assets/img/favicon.png')}}">
  <title>
  Admin Login
  </title>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->
  <link href="{{asset('admin_assets/css/nucleo-icons.css')}}" rel="stylesheet" />
  <link href="{{asset('admin_assets/css/nucleo-svg.css')}}" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js')}}" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href="{{asset('admin_assets/css/material-dashboard.css')}}?v=3.1.0" rel="stylesheet" />
  <!-- Nepcha Analytics (nepcha.com) -->
  <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
  <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
</head>

<body class="bg-gray-200">
  <div class="container position-sticky z-index-sticky top-0">
    <div class="row">

    </div>
  </div>
  <main class="main-content  mt-0">
    <div class="page-header align-items-start min-vh-100" style="background-image: url('https://images.unsplash.com/photo-1497294815431-9365093b7331?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1950&q=80');">
      <span class="mask bg-gradient-dark opacity-6"></span>
      <div class="container my-auto">
        <div class="row">
          <div class="col-lg-4 col-md-8 col-12 mx-auto">
            <div class="card z-index-0 fadeIn3 fadeInBottom">
              <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg py-1">
                  <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Sign in</h4>
                  <h4 class="text-white font-weight-bolder text-center">Hydropower Admin</h4>
                  <div class="row mt-3">
                    <div class="col-2 text-center ms-auto">
                      <a class="btn btn-link px-3" href="javascript:;">
                        <i class="fa fa-facebook text-white text-lg"></i>
                      </a>
                    </div>
                    <div class="col-2 text-center px-1">
                      <a class="btn btn-link px-3" href="javascript:;">
                        <i class="fa fa-github text-white text-lg"></i>
                      </a>
                    </div>
                    <div class="col-2 text-center me-auto">
                      <a class="btn btn-link px-3" href="javascript:;">
                        <i class="fa fa-google text-white text-lg"></i>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <form role="form" class="text-start" action="{{route('admin.auth')}}" method="POST">
                @csrf
                  <div class="input-group input-group-outline my-3">
                    <label class="form-label">Username</label>
                    <input type="text" name="user_name" class="form-control" required>
                  </div>
                  <div class="input-group input-group-outline mb-3">
                                        <label class="form-label">Password</label>
                                        <div class="input-group">
                                            <input type="password" id="password" name="password" class="form-control"
                                                required>
                                            <div class="input-group-append">
                                                <span class="input-group-text"
                                                    onclick="togglePasswordVisibility('password')">
                                                    <i class="fas fa-eye" id="password_toggle"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                  <div class="text-center">
                  <p class="text-danger"> {{session('error')}} </p>
                  <input type="submit"  class="btn bg-gradient-primary w-100 my-4 mb-2" name="submit" value="Sign In" style="cursor:pointer;">
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
   
    </div>
  </main>
  <!--   Core JS Files   -->
  <script src="{{asset('admin_assets/js/core/popper.min.js')}}"></script>
    <script src="{{asset('admin_assets/js/main.js')}}"></script>
  <script src="{{asset('admin_assets/js/core/bootstrap.min.js')}}"></script>
  <script src="{{asset('admin_assets/js/plugins/perfect-scrollbar.min.js')}}"></script>
  <script src="{{asset('admin_assets/js/plugins/smooth-scrollbar.min.js')}}"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js')}}"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{asset('admin_assets/js/material-dashboard.min.js')}}?v=3.1.0"></script>
</body>

</html>