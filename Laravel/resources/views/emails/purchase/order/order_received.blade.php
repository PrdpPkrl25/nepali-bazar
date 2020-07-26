@component('mail::message')
Hello Owner,<br>
You have received an order for the following product:
@component('mail::table')
|     S.N     |                    Product Name                    |               Quantity               |
| :---------   | :------------------------------------------------:   | ----------------------------------:   |
@foreach($products as $product)
|     {{$loop->iteration}}     |               {{$product->product_name}}               |          {{$product->pivot->quantity}} {{$product->pivot->measure_unit}}          |
@endforeach
@endcomponent

The Details of the order is:<br>
OrderNo: #{{$order->id}}<br>
Customer Name: {{$order->name}}<br>
Delivery Address: {{$order->locality}} {{$order->municipal}}-{{$order->ward_number}}, {{$order->district}}<br>
Customer Contact: {{$order->phone_number}}<br>
Order Time: {{$order->order_date}}<br>
Payment Method: {{$order->payment_method}}<br>

You will find the detail of order here:

@component('mail::button', ['url' => ''])
Order Detail
@endcomponent

Thanks, <br> {{ config('app.name') }}
@endcomponent
