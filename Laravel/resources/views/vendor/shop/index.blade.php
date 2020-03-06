@extends('layout')

@section('content')
    <div class="jumbotron text-center">
        <h1>Shop Details </h1>
    </div>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>All Shop</h2>
            </div>
            <div class="pull-right">

            </div>
        </div>
    </div>

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Shop Name</th>
            <th>Email ID</th>
            <th>Shop Address</th>
            <th>Phone Number</th>
            <th>No of Flavour</th>
            <th width="250px">Action</th>
        </tr>

        @foreach ($allShop as $shop)
            <tr>

                <td>{{$loop->index}}</td>
                <td>{{$shop->name}}</td>
                <td>{{$shop->email}}</td>
                <td>{{$shop->address}}</td>
                <td>{{$shop->phone}}</td>
                <td>{{$shop->no_of_flavour}}</td>
                <td>
                    <a href="{{route('shops.edit',$shop->id)}}">Update</a>
                    <a href="{{route('shops.show',$shop->id)}}">Show</a>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
