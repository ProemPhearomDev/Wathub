@extends('Frontend-Layout.main_master')
@section('content')
    <!-- Page Wrapper -->
    <div class="page-wrapper">
        <div class="content container-fluid">

            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">តារាងគ្រប់គ្រងបច្ច័យដែលបានចំណាយ </h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">ចំណាយ</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="mb-2">
                        <a href="{{ route('expense.create') }}" class="btn btn-md btn-success mb-2"><i class="fe fe-plus">
                                បញ្ចូលការចំណាយ</i></a>
                    </div>
                    <div class="card card-body rounded">
                        <div class="table-responsive">
                            {{-- <div class="title">Brands View</div> --}}
                            <table id="example" class="table table-hover table-center mb-0 table-striped table-bordered "
                                style="width:100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>ចំណាយលើ</th>
                                        {{-- <th>អាសយដ្ឋាន</th> --}}
                                        <th>ថ្ងៃចំណាយ</th>
                                        <th>ចំនួនប្រាក់រៀល</th>
                                        <th>ចំនួនប្រាក់ដុល្លា</th>
                                        {{-- <th>លេខទូរស័ព្ទ</th> --}}
                                        <th>ផ្សេងៗ</th>
                                        <th>សកម្មភាព</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($expenses as $expense)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $expense->expense_name }}</td>
                                            {{-- <td>{{ $expense->address }}</td> --}}
                                            <td>
                                                {{ \Carbon\Carbon::parse($expense['date_expense'])->format('d-m-Y') }}
                                            </td>
                                            @if ($expense->amounts_kh != null)
                                                <td>៛{{ $expense->amounts_kh }} </td>
                                            @else
                                                <td>៛0.00</td>
                                            @endif
                                            @if ($expense->amounts_usd != null)
                                                <td>${{ $expense->amounts_usd }} </td>
                                            @else
                                                <td>$0.00</td>
                                            @endif

                                            {{-- @if ($expense->amount_usd != null)
                                                <td>{{ $expense->amount_usd }} $</td>
                                            @else
                                                <td>0.00$</td>
                                            @endif --}}
                                            <td>{{ $expense->note }}</td>
                                            <td class="text-right">
                                                <a href="{{ route('expense.edit', $expense->id) }}"
                                                    class="btn btn-primary btn-sm mb-1">
                                                    <i class="fe fe-edit"></i>
                                                </a>
                                                <a href="{{ route('expense.delete', $expense->id) }}" type="submit"
                                                    class="btn btn-danger btn-sm mb-1" id="delete">
                                                    <i class="fe fe-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        {{-- @php
                                            $total_riel;
                                            $total_usd;
                                            $total_riel += $expense['amount_riels'];
                                            $total_usd += $expense['amount_usd'];
                                        @endphp --}}
                                    @endforeach
                                </tbody>

                                <tfoot>
                                    <tr>
                                        <th colspan="3"></th>
                                        {{-- <th></th> --}}
                                        <th>សរុប={{ $expense_khtotal }}៛</th>
                                        <th>សរុប={{ $expense_usdtotal }}$</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>

                {{-- <div id="delete_monk" class="modal" role="dialog">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content modal-md">
                            <div class="modal-header">
                                <h4 class="modal-title">Delete Employee</h4>
                            </div>
                            <form>
                                <div class="modal-body">
                                    <p>Are you sure want to delete this?</p>
                                    <div class="m-t-20"> <a href="#" class="btn btn-white" data-dismiss="modal">Close</a>
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div> --}}
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
