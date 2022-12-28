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
                                <h3 class="page-title">កែប្រែការនិមន្ត</h3>
                            </div>
                        </div>
                    </div>
                    <!-- /Page Header -->
                    <form action="{{ route('invite.update', $invite->id) }}" method="post" enctype="multipart/form-data">
                        {{-- <input type="hidden" name="id" value="{{ $invite->id }}"> --}}
                        @csrf
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="card-body rounded">
                                    <div class="form-group">
                                        <label>កម្មវីធីបុណ្យ <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="bun_name" name="bun_name"
                                            value="{{ $invite->bun_name }}" placeholder="បញ្ចូលឈ្មោះកម្មវីធីបុណ្យ">
                                    </div>
                                    <div class="form-group">
                                        <label>ឈ្មោះអ្នកនិមន្ត <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="person_name" name="person_name"
                                        value="{{ $invite->person_name }}" placeholder="ឈ្មោះអ្នកនិមន្ត">

                                    </div>
                                    <div class="form-group">
                                        <label>ថ្ងៃទី</label>
                                        <input type="date" class="form-control" id="date" name="date"
                                        value="{{ $invite->date }}">
                                    </div>

                                    {{-- <div class="form-group">
                                        <label>ព្រះសង្ឃ</label>
                                        <select class="form-control form-select" name="monk_id"  id="monk_id" multiple='' onchange="console.log(Array.from(this.selectedOptions).map(x=>x.value??x.text))" multiselect-hide-x="true">
                                            <option value="">ជ្រើសរើសព្រះសង្ឃ</option>
                                            @foreach ($monks as $monk)
                                                <option value="{{ $monk->id }}">{{ $monk->name }}</option>
                                            @endforeach
                                        </select>
                                    
                                    </div> --}}
                                    <div class="form-group">
                                        <label>ព្រះសង្ឃ</label>
                                        <textarea cols="20" class="form-control" rows="4" id="monk_name" name="monk_name"
                                        >{{ $invite->monk_name }}</textarea>
                                        @error('person_name')
                                            <div class="form-error text-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="card-body rounded">
                                    <div class="form-group">
                                        <label>ទីកន្លែងបុណ្យ</label>
                                        <input type="text" class="form-control" id="address" name="address"
                                        value="{{ $invite->address }}">
                                    </div>
                                    <div class="form-group">
                                        <label>ភូមិ</label>
                                        <select class="form-control form-select" name="village_id">
                                            @foreach ($villages as $village)
                                                <option value="{{ $village->id }}">{{ $village->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>ផ្សេងៗ</label>
                                        <textarea class="form-control" id="note" name="note" value="{{ $invite->note }}"></textarea>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="submit-section pb-2">
                            <a href="{{ route('all.invite') }}" class="btn btn-danger submit-btn mb-4">ថយក្រោយ</a>
                            <button type="submit" class="btn btn-primary submit-btn mb-4">រក្សាទុក</button>
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
                $("#menu_setting_all_invite").addClass('active open');
            })
        </script>
    @endsection
