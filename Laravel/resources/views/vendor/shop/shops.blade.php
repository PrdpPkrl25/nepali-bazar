@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card align-content-between"  style="margin-bottom: 50px">
                    <div class="card-header">
                        <h4>My Shops</h4>
                    </div>
                    <div class="card-body">
                        @if(!$shops->isEmpty())
                            @foreach($shops as $shop)
                                <div class="card bg-light text-center " style="margin-top: 20px" >
                                    <div class="card-header">
                                        <div  class="row">
                                            <div class="col-md-6"></div>
                                            <div class="col-md-6 text-right">
                                                <a href="{{route('shop.info',$shop->id)}}">Shop Detail</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class=" card-body">

                                        <div class="row" >
                                            <div class="col-md-6">
                                                <div class="form-group row" >
                                                        <label for="name"
                                                               class="col-md-4 col-form-label text-md-right font-weight-bolder">{{ __('Shop Name:') }}</label>

                                                        <div class="col-md-6">
                                                            <input id="name" type="text" class="form-control text-center" name="name"
                                                                   value="{{$shop->shop_name}}"
                                                                   readonly>
                                                        </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                @php($image=$shop->image_name?$shop->image_name:'noimage.jpg')
                                                <img src="{{asset('shop/'.$image)}}" height="200" width="200"
                                                     alt="shop_image">
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            @endforeach
                            <a class="btn btn-info shadow border mt-2 offset-5"  href="{{route('shop.create')}}">Store New Shop</a>
                        @else
                            <p class="font-weight-bold" style="font-size: 1.2em" > You haven't stored your shop yet. Store your shop in Nepali Baazar.</p> <br>
                            <a class="btn btn-info shadow border" href="{{route('shop.create')}}">Store Shop</a>
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
