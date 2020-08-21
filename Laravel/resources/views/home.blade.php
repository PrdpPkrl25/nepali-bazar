@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card align-content-between" style="margin-top: 10px">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
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
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button"
                           data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button"
                           data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>

                    <div class="card-header">Food Product:</div>
                    <div class="card-body">
                        <div class="card-columns">
                            @foreach($foodProducts as $foodProduct)
                                <div class="card bg-light  text-center " style="margin-top: 10px">
                                    <a href='{{route('product.show',$foodProduct->id)}}'>
                                        @php($image=$foodProduct->image_name?$foodProduct->image_name:'noimage.jpg')
                                        <img src="{{asset('product/'.$image)}}" class="card-img-top  "
                                             height="180" width="auto" alt="product_image">
                                    </a>
                                    <div class="card-body">
                                        <a href='{{route('product.show',$foodProduct->id)}}'><h2
                                                class="product-title">{{$foodProduct->product_name}} </h2></a>
                                        <h3 class="product-price"> {{$foodProduct->quantity}} {{$foodProduct->measure_unit}}
                                            , Rs {{$foodProduct->price}} </h3>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="card-header">Grocery Product:</div>
                    <div class="card-body">
                        <div class="card-columns">
                            @foreach($groceryProducts as $groceryProduct)
                                <div class="card bg-light  text-center " style="margin-top: 10px">
                                    <a href='{{route('product.show',$groceryProduct->id)}}'>
                                        @php($image=$groceryProduct->image_name?$groceryProduct->image_name:'noimage.jpg')
                                        <img src="{{asset('product/'.$image)}}" class="card-img-top  "
                                             height="180" width="auto" alt="product_image">
                                    </a>
                                    <div class="card-body">
                                        <a href='{{route('product.show',$groceryProduct->id)}}'><h2
                                                class="product-title">{{$groceryProduct->product_name}} </h2>
                                        </a>
                                        <h3 class="product-price"> {{$groceryProduct->quantity}} {{$groceryProduct->measure_unit}}
                                            , Rs {{$groceryProduct->price}} </h3>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="card-header">Medicine Product:</div>
                    <div class="card-body">
                        <div class="card-columns">
                            @foreach($medicineProducts as $medicineProduct)
                                <div class="card bg-light  text-center " style="margin-top: 10px">
                                    <a href='{{route('product.show',$medicineProduct->id)}}'>
                                        @php($image=$medicineProduct->image_name?$medicineProduct->image_name:'noimage.jpg')
                                        <img src="{{asset('product/'.$image)}}" class="card-img-top  "
                                             height="180" width="auto" alt="product_image">
                                    </a>
                                    <div class="card-body">
                                        <a href='{{route('product.show',$medicineProduct->id)}}'><h2
                                                class="product-title">{{$medicineProduct->product_name}} </h2>
                                        </a>
                                        <h3 class="product-price"> {{$medicineProduct->quantity}} {{$medicineProduct->measure_unit}}
                                            , Rs {{$medicineProduct->price}} </h3>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>


                    <div class="card-header">Shops</div>
                    <div class="card-body mb-5">
                        <div class="card-columns">
                            @foreach($shops as $shop)
                                <div class="card bg-light  text-center " style="margin-top: 10px">
                                    <a href="{{route('shop.select',$shop->id)}}">
                                        @php($image=$shop->image_name?$shop->image_name:'noimage.jpg')
                                        <img src="{{asset('shop/'.$image)}}" class="card-img-top  " height="180"
                                             width="auto" alt="shop_image">
                                    </a>
                                    <div class="card-body">
                                        <h2 class="shop-name"><a
                                                href="{{route('shop.select',$shop->id)}}">{{$shop->shop_name}}</a>
                                        </h2>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
