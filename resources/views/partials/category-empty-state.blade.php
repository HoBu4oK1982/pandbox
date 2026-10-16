<div class="pb-category-empty" role="status">
    <div class="pb-category-empty__icon" aria-hidden="true">
        <svg viewBox="0 0 160 160" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M31 57 80 31l49 26-49 27-49-27Z" stroke="currentColor" stroke-width="4"/>
            <path d="M31 57v47l49 27 49-27V57M80 84v47" stroke="currentColor" stroke-width="4"/>
            <path d="m55 44 50 27M105 44 55 71" stroke="currentColor" stroke-width="3" opacity=".42"/>
            <circle cx="120" cy="113" r="20" fill="#0b1711" stroke="#20cf8b" stroke-width="4"/>
            <path d="m134 127 13 13M111 113h18M120 104v18" stroke="#20cf8b" stroke-width="4" stroke-linecap="square"/>
        </svg>
    </div>
    <p class="pb-category-empty__code">PBX / КАТАЛОГ</p>
    <h2>Пока нет товаров</h2>
    <p>В этой категории ассортимент ещё не добавлен.</p>
    <a wire:navigate href="{{ route('shop') }}">Вернуться в каталог</a>
</div>

<style>
    .pb-category-empty{width:100%;min-height:430px;display:flex;flex-direction:column;align-items:center;justify-content:center;box-sizing:border-box;margin:8px 0 52px;padding:56px 24px;text-align:center;border:1px solid rgba(17,116,77,.22);background:linear-gradient(145deg,rgba(255,255,255,.96),rgba(238,247,242,.94));position:relative;overflow:hidden}
    .pb-category-empty:before{content:'';position:absolute;inset:0;opacity:.3;background-image:linear-gradient(rgba(19,133,88,.12) 1px,transparent 1px),linear-gradient(90deg,rgba(19,133,88,.12) 1px,transparent 1px);background-size:28px 28px;pointer-events:none}
    .pb-category-empty>*{position:relative;z-index:1}
    .pb-category-empty__icon{width:132px;height:132px;display:grid;place-items:center;margin-bottom:20px;color:#102019}
    .pb-category-empty__icon svg{width:100%;height:100%}
    .pb-category-empty__code{margin:0 0 9px!important;color:#159766!important;font-size:11px!important;font-weight:800!important;letter-spacing:.18em!important}
    .pb-category-empty h2{margin:0 0 10px;color:#111a15;font-size:34px;line-height:1.1}
    .pb-category-empty>p:last-of-type{margin:0 0 26px;color:#708078;font-size:16px}
    .pb-category-empty a{min-height:48px;display:inline-flex;align-items:center;justify-content:center;padding:0 28px;border:1px solid #159766;color:#fff;background:#159766;text-decoration:none;font-weight:700;transition:background .2s,color .2s}
    .pb-category-empty a:hover{color:#159766;background:#fff}
    @media(max-width:700px){.pb-category-empty{min-height:350px;padding:40px 18px}.pb-category-empty__icon{width:106px;height:106px}.pb-category-empty h2{font-size:27px}}
</style>
