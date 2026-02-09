@extends('web.layouts.app')

@section('cssContent')
    <link rel="shortcut icon" href="{{ asset('admin/assets/images/favicon.svg') }}" type="image/x-icon" />
    <!-- ========== All CSS files linkup ========= -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/assets/css/lineicons.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/assets/css/materialdesignicons.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/assets/css/fullcalendar.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/assets/css/main.css') }}" />
@endsection

@section('content')
    <main class="container">
        <!-- ========== signin-section start ========== -->
        <section class="signin-section">
            <div class="container-fluid">
                <div class="row g-0 auth-row">
                    <div class="col-lg-6">
                        <div class="auth-cover-wrapper bg-primary-100">
                            <div class="auth-cover">
                                <div class="title text-center">
                                    <h1 class="text-primary mb-10">Get Started</h1>
                                    <p class="text-medium">
                                        Start creating the best possible user experience
                                        <br class="d-sm-block" />
                                        for you customers.
                                    </p>
                                </div>
                                <div class="cover-image">
                                    <img src="{{ asset('admin/assets/images/auth/signin-image.svg') }}" alt="" />
                                </div>
                                <div class="shape-image">
                                    <img src="{{ asset('admin/assets/images/auth/shape.svg') }}" alt="" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end col -->
                    <div class="col-lg-6">
                        <div class="signup-wrapper">
                            <div class="form-wrapper">
                                <h6 class="mb-15">Sign Up Form</h6>
                                <p class="text-sm mb-25">
                                    Start creating the best possible user experience for you
                                    customers.
                                </p>
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <form action="{{ route('register.post') }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="input-style-1">
                                                <label>Name</label>
                                                <input type="text" placeholder="Name" name="name" value="{{ old('name') }}" />
                                            </div>
                                        </div>
                                        <!-- end col -->
                                        <div class="col-12">
                                            <div class="input-style-1">
                                                <label>Email</label>
                                                <input type="email" placeholder="Email" name="email" value="{{ old('email') }}" />
                                            </div>
                                        </div>
                                        <!-- end col -->
                                        <div class="col-12">
                                            <div class="input-style-1">
                                                <label>Password</label>
                                                <input type="password" placeholder="Password" name="password" />
                                            </div>
                                        </div>
                                        <!-- end col -->
                                        <div class="col-12">
                                            <div class="input-style-1">
                                                <label>Confirm Password</label>
                                                <input type="password" placeholder="Confirm Password" name="password_confirmation" />
                                            </div>
                                        </div>
                                        <!-- end col -->
                                        <div class="col-12">
                                            <div class="button-group d-flex justify-content-center flex-wrap">
                                                <button class="main-btn primary-btn btn-hover w-100 text-center" type="submit">
                                                    Sign Up
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end row -->
                                </form>
                                <div class="singup-option pt-40">
                                    <p class="text-sm text-medium text-center text-gray">
                                        Easy Sign Up With
                                    </p>
                                    <div class="button-group pt-40 pb-40 d-flex justify-content-center flex-wrap">
                                        <button class="main-btn primary-btn-outline m-2">
                                            <i class="lni lni-facebook-fill mr-10"></i>
                                            Facebook
                                        </button>
                                        <button class="main-btn danger-btn-outline m-2">
                                            <i class="lni lni-google mr-10"></i>
                                            Google
                                        </button>
                                    </div>
                                    <p class="text-sm text-medium text-dark text-center">
                                        Already have an account? <a href="signin.html">Sign In</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->
            </div>
        </section>
        <!-- ========== signin-section end ========== -->

        <!-- ========== footer start =========== -->
        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 order-last order-md-first">
                        <div class="copyright text-center text-md-start">
                            <p class="text-sm">
                                Designed and Developed by
                                <a href="https://plainadmin.com" rel="nofollow" target="_blank">
                                    PlainAdmin
                                </a>
                            </p>
                        </div>
                    </div>
                    <!-- end col-->
                    <div class="col-md-6">
                        <div class="terms d-flex justify-content-center justify-content-md-end">
                            <a href="#0" class="text-sm">Term & Conditions</a>
                            <a href="#0" class="text-sm ml-15">Privacy & Policy</a>
                        </div>
                    </div>
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </footer>
        <!-- ========== footer end =========== -->
    </main>
@endsection

@section('jsContent')
    <!-- ========= All Javascript files linkup ======== -->
    <script src="{{ asset('admin/assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/Chart.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/dynamic-pie-chart.js') }}"></script>
    <script src="{{ asset('admin/assets/js/moment.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/fullcalendar.js') }}"></script>
    <script src="{{ asset('admin/assets/js/jvectormap.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/world-merc.js') }}"></script>
    <script src="{{ asset('admin/assets/js/polyfill.js') }}"></script>
    <script src="{{ asset('admin/assets/js/main.js') }}"></script>
@endsection
