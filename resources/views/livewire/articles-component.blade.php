@section('title', 'Новости страйкбола в Казахстане')

@php
    $featuredArticle = $articles->first();
    $otherArticles = $articles->slice(1);
@endphp

<div class="pb-news-page" data-pb-news>
    <section class="pb-news-hero">
        <div class="container pb-news-hero-inner">
            <nav class="pb-news-breadcrumbs" aria-label="Хлебные крошки">
                <a wire:navigate href="{{ route('home') }}">Главная</a>
                <span>→</span>
                <b>Новости</b>
            </nav>

            <div class="pb-news-hero-grid">
                <div class="pb-news-heading">
                    <span class="pb-news-kicker">PBX / AIRSOFT JOURNAL</span>
                    <h1>Новости <em>страйкбола</em></h1>
                    <p>События, обзоры снаряжения, полезные материалы и всё важное из мира страйкбола в Казахстане.</p>
                    <a href="#pb-news-feed" class="pb-news-hero-link">
                        Читать публикации
                        <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M5 12h14M14 7l5 5-5 5"/></svg>
                    </a>
                </div>

                <div class="pb-news-radar" aria-hidden="true">
                    <span class="pb-news-radar-grid"></span>
                    <span class="pb-news-radar-ring pb-news-radar-ring-a"></span>
                    <span class="pb-news-radar-ring pb-news-radar-ring-b"></span>
                    <i class="pb-news-radar-sweep"></i>
                    <i class="pb-news-radar-point pb-news-radar-point-a"></i>
                    <i class="pb-news-radar-point pb-news-radar-point-b"></i>
                    <strong>{{ str_pad((string) $articles->count(), 2, '0', STR_PAD_LEFT) }}</strong>
                    <small>ПУБЛИКАЦИЙ</small>
                </div>
            </div>

            <div class="pb-news-facts">
                <span><b>01</b><small>События Казахстана</small></span>
                <span><b>PBX</b><small>Практика и снаряжение</small></span>
                <span><b>24/7</b><small>Лента для игроков</small></span>
            </div>
        </div>
    </section>

    <main class="container pb-news-content" id="pb-news-feed">
        <div class="pb-news-section-head">
            <div>
                <span>01 / СВЕЖИЕ МАТЕРИАЛЫ</span>
                <h2>Журнал Pandbox</h2>
            </div>
            <p>Следим за индустрией и собираем материалы, которые помогают лучше ориентироваться в игре и экипировке.</p>
        </div>

        @if ($featuredArticle)
            <a wire:navigate href="{{ route('article', ['article_slug' => $featuredArticle->slug]) }}" class="pb-news-featured" data-pb-news-card>
                <div class="pb-news-featured-media">
                    <img src="{{ asset('assets/images/articles/' . $featuredArticle->image) }}" alt="{{ $featuredArticle->title }}">
                    <span>Главный материал</span>
                </div>
                <div class="pb-news-featured-copy">
                    <span class="pb-news-meta">PBX / {{ optional($featuredArticle->created_at)->format('d.m.Y') }}</span>
                    <h2>{{ $featuredArticle->title }}</h2>
                    <p>{{ \Illuminate\Support\Str::limit(strip_tags($featuredArticle->short_description), 230) }}</p>
                    <b>Читать статью <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M5 12h14M14 7l5 5-5 5"/></svg></b>
                </div>
            </a>

            @if ($otherArticles->isNotEmpty())
                <div class="pb-news-grid">
                    @foreach ($otherArticles as $index => $article)
                        <a wire:navigate href="{{ route('article', ['article_slug' => $article->slug]) }}" class="pb-news-card" data-pb-news-card>
                            <div class="pb-news-card-media">
                                <img src="{{ asset('assets/images/articles/' . $article->image) }}" alt="{{ $article->title }}">
                                <span>{{ str_pad((string) ($index + 2), 2, '0', STR_PAD_LEFT) }}</span>
                            </div>
                            <div class="pb-news-card-copy">
                                <span class="pb-news-meta">СТРАЙКБОЛ / {{ optional($article->created_at)->format('d.m.Y') }}</span>
                                <h3>{{ $article->title }}</h3>
                                <p>{{ \Illuminate\Support\Str::limit(strip_tags($article->short_description), 125) }}</p>
                                <b>Подробнее <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M5 12h14M14 7l5 5-5 5"/></svg></b>
                            </div>
                        </a>
                    @endforeach
                </div>
            @endif
        @else
            <div class="pb-news-empty" data-pb-news-card>
                <div class="pb-news-empty-icon">
                    <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M5 3h14v18H5zM8 7h8M8 11h8M8 15h5"/></svg>
                </div>
                <span>PBX / NEWSROOM</span>
                <h2>Материалы готовятся</h2>
                <p>Новые публикации скоро появятся в журнале Pandbox.</p>
                <a wire:navigate href="{{ route('shop') }}">Перейти в магазин <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M5 12h14M14 7l5 5-5 5"/></svg></a>
            </div>
        @endif

        <section class="pb-news-cta">
            <div>
                <span>PBX / НУЖНА КОНСУЛЬТАЦИЯ?</span>
                <h2>Поможем подобрать снаряжение</h2>
                <p>Расскажите, что ищете — подберём совместимый комплект под ваши задачи.</p>
            </div>
            <button type="button" data-pb-callback>Перезвоните мне</button>
        </section>
    </main>

    <style>
        .pb-news-page{--pn-green:#20c883;--pn-mint:#39e0a0;--pn-ink:#09110d;overflow:hidden;color:#17211c;background-color:#f4f7f5;background-image:radial-gradient(circle,rgba(17,96,61,.11) .7px,transparent .9px);background-size:24px 24px}.pb-news-page *{box-sizing:border-box}.pb-news-page svg{fill:none;stroke:currentColor;stroke-width:1.7;stroke-linecap:round;stroke-linejoin:round}.pb-news-hero{position:relative;overflow:hidden;color:#fff;background:radial-gradient(circle at 70% 28%,rgba(31,193,126,.18),transparent 32%),linear-gradient(115deg,#07100b,#10251a)}.pb-news-hero:before{content:'';position:absolute;inset:0;opacity:.15;background-image:linear-gradient(rgba(57,224,160,.13) 1px,transparent 1px),linear-gradient(90deg,rgba(57,224,160,.13) 1px,transparent 1px);background-size:38px 38px;mask-image:linear-gradient(90deg,#000,transparent 92%)}.pb-news-hero:after{content:'PANDBOX NEWS';position:absolute;right:-28px;bottom:-18px;color:rgba(57,224,160,.035);font:400 clamp(60px,9vw,145px)/.8 'MagistralBold',Arial;letter-spacing:-.07em;white-space:nowrap}.pb-news-hero-inner{position:relative;z-index:2;padding-top:18px!important}.pb-news-breadcrumbs{display:flex;align-items:center;gap:10px;color:#748b7f;font-size:10px}.pb-news-breadcrumbs a{color:var(--pn-mint);text-decoration:none}.pb-news-breadcrumbs b{color:#a9bbb1;font-weight:500}.pb-news-hero-grid{min-height:292px;display:grid;grid-template-columns:minmax(0,1fr) 300px;align-items:center;gap:42px;padding:25px 0}.pb-news-kicker{display:block;margin-bottom:11px;color:var(--pn-mint);font:700 9px Arial;letter-spacing:.22em}.pb-news-heading h1{margin:0;color:#fff;font-size:clamp(38px,4.5vw,62px);font-weight:500;line-height:.94;letter-spacing:-.045em}.pb-news-heading h1 em{color:var(--pn-mint);font-style:normal}.pb-news-heading p{max-width:650px;margin:15px 0 0;color:#aebdb5;font-size:13px;line-height:1.55}.pb-news-hero-link{min-height:46px;display:inline-flex;align-items:center;justify-content:center;gap:10px;margin-top:20px;padding:10px 16px;border:1px solid var(--pn-green);color:#fff;background:linear-gradient(90deg,#0c8d5c,#18b879);font-size:12px;font-weight:700;text-decoration:none;transition:.25s}.pb-news-hero-link svg{width:19px;height:19px;transition:transform .25s}.pb-news-hero-link:hover{color:#07110c;background:var(--pn-mint);transform:translateY(-3px)}.pb-news-hero-link:hover svg{transform:translateX(4px)}.pb-news-radar{position:relative;width:240px;height:240px;justify-self:end;overflow:hidden;border:1px solid rgba(57,224,160,.18);background:rgba(2,12,7,.3)}.pb-news-radar-grid{position:absolute;inset:0;opacity:.22;background-image:linear-gradient(rgba(57,224,160,.2) 1px,transparent 1px),linear-gradient(90deg,rgba(57,224,160,.2) 1px,transparent 1px);background-size:40px 40px}.pb-news-radar-ring{position:absolute;border:1px solid rgba(57,224,160,.22);border-radius:50%}.pb-news-radar-ring-a{inset:28px}.pb-news-radar-ring-b{inset:68px}.pb-news-radar:before,.pb-news-radar:after{content:'';position:absolute;background:rgba(57,224,160,.22)}.pb-news-radar:before{left:50%;top:0;bottom:0;width:1px}.pb-news-radar:after{top:50%;left:0;right:0;height:1px}.pb-news-radar-sweep{position:absolute;left:50%;top:50%;width:43%;height:1px;background:linear-gradient(90deg,var(--pn-mint),transparent);transform-origin:left center;animation:pbNewsSweep 5s linear infinite}.pb-news-radar-point{position:absolute;width:8px;height:8px;border:2px solid #07110c;background:var(--pn-mint);box-shadow:0 0 0 5px rgba(57,224,160,.12),0 0 16px var(--pn-mint)}.pb-news-radar-point-a{left:25%;top:30%}.pb-news-radar-point-b{right:21%;bottom:24%}.pb-news-radar strong{position:absolute;left:50%;top:44%;transform:translate(-50%,-50%);font-size:38px}.pb-news-radar small{position:absolute;left:50%;top:61%;transform:translateX(-50%);color:#789084;font:700 7px Arial;letter-spacing:.2em}@keyframes pbNewsSweep{to{transform:rotate(360deg)}}.pb-news-facts{display:grid;grid-template-columns:repeat(3,1fr);border-top:1px solid rgba(57,224,160,.2);border-left:1px solid rgba(57,224,160,.2)}.pb-news-facts>span{min-height:62px;display:flex;align-items:center;gap:14px;padding:12px 20px;border-right:1px solid rgba(57,224,160,.2);background:rgba(2,11,7,.38)}.pb-news-facts b{color:var(--pn-mint);font-size:20px}.pb-news-facts small{color:#91a59a;font-size:10px}.pb-news-content{padding-top:64px!important;padding-bottom:90px!important}.pb-news-section-head{display:flex;align-items:end;justify-content:space-between;gap:28px;margin-bottom:25px}.pb-news-section-head span,.pb-news-meta,.pb-news-cta span{display:block;color:#149764;font:700 9px Arial;letter-spacing:.2em}.pb-news-section-head span{margin-bottom:9px}.pb-news-section-head h2,.pb-news-cta h2{margin:0;color:#15211b;font-size:35px;line-height:1}.pb-news-section-head p{max-width:440px;margin:0;color:#78867f;font-size:12px;line-height:1.55}.pb-news-featured{display:grid;grid-template-columns:1.18fr .82fr;min-height:430px;overflow:hidden;border:1px solid #ccdbd3;color:inherit;background:#fff;box-shadow:0 18px 45px rgba(8,52,30,.08);text-decoration:none;transition:.3s}.pb-news-featured:hover{border-color:var(--pn-green);transform:translateY(-5px);box-shadow:0 26px 56px rgba(8,78,44,.14)}.pb-news-featured-media,.pb-news-card-media{position:relative;overflow:hidden;background:#0b1510}.pb-news-featured-media:after,.pb-news-card-media:after{content:'';position:absolute;inset:0;background:linear-gradient(180deg,transparent 58%,rgba(5,13,9,.55))}.pb-news-featured-media img,.pb-news-card-media img{width:100%;height:100%;display:block;object-fit:cover;transition:transform .65s ease}.pb-news-featured:hover img,.pb-news-card:hover img{transform:scale(1.055)}.pb-news-featured-media>span{position:absolute;z-index:2;left:0;top:0;padding:10px 15px;color:#07110c;background:var(--pn-mint);font:700 9px Arial;letter-spacing:.15em;text-transform:uppercase}.pb-news-featured-copy{display:flex;flex-direction:column;justify-content:center;padding:42px}.pb-news-featured-copy h2{margin:17px 0 16px;color:#17211c;font-size:31px;line-height:1.12}.pb-news-featured-copy p,.pb-news-card-copy p,.pb-news-empty p,.pb-news-cta p{margin:0;color:#78867f;font-size:12px;line-height:1.65}.pb-news-featured-copy>b,.pb-news-card-copy>b{display:flex;align-items:center;justify-content:space-between;margin-top:30px;padding-top:18px;border-top:1px solid #dbe6e0;color:#0d8e5d;font-size:12px}.pb-news-featured-copy b svg,.pb-news-card-copy b svg{width:20px;height:20px;transition:transform .25s}.pb-news-featured:hover b svg,.pb-news-card:hover b svg{transform:translateX(5px)}.pb-news-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:15px;margin-top:18px}.pb-news-card{min-width:0;overflow:hidden;border:1px solid #d2e0d9;color:inherit;background:#fff;box-shadow:0 14px 35px rgba(8,52,30,.06);text-decoration:none;transition:.28s}.pb-news-card:hover{border-color:var(--pn-green);transform:translateY(-5px);box-shadow:0 22px 46px rgba(8,78,44,.13)}.pb-news-card-media{height:235px}.pb-news-card-media>span{position:absolute;z-index:2;right:13px;bottom:8px;color:rgba(255,255,255,.75);font-size:39px;font-weight:700}.pb-news-card-copy{min-height:260px;display:flex;flex-direction:column;padding:25px 23px}.pb-news-card-copy h3{margin:13px 0 11px;color:#17211c;font-size:20px;line-height:1.18}.pb-news-card-copy>b{margin-top:auto}.pb-news-empty{padding:70px 30px;border:1px solid #cadbd2;background:rgba(255,255,255,.78);text-align:center}.pb-news-empty-icon{width:64px;height:64px;display:grid;place-items:center;margin:0 auto 20px;border:1px solid #aee0c7;color:#0d9a64;background:#eff9f4}.pb-news-empty-icon svg{width:30px;height:30px}.pb-news-empty>span{color:#149764;font:700 9px Arial;letter-spacing:.2em}.pb-news-empty h2{margin:12px 0 10px;font-size:30px}.pb-news-empty>a{display:inline-flex;align-items:center;gap:10px;margin-top:24px;color:#0c8e5c;font-size:12px;font-weight:700;text-decoration:none}.pb-news-empty>a svg{width:19px;height:19px}.pb-news-cta{display:flex;align-items:center;justify-content:space-between;gap:35px;margin-top:55px;padding:35px 38px;border:1px solid #bfd4c9;background:linear-gradient(110deg,#eff9f4,#fff)}.pb-news-cta h2{margin-top:8px}.pb-news-cta p{margin-top:10px}.pb-news-cta button{flex:0 0 auto;min-height:46px;padding:10px 19px;border:1px solid var(--pn-green);color:#fff;background:linear-gradient(90deg,#0c8d5c,#18b879);font-family:inherit;font-size:12px;font-weight:700;cursor:pointer;transition:.25s}.pb-news-cta button:hover{color:#07110c;background:var(--pn-mint);transform:translateY(-3px)}.pb-news-page button:focus-visible,.pb-news-page a:focus-visible{outline:2px solid var(--pn-mint);outline-offset:3px}@media(max-width:1050px){.pb-news-featured{grid-template-columns:1fr}.pb-news-featured-media{height:390px}.pb-news-grid{grid-template-columns:1fr 1fr}}@media(max-width:760px){.pb-news-hero-grid{min-height:0;grid-template-columns:1fr;padding:38px 0}.pb-news-radar{display:none}.pb-news-heading h1{font-size:46px}.pb-news-facts{grid-template-columns:1fr}.pb-news-facts>span{min-height:58px}.pb-news-section-head{align-items:flex-start;flex-direction:column}.pb-news-featured-media{height:290px}.pb-news-featured-copy{padding:28px 24px}.pb-news-featured-copy h2{font-size:25px}.pb-news-grid{grid-template-columns:1fr}.pb-news-card{display:grid;grid-template-columns:180px 1fr}.pb-news-card-media{height:auto;min-height:220px}.pb-news-card-copy{min-height:220px}.pb-news-cta{align-items:flex-start;flex-direction:column;padding:28px 23px}.pb-news-cta button{width:100%}.pb-news-content{padding-top:45px!important;padding-bottom:60px!important}}@media(max-width:520px){.pb-news-heading h1{font-size:40px}.pb-news-featured-media{height:240px}.pb-news-grid .pb-news-card{display:block}.pb-news-card-media{height:225px}.pb-news-card-copy{min-height:240px}.pb-news-section-head h2,.pb-news-cta h2{font-size:29px}}
    </style>

    @push('scripts')
        <script data-navigate-once>
            (function(){
                function initNewsPage(){
                    var root=document.querySelector('[data-pb-news]');
                    if(!root||root.dataset.pbNewsReady==='1'||typeof gsap==='undefined')return;
                    root.dataset.pbNewsReady='1';
                    gsap.fromTo(root.querySelectorAll('.pb-news-breadcrumbs,.pb-news-heading>*'),{y:23,opacity:0},{y:0,opacity:1,duration:.6,stagger:.07,ease:'power3.out',clearProps:'transform,opacity'});
                    gsap.fromTo(root.querySelector('.pb-news-radar'),{scale:.78,rotation:-10,opacity:0},{scale:1,rotation:0,opacity:1,duration:.82,ease:'back.out(1.35)',delay:.14,clearProps:'transform,opacity'});
                    gsap.fromTo(root.querySelectorAll('.pb-news-facts>span'),{y:17,opacity:0},{y:0,opacity:1,duration:.42,stagger:.08,ease:'power3.out',delay:.36,clearProps:'transform,opacity'});
                    gsap.fromTo(root.querySelectorAll('.pb-news-section-head>*'),{y:22,opacity:0},{y:0,opacity:1,duration:.5,stagger:.1,ease:'power3.out',delay:.1,clearProps:'transform,opacity'});
                    gsap.fromTo(root.querySelectorAll('[data-pb-news-card]'),{y:34,opacity:0},{y:0,opacity:1,duration:.58,stagger:.09,ease:'power3.out',delay:.18,clearProps:'transform,opacity'});
                    gsap.fromTo(root.querySelector('.pb-news-cta'),{y:28,opacity:0},{y:0,opacity:1,duration:.58,ease:'power3.out',delay:.3,clearProps:'transform,opacity'});
                }
                document.addEventListener('livewire:navigated',initNewsPage);
                if(document.readyState==='loading')document.addEventListener('DOMContentLoaded',initNewsPage,{once:true});else initNewsPage();
            })();
        </script>
    @endpush
</div>
