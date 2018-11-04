<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Project Manager | Login Page</title>

    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <!-- Bootstrap 3.3.7 -->
<link rel="stylesheet" href="{{asset('css/app.css')}}">
<link href="{{asset('css/now-ui-kit.css?v=1.2.0')}}" rel="stylesheet" />
    <link href="{{asset('css/demo.css')}}" rel="stylesheet" />


    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />

    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">

    <!-- Theme style -->
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.4.3/css/AdminLTE.min.css"> --}}
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.4.3/css/skins/_all-skins.min.css"> --}}

    <!-- iCheck -->
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/skins/square/_all.css"> --}}

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body class="hold-transition login-page">
<div class="login-box">

    {{-- my own login --}}
    <div class="page-header clear-filter" filter-color="orange">
        <div class="page-header-image" style="background-image:url({{asset('uploads/avatars/login.jpg')}}"></div>
        <div class="content">
          <div class="container">
            <div class="col-md-4 ml-auto mr-auto">
              <div class="card card-login card-plain">
                  {{-- form begin --}}
                <form class="form" method="post" action="{{ url('/login') }}">
                    {!! csrf_field() !!}
                  <div class="card-header text-center">
                    <div class="logo-container">
                      <img src="../assets/img/now-logo.png" alt="">
                    </div>
                  </div>

                  <div class="card-body">

                    <div class="input-group no-border input-lg has-feedback {{ $errors->has('email') ? ' has-error' : '' }}">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="now-ui-icons users_circle-08"></i>
                        </span>
                      </div>
                      <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email">
                      @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                      @endif
                    </div>

                    <div class="input-group no-border input-lg has-feedback {{ $errors->has('password') ? ' has-error' : '' }}">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="now-ui-icons text_caps-small"></i>
                        </span>
                      </div>
                      <input type="password" placeholder="Password" name="password" class="form-control" />
                            @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                    </div>

                  </div>

                  <div class="card-footer text-center">
                    <button type="submit" class="btn btn-primary btn-round btn-lg btn-block">Sign In</button>
                    <div class="pull-left">
                      <h6>
                        <a href="{{ url('/register') }}" class="link">Create Account</a>
                      </h6>
                    </div>

                    <div class="pull-right">
                        <h6>
                          <a href="{{ url('/password/reset') }}" class="link">I forgot my password</a>
                        </h6>
                      </div>
                    </div>
                </form>
                </div>
              </div>
            </div>
          </div>
        </div>
     </form>

        {{-- <a href="{{ url('/password/reset') }}">I forgot my password</a><br>
        <a href="{{ url('/register') }}" class="text-center">Register a new membership</a> --}}





    {{-- end of my login --}}


    {{-- <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>

        <form method="post" action="{{ url('/login') }}">
            {!! csrf_field() !!}

            <div class="form-group has-feedback {{ $errors->has('email') ? ' has-error' : '' }}">
                <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                @if ($errors->has('email'))
                    <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
                @endif
            </div>

            <div class="form-group has-feedback{{ $errors->has('password') ? ' has-error' : '' }}">
                <input type="password" class="form-control" placeholder="Password" name="password">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                @if ($errors->has('password'))
                    <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
                @endif

            </div>
            <div class="row">
                <div class="col-xs-8">
                    <div class="checkbox icheck">
                        <label>
                            <input type="checkbox" name="remember"> Remember Me
                        </label>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                </div>
                <!-- /.col -->
            </div>
        </form>

        <a href="{{ url('/password/reset') }}">I forgot my password</a><br>
        <a href="{{ url('/register') }}" class="text-center">Register a new membership</a>

    </div>
    <!-- /.login-box-body -->
</div> --}}
<!-- /.login-box -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<!-- AdminLTE App -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.4.3/js/adminlte.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/icheck.min.js"></script>
<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });
    });
</script>
</body>
</html>
