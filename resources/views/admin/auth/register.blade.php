<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> التسجيل</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('assets/admin/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{asset('assets/admin/fonts/ionicons/2.0.1/css/ionicons.min.css')}}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{asset('assets/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('assets/admin/dist/css/adminlte.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/admin/css/bootstrap_rtl-v4.2.1/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/admin/css/bootstrap_rtl-v4.2.1/custom_rtl.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="{{asset('assets/admin/fonts/SansPro/SansPro.min.css')}}" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">التسجيل</p>
      @include('admin.include.error')
      <form action="{{ route('admin.enduser') }}" method="POST">
        @csrf
        <div class="input-group mb-3">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
          <input type="text" name="name" class="form-control" placeholder="الاسم الكامل" >
        </div>
        <div class="input-group mb-3">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
          <input type="email" name="email" class="form-control" placeholder="البريد الالكتروني" >
        </div>
        <div class="input-group mb-3">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
          <input type="text" name="username" class="form-control" placeholder="اسم المستخدم" >
        </div>
        @error('username')
              <span class="text-danger">{{$message}}</span>
          @enderror
        <div class="input-group mb-3">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
          <input type="password" name="password" class="form-control" placeholder="كلمة المرور" >
        </div>
        @error('password')
        <span class="text-danger">{{$message}}</span>
    @enderror
    <div class="input-group mb-3">
      <div class="input-group-append">
        <div class="input-group-text">
          <span class="fas fa-home"></span>
        </div>
      </div>
      <input type="text" name="address" class="form-control" placeholder=" العنوان" >
    </div>
    <div class="input-group mb-3">
      <div class="input-group-append">
        <div class="input-group-text">
          <span class="fas fa-phone"></span>
        </div>
      </div>
      <input type="number" name="phone" class="form-control" placeholder="رقم الهاتف" >
    </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block btn-flat">التسجيل</button>
          </div>
          <!-- /.col -->
          
          <a href="{{ route('admin.login') }}" class="text-center" style="margin-right: 20px;margin-top: 10px">لدي حساب بالفعل!</a>
        </div>
      </form>

      <!-- /.social-auth-links -->
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{asset('assets/admin/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

</body>
</html>
