<span class="pb-wishlist-count-root" data-pb-wishlist-count="{{ $variant }}">
    @if($variant === 'mobile')
        <a wire:navigate href="{{ route('favourite') }}" class="pbm-dock-link" aria-label="Избранное">
            <span class="pbm-dock-icon">
                <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 21 3.8 13.1C-.2 9.2 2 3 7.4 3c2 0 3.6 1 4.6 2.5C13 4 14.6 3 16.6 3 22 3 24.2 9.2 20.2 13.1Z"/></svg>
                <b>{{ Cart::instance('wishlist')->count() }}</b>
            </span>
            <span>Избранное</span>
        </a>
    @elseif($variant === 'sticky')
        <a wire:navigate href="{{ route('favourite') }}" class="sn-icon" aria-label="Избранное">
            <svg viewBox="0 0 24 24"><path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/></svg>
            @if(Cart::instance('wishlist')->count() > 0)
                <span class="sn-badge">{{ Cart::instance('wishlist')->count() }}</span>
            @endif
        </a>
    @else
        <a wire:navigate href="{{ route('favourite')}}" class="header__middle__right__favour header_position pb-header-action" aria-label="Избранное">
            <svg class="pb-header-action-icon" viewBox="0 0 32 32" aria-hidden="true"><path d="M16 27.2 5.9 17.5C1 12.8 3.8 5 10.3 5c2.5 0 4.6 1.3 5.7 3.2C17.1 6.3 19.2 5 21.7 5c6.5 0 9.3 7.8 4.4 12.5Z"/></svg>
            <span class="pb-header-action-label">Избранное</span>
            <span class="pb-header-action-count">{{ Cart::instance('wishlist')->count() }}</span>
        </a>
    @endif
</span>
