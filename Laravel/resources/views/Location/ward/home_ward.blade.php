@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card align-content-between" style="margin: 20px;margin-top: 100px">
                    <div class="card-header">Select Your Ward:</div>
                    <form method="post" action="{{route('locality.start')}}" style="margin: 20px">
                        @csrf
                        <div class="form-group row" >

                            <div class="col-md-6 offset-md-3">
                                <select id="ward" name="ward" class="form-control">
                                    <option value="">Choose Ward</option>
                                    @foreach($wards as $ward)
                                        <option value="{{$ward->id}}">{{$ward->ward_number}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row mb-0" style="margin-top: 20px">
                            <div class="col-md-6 offset-md-5">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Next') }}
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
