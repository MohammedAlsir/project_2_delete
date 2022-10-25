<!DOCTYPE html>
<html>
@include('layouts.head')

<style>
    .login-card-body .input-group .input-group-text, .register-card-body .input-group .input-group-text {
        border-left: 3px solid #777;
        border-bottom-right-radius: 0rem!important;
        border-bottom-left-radius: 0.25rem!important;
        border-right: 0;
        border-top-right-radius: 0rem!important;
        border-top-left-radius: 0.25rem!important;
    }


    .input-group>.custom-select:not(:last-child), .input-group>.form-control:not(:last-child) {
        border-top-right-radius:0.25rem!important;
        border-bottom-right-radius: 0.25rem!important;
    }

    /* .login-card-body .input-group .form-control, .register-card-body .input-group .form-control {
    border-right: 3px solid #777;
} */
</style>

<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <p><b>لوحة تحكم</b> الادارة </p>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg"> تسجيل الدخول</p>

      <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="input-group mb-3">
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="اسم المستخدم">

          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="كلمة المرور">

          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">

          <!-- /.col -->
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">تسجيل الدخول </button>
          </div>
          <!-- /.col -->
        </div>
      </form>
       <div class="social-auth-links text-center mb-3">
            <p>- كل الحقوق محفوظة   -</p>
            <p class="small">7D Company Copyright © 2022</p>

        </div>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>
</html>
