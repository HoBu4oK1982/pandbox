<div class="pb-site-header" data-pb-site-header>
{{-- Отдельная мобильная шапка. Десктопная разметка ниже не переставляется и не изменяется. --}}
<div class="pb-mobile-header" data-pb-mobile-header>
    <div class="pbm-primary">
        <button type="button" class="pbm-icon-button pbm-catalog-button" data-pbm-open="catalog" aria-label="Открыть каталог" aria-expanded="false">
            <span class="pbm-hamburger"><i></i></span>
        </button>

        <a wire:navigate href="/" class="pbm-logo" aria-label="Pandbox.kz — главная">
            <img src="{{ asset('assets/images/design/logo.png') }}" alt="Pandbox.kz">
        </a>

        <span class="pbm-primary-space"></span>

        <button type="button" class="pbm-icon-button pbm-search-button" data-pbm-search-open aria-label="Открыть поиск" aria-expanded="false">
            <svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="10.5" cy="10.5" r="6.5"/><path d="m15.5 15.5 5 5"/></svg>
        </button>

        @php
            $pbMobileAccountRoute = route('register');
            $pbMobileAccountLabel = 'Вход';
            if (auth()->check()) {
                $pbMobileAccountRoute = auth()->user()->hasRole('admin')
                    ? route('admin.dashboard')
                    : route('user.dashboard');
                $pbMobileAccountLabel = 'Кабинет';
            }
        @endphp
        <a wire:navigate href="{{ $pbMobileAccountRoute }}" class="pbm-account" aria-label="{{ $pbMobileAccountLabel }}">
            <svg viewBox="0 0 28 28" aria-hidden="true"><circle cx="14" cy="9" r="4.5"/><path d="M5.5 25c.8-6 3.7-9 8.5-9s7.7 3 8.5 9M3 7V3h4M21 3h4v4"/></svg>
            <span>{{ $pbMobileAccountLabel }}</span>
        </a>

        <button type="button" class="pbm-menu-button" data-pbm-open="menu" aria-label="Открыть меню" aria-expanded="false">
            <span>Меню</span><i></i>
        </button>
    </div>

    <div class="pbm-brand-strip">
        <span class="pbm-reticle pbm-reticle-left" aria-hidden="true"></span>
        <strong>Страйкбольный магазин №1 в Казахстане</strong>
        <button type="button" class="pbm-callback" data-pb-callback>
            <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M6.5 3H4a1 1 0 0 0-1 1 17 17 0 0 0 17 17 1 1 0 0 0 1-1v-2.5a1 1 0 0 0-.8-1l-4-1a1 1 0 0 0-1 .3l-.9 1.1a14 14 0 0 1-7.2-7.2l1.1-.9a1 1 0 0 0 .3-1l-1-4A1 1 0 0 0 6.5 3Z"/></svg>
            <span>Перезвоните мне</span>
            <i></i>
        </button>
        <span class="pbm-reticle pbm-reticle-right" aria-hidden="true"></span>
    </div>

    <div class="pbm-search-layer" data-pbm-search-layer aria-hidden="true">
        <button type="button" class="pbm-layer-backdrop" data-pbm-close aria-label="Закрыть поиск"></button>
        <div class="pbm-search-live">
            @livewire('header-search-component', ['mobileMode' => true], key('mobile-header-search'))
        </div>
    </div>

    <div class="pbm-drawer-layer" data-pbm-drawer-layer aria-hidden="true">
        <button type="button" class="pbm-layer-backdrop" data-pbm-close aria-label="Закрыть меню"></button>

        <aside class="pbm-drawer pbm-catalog-drawer" data-pbm-drawer="catalog" aria-label="Каталог товаров">
            <div class="pbm-drawer-head">
                <div><small>PBX / CATALOG</small><strong>Каталог товаров</strong></div>
                <button type="button" data-pbm-close aria-label="Закрыть каталог"><i></i></button>
            </div>
            <div class="pbm-drawer-body pbm-category-list">
                <a wire:navigate href="{{ route('shop') }}" class="pbm-all-products">
                    <span>Все товары</span><b>{{ count($categories) < 10 ? '0' : '' }}{{ count($categories) }}</b>
                </a>
                @foreach($categories as $category)
                    <div class="pbm-category-item">
                        <div class="pbm-category-row">
                            <a wire:navigate href="{{ route('category', ['slug' => $category->slug]) }}">
                                <span class="pbm-category-number">{{ str_pad((string) $loop->iteration, 2, '0', STR_PAD_LEFT) }}</span>
                                <span>{{ $category->title }}</span>
                            </a>
                            @if($category->children->count())
                                <button type="button" data-pbm-category-toggle aria-label="Показать подкатегории" aria-expanded="false"><i></i></button>
                            @endif
                        </div>
                        @if($category->children->count())
                            <div class="pbm-subcategories">
                                @foreach($category->children as $child)
                                    <a wire:navigate href="{{ route('subcategory', ['slug' => $category->slug, 'subcategory_slug' => $child->slug]) }}">{{ $child->title }}</a>
                                @endforeach
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
        </aside>

        <aside class="pbm-drawer pbm-menu-drawer" data-pbm-drawer="menu" aria-label="Главное меню">
            <div class="pbm-drawer-head">
                <div><small>PBX / NAVIGATION</small><strong>Меню</strong></div>
                <button type="button" data-pbm-close aria-label="Закрыть меню"><i></i></button>
            </div>
            <div class="pbm-drawer-body">
                <nav class="pbm-main-links">
                    <a wire:navigate href="{{ route('shop') }}"><span>Магазин</span><i>01</i></a>
                    <a wire:navigate href="{{ route('sales') }}" class="pbm-link-sale"><span class="pbm-link-label"><svg class="pbm-link-icon" viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="12" r="5"/><path d="M12 2v5M12 17v5M2 12h5M17 12h5M12 10v4M10 12h4"/></svg>Акции</span><i>02</i></a>
                    <a wire:navigate href="{{ route('news') }}" class="pbm-link-new"><span class="pbm-link-label"><svg class="pbm-link-icon" viewBox="0 0 24 24" aria-hidden="true"><path d="M5 3h14v18H5zM8 7h8M8 11h8M8 15h5"/><path d="m16 15 1.5 1.5L20 14"/></svg>Новинки</span><i>03</i></a>
                    <a wire:navigate href="{{ route('hits') }}" class="pbm-link-hit"><span class="pbm-link-label"><svg class="pbm-link-icon" viewBox="0 0 24 24" aria-hidden="true"><path d="M12 3 9.5 8 4 9l4 4-1 6 5-2.7L17 19l-1-6 4-4-5.5-1Z"/></svg>Хиты продаж</span><i>04</i></a>
                    <a wire:navigate href="{{ route('articles') }}"><span>Новости</span><i>05</i></a>
                    <a wire:navigate href="{{ route('delivery') }}"><span>Доставка и оплата</span><i>06</i></a>
                    <a wire:navigate href="{{ route('about') }}"><span>О компании</span><i>07</i></a>
                    <a wire:navigate href="{{ route('contacts') }}"><span>Контакты</span><i>08</i></a>
                </nav>
                <div class="pbm-menu-contact">
                    <small>PBX / СВЯЗЬ</small>
                    <a href="tel:+77773880866">+7 (777) 388 08 66</a>
                    <a href="https://wa.me/77072184465" target="_blank" rel="noopener">WhatsApp: +7 (707) 218 44 65</a>
                </div>
            </div>
        </aside>
    </div>

    <nav class="pbm-bottom-dock" aria-label="Быстрые действия">
        @livewire('cart-count-component', ['variant' => 'mobile'], key('mobile-cart-count'))
        @livewire('wishlist-count-component', ['variant' => 'mobile'], key('mobile-wishlist-count'))
        <button type="button" class="pbm-dock-link pbm-dock-callback" data-pb-callback>
            <span class="pbm-dock-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M21 15a4 4 0 0 1-4 4H8l-5 3V7a4 4 0 0 1 4-4h10a4 4 0 0 1 4 4Z"/><path d="M8 9h8M8 13h5"/></svg></span>
            <span>Заявка</span>
        </button>
        <a href="tel:+77773880866" class="pbm-dock-link">
            <span class="pbm-dock-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M6.5 3H4a1 1 0 0 0-1 1 17 17 0 0 0 17 17 1 1 0 0 0 1-1v-2.5a1 1 0 0 0-.8-1l-4-1a1 1 0 0 0-1 .3l-.9 1.1a14 14 0 0 1-7.2-7.2l1.1-.9a1 1 0 0 0 .3-1l-1-4A1 1 0 0 0 6.5 3Z"/></svg></span>
            <span>Позвонить</span>
        </a>
        <a href="https://wa.me/77072184465" target="_blank" rel="noopener" class="pbm-dock-link pbm-dock-whatsapp">
            <span class="pbm-dock-icon">@include('partials.icons.whatsapp')</span>
            <span>WhatsApp</span>
        </a>
    </nav>
</div>
<header>
    <div class="headerTopWrap">
        <div class="container">
            <div class="headerTop">
                <div class="headerTopLeft">
                    <nav>
                        <ul id="mobileNavAkcii">
                            <li><a wire:navigate href="{{route('sales')}}"><svg class="pb-top-icon" viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="12" r="5"/><path d="M12 2v5M12 17v5M2 12h5M17 12h5M12 10v4M10 12h4"/></svg><span>Акции</span></a></li>
                            <li><a wire:navigate href="{{route('news')}}"><svg class="pb-top-icon" viewBox="0 0 24 24" aria-hidden="true"><path d="M5 3h14v18H5zM8 7h8M8 11h8M8 15h5"/><path d="m16 15 1.5 1.5L20 14"/></svg><span>Новинки</span></a></li>
                            <li><a wire:navigate href="{{route('hits')}}"><svg class="pb-top-icon" viewBox="0 0 24 24" aria-hidden="true"><path d="M12 3 9.5 8 4 9l4 4-1 6 5-2.7L17 19l-1-6 4-4-5.5-1Z"/></svg><span>Хиты продаж</span></a></li>
                        </ul>
                    </nav>
                </div>
                <div class="headerTopRight">
                    <div class="header__phones">
                        <a href="tel:+77773880866" id="headerMobilePhone"><svg class="pb-top-icon" viewBox="0 0 24 24" aria-hidden="true"><path d="M6.5 3H4a1 1 0 0 0-1 1 17 17 0 0 0 17 17 1 1 0 0 0 1-1v-2.5a1 1 0 0 0-.8-1l-4-1a1 1 0 0 0-1 .3l-.9 1.1a14 14 0 0 1-7.2-7.2l1.1-.9a1 1 0 0 0 .3-1l-1-4A1 1 0 0 0 6.5 3Z"/></svg><span>+7 (777) 388 08 66</span></a>
                        <a href="tel:+77072184465" id="headerMobilePhone"><svg class="pb-top-icon" viewBox="0 0 24 24" aria-hidden="true"><path d="M6.5 3H4a1 1 0 0 0-1 1 17 17 0 0 0 17 17 1 1 0 0 0 1-1v-2.5a1 1 0 0 0-.8-1l-4-1a1 1 0 0 0-1 .3l-.9 1.1a14 14 0 0 1-7.2-7.2l1.1-.9a1 1 0 0 0 .3-1l-1-4A1 1 0 0 0 6.5 3Z"/></svg><span>+7 (707) 218 44 65</span></a>
                    </div>
                    <a href="mailto:info@pandbox.kz" class="header__email" id="headerMobileEmail"><svg class="pb-top-icon" viewBox="0 0 24 24" aria-hidden="true"><path d="M3 5h18v14H3z"/><path d="m4 7 8 6 8-6"/></svg><span>info@pandbox.kz</span></a>
                    <div class="header__social" id="headerMobileSocial">
                        <a href="https://www.instagram.com/pandbox.kz" target="_blank">
                            <svg viewBox="0 0 24 24" aria-label="Instagram"><rect x="3" y="3" width="18" height="18" rx="4"/><circle cx="12" cy="12" r="4"/><circle cx="17.5" cy="6.5" r="1"/></svg>
                        </a>
                        <a href="https://t.me/pandbox_oficial" target="_blank">
                            <svg viewBox="0 0 24 24" aria-label="Telegram"><path d="m21 3-4 18-6-5-4 3 1-6 9-7-11 6-4-2z"/><path d="m8 13 9-7"/></svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="header__middle__wrap">
        <div class="container">
            <div class="header__middle">
                <div class="header__middle__logo__wrap">
                    <a wire:navigate href="/">
                        <img src="{{asset('assets/images/design/logo.png')}}" alt="Страйкбольный магазин №1 в Казахстане" class="headerLogo" />
                    </a>
                    <p>Pandbox.kz</p>
                </div>
                <div class="header__middle__search__wrap">
                    <div class="header__middle__search__title">Страйкбольный магазин №1 в Казахстане</div>
                    @livewire('header-search-component')
                </div>
                <div class="header__middle__right__top">
                    <div class="header__middle__right__wrap">
                        <div class="header__middle__right__login">
                            <div class="header__middle__right__loginA">
                                @if (Route::has('login'))
                                    @auth
                                        @if (Auth::user()->hasRole('admin'))
                                            <a wire:navigate href="{{route('admin.dashboard')}}" class="pb-header-action"><svg class="pb-header-action-icon" viewBox="0 0 32 32" aria-hidden="true"><path d="M10 11.2a6 6 0 1 1 12 0 6 6 0 0 1-12 0Z"/><path d="M5.5 27c1.1-6.4 4.6-9.5 10.5-9.5s9.4 3.1 10.5 9.5"/><path d="M3.5 8V3.5H8M24 3.5h4.5V8M3.5 24v4.5H8M24 28.5h4.5V24"/></svg><span class="pb-header-action-label">Панель управления</span></a>
                                        @elseif (Auth::user()->hasRole('user'))
                                            <a wire:navigate href="{{route('user.dashboard')}}" class="pb-header-action"><svg class="pb-header-action-icon" viewBox="0 0 32 32" aria-hidden="true"><path d="M10 11.2a6 6 0 1 1 12 0 6 6 0 0 1-12 0Z"/><path d="M5.5 27c1.1-6.4 4.6-9.5 10.5-9.5s9.4 3.1 10.5 9.5"/><path d="M3.5 8V3.5H8M24 3.5h4.5V8M3.5 24v4.5H8M24 28.5h4.5V24"/></svg><span class="pb-header-action-label">Личный кабинет</span></a>
                                        @endif
                                    @else
                                        <a wire:navigate href="{{route('register')}}" class="pb-header-action"><svg class="pb-header-action-icon" viewBox="0 0 32 32" aria-hidden="true"><path d="M10 11.2a6 6 0 1 1 12 0 6 6 0 0 1-12 0Z"/><path d="M5.5 27c1.1-6.4 4.6-9.5 10.5-9.5s9.4 3.1 10.5 9.5"/><path d="M3.5 8V3.5H8M24 3.5h4.5V8M3.5 24v4.5H8M24 28.5h4.5V24"/></svg><span class="pb-header-action-label">Вход / Регистрация</span></a>
                                    @endif
                                @endif
                            </div>
                        </div>
                        @livewire('cart-count-component')
                        @livewire('wishlist-count-component')
                    </div>
                    <div class="header_middle_right_bottom_wrap">
                        <button type="button" class="header__btn pb-header-callback pb-animated-action" data-pb-callback>
                            <svg class="pb-action-phone" viewBox="0 0 24 24" aria-hidden="true"><path d="M6.6 10.8a15 15 0 0 0 6.6 6.6l2.2-2.2a1 1 0 0 1 1-.2 11 11 0 0 0 3.6.5 1 1 0 0 1 1 1V20a1 1 0 0 1-1 1A17 17 0 0 1 3 4a1 1 0 0 1 1-1h3.5a1 1 0 0 1 1 1 11 11 0 0 0 .5 3.6 1 1 0 0 1-.2 1Z"/></svg>
                            <span>Перезвоните мне</span>
                            <svg class="pb-action-arrow" viewBox="0 0 24 24" aria-hidden="true"><path d="M5 12h13M13 6l6 6-6 6"/></svg>
                            <i class="pb-action-fill"></i>
                        </button>
                    </div>
                </div>
                <img src="{{asset('assets/images/design/bullet1.png')}}" alt="" class="header__bullet1">
                <img src="{{asset('assets/images/design/bullet2.png')}}" alt="" class="header__bullet2">
                <img src="{{asset('assets/images/design/bullet3.png')}}" alt="" class="header__bullet3">
            </div>
        </div>
    </div>

    <div class="header__bottom__nav__wrap">
        <div class="container">
            <div class="header__bottom__nav">
                <div class="header__bottom__catalog">
                    {{-- Кнопка открытия мегаменю --}}
                    <div class="header__burger__btn" id="catalogBtn" role="button" tabindex="0" aria-expanded="false" aria-controls="megaMenu">
                        <div class="header__burger"><span></span></div>
                        <p class="header__burger__p">Каталог товаров</p>
                    </div>

                </div>
                <nav>
                    <ul id="mobileNavShop">
                        <li class="pb-nav-hover-fill" aria-hidden="true"></li>
                        <li><a wire:navigate href="{{route('shop')}}" @class(['pb-nav-current' => request()->routeIs('shop', 'product.details', 'product.search', 'category', 'subcategory', 'subsubcategory')]) @if(request()->routeIs('shop', 'product.details', 'product.search', 'category', 'subcategory', 'subsubcategory')) aria-current="page" @endif><svg class="pb-bottom-nav-icon" viewBox="0 0 24 24" aria-hidden="true"><path d="M4 9h16l-1 12H5Z"/><path d="m5 9 2-5h10l2 5M9 13v4M15 13v4"/></svg><span>Магазин</span></a></li>
                        <li><a wire:navigate href="{{route('articles')}}" @class(['pb-nav-current' => request()->routeIs('articles', 'article')]) @if(request()->routeIs('articles', 'article')) aria-current="page" @endif><svg class="pb-bottom-nav-icon" viewBox="0 0 24 24" aria-hidden="true"><path d="M5 3h14v18H5zM8 7h8M8 11h8M8 15h5"/></svg><span>Новости</span></a></li>
                        <li><a wire:navigate href="{{route('delivery')}}" @class(['pb-nav-current' => request()->routeIs('delivery')]) @if(request()->routeIs('delivery')) aria-current="page" @endif><svg class="pb-bottom-nav-icon" viewBox="0 0 24 24" aria-hidden="true"><path d="M3 5h11v11H3zM14 9h4l3 4v3h-7z"/><circle cx="7" cy="19" r="2"/><circle cx="18" cy="19" r="2"/></svg><span>Доставка и оплата</span></a></li>
                        <li><a wire:navigate href="{{route('about')}}" @class(['pb-nav-current' => request()->routeIs('about')]) @if(request()->routeIs('about')) aria-current="page" @endif><svg class="pb-bottom-nav-icon" viewBox="0 0 24 24" aria-hidden="true"><path d="M4 21V7l8-4 8 4v14M8 10h2M14 10h2M8 14h2M14 14h2M10 21v-3h4v3"/></svg><span>О компании</span></a></li>
                        <li><a wire:navigate href="{{route('contacts')}}" @class(['pb-nav-current' => request()->routeIs('contacts')]) @if(request()->routeIs('contacts')) aria-current="page" @endif><svg class="pb-bottom-nav-icon" viewBox="0 0 24 24" aria-hidden="true"><path d="M20 10c0 5-8 11-8 11S4 15 4 10a8 8 0 1 1 16 0Z"/><circle cx="12" cy="10" r="2.5"/></svg><span>Контакты</span></a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>

    <div id="overlayMy"></div>
    {{-- ══════════════════════════════════════════════════════
         GSAP-МЕГАМЕНЮ КАТАЛОГА
         ══════════════════════════════════════════════════════ --}}
    <div class="megamenu" id="megaMenu" aria-hidden="true">
        <div class="megamenu-topbar">
            <div class="megamenu-heading">
                <span>PBX / CATALOG</span>
                <strong>Каталог снаряжения</strong>
            </div>
            <div class="megamenu-quick">
                <a wire:navigate href="{{ route('shop') }}" class="megamenu-quick-link">Все товары</a>
                <a wire:navigate href="{{ route('sales') }}" class="megamenu-quick-link">Акции</a>
                <a wire:navigate href="{{ route('news') }}" class="megamenu-quick-link">Новинки</a>
                <a wire:navigate href="{{ route('hits') }}" class="megamenu-quick-link">Хиты продаж</a>
            </div>
            <button type="button" class="megamenu-close" id="megaMenuClose" aria-label="Закрыть каталог">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M6 6l12 12M18 6L6 18"/></svg>
            </button>
        </div>
        <div class="megamenu-body">
            <div class="megamenu-cats" id="megaCats">
                <div class="megamenu-cats-title">
                    <span>Направления</span>
                    <b>{{ count($categories) }}</b>
                </div>
                @forelse ($categories as $idx => $category)
                    <div class="megamenu-cat {{ $idx === 0 ? 'active' : '' }}" data-idx="{{ $idx }}">
                        <span class="megamenu-cat-icon">
                            @if ($category->image)
                                <img src="{{asset('assets/images/categories')}}/{{$category->image}}" alt="{{$category->title}}" onerror="this.style.display='none'">
                            @else
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="3" y="3" width="7" height="7" rx="1.5"/><rect x="14" y="3" width="7" height="7" rx="1.5"/><rect x="3" y="14" width="7" height="7" rx="1.5"/><rect x="14" y="14" width="7" height="7" rx="1.5"/></svg>
                            @endif
                        </span>
                        <span class="megamenu-cat-name">{{$category->title}}</span>
                        <span class="megamenu-cat-arrow">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 6l6 6-6 6"/></svg>
                        </span>
                    </div>
                @empty
                    <div class="megamenu-empty">
                        Категории не загружены.<br>Проверьте $categories в HeaderComponent.
                    </div>
                @endforelse
            </div>
            <div class="megamenu-subcats" id="megaSubcats">
                @forelse ($categories as $idx => $category)
                    <div class="megamenu-subpanel {{ $idx === 0 ? 'active' : '' }}" id="megap-{{ $idx }}">
                        <div class="megamenu-subpanel-head">
                            <div>
                                <span class="megamenu-eyebrow">Раздел каталога</span>
                                <h4>{{ $category->title }}</h4>
                            </div>
                            <a wire:navigate href="{{ route('category', ['slug' => $category->slug]) }}" class="megamenu-viewall">
                                Смотреть все
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
                            </a>
                        </div>
                        <div class="megamenu-subgrid">
                            @forelse ($category->children as $child)
                                <a wire:navigate href="{{ route('subcategory', ['slug' => $child->parent->slug, 'subcategory_slug' => $child->slug]) }}" class="megamenu-subcol">
                                    <span class="megamenu-subcol-title">{{ $child->title }}</span>
                                    @if ($child->children->count())
                                        <span class="megamenu-subcol-tags">
                                            @foreach ($child->children->take(4) as $subchild)
                                                <span>{{ $subchild->title }}</span>
                                            @endforeach
                                            @if($child->children->count() > 4)<span>+{{ $child->children->count() - 4 }}</span>@endif
                                        </span>
                                    @endif
                                    <span class="megamenu-subcol-arrow">↗</span>
                                </a>
                            @empty
                                <div class="megamenu-empty">В этой категории пока нет подкатегорий.</div>
                            @endforelse
                        </div>
                    </div>
                @empty
                @endforelse
            </div>
        </div>
    </div>
    <div class="megamenu-backdrop" id="megaBackdrop"></div>

