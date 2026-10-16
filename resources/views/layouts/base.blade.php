<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="robots" content="index, follow" />
    <meta name="keywords" content="@yield('meta_keywords')" />
    <meta name="description" content="@yield('meta_description')" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="IE-egde" />
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/images/design/favicon.ico')}}" /> 
    <link rel="image_src" href="" />
    <meta property="og:title" content="@yield('title')"/>
    <meta property="og:description" content="@yield('meta_description')"/>
    <meta property="og:image" content="">
    <meta property="og:type" content="article"/>
    <meta property="og:site_name" content="">
    <meta property="og:url" content= "https://" />
    @livewireStyles
    @if (request()->routeIs('login', 'register', 'password.*', 'verification.*'))
        {{-- Breeze utility styles are only needed by the authentication forms. --}}
        @vite('resources/css/app.css')
    @endif
    {{-- Styles --}}
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/flexslider.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}">
    {{-- Legacy mobile stylesheet is disabled while the new mobile design is built. --}}
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/slick.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/slick-theme.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.5/jquery.fancybox.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.6.1/nouislider.min.css" integrity="sha512-qveKnGrvOChbSzAdtSs8p69eoLegyh+1hwOMbmpCViIwj7rn4oJjdmMvWOuyQlTOZgTlZA0N2PXA7iA8/2TUYA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    
    {{-- Прозрачный GSAP-переход: шапка остаётся на месте --}}
    <style>
        /* Prevent legacy product markup from flashing before tactical cards are assembled. */
        a.product__item:not([data-pb-card-ready="1"]) {
            visibility: hidden !important;
            opacity: 0 !important;
        }
        a.product__item[data-pb-card-ready="1"] {
            visibility: visible;
            opacity: 1;
        }
        html, body, body > main {
            background-color: #f5f7f6;
            background-image: radial-gradient(circle, rgba(5, 67, 42, .08) 1px, transparent 1.25px);
            background-size: 22px 22px;
            background-position: 0 0;
        }
        .pb-page-transition {
            position: fixed;
            inset: 0;
            z-index: 999980;
            visibility: hidden;
            opacity: 0;
            pointer-events: none;
            background: transparent;
        }

        .pb-pt-panda {
            position: absolute;
            left: 50%;
            top: 50%;
            width: min(16vw, 132px);
            transform: translate(-50%, -50%);
            opacity: 0;
            will-change: transform, opacity;
            filter: drop-shadow(0 8px 18px rgba(0, 0, 0, .18));
        }

        .pb-pt-panda .pb-pre-logo {
            display: block;
            width: 100%;
            height: auto;
            overflow: visible;
        }

        .pb-pt-panda .pb-piece {
            opacity: 1;
            transform: none;
        }

        /* Цвета перехода должны жить независимо от прелоадера главной страницы. */
        .pb-pt-panda .pl-fil0,
        .pb-pt-panda .pl-fil0-str0,
        .pb-pt-panda .pl-fil0-str2 { fill: #14181f; }
        .pb-pt-panda .pl-fil1,
        .pb-pt-panda .pl-fil1-str2 { fill: #b9bec7; }
        .pb-pt-panda .pl-fil2,
        .pb-pt-panda .pl-fil2-str1 { fill: #f4f6f8; }
        .pb-pt-panda .pl-fil3-str2 { fill: #159766; }
        .pb-pt-panda .str0,
        .pb-pt-panda .str1,
        .pb-pt-panda .str2 {
            stroke: #05070c;
            stroke-width: 6;
            stroke-miterlimit: 10;
        }

        @media (max-width: 700px) {
            .pb-pt-panda { width: min(28vw, 112px); }
        }

        @media (prefers-reduced-motion: reduce) {
            .pb-page-transition * { animation: none !important; }
        }
    </style>

    <!-- Yandex.Metrika counter -->
    <script type="text/javascript">
        (function(m,e,t,r,i,k,a){
            m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
            m[i].l=1*new Date();
            for (var j = 0; j < document.scripts.length; j++) {if (document.scripts[j].src === r) { return; }}
            k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)
        })(window, document,'script','https://mc.yandex.ru/metrika/tag.js?id=110938866', 'ym');
        ym(110938866, 'init', {ssr:true, webvisor:true, clickmap:true, ecommerce:"dataLayer", referrer: document.referrer, url: location.href, accurateTrackBounce:true, trackLinks:true});
    </script>
    <noscript><div><img src="https://mc.yandex.ru/watch/110938866" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
    <!-- /Yandex.Metrika counter -->
</head>
<body>
    {{-- Прелоадер: панда собирается из кусочков, показывается раз в час.
         Должен быть САМЫМ ПЕРВЫМ элементом в body, чтобы перекрыть контент
         до того, как GSAP успеет отработать. --}}
    @if (request()->routeIs('home'))
        @persist('pandbox-main-preloader')
            @include('partials.preloader')
        @endpersist
    @endif

    @persist('pandbox-page-transition')
        @include('partials.page-transition')
    @endpersist

    <main>
        @livewire('header-component')
        <div id="pageContent">
            {{$slot}}
        </div>
    </main>
    @livewire('footer-component')

    {{-- ====== SCRIPTS ====== --}}
    @livewireScripts

    {{-- Внешние библиотеки: data-navigate-once чтобы не перезагружать при навигации --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js" data-navigate-once></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js" data-navigate-once></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.5/jquery.fancybox.min.js" data-navigate-once></script>   
    <script src="https://kit.fontawesome.com/529b5d8277.js" crossorigin="anonymous" data-navigate-once></script> 
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js" data-navigate-once></script>
    <script src="https://cdn.jsdelivr.net/gh/studio-freight/lenis@latest/bundled/lenis.js" data-navigate-once></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.4/gsap.min.js"
        integrity="sha512-EZI2cBcGPnmR89wTgVnN3602Yyi7muWo8y1B3a8WmIv1J9tYG+udH4LvmYjLiGp37yHB7FfaPBo8ly178m9g4Q=="
        crossorigin="anonymous" referrerpolicy="no-referrer" data-navigate-once>
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.4/ScrollTrigger.min.js" data-navigate-once></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.6.1/nouislider.min.js" 
        integrity="sha512-1mDhG//LAjM3pLXCJyaA+4c+h5qmMoTc7IuJyuNNPaakrWT9rVTxICK4tIizf7YwJsXgDC2JP74PGCc7qxLAHw==" 
        crossorigin="anonymous" 
        referrerpolicy="no-referrer" data-navigate-once>
    </script>
    <script type="text/javascript" src="{{asset('assets/js/mask.js')}}" data-navigate-once></script>
    <script type="text/javascript" src="{{asset('assets/js/jquery.flexslider.js')}}" data-navigate-once></script>
    <script type="text/javascript" src="{{asset('assets/js/jquery.magnific-popup.js')}}" data-navigate-once></script>
    <script type="text/javascript" src="{{asset('assets/js/main.js')}}" data-navigate-once></script>
    <script type="text/javascript" src="{{asset('assets/js/slick.js')}}" data-navigate-once></script>
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js" data-navigate-once></script>
    @include('partials.cart-runtime')

    {{-- ====== ГЛАВНЫЙ СКРИПТ: инициализация + SPA-переходы ====== --}}
    <script data-navigate-once>
    (function() {
        'use strict';

        /* ──────────────── LENIS (smooth scroll) ──────────────── */
        let lenis = null;
        let lenisRafId = null;

        function initLenis() {
            if (typeof Lenis === 'undefined') return;

            if (lenisRafId) {
                cancelAnimationFrame(lenisRafId);
                lenisRafId = null;
            }
            if (lenis) {
                lenis.destroy();
                lenis = null;
            }

            lenis = new Lenis();
            function raf(time) {
                if (!lenis) return;
                lenis.raf(time);
                lenisRafId = requestAnimationFrame(raf);
            }
            lenisRafId = requestAnimationFrame(raf);
        }

        window.__pbRefreshScrollMeasurements = function() {
            requestAnimationFrame(function() {
                if (lenis && typeof lenis.resize === 'function') {
                    lenis.resize();
                }

                var maxScroll = Math.max(0, document.documentElement.scrollHeight - window.innerHeight);
                var safeScroll = Math.min(window.scrollY, maxScroll);
                if (lenis && typeof lenis.scrollTo === 'function') {
                    lenis.scrollTo(safeScroll, { immediate: true, force: true });
                } else if (window.scrollY !== safeScroll) {
                    window.scrollTo(0, safeScroll);
                }
            });
        };

        window.__pbSmoothScrollTo = function(top) {
            if (lenis && typeof lenis.scrollTo === 'function') {
                lenis.scrollTo(top, { duration: 0.9, force: true });
            } else {
                window.scrollTo({ top: top, behavior: 'smooth' });
            }
        };

        /* ──────────────── GSAP: scroll-to-top кнопка ──────────────── */
        function initScrollTopBtn() {
            if (typeof gsap === 'undefined' || typeof ScrollTrigger === 'undefined') return;

            // Убиваем старые ScrollTrigger'ы чтобы не дублировать
            ScrollTrigger.getAll().forEach(t => t.kill());
            ScrollTrigger.refresh();

            const btn = document.querySelector('.scrollTopBtn');
            if (!btn) return;

            const isMobile = window.innerWidth <= 768;

            gsap.set(btn, {
                position: 'fixed',
                bottom: '-100px',
                right: isMobile ? '20px' : '60px',
                opacity: 0,
            });

            gsap.timeline({
                scrollTrigger: {
                    start: 'top+=200',
                    end: '+=.5',
                    toggleActions: 'play none none reverse',
                    scrub: 2,
                }
            }).to(btn, {
                bottom: isMobile ? '150px' : '100px',
                right: isMobile ? '20px' : '60px',
                opacity: 1,
            });

            btn.addEventListener('click', () => {
                if (lenis) {
                    lenis.scrollTo('top', {
                        duration: 1,
                        easing: (t) => Math.min(1, 1.001 - Math.pow(2, -10 * t)),
                    });
                } else {
                    window.scrollTo({ top: 0, behavior: 'smooth' });
                }
            });
        }

        /* ──────────────── jQuery-плагины ──────────────── */
        function initFlexslider() {
            if (typeof window.jQuery === 'undefined' || typeof $.fn.flexslider === 'undefined') return;
            var $slider = $('.flexslider');
            function normalizeRestoredSlider($current) {
                if ($current.data('flexslider')) return;

                var $viewport = $current.children('.flex-viewport');
                if ($viewport.length) {
                    var $slides = $viewport.children('.slides').first();
                    if ($slides.length) $current.prepend($slides);
                    $viewport.remove();
                }

                $current.children('.flex-control-nav,.flex-direction-nav,.flex-pauseplay').remove();
                var $list = $current.children('.slides');
                $list.children('.clone').remove();
                $list.removeAttr('style');
                $list.children('li')
                    .removeAttr('style')
                    .removeClass('flex-active-slide');
                $current.removeClass('flexslider-loading').removeAttr('style');
            }
            function revealSlider(slider) {
                if (!slider) return;
                var shell = slider.closest('.slider');
                var skeleton = shell && shell.querySelector('[data-pb-slider-skeleton]');
                if (!shell || !skeleton) return;
                var revealed = false;
                var finish = function() {
                    if (revealed) return;
                    revealed = true;
                    shell.classList.add('pb-slider-ready');
                    if (typeof gsap !== 'undefined') {
                        gsap.to(skeleton,{autoAlpha:0,duration:.28,ease:'power2.out',onComplete:function(){skeleton.remove();}});
                    } else {
                        skeleton.remove();
                    }
                };
                var firstImage = slider.querySelector('.slides img');
                if (!firstImage || (firstImage.complete && firstImage.naturalWidth)) finish();
                else {
                    firstImage.addEventListener('load',finish,{once:true});
                    firstImage.addEventListener('error',finish,{once:true});
                    window.setTimeout(finish,2200);
                }
            }
            $slider.each(function() {
                var $current = $(this);
                normalizeRestoredSlider($current);
                if (!$current.data('flexslider')) {
                    $current.flexslider({
                        animation: "slide",
                        slideshow: true,
                        slideshowSpeed: 5000,
                        start: function(instance) {
                            revealSlider(instance && instance[0] ? instance[0] : $current[0]);
                        }
                    });
                } else {
                    revealSlider($current[0]);
                    var instance = $current.data('flexslider');
                    if (instance && typeof instance.resize === 'function') instance.resize();
                    $current.flexslider('play');
                    window.setTimeout(function() {
                        var restoredInstance = $current.data('flexslider');
                        if (restoredInstance && typeof restoredInstance.resize === 'function') restoredInstance.resize();
                    }, 80);
                }
            });
        }

        function initSlick(root) {
            if (typeof window.jQuery === 'undefined' || typeof $.fn.slick === 'undefined') return;
            var $scope = root ? $(root) : $(document);
            var $carousel = root
                ? $scope.find('.product__carousel')
                : $scope.find('.home__trend-wrap.active > .product__carousel');
            $carousel.each(function() {
                var $current = $(this);
                if ($current.hasClass('slick-initialized')) {
                    $current.slick('setPosition');
                    return;
                }
                $current.slick({
                    dots: true,
                    infinite: true,
                    speed: 300,
                    slidesToShow: 4,
                    arrows: false,
                    autoplay: true,
                    autoplaySpeed: 2000,
                    responsive: [
                        { breakpoint: 1024, settings: { slidesToShow: 3, infinite: true, dots: false } },
                        { breakpoint: 600,  settings: { slidesToShow: 1.5, slidesToScroll: 1, infinite: false, arrows: false, centerMode: false, centerPadding: '0px', dots: true, autoplay: false } },
                        { breakpoint: 480,  settings: { slidesToShow: 1.5, slidesToScroll: 1, infinite: false, arrows: false, centerMode: false, centerPadding: '0px', dots: true, autoplay: false } }
                    ]
                });
            });
        }

        function initTrendTabs() {
            document.querySelectorAll('.pb-trends-section').forEach(function(section) {
                var headers = Array.from(section.querySelectorAll('.tabHeader'));
                var panels = Array.from(section.querySelectorAll('.home__trend-wrap'));
                var actions = Array.from(section.querySelectorAll('.pb-trends-actions .categories__btn'));
                if (!headers.length || !panels.length) return;

                var activeIndex = Math.max(0, headers.findIndex(function(header) {
                    return header.classList.contains('active');
                }));

                function activate(index, animate) {
                    if (!panels[index]) return;
                    headers.forEach(function(header, headerIndex) {
                        header.classList.toggle('active', headerIndex === index);
                    });
                    panels.forEach(function(panel, panelIndex) {
                        panel.classList.toggle('active', panelIndex === index);
                        panel.setAttribute('aria-hidden', panelIndex === index ? 'false' : 'true');
                    });
                    actions.forEach(function(action, actionIndex) {
                        action.classList.toggle('active', actionIndex === index);
                        action.setAttribute('aria-hidden', actionIndex === index ? 'false' : 'true');
                        action.tabIndex = actionIndex === index ? 0 : -1;
                    });
                    initSlick(panels[index]);
                    if (animate && typeof gsap !== 'undefined') {
                        var cards = Array.from(panels[index].querySelectorAll('.slick-slide.slick-active .product__item'));
                        if (!cards.length) {
                            cards = Array.from(panels[index].querySelectorAll('.product__carousel .product__item'));
                        }
                        var dots = panels[index].querySelector('.slick-dots');
                        var action = actions[index];
                        gsap.killTweensOf(cards);
                        gsap.fromTo(cards,
                            { autoAlpha: 0, y: 34, scale: .965 },
                            { autoAlpha: 1, y: 0, scale: 1, duration: .52, stagger: .075, ease: 'power3.out', clearProps: 'opacity,visibility,transform' }
                        );
                        if (dots) {
                            gsap.killTweensOf(dots);
                            gsap.fromTo(dots, { autoAlpha: 0, y: 10 }, { autoAlpha: 1, y: 0, duration: .34, delay: .2, ease: 'power2.out', clearProps: 'opacity,visibility,transform' });
                        }
                        if (action) {
                            gsap.killTweensOf(action);
                            gsap.fromTo(action, { autoAlpha: 0, y: 16 }, { autoAlpha: 1, y: 0, duration: .4, delay: .28, ease: 'power2.out', clearProps: 'opacity,visibility,transform' });
                        }
                    }
                }

                if (!section.dataset.pbTabsReady) {
                    section.dataset.pbTabsReady = '1';
                    headers.forEach(function(header, index) {
                        header.addEventListener('click', function(event) {
                            event.preventDefault();
                            activate(index, true);
                        });
                    });
                }
                activate(activeIndex, false);
            });
        }

        document.addEventListener('click', function(event) {
            var toggle = event.target.closest && event.target.closest('.category__filter_categories .menu__toggle');
            if (!toggle) return;

            event.preventDefault();
            event.stopPropagation();

            var item = toggle.closest('.menu__item');
            var submenu = item && item.querySelector(':scope > .submenu');
            if (!submenu) return;

            var menu = toggle.closest('.menu');
            if (menu) {
                menu.querySelectorAll('.menu__toggle').forEach(function(otherToggle) {
                    if (otherToggle === toggle) return;
                    otherToggle.classList.remove('active');
                    otherToggle.setAttribute('aria-expanded', 'false');
                    var otherItem = otherToggle.closest('.menu__item');
                    var otherSubmenu = otherItem && otherItem.querySelector(':scope > .submenu');
                    if (otherSubmenu) otherSubmenu.style.display = 'none';
                });
            }

            var willOpen = !toggle.classList.contains('active');
            toggle.classList.toggle('active', willOpen);
            toggle.setAttribute('aria-expanded', willOpen ? 'true' : 'false');
            submenu.style.display = willOpen ? 'block' : 'none';
        });

        function initMask() {
            if (typeof window.jQuery === 'undefined' || typeof $.fn.mask === 'undefined') return;
            $('.art-stranger').mask('+7 (999) 999-99-99');
            $('input[type="tel"]').off('click.maskcursor').on('click.maskcursor', function() {
                if (this.setSelectionRange) this.setSelectionRange(4, 4);
            });
        }

        function initPagination() {
            if (typeof window.jQuery === 'undefined') return;

            $(document).off('click.paginationScroll', 'a[href^="#pagination"]')
                       .on('click.paginationScroll', 'a[href^="#pagination"]', function() {
                var dest = $($(this).attr("href")).offset();
                if (dest) $('html,body').animate({ scrollTop: dest.top }, 1100);
                return false;
            });
            $(document).off('click.pagelink', '.page-link-scroll-to-top')
                       .on('click.pagelink', '.page-link-scroll-to-top', function() {
                $("html, body").animate({ scrollTop: 300 }, "slow");
                return false;
            });
        }

        /* ──────────────── Livewire SweetAlert events ──────────────── */
        function initLivewireEvents() {
            // Эти события регистрируются один раз, Livewire их dispatch'ит
            // через Alpine, они переживают навигацию
        }

        /* ──────────────── MASTER INIT ──────────────── */
        function initAll() {
            initLenis();

            // jQuery-плагины — ждём чуть-чуть, чтобы DOM отрендерился
            setTimeout(function() {
                initFlexslider();
                initTrendTabs();
                initSlick();
                initMask();
                initPagination();
            }, 100);
        }

        /* ──────────────── PANDBOX PAGE TRANSITION ────────────────
           Без полноэкранного фона: шапка остаётся на месте, векторная панда
           кратко появляется поверх страницы, новый контент поднимается снизу. */
        let transitionState = 'idle';
        let livewireNavigationStarted = false;
        let transitionFallbackTimer = null;
        let transitionTargetUrl = null;
        let coverTimeline = null;
        let revealTimeline = null;
        let transitionPandaShownAt = 0;
        let transitionRevealTimer = null;

        function getPageContent() {
            return document.getElementById('pageContent');
        }

        function ensureTransitionPanda(root) {
            const holder = root.querySelector('.pb-pt-panda');
            if (!holder || holder.querySelector('svg')) return holder;

            const source = document.getElementById('pbPreLogo');
            if (!source) return holder;

            const panda = source.cloneNode(true);
            panda.removeAttribute('id');
            panda.setAttribute('aria-hidden', 'true');
            panda.querySelectorAll('[id]').forEach(function(node) {
                node.removeAttribute('id');
            });
            panda.querySelectorAll('.pb-piece').forEach(function(piece) {
                piece.style.opacity = '1';
                piece.style.transform = 'none';
            });
            panda.style.opacity = '1';
            panda.style.transform = 'none';
            holder.appendChild(panda);
            return holder;
        }

        function getTransitionParts() {
            const root = document.getElementById('pbPageTransition');
            if (!root) return null;

            return {
                root: root,
                panda: ensureTransitionPanda(root)
            };
        }

        function prefersReducedMotion() {
            return window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;
        }

        function lockTransitionScroll(locked) {
            if (lenis) {
                if (locked && typeof lenis.stop === 'function') lenis.stop();
                if (!locked && typeof lenis.start === 'function') lenis.start();
            }
        }

        function restorePageContent() {
            const content = getPageContent();
            if (!content) return;

            if (typeof gsap !== 'undefined') {
                gsap.killTweensOf(content);
                gsap.set(content, { clearProps: 'transform,opacity,visibility' });
            } else {
                content.style.opacity = '';
                content.style.transform = '';
                content.style.visibility = '';
            }
        }

        function resetTransitionScene(parts) {
            if (!parts) return;

            if (typeof gsap !== 'undefined') {
                gsap.killTweensOf([parts.root, parts.panda]);
                gsap.set(parts.root, { autoAlpha: 0, clearProps: 'transform' });
                gsap.set(parts.panda, { autoAlpha: 0, scale: .86, y: 8 });
            } else {
                parts.root.style.visibility = 'hidden';
                parts.root.style.opacity = '0';
            }

            parts.root.classList.remove('is-active');
            parts.root.setAttribute('aria-hidden', 'true');
            restorePageContent();
        }

        function closeNavigationOverlays() {
            const mega = document.getElementById('megaMenu');
            const megaBackdrop = document.getElementById('megaBackdrop');
            const sticky = document.getElementById('stickyNav');

            if (mega) mega.classList.remove('open');
            if (megaBackdrop) megaBackdrop.classList.remove('active');
            if (sticky) sticky.classList.remove('sn-visible');

            document.querySelectorAll('.pb-modal.active').forEach(function(modal) {
                modal.classList.remove('active');
            });

            const modalOverlay = document.getElementById('pbModalOverlay');
            if (modalOverlay) modalOverlay.classList.remove('active');
        }

        function forceTransitionCovered() {
            const parts = getTransitionParts();
            if (!parts) return;

            transitionState = 'covered';
            parts.root.classList.add('is-active');
            parts.root.setAttribute('aria-hidden', 'false');
            transitionPandaShownAt = Date.now();
            lockTransitionScroll(true);

            if (typeof gsap !== 'undefined') {
                gsap.set(parts.root, { autoAlpha: 1 });
                gsap.set(parts.panda, { autoAlpha: 1, scale: 1, y: 0 });
            } else {
                parts.root.style.visibility = 'visible';
                parts.root.style.opacity = '1';
            }
        }

        function coverPage() {
            const parts = getTransitionParts();
            const content = getPageContent();

            if (!parts || typeof gsap === 'undefined' || prefersReducedMotion()) {
                forceTransitionCovered();
                return;
            }

            if (transitionState !== 'idle') return;

            transitionState = 'covering';
            closeNavigationOverlays();
            lockTransitionScroll(true);
            resetTransitionScene(parts);

            parts.root.classList.add('is-active');
            parts.root.setAttribute('aria-hidden', 'false');

            if (coverTimeline) coverTimeline.kill();
            if (revealTimeline) revealTimeline.kill();

            coverTimeline = gsap.timeline({
                defaults: { overwrite: 'auto' },
                onComplete: function() {
                    transitionState = 'covered';
                }
            });

            coverTimeline
                .set(parts.root, { autoAlpha: 1 })
                .to(parts.panda, {
                    autoAlpha: 1,
                    scale: 1,
                    duration: .18,
                    y: 0,
                    ease: 'back.out(1.5)'
                }, 0);

            if (content) {
                coverTimeline.to(content, {
                    autoAlpha: .18,
                    y: -5,
                    duration: .16,
                    ease: 'power2.out'
                }, 0);
            }
        }

        function revealPage() {
            const parts = getTransitionParts();
            const content = getPageContent();

            if (transitionFallbackTimer) {
                clearTimeout(transitionFallbackTimer);
                transitionFallbackTimer = null;
            }
            transitionTargetUrl = null;

            if (typeof gsap === 'undefined' || prefersReducedMotion()) {
                if (parts) {
                    parts.root.classList.remove('is-active');
                    parts.root.setAttribute('aria-hidden', 'true');
                    parts.root.style.visibility = 'hidden';
                    parts.root.style.opacity = '0';
                }
                restorePageContent();
                transitionState = 'idle';
                lockTransitionScroll(false);
                return;
            }

            if (!parts) {
                transitionState = 'idle';
                lockTransitionScroll(false);
                return;
            }

            // Защита для редкого случая, когда navigated пришёл без navigate.
            if (transitionState === 'idle') {
                forceTransitionCovered();
            }

            transitionState = 'revealing';
            if (coverTimeline) coverTimeline.kill();
            if (revealTimeline) revealTimeline.kill();

            if (content) {
                gsap.set(content, { y: 20, autoAlpha: 0 });
            }

            revealTimeline = gsap.timeline({
                defaults: { overwrite: 'auto' },
                onComplete: function() {
                    transitionState = 'idle';
                    resetTransitionScene(parts);
                    lockTransitionScroll(false);

                    if (typeof ScrollTrigger !== 'undefined') {
                        ScrollTrigger.refresh();
                    }
                }
            });

            revealTimeline
                .to(parts.panda, {
                    scale: 1.04,
                    y: -4,
                    autoAlpha: 0,
                    duration: .16,
                    ease: 'power2.out'
                }, 0);

            if (content) {
                revealTimeline.to(content, {
                    y: 0,
                    autoAlpha: 1,
                    duration: .3,
                    ease: 'power3.out'
                }, .06);
            }

            revealTimeline
                .to(parts.root, {
                    autoAlpha: 0,
                    duration: .01
                }, .17);
        }

        // Один путь для wire:navigate, Livewire.navigate() и Back/Forward.
        // Событие не блокируем: запрос начинается сразу, без искусственной заставки.
        document.addEventListener('livewire:navigate', function(event) {
            livewireNavigationStarted = true;
            transitionTargetUrl = event.detail && event.detail.url
                ? event.detail.url.toString()
                : null;

            if (transitionState === 'idle') {
                coverPage();
            }

            if (transitionFallbackTimer) clearTimeout(transitionFallbackTimer);
            transitionFallbackTimer = window.setTimeout(function() {
                const parts = getTransitionParts();
                if (parts) resetTransitionScene(parts);
                transitionState = 'idle';
                livewireNavigationStarted = false;
                lockTransitionScroll(false);

                // Если Livewire действительно завис, обычная загрузка сохраняет доступ к странице.
                if (transitionTargetUrl && window.location.href !== transitionTargetUrl) {
                    window.location.assign(transitionTargetUrl);
                }
            }, 8000);
        });

        document.addEventListener('livewire:navigating', function() {
            if (transitionState === 'idle' && livewireNavigationStarted) {
                forceTransitionCovered();
            }
        });

        document.addEventListener('livewire:navigated', function() {
            initAll();

            // Livewire вызывает livewire:navigated и на первой загрузке.
            // В этот момент работает отдельный фирменный прелоадер, поэтому второй
            // переход поверх него не запускаем.
            if (!livewireNavigationStarted) {
                const initialParts = getTransitionParts();
                if (initialParts) resetTransitionScene(initialParts);
                return;
            }

            livewireNavigationStarted = false;
            if (transitionRevealTimer) clearTimeout(transitionRevealTimer);
            const pandaVisibleFor = Date.now() - transitionPandaShownAt;
            const revealDelay = Math.max(0, 320 - pandaVisibleFor);
            transitionRevealTimer = window.setTimeout(function() {
                transitionRevealTimer = null;
                revealPage();
            }, revealDelay);
        });

        // Первая загрузка страницы
        document.addEventListener('DOMContentLoaded', function() {
            const transitionRoot = document.getElementById('pbPageTransition');
            if (transitionRoot) ensureTransitionPanda(transitionRoot);
            initAll();
        });

        /* ──────────────── ЗАЩИТА ОТ BFCACHE (кнопка «Назад» браузера) ────────────────
           Браузер может восстановить страницу из back/forward cache как
           замороженный снимок — со всеми недоигранными GSAP-анимациями и
           «залипшими» затемнениями (мегаменю, модалки), вместо честной
           перезагрузки через Livewire. requestAnimationFrame и GSAP-тикер
           на паузе всё это время, поэтому анимация застревает ровно в том
           кадре, что была на момент ухода со страницы.

           pageshow с event.persisted === true срабатывает именно в этом
           случае — принудительно сбрасываем весь кастомный UI в чистое
           состояние, не полагаясь на приватные переменные других скриптов. */
        if (!window.__pbBfcacheGuard) {
            window.__pbBfcacheGuard = true;

            function pbForceResetOverlays() {
                // Контент страницы — сброс любых недоигравших твинов на нём
                var currentPageContent = getPageContent();
                if (currentPageContent) {
                    gsap.killTweensOf(currentPageContent);
                    gsap.set(currentPageContent, { clearProps: 'all' });
                }

                // Постоянный transition-overlay
                var transitionParts = getTransitionParts();
                if (transitionParts) resetTransitionScene(transitionParts);
                transitionState = 'idle';
                livewireNavigationStarted = false;
                if (transitionFallbackTimer) {
                    clearTimeout(transitionFallbackTimer);
                    transitionFallbackTimer = null;
                }

                // Мегаменю каталога
                var mega = document.getElementById('megaMenu');
                var megaBackdrop = document.getElementById('megaBackdrop');
                if (mega) {
                    gsap.killTweensOf(mega);
                    gsap.killTweensOf(mega.querySelectorAll('.megamenu-quick-link, .megamenu-cat, .megamenu-subcol'));
                    mega.classList.remove('open');
                }
                if (megaBackdrop) megaBackdrop.classList.remove('active');

                // Плавающая sticky-навигация
                var sticky = document.getElementById('stickyNav');
                if (sticky) {
                    gsap.killTweensOf(sticky);
                    gsap.set(sticky, { top: -120, opacity: 0 });
                    sticky.classList.remove('sn-visible');
                }

                // Модальные окна (Перезвоните мне / Купить в 1 клик)
                var modalOverlay = document.getElementById('pbModalOverlay');
                if (modalOverlay) modalOverlay.classList.remove('active');
                document.querySelectorAll('.pb-modal.active').forEach(function(m) {
                    gsap.killTweensOf(m);
                    m.classList.remove('active');
                });

                // Прелоадер — на всякий случай, если завис на старте
                var pre = document.getElementById('pbPreloader');
                if (pre && pre.getAttribute('data-play') === '1') {
                    gsap.killTweensOf(pre.querySelectorAll('*'));
                    pre.style.display = 'none';
                }

                // Возвращаем скролл, если был заблокирован
                lockTransitionScroll(false);
            }

            window.addEventListener('pageshow', function(e) {
                if (e.persisted) {
                    pbForceResetOverlays();
                    initAll();
                }
            });
        }

        /* Livewire keeps a DOM snapshot for Back/Forward. If the snapshot was
           taken during a GSAP entrance, some nodes can return with opacity:0. */
        if (!window.__pbHistoryVisibilityGuard) {
            window.__pbHistoryVisibilityGuard = true;
            var pbHistoryRestorePending = false;

            function pbRestoreNavigatedVisibility() {
                var content = getPageContent();
                if (!content) return;
                if (typeof gsap !== 'undefined') {
                    gsap.killTweensOf(content);
                    gsap.set(content, { clearProps: 'opacity,visibility,transform' });
                } else {
                    content.style.removeProperty('opacity');
                    content.style.removeProperty('visibility');
                    content.style.removeProperty('transform');
                }

                content.querySelectorAll('[data-pb-animated="1"]').forEach(function(root) {
                    var stale = Array.from(root.querySelectorAll('[style*="opacity: 0"],[style*="visibility: hidden"]')).filter(function(node) {
                        return !node.matches('[hidden],[aria-hidden="true"],.submenu,.slick-slide,.home__trend-wrap,.pb-results-skeleton');
                    });
                    if (!stale.length) return;
                    if (typeof gsap !== 'undefined') {
                        gsap.killTweensOf(stale);
                        gsap.set(stale, { clearProps: 'opacity,visibility,transform,filter' });
                    } else {
                        stale.forEach(function(node) {
                            node.style.removeProperty('opacity');
                            node.style.removeProperty('visibility');
                            node.style.removeProperty('transform');
                            node.style.removeProperty('filter');
                        });
                    }
                });
            }

            window.addEventListener('popstate', function() {
                pbHistoryRestorePending = true;
                window.setTimeout(pbRestoreNavigatedVisibility, 1500);
            });
            document.addEventListener('livewire:navigated', function() {
                if (!pbHistoryRestorePending) return;
                pbHistoryRestorePending = false;
                window.setTimeout(pbRestoreNavigatedVisibility, 1100);
            });
            window.addEventListener('pageshow', function(event) {
                if (event.persisted) window.setTimeout(pbRestoreNavigatedVisibility, 50);
            });
        }

    })();
    </script>
    {{-- Неблокирующие уведомления корзины и избранного: SweetAlert2 toast-режим. --}}
    <style id="pb-toast-styles">
        .pb-swal-toast{border:1px solid #32dc9b!important;background:linear-gradient(125deg,#102219,#07100b)!important;box-shadow:0 18px 45px rgba(0,20,11,.28)!important}
        .pb-swal-toast .swal2-title{color:#fff!important;font-size:15px!important;text-align:left!important}
        .pb-swal-toast .swal2-html-container{color:#9fb0a7!important;font-size:12px!important;text-align:left!important;margin:2px 0 0!important}
        .pb-swal-toast .swal2-timer-progress-bar{background:#32dc9b!important}
        .pb-swal-toast.swal2-icon-error .swal2-timer-progress-bar{background:#ff6b76!important}
        .pb-swal-toast.swal2-icon-error{border-color:#ff6b76!important}
        .pb-swal-toast.swal2-icon-info .swal2-timer-progress-bar{background:#2fc8d8!important}
        .pb-swal-toast.swal2-icon-info{border-color:#2fc8d8!important}
    </style>
    <script data-navigate-once data-pb-toast-runtime>
    (function(){
        if(window.__pbToastEventsBound)return;window.__pbToastEventsBound=true;

        /* ──────────────── pbToast (SweetAlert2) ──────────────── */
        window.pbToast=function(options){
            options=options||{};
            if(typeof Swal==='undefined')return;
            var icon='success';
            if(options.type==='error')icon='error';
            else if(options.type==='remove')icon='info';
            Swal.fire({
                toast:true,
                position:'top-end',
                showConfirmButton:false,
                timer:Number(options.duration)||2800,
                timerProgressBar:true,
                icon:icon,
                title:options.title||'Готово',
                text:options.message||'',
                customClass:{popup:'pb-swal-toast'}
            });
        };

        /* ──────────────── Извлечение данных ────────────────
           browser CustomEvent → event.detail = {key: val}
           Livewire.on()      → первый аргумент = {key: val} или [{key: val}] */
        function fromBrowser(event){
            var d=event&&event.detail;
            if(Array.isArray(d)&&d.length)d=d[0];
            return d&&typeof d==='object'?d:{};
        }
        function fromLivewire(){
            var d=arguments.length===1?arguments[0]:(arguments.length>1?arguments[0]:{});
            if(Array.isArray(d)&&d.length)d=d[0];
            return d&&typeof d==='object'?d:{};
        }

        /* ──────────────── Определения тостов ────────────────
           Каждый пункт → одна функция-обработчик, зарегистрированная
           и на window (для fetch-кнопок карточек) и на Livewire.on()
           (для $this->dispatch() из компонентов). */
        var handlers={
            'cart-updated':       function(d){pbToast({icon:'cart',  eyebrow:'PBX / КОРЗИНА',  title:'Добавлено в корзину',       message:d.prodName})},
            'cart-quantity-updated':function(d){var q=Number(d.quantity)||1;pbToast({icon:'cart',eyebrow:'PBX / КОРЗИНА',title:'Количество обновлено',message:(d.prodName?d.prodName+' · ':'')+q+' шт.'})},
            'cart-removed':       function(d){pbToast({type:'remove',icon:'remove',eyebrow:'PBX / КОРЗИНА',  title:'Удалено из корзины',    message:d.prodName})},
            'cart-cleared':       function( ){pbToast({type:'remove',icon:'remove',eyebrow:'PBX / КОРЗИНА',  title:'Корзина очищена'})},
            'wish-added':         function(d){pbToast({icon:'heart', eyebrow:'PBX / ИЗБРАННОЕ',title:'Добавлено в избранное',     message:d.prodName})},
            'wish-deleted':       function(d){pbToast({type:'remove',icon:'remove',eyebrow:'PBX / ИЗБРАННОЕ',title:'Удалено из избранного',  message:d.prodName})},
            'wish-moved-to-cart': function(d){pbToast({icon:'cart',  eyebrow:'PBX / ИЗБРАННОЕ',title:'Перенесено в корзину',      message:d.prodName})},
            'cart-error':         function(d){var q=Number(d.prodQty)||0;pbToast({type:'error',icon:'error',eyebrow:'PBX / НАЛИЧИЕ',title:q>0?'Достигнут остаток товара':'Нет в наличии',message:q>0?'На складе всего '+q+' шт.':'Этот товар сейчас нельзя добавить'})},
            'cart-error-message': function(d){pbToast({type:'error',icon:'error',eyebrow:'PBX / ОШИБКА',title:'Не удалось выполнить действие',message:d.message||'Попробуйте ещё раз'})}
        };

        /* 1. Browser CustomEvents (карточки товаров → fetch → window.dispatchEvent) */
        Object.keys(handlers).forEach(function(name){
            addEventListener(name,function(event){handlers[name](fromBrowser(event))});
        });

        /* 2. Livewire events ($this->dispatch() из PHP-компонентов)
              Livewire.on() — единственный надёжный способ ловить эти события в Lw3.

              Проблема: Livewire-скрипты (директива livewireScripts) обычно
              грузятся с defer, а этот инлайн-скрипт — обычный, синхронный.
              Парсер доходит до него РАНЬШЕ, чем выполняется отложенный
              скрипт Livewire, поэтому
              единственная попытка "привязаться один раз" на livewire:init
              может физически не успеть — событие либо ещё не наступило
              (тогда сработает), либо уже произошло (тогда навсегда
              пропущено). Решение — пробовать привязаться на КАЖДОЙ
              разумной точке жизненного цикла, с защитой от повторной
              привязки одних и тех же обработчиков. */
        var pbLivewireBound=false;
        function bindLivewireToast(){
            if(pbLivewireBound)return;
            if(typeof Livewire==='undefined'||!Livewire.on)return;
            pbLivewireBound=true;
            Object.keys(handlers).forEach(function(name){
                Livewire.on(name,function(){handlers[name](fromLivewire.apply(null,arguments))});
            });
        }
        bindLivewireToast();
        document.addEventListener('livewire:init',bindLivewireToast);
        // livewire:navigated стреляет и на первой загрузке, и на каждом
        // последующем wire:navigate — надёжная повторная точка проверки.
        document.addEventListener('livewire:navigated',bindLivewireToast);
        document.addEventListener('DOMContentLoaded',bindLivewireToast);
    })();
    </script>

    {{-- Старые всплывашки Fancybox удалены — обратный звонок и «купить в 1 клик»
         теперь обрабатывает партиал partials/modals.blade.php. --}}
    @include('partials.floating-contacts-scroll')
    @include('partials.floating-catalog-filters')
    @stack('scripts')

    {{-- Модальные формы (Перезвоните мне + Купить в 1 клик) --}}
    @include('partials.modals')

    {{-- Кастомный курсор-прицел --}}
    @include('partials.cursor')

    {{-- Единый тактический дизайн карточек товаров --}}
    @include('partials.tactical-product-cards')

    @persist('pandbox-cookie-consent')
        @include('partials.cookie-consent')
    @endpersist

    {{-- Фирменная геометрия Pandbox: только острые углы --}}
    <style id="pb-sharp-corners">
        body * { border-radius: 0 !important; }
        input[type="search"]::-webkit-search-cancel-button,
        input[type="search"]::-webkit-search-decoration { display: none !important; -webkit-appearance: none !important; }
    </style>
</body>
</html>
