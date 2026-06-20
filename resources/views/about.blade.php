@extends('layouts.app')
@section('title', $title ?? 'About – Alfikar Radestian Prasenja')

@push('styles')
<style>
    /* ── ARTICLE-STYLE LAYOUT (Unique to About) ─────────────────── */
    .about-wrap {
        padding: 100px 5%;
        max-width: 900px;
        margin: 0 auto;
    }
    
    /* Narration section - focus on readability */
    .about-narration {
        margin-bottom: 60px;
    }
    .about-narration h1 {
        font-family: var(--font-display);
        font-size: clamp(2.4rem, 4.5vw, 3.4rem);
        font-weight: 800;
        color: var(--black);
        letter-spacing: -1px;
        margin-bottom: 24px;
        line-height: 1.1;
    }
    .about-narration h1 em { font-style: normal; color: var(--green); }
    
    .about-narration p {
        color: var(--text);
        line-height: 1.9;
        margin-bottom: 24px;
        font-size: 1.05rem;
    }
    
    /* Sub-section with color bg (Unique to About) */
    .about-skills-tools {
        padding: 80px 5%;
        background: var(--gray); /* Gray section */
        border-radius: 24px;
        margin-top: 60px;
    }
    .about-skills-tools h2 {
        font-family: var(--font-display);
        font-size: 1.5rem;
        font-weight: 700;
        margin-bottom: 32px;
        color: var(--black);
        text-align: center;
    }
    
    /* Interactive Skills tags (Unique to About) */
    .skills-flex {
        display: flex;
        flex-wrap: wrap;
        gap: 12px;
        justify-content: center;
    }
    .skill-badge {
        background: #fff;
        border: 1.5px solid #e0e0e0;
        border-radius: 12px;
        padding: 10px 20px;
        font-size: .88rem;
        font-weight: 500;
        color: var(--text);
        transition: border-color .2s, color .2s, transform .2s;
    }
    .skill-badge:hover {
        border-color: var(--green);
        color: var(--green);
        transform: translateY(-2px);
    }
    
    @media (max-width: 640px) {
        .about-wrap { padding: 60px 5%; }
        .about-skills-tools { padding: 50px 5%; }
    }
</style>
@endpush

@section('content')

<div class="about-wrap">
    
    <!-- Narrative Section -->
    <section class="about-narration">
        <h1>Siapa saya<em> sebenarnya.</em></h1>
        
        <p>
            Halo! Saya Alfikar Radestian Prasenja — seorang pelajar dari SMKN 2 Kota Sukabumi, Jawa Barat yang memiliki ketertarikan besar pada dunia pengembangan aplikasi dan teknologi web. Perjalanan saya dimulai dari rasa penasaran tentang bagaimana baris kode dan logika pemrograman bisa membangun sebuah sistem yang bermanfaat bagi banyak orang.
        </p>
        <p>
            Saat ini saya aktif mengasah kemampuan di bidang Software Engineering, berfokus pada pengembangan website menggunakan framework Laravel dan pengelolaan database. Saya percaya bahwa sebuah aplikasi yang baik tidak hanya harus memiliki fungsi backend yang kuat dan aman, tetapi juga tampilan antarmuka yang rapi serta mudah digunakan.
        </p>
        <p>
            Di luar aktivitas ngoding, saya aktif menjaga kebugaran dengan berenang dan jogging. Saya juga gemar menonton film untuk mencari inspirasi visual, mendengarkan musik Genre Indie Pop dan Pop Rock saat fokus bekerja, membaca buku pengembangan diri, serta sesekali mengeksplorasi dunia gaming.
        </p>
    </section>

    <!-- Skills & Tools Section with Color Background -->
    <section class="about-skills-tools">
        <h2>Skills & Tools</h2>
        <div class="skills-flex">
            @foreach(['Visual Studio Code', 'Visual Studio', 'Laravel', 'WordPress', 'Figma', 'Postman', 'Canva', 'HTML/CSS', 'MySQL', 'PHP'] as $skill)
                <span class="skill-badge">{{ $skill }}</span>
            @endforeach
        </div>
    </section>

</div>

@endsection