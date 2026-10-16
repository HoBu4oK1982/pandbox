@php
    $isWishlist = ($type ?? 'cart') === 'wishlist';
@endphp

<div class="pb-empty-state" data-pb-empty-state>
    <div class="pb-empty-visual" aria-hidden="true">
        <span class="pb-empty-scan"></span>
        <svg viewBox="0 0 320 240" role="presentation">
            <g class="pb-empty-radar">
                <circle cx="160" cy="116" r="91" class="pb-empty-ring pb-empty-ring-a"/>
                <circle cx="160" cy="116" r="67" class="pb-empty-ring pb-empty-ring-b"/>
                <path d="M160 10v27M160 195v27M54 116h27M239 116h27" class="pb-empty-ticks"/>
                <path d="M160 25a91 91 0 0 1 78 44" class="pb-empty-sweep"/>
            </g>

            <g class="pb-empty-panda">
                <circle cx="122" cy="77" r="21" class="pb-empty-ear"/>
                <circle cx="198" cy="77" r="21" class="pb-empty-ear"/>
                <path d="M112 78c12-25 84-25 96 0 13 26 5 75-48 75s-61-49-48-75Z" class="pb-empty-face"/>
                <path d="M123 91c10-10 24-7 28 8-5 16-25 17-32 5 0-5 1-9 4-13Zm74 0c-10-10-24-7-28 8 5 16 25 17 32 5 0-5-1-9-4-13Z" class="pb-empty-eye-patch"/>
                <circle cx="139" cy="101" r="4" class="pb-empty-eye"/>
                <circle cx="181" cy="101" r="4" class="pb-empty-eye"/>
                <path d="M153 120h14l-7 7Z" class="pb-empty-nose"/>
            </g>

            @if($isWishlist)
                <g class="pb-empty-symbol pb-empty-heart">
                    <path d="M160 190s-42-23-42-52c0-23 29-32 42-12 13-20 42-11 42 12 0 29-42 52-42 52Z"/>
                    <path d="M160 134v38M141 153h38" class="pb-empty-symbol-mark"/>
                </g>
            @else
                <g class="pb-empty-symbol pb-empty-cart">
                    <path d="M113 151h13l9 31h53l9-23h-66M143 194a6 6 0 1 1-12 0 6 6 0 0 1 12 0Zm48 0a6 6 0 1 1-12 0 6 6 0 0 1 12 0Z"/>
                    <path d="M160 145v27M147 159h26" class="pb-empty-symbol-mark"/>
                </g>
            @endif
        </svg>
        <span class="pb-empty-code">PBX / {{ $isWishlist ? 'FAV' : 'CART' }} / 00</span>
        <i class="pb-empty-dot pb-empty-dot-a"></i>
        <i class="pb-empty-dot pb-empty-dot-b"></i>
        <i class="pb-empty-dot pb-empty-dot-c"></i>
    </div>

    <div class="pb-empty-copy">
        <span class="pb-empty-kicker">PANDBOX.KZ · СИСТЕМА ОЖИДАЕТ ВЫБОР</span>
        <h2>{{ $title }}</h2>
        <p>{{ $subtitle }}</p>
        <a wire:navigate href="{{ route('shop') }}" class="pb-empty-action" data-pb-empty-action>
            <span>{{ $button }}</span>
            <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M5 12h13M13 6l6 6-6 6"/></svg>
            <i></i>
        </a>
    </div>
</div>

