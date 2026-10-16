{{-- ══════════════════════════════════════════════════════════════
     МОДАЛЬНЫЕ ОКНА — Перезвоните мне + Купить в 1 клик
     Подключить в base.blade.php: @include('partials.modals')
     ══════════════════════════════════════════════════════════════ --}}

{{-- ─── OVERLAY ─── --}}
<div class="pb-modal-overlay" id="pbModalOverlay"></div>

{{-- ═══════════ МОДАЛКА «ПЕРЕЗВОНИТЕ МНЕ» ═══════════ --}}
<div class="pb-modal" id="pbModalCallback">
    <div class="pb-modal-inner">
        {{-- Левая панель --}}
        <div class="pb-modal-left">
            <canvas class="pb-modal-canvas" id="pbCanvasCallback"></canvas>
            <div class="pb-modal-left-content">
                <h2 class="pb-modal-h2">Подберём<br>и перезвоним</h2>
                <p class="pb-modal-desc">Оставьте контакты — специалист уточнит задачу, проверит наличие и ответит без навязчивых продаж.</p>
                <ul class="pb-modal-features">
                    <li>
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                        Консультация по снаряжению
                    </li>
                    <li>
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/></svg>
                        Быстрый ответ в рабочее время
                    </li>
                    <li>
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 12l2 2 4-4"/><circle cx="12" cy="12" r="10"/></svg>
                        Данные не передаём третьим лицам
                    </li>
                </ul>
            </div>
            <div class="pb-modal-phone-icon" id="pbPhoneIcon">
                <svg viewBox="0 0 24 24" fill="currentColor"><path d="M6.62 10.79a15.05 15.05 0 006.59 6.59l2.2-2.2a1 1 0 011.01-.24 11.36 11.36 0 003.58.57 1 1 0 011 1V20a1 1 0 01-1 1A17 17 0 013 4a1 1 0 011-1h3.5a1 1 0 011 1 11.36 11.36 0 00.57 3.58 1 1 0 01-.24 1.01l-2.2 2.2z"/></svg>
            </div>
        </div>
        {{-- Правая панель --}}
        <div class="pb-modal-right">
            <div class="pb-modal-close" id="pbCloseCallback">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 6L6 18M6 6l12 12"/></svg>
            </div>
            <h3 class="pb-modal-h3">Как к вам<br>обратиться?</h3>
            <p class="pb-modal-sub">Только имя и телефон — займёт меньше минуты.</p>
            <form id="pbFormCallback" action="javascript:void(0);">
                <div class="pb-modal-field">
                    <label class="pb-modal-label">Ваше имя</label>
                    <div class="pb-modal-input-wrap">
                        <svg class="pb-modal-input-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                        <input type="text" name="name" required placeholder="Ваше имя" class="pb-modal-input">
                    </div>
                </div>
                <div class="pb-modal-field">
                    <label class="pb-modal-label">Номер телефона</label>
                    <div class="pb-modal-input-wrap">
                        <svg class="pb-modal-input-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07 19.5 19.5 0 01-6-6A19.79 19.79 0 012.12 4.18 2 2 0 014.11 2h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L8.09 9.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 16.92z"/></svg>
                        <input type="text" name="phone" required placeholder="+7 (___) ___-__-__" class="pb-modal-input art-stranger">
                    </div>
                </div>
                <button type="submit" class="pb-modal-btn">
                    <svg viewBox="0 0 24 24" fill="currentColor" style="width:18px;height:18px"><path d="M6.62 10.79a15.05 15.05 0 006.59 6.59l2.2-2.2a1 1 0 011.01-.24 11.36 11.36 0 003.58.57 1 1 0 011 1V20a1 1 0 01-1 1A17 17 0 013 4a1 1 0 011-1h3.5a1 1 0 011 1 11.36 11.36 0 00.57 3.58 1 1 0 01-.24 1.01l-2.2 2.2z"/></svg>
                    Перезвоните мне
                    <span class="pb-modal-btn-arrow">→</span>
                </button>
            </form>
            <div class="pb-modal-instant">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" style="width:20px;height:20px;color:#159766"><path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07 19.5 19.5 0 01-6-6A19.79 19.79 0 012.12 4.18 2 2 0 014.11 2h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L8.09 9.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 16.92z"/></svg>
                <div>
                    <span class="pb-modal-instant-label">Не хотите ждать?</span>
                    <a href="tel:+77773880866" class="pb-modal-instant-phone">+7 (777) 388 08 66</a>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- ═══════════ МОДАЛКА «КУПИТЬ В 1 КЛИК» ═══════════ --}}
