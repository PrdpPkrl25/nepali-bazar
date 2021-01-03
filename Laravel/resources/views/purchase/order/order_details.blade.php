@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card align-content-between">
                    <div class="card-header"> Order Details:</div>
                    <div class="card-body">
                        <div class="card bg-light text-center " style="margin-top: 20px">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-md-4">
                                        Shipping Address:<br>
                                        <span class="mt-4">
                                            {{$order->locality}} {{$order->municipal}}
                                            -{{$order->ward_number}}, {{$order->district}}
                                        </span>
                                        <br>
                                        <a href="{{route('delivery.detail',$order->id)}}" style="cursor: pointer;">Delivery Details </a>
                                    </div>
                                    <div class="col-md-4">
                                        Payment Method:<br> <span class="mt-4">{{$order->payment_method}}</span>
                                    </div>
                                    <div class="col-md-4 text-center">
                                         Order Summary:<br>
                                        <div class="row mt-2">
                                            <span
                                                class="col-md-6 font-weight-bolder">Price({{$item_count}} item): </span>
                                            <span class="col-md-6 font-weight-bolder">Rs {{$order->total_price}}</span>
                                        </div>

                                        <div class="row mt-2">
                                            <span class="col-md-6 font-weight-bolder">Delivery Fee: </span>
                                            <span class="col-md-6 font-weight-bolder">{{ $order->delivery_charge }}</span>
                                        </div>
                                        <hr style="height:1px;border-width:0;color:lightgrey;background-color:gray;width: 95%">
                                        <div class="row">
                                            <span class="col-md-6 font-weight-bolder">Total Amount: </span>
                                            <span class="col-md-6 font-weight-bolder">Rs {{$order->total_amount }}</span>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card bg-light text-center " style="margin-top: 20px">
                            <div class="card-header"><h3>{{$item_count}} Item </h3></div>
                            @foreach($order->cart->products()->get() as $product)
                                <div class="row card-body">

                                    <a class="col-md-2" href='{{route('product.show',$product->id)}}'>
                                        @php($image=$product->image_name?$product->image_name:'noimage.jpg')
                                        <img src="{{asset('product/'.$image)}}" class="card-img-top  " height="100"
                                             width="auto" alt="product_image">
                                    </a>

                                    <a class="col-md-5 " href='{{route('product.show',$product->id)}}'><h2
                                            class="product-title">{{$product->product_name}} </h2></a>

                                    <h3 class="product-price col-md-5"> {{$product->pivot->quantity}} {{$product->measure_unit}}
                                        , Rs {{$product->pivot->net_price}} </h3>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
