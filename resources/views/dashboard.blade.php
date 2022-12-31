@extends('Frontend-Layout.main_master')
@section('content')
    <!-- Page Wrapper -->
    <div class="page-wrapper">

        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title">Welcome <strong>{{ Auth::user()->name }}</strong>!</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item active">ទំព័រដើម</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <div class="row">
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card">
                        <a href="{{ route('all.monk') }}">
                            <div class="card-body">
                                <div class="dash-widget-header">
                                    <span class="dash-widget-icon bg-info">
                                        <i class="fe fe-users"></i>
                                    </span>
                                    {{-- <div class="dash-count">
                                <i class="fa fa-arrow-up text-success"></i> 17%
                            </div> --}}
                                </div>
                                <div class="dash-widget-info">
                                    <h3>{{ $monk_counts }}</h3>
                                    <h6 class="text-muted">ព្រះសង្ឃសរុប</h6>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card">
                        <a href="{{ route('all.stayer') }}">
                            <div class="card-body">
                                <div class="dash-widget-header">
                                    <span class="dash-widget-icon bg-primary">
                                        <i class="fe fe-users"></i>
                                    </span>
                                    {{-- <div class="dash-count">
                                <i class="fa fa-arrow-up text-success"></i> 17%
                            </div> --}}
                                </div>
                                <div class="dash-widget-info">
                                    <h3>{{ $stayer_count }}</h3>
                                    <h6 class="text-muted">ឧបាសក/ឧបាសិកាស្នាក់នៅសរុប</h6>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card">
                        <a href="{{ route('all.student') }}">
                            <div class="card-body">
                                <div class="dash-widget-header">
                                    <span class="dash-widget-icon bg-primary">
                                        <i class="fe fe-users"></i>
                                    </span>
                                    {{-- <div class="dash-count">
                                <i class="fa fa-arrow-up text-success"></i> 17%
                            </div> --}}
                                </div>
                                <div class="dash-widget-info">
                                    <h3>{{ $student_count }}</h3>
                                    <h6 class="text-muted">កូនសេក្ខ/កូនសិស្សសរុប</h6>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card">
                        <a href="{{ route('all.comission') }}">
                            <div class="card-body">
                                <div class="dash-widget-header">
                                    <span class="dash-widget-icon bg-success">
                                        <i class="fe fe-users"></i>
                                    </span>
                                    {{-- <div class="dash-count">
                                <i class="fa fa-arrow-up text-success"></i> 17%
                            </div> --}}
                                </div>
                                <div class="dash-widget-info">
                                    <h3>{{ $commision_count }}</h3>
                                    <h6 class="text-muted">គណៈកម្មការវត្តសរុបទាំងអស់</h6>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card">
                        <a href="{{ route('all.invite') }}">
                            <div class="card-body">
                                <div class="dash-widget-header">
                                    <span class="dash-widget-icon bg-success">
                                        <i class="fe fe-bookmark"></i>
                                    </span>
                                    {{-- <div class="dash-count">
                                <i class="fa fa-arrow-up text-success"></i> 17%
                            </div> --}}
                                </div>
                                <div class="dash-widget-info">
                                    <h3>{{ $invite_count }}</h3>
                                    <h6 class="text-muted">
                                    ការនិមន្តបុណ្យសរុបទាំងអស់</h6>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card">
                        <a href="{{ route('all.user') }}">
                            <div class="card-body">
                                <div class="dash-widget-header">
                                    <span class="dash-widget-icon bg-dark">
                                        <i class="fe fe-user-plus"></i>
                                    </span>
                                    {{-- <div class="dash-count">
                                <i class="fa fa-arrow-up text-success"></i> 17%
                            </div> --}}
                                </div>
                                <div class="dash-widget-info">
                                    <h3>{{ $user_count }}</h3>
                                    <h6 class="text-muted">
                                    អ្នកប្រើប្រាស់សរុបទាំងអស់</h6>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card">
                        <a href="{{ route('all.income') }}">
                            <div class="card-body">
                                <div class="dash-widget-header">
                                    <span class="dash-widget-icon bg-success">
                                        {{-- <i class="fa fa-usd"></i> --}}
                                        ៛
                                    </span>
                                    {{-- <div class="dash-count">
                                <i class="fa fa-arrow-up text-success"></i> 17%
                            </div> --}}
                                </div>
                                <div class="dash-widget-info">
                                    <h3>{{ $income_khtotal }} ៛</h3>
                                    <h6 class="text-muted">
                                    ចំណូលចំនួនលុយខ្មែរសរុប</h6>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card">
                        <a href="{{ route('all.income') }}">
                            <div class="card-body">
                                <div class="dash-widget-header">
                                    <span class="dash-widget-icon bg-success">
                                        <i class="fa fa-usd"></i>
                                    </span>
                                    {{-- <div class="dash-count">
                                <i class="fa fa-arrow-up text-success"></i> 17%
                            </div> --}}
                                </div>
                                <div class="dash-widget-info">
                                    <h3>{{ $income_usdtotal }} $</h3>
                                    <h6 class="text-muted">
                                        ចំណូលចំនួនលុយដុល្លាសរុប</h6>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            
                
                {{-- <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="dash-widget-header">
                                <span class="dash-widget-icon bg-warning">
                                    <i class="fe fe-folder"></i>
                                </span>
                                <div class="dash-count">
                                    <i class="fa fa-arrow-up text-success"></i> 17%
                                </div>
                            </div>
                            <div class="dash-widget-info">
                                <h3>$62523</h3>
                                <h6 class="text-muted">Revenue</h6>
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-warning w-50"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>

            {{-- <div class="row">
            <div class="col-md-12 col-lg-6">

                <!-- Sales Chart -->
                <div class="card card-chart">
                    <div class="card-header">
                        <h4 class="card-title">Sales Overview</h4>
                    </div>
                    <div class="card-body">
                        <div id="morrisArea"></div>
                    </div>
                </div>
                <!-- /Sales Chart -->

            </div>
            <div class="col-md-12 col-lg-6">

                <!-- Invoice Chart -->
                <div class="card card-chart">
                    <div class="card-header">
                        <h4 class="card-title">Order Status</h4>
                    </div>
                    <div class="card-body">
                        <div id="morrisLine"></div>
                    </div>
                </div>
                <!-- /Invoice Chart -->

            </div>
        </div> --}}

            {{-- <div class="row">
            <div class="col-md-6 d-flex">

                <!-- Recent Orders -->
                <div class="card card-table flex-fill">
                    <div class="card-header">
                        <h4 class="card-title">Recent Orders</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-center">
                                <thead>
                                    <tr>
                                        <th>Item</th>
                                        <th>Date</th>
                                        <th class="text-center">Quantity</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-right">Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-nowrap">
                                            <div class="font-weight-600">Apple Watch Series 4</div>
                                        </td>
                                        <td class="text-nowrap">19 Jan 2019</td>
                                        <td class="text-center">5</td>
                                        <td class="text-center">
                                            <span class="badge badge-pill bg-success inv-badge">Completed</span>
                                        </td>
                                        <td class="text-right">
                                            <div class="font-weight-600">$487</div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-nowrap">
                                            <div class="font-weight-600">Apple iPhone XR</div>
                                        </td>
                                        <td class="text-nowrap">20 Jan 2019</td>
                                        <td class="text-center">2</td>
                                        <td class="text-center">
                                            <span class="badge badge-pill bg-success inv-badge">Completed</span>
                                        </td>
                                        <td class="text-right">
                                            <div class="font-weight-600">$255</div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-nowrap">
                                            <div class="font-weight-600">Dell XPS 9370</div>
                                        </td>
                                        <td class="text-nowrap">21 Jan 2019</td>
                                        <td class="text-center">1</td>
                                        <td class="text-center">
                                            <span class="badge badge-pill bg-warning inv-badge">Pending</span>
                                        </td>
                                        <td class="text-right">
                                            <div class="font-weight-600">$799</div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-nowrap">
                                            <div class="font-weight-600">Cisco WS-C2960X-48FPS-L</div>
                                        </td>
                                        <td class="text-nowrap">22 Jan 2019</td>
                                        <td class="text-center">1</td>
                                        <td class="text-center">
                                            <span class="badge badge-pill bg-success inv-badge">Completed</span>
                                        </td>
                                        <td class="text-right">
                                            <div class="font-weight-600">$970</div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-nowrap">
                                            <div class="font-weight-600">Apple MacBook Pro</div>
                                        </td>
                                        <td class="text-nowrap">23 Jan 2019</td>
                                        <td class="text-center">1</td>
                                        <td class="text-center">
                                            <span class="badge badge-pill bg-danger inv-badge">Cancel</span>
                                        </td>
                                        <td class="text-right">
                                            <div class="font-weight-600">$400</div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /Recent Orders -->

            </div>
            <div class="col-md-6 d-flex">

                <!-- Feed Activity -->
                <div class="card flex-fill">
                    <div class="card-header">
                        <h4 class="card-title">Feed Activity</h4>
                    </div>
                    <div class="card-body">
                        <ul class="activity-feed">
                            <li class="feed-item">
                                <div class="feed-date">Apr 13</div>
                                <span class="feed-text"><a href="#">John Doe</a> added new product <a
                                        href="#">"Smart Watch"</a></span>
                            </li>
                            <li class="feed-item">
                                <div class="feed-date">Mar 21</div>
                                <span class="feed-text"><a href="#">Justin Lee</a> requested amount of
                                    <a href="#">$5,781</a></span>
                            </li>
                            <li class="feed-item">
                                <div class="feed-date">Feb 2</div>
                                <span class="feed-text">New user registered <a href="#">"Mary
                                        Wiley"</a></span>
                            </li>
                            <li class="feed-item">
                                <div class="feed-date">Jan 27</div>
                                <span class="feed-text"><a href="#">Robert Martin</a> gave a review for
                                    <a href="#">"Dell Laptop"</a></span>
                            </li>
                            <li class="feed-item">
                                <div class="feed-date">Jan 14</div>
                                <span class="feed-text">New customer registered <a href="#">"Tori
                                        Carter"</a></span>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- /Feed Activity -->

            </div>
        </div> --}}
        </div>
    </div>
    <!-- /Page Wrapper -->
    <script>
        $(document).ready(function() {
            $("#sidebar-menu").removeClass('active');
            // $("#menu_setting_dashboard li").removeClass('active');
            $("#menu_setting_dashboard").addClass('active open');
        })
    </script>
@endsection
