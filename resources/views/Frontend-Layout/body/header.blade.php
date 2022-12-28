<!-- Header -->
<div class="header" >

    <!-- Logo -->
    <div class="header-left">
        <a href="{{ url('/dashboard') }}" class="logo">
            <img src="{{ asset('Frontend/assets/img/logo.png') }}" alt="Logo">
        </a>
        <a href="{{ url('/dashboard') }}" class="logo logo-small">
            <img src="{{ asset('Frontend/assets/img/logo-small.png') }}" alt="Logo" width="30" height="30">
        </a>
        
    </div>
    <!-- /Logo -->

    <a href="javascript:void(0);" id="toggle_btn">
        <i class="fe fe-text-align-left"></i>
    </a>

    {{-- <div class="top-nav-search">
        <form>
            <input type="text" class="form-control" placeholder="Search here">
            <button class="btn" type="submit"><i class="fa fa-search"></i></button>
        </form>
    </div> --}}
    <div class="top-nav-search">
        <div id="MyClockDisplay" class="clock" onload="showTime()"></div>
       {{-- <div><a style="text-decoration:none;" href="https://www.zeitverschiebung.net/en/timezone/asia--phnom_penh"></a> <iframe src="https://www.zeitverschiebung.net/clock-widget-iframe-v2?language=en&size=small&timezone=Asia%2FPhnom_Penh&show=hour_minute" frameborder="0" seamless></iframe> </div> --}}
    </div>

    <!-- Mobile Menu Toggle -->
    <a class="mobile_btn" id="mobile_btn">
        <i class="fa fa-bars"></i>
    </a>
    <!-- /Mobile Menu Toggle -->

    <!-- Header Right Menu -->
    <ul class="nav user-menu">

        <!-- App Lists -->
        {{-- <li class="nav-item dropdown app-dropdown">
            <a class="nav-link dropdown-toggle" aria-expanded="false" role="button" data-toggle="dropdown"
                href="#"><i class="fe fe-app-menu"></i></a>
            <ul class="dropdown-menu app-dropdown-menu">
                <li>
                    <div class="app-list">
                        <div class="row">
                            <div class="col"><a class="app-item" href="#"><i
                                        class="fa fa-envelope"></i><span>Email</span></a></div>
                            <div class="col"><a class="app-item" href="#"><i
                                        class="fa fa-calendar"></i><span>Calendar</span></a></div>
                            <div class="col"><a class="app-item" href="#"><i
                                        class="fa fa-comments"></i><span>Chat</span></a></div>
                        </div>
                    </div>
                </li>
            </ul>
        </li> --}}
        <!-- /App Lists -->

        <!-- Notifications -->
        {{-- <li class="nav-item dropdown noti-dropdown">
            <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                <i class="fe fe-bell"></i> <span class="badge badge-pill">3</span>
            </a>
            <div class="dropdown-menu notifications">
                <div class="topnav-dropdown-header">
                    <span class="notification-title">Notifications</span>
                    <a href="javascript:void(0)" class="clear-noti"> Clear All </a>
                </div>
                <div class="noti-content">
                    <ul class="notification-list">
                        <li class="notification-message">
                            <a href="#">
                                <div class="media">
                                    <span class="avatar avatar-sm">
                                        <img class="avatar-img rounded-circle" alt="User Image"
                                            src="{{ asset('Frontend/assets/img/profiles/avatar-02.jpg') }}">
                                    </span>
                                    <div class="media-body">
                                        <p class="noti-details"><span class="noti-title">Carlson Tech</span> has
                                            approved <span class="noti-title">your estimate</span></p>
                                        <p class="noti-time"><span class="notification-time">4 mins ago</span>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="notification-message">
                            <a href="#">
                                <div class="media">
                                    <span class="avatar avatar-sm">
                                        <img class="avatar-img rounded-circle" alt="User Image"
                                            src="{{ asset('Frontend/assets/img/profiles/avatar-11.jpg') }}">
                                    </span>
                                    <div class="media-body">
                                        <p class="noti-details"><span class="noti-title">International
                                                Software Inc</span> has sent you a invoice in the amount of
                                            <span class="noti-title">$218</span>
                                        </p>
                                        <p class="noti-time"><span class="notification-time">6 mins ago</span>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="notification-message">
                            <a href="#">
                                <div class="media">
                                    <span class="avatar avatar-sm">
                                        <img class="avatar-img rounded-circle" alt="User Image"
                                            src="{{ asset('Frontend/assets/img/profiles/avatar-17.jpg') }}">
                                    </span>
                                    <div class="media-body">
                                        <p class="noti-details"><span class="noti-title">John Hendry</span>
                                            sent a cancellation request <span class="noti-title">Apple iPhone
                                                XR</span></p>
                                        <p class="noti-time"><span class="notification-time">8 mins ago</span>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="notification-message">
                            <a href="#">
                                <div class="media">
                                    <span class="avatar avatar-sm">
                                        <img class="avatar-img rounded-circle" alt="User Image"
                                            src="{{ asset('Frontend/assets/img/profiles/avatar-13.jpg') }}">
                                    </span>
                                    <div class="media-body">
                                        <p class="noti-details"><span class="noti-title">Mercury Software
                                                Inc</span> added a new product <span class="noti-title">Apple
                                                MacBook Pro</span></p>
                                        <p class="noti-time"><span class="notification-time">12 mins
                                                ago</span></p>
                                    </div>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="topnav-dropdown-footer">
                    <a href="#">View all Notifications</a>
                </div>
            </div>
        </li> --}}
        <!-- /Notifications -->
        @php
            $id = Auth::user()->id;
            $user = App\Models\User::find($id);
        @endphp
        <!-- User Menu -->
        <li class="nav-item dropdown has-arrow ">
            <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                <span class="user-img"><img class="rounded-circle"
                        src="{{ !empty($user->profile_photo_path)
                            ? url('upload/user_img/' . $user->profile_photo_path)
                            : url('upload/no_image.jpg') }}"
                        width="31" alt=""></span>
            </a>
            <div class="dropdown-menu shadow-lg">
                <div class="user-header">
                    <div class="avatar avatar-sm">
                        <img src="{{ !empty($user->profile_photo_path)
                            ? url('upload/user_img/' . $user->profile_photo_path)
                            : url('upload/no_image.jpg') }}"
                            alt="User Image" class="avatar-img rounded-circle">
                    </div>
                    <div class="user-text">
                        <h6>{{ $user->name }}</h6>
                        <p class="text-muted mb-0">Administrator</p>
                    </div>
                </div>
                <a class="dropdown-item" href="{{ route('user.profile') }}">My Profile</a>
                {{-- <a class="dropdown-item" href="#">Account Settings</a> --}}
                <a class="dropdown-item" href="{{ route('user.logout') }}">Logout</a>
            </div>
        </li>
        <!-- /User Menu -->
    </ul>
    <!-- /Header Right Menu -->

</div>
<!-- /Header -->
{{-- script time --}}
<script>
    function showTime() {
        var date = new Date();
        var h = date.getHours(); // 0 - 23
        var m = date.getMinutes(); // 0 - 59
        var s = date.getSeconds(); // 0 - 59
        var session = "AM";

        if (h == 0) {
            h = 12;
        }

        if (h > 12) {
            h = h - 12;
            session = "PM";
        }

        h = (h < 10) ? "0" + h : h;
        m = (m < 10) ? "0" + m : m;
        s = (s < 10) ? "0" + s : s;

        var time = h + ":" + m + ":" + s + " " + session;
        document.getElementById("MyClockDisplay").innerText = time;
        document.getElementById("MyClockDisplay").textContent = time;

        setTimeout(showTime, 1000);

    }

    showTime();
</script>
<style>
.clock {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translateX(-50%) translateY(-50%);
    color: #fdfdfd;
    font-size: 30px;
    font-family: Orbitron;
    letter-spacing: 5px;
}
</style>