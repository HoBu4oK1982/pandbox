<div class="pb-contact-widget" data-pb-contact-widget>
    <div class="pb-contact-panel" aria-hidden="true">
        <div class="pb-contact-head"><span>PBX / СВЯЗЬ</span><strong>Связаться с нами</strong></div>
        <button type="button" class="pb-contact-row pb-contact-callback" data-pb-callback>
            <span class="pb-contact-icon"><svg viewBox="0 0 24 24"><path d="M21 15a4 4 0 0 1-4 4H8l-5 3V7a4 4 0 0 1 4-4h10a4 4 0 0 1 4 4Z"/><path d="M8 9h8M8 13h5"/></svg></span>
            <span><small>Оставить заявку</small><b>Перезвоните мне</b></span><svg class="pb-contact-arrow" viewBox="0 0 24 24"><path d="M5 12h13M13 6l6 6-6 6"/></svg>
        </button>
        <a href="tel:+77773880866" class="pb-contact-row">
            <span class="pb-contact-icon"><svg viewBox="0 0 24 24"><path d="M22 16.9v3a2 2 0 0 1-2.2 2 19.8 19.8 0 0 1-8.6-3.1 19.5 19.5 0 0 1-6-6A19.8 19.8 0 0 1 2.1 4.2 2 2 0 0 1 4.1 2h3a2 2 0 0 1 2 1.7c.1 1 .4 1.9.7 2.8a2 2 0 0 1-.5 2.1L8.1 9.9a16 16 0 0 0 6 6l1.3-1.3a2 2 0 0 1 2.1-.5c.9.4 1.8.6 2.8.7a2 2 0 0 1 1.7 2.1Z"/></svg></span>
            <span><small>Основной номер</small><b>+7 (777) 388 08 66</b></span><svg class="pb-contact-arrow" viewBox="0 0 24 24"><path d="M5 12h13M13 6l6 6-6 6"/></svg>
        </a>
        <a href="tel:+77072184465" class="pb-contact-row">
            <span class="pb-contact-icon"><svg viewBox="0 0 24 24"><path d="M22 16.9v3a2 2 0 0 1-2.2 2 19.8 19.8 0 0 1-8.6-3.1 19.5 19.5 0 0 1-6-6A19.8 19.8 0 0 1 2.1 4.2 2 2 0 0 1 4.1 2h3a2 2 0 0 1 2 1.7c.1 1 .4 1.9.7 2.8a2 2 0 0 1-.5 2.1L8.1 9.9a16 16 0 0 0 6 6l1.3-1.3a2 2 0 0 1 2.1-.5c.9.4 1.8.6 2.8.7a2 2 0 0 1 1.7 2.1Z"/></svg></span>
            <span><small>WhatsApp / звонки</small><b>+7 (707) 218 44 65</b></span><svg class="pb-contact-arrow" viewBox="0 0 24 24"><path d="M5 12h13M13 6l6 6-6 6"/></svg>
        </a>
        <a href="https://wa.me/77773880866" target="_blank" rel="noopener" class="pb-contact-row pb-contact-whatsapp">
            <span class="pb-contact-icon">@include('partials.icons.whatsapp')</span>
            <span><small>Написать сейчас</small><b>WhatsApp</b></span><svg class="pb-contact-arrow" viewBox="0 0 24 24"><path d="M5 12h13M13 6l6 6-6 6"/></svg>
        </a>
    </div>
    <button type="button" class="pb-contact-launcher" aria-label="Открыть контакты" aria-expanded="false">
        <span class="pb-contact-pulse"></span>
        <svg viewBox="0 0 24 24"><path d="M22 16.9v3a2 2 0 0 1-2.2 2 19.8 19.8 0 0 1-8.6-3.1 19.5 19.5 0 0 1-6-6A19.8 19.8 0 0 1 2.1 4.2 2 2 0 0 1 4.1 2h3a2 2 0 0 1 2 1.7c.1 1 .4 1.9.7 2.8a2 2 0 0 1-.5 2.1L8.1 9.9a16 16 0 0 0 6 6l1.3-1.3a2 2 0 0 1 2.1-.5c.9.4 1.8.6 2.8.7a2 2 0 0 1 1.7 2.1Z"/></svg>
        <svg class="pb-contact-close" viewBox="0 0 24 24" aria-hidden="true"><path d="M6 6l12 12M18 6 6 18"/></svg>
    </button>
