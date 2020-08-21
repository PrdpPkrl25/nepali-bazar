@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card align-content-between" style="margin-bottom: 50px">
                    <div class="card-header">Create Shop</div>
                    <form method="post" action="{{ route('shops.store') }}" style="margin: 20px" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row" >
                            <div class="col-md-4 offset-md-4 mt-2">
                                <strong>Shop Name:</strong>
                                <input type="text" name="shop_name"  class="form-control mt-2" placeholder="Enter Shop Name..">
                            </div>
                        </div>

                        <div class="form-group row" >
                            <div class="col-md-4 offset-md-4">
                                <strong>Email Address:</strong>
                                <input type="text" name="email"  class="form-control mt-2" placeholder="Enter Email Address..">
                            </div>
                        </div>

                        <div class="form-group row" >
                            <div class="col-md-4 offset-md-4">
                                <strong>Phone Number:</strong>
                                <input type="text" name="phone_number"  class="form-control mt-2" placeholder="Enter Phone Number..">
                            </div>
                        </div>

                        <div class="form-group row " >
                            <div class="col-md-4 offset-md-4">
                                <strong >Select Province:</strong>
                                <select id="province" name="province_id" class="form-control mt-2">
                                    <option value=" " disabled="true" selected="true" >Choose Province</option>
                                    @foreach($allProvince as $province)
                                        <option value="{{$province->id}}">{{$province->province_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-4 offset-md-4">
                                <strong >Select District:</strong>
                                <select id="district" name="district_id" class="form-control mt-2">
                                    <option value=" " disabled="true" selected="true">Choose District</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-4 offset-md-4">
                                <strong >Select Municipal:</strong>
                                <select id="municipal" name="municipal_id" class="form-control mt-2">
                                    <option value=" " disabled="true" selected="true">Choose Municipal/VDC</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-4 offset-md-4">
                                <strong >Select Ward:</strong>
                                <select id="ward" name="ward_id" class="form-control mt-2" >
                                    <option value=" " disabled="true" selected="true">Choose Ward</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row" >
                            <div class="col-md-4 offset-md-4">
                                <strong>Locality(optional):</strong>
                                <input type="text" name="locality"  class="form-control mt-2" placeholder="Enter Your Locality..">
                            </div>
                        </div>

                        <div class="form-group row" >
                            <div class="col-md-4 offset-md-4">
                                <strong>Shop Image:</strong>
                                <input type="file" name="shop_image_name"  class="form-control mt-2">
                            </div>
                        </div>

                        <div class="form-group row mt-4" >
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

@section('script')
    <script type="text/javascript">

        jQuery(document).ready(function(){
            jQuery('#province').change(function(e){
                e.preventDefault();
                jQuery.ajax({
                    url: "{{ url('/web/ajax/getdistrict') }}",
                    method: 'get',
                    data: {
                        province_id: jQuery('#province').val(),
                    },
                    success: function(result){
                        $(function () {
                            $('#district').empty();
                            $('#municipal').empty();
                            $('#ward').empty();
                            $('#district').append('<option value="" disabled selected>Choose District</option>');
                            $('#municipal').append('<option value="" disabled selected>Choose Municipal</option>');
                            $('#ward').append('<option value="" disabled selected>Choose Ward</option>');
                            for(var i=0;i<result.length;i++){
                                $('#district').append('<option value="'+result[i].id+'">'+result[i].district_name+'</option>');
                            }


                        });

                    }});
            });

            jQuery('#district').change(function(e){
                e.preventDefault();
                jQuery.ajax({
                    url: "{{ url('/web/ajax/getmunicipal') }}",
                    method: 'get',
                    data: {
                        district_id: jQuery('#district').val(),
                    },
                    success: function(result){
                        $(function () {
                            $('#municipal').empty();
                            $('#ward').empty();
                            $('#ward').append('<option value="" disabled selected>Choose Ward</option>');
                            $('#municipal').append('<option value="" disabled selected>Choose Municipal</option>');
                            for(var i=0;i<result.length;i++){
                                $('#municipal').append('<option value="'+result[i].id+'">'+result[i].municipal_name+'</option>');
                            }


                        });

                    }});
            });

            jQuery('#municipal').change(function(e){
                e.preventDefault();
                jQuery.ajax({
                    url: "{{ url('/web/ajax/getward') }}",
                    method: 'get',
                    data: {
                        municipal_id: jQuery('#municipal').val(),
                    },
                    success: function(result){
                        $(function () {
                            $('#ward').empty();
                            $('#ward').append('<option value="" disabled selected>Choose Ward</option>');
                            for(var i=0;i<result.length;i++){
                                $('#ward').append('<option value="'+result[i].id+'" class="text-center">'+result[i].ward_number+'</option>');
                            }


                        });

                    }});
            });

        });


    </script>
@endsection
