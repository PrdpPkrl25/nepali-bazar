@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card align-content-between" style="margin: 20px;margin-top: 100px">
                    <div class="card-header">Select Your Location:</div>

                        <div class="form-group row mt-4" >
                            <div class="col-md-6 offset-md-3">
                                <select id="province" name="province" class="form-control">
                                    <option value="">Choose Province</option>
                                    @foreach($provinces as $province)
                                        <option value="{{$province->id}}">{{$province->province_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row" >

                            <div class="col-md-6 offset-md-3">
                                <select id="district" name="district" class="form-control">
                                    <option value="">Choose District</option>

                                </select>
                            </div>
                        </div>

                        <div class="form-group row" >
                            <div class="col-md-6 offset-md-3">
                                <select id="municipal" name="municipal" class="form-control">
                                    <option value="">Choose Municipal/VDC</option>

                                </select>
                            </div>
                        </div>

                        <div class="form-group row mb-4" >
                            <div class="col-md-6 offset-md-3">
                                <select id="ward" name="ward" class="form-control">
                                    <option value="">Choose Ward</option>

                                </select>
                            </div>
                        </div>

                    <div class="form-group row mb-4" >
                        <div class="col-md-6 offset-md-3">
                            <input id="locality" type="text" name="locality" class="form-control" placeholder="Enter Locality and Landmark" required autocomplete="locality" autofocus>

                        </div>
                        <button type="submit" class="btn btn-primary shadow border mt-4 offset-md-5">
                            {{ __('Submit') }}
                        </button>
                    </div>


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
                            $('#district').append('<option value="" disabled selected>Choose District</option>');
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

        $(document).ready(function () {
            $(".btn").on('click',function (e) {
                e.preventDefault();
                $.ajax({
                    type: 'POST',
                    url: '/web/ajax/postlocation' ,
                    headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
                    dataType: 'html',
                    data: {
                        province_id: jQuery('#province').val(),
                        district_id: jQuery('#district').val(),
                        municipal_id: jQuery('#municipal').val(),
                        ward_id: jQuery('#ward').val(),
                        locality: jQuery('#locality').val(),
                    },
                    success: function (response) {
                        window.location.replace(response);

                    },
                })
                ;
            });
        });


    </script>
@endsection
