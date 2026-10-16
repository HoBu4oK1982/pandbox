@section('title', 'Pandbox — Оформление заказа')

<div class="pb-checkout-root">
<section class="pb-checkout" data-pb-checkout>
    <header class="pb-checkout-hero">
        <div class="pb-checkout-grid" aria-hidden="true"></div>
        <div class="pb-checkout-container pb-checkout-hero__inner">
            <div class="pb-checkout-hero__copy">
                <span>PBX / CHECKOUT</span>
                <h1>Оформление заказа</h1>
                <p>Последний шаг. Проверьте контакты и выберите удобный способ получения.</p>
            </div>
            <div class="pb-checkout-hero__status" aria-hidden="true">
                <i></i><strong>03</strong><small>Финишная точка</small>
            </div>
        </div>
    </header>

    <div class="pb-checkout-container">
        <nav class="pb-checkout-breadcrumbs" aria-label="Хлебные крошки">
            <a wire:navigate href="/">Главная</a><span>→</span><a wire:navigate href="{{ route('cart') }}">Корзина</a><span>→</span><b>Оформление</b>
        </nav>

        <form wire:submit.prevent="placeOrder" class="pb-checkout-layout">
            <section class="pb-checkout-form">
                <div class="pb-checkout-heading">
                    <div><span>01 / КОНТАКТЫ</span><h2>Данные получателя</h2></div>
                    <p>Менеджер использует их только для подтверждения заказа.</p>
                </div>

                <div class="pb-checkout-fields">
                    <label class="pb-checkout-field @error('firstname') has-error @enderror">
                        <span>Ваше имя <b>*</b></span>
                        <span class="pb-checkout-input">
                            <svg viewBox="0 0 24 24"><circle cx="12" cy="8" r="4"/><path d="M4 21c.7-5 3.4-7.5 8-7.5s7.3 2.5 8 7.5"/></svg>
                            <input type="text" name="fname" placeholder="Как к вам обращаться" wire:model="firstname" autocomplete="name">
                        </span>
                        @error('firstname')<small>{{ $message }}</small>@enderror
                    </label>

                    <label class="pb-checkout-field @error('mobile') has-error @enderror">
                        <span>Мобильный телефон <b>*</b></span>
                        <span class="pb-checkout-input">
                            <svg viewBox="0 0 24 24"><path d="M6.5 3H4a1 1 0 0 0-1 1 17 17 0 0 0 17 17 1 1 0 0 0 1-1v-2.5a1 1 0 0 0-.8-1l-4-1a1 1 0 0 0-1 .3l-.9 1.1a14 14 0 0 1-7.2-7.2l1.1-.9a1 1 0 0 0 .3-1l-1-4A1 1 0 0 0 6.5 3Z"/></svg>
                            <input type="tel" name="phone" class="art-stranger" placeholder="+7 (___) ___-__-__" wire:model="mobile" autocomplete="tel">
                        </span>
                        @error('mobile')<small>{{ $message }}</small>@enderror
                    </label>

                    <label class="pb-checkout-field pb-checkout-field--wide @error('email') has-error @enderror">
                        <span>E-mail</span>
                        <span class="pb-checkout-input">
                            <svg viewBox="0 0 24 24"><path d="M3 5h18v14H3z"/><path d="m4 7 8 6 8-6"/></svg>
                            <input type="email" name="email" placeholder="mail@example.com" wire:model="email" autocomplete="email">
                        </span>
                        @error('email')<small>{{ $message }}</small>@enderror
                    </label>
                </div>

                <div class="pb-checkout-heading pb-checkout-heading--delivery">
                    <div><span>02 / ПОЛУЧЕНИЕ</span><h2>Доставка или самовывоз</h2></div>
                </div>

                <label class="pb-pickup-card">
                    <input type="checkbox" id="noaddress" name="noaddress" wire:model="noaddress" wire:change="$refresh">
                    <span class="pb-pickup-box"><i></i></span>
                    <span class="pb-pickup-icon"><svg viewBox="0 0 24 24"><path d="M4 21V7l8-4 8 4v14"/><path d="M8 21v-6h8v6M8 10h.01M12 10h.01M16 10h.01"/></svg></span>
                    <span><b>Заберу сам</b><small>Алматы, ул. Крылова 24</small></span>
                    <em>Бесплатно</em>
                </label>

                <div class="pb-checkout-fields pb-checkout-delivery-fields">
                    <label class="pb-checkout-field @error('city') has-error @enderror">
                        <span>Город <b>*</b></span>
                        <span class="pb-checkout-input">
                            <svg viewBox="0 0 24 24"><path d="M12 22s7-6.2 7-13a7 7 0 1 0-14 0c0 6.8 7 13 7 13Z"/><circle cx="12" cy="9" r="2.5"/></svg>
                            <input type="text" name="city" placeholder="Алматы" wire:model="city" autocomplete="address-level2">
                        </span>
                        @error('city')<small>{{ $message }}</small>@enderror
                    </label>

                    <label class="pb-checkout-field @error('address') has-error @enderror">
                        <span>Адрес <b>*</b></span>
                        <span class="pb-checkout-input">
                            <svg viewBox="0 0 24 24"><path d="M3 21h18M5 21V9l7-5 7 5v12M9 21v-6h6v6"/></svg>
                            <input type="text" name="address" placeholder="Улица, дом, квартира" wire:model="address" autocomplete="street-address" @disabled($noaddress)>
                        </span>
                        @error('address')<small>{{ $message }}</small>@enderror
                    </label>
                </div>

                <div class="pb-checkout-safe">
                    <svg viewBox="0 0 24 24"><path d="M12 2 20 5v6c0 5-3.4 9-8 11-4.6-2-8-6-8-11V5z"/><path d="m8 12 2.5 2.5L16 9"/></svg>
                    <span><b>Безопасное оформление</b><small>Все обязательные поля отмечены звёздочкой</small></span>
                </div>
            </section>

            <aside class="pb-checkout-summary">
                <div class="pb-checkout-summary__head"><span>PBX / ORDER</span><h2>Ваш заказ</h2><b>{{ Cart::instance('cart')->count() }} шт.</b></div>
                <div class="pb-checkout-products">
                    @foreach(Cart::instance('cart')->content() as $item)
                        @php
                            $cartProduct = $item->model;
                            $cartImages = $cartProduct ? array_filter(explode(',', (string) $cartProduct->images)) : [];
                            $cartImage = count($cartImages) ? asset('assets/images/products/' . reset($cartImages)) : asset('assets/images/design/no-image.jpg');
                        @endphp
                        <div class="pb-checkout-product">
                            <img src="{{ $cartImage }}" alt="{{ $item->name }}">
                            <span><b>{{ $item->name }}</b><small>{{ $item->qty }} × {{ number_format((float) $item->price, 0, '.', ' ') }} <i class="pb-tenge">₸</i></small></span>
                            <strong>{{ number_format((float) $item->subtotal, 0, '.', ' ') }} <i class="pb-tenge">₸</i></strong>
                        </div>
                    @endforeach
                </div>

                @if($errors->any())
                    <div class="pb-checkout-errors" role="alert">
                        <strong>Проверьте данные</strong>
                        <ul>@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
                    </div>
                @endif

                <div class="pb-checkout-total">
                    <span><small>Товары</small><b>@if(Session::has('checkout')){{ Session::get('checkout')['subtotal'] }} <i class="pb-tenge">₸</i>@else—@endif</b></span>
                    <span><small>Доставка</small><b>Уточнит менеджер</b></span>
                    <div><small>Итого</small><strong>@if(Session::has('checkout')){{ Session::get('checkout')['total'] }} <i class="pb-tenge">₸</i>@else—@endif</strong></div>
                </div>

                <button type="submit" class="pb-checkout-submit" wire:loading.attr="disabled" wire:target="placeOrder">
                    <span wire:loading.remove wire:target="placeOrder">Оформить заказ</span>
                    <span wire:loading wire:target="placeOrder">Отправляем заказ…</span>
                    <svg viewBox="0 0 24 24"><path d="M5 12h13M13 6l6 6-6 6"/></svg>
                </button>
                <p class="pb-checkout-consent">Нажимая кнопку, вы подтверждаете правильность данных. Менеджер свяжется с вами для уточнения деталей.</p>
            </aside>
        </form>
    </div>
