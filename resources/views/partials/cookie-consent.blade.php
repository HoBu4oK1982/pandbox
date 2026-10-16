<div class="pb-cookie-consent" data-pb-cookie-consent aria-hidden="true">
    <div class="pb-cookie-panel" role="dialog" aria-labelledby="pbCookieTitle" aria-describedby="pbCookieText">
        <span class="pb-cookie-code">PBX / COOKIE CONTROL</span>
        <div class="pb-cookie-icon" aria-hidden="true">
            <svg viewBox="0 0 48 48"><circle class="pb-cookie-outline" cx="24" cy="24" r="16"/><circle class="pb-cookie-chip" cx="18" cy="17" r="2.2"/><circle class="pb-cookie-chip" cx="30" cy="19" r="1.8"/><circle class="pb-cookie-chip" cx="20" cy="29" r="1.8"/><circle class="pb-cookie-chip" cx="31" cy="31" r="2.3"/><path d="M10 25c3 1 5 3 6 6M27 9c0 3 2 5 5 6"/></svg>
        </div>
        <div class="pb-cookie-copy">
            <h2 id="pbCookieTitle">Мы используем cookie</h2>
            <p id="pbCookieText">Cookie помогают сохранять настройки, корректно работать корзине и делать сайт удобнее.</p>
        </div>
        <div class="pb-cookie-actions">
            <button type="button" class="pb-cookie-secondary" data-pb-cookie-essential>Только необходимые</button>
            <button type="button" class="pb-cookie-accept" data-pb-cookie-accept><span>Принять</span><svg viewBox="0 0 24 24" aria-hidden="true"><path d="m5 12 4 4L19 6"/></svg></button>
        </div>
        <span class="pb-cookie-corner" aria-hidden="true"></span>
    </div>
    <style>
        .pb-cookie-consent{position:fixed;z-index:100450;left:50%;bottom:24px;width:min(1040px,calc(100% - 32px));visibility:hidden;opacity:0;pointer-events:none;transform:translateX(-50%)}
        .pb-cookie-consent.is-visible{visibility:visible;pointer-events:auto}
        .pb-cookie-panel{position:relative;display:grid;grid-template-columns:72px minmax(0,1fr) auto;align-items:center;gap:22px;overflow:hidden;padding:26px 28px;border:1px solid rgba(50,220,155,.62);color:#fff;background:linear-gradient(112deg,rgba(7,20,13,.98),rgba(11,31,20,.97));box-shadow:0 24px 70px rgba(0,0,0,.34);isolation:isolate}
        .pb-cookie-panel:before{content:'';position:absolute;z-index:-1;inset:0;opacity:.16;background-image:radial-gradient(circle,rgba(50,220,155,.58) 1px,transparent 1.2px);background-size:23px 23px}.pb-cookie-panel:after{content:'COOKIE';position:absolute;z-index:-1;right:18%;bottom:-21px;color:rgba(50,220,155,.045);font:900 82px/.8 Arial;letter-spacing:-.06em}
        .pb-cookie-code{position:absolute;left:122px;top:15px;color:#39da98;font:700 8px/1 Arial;letter-spacing:.2em}.pb-cookie-icon{width:66px;height:66px;display:grid;place-items:center;border:1px solid rgba(50,220,155,.38);color:#39da98;background:rgba(50,220,155,.07)}.pb-cookie-icon svg{width:46px;height:46px;fill:none;stroke:currentColor;stroke-width:1.55;stroke-linecap:round;stroke-linejoin:round}.pb-cookie-icon .pb-cookie-chip{fill:currentColor;stroke:none}.pb-cookie-icon .pb-cookie-outline{fill:rgba(50,220,155,.055)}
        .pb-cookie-copy{min-width:0;padding-top:7px}.pb-cookie-copy h2{margin:0 0 7px;color:#fff;font-size:22px;font-weight:600;line-height:1.1}.pb-cookie-copy p{max-width:570px;margin:0;color:#a9bab1;font-size:13px;line-height:1.5}
        .pb-cookie-actions{display:flex;align-items:center;gap:10px}.pb-cookie-actions button{min-height:48px;padding:0 19px;border:1px solid rgba(50,220,155,.42);color:#d8e5de;background:rgba(255,255,255,.025);font:600 12px/1 Arial;cursor:pointer}.pb-cookie-actions button:hover{color:#fff;border-color:#39da98;background:rgba(50,220,155,.09)}.pb-cookie-actions .pb-cookie-accept{min-width:138px;display:inline-flex;align-items:center;justify-content:center;gap:10px;border-color:#20c883;color:#07110c;background:#20c883}.pb-cookie-actions .pb-cookie-accept:hover{color:#07110c;background:#39da98}.pb-cookie-accept svg{width:19px;height:19px;fill:none;stroke:currentColor;stroke-width:2;stroke-linecap:round;stroke-linejoin:round}.pb-cookie-corner{position:absolute;right:11px;top:11px;width:22px;height:22px;border-top:1px solid #39da98;border-right:1px solid #39da98}
        @media(max-width:760px){.pb-cookie-consent{bottom:12px;width:calc(100% - 20px)}.pb-cookie-panel{grid-template-columns:52px minmax(0,1fr);gap:14px;padding:25px 18px 18px}.pb-cookie-icon{width:50px;height:50px}.pb-cookie-icon svg{width:33px;height:33px}.pb-cookie-code{left:84px;top:13px}.pb-cookie-copy h2{font-size:18px}.pb-cookie-copy p{font-size:12px}.pb-cookie-actions{grid-column:1/-1;display:grid;grid-template-columns:1fr 1fr}.pb-cookie-actions button{padding-inline:10px}.pb-cookie-panel:after{display:none}}
        @media(prefers-reduced-motion:reduce){.pb-cookie-consent,.pb-cookie-consent *{transition:none!important;animation:none!important}}
    </style>
    <script data-navigate-once>
    (function(){
        if(window.__pbCookieConsentBooted)return;window.__pbCookieConsentBooted=true;
        var storageKey='pandbox_cookie_consent_v1';
        function root(){return document.querySelector('[data-pb-cookie-consent]');}
        function show(){var el=root();if(!el||localStorage.getItem(storageKey))return;var panel=el.querySelector('.pb-cookie-panel');el.classList.add('is-visible');el.setAttribute('aria-hidden','false');if(typeof gsap!=='undefined'&&!window.matchMedia('(prefers-reduced-motion: reduce)').matches){gsap.fromTo(el,{autoAlpha:0,y:34},{autoAlpha:1,y:0,duration:.55,ease:'expo.out'});gsap.fromTo(panel,{clipPath:'inset(0 50% 0 50%)'},{clipPath:'inset(0 0% 0 0%)',duration:.65,ease:'power3.out'});gsap.fromTo(panel.querySelectorAll('.pb-cookie-icon,.pb-cookie-copy>* ,.pb-cookie-actions button'),{y:14,autoAlpha:0},{y:0,autoAlpha:1,duration:.38,stagger:.055,delay:.2,ease:'power2.out'});}else{el.style.opacity='1';}}
        function hide(choice){var el=root();if(!el)return;localStorage.setItem(storageKey,choice);var done=function(){el.classList.remove('is-visible');el.setAttribute('aria-hidden','true');el.style.opacity='';el.style.transform='';};if(typeof gsap!=='undefined'&&!window.matchMedia('(prefers-reduced-motion: reduce)').matches){gsap.to(el,{y:26,autoAlpha:0,duration:.3,ease:'power2.in',onComplete:done});}else done();}
        document.addEventListener('click',function(event){if(event.target.closest('[data-pb-cookie-accept]'))hide('accepted');if(event.target.closest('[data-pb-cookie-essential]'))hide('essential');});
        if(document.readyState==='loading'){document.addEventListener('DOMContentLoaded',function(){setTimeout(show,700);},{once:true});}else setTimeout(show,700);document.addEventListener('livewire:navigated',show);
    })();
    </script>
</div>
