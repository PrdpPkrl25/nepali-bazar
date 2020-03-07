@extends('layout')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Edit Ward #{{ $ward->id }}</div>
                    <div class="card-body">
                        <a href="{{ url('/ward') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <br />
                        <br />

                        {!! Form::model($ward, [
                            'method' => 'PATCH',
                            'url' => ['ward', $ward->id],
                            'class' => 'form-horizontal',
                            'files' => true
                        ]) !!}

                        @include ('location.ward.form', ['formMode' => 'edit'])

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
