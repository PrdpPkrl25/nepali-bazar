@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card align-content-between" style="margin-top: 100px">
                    <div class="card-header">Select Product:</div>
                    <div class="card-body">
                        <div class="flash-message"></div>
                            <div class="row ">
                                <div class="col-md-4 ">
                                    @php($image=$product->image_name?$product->image_name:'noimage.jpg')
                                    <img src="{{asset('product/'.$image)}}" height="200" width="auto" alt="product_image">
                                </div>

                                <div class="col-md-4  text-right ">
                                    <div class="card bg-light  text-center" style="cursor: pointer;margin-top: 10px" >
                                            <div class="card-body">
                                                <h2 class="product-title">{{$product->product_name}}, {{$product->base_quantity}} {{$product->measure_unit}} </h2>
                                                <h2 class="product-price">Price: Rs {{$product->price}} </h2>
                                                <h2 class="shop-name">by <a href="{{route('shop.select',$shop->id)}}">{{$shop->shop_name}}</a> </h2>
                                                <button class="btn btn-warning mt-2" id="{{$product->id}}">Add to Cart</button>
                                            </div>
                                        </a>
                                    </div>
                                </div>

                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')

    <script type="text/javascript">
        $(document).ready(function () {
            $(".btn").on('click',function (e) {
                e.preventDefault();
                var productId = $(this).attr('id');
                $.ajax({
                    type: 'POST',
                    url: '/web/cart/' + productId ,
                    headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
                    dataType: 'html',
                    success: function (data) {
                        $('div.flash-message').html(data).fadeIn(1000).delay(2000).fadeOut(350);

                        @if(session()->has('cart'))
                            $('#item-count').html('{{count(session()->get('cart')->products)}} item')
                        @endif


                    },
                })
                ;
            });
        });

    </script>
@endsection
