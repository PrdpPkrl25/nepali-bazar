@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card align-content-between text-center ">
                    <div class="card-header">Product Listed:</div>
                    <div class="card-body ">
                        @if(!$products->isEmpty())
                        <div class="row">

                            <table class="table table-bordered table-hover text-center table-striped">
                                <tbody>
                                @foreach($products as $product)
                                    <tr>

                                        <td>{{$loop->iteration}}</td>

                                        <td>
                                            @php($image=$product->image_name?$product->image_name:'noimage.jpg')
                                            <img src="{{asset('product/'.$image)}}" height="150" width="150"
                                                 alt="product_image">
                                        </td>

                                        <td style="vertical-align: middle"><a class="product-name mt-4"
                                                                              href='{{route('product.show',$product->id)}}'>{{$product->product_name}}</a><br>
                                            Qty:  {{$product->base_quantity}} {{$product->measure_unit}} |
                                             Price: Rs {{$product->price}}
                                        </td>

                                        <td style="vertical-align: middle">
                                            <a class="btn btn-info" href="{{route('product.edit',$product->id)}}"><i class="fa fa-edit"></i></a>
                                        </td>

                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <a class="btn btn-info shadow border" href="{{route('product.create')}}">List More Product</a>
                        </div>
                        @else
                            <p class="font-weight-bold" style="font-size: 1.2em" > You haven't listed any product yet. Create a new product to list in Nepali Baazar.</p> <br>
                            <a class="btn btn-info shadow border" href="{{route('product.create')}}">List Product</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
@endsection
