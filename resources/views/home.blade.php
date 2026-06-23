@extends('layouts.app')
@section('title', 'Home – Alfikar Radestian Prasenja | Software Engineering Student & Developer')

@push('styles')
<style>
    /* ── HERO ──────────────────────────────────────────────────────── */
    .hero {
        min-height: calc(100vh - 72px);
        display: flex; align-items: center;
        padding: 60px 5% 80px;
        position: relative; overflow: hidden;
    }

    .hero-left {
        flex: 1; max-width: 540px; z-index: 2;
    }

    /* Greeting badge */
    .hero-badge {
        display: inline-flex; align-items: center; gap: 8px;
        border: 1.5px solid #e0e0e0; border-radius: 8px;
        padding: 6px 14px; font-size: .85rem; font-weight: 500;
        color: var(--text); margin-bottom: 24px;
        background: #fff;
    }

    /* Headline */
    .hero h1 {
        font-family: var(--font-display);
        font-size: clamp(2.6rem, 5vw, 4rem);
        font-weight: 800; line-height: 1.12;
        color: var(--black); letter-spacing: -1.5px;
        margin-bottom: 20px;
    }
    .hero h1 em { font-style: normal; color: var(--green); }

    /* Description */
    .hero-desc {
        font-size: .97rem; color: var(--muted);
        line-height: 1.7; max-width: 450px;
        margin-bottom: 36px;
    }

    /* CTA buttons */
    .hero-cta { display: flex; align-items: center; gap: 16px; flex-wrap: wrap; margin-bottom: 40px; }
    .btn-primary {
        background: var(--black); color: #fff;
        padding: 13px 26px; border-radius: 10px;
        font-weight: 600; font-size: .9rem;
        text-decoration: none; display: inline-flex; align-items: center; gap: 8px;
        transition: background .2s, transform .2s;
    }
    .btn-primary:hover { background: #333; transform: translateY(-2px); }
    .btn-outline {
        color: var(--black); font-weight: 500; font-size: .9rem;
        text-decoration: none; display: inline-flex; align-items: center; gap: 8px;
        padding: 13px 20px; border-radius: 10px;
        border: 1.5px solid #e0e0e0;
        transition: border-color .2s, transform .2s;
    }
    .btn-outline:hover { border-color: var(--black); transform: translateY(-2px); }

    /* Social row */
    .hero-social { display: flex; align-items: center; gap: 14px; }
    .hero-social span { font-size: .85rem; color: var(--muted); font-weight: 500; }
    .social-icon {
        width: 38px; height: 38px; border-radius: 50%;
        border: 1.5px solid #e0e0e0;
        display: flex; align-items: center; justify-content: center;
        color: var(--text); text-decoration: none; font-size: .9rem;
        transition: border-color .2s, color .2s, background .2s;
    }
    .social-icon:hover { border-color: var(--green); color: var(--green); }
    .social-icon.active-soc { background: var(--green); border-color: var(--green); color: #fff; }

    /* ── HERO RIGHT (photo area) ───────────────────────────────────── */
    .hero-right {
        flex: 1; display: flex; justify-content: flex-end; align-items: center;
        position: relative; z-index: 2;
    }

    /* Photo frame: bingkai hitam solid menjorok di kanan-bawah, seperti referensi */
    .photo-frame {
        position: relative; width: 320px; height: 380px;
    }
    .photo-frame .photo-bg {
        position: absolute;
        top: 0; left: 0;
        width: 100%; height: 100%;
        background: #e9e9e9;
        overflow: hidden;
        z-index: 2;
    }
    .photo-frame .photo-bg img {
        width: 100%; height: 100%; object-fit: cover; display: block;
    }
    /* Bingkai hitam solid: muncul di sisi kanan & bawah foto, sedikit lebih besar dari foto */
    .photo-frame .photo-border {
        position: absolute;
        top: 14px; left: 14px;
        width: 100%; height: 100%;
        background: var(--black);
        z-index: 1;
    }

    /* Green blob besar di pojok kanan-bawah HERO (bukan nempel ke foto) */
    .blob {
        position: absolute; bottom: -60px; right: -60px;
        width: 220px; height: 140px;
        background: var(--green); border-radius: 60px;
        transform: rotate(-20deg); z-index: 0;
        opacity: .95;
    }
    .blob-sm {
        position: absolute; bottom: -10px; right: 90px;
        width: 90px; height: 55px;
        background: var(--green); border-radius: 35px;
        transform: rotate(-18deg); z-index: 0;
        opacity: .75;
    }

    /* Squiggle accent (SVG) — sekarang menumpuk di atas, kiri-atas foto, seperti referensi */
    .squiggle {
        position: absolute; top: -18px; left: 30%;
        z-index: 3;
    }

    /* Scroll ring */
    .scroll-ring {
        position: absolute; left: -70px; bottom: 50px;
        width: 80px; height: 80px;
    }
    .scroll-ring svg { width: 100%; height: 100%; animation: spin 8s linear infinite; }
    .scroll-ring-inner {
        position: absolute; inset: 0;
        display: flex; align-items: center; justify-content: center;
        font-size: .8rem; color: var(--muted);
    }
    @keyframes spin { to { transform: rotate(360deg); } }

    /* ── TICKER ─────────────────────────────────────────────────────── */
    .ticker {
        background: var(--black); color: #fff;
        padding: 16px 0; overflow: hidden;
        display: flex; white-space: nowrap;
    }
    .ticker-track {
        display: flex; gap: 0;
        animation: ticker 22s linear infinite;
    }
    .ticker-item {
        display: inline-flex; align-items: center; gap: 20px;
        padding: 0 32px; font-size: .9rem; font-weight: 500;
    }
    .ticker-star { color: var(--green); font-size: 1rem; }
    @keyframes ticker { from { transform: translateX(0); } to { transform: translateX(-50%); } }

    /* ── ABOUT PREVIEW ───────────────────────────────────────────────── */
    .about-preview {
        padding: 100px 5%;
        display: flex; align-items: center; gap: 80px;
        flex-wrap: wrap;
    }
    .about-preview .section-label {
        font-size: .75rem; font-weight: 700; letter-spacing: 2px;
        color: var(--green); text-transform: uppercase; margin-bottom: 12px;
    }
    .about-preview h2 {
        font-family: var(--font-display); font-size: clamp(1.8rem, 3vw, 2.6rem);
        font-weight: 800; line-height: 1.2; color: var(--black);
        letter-spacing: -1px; margin-bottom: 20px;
    }
    .about-preview p { font-size: .95rem; color: var(--muted); line-height: 1.75; max-width: 460px; }
    .stats-row { display: flex; gap: 40px; margin-top: 36px; }
    .stat-num {
        font-family: var(--font-display); font-size: 2.2rem; font-weight: 800;
        color: var(--black); line-height: 1;
    }
    .stat-num span { color: var(--green); }
    .stat-label { font-size: .8rem; color: var(--muted); margin-top: 4px; }

    /* ── SERVICES STRIP ───────────────────────────────────────────────── */
    .services-strip {
        padding: 100px 5%; background: var(--gray);
    }
    .services-strip .section-label {
        font-size: .75rem; font-weight: 700; letter-spacing: 2px;
        color: var(--green); text-transform: uppercase; margin-bottom: 12px;
    }
    .services-strip h2 {
        font-family: var(--font-display); font-size: clamp(1.8rem, 3vw, 2.6rem);
        font-weight: 800; letter-spacing: -1px; color: var(--black);
        margin-bottom: 48px;
    }
    .services-grid {
        display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
        gap: 20px;
    }
    .service-card {
        background: #fff; border-radius: 16px; padding: 32px 28px;
        border: 1.5px solid #ebebeb;
        transition: border-color .2s, transform .2s, box-shadow .2s;
    }
    .service-card:hover {
        border-color: var(--green); transform: translateY(-4px);
        box-shadow: 0 12px 32px rgba(0,200,150,.10);
    }
    .service-icon {
        width: 48px; height: 48px; border-radius: 12px;
        background: rgba(0,200,150,.12);
        display: flex; align-items: center; justify-content: center;
        font-size: 1.3rem; margin-bottom: 20px;
        color: var(--green);
    }
    .service-card h3 {
        font-family: var(--font-display); font-size: 1.05rem;
        font-weight: 700; margin-bottom: 10px; color: var(--black);
    }
    .service-card p { font-size: .875rem; color: var(--muted); line-height: 1.65; }

    /* ── RESPONSIVE ───────────────────────────────────────────────────── */
    @media (max-width: 900px) {
        .hero { flex-direction: column; text-align: center; padding-top: 40px; gap: 40px; }
        .hero-left { max-width: 100%; }
        .hero-desc { max-width: 100%; margin-left: auto; margin-right: auto; }
        .hero-cta  { justify-content: center; }
        .hero-social { justify-content: center; }
        .hero-right { justify-content: center; }
        .squiggle, .scroll-ring { display: none; }
        .about-preview { flex-direction: column; gap: 40px; }
    }
    @media (max-width: 480px) {
        .photo-frame { width: 260px; height: 310px; }
        .stats-row { gap: 24px; }
    }
</style>
@endpush

@section('content')

<section class="hero" id="home">
    <div class="hero-left">
        <div class="hero-badge">
            👋 Halo semua, saya Alfikar Radestian Prasenja
        </div>

        <h1>Back-End Dev &amp; <br>Pelajar <em>RPL</em></h1>

        <p class="hero-desc">
            Saya adalah siswa SMKN 2 Kota Sukabumi, jurusan Rekayasa Perangkat Lunak yang berfokus pada web development dan pembuatan aplikasi pemrograman. Senang mengeksplorasi arsitektur kode di framework Laravel, Visual Studio, hingga integrasi database.
        </p>

        <div class="hero-cta">
            <a href="{{ route('contact') }}" class="btn-primary">
                Hubungi Saya <i class="fas fa-arrow-up-right-from-square"></i>
            </a>
        </div>

        <div class="hero-social">
            <span>Temukan saya di:</span>
            <a href="https://github.com/Hanzo8885" target="_blank" rel="noopener noreferrer" class="social-icon" aria-label="GitHub"><i class="fab fa-github"></i></a>
        <a href="https://www.instagram.com/kinemon973" target="_blank" rel="noopener noreferrer" class="social-icon" aria-label="Instagram"> <i class="fab fa-instagram"></i></a>
          
        </div>
    </div>

    <div class="hero-right">
        <div class="photo-frame">
            <div class="squiggle">
                <svg width="60" height="40" viewBox="0 0 60 40" fill="none">
                    <path d="M5 35 Q15 5 30 20 Q45 35 55 5" stroke="#0D0D0D" stroke-width="3.5" stroke-linecap="round" fill="none"/>
                </svg>
            </div>

            <div class="photo-border"></div>
            <div class="photo-bg">
                <img src="{{ asset('images/photo.jpg') }}" alt="Alfikar Radestian Prasenja">
            </div>
        </div>

        <div class="blob"></div>
        <div class="blob-sm"></div>

        <div class="scroll-ring">
            <svg viewBox="0 0 100 100">
                <defs>
                    <path id="circle" d="M 50,50 m -37,0 a 37,37 0 1,1 74,0 a 37,37 0 1,1 -74,0"/>
                </defs>
                <text font-size="11.5" fill="#888" font-family="Inter,sans-serif" letter-spacing="3.5">
                    <textPath href="#circle">• gulir ke bawah • jelajahi lebih </textPath>
                </text>
            </svg>
            <div class="scroll-ring-inner">
                <i class="fas fa-arrow-down" style="color:var(--green);font-size:.9rem;"></i>
            </div>
        </div>
    </div>
</section>

<div class="ticker">
    <div class="ticker-track" id="tickerTrack">
        <div class="ticker-item">Laravel Web Development <span class="ticker-star">✦</span></div>
        <div class="ticker-item">Software Engineering <span class="ticker-star">✦</span></div>
        <div class="ticker-item">Database Management <span class="ticker-star">✦</span></div>
        <div class="ticker-item">API Testing with Postman <span class="ticker-star">✦</span></div>
        <div class="ticker-item">WordPress Development <span class="ticker-star">✦</span></div>
        <div class="ticker-item">UI/UX Design Figma <span class="ticker-star">✦</span></div>
        <div class="ticker-item">Laravel Web Development <span class="ticker-star">✦</span></div>
        <div class="ticker-item">Software Engineering <span class="ticker-star">✦</span></div>
        <div class="ticker-item">Database Management <span class="ticker-star">✦</span></div>
        <div class="ticker-item">API Testing with Postman <span class="ticker-star">✦</span></div>
        <div class="ticker-item">WordPress Development <span class="ticker-star">✦</span></div>
        <div class="ticker-item">UI/UX Design Figma <span class="ticker-star">✦</span></div>
    </div>
</div>


@endsection
