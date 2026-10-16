<span class="pb-cart-count-root" data-pb-cart-count="{{ $variant }}">
    @if($variant === 'mobile')
        <a wire:navigate href="{{ route('cart') }}" class="pbm-dock-link" aria-label="Корзина">
            <span class="pbm-dock-icon">
                <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M3 4h2l2.1 10.1a2 2 0 0 0 2 1.6h8.8a2 2 0 0 0 1.9-1.4L22 7H6"/><circle cx="10" cy="20" r="1.4"/><circle cx="19" cy="20" r="1.4"/></svg>
                <b>{{ Cart::instance('cart')->count() }}</b>
            </span>
            <span>Корзина</span>
        </a>
    @elseif($variant === 'sticky')
        <a wire:navigate href="{{ route('cart') }}" class="sn-icon" aria-label="Корзина">
            <svg viewBox="0 0 24 24"><path d="M7 18c-1.1 0-1.99.9-1.99 2S5.9 22 7 22s2-.9 2-2-.9-2-2-2zM1 2v2h2l3.6 7.59-1.35 2.45c-.16.28-.25.61-.25.96 0 1.1.9 2 2 2h12v-2H7.42c-.14 0-.25-.11-.25-.25l.03-.12.9-1.63h7.45c.75 0 1.41-.41 1.75-1.03l3.58-6.49A1.003 1.003 0 0020 4H5.21l-.94-2H1zm16 16c-1.1 0-1.99.9-1.99 2s.89 2 1.99 2 2-.9 2-2-.9-2-2-2z"/></svg>
            @if(Cart::instance('cart')->count() > 0)
                <span class="sn-badge">{{ Cart::instance('cart')->count() }}</span>
            @endif
        </a>
    @else
        <a wire:navigate href="{{ route('cart')}}" class="header__middle__right__cart header_position pb-header-action" aria-label="Корзина">
            <svg class="pb-header-action-icon" viewBox="0 0 32 32" aria-hidden="true"><path d="M3.5 5h3l3 15h14l4-11H8"/><path d="M10 15h14.8M13 9.2 14 20M20 9.2 19 20"/><circle cx="11.5" cy="26" r="1.8"/><circle cx="23" cy="26" r="1.8"/></svg>
            <span class="pb-header-action-label">Корзина</span>
            <span class="pb-header-action-count">{{ Cart::instance('cart')->count() }}</span>
        </a>
    @endif
</span>
