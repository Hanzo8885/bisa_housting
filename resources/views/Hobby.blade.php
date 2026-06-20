@extends('layouts.app')
@section('title', $title ?? 'Hobby – Alfikar Radestian Prasenja')

@push('styles')
<style>
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
    .page-hero p {
        color: var(--muted); font-size: .97rem; max-width: 480px;
        margin: 16px auto 0; line-height: 1.7;
    }

    /* ── HOBI GRID ── */
    .Hobby-wrap {
        padding: 80px 5%; max-width: 1100px; margin: 0 auto;
    }
    .Hobby-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
        gap: 24px;
    }
    .Hobby-card {
        background: #fff; border: 1.5px solid #ebebeb;
        border-radius: 18px; padding: 36px 30px;
        transition: border-color .25s, transform .25s, box-shadow .25s;
        position: relative; overflow: hidden;
    }
    .Hobby-card::before {
        content: '';
        position: absolute; top: 0; left: 0; right: 0; height: 4px;
        background: var(--green); border-radius: 18px 18px 0 0;
        transform: scaleX(0); transform-origin: left;
        transition: transform .3s ease;
    }
    .Hobby-card:hover {
        border-color: var(--green);
        transform: translateY(-5px);
        box-shadow: 0 16px 40px rgba(0,200,150,.10);
    }
    .Hobby-card:hover::before { transform: scaleX(1); }

    .Hobby-icon {
        font-size: 2.6rem; margin-bottom: 18px;
        display: block; line-height: 1;
    }
    .Hobby-card h3 {
        font-family: var(--font-display); font-size: 1.15rem;
        font-weight: 700; color: var(--black); margin-bottom: 10px;
    }
    .Hobby-card p {
        font-size: .875rem; color: var(--muted); line-height: 1.7;
    }
    .Hobby-tag {
        display: inline-block; margin-top: 16px;
        background: rgba(0,200,150,.10); color: var(--green);
        font-size: .75rem; font-weight: 600; letter-spacing: .5px;
        padding: 4px 12px; border-radius: 20px;
        text-transform: uppercase;
    }

    /* ── QUOTE SECTION ── */
    .Hobby-quote {
        margin-top: 72px; text-align: center;
        padding: 60px 5%; background: var(--gray);
        border-radius: 20px;
    }
    .Hobby-quote blockquote {
        font-family: var(--font-display); font-size: clamp(1.3rem, 2.5vw, 1.9rem);
        font-weight: 700; color: var(--black); letter-spacing: -.5px;
        max-width: 680px; margin: 0 auto 16px; line-height: 1.35;
    }
    .Hobby-quote blockquote em { color: var(--green); font-style: normal; }
    .Hobby-quote cite { font-size: .85rem; color: var(--muted); }
</style>
@endpush

@section('content')
<section class="page-hero">
    <div class="section-label">Hobby &amp; Minat</div>
    <h1>Hal-hal yang aku suka.</h1>
    <p>Di luar dunia desain dan kode, ini adalah aktivitas yang mengisi hari-hariku dengan semangat.</p>
</section>

<div class="Hobby-wrap">
    <div class="Hobby-grid">

      <div class="Hobby-card">
    <span class="Hobby-icon">🏊</span>
    <h3>Renang</h3>
    <p>Media utama saya untuk menjaga kebugaran tubuh sekaligus menyegarkan pikiran. Saya sangat menikmati tantangan fisik di dalam air yang melatih kekuatan dan fokus.</p>
    <span class="Hobby-tag">Olahraga</span>
</div>


<div class="Hobby-card">
    <span class="Hobby-icon">🏃‍♂️</span>
    <h3>Jogging</h3>
    <p>Cara andalan saya untuk menjaga kebugaran fisik dan melatih stamina di pagi atau sore hari. Aktivitas ini juga menjadi momen terbaik untuk menjernihkan pikiran dari rutinitas harian.</p>
    <span class="Hobby-tag">Olahraga</span>
</div>

<div class="Hobby-card">
    <span class="Hobby-icon">🎞️</span>
    <h3>Menonton Film</h3>
    <p>Gudang inspirasi bagi saya dalam mencari ide visual, efek suara, hingga penataan warna (tone). Alur cerita yang kuat sering kali memicu kreativitas untuk projek pribadi saya.</p>
    <span class="Hobby-tag">Seni</span>
</div>


<div class="Hobby-card">
    <span class="Hobby-icon">💻</span>
    <h3>Coding &amp; Web Dev</h3>
    <p>Membangun aplikasi web dan mengeksplorasi teknologi baru adalah hal yang selalu membuat saya bersemangat. Berfokus pada pengembangan dari HTML/CSS hingga framework Laravel.</p>
    <span class="Hobby-tag">Teknologi</span>
</div>

<div class="Hobby-card">
    <span class="Hobby-icon">🎮</span>
    <h3>Gaming</h3>
    <p>Sarana relaksasi yang efektif di kala senggang. Saya memiliki ketertarikan khusus pada game yang menyajikan jalan cerita yang mendalam serta desain antarmuka (UI) yang memanjakan mata.</p>
    <span class="Hobby-tag">Hiburan</span>
</div>

<div class="Hobby-card">
    <span class="Hobby-icon">🎵</span>
    <h3>Musik</h3>
    <p>Ritual harian yang wajib untuk menemani waktu produktif. Alunan musik Genre Indie Pop, Pop Rock, atau soundtrack film sangat ampuh membantu saya menjaga fokus saat sedang ngoding.</p>
    <span class="Hobby-tag">Hiburan</span>
</div>

    </div>

  <div class="Hobby-quote">
    <blockquote>
        "Coding bukan sekadar menulis baris kode — ini adalah seni <em>menyelesaikan masalah</em> dan membangun solusi."
    </blockquote>
    <cite>— Alfikar Radestian Prasenja</cite>
</div>
</div>
@endsection
