<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Nepali Bazar</title>

    <script type="text/javascript" src="js/app.js"></script>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
          integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }


    </style>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand " href="#">Nepali Bazar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>


    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">


        </ul>


        @if (Route::has('login'))
            <div class="top-right links">
                @auth
                    <a href="{{ route('home') }}">Home</a>
                @else
                    <a href="{{ route('login') }}">Login</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Register</a>
                    @endif

                @endauth
            </div>
        @endif
    </div>
</nav>

<div class="container">
    <div class="row">
        <div class="card-header">
            <p style="margin-bottom: 0">Add Permission to Roles:</p>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead>
            <th>S. No.</th>
            <th>Label</th>
            <th>Name</th>
            @foreach($roles as $role)
                <th>{!! $role->name !!}</th>
            @endforeach
            </thead>
            <tbody>
            @foreach($permissions as $permission)
                <tr>
                    <td>{!! $permission->id !!}</td>
                    <td>{!! $permission->label !!}</td>
                    <td>{!! $permission->name !!}</td>
                    @foreach($roles as $role)
                        <td><input type="checkbox" class="role" data-role_id="{{$role->id}}"
                                   id="{!! $permission->id !!}" {!!$permission[$role->id]?'checked':'unchecked'!!}>
                        </td>
                    @endforeach
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        $(".role").change(function () {
            var permissionId = $(this).attr('id');
            var roleId = $(this).attr('data-role_id');
            var value = $(this).is(':checked') ? 1 : 0;
            $.ajax({
                type: 'POST',
                url: '/web/roles/' + roleId + '/' + permissionId,
                headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
                data: {'value': value},
                success: function (data) {
                    console.log(data);
                }
            })
            ;
        });
    });
</script>

</body>

</html>




