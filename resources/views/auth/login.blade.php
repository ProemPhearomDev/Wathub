<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>WatHub System Managerment</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('Frontend/assets/img/favicon.png') }}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('Frontend/assets/css/bootstrap.min.css') }}">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{ asset('Frontend/assets/css/font-awesome.min.css') }}">

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('Frontend/assets/css/style.css') }}">

    <!--[if lt IE 9]>
   <script src="assets/js/html5shiv.min.js"></script>
   <script src="assets/js/respond.min.js"></script>
  <![endif]-->
</head>

<body>

    <!-- Main Wrapper -->
    <div class="main-wrapper login-body">
        <div class="login-wrapper">
            <div class="container">
                <div class="loginbox">
                    <div class="login-left">
                        <img class="img-fluid" src="{{ asset('Frontend/assets/img/logo.png') }}" alt="Logo">
                    </div>
                    <div class="login-right">
                        <div class="login-right-wrap">
                            <h1>Login</h1>
                            <p class="account-subtitle">Access to our System</p>
                            {{-- <p class="account-subtitle">ចូលប្រើប្រាស់ប្រព័ន្ធគ្រប់គ្រង</p> --}}
                            <!-- Form -->
                            <form class="register-form outer-top-xs" method="POST"
                                action="{{ isset($guard) ? url($guard . '/login') : route('login') }}">
                                @csrf
                                <div class="form-group">
                                    <input type="email" class="form-control unicase-form-control text-input"
                                        placeholder="Email" name="email" id="email" required autofocus>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control unicase-form-control text-input"
                                        placeholder="Password" name="password" id="password" required
                                        autocomplete="current-password">
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary btn-block" type="submit">Login</button>
                                </div>
                            </form>
                            <!-- /Form -->

                            {{-- <div class="text-center forgotpass"><a href="forgot-password.html">Forgot Password?</a>
                            </div> --}}
                            <div class="login-or">
                                <span class="or-line"></span>
                                <span class="span-or">or</span>
                            </div>

                            {{-- <!-- Social Login -->
                            <div class="social-login">
                                <span>Login with</span>
                                <a href="#" class="facebook"><i class="fa fa-facebook"></i></a><a href="#"
                                    class="google"><i class="fa fa-google"></i></a>
                            </div> --}}
                            <!-- /Social Login -->

                            <div class="text-center dont-have">Don't have an account? <a class="text-primary"
                                    href="{{ route('user.register') }}">Register</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Main Wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('Frontend/assets/js/jquery-3.6.0.min.js') }}"></script>

    <!-- Bootstrap Core JS -->
    <script src="{{ asset('Frontend/assets/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Custom JS -->
    <script src="{{ asset('Frontend/assets/js/script.js') }}"></script>

</body>

</html>
