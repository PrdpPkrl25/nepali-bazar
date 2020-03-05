@extends('Location.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>All Locality</h2>
            </div>
            <div class="pull-right">

            </div>
        </div>
    </div>

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Municipal Name</th>
            <th>Locality Name</th>
            <th width="250px">Action</th>
        </tr>

        @foreach ($allLocality as $locality)
            <tr>

                <td>{{$loop->index}}</td>
                <td>{{$locality->municipal->municipal_name}}</td>
                <td>{{$locality->locality_name }}</td>
                <td> </td>
            </tr>
        @endforeach
    </table>


@endsection
