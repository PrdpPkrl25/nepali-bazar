@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card align-content-between">
                    <div class="card-header">Cart Item:</div>
                    <div class="card-body">
                        <div class="row text-center">
                            <table class="table table-bordered table-hover text-center table-striped">
                                <tbody>
                                @foreach($cart->products as $product)
                                    <tr>

                                        <td>{{$loop->iteration}}</td>

                                        <td>
                                            @php($image=$product->image_name?$product->image_name:'noimage.jpg')
                                            <img src="{{asset('product/'.$image)}}" height="150" width="150"
                                                 alt="product_image">
                                        </td>

                                        <td style="vertical-align: middle"><a class="product-name mt-4"
                                                                              href='{{route('product.show',$product->pivot->product_id)}}'>{{$product->product_name}}</a><br>
                                            Qty: <select value="{{$product->pivot->product_id}}" id="quantity"
                                                         class="mt-2 mr-2 quantity_change">
                                                <option
                                                    value=" ">{{$product->pivot->quantity}} {{$product->pivot->measure_unit}}</option>
                                                @for($i=1;$i<=10;$i++)
                                                    <option
                                                        value="{{$i}}">{{$i}} {{$product->pivot->measure_unit}}</option>
                                                @endfor
                                            </select> |
                                            <button class="ml-2 btn btn-danger remove_product"
                                                    value="{{$product->pivot->product_id}}"><i class="fa fa-remove"></i>
                                            </button>
                                        </td>

                                        <td style="vertical-align: middle"
                                            id="net_price_{{$product->pivot->product_id}}">
                                            Rs {{$product->pivot->net_price}}</td>

                                    </tr>
                                @endforeach

                                </tbody>
                                <tfoot>
                                <tr class="text-center">
                                    <th></th>
                                    <th></th>
                                    <th>Total Price:</th>
                                    <th id="total_price">Rs {{$total_price}}</th>

                                </tr>

                                </tfoot>
                            </table>
                            <p value="{{session()->get('cart')->id}}" id="cart_id" style="display: none"></p>
                            <a class="btn btn-light shadow border offset-md-1" href="{{'/web/home'}}">CONTINUE SHOPPING</a>
                            <a class="btn btn-warning shadow border offset-md-6" href="{{route('order.create')}}">PROCEED TO CHECKOUT </a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript">
        jQuery('.quantity_change').change(function (e) {
            e.preventDefault();
            var cartId = $('#cart_id').attr('value');
            var productId = $(this).attr('value');
            var quantity = $(this).find("option:selected").val();
            jQuery.ajax({
                url: '/web/cart/' + cartId + '/' + productId,
                method: 'POST',
                headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
                data: {'quantity': quantity},
                dataType: 'json',
                success: function (result) {
                    $(function () {
                        $('#total_price').html(result.total_price);
                        var html_id = '#net_price_' + productId;
                        $(this).find(html_id).html(result.net_price);
                    });
                }
            });
        });

        $(document).ready(function () {
            $(".remove_product").on('click', function (e) {
                e.preventDefault();
                var cartId = $('#cart_id').attr('value');
                var productId = $(this).attr('value');
                $.ajax({
                    type: 'POST',
                    url: '/web/cart/delete/' + cartId + '/' + productId,
                    headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
                    dataType: 'html',
                    success: function (data) {
                        location.reload();
                    },
                })
                ;
            });
        });


    </script>
@endsection
