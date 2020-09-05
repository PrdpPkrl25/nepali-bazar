@component('mail::message')
You have just created a shop, {{$shop->shop_name}}.

Click below to view your shop and add product to your shop:
@component('mail::button', ['url' => route('shop.info',$shop->id)])
View Shop
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
