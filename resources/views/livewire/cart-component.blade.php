@section('title', 'Pandbox - Корзина')
<section class="container cart__wrap">
        <h1>Корзина</h1>
        <div class="commonBreadcrumbs">
            <ul>
                <li><a wire:navigate href="/"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" style="width:18px;height:18px;fill:currentColor;vertical-align:middle;"><path d="M12.71 2.29a1 1 0 0 0-1.42 0l-9 9a1 1 0 0 0 1.42 1.42L4 12.41V20a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-7.59l.29.3a1 1 0 0 0 1.42-1.42zM10 20v-5h4v5zm8 0h-2v-6a1 1 0 0 0-1-1H9a1 1 0 0 0-1 1v6H6v-9.59l6-6 6 6z"/></svg></a></li>
                →
                <li>Корзина</li>
            </ul>
        </div>
        <div class="cartContentWrap pb-cart" data-pb-cart>
            @if($cartItems->isNotEmpty())
                <div class="pb-cart-layout">
                <div class="pb-cart-main">
                    <div class="pb-cart-list-head">
                        <span>PBX / ВАШ ЗАКАЗ</span>
                        <b data-pb-cart-list-count>{{ Cart::instance('cart')->count() }} позиций</b>
                    </div>
                <div class="cartProducts pb-cart-products">
                    @foreach($cartItems as $item)
                        @php
                            $product = $productsById->get((int) $item->id);
                            $availableStock = $product && (int) $product->status === 0 ? max(0, (int) $product->qty) : 0;
                            $isUnavailable = $availableStock < (int) $item->qty;
                        @endphp
                        @continue(!$product)
                        <article wire:key="cart-item-{{ $item->rowId }}" @class(['cartProduct', 'pb-cart-product', 'is-unavailable' => $isUnavailable]) data-pb-cart-item data-pb-cart-row="{{ $item->rowId }}">
                            @php $product_image = explode(',' , $product->images); @endphp
                            @if($isUnavailable)
                                <div class="pb-cart-image"><img src="{{ !empty($product_image[0]) ? asset('assets/images/products/' . $product_image[0]) : asset('assets/images/design/no-image.jpg') }}" alt="{{ $product->title }}" /></div>
                            @else
                                <a wire:navigate class="pb-cart-image" href="{{ route('product.details', ['slug' => $product->slug]) }}"><img src="{{ !empty($product_image[0]) ? asset('assets/images/products/' . $product_image[0]) : asset('assets/images/design/no-image.jpg') }}" alt="{{ $product->title }}" /></a>
                            @endif
                            <div class="pb-cart-copy">
                                <span>ТОВАР / PANDBOX</span>
                                @if($isUnavailable)<h2>{{ $product->title }}</h2>@else<a wire:navigate href="{{ route('product.details', ['slug' => $product->slug]) }}"><h2>{{ $product->title }}</h2></a>@endif
                                <small @class(['is-unavailable' => $isUnavailable])>{{ $isUnavailable ? ($availableStock > 0 ? 'Доступно только ' . $availableStock . ' шт.' : 'Нет в наличии') : 'В наличии' }}</small>
                            </div>
                            @if ($product->sale_price !== null)
                                <div class="cartItemPrice pb-cart-price"><del>{{ number_format($product->price, 0, '.', ' ') }} ₸</del><b>{{ number_format($product->sale_price, 0, '.', ' ') }} ₸</b></div>
                            @else
                                <div class="cartItemPrice pb-cart-price"><b>{{ number_format($product->price, 0, '.', ' ') }} ₸</b></div>
                            @endif
                            <div class="cartProductQuantity pb-cart-quantity">
                                <button type="button" data-pb-cart-decrease="{{ $item->rowId }}" aria-label="Уменьшить количество"><svg viewBox="0 0 24 24"><path d="M5 12h14"/></svg></button>
                                <input type="text" value="{{ $item->qty }}" readonly aria-label="Количество товара" data-pb-cart-qty="{{ $item->rowId }}">
                                <button type="button" data-pb-cart-increase="{{ $item->rowId }}" data-product-id="{{ $item->id }}" aria-label="Увеличить количество" @disabled($isUnavailable)><svg viewBox="0 0 24 24"><path d="M12 5v14M5 12h14"/></svg></button>
                            </div>
                            <div class="cartProductSubTotal pb-cart-subtotal"><small>ИТОГО</small><b data-pb-money="item-{{ $item->rowId }}" data-pb-value="{{ (float) $item->subtotal }}">{{ number_format($item->subtotal, 0, '.', ' ') }} ₸</b></div>
                            <button type="button" class="cartProductDelete pb-cart-delete" data-pb-cart-destroy="{{ $item->rowId }}" aria-label="Удалить товар">
                                <svg viewBox="0 0 24 24"><path d="M4 7h16M9 7V4h6v3M7 7l1 14h8l1-14M10 11v6M14 11v6"/></svg>
                            </button>
                        </article>
                    @endforeach
                </div>
                <button type="button" class="cartDeleteAll pb-cart-clear" data-pb-cart-clear><svg viewBox="0 0 24 24"><path d="M4 7h16M9 7V4h6v3M7 7l1 14h8l1-14"/></svg><span>Очистить корзину</span></button>
                </div>
                @php
                    $cartSubtotalValue = (float) Cart::instance('cart')->subtotal(2, '.', '');
                    $cartTotalValue = (float) Cart::instance('cart')->total(2, '.', '');
                @endphp
                <aside class="cartOrderSummary pb-cart-summary" data-pb-cart-summary>
                    <span class="pb-cart-summary-code">PBX / CHECKOUT</span>
                    <h2>Ваш заказ</h2>
                    <div class="pb-cart-summary-count"><span>Товаров</span><b data-pb-cart-summary-count>{{ Cart::instance('cart')->count() }}</b></div>
                    <p class="summary-info"><span class="title">Сумма</span><b class="index" data-pb-money="summary-subtotal" data-pb-value="{{ $cartSubtotalValue }}">{{ number_format($cartSubtotalValue, 0, '.', ' ') }} ₸</b></p>
                    <p class="summary-info"><span class="title">Доставка</span><b class="index">Рассчитаем при оформлении</b></p>
                    <p class="summary-info total-info"><span class="title">Итого</span><b class="index" data-pb-money="summary-total" data-pb-value="{{ $cartTotalValue }}">{{ number_format($cartTotalValue, 0, '.', ' ') }} ₸</b></p>
                    <button type="button" @class(['pb-cart-checkout', 'is-disabled' => $hasUnavailableItems]) data-pb-cart-checkout @disabled($hasUnavailableItems)>
                        <svg viewBox="0 0 24 24"><path d="M3 4h2l2.5 11h10l2-7H7"/><circle cx="9" cy="19" r="1.5"/><circle cx="18" cy="19" r="1.5"/></svg>
                        <span>Оформить заказ</span>
                        <svg viewBox="0 0 24 24"><path d="M5 12h13M13 6l6 6-6 6"/></svg>
                    </button>
                    @if($hasUnavailableItems)
                        <p class="pb-cart-stock-warning">Удалите недоступные товары или уменьшите их количество перед оформлением заказа.</p>
                    @endif
                    <div class="pb-cart-assurance"><svg viewBox="0 0 24 24"><path d="M12 2 20 5v6c0 5-3.4 9-8 11-4.6-2-8-6-8-11V5z"/><path d="m8 12 2.5 2.5L16 9"/></svg><span>Безопасное оформление<br>и проверка заказа</span></div>
                </aside>
                </div>
                <template data-pb-cart-empty-template>
                    @include('partials.pandbox-empty-state', [
                        'type' => 'cart',
                        'title' => 'Ваша корзина пока пуста',
                        'subtitle' => 'Добавьте нужное снаряжение — выбранные товары будут ждать вас здесь.',
                        'button' => 'Перейти в каталог',
                    ])
                </template>
            @else
                @include('partials.pandbox-empty-state', [
                    'type' => 'cart',
                    'title' => 'Ваша корзина пока пуста',
                    'subtitle' => 'Добавьте нужное снаряжение — выбранные товары будут ждать вас здесь.',
                    'button' => 'Перейти в каталог',
                ])
            @endif
        </div>
