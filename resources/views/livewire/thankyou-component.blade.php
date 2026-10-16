@section('title', 'Заказ принят — Pandbox.kz')

<div class="pb-thanks-root">
<section class="pb-thanks" data-pb-thanks>
    <canvas class="pb-thanks-canvas" data-pb-thanks-canvas aria-hidden="true"></canvas>
    <div class="pb-thanks-scan" aria-hidden="true"></div>
    <div class="pb-thanks-corner pb-thanks-corner--one" aria-hidden="true"></div>
    <div class="pb-thanks-corner pb-thanks-corner--two" aria-hidden="true"></div>

    <div class="pb-thanks-container">
        <nav class="pb-thanks-breadcrumbs" aria-label="Хлебные крошки">
            <a wire:navigate href="/">Главная</a><span>→</span><b>Заказ принят</b>
        </nav>

        <div class="pb-thanks-stage">
            <div class="pb-thanks-copy">
                <span class="pb-thanks-kicker">PBX / MISSION COMPLETE</span>
                <h1>Заказ принят<span>.</span></h1>
                <p>Спасибо за заказ. Менеджер Pandbox проверит наличие, уточнит детали доставки и свяжется с вами в ближайшее рабочее время.</p>

                <div class="pb-thanks-steps">
                    <div><i>01</i><span><b>Заявка получена</b><small>Заказ сохранён в системе</small></span></div>
                    <div><i>02</i><span><b>Проверяем наличие</b><small>Сверим остатки по складам</small></span></div>
                    <div><i>03</i><span><b>Свяжемся с вами</b><small>Подтвердим получение и оплату</small></span></div>
                </div>

                <div class="pb-thanks-actions">
                    <a wire:navigate href="{{ route('shop') }}" class="pb-thanks-primary">Вернуться в магазин <svg viewBox="0 0 24 24"><path d="M5 12h13M13 6l6 6-6 6"/></svg></a>
                    @auth
                        <a wire:navigate href="{{ route('user.orders') }}" class="pb-thanks-secondary">Мои заказы</a>
                    @endauth
                </div>
            </div>

            <div class="pb-thanks-visual" aria-hidden="true">
                <div class="pb-thanks-radar">
                    <span class="pb-thanks-ring pb-thanks-ring--one"></span>
                    <span class="pb-thanks-ring pb-thanks-ring--two"></span>
                    <span class="pb-thanks-ring pb-thanks-ring--three"></span>
                    <span class="pb-thanks-axis pb-thanks-axis--x"></span>
                    <span class="pb-thanks-axis pb-thanks-axis--y"></span>
                    <div class="pb-thanks-check">
                        <svg viewBox="0 0 100 100"><path d="M22 52 42 71 79 31"/></svg>
                    </div>
                    <i class="pb-thanks-dot pb-thanks-dot--one"></i>
                    <i class="pb-thanks-dot pb-thanks-dot--two"></i>
                    <i class="pb-thanks-dot pb-thanks-dot--three"></i>
                </div>
                <div class="pb-thanks-code"><span>STATUS</span><strong>200</strong><small>ORDER CONFIRMED</small></div>
            </div>
        </div>

        <footer class="pb-thanks-footer">
            <span><b>PBX</b> Снаряжение под контролем</span>
            <span><b>KZ</b> Алматы и Астана</span>
            <span><b>✓</b> Заявка зарегистрирована</span>
        </footer>
    </div>
</section>

