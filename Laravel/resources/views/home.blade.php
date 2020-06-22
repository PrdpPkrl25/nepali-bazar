@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        @include('flash::message')
                        <div class="row">
                            <div class="col-md-4">
                                <a class="btn btn-primary btn-lg" href="{{route('shops.create')}}">Create Shop</a>
                            </div>
                            <div class="col-md-4 text-center">
                                <a class="btn btn-primary btn-lg" href="{{route('category.select')}}">Select Category</a>
                            </div>
                            <div class="col-md-4 text-right">
                                <a class="btn btn-primary btn-lg" href="{{route('product.create')}}">Create Product</a>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
