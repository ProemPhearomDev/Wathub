 @extends('Frontend-Layout.main_master')
 @section('content')
     <!-- Page Wrapper -->
     <div class="page-wrapper">
         <div class="content container-fluid">

             <!-- Page Header -->
             <div class="page-header">
                 <div class="row">
                     <div class="col">
                         <h3 class="page-title">Profile</h3>
                         <ul class="breadcrumb">
                             <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">ទំព័រដើម</a></li>
                             <li class="breadcrumb-item active">Profile</li>
                         </ul>
                     </div>
                 </div>
             </div>
             <!-- /Page Header -->

             <div class="row">
                 <div class="col-md-12">
                     <div class="profile-header">
                         <div class="row align-items-center">
                             <div class="col-auto profile-image">
                                 <a href="#">
                                     <img class="rounded-circle" alt="User Image"
                                         src="{{ !empty($user->profile_photo_path)
                                             ? url('upload/user_img/' . $user->profile_photo_path)
                                             : url('upload/no_image.jpg') }}">
                                 </a>
                             </div>
                             <div class="col ml-md-n2 profile-user-info">
                                 <h3 class="user-name mb-0">{{ Auth::user()->name }}</h3>
                                 <h6 class="text-muted">You are Administrator ! </h6>
                                 {{-- <div class="user-Location"><i class="fa fa-map-marker"></i> Florida, United States</div>
                            <div class="about-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</div> --}}
                             </div>
                             {{-- <div class="col-auto profile-btn">
                            <a href="" class="btn btn-primary">
                                Message
                            </a>
                            <a href="" class="btn btn-primary">
                                Edit
                            </a>
                        </div> --}}
                         </div>
                     </div>
                     <div class="profile-menu">
                         <ul class="nav nav-tabs nav-tabs-solid">
                             <li class="nav-item">
                                 <a class="nav-link active" data-toggle="tab" href="#per_details_tab">About</a>
                             </li>
                             <li class="nav-item">
                                 <a class="nav-link" data-toggle="tab" href="#password_tab">Password</a>
                             </li>
                         </ul>
                     </div>
                     <div class="tab-content profile-tab-cont">

                         <!-- Personal Details Tab -->
                         <div class="tab-pane fade show active" id="per_details_tab">

                             <!-- Personal Details -->
                             <div class="row">
                                 <div class="col-lg-9">
                                     <div class="card">
                                         <div class="card-body">
                                             <h5 class="card-title d-flex justify-content-between">
                                                 <span>Personal Details</span>
                                                 <a class="edit-link" data-toggle="modal" href="#edit_personal_details"><i
                                                         class="fa fa-edit mr-1"></i>Edit</a>
                                             </h5>
                                             <div class="row">
                                                 <p class="col-sm-3 text-muted text-sm-right mb-0 mb-sm-3">Name</p>
                                                 <p class="col-sm-9">{{ $user->name }}</p>
                                             </div>
                                             <div class="row">
                                                 <p class="col-sm-3 text-muted text-sm-right mb-0 mb-sm-3">Email ID</p>
                                                 <p class="col-sm-9">{{ $user->email }}</p>
                                             </div>
                                             <div class="row">
                                                 <p class="col-sm-3 text-muted text-sm-right mb-0 mb-sm-3">Mobile</p>
                                                 <p class="col-sm-9">{{ $user->phone }}</p>
                                             </div>

                                         </div>
                                     </div>

                                     <!-- Edit Details Modal -->
                                     <div class="modal fade" id="edit_personal_details" aria-hidden="true" role="dialog">
                                         <div class="modal-dialog modal-dialog-centered" role="document">
                                             <div class="modal-content">
                                                 <div class="modal-header">
                                                     <h5 class="modal-title">Personal Details</h5>
                                                     <button type="button" class="close" data-dismiss="modal"
                                                         aria-label="Close">
                                                         <span aria-hidden="true">&times;</span>
                                                     </button>
                                                 </div>
                                                 <div class="modal-body">
                                                     <form action="{{ route('user.profile.store') }}" method="post"
                                                         enctype="multipart/form-data">
                                                         @csrf
                                                         <div class="row form-row">
                                                             <div class="col-12">
                                                                 <div class="form-group">
                                                                     <label>Name</label>
                                                                     <input type="text" class="form-control"
                                                                         name="name" value="{{ $user->name }}">
                                                                 </div>
                                                             </div>
                                                             <div class="col-12">
                                                                 <div class="form-group">
                                                                     <label>Email ID</label>
                                                                     <input type="email" class="form-control"
                                                                         name="email" value="{{ $user->email }}">
                                                                 </div>
                                                             </div>
                                                             <div class="col-12">
                                                                 <div class="form-group">
                                                                     <label>Mobile</label>
                                                                     <input type="text" class="form-control"
                                                                         name="phone" value="{{ $user->phone }}">
                                                                 </div>
                                                             </div>
                                                             <div class="col-12">
                                                                 <div class="form-group">
                                                                     {{-- <label>Image</label>
                                                                     <input type="file" class="form-control"
                                                                         name="profile_photo_path" value=""> --}}
                                                                     <div class="text-center border-0 mt-4 px-2 w-25 mx-auto ">
                                                                             <img src="{{ !empty($user->profile_photo_path)
                                                                                 ? url('upload/user_img/' . $user->profile_photo_path)
                                                                                 : url('upload/no_image.jpg') }}"
                                                                                 id="frame"
                                                                                 class="card-img-top shadow-1 rounded-circle"
                                                                                 alt="...">
                                                                             <label
                                                                                 class="btn btn-outline-success rounded-1 py-1  mx-auto mt-2"
                                                                                 style="cursor: pointer;"> Upload
                                                                                 <input type="file" size="60"
                                                                                     style="display: none"
                                                                                     name="profile_photo_path"
                                                                                     id="formFile" onchange="preview()">
                                                                             </label>
                                                                     </div>
                                                                 </div>
                                                             </div>
                                                         </div>
                                                         <button type="submit" class="btn btn-primary btn-block">Save
                                                             Changes</button>
                                                     </form>
                                                 </div>
                                             </div>
                                         </div>
                                     </div>
                                     <!-- /Edit Details Modal -->

                                 </div>

                                 <div class="col-lg-3">

                                     <!-- Account Status -->
                                     {{-- <div class="card">
                                         <div class="card-body">
                                             <h5 class="card-title d-flex justify-content-between">
                                                 <span>Account Status</span>
                                                 <a class="edit-link" href="#"><i class="fa fa-edit mr-1"></i>
                                                     Edit</a>
                                             </h5>
                                             <button class="btn btn-success" type="button"><i
                                                     class="fe fe-check-verified"></i> Active</button>
                                         </div>
                                     </div> --}}
                                     <!-- /Account Status -->

                                     <!-- Skills -->
                                     {{-- <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title d-flex justify-content-between">
                                            <span>Skills </span> 
                                            <a class="edit-link" href="#"><i class="fa fa-edit mr-1"></i> Edit</a>
                                        </h5>
                                        <div class="skill-tags">
                                            <span>Html5</span>
                                            <span>CSS3</span>
                                            <span>WordPress</span>
                                            <span>Javascript</span>
                                            <span>Android</span>
                                            <span>iOS</span>
                                            <span>Angular</span>
                                            <span>PHP</span>
                                        </div>
                                    </div>
                                </div> --}}
                                     <!-- /Skills -->

                                 </div>
                             </div>
                             <!-- /Personal Details -->

                         </div>
                         <!-- /Personal Details Tab -->

                         <!-- Change Password Tab -->
                         <div id="password_tab" class="tab-pane fade">

                             <div class="card">
                                 <div class="card-body">
                                     <div class="col-md-10 col-lg-6">
                                         <h5 class="card-title">Change Password</h5>
                                         <form action="{{ route('user.password.update') }}" method="post">
                                             @csrf
                                             <div class="form-group">
                                                 <label for="" class="info-title">Current Password</label>
                                                 <input type="password" class="form-control" id="current_password"
                                                     name="old_password">
                                             </div>
                                             <div class="form-group">
                                                 <label for="" class="info-title">New Password</label>
                                                 <input type="password" class="form-control" name="password">
                                             </div>
                                             <div class="form-group">
                                                 <label for="" class="info-title">Confirm Password</label>
                                                 <input type="password" class="form-control" id="password_confirmation"
                                                     name="password_confirmation">
                                             </div>
                                             <div class="form-group">
                                                 <button type="submit" class="btn btn-info"> Update
                                                     Password</button>
                                             </div>
                                         </form>
                                     </div>
                                 </div>
                             </div>
                             <!-- /Change Password Tab -->

                         </div>
                     </div>
                 </div>

             </div>
         </div>
         <!-- /Page Wrapper -->
     @endsection
