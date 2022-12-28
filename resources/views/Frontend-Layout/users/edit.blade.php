@extends('Frontend-Layout.main_master')
@section('content')
    <!-- Page Wrapper -->
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="row shadow">
                <div class="col-md-8 offset-md-2">
                    {{-- <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">ព័ត៌មានរបស់ព្រះសង្ឃស្នាក់នៅក្នុងវត្ត </h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Monks</li>
                        </ul>
                    </div>
                </div>
            </div> --}}
                    <!-- Page Header -->
                    <div class="page-header">
                        <div class="row">
                            <div class="col-sm-12">
                                <h3 class="page-title text-center">បច្ចុប្បន្នភាពអ្នកប្រើប្រាស់</h3>
                            </div>
                        </div>
                    </div>
                    <!-- /Page Header -->
                    <form class="register-form outer-top-xs " method="POST" action="{{ route('user.update', $user->id) }}"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $user->id }}">

                        <div class="form-group">
                            <input type="text" class="form-control unicase-form-control text-input"
                                value="{{ $user->name }}" id="name" name="name" placeholder="Name">
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control unicase-form-control text-input"
                                value="{{ $user->email }}" id="email" name="email" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control unicase-form-control text-input"
                                value="{{ $user->phone }}" id="phone" name="phone" placeholder="Phone">
                        </div>
                        {{-- <div class="form-group">
                            <input type="password" class="form-control unicase-form-control text-input"
                                id="password" name="password" placeholder="Password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control unicase-form-control text-input"
                                id="password_confirmation" name="password_confirmation" placeholder="Password Confirmation">
                            @error('password_confirmation')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div> --}}
                        <div class="form-group">
                            <div class="text-center border-0 mt-4 px-2 w-25 mx-auto ">
                                <img src="{{ !empty($user->profile_photo_path)
                                    ? url('upload/user_img/' . $user->profile_photo_path)
                                    : url('upload/no_image.jpg') }}"
                                    id="frame" class="card-img-top shadow-1 rounded-circle" alt="...">
                                <label class="btn btn-outline-success rounded-1 py-1  mx-auto mt-2"
                                    style="cursor: pointer;"> Upload
                                    <input type="file" size="60" style="display: none" name="profile_photo_path"
                                        id="formFile" onchange="preview()">
                                </label>
                            </div>
                        </div>

                        <div class="submit-section pb-2">
                            <a href="{{ route('all.user') }}" class="btn btn-danger submit-btn mb-4">ថយក្រោយ</a>
                            <button type="submit" class="btn btn-primary submit-btn mb-4">រក្សាទុក</button>
                        </div>
                    </form>
                    <!-- /Form -->
                </div>

            </div>
        </div>

        <!-- /Page Wrapper -->
        <script>
            $(document).ready(function() {
                $("#sidebar-menu").removeClass('active');
                // $("#menu_setting_dashboard li").removeClass('active');
                $("#menu_setting_all_user").addClass('active');
            })
        </script>
    @endsection
