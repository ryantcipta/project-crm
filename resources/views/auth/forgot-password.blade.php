<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Forgot Password</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="{{url('plugins/fontawesome-free/css/all.min.css')}}">
  <link rel="stylesheet" href="{{url('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
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
    <a href="#">Forgot Password</a>
  </div>
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Enter your email to reset your password</p>
      @if (session('status'))
        <div class="alert alert-success">
          {{ session('status') }}
        </div>
      @endif
      <form action="{{ route('auth.forgot-password.send') }}" method="POST">
        @csrf
        <div class="input-group mb-3">
          <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
          @error('email')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Send Reset Link</button>
          </div>
        </div>
      </form>
      <p class="mt-3 mb-0">
        <a href="{{ route('auth.login') }}">Back to Login</a>
      </p>
    </div>
  </div>
</div>
<script src="{{url('plugins/jquery/jquery.min.js')}}"></script>
<script src="{{url('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{url('dist/js/adminlte.min.js')}}"></script>
</body>
</html>
