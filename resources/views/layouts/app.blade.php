<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Portfolio – Alfikar Radestian Prasenja' }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Sora:wght@700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        :root {
            --green:   #00C896;
            --green-dk:#00A87D;
            --black:   #0D0D0D;
            --white:   #FFFFFF;
            --gray:    #F5F5F5;
            --text:    #333333;
            --muted:   #666666;
            --font-display: 'Sora', sans-serif;
            --font-body:    'Inter', sans-serif;
        }

        html { scroll-behavior: smooth; }
        body  { font-family: var(--font-body); color: var(--text); background: var(--white); overflow-x: hidden; min-height: 100vh; display: flex; flex-direction: column; }

        /* ── NAVBAR ───────────────────────────────────────────────── */
        nav {
            position: fixed; top: 0; left: 0; right: 0; z-index: 100;
            display: flex; align-items: center; justify-content: space-between;
            padding: 0 5%; height: 76px;
            background: rgba(255,255,255,0.85);
            backdrop-filter: blur(14px) saturate(160%);
            -webkit-backdrop-filter: blur(14px) saturate(160%);
            border-bottom: 1px solid rgba(13,13,13,0.06);
            transition: box-shadow .3s, height .3s, background .3s;
        }
        nav.scrolled {
            height: 68px;
            background: rgba(255,255,255,0.96);
            box-shadow: 0 8px 30px rgba(13,13,13,0.08);
        }

        /* ── LOGO ─────────────────────────────────────────────────── */
        .nav-logo {
            display: flex; align-items: center; gap: 12px;
            text-decoration: none;
            transition: transform .25s ease;
        }
        .nav-logo:hover { transform: translateY(-1px); }
        .nav-logo .logo-icon {
            width: 44px; height: 44px; flex-shrink: 0;
            transition: transform .35s ease;
        }
        .nav-logo:hover .logo-icon { transform: rotate(-6deg) scale(1.05); }
        .nav-logo .logo-text-wrap {
            display: flex; flex-direction: column; gap: 2px;
        }
        .nav-logo .logo-name {
            font-family: var(--font-display);
            font-size: 16px; font-weight: 800;
            color: #0D0D0D; letter-spacing: 1.8px;
            line-height: 1;
        }
        .nav-logo .logo-sub {
            font-family: var(--font-body);
            font-size: 9.5px; font-weight: 600;
            color: #00C896;
            letter-spacing: 2.2px;
            text-transform: uppercase;
            line-height: 1;
        }

        /* ── NAV LINKS ────────────────────────────────────────────── */
        .nav-links {
            display: flex; align-items: center; gap: 4px;
            list-style: none;
        }
        .nav-links a {
            text-decoration: none;
            color: var(--muted);
            font-size: .92rem;
            font-weight: 500;
            padding: 9px 18px;
            border-radius: 8px;
            position: relative;
            display: inline-flex;
            align-items: center;
            transition: color .2s ease, background .2s ease;
        }

        /* underline animasi di tengah bawah teks */
        .nav-links a::after {
            content: '';
            position: absolute;
            left: 50%; bottom: 4px;
            width: 0; height: 2px;
            background: var(--green);
            border-radius: 2px;
            transform: translateX(-50%);
            transition: width .25s ease;
        }

        .nav-links a:hover {
            color: var(--black);
            background: var(--gray);
        }
        .nav-links a:hover::after { width: 22px; }

        .nav-links a.active {
            color: var(--green);
            font-weight: 600;
            background: rgba(0,200,150,.08);
        }
        .nav-links a.active::after { width: 22px; }

        .nav-links a:active { transform: scale(0.96); }

        /* Ikon di tiap link hanya untuk tampilan mobile */
        .nav-links a i { display: none; }

        /* Tombol Navigasi Khusus (Jika dipakai) */
        .nav-cta {
            background: var(--black) !important; color: var(--white) !important;
            padding: 9px 22px !important; border-radius: 8px !important;
            margin-left: 8px;
            box-shadow: 0 4px 14px rgba(13,13,13,.15);
            transition: background .2s ease, transform .2s ease, box-shadow .2s ease !important;
        }
        .nav-cta::after { display: none; }
        .nav-cta:hover {
            background: var(--green-dk) !important; color: #fff !important;
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(0,168,125,.28);
        }

        /* Hamburger Menu untuk Mobile */
        .nav-toggle {
            display: none; background: none; border: none; cursor: pointer;
            padding: 6px; border-radius: 6px;
            transition: background .2s ease;
        }
        .nav-toggle:hover { background: var(--gray); }
        .nav-toggle span {
            display: block; width: 24px; height: 2px;
            background: var(--black); margin: 5px 0;
            border-radius: 2px;
            transition: all .3s;
        }
        .nav-toggle.open span:nth-child(1) { transform: translateY(7px) rotate(45deg); }
        .nav-toggle.open span:nth-child(2) { opacity: 0; }
        .nav-toggle.open span:nth-child(3) { transform: translateY(-7px) rotate(-45deg); }

        /* ── MAIN CONTENT ─────────────────────────────────────────── */
        main { padding-top: 76px; flex: 1; }

        /* ── FOOTER ───────────────────────────────────────────────── */
        footer {
            background: var(--black); color: #aaa;
            padding: 40px 5%;
            display: flex; align-items: center; justify-content: space-between;
            flex-wrap: wrap; gap: 16px;
        }
        footer .footer-brand {
            font-family: var(--font-display);
            font-weight: 700; color: #fff; font-size: 1rem;
            letter-spacing: 1px;
        }
        footer p { font-size: .85rem; }
        footer a { color: var(--green); text-decoration: none; }

        /* ── RESPONSIVE MOBILE ────────────────────────────────────── */
        @media (max-width: 768px) {
            .nav-toggle { display: block; }

            /* Overlay gelap di belakang menu, supaya menu "mengapung" bukan blok putih polos */
            .nav-overlay {
                position: fixed; inset: 0; z-index: 90;
                background: rgba(13,13,13,0.35);
                backdrop-filter: blur(2px);
                opacity: 0; pointer-events: none;
                transition: opacity .3s ease;
            }
            .nav-overlay.open { opacity: 1; pointer-events: all; }

            .nav-links {
                position: fixed; top: 76px; left: 0; right: 0; z-index: 95;
                background: #fff;
                flex-direction: column; align-items: stretch;
                padding: 10px 5% 28px; gap: 0;
                border-radius: 0 0 20px 20px;
                box-shadow: 0 20px 40px rgba(13,13,13,.12);
                transform: translateY(-16px); opacity: 0;
                transition: transform .3s ease, opacity .3s ease;
                pointer-events: none;
                max-height: calc(100vh - 76px);
                overflow-y: auto;
            }
            .nav-links.open {
                transform: translateY(0); opacity: 1; pointer-events: all;
            }

            .nav-links li { border-bottom: 1px solid var(--gray); }
            .nav-links li:last-child { border-bottom: none; }

            .nav-links a {
                width: 100%; padding: 16px 14px;
                font-size: 1.02rem;
                border-radius: 10px;
                gap: 12px;
                opacity: 0; transform: translateX(-8px);
                transition: color .2s ease, background .2s ease,
                            opacity .35s ease, transform .35s ease;
            }
            /* animasi stagger muncul satu-satu saat menu dibuka */
            .nav-links.open a { opacity: 1; transform: translateX(0); }
            .nav-links.open li:nth-child(1) a { transition-delay: .03s; }
            .nav-links.open li:nth-child(2) a { transition-delay: .08s; }
            .nav-links.open li:nth-child(3) a { transition-delay: .13s; }
            .nav-links.open li:nth-child(4) a { transition-delay: .18s; }
            .nav-links.open li:nth-child(5) a { transition-delay: .23s; }

            .nav-links a i { display: inline-block; width: 18px; text-align: center; color: var(--green); font-size: .95rem; }

            .nav-links a::after { left: 14px; bottom: 8px; transform: none; }
            .nav-links a:hover::after, .nav-links a.active::after { width: 22px; }
            .nav-links a.active { padding-left: 14px; }

            .nav-cta {
                margin-left: 0; margin-top: 14px; width: 100%;
                justify-content: center; padding: 14px 22px !important;
            }
            .nav-cta i { color: #fff !important; }
        }
    </style>
    @stack('styles')
</head>
<body>

<!-- ── NAVBAR ── -->
<nav id="navbar">

    {{-- ── LOGO PERSONAL BRANDING ── --}}
    <a href="{{ route('home') }}" class="nav-logo">
        <div class="logo-icon">
            <svg width="46" height="46" viewBox="0 0 46 46" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect width="46" height="46" rx="12" fill="#0D0D0D"/>
                <text x="23" y="30" text-anchor="middle"
                      font-family="Georgia,'Times New Roman',serif"
                      font-size="22" font-weight="700" fill="#FFFFFF">A</text>
                <!-- Bracket kiri -->
                <line x1="10" y1="12" x2="10" y2="34" stroke="#00C896" stroke-width="2.5" stroke-linecap="round"/>
                <line x1="10" y1="12" x2="16" y2="12" stroke="#00C896" stroke-width="2.5" stroke-linecap="round"/>
                <line x1="10" y1="34" x2="16" y2="34" stroke="#00C896" stroke-width="2.5" stroke-linecap="round"/>
                <!-- Bracket kanan -->
                <line x1="36" y1="12" x2="36" y2="34" stroke="#00C896" stroke-width="2.5" stroke-linecap="round"/>
                <line x1="36" y1="12" x2="30" y2="12" stroke="#00C896" stroke-width="2.5" stroke-linecap="round"/>
                <line x1="36" y1="34" x2="30" y2="34" stroke="#00C896" stroke-width="2.5" stroke-linecap="round"/>
            </svg>
        </div>
        <div class="logo-text-wrap">
            <span class="logo-name">ALFIKAR</span>
            <span class="logo-sub">Personal Branding</span>
        </div>
    </a>

    <button class="nav-toggle" id="navToggle" aria-label="Toggle menu">
        <span></span><span></span><span></span>
    </button>

    <ul class="nav-links" id="navLinks">
        <li><a href="{{ route('home') }}"       class="{{ request()->routeIs('home')     ? 'active' : '' }}"><i class="fas fa-house"></i> Beranda</a></li>
        <li><a href="{{ route('about') }}"      class="{{ request()->routeIs('about')    ? 'active' : '' }}"><i class="fas fa-user"></i> Tentang </a></li>
        <li><a href="{{ route('Biodata') }}"    class="{{ request()->routeIs('Biodata') ? 'active' : '' }}"><i class="fas fa-id-card"></i> Biodata</a></li>
        <li><a href="{{ route('Hobby') }}"       class="{{ request()->routeIs('Hobby')    ? 'active' : '' }}"><i class="fas fa-heart"></i> Hobbi</a></li>
        <li><a href="{{ route('contact') }}"    class="{{ request()->routeIs('contact')  ? 'active' : '' }}"><i class="fas fa-paper-plane"></i> Contak</a></li>
    </ul>
</nav>

<div class="nav-overlay" id="navOverlay"></div>

<!-- ── PAGE CONTENT ── -->
<main>
    @yield('content')
</main>

<!-- ── FOOTER ── -->
<footer>
    <div> 
        <div class="footer-brand">Alfikar Radestian Prasenja</div>
        <p>&copy; {{ date('Y') }} · seorang siswa dari SMKN 2 kota Sukabumi y</p>
    </div>
    <p>Dibuat dengan <a href="https://laravel.com">Laravel 12</a> &amp; versi ✦</p>
</footer>

<script>
    // Navbar scroll shadow
    const navbar = document.getElementById('navbar');
    window.addEventListener('scroll', () => {
        navbar.classList.toggle('scrolled', window.scrollY > 20);
    });

    // Mobile hamburger
    const toggle  = document.getElementById('navToggle');
    const links   = document.getElementById('navLinks');
    const overlay = document.getElementById('navOverlay');

    function closeMenu() {
        links.classList.remove('open');
        toggle.classList.remove('open');
        overlay.classList.remove('open');
        document.body.style.overflow = '';
    }
    function openMenu() {
        links.classList.add('open');
        toggle.classList.add('open');
        overlay.classList.add('open');
        document.body.style.overflow = 'hidden';
    }

    toggle.addEventListener('click', () => {
        links.classList.contains('open') ? closeMenu() : openMenu();
    });

    overlay.addEventListener('click', closeMenu);

    // Close mobile menu on link click
    links.querySelectorAll('a').forEach(a => {
        a.addEventListener('click', closeMenu);
    });
</script>
@stack('scripts')
</body>
</html>
