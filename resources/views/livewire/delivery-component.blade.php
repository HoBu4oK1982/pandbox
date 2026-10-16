@section('title', 'Доставка и оплата — Pandbox.kz')

<div class="pb-delivery-page" data-pb-delivery>
    <section class="pb-delivery-hero">
        <div class="container pb-delivery-hero-inner">
            <nav class="pb-delivery-breadcrumbs" aria-label="Хлебные крошки">
                <a wire:navigate href="{{ route('home') }}">Главная</a><span>→</span><b>Доставка и оплата</b>
            </nav>

            <div class="pb-delivery-hero-grid">
                <div class="pb-delivery-heading">
                    <span class="pb-delivery-kicker">PBX / DELIVERY SYSTEM</span>
                    <h1>Доставка<br><em>и оплата</em></h1>
                    <p>Отправляем заказы по Казахстану два раза в неделю. Показываем весь маршрут посылки — от нашего склада до пункта выдачи в вашем городе.</p>
                    <div class="pb-delivery-actions">
                        <a wire:navigate href="{{ route('shop') }}">
                            <span>Перейти в магазин</span>
                            <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M5 12h13M13 6l6 6-6 6"/></svg>
                        </a>
                        <button type="button" data-pb-callback>
                            <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M22 16.9v3a2 2 0 0 1-2.2 2 19.8 19.8 0 0 1-8.6-3.1 19.5 19.5 0 0 1-6-6A19.8 19.8 0 0 1 2.1 4.2 2 2 0 0 1 4.1 2h3a2 2 0 0 1 2 1.7c.1 1 .4 1.9.7 2.8a2 2 0 0 1-.5 2.1L8.1 9.9a16 16 0 0 0 6 6l1.3-1.3a2 2 0 0 1 2.1-.5c.9.4 1.8.6 2.8.7a2 2 0 0 1 1.7 2.1Z"/></svg>
                            <span>Уточнить доставку</span>
                        </button>
                    </div>
                </div>

                <div class="pb-route-visual" aria-hidden="true">
                    <div class="pb-route-grid"></div>
                    <span class="pb-route-city pb-route-city-a"><i></i>Алматы</span>
                    <span class="pb-route-city pb-route-city-b"><i></i>Ваш город</span>
                    <div class="pb-route-line"><i></i></div>
                    <div class="pb-route-truck">
                        <svg viewBox="0 0 64 36"><path d="M3 7h35v21H3zM38 13h12l9 9v6H38z"/><circle cx="15" cy="29" r="5"/><circle cx="49" cy="29" r="5"/><path d="M43 16h6l5 6H43z"/></svg>
                    </div>
                    <strong>02–07</strong><small>дней в пути</small>
                    <span class="pb-route-scan"></span>
                </div>
            </div>

            <div class="pb-delivery-facts">
                <span><b>ВТ / ПТ</b><small>Отправка в обед</small></span>
                <span><b>2–7</b><small>Дней в среднем</small></span>
                <span><b>KZ</b><small>Доставка по регионам</small></span>
            </div>
        </div>
    </section>

    <main class="container pb-delivery-content">
        <section class="pb-delivery-section">
            <div class="pb-delivery-section-head">
                <div><span>01 / МАРШРУТ ЗАКАЗА</span><h2>Как едет ваша посылка</h2></div>
                <p>Четыре понятных этапа — после передачи заказа перевозчику мы отправим данные для получения.</p>
            </div>

            <div class="pb-delivery-timeline">
                <article data-pb-delivery-card>
                    <b>01</b>
                    <div class="pb-delivery-icon"><svg viewBox="0 0 24 24"><path d="M4 7.5 12 3l8 4.5v9L12 21l-8-4.5z"/><path d="m4 7.5 8 4.5 8-4.5M12 12v9"/></svg></div>
                    <span>Подготовка</span><h3>Собираем заказ</h3><p>Проверяем товары и готовим посылку к безопасной перевозке.</p>
                </article>
                <article data-pb-delivery-card>
                    <b>02</b>
                    <div class="pb-delivery-icon"><svg viewBox="0 0 24 24"><path d="M3 6h11v11H3zM14 10h4l3 4v3h-7z"/><circle cx="7" cy="18" r="2"/><circle cx="18" cy="18" r="2"/></svg></div>
                    <span>Вторник / пятница</span><h3>Передаём в ТК</h3><p>В обед отправляем заказ частным перевозчиком — автобусом или грузовым транспортом.</p>
                </article>
                <article data-pb-delivery-card>
                    <b>03</b>
                    <div class="pb-delivery-icon"><svg viewBox="0 0 24 24"><path d="M6 3h12v18l-3-2-3 2-3-2-3 2z"/><path d="M9 8h6M9 12h6M9 16h3"/></svg></div>
                    <span>После отправки</span><h3>Высылаем квитанцию</h3><p>Передаём номер отправления и адрес пункта выдачи в вашем городе.</p>
                </article>
                <article data-pb-delivery-card>
                    <b>04</b>
                    <div class="pb-delivery-icon"><svg viewBox="0 0 24 24"><path d="M20 10c0 5-8 11-8 11S4 15 4 10a8 8 0 1 1 16 0Z"/><circle cx="12" cy="10" r="2.5"/></svg></div>
                    <span>Пункт выдачи</span><h3>Получаете заказ</h3><p>Забираете посылку на базе перевозчика и отдельно оплачиваете доставку.</p>
                </article>
            </div>
        </section>

        <section class="pb-delivery-section pb-delivery-methods-section">
            <div class="pb-delivery-section-head">
                <div><span>02 / СПОСОБЫ ПОЛУЧЕНИЯ</span><h2>Выберите удобный маршрут</h2></div>
                <p>Основной вариант экономит на перевозке. Адресную доставку можно организовать самостоятельно.</p>
            </div>

            <div class="pb-delivery-methods">
                <article class="pb-method-card pb-method-card-main" data-pb-delivery-card>
                    <span class="pb-method-label">Рекомендуем</span>
                    <div class="pb-method-top">
                        <div class="pb-delivery-icon"><svg viewBox="0 0 24 24"><path d="M3 6h11v11H3zM14 10h4l3 4v3h-7z"/><circle cx="7" cy="18" r="2"/><circle cx="18" cy="18" r="2"/></svg></div>
                        <b>01</b>
                    </div>
                    <h3>До пункта выдачи в вашем городе</h3>
                    <p>Заказ приезжает на базу частной транспортной компании. Перевозчик обычно звонит по прибытии, но рекомендуем самостоятельно контролировать статус по полученным данным.</p>
                    <ul><li>Самая низкая стоимость доставки</li><li>Оплата перевозки при получении</li><li>Не до адреса — забрать нужно самостоятельно</li></ul>
                </article>

                <article class="pb-method-card" data-pb-delivery-card>
                    <span class="pb-method-label">По запросу</span>
                    <div class="pb-method-top">
                        <div class="pb-delivery-icon"><svg viewBox="0 0 24 24"><path d="M20 10c0 5-8 11-8 11S4 15 4 10a8 8 0 1 1 16 0Z"/><circle cx="12" cy="10" r="2.5"/><path d="M3 21h7"/></svg></div>
                        <b>02</b>
                    </div>
                    <h3>Адресная доставка вашей службой</h3>
                    <p>Вы самостоятельно вызываете InDriver или другую службу на адрес магазина в Алматы. Мы подготовим и передадим водителю вашу посылку.</p>
                    <div class="pb-method-address"><small>Адрес передачи</small><strong>г. Алматы, ул. Крылова, 24</strong></div>
                </article>

                <article class="pb-method-card" data-pb-delivery-card>
                    <span class="pb-method-label">Самовывоз</span>
                    <div class="pb-method-top">
                        <div class="pb-delivery-icon"><svg viewBox="0 0 24 24"><path d="M4 10h16v11H4zM7 10V6a5 5 0 0 1 10 0v4"/><path d="M9 15h6"/></svg></div>
                        <b>03</b>
                    </div>
                    <h3>Забрать в магазине Pandbox</h3>
                    <p>Если вы в Алматы, можно забрать готовый заказ самостоятельно. Перед поездкой дождитесь подтверждения менеджера.</p>
                    <a wire:navigate href="{{ route('contacts') }}"><span>Адреса и телефоны</span><svg viewBox="0 0 24 24"><path d="M5 12h13M13 6l6 6-6 6"/></svg></a>
                </article>
            </div>
        </section>

        <section class="pb-payment-panel">
            <div class="pb-payment-intro">
                <span>03 / ОПЛАТА</span>
                <h2>Без скрытой стоимости</h2>
                <p>Стоимость доставки не входит в стоимость товара: она рассчитывается перевозчиком и оплачивается отдельно при получении посылки.</p>
            </div>
            <div class="pb-payment-items">
                <article data-pb-delivery-card>
                    <div class="pb-delivery-icon"><svg viewBox="0 0 24 24"><rect x="3" y="5" width="18" height="14" rx="1"/><path d="M3 10h18M7 15h3"/></svg></div>
                    <div><small>Оплата заказа</small><strong>По выбранному способу при оформлении</strong></div>
                </article>
                <article data-pb-delivery-card>
                    <div class="pb-delivery-icon"><svg viewBox="0 0 24 24"><path d="M4 7h16v13H4zM7 7V4h10v3"/><path d="M8 12h8M8 16h5"/></svg></div>
                    <div><small>Оплата доставки</small><strong>Отдельно перевозчику при получении</strong></div>
                </article>
            </div>
        </section>

        <section class="pb-delivery-notes">
            <div class="pb-delivery-notes-title"><span>04 / ВАЖНО ЗНАТЬ</span><h2>Перед отправкой</h2></div>
            <div class="pb-delivery-note-grid">
                <article><b>01</b><h3>Сроки зависят от маршрута</h3><p>Обычно доставка занимает от 2 до 7 дней. Иногда дольше — на срок влияют удалённость города от Алматы и погодные условия.</p></article>
                <article><b>02</b><h3>Контролируйте прибытие</h3><p>Перевозчик обычно связывается с получателем, но звонок может не поступить. Проверяйте статус по отправленным данным.</p></article>
                <article><b>03</b><h3>Получение на базе</h3><p>Региональная доставка выполняется до города, а не до двери. Адрес базы будет указан в квитанции.</p></article>
            </div>
        </section>

        <section class="pb-delivery-cta">
            <div><span>Остались вопросы?</span><h2>Подскажем лучший способ доставки</h2><p>Назовите ваш город — менеджер объяснит маршрут и условия получения.</p></div>
            <button type="button" data-pb-callback><span>Перезвоните мне</span><svg viewBox="0 0 24 24"><path d="M5 12h13M13 6l6 6-6 6"/></svg></button>
        </section>
    </main>

    <style>
        .pb-delivery-page{--pd-green:#20c883;--pd-mint:#39e0a0;--pd-ink:#09110d;--pd-line:#d8e4de;overflow:hidden;color:#17211c;background-color:#f4f7f5;background-image:radial-gradient(circle,rgba(17,96,61,.11) .7px,transparent .9px);background-size:24px 24px}.pb-delivery-page *{box-sizing:border-box}.pb-delivery-page svg{fill:none;stroke:currentColor;stroke-width:1.7;stroke-linecap:round;stroke-linejoin:round}.pb-delivery-hero{position:relative;overflow:hidden;color:#fff;background:radial-gradient(circle at 72% 34%,rgba(31,193,126,.18),transparent 32%),linear-gradient(115deg,#07100b,#10251a)}.pb-delivery-hero:before{content:'';position:absolute;inset:0;opacity:.14;background-image:linear-gradient(rgba(57,224,160,.13) 1px,transparent 1px),linear-gradient(90deg,rgba(57,224,160,.13) 1px,transparent 1px);background-size:38px 38px;mask-image:linear-gradient(90deg,#000,transparent 92%)}.pb-delivery-hero:after{content:'DELIVERY';position:absolute;right:-18px;bottom:-25px;color:rgba(57,224,160,.035);font:400 clamp(90px,14vw,220px)/.8 'MagistralBold',Arial;letter-spacing:-.07em}.pb-delivery-hero-inner{position:relative;z-index:2;padding-top:26px!important}.pb-delivery-breadcrumbs{display:flex;align-items:center;gap:10px;color:#748b7f;font-size:11px}.pb-delivery-breadcrumbs a{color:var(--pd-mint);text-decoration:none}.pb-delivery-breadcrumbs b{color:#a9bbb1;font-weight:500}.pb-delivery-hero-grid{min-height:440px;display:grid;grid-template-columns:minmax(0,1fr) 460px;align-items:center;gap:60px;padding:42px 0}.pb-delivery-kicker{display:block;margin-bottom:16px;color:var(--pd-mint);font:700 10px Arial;letter-spacing:.22em}.pb-delivery-heading h1{margin:0;color:#fff;font-size:clamp(49px,6vw,84px);font-weight:500;line-height:.88;letter-spacing:-.045em}.pb-delivery-heading h1 em{color:var(--pd-mint);font-style:normal}.pb-delivery-heading p{max-width:650px;margin:24px 0 0;color:#aebdb5;font-size:15px;line-height:1.65}.pb-delivery-actions{display:flex;gap:10px;margin-top:30px}.pb-delivery-actions a,.pb-delivery-actions button,.pb-delivery-cta button{min-height:54px;display:inline-flex;align-items:center;justify-content:center;gap:13px;padding:12px 20px;border:1px solid var(--pd-green);border-radius:0;color:#fff;background:linear-gradient(90deg,#0c8d5c,#18b879);font-family:inherit;font-size:13px;font-weight:700;text-decoration:none;cursor:pointer;transition:.25s}.pb-delivery-actions button{border-color:rgba(57,224,160,.38);background:rgba(57,224,160,.07)}.pb-delivery-actions a:hover,.pb-delivery-actions button:hover,.pb-delivery-cta button:hover{color:#07110c;background:var(--pd-mint);transform:translateY(-3px)}.pb-delivery-actions svg,.pb-delivery-cta svg{width:20px;height:20px}.pb-route-visual{position:relative;width:430px;height:330px;justify-self:end;overflow:hidden;border:1px solid rgba(57,224,160,.22);background:rgba(2,12,7,.42)}.pb-route-grid{position:absolute;inset:0;opacity:.2;background-image:linear-gradient(rgba(57,224,160,.18) 1px,transparent 1px),linear-gradient(90deg,rgba(57,224,160,.18) 1px,transparent 1px);background-size:32px 32px}.pb-route-city{position:absolute;z-index:2;display:flex;align-items:center;gap:8px;color:#91a89b;font:700 9px Arial;letter-spacing:.14em;text-transform:uppercase}.pb-route-city i{width:10px;height:10px;border:2px solid #07110c;border-radius:50%;background:var(--pd-mint);box-shadow:0 0 0 5px rgba(57,224,160,.12),0 0 18px rgba(57,224,160,.7)}.pb-route-city-a{left:38px;bottom:54px}.pb-route-city-b{right:31px;top:52px}.pb-route-line{position:absolute;left:53px;right:54px;top:92px;bottom:69px;border-top:1px dashed rgba(57,224,160,.54);border-right:1px dashed rgba(57,224,160,.54);transform:skewY(-23deg)}.pb-route-line i{position:absolute;right:-4px;top:-4px;width:8px;height:8px;background:var(--pd-mint);box-shadow:0 0 15px var(--pd-mint)}.pb-route-truck{position:absolute;z-index:3;left:48%;top:49%;width:72px;color:var(--pd-mint);filter:drop-shadow(0 0 12px rgba(57,224,160,.25))}.pb-route-truck svg{width:100%;stroke-width:1.35}.pb-route-visual>strong{position:absolute;left:25px;top:24px;color:#fff;font-size:42px;line-height:1}.pb-route-visual>small{position:absolute;left:27px;top:72px;color:#6f897b;font:700 8px Arial;letter-spacing:.2em;text-transform:uppercase}.pb-route-scan{position:absolute;left:-20%;top:-70%;width:140%;height:70%;background:linear-gradient(transparent,rgba(57,224,160,.08),transparent);transform:rotate(-20deg);animation:pbDeliveryScan 5s linear infinite}@keyframes pbDeliveryScan{to{transform:translateY(620px) rotate(-20deg)}}.pb-delivery-facts{position:relative;display:grid;grid-template-columns:repeat(3,1fr);border-top:1px solid rgba(57,224,160,.2);border-left:1px solid rgba(57,224,160,.2)}.pb-delivery-facts>span{min-height:86px;display:flex;align-items:center;gap:15px;padding:18px 24px;border-right:1px solid rgba(57,224,160,.2);background:rgba(2,11,7,.38)}.pb-delivery-facts b{color:var(--pd-mint);font-size:23px}.pb-delivery-facts small{color:#91a59a;font-size:11px}.pb-delivery-content{padding-top:66px!important;padding-bottom:90px!important}.pb-delivery-section+.pb-delivery-section{margin-top:70px}.pb-delivery-section-head{display:flex;align-items:end;justify-content:space-between;gap:28px;margin-bottom:25px}.pb-delivery-section-head span,.pb-payment-intro>span,.pb-delivery-notes-title>span{display:block;margin-bottom:9px;color:#149764;font:700 9px Arial;letter-spacing:.2em}.pb-delivery-section-head h2,.pb-payment-intro h2,.pb-delivery-notes-title h2,.pb-delivery-cta h2{margin:0;color:#15211b;font-size:35px;line-height:1}.pb-delivery-section-head p{max-width:420px;margin:0;color:#78867f;font-size:12px;line-height:1.55}.pb-delivery-timeline{position:relative;display:grid;grid-template-columns:repeat(4,1fr);gap:12px}.pb-delivery-timeline:before{content:'';position:absolute;left:8%;right:8%;top:61px;border-top:1px dashed #85c7a8}.pb-delivery-timeline article{position:relative;min-height:265px;padding:24px 22px;border:1px solid #d5e2db;background:#fff;box-shadow:0 14px 35px rgba(8,52,30,.06);transition:.25s}.pb-delivery-timeline article:hover{border-color:var(--pd-green);transform:translateY(-5px);box-shadow:0 20px 42px rgba(8,78,44,.12)}.pb-delivery-timeline article>b{position:absolute;right:14px;top:10px;color:rgba(11,119,73,.08);font-size:56px}.pb-delivery-icon{position:relative;z-index:2;width:56px;height:56px;display:grid;place-items:center;border:1px solid #aee0c7;color:#0d9a64;background:#eff9f4}.pb-delivery-icon svg{width:27px;height:27px}.pb-delivery-timeline article>span{display:block;margin-top:21px;color:#159766;font:700 8px Arial;letter-spacing:.17em;text-transform:uppercase}.pb-delivery-timeline h3{margin:9px 0 11px;font-size:19px}.pb-delivery-timeline p,.pb-method-card p,.pb-payment-intro p,.pb-delivery-note-grid p,.pb-delivery-cta p{margin:0;color:#78867f;font-size:12px;line-height:1.6}.pb-delivery-methods{display:grid;grid-template-columns:1.2fr 1fr 1fr;gap:15px}.pb-method-card{position:relative;min-height:390px;padding:27px;border:1px solid #cfded6;background:#fff;box-shadow:0 17px 40px rgba(8,52,30,.07);transition:.25s}.pb-method-card:hover{border-color:var(--pd-green);transform:translateY(-5px);box-shadow:0 24px 48px rgba(8,78,44,.13)}.pb-method-card-main{color:#fff;border-color:#12251a;background:radial-gradient(circle at 90% 0,rgba(45,219,148,.18),transparent 34%),#0b1710}.pb-method-label{position:absolute;right:0;top:0;padding:8px 12px;color:#087c51;background:#ddf7ea;font:700 8px Arial;letter-spacing:.16em;text-transform:uppercase}.pb-method-card-main .pb-method-label{color:#07110c;background:var(--pd-mint)}.pb-method-top{display:flex;align-items:center;justify-content:space-between}.pb-method-top>b{color:rgba(11,119,73,.09);font-size:62px;line-height:1}.pb-method-card-main .pb-method-top>b{color:rgba(57,224,160,.09)}.pb-method-card h3{margin:25px 0 14px;font-size:23px;line-height:1.1}.pb-method-card-main h3{color:#fff}.pb-method-card-main p{color:#9eb0a6}.pb-method-card ul{display:grid;gap:9px;margin:24px 0 0;padding:19px 0 0;border-top:1px solid rgba(130,168,147,.22);list-style:none}.pb-method-card li{position:relative;padding-left:19px;color:#b0c1b7;font-size:11px;line-height:1.4}.pb-method-card li:before{content:'✓';position:absolute;left:0;color:var(--pd-mint);font-weight:700}.pb-method-address{margin-top:25px;padding:16px;border-left:3px solid var(--pd-green);background:#f1f8f4}.pb-method-address small{display:block;margin-bottom:6px;color:#829188;font-size:9px}.pb-method-address strong{font-size:13px}.pb-method-card>a{display:flex;align-items:center;justify-content:space-between;margin-top:27px;padding-top:18px;border-top:1px solid #dbe6e0;color:#0d8e5d;font-size:12px;font-weight:700;text-decoration:none}.pb-method-card>a svg{width:19px;height:19px;transition:transform .2s}.pb-method-card>a:hover svg{transform:translateX(5px)}.pb-payment-panel{display:grid;grid-template-columns:.9fr 1.1fr;gap:40px;margin-top:70px;padding:38px;color:#fff;border:1px solid #193326;background:radial-gradient(circle at 80% 30%,rgba(40,211,141,.13),transparent 30%),#0a1510}.pb-payment-intro h2{color:#fff}.pb-payment-intro p{max-width:470px;margin-top:16px;color:#9bada3}.pb-payment-items{display:grid;gap:10px}.pb-payment-items article{display:flex;align-items:center;gap:17px;padding:16px;border:1px solid rgba(57,224,160,.17);background:rgba(255,255,255,.035);transition:.25s}.pb-payment-items article:hover{border-color:rgba(57,224,160,.55);transform:translateX(5px)}.pb-payment-items .pb-delivery-icon{flex:0 0 50px;width:50px;height:50px;border-color:rgba(57,224,160,.35);background:rgba(57,224,160,.08)}.pb-payment-items small{display:block;margin-bottom:5px;color:#738b7e;font-size:9px}.pb-payment-items strong{font-size:13px}.pb-delivery-notes{display:grid;grid-template-columns:260px 1fr;gap:35px;margin-top:70px;padding-top:35px;border-top:1px solid #cddbd4}.pb-delivery-note-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:12px}.pb-delivery-note-grid article{position:relative;padding:23px;border-left:2px solid #1ec17f;background:rgba(255,255,255,.65)}.pb-delivery-note-grid b{position:absolute;right:12px;top:7px;color:rgba(12,112,69,.08);font-size:42px}.pb-delivery-note-grid h3{position:relative;margin:0 0 10px;padding-right:20px;font-size:16px;line-height:1.2}.pb-delivery-cta{display:flex;align-items:center;justify-content:space-between;gap:35px;margin-top:70px;padding:35px 38px;border:1px solid #bfd4c9;background:linear-gradient(110deg,#eff9f4,#fff)}.pb-delivery-cta>div>span{display:block;margin-bottom:8px;color:#159766;font:700 9px Arial;letter-spacing:.19em;text-transform:uppercase}.pb-delivery-cta p{margin-top:10px}.pb-delivery-cta button{flex:0 0 auto;color:#fff}.pb-delivery-page button:focus-visible,.pb-delivery-page a:focus-visible{outline:2px solid var(--pd-mint);outline-offset:3px}@media(max-width:1050px){.pb-delivery-hero-grid{grid-template-columns:1fr 370px;gap:30px}.pb-route-visual{width:370px}.pb-delivery-timeline{grid-template-columns:1fr 1fr}.pb-delivery-timeline:before{display:none}.pb-delivery-methods{grid-template-columns:1fr 1fr}.pb-method-card-main{grid-column:1/-1;min-height:340px}.pb-delivery-notes{grid-template-columns:1fr}.pb-delivery-note-grid{grid-template-columns:repeat(3,1fr)}}@media(max-width:760px){.pb-delivery-hero-grid{min-height:0;grid-template-columns:1fr;padding:38px 0}.pb-delivery-heading h1{font-size:50px}.pb-route-visual{width:100%;height:285px}.pb-delivery-actions{flex-direction:column}.pb-delivery-actions>*{width:100%}.pb-delivery-facts{grid-template-columns:1fr}.pb-delivery-facts>span{min-height:64px}.pb-delivery-section-head{align-items:flex-start;flex-direction:column}.pb-delivery-timeline,.pb-delivery-methods,.pb-payment-panel,.pb-delivery-note-grid{grid-template-columns:1fr}.pb-method-card-main{grid-column:auto}.pb-payment-panel{gap:26px;padding:27px 22px}.pb-delivery-cta{align-items:flex-start;flex-direction:column;padding:28px 23px}.pb-delivery-cta button{width:100%}.pb-delivery-content{padding-top:45px!important;padding-bottom:60px!important}.pb-delivery-section+.pb-delivery-section,.pb-payment-panel,.pb-delivery-notes,.pb-delivery-cta{margin-top:50px}}@media(max-width:430px){.pb-delivery-heading h1{font-size:43px}.pb-route-visual{height:250px}.pb-route-truck{left:43%}.pb-delivery-section-head h2,.pb-payment-intro h2,.pb-delivery-notes-title h2,.pb-delivery-cta h2{font-size:29px}.pb-delivery-timeline{grid-template-columns:1fr}.pb-method-card{padding:23px}.pb-delivery-facts b{font-size:19px}}
    </style>

    <style>
        /* Match the compact content-header proportions used on Contacts. */
        @media(min-width:761px){
            .pb-delivery-hero:after{bottom:-18px;font-size:clamp(60px,9vw,145px)}
            .pb-delivery-hero-inner{padding-top:18px!important}
            .pb-delivery-hero-grid{min-height:292px;grid-template-columns:minmax(0,1fr) 300px;gap:42px;padding:25px 0}
            .pb-delivery-kicker{margin-bottom:11px;font-size:9px}
            .pb-delivery-heading h1{font-size:clamp(38px,4.5vw,62px);line-height:.86}
            .pb-delivery-heading p{max-width:620px;margin-top:15px;font-size:13px;line-height:1.55}
            .pb-delivery-actions{margin-top:20px}
            .pb-delivery-actions a,.pb-delivery-actions button{min-height:46px;padding:10px 16px;font-size:12px}
            .pb-route-visual{width:300px;height:240px}
            .pb-route-visual>strong{font-size:34px}
            .pb-route-visual>small{top:62px}
            .pb-route-city-a{left:28px;bottom:35px}
            .pb-route-city-b{right:20px;top:43px}
            .pb-route-line{left:42px;right:42px;top:77px;bottom:51px}
            .pb-route-truck{left:45%;top:50%;width:60px}
            .pb-delivery-facts>span{min-height:62px;padding:12px 20px}
            .pb-delivery-facts b{font-size:20px}
            .pb-delivery-facts small{font-size:10px}
        }
    </style>

    <script data-navigate-once>
    (function(){
        function animateDelivery(){
            var root=document.querySelector('[data-pb-delivery]');
            if(!root||root.dataset.pbAnimated==='1')return;
            root.dataset.pbAnimated='1';
            if(typeof gsap==='undefined')return;
            gsap.fromTo(root.querySelectorAll('.pb-delivery-breadcrumbs,.pb-delivery-heading>*'),{y:25,opacity:0},{y:0,opacity:1,duration:.62,stagger:.075,ease:'power3.out',clearProps:'transform,opacity'});
            gsap.fromTo(root.querySelector('.pb-route-visual'),{x:45,scale:.92,opacity:0},{x:0,scale:1,opacity:1,duration:.85,ease:'power3.out',delay:.15,clearProps:'transform,opacity'});
            gsap.fromTo(root.querySelector('.pb-route-truck'),{x:-75,y:40,opacity:0},{x:0,y:0,opacity:1,duration:1.15,ease:'power2.out',delay:.42,clearProps:'transform,opacity'});
            gsap.fromTo(root.querySelectorAll('.pb-delivery-facts>span'),{y:18,opacity:0},{y:0,opacity:1,duration:.45,stagger:.08,ease:'power3.out',delay:.47,clearProps:'transform,opacity'});
            gsap.fromTo(root.querySelectorAll('.pb-delivery-timeline article'),{y:34,opacity:0},{y:0,opacity:1,duration:.55,stagger:.1,ease:'power3.out',delay:.18,clearProps:'transform,opacity'});
            gsap.fromTo(root.querySelectorAll('.pb-method-card'),{y:36,opacity:0},{y:0,opacity:1,duration:.58,stagger:.12,ease:'power3.out',delay:.25,clearProps:'transform,opacity'});
            gsap.fromTo(root.querySelectorAll('.pb-payment-panel,.pb-delivery-notes,.pb-delivery-cta'),{y:34,opacity:0},{y:0,opacity:1,duration:.6,stagger:.13,ease:'power3.out',delay:.32,clearProps:'transform,opacity'});
        }
        if(!window.__pbDeliveryBooted){
            window.__pbDeliveryBooted=true;
            document.addEventListener('livewire:navigated',animateDelivery);
            document.addEventListener('pointerover',function(event){
                var card=event.target.closest&&event.target.closest('[data-pb-delivery-card]');
                if(!card||!card.closest('[data-pb-delivery]')||typeof gsap==='undefined')return;
                var icon=card.querySelector('.pb-delivery-icon');
                if(icon)gsap.to(icon,{rotation:-4,scale:1.08,duration:.28,ease:'back.out(2)',overwrite:true});
            });
            document.addEventListener('pointerout',function(event){
                var card=event.target.closest&&event.target.closest('[data-pb-delivery-card]');
                if(!card||card.contains(event.relatedTarget)||typeof gsap==='undefined')return;
                var icon=card.querySelector('.pb-delivery-icon');
                if(icon)gsap.to(icon,{rotation:0,scale:1,duration:.25,ease:'power2.out',overwrite:true});
            });
        }
        animateDelivery();
    })();
    </script>
</div>
