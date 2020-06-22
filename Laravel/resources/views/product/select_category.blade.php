@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card align-content-between">
                    <div class="card-header">Select Category:</div>
                    <div class="card-body">
                        <div class="row">
                            @foreach($categories as $category)
                                <div class="col-md-6">
                                    <div class="card bg-info mt-4 text-center" >
                                        <div class="card-body ">
                                            <h2 class="card-title">{{$category->category_name}}  <i class="fas fa-{{$category->icon_name}} text-light"></i></h2>
                                                <div class="card align-content-between bg-primary">
                                                    <div class="card-header ">Select Sub-Category:</div>
                                                        <div class="card-body">
                                                            <div class="row">
                                                                @foreach($category->subCategories as $subCategory)
                                                                    <div class="col-md-6">
                                                                        <a href='{{route('products.select',$subCategory->id)}}' class="btn btn-success"> {{$subCategory->category_name}} </a>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
