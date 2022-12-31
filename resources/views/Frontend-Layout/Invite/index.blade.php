@extends('Frontend-Layout.main_master')
@section('content')
    <!-- Page Wrapper -->
    <div class="page-wrapper">
        <div class="content container-fluid">

            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">បញ្ជីការនិមន្ត </h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">ទំព័រដើម</a></li>
                            <li class="breadcrumb-item active">ការនិមន្ត</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="mb-2">
                        <a href="{{ route('invite.create') }}" class="btn btn-md btn-success mb-2"><i class="fe fe-plus"> បង្កើតការនិមន្ត</i></a>
                    </div>
                    <div class="card card-body rounded">
                        <div class="table-responsive">
                            {{-- <div class="title">Brands View</div> --}}
                            <table id="example" class="table table-hover table-center mb-0 table-striped table-bordered display nowrap"
                                style="width:100%">
                                <thead>
                                    <tr>
                                        <th>ល.រ</th>
                                        <th>កម្មវីធីបុណ្យ </th>
                                        <th>ឈ្មោះអ្នកនិមន្ត</th>
                                        <th>ព្រះសង្ឃ</th>
                                        <th>ថ្ងៃ​ ទី</th>
                                        <th>ទីកន្លែង</th>
                                        <th>ភូមិ</th>
                                        <th>ផ្សេងៗ</th>
                                        <th>សកម្មភាព</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($invites as $invite)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $invite->bun_name }}</td>
                                            <td>{{ $invite->person_name }}</td>
                                            <td>- {{ $invite->monk_name }}</td>
                                            {{-- <td>{{ $invite->rmonk->name }}</td> --}}
                                            <td>{{ \Carbon\Carbon::parse( $invite['date'] )->format('d-m-Y')}}</td>
                                            <td>{{ $invite->address }}</td>
                                            <td>{{ $invite->rvillage->name }}</td>
                                            <td>{{ $invite->note }}</td>
                                            <td class="text-right" >
                                                <a href="{{ route('invite.edit', $invite->id) }}" class="btn btn-primary btn-sm mb-1">
                                                    <i class="fe fe-edit"></i>
                                                </a>
                                                <a href="{{ route('invite.delete', $invite->id) }}" type="submit" class="btn btn-danger btn-sm mb-1" id="delete">
                                                    <i class="fe fe-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                                {{-- <tfoot>
                                    <tr>
                                        <th>Name</th>
                                        <th>Position</th>
                                        <th>Office</th>
                                        <th>Age</th>
                                        <th>Start date</th>
                                        <th>Salary</th>
                                    </tr>
                                </tfoot> --}}
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
                $("#menu_setting_all_invite").addClass('active open');
            })
        </script>
    @endsection
