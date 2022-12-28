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
                                <h3 class="page-title">កែប្រែការចំណាយ</h3>
                            </div>
                        </div>
                    </div>
                    <!-- /Page Header -->
                    <form class="shadow-sm" action="{{ route('expense.update', $expense->id) }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col">

                                <div class="card-body rounded shadow-1">
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label>ចំណាយលើ <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="expense_name"
                                                    name="expense_name" value="{{ $expense->expense_name }}"
                                                    placeholder="បញ្ចូលបច្ច័យដែលចំណាយ">
                                                @error('expense_name')
                                                    <div class="form-error text-danger">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>ថ្ងៃចំណាយប្រាក់</label>
                                        <input type="date" class="form-control" id="date_expense" name="date_expense"
                                            value="{{ $expense->date_expense }}">
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">៛</span>
                                        <input type="text" class="form-control" name="amounts_kh"
                                            value="{{ $expense->amounts_kh }}">
                                        <span class="input-group-text">.00</span>
                                    </div>
                                    <label class="input-group" for="">ចំនួនប្រាក់</label>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">$</span>
                                        <input type="text" class="form-control" name="amounts_usd"
                                            value="{{ $expense->amounts_usd }}">
                                        <span class="input-group-text">.00</span>
                                    </div>
                                    <div class="form-group">
                                        <label>បរិយាយផ្សេងៗ</label>
                                        <textarea rows="4" class="form-control" id="note" name="note">{{ $expense->note }}</textarea>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="submit-section pb-2">
                            <a href="{{ route('all.expense') }}" class="btn btn-danger submit-btn mb-4">ថយក្រោយ</a>
                            <button type="submit" class="btn btn-primary submit-btn mb-4">រក្សាទុក</button>
                        </div>
                </div>
                </form>
            </div>
        </div>

        <!-- /Page Wrapper -->
        <script>
            $(document).ready(function() {
                $("#sidebar-menu").removeClass('active');
                $("#sidebar-menu ul li").removeClass('active');
                $("#menu_setting_money").addClass('active open');
            })
        </script>
    @endsection
