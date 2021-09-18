<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>@yield('title')</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('backend/img/favicon.ico') }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('backend/css/bootstrap.min.css') }}">
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.1/summernote.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('backend/css/all.min.css') }}">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{ asset('backend/plugins/fontawesome/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/plugins/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/plugins/fontawesome/css/fontawesome.min.css') }}">

    <!-- Datatables CSS -->
    <link rel="stylesheet" href="{{ asset('backend/plugins/datatables/datatables.min.css') }}">

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('backend/css/style.css') }}">

<!--[if lt IE 9]>
    <script src="{{ asset('backend/js/html5shiv.min.js') }}"></script>
    <script src="{{ asset('backend/js/respond.min.js') }}"></script>
    <![endif]-->
</head>
<body>

<div class="main-wrapper login-body">
    <div class="login-wrapper">
        <div class="container">

            <img class="img-fluid logo-dark mb-2" src="{{asset('frontend/images/logo/logo2.png')}}" alt="Logo">
            <div class="loginbox">

                <div class="login-right">
                    <div class="login-right-wrap">
                        <h1 class="text-center">Welcome to Trimatric</h1>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group">
                                <label class="form-control-label">Email Address</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                                          <strong>{{ $message }}</strong>
                                                          </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">Password</label>
                                <div class="pass-group">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                                          <strong>{{ $message }}</strong>
                                                          </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="custom-control custom-checkbox">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                            <label class="custom-control-label" for="cb1">Remember me</label>
                                        </div>
                                    </div>
                                    <div class="col-6 text-right">
                                        {{--                                        <a class="forgot-link" href="#">Forgot Password ?</a>--}}
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-lg btn-block btn-primary" type="submit">Login</button>
                            {{--                            <div class="text-center dont-have">Don't have an account yet? <a href="#">Register</a></div>--}}
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- /Main Wrapper -->

<!-- jQuery -->
<script src="{{ asset('backend/js/jquery-3.5.1.min.js') }}"></script>

<!-- Bootstrap Core JS -->
<script src="{{ asset('backend/js/popper.min.js') }}"></script>
<script src="{{ asset('backend/js/bootstrap.min.js') }}"></script>

<!-- Feather Icon JS -->
<script src="{{ asset('backend/js/feather.min.js') }}"></script>
<script src="{{ asset('backend/js/summernote.min.js') }}"></script>
<script src="{{ asset('backend/js/all.min.js') }}"></script>

<!-- Slimscroll JS -->
<script src="{{ asset('backend/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>

<!-- Custom JS -->
<script src="{{ asset('backend/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('backend/plugins/datatables/datatables.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script src="{{ asset('backend/js/script.js') }}"></script>
@yield('scripts')
</body>

</html>

