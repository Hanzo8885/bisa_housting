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

    /* Kartu dengan foto sebagai background penuh */
    .Hobby-card {
        position: relative;
        border-radius: 18px;
        overflow: hidden;
        min-height: 320px;
        display: flex; flex-direction: column; justify-content: flex-end;
        padding: 26px 24px;
        transition: transform .3s ease, box-shadow .3s ease;
        isolation: isolate;
    }
    .Hobby-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 20px 44px rgba(0,0,0,.22);
    }
    .Hobby-card:hover .Hobby-photo { transform: scale(1.07); }

    /* layer foto, dipisah dari overlay supaya bisa zoom saat hover tanpa kena overlay */
    .Hobby-photo {
        position: absolute; inset: 0;
        background-size: cover; background-position: center;
        transition: transform .5s ease;
        z-index: 0;
    }

    /* gradient gelap di bawah agar teks selalu terbaca */
    .Hobby-card::before {
        content: '';
        position: absolute; inset: 0;
        background: linear-gradient(180deg, rgba(13,13,13,0) 30%, rgba(13,13,13,.78) 100%);
        z-index: 1;
        transition: background .3s ease;
    }
    .Hobby-card:hover::before {
        background: linear-gradient(180deg, rgba(13,13,13,.05) 20%, rgba(13,13,13,.88) 100%);
    }

    /* garis aksen warna kategori di atas kartu */
    .Hobby-card::after {
        content: '';
        position: absolute; top: 0; left: 0; right: 0; height: 4px;
        background: var(--cat-color, var(--green));
        z-index: 2;
    }

    .Hobby-card > * { position: relative; z-index: 2; }

    .Hobby-icon-chip {
        position: absolute; top: 18px; right: 18px; z-index: 3;
        width: 38px; height: 38px; border-radius: 10px;
        background: rgba(255,255,255,.92);
        display: flex; align-items: center; justify-content: center;
        font-size: 1rem; color: var(--cat-color, var(--green));
        backdrop-filter: blur(4px);
    }

    .Hobby-card h3 {
        font-family: var(--font-display); font-size: 1.2rem;
        font-weight: 700; color: #fff; margin-bottom: 8px;
        text-shadow: 0 2px 8px rgba(0,0,0,.25);
    }
    .Hobby-card p {
        font-size: .85rem; color: rgba(255,255,255,.88); line-height: 1.6;
        margin-bottom: 16px;
    }

    .Hobby-footer {
        display: flex; align-items: center; justify-content: space-between;
        gap: 10px; flex-wrap: wrap;
    }
    .Hobby-tag {
        display: inline-block;
        background: rgba(255,255,255,.18);
        border: 1px solid rgba(255,255,255,.35);
        color: #fff;
        font-size: .7rem; font-weight: 700; letter-spacing: .5px;
        padding: 5px 12px; border-radius: 20px;
        text-transform: uppercase;
        backdrop-filter: blur(2px);
    }
    .Hobby-intensity { display: flex; align-items: center; gap: 4px; }
    .Hobby-intensity .dot {
        width: 6px; height: 6px; border-radius: 50%;
        background: rgba(255,255,255,.3);
    }
    .Hobby-intensity .dot.filled { background: #fff; }

    /* Variasi warna aksen per kategori (untuk garis atas & ikon chip) */
    .cat-olahraga  { --cat-color: #3AC0F0; }
    .cat-seni      { --cat-color: #D875E0; }
    .cat-teknologi { --cat-color: #00E0A8; }
    .cat-hiburan   { --cat-color: #FFC25C; }

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
        .Hobby-card { min-height: 260px; padding: 22px 20px; }
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
        <div class="Hobby-photo" style="background-image:url('{{ asset('images/hobby/renang.jpg') }}')"></div>
        <div class="Hobby-icon-chip"><i class="fa-solid fa-person-swimming"></i></div>
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
       <div class="Hobby-photo" style="background-image:url('{{ asset('images/hobby/jogging.jpg') }}')"></div>
        <div class="Hobby-icon-chip"><i class="fa-solid fa-person-running"></i></div>
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
           <div class="Hobby-photo" style="background-image:url('{{ asset('images/hobby/film.jpg') }}')"></div>
        <div class="Hobby-icon-chip"><i class="fa-solid fa-film"></i></div>
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
         <div class="Hobby-photo" style="background-image:url('{{ asset('images/hobby/web.jpeg') }}')"></div>
        <div class="Hobby-icon-chip"><i class="fa-solid fa-code"></i></div>
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
           <div class="Hobby-photo" style="background-image:url('{{ asset('images/hobby/gaming.jpg') }}')"></div>
        <div class="Hobby-icon-chip"><i class="fa-solid fa-gamepad"></i></div>
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
       <div class="Hobby-photo" style="background-image:url('{{ asset('images/hobby/musik.jpeg') }}')"></div>
        <div class="Hobby-icon-chip"><i class="fa-solid fa-music"></i></div>
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

