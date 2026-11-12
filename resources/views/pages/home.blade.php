@extends('layouts.app')

@section('title', 'Galeri Karya Mahasiswa - Modern Creative Portfolio')

@section('content')

    <!-- Hero Section: Contemporary Editorial Composition -->
    <section class="hero-editorial">
        <div class="container">
            <!-- Top Editorial Strip -->
            <div class="editorial-strip">
                <div class="editorial-strip-item">
                    <span class="badge bg-dark text-white rounded-0 px-2 py-1">VOL. 24</span>
                    <span>STUDENT ARCHIVE & PORTFOLIO</span>
                </div>
                <div class="editorial-strip-item d-none d-md-flex">
                    <i class="fa-solid fa-asterisk text-secondary" style="font-size: 0.65rem;"></i>
                    <span>CURATED EXHIBITION & SHOWCASE</span>
                </div>
                <div class="editorial-strip-item">
                    <span class="text-dark fw-bold">[ EXHIBITING {{ count($karya) }} WORKS ]</span>
                </div>
            </div>

            <!-- Asymmetric Hero Content -->
            <div class="row g-5 align-items-center">
                <!-- Left: Headline & Manifesto -->
                <div class="col-lg-7">
                    <div class="d-inline-flex align-items-center gap-2 mb-3">
                        <span class="editorial-tag text-secondary">
                            // PLATFORM APRESIASI KARYA DIGITAL
                        </span>
                    </div>

                    <h1 class="hero-main-title">
                        Ruang Kreativitas & Inovasi Mahasiswa
                    </h1>

                    <p class="hero-subheading">
                        Katalog karya terpilih mahasiswa lintas disiplin. Eksplorasi solusi teknologi, antarmuka digital, identitas visual, dan animasi 3D berstandar profesional.
                    </p>

                    <div class="d-flex flex-wrap gap-3 align-items-center">
                        <a href="#katalog" class="btn btn-editorial-primary">
                            <span>Jelajahi Katalog Karya</span>
                            <i class="fa-solid fa-arrow-right-long"></i>
                        </a>
                        <a href="#tentang" class="btn btn-editorial-secondary">
                            <span>Tentang Kurasi Galeri</span>
                        </a>
                    </div>
                </div>

                <!-- Right: Featured Bento Showcase -->
                <div class="col-lg-5">
                    @php $featured = $karya->first(); @endphp
                    @if($featured)
                        <div class="hero-showcase-bento">
                            <div class="hero-showcase-img-wrap">
                                <img src="{{ $featured->gambar }}" alt="{{ $featured->judul }}">
                                <div class="hero-img-badge">
                                    <span>№ 01 — FEATURED WORK</span>
                                </div>
                            </div>
                            <div class="hero-showcase-meta">
                                <div>
                                    <span class="editorial-tag text-secondary d-block mb-1">{{ $featured->kategori }}</span>
                                    <h5 class="fw-bold mb-1 text-dark">{{ $featured->judul }}</h5>
                                    <span class="small text-muted">Karya: {{ $featured->mahasiswa }} ({{ $featured->tahun }})</span>
                                </div>
                                <a href="{{ route('karya.show', $featured->id) }}" class="btn btn-sm btn-outline-dark rounded-1" title="Lihat Project">
                                    <i class="fa-solid fa-arrow-up-right-from-square"></i>
                                </a>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <!-- Statistics Bento Grid -->
    <section class="stats-bento-section">
        <div class="container">
            <div class="row g-3">
                <!-- Stat 1: Total Karya -->
                <div class="col-lg-3 col-sm-6">
                    <div class="stats-bento-card highlight">
                        <div class="stat-header-row">
                            <span class="stat-number-bento">{{ $stats['total_karya'] ?? 12 }}</span>
                            <span class="stat-index-badge">[ 01 ]</span>
                        </div>
                        <div>
                            <div class="stat-title-bento">Karya Terkurasi</div>
                            <p class="stat-desc-bento">Proyek unggulan pilihan dari mahasiswa berprestasi.</p>
                        </div>
                    </div>
                </div>

                <!-- Stat 2: Total Kategori -->
                <div class="col-lg-3 col-sm-6">
                    <div class="stats-bento-card">
                        <div class="stat-header-row">
                            <span class="stat-number-bento">{{ $stats['total_kategori'] ?? 4 }}</span>
                            <span class="stat-index-badge">[ 02 ]</span>
                        </div>
                        <div>
                            <div class="stat-title-bento">Pilar Kategori</div>
                            <p class="stat-desc-bento">UI/UX, Software Dev, Desain Grafis, & 3D Art.</p>
                        </div>
                    </div>
                </div>

                <!-- Stat 3: Total Mahasiswa -->
                <div class="col-lg-3 col-sm-6">
                    <div class="stats-bento-card">
                        <div class="stat-header-row">
                            <span class="stat-number-bento">{{ $stats['total_mahasiswa'] ?? 12 }}</span>
                            <span class="stat-index-badge">[ 03 ]</span>
                        </div>
                        <div>
                            <div class="stat-title-bento">Kreator Mahasiswa</div>
                            <p class="stat-desc-bento">Talenta muda dari berbagai fakultas dan prodi.</p>
                        </div>
                    </div>
                </div>

                <!-- Stat 4: Total Apresiasi -->
                <div class="col-lg-3 col-sm-6">
                    <div class="stats-bento-card">
                        <div class="stat-header-row">
                            <span class="stat-number-bento">{{ $stats['total_apresiasi'] ?? '750+' }}</span>
                            <span class="stat-index-badge">[ 04 ]</span>
                        </div>
                        <div>
                            <div class="stat-title-bento">Total Apresiasi</div>
                            <p class="stat-desc-bento">Umpan balik positif dari publik dan akademisi.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Katalog Section: Editorial Bento Project Grid -->
    <section id="katalog" class="catalog-section">
        <div class="container">
            <!-- Section Header -->
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-end mb-4 pb-3 border-bottom border-neutral gap-3">
                <div>
                    <span class="editorial-tag text-secondary d-block mb-1">
                        // KATALOG EKSPLORASI PROYEK
                    </span>
                    <h2 class="h1 fw-bold mb-0">Arsip Karya Mahasiswa</h2>
                </div>
                <div class="text-md-end">
                    <span class="editorial-tag text-dark fw-bold">
                        INDEX: 01 — 12 // TERBARU 2024
                    </span>
                </div>
            </div>

            <!-- Minimalist Editorial Toolbar -->
            <div class="catalog-toolbar">
                <div class="row g-3 align-items-center">
                    <!-- Live Search Input -->
                    <div class="col-lg-5">
                        <div class="search-input-wrap">
                            <i class="fa-solid fa-magnifying-glass search-icon"></i>
                            <input 
                                type="text" 
                                id="search-karya" 
                                class="search-input-editorial" 
                                placeholder="Cari judul, nama mahasiswa, deskripsi..."
                                autocomplete="off"
                            >
                            <button type="button" id="clear-search-btn" class="search-clear-btn" title="Hapus pencarian">
                                <i class="fa-solid fa-xmark"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Category Filter Buttons -->
                    <div class="col-lg-7">
                        <div class="filter-pills-list justify-content-lg-end" id="kategori-section">
                            <button type="button" class="filter-pill-btn category-btn active" data-category="all">
                                Semua Kategori
                            </button>
                            @foreach ($categories as $category)
                                <button type="button" class="filter-pill-btn category-btn" data-category="{{ $category }}">
                                    {{ $category }}
                                </button>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Counter Strip -->
                <div class="d-flex align-items-center justify-content-between mt-3 pt-3 border-top border-neutral">
                    <span id="karya-count-display" class="editorial-tag text-secondary">
                        Menampilkan {{ count($karya) }} dari {{ count($karya) }} karya
                    </span>
                    <span class="editorial-tag text-muted d-none d-sm-inline">
                        PENCARIAN INSTAN JS // REAL-TIME FILTER
                    </span>
                </div>
            </div>

            <!-- Empty State for Search/Filter -->
            <div id="empty-state" class="editorial-empty-state" style="display: none;">
                <div class="empty-state-icon">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </div>
                <h4 class="fw-bold text-dark mb-2">Karya tidak ditemukan</h4>
                <p class="text-secondary mx-auto mb-4" style="max-width: 480px;">
                    Tidak ada karya mahasiswa yang cocok dengan kombinasi pencarian atau filter saat ini. Silakan coba kata kunci lain atau reset filter.
                </p>
                <button type="button" id="reset-all-btn" class="btn btn-editorial-secondary">
                    <i class="fa-solid fa-rotate-left me-1"></i> Reset Pencarian & Filter
                </button>
            </div>

            <!-- Bento Project Grid (Dynamic Col Sizes for Visual Rhythm) -->
            <div class="row g-4" id="karya-grid-container">
                @foreach ($karya as $index => $item)
                    @php
                        $num = sprintf("%02d", $index + 1);
                        // Bento Rhythm: Item 1 and Item 8 are Wide Cards (col-lg-8), others col-lg-4 or col-lg-6
                        if ($index === 0 || $index === 7) {
                            $colClass = "col-lg-8 col-md-12";
                            $cardVariant = "featured-wide";
                            $aspectClass = "aspect-wide";
                        } elseif ($index === 2 || $index === 3) {
                            $colClass = "col-lg-6 col-md-6";
                            $cardVariant = "featured-medium";
                            $aspectClass = "aspect-standard";
                        } else {
                            $colClass = "col-lg-4 col-md-6";
                            $cardVariant = "standard";
                            $aspectClass = "aspect-standard";
                        }
                    @endphp

                    <div 
                        class="{{ $colClass }} karya-item-col"
                        data-category="{{ $item->kategori }}"
                        data-title="{{ $item->judul }}"
                        data-creator="{{ $item->mahasiswa }}"
                        data-desc="{{ $item->deskripsi_singkat }} {{ $item->deskripsi_lengkap }}"
                    >
                        <div class="bento-card {{ $cardVariant }}">
                            <!-- Image Frame -->
                            <div class="bento-img-wrap {{ $aspectClass }}">
                                <img src="{{ $item->gambar }}" alt="{{ $item->judul }}" loading="lazy">
                                <span class="bento-index-tag">№ {{ $num }}</span>
                                <span class="bento-category-tag">{{ $item->kategori }}</span>
                            </div>

                            <!-- Body Content -->
                            <div class="bento-body">
                                <!-- Creator attribution -->
                                <div class="bento-creator-row">
                                    <div class="bento-creator-avatar">
                                        {{ mb_substr($item->mahasiswa, 0, 1) }}
                                    </div>
                                    <div class="bento-creator-meta">
                                        {{ $item->mahasiswa }} &bull; <span class="text-muted fw-normal">{{ $item->prodi ?? 'Mahasiswa' }}</span>
                                    </div>
                                </div>

                                <!-- Title -->
                                <h5 class="bento-card-title">
                                    <a href="{{ route('karya.show', $item->id) }}">
                                        {{ $item->judul }}
                                    </a>
                                </h5>

                                <!-- Short Description -->
                                <p class="bento-card-desc">
                                    {{ $item->deskripsi_singkat }}
                                </p>

                                <!-- Footer Action -->
                                <div class="bento-card-footer">
                                    <span class="bento-year">
                                        <i class="fa-regular fa-calendar me-1"></i> {{ $item->tahun }}
                                    </span>
                                    <a href="{{ route('karya.show', $item->id) }}" class="bento-action-btn">
                                        <span>Lihat Detail</span>
                                        <i class="fa-solid fa-arrow-up-right-from-square ms-1" style="font-size: 0.75rem;"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Tentang Section: Editorial Manifesto & Bento Pillars -->
    <section id="tentang" class="py-5 bg-white border-top border-neutral">
        <div class="container py-4">
            <div class="row g-5 align-items-center mb-5">
                <div class="col-lg-6">
                    <span class="editorial-tag text-secondary d-block mb-2">
                        // MANIFESTO & VISI GALERI
                    </span>
                    <h2 class="h1 fw-bold mb-4">
                        Menghubungkan Gagasan Kreatif Kampus dengan Dunia Luar
                    </h2>
                    <p class="lead text-secondary mb-4" style="font-size: 1.05rem; line-height: 1.75;">
                        <strong>Galeri Karya Mahasiswa</strong> didirikan sebagai platform kurasi terpadu untuk merayakan pencapaian orisinal talenta muda Indonesia. Dari antarmuka aplikasi seluler hingga permodelan 3D dan rekayasa perangkat lunak.
                    </p>
                    <p class="text-muted mb-4" style="line-height: 1.7;">
                        Setiap karya yang dipamerkan melewati proses seleksi berbasis keaslian ide, kekuatan eksekusi desain, dan potensi dampak nyata bagi masyarakat maupun industri profesional.
                    </p>
                    <div class="d-flex gap-3">
                        <a href="#katalog" class="btn btn-editorial-primary">
                            <span>Eksplorasi Semua Karya</span>
                            <i class="fa-solid fa-arrow-right-long"></i>
                        </a>
                    </div>
                </div>

                <div class="col-lg-6">
                    <!-- 4-Pillars Bento Grid -->
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <div class="pillar-bento-card">
                                <div>
                                    <div class="pillar-bento-icon">
                                        <i class="fa-solid fa-gem"></i>
                                    </div>
                                    <h6 class="fw-bold mb-2">Kurasi Ketat</h6>
                                    <p class="small text-muted mb-0">Hanya karya dengan standar inovasi dan estetika tinggi yang ditampilkan.</p>
                                </div>
                                <span class="editorial-tag text-muted pt-3 d-block">[ 01 / PILAR ]</span>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="pillar-bento-card">
                                <div>
                                    <div class="pillar-bento-icon">
                                        <i class="fa-solid fa-globe"></i>
                                    </div>
                                    <h6 class="fw-bold mb-2">Akses Terbuka</h6>
                                    <p class="small text-muted mb-0">Publik dapat mengapresiasi dan memetik inspirasi secara bebas tanpa batas.</p>
                                </div>
                                <span class="editorial-tag text-muted pt-3 d-block">[ 02 / PILAR ]</span>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="pillar-bento-card">
                                <div>
                                    <div class="pillar-bento-icon">
                                        <i class="fa-solid fa-bolt"></i>
                                    </div>
                                    <h6 class="fw-bold mb-2">Discovery Cepat</h6>
                                    <p class="small text-muted mb-0">Pencarian instan dan filter kategori tanpa reload halaman.</p>
                                </div>
                                <span class="editorial-tag text-muted pt-3 d-block">[ 03 / PILAR ]</span>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="pillar-bento-card">
                                <div>
                                    <div class="pillar-bento-icon">
                                        <i class="fa-solid fa-heart"></i>
                                    </div>
                                    <h6 class="fw-bold mb-2">Kultur Apresiasi</h6>
                                    <p class="small text-muted mb-0">Memberi dorongan moral nyata melalui formulir apresiasi langsung.</p>
                                </div>
                                <span class="editorial-tag text-muted pt-3 d-block">[ 04 / PILAR ]</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
