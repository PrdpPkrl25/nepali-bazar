@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card align-content-between"  style="margin-bottom: 50px">
                    <div class="card-header"> Shops Profile:</div>
                    <div class="card-body">
                        @if(!$shops->isEmpty())
                        @foreach($shops as $shop)
                        <div class="card bg-light text-center " style="margin-top: 20px" >
                            <div class="card-header">
                                <h3>{{$shop->shop_name}}</h3>
                            </div>
                            <div class=" card-body">

                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group row ">
                                            <label for="name"
                                                   class="col-md-4 col-form-label text-md-right font-weight-bolder">{{ __('Shop Name:') }}</label>

                                            <div class="col-md-6">
                                                <input id="name" type="text" class="form-control text-center" name="name"
                                                       value="{{$shop->shop_name}}"
                                                       readonly>
                                            </div>
                                        </div>

                                        <div class="form-group row ">
                                            <label for="email"
                                                   class="col-md-4 col-form-label text-md-right font-weight-bolder">{{ __('Email:') }}</label>

                                            <div class="col-md-6">
                                                <input id="email" type="text" class="form-control text-center" name="email"
                                                       value="{{$shop->email}}" readonly>
                                            </div>
                                        </div>

                                        <div class="form-group row ">
                                            <label for="phone"
                                                   class="col-md-4 col-form-label text-md-right font-weight-bolder">{{ __('Phone Number:') }}</label>

                                            <div class="col-md-6">
                                                <input id="phone" type="text" class="form-control text-center" name="phone_number"
                                                       value="{{$shop->phone_number}}" readonly>
                                            </div>
                                        </div>

                                        <div class="form-group row ">
                                            <label for="province"
                                                   class="col-md-4 col-form-label text-md-right font-weight-bolder">{{ __('Province Name:') }}</label>

                                            <div class="col-md-6">
                                                <input id="province" type="text" class="form-control text-center" name="province"
                                                       value="{{$shop->province->province_name}}" readonly>
                                            </div>
                                        </div>

                                        <div class="form-group row ">
                                            <label for="district"
                                                   class="col-md-4 col-form-label text-md-right font-weight-bolder">{{ __('District Name:') }}</label>

                                            <div class="col-md-6">
                                                <input id="district" type="text" class="form-control text-center" name="district"
                                                       value="{{$shop->district->district_name}}" readonly>
                                            </div>
                                        </div>

                                        <div class="form-group row ">
                                            <label for="municipal"
                                                   class="col-md-4 col-form-label text-md-right font-weight-bolder">{{ __('Municipal Name:') }}</label>

                                            <div class="col-md-6">
                                                <input id="municipal" type="text" class="form-control text-center" name="municipal"
                                                       value="{{$shop->municipal->municipal_name}}" readonly>
                                            </div>
                                        </div>

                                        <div class="form-group row ">
                                            <label for="ward_number"
                                                   class="col-md-4 col-form-label text-md-right font-weight-bolder">{{ __('Ward Number:') }}</label>

                                            <div class="col-md-6">
                                                <input id="ward_number" type="text" class="form-control text-center" name="ward_number"
                                                       value="{{$shop->ward->ward_number}}" readonly>
                                            </div>
                                        </div>

                                        <div class="form-group row ">
                                            <label for="locality"
                                                   class="col-md-4 col-form-label text-md-right font-weight-bolder">{{ __('Locality:') }}</label>

                                            <div class="col-md-6">
                                                <input id="locality" type="text" class="form-control text-center" name="locality"
                                                       value="{{$shop->locality}}" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
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
