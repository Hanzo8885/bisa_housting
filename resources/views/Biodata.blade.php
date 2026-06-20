@extends('layouts.app')
@section('title', $title ?? 'Biodata – Alfikar Radestian Prasenja')

@push('styles')
<style>
    /* ── BIODATA WRAPPER (Unique to Biodata) ──────────────────── */
    .biodata-page-wrap {
        padding: 100px 5%;
        max-width: 1000px;
        margin: 0 auto;
    }
    
    /* ── FLOATING PROFILE CARD (Unique to Biodata) ────────────── */
    .profile-card {
        background: #fff;
        border: 1.5px solid #ebebeb;
        border-radius: 24px;
        padding: 48px;
        display: grid;
        grid-template-columns: 200px 1fr;
        gap: 48px;
        box-shadow: 0 10px 40px rgba(0,0,0,.05); /* Floating shadow */
        margin-bottom: 60px;
    }
    
    .profile-left {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 20px;
    }
    
    /* Square photo frame for the card */
    .card-photo-frame {
        width: 180px;
        height: 180px;
        border-radius: 18px;
        background: #f0f0f0;
        overflow: hidden;
        border: 2px solid #e9e9e9;
    }
    .card-photo-frame img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    
    /* Social media links below photo on card */
    .card-social {
        display: flex;
        gap: 12px;
        font-size: 1.1rem;
        color: var(--muted);
    }
    .card-social a { color: var(--muted); text-decoration: none; transition: color .2s; }
    .card-social a:hover { color: var(--green); }

    .profile-right h1 {
        font-family: var(--font-display);
        font-size: 2.2rem;
        font-weight: 800;
        color: var(--black);
        letter-spacing: -1px;
        margin-bottom: 6px;
    }
    .profile-right .role {
        font-size: 1rem;
        color: var(--green);
        font-weight: 600;
        margin-bottom: 24px;
    }
    
    /* Flat layout for details table */
    .details-table {
        width: 100%;
        border-collapse: collapse;
    }
    .details-table td {
        padding: 12px 0;
        border-bottom: 1px solid #f0f0f0;
        font-size: .92rem;
        line-height: 1.6;
    }
    .details-table td:first-child {
        font-weight: 600;
        color: var(--text);
        width: 160px;
        padding-right: 20px;
    }
    .details-table td:last-child { color: var(--muted); }
    .details-table tr:last-child td { border-bottom: none; }

    /* ── TIMELINE SECTION (Unique to Biodata) ────────────────── */
    .biodata-timeline h2 {
        font-family: var(--font-display);
        font-size: 1.6rem;
        font-weight: 700;
        color: var(--black);
        margin-bottom: 32px;
        margin-top: 40px;
    }
    
    .timeline { display: flex; flex-direction: column; gap: 20px; }
    .timeline-item {
        display: grid;
        grid-template-columns: 20px 1fr;
        gap: 20px;
        align-items: flex-start;
    }
    
    /* Green dot marker */
    .timeline-dot {
        width: 14px;
        height: 14px;
        border-radius: 50%;
        background: var(--green);
        margin-top: 6px;
        box-shadow: 0 0 0 4px rgba(0,200,150,.15);
    }
    
    .timeline-content h4 {
        font-weight: 700;
        color: var(--black);
        font-size: .98rem;
        margin-bottom: 4px;
    }
    .timeline-content span {
        font-size: .85rem;
        color: var(--muted);
    }

    /* ── RESPONSIVE ─────────────────────────────────────────── */
    @media (max-width: 800px) {
        .profile-card {
            grid-template-columns: 1fr;
            padding: 30px;
            text-align: center;
        }
        .details-table td:first-child { width: auto; padding-right: 0; display: block; margin-bottom: 4px;}
        .details-table td { display: block; border-bottom: none; padding: 10px 0; }
        .details-table td:last-child { color: var(--text); border-bottom: 1px solid #f0f0f0; padding-bottom: 15px;}
    }
</style>
@endpush

@section('content')

<div class="biodata-page-wrap">
    
    <!-- Floating Profile Card -->
    <section class="profile-card">
        <div class="profile-left">
            <div class="card-photo-frame">
                <img src="{{ asset('images/photo.jpg') }}" alt="Alfikar Radestian Prasenja">
            </div>
            <div class="card-social">
                <a href="https://github.com/Hanzo8885" target="_blank" aria-label="GitHub"><i class="fab fa-github"></i></a>
                <a href="https://instagram.com/kinemon973" target="_blank" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
            </div>
        </div>
        
        <div class="profile-right">
            <h1>Alfikar Radestian Prasenja</h1>
            <p class="role">Student & Creative Designer</p>
            
            <table class="details-table">
                <tr><td>Nama Lengkap</td><td>Alfikar Radestian Prasenja</td></tr>
                <tr><td>Tempat, Tgl Lahir</td><td>Sukabumi, 12 Desember 2008</td></tr>
                <tr><td>Jenis Kelamin</td><td>Laki-laki</td></tr>
                <tr><td>Agama</td><td>Islam</td></tr>
                <tr><td>Alamat</td><td>Nyompolong, Jalan Pabuaran, RT1/RW2</td></tr>
                <tr><td>Email</td><td>ohong02@gmail.com</td></tr>
                <tr><td>Status</td><td>Pelajar</td></tr>
            </table>
        </div>
    </section>
    
    <!-- Timeline Section -->
    <section class="biodata-timeline">
        <h2>Riwayat Pendidikan</h2>
        
        <div class="timeline">
            <div class="timeline-item">
                <div class="timeline-dot"></div>
                <div class="timeline-content">
                    <h4>Sekolah Saat Ini</h4>
                    <span>SMKN 2 Kota Sukabumi / Jurusan RPL &nbsp;·&nbsp; 2023 – Sekarang</span>
                </div>
            </div>
            <div class="timeline-item">
                <div class="timeline-dot"></div>
                <div class="timeline-content">
                    <h4>SMP</h4>
                    <span>SMPN 10 Kota Sukabumi &nbsp;·&nbsp; 2020 – 2023</span>
                </div>
            </div>
            <div class="timeline-item">
                <div class="timeline-dot"></div>
                <div class="timeline-content">
                    <h4>SD</h4>
                    <span>SDN Cimanggah 1 Kota Sukabumi &nbsp;·&nbsp; 2014 – 2020</span>
                </div>
            </div>
        </div>
    </section>

</div>

@endsection