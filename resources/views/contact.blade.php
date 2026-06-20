@extends('layouts.app')
@section('title', $title ?? 'Contact – Alfikar Radestian Prasenja')

@push('styles')
<style>
    /* ── CONTACT LAYOUT (Unique to Contact) ──────────────────── */
    .contact-wrap {
        padding: 100px 5%;
        max-width: 1200px;
        margin: 0 auto;
        display: grid;
        grid-template-columns: 1fr 1.3fr;
        gap: 60px;
        align-items: center;
    }
    
    /* ── LEFT COLUMN (Unique to Contact) ────────────────────── */
    .contact-info .section-label {
        font-size: .75rem; font-weight: 700; letter-spacing: 2px;
        color: var(--green); text-transform: uppercase; margin-bottom: 12px;
    }
    .contact-info h1 {
        font-family: var(--font-display); font-size: clamp(2.4rem, 4.5vw, 3rem);
        font-weight: 800; color: var(--black); letter-spacing: -1px;
        line-height: 1.1; margin-bottom: 24px;
    }
    .contact-info p {
        color: var(--muted); line-height: 1.75; font-size: .95rem;
        margin-bottom: 48px; max-width: 480px;
    }
    
    /* Custom contact list with unique icons (Unique to Contact) */
    .contact-list { display: flex; flex-direction: column; gap: 20px; }
    .contact-item {
        display: flex;
        align-items: center;
        gap: 16px;
        color: var(--text);
        font-size: .95rem;
    }
    .contact-item .icon-box {
        width: 44px;
        height: 44px;
        border-radius: 12px;
        background: rgba(0,200,150,.10);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.1rem;
        color: var(--green);
    }
    .contact-item a { color: var(--text); text-decoration: none; transition: color .2s; }
    .contact-item a:hover { color: var(--green); }
    
    /* ── RIGHT COLUMN (Unique to Contact) ───────────────────── */
    /* Modern Form Design (Unique to Contact) */
    .contact-form {
        background: #fff;
        border-radius: 24px;
        padding: 48px;
        border: 1.5px solid #ebebeb;
        box-shadow: 0 10px 40px rgba(0,0,0,.03);
    }
    
    .form-group { margin-bottom: 28px; }
    .form-group label {
        display: block; font-size: .8rem; font-weight: 600;
        color: var(--text); margin-bottom: 8px; letter-spacing: .5px;
        text-transform: uppercase;
    }
    
    /* Modern inputs with background */
    .form-group input,
    .form-group textarea {
        width: 100%;
        padding: 14px 20px;
        border: 1.5px solid #e0e0e0;
        border-radius: 10px;
        font-family: var(--font-body);
        font-size: .9rem;
        color: var(--text);
        background: #fbfbfb;
        transition: border-color .2s, background .2s;
        box-sizing: border-box;
    }
    .form-group input:focus,
    .form-group textarea:focus {
        outline: none;
        border-color: var(--green);
        background: #fff;
    }
    
    .form-group textarea { min-height: 160px; resize: vertical; }
    
    /* Floating action button style for contact */
    .btn-send {
        background: var(--black);
        color: #fff;
        width: 100%;
        padding: 16px;
        border: none;
        border-radius: 12px;
        font-family: var(--font-body);
        font-size: .95rem;
        font-weight: 600;
        cursor: pointer;
        transition: transform .2s, background .2s;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
    }
    .btn-send:hover {
        background: #333;
        transform: translateY(-2px);
    }
    
    @media (max-width: 900px) {
        .contact-wrap { grid-template-columns: 1fr; gap: 60px; }
        .contact-form { padding: 30px; }
    }
</style>
@endpush

@section('content')

<div class="contact-wrap">
    
    <!-- Left Column (inspired by image_4.png) -->
    <aside class="contact-info">
        <span class="section-label">Kontak</span>
        <h1>Yuk,<br>berkolaborasi!</h1>
        <p>Punya ide proyek, sistem yang ingin dibangun, atau tertarik untuk berdiskusi seputar rekayasa perangkat lunak dan web development? Saya sangat terbuka untuk kesempatan magang (PKL), proyek kolaborasi, maupun diskusi teknologi.</p>
        
        <div class="contact-list">
            <div class="contact-item">
                <div class="icon-box"><i class="fas fa-envelope"></i></div>
                ohong02@gmail.com
            </div>
            <div class="contact-item">
                <div class="icon-box"><i class="fas fa-map-marker-alt"></i></div>
                Sukabumi, Jawa Barat, Indonesia
            </div>
            <div class="contact-item">
                <div class="icon-box"><i class="fab fa-github"></i></div>
                <a href="https://github.com/Hanzo8885" target="_blank" rel="noopener noreferrer">github.com/Hanzo8885</a>
            </div>
        </div>
    </aside>
    
    <!-- Right Column (Modern Form) (inspired by image_4.png) -->
    <form class="contact-form" method="POST" action="">
        @csrf
        
        <div class="form-group">
            <label for="name">Nama Lengkap</label>
            <input type="text" name="name" id="name" placeholder="John Doe" required>
        </div>
        
        <div class="form-group">
            <label for="email">Alamat Email</label>
            <input type="email" name="email" id="email" placeholder="kamu@contoh.com" required>
        </div>
        
        <div class="form-group">
            <label for="subject">Subjek</label>
            <input type="text" name="subject" id="subject" placeholder="Subjek pesanmu">
        </div>
        
        <div class="form-group">
            <label for="message">Pesan</label>
            <textarea name="message" id="message" placeholder="Tuliskan pesan atau detail proyekmu di sini..." required></textarea>
        </div>
        
        <button type="submit" class="btn-send">
            Kirim Pesan <i class="fas fa-paper-plane"></i>
        </button>
    </form>

</div>

@endsection