@extends('layouts.app')

@section('title', $karya->judul . ' - Galeri Karya Mahasiswa')
@section('meta_description', $karya->deskripsi_singkat)

@section('content')

    <!-- Breadcrumb & Back Header -->
    <section class="detail-showcase-header">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('home') }}#katalog">Katalog</a></li>
                        <li class="breadcrumb-item active" aria-current="page">№ {{ sprintf("%02d", $karya->id) }} — {{ Str::limit($karya->judul, 30) }}</li>
                    </ol>
                </nav>

                <a href="{{ route('home') }}#katalog" class="btn btn-editorial-secondary btn-sm">
                    <i class="fa-solid fa-arrow-left me-1"></i> Kembali ke Galeri
                </a>
            </div>
        </div>
    </section>

    <!-- Detail Project Showcase Hero -->
    <section class="detail-project-hero">
        <div class="container">
            <!-- Project Header Titles -->
            <div class="mb-4">
                <div class="d-flex flex-wrap align-items-center gap-2 mb-2">
                    <span class="badge bg-dark text-white rounded-0 px-2 py-1">№ {{ sprintf("%02d", $karya->id) }}</span>
                    <span class="editorial-tag text-secondary">{{ $karya->kategori }}</span>
                    <span class="text-muted">&bull;</span>
                    <span class="editorial-tag text-muted">TAHUN {{ $karya->tahun }}</span>
                </div>
                <h1 class="display-5 fw-bold text-dark mb-3">
                    {{ $karya->judul }}
                </h1>
                <div class="d-flex flex-wrap align-items-center gap-3 text-secondary small">
                    <span>Oleh <strong>{{ $karya->mahasiswa }}</strong></span>
                    @if(isset($karya->prodi))
                        <span>&bull;</span>
                        <span>{{ $karya->prodi }}</span>
                    @endif
                    <span>&bull;</span>
                    <span><i class="fa-solid fa-heart me-1 text-danger"></i> <span id="detail-apresiasi-count">{{ $karya->apresiasi_count ?? 45 }}</span> Apresiasi</span>
                </div>
            </div>

            <!-- Large Cinematic Artwork Frame -->
            <div class="detail-main-img-card mb-5">
                <img src="{{ $karya->gambar }}" alt="{{ $karya->judul }}">
            </div>

            <!-- Asymmetric Content Columns -->
            <div class="row g-5">
                <!-- Left Column: Narrative & Additional Info -->
                <div class="col-lg-8">
                    <!-- Concept & Description -->
                    <div class="bg-white border border-neutral rounded-3 p-4 mb-4 shadow-sm">
                        <span class="editorial-tag text-secondary d-block mb-2">
                            // KONSEP & DESKRIPSI KARYA
                        </span>
                        <h4 class="fw-bold mb-3">Latar Belakang & Pendekatan Desain</h4>
                        <p class="lead text-secondary mb-4" style="font-size: 1.1rem; line-height: 1.75;">
                            {{ $karya->deskripsi_singkat }}
                        </p>
                        <div class="border-top border-neutral pt-3">
                            <p class="text-secondary mb-0" style="white-space: pre-line; line-height: 1.8;">
                                {{ $karya->deskripsi_lengkap }}
                            </p>
                        </div>
                    </div>

                    <!-- Software & Tools Used -->
                    @if(!empty($karya->tools) && is_array($karya->tools))
                        <div class="bg-white border border-neutral rounded-3 p-4 mb-4 shadow-sm">
                            <span class="editorial-tag text-secondary d-block mb-2">
                                // TOOLS & PERANGKAT LUNAK
                            </span>
                            <h5 class="fw-bold mb-3">Teknologi yang Digunakan</h5>
                            <div class="d-flex flex-wrap">
                                @foreach($karya->tools as $tool)
                                    <span class="editorial-tech-tag">
                                        <i class="fa-solid fa-layer-group text-secondary"></i> {{ $tool }}
                                    </span>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    <!-- External Link / Demo -->
                    @if(!empty($karya->link_demo))
                        <div class="bg-white border border-neutral rounded-3 p-4 mb-4 d-flex justify-content-between align-items-center flex-wrap gap-3 shadow-sm">
                            <div>
                                <span class="editorial-tag text-secondary d-block">PROTOTYPE & REPOSITORY</span>
                                <strong class="text-dark">{{ $karya->link_demo }}</strong>
                            </div>
                            <a href="{{ $karya->link_demo }}" target="_blank" class="btn btn-editorial-primary btn-sm">
                                <span>Buka Tautan Demo</span>
                                <i class="fa-solid fa-arrow-up-right-from-square ms-1"></i>
                            </a>
                        </div>
                    @endif
                </div>

                <!-- Right Column: Creator Info, Specs & Appreciation Form -->
                <div class="col-lg-4">
                    <div class="sticky-lg-top" style="top: 90px; z-index: 10;">
                        <!-- Creator Bento Card -->
                        <div class="creator-bento-card">
                            <div class="creator-bento-avatar">
                                {{ mb_substr($karya->mahasiswa, 0, 1) }}
                            </div>
                            <div>
                                <span class="editorial-tag text-muted d-block">KREATOR MAHASISWA</span>
                                <h5 class="fw-bold mb-0 text-dark">{{ $karya->mahasiswa }}</h5>
                                <span class="small text-secondary">{{ $karya->prodi ?? 'Fakultas Desain & Teknologi' }}</span>
                            </div>
                        </div>

                        <!-- Project Spec Sheet -->
                        <div class="project-spec-bento">
                            <div class="spec-bento-item">
                                <span class="spec-bento-label">Kategori</span>
                                <span class="spec-bento-value">{{ $karya->kategori }}</span>
                            </div>
                            <div class="spec-bento-item">
                                <span class="spec-bento-label">Tahun Pembuatan</span>
                                <span class="spec-bento-value">{{ $karya->tahun }}</span>
                            </div>
                            <div class="spec-bento-item">
                                <span class="spec-bento-label">Dosen Pembimbing</span>
                                <span class="spec-bento-value">{{ $karya->pembimbing ?? 'Dosen Departemen' }}</span>
                            </div>
                            <div class="spec-bento-item">
                                <span class="spec-bento-label">Total Apresiasi</span>
                                <span class="spec-bento-value">{{ $karya->apresiasi_count ?? 45 }} Likes</span>
                            </div>
                        </div>

                        <!-- Appreciation Form Bento Card -->
                        <div id="section-apresiasi" class="appreciation-bento-card">
                            <div class="d-flex align-items-center justify-content-between mb-3 pb-2 border-bottom border-neutral">
                                <div>
                                    <h6 class="fw-bold text-dark mb-0">Formulir Apresiasi</h6>
                                    <small class="text-muted">Kirimkan umpan balik untuk kreator</small>
                                </div>
                                <span class="badge bg-dark text-white rounded-0">FEEDBACK</span>
                            </div>

                            <!-- Success Toast / Notification -->
                            <div id="apresiasi-success-alert" class="success-toast-editorial" role="alert">
                                <div class="d-flex align-items-start gap-2">
                                    <i class="fa-solid fa-circle-check fs-5 mt-1"></i>
                                    <div>
                                        <strong>Pesan Terkirim!</strong>
                                        <div class="small">Apresiasi Anda berhasil disampaikan kepada <strong>{{ $karya->mahasiswa }}</strong>.</div>
                                    </div>
                                </div>
                            </div>

                            <!-- Form -->
                            <form id="form-apresiasi" novalidate>
                                <!-- Nama Field -->
                                <div class="mb-3">
                                    <label for="apresiasi-nama" class="form-label-editorial">
                                        Nama Lengkap <span class="text-danger">*</span>
                                    </label>
                                    <input 
                                        type="text" 
                                        class="form-control-editorial" 
                                        id="apresiasi-nama" 
                                        placeholder="Contoh: Rian Pratama" 
                                        required
                                    >
                                    <div class="invalid-feedback-custom">
                                        Silakan masukkan nama Anda (minimal 2 karakter).
                                    </div>
                                </div>

                                <!-- Email Field -->
                                <div class="mb-3">
                                    <label for="apresiasi-email" class="form-label-editorial">
                                        Alamat Email <span class="text-danger">*</span>
                                    </label>
                                    <input 
                                        type="email" 
                                        class="form-control-editorial" 
                                        id="apresiasi-email" 
                                        placeholder="nama@email.com" 
                                        required
                                    >
                                    <div class="invalid-feedback-custom">
                                        Format email tidak valid (contoh: user@domain.com).
                                    </div>
                                </div>

                                <!-- Pesan Field -->
                                <div class="mb-3">
                                    <label for="apresiasi-pesan" class="form-label-editorial">
                                        Pesan Apresiasi <span class="text-danger">*</span>
                                    </label>
                                    <textarea 
                                        class="form-control-editorial" 
                                        id="apresiasi-pesan" 
                                        rows="3" 
                                        placeholder="Tuliskan kesan, apresiasi, atau ulasan positif..." 
                                        required
                                    ></textarea>
                                    <div class="invalid-feedback-custom">
                                        Pesan apresiasi tidak boleh kosong (minimal 5 karakter).
                                    </div>
                                </div>

                                <!-- Submit Button -->
                                <button type="submit" id="btn-kirim-apresiasi" class="btn btn-editorial-primary w-100 justify-content-center">
                                    <span>Kirimkan Apresiasi</span>
                                    <i class="fa-solid fa-paper-plane ms-1"></i>
                                </button>
                            </form>

                            <!-- Dynamic Sent Appreciations List -->
                            <div class="mt-4 pt-3 border-top border-neutral">
                                <span class="editorial-tag text-muted d-block mb-3">// APRESIASI TERBARU</span>
                                <div id="apresiasi-dynamic-list">
                                    <!-- Seed Comments -->
                                    <div class="p-3 bg-neutral-surface border border-neutral rounded-2 mb-2">
                                        <div class="d-flex align-items-center justify-content-between mb-1">
                                            <span class="fw-bold text-dark small">Dewi Sekar</span>
                                            <span class="badge bg-white text-secondary border border-neutral" style="font-size: 0.68rem;">2 jam lalu</span>
                                        </div>
                                        <p class="text-secondary small mb-0">Eksplorasi yang sangat inovatif! Pendekatan desainnya rapi dan estetik.</p>
                                    </div>
                                    <div class="p-3 bg-neutral-surface border border-neutral rounded-2 mb-2">
                                        <div class="d-flex align-items-center justify-content-between mb-1">
                                            <span class="fw-bold text-dark small">Bambang Irawan</span>
                                            <span class="badge bg-white text-secondary border border-neutral" style="font-size: 0.68rem;">1 hari lalu</span>
                                        </div>
                                        <p class="text-secondary small mb-0">Sangat menginspirasi. Solusi tepat guna untuk portofolio tingkat universitas!</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Related Works Section -->
    @if(isset($related) && count($related) > 0)
        <section class="py-5 bg-white border-top border-neutral">
            <div class="container py-3">
                <div class="d-flex align-items-end justify-content-between mb-4 pb-2 border-bottom border-neutral">
                    <div>
                        <span class="editorial-tag text-secondary d-block mb-1">// REKOMENDASI KARYA LAIN</span>
                        <h3 class="h3 fw-bold text-dark mb-0">Eksplorasi Terkait</h3>
                    </div>
                    <a href="{{ route('home') }}#katalog" class="btn btn-editorial-secondary btn-sm">
                        <span>Lihat Semua Katalog</span>
                        <i class="fa-solid fa-arrow-right ms-1"></i>
                    </a>
                </div>

                <div class="row g-4">
                    @foreach($related as $rel)
                        <div class="col-lg-4 col-md-6">
                            <div class="bento-card">
                                <div class="bento-img-wrap aspect-standard">
                                    <img src="{{ $rel->gambar }}" alt="{{ $rel->judul }}" loading="lazy">
                                    <span class="bento-category-tag">{{ $rel->kategori }}</span>
                                </div>
                                <div class="bento-body">
                                    <div class="bento-creator-row">
                                        <div class="bento-creator-avatar">{{ mb_substr($rel->mahasiswa, 0, 1) }}</div>
                                        <span class="bento-creator-meta">{{ $rel->mahasiswa }}</span>
                                    </div>
                                    <h5 class="bento-card-title">
                                        <a href="{{ route('karya.show', $rel->id) }}">
                                            {{ $rel->judul }}
                                        </a>
                                    </h5>
                                    <p class="bento-card-desc">{{ $rel->deskripsi_singkat }}</p>
                                    <div class="bento-card-footer">
                                        <span class="bento-year"><i class="fa-regular fa-calendar me-1"></i> {{ $rel->tahun }}</span>
                                        <a href="{{ route('karya.show', $rel->id) }}" class="bento-action-btn">
                                            <span>Lihat</span>
                                            <i class="fa-solid fa-arrow-right ms-1"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

@endsection
