@section ('title', "$product->title купить в Алматы с доставкой отличное качество и цены")
@section ('meta_description', "$product->meta_description")
@section ('meta_keywords', "$product->meta_keywords")
<section class="container">
    <div class="commonBreadcrumbs">
        <ul>
            <li><a wire:navigate href="/"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M575.8 255.5c0 18-15 32.1-32 32.1l-32 0 .7 160.2c0 2.7-.2 5.4-.5 8.1l0 16.2c0 22.1-17.9 40-40 40l-16 0c-1.1 0-2.2 0-3.3-.1c-1.4 .1-2.8 .1-4.2 .1L416 512l-24 0c-22.1 0-40-17.9-40-40l0-24 0-64c0-17.7-14.3-32-32-32l-64 0c-17.7 0-32 14.3-32 32l0 64 0 24c0 22.1-17.9 40-40 40l-24 0-31.9 0c-1.5 0-3-.1-4.5-.2c-1.2 .1-2.4 .2-3.6 .2l-16 0c-22.1 0-40-17.9-40-40l0-112c0-.9 0-1.9 .1-2.8l0-69.7-32 0c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L564.8 231.5c8 7 12 15 11 24z"/></svg></a></li>
            →
            <li><a wire:navigate href="{{route('shop')}}">Магазин</a></li>
            @if (isset($product->category->parent->parent) && $product->category->parent->parent->slug)
                →
                <li>
                    <a wire:navigate href="{{ route('category', ['slug' => $product->category->parent->parent->slug]) }}">
                        {{ $product->category->parent->parent->title }}
                    </a>
                </li>
                →
                <li>
                    <a wire:navigate href="{{route('subcategory', ['slug' => $product->category->parent->parent->slug, 'subcategory_slug' => $product->category->parent->slug,])}}">
                        {{$product->category->parent->title}}
                    </a>
                </li>
                →
                <li>
                    <a wire:navigate href="{{route('subsubcategory', ['slug' => $product->category->parent->parent->slug, 'subcategory_slug' => $product->category->parent->slug, 'subsubcategory_slug' => $product->category->slug ])}}">
                        {{$product->category->title}}
                    </a>
                </li>
            @else
                →
                <li>
                    <a wire:navigate href="{{ route('category', ['slug' => $product->category->parent->slug]) }}">
                        {{ $product->category->parent->title }}
                    </a>
                </li>
                →
                <li>
                    <a wire:navigate href="{{route('subcategory', ['slug' => $product->category->parent->slug, 'subcategory_slug' => $product->category->slug])}}">
                        {{$product->category->title}}
                    </a>
                </li>
            @endif 
            →
            <li>{!!$product->title!!}</li>
        </ul>
    </div>
    <div class="detailWrapper pb-product-detail" data-pb-product-detail>
        @php
            $witems = Cart::instance('wishlist')->content()->pluck('id');
        @endphp
        <div class="product__content_wrap">
            <div class="product__content_img" wire:ignore>
                <span class="pb-product-frame-code">ОБЗОР ТОВАРА</span>
                @if ($product->remark === 'sale')
                    <div class="remarkIcon remarkSale">Акция</div>
                @elseif ($product->is_new)
                    <div class="remarkIcon remarkNew">Новинка</div>
                @elseif ($product->remark === 'hit')
                    <div class="remarkIcon remarkHit">Хит продаж</div>
                @endif
                <div class="flexslider">
                    <ul class="slides">
                        @php
                            $images = explode(',', $product->images);
                        @endphp
                        @foreach ($images as $image)
                            <li>
                                @if (!empty($image) && !empty($image))
                                    <img src="{{ asset('assets/images/products/' . $image) }}" class="product__item-img" alt="Product Image">
                                @else
                                    <img src="{{ asset('assets/images/design/no-image.jpg') }}" class="product__item-img" alt="No Image">
                                @endif
                            </li>
                        @endforeach
                    </ul>
                </div>
                <span class="pb-product-corner pb-product-corner-tl"></span>
                <span class="pb-product-corner pb-product-corner-br"></span>
                <span class="pb-product-target" aria-hidden="true"><svg viewBox="0 0 48 48"><circle cx="24" cy="24" r="11"/><circle cx="24" cy="24" r="4"/><path d="M24 2v12M24 34v12M2 24h12M34 24h12"/></svg></span>
            </div>
            <div class="detailsConent">
                <div class="pb-product-kicker">PANDBOX.KZ / ТАКТИЧЕСКОЕ СНАРЯЖЕНИЕ</div>
                <h1 class="detailTitle">{!!ucfirst($product->title)!!}</h1>
                <div class="pb-product-meta">
                    <span>В НАЛИЧИИ</span>
                    @if(!empty($product->SKU))<b>АРТ. {{ $product->SKU }}</b>@endif
                </div>
                <div class="pb-purchase-row">
                <div class="pb-oneclick-row">
                    <button type="button" class="pb-detail-oneclick" data-pb-oneclick data-product="{{$product->title}}">
                        <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M8.5 11V5.5a2 2 0 0 1 4 0V10m0-2.5a2 2 0 0 1 4 0V10m0-1a2 2 0 0 1 4 0v5.5c0 4.1-3.4 7.5-7.5 7.5h-1.2c-2.2 0-4.3-1-5.7-2.7l-3.7-4.5a2 2 0 0 1 3-2.6l3.1 2.8V11Z"/><path d="M4 7H1.5M5.3 3.8 3.5 2M15.8 3.5 17.5 2"/></svg>
                        <span>Купить в 1 клик</span>
                    </button>
                </div>
                {{-- Старый fancybox #dialog-content2 удалён — теперь используется partials/modals.blade.php --}}
                <div class="pb-detail-prices">
                @if ($product->sale_price !== null)
                    <div class="detailsPrice red">{{ number_format($product->price, 0, '.', ' '); }}<span>₸</span></div> <div class="productSalePrice">{{ number_format($product->sale_price, 0, '.', ' '); }}<span>₸</span></div>
                @else
                    <div class="detailsPrice">{{ number_format($product->price, 0, '.', ' '); }} <span>〒</span></div>
                @endif
                </div>
                </div>

                @php
                    $rawWarehouseStock = collect($product->stock_details ?? []);
                    $warehouseStock = collect([
                        'Алматы' => (int) $rawWarehouseStock->get('Алматы', 0),
                        'Астана' => (int) $rawWarehouseStock->get('Астана', 0),
                    ]);
                @endphp
                <div class="pb-warehouse-stock" aria-label="Наличие по складам">
                    <div class="pb-warehouse-stock__title">Наличие по магазинам</div>
                    <div class="pb-warehouse-stock__list">
                        @foreach ($warehouseStock as $warehouse => $quantity)
                            <div class="pb-warehouse-stock__item {{ $quantity > 0 ? 'is-available' : 'is-unavailable' }}">
                                <span class="pb-warehouse-stock__dot" aria-hidden="true"></span>
                                <span class="pb-warehouse-stock__city">{{ $warehouse }}</span>
                                <span class="pb-warehouse-stock__status">{{ $quantity > 0 ? 'Есть на складе' : 'Нет в наличии' }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="quantity">
                    <span>Количество:</span>
                    <div class="quantity-input">
                        <input type="text" name="product-quantity" data-max="{{ $availableToAdd }}" wire:model="qty" readonly aria-label="Выбранное количество">
                        <a class="pb-qty-button pb-qty-reduce" href="#" wire:click.prevent="decreaseQuantity" aria-label="Уменьшить количество"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M5 12h14"/></svg></a>
                        <a @class(['pb-qty-button', 'pb-qty-increase', 'is-disabled' => $availableToAdd < 1 || $qty >= $availableToAdd]) href="#" wire:click.prevent="increaseQuantity" aria-label="Увеличить количество" aria-disabled="{{ $availableToAdd < 1 || $qty >= $availableToAdd ? 'true' : 'false' }}"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 5v14M5 12h14"/></svg></a>
                    </div>
                </div>
                
                <div class="wrap-butons">
                    @php
                        $witems = Cart::instance('wishlist')->content()->pluck('id');
                        $isWished = $witems->contains($product->id);
                    @endphp
                    <a href="#" class="pb-detail-cart" data-pb-detail-cart data-slug="{{ $product->slug }}">
                        <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M3 4h2l2.4 10.5h10.3L20 7H6"/><circle cx="9" cy="19" r="1.5"/><circle cx="18" cy="19" r="1.5"/></svg>
                        <span data-pb-detail-cart-label>Добавить в корзину</span>
                    </a>
                    <a href="#" class="pb-detail-wishlist" data-pb-detail-wishlist data-slug="{{ $product->slug }}" data-active="{{ $isWished ? '1' : '0' }}">
                        <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M20.8 4.6a5.5 5.5 0 0 0-7.8 0L12 5.7l-1.1-1.1a5.5 5.5 0 0 0-7.8 7.8L12 21l7.8-7.5a5.5 5.5 0 0 0 1-8.9Z"/></svg>
                        <span data-pb-detail-wishlist-label>{{ $isWished ? 'Убрать из избранного' : 'В избранное' }}</span>
                    </a>
                </div>
                <div class="pb-product-features" aria-label="Преимущества товара">
                    <span><svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="12" r="7"/><circle cx="12" cy="12" r="2.5"/><path d="M12 1v4M12 19v4M1 12h4M19 12h4"/></svg><b>Проверено<br>Pandbox</b></span>
                    <span><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M3 7h11v10H3zM14 10h4l3 3v4h-7z"/><circle cx="7" cy="19" r="2"/><circle cx="18" cy="19" r="2"/></svg><b>Быстрая<br>доставка</b></span>
                    <span><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 2 20 5v6c0 5-3.4 9-8 11-4.6-2-8-6-8-11V5z"/><path d="m8 12 2.5 2.5L16 9"/></svg><b>Гарантия<br>качества</b></span>
                </div>
                    @if ($product->description != null)<h2>Описание</h2> @endif
                    <div class="detailDescr"><pre>{{$product->description}}</pre></div>
                </div>
            </div>
        </div>
        <style>
            .pb-product-detail{--pb-green:#10a66d;--pb-mint:#27d994;--pb-ink:#101512;--pb-line:#dce5e0}.pb-product-detail .product__content_wrap{display:grid;grid-template-columns:minmax(0,1fr) minmax(420px,.92fr);gap:0;overflow:hidden;border:2px solid var(--pb-ink);background:#fff;box-shadow:0 22px 55px rgba(17,35,26,.13)}
            .pb-product-detail .product__content_img{position:relative;min-width:0;min-height:590px;padding:48px;background:linear-gradient(135deg,#f4f7f5 0,#fff 58%);border-right:1px solid var(--pb-line)}.pb-product-detail .product__content_img:before{content:'';position:absolute;inset:0;pointer-events:none;opacity:.48;background-image:linear-gradient(rgba(16,166,109,.07) 1px,transparent 1px),linear-gradient(90deg,rgba(16,166,109,.07) 1px,transparent 1px);background-size:42px 42px;mask-image:linear-gradient(135deg,#000,transparent 72%)}
            .pb-product-detail .flexslider,.pb-product-detail .flex-viewport,.pb-product-detail .slides,.pb-product-detail .slides li{height:100%}.pb-product-detail .flexslider{position:relative;z-index:1;margin:0;border:0;background:transparent;box-shadow:none}.pb-product-detail .slides li{display:grid!important;place-items:center}.pb-product-detail .product__content_img img{width:100%;height:500px;object-fit:contain;filter:drop-shadow(0 22px 22px rgba(0,0,0,.12));transition:transform .45s ease}.pb-product-detail .product__content_img:hover img{transform:scale(1.035)}
            .pb-product-detail .product__content_img .flex-control-nav{position:absolute!important;z-index:4!important;left:50%!important;right:auto!important;bottom:26px!important;width:auto!important;max-width:calc(100% - 150px)!important;display:flex!important;flex-wrap:wrap!important;align-items:center!important;justify-content:center!important;gap:7px!important;margin:0!important;padding:0!important;transform:translateX(-50%)!important;line-height:0!important;list-style:none!important}.pb-product-detail .product__content_img .flex-control-nav li{flex:0 0 14px!important;width:14px!important;height:14px!important;margin:0!important;padding:2px!important;box-sizing:border-box!important;border:1px solid #c7d1cc!important;border-radius:0!important;background:#fff!important}.pb-product-detail .product__content_img .flex-control-nav li a{width:8px!important;height:8px!important;margin:0!important;border:0!important;border-radius:0!important;background:#e4e9e6!important;box-shadow:none!important}.pb-product-detail .product__content_img .flex-control-nav li a.flex-active{background:var(--pb-green)!important;box-shadow:0 0 0 1px rgba(16,166,109,.22)!important}
            .pb-product-frame-code{position:absolute;z-index:3;left:24px;top:22px;color:var(--pb-green);font:700 10px/1 Arial;letter-spacing:.2em}.pb-product-corner{position:absolute;z-index:2;width:42px;height:42px;pointer-events:none}.pb-product-corner-tl{left:23px;top:54px;border-left:2px solid var(--pb-green);border-top:2px solid var(--pb-green)}.pb-product-corner-br{right:23px;bottom:23px;border-right:2px solid var(--pb-green);border-bottom:2px solid var(--pb-green)}.pb-product-target{position:absolute;z-index:3;right:0;bottom:0;width:78px;height:78px;background:var(--pb-green)}.pb-product-target:after{content:'';position:absolute;left:-24px;top:0;border-style:solid;border-width:24px 24px 0 0;border-color:transparent var(--pb-green) transparent transparent}
            .pb-product-detail .detailsConent{position:relative;padding:54px 48px 40px;color:#fff;background:radial-gradient(circle at 90% 10%,rgba(39,217,148,.12),transparent 30%),linear-gradient(145deg,#151b17,#0b0f0d)}.pb-product-detail .detailsConent:before{content:'';position:absolute;inset:0;pointer-events:none;opacity:.14;background-image:radial-gradient(circle,rgba(255,255,255,.75) 0 1px,transparent 1.2px);background-size:20px 20px;mask-image:linear-gradient(135deg,#000,transparent 70%)}.pb-product-detail .detailsConent>*{position:relative;z-index:1}.pb-product-kicker{margin-bottom:16px;color:var(--pb-mint);font:700 10px/1 Arial;letter-spacing:.18em}.pb-product-detail .detailTitle{max-width:720px;margin:0 0 18px;color:#fff;font-size:clamp(28px,2.5vw,42px);line-height:1.02;letter-spacing:-.025em}.pb-product-meta{display:flex;align-items:center;gap:15px;margin-bottom:25px;color:#829189;font:700 10px Arial;letter-spacing:.13em}.pb-product-meta span{color:var(--pb-mint)}.pb-product-meta span:before{content:'';display:inline-block;width:7px;height:7px;margin-right:7px;background:var(--pb-mint);box-shadow:0 0 0 5px rgba(39,217,148,.12)}
            .pb-product-detail .deatailOneCLick{display:inline-flex;align-items:center;margin:0 0 25px;padding:11px 15px;border:1px solid rgba(39,217,148,.45);color:#d8e6df;background:rgba(39,217,148,.07);font-size:13px;cursor:pointer;transition:.25s}.pb-product-detail .deatailOneCLick:hover{color:#fff;background:rgba(39,217,148,.16);transform:translateY(-2px)}
            .pb-product-detail .remarkIcon{position:absolute;z-index:5;right:24px;top:20px;margin:0;padding:12px 24px;color:#fff;background:var(--pb-green);font:400 16px/1 'MagistralMedium',Tahoma,Verdana,sans-serif;letter-spacing:0;text-transform:none}.pb-product-detail .remarkIcon.remarkSale{background:#e33b49!important;box-shadow:0 10px 26px rgba(227,59,73,.25)}.pb-product-detail .remarkIcon.remarkNew{color:#04130c!important;background:#35ef9e!important;box-shadow:0 10px 26px rgba(53,239,158,.2)}.pb-product-detail .remarkIcon.remarkHit{background:#f28c18!important;box-shadow:0 10px 26px rgba(242,140,24,.24)}.pb-product-detail .detailsPrice{display:inline-block;margin:0 12px 20px 0;color:var(--pb-mint);font-size:42px;font-weight:800;line-height:1}.pb-product-detail .detailsPrice.red{position:relative;color:#657169;font-size:22px;text-decoration:none!important}.pb-product-detail .detailsPrice.red:after{content:'';position:absolute;left:-4px;right:-4px;top:48%;height:2px;background:#a83a44;transform:rotate(-5deg);transform-origin:center;pointer-events:none}.pb-product-detail .productSalePrice{display:inline-block;color:#ef3f4f;font-size:42px;font-weight:800;text-decoration:none!important;text-shadow:0 8px 25px rgba(239,63,79,.16)}.pb-product-detail .detailsPrice span,.pb-product-detail .productSalePrice span{font-size:.65em}
            .pb-warehouse-stock{margin:0 0 22px;padding:15px 16px;border:1px solid rgba(39,217,148,.2);background:rgba(39,217,148,.045)}.pb-warehouse-stock__title{margin-bottom:11px;color:#86968d;font:700 9px/1 Arial;letter-spacing:.14em;text-transform:uppercase}.pb-warehouse-stock__list{display:flex;flex-wrap:wrap;gap:8px}.pb-warehouse-stock__item{display:grid;grid-template-columns:8px auto;column-gap:8px;row-gap:3px;min-width:155px;padding:10px 12px;border:1px solid rgba(239,63,79,.38);background:rgba(239,63,79,.075)}.pb-warehouse-stock__dot{grid-row:1/3;align-self:center;width:7px;height:7px;border-radius:50%;background:#ef3f4f;box-shadow:0 0 0 5px rgba(239,63,79,.1)}.pb-warehouse-stock__city{color:#ef6673;font:400 15px/1.1 'MagistralMedium',Tahoma,Verdana,sans-serif}.pb-warehouse-stock__status{color:#c1525d;font:600 9px/1.2 Arial;letter-spacing:.05em}.pb-warehouse-stock__item.is-available{border-color:rgba(39,217,148,.45);background:rgba(39,217,148,.08)}.pb-warehouse-stock__item.is-available .pb-warehouse-stock__dot{background:var(--pb-mint);box-shadow:0 0 0 5px rgba(39,217,148,.12)}.pb-warehouse-stock__item.is-available .pb-warehouse-stock__city,.pb-warehouse-stock__item.is-available .pb-warehouse-stock__status{color:var(--pb-mint)}
            .pb-product-detail .quantity{display:flex;align-items:center;gap:14px;margin:4px 0 25px;padding:16px 0;border-top:1px solid rgba(255,255,255,.12);border-bottom:1px solid rgba(255,255,255,.12);color:#a9b5ae}.pb-product-detail .quantity-input{display:grid;grid-template-columns:48px 38px 38px;height:40px}.pb-product-detail .quantity-input input{grid-row:1;grid-column:1;width:48px;height:40px;padding:0;border:1px solid #3a4740;color:#fff;background:#171e1a;text-align:center}.pb-product-detail .quantity-input .btn{position:static;width:38px;height:40px;display:grid;place-items:center;padding:0;border:1px solid #3a4740;border-left:0;color:#fff;background:#171e1a}.pb-product-detail .quantity-input .btn svg{width:17px;height:17px;fill:none;stroke:#27d994;stroke-width:2;stroke-linecap:round}.pb-product-detail .quantity-input .btn:hover{color:#fff;background:#159766}.pb-product-detail .quantity-input .btn:hover svg{stroke:#fff}.pb-product-detail .quantity-input .btn-reduce{grid-column:2}.pb-product-detail .quantity-input .btn-increase{grid-column:3}
            .pb-product-detail .wrap-butons{display:grid;grid-template-columns:1.15fr .85fr;gap:10px}.pb-product-detail .wrap-butons .btn{min-height:58px;display:flex;align-items:center;justify-content:center;box-sizing:border-box;padding:13px 18px;border:1px solid var(--pb-green);color:#fff;text-align:center;text-decoration:none;transition:.25s}.pb-product-detail .product__item-cart{background:linear-gradient(90deg,#078f5c,var(--pb-green))}.pb-product-detail .product__item-cart:hover{background:var(--pb-mint);transform:translateY(-2px)}.pb-product-detail .btn-wishlist{min-height:58px;display:flex;align-items:center;justify-content:center;box-sizing:border-box;padding:13px 16px;border:1px solid #4b5951;color:#fff;background:transparent;text-align:center;text-decoration:none;transition:.25s}.pb-product-detail .btn-wishlist:hover{border-color:var(--pb-mint);background:rgba(39,217,148,.08)}
            .pb-product-features{display:grid;grid-template-columns:repeat(3,1fr);margin-top:24px;border-top:1px solid rgba(255,255,255,.12);border-bottom:1px solid rgba(255,255,255,.12)}.pb-product-features span{display:flex;align-items:center;gap:10px;padding:16px 10px;border-right:1px solid rgba(255,255,255,.12)}.pb-product-features span:last-child{border-right:0}.pb-product-features i{color:var(--pb-mint);font-size:24px;font-style:normal}.pb-product-features b{color:#bdc9c2;font:700 9px/1.35 Arial;letter-spacing:.08em;text-transform:uppercase}.pb-product-detail .detailsConent>h2{margin:28px 0 10px;color:#fff;font-size:18px}.pb-product-detail .detailDescr pre{overflow:auto;color:#aebbb4;background:transparent;white-space:pre-wrap;font:13px/1.6 inherit}
            .pb-product-detail .product__content_wrap{width:100%!important;max-width:none!important;grid-template-columns:minmax(0,1.08fr) minmax(0,.92fr)!important;align-items:stretch}.pb-product-detail .product__content_img,.pb-product-detail .detailsConent{width:auto!important;max-width:none!important;min-width:0!important;box-sizing:border-box}.pb-product-detail .detailsConent{display:block!important}.pb-product-target:before,.pb-product-detail .deatailOneCLick:before,.pb-product-detail .product__item-cart:before,.pb-product-detail .product__item-cart:after,.pb-product-detail .btn-wishlist:before,.pb-product-detail .btn-wishlist:after{content:none!important;display:none!important}.pb-product-detail .deatailOneCLick{position:static!important;top:auto!important;right:auto!important;bottom:auto!important;left:auto!important;display:inline-flex!important;visibility:visible!important;float:none!important;width:auto!important;min-height:42px;box-sizing:border-box}.pb-product-target svg{width:42px;height:42px;fill:none;stroke:#fff;stroke-width:1.5}.pb-product-detail .deatailOneCLick svg{display:block!important;width:17px;height:17px;margin-right:9px;fill:none;stroke:var(--pb-mint);stroke-width:1.8;stroke-linecap:round;stroke-linejoin:round}.pb-product-detail .wrap-butons svg{display:block!important;width:23px;height:23px;flex:0 0 23px;margin-right:10px;fill:none;stroke:currentColor;stroke-width:1.7;stroke-linecap:round;stroke-linejoin:round}.pb-product-detail .btn-wishlist svg{color:var(--pb-mint)}.pb-product-features svg{width:25px;height:25px;flex:0 0 25px;fill:none;stroke:var(--pb-mint);stroke-width:1.6;stroke-linecap:round;stroke-linejoin:round}
            .pb-oneclick-row{position:relative!important;z-index:4!important;display:block!important;width:100%!important;min-height:48px!important;margin:0 0 22px!important;overflow:visible!important;opacity:1!important;visibility:visible!important}.pb-oneclick-row .deatailOneCLick{position:relative!important;display:inline-flex!important;align-items:center!important;opacity:1!important;visibility:visible!important;height:auto!important;min-height:44px!important;margin:0!important;padding:11px 16px!important;border:1px solid #27d994!important;color:#fff!important;background:rgba(39,217,148,.1)!important;font-family:inherit!important;line-height:1!important;cursor:pointer!important}.pb-oneclick-row .deatailOneCLick:hover{color:#07110c!important;background:#27d994!important}.pb-product-detail .product__item-cart{background-color:#07945f!important;background-image:linear-gradient(90deg,#078f5c,#10a66d)!important;background-repeat:no-repeat!important;background-position:0 0!important;background-size:100% 100%!important}.pb-product-detail .product__item-cart:before,.pb-product-detail .product__item-cart:after{content:none!important;display:none!important;background:none!important;background-image:none!important}.pb-product-detail .product__item-cart>svg{display:block!important}
            .pb-oneclick-row .pb-detail-oneclick{position:relative!important;display:inline-flex!important;align-items:center!important;min-height:44px!important;margin:0!important;padding:11px 16px!important;border:1px solid #27d994!important;border-radius:0!important;color:#fff!important;background:rgba(39,217,148,.1)!important;box-shadow:none!important;font-family:inherit!important;font-size:13px!important;line-height:1!important;cursor:pointer!important}.pb-oneclick-row .pb-detail-oneclick:hover{color:#07110c!important;background:#27d994!important}.pb-detail-oneclick svg{display:block;width:17px;height:17px;margin-right:9px;fill:none;stroke:currentColor;stroke-width:1.8;stroke-linecap:round;stroke-linejoin:round}.pb-product-detail .quantity-input .pb-qty-button{position:static!important;width:38px;height:40px;display:grid!important;place-items:center;padding:0!important;border:1px solid #3a4740!important;border-left:0!important;border-radius:0!important;color:#27d994!important;background:#171e1a!important;box-shadow:none!important;text-decoration:none!important}.pb-product-detail .quantity-input .pb-qty-button svg{width:17px;height:17px;fill:none;stroke:currentColor;stroke-width:2;stroke-linecap:round}.pb-product-detail .quantity-input .pb-qty-button:hover{color:#fff!important;background:#159766!important}.pb-product-detail .quantity-input .pb-qty-reduce{grid-column:2}.pb-product-detail .quantity-input .pb-qty-increase{grid-column:3}.pb-product-detail .wrap-butons .pb-detail-cart,.pb-product-detail .wrap-butons .pb-detail-wishlist{min-height:58px;display:flex!important;align-items:center;justify-content:center;box-sizing:border-box;padding:13px 18px!important;border-radius:0!important;box-shadow:none!important;color:#fff!important;font-family:inherit!important;text-align:center;text-decoration:none!important;transition:.25s}.pb-product-detail .pb-detail-cart{border:1px solid #10a66d!important;background:linear-gradient(90deg,#078f5c,#10a66d)!important}.pb-product-detail .pb-detail-cart:hover{background:#27d994!important;transform:translateY(-2px)}.pb-product-detail .pb-detail-wishlist{border:1px solid #4b5951!important;background:transparent!important}.pb-product-detail .pb-detail-wishlist:hover{border-color:#27d994!important;background:rgba(39,217,148,.08)!important}.pb-product-detail .pb-detail-cart svg,.pb-product-detail .pb-detail-wishlist svg{display:block!important;width:23px;height:23px;flex:0 0 23px;margin-right:10px;fill:none;stroke:currentColor;stroke-width:1.7;stroke-linecap:round;stroke-linejoin:round}.pb-product-detail .pb-detail-wishlist svg{color:#27d994}
            .pb-product-target{display:grid;place-items:center}
            @media(max-width:1000px){.pb-product-detail .product__content_wrap{grid-template-columns:1fr!important}.pb-product-detail .product__content_img{min-height:500px;border-right:0;border-bottom:1px solid var(--pb-line)}.pb-product-detail .product__content_img img{height:420px}}
            @media(max-width:600px){.pb-product-detail .product__content_img{min-height:390px;padding:38px 20px}.pb-product-detail .product__content_img img{height:320px}.pb-product-detail .product__content_img .flex-control-nav{bottom:24px!important;max-width:calc(100% - 128px)!important;gap:6px!important}.pb-product-detail .product__content_img .remarkIcon{right:18px;top:17px;padding:9px 14px;font-size:12px}.pb-product-detail .detailsConent{padding:38px 22px 28px}.pb-product-detail .detailTitle{font-size:28px}.pb-product-detail .detailsPrice,.pb-product-detail .productSalePrice{font-size:34px}.pb-product-detail .wrap-butons{grid-template-columns:minmax(0,1.15fr) minmax(0,.85fr)!important;gap:7px}.pb-product-detail .wrap-butons .pb-detail-cart,.pb-product-detail .wrap-butons .pb-detail-wishlist{min-width:0;min-height:54px;padding:10px 7px!important;font-size:12px;line-height:1.15}.pb-product-detail .pb-detail-cart svg,.pb-product-detail .pb-detail-wishlist svg{width:19px;height:19px;flex-basis:19px;margin-right:6px}.pb-product-features{grid-template-columns:repeat(3,minmax(0,1fr))}.pb-product-features>span{min-width:0;min-height:72px;box-sizing:border-box;flex-direction:column;justify-content:center;gap:7px;padding:10px 5px;border-right:1px solid rgba(255,255,255,.12);border-bottom:0;text-align:center}.pb-product-features>span:last-child{border-right:0}.pb-product-features svg{width:21px;height:21px;flex-basis:21px}.pb-product-features b{font-size:8px;line-height:1.2;letter-spacing:.04em}}
            @media(max-width:600px){.pb-purchase-row{display:flex;align-items:center;justify-content:space-between;gap:10px;margin:0 0 22px}.pb-purchase-row .pb-oneclick-row{flex:0 1 auto;width:auto!important;min-height:0!important;margin:0!important}.pb-purchase-row .pb-detail-oneclick{min-height:42px!important;padding:10px 12px!important;font-size:11px!important;white-space:nowrap}.pb-purchase-row .pb-detail-oneclick svg{width:16px;height:16px;margin-right:6px}.pb-detail-prices{display:flex;flex:0 0 auto;align-items:baseline;justify-content:flex-end;gap:6px;min-width:0;margin-left:auto;white-space:nowrap}.pb-product-detail .pb-detail-prices .detailsPrice,.pb-product-detail .pb-detail-prices .productSalePrice{margin:0;font-size:28px}.pb-product-detail .pb-detail-prices .detailsPrice.red{font-size:14px}}
            @media(prefers-reduced-motion:reduce){.pb-product-detail *{transition:none!important}}
            /* Quantity controls: lock input, minus and plus to one row */
            .pb-product-detail .quantity-input{width:124px!important;height:42px!important;display:grid!important;grid-template-columns:48px 38px 38px!important;grid-template-rows:42px!important;align-items:stretch!important;overflow:hidden!important}
            .pb-product-detail .quantity-input input{position:static!important;grid-column:1!important;grid-row:1!important;width:48px!important;height:42px!important;min-width:0!important;margin:0!important;padding:0!important;box-sizing:border-box!important;border:1px solid #3a4740!important;border-radius:0!important;color:#fff!important;background:#171e1a!important;text-align:center!important}
            .pb-product-detail .quantity-input .pb-qty-button{position:static!important;grid-row:1!important;width:38px!important;height:42px!important;min-width:0!important;margin:0!important;padding:0!important;box-sizing:border-box!important;align-self:stretch!important;justify-self:stretch!important}
            .pb-product-detail .quantity-input .pb-qty-button.is-disabled{opacity:.38!important;color:#718078!important;background:#171e1a!important;cursor:not-allowed!important}
            .pb-product-detail .quantity-input .pb-qty-reduce{grid-column:2!important}
            .pb-product-detail .quantity-input .pb-qty-increase{grid-column:3!important}
</style>
        <div class="detailPopular">
            <h4>РЕКОМЕНДУЕМЫЕ ТОВАРЫ</h4>
            <div class="deatilsRelated">
                <style>
                    .productWishlist a{
                        position: absolute;
                        right:20px;
                        top:20px;
                        color: rgb(169, 169, 169);
                        font-size:32px;
                        transition: ease 1s;
                    }
                    .productWishlist a:hover{
                        color:rgba(255,183,93,1);
                    }
                    .fill-heart{
                        color:rgba(255,183,93,1);
                    }
                </style>         
                @foreach ($related_products as $product)
                    @php $new_images = explode(',' , $product->images); @endphp
                    <a wire:navigate href="{{route('product.details', ['slug' => $product->slug])}}" class="product__item" wire:ignore>
                        <p class="product__item-img-wrap">
                            @if (!empty($new_images) && !empty($new_images[0]))
                                <img src="{{ asset('assets/images/products/' . $new_images[0]) }}" class="product__item-img" alt="Product Image">
                            @else
                                <img src="{{ asset('assets/images/design/no-image.jpg') }}" class="product__item-img" alt="No Image">
                            @endif
                        </p>
                        <h4 class="product-title">{!!$product->title !!}</h4>
                        @if ($product->sale_price)
                                <div class="product__item_price_wrap">
                                    <div class="product__item-price red">{{ number_format($product->price, 0, '.', ' '); }}<span>₸</span></div>
                                    <div class="product__item_sale_price">{{ number_format($product->sale_price, 0, '.', ' '); }}<span>₸</span></div>
                                </div>
                            @else
                                <p class="product__item-price">{{ number_format($product->price, 0, '.', ' '); }}<span>₸</span></p>
                            @endif
                            @if ($product->remark === 'sale')
                                <div class="product__item-trend product__item-trend-sale">
                                    Акция
                                </div>
                            @elseif ($product->is_new)
                                <div class="product__item-trend product__item-trend-new">
                                    Новинка
                                </div>
                            @elseif ($product->remark === 'hit')
                                <div class="product__item-trend product__item-trend-hit">
                                    Хит продаж
                                </div>
                            @endif
                    </a>
                @endforeach
            </div>
        </div>
    </div>

    @push('scripts')
    <style>
        .pb-wishlist-heart-burst{position:fixed;z-index:100600;width:20px;height:20px;margin:-10px 0 0 -10px;color:#27d994;pointer-events:none;filter:drop-shadow(0 3px 5px rgba(5,70,43,.28));will-change:transform,opacity}
        .pb-wishlist-heart-burst svg{width:100%;height:100%;display:block;overflow:visible;fill:rgba(39,217,148,.22);stroke:currentColor;stroke-width:1.8;stroke-linecap:round;stroke-linejoin:round}
        .pb-detail-cart.loading,.pb-detail-wishlist.loading{pointer-events:none;opacity:.55}

        /* ── Cart button tactical animation ── */
        .pb-detail-cart{position:relative!important;overflow:hidden!important}
        .pb-detail-cart>*{position:relative;z-index:2}
        /* Scan line — sweeps across button every ~4s */
        .pb-detail-cart::before{content:'';position:absolute;top:0;left:0;width:45%;height:100%;background:linear-gradient(90deg,transparent,rgba(255,255,255,.2),transparent);transform:translateX(-120%);animation:pbCartScan 4s ease-in-out 2s infinite;pointer-events:none;z-index:1}
        @keyframes pbCartScan{0%,100%{transform:translateX(-120%);opacity:0}6%{opacity:1}94%{opacity:1}100%{transform:translateX(320%);opacity:0}}
        .pb-detail-cart:hover::before{animation-duration:1.6s!important;animation-delay:0s!important}
        /* Flash overlay on success */
        .pb-detail-cart::after{content:'';position:absolute;inset:0;background:rgba(39,217,148,.4);opacity:0;pointer-events:none;z-index:3}
        .pb-detail-cart.pb-cart-flash::after{opacity:1;transition:opacity 0s}
        .pb-detail-cart:not(.pb-cart-flash)::after{transition:opacity .25s ease-out}
        /* Hover glow */
        .pb-detail-cart:hover{box-shadow:0 0 30px rgba(39,217,148,.32),0 0 8px rgba(39,217,148,.18) inset!important}
        /* Success state */
        .pb-detail-cart.pb-cart-success{border-color:#27d994!important;background:#159766!important;box-shadow:0 0 35px rgba(39,217,148,.4)!important}
        .pb-detail-cart.pb-cart-success::before{animation:none!important;opacity:0!important}
        /* Particles */
        .pb-cart-particle{position:fixed;z-index:100600;pointer-events:none;will-change:transform,opacity}
        .pb-cart-particle::before{content:'';display:block;width:var(--pb-sz,6px);height:var(--pb-sz,6px);background:var(--pb-clr,#27d994);box-shadow:0 0 8px var(--pb-clr,#27d994)}
    </style>
    <script data-navigate-once>
    (function(){
        function burstWishlistHearts(button){
            var rect=button.getBoundingClientRect();
            var cx=rect.left+rect.width/2,cy=rect.top+rect.height/2;
            var angles=[-150,-118,-88,-56,-24,18,52,86,122];
            angles.forEach(function(angle,index){
                var heart=document.createElement('span');
                var distance=54+(index%3)*15;
                var radians=angle*Math.PI/180;
                heart.className='pb-wishlist-heart-burst';
                heart.style.left=cx+'px';heart.style.top=cy+'px';
                heart.innerHTML='<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M20.8 4.6a5.5 5.5 0 0 0-7.8 0L12 5.7l-1.1-1.1a5.5 5.5 0 0 0-7.8 7.8L12 21l7.8-7.5a5.5 5.5 0 0 0 1-8.9Z"/></svg>';
                document.body.appendChild(heart);
                var x=Math.cos(radians)*distance,y=Math.sin(radians)*distance;
                if(typeof gsap!=='undefined'){
                    gsap.fromTo(heart,{x:0,y:0,scale:.35,rotation:-18,autoAlpha:0},{x:x,y:y,scale:index%2?1:.75,rotation:(index-4)*18,autoAlpha:1,duration:.34,ease:'back.out(2)',onComplete:function(){gsap.to(heart,{y:y+24,scale:.25,autoAlpha:0,duration:.38,ease:'power2.in',onComplete:function(){heart.remove();}})}});
                }else{
                    var animation=heart.animate([{transform:'translate(0,0) scale(.35)',opacity:0},{transform:'translate('+x+'px,'+y+'px) scale(1)',opacity:1,offset:.48},{transform:'translate('+x+'px,'+(y+24)+'px) scale(.2)',opacity:0}],{duration:720,easing:'ease-out'});
                    animation.onfinish=function(){heart.remove();};
                }
            });
        }
        function animateProductDetail(){
            var root=document.querySelector('[data-pb-product-detail]:not([data-pb-product-ready])');
            if(!root||typeof gsap==='undefined')return;
            root.setAttribute('data-pb-product-ready','1');
            gsap.from(root.querySelector('.product__content_img'),{x:-26,opacity:0,duration:.55,ease:'power3.out'});
            gsap.from(root.querySelector('.detailsConent'),{x:26,opacity:0,duration:.55,ease:'power3.out'});
            gsap.from(root.querySelectorAll('.detailsConent>*'),{y:16,opacity:0,duration:.4,stagger:.045,ease:'power2.out',delay:.18});
            var target=root.querySelector('.pb-product-target');
            if(target)gsap.fromTo(target,{scale:.85},{scale:1,duration:.8,ease:'elastic.out(1,.45)',delay:.35});
        }

        /* ──────────────── Добавить в корзину / В избранное ────────────────
           Раньше эти кнопки шли через wire:click в Livewire-компонент.
           Теперь используют тот же fetch-механизм, что и карточки товаров
           в каталоге — он уже проверен и работает стабильно на всех
           страницах, независимо от состояния Livewire на конкретной
           странице. */
        function pbDetailCsrf(){
            var token=document.querySelector('meta[name="csrf-token"]');
            return token?token.content:'';
        }

        function pbDetailRequest(url,params){
            var options={method:'POST',headers:{'Accept':'application/json','X-CSRF-TOKEN':pbDetailCsrf(),'X-Requested-With':'XMLHttpRequest'}};
            if(params){
                options.headers['Content-Type']='application/x-www-form-urlencoded';
                options.body=new URLSearchParams(params).toString();
            }
            return fetch(url,options).then(function(response){
                return response.json().then(function(data){
                    if(!response.ok)throw new Error(data.message||'Не удалось выполнить действие');
                    return data;
                });
            });
        }

        /* ── Tactical cart success animation (GSAP) ── */
        function pbCartSuccessAnimation(button){
            if(typeof gsap==='undefined')return;
            var label=button.querySelector('[data-pb-detail-cart-label]');
            var svg=button.querySelector('svg');
            var originalText=label?label.textContent:'';

            /* 1 — Recoil kick */
            var tl=gsap.timeline();
            tl.to(button,{x:-8,duration:.06,ease:'power3.in'})
              .to(button,{x:4,duration:.08,ease:'power2.out'})
              .to(button,{x:0,duration:.2,ease:'elastic.out(1,.45)'});

            /* 2 — Bright flash */
            button.classList.add('pb-cart-flash');
            gsap.delayedCall(.18,function(){button.classList.remove('pb-cart-flash')});

            /* 3 — SVG icon punch */
            if(svg){
                gsap.timeline()
                    .to(svg,{scale:1.35,rotation:-15,duration:.14,ease:'power2.out'})
                    .to(svg,{scale:1,rotation:0,duration:.45,ease:'elastic.out(1,.35)'});
            }

            /* 4 — Text swap: "ДОБАВЛЕНО ✓" */
            if(label){
                label.textContent='ДОБАВЛЕНО ✓';
                button.classList.add('pb-cart-success');
                gsap.delayedCall(2,function(){
                    label.textContent=originalText;
                    button.classList.remove('pb-cart-success');
                });
            }

            /* 5 — Particle burst */
            var rect=button.getBoundingClientRect();
            var cx=rect.left+rect.width/2,cy=rect.top+rect.height/2;
            var palette=['#27d994','#10a66d','#ffffff','#35ef9e','#159766'];
            var count=16;
            for(var i=0;i<count;i++){
                var p=document.createElement('span');
                p.className='pb-cart-particle';
                var sz=(4+Math.random()*5).toFixed(1);
                p.style.cssText='left:'+cx+'px;top:'+cy+'px;--pb-clr:'+palette[i%palette.length]+';--pb-sz:'+sz+'px';
                document.body.appendChild(p);
                var angle=(i/count)*Math.PI*2;
                var dist=40+Math.random()*50;
                var px=Math.cos(angle)*dist,py=Math.sin(angle)*dist;
                (function(el,dx,dy,idx){
                    gsap.fromTo(el,
                        {x:0,y:0,scale:.3,autoAlpha:0,rotation:Math.random()*90},
                        {x:dx,y:dy,scale:idx%3?.7:1.1,autoAlpha:1,rotation:Math.random()*180,duration:.3,ease:'power2.out',
                            onComplete:function(){
                                gsap.to(el,{y:dy+22,scale:.1,autoAlpha:0,duration:.35,ease:'power2.in',
                                    onComplete:function(){el.remove()}
                                });
                            }
                        }
                    );
                })(p,px,py,i);
            }
        }

        function handleDetailCartClick(button){
            if(button.dataset.pbPending==='1')return;
            button.dataset.pbPending='1';
            button.classList.add('loading');
            var slug=button.dataset.slug;
            var qtyInput=document.querySelector('input[name="product-quantity"]');
            var qty=qtyInput?(parseInt(qtyInput.value,10)||1):1;
            var url=@json(route('quick-cart.add', ['slug' => '__slug__'])).replace('__slug__',encodeURIComponent(slug));
            pbDetailRequest(url,{qty:qty}).then(function(data){
                if(typeof window.pbSyncActionCount==='function')window.pbSyncActionCount('cart',data.cart_count);
                window.dispatchEvent(new CustomEvent('cart-updated',{detail:{prodName:data.name}}));
                pbCartSuccessAnimation(button);
            }).catch(function(error){
                window.dispatchEvent(new CustomEvent('cart-error-message',{detail:{message:error.message}}));
            }).finally(function(){
                button.dataset.pbPending='0';
                button.classList.remove('loading');
            });
        }

        function handleDetailWishlistClick(button){
            if(button.dataset.pbPending==='1')return;
            button.dataset.pbPending='1';
            button.classList.add('loading');
            var slug=button.dataset.slug;
            var url=@json(route('quick-wishlist.toggle', ['slug' => '__slug__'])).replace('__slug__',encodeURIComponent(slug));
            pbDetailRequest(url).then(function(data){
                if(typeof window.pbSyncActionCount==='function')window.pbSyncActionCount('wishlist',data.wishlist_count);
                button.dataset.active=data.active?'1':'0';
                var label=button.querySelector('[data-pb-detail-wishlist-label]');
                if(label)label.textContent=data.active?'Убрать из избранного':'В избранное';
                window.dispatchEvent(new CustomEvent(data.active?'wish-added':'wish-deleted',{detail:{prodName:data.name}}));
                if(data.active)burstWishlistHearts(button);
            }).catch(function(error){
                window.dispatchEvent(new CustomEvent('cart-error-message',{detail:{message:error.message}}));
            }).finally(function(){
                button.dataset.pbPending='0';
                button.classList.remove('loading');
            });
        }

        if(!window.__pbProductDetailBooted){
            window.__pbProductDetailBooted=true;
            document.addEventListener('livewire:navigated',animateProductDetail);
            document.addEventListener('click',function(event){
                var cartButton=event.target.closest&&event.target.closest('[data-pb-detail-cart]');
                if(cartButton){
                    event.preventDefault();
                    handleDetailCartClick(cartButton);
                    return;
                }
                var wishButton=event.target.closest&&event.target.closest('[data-pb-detail-wishlist]');
                if(wishButton){
                    event.preventDefault();
                    handleDetailWishlistClick(wishButton);
                }
            });
        }
        animateProductDetail();
    })();
    </script>
    @endpush
</section>
