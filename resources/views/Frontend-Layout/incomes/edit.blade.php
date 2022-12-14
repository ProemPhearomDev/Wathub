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
                                <h3 class="page-title">កែប្រែព័ត៌មានរបស់កូនសេក្ខឬកូនសិស្សស្នាក់នៅក្នុងវត្ត</h3>
                            </div>
                        </div>
                    </div>
                    <!-- /Page Header -->
                    <form action="{{ route('income.update', $income->id) }}" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{ $income->id }}">
                        <div class="row">
                            <div class="col">

                                <div class="card-body rounded">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>ឈ្មោះអ្នកប្រគេនបច្ច័យ <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="name" name="name"
                                                    value="{{ $income->name }}" placeholder="បញ្ចូលឈ្មោះអ្នកប្រគេនបច្ច័យ">
                                                @error('name')
                                                    <div class="form-error text-danger">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>ភេទ <span class="text-danger">*</span></label>
                                                <select class="form-control select" id="gender" name="gender">
                                                    <option selected="" disabled="" value="" disabled>ជ្រើសរើសភេទ </option>
                                                    <option value="ប្រុស" {{ $income->gender == 'ប្រុស' ? 'selected' : '' }} >ប្រុស</option>
                                                    <option value="ស្រី"
                                                    {{ $income->gender == 'ស្រី' ? 'selected' : '' }}>ស្រី</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>អាសយដ្ឋាន</label>
                                        <input type="text" class="form-control" id="address" name="address"
                                            value="{{ $income->address }}" placeholder="បញ្ចូលអាសយដ្ឋាន">
                                    </div>
                                    <div class="form-group">
                                        <label>ថ្ងៃចូលបច្ច័យ</label>
                                        <input type="date" class="form-control" id="date_income" name="date_income"
                                            value="{{ $income->date_income}}">
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>ប្រាក់ខ្មែរ</label>
                                                <input type="text" class="form-control" id="amount_riels"
                                                    name="amount_riels" value="{{ $income->amount_riels }}" placeholder="រៀល">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>ប្រាក់ដុល្លា</label>
                                                <input type="text" class="form-control" id="amount_usd" name="amount_usd"
                                                    value="{{ $income->amount_usd }}" placeholder="$">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>បរិយាយផ្សេងៗ</label>
                                        <textarea rows="4" class="form-control" id="note" name="note" value="{{ $income->note }}"></textarea>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="submit-section">
                            <a href="{{ route('all.income') }}" class="btn btn-danger submit-btn mb-4">ថយក្រោយ</a>
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
                $("#menu_setting_money").addClass('active open');
            })
        </script>
    @endsection
