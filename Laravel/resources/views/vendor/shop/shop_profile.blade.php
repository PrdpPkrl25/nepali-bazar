@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card align-content-between"  style="margin-bottom: 50px">
                    <div class="card-header"> Shop Profile:</div>
                    <div class="card-body">
                        <div class="card bg-light text-center " style="margin-top: 20px" >
                            <div class="card-header">
                                <h3>{{$shop->shop_name}}</h3>
                            </div>
                            <div class=" card-body">
                                <form method="post" action="{{ route('shop.update',$shop->id) }}"
                                      enctype="multipart/form-data">
                                    @csrf
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
                                                       value="{{$shop->phone_number}}" >
                                            </div>
                                        </div>

                                        <div class="form-group row ">
                                            <label for="province"
                                                   class="col-md-4 col-form-label text-md-right font-weight-bolder">{{ __('Province Name:') }}</label>

                                            <div class="col-md-6">
                                                <input id="province" type="text" class="form-control text-center" name="province"
                                                       value="{{$shop->province->province_name}}">
                                            </div>
                                        </div>

                                        <div class="form-group row ">
                                            <label for="district"
                                                   class="col-md-4 col-form-label text-md-right font-weight-bolder">{{ __('District Name:') }}</label>

                                            <div class="col-md-6">
                                                <input id="district" type="text" class="form-control text-center" name="district"
                                                       value="{{$shop->district->district_name}}">
                                            </div>
                                        </div>

                                        <div class="form-group row ">
                                            <label for="municipal"
                                                   class="col-md-4 col-form-label text-md-right font-weight-bolder">{{ __('Municipal Name:') }}</label>

                                            <div class="col-md-6">
                                                <input id="municipal" type="text" class="form-control text-center" name="municipal"
                                                       value="{{$shop->municipal->municipal_name}}" >
                                            </div>
                                        </div>

                                        <div class="form-group row ">
                                            <label for="ward_number"
                                                   class="col-md-4 col-form-label text-md-right font-weight-bolder">{{ __('Ward Number:') }}</label>

                                            <div class="col-md-6">
                                                <input id="ward_number" type="text" class="form-control text-center" name="ward_number"
                                                       value="{{$shop->ward->ward_number}}">
                                            </div>
                                        </div>

                                        <div class="form-group row ">
                                            <label for="locality"
                                                   class="col-md-4 col-form-label text-md-right font-weight-bolder">{{ __('Locality:') }}</label>

                                            <div class="col-md-6">
                                                <input id="locality" type="text" class="form-control text-center" name="locality"
                                                       value="{{$shop->locality}}">
                                            </div>
                                        </div>


                                        <div class="form-group row ">
                                            <label for="min_order_price"
                                                   class="col-md-4 col-form-label text-md-right font-weight-bolder">{{ __('Minimum Order Price:') }}</label>

                                            <div class="col-md-6">
                                                <input id="min_order_price" type="text" class="form-control text-center" name="minimum_order_price"
                                                       value="{{$shop->minimum_order_price}}">
                                            </div>
                                        </div>

                                        <div class="form-group row ">
                                            <label for="delivery_charge"
                                                   class="col-md-4 col-form-label text-md-right font-weight-bolder">{{ __('Delivery Charge:') }}</label>

                                            <div class="col-md-6">
                                                <input id="delivery_charge" type="text" class="form-control text-center" name="delivery_charge"
                                                       value="{{$shop->delivery_charge}}">
                                            </div>
                                        </div>

                                        <div class="form-group row ">
                                            <label for="shop_image_name"
                                                   class="col-md-4 col-form-label text-md-right font-weight-bolder">{{ __('Shop Profile Image:') }}</label>

                                            <div class="col-md-6">
                                                <input id="shop_image_name" type="file" class="form-control text-center" name="shop_image_name"
                                                       value="{{$shop->image_name}}">
                                            </div>
                                        </div>


                                        <div class="form-group row mb-4" style="margin-top: 20px">
                                            <div class="col-md-5 offset-md-5">
                                                <button type="submit" class="btn btn-primary">
                                                    {{ __('Save') }}
                                                </button>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-md-4">
                                        @php($image=$shop->image_name?$shop->image_name:'noimage.jpg')
                                        <img src="{{asset('shop/'.$image)}}" height="200" width="200"
                                             alt="shop_image">
                                    </div>




                                </div>
                                </form>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
