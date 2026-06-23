@extends('layouts.app')
@section('title', $title ?? 'Hobby – Alfikar Radestian Prasenja')

@push('styles')
<style>
    /* ── BASE & HERO ── */
    .page-hero {
        padding: 80px 5% 60px;
        background: var(--gray, #f8f9fa);
        text-align: center;
    }
    .page-hero .section-label {
        font-size: .75rem; font-weight: 700; letter-spacing: 2px;
        color: var(--green, #00C896); text-transform: uppercase; margin-bottom: 12px;
    }
    .page-hero h1 {
        font-family: var(--font-display, sans-serif); font-size: clamp(2rem, 4vw, 3rem);
        font-weight: 800; color: var(--black, #111); letter-spacing: -1px;
    }
    .page-hero p {
        color: var(--muted, #64748b); font-size: 1rem; max-width: 500px;
        margin: 16px auto 0; line-height: 1.7;
    }

    /* ── HOBI GRID (TANPA FOTO) ── */
    .Hobby-wrap {
        padding: 60px 5% 100px; 
        max-width: 1100px; 
        margin: 0 auto;
    }
    .Hobby-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 30px;
    }

    /* ── CARD STYLING ── */
    .Hobby-card {
        background: #ffffff;
        border-radius: 20px;
        padding: 36px 30px;
        position: relative;
        display: flex; 
        flex-direction: column;
        border: 1px solid rgba(0,0,0,0.04);
        box-shadow: 0 10px 30px rgba(0,0,0,0.03);
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        overflow: hidden;
        z-index: 1;
    }

    /* Garis atas aksen warna */
    .Hobby-card::before {
        content: '';
        position: absolute; top: 0; left: 0; right: 0; height: 5px;
        background: var(--cat-color);
    }

    /* Efek Hover: Kartu Terangkat */
    .Hobby-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 40px rgba(0,0,0,0.08);
        border-color: rgba(0,0,0,0.08);
    }

    /* Pembungkus Ikon Modern */
    .Hobby-icon-wrapper {
        width: 64px; height: 64px;
        border-radius: 16px;
        background: var(--cat-bg);
        color: var(--cat-color);
        display: flex; align-items: center; justify-content: center;
        font-size: 1.8rem;
        margin-bottom: 24px;
        transition: transform 0.3s ease;
    }
    .Hobby-card:hover .Hobby-icon-wrapper {
        transform: scale(1.1) rotate(5deg);
    }

    /* Teks dalam kartu */
    .Hobby-card h3 {
        font-family: var(--font-display, sans-serif); 
        font-size: 1.3rem; font-weight: 700; 
        color: var(--black, #1e293b); 
        margin-bottom: 12px;
    }
    .Hobby-card p {
        font-size: 0.95rem; color: var(--muted, #64748b); 
        line-height: 1.6; margin-bottom: 24px;
        flex-grow: 1; /* Mendorong footer ke bawah jika teks pendek */
    }

    /* Footer Kartu */
    .Hobby-footer {
        display: flex; align-items: center; justify-content: space-between;
        padding-top: 20px;
        border-top: 1px solid rgba(0,0,0,0.06);
    }
    
    /* Tag Kategori Elegan */
    .Hobby-tag {
        font-size: 0.75rem; font-weight: 700; letter-spacing: 1px;
        color: var(--cat-color);
        text-transform: uppercase;
    }

    /* Titik Intensitas */
    .Hobby-intensity { display: flex; align-items: center; gap: 5px; }
    .Hobby-intensity .dot {
        width: 8px; height: 8px; border-radius: 50%;
        background: #e2e8f0;
    }
    .Hobby-intensity .dot.filled { 
        background: var(--cat-color); 
    }

    /* ── VARIABLE WARNA KATEGORI (Teks & Background Soft) ── */
    .cat-olahraga  { --cat-color: #0ea5e9; --cat-bg: rgba(14, 165, 233, 0.12); } /* Biru */
    .cat-seni      { --cat-color: #d946ef; --cat-bg: rgba(217, 70, 239, 0.12); } /* Pink/Ungu */
    .cat-teknologi { --cat-color: #10b981; --cat-bg: rgba(16, 185, 129, 0.12); } /* Hijau */
    .cat-hiburan   { --cat-color: #f59e0b; --cat-bg: rgba(245, 158, 11, 0.12); } /* Orange/Emas */

    /* ── QUOTE SECTION ── */
    .Hobby-quote {
        margin-top: 20px; text-align: center;
        padding: 60px 5%; background: var(--gray, #f8f9fa);
        border-radius: 20px; border: 1px solid rgba(0,0,0,0.04);
        position: relative; overflow: hidden;
    }
    .Hobby-quote::before {
        content: '\201C';
        position: absolute; top: -20px; left: 50%;
        transform: translateX(-50%);
        font-family: Georgia, serif; font-size: 10rem;
        color: rgba(0,0,0,0.03); line-height: 1;
    }
    .Hobby-quote blockquote {
        font-family: var(--font-display, sans-serif); font-size: clamp(1.2rem, 2.5vw, 1.8rem);
        font-weight: 700; color: var(--black, #1e293b); letter-spacing: -.5px;
        max-width: 700px; margin: 0 auto 16px; line-height: 1.4;
        position: relative; z-index: 1;
    }
    .Hobby-quote blockquote em { color: var(--green, #00C896); font-style: normal; }
    .Hobby-quote cite { font-size: .9rem; color: var(--muted, #64748b); font-weight: 600; position: relative; z-index: 1; }

    @media (max-width: 600px) {
        .Hobby-grid { grid-template-columns: 1fr; }
        .Hobby-card { padding: 30px 24px; }
    }
</style>
@endpush

@section('content')
<section class="page-hero">
    <div class="section-label">Hobby &amp; Minat</div>
    <h1>Hal-hal yang aku suka.</h1>
    <p>Di luar dunia desain dan kode, ini adalah aktivitas yang mengisi hari-hariku dengan semangat dan kreativitas baru.</p>
</section>

<div class="Hobby-wrap">
    <div class="Hobby-grid">

      <div class="Hobby-card cat-olahraga">
        <div class="Hobby-icon-wrapper"><i class="fa-solid fa-person-swimming"></i></div>
        <h3>Renang</h3>
        <p>Media utama saya untuk menjaga kebugaran tubuh sekaligus menyegarkan pikiran. Sangat menikmati tantangan fisik di dalam air.</p>
        <div class="Hobby-footer">
            <span class="Hobby-tag">Olahraga</span>
            <div class="Hobby-intensity" title="Intensitas: Sering">
                <span class="dot filled"></span><span class="dot filled"></span><span class="dot filled"></span><span class="dot"></span>
            </div>
        </div>
      </div>

      <div class="Hobby-card cat-olahraga">
        <div class="Hobby-icon-wrapper"><i class="fa-solid fa-person-running"></i></div>
        <h3>Jogging</h3>
        <p>Cara andalan menjaga fisik di pagi hari. Aktivitas ini menjadi momen terbaik untuk menjernihkan pikiran dari rutinitas harian.</p>
        <div class="Hobby-footer">
            <span class="Hobby-tag">Olahraga</span>
            <div class="Hobby-intensity" title="Intensitas: Sangat sering">
                <span class="dot filled"></span><span class="dot filled"></span><span class="dot filled"></span><span class="dot filled"></span>
            </div>
        </div>
      </div>

      <div class="Hobby-card cat-seni">
        <div class="Hobby-icon-wrapper"><i class="fa-solid fa-film"></i></div>
        <h3>Menonton Film</h3>
        <p>Gudang inspirasi mencari ide visual dan efek suara. Alur cerita yang kuat sering kali memicu kreativitas untuk projek pribadi.</p>
        <div class="Hobby-footer">
            <span class="Hobby-tag">Seni</span>
            <div class="Hobby-intensity" title="Intensitas: Cukup sering">
                <span class="dot filled"></span><span class="dot filled"></span><span class="dot"></span><span class="dot"></span>
            </div>
        </div>
      </div>

      <div class="Hobby-card cat-teknologi">
        <div class="Hobby-icon-wrapper"><i class="fa-solid fa-code"></i></div>
        <h3>Coding &amp; Web Dev</h3>
        <p>Membangun aplikasi web dan mengeksplorasi teknologi baru. Berfokus pada pengembangan UI modern hingga framework Laravel.</p>
        <div class="Hobby-footer">
            <span class="Hobby-tag">Teknologi</span>
            <div class="Hobby-intensity" title="Intensitas: Setiap hari">
                <span class="dot filled"></span><span class="dot filled"></span><span class="dot filled"></span><span class="dot filled"></span>
            </div>
        </div>
      </div>

      <div class="Hobby-card cat-hiburan">
        <div class="Hobby-icon-wrapper"><i class="fa-solid fa-gamepad"></i></div>
        <h3>Gaming</h3>
        <p>Sarana relaksasi di kala senggang. Sangat tertarik pada game dengan jalan cerita mendalam dan antarmuka UI yang memanjakan mata.</p>
        <div class="Hobby-footer">
            <span class="Hobby-tag">Hiburan</span>
            <div class="Hobby-intensity" title="Intensitas: Cukup sering">
                <span class="dot filled"></span><span class="dot filled"></span><span class="dot"></span><span class="dot"></span>
            </div>
        </div>
      </div>

      <div class="Hobby-card cat-hiburan">
        <div class="Hobby-icon-wrapper"><i class="fa-solid fa-music"></i></div>
        <h3>Musik</h3>
        <p>Ritual wajib untuk produktivitas. Alunan Genre Indie Pop atau Pop Rock sangat ampuh membantu saya menjaga fokus saat ngoding.</p>
        <div class="Hobby-footer">
            <span class="Hobby-tag">Hiburan</span>
            <div class="Hobby-intensity" title="Intensitas: Setiap hari">
                <span class="dot filled"></span><span class="dot filled"></span><span class="dot filled"></span><span class="dot filled"></span>
            </div>
        </div>
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