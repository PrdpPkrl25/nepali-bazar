@extends('location.layout')
@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="" method="POST">
        @csrf
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Locality Name</strong>
                    <input type="text" name="locality_name"  class="form-control" placeholder="Enter Locality Name..">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Municipal Name</strong>
                    <select class="form-control" id="municipal" name="municipal">
                    <option value="">Select</option>
                    <option value="Municipal 1">Municipal 1</option>
                    <option value="Municipal 2">Municipal 2</option>
                    <option value="Municipal 3">Municipal 3</option>
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>
@endsection
