<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="margin-top: 100px;padding: 50px">
                <div class="card-header">{{ __('Login to Cakeapp') }}</div>

                <div class="card-body" style="background-color: rgba(0,0,0,.75);">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group row mt-4">
                            <div class="col-md-6 offset-md-3">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="{{ __('E-Mail Address') }}" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-3">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" width="80%" placeholder="{{ __('Password') }}" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-3">
                                <div class="form-check text-center">
                                    <input class="form-check-input " type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember" style="color:white ">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0 mt-2">
                            <div class="col-md-6 offset-md-3 text-center">
                                <button type="submit" class="btn btn-primary btn-block " id="login">
                                    {{ __('Login') }}
                                </button>
                                    <br>
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>




                        <hr style="height:1.5px;border-width:0;color:gray;background-color:gray;width: 60%;">

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-3 text-center">
                                @if (Route::has('register'))
                                    <a class="btn btn-link " href="{{ route('register') }}">
                                        {{ __('New here? Sign up') }}
                                    </a>
                                @endif
                            </div>
                        </div>

                        <div class="row">
                        <div class="col-md-6 offset-md-3 text-center" style="color: white">
                           <span>--Or--</span>
                        </div>
                        </div>

                        <div class="form-group row mb-0 mt-3">
                            <div class="col-md-6 offset-md-3">
                                <a href="{{ url('web/auth/redirect/google') }}" class="btn btn-block btn-danger  "><i class="fab fa-google"></i> &nbsp;&nbsp;Login With Google &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
                            </div>
                        </div>

                        <div class="form-group row mb-0 mt-3">
                            <div class="col-md-6 offset-md-3">
                                <a href="{{ url('web/auth/redirect/facebook') }}" class="btn btn-block btn-primary "><i class="fab fa-facebook"></i> &nbsp;&nbsp;Login With Facebook&nbsp;&nbsp;</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
