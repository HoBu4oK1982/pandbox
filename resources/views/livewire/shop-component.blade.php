@section('title', 'Интернет-магазин Pandbox.kz — страйкбольное снаряжение')

@php
    $directionCount = $categories->count();
    $sectionCount = $categories->sum(fn ($category) => $category->children->count());
@endphp

<div class="pb-shop-page" data-pb-shop>
    <section class="pb-shop-hero">
        <div class="container pb-shop-hero-inner">
            <div class="pb-shop-breadcrumbs">
                <a wire:navigate href="{{ route('home') }}">Главная</a><span>→</span><b>Магазин</b>
            </div>

            <div class="pb-shop-hero-grid">
                <div class="pb-shop-heading">
                    <span class="pb-shop-kicker">PBX / КАТАЛОГ СНАРЯЖЕНИЯ</span>
                    <h1>Магазин Pandbox</h1>
                    <p>Всё для страйкбола в одном каталоге: приводы, экипировка, тюнинг и расходники. Выберите направление — внутри собраны разделы и точные подкатегории.</p>
                    <div class="pb-shop-hero-actions">
                        <a href="#pbShopCatalog" data-pb-shop-scroll>
                            <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M4 6h16M4 12h16M4 18h10"/></svg>
                            <span>Выбрать категорию</span>
                        </a>
                        <button type="button" data-pb-callback>
                            <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M21 15a4 4 0 0 1-4 4H8l-5 3V7a4 4 0 0 1 4-4h10a4 4 0 0 1 4 4Z"/><path d="M8 9h8M8 13h5"/></svg>
                            <span>Помощь с подбором</span>
                        </button>
                    </div>
                </div>

                <div class="pb-shop-scope" aria-hidden="true">
                    <span class="pb-shop-scope-ring ring-one"></span>
                    <span class="pb-shop-scope-ring ring-two"></span>
                    <i></i><b></b>
                    <em class="point-a"></em><em class="point-b"></em>
                    <strong>{{ str_pad((string) $directionCount, 2, '0', STR_PAD_LEFT) }}</strong>
                    <small>направлений</small>
                </div>
            </div>

            <div class="pb-shop-facts">
                <span><b>{{ str_pad((string) $directionCount, 2, '0', STR_PAD_LEFT) }}</b><small>Основных направлений</small></span>
                <span><b>{{ str_pad((string) $sectionCount, 2, '0', STR_PAD_LEFT) }}</b><small>Разделов каталога</small></span>
                <span><b>KZ</b><small>Доставка по Казахстану</small></span>
            </div>
        </div>
    </section>

    <main class="container pb-shop-content" id="pbShopCatalog">
        <div class="pb-shop-section-head">
            <div><span>01 / КАТЕГОРИИ</span><h2>Выберите направление</h2></div>
            <p>Нажмите на название раздела для перехода. Кнопка «+» раскрывает вложенные категории, не уводя со страницы.</p>
        </div>

        <nav class="pb-shop-quick" aria-label="Быстрый переход по категориям">
            @foreach($categories as $category)
                <a href="#pb-shop-category-{{ $loop->index }}"><b>{{ str_pad((string) $loop->iteration, 2, '0', STR_PAD_LEFT) }}</b><span>{{ $category->title }}</span></a>
            @endforeach
        </nav>

        <div class="pb-shop-categories" data-shop-categories>
            @foreach ($categories as $category)
                <article class="pb-shop-card" id="pb-shop-category-{{ $loop->index }}" data-pb-shop-card>
                    <a wire:navigate href="{{ route('category', ['slug' => $category->slug]) }}" class="pb-shop-card-media">
                        <img src="{{ asset('assets/images/categories/' . $category->image) }}" alt="{{ $category->title }}">
                        <span class="pb-shop-card-number">{{ str_pad((string) $loop->iteration, 2, '0', STR_PAD_LEFT) }}</span>
                        <i aria-hidden="true"></i>
                    </a>

                    <div class="pb-shop-card-body">
                        <div class="pb-shop-card-title">
                            <span>PBX / {{ str_pad((string) $category->children->count(), 2, '0', STR_PAD_LEFT) }} РАЗДЕЛОВ</span>
                            <a wire:navigate href="{{ route('category', ['slug' => $category->slug]) }}"><h3>{{ $category->title }}</h3></a>
                        </div>

                        <ul class="pb-shop-menu">
                            @foreach ($category->children as $child)
                                <li class="pb-shop-menu-item">
                                    <div class="pb-shop-menu-row">
                                        <a wire:navigate href="{{ route('subcategory', ['slug' => $category->slug, 'subcategory_slug' => $child->slug]) }}">{{ $child->title }}</a>
                                        @if ($child->children->isNotEmpty())
                                            <button type="button" class="pb-shop-submenu-toggle" data-shop-submenu-toggle aria-expanded="false" aria-controls="shop-submenu-{{ $category->id }}-{{ $child->id }}" aria-label="Показать подкатегории: {{ $child->title }}"><span aria-hidden="true">+</span></button>
                                        @else
                                            <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M7 12h10M13 8l4 4-4 4"/></svg>
                                        @endif
                                    </div>

                                    @if ($child->children->isNotEmpty())
                                        <ul class="pb-shop-submenu" id="shop-submenu-{{ $category->id }}-{{ $child->id }}">
                                            @foreach ($child->children as $subchild)
                                                <li><a wire:navigate href="{{ route('subsubcategory', ['slug' => $category->slug, 'subcategory_slug' => $child->slug, 'subsubcategory_slug' => $subchild->slug]) }}">{{ $subchild->title }}<span>→</span></a></li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </li>
                            @endforeach
                        </ul>

                        <a wire:navigate href="{{ route('category', ['slug' => $category->slug]) }}" class="pb-shop-card-link"><span>Открыть всё направление</span><svg viewBox="0 0 24 24"><path d="M5 12h13M13 6l6 6-6 6"/></svg></a>
                    </div>
                </article>
            @endforeach
        </div>

        <section class="pb-shop-help">
            <div><span>PBX / ПОДБОР</span><h2>Не знаете, с чего начать?</h2><p>Расскажите, что уже есть и для каких задач собираете комплект. Поможем проверить совместимость и подобрать нужные позиции.</p></div>
            <button type="button" data-pb-callback><span>Получить консультацию</span><svg viewBox="0 0 24 24"><path d="M5 12h13M13 6l6 6-6 6"/></svg></button>
        </section>
    </main>

    <style>
        .pb-shop-page{--ps-green:#20c883;--ps-mint:#39e0a0;--ps-ink:#09110d;--ps-line:#d5e2db;overflow:hidden;color:#17211c;background-color:#f4f7f5;background-image:radial-gradient(circle,rgba(17,96,61,.11) .7px,transparent .9px);background-size:24px 24px}.pb-shop-page *{box-sizing:border-box}.pb-shop-page svg{fill:none;stroke:currentColor;stroke-width:1.7;stroke-linecap:round;stroke-linejoin:round}.pb-shop-hero{position:relative;overflow:hidden;color:#fff;background:radial-gradient(circle at 70% 28%,rgba(31,193,126,.18),transparent 32%),linear-gradient(115deg,#07100b,#10251a)}.pb-shop-hero:before{content:'';position:absolute;inset:0;opacity:.15;background-image:linear-gradient(rgba(57,224,160,.13) 1px,transparent 1px),linear-gradient(90deg,rgba(57,224,160,.13) 1px,transparent 1px);background-size:38px 38px;mask-image:linear-gradient(90deg,#000,transparent 90%)}.pb-shop-hero:after{content:'PANDBOX.KZ';position:absolute;right:-28px;bottom:-18px;color:rgba(57,224,160,.035);font:400 clamp(60px,9vw,145px)/.8 'MagistralBold',Arial;letter-spacing:-.07em;white-space:nowrap}.pb-shop-hero-inner{position:relative;z-index:2;padding-top:18px!important}.pb-shop-breadcrumbs{display:flex;align-items:center;gap:10px;color:#748b7f;font-size:10px}.pb-shop-breadcrumbs a{color:var(--ps-mint);text-decoration:none}.pb-shop-breadcrumbs b{color:#a9bbb1;font-weight:500}.pb-shop-hero-grid{min-height:292px;display:grid;grid-template-columns:minmax(0,1fr) 300px;align-items:center;gap:42px;padding:25px 0}.pb-shop-kicker{display:block;margin-bottom:11px;color:var(--ps-mint);font:700 9px Arial;letter-spacing:.22em}.pb-shop-heading h1{margin:0;color:#fff;font-size:clamp(38px,4.5vw,62px);font-weight:500;line-height:.94;letter-spacing:-.045em}.pb-shop-heading p{max-width:680px;margin:15px 0 0;color:#aebdb5;font-size:13px;line-height:1.55}.pb-shop-hero-actions{display:flex;gap:10px;margin-top:20px}.pb-shop-hero-actions a,.pb-shop-hero-actions button,.pb-shop-help button{min-height:46px;display:inline-flex;align-items:center;justify-content:center;gap:10px;padding:10px 16px;border:1px solid var(--ps-green);border-radius:0;color:#fff;background:linear-gradient(90deg,#0c8d5c,#18b879);font-family:inherit;font-size:12px;font-weight:700;text-decoration:none;cursor:pointer;transition:.25s}.pb-shop-hero-actions button{border-color:rgba(57,224,160,.38);background:rgba(57,224,160,.07)}.pb-shop-hero-actions a:hover,.pb-shop-hero-actions button:hover,.pb-shop-help button:hover{color:#07110c;background:var(--ps-mint);transform:translateY(-3px)}.pb-shop-hero-actions svg,.pb-shop-help svg{width:19px;height:19px}.pb-shop-scope{position:relative;width:240px;height:240px;justify-self:end;border:1px solid rgba(57,224,160,.16);border-radius:50%;background:radial-gradient(circle,rgba(57,224,160,.08),transparent 62%)}.pb-shop-scope:before,.pb-shop-scope:after{content:'';position:absolute;background:rgba(57,224,160,.2)}.pb-shop-scope:before{left:50%;top:-16px;bottom:-16px;width:1px}.pb-shop-scope:after{top:50%;left:-16px;right:-16px;height:1px}.pb-shop-scope-ring{position:absolute;border:1px solid rgba(57,224,160,.2);border-radius:50%}.pb-shop-scope-ring.ring-one{inset:36px}.pb-shop-scope-ring.ring-two{inset:76px}.pb-shop-scope>i,.pb-shop-scope>b{position:absolute;left:50%;top:50%;width:43%;height:1px;background:linear-gradient(90deg,var(--ps-mint),transparent);transform-origin:left}.pb-shop-scope>i{animation:pbShopRadar 5s linear infinite}.pb-shop-scope>b{transform:rotate(135deg)}@keyframes pbShopRadar{to{transform:rotate(360deg)}}.pb-shop-scope>strong{position:absolute;left:50%;top:44%;color:#fff;font-size:43px;transform:translate(-50%,-50%)}.pb-shop-scope>small{position:absolute;left:50%;top:61%;color:#789084;font:700 8px Arial;letter-spacing:.2em;text-transform:uppercase;transform:translateX(-50%)}.pb-shop-scope>em{position:absolute;width:9px;height:9px;border:2px solid #07110c;background:var(--ps-mint);box-shadow:0 0 0 5px rgba(57,224,160,.12),0 0 18px var(--ps-mint)}.pb-shop-scope .point-a{left:17%;top:31%}.pb-shop-scope .point-b{right:18%;bottom:26%}.pb-shop-facts{display:grid;grid-template-columns:repeat(3,1fr);border-top:1px solid rgba(57,224,160,.2);border-left:1px solid rgba(57,224,160,.2)}.pb-shop-facts>span{min-height:62px;display:flex;align-items:center;gap:14px;padding:12px 20px;border-right:1px solid rgba(57,224,160,.2);background:rgba(2,11,7,.38)}.pb-shop-facts b{color:var(--ps-mint);font-size:20px}.pb-shop-facts small{color:#91a59a;font-size:10px}.pb-shop-content{padding-top:58px!important;padding-bottom:90px!important}.pb-shop-section-head{display:flex;align-items:end;justify-content:space-between;gap:28px;margin-bottom:24px}.pb-shop-section-head>div>span,.pb-shop-help>div>span{display:block;margin-bottom:9px;color:#149764;font:700 9px Arial;letter-spacing:.2em}.pb-shop-section-head h2,.pb-shop-help h2{margin:0;color:#15211b;font-size:35px;line-height:1}.pb-shop-section-head p{max-width:430px;margin:0;color:#78867f;font-size:12px;line-height:1.55}.pb-shop-quick{display:flex;overflow-x:auto;margin-bottom:18px;border:1px solid #cddbd4;background:rgba(255,255,255,.72);scrollbar-width:thin}.pb-shop-quick a{min-width:180px;flex:1;display:flex;align-items:center;gap:10px;padding:13px 15px;border-right:1px solid #d8e4de;color:#3c4d44;text-decoration:none;transition:.2s}.pb-shop-quick a:last-child{border-right:0}.pb-shop-quick a:hover{color:#07110c;background:#dff8ec}.pb-shop-quick b{color:#159766;font-size:11px}.pb-shop-quick span{overflow:hidden;font-size:11px;font-weight:700;text-overflow:ellipsis;white-space:nowrap}.pb-shop-categories{display:grid;grid-template-columns:repeat(3,minmax(0,1fr));align-items:start;gap:18px}.pb-shop-card{min-width:0;overflow:hidden;border:2px solid #152019;background:#fff;box-shadow:0 17px 42px rgba(8,52,30,.08);transition:border-color .25s,transform .25s,box-shadow .25s}.pb-shop-card:hover{border-color:var(--ps-green);box-shadow:0 25px 55px rgba(8,78,44,.15);transform:translateY(-5px)}.pb-shop-card-media{position:relative;height:235px;display:block;overflow:hidden;background:#eaf0ed}.pb-shop-card-media:after{content:'';position:absolute;inset:0;background:linear-gradient(180deg,transparent 45%,rgba(4,14,9,.68))}.pb-shop-card-media img{width:100%;height:100%;display:block;object-fit:cover;transition:transform .5s,filter .5s}.pb-shop-card:hover .pb-shop-card-media img{transform:scale(1.065);filter:saturate(1.08)}.pb-shop-card-number{position:absolute;z-index:2;left:18px;bottom:12px;color:#fff;font-size:36px;line-height:1}.pb-shop-card-media>i{position:absolute;z-index:2;right:15px;bottom:15px;width:28px;height:28px;border-right:1px solid var(--ps-mint);border-bottom:1px solid var(--ps-mint)}.pb-shop-card-body{padding:22px}.pb-shop-card-title{min-height:78px;padding-bottom:16px;border-bottom:1px solid #d8e3dd}.pb-shop-card-title>span{display:block;margin-bottom:8px;color:#159766;font:700 8px Arial;letter-spacing:.18em}.pb-shop-card-title>a{text-decoration:none}.pb-shop-card-title h3{margin:0;color:#142019;font-size:22px;line-height:1.12;transition:color .2s}.pb-shop-card-title a:hover h3{color:#0d9964}.pb-shop-menu{margin:10px 0 0;padding:0;list-style:none}.pb-shop-menu-item{border-bottom:1px solid #dce5e0}.pb-shop-menu-row{min-height:42px;display:grid;grid-template-columns:minmax(0,1fr) 36px;align-items:center}.pb-shop-menu-row>a{min-width:0;padding:10px 8px 10px 0;color:#35433c;font-size:13px;line-height:1.25;text-decoration:none;transition:.2s}.pb-shop-menu-row>a:hover{padding-left:5px;color:#0b9660}.pb-shop-menu-row>svg{width:17px;height:17px;justify-self:center;color:#91a098}.pb-shop-submenu-toggle{width:36px;height:34px;display:grid;place-items:center;padding:0;border:0;border-left:1px solid #dce5e0;color:#17211c;background:transparent;font:500 18px/1 Arial;cursor:pointer;transition:.2s}.pb-shop-submenu-toggle:hover,.pb-shop-submenu-toggle.active{color:#fff;background:#159766}.pb-shop-submenu-toggle span{transition:transform .25s}.pb-shop-submenu-toggle.active span{transform:rotate(45deg)}.pb-shop-submenu{display:none;margin:0 0 9px;padding:8px;background:#edf7f2;list-style:none}.pb-shop-submenu.is-open{display:block}.pb-shop-submenu li+li{border-top:1px solid #d4e6dd}.pb-shop-submenu a{display:flex;align-items:center;justify-content:space-between;gap:10px;padding:8px;color:#486057;font-size:11px;text-decoration:none}.pb-shop-submenu a span{color:#159766}.pb-shop-submenu a:hover{color:#087c51;background:#fff}.pb-shop-card-link{display:flex;align-items:center;justify-content:space-between;margin-top:17px;padding-top:16px;border-top:1px solid #d7e3dc;color:#0c8f5d;font-size:11px;font-weight:700;text-decoration:none}.pb-shop-card-link svg{width:19px;height:19px;transition:transform .2s}.pb-shop-card-link:hover svg{transform:translateX(5px)}.pb-shop-help{display:flex;align-items:center;justify-content:space-between;gap:35px;margin-top:42px;padding:32px 36px;border:1px solid #bfd4c9;background:linear-gradient(110deg,#eff9f4,#fff)}.pb-shop-help p{max-width:700px;margin:10px 0 0;color:#78867f;font-size:12px;line-height:1.6}.pb-shop-help button{flex:0 0 auto}.pb-shop-page button:focus-visible,.pb-shop-page a:focus-visible{outline:2px solid var(--ps-mint);outline-offset:3px}@media(max-width:1100px){.pb-shop-categories{grid-template-columns:repeat(2,minmax(0,1fr))}}@media(max-width:760px){.pb-shop-hero-grid{min-height:0;grid-template-columns:1fr;padding:38px 0}.pb-shop-scope{display:none}.pb-shop-heading h1{font-size:46px}.pb-shop-hero-actions{flex-direction:column}.pb-shop-hero-actions>*{width:100%}.pb-shop-facts{grid-template-columns:1fr}.pb-shop-facts>span{min-height:58px}.pb-shop-content{padding-top:44px!important;padding-bottom:60px!important}.pb-shop-section-head{align-items:flex-start;flex-direction:column}.pb-shop-categories{grid-template-columns:1fr}.pb-shop-card-media{height:260px}.pb-shop-help{align-items:flex-start;flex-direction:column;padding:27px 22px}.pb-shop-help button{width:100%}}@media(max-width:430px){.pb-shop-heading h1{font-size:40px}.pb-shop-section-head h2,.pb-shop-help h2{font-size:29px}.pb-shop-card-media{height:220px}.pb-shop-card-body{padding:18px}}
        @media(max-width:760px){
            .pb-shop-facts{grid-template-columns:repeat(3,minmax(0,1fr))}
            .pb-shop-facts>span{min-width:0;min-height:78px;align-items:flex-start;justify-content:center;flex-direction:column;gap:5px;padding:10px 9px}
            .pb-shop-facts b{font-size:19px;line-height:1}
            .pb-shop-facts small{font-size:8px;line-height:1.3}
        }
    </style>

    <script data-navigate-once>
    (function(){
        function animateShop(){
            var root=document.querySelector('[data-pb-shop]');
            if(!root||root.dataset.pbAnimated==='1')return;
            root.dataset.pbAnimated='1';
            if(typeof gsap==='undefined')return;
            gsap.fromTo(root.querySelectorAll('.pb-shop-breadcrumbs,.pb-shop-heading>*'),{y:22,autoAlpha:0},{y:0,autoAlpha:1,duration:.56,stagger:.065,ease:'power3.out',clearProps:'transform,opacity,visibility'});
            gsap.fromTo(root.querySelector('.pb-shop-scope'),{scale:.76,rotation:-18,autoAlpha:0},{scale:1,rotation:0,autoAlpha:1,duration:.8,ease:'back.out(1.45)',delay:.12,clearProps:'transform,opacity,visibility'});
            gsap.fromTo(root.querySelectorAll('.pb-shop-facts>span'),{y:15,autoAlpha:0},{y:0,autoAlpha:1,duration:.4,stagger:.07,ease:'power3.out',delay:.32,clearProps:'transform,opacity,visibility'});
            var cards=root.querySelectorAll('[data-pb-shop-card]');
            if(cards.length)gsap.fromTo(cards,{y:32,autoAlpha:0},{y:0,autoAlpha:1,duration:.52,stagger:Math.min(.08,.35/cards.length),ease:'power3.out',delay:.16,clearProps:'transform,opacity,visibility'});
            gsap.fromTo(root.querySelectorAll('.pb-shop-quick,.pb-shop-help'),{y:22,autoAlpha:0},{y:0,autoAlpha:1,duration:.48,stagger:.12,ease:'power3.out',delay:.12,clearProps:'transform,opacity,visibility'});
        }

        function toggleSubmenu(button){
            var root=button.closest('[data-shop-categories]');
            var submenu=document.getElementById(button.getAttribute('aria-controls'));
            if(!root||!submenu)return;
            var willOpen=!button.classList.contains('active');
            root.querySelectorAll('[data-shop-submenu-toggle].active').forEach(function(other){
                if(other===button)return;
                other.classList.remove('active');
                other.setAttribute('aria-expanded','false');
                var otherMenu=document.getElementById(other.getAttribute('aria-controls'));
                if(otherMenu){if(typeof gsap!=='undefined')gsap.killTweensOf(otherMenu);otherMenu.classList.remove('is-open');otherMenu.removeAttribute('style');}
            });
            button.classList.toggle('active',willOpen);
            button.setAttribute('aria-expanded',willOpen?'true':'false');
            if(typeof gsap==='undefined'){
                submenu.classList.toggle('is-open',willOpen);
                return;
            }
            gsap.killTweensOf(submenu);
            if(willOpen){
                submenu.classList.add('is-open');
                gsap.fromTo(submenu,{height:0,autoAlpha:0},{height:'auto',autoAlpha:1,duration:.3,ease:'power2.out',clearProps:'height,opacity,visibility'});
            }else{
                gsap.to(submenu,{height:0,autoAlpha:0,duration:.22,ease:'power2.in',onComplete:function(){submenu.classList.remove('is-open');submenu.removeAttribute('style');}});
            }
        }

        if(!window.__pbShopPageBooted){
            window.__pbShopPageBooted=true;
            document.addEventListener('livewire:navigated',animateShop);
            document.addEventListener('click',function(event){
                var toggle=event.target.closest&&event.target.closest('[data-shop-submenu-toggle]');
                if(toggle&&toggle.closest('[data-pb-shop]')){event.preventDefault();event.stopPropagation();toggleSubmenu(toggle);return;}
                var scroll=event.target.closest&&event.target.closest('[data-pb-shop-scroll]');
                if(scroll&&scroll.closest('[data-pb-shop]')){event.preventDefault();document.querySelector(scroll.getAttribute('href'))?.scrollIntoView({behavior:'smooth',block:'start'});}
            });
        }
        animateShop();
    })();
    </script>
</div>
