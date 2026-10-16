@props([
    'sectionTitle' => 'Панель управления',
    'sectionCode' => 'PBX / ACCOUNT',
    'description' => 'Управляйте заказами и личными данными в одном месте.',
])

<div class="pb-account-root">
<section class="pb-account" data-pb-account>
    <div class="pb-account-hero">
        <div class="pb-account-hero__grid" aria-hidden="true"></div>
        <div class="pb-account-container pb-account-hero__inner">
            <div class="pb-account-hero__copy">
                <span>{{ $sectionCode }}</span>
                <h1>{{ $sectionTitle }}</h1>
                <p>{{ $description }}</p>
            </div>
            <div class="pb-account-ident">
                <span>PBX / CLIENT</span>
                <strong>{{ str_pad((string) auth()->id(), 2, '0', STR_PAD_LEFT) }}</strong>
                <small>Личный кабинет</small>
                <i></i>
            </div>
        </div>
    </div>

    <div class="pb-account-container">
        <nav class="pb-account-breadcrumbs" aria-label="Хлебные крошки">
            <a wire:navigate href="/">Главная</a><span>→</span><b>{{ $sectionTitle }}</b>
        </nav>

        <div class="pb-account-layout">
            <aside class="pb-account-sidebar">
                <div class="pb-account-user">
                    <div class="pb-account-avatar">{{ mb_strtoupper(mb_substr(auth()->user()->name, 0, 1)) }}</div>
                    <div><small>Здравствуйте</small><strong>{{ auth()->user()->name }}</strong></div>
                </div>
                <span class="pb-account-sidebar__label">Навигация</span>
                <ul>
                    <li @class(['active' => request()->routeIs('user.dashboard')])>
                        <a wire:navigate href="{{ route('user.dashboard') }}"><svg viewBox="0 0 24 24"><path d="M4 4h6v6H4zM14 4h6v6h-6zM4 14h6v6H4zM14 14h6v6h-6z"/></svg><span>Обзор кабинета</span><i>01</i></a>
                    </li>
                    <li @class(['active' => request()->routeIs('user.orders', 'user.order')])>
                        <a wire:navigate href="{{ route('user.orders') }}"><svg viewBox="0 0 24 24"><path d="M5 3h14v18H5zM8 8h8M8 12h8M8 16h5"/></svg><span>Мои заказы</span><i>02</i></a>
                    </li>
                    <li @class(['active' => request()->routeIs('user.profile')])>
                        <a wire:navigate href="{{ route('user.profile') }}"><svg viewBox="0 0 24 24"><circle cx="12" cy="8" r="4"/><path d="M4 21c.8-5 3.5-7.5 8-7.5s7.2 2.5 8 7.5"/></svg><span>Мой профиль</span><i>03</i></a>
                    </li>
                </ul>
                <a class="pb-account-logout" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('pb-account-logout-form').submit();">
                    <svg viewBox="0 0 24 24"><path d="M10 4H4v16h6M14 8l4 4-4 4M8 12h10"/></svg><span>Выйти из кабинета</span>
                </a>
                <form id="pb-account-logout-form" action="{{ route('logout') }}" method="POST" hidden>@csrf</form>
            </aside>

            <main class="pb-account-content">
                {{ $slot }}
            </main>
        </div>
    </div>
</section>

