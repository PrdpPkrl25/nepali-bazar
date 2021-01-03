@if( Session::has("success") )
    <div class="alert alert-success alert-block text-center" role="alert">
        <button class="close" data-dismiss="alert">x</button>
        {{ Session::get("success") }}
    </div>
@endif

@if( Session::has("error") )
    <div class="alert alert-danger alert-block text-center" role="alert">
        <button class="close" data-dismiss="alert">x</button>
        {{ Session::get("error") }}
    </div>
@endif
