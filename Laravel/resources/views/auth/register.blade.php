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
        <div class="col-md-10">
            <div class="card " style="margin-top: 100px;padding: 50px">
                <div class="card-header">{{ __('Join Cakeapp') }}</div>

                <div class="card-body" style="background-color: rgba(0,0,0,.75);">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row mt-2">
                            <label for="name" class="col-md-4 col-form-label text-md-right" style="color: white" >{{ __('Name:') }}</label>

                            <div class="col-md-5">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right" style="color: white">{{ __('E-Mail Address:') }}</label>

                            <div class="col-md-5">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"  value="{{ old('email') }}" autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right" style="color: white">{{ __('Password:') }}</label>

                            <div class="col-md-5">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right" style="color: white">{{ __('Confirm Password:') }}</label>

                            <div class="col-md-5">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4  align-items-center" >
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                                @if (Route::has('login'))
                                <a class="btn btn-link" href="{{ route('login') }}">
                                    {{ __('Already a Cakeapp User? Sign in') }}
                                </a>
                                @endif
                            </div>
                        </div>

                        <hr style="height:1.5px;border-width:0;color:gray;background-color:gray;width: 75%">
                        <span class="offset-md-6" style="color: white">Or,</span>
                        <div class="form-group row mb-0 mt-2">
                            <div class="col-md-8 offset-md-4 ">
                                <a href="{{ url('web/auth/redirect/google') }}" class="btn btn-danger ml-4">&nbsp;<i class="fab fa-google"></i> &nbsp;&nbsp;SignUp With Google &nbsp;&nbsp;&nbsp;&nbsp;  </a>
                            </div>
                        </div>

                        <div class="form-group row mb-0 mt-2">
                            <div class="col-md-8 offset-md-4">
                                <a href="{{ url('web/auth/redirect/facebook') }}" class="btn btn-primary ml-4">&nbsp;<i class="fab fa-facebook"></i> &nbsp;&nbsp;SignUp With Facebook&nbsp;&nbsp;</a>
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


