@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card align-content-between text-center" style="margin-bottom: 50px">
                    <div class="card-header"> My Orders:</div>
                    <div class="card-body">
                        @if(!$orders->isEmpty())
                            @foreach($orders as $order)
                            <div class="card bg-light text-center " style="margin-top: 20px" >
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-md-3"> Product Of: <br><span style="font-size: 1em">{{$order->cart->shop->shop_name}}</span> </div>
                                        <div class="col-md-3"> Order Date:<br> <span style="font-size: 1em">{{date_create($order->order_date)->format('Y-m-d')}}</span></div>
                                        <div class="col-md-3"> Order Price:<br> <span style="font-size: 1em">Rs {{$order->total_amount}}</span> </div>
                                        <div class="col-md-3">Order No:<span style="font-size: 1em"> #{{$order->id}} </span> <br> <a href="{{route('order.show',$order->id)}}" style="cursor: pointer;">Order Details </a></div>
                                    </div>
                                </div>
                                @foreach($order->cart->products()->get() as $product)
                                <div class="card-body">
                                    <div class="row">
                                    <a class="col-md-2" href='{{route('product.show',$product->id)}}'>
                                        @php($image=$product->image_name?$product->image_name:'noimage.jpg')
                                        <img src="{{asset('product/'.$image)}}" class="card-img-top  " height="100" width="auto" alt="product_image">
                                    </a>

                                    <a class="col-md-5 "  href='{{route('product.show',$product->id)}}'> <h2 class="product-title">{{$product->product_name}} </h2> </a>

                                    <h3 class="product-price col-md-5"> {{$product->pivot->quantity}} {{$product->measure_unit}}, Rs {{$product->pivot->net_price}} </h3>
                                    </div>
                                </div>
                                    <hr style="height:1px;border-width:0;background-color:rgba(0, 0, 0, 0.125);margin-top: 0;margin-bottom: 0">
                                @endforeach
                            </div>
                            @endforeach
                        @else
                            @if(\Illuminate\Support\Facades\Auth::user()->hasRole('customer'))
                                <p class="font-weight-bold" style="font-size: 1.2em" >
                                You haven't ordered anything yet. Checkout items in the Cart.</p>
                                <a class="btn btn-light shadow border" href="{{route('home')}}">CONTINUE SHOPPING</a>
                            @elseif(\Illuminate\Support\Facades\Auth::user()->hasRole('owner'))
                                <p class="font-weight-bold" style="font-size: 1.2em" >
                                    You haven't received any order yet. List your product in Nepali Bazar.</p>
                                <a class="btn btn-light shadow border" href="{{route('product.create')}}">ADD PRODUCT</a>
                            @endif
                        @endif
                        </div>

                </div>
            </div>
        </div>
    </div>
@endsection
