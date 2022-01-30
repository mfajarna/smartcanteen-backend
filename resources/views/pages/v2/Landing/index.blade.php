<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <title>Login | SmartCanteen</title>

    @include('includes.Dashboard.meta')

    @include('includes.Dashboard.style')

  </head>
  <body>
    <div class="account-pages my-5 pt-sm-5">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-8 col-lg-6 col-xl-5">
            <div class="card overflow-hidden">
              <div class="bg-danger">
                <div class="row">
                  <div class="col-7">
                    <div class="text-white p-4">
                      <h5 class="text-white">Selamat Datang !</h5>
                      <p>Silahkan login Smartcanteen.</p>
                    </div>
                  </div>
                  <div class="col-5 align-self-end">
                    <img src="{{ asset('/assets/images/profile-img.png') }}" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
              <div class="card-body pt-0">
                <div class="auth-logo">
                  <a href="index.php" class="auth-logo-light">
                    <div class="avatar-md profile-user-wid mb-4">
                      <span class="avatar-title rounded-circle bg-light">
                        <img src="{{ asset('/assets/images/logo-light.svg') }}" alt="" class="rounded-circle" height="34">
                      </span>
                    </div>
                  </a>
                  <a href="index.php" class="auth-logo-dark">
                    <div class="avatar-md profile-user-wid mb-4">
                      <span class="avatar-title rounded-circle bg-light">
                        <img src="{{ asset('/assets/images/logo.svg') }}" alt="" class="rounded-circle" height="34">
                      </span>
                    </div>
                  </a>
                </div>
                <div class="p-2">
                  <form class="form-horizontal" action="{{ route('login') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                      <label for="email" class="form-label">Email</label>
                      <input type="text" class="form-control" id="email" placeholder="uname@domain.com" name="email" required>

                        <p class="text-danger mt-2">{{ $errors->first('email') }}</p>
                    </div>
                    <div class="mb-3">
                      <label for="password" class="form-label">Password</label>
                      <div class="input-group auth-pass-inputgroup">
                        <input type="password" name="password" class="form-control" placeholder="Enter password"  aria-label="Password" aria-describedby="password-addon" required>
                        <button class="btn btn-light " type="button" id="password-addon">
                          <i class="mdi mdi-eye-outline"></i>
                        </button>
                      </div>

                      <p class="text-danger mt-2">{{ $errors->first('password') }}</p>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="remember-check">
                      <label class="form-check-label" for="remember-check"> Remember me </label>
                    </div>
                    <div class="mt-3 d-grid">
                      <button class="btn btn-danger waves-effect waves-light" type="submit" value="Login">Log In</button>
                    </div>
                    <div class="mt-4 text-center">
                      <h5 class="font-size-14 mb-3">Sign in with</h5>
                      <ul class="list-inline">
                        <li class="list-inline-item">
                          <a href="javascript::void()" class="social-list-item bg-primary text-white border-primary">
                            <i class="mdi mdi-facebook"></i>
                          </a>
                        </li>
                        <li class="list-inline-item">
                          <a href="javascript::void()" class="social-list-item bg-info text-white border-info">
                            <i class="mdi mdi-twitter"></i>
                          </a>
                        </li>
                        <li class="list-inline-item">
                          <a href="javascript::void()" class="social-list-item bg-danger text-white border-danger">
                            <i class="mdi mdi-google"></i>
                          </a>
                        </li>
                      </ul>
                    </div>
                    <div class="mt-4 text-center">
                      <a href="auth-recoverpw-1.php" class="text-muted">
                        <i class="mdi mdi-lock me-1"></i> Forgot your password? </a>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <div class="mt-5 text-center">
              <div>
                <p>Don't have an account ? <a href="auth-register-1.php" class="fw-medium text-danger"> Signup now </a>
                </p>
                <p>© <script>
                    document.write(new Date().getFullYear())
                  </script> Smart Canteen Telkom University. Crafted with <i class="mdi mdi-heart text-danger"></i> </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- end account-pages -->
    <!-- JAVASCRIPT -->
    <!-- JAVASCRIPT -->
    <script src="{{ asset('/assets/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('/assets/libs/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ asset('/assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('/assets/libs/node-waves/waves.min.js') }}"></script>
    <!-- App js -->
    <script src="{{ asset('/assets/js/app.js') }}"></script>
  </body>

</html>