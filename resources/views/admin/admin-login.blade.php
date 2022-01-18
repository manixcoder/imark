<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>imark</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="{{asset('public/assets/images/favicon_1.ico')}}">
    <!-- Custom Files -->
    <link href="{{asset('public/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('public/assets/css/icons.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('public/assets/css/style.css')}}" rel="stylesheet" type="text/css" />
    <script src="{{asset('public/assets/js/modernizr.min.js')}}"></script>
    <!-- Alert -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/gijgo@1.9.10/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://cdn.jsdelivr.net/npm/gijgo@1.9.10/css/gijgo.min.css" rel="stylesheet" type="text/css" />

    <script>
        history.pushState(null, null, null);
        window.addEventListener('popstate', function() {
            history.pushState(null, null, null);
        });
    </script>
</head>
<body>
    @include('layouts.alert')
    <div class="wrapper-page">
        <div class="card card-pages" style="background-color: #e0e0e0;">
            <div class="card-header">
                <h2 style="text-align: center; color: blue;">imark</h2>
                <!-- <img src="" style="height: 73px; margin-left: 120px;">
                <h4 class="text-center m-t-20 text-black"> Log in to your account</h4> -->
            </div>
            <div class="card-body">
                @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div class="form">
                    <form class="cmxform form-horizontal tasi-form" id="loginForm" method="POST" action="{{ route('login') }}" novalidate="novalidate">
                        {{csrf_field()}}
                        <div class="form-group">
                            <div class="col-12">
                                <input id="username" type="text" class="form-control input-lg @error('username') is-invalid @enderror" name="email" value="{{ old('username') }}" autocomplete="username" required="" aria-required="true" autofocus placeholder="Username">
                                @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-12">
                                <input type="password" id="password" class="form-control input-lg @error('password') is-invalid @enderror" name="password" required="" aria-required="true" autocomplete="current-password" placeholder="Password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group text-center m-t-40">
                            <div class="col-12">
                                <button class="btn btn-primary btn-lg w-lg waves-effect waves-light" type="submit"> {{ __('Login') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- <h3 style="text-align: center; color: #317eeb;">Looking to give feedback about our products? Click here</h3> -->
    <footer class="footer">
        Imark Ltd. © 2020 - 2021. All rights reserved.
    </footer>
        <style type="text/css">
            .footer {
                background-color: #f5f5f5;
                border-top: 0;
                right: 222px;
            }
        </style>
    </div>
    <script>
        var resizefunc = [];
    </script>
    <!-- Main  -->
    <script src="{{asset('public/assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('public/assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('public/assets/js/detect.js')}}"></script>
    <script src="{{asset('public/assets/js/fastclick.js')}}"></script>
    <script src="{{asset('public/assets/js/jquery.slimscroll.js')}}"></script>
    <script src="{{asset('public/assets/js/jquery.blockUI.js')}}"></script>
    <script src="{{asset('public/assets/js/waves.js')}}"></script>
    <script src="{{asset('public/assets/js/wow.min.js')}}"></script>
    <script src="{{asset('public/assets/js/jquery.nicescroll.js')}}"></script>
    <script src="{{asset('public/assets/js/jquery.scrollTo.min.js')}}"></script>
    <script src="{{asset('public/assets/js/jquery.app.js')}}"></script>
    <!--form validation-->
    <script src="{{ asset('public/assets/plugins/jquery-validation/dist/jquery.validate.min.js')}}"></script>

    <!--form validation init-->
    <script src="{{ asset('public/assets/pages/form-validation-init.js')}}"></script>
</body>
</html>