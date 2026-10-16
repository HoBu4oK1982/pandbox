@section('title', 'Pandbox — личный кабинет')
<x-user-account-shell
    section-title="Личный кабинет"
    section-code="PBX / CONTROL CENTER"
    description="Заказы, избранное и данные профиля — ваш персональный центр управления Pandbox."
>
    <div class="pb-account-section-head">
        <div><span>PBX / OVERVIEW</span><h2>Панель управления</h2></div>
        <p>Сводка вашей активности и быстрый доступ к основным разделам.</p>
    </div>

    <div class="pb-dashboard-stats">
        <a wire:navigate href="{{ route('user.orders') }}" class="pb-dashboard-stat pb-account-enter">
            <svg viewBox="0 0 24 24"><path d="M5 3h14v18H5zM8 8h8M8 12h8M8 16h5"/></svg>
            <span>Всего заказов</span><strong>{{ str_pad((string) $ordersCount, 2, '0', STR_PAD_LEFT) }}</strong><i>Открыть →</i>
        </a>
        <a wire:navigate href="{{ route('user.orders') }}" class="pb-dashboard-stat pb-account-enter">
            <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 2"/></svg>
            <span>В обработке</span><strong>{{ str_pad((string) $activeOrdersCount, 2, '0', STR_PAD_LEFT) }}</strong><i>Статусы →</i>
        </a>
        <a wire:navigate href="{{ route('user.orders') }}" class="pb-dashboard-stat pb-account-enter">
            <svg viewBox="0 0 24 24"><path d="M4 12l5 5L20 6"/></svg>
            <span>Доставлено</span><strong>{{ str_pad((string) $deliveredOrdersCount, 2, '0', STR_PAD_LEFT) }}</strong><i>История →</i>
        </a>
        <a wire:navigate href="{{ route('favourite') }}" class="pb-dashboard-stat pb-account-enter">
            <svg viewBox="0 0 24 24"><path d="M20.8 4.6a5.5 5.5 0 0 0-7.8 0L12 5.7l-1.1-1.1a5.5 5.5 0 0 0-7.8 7.8L12 21l7.8-7.5a5.5 5.5 0 0 0 1-8.9Z"/></svg>
            <span>В избранном</span><strong>{{ str_pad((string) $wishlistCount, 2, '0', STR_PAD_LEFT) }}</strong><i>Смотреть →</i>
        </a>
    </div>

    <div class="pb-dashboard-grid">
        <section class="pb-dashboard-recent pb-account-enter">
            <div class="pb-dashboard-block-head"><div><span>PBX / ORDERS</span><h3>Последние заказы</h3></div><a wire:navigate href="{{ route('user.orders') }}">Все заказы →</a></div>
            @forelse($recentOrders as $order)
                <a wire:navigate href="{{ route('user.order', ['order_id' => $order->id]) }}" class="pb-dashboard-order">
                    <b>#{{ str_pad((string) $order->id, 5, '0', STR_PAD_LEFT) }}</b>
                    <span>{{ optional($order->created_at)->format('d.m.Y') }}</span>
                    <strong>{{ number_format((float) $order->total, 0, '.', ' ') }} ₸</strong>
                    <em class="pb-account-status pb-account-status--{{ $order->status }}">{{ $order->status === 'delivered' ? 'Доставлен' : ($order->status === 'canceled' ? 'Отменён' : 'Получен') }}</em>
                </a>
            @empty
                <div class="pb-dashboard-no-orders"><span>01</span><p>Здесь появится история ваших заказов.</p><a wire:navigate href="{{ route('shop') }}" class="pb-account-action">Перейти в магазин</a></div>
            @endforelse
        </section>

        <aside class="pb-dashboard-profile pb-account-enter">
            <span>PBX / PROFILE</span><h3>Ваши данные</h3>
            <dl>
                <div><dt>Имя</dt><dd>{{ auth()->user()->name }}</dd></div>
                <div><dt>Телефон</dt><dd>{{ auth()->user()->phone ?: 'Не указан' }}</dd></div>
                <div><dt>E-mail</dt><dd>{{ auth()->user()->email }}</dd></div>
                <div><dt>Город</dt><dd>{{ auth()->user()->city ?: 'Не указан' }}</dd></div>
            </dl>
            <a wire:navigate href="{{ route('user.profile') }}" class="pb-account-action pb-account-action--ghost">Открыть профиль →</a>
        </aside>
    </div>

    <style>
        .pb-dashboard-stats{display:grid;grid-template-columns:repeat(4,minmax(0,1fr));gap:12px;margin-bottom:22px}.pb-dashboard-stat{position:relative;min-height:158px;display:flex;flex-direction:column;padding:20px;overflow:hidden;border:1px solid #d8e5de;color:#17211c;background:linear-gradient(145deg,#fff,#f4f8f6);text-decoration:none;transition:.25s}.pb-dashboard-stat:after{content:'';position:absolute;right:-24px;bottom:-24px;width:80px;height:80px;border:1px solid rgba(24,189,125,.25);transform:rotate(45deg)}.pb-dashboard-stat:hover{border-color:#18bd7d;box-shadow:0 15px 32px rgba(13,95,57,.12);transform:translateY(-4px)}.pb-dashboard-stat svg{width:25px;height:25px;margin-bottom:18px;fill:none;stroke:#18a76f;stroke-width:1.7;stroke-linecap:round;stroke-linejoin:round}.pb-dashboard-stat span{color:#718078;font:700 8px Arial;letter-spacing:.14em;text-transform:uppercase}.pb-dashboard-stat strong{margin:7px 0;color:#122019;font:500 34px/1 'MagistralMedium',Tahoma,sans-serif}.pb-dashboard-stat i{margin-top:auto;color:#159966;font:700 9px Arial;letter-spacing:.08em}.pb-dashboard-grid{display:grid;grid-template-columns:minmax(0,1.55fr) minmax(280px,.8fr);gap:18px}.pb-dashboard-recent,.pb-dashboard-profile{border:1px solid #dce7e1;background:#fff}.pb-dashboard-block-head{min-height:72px;display:flex;align-items:center;justify-content:space-between;padding:15px 18px;border-bottom:1px solid #dce7e1}.pb-dashboard-block-head span,.pb-dashboard-profile>span{display:block;margin-bottom:5px;color:#159966;font:700 8px Arial;letter-spacing:.16em}.pb-dashboard-block-head h3,.pb-dashboard-profile h3{margin:0!important;color:#17211c!important;font-size:20px!important}.pb-dashboard-block-head a{color:#138b5e;font-size:11px;text-decoration:none}.pb-dashboard-order{min-height:64px;display:grid;grid-template-columns:90px 80px 1fr auto;align-items:center;gap:12px;padding:10px 18px;border-bottom:1px solid #e5ece8;color:#526159;text-decoration:none;transition:.2s}.pb-dashboard-order:hover{padding-left:23px;background:#f0faf5}.pb-dashboard-order>b{color:#17211c;font-size:13px}.pb-dashboard-order>span{font-size:11px}.pb-dashboard-order>strong{color:#11895c;font-size:15px}.pb-dashboard-order>em{font-style:normal}.pb-dashboard-no-orders{min-height:215px;display:flex;flex-direction:column;align-items:center;justify-content:center;padding:25px;text-align:center}.pb-dashboard-no-orders>span{color:#d4e2da;font:500 58px/1 'MagistralMedium',Tahoma,sans-serif}.pb-dashboard-no-orders p{color:#718078}.pb-dashboard-profile{padding:24px;background:radial-gradient(circle at 100% 0,rgba(39,217,148,.11),transparent 35%),linear-gradient(145deg,#111c16,#09100c);color:#fff}.pb-dashboard-profile h3{color:#fff!important}.pb-dashboard-profile dl{margin:24px 0}.pb-dashboard-profile dl>div{padding:12px 0;border-bottom:1px solid rgba(255,255,255,.1)}.pb-dashboard-profile dt{margin-bottom:4px;color:#73877c;font:700 8px Arial;letter-spacing:.13em;text-transform:uppercase}.pb-dashboard-profile dd{margin:0;color:#dce7e1;font-size:13px;overflow-wrap:anywhere}.pb-dashboard-profile .pb-account-action--ghost{width:100%;color:#37df9d;border-color:#1c9b69}.pb-dashboard-profile .pb-account-action--ghost:hover{color:#07110c}
        @media(max-width:1100px){.pb-dashboard-stats{grid-template-columns:repeat(2,1fr)}.pb-dashboard-grid{grid-template-columns:1fr}}
    </style>
</x-user-account-shell>
