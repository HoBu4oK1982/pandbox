@section('title', 'Вход в личный кабинет — Pandbox.kz')

<x-guest-layout>
<x-auth-session-status class="mb-4" :status="session('status')" />

<style>
    .pb-auth{position:relative;display:flex;align-items:center;justify-content:center;padding:20px 20px;background:#f4f5f7}
    .pb-auth-inner{display:flex;border-radius:0;overflow:hidden;box-shadow:0 32px 64px rgba(15,40,28,.18),0 0 0 1px rgba(21,151,102,.08);max-width:820px;width:100%;min-height:460px}
    .pb-auth-left{position:relative;width:380px;flex-shrink:0;background:linear-gradient(160deg,#159766 0%,#0e7a52 100%);padding:48px 36px;overflow:hidden;display:flex;flex-direction:column;justify-content:center}
    .pb-auth-canvas{position:absolute;inset:0;width:100%;height:100%;z-index:0}
    .pb-auth-left-content{position:relative;z-index:1}
    .pb-auth-logo-badge{width:68px;height:68px;border-radius:50%;background:#fff;display:flex;align-items:center;justify-content:center;box-shadow:0 8px 24px rgba(6,30,20,.25);margin-bottom:24px}
    .pb-auth-logo-badge img{width:44px;height:auto}
    .pb-auth-status{display:inline-flex;align-items:center;gap:8px;font-size:11px;text-transform:uppercase;letter-spacing:2px;color:rgba(255,255,255,.85);margin-bottom:18px}
    .pb-auth-dot{width:8px;height:8px;border-radius:50%;background:#fff;display:block;animation:pbAuthPulse 2s infinite}
    @keyframes pbAuthPulse{0%,100%{opacity:1;box-shadow:0 0 0 0 rgba(255,255,255,.4)}50%{opacity:.8;box-shadow:0 0 0 6px rgba(255,255,255,0)}}
    .pb-auth-left h2{color:#fff;font-size:28px;font-weight:700;line-height:1.2;margin-bottom:14px}
    .pb-auth-left p{color:rgba(255,255,255,.8);font-size:13px;line-height:1.6;margin-bottom:28px}
    .pb-auth-features{list-style:none;padding:0;margin:0;display:flex;flex-direction:column;gap:14px}
    .pb-auth-features li{display:flex;align-items:center;gap:10px;color:rgba(255,255,255,.9);font-size:13px}
    .pb-auth-features svg{width:20px;height:20px;color:#fff;flex-shrink:0;opacity:.9}
    .pb-auth-shield{position:absolute;z-index:2;bottom:36px;right:36px;width:56px;height:56px;background:rgba(255,255,255,.14);border:1px solid rgba(255,255,255,.25);border-radius:50%;display:flex;align-items:center;justify-content:center;color:#fff}
    .pb-auth-shield svg{width:24px;height:24px}
    .pb-auth-right{flex:1;background:#fff;padding:44px 36px;position:relative;display:flex;flex-direction:column;justify-content:center}
    .pb-auth-badge{display:inline-flex;align-items:center;gap:6px;font-size:11px;font-weight:600;text-transform:uppercase;letter-spacing:2px;color:#159766;margin-bottom:10px}
    .pb-auth-badge::before{content:'✦';font-size:14px}
    .pb-auth-right h3{font-size:26px;font-weight:700;color:#111;line-height:1.2;margin-bottom:6px}
    .pb-auth-sub{color:#888;font-size:13px;margin-bottom:28px;line-height:1.5}
    .pb-auth-field{margin-bottom:18px}
    .pb-auth-label{display:block;font-size:12px;font-weight:600;color:#555;margin-bottom:6px}
    .pb-auth-input-wrap{position:relative;display:flex;align-items:center}
    .pb-auth-input-icon{position:absolute;left:14px;width:18px;height:18px;color:#bbb;pointer-events:none}
    .pb-auth-input{width:100%;padding:13px 14px 13px 42px;border:1.5px solid #e0e0e0;border-radius:0;font-size:14px;color:#222;transition:border-color .3s,box-shadow .3s;outline:none;background:#fff;font-family:inherit;box-sizing:border-box}
    .pb-auth-input:focus{border-color:#159766;box-shadow:0 0 0 3px rgba(21,151,102,.12)}
    .pb-auth-input::placeholder{color:#bbb}
    .pb-auth-input:-webkit-autofill{-webkit-box-shadow:0 0 0 1000px #fff inset;-webkit-text-fill-color:#222}
    .pb-auth-err{color:#e53e3e;font-size:11px;margin-top:4px;display:flex;align-items:center;gap:4px}
    .pb-auth-err::before{content:'⚠'}
    .pb-auth-check{display:flex;align-items:center;gap:8px;margin-bottom:24px;cursor:pointer}
    .pb-auth-check input[type="checkbox"]{accent-color:#159766;width:16px;height:16px;cursor:pointer}
    .pb-auth-check span{color:#777;font-size:13px}
    .pb-auth-btn{width:100%;padding:14px 20px;border:none;border-radius:0;font-size:14px;font-weight:600;cursor:pointer;transition:background .3s,box-shadow .3s,transform .2s;display:flex;align-items:center;justify-content:center;gap:10px;font-family:inherit;background:#159766;color:#fff;position:relative;overflow:hidden;-webkit-appearance:none;appearance:none}
    .pb-auth-btn:hover{background:#0e7a52;box-shadow:0 8px 24px rgba(21,151,102,.3);transform:translateY(-1px)}
    .pb-auth-btn:active{transform:translateY(0)}
    .pb-auth-btn-arrow{margin-left:auto;font-size:18px;transition:transform .3s}
    .pb-auth-btn:hover .pb-auth-btn-arrow{transform:translateX(4px)}
    .pb-auth-btn-ripple{position:absolute;border-radius:50%;background:rgba(255,255,255,.3);transform:scale(0);pointer-events:none}
    .pb-auth-links{display:flex;align-items:center;justify-content:space-between;margin-top:20px;flex-wrap:wrap;gap:8px}
    .pb-auth-links a{font-size:13px;text-decoration:none;transition:color .3s}
    .pb-auth-link-main{color:#159766;font-weight:600}
    .pb-auth-link-main:hover{color:#0e7a52}
    .pb-auth-link-sec{color:#999}
    .pb-auth-link-sec:hover{color:#159766}
    @media(max-width:768px){.pb-auth-left{display:none}.pb-auth-inner{max-width:440px}.pb-auth-right{padding:32px 24px}.pb-auth-right h3{font-size:22px}}
</style>

<div class="pb-auth">
    <div class="pb-auth-inner" id="pbAuthInner">
        <div class="pb-auth-left">
            <canvas class="pb-auth-canvas" id="pbAuthCanvas"></canvas>
            <div class="pb-auth-left-content">
                <div class="pb-auth-logo-badge"><img src="{{asset('assets/images/design/logo.png')}}" alt="Pandbox.kz"></div>
                <div class="pb-auth-status"><span class="pb-auth-dot"></span> Система активна</div>
                <h2>Добро<br>пожаловать</h2>
                <p>Войдите в личный кабинет для доступа к заказам, избранному и персональным скидкам.</p>
                <ul class="pb-auth-features">
                    <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>Безопасный личный кабинет</li>
                    <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/></svg>История всех заказов</li>
                    <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 12l2 2 4-4"/><circle cx="12" cy="12" r="10"/></svg>Список избранного</li>
                </ul>
            </div>
            <div class="pb-auth-shield"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg></div>
        </div>
        <div class="pb-auth-right">
            <h3>Войти в аккаунт</h3>
            <p class="pb-auth-sub">Email и пароль — больше ничего не нужно.</p>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="pb-auth-field">
                    <label class="pb-auth-label" for="login_email">Email</label>
                    <div class="pb-auth-input-wrap">
                        <svg class="pb-auth-input-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="2" y="4" width="20" height="16" rx="2"/><path d="M22 7l-10 7L2 7"/></svg>
                        <input id="login_email" class="pb-auth-input" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" placeholder="your@email.com">
                    </div>
                    @error('email')<div class="pb-auth-err">{{ $message }}</div>@enderror
                </div>
                <div class="pb-auth-field">
                    <label class="pb-auth-label" for="login_password">Пароль</label>
                    <div class="pb-auth-input-wrap">
                        <svg class="pb-auth-input-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0110 0v4"/></svg>
                        <input id="login_password" class="pb-auth-input" type="password" name="password" required autocomplete="current-password" placeholder="••••••••">
                    </div>
                    @error('password')<div class="pb-auth-err">{{ $message }}</div>@enderror
                </div>
                <label class="pb-auth-check"><input type="checkbox" name="remember"><span>Запомнить меня</span></label>
                <button type="submit" class="pb-auth-btn" id="pbLoginBtn">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:18px;height:18px"><path d="M15 3h4a2 2 0 012 2v14a2 2 0 01-2 2h-4"/><polyline points="10 17 15 12 10 7"/><line x1="15" y1="12" x2="3" y2="12"/></svg>
                    Войти
                    <span class="pb-auth-btn-arrow">→</span>
                </button>
                <div class="pb-auth-links">
                    <a wire:navigate href="{{ route('register') }}" class="pb-auth-link-main">Регистрация →</a>
                    @if (Route::has('password.request'))<a wire:navigate href="{{ route('password.request') }}" class="pb-auth-link-sec">Забыли пароль?</a>@endif
                </div>
            </form>
        </div>
    </div>
</div>

@push('scripts')
<script>
(function(){
    var cv=document.getElementById('pbAuthCanvas');if(!cv)return;
    var ctx=cv.getContext('2d'),W=cv.width=cv.offsetWidth,H=cv.height=cv.offsetHeight,pts=[],pings=[],pingO={x:W-64,y:H-64};
    for(var i=0;i<Math.floor((W*H)/14000);i++)pts.push({x:Math.random()*W,y:Math.random()*H,r:Math.random()*1.3+.5,vx:(Math.random()-.5)*.18,vy:(Math.random()-.5)*.18,a:Math.random()*.3+.1});
    function spawnPing(){var p={r:0,a:.5};pings.push(p);if(typeof gsap!=='undefined')gsap.to(p,{r:140,a:0,duration:1.8,ease:'power1.out',onComplete:function(){var i=pings.indexOf(p);if(i>-1)pings.splice(i,1);}});}
    setInterval(spawnPing,1500);spawnPing();
    (function draw(){ctx.clearRect(0,0,W,H);ctx.strokeStyle='rgba(255,255,255,0.04)';ctx.lineWidth=.5;for(var x=0;x<W;x+=60){ctx.beginPath();ctx.moveTo(x,0);ctx.lineTo(x,H);ctx.stroke();}for(var y=0;y<H;y+=60){ctx.beginPath();ctx.moveTo(0,y);ctx.lineTo(W,y);ctx.stroke();}for(var k=0;k<pings.length;k++){ctx.beginPath();ctx.arc(pingO.x,pingO.y,pings[k].r,0,Math.PI*2);ctx.strokeStyle='rgba(255,255,255,'+pings[k].a+')';ctx.lineWidth=1.5;ctx.stroke();}for(var j=0;j<pts.length;j++){var p=pts[j];p.x+=p.vx;p.y+=p.vy;if(p.x<0)p.x=W;if(p.x>W)p.x=0;if(p.y<0)p.y=H;if(p.y>H)p.y=0;ctx.beginPath();ctx.arc(p.x,p.y,p.r,0,Math.PI*2);ctx.fillStyle='rgba(255,255,255,'+p.a+')';ctx.fill();}requestAnimationFrame(draw);})();
    /* GSAP — отдельные твины, не timeline. Каждый независим — если один сломается, остальные отработают */
    if(typeof gsap!=='undefined'){
        gsap.from('#pbAuthInner',{y:40,opacity:0,duration:.6,ease:'power3.out',delay:.1});
        gsap.from('.pb-auth-logo-badge',{scale:0,duration:.4,ease:'back.out(2)',delay:.3});
        gsap.from('.pb-auth-features li',{x:-15,opacity:0,duration:.3,stagger:.08,ease:'power2.out',delay:.5});
        gsap.from('.pb-auth-field',{y:12,opacity:0,duration:.3,stagger:.08,ease:'power2.out',delay:.4,clearProps:'all'});
        gsap.from('.pb-auth-btn',{y:12,opacity:0,duration:.3,ease:'power2.out',delay:.7,clearProps:'all'});
        gsap.from('.pb-auth-links',{opacity:0,duration:.3,delay:.85,clearProps:'all'});
    }
    var btn=document.getElementById('pbLoginBtn');
    if(btn)btn.addEventListener('mousedown',function(e){var rect=btn.getBoundingClientRect(),r=document.createElement('span');r.className='pb-auth-btn-ripple';r.style.left=(e.clientX-rect.left)+'px';r.style.top=(e.clientY-rect.top)+'px';btn.appendChild(r);if(typeof gsap!=='undefined')gsap.to(r,{scale:4,opacity:0,duration:.6,ease:'power2.out',onComplete:function(){r.remove();}});});
    window.addEventListener('resize',function(){W=cv.width=cv.offsetWidth;H=cv.height=cv.offsetHeight;pingO={x:W-64,y:H-64};pts=[];for(var i=0;i<Math.floor((W*H)/14000);i++)pts.push({x:Math.random()*W,y:Math.random()*H,r:Math.random()*1.3+.5,vx:(Math.random()-.5)*.18,vy:(Math.random()-.5)*.18,a:Math.random()*.3+.1});});
})();
</script>
@endpush
</x-guest-layout>
