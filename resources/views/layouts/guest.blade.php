<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
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
    <meta property="og:url" content= "https://pandbox.kz" />
    @livewireStyles
    {{-- Styles --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    {{-- Legacy mobile stylesheet is disabled while the new mobile design is built. --}}
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/flexslider.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.5/jquery.fancybox.min.css" />
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" id="theme-styles">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">  
    <style>
        html, body, body > main {
            background-color: #f5f7f6;
            background-image: radial-gradient(circle, rgba(5, 67, 42, .08) 1px, transparent 1.25px);
            background-size: 22px 22px;
            background-position: 0 0;
        }
    </style>
</head>
<body>
    {{-- Прелоадер --}}
    <main>
        @livewire('header-component')
        {{ $slot }}
    </main>
    @livewire('footer-component')
    <div class="scrollTopBtn">
        <img src="{{asset('assets/images/design/arrow__top.png')}}" alt="">
    </div> 
    {{-- Scripts --}}
    @livewireScripts    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.5/jquery.fancybox.min.js"></script>    
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/studio-freight/lenis@latest/bundled/lenis.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.4/gsap.min.js"
        integrity="sha512-EZI2cBcGPnmR89wTgVnN3602Yyi7muWo8y1B3a8WmIv1J9tYG+udH4LvmYjLiGp37yHB7FfaPBo8ly178m9g4Q=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/ScrollTrigger.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
    <script type="text/javascript" src="{{asset('assets/js/mask.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/jquery.flexslider.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/jquery.magnific-popup.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/main.js')}}"></script>
    <script>
        const lenis = new Lenis()
        function raf(time) { lenis.raf(time); requestAnimationFrame(raf); }
        requestAnimationFrame(raf)
        gsap.registerPlugin(ScrollTrigger);

        gsap.set('.scrollTopBtn', { position:'fixed', bottom:'-100px', right:'60px', opacity:0 });
        const tl2 = gsap.timeline({ scrollTrigger:{ start:'top+=200', end:'+=.5', toggleActions:'play none none reverse', scrub:2 }});
        tl2.to('.scrollTopBtn', { bottom:'100px', opacity:1 });

        document.querySelector('.scrollTopBtn').addEventListener('click', () => {
            lenis.scrollTo('top', { duration:1, easing:(t) => Math.min(1, 1.001 - Math.pow(2, -10 * t)) });
        });

        let mm = gsap.matchMedia();
        mm.add("(min-width:0) and (max-width: 768px)", () => {
            gsap.set('.scrollTopBtn', { position:'fixed', bottom:'-100px', right:'20px', opacity:0 });
            tl2.to('.scrollTopBtn', { bottom:'150px', right:'20px', opacity:1 });
        });
    </script>
    <script type="text/javascript">
        $(window).load(function() { $('.flexslider').flexslider({ animation: "slide" }); });
    </script>
    <script type="text/javascript" language="javascript">
        function call() {
            var msg = $('#formx').serialize();
            $.ajax({ type:'POST', url:'assets/mail/mail.php', data:msg,
                success:function(data){ alert('Сообщение успешно отправлено!'); $('input[name=name].inputCall').val(''); $('input[name=phone].inputCall').val(''); Fancybox.close(); },
                error:function(xhr,str){ alert('Возникла ошибка: ' + xhr.responseCode); }
            });
        }
    </script>
    <div id="dialog-content" style="display:none;max-width:500px;">
        <form class="mailform" id="formx" action="javascript:void(null);" onsubmit="call()"> 
            <label class="form-text">Оставить заявку</label>
            <div class="form-text-anons">Оставьте заявку и наш специалист свяжется<br> с Вами в ближайшее время:</div>
            <fieldset class="loginFieldset frmEmailWrapCall"><i class="fa-solid fa-user" aria-hidden="true"></i><input type="text" name="name" required="" placeholder="Ваше имя:" class="inputCall"></fieldset>
            <fieldset class="loginFieldset frmEmailWrapCall"><i class="fa-solid fa-phone-volume" aria-hidden="true"></i><input type="text" name="phone" required="" placeholder="+7 (___) ___-__-__" class="inputCall art-stranger"></fieldset>
            <div class="formBtn"><button class="btn-form light" type="submit">Оставить заявку</button></div>
        </form>
    </div>
    <script type="text/javascript" language="javascript">
        function oneClick() {
            var msg = $('#oneClick').serialize();
            $.ajax({ type:'POST', url:'/assets/mail/one__click.php', data:msg,
                success:function(data){ alert('Сообщение успешно отправлено!'); $('input[name=product].vvod').val(''); $('input[name=name].inputCall').val(''); $('input[name=phone].inputCall').val(''); Fancybox.close(); },
                error:function(xhr,str){ alert('Возникла ошибка: ' + xhr.responseCode); }
            });
        }
    </script>
    <div id="whatsAppFixed">
        <a href="https://wa.me/77773880866" target="_blank" aria-label="WhatsApp">@include('partials.icons.whatsapp')</a>
    </div>
    <script type="text/javascript">
        $(document).ready(function() { $('a[href^="#pagination"]').click(function(){ var d=$($(this).attr("href")).offset().top; $('html,body').animate({scrollTop:d},1100); return false; }); });
    </script>    
    <script>$(document).on('click','.page-link-scroll-to-top',function(e){$("html, body").animate({scrollTop:300},"slow");return false;});</script>
    <script>
        $('.art-stranger').mask('+7 (999) 999-99-99');
        $.fn.setCursorPosition = function(pos) {
            if ($(this).get(0).setSelectionRange) { $(this).get(0).setSelectionRange(pos, pos); }
            else if ($(this).get(0).createTextRange) { var range = $(this).get(0).createTextRange(); range.collapse(true); range.moveEnd('character', pos); range.moveStart('character', pos); range.select(); }
        };
        $('input[type="tel"]').click(function(){ $(this).setCursorPosition(4); });
    </script>
    @stack('scripts')
    @include('partials.modals')
    @include('partials.cursor')
</body>
</html>
