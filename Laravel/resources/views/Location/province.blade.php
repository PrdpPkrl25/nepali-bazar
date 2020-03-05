@extends('Location.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>All Provinces</h2>
            </div>
            <div class="pull-right">

            </div>
        </div>
    </div>

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Province Number</th>
            <th>Province Name</th>
            <th width="250px">Action</th>
        </tr>

        @foreach ($allProvince as $province)
            <tr>

                <td>{{$loop->index}}</td>
                <td>{{ $province->province_number }}</td>
                <td>{{ $province->province_name }}</td>
                <td>

                </td>
            </tr>
        @endforeach
    </table>


@endsection
