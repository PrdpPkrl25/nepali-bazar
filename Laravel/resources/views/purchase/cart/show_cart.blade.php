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
                                                <img src="{{asset('product/'.$image)}}" height="150" width="150" alt="product_image">
                                            </td>

                                            <td style="vertical-align: middle"><a class="product-name mt-4" href='{{route('product.show',$product->pivot->product_id)}}'>{{$product->product_name}}</a><br>
                                                Qty: <select id="quantity" class="mt-2 mr-2">
                                                    <option  value="{{$product->pivot->quantity}}">{{$product->pivot->quantity}} {{$product->pivot->measure_unit}}</option>
                                                    <option  value="1">1 {{$product->pivot->measure_unit}}</option>
                                                    <option  value="2">2 {{$product->pivot->measure_unit}}</option>
                                                    <option  value="3">3 {{$product->pivot->measure_unit}}</option>
                                                    <option  value="4">4 {{$product->pivot->measure_unit}}</option>
                                                    <option  value="5">5 {{$product->pivot->measure_unit}}</option>
                                                    <option  value="6">6 {{$product->pivot->measure_unit}}</option>
                                                    <option  value="7">7 {{$product->pivot->measure_unit}}</option>
                                                    <option  value="8">8 {{$product->pivot->measure_unit}}</option>
                                                    <option  value="9">9 {{$product->pivot->measure_unit}}</option>
                                                    <option  value="10">10+ {{$product->pivot->measure_unit}}</option>
                                                </select>  |
                                                <button class="ml-2 btn btn-danger" ><i class="fa fa-remove"></i></button>
                                            </td>

                                            <td style="vertical-align: middle">Rs {{$product->pivot->net_price}}</td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                    <tfoot>
                                        <tr class="text-center">
                                            <th></th>
                                            <th></th>
                                            <th>Total Price:</th>
                                            <th>Rs {{$total_price}}</th>

                                        </tr>

                                    </tfoot>
                                </table>
                                <a class="btn btn-light shadow border offset-md-5" href="{{'/web/home'}}">CONTINUE SHOPPING</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript">
        jQuery('#quantity').change(function(e){
            e.preventDefault();
            jQuery.ajax({
                url: "{{ url('/web/ajax/getmunicipal') }}",
                method: 'get',
                data: {
                district_id: jQuery('#quantity').val(),
                },
                success: function(result){
                $(function () {
                    $('#municipal').empty();
                    $('#municipal').append('<option value="" disabled selected>Choose Municipal</option>');
                    for(var i=0;i<result.length;i++){
                    $('#municipal').append('<option value="'+result[i].id+'">'+result[i].municipal_name+'</option>');
                    }
                });
            }});
        });

    </script>
@endsection
