@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card align-content-between" style="margin-top: 10px;margin-bottom: 10px">
                    <div class="card-header">Select Product:</div>
                    <div class="card-body">
                        <div class="card-columns">
                            @foreach($products as $product)

                                    <div class="card bg-light  text-center " style="margin-top: 10px" >
                                        <a href='{{route('product.show',$product->id)}}'>
                                        @php($image=$product->image_name?$product->image_name:'noimage.jpg')
                                        <img src="{{asset('product/'.$image)}}" class="card-img-top  " height="180" width="auto" alt="product_image">
                                        </a>
                                            <div class="card-body">
                                                <a href='{{route('product.show',$product->id)}}'> <h2 class="product-title">{{$product->product_name}} </h2> </a>
                                               <h3 class="product-price"> {{$product->quantity}} {{$product->measure_unit}}, Rs {{$product->price}} </h3>
                                            </div>

                                    </div>

                            @endforeach
                        </div>
                    </div>
                </div>

            </div>
            {{ $products->links() }}
        </div>
    </div>
@endsection
