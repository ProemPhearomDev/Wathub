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
                                <h3 class="page-title text-center">បង្កើតអ្នកប្រើប្រាស់</h3>
                            </div>
                        </div>
                    </div>
                    <!-- /Page Header -->
                    <form class="register-form outer-top-xs " method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group">
                            <input type="text" class="form-control unicase-form-control text-input"
                                id="name" name="name" placeholder="Name">
                            @error('name')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control unicase-form-control text-input"
                                id="email" name="email" placeholder="Email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control unicase-form-control text-input"
                                id="phone" name="phone" placeholder="Phone">
                        </div>
                        <div class="form-group">
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