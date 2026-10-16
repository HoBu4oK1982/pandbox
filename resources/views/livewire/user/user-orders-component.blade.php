@section('title', 'Pandbox — мои заказы')
<x-user-account-shell
    section-title="Мои заказы"
    section-code="PBX / ORDER HISTORY"
    description="Следите за статусом, составом и стоимостью каждого заказа."
>
    <div class="pb-account-section-head">
        <div><span>PBX / ORDERS</span><h2>История заказов</h2></div>
        <p>{{ $orders->total() }} заказов в вашем кабинете.</p>
    </div>

    @if($orders->isNotEmpty())
        <div class="pb-orders-list">
            <div class="pb-orders-head"><span>Заказ</span><span>Дата</span><span>Получатель</span><span>Сумма</span><span>Статус</span><span></span></div>
            @foreach($orders as $order)
                <article class="pb-order-row pb-account-enter">
                    <div><small>Номер заказа</small><strong>#{{ str_pad((string) $order->id, 5, '0', STR_PAD_LEFT) }}</strong></div>
                    <div><small>Дата</small><span>{{ optional($order->created_at)->format('d.m.Y') }}<em>{{ optional($order->created_at)->format('H:i') }}</em></span></div>
                    <div><small>Получатель</small><span>{{ $order->user_name }}<em>{{ $order->city }}</em></span></div>
                    <div><small>Сумма</small><b>{{ number_format((float) $order->total, 0, '.', ' ') }} ₸</b></div>
                    <div><small>Статус</small><i class="pb-account-status pb-account-status--{{ $order->status }}">{{ $order->status === 'delivered' ? 'Доставлен' : ($order->status === 'canceled' ? 'Отменён' : 'Получен') }}</i></div>
                    <a wire:navigate href="{{ route('user.order', ['order_id' => $order->id]) }}" aria-label="Открыть заказ"><svg viewBox="0 0 24 24"><path d="M5 12h13M13 6l6 6-6 6"/></svg></a>
                </article>
            @endforeach
        </div>
        <div class="pb-orders-pagination">{{ $orders->links('pagination-links') }}</div>
    @else
        <div class="pb-account-empty pb-account-enter"><div><h3>Заказов пока нет</h3><p>Подберите снаряжение — первый заказ появится здесь.</p><a wire:navigate href="{{ route('shop') }}" class="pb-account-action">Перейти в магазин</a></div></div>
    @endif

    <style>
        .pb-orders-list{border:1px solid #dce7e1}.pb-orders-head,.pb-order-row{display:grid;grid-template-columns:120px 110px minmax(150px,1fr) 130px 130px 44px;align-items:center;gap:15px}.pb-orders-head{min-height:46px;padding:0 15px;color:#89a096;background:#0d1812;font:700 8px Arial;letter-spacing:.14em;text-transform:uppercase}.pb-order-row{min-height:88px;padding:12px 15px;border-bottom:1px solid #e0e9e4;background:#fff;transition:.2s}.pb-order-row:last-child{border-bottom:0}.pb-order-row:hover{background:#f0faf5;box-shadow:inset 3px 0 #18bd7d}.pb-order-row>div{min-width:0}.pb-order-row small{display:none;color:#89978f;font:700 8px Arial;letter-spacing:.12em;text-transform:uppercase}.pb-order-row strong{color:#17211c;font-size:14px}.pb-order-row span{display:block;color:#38473f;font-size:12px}.pb-order-row em{display:block;margin-top:4px;color:#89978f;font-size:10px;font-style:normal}.pb-order-row b{color:#11895c;font-size:15px;white-space:nowrap}.pb-order-row i{font-style:normal}.pb-order-row>a{width:38px;height:38px;display:grid;place-items:center;border:1px solid #b8d5c6;color:#159966;background:#fff;transition:.2s}.pb-order-row>a:hover{color:#07110c;background:#37df9d}.pb-order-row>a svg{width:18px;height:18px;fill:none;stroke:currentColor;stroke-width:1.8;stroke-linecap:round;stroke-linejoin:round}.pb-orders-pagination{margin-top:22px;overflow-x:auto}.pb-orders-pagination nav{min-width:max-content}
        @media(max-width:1050px){.pb-orders-head{display:none}.pb-orders-list{display:grid;grid-template-columns:repeat(2,1fr);gap:12px;border:0}.pb-order-row{grid-template-columns:1fr 1fr 42px;align-items:start;border:1px solid #dce7e1}.pb-order-row small{display:block;margin-bottom:6px}.pb-order-row>a{grid-column:3;grid-row:1/3}.pb-order-row>div:nth-child(5){grid-column:1/3}}
    </style>
</x-user-account-shell>
