<!DOCTYPE html> 
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Register</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{url('plugins/fontawesome-free/css/all.min.css')}}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{url('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{url('dist/css/adminlte.min.css')}}">
  <style>
    body {
      background-image: url('{{ asset('img/www.jpg') }}');
      background-size: cover;
      color: #fff;
      font-family: 'Source Sans Pro', sans-serif;
    }
    .login-box {
      background: rgba(255, 255, 255, 0.9);
      border-radius: 10px;
      box-shadow: 0px 10px 15px rgba(0, 0, 0, 0.2);
    }
    .login-logo a {
      color: #6a11cb;
      font-weight: bold;
      text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.1);
    }
    .btn-primary {
      background-color: #6a11cb;
      border-color: #6a11cb;
    }
    .btn-primary:hover {
      background-color: #5a0fbd;
      border-color: #5a0fbd;
    }
    .form-control {
      border-radius: 5px;
    }
    .login-card-body {
      padding: 30px;
    }
    .login-box-msg {
      font-size: 16px;
      color: #333;
      margin-bottom: 20px;
    }
  </style>
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>Register</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Register a new membership</p>

      <form action="{{route('auth.register')}}" method="POST">
        @csrf

        <div class="input-group mb-3">
          <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" placeholder="Username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
          @error('username')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>

        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
          @error('password')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>

        <div class="input-group mb-3">
          <input type="password" name="password_confirmation" class="form-control" placeholder="Retype password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>

        <div class="input-group mb-3">
          <input type="text" class="form-control @error('kode_dealer') is-invalid @enderror" name="kode_dealer" placeholder="Kode Dealer">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-code"></span>
            </div>
          </div>
          @error('kode_dealer')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>

        <div class="input-group mb-3">
          <input type="text" class="form-control @error('nama_dealer') is-invalid @enderror" name="nama_dealer" placeholder="Nama Dealer">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-building"></span>
            </div>
          </div>
          @error('nama_dealer')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>

        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Register</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <p class="mt-3 mb-1">
        <a href="{{route('auth.login')}}">I already have a membership</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{url('plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{url('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{url('dist/js/adminlte.min.js')}}"></script>
</body>
</html>