</section>

@once
<style>
.pb-checkout .pb-tenge{font-family:Arial,sans-serif!important;font-size:.82em;font-style:normal;font-weight:700}
.pb-checkout{--pc-green:#18bd7d;--pc-mint:#39e5a2;--pc-dark:#07110c;--pc-red:#e84c5b;min-height:760px;padding-bottom:82px;color:#17211c;background-color:#f4f7f5;background-image:radial-gradient(circle,rgba(19,126,79,.12) 0 1px,transparent 1.2px);background-size:22px 22px}.pb-checkout *{box-sizing:border-box}.pb-checkout-container{width:min(1320px,calc(100% - 48px));margin-inline:auto}.pb-checkout-hero{position:relative;min-height:245px;overflow:hidden;color:#fff;background:radial-gradient(circle at 72% 5%,rgba(29,194,127,.25),transparent 34%),linear-gradient(110deg,#07110c,#10241a 60%,#07110c);border-top:1px solid var(--pc-green);border-bottom:2px solid var(--pc-green)}.pb-checkout-hero:after{content:'PANDBOX / CHECKOUT';position:absolute;left:50%;bottom:-25px;color:rgba(54,224,157,.045);font:900 clamp(64px,8vw,130px)/.8 Arial;letter-spacing:-.07em;white-space:nowrap;transform:translateX(-50%)}.pb-checkout-grid{position:absolute;inset:0;opacity:.16;background-image:linear-gradient(rgba(56,222,157,.16) 1px,transparent 1px),linear-gradient(90deg,rgba(56,222,157,.16) 1px,transparent 1px);background-size:34px 34px;mask-image:linear-gradient(90deg,#000,transparent 88%)}.pb-checkout-hero__inner{position:relative;z-index:2;min-height:245px;display:flex;align-items:center;justify-content:space-between;gap:50px}.pb-checkout-hero__copy>span,.pb-checkout-heading span,.pb-checkout-summary__head>span{color:var(--pc-mint);font:700 9px/1 Arial;letter-spacing:.2em}.pb-checkout-hero h1{margin:13px 0!important;color:#fff!important;font-size:clamp(42px,4vw,62px)!important;line-height:1!important;font-weight:500!important}.pb-checkout-hero p{margin:0;color:#9aada2;font-size:14px}.pb-checkout-hero__status{position:relative;width:215px;height:150px;display:flex;flex-direction:column;align-items:center;justify-content:center;border:1px solid rgba(57,229,162,.25);background:rgba(4,14,8,.38)}.pb-checkout-hero__status:before,.pb-checkout-hero__status:after{content:'';position:absolute;width:34px;height:34px}.pb-checkout-hero__status:before{left:-1px;top:-1px;border-left:2px solid var(--pc-mint);border-top:2px solid var(--pc-mint)}.pb-checkout-hero__status:after{right:-1px;bottom:-1px;border-right:2px solid var(--pc-mint);border-bottom:2px solid var(--pc-mint)}.pb-checkout-hero__status i{width:9px;height:9px;background:var(--pc-mint);box-shadow:0 0 0 8px rgba(57,229,162,.09)}.pb-checkout-hero__status strong{margin:13px 0 4px;font:500 46px/1 'MagistralMedium',Tahoma,sans-serif}.pb-checkout-hero__status small{color:#82958a;font:700 8px Arial;letter-spacing:.18em;text-transform:uppercase}.pb-checkout-breadcrumbs{height:66px;display:flex;align-items:center;gap:12px;border-bottom:1px solid #dae4df;font-size:12px}.pb-checkout-breadcrumbs a{color:#159465;text-decoration:none}.pb-checkout-breadcrumbs span{color:#96a49d}.pb-checkout-breadcrumbs b{color:#56675e;font-weight:500}.pb-checkout-layout{display:grid;grid-template-columns:minmax(0,1.4fr) minmax(350px,.72fr);align-items:start;gap:22px;margin-top:24px}.pb-checkout-form,.pb-checkout-summary{border:1px solid #dce7e1;background:rgba(255,255,255,.97);box-shadow:0 22px 55px rgba(8,60,34,.08)}.pb-checkout-form{padding:30px}.pb-checkout-heading{display:flex;align-items:flex-end;justify-content:space-between;gap:25px;margin-bottom:24px;padding-bottom:20px;border-bottom:1px solid #dce7e1}.pb-checkout-heading h2,.pb-checkout-summary h2{margin:7px 0 0!important;color:#17211c!important;font-size:28px!important;line-height:1!important}.pb-checkout-heading p{max-width:330px;margin:0;color:#7a8981;font-size:11px;line-height:1.5;text-align:right}.pb-checkout-heading--delivery{margin-top:34px}.pb-checkout-fields{display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:18px}.pb-checkout-field{position:relative;display:block}.pb-checkout-field--wide{grid-column:1/-1}.pb-checkout-field>span:first-child{display:block;margin-bottom:8px;color:#66776e;font:700 9px Arial;letter-spacing:.12em;text-transform:uppercase}.pb-checkout-field>span b{color:var(--pc-red)}.pb-checkout-input{height:54px;display:flex;align-items:center;border:1px solid #cedbd4;background:#fbfdfc;transition:.22s}.pb-checkout-input:focus-within{border-color:var(--pc-green);background:#fff;box-shadow:0 0 0 3px rgba(24,189,125,.08)}.pb-checkout-input svg{width:20px;height:20px;flex:0 0 20px;margin:0 13px;fill:none;stroke:#159b68;stroke-width:1.7;stroke-linecap:round;stroke-linejoin:round}.pb-checkout-input input{width:100%;height:100%;min-width:0;padding:0 14px 0 0;border:0!important;outline:0!important;color:#152119;background:transparent!important;font-family:inherit;font-size:14px;box-shadow:none!important}.pb-checkout-input input::placeholder{color:#a1afa8}.pb-checkout-input input:disabled{color:#98a59e;cursor:not-allowed}.pb-checkout-field>small{display:block;margin-top:6px;color:var(--pc-red);font-size:10px}.pb-checkout-field.has-error .pb-checkout-input{border-color:var(--pc-red);background:#fff8f8}.pb-pickup-card{position:relative;min-height:76px;display:grid;grid-template-columns:auto 42px 1fr auto;align-items:center;gap:14px;margin-bottom:18px;padding:14px 17px;border:1px solid #cddbd4;background:linear-gradient(110deg,#f8fcfa,#fff);cursor:pointer;transition:.22s}.pb-pickup-card:hover{border-color:var(--pc-green)}.pb-pickup-card>input{position:absolute;opacity:0;pointer-events:none}.pb-pickup-box{width:22px;height:22px;display:grid;place-items:center;border:1px solid #a9bbb1;background:#fff}.pb-pickup-box i{width:10px;height:10px;background:var(--pc-green);opacity:0;transform:scale(.4);transition:.2s}.pb-pickup-card>input:checked~.pb-pickup-box{border-color:var(--pc-green)}.pb-pickup-card>input:checked~.pb-pickup-box i{opacity:1;transform:scale(1)}.pb-pickup-icon{width:42px;height:42px;display:grid;place-items:center;color:#159b68;background:#eaf8f1}.pb-pickup-icon svg{width:24px;height:24px;fill:none;stroke:currentColor;stroke-width:1.6;stroke-linecap:round;stroke-linejoin:round}.pb-pickup-card b,.pb-pickup-card small{display:block}.pb-pickup-card b{color:#17211c;font-size:14px}.pb-pickup-card small{margin-top:5px;color:#74847b;font-size:11px}.pb-pickup-card em{color:#159b68;font:700 10px Arial;letter-spacing:.08em;text-transform:uppercase}.pb-checkout-safe{display:flex;align-items:center;gap:12px;margin-top:23px;padding:15px;border-left:3px solid var(--pc-green);background:#eef8f3}.pb-checkout-safe svg{width:27px;height:27px;flex:0 0 27px;fill:none;stroke:#159b68;stroke-width:1.7;stroke-linecap:round;stroke-linejoin:round}.pb-checkout-safe b,.pb-checkout-safe small{display:block}.pb-checkout-safe b{font-size:12px}.pb-checkout-safe small{margin-top:3px;color:#74847b;font-size:10px}.pb-checkout-summary{position:sticky;top:90px;overflow:hidden;background:radial-gradient(circle at 100% 0,rgba(31,199,132,.14),transparent 28%),linear-gradient(145deg,#111c16,#08100b);color:#fff;border-color:#1a6b49}.pb-checkout-summary__head{position:relative;padding:25px 24px 20px;border-bottom:1px solid rgba(255,255,255,.1)}.pb-checkout-summary__head h2{color:#fff!important}.pb-checkout-summary__head>b{position:absolute;right:24px;bottom:22px;color:#7d9186;font-size:11px}.pb-checkout-products{max-height:280px;overflow:auto;padding:5px 20px}.pb-checkout-products::-webkit-scrollbar{width:4px}.pb-checkout-products::-webkit-scrollbar-thumb{background:#159b68}.pb-checkout-product{display:grid;grid-template-columns:58px 1fr auto;align-items:center;gap:11px;padding:14px 0;border-bottom:1px solid rgba(255,255,255,.09)}.pb-checkout-product img{width:58px;height:58px;object-fit:contain;background:#fff}.pb-checkout-product span{min-width:0}.pb-checkout-product span b{display:-webkit-box;overflow:hidden;color:#dce7e1;font-size:11px;line-height:1.35;-webkit-box-orient:vertical;-webkit-line-clamp:2}.pb-checkout-product span small{display:block;margin-top:6px;color:#71867b;font-size:9px}.pb-checkout-product>strong{color:#36d99a;font-size:11px;white-space:nowrap}.pb-checkout-errors{margin:16px 20px 0;padding:14px;border:1px solid rgba(232,76,91,.55);color:#f08b95;background:rgba(232,76,91,.08);font-size:10px}.pb-checkout-errors strong{display:block;margin-bottom:6px;color:#fff;font-size:11px}.pb-checkout-errors ul{margin:0;padding-left:15px}.pb-checkout-total{padding:19px 24px}.pb-checkout-total>span{display:flex;justify-content:space-between;gap:15px;padding:7px 0;color:#809187;font-size:10px}.pb-checkout-total>span b{color:#bcc9c2;font-weight:500}.pb-checkout-total>div{display:flex;align-items:flex-end;justify-content:space-between;gap:15px;margin-top:12px;padding-top:17px;border-top:1px solid rgba(255,255,255,.13)}.pb-checkout-total>div small{color:#fff;font:700 10px Arial;letter-spacing:.12em;text-transform:uppercase}.pb-checkout-total>div strong{color:#38e09f;font:500 30px/1 'MagistralMedium',Tahoma,sans-serif}.pb-checkout-submit{width:calc(100% - 48px);min-height:58px;display:flex;align-items:center;justify-content:center;gap:15px;margin:0 24px;padding:13px 18px;border:1px solid var(--pc-green);color:#06110b;background:linear-gradient(90deg,#18bd7d,#39e5a2);font-family:inherit;font-size:16px;cursor:pointer;transition:.22s}.pb-checkout-submit:hover{color:#fff;background:#078c5a;transform:translateY(-2px)}.pb-checkout-submit:disabled{opacity:.65;cursor:wait}.pb-checkout-submit svg{width:21px;height:21px;fill:none;stroke:currentColor;stroke-width:1.8;stroke-linecap:round;stroke-linejoin:round}.pb-checkout-consent{margin:13px 24px 23px;color:#6f8277;font-size:9px;line-height:1.5;text-align:center}
@media(max-width:980px){.pb-checkout-layout{grid-template-columns:1fr}.pb-checkout-summary{position:static}.pb-checkout-hero__status{display:none}}
@media(max-width:680px){.pb-checkout-container{width:min(100% - 24px,1320px)}.pb-checkout-hero,.pb-checkout-hero__inner{min-height:205px}.pb-checkout-hero h1{font-size:36px!important}.pb-checkout-form{padding:20px}.pb-checkout-heading{align-items:flex-start;flex-direction:column}.pb-checkout-heading p{text-align:left}.pb-checkout-fields{grid-template-columns:1fr}.pb-checkout-field--wide{grid-column:auto}.pb-pickup-card{grid-template-columns:auto 38px 1fr}.pb-pickup-card em{grid-column:3}.pb-checkout-product{grid-template-columns:50px 1fr}.pb-checkout-product>strong{grid-column:2}.pb-checkout-total>div strong{font-size:24px}}
@media(max-width:680px){
    .pb-checkout-root{overflow-x:clip}
    .pb-checkout{min-height:0;padding-bottom:92px}
    .pb-checkout-container{width:calc(100% - 20px)}
    .pb-checkout-hero,.pb-checkout-hero__inner{min-height:158px}
    .pb-checkout-hero__inner{align-items:center}
    .pb-checkout-hero h1{margin:8px 0 9px!important;font-size:30px!important;line-height:1.02!important}
    .pb-checkout-hero p{max-width:370px;font-size:12px;line-height:1.45}
    .pb-checkout-hero:after{bottom:-8px;font-size:54px}
    .pb-checkout-breadcrumbs{height:52px;gap:9px;overflow-x:auto;white-space:nowrap;scrollbar-width:none}
    .pb-checkout-breadcrumbs::-webkit-scrollbar{display:none}
    .pb-checkout-layout{gap:14px;margin-top:14px}
    .pb-checkout-form{padding:14px}
    .pb-checkout-heading{gap:7px;margin-bottom:16px;padding-bottom:13px}
    .pb-checkout-heading h2,.pb-checkout-summary h2{font-size:21px!important;line-height:1.12!important}
    .pb-checkout-heading p{max-width:none;font-size:10px;line-height:1.45}
    .pb-checkout-heading--delivery{margin-top:24px}
    .pb-checkout-fields{gap:13px}
    .pb-checkout-field>span:first-child{margin-bottom:6px}
    .pb-checkout-input{height:50px}
    .pb-checkout-input input{font-size:16px}
    .pb-pickup-card{min-height:68px;grid-template-columns:20px 38px minmax(0,1fr);gap:10px;margin-bottom:14px;padding:10px}
    .pb-pickup-card b{font-size:13px}.pb-pickup-card small{font-size:10px}
    .pb-pickup-card em{grid-column:3;margin-top:-4px;font-size:8px}
    .pb-checkout-safe{margin-top:15px;padding:12px}
    .pb-checkout-summary__head{padding:18px 16px 15px}
    .pb-checkout-summary__head>b{right:16px;bottom:17px}
    .pb-checkout-products{max-height:220px;padding:4px 14px}
    .pb-checkout-product{grid-template-columns:44px minmax(0,1fr) auto;gap:9px;padding:11px 0}
    .pb-checkout-product img{width:44px;height:44px}
    .pb-checkout-product>strong{grid-column:auto;font-size:10px}
    .pb-checkout-total{padding:15px 18px}
    .pb-checkout-total>div{margin-top:9px;padding-top:14px}
    .pb-checkout-total>div strong{font-size:22px}
    .pb-checkout-submit{width:calc(100% - 32px);min-height:54px;margin:0 16px;font-size:15px}
    .pb-checkout-consent{margin:11px 18px 18px}
}
</style>
<script data-navigate-once>
(function(){
    function initCheckout(){
        document.querySelectorAll('[data-pb-checkout]').forEach(function(root){
            var targets=root.querySelectorAll('.pb-checkout-hero__copy,.pb-checkout-hero__status,.pb-checkout-breadcrumbs,.pb-checkout-form,.pb-checkout-summary,.pb-checkout-field,.pb-pickup-card,.pb-checkout-safe,.pb-checkout-product');
            if(typeof gsap==='undefined')return;
            gsap.killTweensOf(targets);gsap.set(targets,{clearProps:'opacity,visibility,transform'});
            if(window.matchMedia&&window.matchMedia('(prefers-reduced-motion: reduce)').matches)return;
            gsap.fromTo(root.querySelector('.pb-checkout-hero__copy'),{x:-32,autoAlpha:0},{x:0,autoAlpha:1,duration:.58,ease:'power3.out',clearProps:'opacity,visibility,transform'});
            gsap.fromTo(root.querySelector('.pb-checkout-hero__status'),{scale:.82,rotation:-3,autoAlpha:0},{scale:1,rotation:0,autoAlpha:1,duration:.7,ease:'back.out(1.5)',clearProps:'opacity,visibility,transform'});
            gsap.fromTo(root.querySelectorAll('.pb-checkout-breadcrumbs,.pb-checkout-form,.pb-checkout-summary'),{y:22,autoAlpha:0},{y:0,autoAlpha:1,duration:.5,stagger:.1,ease:'power3.out',delay:.12,clearProps:'opacity,visibility,transform'});
            gsap.fromTo(root.querySelectorAll('.pb-checkout-field,.pb-pickup-card,.pb-checkout-safe'),{y:14,autoAlpha:0},{y:0,autoAlpha:1,duration:.36,stagger:.045,ease:'power2.out',delay:.28,clearProps:'opacity,visibility,transform'});
        });
    }
    if(document.readyState==='loading')document.addEventListener('DOMContentLoaded',initCheckout,{once:true});else initCheckout();
    document.addEventListener('livewire:navigated',function(){requestAnimationFrame(initCheckout)});
    window.addEventListener('pageshow',function(){requestAnimationFrame(initCheckout)});
})();
</script>
@endonce
</div>