<div class="pb-modal" id="pbModalOneclick">
    <div class="pb-modal-inner pb-modal-compact">
        <div class="pb-modal-right pb-modal-right-full">
            <div class="pb-modal-close" id="pbCloseOneclick">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 6L6 18M6 6l12 12"/></svg>
            </div>
            <h3 class="pb-modal-h3">Купить в 1 клик</h3>
            <p class="pb-modal-sub">Оставьте контакты и мы оформим заказ за вас.</p>
            <div class="pb-modal-product-info" id="pbOneclickProduct">
                <div class="pb-modal-product-name" id="pbOneclickName"></div>
            </div>
            <form id="pbFormOneclick" action="javascript:void(0);">
                <input type="hidden" name="product" id="pbOneclickHidden">
                <div class="pb-modal-field">
                    <label class="pb-modal-label">Ваше имя</label>
                    <div class="pb-modal-input-wrap">
                        <svg class="pb-modal-input-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                        <input type="text" name="name" required placeholder="Ваше имя" class="pb-modal-input">
                    </div>
                </div>
                <div class="pb-modal-field">
                    <label class="pb-modal-label">Телефон</label>
                    <div class="pb-modal-input-wrap">
                        <svg class="pb-modal-input-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07 19.5 19.5 0 01-6-6A19.79 19.79 0 012.12 4.18 2 2 0 014.11 2h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L8.09 9.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 16.92z"/></svg>
                        <input type="text" name="phone" required placeholder="+7 (___) ___-__-__" class="pb-modal-input art-stranger">
                    </div>
                </div>
                <button type="submit" class="pb-modal-btn pb-modal-btn-buy">
                    <svg viewBox="0 0 24 24" fill="currentColor" style="width:18px;height:18px"><path d="M7 18c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zM1 2v2h2l3.6 7.59-1.35 2.45c-.16.28-.25.61-.25.96 0 1.1.9 2 2 2h12v-2H7.42c-.14 0-.25-.11-.25-.25l.03-.12.9-1.63h7.45c.75 0 1.41-.41 1.75-1.03l3.58-6.49A1 1 0 0020 4H5.21l-.94-2H1zm16 16c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z"/></svg>
                    Оформить заказ
                    <span class="pb-modal-btn-arrow">→</span>
                </button>
            </form>
        </div>
    </div>
</div>

