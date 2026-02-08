@extends('web.layouts.app')

@section('content')
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
                    <h1 class="text-primary mb-10">Forgot Password</h1>
                    <p class="text-medium">
                      Enter your email to receive password reset instructions.
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
                  <h6 class="mb-15">Forgot Password Form</h6>
                  <p class="text-sm mb-25">
                    We will send you an email with instructions to reset your password.
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

                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                  <form action="{{ route('password.email') }}" method="POST">
                    @csrf
                    <div class="row">
                      <div class="col-12">
                        <div class="input-style-1">
                          <label for="email">Email</label>
                          <input type="email" placeholder="Email" name="email" id="email" />
                        </div>
                      </div>
                      <!-- end col -->
                      <div class="col-12">
                        <div class="button-group d-flex justify-content-center flex-wrap">
                          <button style=" background-color: #007bff; color: white; border: none; padding: 10px 20px; border-radius: 5px; cursor: pointer;" type="submit" class="main-btn primary-btn btn-hover w-100 text-center">
                            Send Reset Link
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
