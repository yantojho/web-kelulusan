<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>SISPUL- LOGIN</title>

  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="{{asset('vendors/iconfonts/mdi/css/materialdesignicons.min.css')}}">
  <link rel="stylesheet" href="{{asset('vendors/iconfonts/puse-icons-feather/feather.css')}}">
  <link rel="stylesheet" href="{{asset('vendors/css/vendor.bundle.base.css')}}">
  <link rel="stylesheet" href="{{asset('vendors/css/vendor.bundle.addons.css')}}">
  <link rel="stylesheet" href="{{asset('login/style.css')}}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{asset('images/LOGO_SMK.png')}}" />
</head>

<body background="{{asset('images/auth/register.jpg')}}">
<form method="POST" action="{{ route('login.authenticate') }}">
{{ csrf_field() }}
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper auth-page">
      <div class="content-wrapper d-flex align-items-center auth theme-one">

        <div class="row w-100">
        <div class="col-md-12" style="margin-bottom: 20px;">
        <h2 style="text-align: center;"></h2>
        </div>
        
        <div class="col-lg-4 mx-auto">
          <div class="card-header align-middle bg-white bg-gradient" style="text-align: center">
            <img src="{{ asset('image/LOGO_SMK.png') }}" alt="" width="120">
          </div>
            <div class="auto-form-wrapper">
                
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}"">
                  <label class="label">Email</label>
                  <div class="input-group">
                    <input id="username" type="text" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-check-circle-outline"></i>
                      </span>
                    </div>
                  </div>
                    @error('email')
                        <span class="help-block">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                  <label class="label">Password</label>
                  <div class="input-group">
                    <input id="password" type="password" class="form-control" name="password" required>
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-check-circle-outline"></i>
                      </span>
                    </div>
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                  </div>
                </div>
                <div class="form-group">
                  <button class="btn btn-primary submit-btn btn-block" type="submit">Login</button>
                </div>
            </div>
            <div class="card-footer bg-dark bg-gradient" style="max-height: 3rem" >
              <p class="footer-text text-center" style="margin-top: 1px;color: #ffffff">Copyright © {{date('Y')}} SMKN1 SEPA - All rights reserved.</p>
            </div>
            
          </div>
        </div>
      </div>
      <!-- content-wrapper ends Herziwp@gmail.com -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  </form>
  <script src="{{asset('vendors/js/vendor.bundle.base.js')}}"></script>
  <script src="{{asset('vendors/js/vendor.bundle.addons.js')}}"></script>
</body>

</html>