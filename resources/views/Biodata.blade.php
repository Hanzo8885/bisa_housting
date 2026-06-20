@extends('layouts.app')
@section('title', $title ?? 'Biodata – Alfikar Radestian Prasenja')

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

    /* ── BIODATA CARD ── */
    .biodata-wrap {
        padding: 80px 5%; max-width: 900px; margin: 0 auto;
    }
    .biodata-card {
        background: #fff; border: 1.5px solid #ebebeb;
        border-radius: 20px; padding: 48px;
        display: flex; gap: 48px; flex-wrap: wrap; align-items: flex-start;
        box-shadow: 0 8px 32px rgba(0,0,0,.04);
    }
    .biodata-photo {
        width: 180px; height: 220px; border-radius: 14px;
        background: var(--gray);
        overflow: hidden; flex-shrink: 0;
        border: 2px solid #e0e0e0;
    }
    .biodata-photo img {
        width: 100%; height: 100%; object-fit: cover;
    }
    .biodata-photo-placeholder {
        width: 100%; height: 100%;
        display: flex; align-items: center; justify-content: center;
        font-size: 60px; opacity: .2;
    }
    .biodata-info { flex: 1; min-width: 240px; }
    .biodata-name {
        font-family: var(--font-display); font-size: 1.8rem;
        font-weight: 800; color: var(--black); letter-spacing: -.5px;
        margin-bottom: 4px;
    }
    .biodata-role {
        font-size: .95rem; color: var(--green); font-weight: 600;
        margin-bottom: 20px;
    }
    .biodata-table { width: 100%; border-collapse: collapse; margin-bottom: 28px; }
    .biodata-table tr td {
        padding: 10px 0; vertical-align: top;
        border-bottom: 1px solid #f0f0f0;
        font-size: .9rem; color: var(--text); line-height: 1.5;
    }
    .biodata-table tr:last-child td { border-bottom: none; }
    .biodata-table td:first-child {
        font-weight: 600; color: var(--muted);
        width: 150px; padding-right: 16px;
    }
    .biodata-table td:last-child { color: var(--black); }

    /* ── EDUCATION SECTION ── */
    .section-title {
        font-family: var(--font-display); font-size: 1.3rem;
        font-weight: 700; color: var(--black); margin: 48px 0 20px;
        padding-bottom: 10px; border-bottom: 2px solid var(--green);
        display: inline-block;
    }
    .timeline { display: flex; flex-direction: column; gap: 20px; }
    .timeline-item {
        display: flex; gap: 20px; align-items: flex-start;
    }
    .timeline-dot {
        width: 14px; height: 14px; border-radius: 50%;
        background: var(--green); flex-shrink: 0; margin-top: 5px;
        box-shadow: 0 0 0 4px rgba(0,200,150,.15);
    }
    .timeline-content h4 {
        font-weight: 700; color: var(--black); font-size: .95rem;
        margin-bottom: 3px;
    }
    .timeline-content span {
        font-size: .82rem; color: var(--muted);
    }

    /* ── CERTIFICATES ── */
    .cert-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
        gap: 16px; margin-top: 4px;
    }
    .cert-card {
        background: var(--gray); border: 1.5px solid #ebebeb;
        border-radius: 12px; padding: 20px 22px;
        transition: border-color .2s, transform .2s;
    }
    .cert-card:hover { border-color: var(--green); transform: translateY(-2px); }
    .cert-card h4 { font-size: .9rem; font-weight: 700; color: var(--black); margin-bottom: 4px; }
    .cert-card span { font-size: .8rem; color: var(--muted); }

    @media (max-width: 640px) {
        .biodata-card { padding: 28px 22px; }
        .biodata-photo { width: 100%; height: 200px; }
    }
</style>
@endpush

@section('content')
<section class="page-hero">
    <div class="section-label">Biodata</div>
    <h1>Mengenal Lebih Dekat</h1>
</section>

<div class="biodata-wrap">

    {{-- ── KARTU BIODATA ── --}}
    <div class="biodata-card">
        <div class="biodata-photo">
            <img src="{{ asset('images/photo.jpg') }}" alt="Alfikar Radestian Prasenja"
                 onerror="this.style.display='none';this.nextElementSibling.style.display='flex'">
            <div class="biodata-photo-placeholder" style="display:none;">👤</div>
        </div>

        <div class="biodata-info">
            <div class="biodata-name">Alfikar Radestian Prasenja</div>
            <div class="biodata-role">Student &amp; Creative Designer</div>

            <table class="biodata-table">
                <tr>
                    <td>Nama Lengkap</td>
                    <td>Alfikar Radestian Prasenja</td>
                </tr>
                <tr>
                    <td>Tempat, Tgl Lahir</td>
                    <td>Sukabumi, 12 Desember 2008</td>
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td>Laki-laki</td>
                </tr>
                <tr>
                    <td>Agama</td>
                    <td>Islam</td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>nyompolong, Jalan pabuaran,   RT1/RW2</td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>ohong02@gmail.com</td>
                </tr>
                <tr>
                    <td>Instagram</td>
                    <td>@kinemon973/fikar</td>
                </tr>
                <tr>
                    <td>Status</td>
                    <td>Pelajar</td>
                </tr>
            </table>
        </div>
    </div>

    {{-- ── PENDIDIKAN ── --}}
    <div class="section-title">Riwayat Pendidikan</div>
    <div class="timeline">
        <div class="timeline-item">
            <div class="timeline-dot"></div>
            <div class="timeline-content">
                <h4>Sekolah Saat Ini</h4>
                <span>SMKN 2 KOTA Sukabumi /Jurusan RPL  &nbsp;·&nbsp; 2026 – Sekarang</span>
            </div>
        </div>
        <div class="timeline-item">
            <div class="timeline-dot"></div>
            <div class="timeline-content">
                <h4>SMP</h4>
                <span>SMP 10 KOTA Sukabumi &nbsp;·&nbsp; 2020 – 2023</span>
            </div>
        </div>
        <div class="timeline-item">
            <div class="timeline-dot"></div>
            <div class="timeline-content">
                <h4>SD</h4>
                <span>SDN Cimanggah 1 KOTA Sukabumi &nbsp;·&nbsp; 2017 – 2020</span>
            </div>
        </div>
    </div>

    {{-- ── SERTIFIKAT ── --}}
    <<div class="section-title">Sertifikat &amp; Penghargaan</div>
<div class="cert-grid">
    <div class="cert-card">
        <h4>Juara Festival Renang Walikota Cup</h4>
        <span>Sukabumi &nbsp;·&nbsp; 2017</span>
    </div>
    <div class="cert-card">
        <h4>Ujian Kenaikan Tingkat (UKT) Sabuk Taekwondo</h4>
        <span>Pengcab Taekwondo Indonesia &nbsp;·&nbsp; 2022</span>
    </div>
    <div class="cert-card">
        <h4>English Proficiency Achievement</h4>
        <span>IF English Academy &nbsp;·&nbsp; 2025</span>
    </div>
</div>
@endsection
