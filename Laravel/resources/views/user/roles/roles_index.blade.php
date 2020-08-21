@extends('layouts.app')
@section('content')
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

@endsection

@section('script')

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

@endsection
