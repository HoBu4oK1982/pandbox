@php
    $pbWishlistSlugs = Cart::instance('wishlist')->content()
        ->map(fn ($item) => optional($item->model)->slug)
        ->filter()
        ->values()
        ->all();
@endphp

<style>
    a.product__item:not([data-pb-card-ready="1"]) {
        visibility: hidden !important;
        opacity: 0 !important;
    }
    a.product__item[data-pb-card-ready="1"] {
        visibility: visible;
        opacity: 1;
    }
    a.product__item.pb-tactical-card {
        position: relative !important;
        min-width: 0;
        min-height: 570px;
        display: flex !important;
        flex-direction: column;
        padding: 0 !important;
        overflow: hidden !important;
        border: 3px solid #111 !important;
        border-radius: 0 !important;
        color: #f4f6f5 !important;
        background:
            radial-gradient(circle at 20% 10%, rgba(255,255,255,.035), transparent 28%),
            linear-gradient(145deg, #191b1a, #0c0d0d) !important;
        box-shadow: 0 14px 32px rgba(8,18,13,.17);
        text-decoration: none !important;
        transform: translateZ(0);
        transition: border-color .28s, box-shadow .28s, transform .28s;
    }
    a.product__item.pb-tactical-card:hover {
        border-color: #159766 !important;
        box-shadow: 0 24px 48px rgba(5,35,22,.25);
        transform: translateY(-7px);
    }
    .pb-tactical-card .product__item-img-wrap {
        position: relative !important;
        order: 1;
        width: 100% !important;
        height: 295px !important;
        min-height: 295px;
        display: grid !important;
        place-items: center;
        margin: 0 !important;
        padding: 24px !important;
        box-sizing: border-box;
        overflow: hidden !important;
        border: 0 !important;
        background:
            linear-gradient(rgba(21,151,102,.045) 1px,transparent 1px),
            linear-gradient(90deg,rgba(21,151,102,.045) 1px,transparent 1px),
            radial-gradient(circle at 50% 45%,#fff 0,#f5f7f6 58%,#e8ecea 100%) !important;
        background-size: 28px 28px,28px 28px,auto !important;
    }
    .pb-tactical-card .product__item-img-wrap:before,
    .pb-tactical-card .product__item-img-wrap:after {
        content: '';
        position: absolute;
        z-index: 2;
        width: 34px;
        height: 34px;
        pointer-events: none;
    }
    .pb-tactical-card .product__item-img-wrap:before { left: 18px; bottom: 18px; border-left: 2px solid #159766; border-bottom: 2px solid #159766; }
    .pb-tactical-card .product__item-img-wrap:after { right: 18px; top: 18px; border-right: 1px solid rgba(30,48,39,.25); border-top: 1px solid rgba(30,48,39,.25); }
    .pb-tactical-card .product__item-img {
        position: relative !important;
        z-index: 1;
        width: 100% !important;
        height: 100% !important;
        max-width: 100% !important;
        object-fit: contain !important;
        filter: drop-shadow(0 14px 15px rgba(7,18,12,.19));
        transition: transform .5s cubic-bezier(.2,.75,.25,1);
    }
    .pb-tactical-card:hover .product__item-img { transform: scale(1.055) rotate(-1deg); }
    .pb-card-reticle {
        position: absolute;
        z-index: 4;
        right: 0;
        top: 239px;
        width: 57px;
        height: 56px;
        display: grid;
        place-items: center;
        color: #fff;
        background: linear-gradient(135deg,#08794f,#13a16d);
        clip-path: polygon(28% 0,100% 0,100% 100%,0 100%,0 30%);
    }
    .pb-card-reticle svg { width: 31px; height: 31px; fill: none; stroke: currentColor; stroke-width: 1.5; }
    .pb-tactical-card .product__item-trend {
        position: absolute !important;
        z-index: 5 !important;
        left: 0 !important;
        right: auto !important;
        top: 0 !important;
        bottom: auto !important;
        min-width: 122px;
        height: 48px;
        display: flex !important;
        align-items: center;
        margin: 0 !important;
        padding: 0 38px 0 17px !important;
        box-sizing: border-box;
        border: 0 !important;
        border-radius: 0 !important;
        color: #fff !important;
        background: linear-gradient(110deg,#087b51 0,#159766 76%,#101713 77%) !important;
        clip-path: polygon(0 0,100% 0,80% 100%,0 100%);
        font: 400 16px/1 'MagistralMedium',Arial,sans-serif !important;
        text-transform: none !important;
        letter-spacing: 0;
    }
    .pb-tactical-card .product__item-trend-sale{background:linear-gradient(110deg,#b81725 0,#e33b49 76%,#101713 77%)!important;box-shadow:0 9px 24px rgba(227,59,73,.25)!important}
    .pb-tactical-card .product__item-trend-new{color:#04130c!important;background:linear-gradient(110deg,#13c978 0,#35ef9e 76%,#101713 77%)!important;box-shadow:0 9px 24px rgba(53,239,158,.2)!important}
    .pb-tactical-card .product__item-trend-hit{background:linear-gradient(110deg,#c65e08 0,#f28c18 76%,#101713 77%)!important;box-shadow:0 9px 24px rgba(242,140,24,.24)!important}
    .pb-card-meta { order: 2; display: flex; gap: 8px; padding: 23px 20px 8px; color: #a9b0ac; font: 600 9px/1 Arial,sans-serif; letter-spacing: .12em; text-transform: uppercase; }
    .pb-card-meta b { color: #20b77b; font-weight: 700; }
    .pb-card-meta i { color: #667069; font-style: normal; }
    .pb-tactical-card .product-title {
        order: 3;
        min-height: 52px;
        height: auto !important;
        display: block !important;
        margin: 0 !important;
        padding: 0 20px 4px !important;
        overflow: visible !important;
        border: 0 !important;
        border-bottom: 0 !important;
        color: #fff !important;
        font-size: 19px !important;
        font-weight: 700 !important;
        line-height: 1.24 !important;
        text-align: left !important;
        white-space: normal !important;
        text-overflow: clip !important;
        -webkit-box-orient: initial;
        -webkit-line-clamp: unset;
    }
    .pb-card-price-line { order:4!important;width:auto!important;height:1px!important;display:block!important;margin:14px 20px 12px!important;background:linear-gradient(90deg,#20b77b 0 22%,#626864 22% 70%,transparent 70%)!important; }
    .pb-tactical-card > .product__item-price,
    .pb-tactical-card .product__item_price_wrap {
        order: 5;
        min-height: 52px;
        display: flex !important;
        align-items: center;
        gap: 16px;
        margin: 0 !important;
        padding: 0 20px !important;
        color: #11b879 !important;
        font-size: 29px !important;
        font-weight: 800 !important;
        line-height: 1 !important;
        text-align: left !important;
    }
    .pb-card-buy-row {
        order: 5;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 14px;
        min-height: 58px;
        padding: 0 20px;
    }
    .pb-card-buy-row > .product__item-price,
    .pb-card-buy-row > .product__item_price_wrap {
        min-width: 0;
        flex: 1 1 auto;
        display: flex !important;
        align-items: center;
        gap: 12px;
        margin: 0 !important;
        padding: 0 !important;
        color: #11b879 !important;
        font-size: 26px !important;
        font-weight: 800 !important;
        line-height: 1 !important;
        text-align: left !important;
    }
    .pb-tactical-card .product__item_price_wrap .product__item-price { position:relative;order:2;color:#737875!important;font-size:15px!important;font-weight:500!important;text-decoration:none!important; }
    .pb-tactical-card .product__item_price_wrap .product__item-price:after{content:'';position:absolute;left:-3px;right:-3px;top:52%;height:2px;background:#9b3a42;transform:rotate(-5deg);transform-origin:center;pointer-events:none}
    .pb-tactical-card .product__item_sale_price { order: 1; color: #ef3f4f !important; font-size: 26px !important; font-weight: 800 !important; text-decoration:none!important;text-shadow:0 7px 20px rgba(239,63,79,.16) }
    .pb-tactical-card > .product__item-price span,.pb-tactical-card .product__item_sale_price span { font-size: .72em; }
    .pb-card-favourite {
        position: absolute;
        z-index: 5;
        right: 14px;
        top: 14px;
        width: 42px;
        height: 42px;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 0;
        border: 0;
        color: #17211c;
        background: transparent;
        filter: drop-shadow(0 2px 4px rgba(255,255,255,.9));
        cursor: pointer;
        transition: color .2s, transform .2s;
    }
    .pb-card-favourite:hover { color: #159766; transform: scale(1.12); }
    .pb-card-favourite.active { color: #159766; }
    .pb-card-favourite.active svg { fill: #159766; }
    .pb-card-favourite.loading { pointer-events:none; opacity:.45; }
    .pb-card-favourite svg { width: 30px; height: 30px; fill: rgba(255,255,255,.72); stroke: currentColor; stroke-width: 1.5; }
    .pb-card-features {
        order: 6;
        display: grid;
        grid-template-columns: repeat(3,1fr);
        margin-top: 14px;
        padding: 13px 10px;
        border-top: 1px solid #363a38;
        border-bottom: 1px solid #363a38;
    }
    .pb-card-feature { min-width: 0; display: flex; align-items: center; justify-content: center; gap: 6px; padding: 0 6px; color: #d3d7d5; font: 600 7px/1.35 Arial,sans-serif; text-transform: uppercase; letter-spacing: .05em; }
    .pb-card-feature + .pb-card-feature { border-left: 1px solid #4b504d; }
    .pb-card-feature svg { width: 22px; height: 22px; flex: 0 0 22px; fill: none; stroke: #159766; stroke-width: 1.7; }
    .pb-card-action {
        flex: 0 0 auto;
        min-height: 42px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        margin: 0;
        padding: 0 14px;
        border: 1px solid #15a36e;
        color: #fff;
        background: linear-gradient(90deg,#06784e,#12a66e);
        font: 700 11px/1 Arial,sans-serif;
        text-align: center;
        text-transform: uppercase;
        letter-spacing: .035em;
        white-space: nowrap;
        transition: filter .25s,box-shadow .25s;
    }
    .pb-card-action svg { width: 18px; height: 18px; margin:0; fill:none; stroke:currentColor; stroke-width:1.7; }
    .pb-card-action b { font-size:8px!important; }
    .pb-card-action { cursor:pointer; }
    .pb-card-action.loading { pointer-events:none; filter:saturate(.4); }
    .pb-card-action.done b:after { content:' ✓'; }
    .pb-tactical-card:hover .pb-card-action { filter: brightness(1.12); box-shadow: 0 0 24px rgba(21,163,110,.24); }
    .category__products_output,.subcategory__products_output{display:grid!important;grid-template-columns:repeat(3,minmax(270px,1fr))!important;gap:24px!important;align-items:stretch}.category__products_output .pb-tactical-card,.subcategory__products_output .pb-tactical-card{width:100%!important;max-width:none!important;min-height:590px!important;box-sizing:border-box}.category__products_output .pb-tactical-card .product__item-img-wrap,.subcategory__products_output .pb-tactical-card .product__item-img-wrap{height:300px!important;min-height:300px!important}.category__products_output .pb-card-reticle,.subcategory__products_output .pb-card-reticle{top:244px}.category__products_output .pb-tactical-card .product-title,.subcategory__products_output .pb-tactical-card .product-title{font-size:18px!important}.category__products_output .pb-card-feature,.subcategory__products_output .pb-card-feature{font-size:8px}.category__products_output .pb-card-action,.subcategory__products_output .pb-card-action{font-size:15px}
    @media(max-width:1280px){.category__products_output,.subcategory__products_output{grid-template-columns:repeat(2,minmax(270px,1fr))!important}}
    @media(max-width:760px){.category__products_output,.subcategory__products_output{grid-template-columns:repeat(2,minmax(0,1fr))!important;gap:8px!important}.category__products_output .pb-tactical-card,.subcategory__products_output .pb-tactical-card{min-height:365px!important}}
    @media(max-width:1200px){a.product__item.pb-tactical-card{min-height:530px}.pb-tactical-card .product__item-img-wrap{height:255px!important;min-height:255px}.pb-card-reticle{top:199px}.pb-tactical-card .product-title{font-size:16px!important}.pb-tactical-card>.product__item-price,.pb-tactical-card .product__item_price_wrap,.pb-tactical-card .product__item_sale_price{font-size:24px!important}}
    @media(max-width:600px){a.product__item.pb-tactical-card{min-height:500px}.pb-tactical-card .product__item-img-wrap{height:235px!important;min-height:235px}.pb-card-reticle{top:179px}.pb-card-feature span{display:none}.pb-card-buy-row{padding:0 14px}.pb-card-action{padding:0 10px;font-size:10px}}
    @media(max-width:760px){
        .detailPopular .deatilsRelated{display:grid!important;grid-template-columns:repeat(2,minmax(0,1fr))!important;gap:8px!important;align-items:stretch!important}
        .detailPopular .deatilsRelated .pb-tactical-card{width:100%!important;max-width:none!important;min-height:365px!important;height:100%!important;margin:0!important;border-width:2px!important}
        .detailPopular .deatilsRelated .pb-tactical-card .product__item-img-wrap{height:162px!important;min-height:162px!important;padding:12px!important}
        .detailPopular .deatilsRelated .pb-card-reticle{top:124px;width:38px;height:38px}
        .detailPopular .deatilsRelated .pb-card-reticle svg{width:21px;height:21px}
        .detailPopular .deatilsRelated .pb-card-favourite{right:6px;top:6px;width:29px;height:29px}
        .detailPopular .deatilsRelated .pb-card-favourite svg{width:21px;height:21px}
        .detailPopular .deatilsRelated .pb-card-meta{gap:4px;padding:13px 10px 5px;font-size:5px;letter-spacing:.07em}
        .detailPopular .deatilsRelated .pb-tactical-card .product-title{min-height:44px;padding:0 10px 3px!important;font-size:11px!important;line-height:1.18!important}
        .detailPopular .deatilsRelated .pb-card-price-line{margin:7px 10px 6px!important}
        .detailPopular .deatilsRelated .pb-card-buy-row{min-height:40px;gap:5px;padding:0 8px}
        .detailPopular .deatilsRelated .pb-card-buy-row>.product__item-price,.detailPopular .deatilsRelated .pb-card-buy-row>.product__item_price_wrap{min-height:32px!important;gap:6px!important;padding:0!important;font-size:15px!important}
        .detailPopular .deatilsRelated .pb-tactical-card .product__item_price_wrap .product__item-price{font-size:8px!important}
        .detailPopular .deatilsRelated .pb-card-action{min-height:29px;padding:0 6px;font-size:7px}
        .detailPopular .deatilsRelated .pb-card-action svg{width:12px;height:12px}
        .detailPopular .deatilsRelated .pb-card-action b{font-size:5px!important}
        .detailPopular .deatilsRelated .pb-card-features{margin-top:7px;padding:7px 3px}
        .detailPopular .deatilsRelated .pb-card-feature{gap:2px;padding:0 2px;font-size:0}
        .detailPopular .deatilsRelated .pb-card-feature svg{width:14px;height:14px;flex-basis:14px}
        .category__content_wrap,.subcategory__content_wrap{display:block!important;width:100%!important}
        .category__products_output_wrap,.subcategory__products_output_wrap{width:100%!important;margin:0!important;padding-bottom:82px!important}
        .shopSort{width:100%!important;display:grid!important;grid-template-columns:minmax(0,1.55fr) minmax(0,.85fr)!important;gap:7px!important;align-items:center!important;margin:0 0 12px!important;padding:8px!important;box-sizing:border-box!important}
        .shopSort .sort-item{min-width:0!important;width:100%!important;margin:0!important}
        .shopSort select,.orderby select,.product-per-page select{width:100%!important;max-width:100%!important;height:38px!important;margin:0!important;padding:0 25px 0 9px!important;font-size:10px!important;text-overflow:ellipsis!important}
        .category__products_output .pb-tactical-card,.subcategory__products_output .pb-tactical-card{width:100%!important;max-width:none!important;min-height:365px!important;height:100%!important;margin:0!important;border-width:2px!important}
        .category__products_output .pb-tactical-card .product__item-img-wrap,.subcategory__products_output .pb-tactical-card .product__item-img-wrap{height:162px!important;min-height:162px!important;padding:12px!important}
        .category__products_output .pb-tactical-card .product__item-img-wrap:before,.subcategory__products_output .pb-tactical-card .product__item-img-wrap:before{left:10px;bottom:10px;width:22px;height:22px;border-width:1px}
        .category__products_output .pb-tactical-card .product__item-img-wrap:after,.subcategory__products_output .pb-tactical-card .product__item-img-wrap:after{right:10px;top:10px;width:22px;height:22px}
        .category__products_output .pb-card-reticle,.subcategory__products_output .pb-card-reticle{top:124px;width:38px;height:38px}
        .category__products_output .pb-card-reticle svg,.subcategory__products_output .pb-card-reticle svg{width:21px;height:21px}
        .category__products_output .pb-tactical-card .product__item-trend,.subcategory__products_output .pb-tactical-card .product__item-trend{min-width:82px;height:32px;padding:0 25px 0 10px!important;font-size:10px!important}
        .category__products_output .pb-card-favourite,.subcategory__products_output .pb-card-favourite{right:6px;top:6px;width:29px;height:29px}
        .category__products_output .pb-card-favourite svg,.subcategory__products_output .pb-card-favourite svg{width:21px;height:21px}
        .category__products_output .pb-card-meta,.subcategory__products_output .pb-card-meta{gap:4px;padding:13px 10px 5px;font-size:5px;letter-spacing:.07em}
        .category__products_output .pb-tactical-card .product-title,.subcategory__products_output .pb-tactical-card .product-title{min-height:44px;padding:0 10px 3px!important;font-size:11px!important;line-height:1.18!important}
        .category__products_output .pb-card-price-line,.subcategory__products_output .pb-card-price-line{margin:7px 10px 6px!important}
        .category__products_output .pb-tactical-card>.product__item-price,.subcategory__products_output .pb-tactical-card>.product__item-price,
        .category__products_output .pb-tactical-card .product__item_price_wrap,.subcategory__products_output .pb-tactical-card .product__item_price_wrap,
        .category__products_output .pb-tactical-card .product__item_sale_price,.subcategory__products_output .pb-tactical-card .product__item_sale_price,
        .category__products_output .pb-card-buy-row>.product__item-price,.subcategory__products_output .pb-card-buy-row>.product__item-price,
        .category__products_output .pb-card-buy-row>.product__item_price_wrap,.subcategory__products_output .pb-card-buy-row>.product__item_price_wrap{min-height:32px!important;gap:6px!important;padding:0!important;font-size:15px!important}
        .category__products_output .pb-tactical-card .product__item_price_wrap .product__item-price,.subcategory__products_output .pb-tactical-card .product__item_price_wrap .product__item-price{font-size:8px!important}
        .category__products_output .pb-card-buy-row,.subcategory__products_output .pb-card-buy-row{min-height:40px;gap:5px;padding:0 8px}
        .category__products_output .pb-card-action,.subcategory__products_output .pb-card-action{min-height:29px;padding:0 6px;font-size:7px}
        .category__products_output .pb-card-action svg,.subcategory__products_output .pb-card-action svg{width:12px;height:12px}
        .category__products_output .pb-card-action b,.subcategory__products_output .pb-card-action b{font-size:5px!important}
        .category__products_output .pb-card-features,.subcategory__products_output .pb-card-features{margin-top:7px;padding:7px 3px}
        .category__products_output .pb-card-feature,.subcategory__products_output .pb-card-feature{gap:2px;padding:0 2px;font-size:0}
        .category__products_output .pb-card-feature svg,.subcategory__products_output .pb-card-feature svg{width:14px;height:14px;flex-basis:14px}
    }
    /* Мобильная цена карточек: единый фактический кегль, без наследования desktop-значений. */
    @media(max-width:760px){
        html body .pb-tactical-card .pb-card-buy-row>.product__item-price,
        html body .pb-tactical-card .pb-card-buy-row>.product__item_price_wrap,
        html body .pb-tactical-card>.product__item-price,
        html body .pb-tactical-card>.product__item_price_wrap,
        html body .pb-tactical-card .product__item_sale_price{
            min-height:32px!important;
            padding:0!important;
            font-size:22px!important;
            line-height:1!important;
        }
        html body .pb-tactical-card .product__item_price_wrap>.product__item-price{
            font-size:9px!important;
            line-height:1!important;
        }
        html body .pb-tactical-card .product__item-price>span,
        html body .pb-tactical-card .product__item_sale_price>span{font-size:.72em!important}
    }
    @media(prefers-reduced-motion:reduce){.pb-tactical-card *{transition:none!important}}
</style>

<script data-navigate-once>
(function(){
    var initialWishlistSlugs=@json($pbWishlistSlugs);
    var wishlistSlugState={};
    initialWishlistSlugs.forEach(function(value){wishlistSlugState[''+value]=true;});
    var titleSyncFrame=0;
    function syncProductTitleHeights(){
        titleSyncFrame=0;
        var titles=Array.prototype.slice.call(document.querySelectorAll('.pb-tactical-card .product-title'));
        if(!titles.length)return;

        titles.forEach(function(title){
            title.style.height='auto';
            title.style.minHeight='0px';
        });

        var visible=titles.filter(function(title){
            return title.getClientRects().length&&title.getBoundingClientRect().width>0;
        });
        if(!visible.length)return;

        var maxHeight=visible.reduce(function(max,title){
            return Math.max(max,Math.ceil(title.scrollHeight));
        },0);
        visible.forEach(function(title){
            title.style.height=maxHeight+'px';
            title.style.minHeight=maxHeight+'px';
        });
    }
    function queueProductTitleSync(){
        if(titleSyncFrame)cancelAnimationFrame(titleSyncFrame);
        titleSyncFrame=requestAnimationFrame(syncProductTitleHeights);
    }

    function tacticalCardIsComplete(card){
        return card.classList.contains('pb-tactical-card')
            && card.dataset.pbCardReady==='1'
            && !!card.querySelector(':scope > .pb-card-meta')
            && !!card.querySelector(':scope > .pb-card-price-line')
            && !!card.querySelector(':scope > .pb-card-buy-row')
            && !!card.querySelector(':scope > .pb-card-reticle')
            && !!card.querySelector(':scope > .pb-card-favourite')
            && !!card.querySelector(':scope > .pb-card-features');
    }

    function resetIncompleteTacticalCard(card){
        card.removeAttribute('data-pb-card-ready');
        card.querySelectorAll(':scope > .pb-card-meta,:scope > .pb-card-price-line,:scope > .pb-card-reticle,:scope > .pb-card-favourite,:scope > .pb-card-features,:scope > .pb-card-action').forEach(function(extra){
            extra.remove();
        });
        var buyRow=card.querySelector(':scope > .pb-card-buy-row');
        if(buyRow){
            var price=buyRow.querySelector(':scope > .product__item-price,:scope > .product__item_price_wrap');
            if(price)card.insertBefore(price,buyRow);
            buyRow.remove();
        }
    }

    function hardenProductCardLink(card){
        var href=card.getAttribute('href');
        if(href)card.setAttribute('data-pb-card-href',href);
        card.removeAttribute('href');
        card.removeAttribute('wire:navigate');
        card.setAttribute('data-pb-card-link','');
        card.setAttribute('role','link');
        if(!card.hasAttribute('tabindex'))card.setAttribute('tabindex','0');
    }

    function productCardHref(card){
        return card.getAttribute('data-pb-card-href')||'';
    }

    function navigateToProductCard(card){
        var href=productCardHref(card);
        if(!href)return;
        if(window.Livewire&&typeof Livewire.navigate==='function')Livewire.navigate(href);
        else window.location.assign(href);
    }

    function cardExtras(){
        document.querySelectorAll('a.product__item').forEach(function(card){
            hardenProductCardLink(card);
            if(tacticalCardIsComplete(card)){
                syncWishlistButton(card);
                return;
            }
            var imageWrap=card.querySelector('.product__item-img-wrap');
            var title=card.querySelector('.product-title');
            if(!imageWrap||!title)return;
            resetIncompleteTacticalCard(card);
            card.classList.add('pb-tactical-card');
            var trend=card.querySelector('.product__item-trend');
            var section=trend ? trend.textContent.trim() : 'Pandbox';
            title.insertAdjacentHTML('beforebegin','<span class="pb-card-meta"><b>'+section+'</b><i>/</i><span>ТАКТИЧЕСКОЕ СНАРЯЖЕНИЕ</span></span>');
            title.insertAdjacentHTML('afterend','<span class="pb-card-price-line"></span>');
            card.insertAdjacentHTML('beforeend','<span class="pb-card-reticle"><svg viewBox="0 0 40 40"><circle cx="20" cy="20" r="10"/><circle cx="20" cy="20" r="4"/><path d="M20 1v11M20 28v11M1 20h11M28 20h11"/></svg></span><span class="pb-card-favourite" role="button" tabindex="0" aria-label="Добавить в избранное" data-pb-card-wishlist><svg viewBox="0 0 24 24"><path d="M20.8 4.6a5.5 5.5 0 0 0-7.8 0L12 5.7l-1.1-1.1a5.5 5.5 0 0 0-7.8 7.8l1.1 1.1L12 21l7.8-7.5 1.1-1.1a5.5 5.5 0 0 0-.1-7.8Z"/></svg></span><span class="pb-card-features"><span class="pb-card-feature"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="8"/><circle cx="12" cy="12" r="3"/><path d="M12 1v3M12 20v3M1 12h3M20 12h3"/></svg><span>Надёжная<br>конструкция</span></span><span class="pb-card-feature"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="8"/><path d="M12 2v20M2 12h20"/></svg><span>Высокая<br>точность</span></span><span class="pb-card-feature"><svg viewBox="0 0 24 24"><path d="M12 2l8 3v6c0 5-3.4 9-8 11-4.6-2-8-6-8-11V5Z"/><path d="m8 12 2.5 2.5L16 9"/></svg><span>Проверенное<br>качество</span></span></span><span class="pb-card-action" role="button" tabindex="0" data-pb-card-cart><svg viewBox="0 0 24 24"><path d="M3 4h2l2.5 11h10l2-7H7"/><circle cx="9" cy="19" r="1.5"/><circle cx="18" cy="19" r="1.5"/></svg><b>В корзину</b></span>');
            var price=card.querySelector(':scope > .product__item-price, :scope > .product__item_price_wrap');
            var action=card.querySelector(':scope > .pb-card-action');
            if(price&&action){
                var buyRow=document.createElement('span');
                buyRow.className='pb-card-buy-row';
                price.parentNode.insertBefore(buyRow,price);
                buyRow.appendChild(price);
                buyRow.appendChild(action);
            }
            card.setAttribute('data-pb-card-ready','1');
            syncWishlistButton(card);
        });
        queueProductTitleSync();
    }

    var cardExtrasQueued=false;
    function queueCardExtras(){
        if(cardExtrasQueued)return;
        cardExtrasQueued=true;
        queueMicrotask(function(){
            cardExtrasQueued=false;
            cardExtras();
        });
    }

    function registerTacticalCardLivewireHook(){
        if(!window.Livewire||window.__pbTacticalCardsLivewireHooked)return;
        window.__pbTacticalCardsLivewireHooked=true;
        function containsProductCard(root){
            return !!(root&&(
                (root.matches&&root.matches('a.product__item'))
                ||(root.querySelector&&root.querySelector('a.product__item'))
            ));
        }
        Livewire.hook('morph.updated',function(payload){
            var root=payload&&payload.el;
            if(!containsProductCard(root))return;
            if(root&&root.matches&&root.matches('a.product__item'))hardenProductCardLink(root);
            if(root&&root.querySelectorAll)root.querySelectorAll('a.product__item').forEach(hardenProductCardLink);
            queueCardExtras();
        });
        Livewire.hook('morph.added',function(payload){
            var root=payload&&payload.el;
            if(!containsProductCard(root))return;
            if(root&&root.matches&&root.matches('a.product__item'))hardenProductCardLink(root);
            if(root&&root.querySelectorAll)root.querySelectorAll('a.product__item').forEach(hardenProductCardLink);
            queueCardExtras();
        });
    }

    function productSlug(card){
        var path=new URL(productCardHref(card),window.location.origin).pathname.replace(/\/+$/,'');
        return decodeURIComponent(path.substring(path.lastIndexOf('/')+1));
    }

    function syncWishlistButton(card){
        var button=card.querySelector('[data-pb-card-wishlist]');
        if(!button)return;
        var active=!!wishlistSlugState[''+productSlug(card)];
        button.classList.toggle('active',active);
        button.setAttribute('aria-label',active?'Убрать из избранного':'Добавить в избранное');
    }

    function syncWishlistCards(slug){
        document.querySelectorAll('a.product__item').forEach(function(card){
            if(!slug||(''+productSlug(card))===(''+slug))syncWishlistButton(card);
        });
    }

    function csrf(){
        var token=document.querySelector('meta[name="csrf-token"]');
        return token ? token.content : '';
    }

    function request(url,button){
        if(button.dataset.pbRequestPending==='1')return null;
        button.dataset.pbRequestPending='1';
        button.setAttribute('aria-disabled','true');
        button.classList.add('loading');
        var controller=typeof AbortController!=='undefined'?new AbortController():null;
        var timeout=window.setTimeout(function(){if(controller)controller.abort();},12000);
        return fetch(url,{method:'POST',headers:{'Accept':'application/json','X-CSRF-TOKEN':csrf(),'X-Requested-With':'XMLHttpRequest'},signal:controller?controller.signal:undefined})
            .then(function(response){return response.json().then(function(data){if(!response.ok)throw new Error(data.message||'Не удалось выполнить действие');return data;});})
            .catch(function(error){if(error&&error.name==='AbortError')throw new Error('Сайт не ответил вовремя. Попробуйте ещё раз.');throw error;})
            .finally(function(){
                window.clearTimeout(timeout);
                button.classList.remove('loading');
                button.removeAttribute('aria-disabled');
                button.dataset.pbRequestPending='0';
            });
    }

    function syncQuickActionCount(type,count){
        count=Math.max(0,parseInt(count,10)||0);
        var selector=type==='cart'?'[data-pb-cart-count]':'[data-pb-wishlist-count]';
        document.querySelectorAll(selector).forEach(function(root){
            var regular=root.querySelector('.pb-header-action-count');
            if(regular)regular.textContent=count;
            /* Мобильный докбар: <b>N</b> внутри .pbm-dock-icon — простой счётчик
               без условного рендера, всегда показывает число как есть. */
            var dockCount=root.querySelector('.pbm-dock-icon b');
            if(dockCount)dockCount.textContent=count;
            var stickyLink=root.querySelector('.sn-icon');
            if(!stickyLink)return;
            var badge=stickyLink.querySelector('.sn-badge');
            if(count<1){if(badge)badge.remove();return;}
            if(!badge){badge=document.createElement('span');badge.className='sn-badge';stickyLink.appendChild(badge);}
            badge.textContent=count;
        });
    }
    // Доступна другим партиалам (например, странице товара) для обновления
    // счётчиков корзины/избранного после собственных fetch-запросов.
    window.pbSyncActionCount = syncQuickActionCount;

    function handleProductCardClick(e){
        var wishlist=e.target.closest&&e.target.closest('[data-pb-card-wishlist]');
        var cart=e.target.closest&&e.target.closest('[data-pb-card-cart]');
        var button=wishlist||cart;
        if(!button){
            var cardLink=e.target.closest&&e.target.closest('a[data-pb-card-link]');
            if(!cardLink)return;
            e.preventDefault();
            e.stopImmediatePropagation();
            navigateToProductCard(cardLink);
            return;
        }
        e.preventDefault();
        e.stopImmediatePropagation();
        var card=button.closest('a.product__item');
        if(!card)return;
        var slug=productSlug(card);
        var endpoint=wishlist ? @json(route('quick-wishlist.toggle', ['slug' => '__slug__'])) : @json(route('quick-cart.add', ['slug' => '__slug__']));
        endpoint=endpoint.replace('__slug__',encodeURIComponent(slug));
        var pendingRequest=request(endpoint,button);
        if(!pendingRequest)return;
        pendingRequest.then(function(data){
            if(wishlist){
                if(data.active)wishlistSlugState[''+slug]=true;
                else delete wishlistSlugState[''+slug];
                syncWishlistCards(slug);
                syncQuickActionCount('wishlist',data.wishlist_count);
                window.dispatchEvent(new CustomEvent(data.active?'wish-added':'wish-deleted',{detail:{prodName:data.name}}));
            }else{
                button.classList.add('done');
                window.setTimeout(function(){button.classList.remove('done');},1200);
                syncQuickActionCount('cart',data.cart_count);
                window.dispatchEvent(new CustomEvent('cart-updated',{detail:{prodName:data.name}}));
            }
            if(typeof gsap!=='undefined')gsap.fromTo(button,{scale:.88},{scale:1,duration:.38,ease:'back.out(2)'});
        }).catch(function(error){
            window.dispatchEvent(new CustomEvent('cart-error-message',{detail:{message:error.message}}));
        });
    }

    function guardProductCardActionPress(e){
        var button=e.target.closest&&e.target.closest('[data-pb-card-wishlist],[data-pb-card-cart]');
        if(!button)return;
        var card=button.closest('a.product__item');
        if(card)hardenProductCardLink(card);
    }

    function handleProductCardKeydown(e){
        if(e.key!=='Enter'&&e.key!==' ')return;
        var button=e.target.closest&&e.target.closest('[data-pb-card-wishlist],[data-pb-card-cart]');
        if(button){
            e.preventDefault();
            e.stopImmediatePropagation();
            button.click();
            return;
        }
        var card=e.target.closest&&e.target.closest('a[data-pb-card-link]');
        if(!card||e.target!==card)return;
        e.preventDefault();
        e.stopImmediatePropagation();
        navigateToProductCard(card);
    }

    if(!window.__pbTacticalCardsBooted){
        window.__pbTacticalCardsBooted=true;
        window.addEventListener('click',handleProductCardClick,true);
        window.addEventListener('keydown',handleProductCardKeydown,true);
        window.addEventListener('pointerdown',guardProductCardActionPress,true);
        window.addEventListener('mousedown',guardProductCardActionPress,true);
        window.addEventListener('touchstart',guardProductCardActionPress,{capture:true,passive:true});
        window.addEventListener('pb-wishlist-state',function(event){
            var detail=event.detail||{};
            var slug=''+(detail.slug||'');
            if(!slug)return;
            if(detail.active)wishlistSlugState[slug]=true;
            else delete wishlistSlugState[slug];
            syncWishlistCards(slug);
        });
        document.addEventListener('pointerover',function(e){
            var item=e.target.closest&&e.target.closest('[data-pb-benefit]');
            if(!item||item.contains(e.relatedTarget)||typeof gsap==='undefined')return;
            var icon=item.querySelector('img');
            if(!icon)return;
            gsap.killTweensOf(icon);
            gsap.fromTo(icon,
                {rotationY:0,transformPerspective:700,transformOrigin:'50% 50%'},
                {rotationY:360,transformPerspective:700,transformOrigin:'50% 50%',duration:.72,ease:'power2.inOut',overwrite:true,onComplete:function(){gsap.set(icon,{clearProps:'transform'});}}
            );
        });
        document.addEventListener('livewire:navigated',function(){queueCardExtras();queueProductTitleSync();});
        document.addEventListener('livewire:init',registerTacticalCardLivewireHook,{once:true});
        registerTacticalCardLivewireHook();
        document.addEventListener('click',function(e){
            if(e.target.closest&&e.target.closest('.tabHeader')){
                setTimeout(queueProductTitleSync,40);
                setTimeout(queueProductTitleSync,350);
            }
        });
        window.addEventListener('resize',queueProductTitleSync,{passive:true});
        if(document.fonts&&document.fonts.ready)document.fonts.ready.then(queueProductTitleSync);
    }
    cardExtras();
})();
</script>
