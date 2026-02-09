@extends('web.layouts.app')

@section('content')
    {{-- sifre sifirlama sayfasi --}}
    <!-- ======== main-wrapper start =========== -->
    <main class="container">
      <!-- ========== signin-section start ========== -->
        <section class="signin-section">
            <div class="container-fluid">
            <div class="row g-0 auth-row">
                <div class="col-lg-6">
                <div class="auth-cover-wrapper bg-primary-100">
                    <div class="auth-cover">
                    <div class="title text-center">
                        <h1 class="text-primary mb-10">Reset Password</h1>
                        <p class="text-medium">
                        Enter your new password to reset your account.
                        </p>
                    </div>
                    <div class="shape-image">
                        <img src="{{ asset('admin/assets/images/auth/shape.svg') }}" alt="" />
                    </div>
                    </div>
                </div>
                </div>
                <!-- end col -->
                <div class="col-lg-6">
                <div class="signin-wrapper">
                    <div class="form-wrapper">
                    <h6 class="mb-15">Reset Password Form</h6>
                    <p class="text-sm mb-25">
                        Please enter your new password to reset your account.
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
                    <form action="{{ route('password.update') }}" method="POST">
                        @csrf
                        <input type="hidden" name="token" value="{{ request()->token }}">
                        <div class="row">
                        <div class="col-12">
                            <div class="input-style-1">
                            <label>Email</label>
                            <input type="email" placeholder="Email" name="email" value="{{ request()->email }}" />
                            </div>
                        </div>
                        <!-- end col -->
                        <div class="col-12">
                            <div class="input-style-1">
                            <label>New Password</label>
                            <input type="password" placeholder="New Password" name="password" />
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
                            <button style=" background-color: #007bff; color: white; border: none; padding: 10px 20px; border-radius: 5px; cursor: pointer;" type="submit">
                                Reset Password
                            </button>
                            </div>
                        </div>
                        <!-- end col -->
                        </div>
                    </form>
                    </div>
                </div>
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
            </div>
            <!-- end container -->
        </section>
        <!-- ========== signin-section end ========== -->
    </main>
    <!-- ======== main-wrapper end =========== -->
@endsection
