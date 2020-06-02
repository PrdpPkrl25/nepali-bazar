@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card align-content-between" style="margin: 20px;margin-top: 100px">
                    <div class="card-header">Select Product:</div>
                    <div class="card-body">
                            @foreach($products as $product)
                                <div class="row mt-4">
                                <div class="col-md-4 ">
                                    <div class="card bg-light  text-center" style="cursor: pointer;margin-top: 10px" >
                                        <a href='{{route('shops.select',$product->id)}}'>
                                            <div class="card-body ">
                                                <h2 class="card-title">{{$product->product_name}}  <i class="fas fa-coffee"></i></h2>
                                                <p class="card-text">{{$product->quantity}} {{$product->measure_unit}}</p>
                                                <p class="card-text">Price:{{$product->price}}</p>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                    <div class="col-md-8 text-right">
                                        <img src="{{asset('product/'.$product->image_name)}}" height="150" width="auto" alt="product_image">
                                    </div>
                                </div>
                            @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
