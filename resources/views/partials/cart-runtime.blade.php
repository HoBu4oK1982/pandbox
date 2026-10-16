<script>
(function(){
    var moneyValues=window.__pbCartMoneyValues||(window.__pbCartMoneyValues=new Map());
    var moneyFrame=0;

    function formatMoney(value){
        return Math.round(value).toLocaleString('ru-RU').replace(/\u00a0/g,' ')+' ₸';
    }

    function syncMoney(animate){
        var activeKeys=new Set();
        document.querySelectorAll('[data-pb-cart] [data-pb-money]').forEach(function(node){
            var key=node.getAttribute('data-pb-money');
            activeKeys.add(key);
            var next=Number(node.getAttribute('data-pb-value'))||0;
            var previous=moneyValues.has(key)?moneyValues.get(key):next;
            moneyValues.set(key,next);

            if(node.__pbMoneyTween){node.__pbMoneyTween.kill();node.__pbMoneyTween=null;}
            if(!animate||previous===next||typeof gsap==='undefined'){
                node.textContent=formatMoney(next);
                return;
            }

            var counter={value:previous};
            node.__pbMoneyTween=gsap.to(counter,{
                value:next,duration:.58,ease:'power2.out',overwrite:true,
                onUpdate:function(){node.textContent=formatMoney(counter.value);},
                onComplete:function(){node.textContent=formatMoney(next);node.__pbMoneyTween=null;}
            });
        });
        moneyValues.forEach(function(value,key){if(!activeKeys.has(key))moneyValues.delete(key);});
    }

    function queueMoneySync(animate){
        if(moneyFrame)cancelAnimationFrame(moneyFrame);
        moneyFrame=requestAnimationFrame(function(){
            moneyFrame=requestAnimationFrame(function(){moneyFrame=0;syncMoney(animate);});
        });
    }

    /* ──────────────── Fetch-действия корзины ────────────────
       Раньше +/-/удалить/очистить шли через Livewire (wire:click или
       Livewire.find().call()). Это оказалось ненадёжно — события до
       тоста не долетали. Теперь всё через тот же проверенный fetch,
       что и на карточках товаров. */
    function csrf(){
        var token=document.querySelector('meta[name="csrf-token"]');
        return token?token.content:'';
    }

    function cartRequest(url){
        return fetch(url,{
            method:'POST',
            headers:{'Accept':'application/json','X-CSRF-TOKEN':csrf(),'X-Requested-With':'XMLHttpRequest'}
        }).then(function(response){
            return response.json().then(function(data){
                if(!response.ok)throw Object.assign(new Error(data.message||'Не удалось выполнить действие'),{payload:data});
                return data;
            });
        });
    }

    function updateSummary(data){
        var subtotal=document.querySelector('[data-pb-money="summary-subtotal"]');
        if(subtotal&&typeof data.cart_subtotal!=='undefined')subtotal.setAttribute('data-pb-value',data.cart_subtotal);
        var total=document.querySelector('[data-pb-money="summary-total"]');
        if(total&&typeof data.cart_total!=='undefined')total.setAttribute('data-pb-value',data.cart_total);
        var listCount=document.querySelector('[data-pb-cart-list-count]');
        if(listCount&&typeof data.cart_count!=='undefined')listCount.textContent=data.cart_count+' позиций';
        var summaryCount=document.querySelector('[data-pb-cart-summary-count]');
        if(summaryCount&&typeof data.cart_count!=='undefined')summaryCount.textContent=data.cart_count;
        if(typeof window.pbSyncActionCount==='function'&&typeof data.cart_count!=='undefined'){
            window.pbSyncActionCount('cart',data.cart_count);
        }
        queueMoneySync(true);
    }

    function removeItemWithMotion(rowId, onDone){
        var item=document.querySelector('[data-pb-cart-item][data-pb-cart-row="'+rowId+'"]');
        if(!item){if(onDone)onDone();return;}
        if(typeof gsap!=='undefined'&&!matchMedia('(prefers-reduced-motion: reduce)').matches){
            gsap.to(item,{x:-Math.max(280,item.offsetWidth*.55),autoAlpha:0,height:0,minHeight:0,marginBottom:-12,paddingTop:0,paddingBottom:0,duration:.46,ease:'power3.in',overwrite:true,onComplete:function(){item.remove();if(onDone)onDone();}});
        }else{
            item.remove();
            if(onDone)onDone();
        }
    }

    function showEmptyCartState(){
        var wrap=document.querySelector('[data-pb-cart]');
        var layout=wrap&&wrap.querySelector('.pb-cart-layout');
        var template=wrap&&wrap.querySelector('[data-pb-cart-empty-template]');

        if(!wrap||!template){
            // Подстраховка на случай отсутствия шаблона — не должна
            // срабатывать в норме, но лучше честная перезагрузка, чем
            // пустой экран без содержимого.
            window.location.reload();
            return;
        }

        function insertEmptyState(){
            var fragment=template.content.cloneNode(true);
            template.remove();
            wrap.appendChild(fragment);
            if(typeof window.pbInitEmptyStates==='function')window.pbInitEmptyStates();
        }

        if(layout&&typeof gsap!=='undefined'&&!matchMedia('(prefers-reduced-motion: reduce)').matches){
            gsap.to(layout,{autoAlpha:0,y:-12,duration:.32,ease:'power2.in',overwrite:true,onComplete:function(){
                layout.remove();
                insertEmptyState();
            }});
        }else{
            if(layout)layout.remove();
            insertEmptyState();
        }
    }

    function handleIncrease(button){
        if(button.dataset.pbBusy==='1')return;
        button.dataset.pbBusy='1';
        var rowId=button.getAttribute('data-pb-cart-increase');
        var url=@json(route('cart-actions.increase', ['rowId' => '__row__'])).replace('__row__',encodeURIComponent(rowId));
        cartRequest(url).then(function(data){
            var qtyInput=document.querySelector('[data-pb-cart-qty="'+rowId+'"]');
            if(qtyInput)qtyInput.value=data.qty;
            var subtotalNode=document.querySelector('[data-pb-money="item-'+rowId+'"]');
            if(subtotalNode)subtotalNode.setAttribute('data-pb-value',data.item_subtotal);
            updateSummary(data);
        }).catch(function(error){
            var payload=error.payload||{};
            window.dispatchEvent(new CustomEvent('cart-error',{detail:{prodQty:payload.prod_qty,prodQtyCart:payload.prod_qty_cart}}));
        }).finally(function(){
            button.dataset.pbBusy='0';
        });
    }

    function handleDecrease(button){
        if(button.dataset.pbBusy==='1')return;
        button.dataset.pbBusy='1';
        var rowId=button.getAttribute('data-pb-cart-decrease');
        var url=@json(route('cart-actions.decrease', ['rowId' => '__row__'])).replace('__row__',encodeURIComponent(rowId));
        cartRequest(url).then(function(data){
            if(data.removed){
                removeItemWithMotion(rowId,function(){
                    updateSummary(data);
                    if(data.cart_count<1)showEmptyCartState();
                });
                window.dispatchEvent(new CustomEvent('cart-removed',{detail:{prodName:data.name}}));
                return;
            }
            var qtyInput=document.querySelector('[data-pb-cart-qty="'+rowId+'"]');
            if(qtyInput)qtyInput.value=data.qty;
            var subtotalNode=document.querySelector('[data-pb-money="item-'+rowId+'"]');
            if(subtotalNode)subtotalNode.setAttribute('data-pb-value',data.item_subtotal);
            updateSummary(data);
        }).catch(function(error){
            window.dispatchEvent(new CustomEvent('cart-error-message',{detail:{message:error.message}}));
        }).finally(function(){
            button.dataset.pbBusy='0';
        });
    }

    function handleDestroy(button){
        if(button.dataset.pbBusy)return;
        button.dataset.pbBusy='1';
        var rowId=button.getAttribute('data-pb-cart-destroy');
        var url=@json(route('cart-actions.destroy', ['rowId' => '__row__'])).replace('__row__',encodeURIComponent(rowId));
        cartRequest(url).then(function(data){
            removeItemWithMotion(rowId,function(){
                updateSummary(data);
                if(data.cart_count<1)showEmptyCartState();
            });
            window.dispatchEvent(new CustomEvent('cart-removed',{detail:{prodName:data.name}}));
        }).catch(function(error){
            window.dispatchEvent(new CustomEvent('cart-error-message',{detail:{message:error.message}}));
            button.dataset.pbBusy='';
        });
    }

    function handleDestroyAll(button){
        if(button.dataset.pbBusy==='1')return;
        button.dataset.pbBusy='1';
        var url=@json(route('cart-actions.destroy-all'));
        cartRequest(url).then(function(data){
            if(data.had_items){
                window.dispatchEvent(new CustomEvent('cart-cleared'));
                showEmptyCartState();
            }
        }).catch(function(error){
            window.dispatchEvent(new CustomEvent('cart-error-message',{detail:{message:error.message}}));
        }).finally(function(){
            button.dataset.pbBusy='0';
        });
    }

    function handleCheckout(button){
        if(button.dataset.pbBusy==='1')return;
        button.dataset.pbBusy='1';
        button.classList.add('loading');
        var url=@json(route('cart-actions.checkout'));
        cartRequest(url).then(function(data){
            if(data.redirect){
                /* Livewire.navigate() даёт плавный SPA-переход без
                   полной перезагрузки страницы. Если Livewire недоступен,
                   делаем обычный переход. */
                if(window.Livewire&&typeof Livewire.navigate==='function'){
                    Livewire.navigate(data.redirect);
                }else{
                    window.location.href=data.redirect;
                }
            }
        }).catch(function(error){
            window.dispatchEvent(new CustomEvent('cart-error-message',{detail:{message:error.message}}));
            button.dataset.pbBusy='0';
            button.classList.remove('loading');
        });
    }

    function bindCartMorphHook(){
        if(window.__pbCartMorphHookBound||!window.Livewire||typeof Livewire.hook!=='function')return;
        window.__pbCartMorphHookBound=true;
        Livewire.hook('morph.updated',function(payload){
            var element=payload&&payload.el;
            if(!element||!(element.matches?.('[data-pb-cart]')||element.closest?.('[data-pb-cart]')||element.querySelector?.('[data-pb-cart]')))return;
            queueMoneySync(true);
        });
    }

    function animateCart(){
        var root=document.querySelector('[data-pb-cart]:not([data-pb-cart-ready])');
        queueMoneySync(true);
        if(!root||typeof gsap==='undefined')return;
        root.setAttribute('data-pb-cart-ready','1');
        var listHead=root.querySelector('.pb-cart-list-head');
        var items=root.querySelectorAll('[data-pb-cart-item]');
        var summary=root.querySelector('[data-pb-cart-summary]');
        if(listHead)gsap.from(listHead,{y:-18,autoAlpha:0,duration:.45,ease:'power3.out',clearProps:'transform,opacity,visibility'});
        if(items.length)gsap.from(items,{y:24,autoAlpha:0,duration:.45,stagger:Math.min(.045,.32/items.length),ease:'power3.out',delay:.08,clearProps:'transform,opacity,visibility'});
        if(summary)gsap.from(summary,{x:28,autoAlpha:0,duration:.55,ease:'power3.out',delay:.14,clearProps:'transform,opacity,visibility'});
    }

    if(!window.__pbCartPageBooted){
        window.__pbCartPageBooted=true;
        document.addEventListener('livewire:navigated',animateCart);
        document.addEventListener('livewire:init',bindCartMorphHook,{once:true});
        document.addEventListener('cart-values-updated',function(){queueMoneySync(true);});
        document.addEventListener('click',function(event){
            var increase=event.target.closest&&event.target.closest('[data-pb-cart-increase]');
            if(increase){event.preventDefault();handleIncrease(increase);return;}
            var decrease=event.target.closest&&event.target.closest('[data-pb-cart-decrease]');
            if(decrease){event.preventDefault();handleDecrease(decrease);return;}
            var destroy=event.target.closest&&event.target.closest('[data-pb-cart-destroy]');
            if(destroy){event.preventDefault();event.stopPropagation();handleDestroy(destroy);return;}
            var clear=event.target.closest&&event.target.closest('[data-pb-cart-clear]');
            if(clear){event.preventDefault();handleDestroyAll(clear);return;}
            var checkout=event.target.closest&&event.target.closest('[data-pb-cart-checkout]');
            if(checkout){event.preventDefault();handleCheckout(checkout);}
        },true);
    }

    bindCartMorphHook();
    syncMoney(false);
    animateCart();
})();
</script>