@once
<style>
    .pb-account{--pa-green:#18bd7d;--pa-mint:#37df9d;--pa-ink:#08110c;--pa-dark:#0d1711;--pa-line:#dce7e1;min-height:720px;padding-bottom:80px;color:#17211c;background-color:#f4f7f5;background-image:radial-gradient(circle,rgba(23,119,77,.12) 0 1px,transparent 1.2px);background-size:22px 22px}.pb-account *{box-sizing:border-box}.pb-account-container{width:min(1350px,calc(100% - 48px));margin-inline:auto}.pb-account-hero{position:relative;overflow:hidden;min-height:270px;color:#fff;background:radial-gradient(circle at 70% 20%,rgba(31,199,132,.22),transparent 30%),linear-gradient(110deg,#07100b,#102119 60%,#07100b);border-top:1px solid var(--pa-green);border-bottom:2px solid var(--pa-green)}.pb-account-hero:after{content:'PANDBOX / ACCOUNT';position:absolute;left:50%;bottom:-25px;color:rgba(54,224,157,.045);font:900 clamp(70px,9vw,150px)/.8 Arial;letter-spacing:-.07em;white-space:nowrap;transform:translateX(-50%)}.pb-account-hero__grid{position:absolute;inset:0;opacity:.18;background-image:linear-gradient(rgba(56,222,157,.16) 1px,transparent 1px),linear-gradient(90deg,rgba(56,222,157,.16) 1px,transparent 1px);background-size:34px 34px;mask-image:linear-gradient(90deg,#000,transparent 88%)}.pb-account-hero__inner{position:relative;z-index:2;min-height:270px;display:flex;align-items:center;justify-content:space-between;gap:50px}.pb-account-hero__copy{max-width:760px}.pb-account-hero__copy>span,.pb-account-ident>span{color:var(--pa-mint);font:700 10px/1 Arial;letter-spacing:.22em}.pb-account-hero h1{margin:14px 0 13px!important;color:#fff!important;font-size:clamp(43px,4vw,66px)!important;line-height:.98!important;font-weight:500!important}.pb-account-hero p{max-width:650px;margin:0;color:#99aaa1;font-size:15px;line-height:1.55}.pb-account-ident{position:relative;width:230px;height:170px;display:flex;flex-direction:column;align-items:center;justify-content:center;border:1px solid rgba(55,223,157,.25);background:rgba(5,15,9,.35)}.pb-account-ident:before,.pb-account-ident:after{content:'';position:absolute;width:38px;height:38px}.pb-account-ident:before{left:-1px;top:-1px;border-left:2px solid var(--pa-mint);border-top:2px solid var(--pa-mint)}.pb-account-ident:after{right:-1px;bottom:-1px;border-right:2px solid var(--pa-mint);border-bottom:2px solid var(--pa-mint)}.pb-account-ident strong{margin:14px 0 5px;color:#fff;font:500 54px/1 'MagistralMedium',Tahoma,sans-serif}.pb-account-ident small{color:#7d9186;font:700 9px Arial;letter-spacing:.18em;text-transform:uppercase}.pb-account-ident i{position:absolute;right:27px;top:58px;width:8px;height:8px;background:var(--pa-mint);box-shadow:0 0 0 7px rgba(55,223,157,.09)}.pb-account-breadcrumbs{height:66px;display:flex;align-items:center;gap:13px;border-bottom:1px solid #d9e4de;font-size:12px}.pb-account-breadcrumbs a{color:#159465;text-decoration:none}.pb-account-breadcrumbs span{color:#8e9d95}.pb-account-breadcrumbs b{font-weight:500;color:#5d6b64}.pb-account-layout{display:grid;grid-template-columns:285px minmax(0,1fr);align-items:start;gap:24px;margin-top:24px}.pb-account-sidebar{position:relative;overflow:hidden;min-height:525px;color:#c8d5ce;background:radial-gradient(circle at 0 0,rgba(31,199,132,.16),transparent 34%),linear-gradient(145deg,#101c16,#070d09);border:1px solid rgba(24,189,125,.35);box-shadow:0 22px 48px rgba(10,52,31,.14)}.pb-account-user{min-height:116px;display:flex;align-items:center;gap:14px;padding:22px;border-bottom:1px solid rgba(255,255,255,.1)}.pb-account-avatar{width:54px;height:54px;display:grid;place-items:center;color:#07110c;background:var(--pa-mint);font-size:24px;font-weight:800;clip-path:polygon(12px 0,100% 0,100% calc(100% - 12px),calc(100% - 12px) 100%,0 100%,0 12px)}.pb-account-user small{display:block;margin-bottom:6px;color:#71867b;font:700 8px Arial;letter-spacing:.16em;text-transform:uppercase}.pb-account-user strong{display:block;max-width:170px;overflow:hidden;color:#fff;font-size:17px;white-space:nowrap;text-overflow:ellipsis}.pb-account-sidebar__label{display:block;padding:18px 22px 9px;color:#4ecb98;font:700 8px Arial;letter-spacing:.22em}.pb-account-sidebar ul{margin:0!important;padding:0!important}.pb-account-sidebar li{list-style:none}.pb-account-sidebar li a{height:62px;display:grid;grid-template-columns:25px 1fr auto;align-items:center;gap:12px;padding:0 20px;border-top:1px solid rgba(255,255,255,.07);color:#98aaa1;text-decoration:none;transition:.22s}.pb-account-sidebar li:last-child a{border-bottom:1px solid rgba(255,255,255,.07)}.pb-account-sidebar li a:hover{padding-left:25px;color:#fff;background:rgba(31,199,132,.08)}.pb-account-sidebar li.active a{color:#07110c;background:linear-gradient(90deg,var(--pa-green),var(--pa-mint))}.pb-account-sidebar svg,.pb-account-logout svg{width:22px;height:22px;fill:none;stroke:currentColor;stroke-width:1.7;stroke-linecap:round;stroke-linejoin:round}.pb-account-sidebar li i{font:700 8px Arial;letter-spacing:.1em;opacity:.55}.pb-account-logout{position:absolute;left:18px;right:18px;bottom:18px;min-height:50px;display:flex;align-items:center;justify-content:center;gap:10px;border:1px solid rgba(239,63,79,.52);color:#ef7a85;background:rgba(239,63,79,.07);text-decoration:none;transition:.2s}.pb-account-logout:hover{color:#fff;background:#b92f3d}.pb-account-content{min-width:0;min-height:525px;padding:30px;background:rgba(255,255,255,.96);border:1px solid var(--pa-line);box-shadow:0 20px 55px rgba(8,60,34,.08)}.pb-account-section-head{display:flex;align-items:flex-end;justify-content:space-between;gap:22px;margin-bottom:25px;padding-bottom:20px;border-bottom:1px solid var(--pa-line)}.pb-account-section-head span{display:block;margin-bottom:8px;color:#139767;font:700 9px Arial;letter-spacing:.18em}.pb-account-section-head h2{margin:0!important;color:#17211c!important;font-size:30px!important;line-height:1!important}.pb-account-section-head p{max-width:470px;margin:0;color:#77867e;font-size:12px;line-height:1.5;text-align:right}.pb-account-empty{min-height:260px;display:grid;place-items:center;border:1px dashed #c8d7cf;color:#718078;text-align:center}.pb-account-action{display:inline-flex;align-items:center;justify-content:center;gap:9px;min-height:44px;padding:10px 16px;border:1px solid var(--pa-green);color:#fff;background:#139f69;text-decoration:none;transition:.2s}.pb-account-action:hover{color:#07110c;background:var(--pa-mint)}.pb-account-action--ghost{color:#16895f;background:transparent}.pb-account-status{display:inline-flex;align-items:center;gap:7px;padding:7px 10px;font:700 9px Arial;letter-spacing:.08em;text-transform:uppercase}.pb-account-status:before{content:'';width:7px;height:7px;background:currentColor;box-shadow:0 0 0 4px color-mix(in srgb,currentColor 12%,transparent)}.pb-account-status--ordered{color:#a87500;background:#fff4d3}.pb-account-status--delivered{color:#11885c;background:#dcf7eb}.pb-account-status--canceled{color:#c53645;background:#fee5e8}.pb-account-enter{will-change:transform,opacity}
    @media(max-width:900px){.pb-account-hero__inner{min-height:230px}.pb-account-ident{display:none}.pb-account-layout{grid-template-columns:1fr}.pb-account-sidebar{min-height:auto}.pb-account-sidebar ul{display:grid;grid-template-columns:repeat(3,1fr)}.pb-account-sidebar li a{padding:0 12px}.pb-account-sidebar li i{display:none}.pb-account-logout{position:static;margin:18px}.pb-account-content{padding:22px}.pb-account-section-head{align-items:flex-start;flex-direction:column}.pb-account-section-head p{text-align:left}}
    /* Внутренние блоки кабинета никогда не должны оставаться скрытыми в Livewire-снимке. */
    .pb-account .pb-account-enter{opacity:1!important;visibility:visible!important;will-change:transform!important}
</style>
<script data-navigate-once>
    (function(){
        function initAccount(){
            document.querySelectorAll('[data-pb-account]').forEach(function(root){
                var reduce=window.matchMedia&&window.matchMedia('(prefers-reduced-motion: reduce)').matches;
                var hero=root.querySelector('.pb-account-hero__copy');
                var ident=root.querySelector('.pb-account-ident');
                var sidebar=root.querySelector('.pb-account-sidebar');
                var content=root.querySelector('.pb-account-content');
                var items=content ? content.querySelectorAll('.pb-account-enter') : [];
                var shell=[hero,ident,sidebar,content].filter(Boolean);
                var animated=shell.concat(Array.from(items));

                /* Livewire keeps the current DOM as a navigation snapshot. If it
                   catches a GSAP entrance mid-frame, the next page can inherit
                   opacity:0. Always discard that stale animation state first. */
                if(typeof gsap!=='undefined'){
                    gsap.killTweensOf(animated);
                    gsap.set(shell,{clearProps:'opacity,visibility,transform'});
                    gsap.set(items,{clearProps:'transform'});
                }else{
                    animated.forEach(function(node){
                        node.style.removeProperty('opacity');
                        node.style.removeProperty('visibility');
                        node.style.removeProperty('transform');
                    });
                }

                if(reduce||typeof gsap==='undefined')return;
                gsap.timeline({defaults:{ease:'power3.out'}})
                    .fromTo(hero,{x:-34,autoAlpha:0},{x:0,autoAlpha:1,duration:.65,clearProps:'opacity,visibility,transform'},0)
                    .fromTo(ident,{x:30,autoAlpha:0,rotation:.8},{x:0,autoAlpha:1,rotation:0,duration:.65,clearProps:'opacity,visibility,transform'},.08)
                    .fromTo(sidebar,{y:24,autoAlpha:0},{y:0,autoAlpha:1,duration:.55,clearProps:'opacity,visibility,transform'},.2)
                    .fromTo(content,{y:24,autoAlpha:0},{y:0,autoAlpha:1,duration:.55,clearProps:'opacity,visibility,transform'},.28);
                if(items.length)gsap.fromTo(items,{y:16},{y:0,duration:.4,stagger:.055,ease:'power2.out',clearProps:'transform'});
            });
        }
        if(document.readyState==='loading')document.addEventListener('DOMContentLoaded',initAccount,{once:true});else initAccount();
        document.addEventListener('livewire:navigating',function(){
            document.querySelectorAll('[data-pb-account]').forEach(function(root){
                var nodes=root.querySelectorAll('.pb-account-hero__copy,.pb-account-ident,.pb-account-sidebar,.pb-account-content,.pb-account-enter');
                if(typeof gsap!=='undefined'){
                    gsap.killTweensOf(nodes);
                    gsap.set(nodes,{clearProps:'opacity,visibility,transform'});
                }
            });
        });
        document.addEventListener('livewire:navigated',function(){requestAnimationFrame(initAccount)});
        window.addEventListener('pageshow',function(){requestAnimationFrame(initAccount)});
    })();
</script>
@endonce
</div>