@once
<style>
    .pb-empty-state{position:relative;min-height:480px;display:flex;flex-direction:column;align-items:center;justify-content:center;padding:34px 20px 54px;overflow:hidden;text-align:center;background:radial-gradient(circle at 50% 36%,rgba(21,151,102,.075),transparent 31%)}
    .pb-empty-visual{position:relative;width:320px;height:240px;filter:drop-shadow(0 18px 28px rgba(9,45,29,.1))}
    .pb-empty-visual svg{display:block;width:100%;height:100%;overflow:visible}
    .pb-empty-ring{fill:none;stroke:#b9d6c8;stroke-width:1;stroke-dasharray:4 8}.pb-empty-ring-b{stroke:#d5e6de;stroke-dasharray:2 7}
    .pb-empty-ticks{fill:none;stroke:#159766;stroke-width:2}.pb-empty-sweep{fill:none;stroke:#20c883;stroke-width:3;stroke-linecap:round}
    .pb-empty-ear,.pb-empty-eye-patch,.pb-empty-nose{fill:#121a16}.pb-empty-face{fill:#fff;stroke:#18221d;stroke-width:4}.pb-empty-eye{fill:#20c883}
    .pb-empty-symbol{fill:none;stroke:#159766;stroke-width:5;stroke-linecap:round;stroke-linejoin:round}.pb-empty-symbol-mark{stroke:#20c883;stroke-width:3}
    .pb-empty-heart path:first-child{fill:#fff;stroke-width:4}
    .pb-empty-code{position:absolute;right:4px;bottom:22px;color:#159766;font:700 9px/1 Arial,sans-serif;letter-spacing:.18em}
    .pb-empty-scan{position:absolute;z-index:2;left:50%;top:27px;width:190px;height:1px;background:linear-gradient(90deg,transparent,#20c883,transparent);box-shadow:0 0 12px #20c883;transform:translateX(-50%);opacity:.65}
    .pb-empty-dot{position:absolute;width:7px;height:7px;border:2px solid #20c883;border-radius:50%}.pb-empty-dot-a{left:25px;top:78px}.pb-empty-dot-b{right:38px;top:136px}.pb-empty-dot-c{left:55px;bottom:24px}
    .pb-empty-copy{position:relative;z-index:2;max-width:600px;margin-top:-8px}.pb-empty-kicker{display:block;margin-bottom:9px;color:#159766;font:700 10px/1.2 Arial,sans-serif;letter-spacing:.2em}
    .pb-empty-copy h2{margin:0;color:#17211c;font-size:clamp(25px,3vw,38px);line-height:1.1}.pb-empty-copy p{max-width:480px;margin:13px auto 22px;color:#77847d;font-size:14px;line-height:1.6}
    .pb-empty-action{position:relative;isolation:isolate;display:inline-flex;align-items:center;gap:13px;min-width:210px;justify-content:center;padding:15px 22px;overflow:hidden;border:1px solid #159766;border-radius:10px;color:#fff;background:#121a16;box-shadow:0 13px 28px rgba(14,83,53,.18);font-size:13px;font-weight:700;text-decoration:none;letter-spacing:.03em;will-change:transform}
    .pb-empty-action span,.pb-empty-action svg{position:relative;z-index:2}.pb-empty-action svg{width:18px;fill:none;stroke:currentColor;stroke-width:2;stroke-linecap:round;stroke-linejoin:round}.pb-empty-action i{position:absolute;z-index:1;inset:-2px;background:linear-gradient(110deg,#117a53,#20c883);transform:translateX(-103%)}
    @media(max-width:640px){.pb-empty-state{min-height:430px;padding-inline:10px}.pb-empty-visual{width:275px;height:210px}.pb-empty-copy{margin-top:0}.pb-empty-code{right:0}}
    @media(prefers-reduced-motion:reduce){.pb-empty-state *{animation:none!important}}
</style>
@endonce

@push('scripts')
<script data-navigate-once>
(function(){
    function initPandboxEmptyStates(){
        document.querySelectorAll('[data-pb-empty-state]:not([data-pb-ready])').forEach(function(state){
            state.setAttribute('data-pb-ready','1');
            if(typeof gsap==='undefined') return;
            var radar=state.querySelector('.pb-empty-radar'), panda=state.querySelector('.pb-empty-panda'), symbol=state.querySelector('.pb-empty-symbol'), scan=state.querySelector('.pb-empty-scan'), dots=state.querySelectorAll('.pb-empty-dot'), copy=state.querySelector('.pb-empty-copy');
            gsap.timeline().from(state,{opacity:0,duration:.25}).from(radar,{scale:.65,rotation:-35,opacity:0,transformOrigin:'50% 50%',duration:.7,ease:'back.out(1.6)'},0).from(panda,{y:22,scale:.8,opacity:0,transformOrigin:'50% 50%',duration:.55,ease:'back.out(1.8)'},.15).from(symbol,{y:18,opacity:0,duration:.45,ease:'power3.out'},.3).from(dots,{scale:0,opacity:0,stagger:.09,duration:.3,ease:'back.out(3)'},.35).from(copy.children,{y:18,opacity:0,stagger:.07,duration:.45,ease:'power3.out'},.42);
            gsap.to(radar,{rotation:360,transformOrigin:'50% 50%',duration:28,repeat:-1,ease:'none'});
            gsap.to(scan,{y:154,duration:2.5,repeat:-1,yoyo:true,ease:'sine.inOut'});
            gsap.to(symbol,{y:-5,duration:1.6,repeat:-1,yoyo:true,ease:'sine.inOut'});
            gsap.to(dots,{scale:1.45,opacity:.25,duration:1.2,repeat:-1,yoyo:true,stagger:.25,ease:'sine.inOut'});
        });
    }
    if(!window.__pbEmptyStateBooted){
        window.__pbEmptyStateBooted=true;
        document.addEventListener('pointerover',function(e){var b=e.target.closest&&e.target.closest('[data-pb-empty-action]');if(b&&typeof gsap!=='undefined'){gsap.to(b,{y:-4,scale:1.025,duration:.25,ease:'power2.out'});gsap.to(b.querySelector('i'),{x:'0%',duration:.38,ease:'power3.out'});gsap.to(b.querySelector('svg'),{x:4,duration:.25});}});
        document.addEventListener('pointerout',function(e){var b=e.target.closest&&e.target.closest('[data-pb-empty-action]');if(b&&!b.contains(e.relatedTarget)&&typeof gsap!=='undefined'){gsap.to(b,{x:0,y:0,scale:1,duration:.35,ease:'elastic.out(1,.5)'});gsap.to(b.querySelector('i'),{x:'-103%',duration:.3});gsap.to(b.querySelector('svg'),{x:0,duration:.25});}});
        document.addEventListener('pointermove',function(e){var b=e.target.closest&&e.target.closest('[data-pb-empty-action]');if(!b||typeof gsap==='undefined')return;var r=b.getBoundingClientRect();gsap.to(b,{x:(e.clientX-r.left-r.width/2)*.08,y:(e.clientY-r.top-r.height/2)*.08-4,duration:.25,ease:'power2.out'});});
        document.addEventListener('livewire:navigated',initPandboxEmptyStates);
    }
    // Доступна другим партиалам (корзина/избранное) для запуска анимации
    // после того, как разметку пустого состояния вставили в DOM асинхронно,
    // без перезагрузки страницы.
    window.pbInitEmptyStates=initPandboxEmptyStates;
    initPandboxEmptyStates();
})();
</script>
@endpush