<style>
    .cart__wrap{width:calc(100% - 48px)!important;max-width:1350px!important;margin-left:auto!important;margin-right:auto!important;padding-bottom:70px}.cart__wrap>h1{margin:26px 0 8px!important;font-size:42px!important}.pb-cart{--pc-green:#19b879;--pc-mint:#32dc9b;--pc-ink:#0c1510;--pc-line:#dce6e1}.pb-cart-layout{display:grid;grid-template-columns:minmax(0,1fr) 330px;align-items:start;gap:24px;margin-top:18px}.pb-cart-main{min-width:0}.pb-cart-list-head{height:62px;display:flex;align-items:center;justify-content:space-between;padding:0 22px;border:1px solid #1b3428;color:#fff;background:linear-gradient(100deg,#111b16,#0a110d)}.pb-cart-list-head span{color:var(--pc-mint);font:700 10px Arial;letter-spacing:.18em}.pb-cart-list-head b{font-size:13px}.pb-cart-products{display:flex!important;flex-direction:column;gap:12px!important;margin-top:12px}.pb-cart-product{position:relative;min-height:154px;display:grid!important;grid-template-columns:120px minmax(170px,1fr) 110px 122px 120px 42px;align-items:center;gap:12px;padding:16px!important;box-sizing:border-box;border:1px solid var(--pc-line)!important;border-left:3px solid #18251f!important;color:#17211c;background:linear-gradient(100deg,#fff,#f8faf9)!important;box-shadow:0 8px 24px rgba(13,45,29,.06);transition:border-color .25s,box-shadow .25s,transform .25s}.pb-cart-product:hover{border-left-color:var(--pc-green)!important;box-shadow:0 15px 35px rgba(13,65,39,.11);transform:translateY(-3px)}.pb-cart-image{position:relative;width:120px;height:120px;display:grid;place-items:center;overflow:hidden;border:1px solid #e1e9e5;background-image:linear-gradient(rgba(25,184,121,.055) 1px,transparent 1px),linear-gradient(90deg,rgba(25,184,121,.055) 1px,transparent 1px);background-size:20px 20px}.pb-cart-image:after{content:'';position:absolute;right:7px;bottom:7px;width:22px;height:22px;border-right:1px solid var(--pc-green);border-bottom:1px solid var(--pc-green)}.pb-cart-image img{width:100%;height:100%;object-fit:contain;transition:transform .35s}.pb-cart-product:hover .pb-cart-image img{transform:scale(1.06)}.pb-cart-copy{min-width:0}.pb-cart-copy>span{display:block;margin-bottom:8px;color:var(--pc-green);font:700 9px Arial;letter-spacing:.15em}.pb-cart-copy a{text-decoration:none}.pb-cart-copy h2{display:-webkit-box;margin:0!important;overflow:hidden;color:#17211c!important;font-size:18px!important;line-height:1.25!important;-webkit-box-orient:vertical;-webkit-line-clamp:2}.pb-cart-copy small{display:block;margin-top:10px;color:#718079;font-size:11px}.pb-cart-copy small:before{content:'';display:inline-block;width:6px;height:6px;margin-right:7px;background:var(--pc-green);box-shadow:0 0 0 4px rgba(25,184,121,.1)}.pb-cart-price{display:flex!important;flex-direction:column;gap:6px;margin:0!important;color:#17211c!important}.pb-cart-price del{color:#89958f;font-size:12px}.pb-cart-price b{color:#128158;font-size:18px;white-space:nowrap}.pb-cart-quantity{height:42px;display:grid!important;grid-template-columns:36px 50px 36px!important;margin:0!important}.pb-cart-quantity button{width:36px;height:42px;display:grid;place-items:center;padding:0;border:1px solid #d4dfd9;border-radius:0;color:var(--pc-green);background:#fff;cursor:pointer}.pb-cart-quantity button:hover{color:#fff;background:var(--pc-green)}.pb-cart-quantity button svg{width:16px;height:16px;fill:none;stroke:currentColor;stroke-width:2;stroke-linecap:round}.pb-cart-quantity input{width:50px!important;height:42px!important;box-sizing:border-box;padding:0!important;border:1px solid #d4dfd9!important;border-left:0!important;border-right:0!important;color:#fff!important;background:#111a15!important;font-size:15px!important;font-weight:700;text-align:center}.pb-cart-subtotal{display:flex!important;flex-direction:column;gap:6px}.pb-cart-subtotal small{color:#819088;font:700 8px Arial;letter-spacing:.15em}.pb-cart-subtotal b{color:#17211c;font-size:20px;white-space:nowrap}.pb-cart-delete{width:42px;height:42px;display:grid!important;place-items:center;padding:0!important;border:1px solid #d9e3de!important;border-radius:0!important;color:#87958e!important;background:#fff!important;cursor:pointer;transition:.2s}.pb-cart-delete:hover{border-color:#d94d58!important;color:#fff!important;background:#d94d58!important}.pb-cart-delete svg{width:19px;height:19px;fill:none;stroke:currentColor;stroke-width:1.7;stroke-linecap:round;stroke-linejoin:round}.pb-cart-clear{display:inline-flex!important;align-items:center;gap:9px;margin-top:16px!important;padding:11px 14px!important;border:1px solid #ccd9d2!important;border-radius:0!important;color:#63736b!important;background:#fff!important;font-size:12px;cursor:pointer}.pb-cart-clear:hover{border-color:#d94d58!important;color:#d94d58!important}.pb-cart-clear svg{width:17px;height:17px;fill:none;stroke:currentColor;stroke-width:1.7;stroke-linecap:round;stroke-linejoin:round}
    .pb-cart-summary{position:sticky!important;top:90px!important;padding:30px!important;border:1px solid rgba(50,220,155,.25)!important;color:#fff!important;background:radial-gradient(circle at 90% 5%,rgba(50,220,155,.13),transparent 30%),linear-gradient(145deg,#121c17,#08100c)!important;box-shadow:0 20px 50px rgba(7,35,21,.18)}.pb-cart-summary:before{content:'';position:absolute;inset:0;pointer-events:none;opacity:.12;background-image:radial-gradient(circle,rgba(255,255,255,.8) 0 1px,transparent 1.2px);background-size:20px 20px;mask-image:linear-gradient(135deg,#000,transparent 72%)}.pb-cart-summary>*{position:relative;z-index:1}.pb-cart-summary-code{display:block;color:var(--pc-mint);font:700 9px Arial;letter-spacing:.2em}.pb-cart-summary h2{margin:9px 0 26px!important;color:#fff!important;font-size:29px!important}.pb-cart-summary-count,.pb-cart-summary .summary-info{display:flex!important;align-items:center;justify-content:space-between;gap:20px;margin:0!important;padding:13px 0!important;border-bottom:1px solid rgba(255,255,255,.11);color:#9eaea6!important;font-size:13px}.pb-cart-summary .summary-info .index{color:#fff!important;font-size:14px!important;text-align:right}.pb-cart-summary .total-info{margin-top:9px!important;padding:20px 0!important}.pb-cart-summary .total-info .title{color:#fff;font-size:16px}.pb-cart-summary .total-info .index{color:var(--pc-mint)!important;font-size:25px!important}.pb-cart-checkout{width:100%;min-height:58px;display:grid;grid-template-columns:28px 1fr 28px;align-items:center;gap:10px;margin-top:24px;padding:12px 16px;border:1px solid var(--pc-green);border-radius:0;color:#fff;background:linear-gradient(90deg,#078f5c,var(--pc-green));font-family:inherit;font-size:15px;font-weight:700;cursor:pointer}.pb-cart-checkout:hover{background:var(--pc-mint);color:#07110c}.pb-cart-checkout svg{width:22px;height:22px;fill:none;stroke:currentColor;stroke-width:1.7;stroke-linecap:round;stroke-linejoin:round}.pb-cart-assurance{display:flex;align-items:center;justify-content:center;gap:10px;margin-top:18px;color:#85968d;font-size:10px;line-height:1.4;text-align:left}.pb-cart-assurance svg{width:22px;height:22px;fill:none;stroke:var(--pc-green);stroke-width:1.6;stroke-linecap:round;stroke-linejoin:round}
    @media(max-width:1250px){.pb-cart-layout{grid-template-columns:1fr 330px}.pb-cart-product{grid-template-columns:120px minmax(170px,1fr) 110px 122px 120px 42px;gap:12px}.pb-cart-image{width:120px}.pb-cart-copy h2{font-size:16px!important}}
    @media(max-width:980px){.pb-cart-layout{grid-template-columns:1fr}.pb-cart-summary{position:relative!important;top:auto!important}.pb-cart-product{grid-template-columns:120px 1fr 120px 42px}.pb-cart-price{grid-column:2}.pb-cart-quantity{grid-column:3;grid-row:1/3}.pb-cart-subtotal{grid-column:2}.pb-cart-delete{grid-column:4;grid-row:1/3}}
    @media(max-width:620px){.cart__wrap{width:calc(100% - 24px)!important}.cart__wrap>h1{font-size:32px!important}.pb-cart-product{grid-template-columns:95px 1fr 40px;padding:12px!important;gap:11px}.pb-cart-image{width:95px;height:105px}.pb-cart-copy h2{font-size:15px!important}.pb-cart-price,.pb-cart-subtotal{grid-column:2}.pb-cart-quantity{grid-column:1/3;grid-row:auto}.pb-cart-delete{grid-column:3;grid-row:1}.pb-cart-summary{padding:24px!important}}
    /* Compact delete control: no empty square after the quantity buttons. */
    .pb-cart-quantity{width:122px!important;box-sizing:border-box!important;border:0!important;background:transparent!important}
    .pb-cart-product{grid-template-columns:120px minmax(170px,1fr) 110px 122px 120px!important;padding-right:48px!important}
    .pb-cart-delete{position:absolute!important;right:13px!important;top:13px!important;width:28px!important;height:28px!important;padding:0!important;border:0!important;color:#87958e!important;background:transparent!important;box-shadow:none!important}
    .pb-cart-delete:hover{color:#d94d58!important;background:transparent!important;transform:scale(1.1)}
    .pb-cart-product.is-unavailable{border-color:#b92f3d!important;border-left-color:#ef3f4f!important;background:linear-gradient(100deg,#fff1f2,#f6dadd)!important;box-shadow:0 12px 30px rgba(185,47,61,.18)!important}.pb-cart-product.is-unavailable .pb-cart-image{border-color:#eab4ba;background-color:#f2d9dc}.pb-cart-product.is-unavailable .pb-cart-image img{filter:grayscale(1);opacity:.55}.pb-cart-product.is-unavailable .pb-cart-copy>span,.pb-cart-product.is-unavailable .pb-cart-price b,.pb-cart-product.is-unavailable .pb-cart-subtotal b{color:#c52f3f!important}.pb-cart-product.is-unavailable .pb-cart-copy small.is-unavailable{color:#c52f3f!important;font-weight:800;text-transform:uppercase}.pb-cart-product.is-unavailable .pb-cart-copy small.is-unavailable:before{background:#ef3f4f;box-shadow:0 0 0 4px rgba(239,63,79,.13)}.pb-cart-product.is-unavailable .pb-cart-quantity button:disabled{color:#a97f84!important;background:#ecdadd!important;cursor:not-allowed}.pb-cart-checkout.is-disabled{border-color:#7d3038!important;color:#e5afb5!important;background:#421b20!important;cursor:not-allowed!important}.pb-cart-stock-warning{margin:12px 0 0;color:#f0808c;font-size:11px;line-height:1.45;text-align:center}
    @media(max-width:1250px){.pb-cart-product{grid-template-columns:120px minmax(170px,1fr) 110px 122px 120px!important}}
    @media(max-width:980px){.pb-cart-product{grid-template-columns:120px 1fr 120px!important}.pb-cart-delete{grid-column:auto!important;grid-row:auto!important}}
    @media(max-width:620px){.pb-cart-product{grid-template-columns:95px 1fr!important;padding-right:42px!important}.pb-cart-delete{grid-column:auto!important;grid-row:auto!important}}
    /* Mobile cart: compact two-column card with no horizontal clipping. */
    @media(max-width:620px){
        .cart__wrap{width:calc(100% - 20px)!important;overflow:visible!important}
        .pb-cart-layout,.pb-cart-main,.pb-cart-products{width:100%!important;min-width:0!important}
        .pb-cart-list-head{height:52px;padding:0 13px}
        .pb-cart-product{
            width:100%!important;max-width:100%!important;min-width:0!important;min-height:0!important;
            grid-template-columns:84px minmax(0,1fr)!important;
            grid-template-areas:"image copy" "image price" "quantity subtotal"!important;
            align-items:start!important;gap:7px 11px!important;
            padding:11px 34px 12px 10px!important;overflow:hidden!important;
        }
        .pb-cart-image{grid-area:image!important;width:84px!important;height:104px!important;align-self:start!important}
        .pb-cart-copy{grid-area:copy!important;width:100%!important;min-width:0!important;overflow:hidden!important}
        .pb-cart-copy>span{margin-bottom:5px;font-size:7px;letter-spacing:.1em}
        .pb-cart-copy h2{width:100%!important;max-width:100%!important;min-height:0!important;font-size:12px!important;line-height:1.22!important;overflow-wrap:anywhere!important;word-break:break-word!important;-webkit-line-clamp:3!important}
        .pb-cart-copy small{margin-top:6px;font-size:9px;line-height:1.2}
        .pb-cart-price{grid-area:price!important;min-width:0!important;display:flex!important;flex-direction:row!important;align-items:baseline!important;flex-wrap:wrap!important;gap:5px!important}
        .pb-cart-price b{font-size:16px!important;white-space:normal!important}.pb-cart-price del{font-size:9px}
        .pb-cart-quantity{grid-area:quantity!important;grid-column:auto!important;grid-row:auto!important;width:94px!important;height:36px!important;grid-template-columns:29px 36px 29px!important;align-self:center!important}
        .pb-cart-quantity button{width:29px;height:36px}.pb-cart-quantity input{width:36px!important;height:36px!important;font-size:13px!important}
        .pb-cart-subtotal{grid-area:subtotal!important;grid-column:auto!important;min-width:0!important;align-self:center!important;gap:3px!important}
        .pb-cart-subtotal small{font-size:6px}.pb-cart-subtotal b{font-size:15px!important;white-space:normal!important;line-height:1.1!important}
        .pb-cart-delete{right:7px!important;top:7px!important;width:25px!important;height:25px!important}
        .pb-cart-summary{padding:20px!important}.pb-cart-summary h2{font-size:24px!important}
    }
    @media(prefers-reduced-motion:reduce){.pb-cart *{transition:none!important}}
</style>
{{-- Runtime корзины подключён постоянно через layouts/base.blade.php.
<script>
(function(){
    var moneyValues=window.__pbCartMoneyValues||(window.__pbCartMoneyValues=new Map());
    var moneyFrame=0;
    function formatMoney(value){return Math.round(value).toLocaleString('ru-RU').replace(/\u00a0/g,' ')+' ₸';}
    function syncMoney(animate){
        document.querySelectorAll('[data-pb-cart] [data-pb-money]').forEach(function(node){
            var key=node.getAttribute('data-pb-money');
            var next=Number(node.getAttribute('data-pb-value'))||0;
            var previous=moneyValues.has(key)?moneyValues.get(key):next;
            moneyValues.set(key,next);
            if(node.__pbMoneyTween){node.__pbMoneyTween.kill();node.__pbMoneyTween=null;}
            if(!animate||previous===next||typeof gsap==='undefined'){
                node.textContent=formatMoney(next);
                return;
            }
            var counter={value:previous};
            node.__pbMoneyTween=gsap.to(counter,{value:next,duration:.58,ease:'power2.out',overwrite:true,onUpdate:function(){node.textContent=formatMoney(counter.value);},onComplete:function(){node.textContent=formatMoney(next);node.__pbMoneyTween=null;}});
        });
    }
    function queueMoneySync(animate){
        if(moneyFrame)cancelAnimationFrame(moneyFrame);
        moneyFrame=requestAnimationFrame(function(){
            moneyFrame=requestAnimationFrame(function(){moneyFrame=0;syncMoney(animate);});
        });
    }
    function bindCartMorphHook(){
        if(window.__pbCartMorphHookBound||!window.Livewire||typeof Livewire.hook!=='function')return;
        window.__pbCartMorphHookBound=true;
        Livewire.hook('morph.updated',function(payload){
            var element=payload&&payload.el;
            if(!element||!(element.matches?.('[data-pb-cart]')||element.closest?.('[data-pb-cart]')))return;
            queueMoneySync(true);
        });
    }
    function cartComponent(element){
        var root=element.closest('[wire\\:id]');
        return root&&window.Livewire?Livewire.find(root.getAttribute('wire:id')):null;
    }
    function destroyWithMotion(button){
        if(button.dataset.pbBusy)return;
        button.dataset.pbBusy='1';
        var item=button.closest('[data-pb-cart-item]');
        var component=cartComponent(button);
        var rowId=button.getAttribute('data-pb-cart-destroy');
        var remove=function(){if(component&&rowId)component.call('destroy',rowId);};
        if(item&&typeof gsap!=='undefined'&&!matchMedia('(prefers-reduced-motion: reduce)').matches){
            gsap.to(item,{x:-Math.max(280,item.offsetWidth*.55),autoAlpha:0,height:0,minHeight:0,marginBottom:-12,paddingTop:0,paddingBottom:0,duration:.46,ease:'power3.in',overwrite:true,onComplete:remove});
        }else remove();
    }
    function animateCart(){
        var root=document.querySelector('[data-pb-cart]:not([data-pb-cart-ready])');
        queueMoneySync(true);
        if(!root||typeof gsap==='undefined')return;
        root.setAttribute('data-pb-cart-ready','1');
        var listHead=root.querySelector('.pb-cart-list-head');
        var items=root.querySelectorAll('[data-pb-cart-item]');
        if(listHead)gsap.from(listHead,{y:-18,autoAlpha:0,duration:.45,ease:'power3.out',clearProps:'transform,opacity,visibility'});
        if(items.length)gsap.from(items,{y:24,autoAlpha:0,duration:.45,stagger:Math.min(.045,.32/items.length),ease:'power3.out',delay:.08,clearProps:'transform,opacity,visibility'});
        var summary=root.querySelector('[data-pb-cart-summary]');
        if(summary)gsap.from(summary,{x:28,autoAlpha:0,duration:.55,ease:'power3.out',delay:.14,clearProps:'transform,opacity,visibility'});
    }
    if(!window.__pbCartPageBooted){
        window.__pbCartPageBooted=true;
        document.addEventListener('livewire:navigated',animateCart);
        document.addEventListener('livewire:init',bindCartMorphHook,{once:true});
        document.addEventListener('cart-values-updated',function(){
            queueMoneySync(true);
        });
        document.addEventListener('click',function(event){
            var destroy=event.target.closest&&event.target.closest('[data-pb-cart-destroy]');
            if(destroy){event.preventDefault();event.stopPropagation();destroyWithMotion(destroy);return;}
        },true);
    }
    bindCartMorphHook();
    syncMoney(false);
    animateCart();
})();
</script>
--}}
</section>
