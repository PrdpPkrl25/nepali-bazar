<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="/js/app.js" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
          integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

</head>
<body>
<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/web/home') }}" style=" font-size: 1.5em">{{ __('Nepali Bazaar')}}</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" style=" font-size: 1.2em" href="{{route('category.select')}}"
                       id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                       aria-expanded="false">Category</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @foreach(view()->shared('categories') as $category)
                            <a class="dropdown-item"
                               href={{route('products.select',$category->id)}}>{{$category->category_name}}</a>
                            <div class="dropdown-divider"></div>
                        @endforeach
                    </div>
                </li>
            </ul>

            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search any Product or Shop"
                       aria-label="Search">
                <button class="btn btn-success my-2 my-sm-0" type="submit">Search</button>
            </form>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}" style=" font-size: 1.2em">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}"
                               style=" font-size: 1.2em">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" style="font-size: 1.2em" href="#"
                           role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdown">



                            <a class="dropdown-item" href="{{ route('user.profile') }}">
                                {{ __('My Profile') }}
                            </a>

                            @if(\Illuminate\Support\Facades\Auth::user()->hasRole('owner'))
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('shops.list') }}">
                                    {{ __('My Shops') }}
                                </a>

                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('products.listed') }}">
                                    {{ __('Products Listed') }}
                                </a>

                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('orders') }}">
                                    {{ __('Orders Received') }}
                                </a>
                            @endif

                            @if(\Illuminate\Support\Facades\Auth::user()->hasRole('customer'))
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('orders') }}">
                                {{ __('Orders') }}
                            </a>
                            @endif

                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>

                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('cart.show') }}">
                                    <span style="display: inline-block;margin-right: 10px">
                                        <i class="fa fa-shopping-cart" style="font-size:30px;"></i>
                                    </span>
                            <span class="basket-content" style="display: inline-block;">
                                    {{ __('My Cart') }}<br>

                                    <span class="item-count" id="item-count"></span>
                            </span>
                        </a>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>

<div class="page-container">
    <div class="text-center">
        @include('flash::message')
    </div>

    @if ($errors->any())
        <div class="alert alert-danger" id="validation-message">
            <ul>
                @foreach ($errors->all() as $error)
                    <li class="text-center">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @yield('content')

    @include('footer')
</div>

@yield('script')
<script>
    $('div.alert').not('.alert-important').delay(5000).fadeOut(350);

    setTimeout(function() {
        $('#validation-message').fadeOut('fast');
    }, 5000);
</script>
</body>
</html>
