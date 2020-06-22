@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Join Cakeapp') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name:') }}</label>

                            <div class="col-md-4">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address:') }}</label>

                            <div class="col-md-4">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone_number" class="col-md-4 col-form-label text-md-right">{{ __('Phone Number:') }}</label>

                            <div class="col-md-4">
                                <input id="phone_number" type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ old('phone_number') }}" required autocomplete="phone_number">

                                @error('phone_number')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="province" class="col-md-4 col-form-label text-md-right">{{ __('Province:') }}</label>

                            <div class="col-md-4">
                                <select id="province" name="province" class="form-control">
                                    <option value=" " disabled="true" selected="true" >Choose Province</option>
                                    @foreach($allProvince as $province)
                                        <option value="{{$province->id}}">{{$province->province_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="district" class="col-md-4 col-form-label text-md-right">{{ __('District:') }}</label>

                            <div class="col-md-4">
                                <select id="district" name="district" class="form-control">
                                    <option value=" " disabled="true" selected="true">Choose District</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="municipal" class="col-md-4 col-form-label text-md-right">{{ __('Municipal/VDC:') }}</label>

                            <div class="col-md-4">
                                <select id="municipal" name="municipal" class="form-control">
                                    <option value=" " disabled="true" selected="true">Choose Municipal/VDC</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="ward" class="col-md-4 col-form-label text-md-right">{{ __('Ward:') }}</label>

                            <div class="col-md-4">
                                <select id="ward" name="ward" class="form-control" >
                                    <option value=" " disabled="true" selected="true">Choose Ward</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="locality" class="col-md-4 col-form-label text-md-right">{{ __('Locality(optional):') }}</label>

                            <div class="col-md-4">
                                <input id="locality" type="text" class="form-control @error('locality') is-invalid @enderror" name="locality" value="{{ old('locality') }}" autocomplete="locality">

                                @error('locality')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password:') }}</label>

                            <div class="col-md-4">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password:') }}</label>

                            <div class="col-md-4">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4  align-items-center" >
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>

                                <a class="btn btn-link" href="{{ route('login') }}">
                                    {{ __('Already a Cakeapp User? Sign in') }}
                                </a>
                            </div>
                        </div>
                    </form>
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


    </script>
    @endsection
