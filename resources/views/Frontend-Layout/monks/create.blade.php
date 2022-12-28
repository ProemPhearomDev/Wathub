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
                        <h3 class="page-title">បញ្ចូលព័ត៌មានរបស់ព្រះសង្ឃស្នាក់នៅក្នុងវត្ត</h3>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->
            <form action="{{ route('monk.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group mb-4">
                                <div class="text-center border-0 mt-4 px-2 w-25 mx-auto">
                                    <img src="{{ !empty($monk->monk_image)
                                        ? url('upload/monks_img/' . $monk->monk_image)
                                        : url('upload/no_image.jpg') }}"
                                        id="frame" class="card-img-top shadow-1 rounded-2" alt="...">
                                    <label class="btn btn-outline-success rounded-1 py-1  mx-auto mt-2"
                                        style="cursor: pointer;"> Upload
                                        <input type="file" size="60" style="display: none" name="monk_image"
                                            id="formFile" onchange="preview()">
                                    </label>
                                    @error('monk_image')
                                        <div class="form-error text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="card-body rounded">
                                <div class="form-group">
                                    <label>ឈ្មោះ <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        value="{{ old('name') }}" placeholder="បញ្ចូលឈ្មោះ">

                                    @error('name')
                                        <div class="form-error text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>
                                <div class="form-group">
                                    <label>ថ្ងៃ-ខែ-ឆ្នាំកំណើត</label>
                                    <input type="date" class="form-control" id="dob" name="dob"
                                        value="{{ old('dob') }}">
                                </div>
                                @error('dob')
                                        <div class="form-error text-danger">
                                            {{ $message }}
                                        </div>
                                @enderror
                                {{-- <div class="form-group">
                                    <label>ភេទ</label>
                                    <select class="form-control select">
                                        <option>បព្វជិត</option>
                                        <option>United Kingdom</option>
                                    </select>
                                </div> --}}
                                <div class="form-group">
                                    <label>ថ្ងៃចូល</label>
                                    <input type="date" class="form-control" id="date_in" name="date_in"
                                        value="{{ old('date_in') }}">
                                </div>
                                <div class="form-group">
                                    <label>ថ្ងៃចេញ</label>
                                    <input type="date" class="form-control" id="date_out" name="date_out"
                                        value="{{ old('date_out') }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="card-body rounded">
                                <div class="form-group">
                                    <label>អាយុ</label>
                                    <input type="text" class="form-control" id="old" name="old"
                                        value="{{ old('old') }}"  placeholder="បញ្ចូលអាយុ">
                                </div>
                                <div class="form-group">
                                    <label>ទីកន្លែងកំណើត</label>
                                    <textarea class="form-control" id="address" name="address"
                                        value="{{ old('address') }}" placeholder="សូមបញ្ចូលទីកន្លែងកំណើត"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>តួនាទី<span class="text-danger">*</span></label>
                                    <select class="form-control select" name="role" id="role">
                                        <option selected value="">ជ្រើសរើសតួនាទី</option>
                                        <option>ភិក្ខុ</option>
                                        <option>សាមណេរ</option>
                                    </select>
                                    @error('role')
                                    <div class="form-error text-danger">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>លេខទូរស័ព្ទ</label>
                                    <input type="text" class="form-control" id="phone" name="phone"
                                        value="{{ old('phone') }}"  placeholder="បញ្ចូលលេខទូរស័ព្ទ">
                                </div>
                                <div class="form-group">
                                    <label>ផ្សេងៗ</label>
                                    <textarea class="form-control" id="note" name="note"
                                        value="{{ old('note') }}"></textarea>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="submit-section pb-2">
                        <a href="{{ route('all.monk') }}"  class="btn btn-danger submit-btn mb-4">ថយក្រោយ</a>
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
