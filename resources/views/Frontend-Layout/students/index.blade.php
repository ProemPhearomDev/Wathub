@extends('Frontend-Layout.main_master')
@section('content')
    <!-- Page Wrapper -->
    <div class="page-wrapper">
        <div class="content container-fluid">

            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">ព័ត៌មានរបស់កូនសេក្ខឬកូនសិស្សស្នាក់នៅក្នុងវត្ត </h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Student</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="mb-2">
                        <a href="{{ route('student.create') }}" class="btn btn-md btn-success mb-2"><i class="fe fe-plus"> បញ្ចូលព័ត៌មានកូនសិស្ស</i></a>
                    </div>
                    <div class="card card-body rounded">
                        <div class="table-responsive">
                            {{-- <a href="" class="btn btn-md btn-success mb-2"> បញ្ចូលព័ត៌មានព្រះសង្ឃ</a> --}}
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
                                        <th>ថ្ងៃចូល</th>
                                        {{-- <th>ថ្ងៃចេញ</th> --}}
                                        <th>អាយុ</th>
                                        <th>ទីកន្លែងកំណើត</th>
                                        <th>តួនាទី</th>
                                        <th>លេខទូរស័ព្ទ</th>
                                        <th>ស្ថានភាព</th>
                                        <th>ផ្សេងៗ</th>
                                        <th>សកម្មភាព</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($students as $student)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>
                                                <img src="{{ asset($student->student_image) }}" alt="" style="width: 50px; height: 50px;">
                                            </td>
                                            <td>{{ $student->name }}</td>
                                            <td>{{ $student->gender }}</td>
                                            <td>{{ \Carbon\Carbon::parse( $student['dob'] )->format('j \\ F Y') }}</td>
                                            <td>{{ \Carbon\Carbon::parse( $student['date_in'] )->format('d-m-Y')}}</td>
                                            {{-- <td>{{ $student->date_out }}</td> --}}
                                            <td>{{ $student->old }}</td>
                                            <td>{{ $student->address }}</td>
                                            <td>{{ $student->role }}</td>
                                            <td>{{ $student->phone }}</td>
                                            <td>
                                                @if ($student->status == "ស្នាក់នៅ")
                                                <span class="badge badge-pill bg-success inv-badge">{{ $student->status }}</span>
                                                @else
                                                <span class="badge badge-pill bg-danger inv-badge">{{ $student->status }}</span>
                                                @endif
                                            </td>
                                            <td>{{ $student->note }}</td>
                                            <td class="text-right" >
                                                <a href="{{ route('student.edit', $student->id) }}" class="btn btn-primary btn-sm mb-1">
                                                    <i class="fe fe-edit"></i>
                                                </a>
                                                <a href="{{ route('student.delete', $student->id) }}" type="submit" class="btn btn-danger btn-sm mb-1" id="delete">
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
                $("#menu_setting_monk").addClass('active open');
                $("#setting_collapse_monk").addClass('collapse in')
                // $("#menu_manage_monk").addClass('active')
            })
        </script>
    @endsection