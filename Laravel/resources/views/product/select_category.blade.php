@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card align-content-between" style="margin: 20px;margin-top: 100px">
                    <div class="card-header">Select Category:</div>
                    <div class="card-body">
                        <div class="row">
                                    @foreach($categories as $category)
                                        <div class="col-md-4">
                                            <div class="card bg-light mt-4 text-center" style="cursor: pointer;margin-top: 10px" >
                                                <a href='{{route('products.select',$category->id)}}'>
                                                <div class="card-body  ">
                                                    <h2 class="card-title">{{$category->category_name}}  <i class="fas fa-{{$category->icon_name}}"></i></h2>
                                                </div>
                                                </a>
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
