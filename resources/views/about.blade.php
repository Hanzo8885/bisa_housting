@extends('layouts.app')
@section('title', $title ?? 'About – Alfikar Radestian Prasenja')

@push('styles')
<style>
    /* ── PAGE HERO ─────────────────────────────────────────────── */
    .page-hero {
        padding: 80px 5% 60px;
        background: var(--gray);
        text-align: center;
    }
    .page-hero .section-label {
        font-size: .75rem; font-weight: 700; letter-spacing: 2px;
        color: var(--green); text-transform: uppercase; margin-bottom: 12px;
    }
    .page-hero h1 {
        font-family: var(--font-display); font-size: clamp(2rem, 4vw, 3rem);
        font-weight: 800; color: var(--black); letter-spacing: -1px;
    }

    /* ── ABOUT INTRO (foto + teks dua kolom) ──────────────────────── */
    .about-intro {
        padding: 90px 5% 40px;
        max-width: 1100px; margin: 0 auto;
        display: flex; align-items: flex-start; gap: 70px;
        flex-wrap: wrap;
    }
    .about-photo-col {
        flex: 0 0 300px;
        position: relative;
    }
    .about-photo-frame {
        position: relative; width: 100%; height: 360px;
    }
    .about-photo-frame .photo-border {
        position: absolute; top: 14px; left: 14px;
        width: 100%; height: 100%;
        background: var(--black);
        z-index: 1;
    }
    .about-photo-frame .photo-bg {
        position: absolute; top: 0; left: 0;
        width: 100%; height: 100%;
        background: #e9e9e9; overflow: hidden;
        z-index: 2;
    }
    .about-photo-frame .photo-bg img {
        width: 100%; height: 100%; object-fit: cover; display: block;
    }
    .about-photo-col .blob {
        position: absolute; bottom: -28px; right: -28px;
        width: 130px; height: 80px;
        background: var(--green); border-radius: 40px;
        transform: rotate(-18deg); z-index: 0;
        opacity: .9;
    }

    .about-text-col { flex: 1; min-width: 280px; }
    .about-text-col p {
        color: var(--muted); line-height: 1.8; margin-bottom: 18px;
        font-size: .98rem;
    }
    .about-text-col p:first-of-type {
        font-size: 1.08rem; color: var(--text); font-weight: 500;
    }

    /* Quote / highlight box untuk filosofi kerja */
    .about-quote {
        margin: 28px 0; padding: 22px 24px;
        background: var(--gray); border-left: 4px solid var(--green);
        border-radius: 0 12px 12px 0;
        font-size: .95rem; color: var(--text); line-height: 1.7;
        font-style: normal;
    }
    .about-quote i { color: var(--green); margin-right: 8px; }

    /* ── STATS STRIP ───────────────────────────────────────────── */
    .about-stats {
        max-width: 1100px; margin: 30px auto 0;
        padding: 0 5%;
        display: flex; gap: 40px; flex-wrap: wrap;
    }
    .about-stats .stat-num {
        font-family: var(--font-display); font-size: 2rem; font-weight: 800;
        color: var(--black); line-height: 1;
    }
    .about-stats .stat-num span { color: var(--green); }
    .about-stats .stat-label { font-size: .8rem; color: var(--muted); margin-top: 4px; }

    /* ── HOBBY CARDS ───────────────────────────────────────────── */
    .hobby-section {
        max-width: 1100px; margin: 0 auto; padding: 60px 5% 20px;
    }
    .hobby-section .sub-label {
        font-size: .75rem; font-weight: 700; letter-spacing: 2px;
        color: var(--green); text-transform: uppercase; margin-bottom: 8px;
    }
    .hobby-section h2 {
        font-family: var(--font-display); font-size: 1.5rem; font-weight: 800;
        color: var(--black); margin-bottom: 28px;
    }
    .hobby-grid {
        display: grid; grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
        gap: 16px;
    }
    .hobby-card {
        background: #fff; border: 1.5px solid #ebebeb; border-radius: 14px;
        padding: 24px 18px; text-align: center;
        transition: border-color .2s, transform .2s, box-shadow .2s;
    }
    .hobby-card:hover {
        border-color: var(--green); transform: translateY(-4px);
        box-shadow: 0 12px 28px rgba(0,200,150,.10);
    }
    .hobby-card .hobby-icon {
        width: 46px; height: 46px; margin: 0 auto 14px;
        border-radius: 12px; background: rgba(0,200,150,.12);
        display: flex; align-items: center; justify-content: center;
        font-size: 1.2rem; color: var(--green);
    }
    .hobby-card span {
        font-size: .85rem; font-weight: 600; color: var(--text);
    }

    /* ── SKILLS GRID (kartu, bukan pill polos) ───────────────────── */
    .skills-section {
        max-width: 1100px; margin: 0 auto; padding: 60px 5% 100px;
    }
    .skills-section .sub-label {
        font-size: .75rem; font-weight: 700; letter-spacing: 2px;
        color: var(--green); text-transform: uppercase; margin-bottom: 8px;
    }
    .skills-section h2 {
        font-family: var(--font-display); font-size: 1.5rem; font-weight: 800;
        color: var(--black); margin-bottom: 28px;
    }
    .skills-grid {
        display: grid; grid-template-columns: repeat(auto-fit, minmax(130px, 1fr));
        gap: 14px;
    }
    .skill-card {
        background: #fff; border: 1.5px solid #ebebeb; border-radius: 12px;
        padding: 18px 14px; text-align: center;
        transition: border-color .2s, transform .2s, box-shadow .2s;
    }
    .skill-card:hover {
        border-color: var(--green); transform: translateY(-3px);
        box-shadow: 0 10px 24px rgba(0,200,150,.10);
    }
    .skill-card i {
        font-size: 1.3rem; color: var(--green); margin-bottom: 10px; display: block;
    }
    .skill-card span {
        font-size: .82rem; font-weight: 600; color: var(--text);
    }

    /* ── RESPONSIVE ────────────────────────────────────────────── */
    @media (max-width: 800px) {
        .about-intro { flex-direction: column; align-items: center; text-align: center; gap: 40px; }
        .about-photo-col { flex: 0 0 auto; width: 280px; }
        .about-text-col p:first-of-type { font-size: 1rem; }
        .about-quote { text-align: left; }
        .about-stats { justify-content: center; }
    }
