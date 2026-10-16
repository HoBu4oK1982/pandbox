<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Подтверждение заказа с сайта Pandbox.kz</title>
</head>
<body>
    <h4>Здравствуйте, {{$order->user_name}}!</h4>
    <p>Ваш заказ успешно получен, вы можете его отследить в <a href="https://pandbox.kz/login">личном кабинете</a>.</p>
    <br />
	<p>Номер заказа: {{ $order->id }}</p><br>
	<p>Контактный телефон: {{ $order->mobile }}</p><br>
	<p>e-mail: {{ $order->email }}</p><br>
	<p>Город: {{ $order->city }}</p><br>
    <p>Адрес: {{ $order->address }}</p><br>
    <table style="width:1000px; text-align:left;">
        <thead>
            <tr>
                <th>Изображение</th>
                <th>Назавние товара</th>
                <th>Количество</th>
                <th>Цена</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($order->orderItems as $item)
                <tr>
                    @php $product_image = explode(',' , $item->product->image); @endphp
                    <td><img src="{{ asset('assets/images/products') }}/{{$product_image[0]}}" width="100" alt=""></td>
                    <td>{{$item->product->title}}</td>
                    <td>{{$item->qty}}</td>
                    <td>{{$item->price}} 〒</td>
                </tr>
            @endforeach
            <tr>
                <td colspan="3"style="border-top:1px solid #ccc;"></td>
                <td style="font-size: 15px; font-weight:bold; border-top:1px solid #ccc;">Сумма : {{$order->subtotal}} 〒</td>
            </tr>
            <tr>
                <td colspan="3"></td>
                <td style="font-size: 15px; font-weight:bold;">Доставка : цена договорная</td>
            </tr>
            <tr>
                <td colspan="3"></td>
                <td style="font-size: 25px; font-weight:bold;">Итого : {{$order->total}} 〒</td>
            </tr>
        </tbody>
    </table>
</body>
</html>
