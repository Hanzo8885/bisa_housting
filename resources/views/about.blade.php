@extends('layouts.app')
@section('title', $title ?? 'About – Alfikar Radestian Prasenja')

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
    .about-body {
        padding: 80px 5%; max-width: 800px; margin: 0 auto;
    }
    .about-body p { color: var(--muted); line-height: 1.8; margin-bottom: 20px; }
    .skills-grid {
        display: flex; flex-wrap: wrap; gap: 10px; margin-top: 32px;
    }
    .skill-tag {
        background: var(--gray); border: 1.5px solid #e0e0e0;
        border-radius: 8px; padding: 7px 16px;
        font-size: .85rem; font-weight: 500; color: var(--text);
        transition: border-color .2s, color .2s;
    }
    .skill-tag:hover { border-color: var(--green); color: var(--green); }
</style>
@endpush

@section('content')
<section class="page-hero">
    <div class="section-label">Tentang Saya</div>
    <h1>Siapa saya sebenarnya.</h1>
</section>

<div class="about-body">
    <p>
        Halo! Saya Alfikar Radestian Prasenja — seorang pelajar dari SMKN 2 Kota Sukabumi, Jawa Barat yang memiliki ketertarikan besar pada dunia pengembangan aplikasi dan teknologi web. Perjalanan saya dimulai dari rasa penasaran tentang bagaimana baris kode dan logika pemrograman bisa membangun sebuah sistem yang bermanfaat bagi banyak orang.
    </p>
    <p>
        Saat ini saya aktif mengasah kemampuan di bidang Software Engineering, berfokus pada pengembangan website menggunakan framework Laravel dan pengelolaan database. Saya percaya bahwa sebuah aplikasi yang baik tidak hanya harus memiliki fungsi backend yang kuat dan aman, tetapi juga tampilan antarmuka yang rapi serta mudah digunakan.
    </p>
    <p>
        Di luar aktivitas ngoding, saya aktif menjaga kebugaran dengan berenang dan jogging. Saya juga gemar menonton film untuk mencari inspirasi visual, mendengarkan musik Genre Indie Pop dan Pop Rock saat fokus bekerja, membaca buku pengembangan diri, serta sesekali mengeksplorasi dunia gaming.
    </p>

    <h2 style="font-family:var(--font-display);font-size:1.4rem;font-weight:700;margin:40px 0 16px;color:var(--black);">
        Skills &amp; Tools
    </h2>
    <div class="skills-grid">
        @foreach(['Visual Studio Code', 'Visual Studio', 'Laravel', 'WordPress', 'Figma', 'Postman', 'Canva', 'HTML/CSS', 'MySQL', 'PHP'] as $skill)
            <span class="skill-tag">{{ $skill }}</span>
        @endforeach
    </div>
</div>
@endsection
