@component('mail::message')
    Dear {{$orderName}},<br>
    Your have placed an order of Rs {{$orderPrice}}.
    You will be notified once the shop owner accepts your order.<br>
    Click to see your order:
    @component('mail::button', ['url' => ''])
        Order Detail
    @endcomponent

    Thanks,<br>
    {{ config('app.name') }}
@endcomponent
