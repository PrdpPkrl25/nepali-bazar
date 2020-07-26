@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card align-content-between">
                    <div class="card-header"> My Profile:</div>
                    <div class="card-body">
                            <div class="card bg-light text-center " style="margin-top: 20px" >
                                <div class="card-header">
                                        <h3>Personal Information: </h3>
                                </div>
                                    <div class=" card-body">
                                        <div class="form-group row ">
                                            <label for="name"
                                                   class="col-md-4 col-form-label text-md-right font-weight-bolder">{{ __('Name:') }}</label>

                                            <div class="col-md-4">
                                                <input id="name" type="text" class="form-control" name="name"
                                                       value="{{$user->name}}" required
                                                       autocomplete="name" autofocus>
                                            </div>
                                        </div>

                                        <div class="form-group row ">
                                            <label for="email"
                                                   class="col-md-4 col-form-label text-md-right font-weight-bolder">{{ __('Email:') }}</label>

                                            <div class="col-md-4">
                                                <input id="email" type="text" class="form-control" name="email"
                                                       value="{{$user->email}}" required
                                                       autocomplete="email" autofocus>
                                            </div>
                                        </div>

                                        <div class="form-group row ">
                                            <label for="phone"
                                                   class="col-md-4 col-form-label text-md-right font-weight-bolder">{{ __('Phone Number:') }}</label>

                                            <div class="col-md-4">
                                                <input id="phone" type="text" class="form-control" name="phone_number"
                                                       value="{{$user->phone_number}}" required
                                                       autocomplete="phone-number" autofocus>
                                            </div>
                                        </div>
                                    </div>

                            </div>

                            <div class="card bg-light text-center " style="margin-top: 20px" >
                                <div class="card-header">
                                    <h3 >Address: </h3>
                                </div>
                                <div class="card-body">
                                    <div class="form-group row ">
                                        <label for="province"
                                               class="col-md-4 col-form-label text-md-right font-weight-bolder">{{ __('Province Name:') }}</label>

                                        <div class="col-md-4">
                                            <input id="province" type="text" class="form-control " name="province"
                                                   value="{{$user->province->province_name}}" required
                                                   autocomplete="province" autofocus>
                                        </div>
                                    </div>

                                    <div class="form-group row ">
                                        <label for="district"
                                               class="col-md-4 col-form-label text-md-right font-weight-bolder">{{ __('District Name:') }}</label>

                                        <div class="col-md-4">
                                            <input id="district" type="text" class="form-control " name="district"
                                                   value="{{$user->district->district_name}}" required
                                                   autocomplete="district-name" autofocus>
                                        </div>
                                    </div>

                                    <div class="form-group row ">
                                        <label for="municipal"
                                               class="col-md-4 col-form-label text-md-right font-weight-bolder">{{ __('Municipal Name:') }}</label>

                                        <div class="col-md-4">
                                            <input id="municipal" type="text" class="form-control" name="municipal"
                                                   value="{{$user->municipal->municipal_name}}" required
                                                   autocomplete="municipal-name" autofocus>
                                        </div>
                                    </div>

                                    <div class="form-group row ">
                                        <label for="ward_number"
                                               class="col-md-4 col-form-label text-md-right font-weight-bolder">{{ __('Ward Number:') }}</label>

                                        <div class="col-md-4">
                                            <input id="ward_number" type="text" class="form-control" name="ward_number"
                                                   value="{{$user->ward->ward_number}}" required
                                                   autocomplete="ward-number" autofocus>
                                        </div>
                                    </div>

                                    <div class="form-group row ">
                                        <label for="locality"
                                               class="col-md-4 col-form-label text-md-right font-weight-bolder">{{ __('Locality:') }}</label>

                                        <div class="col-md-4">
                                            <input id="locality" type="text" class="form-control" name="locality"
                                                   value="{{$user->locality}}" required
                                                   autocomplete="locality" autofocus>
                                        </div>
                                    </div>
                                </div>

                            </div>


                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
