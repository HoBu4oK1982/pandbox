@section('title', 'Контакты магазинов Pandbox.kz')

<div class="pb-contacts-page" data-pb-contacts>
    <section class="pb-contacts-hero">
        <div class="container pb-contacts-hero-inner">
            <div class="pb-contacts-breadcrumbs">
                <a wire:navigate href="{{ route('home') }}">Главная</a>
                <span>→</span>
                <b>Контакты</b>
            </div>
            <div class="pb-contacts-hero-grid">
                <div class="pb-contacts-heading">
                    <span class="pb-contacts-kicker">PBX / ДВЕ ТОЧКИ НА КАРТЕ</span>
                    <h1>Наши магазины</h1>
                    <p>Выберите ближайший магазин, позвоните нам или сразу постройте маршрут. Поможем подобрать снаряжение и проверим наличие товара.</p>
                    <div class="pb-contacts-hero-actions">
                        <button type="button" data-pb-callback>
                            <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M21 15a4 4 0 0 1-4 4H8l-5 3V7a4 4 0 0 1 4-4h10a4 4 0 0 1 4 4Z"/><path d="M8 9h8M8 13h5"/></svg>
                            <span>Перезвоните мне</span>
                        </button>
                        <a href="https://wa.me/77773880866" target="_blank" rel="noopener">
                            @include('partials.icons.whatsapp')
                            <span>Написать в WhatsApp</span>
                        </a>
                    </div>
                </div>
                <div class="pb-contacts-radar" aria-hidden="true">
                    <span class="pb-radar-ring pb-radar-ring-one"></span>
                    <span class="pb-radar-ring pb-radar-ring-two"></span>
                    <i></i><b></b>
                    <em class="pb-radar-point pb-radar-point-one"></em>
                    <em class="pb-radar-point pb-radar-point-two"></em>
                    <strong>02</strong><small>магазина</small>
                </div>
            </div>
            <div class="pb-contacts-facts">
                <span><b>02</b><small>Алматы и Астана</small></span>
                <span><b>KZ</b><small>Доставка по Казахстану</small></span>
                <span><b>PBX</b><small>Помощь с подбором</small></span>
            </div>
        </div>
    </section>

    <main class="container pb-contacts-content">
        <div class="pb-contacts-section-head">
            <div><span>01 / МАГАЗИНЫ</span><h2>Выберите свой город</h2></div>
            <p>Нажмите на карточку — карта переключится на выбранный магазин.</p>
        </div>

        <div class="pb-store-grid">
            <article class="pb-store-card active" data-pb-store="almaty" data-map-title="Pandbox — Алматы" data-map-src="https://yandex.ru/map-widget/v1/?text=%D0%90%D0%BB%D0%BC%D0%B0%D1%82%D1%8B%2C%20%D1%83%D0%BB.%20%D0%9A%D1%80%D1%8B%D0%BB%D0%BE%D0%B2%D0%B0%2C%2024&z=16" data-route="https://go.2gis.com/UEzvh">
                <button type="button" class="pb-store-select" aria-label="Показать магазин Алматы на карте"></button>
                <span class="pb-store-number">01</span>
                <div class="pb-store-card-head">
                    <span>PBX / ЮЖНАЯ ТОЧКА</span>
                    <h3>Алматы</h3>
                    <i>На карте</i>
                </div>
                <div class="pb-store-address">
                    <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M20 10c0 5-8 11-8 11S4 15 4 10a8 8 0 1 1 16 0Z"/><circle cx="12" cy="10" r="2.5"/></svg>
                    <div><small>Адрес магазина</small><strong>ул. Крылова, 24</strong></div>
                </div>
                <div class="pb-store-phones">
                    <a href="tel:+77773880866"><small>Основной номер</small><b>+7 (777) 388 08 66</b></a>
                    <a href="https://wa.me/77072184465" target="_blank" rel="noopener"><small>WhatsApp / звонки</small><b>+7 (707) 218 44 65</b></a>
                </div>
                <a href="https://go.2gis.com/UEzvh" target="_blank" rel="noopener" class="pb-store-route">
                    <span>Построить маршрут</span><svg viewBox="0 0 24 24"><path d="M5 12h13M13 6l6 6-6 6"/></svg>
                </a>
                <span class="pb-store-corner"></span>
            </article>

            <article class="pb-store-card" data-pb-store="astana" data-map-title="Pandbox — Астана" data-map-src="https://yandex.ru/map-widget/v1/?text=%D0%90%D1%81%D1%82%D0%B0%D0%BD%D0%B0%2C%20%D1%83%D0%BB.%20%D0%A2%D0%B0%D1%80%D1%85%D0%B0%D0%BD%D0%B0%2C%209&z=16" data-route="https://2gis.kz/astana/search/%D0%A2%D0%B0%D1%80%D1%85%D0%B0%D0%BD%D0%B0%209">
                <button type="button" class="pb-store-select" aria-label="Показать магазин Астана на карте"></button>
                <span class="pb-store-number">02</span>
                <div class="pb-store-card-head">
                    <span>PBX / СЕВЕРНАЯ ТОЧКА</span>
                    <h3>Астана</h3>
                    <i>На карте</i>
                </div>
                <div class="pb-store-address">
                    <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M20 10c0 5-8 11-8 11S4 15 4 10a8 8 0 1 1 16 0Z"/><circle cx="12" cy="10" r="2.5"/></svg>
                    <div><small>Адрес магазина</small><strong>ул. Тархана, 9, крыльцо 13</strong></div>
                </div>
                <div class="pb-store-phones">
                    <a href="tel:+77070350866"><small>Первый номер</small><b>+7 (707) 035 08 66</b></a>
                    <a href="tel:+77075990866"><small>Второй номер</small><b>+7 (707) 599 08 66</b></a>
                </div>
                <a href="https://2gis.kz/astana/search/%D0%A2%D0%B0%D1%80%D1%85%D0%B0%D0%BD%D0%B0%209" target="_blank" rel="noopener" class="pb-store-route">
                    <span>Построить маршрут</span><svg viewBox="0 0 24 24"><path d="M5 12h13M13 6l6 6-6 6"/></svg>
                </a>
                <span class="pb-store-corner"></span>
            </article>
        </div>

        <section class="pb-map-section">
            <div class="pb-map-topbar">
                <div><span>02 / НАВИГАЦИЯ</span><h2 data-pb-map-title>Pandbox — Алматы</h2></div>
                <a href="https://go.2gis.com/UEzvh" target="_blank" rel="noopener" data-pb-map-route>
                    <span>Открыть в 2GIS</span><svg viewBox="0 0 24 24"><path d="M14 4h6v6M20 4l-9 9"/><path d="M19 13v6a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1h6"/></svg>
                </a>
            </div>
            <div class="pb-map-frame" data-pb-map-frame>
                <iframe src="https://yandex.ru/map-widget/v1/?text=%D0%90%D0%BB%D0%BC%D0%B0%D1%82%D1%8B%2C%20%D1%83%D0%BB.%20%D0%9A%D1%80%D1%8B%D0%BB%D0%BE%D0%B2%D0%B0%2C%2024&z=16" title="Карта магазинов Pandbox" loading="lazy" allowfullscreen></iframe>
                <div class="pb-map-scan" aria-hidden="true"></div>
                <span class="pb-map-corner pb-map-corner-tl"></span><span class="pb-map-corner pb-map-corner-br"></span>
            </div>
        </section>

        <section class="pb-contacts-bottom">
            <div class="pb-contact-channel">
                <span>03 / ПОЧТА</span><h2>Нужна консультация?</h2>
                <p>Напишите нам — подскажем по совместимости, наличию и доставке.</p>
            </div>
            <div class="pb-contact-links">
                <a href="mailto:pandbox@mail.ru"><small>Почта магазина</small><b>pandbox@mail.ru</b><i>→</i></a>
                <a href="mailto:info@pandbox.kz"><small>Общие вопросы</small><b>info@pandbox.kz</b><i>→</i></a>
                <a href="tel:+77076555703"><small>Для предложений</small><b>+7 (707) 655 57 03</b><i>→</i></a>
            </div>
        </section>
    </main>

    <style>
        .pb-contacts-page{--pc-green:#20c883;--pc-mint:#39e0a0;--pc-ink:#09110d;--pc-line:#d9e5df;overflow:hidden;color:#17211c;background-color:#f4f7f5;background-image:radial-gradient(circle,rgba(17,96,61,.11) .7px,transparent .9px);background-size:24px 24px}.pb-contacts-page *{box-sizing:border-box}.pb-contacts-hero{position:relative;overflow:hidden;color:#fff;background:radial-gradient(circle at 70% 30%,rgba(31,193,126,.18),transparent 32%),linear-gradient(115deg,#07100b,#10251a)}.pb-contacts-hero:before{content:'';position:absolute;inset:0;opacity:.15;background-image:linear-gradient(rgba(57,224,160,.13) 1px,transparent 1px),linear-gradient(90deg,rgba(57,224,160,.13) 1px,transparent 1px);background-size:38px 38px;mask-image:linear-gradient(90deg,#000,transparent 90%)}.pb-contacts-hero:after{content:'PANDBOX.KZ';position:absolute;right:-28px;bottom:-23px;color:rgba(57,224,160,.035);font:400 clamp(76px,12vw,205px)/.8 'MagistralBold',Arial;letter-spacing:-.07em;white-space:nowrap}.pb-contacts-hero-inner{position:relative;z-index:2;padding-top:26px!important;padding-bottom:0!important}.pb-contacts-breadcrumbs{display:flex;align-items:center;gap:10px;color:#748b7f;font-size:11px}.pb-contacts-breadcrumbs a{color:var(--pc-mint);text-decoration:none}.pb-contacts-breadcrumbs b{color:#a9bbb1;font-weight:500}.pb-contacts-hero-grid{min-height:440px;display:grid;grid-template-columns:minmax(0,1fr) 410px;align-items:center;gap:60px;padding:45px 0}.pb-contacts-kicker{display:block;margin-bottom:16px;color:var(--pc-mint);font:700 10px/1 Arial;letter-spacing:.22em}.pb-contacts-heading h1{max-width:760px;margin:0;color:#fff;font-size:clamp(46px,6.2vw,88px);font-weight:500;line-height:.94;letter-spacing:-.045em}.pb-contacts-heading p{max-width:660px;margin:22px 0 0;color:#aebdb5;font-size:15px;line-height:1.65}.pb-contacts-hero-actions{display:flex;gap:10px;margin-top:30px}.pb-contacts-hero-actions button,.pb-contacts-hero-actions a{min-height:54px;display:inline-flex;align-items:center;justify-content:center;gap:11px;padding:12px 19px;border:1px solid var(--pc-green);border-radius:0;color:#fff;background:linear-gradient(90deg,#0c8d5c,#18b879);font-family:inherit;font-size:13px;font-weight:700;text-decoration:none;cursor:pointer;transition:.25s}.pb-contacts-hero-actions a{border-color:rgba(57,224,160,.38);background:rgba(57,224,160,.07)}.pb-contacts-hero-actions button:hover,.pb-contacts-hero-actions a:hover{color:#07110c;background:var(--pc-mint);transform:translateY(-3px)}.pb-contacts-hero-actions svg{width:21px;height:21px;fill:none;stroke:currentColor;stroke-width:1.7;stroke-linecap:round;stroke-linejoin:round}.pb-contacts-radar{position:relative;width:360px;height:360px;justify-self:end;border:1px solid rgba(57,224,160,.16);border-radius:50%;background:radial-gradient(circle,rgba(57,224,160,.08),transparent 62%)}.pb-contacts-radar:before,.pb-contacts-radar:after{content:'';position:absolute;background:rgba(57,224,160,.2)}.pb-contacts-radar:before{left:50%;top:-18px;bottom:-18px;width:1px}.pb-contacts-radar:after{top:50%;left:-18px;right:-18px;height:1px}.pb-radar-ring{position:absolute;border:1px solid rgba(57,224,160,.22);border-radius:50%}.pb-radar-ring-one{inset:48px}.pb-radar-ring-two{inset:103px}.pb-contacts-radar>i{position:absolute;left:50%;top:50%;width:45%;height:2px;background:linear-gradient(90deg,var(--pc-mint),transparent);transform-origin:left center;animation:pbMapRadar 4s linear infinite}.pb-contacts-radar>i:after{content:'';position:absolute;left:0;top:-70px;width:160px;height:140px;background:conic-gradient(from 270deg at 0 50%,rgba(57,224,160,.14),transparent 25%);clip-path:polygon(0 50%,100% 0,100% 100%)}@keyframes pbMapRadar{to{transform:rotate(360deg)}}.pb-contacts-radar>strong{position:absolute;left:50%;top:45%;color:#fff;font-size:58px;transform:translate(-50%,-50%)}.pb-contacts-radar>small{position:absolute;left:50%;top:60%;color:#7e978a;font:700 9px Arial;letter-spacing:.2em;text-transform:uppercase;transform:translateX(-50%)}.pb-radar-point{position:absolute;width:10px;height:10px;border:2px solid #07110c;border-radius:50%;background:var(--pc-mint);box-shadow:0 0 0 6px rgba(57,224,160,.12),0 0 22px var(--pc-mint)}.pb-radar-point-one{left:21%;top:34%}.pb-radar-point-two{right:23%;bottom:28%}.pb-contacts-facts{position:relative;display:grid;grid-template-columns:repeat(3,1fr);border-top:1px solid rgba(57,224,160,.2);border-left:1px solid rgba(57,224,160,.2)}.pb-contacts-facts>span{min-height:86px;display:flex;align-items:center;gap:14px;padding:18px 24px;border-right:1px solid rgba(57,224,160,.2);background:rgba(2,11,7,.38)}.pb-contacts-facts b{color:var(--pc-mint);font-size:25px}.pb-contacts-facts small{color:#91a59a;font-size:11px}.pb-contacts-content{padding-top:64px!important;padding-bottom:90px!important}.pb-contacts-section-head{display:flex;align-items:end;justify-content:space-between;gap:25px;margin-bottom:24px}.pb-contacts-section-head span,.pb-map-topbar>div>span,.pb-contact-channel>span{display:block;margin-bottom:8px;color:#149764;font:700 9px Arial;letter-spacing:.2em}.pb-contacts-section-head h2,.pb-map-topbar h2,.pb-contact-channel h2{margin:0;color:#15211b;font-size:34px;line-height:1}.pb-contacts-section-head p{max-width:390px;margin:0;color:#79877f;font-size:12px;line-height:1.5}.pb-store-grid{display:grid;grid-template-columns:1fr 1fr;gap:20px}.pb-store-card{position:relative;min-width:0;overflow:hidden;padding:30px;border:2px solid #17221c;background:#fff;box-shadow:0 15px 38px rgba(8,52,30,.08);transition:border-color .25s,transform .25s,box-shadow .25s}.pb-store-card:hover,.pb-store-card.active{border-color:var(--pc-green);box-shadow:0 24px 52px rgba(8,78,44,.15);transform:translateY(-5px)}.pb-store-card.active{background:linear-gradient(135deg,#fff,#f0faf5)}.pb-store-select{position:absolute;z-index:3;inset:0;width:100%;height:100%;padding:0;border:0;background:transparent;cursor:pointer}.pb-store-card>*:not(.pb-store-select){position:relative;z-index:2;pointer-events:none}.pb-store-card a{z-index:4!important;pointer-events:auto!important}.pb-store-number{position:absolute!important;right:16px;top:7px;color:rgba(13,111,70,.065);font:400 105px/.85 'MagistralBold',Arial}.pb-store-card-head{display:flex;align-items:flex-end;justify-content:space-between;margin-bottom:27px;padding-bottom:20px;border-bottom:1px solid #dce7e1}.pb-store-card-head>span{position:absolute;left:0;top:0;color:#159766;font:700 8px Arial;letter-spacing:.18em}.pb-store-card-head h3{margin:22px 0 0;font-size:35px}.pb-store-card-head i{padding:7px 9px;color:#75867d;border:1px solid #d8e4de;font:700 8px Arial;letter-spacing:.13em;text-transform:uppercase}.pb-store-card.active .pb-store-card-head i{border-color:var(--pc-green);color:#087c51}.pb-store-address{display:flex;align-items:center;gap:15px}.pb-store-address>svg{width:48px;height:48px;flex:0 0 48px;padding:12px;border:1px solid #bfe7d3;color:#159766;background:#eff9f4;fill:none;stroke:currentColor;stroke-width:1.6}.pb-store-address div,.pb-store-phones a{display:flex;flex-direction:column;gap:5px}.pb-store-address small,.pb-store-phones small{color:#8a9891;font-size:9px}.pb-store-address strong{font-size:16px}.pb-store-phones{display:grid;grid-template-columns:1fr 1fr;gap:9px;margin-top:21px}.pb-store-phones a{padding:13px 14px;border:1px solid #dce7e1;color:#17211c;background:#fafcfb;text-decoration:none;transition:.2s}.pb-store-phones a:hover{border-color:var(--pc-green);color:#087c51;background:#eff9f4}.pb-store-phones b{font-size:13px}.pb-store-route{display:flex;align-items:center;justify-content:space-between;margin-top:19px;padding-top:18px;border-top:1px solid #dce7e1;color:#0d8e5d;font-size:12px;font-weight:700;text-decoration:none}.pb-store-route svg{width:20px;height:20px;fill:none;stroke:currentColor;stroke-width:1.8;stroke-linecap:round;stroke-linejoin:round;transition:transform .2s}.pb-store-route:hover svg{transform:translateX(5px)}.pb-store-corner{position:absolute!important;right:-1px;bottom:-1px;width:42px;height:42px;border-right:2px solid var(--pc-green);border-bottom:2px solid var(--pc-green);pointer-events:none}.pb-map-section{margin-top:55px;border:2px solid #101914;background:#0c1510;box-shadow:0 26px 65px rgba(5,40,23,.18)}.pb-map-topbar{min-height:92px;display:flex;align-items:center;justify-content:space-between;gap:20px;padding:20px 26px;color:#fff}.pb-map-topbar h2{color:#fff;font-size:26px}.pb-map-topbar>a{display:flex;align-items:center;gap:10px;padding:11px 14px;border:1px solid rgba(57,224,160,.4);color:#fff;background:rgba(57,224,160,.08);font-size:11px;text-decoration:none;transition:.2s}.pb-map-topbar>a:hover{color:#07110c;background:var(--pc-mint)}.pb-map-topbar svg{width:18px;height:18px;fill:none;stroke:currentColor;stroke-width:1.7;stroke-linecap:round;stroke-linejoin:round}.pb-map-frame{position:relative;height:510px;overflow:hidden;border-top:1px solid rgba(57,224,160,.25);background:#dfe7e3}.pb-map-frame iframe{width:100%;height:100%;display:block;border:0;filter:saturate(.68) contrast(1.05);transition:opacity .25s,filter .25s}.pb-map-frame:hover iframe{filter:saturate(1) contrast(1)}.pb-map-frame.loading iframe{opacity:.25}.pb-map-scan{position:absolute;z-index:2;left:0;right:0;top:-80px;height:80px;pointer-events:none;background:linear-gradient(transparent,rgba(48,228,156,.15),transparent);animation:pbMapScan 5s linear infinite}@keyframes pbMapScan{to{transform:translateY(650px)}}.pb-map-corner{position:absolute;z-index:3;width:48px;height:48px;pointer-events:none}.pb-map-corner-tl{left:18px;top:18px;border-left:2px solid #159766;border-top:2px solid #159766}.pb-map-corner-br{right:18px;bottom:18px;border-right:2px solid #159766;border-bottom:2px solid #159766}.pb-contacts-bottom{display:grid;grid-template-columns:.8fr 1.2fr;gap:30px;margin-top:55px;padding:36px;border:1px solid #cadbd2;background:linear-gradient(120deg,#f7fbf9,#fff)}.pb-contact-channel p{max-width:420px;margin:15px 0 0;color:#78867f;font-size:13px;line-height:1.6}.pb-contact-links{display:grid;grid-template-columns:1fr;gap:7px}.pb-contact-links a{display:grid;grid-template-columns:130px 1fr 25px;align-items:center;gap:12px;padding:13px 15px;border:1px solid #dce6e1;color:#17211c;background:#fff;text-decoration:none;transition:.2s}.pb-contact-links a:hover{border-color:var(--pc-green);color:#087c51;transform:translateX(5px)}.pb-contact-links small{color:#89978f;font-size:9px}.pb-contact-links b{font-size:13px}.pb-contact-links i{color:#159766;font-style:normal;font-size:18px}.pb-contacts-page button:focus-visible,.pb-contacts-page a:focus-visible{outline:2px solid var(--pc-mint);outline-offset:3px}@media(max-width:1000px){.pb-contacts-hero-grid{grid-template-columns:1fr 310px;gap:25px}.pb-contacts-radar{width:290px;height:290px}.pb-store-phones{grid-template-columns:1fr}.pb-contacts-bottom{grid-template-columns:1fr}}@media(max-width:760px){.pb-contacts-hero-grid{min-height:0;grid-template-columns:1fr;padding:38px 0}.pb-contacts-radar{display:none}.pb-contacts-heading h1{font-size:48px}.pb-contacts-hero-actions{flex-direction:column}.pb-contacts-hero-actions>*{width:100%}.pb-contacts-facts{grid-template-columns:1fr}.pb-contacts-facts>span{min-height:64px}.pb-contacts-section-head{align-items:flex-start;flex-direction:column}.pb-store-grid{grid-template-columns:1fr}.pb-store-card{padding:23px}.pb-store-card-head h3{font-size:29px}.pb-map-topbar{align-items:flex-start;flex-direction:column}.pb-map-frame{height:390px}.pb-contacts-bottom{padding:25px 20px}.pb-contact-links a{grid-template-columns:1fr 22px}.pb-contact-links small{grid-column:1}.pb-contact-links b{grid-column:1}.pb-contact-links i{grid-column:2;grid-row:1/3}.pb-contacts-content{padding-top:42px!important;padding-bottom:60px!important}}@media(max-width:430px){.pb-store-phones{grid-template-columns:1fr}.pb-map-frame{height:330px}.pb-contacts-heading h1{font-size:41px}.pb-contacts-section-head h2,.pb-contact-channel h2{font-size:28px}}
    </style>

    <style>
        /* Compact contacts hero: desktop only, mobile layout stays unchanged. */
        @media(min-width:761px){
            .pb-contacts-hero:after{bottom:-18px;font-size:clamp(60px,9vw,145px)}
            .pb-contacts-hero-inner{padding-top:18px!important}
            .pb-contacts-hero-grid{min-height:292px;grid-template-columns:minmax(0,1fr) 300px;gap:42px;padding:25px 0}
            .pb-contacts-kicker{margin-bottom:11px;font-size:9px}
            .pb-contacts-heading h1{font-size:clamp(38px,4.5vw,62px)}
            .pb-contacts-heading p{margin-top:15px;font-size:13px;line-height:1.55}
            .pb-contacts-hero-actions{margin-top:20px}
            .pb-contacts-hero-actions button,.pb-contacts-hero-actions a{min-height:46px;padding:10px 16px;font-size:12px}
            .pb-contacts-hero-actions svg{width:19px;height:19px}
            .pb-contacts-radar{width:240px;height:240px}
            .pb-contacts-radar>strong{font-size:42px}
            .pb-contacts-radar>small{top:62%;font-size:8px}
            .pb-contacts-facts>span{min-height:62px;padding:12px 20px}
            .pb-contacts-facts b{font-size:20px}
        }
    </style>

    <script data-navigate-once>
    (function(){
        function contactsRoot(){return document.querySelector('[data-pb-contacts]');}

        function selectStore(card){
            var root=contactsRoot();
            if(!root||!card)return;
            root.querySelectorAll('[data-pb-store]').forEach(function(item){item.classList.toggle('active',item===card);});
            var frame=root.querySelector('[data-pb-map-frame]');
            var iframe=frame&&frame.querySelector('iframe');
            var title=root.querySelector('[data-pb-map-title]');
            var route=root.querySelector('[data-pb-map-route]');
            if(title)title.textContent=card.dataset.mapTitle||'';
            if(route)route.href=card.dataset.route||'#';
            if(frame)frame.classList.add('loading');
            if(iframe&&iframe.src!==card.dataset.mapSrc)iframe.src=card.dataset.mapSrc;
            window.setTimeout(function(){if(frame)frame.classList.remove('loading');},500);
            if(typeof gsap!=='undefined'){
                gsap.fromTo(card,{scale:.985},{scale:1,duration:.4,ease:'back.out(1.7)',overwrite:true});
                if(frame)gsap.fromTo(frame,{y:8},{y:0,duration:.45,ease:'power3.out',overwrite:true});
            }
        }

        function animateContacts(){
            var root=contactsRoot();
            if(!root||root.dataset.pbAnimated==='1')return;
            root.dataset.pbAnimated='1';
            if(typeof gsap==='undefined')return;
            gsap.fromTo(root.querySelectorAll('.pb-contacts-breadcrumbs,.pb-contacts-heading>*'),{y:24,opacity:0},{y:0,opacity:1,duration:.62,stagger:.075,ease:'power3.out',clearProps:'transform,opacity'});
            gsap.fromTo(root.querySelector('.pb-contacts-radar'),{scale:.78,opacity:0,rotation:-12},{scale:1,opacity:1,rotation:0,duration:.9,ease:'back.out(1.35)',delay:.18,clearProps:'transform,opacity'});
            gsap.fromTo(root.querySelectorAll('.pb-contacts-facts>span'),{y:20,opacity:0},{y:0,opacity:1,duration:.45,stagger:.08,ease:'power3.out',delay:.45,clearProps:'transform,opacity'});
            gsap.fromTo(root.querySelectorAll('.pb-store-card'),{y:34,opacity:0},{y:0,opacity:1,duration:.55,stagger:.12,ease:'power3.out',delay:.18,clearProps:'transform,opacity'});
            gsap.fromTo(root.querySelector('.pb-map-section'),{y:35,opacity:0},{y:0,opacity:1,duration:.65,ease:'power3.out',delay:.32,clearProps:'transform,opacity'});
            gsap.fromTo(root.querySelector('.pb-contacts-bottom'),{y:28,opacity:0},{y:0,opacity:1,duration:.55,ease:'power3.out',delay:.42,clearProps:'transform,opacity'});
        }

        if(!window.__pbContactsBooted){
            window.__pbContactsBooted=true;
            document.addEventListener('click',function(event){
                var select=event.target.closest&&event.target.closest('.pb-store-select');
                if(select)selectStore(select.closest('[data-pb-store]'));
            });
            document.addEventListener('livewire:navigated',animateContacts);
        }
        animateContacts();
    })();
    </script>
</div>
