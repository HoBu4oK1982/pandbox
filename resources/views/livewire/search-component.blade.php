@section('title', 'Поиск — Pandbox.kz')

<div class="pb-results" data-pb-results>
    <section class="pb-results-hero">
        <div class="container">
            <div class="pb-results-crumbs">
                <a wire:navigate href="{{ route('home') }}">Главная</a><span>⌖</span><span>Поиск</span>
            </div>
            <div class="pb-results-heading">
                <div>
                    <span class="pb-results-code">PBX / SEARCH DATABASE</span>
                    <h1>Результаты поиска</h1>
                    <p>По запросу <strong>«{{ $search }}»</strong> найдено <b>{{ $products->total() }}</b> товаров</p>
                </div>
                <div class="pb-results-radar" aria-hidden="true"><i></i><b></b><span></span></div>
            </div>
        </div>
    </section>

    <div class="container pb-results-container">
        @if($categories->count())
            <section class="pb-results-categories" data-pb-result-block>
                <div class="pb-results-section-title"><span>01</span><div><small>Быстрый выбор</small><h2>Категории в результатах</h2></div></div>
                <div class="pb-results-category-list">
                    <button type="button" wire:click="chooseCategory('')" class="{{ $category === '' ? 'active' : '' }}"><i>⌖</i><span>Все товары</span><b>{{ $products->total() }}</b></button>
                    @foreach($categories as $item)
                        <button type="button" wire:click="chooseCategory('{{ $item->guid }}')" class="{{ $category === (string) $item->guid ? 'active' : '' }}">
                            <span class="pb-results-category-image">
                                @if($item->image)<img src="{{ asset('assets/images/categories/' . $item->image) }}" alt="">@else<i>PBX</i>@endif
                            </span>
                            <span>{{ $item->title }}</span><b>→</b>
                        </button>
                    @endforeach
                </div>
            </section>
        @endif

        <div class="pb-results-layout">
            <aside class="pb-results-filter" data-pb-result-block wire:ignore.self>
                <div class="pb-filter-head"><div><small>Уточнить выдачу</small><strong>Фильтры</strong></div><div class="pb-filter-head-actions"><button type="button" wire:click="resetFilters" data-pb-reset-filters>Сбросить</button><button type="button" wire:click="applyFilters" data-pb-apply-filters>Применить</button></div></div>

                <div class="pb-filter-group">
                    <span class="pb-filter-label">Цена, ₸</span>
                    <div class="pb-filter-price">
                        <label><small>От</small><input type="number" min="0" placeholder="{{ number_format($minPrice, 0, '.', ' ') }}" wire:model.defer="priceFrom"></label>
                        <i>—</i>
                        <label><small>До</small><input type="number" min="0" placeholder="{{ number_format($maxPrice, 0, '.', ' ') }}" wire:model.defer="priceTo"></label>
                    </div>
                </div>

                <div class="pb-filter-group">
                    <span class="pb-filter-label">Статус товара</span>
                    <label class="pb-filter-check"><input type="checkbox" wire:model.defer="onlySale"><i></i><span>Только со скидкой</span></label>
                    <label class="pb-filter-check"><input type="checkbox" wire:model.defer="onlyNew"><i></i><span>Новинки</span></label>
                    <label class="pb-filter-check"><input type="checkbox" wire:model.defer="onlyHit"><i></i><span>Хиты продаж</span></label>
                </div>

                @if($categories->count())
                    <div class="pb-filter-group pb-filter-category-group">
                        <span class="pb-filter-label">Категория</span>
                        <label class="pb-filter-category-option"><input type="radio" value="" wire:model.defer="category"><span>Все категории</span></label>
                        @foreach($categories as $item)
                            <label class="pb-filter-category-option"><input type="radio" value="{{ $item->guid }}" wire:model.defer="category"><span>{{ $item->title }}</span></label>
                        @endforeach
                    </div>
                @endif
            </aside>

            <main class="pb-results-main" wire:loading.class="pb-results-loading">
                <div class="pb-results-toolbar" data-pb-result-block>
                    <div><span class="pb-live-dot"></span><strong>{{ $products->total() }}</strong> позиций</div>
                    <div class="pb-results-selects">
                        <label>Сортировка
                            <select wire:model.live="sorting">
                                <option value="default">По релевантности</option><option value="date">Сначала новые</option><option value="price">Сначала дешевле</option><option value="price-desc">Сначала дороже</option><option value="title">По названию</option>
                            </select>
                        </label>
                        <label>Показывать
                            <select wire:model.live="pagesize"><option value="12">12</option><option value="24">24</option><option value="36">36</option><option value="48">48</option></select>
                        </label>
                    </div>
                </div>

                <div class="pb-results-loader" wire:loading.flex><span></span><b>Обновляем результаты</b></div>

                @if($products->count())
                    <div class="pb-results-grid" data-pb-result-grid>
                        @foreach($products as $product)
                            @php $images = array_values(array_filter(explode(',', (string) $product->images))); @endphp
                            <a wire:navigate href="{{ route('product.details', ['slug' => $product->slug]) }}" class="pb-result-card">
                                <span class="pb-result-card-code">PBX / {{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</span>
                                <span class="pb-result-card-image">
                                    <img src="{{ !empty($images[0]) ? asset('assets/images/products/' . $images[0]) : asset('assets/images/design/no-image.jpg') }}" alt="{{ $product->title }}" loading="lazy">
                                </span>
                                <span class="pb-result-card-copy">
                                    <small>{{ $product->SKU ? 'АРТ. ' . $product->SKU : 'PANDBOX.KZ' }}</small>
                                    <strong>{{ $product->title }}</strong>
                                </span>
                                <span class="pb-result-card-bottom">
                                    <span>
                                        @if($product->sale_price)<del>{{ number_format($product->price, 0, '.', ' ') }} ₸</del>@endif
                                        <b>{{ number_format($product->sale_price ?: $product->price, 0, '.', ' ') }} ₸</b>
                                    </span>
                                    <i>↗</i>
                                </span>
                                @if($product->remark === 'sale' || $product->sale_price)<em>SALE</em>@elseif($product->is_new)<em>NEW</em>@elseif($product->remark === 'hit')<em>HIT</em>@endif
                            </a>
                        @endforeach
                    </div>
                    <div class="pb-results-pagination">{{ $products->links('pagination-links') }}</div>
                @else
                    <div class="pb-results-empty" data-pb-result-block><span>⌖</span><h2>Товары не найдены</h2><p>Сбросьте фильтры или попробуйте изменить поисковый запрос.</p><button type="button" wire:click="resetFilters">Сбросить фильтры</button></div>
                @endif
            </main>
        </div>
    </div>

    <style>
        .pb-results{min-height:70vh;color:#17211c;background:#f4f6f5}.pb-results-hero{position:relative;overflow:hidden;padding:30px 0 34px;color:#fff;background:linear-gradient(112deg,#101713,#17251e)}.pb-results-hero:after{content:'';position:absolute;inset:0;opacity:.13;background-image:radial-gradient(circle,rgba(255,255,255,.8) 0 1px,transparent 1.3px);background-size:22px 22px;mask-image:linear-gradient(90deg,#000,transparent 82%)}.pb-results-hero .container{position:relative;z-index:1}.pb-results-crumbs{display:flex;align-items:center;gap:10px;margin-bottom:25px;color:#8da298;font-size:11px}.pb-results-crumbs a{color:#39da98;text-decoration:none}.pb-results-heading{display:flex;align-items:flex-end;justify-content:space-between;gap:30px}.pb-results-code{display:block;margin-bottom:9px;color:#39da98;font:700 9px/1 Arial;letter-spacing:.22em}.pb-results-heading h1{margin:0;font-size:clamp(30px,4vw,52px);line-height:1}.pb-results-heading p{margin:13px 0 0;color:#aab9b1;font-size:14px}.pb-results-heading p strong{color:#fff}.pb-results-heading p b{color:#39da98}.pb-results-radar{position:relative;width:96px;height:96px;flex:0 0 96px;border:1px dashed rgba(57,218,152,.45);border-radius:50%}.pb-results-radar:before,.pb-results-radar:after{content:'';position:absolute;background:rgba(57,218,152,.35)}.pb-results-radar:before{left:50%;top:-8px;bottom:-8px;width:1px}.pb-results-radar:after{top:50%;left:-8px;right:-8px;height:1px}.pb-results-radar i{position:absolute;inset:18px;border:1px solid #39da98;border-radius:50%}.pb-results-radar b{position:absolute;left:50%;top:50%;width:6px;height:6px;border-radius:50%;background:#39da98;transform:translate(-50%,-50%)}.pb-results-radar span{position:absolute;left:50%;top:50%;width:42%;height:2px;background:linear-gradient(90deg,#39da98,transparent);transform-origin:left center;animation:pbRadar 3s linear infinite}@keyframes pbRadar{to{transform:rotate(360deg)}}
        .pb-results-container{padding-top:28px;padding-bottom:60px}.pb-results-categories{margin-bottom:24px;padding:20px;border:1px solid #dfe8e3;background:#fff}.pb-results-section-title{display:flex;align-items:center;gap:13px;margin-bottom:15px}.pb-results-section-title>span{color:#20a970;font:700 11px Arial}.pb-results-section-title small{display:block;color:#8b9891;font:700 8px Arial;letter-spacing:.18em;text-transform:uppercase}.pb-results-section-title h2{margin:3px 0 0;font-size:18px}.pb-results-category-list{display:flex;gap:8px;overflow-x:auto;padding-bottom:3px}.pb-results-category-list button{min-width:175px;display:flex;align-items:center;gap:9px;padding:9px 11px;border:1px solid #dfe8e3;color:#24322b;background:#f9fbfa;font:600 11px Arial;text-align:left;cursor:pointer;transition:.2s}.pb-results-category-list button>span:nth-child(2){flex:1}.pb-results-category-list button>b{color:#159766}.pb-results-category-list button.active,.pb-results-category-list button:hover{border-color:#20c883;color:#117a53;background:#eff9f4;transform:translateY(-2px)}.pb-results-category-image{width:36px;height:36px;flex:0 0 36px;display:grid;place-items:center;overflow:hidden;background:#edf3f0;color:#159766;font:700 8px Arial}.pb-results-category-image img{width:100%;height:100%;object-fit:cover}
        .pb-results-layout{display:grid;grid-template-columns:260px minmax(0,1fr);gap:20px}.pb-results-filter{align-self:start;border:1px solid #dfe8e3;background:#fff}.pb-filter-head{display:flex;align-items:center;justify-content:space-between;padding:17px 18px;color:#fff;background:#121b16}.pb-filter-head small{display:block;color:#39da98;font:700 8px Arial;letter-spacing:.14em;text-transform:uppercase}.pb-filter-head strong{display:block;margin-top:4px;font-size:17px}.pb-filter-head-actions{display:flex;align-items:center;gap:10px}.pb-filter-head button{padding:0;border:0;color:#8fa79b;background:none;font-size:10px;cursor:pointer}.pb-filter-head-actions button:last-child{color:#39da98}.pb-filter-head button:hover{color:#fff}.pb-filter-group{padding:18px;border-bottom:1px solid #e6ece9}.pb-filter-label{display:block;margin-bottom:12px;color:#66746d;font:700 9px Arial;letter-spacing:.14em;text-transform:uppercase}.pb-filter-price{display:flex;align-items:center;gap:6px}.pb-filter-price label{min-width:0;flex:1}.pb-filter-price small{display:block;margin-bottom:5px;color:#919c96;font-size:9px}.pb-filter-price input{width:100%;box-sizing:border-box;padding:9px 8px;border:1px solid #dce5e0;border-radius:0;outline:0;font-size:11px}.pb-filter-price input:focus{border-color:#159766}.pb-filter-price>i{margin-top:15px;color:#9aa69f;font-style:normal}.pb-filter-check{display:flex;align-items:center;gap:9px;margin:10px 0;color:#35433c;font-size:11px;cursor:pointer}.pb-filter-check input{position:absolute;opacity:0}.pb-filter-check i{width:16px;height:16px;display:grid;place-items:center;border:1px solid #cdd9d3;background:#fff}.pb-filter-check input:checked+i{border-color:#159766;background:#159766}.pb-filter-check input:checked+i:after{content:'✓';color:#fff;font-size:11px}.pb-filter-category-group{max-height:310px;overflow:auto}.pb-filter-category-option{display:block;margin:0;cursor:pointer}.pb-filter-category-option input{position:absolute;opacity:0}.pb-filter-category-option span{display:block;width:100%;padding:7px 0;color:#64726b;font-size:11px;text-align:left}.pb-filter-category-option input:checked+span,.pb-filter-category-option:hover span{color:#159766;font-weight:700}
        .pb-results-toolbar{min-height:62px;display:flex;align-items:center;justify-content:space-between;gap:16px;margin-bottom:12px;padding:10px 14px;border:1px solid #dfe8e3;background:#fff}.pb-results-toolbar>div:first-child{display:flex;align-items:center;gap:6px;color:#7a8780;font-size:11px}.pb-results-toolbar strong{color:#17211c}.pb-live-dot{width:7px;height:7px;border-radius:50%;background:#20c883;box-shadow:0 0 0 5px rgba(32,200,131,.1)}.pb-results-selects{display:flex;gap:10px}.pb-results-selects label{display:flex;align-items:center;gap:7px;color:#89958f;font-size:9px}.pb-results-selects select{padding:8px 27px 8px 9px;border:1px solid #dce5e0;border-radius:0;color:#344139;background:#fff;font-size:10px;outline:0}.pb-results-grid{display:grid;grid-template-columns:repeat(3,minmax(0,1fr));gap:10px}.pb-result-card{position:relative;min-width:0;display:flex;flex-direction:column;padding:12px;overflow:hidden;border:1px solid #dfe8e3;color:#17211c;background:#fff;text-decoration:none;transition:.25s}.pb-result-card:hover{z-index:2;border-color:#20c883;box-shadow:0 16px 32px rgba(10,72,43,.12);transform:translateY(-5px)}.pb-result-card-code{color:#20a970;font:700 8px Arial;letter-spacing:.14em}.pb-result-card-image{height:200px;display:grid;place-items:center;margin:5px 0 10px;overflow:hidden;background:#fafcfb}.pb-result-card-image img{width:100%;height:100%;object-fit:contain;transition:transform .4s}.pb-result-card:hover img{transform:scale(1.045)}.pb-result-card-copy{min-height:61px;display:flex;flex-direction:column;gap:5px;padding-top:10px;border-top:1px solid #e6ece9}.pb-result-card-copy small{color:#909b95;font:700 8px Arial;letter-spacing:.09em}.pb-result-card-copy strong{display:-webkit-box;overflow:hidden;font-size:12px;line-height:1.35;-webkit-box-orient:vertical;-webkit-line-clamp:2}.pb-result-card-bottom{display:flex;align-items:flex-end;justify-content:space-between;gap:10px;margin-top:auto;padding-top:10px}.pb-result-card-bottom>span{display:flex;flex-direction:column}.pb-result-card-bottom del{color:#a4aea9;font-size:9px}.pb-result-card-bottom b{color:#117a53;font-size:17px}.pb-result-card-bottom i{width:31px;height:31px;display:grid;place-items:center;border:1px solid #d8e5de;color:#159766;font-style:normal;transition:.2s}.pb-result-card:hover .pb-result-card-bottom i{color:#fff;background:#159766}.pb-result-card>em{position:absolute;right:10px;top:10px;padding:5px 7px;color:#fff;background:#159766;font:700 8px Arial;letter-spacing:.1em}.pb-results-pagination{margin-top:24px}.pb-results-loading{opacity:.5;pointer-events:none}.pb-results-loader{display:none!important;align-items:center;justify-content:center;gap:10px;padding:14px;color:#64726b;font-size:10px}.pb-results-loader span{width:16px;height:16px;border:2px solid #d6e3dc;border-top-color:#159766;border-radius:50%;animation:pbLoad .7s linear infinite}@keyframes pbLoad{to{transform:rotate(360deg)}}.pb-results-empty{padding:80px 20px;border:1px solid #dfe8e3;background:#fff;text-align:center}.pb-results-empty>span{display:grid;place-items:center;width:70px;height:70px;margin:0 auto 18px;border:1px dashed #20c883;border-radius:50%;color:#159766;font-size:30px}.pb-results-empty h2{margin:0;font-size:25px}.pb-results-empty p{color:#7d8983;font-size:12px}.pb-results-empty button{padding:11px 17px;border:1px solid #159766;color:#fff;background:#159766;cursor:pointer}
        /* A stale GSAP start state must never leave search products transparent. */
        .pb-results-grid .pb-result-card{opacity:1!important}
        /* Larger search controls for better desktop readability */
        .pb-results-layout{grid-template-columns:280px minmax(0,1fr)}
        .pb-filter-head{padding:19px 20px}.pb-filter-head small{font-size:10px}.pb-filter-head strong{font-size:20px}.pb-filter-head button{font-size:14px;font-weight:700}
        .pb-filter-group{padding:20px}.pb-filter-label{margin-bottom:14px;font-size:11px}.pb-filter-price small{font-size:11px}.pb-filter-price input{padding:11px 9px;font-size:13px}.pb-filter-check{gap:10px;margin:12px 0;font-size:13px}.pb-filter-check i{width:18px;height:18px}.pb-filter-category-group button{padding:8px 0;font-size:13px}
        .pb-results-toolbar{min-height:68px;padding:11px 16px}.pb-results-toolbar>div:first-child{font-size:14px}.pb-results-selects label{font-size:12px}.pb-results-selects select{padding:10px 30px 10px 11px;font-size:13px}
        .pb-results-empty h2{font-size:29px}.pb-results-empty p{font-size:15px}.pb-results-empty button{padding:13px 20px;font-size:15px}
        @media(max-width:1100px){.pb-results-layout{grid-template-columns:240px minmax(0,1fr)}.pb-results-grid{grid-template-columns:repeat(2,minmax(0,1fr))}}
        @media(max-width:760px){.pb-results-hero{padding:22px 0}.pb-results-radar{display:none}.pb-results-container{padding-top:16px}.pb-results-layout{display:block}.pb-results-filter{margin-bottom:14px}.pb-filter-category-group{display:none}.pb-results-toolbar{align-items:flex-start;flex-direction:column}.pb-results-selects{width:100%;flex-wrap:wrap}.pb-results-selects label{flex:1;flex-direction:column;align-items:flex-start}.pb-results-selects select{width:100%}.pb-results-grid{grid-template-columns:repeat(2,minmax(0,1fr));gap:6px}.pb-result-card{padding:8px}.pb-result-card-image{height:145px}.pb-result-card-bottom b{font-size:14px}.pb-result-card-bottom i{display:none}.pb-results-category-list button{min-width:155px}.pb-results-categories{padding:14px}}
        @media(max-width:420px){.pb-results-grid{grid-template-columns:1fr}.pb-result-card-image{height:210px}}
        @media(prefers-reduced-motion:reduce){.pb-results *{animation:none!important;transition:none!important}}
    </style>

    @push('scripts')
    <script data-navigate-once>
    (function(){
        var resultsAnimationFrame=0;

        function revealResultCards(root){
            var main=root.querySelector('.pb-results-main');
            var cards=Array.from(root.querySelectorAll('.pb-result-card'));
            if(main)main.classList.remove('pb-results-loading');
            if(!cards.length)return;

            if(typeof gsap==='undefined'){
                cards.forEach(function(card){
                    card.style.removeProperty('opacity');
                    card.style.removeProperty('transform');
                    card.style.removeProperty('translate');
                    card.style.removeProperty('rotate');
                    card.style.removeProperty('scale');
                });
                return;
            }

            gsap.killTweensOf(cards);
            gsap.set(cards,{clearProps:'opacity,transform,translate,rotate,scale'});
            gsap.fromTo(cards,
                {y:16},
                {y:0,duration:.32,stagger:.025,ease:'power3.out',overwrite:true,clearProps:'opacity,transform,translate,rotate,scale'}
            );
        }

        function animateResults(){
            var root=document.querySelector('[data-pb-results]');
            if(!root)return;
            var firstRun=!root.hasAttribute('data-pb-ready');
            root.setAttribute('data-pb-ready','1');
            if(firstRun&&typeof gsap!=='undefined'){
                gsap.from('.pb-results-heading>*',{y:20,opacity:0,duration:.55,stagger:.09,ease:'power3.out'});
                gsap.from(root.querySelectorAll('[data-pb-result-block]'),{y:18,opacity:0,duration:.45,stagger:.08,ease:'power3.out',delay:.15});
            }
            revealResultCards(root);
        }

        function queueResultsAnimation(){
            if(resultsAnimationFrame)cancelAnimationFrame(resultsAnimationFrame);
            resultsAnimationFrame=requestAnimationFrame(function(){
                resultsAnimationFrame=requestAnimationFrame(function(){
                    resultsAnimationFrame=0;
                    animateResults();
                });
            });
        }

        function registerResultsLivewireHook(){
            if(!window.Livewire||window.__pbResultsLivewireHooked)return;
            window.__pbResultsLivewireHooked=true;
            Livewire.hook('morph.updated',queueResultsAnimation);
            Livewire.hook('morph.added',queueResultsAnimation);
        }

        if(!window.__pbResultsBooted){
            window.__pbResultsBooted=true;
            document.addEventListener('livewire:navigated',queueResultsAnimation);
            document.addEventListener('livewire:init',registerResultsLivewireHook,{once:true});
        }
        registerResultsLivewireHook();
        animateResults();
    })();
    </script>
    @endpush
</div>
