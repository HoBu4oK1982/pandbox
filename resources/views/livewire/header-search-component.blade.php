<div id="mobileSearchForm" class="pb-search-shell {{ $mobileMode ? 'pb-search-mobile-mode' : '' }} {{ mb_strlen(trim((string) $query)) >= 2 ? 'active' : '' }}" wire:ignore.self data-pb-search-shell>
    <form class="header__middle__search pb-search-form" id="menuSearchDesktop" action="{{ route('product.search') }}">
        <span class="pb-search-icon" aria-hidden="true">
            <svg viewBox="0 0 24 24"><circle cx="11" cy="11" r="7"/><path d="m16.2 16.2 4 4"/></svg>
        </span>

        <input
            class="headerSearchInput pb-search-input"
            required
            type="text"
            name="search"
            value="{{ $search }}"
            placeholder="Найти товар, категорию или артикул..."
            wire:model.live.debounce.250ms="query"
            autocomplete="off"
            aria-label="Поиск по каталогу"
            aria-expanded="{{ mb_strlen(trim((string) $query)) >= 2 ? 'true' : 'false' }}"
            wire:keydown.escape="preset"
        />

        <span class="pb-search-status" wire:loading.delay wire:target="query" aria-hidden="true"></span>

        @if(!empty($query))
            <button class="pb-search-clear" type="button" wire:click="preset" aria-label="Очистить поиск">×</button>
        @endif

        @if($mobileMode)
            <button class="pb-search-submit" type="submit">Найти</button>
        @endif

        @if(mb_strlen(trim((string) $query)) >= 2)
            <button type="button" class="pb-search-overlay" wire:click="preset" aria-label="Закрыть поиск"></button>

            <div class="pb-search-panel" data-pb-search-panel>
                <div class="pb-search-panel-head">
                    <div>
                        <span>PBX / SMART SEARCH</span>
                        <strong>Результаты для «{{ $query }}»</strong>
                    </div>
                    <span class="pb-search-found">{{ count($products) + count($categories) }} найдено</span>
                </div>

                @if(!empty($categories))
                    <div class="pb-search-section">
                        <span class="pb-search-label">Категории</span>
                        <div class="pb-search-categories">
                            @foreach($categories as $category)
                                <a wire:navigate href="{{ route('category', ['slug' => $category['slug']]) }}" class="pb-search-category">
                                    <span class="pb-search-target">⌖</span>
                                    <span>{{ $category['title'] }}</span>
                                    <svg viewBox="0 0 24 24"><path d="M5 12h13M13 6l6 6-6 6"/></svg>
                                </a>
                            @endforeach
                        </div>
                    </div>
                @endif

                @if(!empty($products))
                    <div class="pb-search-section pb-search-products-section">
                        <span class="pb-search-label">Товары</span>
                        <div class="pb-search-products">
                            @foreach($products as $product)
                                @php
                                    $images = array_values(array_filter(explode(',', (string) ($product['images'] ?? ''))));
                                    $image = $images[0] ?? null;
                                    $price = $product['sale_price'] ?? $product['price'];
                                @endphp
                                <a wire:navigate href="{{ route('product.details', ['slug' => $product['slug']]) }}" class="pb-search-product">
                                    <span class="pb-search-product-image">
                                        @if($image)
                                            <img src="{{ asset('assets/images/products/' . $image) }}" alt="" loading="lazy">
                                        @else
                                            <span>PBX</span>
                                        @endif
                                    </span>
                                    <span class="pb-search-product-copy">
                                        <strong>{{ $product['title'] }}</strong>
                                        <small>{{ !empty($product['SKU']) ? 'АРТ. ' . $product['SKU'] : 'В наличии' }}</small>
                                    </span>
                                    <b>{{ number_format((float) $price, 0, '.', ' ') }} ₸</b>
                                    <svg class="pb-search-product-arrow" viewBox="0 0 24 24"><path d="M5 12h13M13 6l6 6-6 6"/></svg>
                                </a>
                            @endforeach
                        </div>
                    </div>
                @endif

                @if(empty($products) && empty($categories))
                    <div class="pb-search-empty">
                        <span class="pb-search-empty-radar"><i></i></span>
                        <div><strong>Совпадений не найдено</strong><p>Попробуйте изменить запрос или ввести артикул товара.</p></div>
                    </div>
                @else
                    <a wire:navigate href="{{ route('product.search', ['search' => $query]) }}" class="pb-search-all">
                        <span>Показать все результаты</span>
                        <svg viewBox="0 0 24 24"><path d="M5 12h13M13 6l6 6-6 6"/></svg>
                    </a>
                @endif
            </div>
        @endif
    </form>

    @once
        <style>
            .pb-search-shell,.pb-search-form{position:relative}.pb-search-form{z-index:91010}.pb-search-icon{position:absolute;z-index:3;left:15px;top:calc(50% + 3px);display:flex;color:#159766;transform:translateY(-50%)}.pb-search-icon svg{width:20px;height:20px;fill:none;stroke:currentColor;stroke-width:2;stroke-linecap:round}.pb-search-input{padding-left:45px!important;padding-right:52px!important}.pb-search-product-arrow,.pb-search-category svg,.pb-search-all svg{width:16px;height:16px;fill:none;stroke:currentColor;stroke-width:2;stroke-linecap:round;stroke-linejoin:round}.pb-search-clear{position:absolute;z-index:5;right:14px;top:50%;width:27px;height:27px;padding:0;border:0;border-radius:50%;color:#89938e;background:#edf2ef;font-size:20px;line-height:25px;cursor:pointer;transform:translateY(-50%)}.pb-search-status{position:absolute;z-index:6;right:20px;top:50%;width:15px;height:15px;border:2px solid #d3ddd8;border-top-color:#159766;border-radius:50%;transform:translateY(-50%);animation:pbSearchSpin .7s linear infinite}@keyframes pbSearchSpin{to{transform:translateY(-50%) rotate(360deg)}}
            .pb-search-overlay{position:fixed;z-index:-1;inset:0;width:100%;height:100%;border:0;background:rgba(7,15,11,.48);backdrop-filter:blur(5px);-webkit-backdrop-filter:blur(5px);cursor:default}.pb-search-panel{position:absolute;z-index:2;top:calc(100% + 12px);left:0;width:min(720px,calc(100vw - 32px));max-height:min(72vh,650px);overflow:auto;border:1px solid rgba(21,151,102,.22);border-top:3px solid #20c883;border-radius:0 0 18px 18px;background:#f7faf8;box-shadow:0 30px 70px rgba(5,25,16,.3);text-align:left;transform-origin:top center}.pb-search-panel::-webkit-scrollbar{width:5px}.pb-search-panel::-webkit-scrollbar-thumb{border-radius:5px;background:#a8c7b8}.pb-search-panel-head{position:sticky;z-index:3;top:0;display:flex;align-items:center;justify-content:space-between;gap:20px;padding:17px 20px;color:#fff;background:linear-gradient(100deg,#111a15,#17271f)}.pb-search-panel-head>div{display:flex;flex-direction:column;gap:4px}.pb-search-panel-head span{color:#39da98;font:700 8px/1 Arial,sans-serif;letter-spacing:.18em}.pb-search-panel-head strong{font-size:14px}.pb-search-found{padding:6px 9px;border:1px solid rgba(57,218,152,.24);border-radius:999px;background:rgba(57,218,152,.08);white-space:nowrap}.pb-search-section{padding:16px 18px 2px}.pb-search-label{display:block;margin:0 0 9px;color:#7d8b84;font:700 9px/1 Arial,sans-serif;letter-spacing:.18em;text-transform:uppercase}.pb-search-categories{display:flex;flex-wrap:wrap;gap:7px}.pb-search-category{display:inline-flex;align-items:center;gap:7px;padding:9px 11px;border:1px solid #dce8e2;border-radius:8px;color:#26352d;background:#fff;font-size:11px;font-weight:700;text-decoration:none;transition:.2s}.pb-search-category:hover{border-color:#20c883;color:#117a53;transform:translateY(-2px)}.pb-search-category svg{margin-left:2px}.pb-search-target{color:#20a970;font-size:15px}.pb-search-products{display:grid;grid-template-columns:1fr 1fr;gap:7px}.pb-search-product{position:relative;display:grid;grid-template-columns:54px 1fr auto;align-items:center;gap:10px;min-width:0;padding:8px 34px 8px 8px;overflow:hidden;border:1px solid #e0e9e4;border-radius:10px;color:#17211c;background:#fff;text-decoration:none;transition:border-color .2s,box-shadow .2s,transform .2s}.pb-search-product:hover{border-color:#20c883;box-shadow:0 8px 20px rgba(16,85,52,.1);transform:translateY(-2px)}.pb-search-product-image{width:54px;height:54px;display:grid;place-items:center;overflow:hidden;border-radius:7px;background:#f2f5f3;color:#159766;font:700 9px Arial}.pb-search-product-image img{width:100%;height:100%;object-fit:contain}.pb-search-product-copy{min-width:0;display:flex;flex-direction:column;gap:5px}.pb-search-product-copy strong{display:-webkit-box;overflow:hidden;color:#1d2923;font-size:11px;line-height:1.25;-webkit-box-orient:vertical;-webkit-line-clamp:2}.pb-search-product-copy small{overflow:hidden;color:#8b9791;font:700 8px Arial;letter-spacing:.08em;text-overflow:ellipsis;white-space:nowrap}.pb-search-product>b{color:#117a53;font-size:12px;white-space:nowrap}.pb-search-product-arrow{position:absolute;right:9px;top:50%;color:#a5b6ad;transform:translateY(-50%)}.pb-search-all{display:flex;align-items:center;justify-content:center;gap:10px;margin:14px 18px 18px;padding:12px;border-radius:9px;color:#fff;background:#159766;font-size:11px;font-weight:700;text-decoration:none;transition:.2s}.pb-search-all:hover{background:#117a53;box-shadow:0 8px 20px rgba(17,122,83,.22)}.pb-search-empty{display:flex;align-items:center;justify-content:center;gap:18px;padding:34px 20px}.pb-search-empty-radar{position:relative;width:54px;height:54px;border:1px dashed #8bc8ac;border-radius:50%}.pb-search-empty-radar:before,.pb-search-empty-radar:after{content:'';position:absolute;background:#20c883}.pb-search-empty-radar:before{left:50%;top:6px;bottom:6px;width:1px}.pb-search-empty-radar:after{top:50%;left:6px;right:6px;height:1px}.pb-search-empty-radar i{position:absolute;inset:10px;border:2px solid #159766;border-radius:50%;animation:pbSearchPulse 1.5s ease-in-out infinite}@keyframes pbSearchPulse{50%{transform:scale(.72);opacity:.35}}.pb-search-empty strong{color:#26352d;font-size:14px}.pb-search-empty p{margin:5px 0 0;color:#849089;font-size:11px}
            @media(max-width:760px){.pb-search-input{padding-right:52px!important}.pb-search-clear{right:14px}.pb-search-status{right:20px}.pb-search-panel{position:fixed;top:78px;left:12px;right:12px;width:auto;max-height:calc(100vh - 96px)}.pb-search-products{grid-template-columns:1fr}.pb-search-panel-head{padding:14px}.pb-search-section{padding-inline:12px}.pb-search-all{margin-inline:12px}}
            .pb-search-clear{top:calc(50% + 3px)}
            .pb-search-submit{display:none}
            .pb-search-shell.active,.pb-search-shell.active .pb-search-form{z-index:92000!important}.pb-search-shell.active .pb-search-panel{z-index:92002!important}.pb-search-shell.active .pb-search-overlay{z-index:-1!important}
            @media(prefers-reduced-motion:reduce){.pb-search-panel *{animation:none!important;transition:none!important}}
        </style>
    @endonce

    @push('scripts')
        <script data-navigate-once>
        (function(){
            function animateSearchPanel(){
                var panel=document.querySelector('[data-pb-search-panel]:not([data-pb-animated])');
                if(!panel||typeof gsap==='undefined')return;
                panel.setAttribute('data-pb-animated','1');
                var items=panel.querySelectorAll('.pb-search-category,.pb-search-product,.pb-search-empty,.pb-search-all');
                gsap.fromTo(panel,{opacity:0,y:-12,scaleY:.92},{opacity:1,y:0,scaleY:1,duration:.32,ease:'power3.out'});
                gsap.fromTo(items,{opacity:0,y:10},{opacity:1,y:0,duration:.3,stagger:.035,ease:'power2.out',delay:.08});
            }
            function registerSearchHook(){
                if(!window.Livewire||window.__pbSmartSearchHooked)return;
                window.__pbSmartSearchHooked=true;
                Livewire.hook('morph.updated',function(payload){
                    var el=payload&&payload.el;
                    if(el&&(el.matches?.('.pb-search-shell')||el.querySelector?.('[data-pb-search-panel]'))){
                        requestAnimationFrame(animateSearchPanel);
                    }
                });
            }
            if(!window.__pbSmartSearchBooted){
                window.__pbSmartSearchBooted=true;
                document.addEventListener('livewire:navigated',animateSearchPanel);
                document.addEventListener('livewire:init',registerSearchHook,{once:true});
            }
            registerSearchHook();
            animateSearchPanel();
        })();
        </script>
    @endpush
</div>
