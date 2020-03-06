@extends('layout')
@section('content')

    <form action="{{ route('shops.destroy', $shop -> id) }}" method="POST">
        {{ method_field('DELETE') }}
        @csrf

        Do you want to delete this ?

        <input type="submit" value="Delete">
    </form>
@endsection
