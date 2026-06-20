@extends('layouts.app')
@section('title', 'Home – Alfikar Radestian Prasenja | Software Engineering Student & Developer')

@push('styles')
<style>
    /* ── HERO SECTION ─────────────────────────────────────────────────── */
    .hero {
        min-height: calc(100vh - 72px); /* Full height minus header */
        display: flex;
        align-items: center;
        padding: 60px 5% 80px;
        position: relative;
        overflow: hidden;
        background: #fff; /* White clean background for focus */
    }

    .hero-left {
        flex: 1;
        max-width: 580px;
        z-index: 2;
    }

    /* Greeting badge (inspired by image_0.png) */
    .hero-badge {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        border: 1.5px solid #e0e0e0;
        border-radius: 8px;
        padding: 8px 16px;
        font-size: .85rem;
        font-weight: 500;
        color: var(--text);
        margin-bottom: 24px;
        background: #fbfbfb;
    }

    /* Bold headline with focus color (inspired by image_0.png) */
    .hero h1 {
        font-family: var(--font-display);
        font-size: clamp(2.8rem, 5.5vw, 4.5rem);
        font-weight: 800;
        line-height: 1.1;
        color: var(--black);
        letter-spacing: -1.5px;
        margin-bottom: 24px;
    }
    .hero h1 em { font-style: normal; color: var(--green); } /* RPL accent */

    /* Description */
    .hero-desc {
        font-size: .97rem;
        color: var(--muted);
        line-height: 1.75;
        max-width: 480px;
        margin-bottom: 36px;
    }

    /* CTA area (inspired by image_0.png) */
    .hero-cta {
        display: flex;
        align-items: center;
        gap: 20px;
        margin-bottom: 40px;
    }
    .btn-contact {
        background: var(--black);
        color: #fff;
        padding: 14px 28px;
        border-radius: 12px;
        font-weight: 600;
        font-size: .9rem;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 10px;
        transition: transform .2s, background .2s;
    }
    .btn-contact:hover {
        background: #333;
        transform: translateY(-2px);
    }
    
    /* Social media links below CTA */
    .hero-social-row {
        display: flex;
        align-items: center;
        gap: 16px;
        margin-top: 20px;
        font-size: .85rem;
        color: var(--muted);
    }
    .hero-social-row a {
        color: var(--text);
        text-decoration: none;
        transition: color .2s;
    }
    .hero-social-row a:hover {
        color: var(--green);
    }

    /* ── HERO RIGHT (photo area) ────────────────────────────────────── */
    .hero-right {
        flex: 1;
        display: flex;
        justify-content: flex-end;
        align-items: center;
        position: relative;
        z-index: 2;
    }
    .photo-area {
        position: relative;
        width: 320px;
        height: 380px;
    }
    
    /* Main photo in a square frame (based on image_0.png) */
    .photo-frame {
        position: absolute;
        inset: 0;
        border-radius: 4px;
        background: #e9e9e9; /* Light grey placeholder */
        overflow: hidden;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .photo-frame img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    /* The distinct green blob accent (from image_0.png) */
    .blob-accent {
        position: absolute;
        bottom: -30px;
        right: -40px;
        width: 180px;
        height: 110px;
        background: var(--green);
        border-radius: 50px;
        transform: rotate(-20deg);
        z-index: -1;
        opacity: .9;
    }

    /* ── ANIMATED TICKER (Unique Element) ───────────────────────────── */
    .ticker {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        background: var(--black);
        color: #fff;
        padding: 16px 0;
        white-space: nowrap;
        overflow: hidden;
        display: flex;
        font-family: var(--font-body);
        font-size: .85rem;
        font-weight: 500;
        letter-spacing: .5px;
    }
    .ticker-track {
        display: flex;
        gap: 0;
        animation: ticker 25s linear infinite;
    }
    .ticker-item {
        padding: 0 40px;
        display: inline-flex;
        align-items: center;
        gap: 16px;
    }
    .ticker-dot {
        width: 6px;
        height: 6px;
        border-radius: 50%;
        background: var(--green);
    }
    
    @keyframes ticker {
        from { transform: translateX(0); }
        to { transform: translateX(-50%); } /* Halfway for seamless loop */
    }

    /* ── RESPONSIVE ────────────────────────────────────────────────── */
    @media (max-width: 900px) {
        .hero {
            flex-direction: column;
            text-align: center;
            padding-top: 40px;
            gap: 40px;
        }
        .hero-left { max-width: 100%; }
        .hero-desc { max-width: 100%; margin-left: auto; margin-right: auto; }
        .hero-cta { justify-content: center; }
        .hero-social-row { justify-content: center; }
        .hero-right { justify-content: center; }
        .blob-accent { display: none; } /* Simpler on mobile */
        .photo-area { width: 280px; height: 330px; }
    }
</style>
@endpush

@section('content')

<section class="hero">
    <div class="hero-left">
        <div class="hero-badge">
            👋 Halo semua, saya Alfikar Radestian Prasenja
        </div>

        <h1>Back-End Dev &<br>Pelajar <em>RPL</em></h1>

        <p class="hero-desc">
            Saya adalah siswa SMKN 2 Kota Sukabumi, jurusan Rekayasa Perangkat Lunak yang berfokus pada web development dan pembuatan aplikasi pemrograman. Senang mengeksplorasi arsitektur kode di framework Laravel, Visual Studio, hingga integrasi database.
        </p>

        <div class="hero-cta">
            <a href="{{ route('contact') }}" class="btn-contact">
                Hubungi Saya <i class="fas fa-paper-plane"></i>
            </a>
            
            <div class="hero-social-row">
                <span>Temukan saya di:</span>
                <a href="https://github.com/Hanzo8885" target="_blank" rel="noopener noreferrer" aria-label="GitHub"><i class="fab fa-github"></i></a>
                <a href="https://instagram.com/kinemon973" target="_blank" rel="noopener noreferrer" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
            </div>
        </div>
    </div>

    <div class="hero-right">
        <div class="photo-area">
            <div class="photo-frame">
                <img src="{{ asset('images/photo.jpg') }}" alt="Alfikar Radestian Prasenja">
            </div>
            <div class="blob-accent"></div>
        </div>
    </div>

    <!-- Animated Ticker (Unique to Home) -->
    <div class="ticker">
        <div class="ticker-track">
            <div class="ticker-item">Web Development</div><div class="ticker-dot"></div>
            <div class="ticker-item">Laravel</div><div class="ticker-dot"></div>
            <div class="ticker-item">Backend Programming</div><div class="ticker-dot"></div>
            <div class="ticker-item">Software Engineering Student</div><div class="ticker-dot"></div>
            <div class="ticker-item">SMKN 2 Kota Sukabumi</div><div class="ticker-dot"></div>
            <div class="ticker-item">Web Development</div><div class="ticker-dot"></div>
            <div class="ticker-item">Laravel</div><div class="ticker-dot"></div>
            <div class="ticker-item">Backend Programming</div><div class="ticker-dot"></div>
            <div class="ticker-item">Software Engineering Student</div><div class="ticker-dot"></div>
            <div class="ticker-item">SMKN 2 Kota Sukabumi</div><div class="ticker-dot"></div>
        </div>
    </div>
</section>

@endsection