</style>
@endpush

@section('content')
<section class="page-hero">
    <div class="section-label">Tentang Saya</div>
    <h1>Siapa saya sebenarnya.</h1>
</section>

<div class="about-intro">
    <div class="about-photo-col">
        <div class="about-photo-frame">
            <div class="photo-border"></div>
            <div class="photo-bg">
                <img src="{{ asset('images/photo1.jpg') }}" alt="Alfikar Radestian Prasenja">
            </div>
        </div>
        <div class="blob"></div>
    </div>

    <div class="about-text-col">
        <p>
            Halo! Saya Alfikar Radestian Prasenja — seorang pelajar dari SMKN 2 Kota Sukabumi, Jawa Barat yang memiliki ketertarikan besar pada dunia pengembangan aplikasi dan teknologi web.
        </p>
        <p>
            Perjalanan saya dimulai dari rasa penasaran tentang bagaimana baris kode dan logika pemrograman bisa membangun sebuah sistem yang bermanfaat bagi banyak orang. Saat ini saya aktif mengasah kemampuan di bidang Software Engineering, berfokus pada pengembangan website menggunakan framework Laravel dan pengelolaan database.
        </p>

        <div class="about-quote">
            <i class="fas fa-quote-left"></i>Saya percaya bahwa sebuah aplikasi yang baik tidak hanya harus memiliki fungsi backend yang kuat dan aman, tetapi juga tampilan antarmuka yang rapi serta mudah digunakan.
        </div>

        <div class="about-stats">
            <div>
                <div class="stat-num">2<span>+</span></div>
                <div class="stat-label">Tahun Belajar</div>
            </div>
            <div>
                <div class="stat-num">5<span>+</span></div>
                <div class="stat-label">Proyek Selesai</div>
            </div>
            <div>
                <div class="stat-num">3<span>+</span></div>
                <div class="stat-label">Sertifikat</div>
            </div>
        </div>
    </div>
</div>


<section class="skills-section">
    <div class="sub-label">Yang Saya Kuasai</div>
    <h2>Kemampuan &amp; Alat Yang Saya Kuasai</h2>
    <div class="skills-grid">
        @php
            $skillIcons = [
                'Visual Studio Code' => 'fa-solid fa-code',
                'Visual Studio'      => 'fa-solid fa-laptop-code',
                'Laravel'            => 'fa-brands fa-laravel',
                'WordPress'          => 'fa-brands fa-wordpress',
                'Figma'              => 'fa-brands fa-figma',
                'Postman'            => 'fa-solid fa-paper-plane',
                'Canva'              => 'fa-solid fa-palette',
                'HTML/CSS'           => 'fa-brands fa-html5',
                'MySQL'              => 'fa-solid fa-database',
                'PHP'                => 'fa-brands fa-php',
            ];
        @endphp
        @foreach($skillIcons as $skill => $icon)
            <div class="skill-card">
                <i class="{{ $icon }}"></i>
                <span>{{ $skill }}</span>
            </div>
        @endforeach
    </div>
</section>
@endsection
