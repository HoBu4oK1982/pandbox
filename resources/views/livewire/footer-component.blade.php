<footer class="pb-site-footer" data-pb-site-footer>
    <div class="footer pb-footer-shell">
        <div class="pb-footer-topline" data-pb-footer-item>
            <span>PBX / TACTICAL STORE</span>
            <strong>Экипировка. Точность. Надёжность.</strong>
            <button type="button" class="pb-footer-callback" data-pb-callback><svg viewBox="0 0 24 24"><path d="M22 16.9v3a2 2 0 0 1-2.2 2 19.8 19.8 0 0 1-8.6-3.1 19.5 19.5 0 0 1-6-6A19.8 19.8 0 0 1 2.1 4.2 2 2 0 0 1 4.1 2h3a2 2 0 0 1 2 1.7c.1 1 .4 1.9.7 2.8a2 2 0 0 1-.5 2.1L8.1 9.9a16 16 0 0 0 6 6l1.3-1.3a2 2 0 0 1 2.1-.5c.9.4 1.8.6 2.8.7a2 2 0 0 1 1.7 2.1Z"/></svg><b>Перезвоните мне</b></button>
        </div>
        <div class="container">
            <div class="footer__wrap">
                <div class="footer__catalog" data-pb-footer-column data-pb-footer-accordion-column>
                    <h3><button type="button" class="pb-footer-accordion-trigger" data-pb-footer-accordion-trigger aria-expanded="false" aria-controls="pb-footer-catalog"><span>каталог товаров</span><i aria-hidden="true"></i></button></h3>
                    <div class="pb-footer-accordion-panel" id="pb-footer-catalog" data-pb-footer-accordion-panel aria-hidden="true">
                        <div class="pb-footer-accordion-inner">
                            <div class="pb-footer-accordion-content">
                                <nav>
                                    <ul>
                                        @foreach ($categories as $category)
                                        <li><a wire:navigate href="{{ route('category', ['slug' => $category->slug] )}}"><svg class="pb-footer-link-icon" viewBox="0 0 24 24" aria-hidden="true"><path d="M4 5h6l2 2h8v12H4z"/><path d="m9 11 3 3 3-3"/></svg><span>{{$category->title}}</span></a></li>
                                        @endforeach
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer__information" data-pb-footer-column data-pb-footer-accordion-column>
                    <h3><button type="button" class="pb-footer-accordion-trigger" data-pb-footer-accordion-trigger aria-expanded="false" aria-controls="pb-footer-information"><span>информация</span><i aria-hidden="true"></i></button></h3>
                    <div class="pb-footer-accordion-panel" id="pb-footer-information" data-pb-footer-accordion-panel aria-hidden="true">
                        <div class="pb-footer-accordion-inner">
                            <div class="pb-footer-accordion-content">
                                <nav>
                                    <ul>
                                        <li><a wire:navigate href="{{ route('about')}}"><svg class="pb-footer-link-icon" viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="12" r="9"/><path d="M12 11v6M12 7h.01"/></svg><span>О компании</span></a></li>
                                        <li><a wire:navigate href="{{ route('articles')}}"><svg class="pb-footer-link-icon" viewBox="0 0 24 24" aria-hidden="true"><path d="M5 3h14v18H5zM8 7h8M8 11h8M8 15h5"/></svg><span>Новости</span></a></li>
                                        <li><a wire:navigate href="{{ route('contacts')}}"><svg class="pb-footer-link-icon" viewBox="0 0 24 24" aria-hidden="true"><path d="M20 10c0 5-8 11-8 11S4 15 4 10a8 8 0 1 1 16 0Z"/><circle cx="12" cy="10" r="2.5"/></svg><span>Контакты</span></a></li>
                                        <li><a wire:navigate href="{{ route('delivery')}}"><svg class="pb-footer-link-icon" viewBox="0 0 24 24" aria-hidden="true"><path d="M3 5h11v11H3zM14 9h4l3 4v3h-7z"/><circle cx="7" cy="19" r="2"/><circle cx="18" cy="19" r="2"/></svg><span>Доставка и оплата</span></a></li>
                                        <li><a wire:navigate href="{{ route('sales')}}"><svg class="pb-footer-link-icon" viewBox="0 0 24 24" aria-hidden="true"><path d="M3 12 12 3h7l2 2v7l-9 9Z"/><circle cx="16.5" cy="7.5" r="1"/></svg><span>Акции</span></a></li>
                                        <li><a wire:navigate href="{{ route('hits')}}"><svg class="pb-footer-link-icon" viewBox="0 0 24 24" aria-hidden="true"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2-5.6-3-5.6 3 1.1-6.2L3 9.6l6.2-.9Z"/></svg><span>Хиты продаж</span></a></li>
                                        <li><a wire:navigate href="{{ route('news')}}"><svg class="pb-footer-link-icon" viewBox="0 0 24 24" aria-hidden="true"><path d="M12 2v4M12 18v4M2 12h4M18 12h4M5 5l3 3M16 16l3 3M19 5l-3 3M8 16l-3 3"/><circle cx="12" cy="12" r="3"/></svg><span>Новинки</span></a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer__logo" data-pb-footer-logo>
                    <a wire:navigate href="/">
                        <img src="{{asset('assets/images/design/logo.png')}}"
                            alt="Страйкбольный магазин №1 в Казахстане">
                    </a>
                    <p>Pandbox.kz</p>
                    <span>Страйкбольный магазин #1 <br>в Казахстане</span>
                    <div class="footer__date">{{ date('Y') }}</div>
                    <nav class="pb-footer-legal" aria-label="Юридическая информация">
                        <a wire:navigate href="{{ route('privacy.policy') }}">Политика конфиденциальности</a>
                        <a wire:navigate href="{{ route('legal.information') }}">Все права защищены</a>
                    </nav>
                </div>
                <div class="footer__contacts" data-pb-footer-column data-pb-footer-accordion-column>
                    <h3><button type="button" class="pb-footer-accordion-trigger" data-pb-footer-accordion-trigger aria-expanded="false" aria-controls="pb-footer-contacts"><span>контакты</span><i aria-hidden="true"></i></button></h3>
                    <div class="pb-footer-accordion-panel" id="pb-footer-contacts" data-pb-footer-accordion-panel aria-hidden="true">
                        <div class="pb-footer-accordion-inner">
                            <div class="pb-footer-accordion-content">
                    <h4 style="color:#fff; margin: 10px 0 5px; font-size: 15px; text-transform: uppercase; letter-spacing: 0.5px;">Алматы</h4>
                    <a href="tel:+77773880866" class="footer__phone"><svg class="pb-footer-contact-icon" viewBox="0 0 24 24" aria-hidden="true"><path d="M6.6 10.8a15 15 0 0 0 6.6 6.6l2.2-2.2a1 1 0 0 1 1-.2 11 11 0 0 0 3.6.5 1 1 0 0 1 1 1V20a1 1 0 0 1-1 1A17 17 0 0 1 3 4a1 1 0 0 1 1-1h3.5a1 1 0 0 1 1 1 11 11 0 0 0 .5 3.6 1 1 0 0 1-.2 1Z"/></svg><span>+7 (777) 388 08 66</span></a>
                    <a href="https://wa.me/77072184465" target="_blank" class="footer__phone">@include('partials.icons.whatsapp', ['class' => 'pb-footer-contact-icon'])<span>+7 (707) 218 44 65</span></a>
                    <a href="tel:+77076555703" class="footer__phone"><svg class="pb-footer-contact-icon" viewBox="0 0 24 24" aria-hidden="true"><path d="M6.6 10.8a15 15 0 0 0 6.6 6.6l2.2-2.2a1 1 0 0 1 1-.2 11 11 0 0 0 3.6.5 1 1 0 0 1 1 1V20a1 1 0 0 1-1 1A17 17 0 0 1 3 4a1 1 0 0 1 1-1h3.5a1 1 0 0 1 1 1 11 11 0 0 0 .5 3.6 1 1 0 0 1-.2 1Z"/></svg><span>+7 (707) 655 57 03 (Для предложений)</span></a>
                    <a href="https://go.2gis.com/UEzvh" target="_blank" class="footer__location"><svg class="pb-footer-contact-icon" viewBox="0 0 24 24" aria-hidden="true"><path d="M20 10c0 5-8 11-8 11S4 15 4 10a8 8 0 1 1 16 0Z"/><circle cx="12" cy="10" r="2.5"/></svg><span>ул. Крылова 24</span></a>

                    <h4 style="color:#fff; margin: 15px 0 5px; font-size: 15px; text-transform: uppercase; letter-spacing: 0.5px;">Астана</h4>
                    <a href="tel:+77070350866" class="footer__phone"><svg class="pb-footer-contact-icon" viewBox="0 0 24 24" aria-hidden="true"><path d="M6.6 10.8a15 15 0 0 0 6.6 6.6l2.2-2.2a1 1 0 0 1 1-.2 11 11 0 0 0 3.6.5 1 1 0 0 1 1 1V20a1 1 0 0 1-1 1A17 17 0 0 1 3 4a1 1 0 0 1 1-1h3.5a1 1 0 0 1 1 1 11 11 0 0 0 .5 3.6 1 1 0 0 1-.2 1Z"/></svg><span>+7 (707) 035 08 66</span></a>
                    <a href="tel:+77075990866" class="footer__phone"><svg class="pb-footer-contact-icon" viewBox="0 0 24 24" aria-hidden="true"><path d="M6.6 10.8a15 15 0 0 0 6.6 6.6l2.2-2.2a1 1 0 0 1 1-.2 11 11 0 0 0 3.6.5 1 1 0 0 1 1 1V20a1 1 0 0 1-1 1A17 17 0 0 1 3 4a1 1 0 0 1 1-1h3.5a1 1 0 0 1 1 1 11 11 0 0 0 .5 3.6 1 1 0 0 1-.2 1Z"/></svg><span>+7 (707) 599 08 66</span></a>
                    <a href="https://2gis.kz/astana/search/Тархана%209" target="_blank" class="footer__location"><svg class="pb-footer-contact-icon" viewBox="0 0 24 24" aria-hidden="true"><path d="M20 10c0 5-8 11-8 11S4 15 4 10a8 8 0 1 1 16 0Z"/><circle cx="12" cy="10" r="2.5"/></svg><span>ул. Тархана 9, Крыльцо 13</span></a>

                    <a href="mailto:pandbox@mail.ru" class="footer__email" style="margin-top: 15px;"><svg class="pb-footer-contact-icon" viewBox="0 0 24 24" aria-hidden="true"><rect x="3" y="5" width="18" height="14"/><path d="m4 7 8 6 8-6"/></svg><span>pandbox@mail.ru</span></a>
                    <a href="mailto:info@pandbox.kz" class="footer__email"><svg class="pb-footer-contact-icon" viewBox="0 0 24 24" aria-hidden="true"><rect x="3" y="5" width="18" height="14"/><path d="m4 7 8 6 8-6"/></svg><span>info@pandbox.kz</span></a>
                    <div class="header__social footer__social">
                        <a href="https://www.instagram.com/pandbox.kz" target="_blank">
                            <svg viewBox="0 0 24 24" aria-label="Instagram"><rect x="3" y="3" width="18" height="18" rx="4"/><circle cx="12" cy="12" r="4"/><circle cx="17.5" cy="6.5" r="1"/></svg>
                        </a>
                        <a href="https://t.me/pandbox_oficial" target="_blank">
                            <svg viewBox="0 0 24 24" aria-label="Telegram"><path d="m21 3-4 18-6-5-4 3 1-6 9-7-11 6-4-2z"/><path d="m8 13 9-7"/></svg>
                        </a>
                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright">COPYRIGHT © ВСЕ ПРАВА ЗАЩИЩЕНЫ - страйкбольный Интернет магазин в казахстане “Pandbox.kz”</div>
