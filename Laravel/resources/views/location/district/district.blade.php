@extends('layout')

@section('content')
    <div class="jumbotron text-center">
        <h1>Location Details </h1>
    </div>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>All Districts</h2>
            </div>
            <div class="pull-right">

            </div>
        </div>
    </div>

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Province Name</th>
            <th>District Name</th>
            <th width="250px">Action</th>
        </tr>

    @foreach ($allDistrict as $district)
        <tr>

            <td>{{$loop->index}}</td>
            <td>{{$district->province->province_name}}</td>
            <td>{{ $district->district_name }}</td>
            <td> </td>
        </tr>
        @endforeach
    </table>


@endsection
