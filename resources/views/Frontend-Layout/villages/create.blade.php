@extends('Frontend-Layout.main_master')
@section('content')
    <!-- Page Wrapper -->
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="row">
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
                        <h3 class="page-title">បញ្ចូលភូមិ</h3>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->
            <form action="{{ route('village.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                        <div class="col">
                        
                            <div class="card-body rounded">
                                <div class="form-group">
                                    <label>ឈ្មោះភូមិ <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        value="{{ old('name') }}" placeholder="បញ្ចូលឈ្មោះភូមិ">

                                    @error('name')
                                        <div class="form-error text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>
                                <div class="form-group">
                                    <label>បរិយាយផ្សេងៗ</label>
                                    <textarea cols="80" class="form-control" rows="10" id="note" name="note"
                                        value="{{ old('note') }}"></textarea>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="submit-section pb-2">
                        <a href="{{ route('all.village') }}"  class="btn btn-danger submit-btn mb-4">ថយក្រោយ</a>
                        <button type="submit" class="btn btn-primary submit-btn mb-4">បញ្ចូល</button>
                    </div>
            </div>
        </div>
    </div>
    </form>
    <!-- /Page Wrapper -->
    <script>
        $(document).ready(function() {
            $("#sidebar-menu").removeClass('active');
            $("#sidebar-menu ul li").removeClass('active');
            $("#menu_setting_monk").addClass('active open');
            $("#setting_collapse_monk").addClass('collapse in')
            // $("#menu_manage_monk").addClass('active')
        })
    </script>
@endsection
