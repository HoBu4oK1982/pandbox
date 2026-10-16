@if ($paginator->hasPages())
    <nav class="pb-pagination" role="navigation" aria-label="Навигация по страницам" data-pb-pagination>
        <span class="pb-pagination-code" aria-hidden="true">PBX / NAV</span>
        <span class="pb-pagination-corner pb-pagination-corner-left" aria-hidden="true"></span>

        <ul class="pagination pb-pagination-list">
            @if ($paginator->onFirstPage())
                <li class="pb-page-item is-disabled" aria-disabled="true">
                    <span class="pb-page-link pb-page-direction">
                        <svg viewBox="0 0 24 24" aria-hidden="true"><path d="m14 6-6 6 6 6"/></svg>
                        <span>Предыдущая</span>
                    </span>
                </li>
            @else
                <li class="pb-page-item page-link-scroll-to-top">
                    <button type="button" class="pb-page-link pb-page-direction" wire:click="previousPage" wire:loading.attr="disabled" rel="prev" aria-label="Предыдущая страница">
                        <svg viewBox="0 0 24 24" aria-hidden="true"><path d="m14 6-6 6 6 6"/></svg>
                        <span>Предыдущая</span>
                    </button>
                </li>
            @endif

            @foreach ($elements as $element)
                @if (is_string($element))
                    <li class="pb-page-item pb-page-gap" aria-disabled="true"><span class="pb-page-link">{{ $element }}</span></li>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="pb-page-item is-active" aria-current="page"><span class="pb-page-link">{{ $page }}</span></li>
                        @else
                            <li class="pb-page-item page-link-scroll-to-top"><button type="button" class="pb-page-link" wire:click="gotoPage({{ $page }})" wire:loading.attr="disabled" aria-label="Страница {{ $page }}">{{ $page }}</button></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            @if ($paginator->hasMorePages())
                <li class="pb-page-item page-link-scroll-to-top">
                    <button type="button" class="pb-page-link pb-page-direction" wire:click="nextPage" wire:loading.attr="disabled" rel="next" aria-label="Следующая страница">
                        <span>Следующая</span>
                        <svg viewBox="0 0 24 24" aria-hidden="true"><path d="m10 6 6 6-6 6"/></svg>
                    </button>
                </li>
            @else
                <li class="pb-page-item is-disabled" aria-disabled="true">
                    <span class="pb-page-link pb-page-direction">
                        <span>Следующая</span>
                        <svg viewBox="0 0 24 24" aria-hidden="true"><path d="m10 6 6 6-6 6"/></svg>
                    </span>
                </li>
            @endif
        </ul>

        <span class="pb-pagination-status" aria-label="Страница {{ $paginator->currentPage() }} из {{ $paginator->lastPage() }}">
            <b>{{ str_pad($paginator->currentPage(), 2, '0', STR_PAD_LEFT) }}</b>
            <i></i>
            <span>{{ str_pad($paginator->lastPage(), 2, '0', STR_PAD_LEFT) }}</span>
        </span>
        <span class="pb-pagination-corner pb-pagination-corner-right" aria-hidden="true"></span>
    </nav>

    @once
        <style>
            .pb-pagination{position:relative;width:max-content;max-width:100%;display:flex;flex-wrap:nowrap;align-items:center;gap:18px;margin:34px auto 54px;padding:13px 16px 13px 68px;box-sizing:border-box;overflow:visible;border:1px solid rgba(39,217,148,.42);color:#dbe8e1;background:radial-gradient(circle at 18% 0,rgba(39,217,148,.15),transparent 34%),linear-gradient(115deg,#111b16,#070d09);box-shadow:0 18px 42px rgba(4,31,18,.18);isolation:isolate}
            .pb-pagination:before{content:'';position:absolute;z-index:-1;inset:0;opacity:.13;background-image:radial-gradient(circle,rgba(69,238,172,.9) .7px,transparent .9px);background-size:16px 16px;pointer-events:none}
            .pb-pagination-code{position:absolute;left:17px;top:50%;color:#32dc9b;font:800 8px/1 Arial;letter-spacing:.13em;transform:translateY(-50%) rotate(-90deg);white-space:nowrap}
            .pb-pagination-list{width:max-content!important;flex:0 0 auto!important;display:flex!important;flex-flow:row nowrap!important;align-items:center!important;gap:7px!important;margin:0!important;padding:0!important;list-style:none!important;white-space:nowrap!important}
            .pb-page-item{flex:0 0 auto!important;display:block!important;margin:0!important;padding:0!important}
            .pb-page-link{position:relative;min-width:42px;height:42px;display:inline-flex;align-items:center;justify-content:center;gap:8px;box-sizing:border-box;margin:0!important;padding:0 12px!important;border:1px solid rgba(255,255,255,.16)!important;border-radius:0!important;color:#c6d2cc!important;background:rgba(255,255,255,.045)!important;box-shadow:none!important;font:700 13px/1 Arial,sans-serif!important;text-decoration:none!important;cursor:pointer;transition:color .2s,border-color .2s,background .2s,transform .2s!important}
            button.pb-page-link{appearance:none;-webkit-appearance:none}
            .pb-page-link:before{content:'';position:absolute;left:-1px;top:-1px;width:8px;height:8px;border-left:1px solid #32dc9b;border-top:1px solid #32dc9b;opacity:0;transition:opacity .2s}
            .pb-page-link:hover,.pb-page-link:focus-visible{z-index:2;border-color:#32dc9b!important;color:#07110c!important;background:#32dc9b!important;outline:0;transform:translateY(-2px)}
            .pb-page-link:hover:before,.pb-page-link:focus-visible:before{opacity:1}
            .pb-page-direction{min-width:126px;padding-inline:15px!important}
            .pb-page-direction svg{width:17px;height:17px;fill:none;stroke:currentColor;stroke-width:1.8;stroke-linecap:round;stroke-linejoin:round}
            .pb-page-item.is-active .pb-page-link{border-color:#27d994!important;color:#06110b!important;background:linear-gradient(135deg,#39e7a5,#12a96d)!important;box-shadow:0 8px 22px rgba(27,211,139,.26)!important;cursor:default;transform:none}
            .pb-page-item.is-active .pb-page-link:after{content:'';position:absolute;right:5px;bottom:5px;width:4px;height:4px;background:#07110c;box-shadow:0 0 0 3px rgba(7,17,12,.14)}
            .pb-page-item.is-disabled .pb-page-link{border-color:rgba(255,255,255,.08)!important;color:#5e6b64!important;background:rgba(255,255,255,.02)!important;cursor:not-allowed;transform:none}
            .pb-page-gap .pb-page-link{min-width:26px;padding:0!important;border-color:transparent!important;background:transparent!important;color:#66746d!important}
            .pb-pagination-status{min-width:62px;flex:0 0 auto;display:grid;grid-template-columns:auto 18px auto;align-items:center;gap:6px;padding-left:16px;border-left:1px solid rgba(39,217,148,.22);font:700 10px/1 Arial;letter-spacing:.08em}
            .pb-pagination-status b{color:#32dc9b;font-size:14px}.pb-pagination-status span{color:#708078}.pb-pagination-status i{height:1px;background:linear-gradient(90deg,#32dc9b,#394840)}
            .pb-pagination-corner{position:absolute;width:12px;height:12px;pointer-events:none}.pb-pagination-corner-left{left:-1px;bottom:-1px;border-left:2px solid #32dc9b;border-bottom:2px solid #32dc9b}.pb-pagination-corner-right{right:-1px;top:-1px;border-right:2px solid #32dc9b;border-top:2px solid #32dc9b}
            .pb-pagination [wire\:loading]{pointer-events:none}
            @media(max-width:760px){.pb-pagination{width:100%;justify-content:center;gap:8px;margin:25px auto 40px;padding:12px}.pb-pagination-code,.pb-pagination-status{display:none}.pb-pagination-list{max-width:100%;gap:5px!important}.pb-page-link{min-width:38px;height:38px;padding:0 9px!important}.pb-page-direction{min-width:38px}.pb-page-direction span{display:none}.pb-page-gap{display:none!important}}
        </style>
    @endonce
@endif
