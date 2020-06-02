@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card align-content-between" style="margin: 20px;margin-top: 100px">
                    <div class="card-header">Select Your Municipal/VDC:</div>
                    <form method="post" action="{{route('ward.start')}}" style="margin: 20px">
                        @csrf
                        <div class="form-group row" >

                            <div class="col-md-6 offset-md-3">
                                <select id="municipal" name="municipal" class="form-control">
                                    <option value="">Choose Municipal/VDC</option>
                                    @foreach($municipals as $municipal)
                                        <option value="{{$municipal->id}}">{{$municipal->municipal_name}}</option>
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