{{-- ═══════════ CSS ═══════════ --}}
<style>
    .pb-modal-overlay{position:fixed;inset:0;background:linear-gradient(135deg,rgba(5,15,10,.68),rgba(18,48,34,.52))!important;backdrop-filter:blur(14px) saturate(.72);-webkit-backdrop-filter:blur(14px) saturate(.72);z-index:200000;opacity:0;pointer-events:none;transition:opacity .35s;display:block}
    .pb-modal-overlay.active{opacity:1!important;pointer-events:all!important;display:block!important}
    .pb-modal{position:fixed;top:50%;left:50%;transform:translate(-50%,-50%) scale(.92);z-index:200001;opacity:0;pointer-events:none;width:92%;max-width:820px;max-height:90vh;overflow:hidden}
    .pb-modal.active{opacity:1;pointer-events:all;transform:translate(-50%,-50%) scale(1)}
    .pb-modal-inner{display:flex;border-radius:20px;overflow:hidden;max-height:90vh;box-shadow:0 32px 64px rgba(15,40,28,.25),0 0 0 1px rgba(21,151,102,.08)}
    #pbModalCallback .pb-modal-inner{border-radius:0;box-shadow:0 34px 90px rgba(2,16,10,.42),0 0 0 1px rgba(255,255,255,.18)}
    #pbModalCallback .pb-modal-left,#pbModalCallback .pb-modal-right{border-radius:0}
    #pbModalCallback .pb-modal-close{border-radius:0}
    #pbModalCallback .pb-modal-input{border-radius:0}
    #pbModalCallback .pb-modal-btn{border-radius:0}
    .pb-modal-compact{max-width:440px;margin:0 auto}
    .pb-modal-left{position:relative;width:380px;flex-shrink:0;background:linear-gradient(160deg,#159766 0%,#0e7a52 100%);padding:40px 32px;overflow:hidden;display:flex;flex-direction:column;justify-content:center}
    .pb-modal-canvas{position:absolute;inset:0;width:100%;height:100%;z-index:0}
    .pb-modal-left-content{position:relative;z-index:1}
    .pb-modal-h2{color:#fff;font-size:28px;font-weight:700;line-height:1.2;margin-bottom:14px}
    .pb-modal-desc{color:rgba(255,255,255,.8);font-size:13px;line-height:1.6;margin-bottom:24px}
    .pb-modal-features{list-style:none;padding:0;margin:0;display:flex;flex-direction:column;gap:12px}
    .pb-modal-features li{display:flex;align-items:center;gap:10px;color:rgba(255,255,255,.9);font-size:13px}
    .pb-modal-features svg{width:20px;height:20px;color:#fff;flex-shrink:0;opacity:.9}
    .pb-modal-phone-icon{position:absolute;z-index:2;right:32px;bottom:32px;width:56px;height:56px;background:rgba(255,255,255,.14);border:1px solid rgba(255,255,255,.25);border-radius:50%;display:flex;align-items:center;justify-content:center;color:#fff}
    .pb-modal-phone-icon svg{width:24px;height:24px}
    .pb-modal-right{flex:1;background:#fff;padding:36px 32px;position:relative;display:flex;flex-direction:column;justify-content:center;overflow-y:auto}
    .pb-modal-right-full{border-radius:20px}
    .pb-modal-close{position:absolute;top:16px;right:16px;width:36px;height:36px;border:1px solid #e0e0e0;border-radius:50%;display:flex;align-items:center;justify-content:center;cursor:pointer;color:#999;transition:all .3s;background:#fff}
    .pb-modal-close:hover{border-color:#159766;color:#159766;transform:rotate(90deg)}
    .pb-modal-close svg{width:18px;height:18px}
    .pb-modal-h3{font-size:26px;font-weight:700;color:#111;line-height:1.2;margin-bottom:6px}
    .pb-modal-sub{color:#888;font-size:13px;margin-bottom:24px;line-height:1.5}
    .pb-modal-product-info{background:#f5f5f5;border-radius:8px;padding:10px 14px;margin-bottom:16px;display:none}
    .pb-modal-product-info.visible{display:block}
    .pb-modal-product-name{font-size:13px;font-weight:600;color:#333}
    .pb-modal-field{margin-bottom:16px}
    .pb-modal-label{display:block;font-size:12px;font-weight:600;color:#555;margin-bottom:6px}
    .pb-modal-input-wrap{position:relative;display:flex;align-items:center}
    .pb-modal-input-icon{position:absolute;left:14px;width:18px;height:18px;color:#bbb;pointer-events:none}
    .pb-modal-input{width:100%;padding:13px 14px 13px 42px;border:1.5px solid #e0e0e0;border-radius:10px;font-size:14px;color:#222;transition:all .3s;outline:none;background:#fff;font-family:inherit;box-sizing:border-box}
    .pb-modal-input:focus{border-color:#159766;box-shadow:0 0 0 3px rgba(21,151,102,.12)}
    .pb-modal-input::placeholder{color:#bbb}
    .pb-modal-btn{width:100%;padding:14px 20px;border:none;border-radius:10px;font-size:14px;font-weight:600;cursor:pointer;transition:all .3s;display:flex;align-items:center;justify-content:center;gap:10px;font-family:inherit;background:#159766;color:#fff;position:relative;overflow:hidden;margin-top:4px;opacity:1!important;visibility:visible!important}
    .pb-modal-btn:hover{background:#0e7a52;box-shadow:0 8px 24px rgba(21,151,102,.3);transform:translateY(-1px)}
    .pb-modal-btn:active{transform:translateY(0)}
    .pb-modal-btn-buy{background:#159766;color:#fff}
    .pb-modal-btn-buy:hover{background:#0e7a52;box-shadow:0 8px 24px rgba(21,151,102,.3)}
    .pb-modal-btn-arrow{margin-left:auto;font-size:18px;transition:transform .3s}
    .pb-modal-btn:hover .pb-modal-btn-arrow{transform:translateX(4px)}
    .pb-modal-instant{display:flex;align-items:center;gap:12px;margin-top:20px;padding-top:16px;border-top:1px solid #eee}
    .pb-modal-instant-label{font-size:11px;color:#999;display:block}
    .pb-modal-instant-phone{font-size:15px;font-weight:700;color:#111;text-decoration:none;transition:color .3s}
    .pb-modal-instant-phone:hover{color:#159766}
    .pb-modal-success{text-align:center;padding:40px 20px}
    .pb-modal-success-icon{width:60px;height:60px;margin:0 auto 16px;background:#eef6f2;border-radius:50%;display:flex;align-items:center;justify-content:center}
    .pb-modal-success-icon svg{width:28px;height:28px;color:#159766}
    .pb-modal-success h4{font-size:20px;font-weight:700;color:#111;margin-bottom:6px}
    .pb-modal-success p{color:#888;font-size:13px}
    @media(max-width:768px){
        .pb-modal-left{display:none}
        .pb-modal-inner{border-radius:16px}
        .pb-modal-right{padding:28px 20px;border-radius:16px}
        #pbModalCallback .pb-modal-inner,#pbModalCallback .pb-modal-right{border-radius:0}
        .pb-modal{max-width:95%;width:95%}
        .pb-modal-h3{font-size:22px}
    }
    @media(max-height:760px) and (min-width:769px){
        .pb-modal,.pb-modal-inner{max-height:calc(100vh - 32px)}
        .pb-modal-left,.pb-modal-right{padding-top:24px;padding-bottom:24px}
        .pb-modal-sub{margin-bottom:16px}
        .pb-modal-field{margin-bottom:12px}
        .pb-modal-instant{margin-top:14px;padding-top:12px}
    }
</style>

{{-- ═══════════ JS ═══════════ --}}
<script>
(function(){
    if (window.__pbModalsBooted) return;
    window.__pbModalsBooted = true;

    var overlay = document.getElementById('pbModalOverlay');
    var modalScrollState = null;

    function lockModalScroll() {
        if (modalScrollState) return;
        var body = document.body;
        var html = document.documentElement;
        var scrollY = window.scrollY || html.scrollTop || 0;
        modalScrollState = {
            scrollY: scrollY,
            bodyPosition: body.style.position,
            bodyTop: body.style.top,
            bodyLeft: body.style.left,
            bodyRight: body.style.right,
            bodyWidth: body.style.width,
            bodyOverflow: body.style.overflow,
            htmlOverflow: html.style.overflow
        };
        html.style.overflow = 'hidden';
        body.style.position = 'fixed';
        body.style.top = (-scrollY) + 'px';
        body.style.left = '0';
        body.style.right = '0';
        body.style.width = '100%';
        body.style.overflow = 'hidden';
    }

    function unlockModalScroll() {
        if (!modalScrollState) return;
        var state = modalScrollState;
        modalScrollState = null;
        var body = document.body;
        var html = document.documentElement;
        body.style.position = state.bodyPosition;
        body.style.top = state.bodyTop;
        body.style.left = state.bodyLeft;
        body.style.right = state.bodyRight;
        body.style.width = state.bodyWidth;
        body.style.overflow = state.bodyOverflow;
        html.style.overflow = state.htmlOverflow;
        window.scrollTo(0, state.scrollY);
        requestAnimationFrame(function() {
            window.scrollTo(0, state.scrollY);
            if (typeof window.__pbRefreshScrollMeasurements === 'function') {
                window.__pbRefreshScrollMeasurements();
            }
        });
    }

    function currentOverlay() {
        if (!overlay || !overlay.isConnected) {
            overlay = document.getElementById('pbModalOverlay');
        }
        return overlay;
    }

    function openModal(id) {
        var modal = document.getElementById(id);
        overlay = currentOverlay();
        if (!modal || !overlay) return;
        lockModalScroll();
        modal.dataset.pbClosing = '';
        overlay.classList.add('active');
        if (typeof gsap !== 'undefined') {
            gsap.fromTo(modal, {opacity:0, scale:.92, display:'block'}, {opacity:1, scale:1, duration:.4, ease:'power3.out'});
            modal.classList.add('active');
            gsap.from(modal.querySelectorAll('.pb-modal-field'), {y:15, opacity:0, duration:.3, stagger:.08, ease:'power2.out', delay:.2});
            var cv = modal.querySelector('.pb-modal-canvas');
            if (cv) initCanvas(cv);
        } else {
            modal.style.opacity = '1';
            modal.style.transform = 'translate(-50%,-50%) scale(1)';
            modal.classList.add('active');
        }
    }

    function closeModal(id) {
        var modal = document.getElementById(id);
        overlay = currentOverlay();
        if (!modal || !overlay || !modal.classList.contains('active') || modal.dataset.pbClosing === '1') return;
        modal.dataset.pbClosing = '1';
        function finishClose() {
            modal.classList.remove('active');
            modal.dataset.pbClosing = '';
            if (!document.querySelector('.pb-modal.active')) unlockModalScroll();
        }
        if (typeof gsap !== 'undefined') {
            gsap.killTweensOf(modal);
            gsap.to(modal, {opacity:0, scale:.92, duration:.25, ease:'power2.in', onComplete:finishClose});
        } else {
            finishClose();
        }
        overlay.classList.remove('active');
    }

    function forceCloseAllModals() {
        document.querySelectorAll('.pb-modal.active').forEach(function(modal) {
            if (typeof gsap !== 'undefined') gsap.killTweensOf(modal);
            modal.classList.remove('active');
            modal.dataset.pbClosing = '';
            modal.style.opacity = '';
            modal.style.transform = '';
        });
        var current = currentOverlay();
        if (current) current.classList.remove('active');
        unlockModalScroll();
    }
    window.__pbCloseAllModals = forceCloseAllModals;

    var pbCanvasState = {};

    function initCanvas(cv) {
        if (pbCanvasState[cv.id] && pbCanvasState[cv.id].started) return;

        var ctx = cv.getContext('2d');
        var W = cv.width = cv.offsetWidth, H = cv.height = cv.offsetHeight;
        var pts = [];
        for (var i = 0; i < Math.floor((W * H) / 16000); i++) {
            pts.push({
                x: Math.random() * W, y: Math.random() * H,
                r: Math.random() * 1.3 + .5,
                vx: (Math.random() - .5) * .18, vy: (Math.random() - .5) * .18,
                a: Math.random() * .3 + .1
            });
        }

        // GSAP-анимированные "радиолокационные" импульсы от иконки телефона
        var pingOrigin = { x: W - 60, y: H - 60 };
        var pings = [];

        function spawnPing() {
            if (!cv.closest('.active')) return;
            var ping = { r: 0, a: .55 };
            pings.push(ping);
            gsap.to(ping, {
                r: 130, a: 0,
                duration: 1.8,
                ease: 'power1.out',
                onComplete: function() {
                    var idx = pings.indexOf(ping);
                    if (idx > -1) pings.splice(idx, 1);
                }
            });
        }

        var pingInterval = setInterval(function() {
            if (!cv.closest('.active')) { clearInterval(pingInterval); return; }
            spawnPing();
        }, 1400);
        spawnPing();

        function draw() {
            if (!cv.closest('.active')) {
                gsap.ticker.remove(draw);
                clearInterval(pingInterval);
                pings.forEach(function(p) { gsap.killTweensOf(p); });
                pings.length = 0;
                pbCanvasState[cv.id].started = false;
                return;
            }
            ctx.clearRect(0, 0, W, H);

            for (var i = 0; i < pings.length; i++) {
                var p = pings[i];
                ctx.beginPath();
                ctx.arc(pingOrigin.x, pingOrigin.y, p.r, 0, Math.PI * 2);
                ctx.strokeStyle = 'rgba(255,255,255,' + p.a + ')';
                ctx.lineWidth = 1.5;
                ctx.stroke();
            }

            for (var j = 0; j < pts.length; j++) {
                var pt = pts[j];
                pt.x += pt.vx; pt.y += pt.vy;
                if (pt.x < 0) pt.x = W; if (pt.x > W) pt.x = 0;
                if (pt.y < 0) pt.y = H; if (pt.y > H) pt.y = 0;
                ctx.beginPath();
                ctx.arc(pt.x, pt.y, pt.r, 0, Math.PI * 2);
                ctx.fillStyle = 'rgba(255,255,255,' + pt.a + ')';
                ctx.fill();
            }
        }

        pbCanvasState[cv.id] = { started: true };
        gsap.ticker.remove(draw);
        gsap.ticker.add(draw);
    }

    function showSuccess(formEl) {
        var parent = formEl.parentElement;
        formEl.style.display = 'none';
        var inst = parent.querySelector('.pb-modal-instant');
        if (inst) inst.style.display = 'none';
        var info = parent.querySelector('.pb-modal-product-info');
        if (info) info.style.display = 'none';
        var div = document.createElement('div');
        div.className = 'pb-modal-success';
        div.innerHTML = '<div class="pb-modal-success-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 12l2 2 4-4"/><circle cx="12" cy="12" r="10"/></svg></div><h4>Заявка отправлена!</h4><p>Мы перезвоним в ближайшее время</p>';
        parent.appendChild(div);
        if (typeof gsap !== 'undefined') gsap.from(div, {y:20, opacity:0, duration:.4, ease:'power2.out'});
    }

    // Callback form submit
    document.addEventListener('submit', function(e) {
        if (e.target.id === 'pbFormCallback') {
            e.preventDefault();
            var msg = $(e.target).serialize();
            $.ajax({type:'POST', url:'/assets/mail/mail.php', data:msg,
                success:function(){ showSuccess(e.target); },
                error:function(){ alert('Возникла ошибка, попробуйте позвонить напрямую'); }
            });
        }
        if (e.target.id === 'pbFormOneclick') {
            e.preventDefault();
            var msg = $(e.target).serialize();
            $.ajax({type:'POST', url:'/assets/mail/one__click.php', data:msg,
                success:function(){ showSuccess(e.target); },
                error:function(){ alert('Возникла ошибка, попробуйте позвонить напрямую'); }
            });
        }
    });

    // Open triggers (event delegation)
    document.addEventListener('click', function(e) {
        // "Перезвоните мне" — кнопка в шапке
        if (e.target.closest('[data-pb-callback]') || e.target.closest('.header__btn')) {
            e.preventDefault();
            openModal('pbModalCallback');
            return;
        }
        // "Купить в 1 клик" — кнопка на карточке товара
        if (e.target.closest('[data-pb-oneclick]') || e.target.closest('.deatailOneCLick')) {
            e.preventDefault();
            var btn = e.target.closest('[data-pb-oneclick]') || e.target.closest('.deatailOneCLick');
            var productName = btn.getAttribute('data-product') || '';
            var nameEl = document.getElementById('pbOneclickName');
            var hiddenEl = document.getElementById('pbOneclickHidden');
            var infoEl = document.getElementById('pbOneclickProduct');
            if (nameEl) nameEl.textContent = productName;
            if (hiddenEl) hiddenEl.value = productName;
            if (infoEl) infoEl.classList.toggle('visible', productName.length > 0);
            openModal('pbModalOneclick');
            return;
        }
        // Close buttons
        if (e.target.closest('#pbCloseCallback')) { closeModal('pbModalCallback'); return; }
        if (e.target.closest('#pbCloseOneclick')) { closeModal('pbModalOneclick'); return; }
        // Click on overlay
        if (e.target === currentOverlay()) {
            closeModal('pbModalCallback');
            closeModal('pbModalOneclick');
        }
    });

    // Esc
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeModal('pbModalCallback');
            closeModal('pbModalOneclick');
        }
    });
    document.addEventListener('livewire:navigating', forceCloseAllModals);

    // Маска телефона для модалок
    document.addEventListener('livewire:navigated', function() {
        if (typeof $ !== 'undefined' && typeof $.fn.mask !== 'undefined') {
            $('.pb-modal-input.art-stranger').mask('+7 (999) 999-99-99');
        }
    });
    document.addEventListener('DOMContentLoaded', function() {
        if (typeof $ !== 'undefined' && typeof $.fn.mask !== 'undefined') {
            $('.pb-modal-input.art-stranger').mask('+7 (999) 999-99-99');
        }
    });
})();
</script>
