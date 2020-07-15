@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                Dear {{$orderName}},<br>
                Your order of Rs {{$orderPrice}} has been placed.<br>
                Click to see your order:
            </div>
        </div>
    </div>
@endsection
