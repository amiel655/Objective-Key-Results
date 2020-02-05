<!DOCTYPE html>

    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
            <head>
                <meta charset="utf-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1">
            
                <!-- CSRF Token -->
                <meta name="csrf-token" content="{{ csrf_token() }}">
            
                <title>{{ config('app.name', 'Laravel') }}</title>

                <!-- jQuery -->
    <script src="/js/vendors/jquery/dist/jquery.min.js"></script>
                <!-- Fonts -->
                <link rel="dns-prefetch" href="https://fonts.gstatic.com">
                <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
            
    <title>Login | </title>

      <!-- Bootstrap -->
      <link href="/css/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
      <!-- Font Awesome -->
      <link href="/css/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
      <!-- NProgress -->
      <link href="/css/vendors/nprogress/nprogress.css" rel="stylesheet">

      <!-- Custom Theme Style -->
      <link href="/css/build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                @csrf
              <h1>Login Form</h1>
              <div>
                  <input id="email" type="email" placeholder="E-mail" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                  @if ($errors->has('email'))
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $errors->first('email') }}</strong>
                  </span>
                  @endif
              </div>


              <div>
                  <input id="password" type="password" placeholder="Password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                  @if ($errors->has('password'))
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $errors->first('password') }}</strong>
                  </span>
                  @endif
              </div>
              <div>
                  <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                  <label class="form-check-label" for="remember">
                      {{ __('Remember Me') }}
                  </label>
              </div>
              <div>
                  <button type="submit" class="btn btn-primary">
                      {{ __('Login') }}
                  </button>
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
              </div>

              <div class="clearfix"></div>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-table"></i> Objective Key Results</h1>
                  <p>Objective Key Results System by <strong>Trendmedia INC.</strong></p>
                </div>
              </div>
            </form>
          </section>
        </div>

        <div id="register" class="animate form registration_form">
          <section class="login_content">
            <form>
              <h1>Create Account</h1>
              <div>
                <input type="text" class="form-control" placeholder="Username" required="" />
              </div>
              <div>
                <input type="email" class="form-control" placeholder="Email" required="" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" required="" />
              </div>
              <div>
                <a class="btn btn-default submit" href="index.html">Submit</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Already a member ?
                  <a href="#signin" class="to_register"> Log in </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1>
                  <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>