</header>

{{-- ══════════════════════════════════════════════════════
     STICKY NAV — плавающая пилюля, появляется при скролле вверх
     ══════════════════════════════════════════════════════ --}}
<div class="sn" id="stickyNav">
    <div class="sn-inner">
        <a wire:navigate href="/" class="sn-logo-link">
            <img src="{{asset('assets/images/design/logo.png')}}" alt="" class="sn-logo">
        </a>

        <div class="sn-catalog" id="snCatalogBtn" role="button" tabindex="0" aria-expanded="false" aria-controls="megaMenu">
            <div class="sn-burger"><span></span><span></span><span></span></div>
            <span>Каталог</span>
        </div>

        <nav class="sn-nav">
            <a wire:navigate href="{{route('shop')}}">Магазин</a>
            <a wire:navigate href="{{route('sales')}}">Акции</a>
            <a wire:navigate href="{{route('news')}}">Новинки</a>
            <a wire:navigate href="{{route('delivery')}}">Доставка</a>
            <a wire:navigate href="{{route('contacts')}}">Контакты</a>
        </nav>

        <div class="sn-right">
            <button type="button" class="sn-icon" aria-label="Поиск" data-pb-sticky-search-open>
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="7"/><path d="M21 21l-4.3-4.3"/></svg>
            </button>
            @livewire('wishlist-count-component', ['variant' => 'sticky'], key('sticky-wishlist-count'))
            @livewire('cart-count-component', ['variant' => 'sticky'], key('sticky-cart-count'))
            <button type="button" class="sn-cta pb-animated-action" data-pb-callback>
                <svg viewBox="0 0 24 24" fill="currentColor"><path d="M6.62 10.79a15.05 15.05 0 006.59 6.59l2.2-2.2a1 1 0 011.01-.24 11.36 11.36 0 003.58.57 1 1 0 011 1V20a1 1 0 01-1 1A17 17 0 013 4a1 1 0 011-1h3.5a1 1 0 011 1 11.36 11.36 0 00.57 3.58 1 1 0 01-.24 1.01l-2.2 2.2z"/></svg>
                <span>Перезвоните мне</span>
                <i class="pb-action-fill"></i>
            </button>
        </div>
    </div>
</div>

<div class="pb-sticky-search-modal" data-pb-sticky-search-modal aria-hidden="true">
    <button type="button" class="pb-sticky-search-glass" data-pb-sticky-search-close aria-label="Закрыть поиск"></button>
    <div class="pb-sticky-search-dialog" role="dialog" aria-modal="true" aria-labelledby="pbStickySearchTitle">
        <div class="pb-sticky-search-head">
            <div><span>PBX / SMART SEARCH</span><h2 id="pbStickySearchTitle">Поиск по каталогу</h2></div>
            <button type="button" class="pb-sticky-search-close" data-pb-sticky-search-close aria-label="Закрыть поиск"><svg viewBox="0 0 24 24"><path d="m6 6 12 12M18 6 6 18"/></svg></button>
        </div>
        <div class="pb-sticky-live-search" data-pb-sticky-live-search>
            @livewire('header-search-component', [], key('sticky-header-search'))
        </div>
        <div class="pb-sticky-search-hint"><span>Быстрый поиск</span><p>Введите название, артикул или категорию товара</p></div>
    </div>
</div>

{{-- ══════════════════════════════════════════════════════
     CSS мегаменю
     ══════════════════════════════════════════════════════ --}}
