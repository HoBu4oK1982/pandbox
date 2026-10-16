@section('title', 'Pandbox - Избранное')
<section class="favourite__wrap">
    <div class="container">
        <h1>Избранное</h1>
        <div class="commonBreadcrumbs">
            <ul>
                <li><a wire:navigate href="/" ><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" style="width:18px;height:18px;fill:currentColor;vertical-align:middle;"><path d="M12.71 2.29a1 1 0 0 0-1.42 0l-9 9a1 1 0 0 0 1.42 1.42L4 12.41V20a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-7.59l.29.3a1 1 0 0 0 1.42-1.42zM10 20v-5h4v5zm8 0h-2v-6a1 1 0 0 0-1-1H9a1 1 0 0 0-1 1v6H6v-9.59l6-6 6 6z"/></svg></a></li>
                →
                <li>Избранное</li>
            </ul>
        </div>
        <div class="wishlistWraper">
            @if($wishlistItems->isNotEmpty())
                <div class="wishlistProducts pb-wishlist-grid" data-pb-wishlist-grid>
                    @foreach($wishlistItems as $item)
                    @php
                        $product = $productsById->get((int) $item->id);
                        $isUnavailable = ! $product || (int) $product->status !== 0 || (int) $product->qty <= 0;
                        $product_images = explode(',', $product?->images ?? '');
                    @endphp
                    <article @class(['pb-wishlist-card', 'is-unavailable' => $isUnavailable]) data-pb-wishlist-card data-row-id="{{ $item->rowId }}" wire:key="wishlist-{{ $item->rowId }}">
                        <div class="pb-wishlist-media">
                            @if($product && ! $isUnavailable)
                                <a wire:navigate href="{{ route('product.details', ['slug' => $product->slug])}}"><img src="{{ !empty($product_images[0]) ? asset('assets/images/products/' . $product_images[0]) : asset('assets/images/design/no-image.jpg') }}" alt="{{ $product->title }}"></a>
                            @else
                                <span class="pb-wishlist-missing-image"><img src="{{ !empty($product_images[0]) ? asset('assets/images/products/' . $product_images[0]) : asset('assets/images/design/no-image.jpg') }}" alt="{{ $product?->title ?? $item->name }}"></span>
                            @endif
                            <span class="pb-wishlist-corner" aria-hidden="true"></span>
                            <button type="button" class="pb-wishlist-heart" data-pb-wishlist-action="remove" data-product-id="{{ $item->id }}" data-product-slug="{{ $product?->slug }}" aria-label="Убрать из избранного"><svg viewBox="0 0 24 24"><path d="M20.8 4.6a5.5 5.5 0 0 0-7.8 0L12 5.7l-1.1-1.1a5.5 5.5 0 0 0-7.8 7.8l1.1 1.1L12 21l7.8-7.5 1.1-1.1a5.5 5.5 0 0 0-.1-7.8Z"/></svg></button>
                            <span class="pb-wishlist-reticle" aria-hidden="true"><svg viewBox="0 0 40 40"><circle cx="20" cy="20" r="8"/><circle cx="20" cy="20" r="3"/><path d="M20 2v9M20 29v9M2 20h9M29 20h9"/></svg></span>
                        </div>
                        <div class="pb-wishlist-body">
                            <span class="pb-wishlist-code">PANDBOX / ИЗБРАННОЕ</span>
                            @if($product && ! $isUnavailable)
                                <a wire:navigate href="{{ route('product.details', ['slug' => $product->slug])}}" class="pb-wishlist-title"><h3>{{ $product->title }}</h3></a>
                            @else
                                <div class="pb-wishlist-title"><h3>{{ $product?->title ?? $item->name }}</h3></div>
                            @endif
                            @if(!empty($product?->short_description))<p>{{ $product->short_description }}</p>@endif
                            @if($isUnavailable)<strong class="pb-wishlist-unavailable">Нет в наличии</strong>@endif
                            <div class="pb-wishlist-price">
                                @if($product?->sale_price !== null)<del>{{ number_format($product->price, 0, '.', ' ') }} ₸</del><b>{{ number_format($product->sale_price, 0, '.', ' ') }} ₸</b>@else<b>{{ number_format($product?->price ?? $item->price, 0, '.', ' ') }} ₸</b>@endif
                            </div>
                            <div class="pb-wishlist-actions">
                                @if($isUnavailable)
                                    <button type="button" class="pb-wishlist-cart" disabled><svg viewBox="0 0 24 24"><path d="M3 4h2l2.5 11h10l2-7H7"/><circle cx="9" cy="19" r="1.5"/><circle cx="18" cy="19" r="1.5"/></svg><span>Нет в наличии</span></button>
                                @else
                                    <button type="button" class="pb-wishlist-cart" data-pb-wishlist-action="cart" data-row-id="{{ $item->rowId }}" data-product-slug="{{ $product->slug }}"><svg viewBox="0 0 24 24"><path d="M3 4h2l2.5 11h10l2-7H7"/><circle cx="9" cy="19" r="1.5"/><circle cx="18" cy="19" r="1.5"/></svg><span>В корзину</span></button>
                                @endif
                                <button type="button" class="pb-wishlist-remove" data-pb-wishlist-action="remove" data-product-id="{{ $item->id }}" data-product-slug="{{ $product?->slug }}" aria-label="Удалить"><svg viewBox="0 0 24 24"><path d="M4 7h16M9 7V4h6v3M7 7l1 14h8l1-14M10 11v6M14 11v6"/></svg></button>
                            </div>
                        </div>
                    </article>
                    @endforeach
                </div>
            @else
                @include('partials.pandbox-empty-state', [
                    'type' => 'wishlist',
                    'title' => 'Список избранного пуст',
                    'subtitle' => 'Сохраняйте интересные товары, чтобы быстро вернуться к ним позже.',
                    'button' => 'Найти снаряжение',
                ])
            @endif
        </div>
    </div>
    <style>
        .favourite__wrap .pb-wishlist-cart span{font-size:14px!important;font-weight:700!important;line-height:1!important;letter-spacing:.01em}
        .favourite__wrap>.container{width:calc(100% - 48px)!important;max-width:1350px!important;margin-inline:auto!important}.pb-wishlist-grid{display:grid!important;grid-template-columns:repeat(4,minmax(0,1fr));gap:22px!important;margin:20px 0 70px!important}.pb-wishlist-card{position:relative;min-width:0;overflow:hidden;border:2px solid #111a15;color:#fff;background:#09100c;box-shadow:0 16px 34px rgba(5,34,19,.13);transition:transform .25s,box-shadow .25s,border-color .25s}.pb-wishlist-card:hover{border-color:#18b879;box-shadow:0 24px 46px rgba(5,52,29,.2);transform:translateY(-5px)}.pb-wishlist-media{position:relative;height:285px;overflow:hidden;background-color:#f4f7f5;background-image:linear-gradient(rgba(24,174,112,.065) 1px,transparent 1px),linear-gradient(90deg,rgba(24,174,112,.065) 1px,transparent 1px);background-size:24px 24px}.pb-wishlist-media>a{width:100%;height:100%;display:grid;place-items:center}.pb-wishlist-media img{width:100%;height:100%;display:block;object-fit:contain;transition:transform .35s}.pb-wishlist-card:hover .pb-wishlist-media img{transform:scale(1.055)}.pb-wishlist-corner{position:absolute;left:16px;bottom:16px;width:35px;height:35px;border-left:2px solid #18b879;border-bottom:2px solid #18b879}.pb-wishlist-heart{position:absolute;z-index:4;right:14px;top:14px;width:44px;height:44px;display:grid;place-items:center;padding:0;border:0;color:#18b879;background:rgba(255,255,255,.92);cursor:pointer}.pb-wishlist-heart svg{width:26px;height:26px;fill:#18b879;stroke:currentColor;stroke-width:1.4}.pb-wishlist-heart:hover{color:#d94856}.pb-wishlist-heart:hover svg{fill:#d94856}.pb-wishlist-reticle{position:absolute;right:0;bottom:0;width:64px;height:64px;display:grid;place-items:center;color:#fff;background:#0fa46c;clip-path:polygon(28% 0,100% 0,100% 100%,0 100%,0 28%)}.pb-wishlist-reticle svg{width:34px;height:34px;fill:none;stroke:currentColor;stroke-width:1.4;stroke-linecap:round}.pb-wishlist-body{min-height:278px;display:flex;flex-direction:column;padding:22px 20px 18px;background:radial-gradient(circle at 100% 0,rgba(28,193,126,.12),transparent 34%),linear-gradient(145deg,#111914,#080d0a)}.pb-wishlist-code{display:block;margin-bottom:12px;color:#32dc9b;font:700 8px/1 Arial;letter-spacing:.17em}.pb-wishlist-title{text-decoration:none}.pb-wishlist-title h3{min-height:48px;display:-webkit-box;margin:0!important;overflow:hidden;color:#fff!important;font-size:18px!important;font-weight:700!important;line-height:1.25!important;-webkit-box-orient:vertical;-webkit-line-clamp:2}.pb-wishlist-body>p{min-height:34px;display:-webkit-box;margin:10px 0 0;overflow:hidden;color:#84958c;font-size:11px;line-height:1.45;-webkit-box-orient:vertical;-webkit-line-clamp:2}.pb-wishlist-price{display:flex;align-items:baseline;gap:12px;margin-top:auto;padding:19px 0 17px;border-top:1px solid rgba(50,220,155,.18)}.pb-wishlist-price b{color:#24d695;font-size:25px;white-space:nowrap}.pb-wishlist-price del{color:#77867e;font-size:12px}.pb-wishlist-actions{display:grid;grid-template-columns:minmax(0,1fr) 48px;gap:8px}.pb-wishlist-actions button{height:52px;display:flex;align-items:center;justify-content:center;gap:9px;padding:0 14px;border-radius:0;font-family:inherit;font-weight:700;cursor:pointer}.pb-wishlist-actions svg{width:20px;height:20px;fill:none;stroke:currentColor;stroke-width:1.7;stroke-linecap:round;stroke-linejoin:round}.pb-wishlist-cart{border:1px solid #16b979;color:#fff;background:linear-gradient(90deg,#078f5c,#18b879)}.pb-wishlist-cart:hover{color:#07110c;background:#32dc9b}.pb-wishlist-remove{padding:0!important;border:1px solid rgba(255,255,255,.18);color:#9baba3;background:transparent}.pb-wishlist-remove:hover{border-color:#d94856;color:#fff;background:#d94856}@media(max-width:1100px){.pb-wishlist-grid{grid-template-columns:repeat(3,minmax(0,1fr))}}@media(max-width:760px){.pb-wishlist-grid{grid-template-columns:repeat(2,minmax(0,1fr));gap:12px!important}.pb-wishlist-media{height:220px}.pb-wishlist-body{min-height:250px;padding:17px 14px}.pb-wishlist-title h3{font-size:15px!important}.pb-wishlist-price b{font-size:20px}}@media(max-width:460px){.favourite__wrap>.container{width:calc(100% - 24px)!important}.pb-wishlist-grid{grid-template-columns:1fr}.pb-wishlist-media{height:270px}}
        .pb-wishlist-grid{align-items:stretch!important}
        .pb-wishlist-card{height:100%;display:flex;flex-direction:column;box-sizing:border-box}
        .pb-wishlist-body{min-height:0!important;flex:1;box-sizing:border-box}
        .pb-wishlist-title h3{height:45px!important;min-height:0!important}
        .pb-wishlist-card.pb-wishlist-leaving{z-index:4;pointer-events:none;will-change:transform,opacity,filter}
        .pb-wishlist-card.pb-wishlist-leaving:after{position:absolute;z-index:10;inset:0;display:grid;place-items:center;color:#fff;background:linear-gradient(135deg,rgba(6,16,11,.25),rgba(6,16,11,.78));font:800 10px/1 Arial;letter-spacing:.22em;text-transform:uppercase;pointer-events:none}
        .pb-wishlist-card.pb-wishlist-to-cart:after{content:'PBX / В КОРЗИНУ';box-shadow:inset 0 0 0 2px rgba(50,220,155,.78)}
        .pb-wishlist-card.pb-wishlist-remove-out:after{content:'PBX / УДАЛЕНИЕ';box-shadow:inset 0 0 0 2px rgba(217,72,86,.72)}
        .pb-wishlist-card.is-unavailable{border-color:#c53645!important;background:#351419!important;box-shadow:0 18px 40px rgba(181,39,55,.22)}.pb-wishlist-card.is-unavailable:hover{border-color:#ef3f4f!important;box-shadow:0 24px 48px rgba(181,39,55,.3)}.pb-wishlist-card.is-unavailable .pb-wishlist-media{background-color:#efdadd;background-image:linear-gradient(rgba(197,54,69,.08) 1px,transparent 1px),linear-gradient(90deg,rgba(197,54,69,.08) 1px,transparent 1px)}.pb-wishlist-card.is-unavailable .pb-wishlist-media img{filter:grayscale(1);opacity:.58}.pb-wishlist-card.is-unavailable .pb-wishlist-reticle{background:#b92f3d}.pb-wishlist-card.is-unavailable .pb-wishlist-body{background:radial-gradient(circle at 100% 0,rgba(239,63,79,.18),transparent 38%),linear-gradient(145deg,#351419,#160b0d)}.pb-wishlist-card.is-unavailable .pb-wishlist-code,.pb-wishlist-card.is-unavailable .pb-wishlist-price b{color:#ff7380}.pb-wishlist-unavailable{display:block;margin:10px 0;color:#ff6675;font:800 11px/1 Arial;letter-spacing:.12em;text-transform:uppercase}.pb-wishlist-card.is-unavailable .pb-wishlist-cart:disabled{border-color:#8f343e;color:#e6a4ab;background:#4b2025;cursor:not-allowed}.pb-wishlist-missing-image{width:100%;height:100%;display:grid;place-items:center}
        @media(max-width:460px){
            .favourite__wrap>.container{width:calc(100% - 20px)!important}
            .favourite__wrap .pb-wishlist-grid{grid-template-columns:repeat(2,minmax(0,1fr))!important;gap:8px!important;margin-top:14px!important}
            .favourite__wrap .pb-wishlist-card{border-width:1px}
            .favourite__wrap .pb-wishlist-media{height:150px!important}
            .favourite__wrap .pb-wishlist-corner{left:9px;bottom:9px;width:22px;height:22px;border-width:1px}
            .favourite__wrap .pb-wishlist-heart{right:6px;top:6px;width:30px;height:30px}
            .favourite__wrap .pb-wishlist-heart svg{width:20px;height:20px}
            .favourite__wrap .pb-wishlist-reticle{width:43px;height:43px}
            .favourite__wrap .pb-wishlist-reticle svg{width:24px;height:24px}
            .favourite__wrap .pb-wishlist-body{padding:12px 9px 10px!important}
            .favourite__wrap .pb-wishlist-code{margin-bottom:7px;font-size:6px;letter-spacing:.1em}
            .favourite__wrap .pb-wishlist-title h3{height:42px!important;font-size:11px!important;line-height:1.18!important;-webkit-line-clamp:3}
            .favourite__wrap .pb-wishlist-body>p{display:none}
            .favourite__wrap .pb-wishlist-unavailable{margin:7px 0;font-size:8px}
            .favourite__wrap .pb-wishlist-price{min-height:38px;gap:5px;padding:9px 0 8px;flex-wrap:wrap}
            .favourite__wrap .pb-wishlist-price b{font-size:17px!important}
            .favourite__wrap .pb-wishlist-price del{font-size:8px}
            .favourite__wrap .pb-wishlist-actions{grid-template-columns:minmax(0,1fr) 34px;gap:5px}
            .favourite__wrap .pb-wishlist-actions button{height:38px;padding:0 5px;gap:4px}
            .favourite__wrap .pb-wishlist-actions svg{width:15px;height:15px}
            .favourite__wrap .pb-wishlist-cart span{font-size:9px!important;white-space:nowrap}
        }
    </style>
    <script data-navigate-once>
        (function(){
            function initWishlist(){
                var grid=document.querySelector('[data-pb-wishlist-grid]');
                if(!grid||grid.dataset.pbAnimated||typeof gsap==='undefined')return;
                var cards=grid.querySelectorAll('[data-pb-wishlist-card]');
                grid.dataset.pbAnimated='1';
                gsap.set(cards,{clearProps:'transform'});
                gsap.fromTo(cards,{autoAlpha:0},{autoAlpha:1,duration:.4,stagger:.045,ease:'power2.out',clearProps:'opacity,visibility'});
            }

            function captureWishlistLayout(grid){
                var positions={};
                grid.querySelectorAll('[data-pb-wishlist-card]').forEach(function(item){
                    var key=item.dataset.rowId;
                    if(!key)return;
                    var rect=item.getBoundingClientRect();
                    positions[key]={left:rect.left,top:rect.top};
                });
                return positions;
            }

            function settleWishlistLayout(before){
                var grid=document.querySelector('[data-pb-wishlist-grid]');
                if(!grid)return;
                grid.dataset.pbBusy='0';
                grid.dataset.pbAnimated='1';
                var cards=Array.from(grid.querySelectorAll('[data-pb-wishlist-card]'));
                cards.forEach(function(item){
                    item.classList.remove('pb-wishlist-leaving','pb-wishlist-to-cart','pb-wishlist-remove-out');
                    item.querySelectorAll('[data-pb-wishlist-action]').forEach(function(button){button.disabled=false;button.dataset.pbBusy='0';});
                });
                if(typeof gsap==='undefined')return;
                gsap.killTweensOf(cards.concat(cards.map(function(item){return item.querySelector('.pb-wishlist-media img');}).filter(Boolean)));
                gsap.set(cards,{clearProps:'transform,opacity,visibility,filter'});
                cards.forEach(function(item){
                    var old=before[item.dataset.rowId];
                    if(!old)return;
                    var current=item.getBoundingClientRect();
                    var x=old.left-current.left;
                    var y=old.top-current.top;
                    if(Math.abs(x)<1&&Math.abs(y)<1)return;
                    gsap.fromTo(item,{x:x,y:y},{x:0,y:0,duration:.48,ease:'power3.out',clearProps:'transform'});
                });
            }

            function runWishlistAction(button){
                if(button.dataset.pbBusy==='1')return;
                var card=button.closest('[data-pb-wishlist-card]');
                var grid=card&&card.closest('[data-pb-wishlist-grid]');
                var componentRoot=card&&card.closest('[wire\\:id]');
                var componentId=componentRoot&&componentRoot.getAttribute('wire:id');
                var component=componentId&&window.Livewire&&Livewire.find(componentId);
                if(!card||!grid||!component||grid.dataset.pbBusy==='1')return;

                var action=button.dataset.pbWishlistAction;
                var method=action==='cart'?'moveProductFromWishlistToCart':'removeFromWishlist';
                var argument=action==='cart'?button.dataset.rowId:Number(button.dataset.productId);
                var productSlug=''+(button.dataset.productSlug||'');
                var buttons=card.querySelectorAll('[data-pb-wishlist-action]');
                var beforeLayout=captureWishlistLayout(grid);
                grid.dataset.pbBusy='1';
                button.dataset.pbBusy='1';
                buttons.forEach(function(item){item.disabled=true;});
                card.classList.add('pb-wishlist-leaving',action==='cart'?'pb-wishlist-to-cart':'pb-wishlist-remove-out');

                function restoreCard(){
                    card.classList.remove('pb-wishlist-leaving','pb-wishlist-to-cart','pb-wishlist-remove-out');
                    button.dataset.pbBusy='0';
                    buttons.forEach(function(item){item.disabled=false;});
                    grid.dataset.pbBusy='0';
                    if(productSlug)window.dispatchEvent(new CustomEvent('pb-wishlist-state',{detail:{slug:productSlug,active:true}}));
                    if(typeof gsap!=='undefined')gsap.set(card,{clearProps:'transform,opacity,visibility,filter'});
                }

                function commitAction(){
                    if(productSlug)window.dispatchEvent(new CustomEvent('pb-wishlist-state',{detail:{slug:productSlug,active:false}}));
                    var request=component.call(method,argument);
                    if(request&&typeof request.then==='function'){
                        request.then(function(){
                            requestAnimationFrame(function(){requestAnimationFrame(function(){settleWishlistLayout(beforeLayout);});});
                        }).catch(restoreCard);
                    }else{
                        window.setTimeout(function(){settleWishlistLayout(beforeLayout);},350);
                    }
                }

                if(typeof gsap==='undefined'){commitAction();return;}
                var image=card.querySelector('.pb-wishlist-media img');
                var accent=action==='cart'?'#32dc9b':'#d94856';
                var timeline=gsap.timeline({defaults:{overwrite:true},onComplete:commitAction});
                timeline
                    .to(button,{color:'#fff',backgroundColor:accent,scale:.9,duration:.12,ease:'power2.out'},0)
                    .to(image,{scale:.9,filter:action==='cart'?'saturate(.65)':'grayscale(1)',duration:.28,ease:'power2.in'},0)
                    .to(card,action==='cart'
                        ?{x:110,y:-55,rotation:1.5,scale:.84,autoAlpha:0,duration:.5,ease:'power3.in'}
                        :{x:-90,rotation:-2,scale:.92,filter:'grayscale(.75)',autoAlpha:0,duration:.46,ease:'power3.in'},.1);
            }

            if(!window.__pbWishlistActionsBound){
                window.__pbWishlistActionsBound=true;
                document.addEventListener('click',function(event){
                    var button=event.target.closest&&event.target.closest('[data-pb-wishlist-action]');
                    if(!button)return;
                    event.preventDefault();
                    event.stopPropagation();
                    runWishlistAction(button);
                });
            }

            if(document.readyState==='loading')document.addEventListener('DOMContentLoaded',initWishlist,{once:true});else initWishlist();
            document.addEventListener('livewire:navigated',initWishlist);
        })();
    </script>
</section>
