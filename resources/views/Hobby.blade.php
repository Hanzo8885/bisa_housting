@extends('layouts.app')
@section('title', $title ?? 'Hobby – Alfikar Radestian Prasenja')

@push('styles')
<style>
    /* ── GALERI WRAPPER (Unique to Hobby) ─────────────────── */
    .hobby-wrap {
        padding: 100px 5%;
        max-width: 1200px;
        margin: 0 auto;
    }
    
    /* Full-width header section */
    .hobby-header {
        text-align: center;
        margin-bottom: 70px;
    }
    .hobby-header .section-label {
        font-size: .75rem; font-weight: 700; letter-spacing: 2px;
        color: var(--green); text-transform: uppercase; margin-bottom: 12px;
        display: block;
    }
    .hobby-header h1 {
        font-family: var(--font-display); font-size: clamp(2.4rem, 4.5vw, 3.4rem);
        font-weight: 800; color: var(--black); letter-spacing: -1px;
    }
    .hobby-header p {
        color: var(--muted); font-size: .97rem; max-width: 500px;
        margin: 20px auto 0; line-height: 1.7;
    }
    
    /* ── HOBBY GRID (Unique to Hobby) ─────────────────────── */
    .hobby-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 30px;
    }
    
    /* Interactive Card with emoji (Unique to Hobby) */
    .hobby-card {
        background: #fff;
        border: 1.5px solid #ebebeb;
        border-radius: 20px;
        padding: 40px;
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
        transition: transform .25s, box-shadow .25s, border-color .25s;
        position: relative;
        overflow: hidden;
    }
    
    /* Line on hover */
    .hobby-card::before {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        height: 5px;
        background: var(--green);
        border-radius: 0 0 20px 20px;
        transform: scaleX(0);
        transform-origin: center;
        transition: transform .3s ease;
    }
    
    .hobby-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 16px 40px rgba(0,200,150,.08);
        border-color: var(--green);
    }
    .hobby-card:hover::before { transform: scaleX(1); }
    
    /* Emoji icon */
    .hobby-emoji {
        font-size: 3.5rem;
        margin-bottom: 24px;
        display: block;
        line-height: 1;
    }
    
    .hobby-card h3 {
        font-family: var(--font-display); font-size: 1.2rem;
        font-weight: 700; color: var(--black); margin-bottom: 12px;
    }
    .hobby-card p {
        font-size: .9rem; color: var(--muted); line-height: 1.7;
    }
    
    /* Category tag */
    .hobby-category {
        display: inline-block;
        margin-top: 18px;
        background: rgba(0,200,150,.10);
        color: var(--green);
        font-size: .75rem;
        font-weight: 600;
        letter-spacing: .5px;
        padding: 5px 14px;
        border-radius: 20px;
        text-transform: uppercase;
    }
    
    @media (max-width: 640px) {
        .hobby-grid { gap: 20px; }
    }
</style>
@endpush

@section('content')

<div class="hobby-wrap">
    
    <!-- Page Header (inspired by image_3.png) -->
    <header class="hobby-header">
        <span class="section-label">Hal-hal yang aku suka.</span>
        <h1>Hobby & Minat</h1>
        <p>Di luar dunia desain dan kode, ini adalah aktivitas yang mengisi hari-hariku dengan semangat.</p>
    </header>

    <!-- Hobby Grid with unique cards -->
    <div class="hobby-grid">
        
        <div class="hobby-card">
            <span class="hobby-emoji">🏊‍♂️</span>
            <h3>Renang</h3>
            <p>Media utama saya untuk menjaga kebugaran tubuh sekaligus menyegarkan pikiran. Saya sangat menikmati tantangan fisik di dalam air.</p>
            <span class="hobby-category">Olahraga</span>
        </div>
        
        <div class="hobby-card">
            <span class="hobby-emoji">🏃‍♂️</span>
            <h3>Jogging</h3>
            <p>Cara andalan saya untuk menjaga stamina di pagi atau sore hari. Aktivitas ini menjadi momen terbaik untuk menjernihkan pikiran.</p>
            <span class="hobby-category">Olahraga</span>
        </div>
        
        <div class="hobby-card">
            <span class="hobby-emoji">🎞️</span>
            <h3>Menonton Film</h3>
            <p>Gudang inspirasi saya dalam mencari ide visual, efek suara, hingga penataan warna. Memicu kreativitas untuk projek pribadi saya.</p>
            <span class="hobby-category">Seni</span>
        </div>
        
        <div class="hobby-card">
            <span class="hobby-emoji">🎮</span>
            <h3>Gaming</h3>
            <p>Sarana relaksasi yang efektif di kala senggang, dengan ketertarikan pada game yang menyajikan cerita mendalam.</p>
            <span class="hobby-category">Hiburan</span>
        </div>
        
        <div class="hobby-card">
            <span class="hobby-emoji">🎵</span>
            <h3>Musik</h3>
            <p>Ritual harian untuk menemani waktu produktif, dengan genre Indie Pop, Pop Rock, atau soundtrack film.</p>
            <span class="hobby-category">Hiburan</span>
        </div>
        
    </div>

</div>

@endsection