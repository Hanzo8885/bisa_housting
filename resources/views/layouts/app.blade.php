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
            padding: 0 5%; height: 72px;
            background: rgba(255,255,255,0.92);
            backdrop-filter: blur(12px);
            border-bottom: 1px solid rgba(247, 233, 233, 0.06);
            transition: box-shadow .3s;
        }
        nav.scrolled { box-shadow: 0 4px 24px rgba(255, 255, 255, 0.08); }

        /* ── LOGO ─────────────────────────────────────────────────── */
        .nav-logo {
            display: flex; align-items: center; gap: 10px;
            text-decoration: none;
        }
        .nav-logo .logo-icon {
            width: 46px; height: 46px; flex-shrink: 0;
        }
        .nav-logo .logo-text-wrap {
            display: flex; flex-direction: column; gap: 2px;
        }
        .nav-logo .logo-name {
            font-family: Georgia, 'Times New Roman', serif;
            font-size: 15px; font-weight: 700;
            color: #0D0D0D; letter-spacing: 1.5px;
            line-height: 1;
        }
        .nav-logo .logo-sub {
            font-family: Georgia, 'Times New Roman', serif;
            font-size: 9px; color: #00C896;
            letter-spacing: 2px;
            line-height: 1;
        }

        /* ── NAV LINKS ────────────────────────────────────────────── */
        .nav-links {
            display: flex; align-items: center; gap: 6px;
            list-style: none;
        }
        .nav-links a {
            text-decoration: none; color: var(--muted);
            font-size: .9rem; font-weight: 500;
            padding: 6px 14px; border-radius: 6px;
            transition: color .2s, background .2s;
            position: relative;
        }
        .nav-links a:hover { color: var(--black); background: var(--gray); }
        .nav-links a.active { color: var(--black); }
        .nav-links a.active::before {
            content: ''; width: 6px; height: 6px; border-radius: 50%;
            background: var(--green);
            position: absolute; left: 2px; top: 50%; transform: translateY(-50%);
        }
        .nav-cta {
            background: var(--black) !important; color: var(--white) !important;
            padding: 8px 20px !important; border-radius: 8px !important;
        }
        .nav-cta:hover { background: #333 !important; }

        /* Hamburger */
        .nav-toggle { display: none; background: none; border: none; cursor: pointer; padding: 4px; }
        .nav-toggle span {
            display: block; width: 24px; height: 2px;
            background: var(--black); margin: 5px 0;
            transition: all .3s;
        }

        /* ── MAIN CONTENT ─────────────────────────────────────────── */
        main { padding-top: 72px; flex: 1; }

        /* ── FOOTER ───────────────────────────────────────────────── */
        footer {
            background: var(--black); color: #aaa;
            padding: 40px 5%;
            display: flex; align-items: center; justify-content: space-between;
            flex-wrap: wrap; gap: 16px;
        }
        footer .footer-brand {
            font-family: Georgia, 'Times New Roman', serif;
            font-weight: 700; color: #fff; font-size: 1rem;
            letter-spacing: 1px;
        }
        footer p { font-size: .85rem; }
        footer a { color: var(--green); text-decoration: none; }

        /* ── RESPONSIVE ───────────────────────────────────────────── */
        @media (max-width: 768px) {
            .nav-toggle { display: block; }
            .nav-links {
                position: fixed; top: 72px; left: 0; right: 0;
                background: #fff; flex-direction: column; align-items: flex-start;
                padding: 16px 5%; gap: 4px;
                border-bottom: 1px solid #eee;
                transform: translateY(-120%); opacity: 0;
                transition: transform .3s, opacity .3s;
                pointer-events: none;
            }
            .nav-links.open {
                transform: translateY(0); opacity: 1; pointer-events: all;
            }
            .nav-links a { width: 100%; padding: 10px 14px; }
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
        <li><a href="{{ route('home') }}"       class="{{ request()->routeIs('home')     ? 'active' : '' }}">Home</a></li>
        <li><a href="{{ route('about') }}"      class="{{ request()->routeIs('about')    ? 'active' : '' }}">About</a></li>
        <li><a href="{{ route('Biodata') }}"    class="{{ request()->routeIs('Biodata') ? 'active' : '' }}">Biodata</a></li>
        <li><a href="{{ route('Hobby') }}"       class="{{ request()->routeIs('Hobby')    ? 'active' : '' }}">Hobby</a></li>
        <li><a href="{{ route('contact') }}"    class="nav-cta {{ request()->routeIs('contact') ? 'active' : '' }}">Contact</a></li>
    </ul>
</nav>

<!-- ── PAGE CONTENT ── -->
<main>
    @yield('content')
</main>

<!-- ── FOOTER ── -->
<footer>
    <div>
        <div class="footer-brand">Alfikar Radestian Prasenja</div>
        <p>&copy; {{ date('Y') }} · a student from SMKN 2 Sukabumi City</p>
    </div>
    <p>Built with <a href="https://laravel.com">Laravel 12</a> &amp; passion ✦</p>
</footer>

<script>
    // Navbar scroll shadow
    const navbar = document.getElementById('navbar');
    window.addEventListener('scroll', () => {
        navbar.classList.toggle('scrolled', window.scrollY > 20);
    });

    // Mobile hamburger
    const toggle = document.getElementById('navToggle');
    const links  = document.getElementById('navLinks');
    toggle.addEventListener('click', () => links.classList.toggle('open'));

    // Close mobile menu on link click
    links.querySelectorAll('a').forEach(a => {
        a.addEventListener('click', () => links.classList.remove('open'));
    });
</script>
@stack('scripts')
</body>
</html>
