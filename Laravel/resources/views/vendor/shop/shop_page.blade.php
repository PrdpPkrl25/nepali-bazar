@extends('layouts.app')

@section('content')
    <div class="container mb-5">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card align-content-between" style="margin-top: 10px">
                    <div class="card-header">{{$shop->shop_name}} Shop's Products:</div>
                    <div class="card-body">
                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img class="d-block w-100" src="{{asset('banner/2.jpg')}}" alt="First slide">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="{{asset('banner/2.jpg')}}" alt="Second slide">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="{{asset('banner/2.jpg')}}" alt="Third slide">
                                </div>
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>

                        <div class="card-columns">
                            @foreach($products as $product)
                                <div class="card bg-light  text-center " style="margin-top: 10px" >
                                    <a href='{{route('product.show',$product->id)}}'>
                                        @php($image=$product->image_name?$product->image_name:'noimage.jpg')
                                        <img src="{{asset('product/'.$image)}}" class="card-img-top  " height="180" width="auto" alt="product_image">
                                    </a>
                                    <div class="card-body">
                                        <h2 class="product-title">{{$product->product_name}} </h2>
                                        <h2 class="product-price"> {{$product->quantity}} {{$product->measure_unit}}, Rs {{$product->price}} </h2>
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
