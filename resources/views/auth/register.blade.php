<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Project Manager | Registration Page</title>

    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <link rel="stylesheet" href="{{asset('css/app.css')}}">
<link href="{{asset('css/now-ui-kit.css?v=1.2.0')}}" rel="stylesheet" />
    <link href="{{asset('css/demo.css')}}" rel="stylesheet" />


    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />

    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">

    <!-- Bootstrap 3.3.7 -->
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">

    <!-- Theme style -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.4.3/css/AdminLTE.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.4.3/css/skins/_all-skins.min.css">

    <!-- iCheck -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/skins/square/_all.css"> --}}

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="hold-transition register-page" style="background-image:url({{asset('uploads/avatars/bg9.jpg')}}); background-size:cover;">




{{-- my registeration page --}}
<div class="container mt-5">
        <div class="row">
          <div class="card card-signup" data-background-color="blue">
            <form class="form"  method="post" action="{{ url('/register') }}">
            {!! csrf_field() !!}

              <div class="card-header text-center">
                <h3 class="card-title title-up">Sign Up</h3>
                <div class="social-line">
                  <a href="#pablo" class="btn btn-neutral btn-facebook btn-icon btn-round">
                    <i class="fab fa-facebook-square"></i>
                  </a>
                  <a href="#pablo" class="btn btn-neutral btn-twitter btn-icon btn-lg btn-round">
                    <i class="fab fa-twitter"></i>
                  </a>
                  <a href="#pablo" class="btn btn-neutral btn-google btn-icon btn-round">
                    <i class="fab fa-google-plus"></i>
                  </a>
                </div>
              </div>
              <div class="card-body">

                <div class="input-group no-border has-feedback{{ $errors->has('first_name') ? ' has-error' : '' }}">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="now-ui-icons users_circle-08"></i>
                    </span>
                  </div>
                  <input type="text" class="form-control" name="first_name" placeholder="First Name...">
                  @if ($errors->has('first_name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('first_email') }}</strong>
                    </span>
                @endif
                </div>

                <div class="input-group no-border has-feedback{{ $errors->has('last_name') ? ' has-error' : '' }}">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="now-ui-icons users_circle-08"></i>
                          </span>
                        </div>
                        <input type="text" class="form-control" name="last_name" placeholder="Last Name...">
                        @if ($errors->has('last_name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('last_name') }}</strong>
                        </span>
                    @endif
                    </div>


                <div class="input-group no-border has-feedback{{ $errors->has('email') ? ' has-error' : '' }}">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="now-ui-icons ui-1_email-85"></i>
                    </span>
                  </div>
                  <input type="email" placeholder="Email" name="email" class="form-control">
                  @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
                </div>

                <div class="input-group no-border has-feedback{{ $errors->has('password') ? ' has-error' : '' }}">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="now-ui-icons ui-1_lock-circle-open"></i>
                    </span>
                  </div>
                  <input type="password" class="form-control" name="password" placeholder="Password">
                  @if ($errors->has('password'))
                      <span class="help-block">
                          <strong>{{ $errors->first('password') }}</strong>
                      </span>
                  @endif
                </div>

                <div class="input-group no-border has-feedback{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="now-ui-icons ui-1_lock-circle-open"></i>
                          </span>
                        </div>
                        <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password">
                        @if ($errors->has('password_confirmation'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                            </span>
                        @endif
                      </div>

                <!-- If you want to add a checkbox to this form, uncomment this code -->
                <!-- <div class="checkbox">
                              <input id="checkboxSignup" type="checkbox">
                                  <label for="checkboxSignup">
                                  Unchecked
                                  </label>
                              </div> -->
              </div>

              {{-- <div class="col text-center">
                    <input type="checkbox" class="bg-neutral"> I agree to the <a href="#">terms</a>
            </div> --}}

              {{-- <div class="row"> --}}
                    {{-- <div class="col-xs-8">
                        <div class="checkbox icheck">
                            <label>
                                <input type="checkbox"> I agree to the <a href="#">terms</a>
                            </label>
                        </div>
                    </div> --}}
                    <!-- /.col -->
                    <div class="col text-center">
                        <button type="submit" class="btn bg-white text-dark btn-round btn-flat">Register</button>
                    </div>
                    <div class="">
                            <h6>
                              <a href="{{ url('/login') }}" class="link">Already a member?</a>
                            </h6>
                          </div>
                    <!-- /.col -->
                {{-- </div> --}}
            </form>
          </div>
        </div>
      </div>
{{-- end registeration --}}


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
