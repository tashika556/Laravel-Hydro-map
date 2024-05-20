@extends('admin.layout-admin')
@section('page_title', 'Update Password')

@section('container')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 col-12">
                <div class="bg-white p-4">
                    <form action="{{ route('admin.update.password') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-4">
    <label for="current_password">Current Password</label>
    <div class="input-group">
        <input id="current_password" type="password" class="form-control" name="current_password" required>
        <div class="input-group-append">
            <span class="input-group-text" onclick="togglePasswordVisibility('current_password')">
                <i class="fas fa-eye" id="current_password_toggle"></i>
            </span>
        </div>
    </div>
</div>


                        <div class="form-group mb-4">
                            <label for="new_password">New Password</label>
                            <div class="input-group">
                            <input id="new_password" type="password" class="form-control" name="new_password" required>
                            <div class="input-group-append">
            <span class="input-group-text" onclick="togglePasswordVisibility('new_password')">
                <i class="fas fa-eye" id="new_password_toggle"></i>
            </span>
        </div>
        </div>
    </div>

                        <div class="form-group">
                            <input type="submit" class="btn btn-danger" value="Update Password">
                        </div>

                        @if(Session::has('success'))
                            <button class="btn btn-success">{{ Session::get('success') }}</button>
                        @endif

                        @if(Session::has('error'))
                            <button class="btn btn-danger">{{ Session::get('error') }}</button>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
