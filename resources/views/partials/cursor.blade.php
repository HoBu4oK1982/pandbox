{{-- ══════════════════════════════════════════════════════════════
     CUSTOM CURSOR — тактический прицел за курсором (без ховер-эффектов)
     Подключить в base.blade.php: @include('partials.cursor')
     ══════════════════════════════════════════════════════════════ --}}

<div class="pb-cursor" id="pbCursor">
    <svg viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg">
        <circle cx="20" cy="20" r="8" fill="none" stroke="currentColor" stroke-width="1.2" opacity=".7"/>
        <circle cx="20" cy="20" r="2" fill="currentColor" opacity=".5"/>
        <line x1="20" y1="4" x2="20" y2="13" stroke="currentColor" stroke-width="1" opacity=".6"/>
        <line x1="20" y1="27" x2="20" y2="36" stroke="currentColor" stroke-width="1" opacity=".6"/>
        <line x1="4" y1="20" x2="13" y2="20" stroke="currentColor" stroke-width="1" opacity=".6"/>
        <line x1="27" y1="20" x2="36" y2="20" stroke="currentColor" stroke-width="1" opacity=".6"/>
    </svg>
</div>

<style>
    .pb-cursor {
        position: fixed;
        top: 0; left: 0;
        width: 32px; height: 32px;
        pointer-events: none;
        z-index: 999999;
        color: #1a5c1a;
        transform: translate(-50%, -50%);
        will-change: transform;
        transition: opacity .2s;
    }
    .pb-cursor svg {
        width: 100%; height: 100%;
        display: block;
    }

    @media (pointer: coarse) {
        .pb-cursor { display: none !important; }
    }
    @media (max-width: 768px) {
        .pb-cursor { display: none !important; }
    }
</style>

<script>
(function() {
    if (window.__pbCursorBooted) return;
    window.__pbCursorBooted = true;

    if (window.matchMedia('(pointer: coarse)').matches) return;

    var el = document.getElementById('pbCursor');
    if (!el) return;

    var mx = -100, my = -100;

    document.addEventListener('mousemove', function(e) {
        mx = e.clientX;
        my = e.clientY;
    });

    function tick() {
        if (!el || !el.isConnected) {
            el = document.getElementById('pbCursor');
            if (el) el.style.opacity = '1';
        }
        if (!el) {
            requestAnimationFrame(tick);
            return;
        }
        if (typeof gsap !== 'undefined') {
            gsap.to(el, {
                x: mx,
                y: my,
                duration: 0.15,
                ease: 'power2.out',
                overwrite: true
            });
        } else {
            el.style.transform = 'translate(calc(' + mx + 'px - 50%), calc(' + my + 'px - 50%))';
        }
        requestAnimationFrame(tick);
    }
    requestAnimationFrame(tick);

    document.addEventListener('mouseleave', function() {
        el.style.opacity = '0';
    });
    document.addEventListener('mouseenter', function() {
        el.style.opacity = '1';
    });
})();
</script>
