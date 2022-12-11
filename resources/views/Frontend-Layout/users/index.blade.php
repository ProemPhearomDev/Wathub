@extends('Frontend-Layout.main_master')
@section('content')
    <!-- Page Wrapper -->
    <div class="page-wrapper">
        <div class="content container-fluid">

            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">អ្នកប្រើប្រាស់</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Users</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">

                    <div class="card card-table">
                        <div class="card-header">

                            <div class="row">

                                <div class="col-md-6">
                                    <h4 class="card-title">បញ្ចីអ្នកប្រើប្រាស់</h4>
                                </div>
                                <div class="col-md-6">
                                    <div class="col-sm-5 float-right">
                                        <div class="input-group">
                                            <input type="text" name="search" id="search" class="form-control"
                                                placeholder="Type here to search" aria-label="Recipient's username"
                                                aria-describedby="basic-addon2">
                                            <button type="button" class="btn btn-primary">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">

                            <div class="table-responsive">

                                <table class="table table-hover table-center mb-0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Images</th>
                                            <th>Name</th>
                                            <th>Email </th>
                                            <th>Mobile</th>
                                            <th>Created at</th>
                                            <th class="text-right">Action</th>
                                        </tr>
                                    </thead>

                                    <!--result select all-->
                                    <tbody class="alldata">

                                        @foreach ($users as $user)
                                            <tr>
                                                <td>{{ ++$i }}</td>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        <a href="#" class="avatar avatar-sm mr-2"><img
                                                                class="avatar-img rounded-circle"
                                                                src="{{ !empty($user->profile_photo_path)
                                                                    ? url('upload/user_img/' . $user->profile_photo_path)
                                                                    : url('upload/no_image.jpg') }}"
                                                                alt="User Image"></a>
                                                        {{-- <a href="#">Justin Lee <span>#0001</span></a> --}}
                                                    </h2>
                                                </td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->phone }}</td>
                                                <td>{{ \Carbon\Carbon::parse($user['created_at'])->format('j \\ F Y') }}
                                                </td>
                                                <td class="text-right">
                                                    <div class="actions">
                                                        {{-- <a class="btn btn-sm bg-success-light mr-2" data-toggle="modal" href="#edit_personal_details">
                                                            <i class="fe fe-pencil"></i> Edit
                                                        </a> --}}
                                                        <!-- Delete -->
                                                        <a href="{{ route('user.delete', $user->id) }}"
                                                            class="btn btn-sm bg-danger-light" id="delete">
                                                            <i class="fe fe-trash"></i> Delete
                                                        </a>
                                                        <!-- Delete -->
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <!--Search result-->
                                    <tbody id="Content" class="searchdata">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            {{ $users->links('vendor.pagination.custom') }}
        </div>
    </div>
    <!-- /Page Wrapper -->
    <!--Start Script Ajax for search-->
    <script type="text/javascript">
        $('#search').on('keyup', function() {
            $value = $(this).val();

            if ($value) {
                $('.alldata').hide();
                $('.searchdata').show();
            } else {
                $('.alldata').show();
                $('.searchdata').hide();
            }

            $.ajax({
                type: 'get',
                url: '{{ URL::to('/search/user') }}',
                data: {
                    'search': $value
                },

                success: function(data) {
                    console.log(data);
                    $('#Content').empty().html(data);
                }
                // alert($value);
            });
        })
    </script>
    <!--End Script Ajax for search-->
    <script>
        $(document).ready(function() {
            $("#sidebar-menu").removeClass('active');
            // $("#menu_setting_dashboard li").removeClass('active');
            $("#menu_setting_all_user").addClass('active');
        })
    </script>
    </script>
@endsection
