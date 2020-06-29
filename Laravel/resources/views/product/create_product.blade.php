@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card align-content-between" style="margin: 20px;margin-top: 100px">
                    <div class="card-header">Create Product</div>
                    <form method="post" action="{{ route('product.store') }}" style="margin: 20px" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row" >
                            <div class="col-md-6 offset-md-3">
                                <strong>Product Name:</strong>
                                <input type="text" name="product_name"  class="form-control mt-2" placeholder="Enter Product Name..">
                            </div>
                        </div>

                        <div class="form-group row" >
                            <div class="col-md-6 offset-md-3">
                                <strong>Category:</strong>
                                <select id="category_id" name="category_id" class="form-control mt-2">
                                    <option value="">Choose Category</option>
                                   @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->category_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>



                        <div class="form-group row" >
                            <div class="col-md-6 offset-md-3">
                                <strong>Base Quantity:</strong>
                                <input type="text" name="base_quantity"  class="form-control mt-2" placeholder="Enter Quantity">
                            </div>
                        </div>

                        <div class="form-group row" >
                            <div class="col-md-6 offset-md-3">
                                <strong>Measure Unit:</strong>
                                <input type="text" name="measure_unit"  class="form-control mt-2" placeholder="Enter Measure Unit..">
                            </div>
                        </div>

                        <div class="form-group row" >
                            <div class="col-md-6 offset-md-3">
                                <strong>Price:</strong>
                                <input type="text" name="price"  class="form-control mt-2" placeholder="Enter Price">
                            </div>
                        </div>

                        <div class="form-group row" >
                            <div class="col-md-6 offset-md-3">
                                <strong>Product Of:</strong>
                                <select id="category_id" name="category_id" class="form-control mt-2">
                                    @foreach($shops as $shop)
                                        <option value="{{$shop->id}}">{{$shop->shop_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row" >
                            <div class="col-md-6 offset-md-3">
                                <strong>Product Image:</strong>
                                <input type="file" name="product_image_name"  class="form-control mt-2">
                            </div>
                        </div>

                        <div class="form-group row mb-0" style="margin-top: 20px">
                            <div class="col-md-6 offset-md-5">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Create') }}
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
