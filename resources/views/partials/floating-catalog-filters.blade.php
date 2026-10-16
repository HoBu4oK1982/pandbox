<div class="pb-floating-filter-ui" data-pb-floating-filters aria-hidden="true">
    <button type="button" class="pb-floating-filter-button" aria-expanded="false" aria-controls="pbCatalogFilterDrawer">
        <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M4 6h16M7 12h10M10 18h4"/><circle cx="7" cy="6" r="1.6"/><circle cx="16" cy="12" r="1.6"/><circle cx="12" cy="18" r="1.6"/></svg>
        <span>Фильтры</span>
        <i aria-hidden="true">PBX</i>
    </button>
    <button type="button" class="pb-floating-filter-backdrop" tabindex="-1" aria-label="Закрыть фильтры"></button>
</div>

<style>
    .pb-floating-filter-ui{position:fixed;z-index:99970;left:0;right:0;bottom:22px;display:flex;justify-content:center;pointer-events:none}
    .pb-floating-filter-button{position:relative;z-index:3;min-width:178px;height:52px;display:flex;align-items:center;justify-content:center;gap:11px;padding:0 20px;border:1px solid #2bdd99;color:#fff;background:linear-gradient(110deg,#0b1710,#123324);box-shadow:0 14px 38px rgba(2,34,18,.28);font-family:inherit;font-size:13px;font-weight:700;letter-spacing:.02em;cursor:pointer;opacity:0;visibility:hidden;transform:translateY(24px);transition:opacity .28s,visibility .28s,transform .28s,color .2s,background .2s}
    .pb-floating-filter-ui.is-visible{pointer-events:auto}.pb-floating-filter-ui.is-visible .pb-floating-filter-button{opacity:1;visibility:visible;transform:translateY(0)}
    .pb-floating-filter-button:before,.pb-floating-filter-button:after{content:'';position:absolute;width:9px;height:9px;pointer-events:none}.pb-floating-filter-button:before{left:-1px;top:-1px;border-left:2px solid #42efae;border-top:2px solid #42efae}.pb-floating-filter-button:after{right:-1px;bottom:-1px;border-right:2px solid #42efae;border-bottom:2px solid #42efae}.pb-floating-filter-button svg{width:21px;height:21px;fill:none;stroke:#42efae;stroke-width:1.6;stroke-linecap:round}.pb-floating-filter-button i{padding-left:10px;border-left:1px solid rgba(66,239,174,.24);color:#67927e;font:700 8px Arial;letter-spacing:.14em}.pb-floating-filter-button:hover,.pb-floating-filter-ui.is-open .pb-floating-filter-button{color:#07110c;background:#36dda0}.pb-floating-filter-button:hover svg,.pb-floating-filter-ui.is-open .pb-floating-filter-button svg{stroke:#07110c}.pb-floating-filter-ui.is-open .pb-floating-filter-button i{color:#176847;border-color:rgba(7,17,12,.22)}
    .pb-floating-filter-backdrop{position:fixed;z-index:1;inset:0;padding:0;border:0;background:rgba(3,12,8,.56);backdrop-filter:blur(5px);-webkit-backdrop-filter:blur(5px);opacity:0;visibility:hidden;pointer-events:none;transition:opacity .3s,visibility .3s}.pb-floating-filter-ui.is-open .pb-floating-filter-backdrop{opacity:1;visibility:visible;pointer-events:auto}
    .pb-filter-drawer-placeholder{min-width:0;visibility:hidden!important;pointer-events:none!important}
    .pb-filter-drawer-placeholder--sidebar{height:0!important;min-height:0!important;margin-top:0!important;margin-bottom:0!important;align-self:flex-start!important}
    .pb-filter-drawer-active{position:fixed!important;z-index:99972!important;left:50%!important;right:auto!important;top:auto!important;bottom:86px!important;width:min(560px,calc(100vw - 28px))!important;max-width:none!important;max-height:min(72vh,680px)!important;display:block!important;margin:0!important;padding:0!important;overflow:auto!important;border:1px solid rgba(49,224,157,.62)!important;color:#17211c!important;background:#fff!important;box-shadow:0 28px 80px rgba(0,22,11,.42)!important;transform:translate(-50%,calc(100% + 120px))!important;opacity:0!important;visibility:hidden!important;transition:transform .38s cubic-bezier(.22,.8,.24,1),opacity .25s,visibility .25s!important;scrollbar-width:thin;scrollbar-color:#19aa70 #edf5f1}
    .pb-filter-drawer-active.pb-filter-drawer-visible{transform:translate(-50%,0)!important;opacity:1!important;visibility:visible!important}
    .pb-remark-controls.pb-filter-drawer-active{grid-template-columns:1fr!important}.pb-remark-controls.pb-filter-drawer-active>*{grid-column:auto!important;border-right:0!important;border-bottom:1px solid #e2eae6!important}.pb-results-filter.pb-filter-drawer-active .pb-filter-category-group{display:block!important;max-height:none!important}
    .subcategory__filter_categories.pb-filter-drawer-active{min-height:245px!important;padding:0 28px 28px!important}.subcategory__filter_categories.pb-filter-drawer-active h4{margin:0 -28px 26px!important;padding:16px!important}.subcategory__filter_categories.pb-filter-drawer-active h5{margin:0 0 30px!important;font-size:14px!important}.subcategory__filter_categories.pb-filter-drawer-active .sliderPriceWrap{width:100%!important;padding:0 8px!important;box-sizing:border-box!important}.subcategory__filter_categories.pb-filter-drawer-active #sliderPrice{width:100%!important;margin:0!important}
    .pb-price-filter-apply{width:100%;min-height:42px;margin-top:72px;border:1px solid #18a86f;color:#fff;background:#159766;font-family:inherit;font-size:12px;font-weight:700;cursor:pointer}.pb-price-filter-apply:hover{background:#0c7d52}.pb-filter-drawer-active .pb-price-filter-apply{display:none!important}
    @media(max-width:760px){
        .pb-floating-filter-ui{bottom:72px}
        .pb-floating-filter-button{min-width:174px;height:46px;padding:0 16px;font-size:13px;box-shadow:0 10px 30px rgba(2,34,18,.34)}
        .pb-filter-drawer-active{bottom:128px!important;width:calc(100vw - 20px)!important;max-height:calc(100vh - 170px)!important}
        .category__content_wrap>.category__filter_categories:not(.pb-filter-drawer-active),
        .subcategory__content_wrap>.subcategory__filter_categories:not(.pb-filter-drawer-active),
        .pb-remark-page .pb-remark-controls:not(.pb-filter-drawer-active){display:none!important}
        .category__filter_categories.pb-filter-drawer-active,
        .subcategory__filter_categories.pb-filter-drawer-active{display:block!important;min-height:0!important;padding:0 18px 20px!important}
        .pb-remark-page .pb-remark-controls.pb-filter-drawer-active{display:block!important}
        .category__filter_categories.pb-filter-drawer-active h4,
        .subcategory__filter_categories.pb-filter-drawer-active h4{margin:0 -18px 16px!important;padding:15px 18px!important;font-size:18px!important}
        .category__filter_categories.pb-filter-drawer-active .menu,
        .subcategory__filter_categories.pb-filter-drawer-active .menu{margin:0!important;padding:0!important}
    }
    @media(prefers-reduced-motion:reduce){.pb-floating-filter-button,.pb-floating-filter-backdrop,.pb-filter-drawer-active{transition:none!important}}
</style>

<script data-navigate-once>
(function(){
    if(window.__pbFloatingFiltersReady)return;
    window.__pbFloatingFiltersReady=true;

    var ui=null;
    var button=null;
    var target=null;
    var placeholder=null;
    var open=false;
    var raf=0;
    var restoring=false;
    var morphRaf=0;
    var scrollRefreshTimer=0;
    var scrollAfterNextCommit=false;
    var scrollIntentTimer=0;
    var selectors=['.pb-results-filter','.pb-remark-controls','.category__filter_categories','.subcategory__filter_categories'];

    function findTarget(){
        for(var i=0;i<selectors.length;i++){
            var candidate=document.querySelector(selectors[i]);
            if(candidate)return candidate;
        }
        return null;
    }

    function clearClosedDrawerState(){
        if(open)return;
        document.querySelectorAll(selectors.join(',')).forEach(function(element){
            element.classList.remove('pb-filter-drawer-visible','pb-filter-drawer-active');
        });
        document.querySelectorAll('.pb-filter-drawer-placeholder').forEach(function(element){
            element.remove();
        });
        placeholder=null;
        target=findTarget();
    }

    function closeDrawer(){
        open=false;
        clearClosedDrawerState();
        if(ui)ui.classList.remove('is-open');
        if(button){button.setAttribute('aria-expanded','false');button.querySelector('span').textContent='Фильтры'}
        refreshPageScroll();
    }

    function preserveTargetSpace(element){
        if(placeholder&&placeholder.isConnected)return;
        if(placeholder)placeholder=null;
        var rect=element.getBoundingClientRect();
        var styles=window.getComputedStyle(element);
        placeholder=document.createElement('div');
        placeholder.className='pb-filter-drawer-placeholder';
        if(element.matches('.category__filter_categories,.subcategory__filter_categories')){
            placeholder.classList.add('pb-filter-drawer-placeholder--sidebar');
        }
        placeholder.setAttribute('aria-hidden','true');
        placeholder.style.width=rect.width+'px';
        placeholder.style.height=rect.height+'px';
        placeholder.style.flex='0 0 '+rect.width+'px';
        placeholder.style.marginTop=styles.marginTop;
        placeholder.style.marginRight=styles.marginRight;
        placeholder.style.marginBottom=styles.marginBottom;
        placeholder.style.marginLeft=styles.marginLeft;
        element.parentNode.insertBefore(placeholder,element);
    }

    function refreshPageScroll(){
        window.clearTimeout(scrollRefreshTimer);
        scrollRefreshTimer=window.setTimeout(function(){
            requestAnimationFrame(function(){
                if(typeof window.__pbRefreshScrollMeasurements==='function'){
                    window.__pbRefreshScrollMeasurements();
                }else{
                    window.dispatchEvent(new Event('resize'));
                }
            });
        },180);
    }

    function scrollToCatalogTop(){
        window.setTimeout(function(){
            refreshPageScroll();
            window.setTimeout(function(){
                var results=document.querySelector('.category__products_output_wrap,.subcategory__products_output_wrap,.pb-remark-container,.pb-results-layout');
                if(!results)return;
                var top=Math.max(0,results.getBoundingClientRect().top+window.scrollY-24);
                if(typeof window.__pbSmoothScrollTo==='function'){
                    window.__pbSmoothScrollTo(top);
                }else{
                    window.scrollTo({top:top,behavior:'smooth'});
                }
            },220);
        },40);
    }

    function containsCatalogResults(root){
        if(!root)return false;
        var selector='.category__products_output_wrap,.subcategory__products_output_wrap,.pb-remark-page,.pb-results-layout';
        return !!((root.matches&&root.matches(selector))||(root.querySelector&&root.querySelector(selector)));
    }

    function openDrawer(){
        target=findTarget();
        if(!target)return;
        open=true;
        preserveTargetSpace(target);
        target.classList.add('pb-filter-drawer-active');
        ui.classList.add('is-open','is-visible');
        button.setAttribute('aria-expanded','true');
        button.querySelector('span').textContent='Применить';
        requestAnimationFrame(function(){target&&target.classList.add('pb-filter-drawer-visible')});
    }

    function livewireComponentFor(element){
        var owner=element&&element.closest('[wire\\:id]');
        var id=owner&&owner.getAttribute('wire:id');
        return id&&window.Livewire&&typeof Livewire.find==='function'?Livewire.find(id):null;
    }

    function applyDrawer(){
        target=findTarget();
        if(!target){closeDrawer();return}
        var component=livewireComponentFor(target);
        var slider=target.querySelector('#sliderPrice');
        var request=null;
        if(component&&slider&&slider.dataset.pendingMin!==undefined){
            request=component.call('updatePriceRange',Number(slider.dataset.pendingMin),Number(slider.dataset.pendingMax));
            delete slider.dataset.pendingMin;
            delete slider.dataset.pendingMax;
        }else if(component&&typeof component.call==='function'&&(target.matches('.pb-results-filter,.pb-remark-controls'))){
            request=component.call('applyFilters');
        }
        closeDrawer();
        if(request&&typeof request.then==='function'){
            request.then(scrollToCatalogTop).catch(function(){});
        }else{
            scrollToCatalogTop();
        }
    }

    function restoreOpenDrawer(){
        if(!open||restoring)return;
        var current=findTarget();
        if(!current)return;
        restoring=true;
        target=current;
        preserveTargetSpace(target);
        target.classList.add('pb-filter-drawer-active','pb-filter-drawer-visible');
        if(ui)ui.classList.add('is-open','is-visible');
        if(button){
            button.setAttribute('aria-expanded','true');
            button.querySelector('span').textContent='Применить';
        }
        restoring=false;
    }

    function updateVisibility(){
        raf=0;
        ui=document.querySelector('[data-pb-floating-filters]');
        if(!ui)return;
        button=ui.querySelector('.pb-floating-filter-button');
        var current=findTarget();
        if(open&&current){
            target=current;
            restoreOpenDrawer();
        }else{
            clearClosedDrawerState();
            target=current;
        }
        var shouldShow=false;
        if(target){
            var rect=target.getBoundingClientRect();
            shouldShow=window.innerWidth<=760?true:(window.scrollY>220&&rect.top<80);
        }
        ui.classList.toggle('is-visible',shouldShow||open);
        ui.setAttribute('aria-hidden',(shouldShow||open)?'false':'true');
    }

    function queueVisibility(){
        if(raf)return;
        raf=requestAnimationFrame(updateVisibility);
    }

    function registerLivewireHook(){
        if(!window.Livewire||window.__pbFloatingFiltersHooked)return;
        window.__pbFloatingFiltersHooked=true;
        Livewire.hook('morph.updated',function(){
            if(morphRaf)return;
            morphRaf=requestAnimationFrame(function(){
                morphRaf=0;
                restoreOpenDrawer();
                updateVisibility();
            });
        });
        Livewire.hook('commit',function(payload){
            var component=payload&&payload.component;
            var succeed=payload&&payload.succeed;
            if(typeof succeed!=='function'||!component||!containsCatalogResults(component.el))return;
            var shouldScroll=scrollAfterNextCommit;
            succeed(function(){
                queueMicrotask(function(){
                    if(!open)clearClosedDrawerState();
                    refreshPageScroll();
                    if(shouldScroll){
                        scrollAfterNextCommit=false;
                        window.clearTimeout(scrollIntentTimer);
                        scrollToCatalogTop();
                    }
                });
            });
        });
    }

    document.addEventListener('click',function(event){
        var currentUi=event.target.closest&&event.target.closest('[data-pb-floating-filters]');
        if(!currentUi)return;
        if(event.target.closest('.pb-floating-filter-button')){event.preventDefault();open?applyDrawer():openDrawer();return}
        if(event.target.closest('.pb-floating-filter-backdrop')){event.preventDefault();closeDrawer()}
    });
    document.addEventListener('click',function(event){
        if(!event.target.closest||!event.target.closest('[data-pb-apply-filters],[data-pb-reset-filters]'))return;
        scrollAfterNextCommit=true;
        window.clearTimeout(scrollIntentTimer);
        scrollIntentTimer=window.setTimeout(function(){scrollAfterNextCommit=false},5000);
        if(open)window.setTimeout(closeDrawer,0);
    },true);
    document.addEventListener('keydown',function(event){if(event.key==='Escape'&&open)closeDrawer()});
    window.addEventListener('scroll',queueVisibility,{passive:true});
    window.addEventListener('resize',queueVisibility,{passive:true});
    document.addEventListener('livewire:navigating',closeDrawer);
    document.addEventListener('livewire:navigated',function(){closeDrawer();registerLivewireHook();requestAnimationFrame(updateVisibility)});
    document.addEventListener('livewire:init',registerLivewireHook,{once:true});
    document.addEventListener('DOMContentLoaded',updateVisibility,{once:true});
    registerLivewireHook();
    if(document.readyState!=='loading')updateVisibility();
})();
</script>
