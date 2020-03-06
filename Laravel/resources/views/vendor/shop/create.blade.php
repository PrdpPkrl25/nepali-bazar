@extends('layout')
@section('content')
    <div class="jumbotron text-center">
        <h1>Shop Details </h1>
    </div>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Create Shop</h2>
            </div>
            <div class="pull-right">

            </div>
        </div>
    </div>
    <form action="{{ route('shops.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Shop Name</strong>
                    <input type="text" name="name"  class="form-control" placeholder="Enter Shop Name..">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Email ID</strong>
                    <input type="text" name="email"  class="form-control" placeholder="Enter Email Address..">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Shop Address</strong>
                    <input type="text" name="address"  class="form-control" placeholder="Enter Shop Address..">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Phone Number</strong>
                    <input type="text" name="phone"  class="form-control" placeholder="Enter Phone Number..">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>No of Flavour</strong>
                    <input type="text" name="no_of_flavour"  class="form-control" placeholder="Enter Number of Flavour available..">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>
@endsection
