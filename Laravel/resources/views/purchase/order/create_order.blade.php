@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form method="POST" action="{{ route('order.store') }}">
                    @csrf

                    <div class="card align-content-between">
                        <div class="card-header">Personal Information:</div>
                        <div class="card-body">
                            <div class="text-center">

                                <div class="form-group row ">
                                    <label for="name"
                                           class="col-md-4 col-form-label text-md-right font-weight-bolder">{{ __('Full Name:') }}</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control " name="name"
                                               value="{{$user->name}}"  required
                                               autocomplete="name" autofocus>
                                    </div>
                                </div>

                                <div class="form-group row ">
                                    <label for="phone"
                                           class="col-md-4 col-form-label text-md-right font-weight-bolder">{{ __('Phone Number:') }}</label>

                                    <div class="col-md-6">
                                        <input id="phone" type="text" class="form-control " name="phone_number"
                                               value="{{$user->phone_number}}"
                                               required
                                               autocomplete="phone-number" autofocus>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="card align-content-between">
                        <div class="card-header">Delivery Address:</div>
                        <div class="card-body">
                            <div class="text-center">

                                <div class="form-group row ">
                                    <label for="district"
                                           class="col-md-4 col-form-label text-md-right font-weight-bolder">{{ __('District Name:') }}</label>

                                    <div class="col-md-6">
                                        <input id="district" type="text" class="form-control " name="district"
                                               value="{{$user->district->district_name}}" required
                                               autocomplete="district-name" autofocus>
                                    </div>
                                </div>

                                <div class="form-group row ">
                                    <label for="municipal"
                                           class="col-md-4 col-form-label text-md-right font-weight-bolder">{{ __('Municipal Name:') }}</label>

                                    <div class="col-md-6">
                                        <input id="district" type="text" class="form-control" name="municipal"
                                               value="{{$user->municipal->municipal_name}}" required
                                               autocomplete="municipal-name" autofocus>
                                    </div>
                                </div>

                                <div class="form-group row ">
                                    <label for="ward_number"
                                           class="col-md-4 col-form-label text-md-right font-weight-bolder">{{ __('Ward Number:') }}</label>

                                    <div class="col-md-6">
                                        <input id="ward_number" type="text" class="form-control" name="ward_number"
                                               value="{{$user->ward->ward_number}}" required
                                               autocomplete="ward-number" autofocus>
                                    </div>
                                </div>

                                <div class="form-group row ">
                                    <label for="locality"
                                           class="col-md-4 col-form-label text-md-right font-weight-bolder">{{ __('Locality:') }}</label>

                                    <div class="col-md-6">
                                        <input id="locality" type="text" class="form-control" name="locality"
                                               value="{{$user->locality}}" required
                                               autocomplete="locality" autofocus>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="card align-content-between">
                        <div class="card-header">Payment Method:</div>
                        <div class="card-body">
                            <div class="text-center">
                                <div class="form-group row">
                                    <input type="radio" id="cod" class="col-md-1 offset-md-4 mt-1"
                                           name="cashondelivery" value="Cash On Delivery" required>
                                    <label for="cod" class="col-md-4 font-weight-bolder">Cash On Delivery</label>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="form-group row ">
                            <a class="btn btn-danger shadow border mt-2" href="{{route('cart.show')}}">Go Back</a>
                            <button type="submit" class="btn btn-primary shadow border mt-2 offset-md-8">
                                {{ __('Place Order') }}
                            </button>


                    </div>

                </form>
            </div>

            <div class="col-md-4">
                <div class="card align-content-between">
                    <div class="card-header">Price Detail:</div>
                    <div class="card-body">
                        <div class="text-center">
                            <div class="row">
                                <span class="col-md-6 font-weight-bolder">Price: </span>
                                <span class="col-md-6 font-weight-bolder">Rs {{$total_price}}</span>
                            </div>

                            <div class="row mt-2">
                                <span class="col-md-6 font-weight-bolder">Delivery Fee: </span>
                                <span class="col-md-6 font-weight-bolder">{{ __('Free') }}</span>
                            </div>
                            <hr style="height:1px;border-width:0;color:lightgrey;background-color:gray;width: 90%">
                            <div class="row">
                                <span class="col-md-6 font-weight-bolder">Total Amount: </span>
                                <span class="col-md-6 font-weight-bolder">Rs {{$total_price }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
