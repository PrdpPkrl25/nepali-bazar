@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card align-content-between" style="margin: 20px;margin-top: 100px">
                    <div class="card-header">Select Your District:</div>
                    <form method="post" action="{{route('municipal.start')}}" style="margin: 20px">
                        @csrf
                        <div class="form-group row" >

                            <div class="col-md-6 offset-md-3">
                                <select id="district" name="district" class="form-control">
                                    <option value="">Choose District</option>
                                    @foreach($districts as $district)
                                        <option value="{{$district->id}}">{{$district->district_name}}</option>
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
