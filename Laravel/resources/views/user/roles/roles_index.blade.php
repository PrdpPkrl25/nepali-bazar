<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Nepali Bazar</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script type="text/javascript" src="js/app.js" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">


    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
          integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">


</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand " href="{{ url('/web/home') }}" style=" font-size: 1.5em">{{ __('Nepali Bazaar')}}</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

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