@once
<style>
.pb-thanks{--pt-green:#20cf8a;--pt-mint:#44efa9;position:relative;min-height:760px;overflow:hidden;color:#fff;background:radial-gradient(circle at 72% 30%,rgba(23,170,107,.22),transparent 30%),linear-gradient(112deg,#06100a,#0d2117 58%,#07110b);border-top:1px solid var(--pt-green);border-bottom:2px solid var(--pt-green)}.pb-thanks *{box-sizing:border-box}.pb-thanks:after{content:'PANDBOX / CONFIRMED';position:absolute;left:50%;bottom:34px;color:rgba(55,224,157,.035);font:900 clamp(70px,9vw,155px)/.8 Arial;letter-spacing:-.07em;white-space:nowrap;transform:translateX(-50%)}.pb-thanks-canvas,.pb-thanks-scan{position:absolute;inset:0;width:100%;height:100%}.pb-thanks-canvas{z-index:1;opacity:.72}.pb-thanks-scan{z-index:2;pointer-events:none;background:linear-gradient(180deg,transparent 0,rgba(47,227,153,.04) 49%,rgba(47,227,153,.14) 50%,transparent 51%);background-size:100% 210px;animation:pbThanksScan 6s linear infinite}.pb-thanks-corner{position:absolute;z-index:3;width:85px;height:85px}.pb-thanks-corner--one{left:22px;top:22px;border-left:2px solid var(--pt-green);border-top:2px solid var(--pt-green)}.pb-thanks-corner--two{right:22px;bottom:22px;border-right:2px solid var(--pt-green);border-bottom:2px solid var(--pt-green)}.pb-thanks-container{position:relative;z-index:4;width:min(1320px,calc(100% - 48px));margin-inline:auto}.pb-thanks-breadcrumbs{height:72px;display:flex;align-items:center;gap:12px;border-bottom:1px solid rgba(75,227,164,.17);font-size:12px}.pb-thanks-breadcrumbs a{color:var(--pt-green);text-decoration:none}.pb-thanks-breadcrumbs span{color:#52685c}.pb-thanks-breadcrumbs b{color:#83968b;font-weight:500}.pb-thanks-stage{min-height:565px;display:grid;grid-template-columns:minmax(0,1.15fr) minmax(390px,.85fr);align-items:center;gap:70px;padding:54px 0}.pb-thanks-kicker{display:block;color:var(--pt-mint);font:700 10px Arial;letter-spacing:.23em}.pb-thanks-copy h1{margin:16px 0 22px!important;color:#fff!important;font-size:clamp(58px,6vw,92px)!important;font-weight:500!important;line-height:.91!important;letter-spacing:-.045em}.pb-thanks-copy h1 span{color:var(--pt-green)}.pb-thanks-copy>p{max-width:670px;margin:0;color:#9baca2;font-size:15px;line-height:1.65}.pb-thanks-steps{display:grid;grid-template-columns:repeat(3,minmax(0,1fr));margin:34px 0;border:1px solid rgba(55,224,157,.18);background:rgba(4,14,8,.34)}.pb-thanks-steps>div{min-height:105px;display:flex;align-items:center;gap:12px;padding:18px;border-right:1px solid rgba(55,224,157,.16)}.pb-thanks-steps>div:last-child{border-right:0}.pb-thanks-steps i{color:var(--pt-green);font:500 27px/1 'MagistralMedium',Tahoma,sans-serif}.pb-thanks-steps b,.pb-thanks-steps small{display:block}.pb-thanks-steps b{color:#dce8e1;font-size:11px}.pb-thanks-steps small{margin-top:6px;color:#71867a;font-size:9px;line-height:1.4}.pb-thanks-actions{display:flex;gap:12px}.pb-thanks-actions a{min-height:54px;display:inline-flex;align-items:center;justify-content:center;gap:12px;padding:13px 22px;text-decoration:none;transition:.22s}.pb-thanks-primary{border:1px solid var(--pt-green);color:#06110b;background:linear-gradient(90deg,var(--pt-green),var(--pt-mint))}.pb-thanks-primary:hover{color:#fff;background:#078b59;transform:translateY(-2px)}.pb-thanks-primary svg{width:20px;height:20px;fill:none;stroke:currentColor;stroke-width:1.8;stroke-linecap:round;stroke-linejoin:round}.pb-thanks-secondary{border:1px solid #375247;color:#c9d8d0;background:rgba(255,255,255,.02)}.pb-thanks-secondary:hover{border-color:var(--pt-green);color:var(--pt-mint)}.pb-thanks-visual{position:relative;min-height:430px;display:grid;place-items:center}.pb-thanks-radar{position:relative;width:min(390px,34vw);aspect-ratio:1;border:1px solid rgba(55,224,157,.22);transform:rotate(45deg)}.pb-thanks-radar:before,.pb-thanks-radar:after{content:'';position:absolute;width:42px;height:42px}.pb-thanks-radar:before{left:-1px;top:-1px;border-left:3px solid var(--pt-mint);border-top:3px solid var(--pt-mint)}.pb-thanks-radar:after{right:-1px;bottom:-1px;border-right:3px solid var(--pt-mint);border-bottom:3px solid var(--pt-mint)}.pb-thanks-ring{position:absolute;inset:50%;border:1px solid rgba(65,230,164,.22);border-radius:50%;transform:translate(-50%,-50%)}.pb-thanks-ring--one{width:78%;height:78%}.pb-thanks-ring--two{width:54%;height:54%}.pb-thanks-ring--three{width:30%;height:30%;background:rgba(27,201,132,.045)}.pb-thanks-axis{position:absolute;left:50%;top:50%;background:rgba(65,230,164,.2);transform:translate(-50%,-50%)}.pb-thanks-axis--x{width:100%;height:1px}.pb-thanks-axis--y{width:1px;height:100%}.pb-thanks-check{position:absolute;left:50%;top:50%;width:96px;height:96px;display:grid;place-items:center;border:1px solid var(--pt-green);color:var(--pt-mint);background:#0a1c13;box-shadow:0 0 55px rgba(38,224,150,.17);transform:translate(-50%,-50%) rotate(-45deg)}.pb-thanks-check svg{width:66px;height:66px;fill:none;stroke:currentColor;stroke-width:5;stroke-linecap:square;stroke-linejoin:miter}.pb-thanks-dot{position:absolute;width:9px;height:9px;background:var(--pt-mint);box-shadow:0 0 0 7px rgba(55,224,157,.08)}.pb-thanks-dot--one{left:17%;top:30%}.pb-thanks-dot--two{right:11%;top:18%}.pb-thanks-dot--three{right:24%;bottom:12%}.pb-thanks-code{position:absolute;right:0;bottom:0;width:170px;padding:15px;border:1px solid rgba(55,224,157,.18);background:rgba(4,13,8,.72)}.pb-thanks-code span,.pb-thanks-code small{display:block;color:#70847a;font:700 8px Arial;letter-spacing:.17em}.pb-thanks-code strong{display:block;margin:7px 0;color:var(--pt-mint);font:500 38px/1 'MagistralMedium',Tahoma,sans-serif}.pb-thanks-footer{height:72px;display:grid;grid-template-columns:repeat(3,1fr);border-top:1px solid rgba(55,224,157,.17);border-left:1px solid rgba(55,224,157,.17)}.pb-thanks-footer>span{display:flex;align-items:center;gap:10px;padding:0 20px;border-right:1px solid rgba(55,224,157,.17);color:#71867a;font-size:10px}.pb-thanks-footer b{color:var(--pt-green);font:500 20px 'MagistralMedium',Tahoma,sans-serif}@keyframes pbThanksScan{to{background-position:0 210px}}
@media(max-width:980px){.pb-thanks-stage{grid-template-columns:1fr;gap:10px}.pb-thanks-visual{min-height:360px}.pb-thanks-radar{width:330px}.pb-thanks-footer{margin-top:30px}}
@media(max-width:680px){.pb-thanks-container{width:min(100% - 24px,1320px)}.pb-thanks-stage{padding:40px 0}.pb-thanks-copy h1{font-size:49px!important}.pb-thanks-steps{grid-template-columns:1fr}.pb-thanks-steps>div{min-height:82px;border-right:0;border-bottom:1px solid rgba(55,224,157,.16)}.pb-thanks-actions{align-items:stretch;flex-direction:column}.pb-thanks-visual{min-height:315px}.pb-thanks-radar{width:270px}.pb-thanks-footer{height:auto;grid-template-columns:1fr}.pb-thanks-footer>span{min-height:54px;border-bottom:1px solid rgba(55,224,157,.12)}}
@media(max-width:680px){
    .pb-thanks-root{overflow-x:clip}
    .pb-thanks{min-height:0;padding-bottom:76px}
    .pb-thanks:after{bottom:72px;font-size:58px}
    .pb-thanks-container{width:calc(100% - 20px)}
    .pb-thanks-corner{width:42px;height:42px}
    .pb-thanks-corner--one{left:8px;top:8px}.pb-thanks-corner--two{right:8px;bottom:84px}
    .pb-thanks-breadcrumbs{height:48px;gap:9px;overflow-x:auto;white-space:nowrap;scrollbar-width:none}
    .pb-thanks-breadcrumbs::-webkit-scrollbar{display:none}
    .pb-thanks-stage{min-height:0;gap:16px;padding:26px 0 12px}
    .pb-thanks-kicker{font-size:9px}
    .pb-thanks-copy h1{margin:10px 0 14px!important;font-size:40px!important;line-height:.96!important}
    .pb-thanks-copy>p{font-size:13px;line-height:1.5}
    .pb-thanks-steps{grid-template-columns:repeat(3,minmax(0,1fr));margin:22px 0 18px}
    .pb-thanks-steps>div{min-height:92px;align-items:flex-start;flex-direction:column;gap:7px;padding:11px 8px;border-right:1px solid rgba(55,224,157,.16);border-bottom:0}
    .pb-thanks-steps>div:last-child{border-right:0}
    .pb-thanks-steps i{font-size:20px}
    .pb-thanks-steps b{font-size:8px;line-height:1.25}
    .pb-thanks-steps small{display:none}
    .pb-thanks-actions{display:grid;grid-template-columns:repeat(auto-fit,minmax(145px,1fr));gap:9px}
    .pb-thanks-actions a{min-height:50px;padding:11px 12px;font-size:12px;text-align:center}
    .pb-thanks-visual{min-height:200px}
    .pb-thanks-radar{width:178px}
    .pb-thanks-check{width:58px;height:58px}
    .pb-thanks-check svg{width:40px;height:40px}
    .pb-thanks-code{right:4px;width:108px;padding:9px}
    .pb-thanks-code strong{margin:4px 0;font-size:25px}
    .pb-thanks-footer{height:62px;grid-template-columns:repeat(3,minmax(0,1fr));margin-top:14px}
    .pb-thanks-footer>span{min-height:62px;align-items:center;justify-content:center;flex-direction:column;gap:3px;padding:5px 6px;border-right:1px solid rgba(55,224,157,.17);border-bottom:0;font-size:7px;line-height:1.2;text-align:center}
    .pb-thanks-footer b{font-size:14px}
}
</style>
<script data-navigate-once>
(function(){
    function initThanks(){
        if(window.__pbThanksCleanup)window.__pbThanksCleanup();
        var root=document.querySelector('[data-pb-thanks]');
        if(!root)return;
        var canvas=root.querySelector('[data-pb-thanks-canvas]');
        var ctx=canvas&&canvas.getContext?canvas.getContext('2d'):null;
        var raf=0,alive=true,particles=[],dpr=Math.min(window.devicePixelRatio||1,2),w=0,h=0;
        function resize(){
            if(!ctx)return;var rect=root.getBoundingClientRect();w=Math.max(1,rect.width);h=Math.max(1,rect.height);canvas.width=Math.round(w*dpr);canvas.height=Math.round(h*dpr);canvas.style.width=w+'px';canvas.style.height=h+'px';ctx.setTransform(dpr,0,0,dpr,0,0);
            particles=Array.from({length:Math.min(72,Math.max(34,Math.round(w/22)))},function(_,i){return{x:(i*137.5)%w,y:(i*83.7)%h,r:i%7===0?1.5:.7,s:.05+(i%5)*.018,a:.12+(i%4)*.05};});
        }
        function draw(t){
            if(!alive||!ctx)return;ctx.clearRect(0,0,w,h);ctx.strokeStyle='rgba(43,213,143,.075)';ctx.lineWidth=1;
            for(var x=0;x<w;x+=44){ctx.beginPath();ctx.moveTo(x,0);ctx.lineTo(x,h);ctx.stroke()}for(var y=0;y<h;y+=44){ctx.beginPath();ctx.moveTo(0,y);ctx.lineTo(w,y);ctx.stroke()}
            particles.forEach(function(p,i){p.y-=p.s;if(p.y<0){p.y=h;p.x=(p.x+173)%w}var pulse=.65+.35*Math.sin(t*.0015+i);ctx.fillStyle='rgba(57,229,162,'+(p.a*pulse)+')';ctx.beginPath();ctx.arc(p.x,p.y,p.r,0,Math.PI*2);ctx.fill()});
            raf=requestAnimationFrame(draw);
        }
        resize();window.addEventListener('resize',resize);raf=requestAnimationFrame(draw);
        var animated=root.querySelectorAll('.pb-thanks-breadcrumbs,.pb-thanks-copy>*,.pb-thanks-visual,.pb-thanks-footer>span,.pb-thanks-ring,.pb-thanks-dot');
        if(typeof gsap!=='undefined'){
            gsap.killTweensOf(animated);gsap.set(animated,{clearProps:'opacity,visibility,transform'});
            if(!(window.matchMedia&&window.matchMedia('(prefers-reduced-motion: reduce)').matches)){
                gsap.fromTo(root.querySelector('.pb-thanks-breadcrumbs'),{y:-12,autoAlpha:0},{y:0,autoAlpha:1,duration:.45,ease:'power2.out',clearProps:'opacity,visibility,transform'});
                gsap.fromTo(root.querySelectorAll('.pb-thanks-copy>*'),{x:-28,autoAlpha:0},{x:0,autoAlpha:1,duration:.55,stagger:.09,ease:'power3.out',delay:.08,clearProps:'opacity,visibility,transform'});
                gsap.fromTo(root.querySelector('.pb-thanks-visual'),{scale:.82,rotation:-2,autoAlpha:0},{scale:1,rotation:0,autoAlpha:1,duration:.8,ease:'back.out(1.35)',delay:.22,clearProps:'opacity,visibility,transform'});
                gsap.fromTo(root.querySelectorAll('.pb-thanks-footer>span'),{y:16,autoAlpha:0},{y:0,autoAlpha:1,duration:.42,stagger:.08,ease:'power2.out',delay:.55,clearProps:'opacity,visibility,transform'});
                gsap.to(root.querySelectorAll('.pb-thanks-ring'),{rotation:360,duration:18,repeat:-1,ease:'none',stagger:{each:1.2,from:'end'}});
                gsap.to(root.querySelectorAll('.pb-thanks-dot'),{scale:1.8,autoAlpha:.45,duration:1.1,repeat:-1,yoyo:true,ease:'sine.inOut',stagger:.25});
            }
        }
        window.__pbThanksCleanup=function(){alive=false;if(raf)cancelAnimationFrame(raf);window.removeEventListener('resize',resize);if(typeof gsap!=='undefined')gsap.killTweensOf(animated);window.__pbThanksCleanup=null};
    }
    if(document.readyState==='loading')document.addEventListener('DOMContentLoaded',initThanks,{once:true});else initThanks();
    document.addEventListener('livewire:navigating',function(){if(window.__pbThanksCleanup)window.__pbThanksCleanup()});
    document.addEventListener('livewire:navigated',function(){requestAnimationFrame(initThanks)});
    window.addEventListener('pageshow',function(){requestAnimationFrame(initThanks)});
})();
</script>
@endonce
</div>
