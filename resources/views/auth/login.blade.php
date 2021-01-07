
@extends('layouts.css')
<body class="bg-default">
  <!-- Main content -->
  <div class="main-content">
    <!-- Header -->
    <div class="header bg-gradient-primary py-3 py-md-4 pt-lg-4">
      <div class="container">
        <div class="header-body text-center mb-8">
          <div class="row justify-content-center">
            <div class="col-xl-5 col-lg-6 col-md-8 px-5">
               <div class="row justify-content-center">
                   <img src="{{asset('argon/assets/img/brand/logo_sumbermas.png')}}">

               </div>

            </div>
          </div>
        </div>
      </div>
      <div class="separator separator-bottom separator-skew zindex-100">
        <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
          <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
        </svg>
      </div>
    </div>
    <!-- Page content -->
    <div class="container mt--8 pb-5">
      <div class="row justify-content-center">
        <div class="col-lg-5 col-md-7">
          <div class="card bg-secondary border-0 mb-0">

            <div class="card-body px-lg-5 py-lg-5">
              <div class="text-center text-muted mb-4">
                <small>selamat datang di management keuangan</small>
                <small>admin  username:admin@gmail.com</small>
                <small>admin  password:123456</small>
                <small>user  username:user@gmail.com</small>
                <small>user  password:123456</small>

              </div>
              <form role="form" method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group mb-3">

                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                    </div>
                    <input class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email" id="email" type="email" required autocomplete="email" autofocus>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                </div>
                <div class="form-group">

                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                </div>
                <div class="custom-control custom-control-alternative custom-checkbox">
                  <input class="custom-control-input" id=" customCheckLogin" type="checkbox">
                  <label class="custom-control-label" for=" customCheckLogin">
                    <span class="text-muted">Remember me</span>
                  </label>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary my-4">{{ __('Login') }}</button>
                </div>
              </form>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
  </body>
@extends('layouts.footer')
