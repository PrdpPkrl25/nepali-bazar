@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card align-content-between">
                    <div class="card-header"> Delivery Details:</div>
                    <div class="card-body">
                        <div class="card bg-light text-center " style="margin-top: 20px">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-md-6">Order No: #{{$order->id}}</div>
                                    <div class="col-md-6"> Shipping Address:<br>
                                        <span class="mt-4">
                                            {{$order->locality}} {{$order->municipal}}
                                            -{{$order->ward_number}}, {{$order->district}}
                                         </span>
                                    </div>
                                </div>
                            </div>

                            <div class="card bg-light text-center " style="margin-top: 20px">
                                <div class="card-header">
                                    Delivery Information
                                </div>

                            <div class=" card-body">
                                <form method="post" action="#"
                                      enctype="multipart/form-data">
                                    @csrf
                                            <div class="form-group row ">
                                                <label for="name"
                                                       class="col-md-4 col-form-label text-md-right font-weight-bolder">{{ __('Delivery Fee:') }}</label>

                                                <div class="col-md-6">
                                                    <input id="name" type="text" class="form-control text-center" name="name"
                                                           value="{{$order->delivery_charge}}"
                                                           readonly>
                                                </div>
                                            </div>

                                            <div class="form-group row ">
                                                <label for="email"
                                                       class="col-md-4 col-form-label text-md-right font-weight-bolder">{{ __('Total Amount:') }}</label>

                                                <div class="col-md-6">
                                                    <input id="email" type="text" class="form-control text-center" name="email"
                                                           value="{{$order->total_amount}}" readonly>
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
