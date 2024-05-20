@extends('admin/layout-admin')
@section('page_title','Dashboard')
@section('container')

<div class="container-fluid py-4">
      <div class="row">
        <div class="col-lg-4 col-12 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">weekend</i>
              </div>
              <div class="text-end pt-1">
              <h4 class="mb-0 text-capitalize text-gray-500">Company</h4>
                <h4 class="mb-0">{{$companies}}</h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">

          </div>
        </div>
        <div class="col-lg-4 col-12 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">person</i>
              </div>
              <div class="text-end pt-1">
              <h4 class="mb-0 text-capitalize text-gray-500">International Financiers</h4>
                <h4 class="mb-0">{{$finances}}</h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
          </div>
        </div>
        <div class="col-lg-4 col-12 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">person</i>
              </div>
              <div class="text-end pt-1">
                <h3 class="mb-0 text-capitalize">Projects</h3>
                <h4 class="mb-0">{{$projects}}</h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">

          </div>
        </div>


 
    </div>

@endsection