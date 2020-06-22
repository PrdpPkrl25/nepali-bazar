@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card align-content-between" style="margin-top: 10px">
                    <div class="card-header">Cart Item:</div>
                    <div class="card-body">
                        <div class="row">
                                <table class="table table-bordered">
                                    <tbody>
                                    @foreach($cart->products as $product)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>

                                            <td class="text-center">
                                                @php($image=$product->image_name?$product->image_name:'noimage.jpg')
                                                <img src="{{asset('product/'.$image)}}" height="150" width="150" alt="product_image">
                                            </td>
                                            <td><a class="product-name" href='{{route('product.show',$product->pivot->product_id)}}'>{{$product->product_name}}</a><br> {{$product->pivot->quantity}} {{$product->pivot->measure_unit}}</td>
                                            <td>Rs {{$product->pivot->net_price}}</td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th></th>
                                            <th></th>
                                            <th>Total Price:</th>
                                            <th>Rs {{$total_price}}</th>

                                        </tr>

                                    </tfoot>
                                </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