<style>
    .pb-wishlist-count-root { display: contents; }
    .pb-animated-action { position: relative !important; isolation: isolate; overflow: hidden !important; }
    .pb-animated-action > span,.pb-animated-action > svg { position: relative; z-index: 2; }
    .pb-action-fill { position: absolute; z-index: 1; inset: -2px; display: block; background: linear-gradient(110deg,#117a53,#20c883); transform: translateX(-103%); transition: transform .38s cubic-bezier(.22,1,.36,1); pointer-events: none; }
    .pb-header-callback { min-height: 43px; display: inline-flex !important; align-items: center; justify-content: center; gap: 10px; padding: 10px 16px !important; border: 1px solid rgba(21,151,102,.45) !important; border-radius: 9px !important; color: #17211c; background: rgba(255,255,255,.82) !important; box-shadow: 0 8px 20px rgba(14,83,53,.08); font: 600 14px/1 Arial,sans-serif; cursor: pointer; }
    .pb-header-callback .pb-action-phone { width: 19px; height: 19px; fill: none; stroke: #159766; stroke-width: 1.8; stroke-linecap: round; stroke-linejoin: round; }
    .pb-header-callback .pb-action-arrow { width: 16px; height: 16px; fill: none; stroke: currentColor; stroke-width: 2; stroke-linecap: round; stroke-linejoin: round; }
    .pb-animated-action:hover > .pb-action-fill,
    .pb-animated-action:focus-visible > .pb-action-fill { transform: translateX(0); }
    .pb-animated-action.pb-action-active,
    .pb-animated-action:hover,
    .pb-animated-action:focus-visible { color: #fff !important; }
    .pb-animated-action.pb-action-active svg,
    .pb-animated-action:hover svg,
    .pb-animated-action:focus-visible svg { color: #fff; stroke: currentColor; }
    .sn-icon{font-family:inherit;cursor:pointer}
    .pb-sticky-search-modal{position:fixed;z-index:100500;inset:0;display:grid;place-items:start center;padding:clamp(90px,14vh,160px) 18px 30px;box-sizing:border-box;visibility:hidden;pointer-events:none;opacity:0}
    .pb-sticky-search-modal.open{visibility:visible;pointer-events:auto}
    .pb-sticky-search-glass{position:absolute;inset:0;width:100%;height:100%;padding:0;border:0;background:rgba(4,12,8,.58);backdrop-filter:blur(11px);-webkit-backdrop-filter:blur(11px);cursor:default}
    .pb-sticky-search-dialog{position:relative;width:min(820px,100%);border:1px solid rgba(50,220,155,.6);border-radius:0;color:#fff;background:linear-gradient(120deg,rgba(9,25,17,.96),rgba(5,14,9,.94));box-shadow:0 35px 90px rgba(0,0,0,.46);transform-origin:top center}
    .pb-sticky-search-dialog:before{content:'';position:absolute;inset:0;opacity:.18;pointer-events:none;background-image:radial-gradient(circle,rgba(50,220,155,.55) 1px,transparent 1.2px);background-size:25px 25px}
    .pb-sticky-search-head{position:relative;display:flex;align-items:center;justify-content:space-between;gap:24px;padding:28px 30px 22px;border-bottom:1px solid rgba(50,220,155,.18)}
    .pb-sticky-search-head span{display:block;margin-bottom:8px;color:#39da98;font:700 9px/1 Arial;letter-spacing:.2em}.pb-sticky-search-head h2{margin:0;color:#fff;font-size:27px;line-height:1.1}
    .pb-sticky-search-close{width:44px;height:44px;display:grid;place-items:center;padding:0;border:1px solid rgba(50,220,155,.3);border-radius:0;color:#9fb0a7;background:rgba(255,255,255,.03);cursor:pointer}.pb-sticky-search-close:hover{color:#fff;border-color:#39da98;background:rgba(50,220,155,.1)}.pb-sticky-search-close svg{width:20px;height:20px;fill:none;stroke:currentColor;stroke-width:1.7;stroke-linecap:round}
    .pb-sticky-search-form{position:relative;display:grid;grid-template-columns:52px minmax(0,1fr) 142px;margin:28px 30px 18px;border:1px solid rgba(50,220,155,.5);background:#fff}
    .pb-sticky-search-lens{align-self:center;justify-self:center;width:22px;height:22px;fill:none;stroke:#159766;stroke-width:1.8;stroke-linecap:round}.pb-sticky-search-form input{min-width:0;height:60px;padding:0 12px;border:0!important;outline:0;color:#17211c;background:#fff!important;font:500 15px Arial}.pb-sticky-search-form>button{display:flex;align-items:center;justify-content:center;gap:10px;border:0;border-left:1px solid #159766;border-radius:0;color:#fff;background:#159766;font-weight:700;cursor:pointer}.pb-sticky-search-form>button:hover{background:#20b97d}.pb-sticky-search-form>button svg{width:18px;height:18px;fill:none;stroke:currentColor;stroke-width:1.8;stroke-linecap:round;stroke-linejoin:round}
    .pb-sticky-search-hint{position:relative;display:flex;align-items:center;gap:16px;padding:0 30px 27px;color:#82938a;font-size:11px}.pb-sticky-search-hint span{color:#39da98;font:700 8px Arial;letter-spacing:.15em;text-transform:uppercase}.pb-sticky-search-hint p{margin:0}
    .pb-sticky-live-search{position:relative;z-index:3;margin:28px 30px 18px}.pb-sticky-live-search .pb-search-shell,.pb-sticky-live-search .pb-search-form{width:100%!important}.pb-sticky-live-search .pb-search-form{height:60px!important;min-height:60px!important;display:flex!important;align-items:center!important;overflow:hidden!important;border:0!important;outline:0!important;background:#fff!important;box-shadow:none!important}.pb-sticky-live-search .pb-search-input{height:60px!important;min-height:60px!important;margin:0!important;padding-top:0!important;padding-bottom:0!important;border:0!important;outline:0!important;color:#17211c!important;background:#fff!important;box-shadow:none!important;font-size:15px!important;line-height:60px!important}.pb-sticky-live-search .pb-search-panel{z-index:10!important;top:calc(100% + 10px)!important;width:100%!important;max-height:min(52vh,520px)!important;border-radius:0!important}.pb-sticky-live-search .pb-search-overlay{position:fixed!important;z-index:-1!important;inset:0!important;background:transparent!important;backdrop-filter:none!important;-webkit-backdrop-filter:none!important}.pb-sticky-live-search .pb-search-clear{border-radius:0!important}
    @media(max-width:620px){.pb-sticky-search-modal{padding-top:70px}.pb-sticky-search-head{padding:22px 20px 18px}.pb-sticky-search-head h2{font-size:22px}.pb-sticky-live-search{margin:20px}.pb-sticky-search-hint{padding:0 20px 22px}}
    .header__middle__search__wrap { transition: opacity .22s ease, visibility .22s ease, transform .22s ease; }
    body.pb-mega-menu-open .header__middle__search__wrap { opacity: 0 !important; visibility: hidden !important; pointer-events: none !important; transform: translateY(-8px); }

    /* ══════════════ GSAP-МЕГАМЕНЮ ══════════════ */
    .megamenu {
        position: fixed !important;
        left: 50% !important;
        width: calc(100% - 48px) !important;
        max-width: 1360px;
        z-index: 90000 !important;
        overflow: hidden;
        border: 1px solid rgba(255,255,255,.12);
        border-top: 2px solid #20c883;
        border-radius: 0 0 24px 24px;
        background: #fff;
        box-shadow: 0 34px 80px rgba(5,18,12,.28), 0 10px 24px rgba(5,18,12,.14);
        opacity: 0;
        visibility: hidden;
        transform: translateX(-50%);
        transform-origin: top center;
        pointer-events: none;
    }
    .megamenu.open { visibility: visible; pointer-events: auto; }

    .megamenu-topbar {
        position: relative;
        min-height: 68px;
        display: flex;
        align-items: center;
        gap: 28px;
        padding: 10px 22px 10px 26px;
        overflow: hidden;
        background:
            linear-gradient(90deg, rgba(32,200,131,.1), transparent 32%),
            #101713;
    }
    .megamenu-topbar::after {
        content: '';
        position: absolute;
        inset: 0;
        pointer-events: none;
        opacity: .16;
        background-image: radial-gradient(circle, rgba(255,255,255,.65) 0 1px, transparent 1.2px);
        background-size: 20px 20px;
        mask-image: linear-gradient(90deg, #000, transparent 72%);
    }
    .megamenu-heading { position: relative; z-index: 1; min-width: 230px; display: flex; flex-direction: column; gap: 3px; }
    .megamenu-heading span { color: #20c883; font: 700 9px/1.2 Arial,sans-serif; letter-spacing: .22em; }
    .megamenu-heading strong { color: #fff; font-size: 18px; line-height: 1.2; }

    .megamenu-quick { position: relative; z-index: 1; display: flex; align-items: center; gap: 8px; flex-wrap: wrap; }
    .megamenu-quick-link {
        position: relative;
        padding: 9px 15px;
        border: 1px solid rgba(255,255,255,.13);
        border-radius: 999px;
        color: rgba(255,255,255,.78);
        background: rgba(255,255,255,.055);
        font-size: 12px;
        font-weight: 600;
        text-decoration: none;
        transition: color .22s, background .22s, border-color .22s, transform .22s;
    }
    .megamenu-quick-link:hover { color: #fff; background: #159766; border-color: #20c883; transform: translateY(-1px); }

    .megamenu-close {
        position: relative;
        z-index: 1;
        width: 40px;
        height: 40px;
        margin-left: auto;
        flex: 0 0 40px;
        display: grid;
        place-items: center;
        border: 1px solid rgba(255,255,255,.13);
        border-radius: 50%;
        color: rgba(255,255,255,.72);
        background: rgba(255,255,255,.05);
        cursor: pointer;
        transition: color .22s, border-color .22s, background .22s, transform .22s;
    }
    .megamenu-close:hover { color: #fff; border-color: #20c883; background: rgba(32,200,131,.14); transform: rotate(90deg); }
    .megamenu-close svg { width: 18px; height: 18px; }

    .megamenu-body { display: flex; min-height: 360px; max-height: min(60vh, 560px); background: #f5f7f6; }
    .megamenu-cats {
        width: 330px;
        flex: 0 0 330px;
        padding: 14px 14px 16px;
        overflow-y: auto;
        color: #fff;
        background:
            radial-gradient(circle at 0 100%, rgba(32,200,131,.13), transparent 42%),
            linear-gradient(180deg, #17201b, #101713);
    }
    .megamenu-cats-title { display: flex; align-items: center; justify-content: space-between; padding: 0 12px 12px; }
    .megamenu-cats-title span { color: rgba(255,255,255,.44); font: 700 9px/1 Arial,sans-serif; letter-spacing: .18em; text-transform: uppercase; }
    .megamenu-cats-title b { min-width: 25px; padding: 4px 7px; border-radius: 999px; background: rgba(32,200,131,.13); color: #39da98; font: 700 10px/1 Arial,sans-serif; text-align: center; }
    .megamenu-cats::-webkit-scrollbar,.megamenu-subcats::-webkit-scrollbar { width: 4px; }
    .megamenu-cats::-webkit-scrollbar-thumb { background: rgba(255,255,255,.15); border-radius: 4px; }

    .megamenu-cat {
        position: relative;
        display: flex;
        align-items: center;
        gap: 13px;
        min-height: 52px;
        padding: 6px 12px;
        border: 1px solid transparent;
        border-radius: 12px;
        cursor: pointer;
        background: transparent;
        transition: background .2s, border-color .2s, transform .2s;
    }
    .megamenu-cat::before { content: ''; position: absolute; left: -14px; top: 15px; bottom: 15px; width: 3px; border-radius: 0 4px 4px 0; background: #20c883; transform: scaleY(0); transition: transform .22s; }
    .megamenu-cat:hover { background: rgba(255,255,255,.055); transform: translateX(2px); }
    .megamenu-cat.active { background: rgba(32,200,131,.1); border-color: rgba(32,200,131,.18); }
    .megamenu-cat.active::before { transform: scaleY(1); }

    .megamenu-cat-icon {
        width: 36px;
        height: 36px;
        flex: 0 0 36px;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        border: 1px solid rgba(255,255,255,.09);
        border-radius: 10px;
        color: #39da98;
        background: rgba(255,255,255,.06);
        transition: border-color .2s, background .2s;
    }
    .megamenu-cat.active .megamenu-cat-icon { border-color: rgba(32,200,131,.35); background: rgba(32,200,131,.14); }
    .megamenu-cat-icon img { width: 100%; height: 100%; object-fit: cover; filter: saturate(.8) contrast(1.04); }
    .megamenu-cat-icon svg { width: 18px; height: 18px; }
    .megamenu-cat-name { flex: 1; color: rgba(255,255,255,.78); font-size: 13px; font-weight: 600; line-height: 1.25; transition: color .2s; }
    .megamenu-cat:hover .megamenu-cat-name,.megamenu-cat.active .megamenu-cat-name { color: #fff; }
    .megamenu-cat-arrow { display: flex; color: rgba(255,255,255,.25); transition: color .2s, transform .2s; }
    .megamenu-cat-arrow svg { width: 15px; height: 15px; }
    .megamenu-cat:hover .megamenu-cat-arrow,.megamenu-cat.active .megamenu-cat-arrow { color: #39da98; transform: translateX(3px); }

    .megamenu-subcats {
        position: relative;
        flex: 1;
        padding: 20px 30px 22px;
        overflow-y: auto;
        background:
            linear-gradient(rgba(21,151,102,.025) 1px, transparent 1px),
            linear-gradient(90deg, rgba(21,151,102,.025) 1px, transparent 1px),
            #f8faf9;
        background-size: 32px 32px;
    }
    .megamenu-subcats::-webkit-scrollbar-thumb { background: #cddbd4; border-radius: 4px; }
    .megamenu-subpanel { display: none; }
    .megamenu-subpanel.active { display: block; }
    .megamenu-subpanel-head { display: flex; align-items: flex-end; justify-content: space-between; gap: 24px; margin-bottom: 14px; }
    .megamenu-eyebrow { display: block; margin-bottom: 5px; color: #159766; font: 700 9px/1 Arial,sans-serif; letter-spacing: .18em; text-transform: uppercase; }
    .megamenu-subpanel-head h4 { max-width: 720px; margin: 0; color: #16201b; font-size: clamp(20px,2vw,28px); font-weight: 700; line-height: 1.15; }
    .megamenu-viewall { display: inline-flex; align-items: center; gap: 8px; padding: 10px 14px; border: 1px solid #cfe3d9; border-radius: 999px; color: #117a53; background: rgba(255,255,255,.78); font-size: 12px; font-weight: 700; text-decoration: none; white-space: nowrap; transition: background .2s, color .2s, border-color .2s; }
    .megamenu-viewall:hover { color: #fff; border-color: #159766; background: #159766; }
    .megamenu-viewall svg { width: 14px; height: 14px; transition: transform .2s; }
    .megamenu-viewall:hover svg { transform: translateX(3px); }

    .megamenu-subgrid { display: grid; grid-template-columns: repeat(auto-fill,minmax(220px,1fr)); gap: 9px; }
    .megamenu-subcol {
        position: relative;
        min-height: 96px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        padding: 13px 42px 12px 18px;
        overflow: hidden;
        border: 1px solid #e0e9e4;
        border-radius: 14px;
        color: inherit;
        background: rgba(255,255,255,.9);
        box-shadow: 0 4px 14px rgba(17,60,40,.035);
        text-decoration: none;
        transition: border-color .22s, box-shadow .22s, transform .22s, background .22s;
    }
    .megamenu-subcol::before { content: ''; position: absolute; left: 0; top: 0; bottom: 0; width: 3px; background: #20c883; transform: scaleY(0); transform-origin: bottom; transition: transform .22s; }
    .megamenu-subcol:hover { border-color: rgba(21,151,102,.45); background: #fff; box-shadow: 0 12px 24px rgba(17,82,51,.09); transform: translateY(-3px); }
    .megamenu-subcol:hover::before { transform: scaleY(1); }
    .megamenu-subcol-index { margin-bottom: 6px; color: #20a970; font: 700 9px/1 Arial,sans-serif; letter-spacing: .12em; }
    .megamenu-subcol-title { display: block; color: #1b2821; font-size: 14px; font-weight: 700; line-height: 1.25; }
    .megamenu-subcol:hover .megamenu-subcol-title { color: #117a53; }
    .megamenu-subcol-tags { display: flex; flex-wrap: wrap; gap: 3px 7px; margin-top: 7px; }
    .megamenu-subcol-tags span { color: #839189; font-size: 10px; line-height: 1.3; }
    .megamenu-subcol-arrow { position: absolute; right: 16px; top: 50%; transform: translateY(-50%); color: #b6c2bc; font-size: 17px; transition: color .2s, transform .2s; }
    .megamenu-subcol:hover .megamenu-subcol-arrow { color: #159766; transform: translate(2px,-4px); }
    .megamenu-empty { padding: 18px; color: #829088; font-size: 12px; line-height: 1.5; }

    .megamenu-backdrop { position: fixed; inset: 0; z-index: 89999; opacity: 0; pointer-events: none; background: rgba(5,15,10,.48); backdrop-filter: blur(5px); -webkit-backdrop-filter: blur(5px); }
    .megamenu-backdrop.active { pointer-events: auto; }

    @media (max-width: 1180px) and (min-width: 1025px) {
        .megamenu { width: calc(100% - 24px) !important; }
        .megamenu-heading { min-width: 190px; }
        .megamenu-cats { width: 285px; flex-basis: 285px; }
        .megamenu-subcats { padding-left: 22px; padding-right: 22px; }
        .megamenu-subgrid { grid-template-columns: repeat(auto-fill,minmax(190px,1fr)); }
    }
    @media (max-width: 1024px) { .megamenu,.megamenu-backdrop { display: none !important; } }
    @media (min-width: 1025px) { #overlayMy { display: none !important; opacity: 0 !important; } }

    /* ══════════════ STICKY NAV — плавающая пилюля ══════════════ */
    .sn {
        position: fixed;
        top: -120px;
        left: 50%;
        z-index: 99998;
        width: calc(100% - 48px);
        max-width: 1350px;
        transform: translateX(-50%);
        opacity: 0;
        pointer-events: none;
    }
    .sn.sn-visible { pointer-events: all; }

    .sn-inner {
        display: flex;
        align-items: center;
        gap: 10px;
        background: #fff;
        border-radius: 999px;
        padding: 11px 14px 11px 20px;
        box-shadow: 0 12px 32px rgba(15, 30, 22, .14), 0 2px 8px rgba(15, 30, 22, .06);
        border: 1px solid rgba(21, 151, 102, .08);
    }

    .sn-logo-link { display: flex; align-items: center; flex-shrink: 0; margin-right: 4px; }
    .sn-logo { height: 40px; width: auto; }

    .sn-catalog {
        display: flex;
        align-items: center;
        gap: 8px;
        padding: 12px 20px;
        border-radius: 999px;
        color: #159766;
        font-size: 15px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.2s;
        background: #eef6f2;
        white-space: nowrap;
        flex-shrink: 0;
    }
    .sn-catalog:hover { background: #dff0e7; }
    .sn-burger {
        display: flex;
        flex-direction: column;
        gap: 3px;
    }
    .sn-burger span {
        display: block;
        width: 17px;
        height: 2px;
        background: #159766;
        border-radius: 1px;
    }

    .sn-nav {
        display: flex;
        gap: 2px;
        flex: 1;
        min-width: 0;
        justify-content: center;
    }
    .sn-nav a {
        color: #5a6a63;
        font-size: 15px;
        font-weight: 500;
        text-decoration: none;
        padding: 11px 15px;
        border-radius: 999px;
        transition: all 0.2s;
        white-space: nowrap;
    }
    .sn-nav a:hover {
        color: #159766;
        background: #f2f7f4;
    }

    .sn-right {
        display: flex;
        align-items: center;
        gap: 6px;
        flex-shrink: 0;
    }
    .sn-icon {
        position: relative;
        color: #46524c;
        cursor: pointer;
        transition: all 0.2s;
        display: flex;
        align-items: center;
        justify-content: center;
        text-decoration: none;
        width: 46px;
        height: 46px;
        border-radius: 50%;
    }
    .sn-icon:hover { color: #159766; background: #f2f7f4; }
    .sn-icon svg {
        width: 23px;
        height: 23px;
    }
    .sn-icon svg:not([stroke]) { fill: currentColor; }
    .sn-right button.sn-icon[data-pb-sticky-search-open]{padding:0!important;border:0!important;border-radius:0!important;outline:0;background:transparent!important;box-shadow:none!important;appearance:none;-webkit-appearance:none}
    .sn-right button.sn-icon[data-pb-sticky-search-open]:hover,.sn-right button.sn-icon[data-pb-sticky-search-open]:focus-visible{color:#159766;background:transparent!important;box-shadow:none!important}
    .sn-badge {
        position: absolute;
        top: 3px;
        right: 3px;
        background: #159766;
        color: #fff;
        font-size: 9px;
        font-weight: 700;
        width: 18px;
        height: 18px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        border: 2px solid #fff;
    }

    .sn-cta {
        display: flex;
        align-items: center;
        gap: 8px;
        margin-left: 6px;
        padding: 13px 24px;
        border: none;
        border-radius: 999px;
        background: #159766;
        color: #fff;
        font-size: 15px;
        font-weight: 600;
        cursor: pointer;
        white-space: nowrap;
        transition: all 0.2s;
        font-family: inherit;
    }
    .sn-cta:hover { background: #0e7a52; box-shadow: 0 6px 16px rgba(21,151,102,.35); }
    .sn-cta svg { width: 18px; height: 18px; flex-shrink: 0; }

    @media (max-width: 1200px) {
        .sn-nav { display: none; }
    }
    @media (max-width: 1024px) {
        .sn { display: none !important; }
    }
    /* PANDBOX HEADER EXPERIMENT — isolated overrides */
    .pb-site-header header{position:relative;border-bottom:0;background:#f4f6f5}.pb-site-header header:before{content:'';position:absolute;z-index:0;left:0;right:0;top:49px;height:171px;pointer-events:none;opacity:.42;background-image:linear-gradient(rgba(20,133,89,.07) 1px,transparent 1px),linear-gradient(90deg,rgba(20,133,89,.07) 1px,transparent 1px);background-size:28px 28px;mask-image:linear-gradient(90deg,#000,transparent 86%)}.pb-site-header .headerTopWrap,.pb-site-header .header__middle__wrap,.pb-site-header .header__bottom__nav__wrap{position:relative;z-index:2}.pb-site-header .header__bullet1,.pb-site-header .header__bullet2,.pb-site-header .header__bullet3{animation:none!important}
    @media(min-width:1025px){.pb-site-header .container{width:calc(100% - 48px)!important;max-width:1600px!important}.pb-site-header .headerTopWrap{height:50px!important;border-bottom:1px solid #18bd7d!important;background:#0b110e!important}.pb-site-header .headerTop{height:50px!important;display:flex!important;align-items:center!important;justify-content:space-between!important}.pb-site-header .headerTopLeft nav ul,.pb-site-header .headerTopRight,.pb-site-header .header__phones{display:flex!important;align-items:center!important;gap:0!important}.pb-site-header .headerTopLeft li,.pb-site-header .headerTopRight>*{position:relative;border-right:1px solid rgba(255,255,255,.1)}.pb-site-header .headerTopLeft li:first-child,.pb-site-header .headerTopRight>*:first-child{border-left:1px solid rgba(255,255,255,.1)}.pb-site-header .headerTopLeft a,.pb-site-header .header__phones a,.pb-site-header .header__email{display:flex!important;align-items:center!important;min-height:50px!important;box-sizing:border-box;padding:0 18px!important;color:#b9c7c0!important;background:none!important;background-image:none!important;font-size:13px!important;text-decoration:none!important;transition:color .2s,background .2s}.pb-site-header .headerTopLeft a:hover,.pb-site-header .header__phones a:hover,.pb-site-header .header__email:hover{color:#39da98!important;background:rgba(39,217,148,.07)!important}.pb-site-header .headerTopLeft a:before{content:'';width:7px;height:7px;margin-right:9px;border:1px solid #27d994;transform:rotate(45deg)}.pb-site-header .header__social{height:50px;display:flex!important;align-items:center!important;gap:7px;padding:0 12px}.pb-site-header .header__social a{width:30px;height:30px;display:grid!important;place-items:center;color:#39da98!important}.pb-site-header .header__social svg{width:22px;height:22px;fill:none;stroke:currentColor;stroke-width:1.7;stroke-linecap:round;stroke-linejoin:round}
    .pb-site-header .header__middle__wrap{min-height:190px!important;padding:0!important;border-bottom:1px solid #d8e3dd!important;background:linear-gradient(110deg,rgba(255,255,255,.96),rgba(239,244,241,.94))!important}.pb-site-header .header__middle{min-height:190px!important;display:grid!important;grid-template-columns:245px minmax(0,1fr) 390px!important;align-items:center!important;gap:34px!important;padding:18px 0!important;box-sizing:border-box}.pb-site-header .header__middle__logo__wrap{position:relative;width:auto!important;display:flex!important;flex-direction:column;align-items:center;justify-content:center;padding:10px 24px!important;border-left:1px solid rgba(16,166,109,.25);border-right:1px solid rgba(16,166,109,.15)}.pb-site-header .header__middle__logo__wrap:before{content:'PBX / HQ';position:absolute;left:12px;top:5px;color:#159766;font:700 9px Arial;letter-spacing:.18em}.pb-site-header .headerLogo{width:145px!important;height:115px!important;object-fit:contain;filter:drop-shadow(0 10px 12px rgba(0,0,0,.12))}.pb-site-header .header__middle__logo__wrap p{margin:3px 0 0!important;color:#078f5c!important;font-size:19px!important;font-weight:800!important;text-transform:uppercase}.pb-site-header .header__middle__search__wrap{width:auto!important;min-width:0!important}.pb-site-header .header__middle__search__title{margin:0 0 16px!important;color:#17211c!important;font-size:clamp(24px,2vw,34px)!important;font-weight:700!important;line-height:1.05!important;letter-spacing:-.02em}.pb-site-header .header__middle__search{width:100%!important}.pb-site-header .header__middle__search form,.pb-site-header .header__middle__search input{border-radius:0!important}.pb-site-header .header__middle__right__top{width:auto!important;display:flex!important;flex-direction:column!important;align-items:stretch!important;gap:13px}.pb-site-header .header__middle__right__wrap{width:auto!important;display:flex!important;align-items:center!important;justify-content:flex-end!important;gap:10px!important}.pb-site-header .header__middle__right__login,.pb-site-header .header__middle__right__cart,.pb-site-header .header__middle__right__favour{min-width:92px!important;min-height:76px!important;display:grid!important;place-items:center;padding:8px!important;box-sizing:border-box;border:1px solid #d9e3de!important;background:rgba(255,255,255,.72)!important}.pb-site-header .header__middle__right__wrap a{font-size:11px!important}.pb-site-header .header_middle_right_bottom_wrap{display:flex!important;justify-content:flex-end!important}.pb-site-header .pb-header-callback{min-width:230px!important;min-height:48px!important;border-radius:0!important;background:#fff!important}.pb-site-header .header__bullet1,.pb-site-header .header__bullet2,.pb-site-header .header__bullet3{opacity:.7!important;transform:none!important}
    .pb-site-header .header__bottom__nav__wrap{height:72px!important;border-top:0!important;border-bottom:2px solid #20c883!important;background:linear-gradient(100deg,#101713,#222824)!important}.pb-site-header .header__bottom__nav{height:72px!important;display:flex!important;align-items:center!important;justify-content:space-between!important}.pb-site-header .header__bottom__catalog{height:100%;display:flex;align-items:center}.pb-site-header .header__burger__btn{min-width:300px;height:100%;display:flex!important;align-items:center!important;gap:16px;padding:0 24px!important;box-sizing:border-box;border-left:1px solid rgba(255,255,255,.1);border-right:1px solid rgba(255,255,255,.1);background:rgba(39,217,148,.06);transition:background .2s}.pb-site-header .header__burger__btn:hover{background:rgba(39,217,148,.14)}.pb-site-header .header__burger__p{margin:0!important;color:#fff!important;font-size:19px!important;font-weight:700!important;text-transform:uppercase}.pb-site-header .header__bottom__nav>nav ul{display:flex!important;align-items:center!important;gap:0!important}.pb-site-header .header__bottom__nav>nav li{border-left:1px solid rgba(255,255,255,.08)}.pb-site-header .header__bottom__nav>nav a{position:relative;display:flex!important;align-items:center!important;min-height:72px!important;padding:0 22px!important;color:#d8e2dc!important;font-size:14px!important;text-decoration:none!important;transition:color .2s,background .2s}.pb-site-header .header__bottom__nav>nav a:before{content:'';width:6px;height:6px;margin-right:9px;border:1px solid #27d994;transform:rotate(45deg)}.pb-site-header .header__bottom__nav>nav a:hover{color:#fff!important;background:rgba(39,217,148,.08)!important}}
    @media(max-width:1250px) and (min-width:1025px){.pb-site-header .header__middle{grid-template-columns:205px minmax(0,1fr) 330px!important;gap:20px!important}.pb-site-header .header__bottom__nav>nav a{padding-inline:13px!important}.pb-site-header .header__burger__btn{min-width:250px}.pb-site-header .headerTopLeft a,.pb-site-header .header__phones a,.pb-site-header .header__email{padding-inline:10px!important}}
    @media(prefers-reduced-motion:reduce){.pb-site-header *{transition:none!important}}
    /* PANDBOX HEADER V2 — dark composition matching the footer */
    @media(min-width:1025px){.pb-site-header header{background:#07100b!important;border-bottom:0!important}.pb-site-header header:before{top:48px;height:222px;opacity:.2;background-image:linear-gradient(rgba(47,219,151,.12) 1px,transparent 1px),linear-gradient(90deg,rgba(47,219,151,.12) 1px,transparent 1px);background-size:32px 32px;mask-image:linear-gradient(90deg,#000,transparent 90%)}.pb-site-header .headerTopWrap{background:#050906!important}.pb-site-header .header__middle__wrap{min-height:222px!important;border:0!important;background:radial-gradient(circle at 48% 25%,rgba(24,158,103,.18),transparent 34%),linear-gradient(115deg,#101a14,#07100b)!important}.pb-site-header .header__middle{position:relative;min-height:222px!important;grid-template-columns:270px minmax(0,1fr) 400px!important;gap:0!important;padding:0!important;border-left:1px solid rgba(39,217,148,.24);border-right:1px solid rgba(39,217,148,.24);background:rgba(7,16,11,.45)}.pb-site-header .header__middle:after{content:'PANDBOX.KZ';position:absolute;z-index:0;left:51%;bottom:-4px;color:rgba(39,217,148,.025);font:900 92px/.8 Arial;letter-spacing:-.07em;white-space:nowrap;transform:translateX(-50%);pointer-events:none}.pb-site-header .header__middle>*{position:relative;z-index:2}.pb-site-header .header__middle__logo__wrap{align-self:stretch!important;padding:22px 30px!important;border-left:0!important;border-right:1px solid rgba(255,255,255,.09)!important;background:linear-gradient(145deg,rgba(39,217,148,.12),rgba(0,0,0,.08))!important}.pb-site-header .header__middle__logo__wrap:before{left:22px;top:18px;color:#39da98}.pb-site-header .header__middle__logo__wrap:after{content:'';position:absolute;right:18px;bottom:18px;width:35px;height:35px;border-right:1px solid #27d994;border-bottom:1px solid #27d994}.pb-site-header .headerLogo{width:160px!important;height:130px!important;filter:drop-shadow(0 16px 20px rgba(0,0,0,.45)) brightness(1.07)}.pb-site-header .header__middle__logo__wrap p{color:#39da98!important;font-size:22px!important}.pb-site-header .header__middle__search__wrap{align-self:stretch!important;display:flex!important;flex-direction:column;justify-content:center;padding:30px 48px!important;box-sizing:border-box;border-right:1px solid rgba(255,255,255,.09)}.pb-site-header .header__middle__search__title{margin-bottom:22px!important;color:#fff!important;font-size:clamp(28px,2.25vw,39px)!important;text-shadow:0 8px 28px rgba(0,0,0,.3)}.pb-site-header .header__middle__search__title:before{content:'PBX / TACTICAL STORE';display:block;margin-bottom:12px;color:#39da98;font:700 10px Arial;letter-spacing:.2em}.pb-site-header .header__middle__search form{min-height:56px!important;border:1px solid rgba(39,217,148,.45)!important;background:#fff!important;box-shadow:0 16px 35px rgba(0,0,0,.24)!important}.pb-site-header .header__middle__search input{min-height:56px!important;color:#17211c!important;background:#fff!important;font-size:14px!important}.pb-site-header .header__middle__right__top{align-self:stretch!important;justify-content:center!important;padding:25px 28px!important;box-sizing:border-box;background:rgba(0,0,0,.1)}.pb-site-header .header__middle__right__wrap{justify-content:space-between!important;gap:8px!important}.pb-site-header .header__middle__right__login,.pb-site-header .header__middle__right__cart,.pb-site-header .header__middle__right__favour{min-width:100px!important;min-height:92px!important;border:1px solid rgba(39,217,148,.23)!important;color:#17211c!important;background:#f7faf8!important;box-shadow:0 12px 28px rgba(0,0,0,.2)!important;transition:border-color .2s,transform .2s}.pb-site-header .header__middle__right__login:hover,.pb-site-header .header__middle__right__cart:hover,.pb-site-header .header__middle__right__favour:hover{border-color:#27d994!important;transform:translateY(-3px)}.pb-site-header .header_middle_right_bottom_wrap{margin-top:12px!important}.pb-site-header .pb-header-callback{width:100%!important;min-width:0!important;min-height:50px!important;border:1px solid #27d994!important;color:#fff!important;background:rgba(39,217,148,.08)!important;box-shadow:none!important}.pb-site-header .pb-header-callback .pb-action-phone{stroke:#39da98}.pb-site-header .header__bottom__nav__wrap{height:76px!important;border-top:1px solid rgba(39,217,148,.18)!important;background:#0b120e!important}.pb-site-header .header__bottom__nav{height:76px!important}.pb-site-header .header__burger__btn{min-width:330px!important;height:76px!important;border-left:1px solid rgba(39,217,148,.2)!important;border-right:1px solid rgba(39,217,148,.2)!important;background:linear-gradient(100deg,rgba(39,217,148,.13),rgba(39,217,148,.03))!important}.pb-site-header .header__burger__p{font-size:21px!important}.pb-site-header .header__bottom__nav>nav li{border-left:1px solid rgba(255,255,255,.07)}.pb-site-header .header__bottom__nav>nav li:last-child{border-right:1px solid rgba(255,255,255,.07)}.pb-site-header .header__bottom__nav>nav a{min-height:76px!important;padding:0 25px!important;font-size:15px!important}.pb-site-header .header__bullet1,.pb-site-header .header__bullet2,.pb-site-header .header__bullet3{opacity:.38!important;filter:brightness(.75)!important}}
    @media(max-width:1250px) and (min-width:1025px){.pb-site-header .header__middle{grid-template-columns:225px minmax(0,1fr) 340px!important}.pb-site-header .header__middle__search__wrap{padding-inline:28px!important}.pb-site-header .header__middle__right__top{padding-inline:18px!important}.pb-site-header .header__middle__right__login,.pb-site-header .header__middle__right__cart,.pb-site-header .header__middle__right__favour{min-width:88px!important}.pb-site-header .header__bottom__nav>nav a{padding-inline:14px!important}.pb-site-header .header__burger__btn{min-width:270px!important}}
    /* Compact header actions: inline SVGs without card backgrounds */
    .pb-site-header .header__middle__right__wrap{display:grid!important;grid-template-columns:repeat(3,minmax(0,1fr))!important;align-items:stretch!important;gap:12px!important}
    .pb-site-header .header__middle__right__login,.pb-site-header .header__middle__right__cart,.pb-site-header .header__middle__right__favour{min-width:0!important;min-height:0!important;padding:0!important;border:0!important;background:transparent!important;box-shadow:none!important;transform:none!important;color:inherit!important}
    .pb-site-header .header__middle__right__login:hover,.pb-site-header .header__middle__right__cart:hover,.pb-site-header .header__middle__right__favour:hover{border:0!important;transform:none!important}
    .pb-site-header .header__middle__right__loginA{width:100%;height:100%}
    .pb-site-header .pb-header-action{position:relative;width:100%;min-height:88px;display:flex!important;flex-direction:column;align-items:center;justify-content:center;gap:8px;padding:7px 4px!important;box-sizing:border-box;border:0!important;background:transparent!important;color:#d9e6df!important;text-align:center;text-decoration:none!important}
    .pb-site-header .pb-header-action:after{content:'';position:absolute;left:50%;bottom:0;width:0;height:1px;background:#32dc9b;transform:translateX(-50%);transition:width .25s ease}
    .pb-site-header .pb-header-action:hover:after{width:62px}
    .pb-site-header .pb-header-action-icon{width:38px;height:38px;display:block;overflow:visible;fill:none;stroke:#32dc9b;stroke-width:1.55;stroke-linecap:round;stroke-linejoin:round;filter:drop-shadow(0 0 8px rgba(50,220,155,.22));transform-origin:50% 50%}
    .pb-site-header .pb-header-action-label,.pb-site-header .pb-header-action p{margin:0!important;color:#d9e6df!important;font-size:11px!important;font-weight:600!important;line-height:1.15!important;text-align:center}
    .pb-site-header .pb-header-action-count{position:absolute!important;top:4px!important;right:6px!important;min-width:20px!important;height:20px!important;display:grid!important;place-items:center!important;padding:0 4px!important;box-sizing:border-box;border:1px solid #32dc9b!important;border-radius:0!important;background:#32dc9b!important;color:#06100b!important;font:700 10px/1 Arial!important}
    @media(max-width:1250px) and (min-width:1025px){.pb-site-header .header__middle__right__wrap{gap:6px!important}.pb-site-header .pb-header-action-label{font-size:10px!important}.pb-site-header .pb-header-action-icon{width:34px;height:34px}}
    /* Header compact pass */
    @media(min-width:1025px){
        .pb-site-header .headerTopWrap,.pb-site-header .headerTop{height:40px!important}
        .pb-site-header .headerTopLeft a,.pb-site-header .header__phones a,.pb-site-header .header__email{min-height:40px!important}
        .pb-site-header .header__social{height:40px!important}
        .pb-site-header header:before{top:40px!important;height:168px!important}
        .pb-site-header .header__middle__wrap,.pb-site-header .header__middle{min-height:168px!important}
        .pb-site-header .header__middle{grid-template-columns:220px minmax(0,1fr) 330px!important}
        .pb-site-header .header__middle__logo__wrap{padding:15px 24px!important}
        .pb-site-header .headerLogo{width:125px!important;height:95px!important}
        .pb-site-header .header__middle__logo__wrap p{font-size:17px!important}
        .pb-site-header .header__middle__search__wrap{padding:22px 38px!important}
        .pb-site-header .header__middle__search__title{margin-bottom:15px!important;font-size:clamp(24px,1.8vw,32px)!important}
        .pb-site-header .header__middle__search form,.pb-site-header .header__middle__search input{min-height:48px!important}
        .pb-site-header .header__middle__right__top{padding:16px 20px!important}
        .pb-site-header .header__middle__right__wrap{gap:8px!important}
        .pb-site-header .pb-header-action{min-height:66px!important;gap:5px!important;padding:4px 2px!important}
        .pb-site-header .pb-header-action-icon{width:29px!important;height:29px!important;stroke-width:1.45!important}
        .pb-site-header .pb-header-action-label{position:static!important;width:auto!important;height:auto!important;min-width:0!important;margin:0!important;padding:0!important;border:0!important;background:transparent!important;color:#cbd9d2!important;font-size:10px!important;line-height:1.1!important;box-shadow:none!important}
        .pb-site-header .pb-header-action-count{top:0!important;right:4px!important;min-width:18px!important;height:18px!important;padding:0 3px!important;font-size:9px!important}
        .pb-site-header .header_middle_right_bottom_wrap{margin-top:8px!important}
        .pb-site-header .pb-header-callback{min-height:42px!important}
        .pb-site-header .header__bottom__nav__wrap,.pb-site-header .header__bottom__nav{height:62px!important}
        .pb-site-header .header__burger__btn{height:62px!important;min-width:280px!important}
        .pb-site-header .header__burger__p{font-size:18px!important}
        .pb-site-header .header__bottom__nav>nav a{min-height:62px!important;padding:0 18px!important;font-size:13px!important}
    }
    @media(max-width:1250px) and (min-width:1025px){.pb-site-header .header__middle{grid-template-columns:190px minmax(0,1fr) 300px!important}.pb-site-header .header__middle__search__wrap{padding-inline:24px!important}.pb-site-header .header__middle__right__top{padding-inline:12px!important}}
    /* Action alignment and search layer fix */
    .pb-site-header .header__middle__wrap{z-index:20!important;overflow:visible!important}
    .pb-site-header .header__bottom__nav__wrap{z-index:10!important}
    .pb-site-header .header__middle__search__wrap,.pb-site-header .pb-search-shell{overflow:visible!important}
    .pb-site-header .header__middle__right__wrap{grid-auto-rows:70px!important;align-items:stretch!important}
    .pb-site-header .header__middle__right__login,.pb-site-header .header__middle__right__cart,.pb-site-header .header__middle__right__favour{height:70px!important;align-self:stretch!important;justify-self:stretch!important}
    .pb-site-header .header__middle__right__loginA,.pb-site-header .header__middle__right__loginA>a{width:100%!important;height:70px!important}
    .pb-site-header .pb-header-action{height:70px!important;min-height:70px!important;display:grid!important;grid-template-rows:34px 24px!important;place-items:center!important;align-content:center!important;gap:2px!important;padding:3px 2px!important}
    .pb-site-header .pb-header-action-icon{grid-row:1;width:29px!important;height:29px!important;margin:0!important;align-self:center!important;justify-self:center!important}
    .pb-site-header .pb-header-action-label{grid-row:2;min-height:22px!important;display:flex!important;align-items:flex-start!important;justify-content:center!important;align-self:start!important}
    .pb-site-header .pb-header-action-count{grid-row:auto!important;top:-2px!important;right:0!important;min-width:24px!important;height:24px!important;padding:0 5px!important;font-size:13px!important;line-height:1!important}
    /* Three static bullet marks in clear header zones */
    @media(min-width:1025px){
        .pb-site-header .header__bullet1,.pb-site-header .header__bullet2,.pb-site-header .header__bullet3{position:absolute!important;display:block!important;width:30px!important;height:30px!important;margin:0!important;object-fit:contain!important;opacity:.72!important;filter:brightness(.9) contrast(1.08)!important;transform:none!important;animation:none!important;pointer-events:none!important;z-index:3!important}
        .pb-site-header .header__bullet1{left:16px!important;top:76px!important}
        .pb-site-header .header__bullet2{left:31%!important;top:-35px!important;width:27px!important;height:27px!important}
        .pb-site-header .header__bullet3{left:73%!important;top:14px!important;width:33px!important;height:33px!important}
    }
    @media(max-width:1024px){.pb-site-header .header__bullet1,.pb-site-header .header__bullet2,.pb-site-header .header__bullet3{display:none!important}}
    /* Top navigation: common icon and vertical alignment system */
    @media(min-width:1025px){
        .pb-site-header .headerTopWrap,.pb-site-header .headerTop{height:46px!important;min-height:46px!important}
        .pb-site-header .headerTop{align-items:center!important}
        .pb-site-header .headerTopLeft,.pb-site-header .headerTopLeft nav,.pb-site-header .headerTopLeft ul,.pb-site-header .headerTopRight,.pb-site-header .header__phones,.pb-site-header .header__social{height:46px!important;min-height:46px!important;align-items:center!important}
        .pb-site-header .headerTopLeft ul{display:flex!important;margin:0!important;padding:0!important}
        .pb-site-header .headerTopLeft li{height:46px!important;display:flex!important;align-items:center!important;margin:0!important;padding:0!important}
        .pb-site-header .headerTopLeft a,.pb-site-header .header__phones a,.pb-site-header .header__email{height:46px!important;min-height:46px!important;display:flex!important;align-items:center!important;gap:8px!important;padding-top:0!important;padding-bottom:0!important;line-height:1!important}
        .pb-site-header .headerTopLeft a:before{display:none!important}
        .pb-site-header .pb-top-icon{width:17px!important;height:17px!important;flex:0 0 17px!important;display:block!important;fill:none!important;stroke:#32dc9b!important;stroke-width:1.65!important;stroke-linecap:round!important;stroke-linejoin:round!important}
        .pb-site-header .headerTopLeft a span,.pb-site-header .header__phones a span,.pb-site-header .header__email span{display:block!important;transform:none!important}
        .pb-site-header .header__social a{height:46px!important;display:grid!important;place-items:center!important}
        .pb-site-header header:before{top:46px!important}
    }
    @media(min-width:1025px){
        .pb-site-header .headerTopLeft a,.pb-site-header .header__phones a,.pb-site-header .header__email{font-size:15px!important;line-height:46px!important;justify-content:flex-start!important}
        .pb-site-header .headerTopLeft a span,.pb-site-header .header__phones a span,.pb-site-header .header__email span{height:46px!important;display:flex!important;align-items:center!important;line-height:1!important;margin:0!important;padding:0!important}
        .pb-site-header .pb-top-icon{align-self:center!important;margin:0!important}
    }
    .pb-site-header .pb-header-callback,.pb-site-header .pb-header-callback span{text-decoration:none!important}
    @media(min-width:1025px){
        .pb-site-header .header__bottom__nav>nav a:before{display:none!important;content:none!important}
        .pb-site-header .header__bottom__nav>nav a{gap:9px!important}
        .pb-site-header .pb-bottom-nav-icon{width:19px!important;height:19px!important;flex:0 0 19px!important;display:block!important;fill:none!important;stroke:#32dc9b!important;stroke-width:1.55!important;stroke-linecap:round!important;stroke-linejoin:round!important}
        .pb-site-header .header__bottom__nav>nav a span{display:block!important}
    }
    @media(min-width:1025px){
        .pb-site-header .header__bottom__nav nav ul#mobileNavShop>li:before,.pb-site-header .header__bottom__nav nav ul#mobileNavShop>li:after,.pb-site-header .header__bottom__nav nav ul#mobileNavShop>li>a:before{content:none!important;display:none!important;width:0!important;height:0!important;margin:0!important;border:0!important;background:none!important;background-image:none!important}
        .pb-site-header .header__bottom__nav nav ul#mobileNavShop>li>a{background-image:none!important}
    }
    .pb-site-header .pb-header-action:after,.pb-site-header .pb-header-action:hover:after{content:none!important;display:none!important;width:0!important}
    .pb-site-header .pb-header-action{text-decoration:none!important;grid-template-rows:42px 22px!important}
    .pb-site-header .pb-header-action,.pb-site-header .pb-header-action:hover,.pb-site-header .pb-header-action-label,.pb-site-header .pb-header-action-label:hover{text-decoration:none!important}
    .pb-site-header .pb-header-action-icon{width:39px!important;height:39px!important;transform-style:preserve-3d!important;backface-visibility:visible!important;will-change:transform}
    @media(min-width:1025px){.pb-site-header .container{width:min(1350px,calc(100% - 32px))!important;max-width:1350px!important;box-sizing:border-box!important}}
    /* Final vertical rhythm: prevent clipped navigation and sagging header content */
    @media(min-width:1025px){
        .pb-site-header .headerTopWrap,.pb-site-header .headerTopWrap>.container,.pb-site-header .headerTop{height:46px!important;min-height:46px!important;box-sizing:border-box!important;overflow:visible!important}
        .pb-site-header .headerTop{display:flex!important;align-items:center!important;justify-content:space-between!important}
        .pb-site-header .headerTopLeft,.pb-site-header .headerTopLeft nav,.pb-site-header .headerTopLeft ul,.pb-site-header .headerTopRight,.pb-site-header .header__phones,.pb-site-header .header__social{height:100%!important;display:flex!important;align-items:center!important;margin-top:0!important;margin-bottom:0!important}
        .pb-site-header .headerTopLeft li,.pb-site-header .headerTopLeft a,.pb-site-header .header__phones a,.pb-site-header .header__email{height:100%!important;min-height:0!important;display:flex!important;align-items:center!important;line-height:1!important}
        .pb-site-header .header__middle__wrap,.pb-site-header .header__middle__wrap>.container,.pb-site-header .header__middle{height:168px!important;min-height:168px!important;box-sizing:border-box!important;overflow:visible!important}
        .pb-site-header .header__middle{align-items:center!important}
        .pb-site-header .header__middle__logo__wrap,.pb-site-header .header__middle__search__wrap,.pb-site-header .header__middle__right__top{height:168px!important;min-height:0!important;align-self:center!important;box-sizing:border-box!important}
        .pb-site-header .header__middle__logo__wrap,.pb-site-header .header__middle__search__wrap{justify-content:center!important}
        .pb-site-header .header__middle__right__top{display:flex!important;justify-content:center!important}
        .pb-site-header .header__bottom__nav__wrap,.pb-site-header .header__bottom__nav__wrap>.container,.pb-site-header .header__bottom__nav{height:64px!important;min-height:64px!important;box-sizing:border-box!important;overflow:visible!important}
        .pb-site-header .header__bottom__nav{display:flex!important;align-items:center!important;justify-content:space-between!important}
        .pb-site-header .header__bottom__catalog,.pb-site-header .header__burger__btn,.pb-site-header .header__bottom__nav>nav,.pb-site-header .header__bottom__nav>nav>ul,.pb-site-header .header__bottom__nav>nav>ul>li{height:64px!important;min-height:64px!important;box-sizing:border-box!important}
        .pb-site-header .header__bottom__catalog,.pb-site-header .header__burger__btn,.pb-site-header .header__bottom__nav>nav,.pb-site-header .header__bottom__nav>nav>ul,.pb-site-header .header__bottom__nav>nav>ul>li,.pb-site-header .header__bottom__nav>nav a{display:flex!important;align-items:center!important}
        .pb-site-header .header__bottom__nav>nav a{height:64px!important;min-height:64px!important;padding-top:0!important;padding-bottom:0!important;line-height:1!important;box-sizing:border-box!important;overflow:visible!important}
        .pb-site-header .header__burger__p,.pb-site-header .header__bottom__nav>nav a span{margin-top:0!important;margin-bottom:0!important;line-height:1.1!important}
        .pb-site-header .pb-bottom-nav-icon{align-self:center!important;margin-top:0!important;margin-bottom:0!important}
    }
    /* Catalog trigger keeps its label and morphs from hamburger to close icon. */
    .pb-site-header .header__burger{
        position:relative!important;width:24px!important;height:18px!important;flex:0 0 24px!important;
        background:none!important;transform:none!important
    }
    .pb-site-header .header__burger:before,
    .pb-site-header .header__burger:after,
    .pb-site-header .header__burger span{
        content:''!important;position:absolute!important;left:0!important;width:24px!important;height:2px!important;
        margin:0!important;background:#32dc9b!important;border:0!important;opacity:1!important;
        transform-origin:center!important;transition:top .24s ease,transform .24s ease,opacity .16s ease!important
    }
    .pb-site-header .header__burger:before{top:0!important}
    .pb-site-header .header__burger span{top:8px!important}
    .pb-site-header .header__burger:after{top:16px!important}
    body.pb-mega-menu-open .pb-site-header .header__burger:before,
    .pb-site-header #catalogBtn[aria-expanded="true"] .header__burger:before{top:8px!important;transform:rotate(45deg)!important}
    body.pb-mega-menu-open .pb-site-header .header__burger span,
    .pb-site-header #catalogBtn[aria-expanded="true"] .header__burger span{opacity:0!important;transform:scaleX(0)!important}
    body.pb-mega-menu-open .pb-site-header .header__burger:after,
    .pb-site-header #catalogBtn[aria-expanded="true"] .header__burger:after{top:8px!important;transform:rotate(-45deg)!important}
    body.pb-mega-menu-open .pb-site-header #catalogBtn,
    .pb-site-header #catalogBtn[aria-expanded="true"]{display:flex!important;visibility:visible!important;opacity:1!important}
    body.pb-mega-menu-open .pb-site-header #catalogBtn .header__burger__p,
    .pb-site-header #catalogBtn[aria-expanded="true"] .header__burger__p{display:block!important;visibility:visible!important;opacity:1!important;color:#fff!important}
    @media(min-width:1025px){
        body.pb-mega-menu-open .pb-site-header .header__bottom__nav__wrap{position:relative!important;z-index:90001!important}
        body.pb-mega-menu-open .pb-site-header .header__bottom__catalog{position:relative!important;z-index:90002!important}
        body.pb-mega-menu-open .pb-site-header #catalogBtn{background:linear-gradient(100deg,rgba(39,217,148,.22),rgba(39,217,148,.08))!important}
    }
    /* Final middle-header alignment: search and callback share one baseline. */
    @media(min-width:1025px){
        .pb-site-header .header__middle__search__title{font-weight:500!important}
        .pb-site-header .header__middle__right__wrap{transform:translateY(7px)!important}
        .pb-site-header .header_middle_right_bottom_wrap{margin-top:8px!important;transform:translateY(-15px)!important}
        .pb-site-header .pb-header-callback{height:48px!important;min-height:48px!important;box-sizing:border-box!important}
    }
    /* Absolute vertical centering for the upper utility bar. */
    @media(min-width:1025px){
        .pb-site-header .headerTopWrap,.pb-site-header .headerTopWrap>.container,.pb-site-header .headerTop{height:46px!important;min-height:46px!important;padding-top:0!important;padding-bottom:0!important}
        .pb-site-header .headerTopLeft,.pb-site-header .headerTopLeft nav,.pb-site-header .headerTopLeft ul,.pb-site-header .headerTopLeft li,.pb-site-header .headerTopRight,.pb-site-header .header__phones,.pb-site-header .header__social{height:46px!important;min-height:46px!important;margin-top:0!important;margin-bottom:0!important;padding-top:0!important;padding-bottom:0!important;align-items:center!important}
        .pb-site-header .headerTopLeft a,.pb-site-header .header__phones a,.pb-site-header .header__email,.pb-site-header .header__social a{height:46px!important;min-height:46px!important;margin:0!important;padding-top:0!important;padding-bottom:0!important;display:flex!important;align-items:center!important;justify-content:center!important;line-height:1!important;transform:none!important}
        .pb-site-header .headerTopLeft a span,.pb-site-header .header__phones a span,.pb-site-header .header__email span{width:auto!important;height:auto!important;min-height:0!important;margin:0!important;padding:0!important;display:block!important;line-height:1.15!important;transform:none!important}
        .pb-site-header .pb-top-icon,.pb-site-header .header__social svg{margin:0!important;align-self:center!important;transform:none!important}
    }
    /* Absolute vertical centering for the lower navigation bar. */
    @media(min-width:1025px){
        .pb-site-header .header__bottom__nav__wrap,.pb-site-header .header__bottom__nav__wrap>.container,.pb-site-header .header__bottom__nav{height:64px!important;min-height:64px!important;padding-top:0!important;padding-bottom:0!important}
        .pb-site-header .header__bottom__catalog,.pb-site-header .header__burger__btn,.pb-site-header .header__bottom__nav>nav,.pb-site-header .header__bottom__nav>nav>ul,.pb-site-header .header__bottom__nav>nav>ul>li,.pb-site-header .header__bottom__nav>nav>ul>li>a{height:64px!important;min-height:64px!important;margin-top:0!important;margin-bottom:0!important;padding-top:0!important;padding-bottom:0!important;box-sizing:border-box!important;display:flex!important;align-items:center!important}
        .pb-site-header .header__bottom__nav>nav>ul{position:relative!important;isolation:isolate;overflow:hidden;margin:0!important;padding-left:0!important;list-style:none!important}
        .pb-site-header .header__bottom__nav>nav>ul>li:not(.pb-nav-hover-fill){position:relative;z-index:2}
        .pb-site-header .header__bottom__nav>nav>ul>.pb-nav-hover-fill{position:absolute!important;z-index:1;left:0;top:0;width:0;height:64px;display:block!important;border:0!important;background:linear-gradient(110deg,#117a53,#20c883);opacity:0;transform:translateX(0);transition:transform .34s cubic-bezier(.22,1,.36,1),width .34s cubic-bezier(.22,1,.36,1),opacity .18s ease;pointer-events:none;will-change:transform,width}
        .pb-site-header .header__bottom__nav>nav>ul>li>a:hover,.pb-site-header .header__bottom__nav>nav>ul>li>a:focus-visible{color:#fff!important;background:transparent!important}
        .pb-site-header .header__bottom__nav>nav>ul>li>a.pb-nav-current{color:#fff!important;background:transparent!important}
        .pb-site-header .header__bottom__nav>nav>ul>li>a:hover .pb-bottom-nav-icon,.pb-site-header .header__bottom__nav>nav>ul>li>a:focus-visible .pb-bottom-nav-icon,.pb-site-header .header__bottom__nav>nav>ul>li>a.pb-nav-current .pb-bottom-nav-icon{stroke:#fff!important}
        .pb-site-header .header__burger__btn,.pb-site-header .header__bottom__nav>nav>ul>li>a{justify-content:center!important;line-height:1!important;transform:none!important}
        .pb-site-header .header__burger,.pb-site-header .header__burger__p,.pb-site-header .pb-bottom-nav-icon,.pb-site-header .header__bottom__nav>nav a span{margin-top:0!important;margin-bottom:0!important;align-self:center!important;line-height:1!important;transform:none!important}
    }

    /* ═══════════════════════════════════════════════════════════
       MOBILE HEADER V2 — самостоятельная версия, без перестановки
       элементов десктопной шапки.
       ═══════════════════════════════════════════════════════════ */
    .pb-mobile-header{display:none}
    @media(max-width:1024px){
        html,body{max-width:100%;overflow-x:clip}
        body{padding-bottom:68px!important}
        .pb-site-header>header,.pb-site-header>.sn,.pb-site-header>.pb-sticky-search-modal{display:none!important}
        .pb-mobile-header{position:relative;z-index:120000;display:block;width:100%;color:#142019;background:#fff;font-family:'GilroyMedium',Tahoma,Verdana,sans-serif}
        .pbm-primary{position:relative;z-index:5;height:72px;display:grid;grid-template-columns:48px 64px minmax(8px,1fr) 48px 58px 54px;align-items:center;gap:3px;padding:0 10px;box-sizing:border-box;border-bottom:1px solid #dce5e0;background:#fff;box-shadow:0 8px 24px rgba(5,30,18,.08)}
        .pb-mobile-header.pbm-smart-active{padding-top:72px}
        .pb-mobile-header.pbm-smart-active .pbm-primary{position:fixed;z-index:130000;left:0;right:0;top:0;opacity:0;pointer-events:none;transform:translate3d(0,calc(-100% - 12px),0);transition:transform .34s cubic-bezier(.22,1,.36,1),opacity .2s ease;will-change:transform}
        .pb-mobile-header.pbm-smart-active.pbm-smart-visible .pbm-primary{opacity:1;pointer-events:auto;transform:translate3d(0,0,0)}
        .pbm-icon-button,.pbm-menu-button,.pbm-drawer-head button{padding:0;border:0;color:#111b16;background:transparent;cursor:pointer;font:inherit}
        .pbm-icon-button{width:44px;height:48px;display:grid;place-items:center}
        .pbm-icon-button svg{width:27px;height:27px;fill:none;stroke:currentColor;stroke-width:1.8;stroke-linecap:round;stroke-linejoin:round}
        .pbm-hamburger{position:relative;width:25px;height:17px;display:block;border-top:2px solid currentColor;border-bottom:2px solid currentColor;box-sizing:border-box}
        .pbm-hamburger:before{content:'';position:absolute;left:0;top:6px;width:17px;height:2px;background:currentColor;transition:width .22s,transform .22s}
        .pbm-catalog-button[aria-expanded="true"] .pbm-hamburger{border-color:transparent}
        .pbm-catalog-button[aria-expanded="true"] .pbm-hamburger:before{top:6px;width:25px;transform:rotate(45deg)}
        .pbm-catalog-button[aria-expanded="true"] .pbm-hamburger:after{content:'';position:absolute;left:0;top:6px;width:25px;height:2px;background:currentColor;transform:rotate(-45deg)}
        .pbm-logo{width:64px;height:64px;display:grid;place-items:center;text-decoration:none}
        .pbm-logo img{display:block;width:60px;height:58px;object-fit:contain;filter:drop-shadow(0 5px 6px rgba(0,0,0,.12))}
        .pbm-account{height:60px;display:flex;flex-direction:column;align-items:center;justify-content:center;gap:2px;color:#17211c;text-decoration:none;font-size:9px;line-height:1;white-space:nowrap}
        .pbm-account svg{width:29px;height:29px;fill:none;stroke:currentColor;stroke-width:1.35;stroke-linecap:round;stroke-linejoin:round}
        .pbm-menu-button{position:relative;width:50px;height:50px;display:grid;place-items:center;color:#fff;background:linear-gradient(145deg,#132019,#07100b);font-size:10px}
        .pbm-menu-button:before,.pbm-menu-button:after{content:'';position:absolute;width:10px;height:10px;border-color:#31d995;pointer-events:none}
        .pbm-menu-button:before{left:0;top:0;border-left:1px solid;border-top:1px solid}
        .pbm-menu-button:after{right:0;bottom:0;border-right:1px solid;border-bottom:1px solid}
        .pbm-menu-button i{position:absolute;left:8px;right:8px;bottom:7px;height:1px;background:#31d995;transform:scaleX(.45);transition:transform .25s}
        .pbm-menu-button[aria-expanded="true"] i{transform:scaleX(1)}

        .pbm-brand-strip{position:relative;z-index:4;min-height:89px;display:flex;flex-direction:column;align-items:center;justify-content:center;gap:9px;padding:9px 52px 11px;box-sizing:border-box;border-bottom:2px solid #1fc985;overflow:hidden;background-color:#f1f4f2;background-image:radial-gradient(circle,rgba(13,97,60,.13) 1px,transparent 1.15px);background-size:18px 18px}
        .pbm-brand-strip:before{content:'PANDBOX.KZ';position:absolute;left:50%;bottom:-14px;color:rgba(7,60,36,.035);font:900 52px/1 Arial,sans-serif;letter-spacing:-.07em;white-space:nowrap;transform:translateX(-50%);pointer-events:none}
        .pbm-brand-strip strong{position:relative;z-index:1;color:#29332e;font-family:'MagistralMedium',Tahoma,sans-serif;font-size:clamp(15px,4.2vw,19px);font-weight:500;line-height:1.1;text-align:center;white-space:nowrap}
        .pbm-callback{position:relative;z-index:1;min-height:29px;display:flex;align-items:center;gap:8px;padding:0;border:0;border-bottom:1px solid rgba(15,91,57,.38);color:#3d4a43;background:transparent;font:500 14px/1 'GilroyMedium',Tahoma,sans-serif;cursor:pointer}
        .pbm-callback svg{width:20px;height:20px;fill:none;stroke:#14a66d;stroke-width:1.6;stroke-linecap:round;stroke-linejoin:round}
        .pbm-callback i{width:6px;height:6px;border-right:1px solid #14a66d;border-top:1px solid #14a66d;transform:rotate(45deg)}
        .pbm-reticle{position:absolute;top:50%;width:15px;height:15px;border:1px solid rgba(6,65,39,.45);border-radius:50%!important;transform:translateY(-50%)}
        .pbm-reticle:before,.pbm-reticle:after{content:'';position:absolute;background:rgba(6,65,39,.5)}
        .pbm-reticle:before{left:50%;top:-6px;width:1px;height:25px}
        .pbm-reticle:after{left:-6px;top:50%;width:25px;height:1px}
        .pbm-reticle-left{left:22px}.pbm-reticle-right{right:22px}

        .pbm-search-layer,.pbm-drawer-layer{position:fixed;z-index:160000;inset:0;visibility:hidden;opacity:0;pointer-events:none}
        .pbm-search-layer.open,.pbm-drawer-layer.open{visibility:visible;opacity:1;pointer-events:auto}
        .pbm-layer-backdrop{position:absolute;inset:0;width:100%;height:100%;padding:0;border:0;background:rgba(3,12,7,.76);backdrop-filter:blur(7px);-webkit-backdrop-filter:blur(7px)}
        .pbm-search-live{position:relative;z-index:2;margin:82px 12px 0}
        .pbm-search-live .pb-search-shell{width:100%;overflow:visible!important}
        .pbm-search-live .pb-search-form{position:relative!important;z-index:2!important;width:100%!important;height:58px!important;min-height:58px!important;display:flex!important;align-items:stretch!important;margin:0!important;overflow:hidden!important;box-sizing:border-box!important;border:1px solid #26d393!important;background:#fff!important;box-shadow:0 24px 55px rgba(0,0,0,.28)!important}
        .pbm-search-live .pb-search-input{width:100%!important;min-width:0!important;height:auto!important;min-height:0!important;flex:1 1 auto!important;align-self:stretch!important;margin:0!important;padding:0 104px 0 45px!important;border:0!important;outline:0!important;background:#fff!important;box-shadow:none!important;color:#17211c!important;font:500 14px 'GilroyRegular',Tahoma,sans-serif!important}
        .pbm-search-live .pb-search-icon{left:15px!important;top:50%!important}
        .pbm-search-live .pb-search-clear{right:78px!important;top:50%!important}
        .pbm-search-live .pb-search-status{right:86px!important;top:50%!important}
        .pbm-search-live .pb-search-submit{position:absolute;z-index:4;right:0;top:0;bottom:0;width:72px;height:auto;display:block;border:0;color:#06150e;background:linear-gradient(135deg,#38dda3,#18bd7d);font:700 12px 'GilroyMedium',Tahoma,sans-serif;cursor:pointer}
        .pbm-search-live .pb-search-overlay{display:none!important}
        .pbm-search-live .pb-search-panel{position:absolute!important;top:calc(100% + 8px)!important;left:0!important;right:0!important;width:100%!important;max-height:calc(100vh - 168px)!important;border-radius:0 0 12px 12px!important}

        .pbm-drawer{position:absolute;z-index:2;left:0;top:0;bottom:0;width:min(89vw,390px);display:flex;flex-direction:column;color:#eaf3ee;background:linear-gradient(155deg,#102018,#07100b 72%);box-shadow:28px 0 70px rgba(0,0,0,.42);transform:translateX(-104%)}
        .pbm-menu-drawer{left:auto;right:0;transform:translateX(104%)}
        .pbm-drawer.is-active{transform:translateX(0)}
        .pbm-drawer-head{height:86px;flex:0 0 86px;display:flex;align-items:center;justify-content:space-between;padding:0 18px 0 22px;border-bottom:1px solid rgba(47,217,151,.22);box-sizing:border-box;background:linear-gradient(100deg,rgba(47,217,151,.12),transparent)}
        .pbm-drawer-head>div{display:flex;flex-direction:column;gap:7px}.pbm-drawer-head small,.pbm-menu-contact small{color:#39da98;font:700 8px/1 Arial,sans-serif;letter-spacing:.2em}.pbm-drawer-head strong{color:#fff;font:500 23px/1 'MagistralMedium',Tahoma,sans-serif;text-transform:uppercase}
        .pbm-drawer-head button{position:relative;width:42px;height:42px;border:1px solid rgba(47,217,151,.35);color:#39da98}
        .pbm-drawer-head button:before,.pbm-drawer-head button:after{content:'';position:absolute;left:11px;top:20px;width:19px;height:1px;background:currentColor;transform:rotate(45deg)}
        .pbm-drawer-head button:after{transform:rotate(-45deg)}
        .pbm-drawer-body{flex:1;min-height:0;overflow:auto;overscroll-behavior:contain}.pbm-drawer-body::-webkit-scrollbar{width:3px}.pbm-drawer-body::-webkit-scrollbar-thumb{background:#28d596}
        .pbm-all-products{min-height:58px;display:flex;align-items:center;justify-content:space-between;padding:0 22px;border-bottom:1px solid rgba(255,255,255,.09);color:#fff;background:rgba(47,217,151,.11);font-size:15px;text-decoration:none}.pbm-all-products b{color:#39da98;font-size:12px}
        .pbm-category-row{min-height:57px;display:grid;grid-template-columns:minmax(0,1fr) 50px;border-bottom:1px solid rgba(255,255,255,.08)}
        .pbm-category-row>a{min-width:0;display:grid;grid-template-columns:28px minmax(0,1fr);align-items:center;gap:7px;padding:10px 8px 10px 17px;color:#dbe7e1;font-size:13px;line-height:1.2;text-decoration:none}.pbm-category-number{color:#39da98;font:700 8px Arial;letter-spacing:.08em}
        .pbm-category-row>button{position:relative;border:0;border-left:1px solid rgba(255,255,255,.07);color:#39da98;background:transparent;cursor:pointer}.pbm-category-row>button i:before,.pbm-category-row>button i:after{content:'';position:absolute;left:18px;top:27px;width:14px;height:1px;background:currentColor}.pbm-category-row>button i:after{transform:rotate(90deg);transition:transform .22s}.pbm-category-row>button[aria-expanded="true"] i:after{transform:rotate(0)}
        .pbm-subcategories{height:0;overflow:hidden;background:rgba(255,255,255,.035)}.pbm-subcategories a{display:block;padding:11px 22px 11px 52px;border-bottom:1px solid rgba(255,255,255,.05);color:#9eb1a7;font-size:12px;text-decoration:none}.pbm-subcategories a:before{content:'—';margin-right:8px;color:#39da98}
        .pbm-main-links a{min-height:60px;display:flex;align-items:center;justify-content:space-between;padding:0 23px;border-bottom:1px solid rgba(255,255,255,.08);color:#e2ece7;font-size:16px;text-decoration:none}.pbm-main-links a i{color:#39da98;font:700 8px Arial;font-style:normal;letter-spacing:.12em}
        .pbm-link-label{display:inline-flex;align-items:center;gap:12px}
        .pbm-link-icon{width:19px;height:19px;flex:0 0 19px;fill:none;stroke:currentColor;stroke-width:1.8;stroke-linecap:round;stroke-linejoin:round}
        .pbm-main-links a.pbm-link-sale{color:#e33b49}.pbm-main-links a.pbm-link-sale .pbm-link-icon{color:#e33b49}
        .pbm-main-links a.pbm-link-new{color:#35ef9e}.pbm-main-links a.pbm-link-new .pbm-link-icon{color:#35ef9e}
        .pbm-main-links a.pbm-link-hit{color:#f28c18}.pbm-main-links a.pbm-link-hit .pbm-link-icon{color:#f28c18}
        .pbm-menu-contact{display:flex;flex-direction:column;gap:10px;padding:24px 23px}.pbm-menu-contact a{color:#e7f1ec;font-size:13px;text-decoration:none}.pbm-menu-contact a:last-child{color:#39da98}

        .pbm-bottom-dock{position:fixed;z-index:140000;left:0;right:0;bottom:0;height:66px;display:grid;grid-template-columns:repeat(5,1fr);padding-bottom:env(safe-area-inset-bottom);border-top:1px solid #16b776;background:rgba(7,16,11,.97);box-shadow:0 -9px 28px rgba(0,0,0,.18);backdrop-filter:blur(10px);-webkit-backdrop-filter:blur(10px)}
        .pb-cart-count-root[data-pb-cart-count="mobile"],.pb-wishlist-count-root[data-pb-wishlist-count="mobile"]{display:contents}
        .pbm-dock-link{min-width:0;display:flex;flex-direction:column;align-items:center;justify-content:center;gap:3px;padding:0;border:0;border-right:1px solid rgba(255,255,255,.07);color:#b9c9c0;background:transparent;font:500 9px/1 'GilroyMedium',Tahoma,sans-serif;text-decoration:none;cursor:pointer}
        .pbm-dock-link:last-child{border-right:0}.pbm-dock-icon{position:relative;width:27px;height:27px;display:grid;place-items:center}.pbm-dock-icon>svg{width:24px;height:24px;fill:none;stroke:#35d99a;stroke-width:1.6;stroke-linecap:round;stroke-linejoin:round}.pbm-dock-icon>b{position:absolute;right:-8px;top:-6px;min-width:18px;height:18px;display:grid;place-items:center;padding:0 3px;box-sizing:border-box;color:#06140d;background:#36dda2;font:700 10px Arial;border:2px solid #0a1510}.pbm-dock-whatsapp{color:#fff;background:linear-gradient(145deg,rgba(43,208,139,.2),rgba(43,208,139,.05))}.pbm-dock-whatsapp .pb-whatsapp-icon{width:26px;height:26px;fill:#35d99a!important;stroke:none!important}
        .pbm-dock-callback{font-family:'GilroyMedium',Tahoma,sans-serif}

        .pb-contact-widget,.pb-scroll-meter{display:none!important}
    }
    @media(max-width:380px){
        .pbm-primary{grid-template-columns:43px 56px minmax(2px,1fr) 42px 52px 48px;padding-inline:5px}
        .pbm-logo,.pbm-logo img{width:54px}.pbm-menu-button{width:46px}.pbm-account{font-size:8px}.pbm-brand-strip{padding-inline:38px}.pbm-brand-strip strong{font-size:14px}
    }
    @media(max-width:340px){.pbm-brand-strip strong{max-width:250px;white-space:normal}}
    @media(prefers-reduced-motion:reduce){.pb-mobile-header *{animation:none!important;transition:none!important}}
</style>

@push('scripts')
<script data-navigate-once>
(function(){
    if(window.__pbMobileHeaderBooted)return;
    window.__pbMobileHeaderBooted=true;
    var lockedScroll=0;

    function root(){return document.querySelector('[data-pb-mobile-header]');}
    function setBodyLock(lock){
        if(lock){
            if(document.body.classList.contains('pbm-overlay-open'))return;
            lockedScroll=window.scrollY||0;
            document.body.classList.add('pbm-overlay-open');
            document.body.style.position='fixed';
            document.body.style.top=(-lockedScroll)+'px';
            document.body.style.left='0';
            document.body.style.right='0';
            document.body.style.width='100%';
        }else{
            if(!document.body.classList.contains('pbm-overlay-open'))return;
            document.body.classList.remove('pbm-overlay-open');
            document.body.style.position='';document.body.style.top='';document.body.style.left='';document.body.style.right='';document.body.style.width='';
            window.scrollTo(0,lockedScroll);
        }
    }
    function animateLayer(layer,open){
        if(!layer)return;
        if(typeof gsap==='undefined'||window.matchMedia('(prefers-reduced-motion: reduce)').matches){
            layer.classList.toggle('open',open);return;
        }
        var search=layer.querySelector('.pbm-search-form,.pbm-search-live');
        gsap.killTweensOf([layer,search]);
        if(open){
            layer.classList.add('open');
            gsap.fromTo(layer,{autoAlpha:0},{autoAlpha:1,duration:.2,ease:'power2.out'});
            if(search)gsap.fromTo(search,{y:-24,autoAlpha:0},{y:0,autoAlpha:1,duration:.38,ease:'power3.out'});
        }else{
            gsap.to(layer,{autoAlpha:0,duration:.18,ease:'power2.in',onComplete:function(){layer.classList.remove('open');layer.style.opacity='';layer.style.visibility='';}});
        }
    }
    function closeAll(immediate){
        var r=root();if(!r)return;
        var drawerLayer=r.querySelector('[data-pbm-drawer-layer]');
        var searchLayer=r.querySelector('[data-pbm-search-layer]');
        var drawers=r.querySelectorAll('[data-pbm-drawer]');
        r.querySelectorAll('[data-pbm-open],[data-pbm-search-open]').forEach(function(button){button.setAttribute('aria-expanded','false');});
        if(typeof gsap!=='undefined')gsap.killTweensOf(drawers);
        if(immediate){
            [drawerLayer,searchLayer].forEach(function(layer){if(layer){layer.classList.remove('open');layer.setAttribute('aria-hidden','true');layer.style.opacity='';layer.style.visibility='';}});
            drawers.forEach(function(drawer){drawer.style.transform='';});
            setBodyLock(false);return;
        }
        var openDrawer=drawerLayer&&drawerLayer.querySelector('[data-pbm-drawer].is-active');
        if(openDrawer&&typeof gsap!=='undefined'){
            gsap.to(openDrawer,{xPercent:openDrawer.classList.contains('pbm-menu-drawer')?104:-104,duration:.28,ease:'power3.in'});
        }
        if(drawerLayer){drawerLayer.setAttribute('aria-hidden','true');animateLayer(drawerLayer,false);}
        if(searchLayer&&searchLayer.classList.contains('open')){searchLayer.setAttribute('aria-hidden','true');animateLayer(searchLayer,false);}
        window.setTimeout(function(){drawers.forEach(function(drawer){drawer.classList.remove('is-active');drawer.style.transform='';});setBodyLock(false);},220);
    }
    function openDrawer(name,button){
        var r=root();if(!r)return;
        closeAll(true);
        var layer=r.querySelector('[data-pbm-drawer-layer]');
        var drawer=r.querySelector('[data-pbm-drawer="'+name+'"]');
        if(!layer||!drawer)return;
        drawer.classList.add('is-active');button.setAttribute('aria-expanded','true');layer.setAttribute('aria-hidden','false');setBodyLock(true);animateLayer(layer,true);
        if(typeof gsap!=='undefined'){
            var from=drawer.classList.contains('pbm-menu-drawer')?104:-104;
            gsap.fromTo(drawer,{xPercent:from},{xPercent:0,duration:.46,ease:'power3.out'});
            gsap.fromTo(drawer.querySelectorAll('.pbm-category-item,.pbm-main-links a,.pbm-menu-contact'),{x:from>0?22:-22,autoAlpha:0},{x:0,autoAlpha:1,duration:.3,stagger:.035,delay:.14,ease:'power2.out'});
        }
    }
    function openSearch(button){
        var r=root();if(!r)return;
        closeAll(true);
        var layer=r.querySelector('[data-pbm-search-layer]');if(!layer)return;
        button.setAttribute('aria-expanded','true');layer.setAttribute('aria-hidden','false');setBodyLock(true);animateLayer(layer,true);
        window.setTimeout(function(){var input=layer.querySelector('input');if(input)input.focus();},100);
    }
    function toggleCategory(button){
        var item=button.closest('.pbm-category-item');var panel=item&&item.querySelector('.pbm-subcategories');if(!panel)return;
        var open=button.getAttribute('aria-expanded')==='true';button.setAttribute('aria-expanded',open?'false':'true');
        if(typeof gsap!=='undefined')gsap.to(panel,{height:open?0:'auto',duration:.3,ease:'power2.inOut'});else panel.style.height=open?'0':'auto';
    }
    document.addEventListener('click',function(event){
        if(window.innerWidth>1024)return;
        var open=event.target.closest&&event.target.closest('[data-pbm-open]');if(open){event.preventDefault();openDrawer(open.getAttribute('data-pbm-open'),open);return;}
        var search=event.target.closest&&event.target.closest('[data-pbm-search-open]');if(search){event.preventDefault();openSearch(search);return;}
        var category=event.target.closest&&event.target.closest('[data-pbm-category-toggle]');if(category){event.preventDefault();toggleCategory(category);return;}
        if(event.target.closest&&event.target.closest('[data-pbm-close]')){event.preventDefault();closeAll(false);}
    });
    document.addEventListener('keydown',function(event){if(event.key==='Escape')closeAll(false);});
    document.addEventListener('livewire:navigating',function(){closeAll(true);});
    window.addEventListener('resize',function(){if(window.innerWidth>1024)closeAll(true);},{passive:true});
    window.addEventListener('pageshow',function(){closeAll(true);});
})();
</script>
<script data-navigate-once>
(function(){
    if(window.__pbMobileSmartHeaderBooted)return;
    window.__pbMobileSmartHeaderBooted=true;
    var previousY=window.scrollY||0;
    var ticking=false;
    var revealThreshold=0;
    var upwardTravel=0;

    function mobileHeader(){return document.querySelector('[data-pb-mobile-header]');}
    function calculateThreshold(){
        var header=mobileHeader();
        if(!header)return 0;
        return Math.max(1,Math.round(header.offsetTop||0));
    }
    function resetSmartHeader(){
        var header=mobileHeader();
        if(header)header.classList.remove('pbm-smart-active','pbm-smart-visible');
        previousY=window.scrollY||0;
        upwardTravel=0;
        revealThreshold=calculateThreshold();
    }
    function updateSmartHeader(){
        ticking=false;
        var header=mobileHeader();
        if(!header||window.innerWidth>1024){resetSmartHeader();return;}
        var currentY=Math.max(0,window.scrollY||0);
        var delta=currentY-previousY;

        if(currentY<=revealThreshold){
            header.classList.remove('pbm-smart-active','pbm-smart-visible');
            upwardTravel=0;
        }else{
            header.classList.add('pbm-smart-active');
            if(delta>.5){
                upwardTravel=0;
                header.classList.remove('pbm-smart-visible');
            }else if(delta<-.5){
                upwardTravel+=Math.min(-delta,24);
                if(upwardTravel>=18)header.classList.add('pbm-smart-visible');
            }
        }
        previousY=currentY;
    }
    function requestSmartHeaderUpdate(){
        if(ticking)return;
        ticking=true;
        window.requestAnimationFrame(updateSmartHeader);
    }
    function prepareSmartHeader(){
        resetSmartHeader();
        window.setTimeout(function(){revealThreshold=calculateThreshold();requestSmartHeaderUpdate();},180);
    }

    window.addEventListener('scroll',requestSmartHeaderUpdate,{passive:true});
    window.addEventListener('resize',prepareSmartHeader,{passive:true});
    window.addEventListener('pageshow',prepareSmartHeader);
    document.addEventListener('livewire:navigating',resetSmartHeader);
    document.addEventListener('livewire:navigated',prepareSmartHeader);
    if(document.readyState==='loading')document.addEventListener('DOMContentLoaded',prepareSmartHeader,{once:true});
    else prepareSmartHeader();
})();
</script>
<script>
(function() {
    'use strict';

    /* ══════════════════════════════════════════════════════════
       ЗАЩИТА ОТ ПОВТОРНОГО ЗАПУСКА.
       Этот <script> лежит внутри Livewire-компонента (header-component)
       и подключён через директиву push-стека Laravel. В отличие от внешних <script src>
       с data-navigate-once, инлайновые скрипты компонентов ВЫПОЛНЯЮТСЯ
       ЗАНОВО при каждом wire:navigate — Livewire пересоздаёт содержимое
       <script> в DOM и браузер честно исполняет его снова.

       Без этой защиты за N переходов по сайту накапливается N копий
       document.addEventListener('click', ...), document.addEventListener
       ('mouseenter', ..., true) и т.д. При одном клике срабатывали СРАЗУ
       несколько openMenu(), запускавшие параллельные GSAP-анимации на
       одни и те же элементы — они обрывали друг друга на середине,
       из-за чего часть категорий застревала на opacity:0.
       ══════════════════════════════════════════════════════════ */
    if (window.__pbMegaMenuBooted) return;
    window.__pbMegaMenuBooted = true;

    document.addEventListener('pointerover', function(e) {
        var button = e.target.closest && e.target.closest('.pb-animated-action');
        if (!button || button.contains(e.relatedTarget) || typeof gsap === 'undefined') return;
        button.classList.add('pb-action-active');
        gsap.to(button, { y: -3, scale: 1.015, duration: .24, ease: 'power2.out', overwrite: 'auto' });
        var arrow = button.querySelector('.pb-action-arrow, .pb-search-submit > svg');
        if (arrow) gsap.to(arrow, { x: 4, duration: .24, ease: 'power2.out', overwrite: 'auto' });
    });

    document.addEventListener('pointerout', function(e) {
        var button = e.target.closest && e.target.closest('.pb-animated-action');
        if (!button || button.contains(e.relatedTarget) || typeof gsap === 'undefined') return;
        button.classList.remove('pb-action-active');
        gsap.to(button, { y: 0, scale: 1, duration: .32, ease: 'power2.out', overwrite: 'auto' });
        var arrow = button.querySelector('.pb-action-arrow, .pb-search-submit > svg');
        if (arrow) gsap.to(arrow, { x: 0, duration: .24, ease: 'power2.out', overwrite: 'auto' });
    });

    function moveBottomNavFill(link) {
        var list = link && link.closest('#mobileNavShop');
        var fill = list && list.querySelector('.pb-nav-hover-fill');
        if (!list || !fill) return;
        var listRect = list.getBoundingClientRect();
        var itemRect = link.parentElement.getBoundingClientRect();
        fill.style.width = itemRect.width + 'px';
        fill.style.transform = 'translateX(' + (itemRect.left - listRect.left + list.scrollLeft) + 'px)';
        fill.style.opacity = '1';
    }

    function hideBottomNavFill(list) {
        var fill = list && list.querySelector('.pb-nav-hover-fill');
        var current = list && list.querySelector('li > a.pb-nav-current');
        if (current) {
            moveBottomNavFill(current);
        } else if (fill) {
            fill.style.opacity = '0';
        }
    }

    var bottomNavActiveLink = null;

    document.addEventListener('pointermove', function(e) {
        var link = e.target.closest && e.target.closest('#mobileNavShop > li > a');
        if (link) {
            if (link !== bottomNavActiveLink) {
                bottomNavActiveLink = link;
                moveBottomNavFill(link);
            }
            return;
        }
        if (bottomNavActiveLink) {
            var list = bottomNavActiveLink.closest('#mobileNavShop');
            if (!list || !list.contains(e.target)) {
                hideBottomNavFill(list);
                bottomNavActiveLink = null;
            }
        }
    });

    document.addEventListener('pointerover', function(e) {
        var link = e.target.closest && e.target.closest('#mobileNavShop > li > a');
        if (!link || link.contains(e.relatedTarget)) return;
        bottomNavActiveLink = link;
        moveBottomNavFill(link);
    });

    document.addEventListener('pointerout', function(e) {
        var list = e.target.closest && e.target.closest('#mobileNavShop');
        if (!list || list.contains(e.relatedTarget)) return;
        hideBottomNavFill(list);
        bottomNavActiveLink = null;
    });

    document.addEventListener('focusin', function(e) {
        var link = e.target.closest && e.target.closest('#mobileNavShop > li > a');
        if (link) {
            bottomNavActiveLink = link;
            moveBottomNavFill(link);
        }
    });

    document.addEventListener('focusout', function(e) {
        var list = e.target.closest && e.target.closest('#mobileNavShop');
        if (!list || list.contains(e.relatedTarget)) return;
        hideBottomNavFill(list);
        bottomNavActiveLink = null;
    });

    function syncBottomNavCurrent() {
        document.querySelectorAll('#mobileNavShop').forEach(function(list) {
            var current = list.querySelector('li > a.pb-nav-current');
            if (current) moveBottomNavFill(current);
        });
    }

    requestAnimationFrame(syncBottomNavCurrent);
    document.addEventListener('livewire:navigated', function() {
        bottomNavActiveLink = null;
        requestAnimationFrame(syncBottomNavCurrent);
    });
    window.addEventListener('resize', function() {
        var link = bottomNavActiveLink && document.documentElement.contains(bottomNavActiveLink)
            ? bottomNavActiveLink
            : document.querySelector('#mobileNavShop li > a.pb-nav-current');
        if (link) moveBottomNavFill(link);
    }, { passive: true });

    function $mm(id) { return document.getElementById(id); }

    var activeIdx = 0;
    var isOpen = false;
    var menuTimeline = null;
    var bodyOverflowBeforeMenu = '';
    var bodyPaddingBeforeMenu = '';

    function positionMenu() {
        var menu = $mm('megaMenu');
        var navWrap = document.querySelector('.header__bottom__nav__wrap');
        if (!menu || !navWrap) return;
        var sticky = $mm('stickyNav');
        var anchor = sticky && sticky.classList.contains('sn-visible') ? sticky : navWrap;
        var rect = anchor.getBoundingClientRect();
        menu.style.top = Math.max(rect.bottom + (anchor === sticky ? 8 : 0), 0) + 'px';
    }

    function switchCategory(idx) {
        var cats = document.querySelectorAll('.megamenu-cat');
        var panels = document.querySelectorAll('.megamenu-subpanel');
        cats.forEach(function(el) { el.classList.remove('active'); });
        panels.forEach(function(el) { el.classList.remove('active'); });

        var cat = document.querySelector('.megamenu-cat[data-idx="' + idx + '"]');
        var panel = $mm('megap-' + idx);
        if (cat) cat.classList.add('active');
        if (panel) {
            panel.classList.add('active');
            var head = panel.querySelector('.megamenu-subpanel-head');
            var cols = panel.querySelectorAll('.megamenu-subcol');
            if (typeof gsap !== 'undefined') {
                gsap.killTweensOf([panel, head, cols]);
                gsap.set([panel, head, cols], { clearProps: 'all' });
                gsap.fromTo(panel, { autoAlpha: 0 }, { autoAlpha: 1, duration: .16, ease: 'power1.out', clearProps: 'opacity,visibility' });
                if (head) gsap.fromTo(head, { y: 10, autoAlpha: 0 }, { y: 0, autoAlpha: 1, duration: .28, ease: 'power3.out', clearProps: 'transform,opacity,visibility' });
                if (cols.length) gsap.fromTo(cols,
                    { y: 18, autoAlpha: 0 },
                    { y: 0, autoAlpha: 1, duration: .34, stagger: .035, ease: 'power3.out', clearProps: 'transform,opacity,visibility' }
                );
                if (cat) gsap.fromTo(cat.querySelector('.megamenu-cat-icon'), { scale: .88 }, { scale: 1, duration: .3, ease: 'back.out(1.8)', clearProps: 'transform' });
            }
        }
        activeIdx = idx;
    }

    function openMenu() {
        if (isOpen) return;
        var menu = $mm('megaMenu');
        var backdrop = $mm('megaBackdrop');
        if (!menu) return;

        isOpen = true;
        document.body.classList.add('pb-mega-menu-open');
        activeIdx = 0;
        positionMenu();
        bodyOverflowBeforeMenu = document.body.style.overflow;
        bodyPaddingBeforeMenu = document.body.style.paddingRight;
        var scrollbarWidth = Math.max(0, window.innerWidth - document.documentElement.clientWidth);
        if (scrollbarWidth > 0) {
            var currentPadding = parseFloat(window.getComputedStyle(document.body).paddingRight) || 0;
            document.body.style.paddingRight = (currentPadding + scrollbarWidth) + 'px';
        }

        menu.classList.add('open');
        menu.setAttribute('aria-hidden', 'false');
        if (backdrop) backdrop.classList.add('active');
        document.body.style.overflow = 'hidden';
        document.querySelectorAll('#catalogBtn, #snCatalogBtn').forEach(function(btn) {
            btn.setAttribute('aria-expanded', 'true');
        });

        if (typeof gsap !== 'undefined') {
            var heading = menu.querySelector('.megamenu-heading');
            var quickLinks = menu.querySelectorAll('.megamenu-quick-link');
            var cats = menu.querySelectorAll('.megamenu-cat');
            var close = menu.querySelector('.megamenu-close');

            if (menuTimeline) menuTimeline.kill();
            gsap.killTweensOf([menu, backdrop, heading, quickLinks, cats, close]);
            gsap.set([heading, quickLinks, cats, close], { clearProps: 'all' });

            menuTimeline = gsap.timeline({ defaults: { overwrite: 'auto' } });
            menuTimeline
                .fromTo(menu,
                    { xPercent: -50, y: -18, scaleY: .96, autoAlpha: 0 },
                    { xPercent: -50, y: 0, scaleY: 1, autoAlpha: 1, duration: .42, ease: 'expo.out' },
                    0
                );
            if (backdrop) {
                menuTimeline.fromTo(backdrop, { autoAlpha: 0 }, { autoAlpha: 1, duration: .28, ease: 'power2.out' }, 0);
            }
            if (heading) menuTimeline.fromTo(heading, { x: -12, autoAlpha: 0 }, { x: 0, autoAlpha: 1, duration: .3, ease: 'power3.out' }, .08);
            if (quickLinks.length) menuTimeline.fromTo(quickLinks, { y: -8, autoAlpha: 0 }, { y: 0, autoAlpha: 1, duration: .26, stagger: .045, ease: 'power2.out' }, .1);
            if (close) menuTimeline.fromTo(close, { scale: .7, autoAlpha: 0 }, { scale: 1, autoAlpha: 1, duration: .28, ease: 'back.out(1.8)' }, .12);
            if (cats.length) menuTimeline.fromTo(cats, { x: -18, autoAlpha: 0 }, { x: 0, autoAlpha: 1, duration: .3, stagger: .028, ease: 'power3.out', clearProps: 'transform,opacity,visibility' }, .12);
        } else {
            menu.style.opacity = '1';
            if (backdrop) backdrop.style.opacity = '1';
        }

        switchCategory(0);
    }

    function closeMenu(immediate) {
        if (!isOpen) return;
        var menu = $mm('megaMenu');
        var backdrop = $mm('megaBackdrop');
        if (!menu) return;

        isOpen = false;
        menu.setAttribute('aria-hidden', 'true');
        document.querySelectorAll('#catalogBtn, #snCatalogBtn').forEach(function(btn) {
            btn.setAttribute('aria-expanded', 'false');
        });
        document.body.style.overflow = bodyOverflowBeforeMenu;
        document.body.style.paddingRight = bodyPaddingBeforeMenu;

        function finishClose() {
            menu.classList.remove('open');
            document.body.classList.remove('pb-mega-menu-open');
            if (backdrop) backdrop.classList.remove('active');
            if (typeof gsap !== 'undefined') {
                gsap.set(menu, { clearProps: 'opacity,visibility,transform' });
                if (backdrop) gsap.set(backdrop, { clearProps: 'opacity,visibility' });
            } else {
                menu.style.opacity = '';
                if (backdrop) backdrop.style.opacity = '';
            }
        }

        if (typeof gsap === 'undefined' || immediate) {
            if (menuTimeline) menuTimeline.kill();
            finishClose();
            return;
        }

        if (menuTimeline) menuTimeline.kill();
        gsap.killTweensOf([menu, backdrop]);
        menuTimeline = gsap.timeline({ onComplete: finishClose });
        menuTimeline.to(menu, { xPercent: -50, y: -12, scaleY: .98, autoAlpha: 0, duration: .22, ease: 'power2.in' }, 0);
        if (backdrop) menuTimeline.to(backdrop, { autoAlpha: 0, duration: .2, ease: 'power1.out' }, 0);
    }

    // Ховер по категориям — переключение подкатегорий (делегирование)
    document.addEventListener('mouseenter', function(e) {
        var item = e.target.closest ? e.target.closest('.megamenu-cat') : null;
        if (!item) return;
        var idx = parseInt(item.dataset.idx, 10);
        if (idx !== activeIdx) switchCategory(idx);
    }, true);

    // Открытие/закрытие — оба триггера (десктоп-шапка + sticky nav)
    document.addEventListener('click', function(e) {
        if (e.target.closest('#catalogBtn') || e.target.closest('#snCatalogBtn')) {
            e.preventDefault();
            e.stopPropagation();
            if (window.innerWidth > 1024) {
                if (isOpen) { closeMenu(); } else { openMenu(); }
            }
            return;
        }
        if (e.target.closest('#megaMenuClose')) {
            e.preventDefault();
            closeMenu();
            return;
        }
        if (isOpen) {
            var insideMenu = e.target.closest('#megaMenu');
            var insideBtn = e.target.closest('#catalogBtn') || e.target.closest('#snCatalogBtn');
            if (!insideMenu && !insideBtn) closeMenu();
        }
    });

    document.addEventListener('keydown', function(e) {
        var trigger = e.target.closest ? e.target.closest('#catalogBtn, #snCatalogBtn') : null;
        if (trigger && (e.key === 'Enter' || e.key === ' ')) {
            e.preventDefault();
            if (window.innerWidth > 1024) {
                if (isOpen) closeMenu(); else openMenu();
            }
            return;
        }
        if (e.key === 'Escape' && isOpen) closeMenu();
    });

    document.addEventListener('livewire:navigate', function() {
        if (isOpen) closeMenu(true);
    });

    window.addEventListener('resize', function() {
        if (window.innerWidth <= 1024 && isOpen) { closeMenu(); return; }
        if (isOpen) positionMenu();
    });
    window.addEventListener('scroll', function() {
        if (isOpen) positionMenu();
    }, { passive: true });

    /* ══════════════ Отвязываем старый обработчик темы от #catalogBtn ══════════════
       Оригинальный main.js вешает свой click на #catalogBtn (открывает старый
       #overlayMy + toggle .active на бургере → иконка X). На десктопе это
       конфликтует с нашим мегаменю — отвязываем через jQuery .off(), наш
       обработчик на document (native addEventListener) не пострадает. */
    function neutralizeOldCatalogHandler() {
        if (window.innerWidth > 1024 && typeof $ !== 'undefined') {
            $('#catalogBtn').off('click');
            $('#overlayMy').removeClass('modalOverlay active').hide();
            var burger = document.querySelector('#catalogBtn .header__burger');
            if (burger) burger.classList.remove('active');
        }
    }
    document.addEventListener('DOMContentLoaded', neutralizeOldCatalogHandler);
    document.addEventListener('livewire:navigated', neutralizeOldCatalogHandler);
    document.addEventListener('livewire:navigated', function() {
        document.body.classList.remove('pb-mega-menu-open');
    });

    /* ══════════════ STICKY NAV — скролл вниз прячет, вверх показывает ══════════════
       Плавающая пилюля: показывается лёгким "влётом" сверху с отскоком (back.out),
       прячется быстрым уходом вверх. Анимируем top (не transform), чтобы не
       конфликтовать с translateX(-50%), которым пилюля центрируется по горизонтали. */
    (function initStickyNav() {
        var lastScrollY = 0;
        var stickyShown = false;
        var headerHeight = 200;
        var ticking = false;

        function show(nav) {
            nav.classList.add('sn-visible');
            gsap.killTweensOf(nav);
            gsap.to(nav, {
                top: 16,
                opacity: 1,
                duration: 0.55,
                ease: 'back.out(1.6)'
            });
        }

        function hide(nav) {
            gsap.killTweensOf(nav);
            gsap.to(nav, {
                top: -120,
                opacity: 0,
                duration: 0.3,
                ease: 'power2.in',
                onComplete: function() { nav.classList.remove('sn-visible'); }
            });
        }

        function onScroll() {
            if (ticking) return;
            ticking = true;
            requestAnimationFrame(function() {
                var nav = $mm('stickyNav');
                if (!nav) { ticking = false; return; }

                var y = window.scrollY || window.pageYOffset;

                if (y > headerHeight) {
                    if (y < lastScrollY && !stickyShown) {
                        show(nav);
                        stickyShown = true;
                    } else if (y > lastScrollY && stickyShown) {
                        hide(nav);
                        stickyShown = false;
                    }
                } else if (stickyShown) {
                    hide(nav);
                    stickyShown = false;
                }

                lastScrollY = y;
                ticking = false;
            });
        }

        window.addEventListener('scroll', onScroll, { passive: true });

        // После wire:navigate — сбрасываем состояние (новый DOM-узел из морфа)
        document.addEventListener('livewire:navigated', function() {
            var nav = $mm('stickyNav');
            if (nav) {
                gsap.killTweensOf(nav);
                gsap.set(nav, { top: -120, opacity: 0 });
                nav.classList.remove('sn-visible');
            }
            stickyShown = false;
            lastScrollY = 0;
        });
    })();

})();
</script>
<script data-navigate-once>
(function(){
    function restorePandboxHeader(root){
        if(!root)return;
        if(root._pbHeaderTimeline){root._pbHeaderTimeline.kill();root._pbHeaderTimeline=null;}
        var nodes=[root.querySelector('.headerTopWrap'),root.querySelector('.header__middle__logo__wrap'),root.querySelector('.header__middle__search__wrap'),root.querySelector('.header__middle__right__top'),root.querySelector('.header__bottom__nav__wrap')]
            .concat(Array.from(root.querySelectorAll('.header__bottom__nav>nav li:not(.pb-nav-hover-fill)')))
            .filter(Boolean);
        if(typeof gsap!=='undefined'){
            gsap.killTweensOf(nodes);
            gsap.set(nodes,{clearProps:'opacity,visibility,transform,clipPath'});
        }else{
            nodes.forEach(function(node){node.style.removeProperty('opacity');node.style.removeProperty('visibility');node.style.removeProperty('transform');node.style.removeProperty('clip-path');});
        }
    }

    function initPandboxHeader(){
        var root=document.querySelector('[data-pb-site-header]');
        if(!root)return;
        if(root.hasAttribute('data-pb-header-ready')){
            if(Date.now()-(root._pbHeaderInitAt||0)>250)restorePandboxHeader(root);
            return;
        }
        root.setAttribute('data-pb-header-ready','1');
        root._pbHeaderInitAt=Date.now();
        if(typeof gsap==='undefined'){restorePandboxHeader(root);return;}
        if(window.matchMedia('(prefers-reduced-motion: reduce)').matches)return;
        var top=root.querySelector('.headerTopWrap');
        var logo=root.querySelector('.header__middle__logo__wrap');
        var search=root.querySelector('.header__middle__search__wrap');
        var actions=root.querySelector('.header__middle__right__top');
        var bottom=root.querySelector('.header__bottom__nav__wrap');
        var navLinks=root.querySelectorAll('.header__bottom__nav>nav li:not(.pb-nav-hover-fill)');
        var tl=gsap.timeline({defaults:{overwrite:'auto'}});
        root._pbHeaderTimeline=tl;
        tl.fromTo(top,{y:-24,autoAlpha:0},{y:0,autoAlpha:1,duration:.42,ease:'power3.out'},0)
            .fromTo(logo,{x:-28,autoAlpha:0},{x:0,autoAlpha:1,duration:.55,ease:'power3.out'},.08)
            .fromTo(search,{y:20,autoAlpha:0},{y:0,autoAlpha:1,duration:.5,ease:'power3.out'},.14)
            .fromTo(actions,{x:28,autoAlpha:0},{x:0,autoAlpha:1,duration:.55,ease:'power3.out'},.18)
            .fromTo(bottom,{clipPath:'inset(0 50% 0 50%)',autoAlpha:.5},{clipPath:'inset(0 0% 0 0%)',autoAlpha:1,duration:.6,ease:'power3.out'},.18)
            .fromTo(navLinks,{y:10,autoAlpha:0},{y:0,autoAlpha:1,duration:.3,stagger:.045,ease:'power2.out'},.48);
        if(logo){
            logo.addEventListener('mouseenter',function(){gsap.to(logo.querySelector('img'),{scale:1.04,duration:.3,ease:'power2.out'});});
            logo.addEventListener('mouseleave',function(){gsap.to(logo.querySelector('img'),{scale:1,duration:.45,ease:'elastic.out(1,.5)'});});
        }
        root.querySelectorAll('.pb-header-action').forEach(function(action){
            var icon=action.querySelector('.pb-header-action-icon');
            if(!icon)return;
            action.addEventListener('mouseenter',function(){gsap.to(icon,{rotationY:'+=360',transformPerspective:600,duration:.7,ease:'power2.inOut',overwrite:'auto'});});
        });
    }
    if(!window.__pbHeaderGsapBooted){
        window.__pbHeaderGsapBooted=true;
        document.addEventListener('livewire:navigated',initPandboxHeader);
        window.addEventListener('pageshow',initPandboxHeader);
    }
    initPandboxHeader();
})();
</script>
<script data-navigate-once>
(function(){
    if(window.__pbStickySearchModalBooted)return;
    window.__pbStickySearchModalBooted=true;
    var previousOverflow='';
    function modal(){return document.querySelector('[data-pb-sticky-search-modal]');}
    function openSearch(){
        var root=modal();if(!root)return;
        var dialog=root.querySelector('.pb-sticky-search-dialog');
        previousOverflow=document.body.style.overflow;
        root.classList.add('open');root.setAttribute('aria-hidden','false');document.body.style.overflow='hidden';
        if(typeof gsap!=='undefined'&&!window.matchMedia('(prefers-reduced-motion: reduce)').matches){
            gsap.killTweensOf([root,dialog]);
            gsap.fromTo(root,{autoAlpha:0},{autoAlpha:1,duration:.24,ease:'power2.out'});
            gsap.fromTo(dialog,{y:-28,scale:.96,autoAlpha:0},{y:0,scale:1,autoAlpha:1,duration:.42,ease:'expo.out'});
        }else{root.style.opacity='1';}
        window.setTimeout(function(){var input=root.querySelector('.pb-sticky-live-search .pb-search-input');if(input)input.focus();},80);
    }
    function closeSearch(immediate){
        var root=modal();if(!root||!root.classList.contains('open'))return;
        var finish=function(){root.classList.remove('open');root.setAttribute('aria-hidden','true');root.style.opacity='';document.body.style.overflow=previousOverflow;};
        if(!immediate&&typeof gsap!=='undefined'&&!window.matchMedia('(prefers-reduced-motion: reduce)').matches){
            gsap.to(root,{autoAlpha:0,duration:.2,ease:'power2.in',onComplete:finish});
        }else finish();
    }
    document.addEventListener('click',function(e){
        if(e.target.closest('[data-pb-sticky-search-open]')){e.preventDefault();openSearch();return;}
        if(e.target.closest('[data-pb-sticky-search-close]')){e.preventDefault();closeSearch(false);}
    });
    document.addEventListener('keydown',function(e){if(e.key==='Escape')closeSearch(false);});
    document.addEventListener('livewire:navigating',function(){closeSearch(true);});
})();
</script>
@endpush
</div>
