@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card bg-light text-center " style="margin-top: 30px" >
                    <div class="card-header">Order Confirmation:</div>
                    <div class="card-body">
                        <p class="font-weight-bold" style="font-size: 1.2em" >Thank You <span style="font-size: 1.2em">{{$name}}</span>,<br>  Your order of Rs {{$total_amount}} has been placed. Click to see your order:<br>  </p>
                        <a class="btn btn-info mt-2" href="{{route('order.confirmed',$cart_session_id)}}"> Order Detail</a>
                    </div>
                    </a>
                </div>



            </div>
        </div>
    </div>
@endsection
