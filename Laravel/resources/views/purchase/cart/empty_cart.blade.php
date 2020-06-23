@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card align-content-between" style="margin-top: 10px">
                    <div class="card-header">Cart Item:</div>
                    <div class="card-body">
                        <div class="row">
                            <table class="table table-bordered">
                                <tbody>

                                    <tr >
                                        <td class="text-center">
                                       Your Cart is Empty. Add Some Products in the Cart.
                                        </td>
                                    </tr>

                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
