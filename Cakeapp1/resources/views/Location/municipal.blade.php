@extends('Location.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>All Municipal</h2>
            </div>
            <div class="pull-right">

            </div>
        </div>
    </div>

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>District Name</th>
            <th>Municipal Name</th>
            <th width="250px">Action</th>
        </tr>

        @foreach ($allMunicipal as $municipal)
            <tr>
                <td>{{$loop->index}}</td>
                <td>{{$municipal->district->district_name}}</td>
                <td>{{ $municipal->municipal_name }}</td>
                <td> </td>
            </tr>
        @endforeach
    </table>


@endsection

