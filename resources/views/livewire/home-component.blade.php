@section('title', 'Pandbox - интернет магазин страйкбольного оборудования')
<div class="home_container">
    <section class="container" wire:ignore>
        <div class="slider_calendar__wrap">
            <div class="slider">
                <div class="pb-home-slider-skeleton" data-pb-slider-skeleton aria-hidden="true">
                    <span class="pb-slider-sk-code"></span>
                    <span class="pb-slider-sk-title"></span>
                    <span class="pb-slider-sk-object"></span>
                    <span class="pb-slider-sk-price"></span>
                    <i></i>
                </div>
                <div class="flexslider">
                    <ul class="slides">
                        @foreach ($slides as $slide)                            
                            <li class="gallery-item">
                                <a wire:navigate href="{{ $slide->link }}">
                                    <img src="{{asset('assets/images/slides')}}/{{$slide->image}}" class="sliderImg"  alt="">
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="calendar__wrap">
                <img src="{{asset('assets/images/design/calendar__img.jpg')}}" class="calendar__img" alt="Календарь страйкбольных событий в Казахстане">
                <a href="#" class="calendar__btn">Подробнее</a>
            </div>
        </div>
    </section>
    <section class="container">
        <div class="bests__wrap">
            <div class="best__item" data-pb-benefit>
                <img src="{{asset('assets/images/design/best1.png')}}" alt="">
                <h3>Отличное качество</h3>
            </div>
            <div class="best__item" data-pb-benefit>
                <img src="{{asset('assets/images/design/best2.png')}}" alt="">
                <h3>Быстрая доставка</h3>
            </div>
            <div class="best__item" data-pb-benefit>
                <img src="{{asset('assets/images/design/best3.png')}}" alt="">
                <h3>Удобные способы оплаты</h3>
            </div>
            <div class="best__item" data-pb-benefit>
                <img src="{{asset('assets/images/design/best4.png')}}" alt="">
                <h3>Вежливый персонал</h3>
            </div>
            <div class="best__item" data-pb-benefit>
                <img src="{{asset('assets/images/design/best5.png')}}" alt="">
                <h3>Огромный ассортимент</h3>
            </div>
        </div>
    </section>
    <section class="categories__wrap">
        <div class="container">
            <div class="h2Wrap">
                <h2>Категории товаров</h2>
            </div>
            <div class="categories">
                @foreach ($categories as $category)
                    <a wire:navigate href="{{ route('category', ['slug' => $category->slug])}}" class="cagetegory__item{{ $loop->last && $categories->count() % 2 ? ' pb-category-last-odd' : '' }}" data-pb-category-card>
                        <div class="cagetegory__item_img_wrap">
                            <img src="{{asset('assets/images/categories')}}/{{$category->image}}" class="cagetegory__item_img" alt="">
                            <span class="pb-category-corner" aria-hidden="true"></span>
                            <span class="pb-category-reticle" aria-hidden="true">
                                <svg viewBox="0 0 40 40"><circle cx="20" cy="20" r="8"/><circle cx="20" cy="20" r="3"/><path d="M20 2v9M20 29v9M2 20h9M29 20h9"/></svg>
                            </span>
                        </div>
                        <div class="pb-category-body">
                            <h4 class="cagetegory__item_h4">{{$category->title}}</h4>
                        </div>
                    </a>
                @endforeach
                <div class="mobile__calendar" aria-label="Календарь страйкбольных событий в Казахстане">
                    <img src="{{asset('assets/images/design/calendar__img.jpg')}}" alt="Календарь страйкбольных событий в Казахстане">
                </div>
            </div>
            <div class="categories__btn__wrap">
                <a wire:navigate href="{{ route('shop')}}" class="categories__btn">Все категории</a>
            </div>
        </div>
    </section>
    <section class="container pb-trends-section">
        <style>
            .productWishlist a{
                position: absolute;
                right:20px;
                top:20px;
                color:rgb(169, 169, 169);
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
        @php
            $witems = Cart::instance('wishlist')->content()->pluck('id');
        @endphp
        <div class="trend__wrap">
            <div class="tabs">
                <div class="pb-trends-toolbar">
                    <div class="h2Wrap">
                        <h2>Товары в тренде</h2>
                    </div>
                    <div class="tabHeaderWrap">
                        <div class="tab-header">
                            <div class="active tabHeader">
                                Новинки
                            </div>
                            <div class="tabHeader">
                                Акции
                            </div>
                            <div class="tabHeader">
                                Хит продаж
                            </div>
                        </div>
                    </div>
                    <div class="pb-trends-actions">
                        <a wire:navigate href="{{ route('news')}}" class="categories__btn active">Смотреть все новинки</a>
                        <a wire:navigate href="{{ route('sales')}}" class="categories__btn">Смотреть все акции</a>
                        <a wire:navigate href="{{ route('hits')}}" class="categories__btn">Смотреть все хиты продаж</a>
                    </div>
                </div>
                <div class="tab-body">
                    {{-- New items --}}
                    <div class="home__trend-wrap active">
                        <ul class="product__carousel">
                            @foreach ($remark__new as $new)
                                @php $new_images = explode(',' , $new->images); @endphp
                                <li>
                                    <a wire:navigate href="{{ route('product.details', ['slug' => $new->slug])}}" class="product__item">
                                        <p class="product__item-img-wrap">
                                            <img src="{{asset('assets/images/products')}}/{{$new_images[0]}}" class="product__item-img" alt="">
                                        </p>
                                        <h4 class="product-title">{!! $new->title !!}</h4>
                                        <p class="product__item-price">{{ number_format($new->price, 0, '.', ' '); }}<span>₸</span></p>
                                        <p class="product__item-trend product__item-trend-new">Новинка</p>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    {{-- Sale items --}}
                    <div class="home__trend-wrap">
                        <ul class="product__carousel">
                            @foreach ($remark__sale as $sale)
                                @php $sale_images = explode(',' , $sale->images); @endphp
                                <li>
                                    <a wire:navigate href="{{ route('product.details', ['slug' => $sale->slug])}}" class="product__item">
                                        <p class="product__item-img-wrap">
                                            <img src="{{asset('assets/images/products')}}/{{$sale_images[0]}}" class="product__item-img" alt="">
                                        </p>
                                        <h4 class="product-title">{!! $sale->title !!}</h4>
                                        <div class="product__item_price_wrap">
                                            <div class="product__item-price red">{{ number_format($sale->price, 0, '.', ' '); }}<span>₸</span></div>
                                            <div class="product__item_sale_price">{{ number_format($sale->sale_price, 0, '.', ' '); }}<span>₸</span></div>
                                        </div>
                                        <p class="product__item-trend product__item-trend-sale">Акция</p>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    {{-- Hit items --}}
                    <div class="home__trend-wrap">
                        <ul class="product__carousel">
                            @foreach ($remark__hit as $hit)
                                @php $hit_images = explode(',' , $hit->images); @endphp
                                <li>
                                    <a wire:navigate href="{{ route('product.details', ['slug' => $hit->slug])}}" class="product__item">
                                        <p class="product__item-img-wrap">
                                            <img src="{{asset('assets/images/products')}}//{{$hit_images[0]}}" class="product__item-img" alt="">
                                        </p>
                                        <h4 class="product-title">{!!$hit->title !!}</h4>
                                        <p class="product__item-price">{{ number_format($hit->price, 0, '.', ' '); }}<span>₸</span></p>
                                        <p class="product__item-trend product__item-trend-hit">Хит продаж</p>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="about__article__wrap">
        <div class="container">
            <div class="about__wrap">
                <div class="h2Wrap">
                    <h2>О магазине Pandbox</h2>
                </div>
                <div class="about__content">
                    <p>Pandbox.kz — специализированный магазин товаров для страйкбола, созданный командой энтузиастов. Помогаем новичкам, опытным игрокам и целым командам подобрать надёжное снаряжение для безопасной и комфортной игры.</p>
                    <p>В каталоге представлены приводы, экипировка, тюнинг, аксессуары и расходники проверенных брендов. Подбираем комплект под задачу и бюджет, чтобы всё необходимое для выхода на игру было в одном месте.</p>
                    <p>Работаем с известными производителями и уделяем внимание качеству, совместимости и безопасности каждого комплекта.</p>
                    <a wire:navigate href="{{ route('about') }}#about-full" class="about__content-btn">Читать полностью</a>
                </div>
            </div>
            <div class="home__article-wrap">
                <div class="h2Wrap">
                    <h2>Новости мира страйкбола</h2>
                </div>
                <div class="home__article-content">
                    @if ($articles->count() != 0)
                        @foreach ($articles as $article)
                            <a wire:navigate href="{{ route('article', ['article_slug' => $article->slug])}}" class="home__article-item">
                                <div class="home__article-item-img-wrap">
                                    <img src="{{asset('assets/images/articles')}}/{{$article->image}}" class="home__article-item-img" alt="">
                                </div>
                                <div class="home__article-item-content">
                                    <h5>{{ $article->title }}</h5>
                                    <p>{{ $article->short_description }}</p>
                                </div>
                            </a>
                        @endforeach
                    @else
                        <p>К сожалению новостей пока нет!</p> 
                    @endif
                </div>
                <div class="home__article-btn-wrap">
                    <a wire:navigate href="{{ route('articles')}}" class="home__article-btn">Все новости</a>
                </div>
            </div>
        </div>
    </section>
    <section class="reviews__wrap">

    </section>
<style>
    .home_container .slider{position:relative;min-height:clamp(290px,31vw,570px);overflow:hidden;background:#09110d}.home_container .slider.pb-slider-ready{min-height:0;background:transparent}.home_container .slider.pb-slider-ready .flexslider{margin:0!important}.home_container .slider.pb-slider-ready .sliderImg{display:block}.home_container .slider.pb-slider-ready .flex-control-nav{bottom:10px!important}
    .pb-home-slider-skeleton{position:absolute;z-index:20;inset:0;overflow:hidden;background:linear-gradient(110deg,#070c09,#101913 55%,#090e0b);pointer-events:none}.pb-home-slider-skeleton:before{content:'';position:absolute;inset:0;opacity:.11;background-image:radial-gradient(circle,rgba(50,220,155,.55) 1px,transparent 1.2px);background-size:25px 25px}.pb-home-slider-skeleton:after{content:'';position:absolute;top:0;bottom:0;width:24%;background:linear-gradient(90deg,transparent,rgba(87,239,178,.075),transparent);transform:translateX(-120%);animation:pbSliderSkeletonSweep 1.35s ease-in-out infinite}.pb-home-slider-skeleton span{position:absolute;display:block;box-sizing:border-box;background:linear-gradient(100deg,#14231b,#1a3024 50%,#14231b);border:1px solid rgba(50,220,155,.1)}.pb-slider-sk-code{left:7%;top:11%;width:14%;height:9px}.pb-slider-sk-title{left:7%;top:17%;width:34%;height:clamp(24px,2.2vw,39px)}.pb-slider-sk-object{left:30%;top:36%;width:48%;height:15%;border-left:clamp(38px,5vw,88px) solid #111e17!important;clip-path:polygon(0 30%,57% 30%,61% 0,74% 0,77% 30%,100% 30%,100% 74%,75% 74%,70% 100%,59% 100%,57% 74%,0 74%)}.pb-slider-sk-object:before{content:'';position:absolute;right:97%;top:42%;width:32%;height:12%;background:#1a3024}.pb-slider-sk-object:after{content:'';position:absolute;left:99%;top:28%;width:17%;height:52%;background:#16271e;clip-path:polygon(0 0,100% 18%,82% 100%,0 78%)}.pb-slider-sk-price{right:9%;bottom:10%;width:21%;height:clamp(27px,2.5vw,44px)}.pb-home-slider-skeleton i{position:absolute;left:7%;bottom:11%;width:32%;height:2px;background:linear-gradient(90deg,#1b6a49 0 28%,#1c382b 28%)}@keyframes pbSliderSkeletonSweep{50%,100%{transform:translateX(520%)}}@media(max-width:700px){.home_container .slider{min-height:52vw}.pb-slider-sk-code{width:20%}.pb-slider-sk-title{width:48%;height:22px}.pb-slider-sk-object{left:22%;top:37%;width:58%;height:16%;border-left-width:28px!important}.pb-slider-sk-price{width:27%;height:25px}}
    [data-pb-benefit] img { transform-style:flat; backface-visibility:visible; will-change:transform; }
    .home_container .categories__wrap{position:relative;isolation:isolate;overflow:hidden;padding:0 0 64px!important;border-top:1px solid rgba(50,220,155,.38);border-bottom:1px solid rgba(50,220,155,.28);background-color:#08110c!important;background-image:radial-gradient(circle at 50% -10%,rgba(38,208,142,.2),transparent 38%),linear-gradient(rgba(50,220,155,.055) 1px,transparent 1px),linear-gradient(90deg,rgba(50,220,155,.055) 1px,transparent 1px),radial-gradient(circle,rgba(69,238,172,.11) .7px,transparent .9px),linear-gradient(125deg,#0d1a13 0 35%,#08110c 35% 68%,#0b1710 68%)!important;background-size:auto,48px 48px,48px 48px,22px 22px,100% 100%!important}
    .home_container .categories__wrap:before{content:'PANDBOX / CATALOG';position:absolute;z-index:-1;left:4%;top:88px;color:rgba(50,220,155,.035);font:900 clamp(70px,10vw,180px)/1 Arial;letter-spacing:-.07em;white-space:nowrap;pointer-events:none}
    .home_container .categories__wrap:after{content:'';position:absolute;z-index:-1;right:-8%;bottom:-120px;width:48%;height:340px;border:1px solid rgba(50,220,155,.13);background:linear-gradient(135deg,rgba(50,220,155,.08),transparent 62%);transform:skewX(-22deg);pointer-events:none}
    .home_container .categories__wrap .h2Wrap{position:relative;margin-bottom:36px!important;padding:25px 30px!important;border-left:3px solid #20c883;background:linear-gradient(90deg,rgba(32,200,131,.16),transparent 70%)!important;background-image:linear-gradient(90deg,rgba(32,200,131,.16),transparent 70%)!important}
    .home_container .categories__wrap .h2Wrap h2{margin:0!important;color:#fff!important}
    .home_container .pb-trends-section{padding-top:42px!important;padding-bottom:0!important}
    .home_container .pb-trends-toolbar{width:100%;display:grid;grid-template-columns:minmax(270px,1fr) auto minmax(270px,1fr);align-items:center;gap:28px;margin:0 0 42px}
    .home_container .pb-trends-toolbar>.h2Wrap{display:flex!important;align-items:center!important;justify-content:flex-start!important;margin:0!important;text-align:left!important}
    .home_container .pb-trends-toolbar>.h2Wrap h2{margin:0!important;text-align:left!important;white-space:nowrap}
    .home_container .pb-trends-toolbar .tabHeaderWrap{margin:0!important}
    .home_container .pb-trends-actions{min-width:0;display:flex;align-items:center;justify-content:flex-end}
    .home_container .pb-trends-actions .categories__btn{display:none!important;align-items:center!important;justify-content:center!important;gap:12px!important;min-width:0!important;min-height:50px!important;margin:0!important;padding:0 24px!important;border:1px solid #159766!important;color:#fff!important;background:#242725!important;font-size:16px!important;line-height:1.2!important;white-space:nowrap!important;text-decoration:none!important}
    .home_container .pb-trends-actions .categories__btn.active{display:inline-flex!important}
    .home_container .pb-trends-actions .categories__btn:before{content:none!important;display:none!important}
    .home_container .pb-trends-actions .categories__btn:after{content:'→'!important;position:static!important;width:auto!important;height:auto!important;margin:0!important;color:#21d28e!important;background:none!important;font-size:22px!important;line-height:1!important;transform:none!important}
    .home_container .pb-trends-section .trend__wrap,
    .home_container .slider_calendar__wrap,.home_container .bests__wrap{position:relative;z-index:2}
    .home_container .pb-trends-section .tabs{position:relative;z-index:2;height:auto!important;min-height:0!important;overflow:visible!important;padding-bottom:0!important}
    .home_container .pb-trends-section{position:relative;z-index:1;isolation:isolate}
    .home_container .pb-trends-section .tab-body{position:relative!important;height:auto!important;min-height:0!important;overflow:visible!important}
    .home_container .pb-trends-section .home__trend-wrap{display:none!important;position:relative!important;inset:auto!important;width:100%!important;height:auto!important;min-height:0!important;overflow:visible!important;pointer-events:none!important;visibility:hidden!important;opacity:0!important}
    .home_container .pb-trends-section .home__trend-wrap.active{display:block!important;position:relative!important;inset:auto!important;height:auto!important;min-height:0!important;overflow:visible!important;pointer-events:auto!important;visibility:visible!important;opacity:1!important}
    .home_container .pb-trends-section .home__trend-wrap:not(.active),.home_container .pb-trends-section .home__trend-wrap:not(.active) *{pointer-events:none!important}
    .home_container .pb-trends-section .product__carousel{margin-bottom:0!important}
    .home_container .pb-trends-section .slick-list{padding-bottom:12px!important}
    .home_container .pb-trends-section .slick-arrow{display:none!important;visibility:hidden!important;pointer-events:none!important}
    .home_container .pb-trends-section .slick-dots{position:static!important;inset:auto!important;width:100%!important;height:18px!important;display:flex!important;align-items:center!important;justify-content:center!important;gap:9px!important;margin:14px 0 0!important;padding:0!important;transform:none!important;list-style:none!important}
    .home_container .pb-trends-section .slick-dots li{width:13px!important;height:13px!important;margin:0!important;padding:0!important}
    .home_container .pb-trends-section .slick-dots li button{width:13px!important;height:13px!important;margin:0!important;padding:0!important;border:1px solid #252b28!important;border-radius:0!important;background:#d9e1dd!important;box-shadow:inset 0 0 0 2px #f5f7f6!important;font-size:0!important;line-height:0!important;opacity:1!important}
    .home_container .pb-trends-section .slick-dots li button:before{content:none!important;display:none!important}
    .home_container .pb-trends-section .slick-dots li.slick-active button{border-color:#0d1a14!important;background:#18b97c!important;box-shadow:inset 0 0 0 2px #f5f7f6,0 0 0 1px rgba(24,185,124,.25)!important}
    @media(max-width:1200px){.home_container .pb-trends-toolbar{grid-template-columns:1fr auto;gap:20px}.home_container .pb-trends-toolbar>.h2Wrap{grid-column:1}.home_container .pb-trends-toolbar .tabHeaderWrap{grid-column:1/-1;grid-row:2;justify-self:center}.home_container .pb-trends-actions{grid-column:2;grid-row:1}}
    @media(max-width:720px){.home_container .pb-trends-toolbar{display:flex;flex-direction:column;align-items:stretch;gap:18px;margin-bottom:30px}.home_container .pb-trends-toolbar>.h2Wrap,.home_container .pb-trends-toolbar>.h2Wrap h2{justify-content:center!important;text-align:center!important;white-space:normal}.home_container .pb-trends-toolbar .tabHeaderWrap{align-self:center}.home_container .pb-trends-actions{justify-content:center}.home_container .pb-trends-actions .categories__btn{white-space:normal!important;text-align:center}}
    .home_container .categories{display:grid!important;grid-template-columns:repeat(5,minmax(0,1fr))!important;gap:22px!important;align-items:stretch!important}
    .home_container .mobile__calendar{display:none}
    .home_container .cagetegory__item{position:relative!important;min-width:0!important;height:430px!important;display:flex!important;flex-direction:column!important;overflow:hidden!important;border:2px solid #111a15!important;border-radius:0!important;color:#fff!important;background:#0b100d!important;box-shadow:0 16px 32px rgba(7,18,12,.12)!important;text-decoration:none!important;transform-style:preserve-3d;will-change:transform;isolation:isolate}
    .home_container .cagetegory__item:before{content:none!important;display:none!important}
    .home_container .cagetegory__item:after{content:'';position:absolute;z-index:0;inset:auto -20% -35% 20%;height:180px;opacity:.3;background:radial-gradient(circle,rgba(32,200,131,.35),transparent 68%);pointer-events:none}
    .home_container .cagetegory__item_img_wrap{position:relative!important;height:270px!important;min-height:270px!important;overflow:hidden!important;margin:0!important;background:#edf2ef!important}
    .home_container .cagetegory__item_img_wrap:before{content:'';position:absolute;z-index:2;inset:0;opacity:.23;background-image:linear-gradient(rgba(26,116,78,.16) 1px,transparent 1px),linear-gradient(90deg,rgba(26,116,78,.16) 1px,transparent 1px);background-size:24px 24px;pointer-events:none}
    .home_container .cagetegory__item_img{width:100%!important;height:100%!important;display:block!important;object-fit:cover!important;transform:translateZ(0) scale(1);transform-origin:50% 50%;backface-visibility:hidden;transition:none!important;will-change:transform}
    .home_container .pb-category-corner{position:absolute;z-index:3;left:17px;bottom:17px;width:35px;height:35px;border-left:2px solid #16b979;border-bottom:2px solid #16b979;pointer-events:none}
    .home_container .pb-category-reticle{position:absolute;z-index:4;right:0;bottom:0;width:64px;height:64px;display:grid;place-items:center;color:#fff;background:#0fa46c;clip-path:polygon(28% 0,100% 0,100% 100%,0 100%,0 28%)}
    .home_container .pb-category-reticle svg{width:34px;height:34px;fill:none;stroke:currentColor;stroke-width:1.4;stroke-linecap:round}
    .home_container .pb-category-body{position:relative;z-index:2;min-height:160px;flex:1;display:flex;align-items:center;justify-content:center;padding:22px 20px!important;box-sizing:border-box;background:linear-gradient(135deg,#111713,#090d0b)}
    .home_container .cagetegory__item_h4{min-height:0!important;margin:0!important;color:#fff!important;font-size:18px!important;font-weight:700!important;line-height:1.25!important;text-align:center!important}
    .home_container .cagetegory__item:focus-visible{outline:3px solid #27d994;outline-offset:4px}
    .home_container .categories__wrap>.container>.categories__btn__wrap{position:static!important;float:none!important;width:100%!important;height:auto!important;min-height:0!important;display:flex!important;align-items:center!important;justify-content:center!important;margin:28px 0 0!important;padding:0!important;transform:none!important}
    .home_container .categories__wrap>.container>.categories__btn__wrap .categories__btn{position:static!important;float:none!important;display:inline-flex!important;align-items:center!important;justify-content:center!important;min-width:230px!important;min-height:48px!important;margin:0!important;transform:none!important}
    @media(max-width:1250px){.home_container .categories{grid-template-columns:repeat(3,minmax(0,1fr))!important}.home_container .cagetegory__item{height:420px!important}}
    @media(max-width:760px){
        .home_container .pb-trends-section .slick-track{display:flex!important;align-items:stretch!important}
        .home_container .pb-trends-section .slick-slide{height:auto!important;padding:0 5px!important;box-sizing:border-box}
        .home_container .pb-trends-section .slick-slide>div{height:100%!important}
        .home_container .pb-trends-section .product__carousel .product__item.pb-tactical-card{width:100%!important;max-width:none!important;min-height:365px!important;height:100%!important;margin:0!important;border-width:2px!important}
        .home_container .pb-trends-section .pb-tactical-card .product__item-img-wrap{height:170px!important;min-height:170px!important;padding:13px!important}
        .home_container .pb-trends-section .pb-tactical-card .product__item-img-wrap:before{left:11px;bottom:11px;width:23px;height:23px;border-width:1px}
        .home_container .pb-trends-section .pb-tactical-card .product__item-img-wrap:after{right:11px;top:11px;width:23px;height:23px}
        .home_container .pb-trends-section .pb-card-reticle{top:130px;width:40px;height:40px}
        .home_container .pb-trends-section .pb-card-reticle svg{width:22px;height:22px}
        .home_container .pb-trends-section .pb-tactical-card .product__item-trend{min-width:88px;height:34px;padding:0 27px 0 12px!important;font-size:11px!important}
        .home_container .pb-trends-section .pb-card-favourite{right:7px;top:7px;width:30px;height:30px}
        .home_container .pb-trends-section .pb-card-favourite svg{width:22px;height:22px}
        .home_container .pb-trends-section .pb-card-meta{gap:5px;padding:14px 12px 6px;font-size:6px;letter-spacing:.08em}
        .home_container .pb-trends-section .pb-tactical-card .product-title{min-height:58px;padding:0 12px 5px!important;font-size:22px!important;line-height:1.08!important}
        .home_container .pb-trends-section .pb-card-price-line{margin:8px 12px 7px!important}
        .home_container .pb-trends-section .pb-tactical-card>.product__item-price,
        .home_container .pb-trends-section .pb-tactical-card .product__item_price_wrap,
        .home_container .pb-trends-section .pb-tactical-card .product__item_sale_price,
        .home_container .pb-trends-section .pb-card-buy-row>.product__item-price,
        .home_container .pb-trends-section .pb-card-buy-row>.product__item_price_wrap{min-height:34px!important;gap:7px!important;padding:0 12px!important;font-size:22px!important}
        .home_container .pb-trends-section .pb-tactical-card .product__item_price_wrap .product__item-price{padding:0!important;font-size:9px!important}
        .home_container .pb-trends-section .pb-card-buy-row>.product__item_price_wrap{flex:0 1 auto!important;flex-direction:column!important;align-items:flex-end!important;justify-content:center!important;gap:3px!important;white-space:nowrap!important}
        .home_container .pb-trends-section .pb-card-buy-row>.product__item_price_wrap .product__item_sale_price{min-height:0!important;padding:0!important;font-size:22px!important;line-height:1!important;white-space:nowrap!important}
        .home_container .pb-trends-section .pb-card-buy-row>.product__item_price_wrap .product__item-price{order:2!important;min-height:0!important;padding:0!important;font-size:10px!important;line-height:1!important;white-space:nowrap!important}
        .home_container .pb-trends-section .pb-card-buy-row{min-height:42px;gap:7px;padding:0 10px}
        .home_container .pb-trends-section .pb-card-action{min-height:31px;padding:0 8px;font-size:7px}
        .home_container .pb-trends-section .pb-card-action svg{width:13px;height:13px}
        .home_container .pb-trends-section .pb-card-action b{font-size:6px!important}
        .home_container .pb-trends-section .pb-card-features{margin-top:8px;padding:8px 5px}
        .home_container .pb-trends-section .pb-card-feature{gap:3px;padding:0 3px;font-size:5px}
        .home_container .pb-trends-section .pb-card-feature svg{width:15px;height:15px;flex-basis:15px}
        .home_container .categories__wrap .h2Wrap{padding:24px 16px!important}
        .home_container .categories__wrap .h2Wrap h2{padding-left:48px!important;background-position:left center!important;font-size:clamp(20px,6.1vw,27px)!important;line-height:1.1!important;white-space:nowrap!important}
        .home_container .slider_calendar__wrap{display:block!important;margin-top:6px!important}
        .home_container .slider{width:100%!important;height:44vw!important;min-height:0!important;max-height:335px!important;margin-bottom:45px!important;overflow:visible!important;aspect-ratio:auto!important;background:#09110d}
        .home_container .slider .flexslider,.home_container .slider .flex-viewport{width:100%!important;height:100%!important;margin:0!important}
        .home_container .slider .slides,.home_container .slider .slides>li,.home_container .slider .slides>li>a{height:100%!important;margin:0!important}
        .home_container .slider .slides>li>a{display:block!important}
        .home_container .slider .sliderImg{width:100%!important;height:100%!important;object-fit:cover!important}
        .home_container .slider .flex-control-nav,.home_container .slider.pb-slider-ready .flex-control-nav{left:0!important;right:0!important;bottom:-40px!important;width:100%!important;margin:0!important;text-align:center!important}
        .home_container .slider .flex-direction-nav,.home_container .slider .flex-prev,.home_container .slider .flex-next{display:none!important;visibility:hidden!important;pointer-events:none!important}
        .home_container .bests__wrap{display:grid!important;grid-template-columns:repeat(6,minmax(0,1fr))!important;align-items:start!important;justify-content:stretch!important;gap:9px 6px!important;padding:8px 4px 10px!important}
        .home_container .best__item{grid-column:span 2;min-width:0;display:flex!important;flex-direction:column;align-items:center;justify-content:flex-start}
        .home_container .best__item:nth-child(4){grid-column:2/span 2}
        .home_container .best__item:nth-child(5){grid-column:4/span 2}
        .home_container .best__item img{width:auto!important;height:46px!important;max-width:56px!important;max-height:46px!important;object-fit:contain!important}
        .home_container .best__item h3{width:100%;max-width:100%!important;margin:4px 0 0!important;font-size:10px!important;line-height:1.1!important;text-align:center!important}
        .home_container .slider_calendar__wrap>.calendar__wrap{display:none!important}
        .home_container .categories{grid-template-columns:repeat(2,minmax(0,1fr))!important;gap:10px!important}
        .home_container .cagetegory__item{height:350px!important}.home_container .cagetegory__item_img_wrap{height:210px!important;min-height:210px!important}.home_container .pb-category-body{min-height:140px;padding:16px!important}.home_container .cagetegory__item_h4{font-size:15px!important}.home_container .pb-category-link{font-size:10px}
        .home_container .pb-category-last-odd{grid-column:auto;width:auto;justify-self:stretch}
        .home_container .mobile__calendar{position:relative;display:block!important;height:350px;overflow:hidden;border:2px solid #111a15;background:#08110c;box-shadow:0 16px 32px rgba(7,18,12,.12)}
        .home_container .mobile__calendar:after{content:'';position:absolute;inset:0;border:1px solid rgba(46,222,153,.32);pointer-events:none}
        .home_container .mobile__calendar img{display:block;width:100%;height:100%;object-fit:cover;object-position:center}
    }
    @media(max-width:430px){.home_container .cagetegory__item,.home_container .mobile__calendar{height:310px!important}.home_container .cagetegory__item_img_wrap{height:185px!important;min-height:185px!important}.home_container .pb-category-body{min-height:125px!important;padding:12px!important}.home_container .cagetegory__item_h4{font-size:13px!important}}
</style>

@push('scripts')
<script data-navigate-once>
(function(){
    function prepareCategoryCards(){
        if(typeof gsap==='undefined') return;
        document.querySelectorAll('[data-pb-category-card]').forEach(function(card){
            if(card.dataset.pbHoverReady)return;
            card.dataset.pbHoverReady='1';
            var image=card.querySelector('.cagetegory__item_img');
            var reticle=card.querySelector('.pb-category-reticle svg');
            gsap.set(card,{y:0,force3D:true});
            if(image)gsap.set(image,{scale:1,transformOrigin:'50% 50%',force3D:true});
            if(reticle)gsap.set(reticle,{rotation:0,transformOrigin:'50% 50%'});
        });
    }

    document.addEventListener('pointerover',function(e){
        var card=e.target.closest&&e.target.closest('[data-pb-category-card]');
        if(!card||card.contains(e.relatedTarget)||typeof gsap==='undefined') return;
        prepareCategoryCards();
        var image=card.querySelector('.cagetegory__item_img');
        var reticle=card.querySelector('.pb-category-reticle svg');
        gsap.killTweensOf([card,image,reticle]);
        gsap.to(card,{y:-9,duration:.35,ease:'power2.out',boxShadow:'0 24px 44px rgba(7,18,12,.24)'});
        if(image) gsap.to(image,{scale:1.07,duration:.6,ease:'power2.out'});
        if(reticle) gsap.to(reticle,{rotation:90,duration:.55,ease:'power2.inOut'});
    });
    document.addEventListener('pointerout',function(e){
        var card=e.target.closest&&e.target.closest('[data-pb-category-card]');
        if(!card||card.contains(e.relatedTarget)||typeof gsap==='undefined') return;
        var image=card.querySelector('.cagetegory__item_img');
        var reticle=card.querySelector('.pb-category-reticle svg');
        gsap.to(card,{y:0,duration:.35,ease:'power2.out',boxShadow:'0 16px 32px rgba(7,18,12,.12)',overwrite:true});
        if(image) gsap.to(image,{scale:1,duration:.5,ease:'power2.out',overwrite:true});
        if(reticle) gsap.to(reticle,{rotation:0,duration:.45,ease:'power2.inOut',overwrite:true});
    });
    document.addEventListener('livewire:navigated',prepareCategoryCards);
    if(document.readyState==='loading')document.addEventListener('DOMContentLoaded',prepareCategoryCards,{once:true});
    else prepareCategoryCards();
})();
</script>
@endpush
</div>
