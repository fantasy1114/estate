<!-- BEGIN: Head-->

@include('layouts.auth.header')

<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern blank-page navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="blank-page">
    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <div class="auth-wrapper auth-v2">
                    <div class="auth-inner row m-0">
                        <!-- Brand logo-->
                        <a class="brand-logo align-items-center" href="javascript:void(0);">
                            <img src="{{ asset('app-assets/images/favicon/estate.png') }}" style="width: 128px; height: 64px;">
                            {{-- <h2 class="brand-text ml-1">Estate</h2> --}}
                        </a>
                        <!-- /Brand logo-->
                        <!-- Left Text-->
                        <div class="d-none d-lg-flex col-lg-8 align-items-center">
                            <div class="w-100 d-lg-flex align-items-center justify-content-center px-5" id="slideshow">
                                <div>
                                    <img class="img-fluid" src="{{ asset('app-assets/images/auth/login1.png') }}">
                                </div>
                                <div>
                                    <img class="img-fluid" src="{{ asset('app-assets/images/auth/login2.png') }}">
                                </div>
                                <div>
                                    <img class="img-fluid" src="{{ asset('app-assets/images/auth/login3.png') }}">
                                </div>
                                <div>
                                    <img class="img-fluid" src="{{ asset('app-assets/images/auth/login4.png') }}">
                                </div>
                                <div>
                                    <img class="img-fluid" src="{{ asset('app-assets/images/auth/login5.png') }}">
                                </div>
   
                            </div>
                        </div>
                        <!-- /Left Text-->
                        <!-- Login-->
                        <div class="d-flex col-lg-4 align-items-center auth-bg px-2 p-lg-5">
                            <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">
                                <h2 class="card-title font-weight-bold mb-1">Welcome to Estate! 👋</h2>
                                <p class="card-text mb-2">Please sign-in to your account</p>
                                <form class="auth-login-form mt-2" action="{{route('login.custom')}}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label class="form-label" for="email">Email</label>
                                        <input class="form-control" id="email" type="text" name="email" placeholder="john@example.com" aria-describedby="email" autofocus="" tabindex="1" value="admin@gmail.com"/>
                                    </div>
                                    <div class="form-group">
                                        <div class="d-flex justify-content-between">
                                            <label for="password">Password</label><a href="#"><small>Forgot Password?</small></a>
                                        </div>
                                        <div class="input-group input-group-merge form-password-toggle">
                                            <input class="form-control form-control-merge" id="password" type="password" name="password" placeholder="············" aria-describedby="password" value="aaaaaa" tabindex="2" />
                                            <div class="input-group-append"><span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" id="remember-me" type="checkbox" tabindex="3" />
                                            <label class="custom-control-label" for="remember-me"> Remember Me</label>
                                        </div>
                                    </div>
                                    <button class="btn btn-primary btn-block" tabindex="4">Sign in</button>
                                </form>
                                <p class="text-center mt-2"><span>New on our platform?</span><a href="{{route('register')}}"><span>&nbsp;Create an account</span></a></p>
                            </div>
                        </div>
                        <!-- /Login-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Content-->

    @include('layouts.auth.footer')
</body>
<!-- END: Body-->

</html>