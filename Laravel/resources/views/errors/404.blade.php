@extends('layouts.app')

@section('content')
    <div class="container" style="margin-top: 200px;">
        <div class="row text-center">
            <div class="col-lg-8 offset-lg-2 col-sm-8 offset-sm-2 col-12 p-3 error-main">
                <div class="row">
                    <div class="col-lg-10 col-12 col-sm-12 offset-lg-1 offset-sm-1">
                        <h1 class="m-0">404 Error!</h1>
                        <h6>The Page you requested was not found!</h6>
                        <a class="btn btn-outline-danger text-dark font-weight-bold" href="{{route('home')}}">Back to Home</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

