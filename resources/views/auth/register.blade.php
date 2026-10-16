@section('title', 'Регистрация — Pandbox.kz')

<x-guest-layout>
<style>
    .pb-auth{position:relative;display:flex;align-items:center;justify-content:center;padding:20px 20px;background:#f4f5f7}
    .pb-auth-inner{display:flex;border-radius:0;overflow:hidden;box-shadow:0 32px 64px rgba(15,40,28,.18),0 0 0 1px rgba(21,151,102,.08);max-width:920px;width:100%;min-height:520px}
    .pb-auth-left{position:relative;width:400px;flex-shrink:0;background:linear-gradient(160deg,#159766 0%,#0e7a52 100%);padding:48px 36px;overflow:hidden;display:flex;flex-direction:column;justify-content:center}
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
    .pb-auth-right{flex:1;background:#fff;padding:40px 36px;position:relative;display:flex;flex-direction:column;justify-content:center}
    .pb-auth-badge{display:inline-flex;align-items:center;gap:6px;font-size:11px;font-weight:600;text-transform:uppercase;letter-spacing:2px;color:#159766;margin-bottom:10px}
    .pb-auth-badge::before{content:'✦';font-size:14px}
    .pb-auth-right h3{font-size:26px;font-weight:700;color:#111;line-height:1.2;margin-bottom:6px}
    .pb-auth-sub{color:#888;font-size:13px;margin-bottom:24px;line-height:1.5}
    .pb-auth-row{display:grid;grid-template-columns:1fr 1fr;gap:14px}
    .pb-auth-field{margin-bottom:16px}
    .pb-auth-label{display:block;font-size:12px;font-weight:600;color:#555;margin-bottom:6px}
    .pb-auth-input-wrap{position:relative;display:flex;align-items:center}
    .pb-auth-input-icon{position:absolute;left:14px;width:18px;height:18px;color:#bbb;pointer-events:none}
    .pb-auth-input{width:100%;padding:13px 14px 13px 42px;border:1.5px solid #e0e0e0;border-radius:0;font-size:14px;color:#222;transition:border-color .3s,box-shadow .3s;outline:none;background:#fff;font-family:inherit;box-sizing:border-box}
    .pb-auth-input:focus{border-color:#159766;box-shadow:0 0 0 3px rgba(21,151,102,.12)}
    .pb-auth-input::placeholder{color:#bbb}
    .pb-auth-input:-webkit-autofill{-webkit-box-shadow:0 0 0 1000px #fff inset;-webkit-text-fill-color:#222}
    .pb-auth-select{width:100%;padding:13px 14px 13px 42px;border:1.5px solid #e0e0e0;border-radius:0;font-size:14px;color:#222;transition:border-color .3s,box-shadow .3s;outline:none;background:#fff;font-family:inherit;box-sizing:border-box;-webkit-appearance:none;appearance:none;background-image:url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath fill='%23159766' d='M6 8L1 3h10z'/%3E%3C/svg%3E");background-repeat:no-repeat;background-position:right 14px center;cursor:pointer}
    .pb-auth-select:focus{border-color:#159766;box-shadow:0 0 0 3px rgba(21,151,102,.12)}
    .pb-auth-select option{color:#222}
    .pb-auth-err{color:#e53e3e;font-size:11px;margin-top:4px;display:flex;align-items:center;gap:4px}
    .pb-auth-err::before{content:'⚠'}
    .pb-auth-divider{display:flex;align-items:center;gap:10px;margin:6px 0 16px;color:#ccc;font-size:10px;text-transform:uppercase;letter-spacing:2px}
    .pb-auth-divider::before,.pb-auth-divider::after{content:'';flex:1;height:1px;background:#eee}
    .pb-auth-btn{width:100%;padding:14px 20px;border:none;border-radius:0;font-size:14px;font-weight:600;cursor:pointer;transition:background .3s,box-shadow .3s,transform .2s;display:flex;align-items:center;justify-content:center;gap:10px;font-family:inherit;background:#159766;color:#fff;position:relative;overflow:hidden;margin-top:4px;-webkit-appearance:none;appearance:none}
    .pb-auth-btn:hover{background:#0e7a52;box-shadow:0 8px 24px rgba(21,151,102,.3);transform:translateY(-1px)}
    .pb-auth-btn:active{transform:translateY(0)}
    .pb-auth-btn-arrow{margin-left:auto;font-size:18px;transition:transform .3s}
    .pb-auth-btn:hover .pb-auth-btn-arrow{transform:translateX(4px)}
    .pb-auth-btn-ripple{position:absolute;border-radius:50%;background:rgba(255,255,255,.3);transform:scale(0);pointer-events:none}
    .pb-auth-links{display:flex;align-items:center;gap:12px;margin-top:18px;justify-content:center}
    .pb-auth-links span{color:#999;font-size:13px}
    .pb-auth-links a{color:#159766;font-size:13px;font-weight:600;text-decoration:none;transition:color .3s}
    .pb-auth-links a:hover{color:#0e7a52}
    @media(max-width:820px){.pb-auth-left{display:none}.pb-auth-inner{max-width:480px}.pb-auth-right{padding:32px 24px}.pb-auth-right h3{font-size:22px}.pb-auth-row{grid-template-columns:1fr}}
</style>

<div class="pb-auth">
    <div class="pb-auth-inner" id="pbAuthInner">
        <div class="pb-auth-left">
            <canvas class="pb-auth-canvas" id="pbAuthCanvas"></canvas>
            <div class="pb-auth-left-content">
                <div class="pb-auth-logo-badge"><img src="{{asset('assets/images/design/logo.png')}}" alt="Pandbox.kz"></div>
                <div class="pb-auth-status"><span class="pb-auth-dot"></span> Открытый набор</div>
                <h2>Присоединяйся<br>к команде</h2>
                <p>Регистрация даёт доступ к личному кабинету, истории заказов и эксклюзивным предложениям.</p>
                <ul class="pb-auth-features">
                    <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>Отслеживание статуса заказа</li>
                    <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/></svg>Быстрое повторение прошлых заказов</li>
                    <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 12l2 2 4-4"/><circle cx="12" cy="12" r="10"/></svg>Персональные скидки и акции</li>
                </ul>
            </div>
            <div class="pb-auth-shield"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M16 21v-2a4 4 0 00-4-4H6a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 00-3-3.87M16 3.13a4 4 0 010 7.75"/></svg></div>
        </div>
        <div class="pb-auth-right">
            <div class="pb-auth-badge">Регистрация</div>
            <h3>Создать аккаунт</h3>
            <p class="pb-auth-sub">Заполните форму — займёт меньше минуты.</p>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="pb-auth-row">
                    <div class="pb-auth-field"><label class="pb-auth-label" for="reg_name">Ваше имя</label><div class="pb-auth-input-wrap"><svg class="pb-auth-input-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"/><circle cx="12" cy="7" r="4"/></svg><input id="reg_name" class="pb-auth-input" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name" placeholder="Ваше имя"></div>@error('name')<div class="pb-auth-err">{{ $message }}</div>@enderror</div>
                    <div class="pb-auth-field"><label class="pb-auth-label" for="reg_email">Email</label><div class="pb-auth-input-wrap"><svg class="pb-auth-input-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="2" y="4" width="20" height="16" rx="2"/><path d="M22 7l-10 7L2 7"/></svg><input id="reg_email" class="pb-auth-input" type="email" name="email" value="{{ old('email') }}" required autocomplete="username" placeholder="your@email.com"></div>@error('email')<div class="pb-auth-err">{{ $message }}</div>@enderror</div>
                </div>
                <div class="pb-auth-row">
                    <div class="pb-auth-field"><label class="pb-auth-label" for="reg_phone">Телефон</label><div class="pb-auth-input-wrap"><svg class="pb-auth-input-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07 19.5 19.5 0 01-6-6A19.79 19.79 0 012.12 4.18 2 2 0 014.11 2h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L8.09 9.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 16.92z"/></svg><input id="reg_phone" class="pb-auth-input art-stranger" type="text" name="phone" value="{{ old('phone') }}" required autocomplete="phone" placeholder="+7 (___) ___-__-__"></div>@error('phone')<div class="pb-auth-err">{{ $message }}</div>@enderror</div>
                    <div class="pb-auth-field"><label class="pb-auth-label" for="reg_city">Город</label><div class="pb-auth-input-wrap"><svg class="pb-auth-input-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/></svg><select id="reg_city" name="city" class="pb-auth-select" required><option value="Алматы" {{ old('city')=='Алматы'?'selected':'' }}>Алматы</option><option value="Астана" {{ old('city')=='Астана'?'selected':'' }}>Астана</option><option value="Шымкент" {{ old('city')=='Шымкент'?'selected':'' }}>Шымкент</option><option value="Актобе" {{ old('city')=='Актобе'?'selected':'' }}>Актобе</option><option value="Караганда" {{ old('city')=='Караганда'?'selected':'' }}>Караганда</option><option value="Тараз" {{ old('city')=='Тараз'?'selected':'' }}>Тараз</option><option value="Усть-Каменогорск" {{ old('city')=='Усть-Каменогорск'?'selected':'' }}>Усть-Каменогорск</option><option value="Павлодар" {{ old('city')=='Павлодар'?'selected':'' }}>Павлодар</option><option value="Атырау" {{ old('city')=='Атырау'?'selected':'' }}>Атырау</option><option value="Семей" {{ old('city')=='Семей'?'selected':'' }}>Семей</option><option value="Актау" {{ old('city')=='Актау'?'selected':'' }}>Актау</option><option value="Кызылорда" {{ old('city')=='Кызылорда'?'selected':'' }}>Кызылорда</option><option value="Костанай" {{ old('city')=='Костанай'?'selected':'' }}>Костанай</option><option value="Уральск" {{ old('city')=='Уральск'?'selected':'' }}>Уральск</option><option value="Туркестан" {{ old('city')=='Туркестан'?'selected':'' }}>Туркестан</option><option value="Петропавловск" {{ old('city')=='Петропавловск'?'selected':'' }}>Петропавловск</option><option value="Кокшетау" {{ old('city')=='Кокшетау'?'selected':'' }}>Кокшетау</option><option value="Темиртау" {{ old('city')=='Темиртау'?'selected':'' }}>Темиртау</option><option value="Талдыкорган" {{ old('city')=='Талдыкорган'?'selected':'' }}>Талдыкорган</option><option value="Конаев" {{ old('city')=='Конаев'?'selected':'' }}>Конаев</option></select></div>@error('city')<div class="pb-auth-err">{{ $message }}</div>@enderror</div>
                </div>
                <div class="pb-auth-divider">Безопасность</div>
                <div class="pb-auth-row">
                    <div class="pb-auth-field"><label class="pb-auth-label" for="reg_password">Пароль</label><div class="pb-auth-input-wrap"><svg class="pb-auth-input-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0110 0v4"/></svg><input id="reg_password" class="pb-auth-input" type="password" name="password" required autocomplete="new-password" placeholder="••••••••"></div>@error('password')<div class="pb-auth-err">{{ $message }}</div>@enderror</div>
                    <div class="pb-auth-field"><label class="pb-auth-label" for="reg_password_confirmation">Повторите</label><div class="pb-auth-input-wrap"><svg class="pb-auth-input-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M9 12l2 2 4-4"/><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0110 0v4"/></svg><input id="reg_password_confirmation" class="pb-auth-input" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="••••••••"></div>@error('password_confirmation')<div class="pb-auth-err">{{ $message }}</div>@enderror</div>
                </div>
                <input type="hidden" name="g-recaptcha-response" id="g-recaptcha-response">
                <button type="submit" class="pb-auth-btn" id="pbRegBtn">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:18px;height:18px"><path d="M16 21v-2a4 4 0 00-4-4H6a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/><line x1="19" y1="8" x2="19" y2="14"/><line x1="22" y1="11" x2="16" y2="11"/></svg>
                    Зарегистрироваться
                    <span class="pb-auth-btn-arrow">→</span>
                </button>
                <div class="pb-auth-links"><span>Уже есть аккаунт?</span><a wire:navigate href="{{ route('login') }}">Войти →</a></div>
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
    if(typeof gsap!=='undefined'){
        gsap.from('#pbAuthInner',{y:40,opacity:0,duration:.6,ease:'power3.out',delay:.1});
        gsap.from('.pb-auth-logo-badge',{scale:0,duration:.4,ease:'back.out(2)',delay:.3});
        gsap.from('.pb-auth-features li',{x:-15,opacity:0,duration:.3,stagger:.08,ease:'power2.out',delay:.5});
        gsap.from('.pb-auth-field',{y:12,opacity:0,duration:.25,stagger:.05,ease:'power2.out',delay:.3,clearProps:'all'});
        gsap.from('.pb-auth-divider',{scaleX:0,opacity:0,duration:.3,ease:'power2.out',delay:.6,clearProps:'all'});
        gsap.from('.pb-auth-btn',{y:12,opacity:0,duration:.3,ease:'power2.out',delay:.7,clearProps:'all'});
        gsap.from('.pb-auth-links',{opacity:0,duration:.3,delay:.85,clearProps:'all'});
    }
    var btn=document.getElementById('pbRegBtn');
    if(btn)btn.addEventListener('mousedown',function(e){var rect=btn.getBoundingClientRect(),r=document.createElement('span');r.className='pb-auth-btn-ripple';r.style.left=(e.clientX-rect.left)+'px';r.style.top=(e.clientY-rect.top)+'px';btn.appendChild(r);if(typeof gsap!=='undefined')gsap.to(r,{scale:4,opacity:0,duration:.6,ease:'power2.out',onComplete:function(){r.remove();}});});
    window.addEventListener('resize',function(){W=cv.width=cv.offsetWidth;H=cv.height=cv.offsetHeight;pingO={x:W-64,y:H-64};pts=[];for(var i=0;i<Math.floor((W*H)/14000);i++)pts.push({x:Math.random()*W,y:Math.random()*H,r:Math.random()*1.3+.5,vx:(Math.random()-.5)*.18,vy:(Math.random()-.5)*.18,a:Math.random()*.3+.1});});
})();
</script>
@endpush

@php $recaptcha_sitekey = config('services.nocaptcha.sitekey'); @endphp
@if($recaptcha_sitekey)
<script src="https://www.google.com/recaptcha/api.js?render={{ $recaptcha_sitekey }}"></script>
<script>document.addEventListener("DOMContentLoaded",function(){if(typeof grecaptcha!=="undefined"){grecaptcha.ready(function(){grecaptcha.execute('{{ $recaptcha_sitekey }}',{action:'register'}).then(function(token){var i=document.getElementById('g-recaptcha-response');if(i)i.value=token;});});}});</script>
@endif
</x-guest-layout>
