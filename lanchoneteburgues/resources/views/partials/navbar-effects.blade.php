<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Anton&family=DM+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<style>
    html { background: #1d1d1d !important; }
    html, body { margin: 0 !important; padding: 0 !important; border: 0 !important; }
    body > header.topbar {
        position: relative !important;
        display: block !important;
        width: 100% !important;
        margin: 0 !important;
        padding: 0 !important;
        background: #111 !important;
        border: 0 !important;
        border-top: 0 !important;
        border-bottom: 0 !important;
        outline: 0 !important;
        box-shadow: none !important;
        font-family: 'DM Sans', sans-serif;
    }
    body > header.topbar::before,
    body > header.topbar::after { content: none !important; display: none !important; }
    body > header.topbar > nav.nav {
        margin-top: 0 !important;
        border: 0 !important;
        border-top: 0 !important;
        border-bottom: 0 !important;
        outline: 0 !important;
        box-shadow: none !important;
        background: transparent !important;
    }
    .topbar .nav-link .nav-label { display: inline-block; }
    .topbar .nav-link { text-shadow: none; transform: none !important; transition: color .2s ease, text-shadow .2s ease; }
    .topbar .nav-link:hover, .topbar .nav-link:focus-visible { color: #ffcc00 !important; text-shadow: 0 0 4px rgba(255, 204, 0, .4); }
    .topbar .nav-link.nav-link-animating { transform: none !important; }
    .topbar .nav-link.nav-link-animating .nav-label { animation: burgues-nav-motion .5s cubic-bezier(.2,.8,.2,1) both; animation-duration: .5s !important; animation-iteration-count: 1 !important; }
    .burgues-header-links .nav-label { display: inline-block; }
    .burgues-header-links a {
        position: relative;
        display: inline-block;
        padding: 14px 6px;
        transition: color .25s ease;
        animation: navbar-copy-enter .65s ease-out both;
    }
    .burgues-header-links a:nth-child(1) { animation-delay: .08s; }
    .burgues-header-links a:nth-child(2) { animation-delay: .18s; }
    .burgues-header-links a:nth-child(3) { animation-delay: .28s; }
    .burgues-header-links a:nth-child(4) { animation-delay: .38s; }
    .burgues-header-links a:nth-child(5) { animation-delay: .48s; }
    .burgues-header-links .nav-label {
        display: inline-block;
        pointer-events: none;
        transform-origin: left center;
        transition: transform .25s ease, text-shadow .25s ease;
    }
    .burgues-header-links a:hover,
    .burgues-header-links a:focus-visible { color: #ffcc00 !important; }
    .burgues-header-links a:hover .nav-label,
    .burgues-header-links a:focus-visible .nav-label {
        transform: translateY(-14px) scale(1.025);
        text-shadow: 0 8px 18px rgba(0, 0, 0, .22);
    }
    .burgues-header-links a.nav-link-animating .nav-label {
        animation: burgues-nav-link-motion .5s cubic-bezier(.2,.8,.2,1) both;
    }
    @keyframes navbar-copy-enter {
        from { opacity: 0; transform: translateY(18px); }
        to { opacity: 1; transform: translateY(0); }
    }
    @keyframes burgues-nav-motion { 0% { transform: translateY(0) scale(1); } 42% { transform: translateY(-4px) scale(1.05); } 100% { transform: translateY(0) scale(1); } }
    @keyframes burgues-nav-link-motion { 0% { transform: translateY(0) scale(1); } 42% { transform: translateY(-4px) scale(1.05); } 100% { transform: translateY(0) scale(1); } }
    @media (prefers-reduced-motion: reduce) {
        .burgues-header-links a,
        .topbar .nav-link, .topbar .nav-link .nav-label,
        .burgues-header-links .nav-label { animation: none !important; transition: none !important; }
    }
</style>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        document.querySelectorAll('.topbar .nav-link').forEach((link) => {
            const label = link.querySelector('.nav-label');
            if (!label) return;
            link.addEventListener('pointerenter', () => {
                link.classList.remove('nav-link-animating');
                void label.offsetWidth;
                link.classList.add('nav-link-animating');
            });
            link.addEventListener('animationend', (event) => {
                if (event.animationName === 'burgues-nav-motion') link.classList.remove('nav-link-animating');
            });
        });

        document.querySelectorAll('.burgues-header-links a').forEach((link) => {
            const label = link.querySelector('.nav-label');

            if (!label) {
                return;
            }

            link.addEventListener('pointerenter', () => {
                link.classList.remove('nav-link-animating');
                void label.offsetWidth;
                link.classList.add('nav-link-animating');
            });

            link.addEventListener('animationend', (event) => {
                if (event.animationName === 'burgues-nav-link-motion') {
                    link.classList.remove('nav-link-animating');
                }
            });
        });
    });
</script>



