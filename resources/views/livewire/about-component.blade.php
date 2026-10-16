@section('title', 'О компании — Pandbox.kz')

<div class="pb-about-page" data-pb-about>
    <section class="pb-about-hero">
        <div class="container pb-about-hero-inner">
            <nav class="pb-about-breadcrumbs" aria-label="Хлебные крошки">
                <a wire:navigate href="{{ route('home') }}">Главная</a><span>→</span><b>О компании</b>
            </nav>

            <div class="pb-about-hero-grid">
                <div class="pb-about-heading">
                    <span class="pb-about-kicker">PBX / TACTICAL STORE</span>
                    <h1>О компании</h1>
                    <p>Pandbox.kz — магазин, созданный энтузиастами страйкбола для игроков. Помогаем собрать надёжный комплект новичку, опытному игроку и целой команде.</p>
                    <div class="pb-about-actions">
                        <a wire:navigate href="{{ route('shop') }}"><span>Смотреть каталог</span><svg viewBox="0 0 24 24"><path d="M5 12h13M13 6l6 6-6 6"/></svg></a>
                        <button type="button" data-pb-callback><span>Получить консультацию</span><svg viewBox="0 0 24 24"><path d="M22 16.9v3a2 2 0 0 1-2.2 2 19.8 19.8 0 0 1-8.6-3.1 19.5 19.5 0 0 1-6-6A19.8 19.8 0 0 1 2.1 4.2 2 2 0 0 1 4.1 2h3a2 2 0 0 1 2 1.7c.1 1 .4 1.9.7 2.8a2 2 0 0 1-.5 2.1L8.1 9.9a16 16 0 0 0 6 6l1.3-1.3a2 2 0 0 1 2.1-.5c.9.4 1.8.6 2.8.7a2 2 0 0 1 1.7 2.1Z"/></svg></button>
                    </div>
                </div>

                <div class="pb-about-scope" aria-hidden="true">
                    <span class="pb-scope-ring pb-scope-ring-one"></span><span class="pb-scope-ring pb-scope-ring-two"></span>
                    <i></i><b></b>
                    <div class="pb-scope-mark"><strong>PBX</strong><small>EST. KZ</small></div>
                    <em class="pb-scope-point pb-scope-point-a"></em><em class="pb-scope-point pb-scope-point-b"></em>
                </div>
            </div>

            <div class="pb-about-facts">
                <span><b>TEAM</b><small>Команда энтузиастов</small></span>
                <span><b>360°</b><small>Полный комплект игрока</small></span>
                <span><b>KZ</b><small>Работаем по Казахстану</small></span>
            </div>
        </div>
    </section>

    <main class="container pb-about-content">
        <section class="pb-about-story">
            <div class="pb-about-section-head">
                <div><span>01 / КТО МЫ</span><h2>Сами понимаем игру</h2></div>
                <p>Мы знаем, что снаряжение должно не просто хорошо выглядеть — оно должно уверенно работать на полигоне.</p>
            </div>
            <div class="pb-about-story-grid">
                <article class="pb-about-story-main" data-pb-about-card>
                    <span class="pb-about-story-number">01</span>
                    <div class="pb-about-icon"><svg viewBox="0 0 24 24"><path d="M12 3 4 7v5c0 4.6 3.1 7.3 8 9 4.9-1.7 8-4.4 8-9V7z"/><path d="m8.5 12 2.2 2.2 4.8-5"/></svg></div>
                    <h3>Магазин для игроков</h3>
                    <p>Мы объединили любовь к страйкболу и практический подход к подбору товаров. В каталоге есть решения для первого комплекта, модернизации существующего снаряжения и оснащения команды.</p>
                </article>
                <article class="pb-about-story-side" data-pb-about-card>
                    <span>Наша миссия</span>
                    <blockquote>Сделать мир страйкбола доступнее, предлагая качественное оборудование и честный выбор.</blockquote>
                    <p>Стремимся быть надёжным партнёром — от первой консультации до получения заказа.</p>
                    <i>PBX / MISSION 01</i>
                </article>
            </div>
        </section>

        <section class="pb-about-full-story" id="about-full">
            <div class="pb-about-section-head">
                <div><span>02 / О PANDBOX</span><h2>Магазин для страйкболистов</h2></div>
                <p>Полная история о нашем ассортименте, подходе к выбору товаров и принципах работы.</p>
            </div>
            <div class="pb-about-full-copy">
                <div>
                    <p>Добро пожаловать в наш интернет-магазин “Pandbox.kz”, специализированный на товарах для страйкбола! Мы – команда энтузиастов, объединенных страстью к страйкболу и стремлением предоставить вам лучшие товары для этого увлекательного и динамичного вида спорта. Наш магазин создан для того, чтобы каждый страйкболист – от новичка до опытного игрока – нашел здесь все необходимое для увлекательных и безопасных игр.</p>
                    <p>Наша миссия – сделать мир страйкбола доступным для всех, предлагая широкий ассортимент качественного оборудования, снаряжения и аксессуаров по справедливым ценам. Мы стремимся быть вашим надежным партнером в выборе и покупке всего, что нужно для полноценного участия в игре, будь то личное снаряжение или комплект для всей команды.</p>
                    <p>Ассортимент нашего магазина охватывает все аспекты страйкбольного снаряжения:</p>
                </div>
                <div>
                    <p>Страйкбольное оружие – от классических автоматов и винтовок до пистолетов и дробовиков, все модели представляют точные реплики реального оружия и соответствуют высоким стандартам качества. Аксессуары для оружия – коллиматоры, прицелы, лазерные указатели, тактические фонари и многое другое для улучшения точности и комфорта игры.</p>
                    <p>Снаряжение и экипировка – шлемы, защитные маски, бронежилеты, тактические разгрузки, рюкзаки и другие элементы экипировки, обеспечивающие безопасность и удобство на поле боя. Боеприпасы и расходники – шары различного калибра, газовые баллоны, батареи, зарядные устройства и другие необходимые мелочи, которые всегда должны быть под рукой.</p>
                    <p>Мы сотрудничаем только с проверенными производителями, такими как Tokyo Marui, G&amp;G Armament, LCT, CYMA и другими лидерами в мире страйкбольного оборудования. Все товары в нашем каталоге сертифицированы и соответствуют международным стандартам качества и безопасности.</p>
                </div>
            </div>
        </section>

        <section class="pb-about-assortment">
            <div class="pb-about-section-head">
                <div><span>03 / АССОРТИМЕНТ</span><h2>Всё для выхода на игру</h2></div>
                <p>Основные категории собраны в единую систему — от привода до мелочей, которые всегда должны быть под рукой.</p>
            </div>
            <div class="pb-about-cards">
                <article data-pb-about-card>
                    <b>01</b><div class="pb-about-icon"><svg viewBox="0 0 24 24"><path d="M3 11h12l3-3h3v7h-4l-2-2H9l-2 4H4l1-4H3z"/><path d="M8 8h6M18 10v3"/></svg></div>
                    <span>Основное</span><h3>Страйкбольное оружие</h3><p>Автоматы, винтовки, пистолеты и другие модели для разных задач и стиля игры.</p>
                </article>
                <article data-pb-about-card>
                    <b>02</b><div class="pb-about-icon"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="7"/><circle cx="12" cy="12" r="2"/><path d="M12 2v3M12 19v3M2 12h3M19 12h3"/></svg></div>
                    <span>Точность</span><h3>Тюнинг и аксессуары</h3><p>Прицелы, коллиматоры, фонари, внутренние и внешние запчасти для настройки привода.</p>
                </article>
                <article data-pb-about-card>
                    <b>03</b><div class="pb-about-icon"><svg viewBox="0 0 24 24"><path d="M8 4h8l3 5-2 11H7L5 9z"/><path d="M9 4v5h6V4M8 14h8"/></svg></div>
                    <span>Защита</span><h3>Снаряжение и экипировка</h3><p>Шлемы, маски, бронежилеты, разгрузки, рюкзаки и элементы удобной экипировки.</p>
                </article>
                <article data-pb-about-card>
                    <b>04</b><div class="pb-about-icon"><svg viewBox="0 0 24 24"><path d="M5 7h14v12H5zM8 4h8v3"/><circle cx="9" cy="13" r="2"/><path d="M13 11h3M13 15h3"/></svg></div>
                    <span>Всегда в запасе</span><h3>Расходники</h3><p>Шары, газ, аккумуляторы, зарядные устройства и необходимые игровые мелочи.</p>
                </article>
            </div>
        </section>

        <section class="pb-about-principles">
            <div class="pb-about-principles-title"><span>04 / НАШ ПОДХОД</span><h2>Выбор без случайностей</h2><p>Не просто продаём позиции из каталога — помогаем собрать совместимый и понятный комплект.</p></div>
            <div class="pb-about-principles-list">
                <article data-pb-about-card><b>01</b><div><h3>Проверенные производители</h3><p>Работаем с известными брендами страйкбольного оборудования, включая Tokyo Marui, G&amp;G Armament, LCT и CYMA.</p></div></article>
                <article data-pb-about-card><b>02</b><div><h3>Подбор под задачу</h3><p>Учитываем опыт игрока, формат игр, совместимость компонентов и планируемый бюджет.</p></div></article>
                <article data-pb-about-card><b>03</b><div><h3>От личного комплекта до команды</h3><p>Подбираем как отдельную позицию, так и полноценный набор экипировки для нескольких игроков.</p></div></article>
            </div>
        </section>

        <section class="pb-about-brands">
            <span>BRANDS / EQUIPMENT</span>
            <div><b>Tokyo Marui</b><b>G&amp;G Armament</b><b>LCT</b><b>CYMA</b><b>PBX SELECT</b></div>
        </section>

        <section class="pb-about-cta">
            <div><span>Готовы к игре?</span><h2>Соберите свой комплект</h2><p>Начните с каталога или задайте вопрос менеджеру — поможем определиться.</p></div>
            <a wire:navigate href="{{ route('shop') }}"><span>Открыть каталог</span><svg viewBox="0 0 24 24"><path d="M5 12h13M13 6l6 6-6 6"/></svg></a>
        </section>
    </main>

    <style>
        .pb-about-page{--pa-green:#20c883;--pa-mint:#39e0a0;--pa-ink:#09110d;overflow:hidden;color:#17211c;background-color:#f4f7f5;background-image:radial-gradient(circle,rgba(17,96,61,.11) .7px,transparent .9px);background-size:24px 24px}.pb-about-page *{box-sizing:border-box}.pb-about-page svg{fill:none;stroke:currentColor;stroke-width:1.7;stroke-linecap:round;stroke-linejoin:round}.pb-about-hero{position:relative;overflow:hidden;color:#fff;background:radial-gradient(circle at 70% 28%,rgba(31,193,126,.18),transparent 32%),linear-gradient(115deg,#07100b,#10251a)}.pb-about-hero:before{content:'';position:absolute;inset:0;opacity:.15;background-image:linear-gradient(rgba(57,224,160,.13) 1px,transparent 1px),linear-gradient(90deg,rgba(57,224,160,.13) 1px,transparent 1px);background-size:38px 38px;mask-image:linear-gradient(90deg,#000,transparent 90%)}.pb-about-hero:after{content:'PANDBOX.KZ';position:absolute;right:-28px;bottom:-18px;color:rgba(57,224,160,.035);font:400 clamp(60px,9vw,145px)/.8 'MagistralBold',Arial;letter-spacing:-.07em;white-space:nowrap}.pb-about-hero-inner{position:relative;z-index:2;padding-top:18px!important}.pb-about-breadcrumbs{display:flex;align-items:center;gap:10px;color:#748b7f;font-size:10px}.pb-about-breadcrumbs a{color:var(--pa-mint);text-decoration:none}.pb-about-breadcrumbs b{color:#a9bbb1;font-weight:500}.pb-about-hero-grid{min-height:292px;display:grid;grid-template-columns:minmax(0,1fr) 300px;align-items:center;gap:42px;padding:25px 0}.pb-about-kicker{display:block;margin-bottom:11px;color:var(--pa-mint);font:700 9px Arial;letter-spacing:.22em}.pb-about-heading h1{margin:0;color:#fff;font-size:clamp(38px,4.5vw,62px);font-weight:500;line-height:.94;letter-spacing:-.045em}.pb-about-heading p{max-width:650px;margin:15px 0 0;color:#aebdb5;font-size:13px;line-height:1.55}.pb-about-actions{display:flex;gap:10px;margin-top:20px}.pb-about-actions a,.pb-about-actions button,.pb-about-cta>a{min-height:46px;display:inline-flex;align-items:center;justify-content:center;gap:10px;padding:10px 16px;border:1px solid var(--pa-green);border-radius:0;color:#fff;background:linear-gradient(90deg,#0c8d5c,#18b879);font-family:inherit;font-size:12px;font-weight:700;text-decoration:none;cursor:pointer;transition:.25s}.pb-about-actions button{border-color:rgba(57,224,160,.38);background:rgba(57,224,160,.07)}.pb-about-actions a:hover,.pb-about-actions button:hover,.pb-about-cta>a:hover{color:#07110c;background:var(--pa-mint);transform:translateY(-3px)}.pb-about-actions svg,.pb-about-cta svg{width:19px;height:19px}.pb-about-scope{position:relative;width:240px;height:240px;justify-self:end;border:1px solid rgba(57,224,160,.16);border-radius:50%;background:radial-gradient(circle,rgba(57,224,160,.08),transparent 62%)}.pb-about-scope:before,.pb-about-scope:after{content:'';position:absolute;background:rgba(57,224,160,.2)}.pb-about-scope:before{left:50%;top:-16px;bottom:-16px;width:1px}.pb-about-scope:after{top:50%;left:-16px;right:-16px;height:1px}.pb-scope-ring{position:absolute;border:1px solid rgba(57,224,160,.2);border-radius:50%}.pb-scope-ring-one{inset:36px}.pb-scope-ring-two{inset:76px}.pb-about-scope>i,.pb-about-scope>b{position:absolute;left:50%;top:50%;width:22px;height:1px;background:var(--pa-mint)}.pb-about-scope>i{transform:translate(-50%,-50%) rotate(45deg)}.pb-about-scope>b{transform:translate(-50%,-50%) rotate(-45deg)}.pb-scope-mark{position:absolute;left:50%;top:50%;display:flex;flex-direction:column;align-items:center;transform:translate(-50%,-50%)}.pb-scope-mark strong{color:#fff;font-size:38px;line-height:1}.pb-scope-mark small{margin-top:7px;color:#789084;font:700 7px Arial;letter-spacing:.2em}.pb-scope-point{position:absolute;width:9px;height:9px;border:2px solid #07110c;background:var(--pa-mint);box-shadow:0 0 0 5px rgba(57,224,160,.12),0 0 18px var(--pa-mint)}.pb-scope-point-a{left:17%;top:31%}.pb-scope-point-b{right:18%;bottom:26%}.pb-about-facts{display:grid;grid-template-columns:repeat(3,1fr);border-top:1px solid rgba(57,224,160,.2);border-left:1px solid rgba(57,224,160,.2)}.pb-about-facts>span{min-height:62px;display:flex;align-items:center;gap:14px;padding:12px 20px;border-right:1px solid rgba(57,224,160,.2);background:rgba(2,11,7,.38)}.pb-about-facts b{color:var(--pa-mint);font-size:20px}.pb-about-facts small{color:#91a59a;font-size:10px}.pb-about-content{padding-top:64px!important;padding-bottom:90px!important}.pb-about-section-head{display:flex;align-items:end;justify-content:space-between;gap:28px;margin-bottom:25px}.pb-about-section-head span,.pb-about-principles-title>span,.pb-about-brands>span{display:block;margin-bottom:9px;color:#149764;font:700 9px Arial;letter-spacing:.2em}.pb-about-section-head h2,.pb-about-principles-title h2,.pb-about-cta h2{margin:0;color:#15211b;font-size:35px;line-height:1}.pb-about-section-head p{max-width:420px;margin:0;color:#78867f;font-size:12px;line-height:1.55}.pb-about-story-grid{display:grid;grid-template-columns:1.2fr .8fr;gap:15px}.pb-about-story-grid article{position:relative;min-height:330px;padding:34px;border:1px solid #d2e0d9;background:#fff;box-shadow:0 17px 40px rgba(8,52,30,.07);transition:.25s}.pb-about-story-grid article:hover,.pb-about-cards article:hover{border-color:var(--pa-green);transform:translateY(-5px);box-shadow:0 24px 48px rgba(8,78,44,.13)}.pb-about-story-main{overflow:hidden}.pb-about-story-number{position:absolute;right:18px;top:5px;color:rgba(11,119,73,.06);font-size:115px}.pb-about-icon{position:relative;z-index:2;width:56px;height:56px;display:grid;place-items:center;border:1px solid #aee0c7;color:#0d9a64;background:#eff9f4}.pb-about-icon svg{width:27px;height:27px}.pb-about-story-main h3{position:relative;margin:26px 0 13px;font-size:27px}.pb-about-story-main p,.pb-about-story-side p,.pb-about-cards p,.pb-about-principles p,.pb-about-cta p{margin:0;color:#78867f;font-size:12px;line-height:1.65}.pb-about-story-side{color:#fff!important;border-color:#173125!important;background:radial-gradient(circle at 90% 0,rgba(45,219,148,.17),transparent 36%),#0a1510!important}.pb-about-story-side>span{color:var(--pa-mint);font:700 9px Arial;letter-spacing:.2em;text-transform:uppercase}.pb-about-story-side blockquote{margin:30px 0 20px;color:#fff;font-size:24px;line-height:1.28}.pb-about-story-side p{color:#9bada3}.pb-about-story-side i{position:absolute;left:34px;bottom:26px;color:#516a5d;font:700 8px Arial;letter-spacing:.18em}.pb-about-assortment{margin-top:70px}.pb-about-cards{display:grid;grid-template-columns:repeat(4,1fr);gap:12px}.pb-about-cards article{position:relative;min-height:320px;padding:25px 22px;border:1px solid #d4e1da;background:#fff;box-shadow:0 14px 35px rgba(8,52,30,.06);transition:.25s}.pb-about-cards article>b{position:absolute;right:13px;top:8px;color:rgba(11,119,73,.07);font-size:55px}.pb-about-cards article>span{display:block;margin-top:24px;color:#159766;font:700 8px Arial;letter-spacing:.17em;text-transform:uppercase}.pb-about-cards h3{margin:9px 0 12px;font-size:19px;line-height:1.15}.pb-about-principles{display:grid;grid-template-columns:.78fr 1.22fr;gap:38px;margin-top:70px;padding:38px;color:#fff;border:1px solid #193326;background:radial-gradient(circle at 15% 10%,rgba(40,211,141,.14),transparent 32%),#0a1510}.pb-about-principles-title h2{color:#fff}.pb-about-principles-title p{margin-top:16px;color:#9bada3}.pb-about-principles-list{display:grid;gap:9px}.pb-about-principles-list article{display:grid;grid-template-columns:50px 1fr;gap:16px;padding:16px;border:1px solid rgba(57,224,160,.16);background:rgba(255,255,255,.035);transition:.25s}.pb-about-principles-list article:hover{border-color:rgba(57,224,160,.55);transform:translateX(5px)}.pb-about-principles-list article>b{display:grid;place-items:center;width:44px;height:44px;color:var(--pa-mint);border:1px solid rgba(57,224,160,.32);font-size:14px}.pb-about-principles-list h3{margin:0 0 5px;color:#fff;font-size:15px}.pb-about-principles-list p{color:#8fa197;font-size:11px;line-height:1.5}.pb-about-brands{margin-top:55px;padding:28px;border:1px solid #cadbd2;background:rgba(255,255,255,.72)}.pb-about-brands>div{display:grid;grid-template-columns:repeat(5,1fr);margin-top:18px;border-top:1px solid #d8e4de;border-left:1px solid #d8e4de}.pb-about-brands b{min-height:66px;display:grid;place-items:center;padding:12px;border-right:1px solid #d8e4de;border-bottom:1px solid #d8e4de;color:#34453c;font-size:13px;text-align:center}.pb-about-cta{display:flex;align-items:center;justify-content:space-between;gap:35px;margin-top:55px;padding:35px 38px;border:1px solid #bfd4c9;background:linear-gradient(110deg,#eff9f4,#fff)}.pb-about-cta>div>span{display:block;margin-bottom:8px;color:#159766;font:700 9px Arial;letter-spacing:.19em;text-transform:uppercase}.pb-about-cta p{margin-top:10px}.pb-about-cta>a{flex:0 0 auto;color:#fff}.pb-about-page button:focus-visible,.pb-about-page a:focus-visible{outline:2px solid var(--pa-mint);outline-offset:3px}@media(max-width:1000px){.pb-about-hero-grid{grid-template-columns:1fr 260px;gap:25px}.pb-about-scope{width:220px;height:220px}.pb-about-cards{grid-template-columns:1fr 1fr}.pb-about-principles{grid-template-columns:1fr}.pb-about-brands>div{grid-template-columns:repeat(3,1fr)}}@media(max-width:760px){.pb-about-hero-grid{min-height:0;grid-template-columns:1fr;padding:38px 0}.pb-about-scope{display:none}.pb-about-heading h1{font-size:46px}.pb-about-actions{flex-direction:column}.pb-about-actions>*{width:100%}.pb-about-facts{grid-template-columns:1fr}.pb-about-facts>span{min-height:58px}.pb-about-section-head{align-items:flex-start;flex-direction:column}.pb-about-story-grid,.pb-about-cards,.pb-about-principles{grid-template-columns:1fr}.pb-about-story-grid article{min-height:0}.pb-about-story-side i{position:static;display:block;margin-top:25px}.pb-about-principles{padding:27px 22px}.pb-about-brands>div{grid-template-columns:1fr 1fr}.pb-about-cta{align-items:flex-start;flex-direction:column;padding:28px 23px}.pb-about-cta>a{width:100%}.pb-about-content{padding-top:45px!important;padding-bottom:60px!important}.pb-about-assortment,.pb-about-principles{margin-top:50px}}@media(max-width:430px){.pb-about-heading h1{font-size:41px}.pb-about-section-head h2,.pb-about-principles-title h2,.pb-about-cta h2{font-size:29px}.pb-about-brands>div{grid-template-columns:1fr}.pb-about-story-grid article,.pb-about-cards article{padding:23px}}
        .pb-about-full-story{margin-top:70px;scroll-margin-top:100px}.pb-about-full-copy{display:grid;grid-template-columns:1fr 1fr;border:1px solid #d2e0d9;background:#fff;box-shadow:0 17px 40px rgba(8,52,30,.07)}.pb-about-full-copy>div{padding:30px 34px}.pb-about-full-copy>div+div{border-left:1px solid #dce7e1}.pb-about-full-copy p{margin:0;color:#5f7067;font-size:13px;line-height:1.65}.pb-about-full-copy p+p{margin-top:17px}@media(max-width:760px){.pb-about-full-story{margin-top:50px;scroll-margin-top:80px}.pb-about-full-copy{grid-template-columns:1fr}.pb-about-full-copy>div{padding:23px}.pb-about-full-copy>div+div{border-top:1px solid #dce7e1;border-left:0}.pb-about-full-copy p{font-size:14px;line-height:1.6}}
    </style>

    <script data-navigate-once>
    (function(){
        function animateAbout(){
            var root=document.querySelector('[data-pb-about]');
            if(!root||root.dataset.pbAnimated==='1')return;
            root.dataset.pbAnimated='1';
            if(typeof gsap==='undefined')return;
            gsap.fromTo(root.querySelectorAll('.pb-about-breadcrumbs,.pb-about-heading>*'),{y:23,opacity:0},{y:0,opacity:1,duration:.6,stagger:.07,ease:'power3.out',clearProps:'transform,opacity'});
            gsap.fromTo(root.querySelector('.pb-about-scope'),{scale:.75,rotation:-14,opacity:0},{scale:1,rotation:0,opacity:1,duration:.85,ease:'back.out(1.4)',delay:.14,clearProps:'transform,opacity'});
            gsap.fromTo(root.querySelectorAll('.pb-about-facts>span'),{y:17,opacity:0},{y:0,opacity:1,duration:.42,stagger:.08,ease:'power3.out',delay:.38,clearProps:'transform,opacity'});
            gsap.fromTo(root.querySelectorAll('.pb-about-story-grid article'),{y:32,opacity:0},{y:0,opacity:1,duration:.56,stagger:.12,ease:'power3.out',delay:.16,clearProps:'transform,opacity'});
            gsap.fromTo(root.querySelectorAll('.pb-about-cards article'),{y:34,opacity:0},{y:0,opacity:1,duration:.54,stagger:.09,ease:'power3.out',delay:.24,clearProps:'transform,opacity'});
            gsap.fromTo(root.querySelectorAll('.pb-about-full-copy,.pb-about-principles,.pb-about-brands,.pb-about-cta'),{y:32,opacity:0},{y:0,opacity:1,duration:.58,stagger:.12,ease:'power3.out',delay:.32,clearProps:'transform,opacity'});
        }
        if(!window.__pbAboutBooted){
            window.__pbAboutBooted=true;
            document.addEventListener('livewire:navigated',animateAbout);
            document.addEventListener('pointerover',function(event){
                var card=event.target.closest&&event.target.closest('[data-pb-about-card]');
                if(!card||!card.closest('[data-pb-about]')||typeof gsap==='undefined')return;
                var icon=card.querySelector('.pb-about-icon');
                if(icon)gsap.to(icon,{scale:1.08,rotation:-4,duration:.28,ease:'back.out(2)',overwrite:true});
            });
            document.addEventListener('pointerout',function(event){
                var card=event.target.closest&&event.target.closest('[data-pb-about-card]');
                if(!card||card.contains(event.relatedTarget)||typeof gsap==='undefined')return;
                var icon=card.querySelector('.pb-about-icon');
                if(icon)gsap.to(icon,{scale:1,rotation:0,duration:.24,ease:'power2.out',overwrite:true});
            });
        }
        animateAbout();
    })();
    </script>
</div>
