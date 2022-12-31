@extends('Frontend-Layout.main_master')
@section('content')
    <!-- Page Wrapper -->
    <div class="page-wrapper">
        <div class="content container-fluid">

            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">តារាងគ្រប់គ្រងបច្ច័យដែលញាតិញោមបានប្រគេនវត្ត </h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">ទំព័រដើម</a></li>
                            <li class="breadcrumb-item active">ចំណូល</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="mb-2">
                        <a href="{{ route('income.create') }}" class="btn btn-md btn-success mb-2"><i class="fe fe-plus">
                                បញ្ចូលបច្ច័យ</i></a>
                    </div>
                    <div class="card card-body rounded">
                        <div class="table-responsive">
                            {{-- <div class="title">Brands View</div> --}}
                            <table id="example" class="table table-hover table-center mb-0 table-striped table-bordered "
                                style="width:100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>ឈ្មោះ</th>
                                        <th>ភេទ</th>
                                        <th>អាសយដ្ឋាន</th>
                                        <th>ថ្ងៃចូលបច្ច័យ</th>
                                        <th>ប្រាក់ខ្មែរ(៛)</th>
                                        <th>ប្រាក់ដុល្លា($)</th>
                                        {{-- <th>លេខទូរស័ព្ទ</th> --}}
                                        <th>ផ្សេងៗ</th>
                                        <th>សកម្មភាព</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($incomes as $income)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $income->name }}</td>
                                            <td>{{ $income->gender }}</td>
                                            <td>{{ $income->address }}</td>
                                            <td>
                                                {{ \Carbon\Carbon::parse($income['date_income'])->format('d-m-Y') }}
                                            </td>
                                            @if ($income->amount_riels != null)
                                                <td>{{ $income->amount_riels }} ៛</td>
                                            @else
                                                <td>៛0.00</td>
                                            @endif

                                            @if ($income->amount_usd != null)
                                                <td>{{ $income->amount_usd }} $</td>
                                            @else
                                                <td>$0.00</td>
                                            @endif
                                            <td>{{ $income->note }}</td>
                                            <td class="text-right">
                                                <a href="{{ route('income.edit', $income->id) }}"
                                                    class="btn btn-primary btn-sm mb-1">
                                                    <i class="fe fe-edit"></i>
                                                </a>
                                                <a href="{{ route('income.delete', $income->id) }}" type="submit"
                                                    class="btn btn-danger btn-sm mb-1" id="delete">
                                                    <i class="fe fe-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        {{-- @php
                                            $total_riel;
                                            $total_usd;
                                            $total_riel += $income['amount_riels'];
                                            $total_usd += $income['amount_usd'];
                                        @endphp --}}
                                    @endforeach
                                </tbody>
                                <?php
                                // $totalusd = $income->amount_usd +=  $income->amount_usd 
                                ?>
                                <?php
                                // $totalriel = $income->amount_riels +=  $income->amount_riels 
                                ?>
                                <tfoot>
                                    <tr>
                                        <th colspan="5"></th>
                                        {{-- <th></th> --}}
                                        <th>សរុប={{ $income_khtotal }}៛</th>
                                        <th>សរុប={{ $income_usdtotal }}$</th>
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
