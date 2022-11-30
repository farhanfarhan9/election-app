@extends('voterauth.layout.index')
@section('title')
Register
@endsection
@section('content')
<div class="row h-100">
  <div class="col-lg-5 col-12">
      <div id="auth-left">
          <div class="auth-logo">
              {{-- <a href="index.html"><img src="assets/images/logo/logo.svg" alt="Logo"></a> --}}
          </div>
          <h1 class="auth-title">Sign Up</h1>
          <p class="auth-subtitle mb-5">Input your data to register to our website.</p>

          <form action="/register-voter" method="POST">
              @csrf
              <div class="form-group position-relative has-icon-left mb-4">
                <input type="text" class="form-control form-control-xl" placeholder="Nomor Identitas" name="identity">
                <div class="form-control-icon">
                    <i class="bi bi-person-badge"></i>
                </div>
              </div>
              <div class="form-group position-relative has-icon-left mb-4">
                  <input type="text" class="form-control form-control-xl" placeholder="Nama" name="name"> 
                  <div class="form-control-icon">
                    <i class="bi bi-person"></i>
                  </div>
              </div>
              <div class="form-group position-relative has-icon-left mb-4">
                  <input type="text" class="form-control form-control-xl" placeholder="Alamat Email" name="email">
                  <div class="form-control-icon">
                      <i class="bi bi-envelope"></i>
                  </div>
              </div>
              <div class="form-group position-relative has-icon-left mb-4">
                <input type="text" class="form-control form-control-xl" placeholder="Nomor HP" name="phone">
                <div class="form-control-icon">
                    <i class="bi bi-phone"></i>
                </div>
            </div>
              <div class="form-group position-relative has-icon-left mb-4">
                  <input type="password" class="form-control form-control-xl" placeholder="Password" name="password">
                  <div class="form-control-icon">
                      <i class="bi bi-shield-lock"></i>
                  </div>
              </div>
              <div class="form-group position-relative has-icon-left mb-4">
                  <input type="password" class="form-control form-control-xl" placeholder="Confirm Password" name="password_confirmation">
                  <div class="form-control-icon">
                      <i class="bi bi-shield-lock"></i>
                  </div>
              </div>
              <button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Sign Up</button>
          </form>
          <div class="text-center mt-5 text-lg fs-4">
              {{-- <p class='text-gray-600'>Already have an account? <a href="auth-login.html" class="font-bold">Login</a>.</p> --}}
          </div>
      </div>
  </div>
  <div class="col-lg-7 d-none d-lg-block">
      <div id="auth-right">

      </div>
  </div>
</div>
@endsection