<style>
    .pb-site-footer{position:relative;overflow:hidden;color:#dbe6e0;background:#09110d;border-top:3px solid #18bd7d}.pb-site-footer:before{content:'';position:absolute;inset:0;pointer-events:none;opacity:.2;background-image:linear-gradient(rgba(47,219,151,.09) 1px,transparent 1px),linear-gradient(90deg,rgba(47,219,151,.09) 1px,transparent 1px);background-size:34px 34px;mask-image:linear-gradient(90deg,#000,transparent 80%)}.pb-site-footer:after{content:'PANDBOX.KZ';position:absolute;left:50%;bottom:42px;color:rgba(31,201,134,.035);font:900 clamp(80px,12vw,210px)/.8 Arial;letter-spacing:-.08em;white-space:nowrap;transform:translateX(-50%);pointer-events:none}.pb-site-footer .pb-footer-shell{position:relative;z-index:1;padding:0 0 42px!important;background:radial-gradient(circle at 50% 30%,rgba(19,143,93,.2),transparent 34%),linear-gradient(125deg,#101b15,#08100c)!important;border:0!important}.pb-footer-topline{max-width:1390px;display:grid;grid-template-columns:auto 1fr auto;align-items:center;gap:24px;margin:0 auto 42px;padding:18px 24px;border-left:1px solid rgba(39,217,148,.35);border-right:1px solid rgba(39,217,148,.35);border-bottom:1px solid rgba(39,217,148,.2);background:rgba(4,12,8,.72)}.pb-footer-topline>span{color:#39da98;font:700 10px Arial;letter-spacing:.2em}.pb-footer-topline>strong{color:#8ea197;font-size:13px;font-weight:500}.pb-footer-topline>a{display:flex;align-items:center;gap:10px;padding:11px 15px;border:1px solid #199e69;color:#fff;background:rgba(25,158,105,.12);text-decoration:none;transition:background .25s,color .25s}.pb-footer-topline>a:hover{color:#07110c;background:#39da98}.pb-footer-topline svg{width:18px;height:18px;fill:none;stroke:currentColor;stroke-width:1.7;stroke-linecap:round;stroke-linejoin:round}.pb-footer-topline b{font-size:12px}
    .pb-site-footer .footer>.container{position:relative;z-index:2;max-width:1390px!important}.pb-site-footer .footer__wrap{display:grid!important;grid-template-columns:1.05fr .85fr .95fr 1.35fr!important;align-items:start!important;gap:0!important;padding:0!important;background:rgba(10,20,15,.68);border:1px solid rgba(56,218,156,.2);box-shadow:0 28px 80px rgba(0,0,0,.28)}.pb-site-footer .footer__catalog,.pb-site-footer .footer__information,.pb-site-footer .footer__logo,.pb-site-footer .footer__contacts{position:relative;width:auto!important;min-width:0!important;box-sizing:border-box;padding:34px 30px!important;border-right:1px solid rgba(255,255,255,.09)}.pb-site-footer .footer__contacts{border-right:0}.pb-site-footer .footer__wrap h3{margin:0 0 24px!important;color:#fff!important;font-size:18px!important;line-height:1!important;letter-spacing:.02em;text-transform:uppercase}.pb-site-footer .footer__wrap h3:before{content:'PBX / ';display:block;margin-bottom:9px;color:#39da98;font:700 9px Arial;letter-spacing:.18em}.pb-site-footer .footer__wrap ul{margin:0!important;padding:0!important}.pb-site-footer .footer__wrap li{margin:0!important;padding:0!important;list-style:none}.pb-site-footer .footer__wrap li a{position:relative;display:block;padding:7px 0!important;color:#9caea4!important;font-size:13px!important;line-height:1.25;text-decoration:none!important;transition:color .2s,transform .2s}.pb-site-footer .footer__wrap li a:before{content:none!important;display:none!important}.pb-site-footer .footer__wrap li a:hover{color:#fff!important;transform:translateX(5px)}
    .pb-site-footer .footer__logo{align-self:stretch!important;display:flex!important;flex-direction:column;align-items:center;justify-content:center;max-width:none!important;margin-right:0!important;text-align:center;background:linear-gradient(155deg,rgba(40,215,147,.12),rgba(0,0,0,.12))}.pb-site-footer .footer__logo:before,.pb-site-footer .footer__logo:after{content:'';position:absolute;width:38px;height:38px}.pb-site-footer .footer__logo:before{left:16px;top:16px;border-left:1px solid #27d994;border-top:1px solid #27d994}.pb-site-footer .footer__logo:after{right:16px;bottom:16px;border-right:1px solid #27d994;border-bottom:1px solid #27d994}.pb-site-footer .footer__logo a{display:block}.pb-site-footer .footer__logo img{display:block!important;width:150px!important;max-width:none!important;height:auto!important;filter:drop-shadow(0 15px 18px rgba(0,0,0,.35))}.pb-site-footer .footer__logo p{margin:12px 0 4px!important;color:#39da98!important;font-size:21px!important;font-weight:800!important;text-transform:uppercase}.pb-site-footer .footer__logo span{color:#a2b2aa!important;font-size:11px!important;line-height:1.4}.pb-site-footer .footer__date{margin-top:15px!important;color:#fff!important;font-size:28px!important;font-weight:800!important;letter-spacing:.08em}
    .pb-site-footer .footer__contacts h4{margin:14px 0 7px!important;color:#39da98!important;font:700 10px Arial!important;letter-spacing:.14em!important}.pb-site-footer .footer__contacts .pb-footer-accordion-content>a{position:relative;display:block!important;padding:4px 0 4px 17px!important;color:#c0cec7!important;font-size:13px!important;line-height:1.35;text-decoration:none!important;transition:color .2s,transform .2s}.pb-site-footer .footer__contacts .pb-footer-accordion-content>a:before{content:'';position:absolute;left:0;top:11px;width:7px;height:7px;border:1px solid #27d994}.pb-site-footer .footer__contacts .pb-footer-accordion-content>a:hover{color:#39da98!important;transform:translateX(4px)}.pb-site-footer .footer__social{display:flex!important;gap:8px;margin-top:18px!important}.pb-site-footer .footer__social a{width:38px;height:38px;display:grid!important;place-items:center;padding:0!important;border:1px solid rgba(39,217,148,.4);color:#39da98!important;background:rgba(39,217,148,.06)}.pb-site-footer .footer__social a:before{display:none}.pb-site-footer .footer__social a:hover{color:#07110c!important;background:#39da98}.pb-site-footer .footer__social svg{width:20px;height:20px;fill:none;stroke:currentColor;stroke-width:1.7;stroke-linecap:round;stroke-linejoin:round}.pb-site-footer .copyright{position:relative;z-index:2;padding:18px 20px!important;border-top:1px solid rgba(39,217,148,.18);color:#71847a!important;background:#050906!important;font-size:10px!important;letter-spacing:.06em;text-align:center;text-transform:uppercase}
    @media(max-width:1050px){.pb-site-footer .footer__wrap{grid-template-columns:1fr 1fr!important}.pb-site-footer .footer__information{border-right:0}.pb-site-footer .footer__logo{border-top:1px solid rgba(255,255,255,.09)}.pb-site-footer .footer__contacts{border-top:1px solid rgba(255,255,255,.09)}.pb-footer-topline{margin-inline:18px}}
    @media(max-width:700px){.pb-footer-topline{grid-template-columns:1fr;margin-bottom:18px}.pb-footer-topline>strong{display:none}.pb-footer-topline>a{justify-content:center}.pb-site-footer .footer__wrap{grid-template-columns:1fr!important;margin:0 12px}.pb-site-footer .footer__catalog,.pb-site-footer .footer__information,.pb-site-footer .footer__logo,.pb-site-footer .footer__contacts{padding:26px 22px!important;border-right:0;border-bottom:1px solid rgba(255,255,255,.09)}.pb-site-footer .footer__logo{min-height:330px}.pb-site-footer .pb-footer-shell{padding-bottom:20px!important}.pb-site-footer:after{display:none}.pb-site-footer .copyright{margin-top:48px!important}}
    @media(min-width:1051px){.pb-footer-topline{max-width:1600px;margin-bottom:48px;padding:22px 30px}.pb-footer-topline>span{font-size:12px}.pb-footer-topline>strong{font-size:15px}.pb-footer-topline>a{padding:13px 18px}.pb-footer-topline b{font-size:14px}.pb-site-footer .footer>.container{max-width:1600px!important}.pb-site-footer .footer__wrap{grid-template-columns:minmax(0,1fr) minmax(0,1fr) minmax(260px,300px) minmax(0,2fr)!important}.pb-site-footer .footer__catalog,.pb-site-footer .footer__information,.pb-site-footer .footer__logo,.pb-site-footer .footer__contacts{padding:46px 38px!important}.pb-site-footer .footer__wrap h3{margin-bottom:30px!important;font-size:23px!important}.pb-site-footer .footer__wrap h3:before{margin-bottom:11px;font-size:11px}.pb-site-footer .footer__wrap li a{padding:9px 0 9px 20px!important;font-size:16px!important;line-height:1.3}.pb-site-footer .footer__wrap li a:before{width:7px;height:7px}.pb-site-footer .footer__logo img{width:205px!important}.pb-site-footer .footer__logo p{margin-top:18px!important;font-size:28px!important}.pb-site-footer .footer__logo span{font-size:14px!important;line-height:1.45}.pb-site-footer .footer__date{margin-top:19px!important;font-size:36px!important}.pb-site-footer .footer__contacts h4{margin:18px 0 9px!important;font-size:12px!important}.pb-site-footer .footer__contacts .pb-footer-accordion-content>a{min-height:24px;padding:7px 0 7px 24px!important;color:#d5dfda!important;background:none!important;background-image:none!important;font-size:15px!important;line-height:1.35}.pb-site-footer .footer__contacts .pb-footer-accordion-content>a:before{top:13px;width:9px;height:9px}.pb-site-footer .footer__social{margin-top:22px!important}.pb-site-footer .footer__social a{width:44px;height:44px;min-height:44px;padding:0!important}.pb-site-footer .footer__social svg{width:23px;height:23px}.pb-site-footer .copyright{padding:20px!important;font-size:11px!important}}
    .pb-site-footer .pb-footer-topline{width:min(1350px,calc(100% - 32px))!important;max-width:1350px!important;box-sizing:border-box!important}
    .pb-site-footer .footer>.container{width:min(1350px,calc(100% - 32px))!important;max-width:1350px!important;box-sizing:border-box!important}
    .pb-footer-topline>.pb-footer-callback{display:flex;align-items:center;justify-content:center;gap:10px;padding:13px 18px;border:1px solid #199e69;border-radius:0;color:#fff;background:rgba(25,158,105,.12);font-family:inherit;cursor:pointer;transition:background .25s,color .25s}
    .pb-footer-topline>.pb-footer-callback:hover{color:#07110c;background:#39da98}
    .pb-footer-topline>.pb-footer-callback b{font-size:14px}
    .pb-site-footer .footer__wrap li a:before{content:none!important;display:none!important}
    .pb-site-footer .footer__wrap li a{display:flex!important;align-items:center!important;gap:11px!important;padding-left:0!important;background:none!important;background-image:none!important;background-repeat:no-repeat!important}
    .pb-site-footer .pb-footer-link-icon{width:18px;height:18px;flex:0 0 18px;display:block;overflow:visible;fill:none;stroke:#32dc9b;stroke-width:1.55;stroke-linecap:round;stroke-linejoin:round;stroke-dasharray:none!important;stroke-dashoffset:0!important}
    .pb-site-footer .pb-footer-link-icon path,.pb-site-footer .pb-footer-link-icon circle,.pb-site-footer .pb-footer-link-icon rect,.pb-site-footer .pb-footer-link-icon line,.pb-site-footer .pb-footer-link-icon polyline{stroke-dasharray:none!important;stroke-dashoffset:0!important}
    .pb-site-footer .footer__wrap li a span{display:block;min-width:0}
    .pb-site-footer .footer__catalog nav ul>li,
    .pb-site-footer .footer__information nav ul>li{list-style:none!important;background:none!important;background-image:none!important}
    .pb-site-footer .footer__catalog nav ul>li::marker,
    .pb-site-footer .footer__information nav ul>li::marker{content:''!important;font-size:0!important}
    .pb-site-footer .footer__catalog nav ul>li:before,
    .pb-site-footer .footer__catalog nav ul>li:after,
    .pb-site-footer .footer__information nav ul>li:before,
    .pb-site-footer .footer__information nav ul>li:after,
    .pb-site-footer .footer__catalog nav ul>li>a:before,
    .pb-site-footer .footer__catalog nav ul>li>a:after,
    .pb-site-footer .footer__information nav ul>li>a:before,
    .pb-site-footer .footer__information nav ul>li>a:after{content:none!important;display:none!important;width:0!important;height:0!important;margin:0!important;padding:0!important;border:0!important;background:none!important;background-image:none!important;box-shadow:none!important}
    .pb-site-footer .footer__contacts .pb-footer-accordion-content>a{display:flex!important;align-items:center!important;gap:12px!important;padding-left:0!important}
    .pb-site-footer .footer__contacts .pb-footer-accordion-content>a:before{content:none!important;display:none!important}
    .pb-site-footer .pb-footer-contact-icon{width:19px;height:19px;flex:0 0 19px;display:block;fill:none;stroke:#32dc9b;stroke-width:1.55;stroke-linecap:round;stroke-linejoin:round}
    .pb-site-footer .pb-footer-legal{width:100%;display:flex;flex-direction:column;align-items:center;gap:8px;margin-top:18px}.pb-site-footer .pb-footer-legal a{position:relative;color:#9caea4!important;background:none!important;background-image:none!important;font-size:11px!important;line-height:1.25;text-align:center;text-decoration:none!important;transition:color .2s}.pb-site-footer .pb-footer-legal a:before,.pb-site-footer .pb-footer-legal a:after{content:none!important;display:none!important}.pb-site-footer .pb-footer-legal a:hover{color:#39da98!important}
    .pb-site-footer .footer__contacts .pb-footer-accordion-content>a:hover .pb-footer-contact-icon{stroke:#53efb2}
    .pb-site-footer .pb-footer-accordion-trigger{display:flex;align-items:center;justify-content:space-between;width:100%;margin:0;padding:0;border:0;color:inherit;background:none;font:inherit;letter-spacing:inherit;text-align:left;text-transform:inherit;pointer-events:none}.pb-site-footer .pb-footer-accordion-trigger>span{display:block}.pb-site-footer .pb-footer-accordion-trigger>i{display:none;position:relative;width:28px;height:28px;flex:0 0 28px;border:1px solid rgba(57,218,152,.55);background:rgba(57,218,152,.06)}.pb-site-footer .pb-footer-accordion-trigger>i:before,.pb-site-footer .pb-footer-accordion-trigger>i:after{content:'';position:absolute;left:50%;top:50%;width:12px;height:1px;background:#39da98;transform:translate(-50%,-50%);transition:transform .28s ease}.pb-site-footer .pb-footer-accordion-trigger>i:after{transform:translate(-50%,-50%) rotate(90deg)}.pb-site-footer [data-pb-footer-accordion-column].is-open .pb-footer-accordion-trigger>i:after{transform:translate(-50%,-50%) rotate(90deg) scaleX(0)}
    @media(max-width:1024px){.pb-site-footer .footer__contacts .pb-footer-accordion-content>a{background:none!important;background-image:none!important}}
    @media(max-width:700px){.pb-site-footer [data-pb-footer-accordion-column]{padding:0!important}.pb-site-footer [data-pb-footer-accordion-column]>h3{margin:0!important;padding:22px!important}.pb-site-footer .pb-footer-accordion-trigger{gap:18px;pointer-events:auto;cursor:pointer}.pb-site-footer .pb-footer-accordion-trigger>i{display:block}.pb-site-footer .pb-footer-accordion-panel{display:grid;grid-template-rows:0fr;opacity:0;visibility:hidden;transition:grid-template-rows .38s cubic-bezier(.22,1,.36,1),opacity .24s ease,visibility 0s linear .38s}.pb-site-footer .pb-footer-accordion-inner{min-height:0;overflow:hidden}.pb-site-footer .pb-footer-accordion-content{padding:0 22px 22px}.pb-site-footer [data-pb-footer-accordion-column].is-open .pb-footer-accordion-panel{grid-template-rows:1fr;opacity:1;visibility:visible;transition:grid-template-rows .42s cubic-bezier(.22,1,.36,1),opacity .28s ease,visibility 0s}.pb-site-footer [data-pb-footer-accordion-column].is-open>h3{padding-bottom:16px!important}.pb-site-footer .footer__logo{padding:26px 22px!important}}
    @media(prefers-reduced-motion:reduce){.pb-site-footer *{transition:none!important}}
</style>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            function equalizeHeights() {
                let titles = document.querySelectorAll('.product-title');

                if (titles.length === 0) return;

                // Сброс высоты перед вычислением
                titles.forEach(title => {
                    title.style.height = 'auto'; 
                });

                // Вычисляем максимальную высоту
                let maxHeight = Math.max(...Array.from(titles).map(title => title.offsetHeight));

                // Устанавливаем новую высоту для всех заголовков
                titles.forEach(title => {
                    title.style.height = maxHeight + 'px';
                });
            }

            // Запускаем при загрузке страницы
            equalizeHeights();

            // Запускаем после обновления Livewire-компонента
            Livewire.hook('message.processed', () => {
                setTimeout(equalizeHeights, 100); // Даем время Livewire на отрисовку
            });

            // **Добавляем MutationObserver для отслеживания изменений в DOM**
            // Product cards already synchronize their titles in the card runtime.
            // Observing the entire document here made every toast trigger a full-page
            // layout measurement and could freeze pages with many products.
        });
    </script>
    <script data-navigate-once>
    (function(){
        function setFooterAccordionState(column,open){
            var trigger=column.querySelector('[data-pb-footer-accordion-trigger]');
            var panel=column.querySelector('[data-pb-footer-accordion-panel]');
            column.classList.toggle('is-open',open);
            if(trigger)trigger.setAttribute('aria-expanded',open?'true':'false');
            if(panel)panel.setAttribute('aria-hidden',open?'false':'true');
        }

        function syncFooterAccordions(){
            var mobile=window.matchMedia('(max-width: 700px)').matches;
            document.querySelectorAll('[data-pb-site-footer] [data-pb-footer-accordion-column]').forEach(function(column){
                var trigger=column.querySelector('[data-pb-footer-accordion-trigger]');
                var panel=column.querySelector('[data-pb-footer-accordion-panel]');
                if(!trigger||!panel)return;
                if(mobile){
                    trigger.removeAttribute('tabindex');
                    if(!column.hasAttribute('data-pb-footer-accordion-mobile')){
                        column.setAttribute('data-pb-footer-accordion-mobile','1');
                        setFooterAccordionState(column,false);
                    }else{
                        setFooterAccordionState(column,column.classList.contains('is-open'));
                    }
                }else{
                    column.removeAttribute('data-pb-footer-accordion-mobile');
                    column.classList.remove('is-open');
                    trigger.setAttribute('tabindex','-1');
                    trigger.setAttribute('aria-expanded','true');
                    panel.setAttribute('aria-hidden','false');
                }
            });
        }

        function handleFooterAccordionClick(event){
            var trigger=event.target.closest('[data-pb-footer-accordion-trigger]');
            if(!trigger||!window.matchMedia('(max-width: 700px)').matches)return;
            var column=trigger.closest('[data-pb-footer-accordion-column]');
            if(!column)return;
            var shouldOpen=!column.classList.contains('is-open');
            var footer=column.closest('[data-pb-site-footer]');
            footer.querySelectorAll('[data-pb-footer-accordion-column].is-open').forEach(function(item){
                if(item!==column)setFooterAccordionState(item,false);
            });
            setFooterAccordionState(column,shouldOpen);
        }

        if(!window.__pbFooterAccordionBooted){
            window.__pbFooterAccordionBooted=true;
            var resizeTimer;
            document.addEventListener('click',handleFooterAccordionClick);
            document.addEventListener('livewire:navigated',syncFooterAccordions);
            window.addEventListener('pageshow',syncFooterAccordions);
            window.addEventListener('resize',function(){clearTimeout(resizeTimer);resizeTimer=setTimeout(syncFooterAccordions,120);},{passive:true});
        }
        syncFooterAccordions();
    })();
    </script>
    <script data-navigate-once>
    (function(){
        function restorePandboxFooter(footer){
            if(!footer)return;
            if(footer._pbFooterSafetyTimer){clearTimeout(footer._pbFooterSafetyTimer);footer._pbFooterSafetyTimer=null;}
            if(footer._pbFooterTrigger){footer._pbFooterTrigger.kill();footer._pbFooterTrigger=null;}
            if(footer._pbFooterTimeline){footer._pbFooterTimeline.kill();footer._pbFooterTimeline=null;}
            var nodes=[footer.querySelector('.footer__wrap'),footer.querySelector('[data-pb-footer-item]'),footer.querySelector('[data-pb-footer-logo]')]
                .concat(Array.from(footer.querySelectorAll('[data-pb-footer-column],.footer__catalog li,.footer__information li,.footer__contacts .pb-footer-accordion-content>a,.footer__social a')))
                .filter(Boolean);
            if(typeof gsap!=='undefined'){
                gsap.killTweensOf(nodes);
                gsap.set(nodes,{clearProps:'opacity,visibility,transform,clipPath'});
            }else{
                nodes.forEach(function(node){node.style.removeProperty('opacity');node.style.removeProperty('visibility');node.style.removeProperty('transform');node.style.removeProperty('clip-path');});
            }
        }

        function initPandboxFooter(){
            var footer=document.querySelector('[data-pb-site-footer]');
            if(!footer)return;
            if(footer.hasAttribute('data-pb-footer-ready')){
                if(Date.now()-(footer._pbFooterInitAt||0)>250)restorePandboxFooter(footer);
                return;
            }
            footer.setAttribute('data-pb-footer-ready','1');
            footer._pbFooterInitAt=Date.now();
            if(typeof gsap==='undefined'){restorePandboxFooter(footer);return;}
            var top=footer.querySelector('[data-pb-footer-item]');
            var columns=footer.querySelectorAll('[data-pb-footer-column]');
            var logo=footer.querySelector('[data-pb-footer-logo]');
            var links=footer.querySelectorAll('.footer__catalog li,.footer__information li,.footer__contacts .pb-footer-accordion-content>a,.footer__social a');
            var timeline=gsap.timeline({paused:true,defaults:{overwrite:'auto'}});
            footer._pbFooterTimeline=timeline;
            timeline.fromTo(footer.querySelector('.footer__wrap'),{clipPath:'inset(0 50% 0 50%)',autoAlpha:.35},{clipPath:'inset(0 0% 0 0%)',autoAlpha:1,duration:.75,ease:'power3.out'},0)
                .fromTo(top,{y:-24,autoAlpha:0},{y:0,autoAlpha:1,duration:.45,ease:'power3.out'},.08)
                .fromTo(columns,{y:38,autoAlpha:0},{y:0,autoAlpha:1,duration:.55,stagger:.1,ease:'power3.out'},.18)
                .fromTo(logo,{scale:.78,rotation:-4,autoAlpha:0},{scale:1,rotation:0,autoAlpha:1,duration:.7,ease:'back.out(1.7)'},.22)
                .fromTo(links,{x:-12,autoAlpha:0},{x:0,autoAlpha:1,duration:.28,stagger:.018,ease:'power2.out'},.38);
            if(typeof ScrollTrigger!=='undefined'){
                footer._pbFooterTrigger=ScrollTrigger.create({trigger:footer,start:'top 88%',once:true,onEnter:function(){timeline.play();}});
            }else{
                timeline.play();
            }
            footer._pbFooterSafetyTimer=setTimeout(function(){
                if(footer.isConnected&&timeline.progress()===0)restorePandboxFooter(footer);
            },1400);
            if(logo&&!window.matchMedia('(prefers-reduced-motion: reduce)').matches){
                logo.addEventListener('mouseenter',function(){gsap.to(logo,{scale:1.035,duration:.35,ease:'power2.out'});});
                logo.addEventListener('mouseleave',function(){gsap.to(logo,{scale:1,duration:.45,ease:'elastic.out(1,.5)'});});
            }
        }
        if(!window.__pbFooterGsapBooted){
            window.__pbFooterGsapBooted=true;
            document.addEventListener('livewire:navigated',initPandboxFooter);
            window.addEventListener('pageshow',initPandboxFooter);
        }
        initPandboxFooter();
    })();
    </script>
</footer>
