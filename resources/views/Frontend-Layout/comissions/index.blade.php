@extends('Frontend-Layout.main_master')
@section('content')
    <!-- Page Wrapper -->
    <div class="page-wrapper">
        <div class="content container-fluid">

            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">តារាងព័ត៌មានរបស់គណៈកម្មការវត្ត </h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">ទំព័រដើម</a></li>
                            <li class="breadcrumb-item active">គណៈកម្មការ</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="mb-2">
                        <a href="{{ route('comission.create') }}" class="btn btn-md btn-success mb-2"><i class="fe fe-plus"> បញ្ចូលព័ត៌មានគណៈកម្មការ</i></a>
                    </div>
                    <div class="card card-body rounded">
                        <div class="table-responsive">
                            {{-- <div class="title">Brands View</div> --}}
                            <table id="example" class="table table-hover table-center mb-0 table-striped table-bordered "
                                style="width:100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>រូបភាព</th>
                                        <th>ឈ្មោះ</th>
                                        <th>ភេទ</th>
                                        <th>ថ្ងៃ-ខែ-ឆ្នាំកំណើត</th>
                                        <th>ថ្ងៃចូលធ្វើ</th>
                                        <th>អាសយដ្ឋាន</th>
                                        <th>តួនាទី</th>
                                        <th>លេខទូរស័ព្ទ</th>
                                        <th>ស្ថានភាព</th>
                                        <th>ផ្សេងៗ</th>
                                        <th>សកម្មភាព</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($comissions as $comission)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>
                                                <img src="{{ asset($comission->comission_image) }}" alt="" style="width: 50px; height: 50px;">
                                            </td>
                                            <td>{{ $comission->name }}</td>
                                            <td>{{ $comission->gender }}</td>
                                            <td>{{ \Carbon\Carbon::parse( $comission['dob'] )->format('j \\ F Y') }}</td>
                                            <td>{{ \Carbon\Carbon::parse( $comission['date_becam_comis'] )->format('d-m-Y')}}</td>
                                            <td>{{ $comission->rvillage->name }}</td>
                                            <td>{{ $comission->role }}</td>
                                            <td>{{ $comission->phone }}</td>
                                            <td>
                                                @if ($comission->status == 1)
                                                <span class="badge badge-pill bg-success inv-badge">នៅធ្វើ</span>
                                                @else
                                                <span class="badge badge-pill bg-danger inv-badge">ឈប់ធ្វើ</span>
                                                @endif
                                            </td>
                                            <td>{{ $comission->note }}</td>
                                            <td class="text-right" >
                                                @if ($comission->status == 1)
                                                <a href="{{ route('comission.active', $comission->id) }}"  class="btn btn-sm btn-oval btn-success mx-2"  title="Inactive Now"><i class="fa fa-eye"></i></a> 
                                                @else
                                                <a href="{{ route('comission.inactive', $comission->id) }}"  class="btn btn-sm btn-oval btn-danger mx-2" title="Active Now"><i class="fa fa-eye-slash"></i></a> 
                                                @endif
                                                <a href="{{ route('comission.edit', $comission->id) }}" class="btn btn-primary btn-sm mb-1">
                                                    <i class="fe fe-edit"></i>
                                                </a>
                                                <a href="{{ route('comission.delete', $comission->id) }}" type="submit" class="btn btn-danger btn-sm mb-1" id="delete">
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
                $("#menu_setting_all_managers").addClass('active open');
            })
        </script>
    @endsection
