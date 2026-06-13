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
            border-bottom: 1px solid rgba(0,0,0,0.06);
            transition: box-shadow .3s;
        }
        nav.scrolled { box-shadow: 0 4px 24px rgba(0,0,0,0.08); }

        /* ── LOGO ─────────────────────────────────────────────────── */
        .nav-logo {
            display: flex; align-items: center; gap: 10px;
            text-decoration: none;
        }
        .nav-logo .logo-icon {
            width: 44px; height: 44px; flex-shrink: 0;
        }
        .nav-logo .logo-text-wrap {
            display: flex; flex-direction: column; gap: 2px;
        }
        .nav-logo .logo-name {
            font-family: Georgia, 'Times New Roman', serif;
            font-size: 15px; font-weight: 700;
            color: #5c3d2e; letter-spacing: 1.5px;
            line-height: 1;
        }
        .nav-logo .logo-sub {
            font-family: Georgia, 'Times New Roman', serif;
            font-size: 9px; color: #9a7a68;
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
            <svg width="44" height="44" viewBox="0 0 44 44" xmlns="http://www.w3.org/2000/svg">
                <rect width="44" height="44" rx="10" fill="#fdf6f0"/>

                <!-- Botanical top -->
                <g stroke="#7a5c44" stroke-width="0.65" fill="none" opacity="0.55">
                    <path d="M22,11 C19,9 16,6 14,3 C12.5,1 13.5,-0.5 15.5,0.5 C17,1.5 17,4 15.5,5.5"/>
                    <path d="M22,11 C25,9 28,6 30,3 C31.5,1 30.5,-0.5 28.5,0.5 C27,1.5 27,4 28.5,5.5"/>
                    <path d="M16,8.5 C14,9.5 12.5,11.5 13.5,13"/>
                    <path d="M28,8.5 C30,9.5 31.5,11.5 30.5,13"/>
                    <ellipse cx="14.5" cy="4.5" rx="2.8" ry="4.5" transform="rotate(-22,14.5,4.5)"/>
                    <ellipse cx="29.5" cy="4.5" rx="2.8" ry="4.5" transform="rotate(22,29.5,4.5)"/>
                    <ellipse cx="11" cy="9" rx="2" ry="3.5" transform="rotate(-10,11,9)"/>
                    <ellipse cx="33" cy="9" rx="2" ry="3.5" transform="rotate(10,33,9)"/>
                    <circle cx="22" cy="7.5" r="3.2" stroke-width="0.5"/>
                    <circle cx="22" cy="7.5" r="1.5" stroke-width="0.4"/>
                    <line x1="18.8" y1="7.5" x2="25.2" y2="7.5" stroke-width="0.4"/>
                    <line x1="22" y1="4.3" x2="22" y2="10.7" stroke-width="0.4"/>
                </g>

                <!-- Monogram A -->
                <text x="22" y="31" text-anchor="middle"
                      font-family="Georgia,'Times New Roman',serif"
                      font-size="23" font-weight="700" fill="#5c3d2e">A</text>

                <!-- Botanical bottom -->
                <g stroke="#7a5c44" stroke-width="0.65" fill="none" opacity="0.45">
                    <path d="M22,35 C19,37 16,39.5 14,42.5 C12.5,44.5 13.5,45.5 15.5,44.5 C17,43.5 17,41 15.5,39.5"/>
                    <path d="M22,35 C25,37 28,39.5 30,42.5 C31.5,44.5 30.5,45.5 28.5,44.5 C27,43.5 27,41 28.5,39.5"/>
                    <ellipse cx="14.5" cy="41" rx="2.8" ry="4" transform="rotate(22,14.5,41)"/>
                    <ellipse cx="29.5" cy="41" rx="2.8" ry="4" transform="rotate(-22,29.5,41)"/>
                    <ellipse cx="11" cy="36.5" rx="2" ry="3" transform="rotate(10,11,36.5)"/>
                    <ellipse cx="33" cy="36.5" rx="2" ry="3" transform="rotate(-10,33,36.5)"/>
                </g>
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
        <li><a href="{{ route('Hobi') }}"       class="{{ request()->routeIs('Hobi')    ? 'active' : '' }}">Hobi</a></li>
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