</div>

<button type="button" class="pb-scroll-meter" aria-label="Наверх" data-pb-scroll-meter>
    <span class="pb-scroll-distance pb-scroll-distance-top"><small>ДО ВЕРХА</small><b data-pb-scroll-top>0 px</b></span>
    <span class="pb-scroll-track"><i></i><em></em></span>
    <span class="pb-scroll-arrow"><svg viewBox="0 0 24 24"><path d="M12 20V5M6 11l6-6 6 6"/></svg><b data-pb-scroll-percent>0%</b></span>
    <span class="pb-scroll-distance pb-scroll-distance-bottom"><small>ДО НИЗА</small><b data-pb-scroll-bottom>0 px</b></span>
</button>

<style>
    .pb-contact-widget{position:fixed;z-index:150000;right:24px;bottom:28px;display:flex;align-items:flex-end;gap:12px}.pb-contact-launcher{position:relative;width:62px;height:62px;display:grid;place-items:center;overflow:visible;border:1px solid #35d99a;color:#fff;background:linear-gradient(145deg,#16ad73,#087b50);box-shadow:0 15px 35px rgba(5,78,47,.3);cursor:pointer}.pb-contact-launcher>svg{position:absolute;z-index:2;width:26px;height:26px;fill:none;stroke:currentColor;stroke-width:1.7;stroke-linecap:round;stroke-linejoin:round}.pb-contact-launcher>.pb-contact-close{opacity:0;visibility:hidden}.pb-contact-pulse{position:absolute;inset:-1px;border:1px solid #20c883;animation:pbContactPulse 2s ease-out infinite}@keyframes pbContactPulse{0%{transform:scale(1);opacity:.8}80%,100%{transform:scale(1.35);opacity:0}}
    .pb-contact-panel{position:absolute;right:0;bottom:76px;width:310px;overflow:hidden;border:1px solid rgba(32,200,131,.4);color:#fff;background:#111a15;box-shadow:0 25px 60px rgba(2,22,12,.35);opacity:0;visibility:hidden;transform:translateY(14px) scale(.96);transform-origin:right bottom;pointer-events:none}.pb-contact-widget.open .pb-contact-panel{opacity:1;visibility:visible;transform:translateY(0) scale(1);pointer-events:auto}.pb-contact-head{padding:17px 18px;background:linear-gradient(110deg,rgba(32,200,131,.12),transparent)}.pb-contact-head span{display:block;color:#39da98;font:700 8px/1 Arial;letter-spacing:.2em}.pb-contact-head strong{display:block;margin-top:6px;font-size:17px}.pb-contact-row{width:100%;display:grid;grid-template-columns:38px 1fr 18px;align-items:center;gap:10px;padding:12px 15px;box-sizing:border-box;border:0;border-top:1px solid rgba(255,255,255,.09);color:#eaf1ed;background:transparent;font-family:inherit;text-align:left;text-decoration:none;cursor:pointer;transition:background .2s,color .2s}.pb-contact-row:hover{color:#fff;background:rgba(32,200,131,.12)}.pb-contact-icon{width:34px;height:34px;display:grid;place-items:center;border:1px solid rgba(57,218,152,.3);color:#39da98}.pb-contact-icon svg{width:18px;height:18px;fill:none;stroke:currentColor;stroke-width:1.7;stroke-linecap:round;stroke-linejoin:round}.pb-contact-whatsapp .pb-contact-icon{color:#31dfa0}.pb-contact-whatsapp .pb-contact-icon .pb-whatsapp-icon{width:20px;height:20px;fill:currentColor!important;stroke:none!important}.pb-contact-row>span:nth-child(2){display:flex;flex-direction:column;gap:3px}.pb-contact-row small{color:#84988d;font-size:9px}.pb-contact-row b{font-size:12px}.pb-contact-row>i{color:#39da98;font-style:normal}
    .pb-scroll-meter{--pb-progress:0%;position:fixed;z-index:149999;left:24px;bottom:28px;width:92px;display:grid;grid-template-rows:auto 56px auto;grid-template-columns:27px 1fr;gap:7px 9px;padding:11px;border:1px solid rgba(32,200,131,.35);color:#dfe9e4;background:rgba(12,25,18,.92);box-shadow:0 12px 30px rgba(3,31,17,.2);backdrop-filter:blur(8px);-webkit-backdrop-filter:blur(8px);cursor:pointer;text-align:left;opacity:0;visibility:hidden;pointer-events:none;transform:translateY(12px);transition:opacity .24s,visibility .24s,transform .24s}.pb-scroll-meter.is-visible{opacity:.82;visibility:visible;pointer-events:auto;transform:translateY(0)}.pb-scroll-meter.is-visible:hover{opacity:1;transform:translateY(-3px)}.pb-scroll-distance{grid-column:1/3;display:flex;justify-content:space-between;gap:6px}.pb-scroll-distance small{color:#6f887b;font:700 7px Arial;letter-spacing:.1em}.pb-scroll-distance b{color:#39da98;font:700 8px Arial}.pb-scroll-track{position:relative;grid-row:2;grid-column:1;width:3px;height:56px;display:block;margin:auto;background:#34453c}.pb-scroll-track i{position:absolute;left:0;bottom:0;width:100%;height:var(--pb-progress);background:#20c883}.pb-scroll-track em{position:absolute;left:50%;bottom:var(--pb-progress);width:9px;height:1px;background:#39da98;transform:translate(-50%,50%)}.pb-scroll-arrow{grid-row:2;grid-column:2;display:flex;flex-direction:column;align-items:center;justify-content:center;gap:4px;border-left:1px solid rgba(255,255,255,.08)}.pb-scroll-arrow svg{width:22px;height:22px;fill:none;stroke:#fff;stroke-width:1.6;stroke-linecap:round;stroke-linejoin:round}.pb-scroll-arrow b{color:#39da98;font:700 9px Arial}
    .pb-contact-arrow{width:17px;height:17px;fill:none;stroke:#39da98;stroke-width:1.7;stroke-linecap:round;stroke-linejoin:round}
    @media(max-width:768px){.pb-contact-widget{right:14px;bottom:18px}.pb-contact-launcher{width:54px;height:54px}.pb-contact-panel{right:0;bottom:65px;width:min(310px,calc(100vw - 28px))}.pb-scroll-meter{left:14px;bottom:18px;width:78px;padding:8px}.pb-scroll-distance small{display:none}}
</style>

<script data-navigate-once>
(function(){
    var ticking=false;
    function setContactWidget(root,open,immediate){
        if(!root)return;
        var launcher=root.querySelector('.pb-contact-launcher');
        var panel=root.querySelector('.pb-contact-panel');
        var rows=panel?panel.querySelectorAll('.pb-contact-head,.pb-contact-row'):[];
        var phone=launcher?launcher.querySelector('svg:not(.pb-contact-close)'):null;
        var close=launcher?launcher.querySelector('.pb-contact-close'):null;
        var pulse=launcher?launcher.querySelector('.pb-contact-pulse'):null;
        if(launcher)launcher.setAttribute('aria-expanded',open?'true':'false');
        if(panel)panel.setAttribute('aria-hidden',open?'false':'true');
        if(typeof gsap==='undefined'){
            root.classList.toggle('open',open);
            return;
        }
        gsap.killTweensOf([panel,launcher,phone,close,pulse].concat(Array.from(rows)));
        if(immediate){
            root.classList.toggle('open',open);
            gsap.set(panel,{autoAlpha:open?1:0,y:open?0:18,scale:open?1:.94,pointerEvents:open?'auto':'none'});
            gsap.set(phone,{autoAlpha:open?0:1,scale:open?.65:1,rotation:open?-35:0});
            gsap.set(close,{autoAlpha:open?1:0,scale:open?1:.65,rotation:open?0:35});
            return;
        }
        if(open){
            root.classList.add('open');
            var enter=gsap.timeline({defaults:{overwrite:'auto'}});
            enter.set(panel,{pointerEvents:'auto'})
                .fromTo(panel,{autoAlpha:0,y:22,scale:.92,clipPath:'inset(100% 0 0 0)'},{autoAlpha:1,y:0,scale:1,clipPath:'inset(0% 0 0 0)',duration:.42,ease:'power3.out'},0)
                .fromTo(rows,{autoAlpha:0,x:22},{autoAlpha:1,x:0,duration:.3,stagger:.055,ease:'power2.out'},.12)
                .to(launcher,{rotation:90,scale:.92,duration:.2,ease:'power2.out'},0)
                .to(launcher,{rotation:0,scale:1,duration:.34,ease:'back.out(2)'},.2)
                .to(phone,{autoAlpha:0,scale:.55,rotation:-55,duration:.18},0)
                .fromTo(close,{autoAlpha:0,scale:.55,rotation:55},{autoAlpha:1,scale:1,rotation:0,duration:.3,ease:'back.out(2)'},.12)
                .to(pulse,{autoAlpha:0,duration:.18},0);
        }else{
            var leave=gsap.timeline({defaults:{overwrite:'auto'},onComplete:function(){root.classList.remove('open');gsap.set(panel,{pointerEvents:'none'});}});
            leave.to(rows,{autoAlpha:0,x:18,duration:.18,stagger:{each:.025,from:'end'},ease:'power2.in'},0)
                .to(panel,{autoAlpha:0,y:18,scale:.94,clipPath:'inset(100% 0 0 0)',duration:.3,ease:'power3.in'},.08)
                .to(close,{autoAlpha:0,scale:.55,rotation:55,duration:.18},0)
                .fromTo(phone,{autoAlpha:0,scale:.55,rotation:-55},{autoAlpha:1,scale:1,rotation:0,duration:.3,ease:'back.out(2)'},.12)
                .to(pulse,{autoAlpha:1,duration:.2},.18);
        }
    }
    function formatDistance(value){return Math.max(0,Math.round(value)).toLocaleString('ru-RU')+' px';}
    function updateMeter(){
        ticking=false;
        var meter=document.querySelector('[data-pb-scroll-meter]');
        if(!meter)return;
        var top=window.scrollY||window.pageYOffset||0;
        meter.classList.toggle('is-visible',top>200);
        var max=Math.max(0,document.documentElement.scrollHeight-window.innerHeight);
        var bottom=Math.max(0,max-top);
        var percent=max>0?Math.min(100,Math.max(0,top/max*100)):0;
        meter.style.setProperty('--pb-progress',percent.toFixed(1)+'%');
        var topEl=meter.querySelector('[data-pb-scroll-top]'),bottomEl=meter.querySelector('[data-pb-scroll-bottom]'),percentEl=meter.querySelector('[data-pb-scroll-percent]');
        if(topEl)topEl.textContent=formatDistance(top);
        if(bottomEl)bottomEl.textContent=formatDistance(bottom);
        if(percentEl)percentEl.textContent=Math.round(percent)+'%';
    }
    function requestUpdate(){if(ticking)return;ticking=true;requestAnimationFrame(updateMeter);}
    if(!window.__pbFloatingToolsBooted){
        window.__pbFloatingToolsBooted=true;
        window.addEventListener('scroll',requestUpdate,{passive:true});
        window.addEventListener('resize',requestUpdate,{passive:true});
        document.addEventListener('livewire:navigated',function(){document.querySelectorAll('[data-pb-contact-widget]').forEach(function(w){setContactWidget(w,false,true);});requestUpdate();});
        document.addEventListener('click',function(e){
            var launcher=e.target.closest&&e.target.closest('.pb-contact-launcher');
            var widget=e.target.closest&&e.target.closest('[data-pb-contact-widget]');
            if(launcher){var root=launcher.closest('[data-pb-contact-widget]');setContactWidget(root,!root.classList.contains('open'),false);return;}
            if(!widget)document.querySelectorAll('[data-pb-contact-widget].open').forEach(function(w){setContactWidget(w,false,false);});
            var meter=e.target.closest&&e.target.closest('[data-pb-scroll-meter]');
            if(meter){e.preventDefault();if(window.lenis&&typeof window.lenis.scrollTo==='function'){window.lenis.scrollTo(0);}else{window.scrollTo({top:0,behavior:'smooth'});}}
        });
    }
    document.querySelectorAll('[data-pb-contact-widget]').forEach(function(w){setContactWidget(w,false,true);});
    requestUpdate();
})();
</script>
