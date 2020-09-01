@component('mail::message')
Hello {{$customerName}}, <br>
Your have placed an order of Rs {{$orderPrice}}.<br>
You will be notified once your order is shipped. <br>
Click to see detail of your order:
@component('mail::button', ['url' =>route('order.confirmed',$cartSessionId)])
View Order
@endcomponent

We hope to see you again soon. <br>
This is a auto generated email. Please do not reply to this message.
Thanks, <br>
{{ config('app.name') }}
@endcomponent
