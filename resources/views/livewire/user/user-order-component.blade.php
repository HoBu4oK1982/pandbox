@section('title', 'Pandbox — заказ №' . $order->id)
<x-user-account-shell
    :section-title="'Заказ №' . str_pad((string) $order->id, 5, '0', STR_PAD_LEFT)"
    section-code="PBX / ORDER DETAILS"
    description="Состав заказа, статус доставки и контактные данные получателя."
>
    @if(Session::has('order_message'))
        <div class="pb-order-message pb-account-enter">{{ Session::get('order_message') }}</div>
    @endif
    <div class="pb-account-section-head">
        <div><span>PBX / ORDER #{{ $order->id }}</span><h2>Детали заказа</h2></div>
        <div class="pb-order-head-actions">
            <a wire:navigate href="{{ route('user.orders') }}" class="pb-account-action pb-account-action--ghost">← Все заказы</a>
            @if($order->status === 'ordered')<button type="button" wire:click="cancelOrder">Отменить заказ</button>@endif
        </div>
    </div>

    <div class="pb-order-meta pb-account-enter">
        <div><small>Номер</small><strong>#{{ str_pad((string) $order->id, 5, '0', STR_PAD_LEFT) }}</strong></div>
        <div><small>Дата заказа</small><strong>{{ optional($order->created_at)->format('d.m.Y, H:i') }}</strong></div>
        <div><small>Статус</small><i class="pb-account-status pb-account-status--{{ $order->status }}">{{ $order->status === 'delivered' ? 'Доставлен' : ($order->status === 'canceled' ? 'Отменён' : 'Получен') }}</i></div>
        <div><small>Итого</small><strong class="is-price">{{ number_format((float) $order->total, 0, '.', ' ') }} ₸</strong></div>
    </div>

    <section class="pb-order-products pb-account-enter">
        <div class="pb-order-block-title"><span>PBX / LOADOUT</span><h3>Состав заказа</h3><b>{{ $order->orderItems->sum('qty') }} шт.</b></div>
        @foreach($order->orderItems as $item)
            @php
                $product = $item->product;
                $images = explode(',', $product?->images ?? '');
            @endphp
            <article class="pb-order-product">
                <div class="pb-order-product__image"><img src="{{ !empty($images[0]) ? asset('assets/images/products/' . $images[0]) : asset('assets/images/design/no-image.jpg') }}" alt="{{ $product?->title ?? 'Товар' }}"></div>
                <div class="pb-order-product__copy"><small>PANDBOX / ТОВАР</small><strong>{{ $product?->title ?? 'Товар больше не представлен в каталоге' }}</strong></div>
                <div><small>Цена</small><b>{{ number_format((float) $item->price, 0, '.', ' ') }} ₸</b></div>
                <div><small>Количество</small><b>{{ $item->qty }} шт.</b></div>
                <div><small>Сумма</small><b class="is-price">{{ number_format((float) $item->price * (int) $item->qty, 0, '.', ' ') }} ₸</b></div>
            </article>
        @endforeach
    </section>

    <div class="pb-order-bottom">
        <section class="pb-order-recipient pb-account-enter">
            <div class="pb-order-block-title"><span>PBX / DELIVERY DATA</span><h3>Данные получателя</h3></div>
            <dl><div><dt>Имя</dt><dd>{{ $order->user_name }}</dd></div><div><dt>Телефон</dt><dd>{{ $order->mobile }}</dd></div><div><dt>E-mail</dt><dd>{{ $order->email }}</dd></div><div><dt>Город</dt><dd>{{ $order->city }}</dd></div><div class="wide"><dt>Адрес</dt><dd>{{ $order->address }}</dd></div></dl>
        </section>
        <aside class="pb-order-total pb-account-enter"><span>PBX / TOTAL</span><small>Общая стоимость</small><strong>{{ number_format((float) $order->total, 0, '.', ' ') }} ₸</strong><p>Стоимость доставки уточняется при обработке заказа.</p></aside>
    </div>

    <style>
        .pb-order-message{margin-bottom:18px;padding:14px 17px;border-left:3px solid #18bd7d;color:#126f4e;background:#e5f8ef}.pb-order-head-actions{display:flex;gap:8px}.pb-order-head-actions button{min-height:44px;padding:10px 16px;border:1px solid #c53a49;color:#c53a49;background:#fff;cursor:pointer}.pb-order-head-actions button:hover{color:#fff;background:#b92f3d}.pb-order-meta{display:grid;grid-template-columns:repeat(4,1fr);margin-bottom:18px;border:1px solid #dce7e1}.pb-order-meta>div{min-height:94px;display:flex;flex-direction:column;justify-content:center;padding:17px;border-right:1px solid #dce7e1}.pb-order-meta>div:last-child{border:0}.pb-order-meta small,.pb-order-product small,.pb-order-recipient dt{margin-bottom:8px;color:#84958c;font:700 8px Arial;letter-spacing:.13em;text-transform:uppercase}.pb-order-meta strong{color:#17211c;font-size:14px}.pb-order-meta .is-price,.pb-order-product .is-price{color:#11895c;font-size:18px}.pb-order-block-title{min-height:70px;display:flex;align-items:center;gap:16px;padding:14px 18px;color:#fff;background:#0d1812}.pb-order-block-title>span{color:#37df9d;font:700 8px Arial;letter-spacing:.15em}.pb-order-block-title h3{margin:0 auto 0 0!important;color:#fff!important;font-size:19px!important}.pb-order-block-title>b{color:#8da097;font-size:11px}.pb-order-products{border:1px solid #dce7e1}.pb-order-product{min-height:105px;display:grid;grid-template-columns:82px minmax(180px,1fr) 120px 95px 130px;align-items:center;gap:15px;padding:12px 16px;border-bottom:1px solid #e0e9e4}.pb-order-product:last-child{border-bottom:0}.pb-order-product__image{width:80px;height:80px;display:grid;place-items:center;border:1px solid #dfe8e3;background:#f5f8f6}.pb-order-product__image img{width:100%;height:100%;object-fit:contain}.pb-order-product__copy strong{display:block;color:#17211c;font-size:14px;line-height:1.3}.pb-order-product>div>b{color:#34443b;font-size:13px}.pb-order-bottom{display:grid;grid-template-columns:minmax(0,1.5fr) 330px;gap:18px;margin-top:18px}.pb-order-recipient{border:1px solid #dce7e1}.pb-order-recipient dl{display:grid;grid-template-columns:repeat(2,1fr);margin:0;padding:20px}.pb-order-recipient dl>div{padding:12px;border-bottom:1px solid #e4ece8}.pb-order-recipient dl>.wide{grid-column:1/3}.pb-order-recipient dd{margin:0;color:#28382f;font-size:13px}.pb-order-total{display:flex;flex-direction:column;justify-content:center;padding:30px;color:#fff;background:radial-gradient(circle at 100% 0,rgba(55,223,157,.18),transparent 35%),linear-gradient(145deg,#111c16,#07100b);border:1px solid rgba(24,189,125,.4)}.pb-order-total>span{color:#37df9d;font:700 8px Arial;letter-spacing:.17em}.pb-order-total small{margin-top:28px;color:#82958b;font-size:11px}.pb-order-total strong{margin:10px 0;color:#37df9d;font:500 32px/1 'MagistralMedium',Tahoma,sans-serif}.pb-order-total p{margin:14px 0 0;padding-top:14px;border-top:1px solid rgba(255,255,255,.11);color:#8da097;font-size:10px;line-height:1.5}
        @media(max-width:1100px){.pb-order-meta{grid-template-columns:repeat(2,1fr)}.pb-order-product{grid-template-columns:82px 1fr 120px}.pb-order-product>div:nth-child(4),.pb-order-product>div:nth-child(5){grid-column:auto}.pb-order-bottom{grid-template-columns:1fr}.pb-order-total{min-height:220px}}
    </style>
</x-user-account-shell>
