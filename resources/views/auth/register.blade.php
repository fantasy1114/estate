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
                            {{-- <h2 class="brand-text text-primary ml-1">ESTATE</h2> --}}
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
                        <!-- Register-->
                        <div class="d-flex col-lg-4 align-items-center auth-bg px-2">
                            <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">
                                <h2 class="card-title font-weight-bold mb-1">Sign up 🚀</h2>
                                <p class="card-text mb-2">Make your app management easy and fun!</p>
                                <form class="auth-register-form mt-2" action="{{route('register.custom')}}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label class="form-label" for="name">Username</label>
                                        <input class="form-control" id="name" type="text" name="name" placeholder="johndoe" aria-describedby="name" autofocus="" tabindex="1" />
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="email">Email</label>
                                        <input class="form-control" id="email" type="text" name="email" placeholder="john@example.com" aria-describedby="email" tabindex="2" />
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="password">Password</label>
                                        <div class="input-group input-group-merge form-password-toggle">
                                            <input class="form-control form-control-merge" id="password" type="password" name="password" placeholder="············" aria-describedby="password" tabindex="3" minlength="6"/>
                                            <div class="input-group-append"><span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" id="register-privacy-policy" type="checkbox" tabindex="4" />
                                            <label class="custom-control-label" for="register-privacy-policy">I agree to<a href="javascript:void(0);">&nbsp;privacy policy & terms</a></label>
                                        </div>
                                    </div>
                                    <button class="btn btn-primary btn-block" tabindex="5">Sign up</button>
                                </form>
                                <p class="text-center mt-2"><span>Already have an account?</span><a href="{{route('login')}}"><span>&nbsp;Sign in instead</span></a></p>
                            </div>
                        </div>
                        <!-- /Register-->
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