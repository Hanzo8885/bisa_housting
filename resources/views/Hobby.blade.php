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
        border-radius: 18px; padding: 32px 28px;
        transition: border-color .25s, transform .25s, box-shadow .25s;
        position: relative; overflow: hidden;
    }
    .Hobby-card::before {
        content: '';
        position: absolute; top: 0; left: 0; right: 0; height: 4px;
        background: var(--cat-color, var(--green)); border-radius: 18px 18px 0 0;
        transform: scaleX(0); transform-origin: left;
        transition: transform .3s ease;
    }
    .Hobby-card:hover {
        border-color: var(--cat-color, var(--green));
        transform: translateY(-5px);
        box-shadow: 0 16px 40px rgba(0,200,150,.10);
    }
    .Hobby-card:hover::before { transform: scaleX(1); }

    /* Ikon bundar berwarna, bukan emoji polos */
    .Hobby-icon {
        width: 56px; height: 56px; margin-bottom: 20px;
        border-radius: 14px;
        background: var(--cat-bg, rgba(0,200,150,.10));
        display: flex; align-items: center; justify-content: center;
        font-size: 1.5rem; color: var(--cat-color, var(--green));
        transition: transform .25s ease;
    }
    .Hobby-card:hover .Hobby-icon { transform: scale(1.08) rotate(-4deg); }

    .Hobby-card h3 {
        font-family: var(--font-display); font-size: 1.15rem;
        font-weight: 700; color: var(--black); margin-bottom: 10px;
    }
    .Hobby-card p {
        font-size: .875rem; color: var(--muted); line-height: 1.7;
        margin-bottom: 18px;
    }

    /* Footer kartu: tag + indikator intensitas */
    .Hobby-footer {
        display: flex; align-items: center; justify-content: space-between;
        gap: 10px; flex-wrap: wrap;
    }
    .Hobby-tag {
        display: inline-block;
        background: var(--cat-bg, rgba(0,200,150,.10));
        color: var(--cat-color, var(--green));
        font-size: .72rem; font-weight: 700; letter-spacing: .5px;
        padding: 5px 12px; border-radius: 20px;
        text-transform: uppercase;
    }
    .Hobby-intensity {
        display: flex; align-items: center; gap: 4px;
    }
    .Hobby-intensity .dot {
        width: 6px; height: 6px; border-radius: 50%;
        background: #e2e2e2;
    }
    .Hobby-intensity .dot.filled { background: var(--cat-color, var(--green)); }

    /* Variasi warna per kategori */
    .cat-olahraga { --cat-color: #1AA9E0; --cat-bg: rgba(26,169,224,.10); }
    .cat-seni     { --cat-color: #C24FD0; --cat-bg: rgba(194,79,208,.10); }
    .cat-teknologi{ --cat-color: #00C896; --cat-bg: rgba(0,200,150,.10); }
    .cat-hiburan  { --cat-color: #F2A93B; --cat-bg: rgba(242,169,59,.12); }

    /* ── QUOTE SECTION ── */
    .Hobby-quote {
        margin-top: 72px; text-align: center;
        padding: 60px 5%; background: var(--gray);
        border-radius: 20px;
        position: relative; overflow: hidden;
    }
    .Hobby-quote::before {
        content: '\201C';
        position: absolute; top: -10px; left: 50%;
        transform: translateX(-50%);
        font-family: Georgia, serif; font-size: 8rem;
        color: rgba(0,200,150,.08); line-height: 1;
    }
    .Hobby-quote blockquote {
        font-family: var(--font-display); font-size: clamp(1.3rem, 2.5vw, 1.9rem);
        font-weight: 700; color: var(--black); letter-spacing: -.5px;
        max-width: 680px; margin: 0 auto 16px; line-height: 1.35;
        position: relative; z-index: 1;
    }
    .Hobby-quote blockquote em { color: var(--green); font-style: normal; }
    .Hobby-quote cite { font-size: .85rem; color: var(--muted); position: relative; z-index: 1; }

    @media (max-width: 480px) {
        .Hobby-card { padding: 26px 22px; }
    }
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

      <div class="Hobby-card cat-olahraga">
        <div class="Hobby-icon"><i class="fa-solid fa-person-swimming"></i></div>
        <h3>Renang</h3>
        <p>Media utama saya untuk menjaga kebugaran tubuh sekaligus menyegarkan pikiran. Saya sangat menikmati tantangan fisik di dalam air yang melatih kekuatan dan fokus.</p>
        <div class="Hobby-footer">
            <span class="Hobby-tag">Olahraga</span>
            <div class="Hobby-intensity" title="Intensitas: Sering">
                <span class="dot filled"></span><span class="dot filled"></span><span class="dot filled"></span><span class="dot"></span>
            </div>
        </div>
      </div>

      <div class="Hobby-card cat-olahraga">
        <div class="Hobby-icon"><i class="fa-solid fa-person-running"></i></div>
        <h3>Jogging</h3>
        <p>Cara andalan saya untuk menjaga kebugaran fisik dan melatih stamina di pagi atau sore hari. Aktivitas ini juga menjadi momen terbaik untuk menjernihkan pikiran dari rutinitas harian.</p>
        <div class="Hobby-footer">
            <span class="Hobby-tag">Olahraga</span>
            <div class="Hobby-intensity" title="Intensitas: Sangat sering">
                <span class="dot filled"></span><span class="dot filled"></span><span class="dot filled"></span><span class="dot filled"></span>
            </div>
        </div>
      </div>

      <div class="Hobby-card cat-seni">
        <div class="Hobby-icon"><i class="fa-solid fa-film"></i></div>
        <h3>Menonton Film</h3>
        <p>Gudang inspirasi bagi saya dalam mencari ide visual, efek suara, hingga penataan warna (tone). Alur cerita yang kuat sering kali memicu kreativitas untuk projek pribadi saya.</p>
        <div class="Hobby-footer">
            <span class="Hobby-tag">Seni</span>
            <div class="Hobby-intensity" title="Intensitas: Cukup sering">
                <span class="dot filled"></span><span class="dot filled"></span><span class="dot"></span><span class="dot"></span>
            </div>
        </div>
      </div>

      <div class="Hobby-card cat-teknologi">
        <div class="Hobby-icon"><i class="fa-solid fa-code"></i></div>
        <h3>Coding &amp; Web Dev</h3>
        <p>Membangun aplikasi web dan mengeksplorasi teknologi baru adalah hal yang selalu membuat saya bersemangat. Berfokus pada pengembangan dari HTML/CSS hingga framework Laravel.</p>
        <div class="Hobby-footer">
            <span class="Hobby-tag">Teknologi</span>
            <div class="Hobby-intensity" title="Intensitas: Setiap hari">
                <span class="dot filled"></span><span class="dot filled"></span><span class="dot filled"></span><span class="dot filled"></span>
            </div>
        </div>
      </div>

      <div class="Hobby-card cat-hiburan">
        <div class="Hobby-icon"><i class="fa-solid fa-gamepad"></i></div>
        <h3>Gaming</h3>
        <p>Sarana relaksasi yang efektif di kala senggang. Saya memiliki ketertarikan khusus pada game yang menyajikan jalan cerita yang mendalam serta desain antarmuka (UI) yang memanjakan mata.</p>
        <div class="Hobby-footer">
            <span class="Hobby-tag">Hiburan</span>
            <div class="Hobby-intensity" title="Intensitas: Cukup sering">
                <span class="dot filled"></span><span class="dot filled"></span><span class="dot"></span><span class="dot"></span>
            </div>
        </div>
      </div>

      <div class="Hobby-card cat-hiburan">
        <div class="Hobby-icon"><i class="fa-solid fa-music"></i></div>
        <h3>Musik</h3>
        <p>Ritual harian yang wajib untuk menemani waktu produktif. Alunan musik Genre Indie Pop, Pop Rock, atau soundtrack film sangat ampuh membantu saya menjaga fokus saat sedang ngoding.</p>
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
