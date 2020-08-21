@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card align-content-between" style="margin-top: 50px;margin-bottom: 50px">
                    <div class="card-header">Edit Product</div>
                    <form method="post" action="{{ route('product.update',$product->id) }}"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="card bg-light text-center " style="padding: 20px">
                            <div class="card-header">
                                <h3>Product Detail: </h3>
                            </div>
                            <div class=" card-body">
                                <div class="form-group row mt-4">
                                    <div class="col-md-5 offset-md-3">
                                        <strong>Product Name:</strong>
                                        <input type="text" name="product_name" value="{{$product->product_name}}"
                                               class="form-control mt-2">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-5 offset-md-3">
                                        <strong>Category:</strong>
                                        <select id="category" name="category_id" class="form-control mt-2">
                                            <option
                                                value="{{$product->category_id}}">{{$product->category->category_name}}</option>
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}">{{$category->category_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-5 offset-md-3">
                                        <strong>Base Quantity:</strong>
                                        <input type="text" name="base_quantity" class="form-control mt-2"
                                               value="{{$product->base_quantity}}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-5 offset-md-3">
                                        <strong>Measure Unit:</strong>
                                        <input type="text" name="measure_unit" class="form-control mt-2"
                                               value="{{$product->measure_unit}}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-5 offset-md-3">
                                        <strong>Price:</strong>
                                        <input type="text" name="price" class="form-control mt-2"
                                               value="{{$product->price}}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-5 offset-md-3">
                                        <strong>Product Of:</strong>
                                        <select id="shop" name="shop_id" class="form-control mt-2">
                                            <option value="{{$product->shop_id}}">{{$product->shop->shop_name}}</option>
                                            @foreach($shops as $shop)
                                                <option value="{{$shop->id}}">{{$shop->shop_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-5 offset-md-3">
                                        <strong>Product Image:</strong>
                                        <input type="file" name="product_image_name" class="form-control mt-2"
                                               value="{{$product->image_name}}">
                                    </div>
                                </div>

                            </div>

                        </div>

                        <div class="card bg-light text-center " style="padding: 20px">
                            <div class="card-header">
                                <h3>Add Feature: </h3>
                            </div>
                            <div class="card-body">
                                <div class="appending_div form-group row">
                                    <div class="col-md-6 offset-md-3">
                                        @foreach($features as $feature)
                                        <strong>Feature Name:</strong>
                                        <input type="text" name="name[]" class="form-control mt-2" value="{{$feature->name}}">
                                        <strong>Description:</strong>
                                        <input type="text" name="description[]" class="form-control mt-2 mb-4" value="{{$feature->description}}">
                                        @endforeach
                                    </div>
                                </div>

                                <span class="fa fa-plus add" style="font-size: 1.2em"></span>
                            </div>

                        </div>

                        <div class="form-group row mb-4" style="margin-top: 20px">
                            <div class="col-md-5 offset-md-5">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Save') }}
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready(function () {
            $('.add').on('click', function () {
                var field = '<br><div class="col-md-6 offset-md-3">' +
                    '<strong>Feature Name:</strong> ' +
                    '<input type="text" name="name[]"  class="form-control mt-2"> ' +
                    ' <strong>Description:</strong> ' +
                    ' <input type="text" name="description[]"  class="form-control mt-2 mb-4">' +
                    '</div>';
                $('.appending_div').append(field);
            })
        })
    </script>
@endsection
