@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card align-content-between" style="margin-top: 10px;margin-bottom: 50px">
                    <div class="card-header">Search Result:</div>
                    <div class="card-body">
                            <div class="card-header">Related Product:</div>
                                @foreach($products as $product)
                                    <div class="card bg-light  text-center " style="margin-top: 10px" >
                                        <div class="card-body">
                                            <div class="row" style="display: flex; justify-content: center; align-items: center;">
                                                <div class="col-md-2 text-left">
                                                    <a href='{{route('product.show',$product->id)}}'>
                                                        @php($image=$product->image_name?$product->image_name:'noimage.jpg')
                                                        <img src="{{asset('product/'.$image)}}" class="card-img-top  " height="100" width="100" alt="product_image">
                                                    </a>
                                                </div>
                                                <div class="col-md-10">
                                                    <a href='{{route('product.show',$product->id)}}'> <h2 class="product-title">{{$product->product_name}} </h2> </a>
                                                    <h3 class="product-price"> {{$product->quantity}} {{$product->measure_unit}}, Rs {{$product->price}} </h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                        <div class="card-header" style="margin-top: 10px">Related Shop:</div>
                                @foreach($shops as $shop)
                                    <div class="card bg-light  text-center " style="margin-top: 10px" >
                                        <div class="card-body">
                                            <div class="row" style="display: flex; justify-content: center; align-items: center;">
                                                <div class="col-md-2 text-left">
                                                    <a href='{{route('shop.select',$shop->id)}}'>
                                                        @php($image=$shop->image_name?$shop->image_name:'noimage.jpg')
                                                        <img src="{{asset('product/'.$image)}}" class="card-img-top img-fluid " alt="shop_image">
                                                    </a>
                                                </div>
                                                <div class="col-md-10" style="">
                                                    <a href='{{route('shop.select',$shop->id)}}'> <h2 class="product-title">{{$shop->shop_name}} </h2> </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
