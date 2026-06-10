@extends('layouts.app')
@section('title', $title ?? 'Contact – Alfikar Radestian Prasenja')

@push('styles')
<style>
    /* ── CONTACT PAGE ─────────────────────────────────────────── */
    .contact-wrap {
        max-width: 1100px;
        margin: 0 auto;
        padding: 80px 5%;
        display: grid;
        grid-template-columns: 1fr 1.4fr;
        gap: 80px;
        align-items: flex-start;
    }

    /* ── LEFT: INFO ───────────────────────────────────────────── */
    .contact-info .section-label {
        font-size: .75rem; font-weight: 700; letter-spacing: 2px;
        color: var(--green); text-transform: uppercase; margin-bottom: 12px;
    }
    .contact-info h1 {
        font-family: var(--font-display);
        font-size: clamp(2rem, 3.5vw, 2.8rem);
        font-weight: 800; color: var(--black);
        letter-spacing: -1px; line-height: 1.15;
        margin-bottom: 20px;
    }
    .contact-info > p {
        color: var(--muted); line-height: 1.75; font-size: .95rem;
        margin-bottom: 32px;
    }
    .contact-detail {
        display: flex; align-items: center; gap: 12px;
        margin-top: 16px; color: var(--text); font-size: .9rem;
    }
    .contact-detail i { color: var(--green); width: 20px; text-align: center; }

    /* ── RIGHT: FORM ──────────────────────────────────────────── */
    .contact-form {
        background: #fff;
        border: 1.5px solid #ebebeb;
        border-radius: 20px;
        padding: 36px 40px;
        box-shadow: 0 8px 32px rgba(0,0,0,0.05);
    }

    /* Alert messages */
    .alert-success {
        background: #d1fae5; color: #065f46;
        padding: 14px 18px; border-radius: 10px;
        margin-bottom: 24px; font-size: .88rem;
        display: flex; align-items: center; gap: 8px;
    }
    .alert-error {
        background: #fee2e2; color: #991b1b;
        padding: 14px 18px; border-radius: 10px;
        margin-bottom: 24px; font-size: .88rem;
        display: flex; align-items: center; gap: 8px;
    }

    /* Form fields */
    .form-group { margin-bottom: 20px; }
    .form-group label {
        display: block; font-size: .78rem; font-weight: 600;
        color: var(--text); margin-bottom: 6px; letter-spacing: .5px;
        text-transform: uppercase;
    }
    .form-group input,
    .form-group textarea {
        width: 100%; padding: 12px 16px;
        border: 1.5px solid #e0e0e0; border-radius: 10px;
        font-family: var(--font-body); font-size: .9rem;
        color: var(--text); background: #fafafa; outline: none;
        transition: border-color .2s, background .2s;
        box-sizing: border-box;
    }
    .form-group input:focus,
    .form-group textarea:focus {
        border-color: var(--green); background: #fff;
    }
    .form-group textarea { min-height: 140px; resize: vertical; }

    .form-row { display: grid; grid-template-columns: 1fr 1fr; gap: 16px; }

    /* Submit button */
    .btn-submit {
        background: var(--black); color: #fff;
        width: 100%; padding: 14px;
        border: none; border-radius: 10px;
        font-family: var(--font-body); font-size: .95rem; font-weight: 600;
        cursor: pointer; transition: background .2s, transform .2s;
        display: flex; align-items: center; justify-content: center; gap: 8px;
        margin-top: 8px;
    }
    .btn-submit:hover { background: #333; transform: translateY(-2px); }

    /* ── RESPONSIVE ───────────────────────────────────────────── */
    @media (max-width: 900px) {
        .contact-wrap {
            grid-template-columns: 1fr;
            gap: 48px;
        }
    }
    @media (max-width: 560px) {
        .form-row { grid-template-columns: 1fr; }
        .contact-form { padding: 24px 20px; }
    }
</style>
@endpush

@section('content')
<div class="contact-wrap">

    {{-- ── LEFT: INFO ── --}}
    <div class="contact-info">
        <div class="section-label">Kontak</div>
        <h1>Yuk,<br>berkolaborasi!</h1>
        <p>Punya ide proyek, sistem yang ingin dibangun, atau tertarik untuk berdiskusi seputar rekayasa perangkat lunak dan web development? Saya sangat terbuka untuk kesempatan magang (PKL), proyek kolaborasi, maupun diskusi teknologi.</p>

        <div class="contact-detail">
            <i class="fas fa-envelope"></i>
            ohong02@gmail.com
        </div>
        <div class="contact-detail">
            <i class="fas fa-map-marker-alt"></i>
            Sukabumi, Jawa Barat, Indonesia
        </div>
        <div class="contact-detail">
            <i class="fab fa-github"></i>
            <a href="https://github.com/Hanzo8885" target="_blank" rel="noopener noreferrer"
               style="color:var(--text); text-decoration:none;">
                Github/in/Hanzo8885
            </a>
        </div>
    </div>

    {{-- ── RIGHT: FORM ── --}}
    <form class="contact-form" method="POST" action="{{ route('contact.send') }}">
        @csrf

        @if(session('success'))
            <div class="alert-success">
                ✅ {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="alert-error">
                ❌ {{ $errors->first() }}
            </div>
        @endif

        <div class="form-row">
            <div class="form-group">
                <label>Nama Depan</label>
                <input type="text" name="first_name"
                       placeholder="John"
                       value="{{ old('first_name') }}" required>
            </div>
            <div class="form-group">
                <label>Nama Belakang</label>
                <input type="text" name="last_name"
                       placeholder="Doe"
                       value="{{ old('last_name') }}" required>
            </div>
        </div>

        <div class="form-group">
            <label>Alamat Email</label>
            <input type="email" name="email"
                   placeholder="kamu@contoh.com"
                   value="{{ old('email') }}" required>
        </div>

        <div class="form-group">
            <label>Subjek</label>
            <input type="text" name="subject"
                   placeholder="Penawaran Magang / Pengembangan Aplikasi / Diskusi"
                   value="{{ old('subject') }}">
        </div>

        <div class="form-group">
            <label>Pesan</label>
            <textarea name="message"
                      placeholder="Ceritakan detail proyek atau rencana kolaborasimu di sini..."
                      required>{{ old('message') }}</textarea>
        </div>

        <button type="submit" class="btn-submit">
            Kirim Pesan <i class="fas fa-paper-plane"></i>
        </button>
    </form>

</div>
@endsection
