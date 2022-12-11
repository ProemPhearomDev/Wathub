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
                                <h3 class="page-title">កែប្រែព័ត៌មានរបស់គណៈកម្មការវត្ត</h3>
                            </div>
                        </div>
                    </div>
                    <!-- /Page Header -->
                    <form action="{{ route('comission.update', $comission->id) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $comission->id }}">
                        <input type="hidden" name="old_image" value="{{ $comission->old_image }}">

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group mb-4">
                                    <div class="text-center border-0 mt-4 px-2 w-25 mx-auto">
                                        <img src="{{ !empty($comission->comission_image) ? url($comission->comission_image) : url('upload/no_image.jpg') }}"
                                            id="frame" class="card-img-top shadow-1 rounded-2" alt="...">
                                        <label class="btn btn-outline-success rounded-1 py-1  mx-auto mt-2"
                                            style="cursor: pointer;"> Upload
                                            <input type="file" size="60" style="display: none"
                                                name="comission_image" id="formFile" onchange="preview()">
                                        </label>
                                        @error('comission_image')
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
                                            value="{{ $comission->name }}" placeholder="បញ្ចូលឈ្មោះ">

                                        @error('name')
                                            <div class="form-error text-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror

                                    </div>
                                    <div class="form-group">
                                        <label>ភេទ</label>
                                        <select class="form-control select" id="gender" name="gender">
                                            <option selected="" disabled="" value="" disabled>ជ្រើសរើសភេទ
                                            </option>
                                            <option value="ប្រុស" {{ $comission->gender == 'ប្រុស' ? 'selected' : '' }}>
                                                ប្រុស
                                            </option>
                                            <option value="ស្រី" {{ $comission->gender == 'ស្រី' ? 'selected' : '' }}>ស្រី
                                            </option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>ថ្ងៃ-ខែ-ឆ្នាំកំណើត</label>
                                        <input type="date" class="form-control" id="dob" name="dob"
                                            value="{{ $comission->dob }}">
                                        @error('dob')
                                            <div class="form-error text-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>ថ្ងៃចូលធ្វើ</label>
                                        <input type="date" class="form-control" id="date_becam_comis"
                                            name="date_becam_comis" value="{{ $comission->date_becam_comis }}">
                                    </div>
                                    {{-- <div class="form-group">
                                    <label>ថ្ងៃចេញ</label>
                                    <input type="date" class="form-control" id="date_out" name="date_out"
                                    value="{{ $comission->date_out }}">
                                </div> --}}
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="card-body rounded">
                                    <div class="form-group">
                                        <label>ទីកន្លែងកំណើត</label>
                                        <textarea class="form-control" id="address" name="address">{{ $comission->address }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>តួនាទី</label>
                                        {{-- <select class="form-control select" name="role" id="role">
                                            <option selected="" disabled="" value="" disabled>ជ្រើសរើសតួនាទី
                                            </option>
                                            <option value="កូនសេក្ខ" {{ $comission->role == 'កូនសេក្ខ' ? 'selected' : '' }}>
                                                កូនសេក្ខ</option>
                                            <option value="កូនសិស្ស" {{ $comission->role == 'កូនសិស្ស' ? 'selected' : '' }}>
                                                កូនសិស្ស</option>
                                        </select> --}}
                                        <input type="text" class="form-control" name="role" id="role"
                                            placeholder="សូមបញ្ចូលតួនាទី" value="{{ $comission->role }}">

                                    </div>
                                    <div class="form-group">
                                        <label>ស្ថានភាព<span class="text-danger">*</span></label>
                                        <select class="form-control select" name="status" id="status">
                                            <option selected="" disabled="" value="" disabled>ជ្រើសរើសតួនាទី
                                            </option>
                                            <option value="នៅធ្វើ" {{ $comission->status == 'នៅធ្វើ' ? 'selected' : '' }}>
                                                នៅធ្វើ</option>
                                            <option value="ឈប់ធ្វើ"{{ $comission->status == 'ឈប់ធ្វើ' ? 'selected' : '' }}>
                                                ឈប់ធ្វើ</option>
                                        </select>
                                        @error('status')
                                            <div class="form-error text-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>លេខទូរស័ព្ទ</label>
                                        <input type="text" class="form-control" id="phone" name="phone"
                                            value="{{ $comission->phone }}" placeholder="បញ្ចូលលេខទូរស័ព្ទ">
                                    </div>
                                    <div class="form-group">
                                        <label>ផ្សេងៗ</label>
                                        <textarea cols="30" rows="5" class="form-control" id="note" name="note">{{ $comission->note }}</textarea>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="submit-section">
                            <a href="{{ route('all.comission') }}" class="btn btn-danger submit-btn mb-4">ថយក្រោយ</a>
                            <button type="submit" class="btn btn-primary submit-btn mb-4">កែប្រែ</button>
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
                $("#menu_setting_all_managers").addClass('active open');
            })
        </script>
    @endsection
