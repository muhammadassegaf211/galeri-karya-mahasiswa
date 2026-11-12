@extends('layouts.app')

@section('title', 'Tentang Galeri Karya Mahasiswa - Editorial Manifesto')

@section('content')

    <!-- About Hero -->
    <section class="about-hero-editorial">
        <div class="container text-center py-3">
            <div class="d-inline-flex align-items-center gap-2 mb-3">
                <span class="badge bg-dark text-white rounded-0 px-2 py-1">ABOUT // MANIFESTO</span>
                <span class="editorial-tag text-secondary">ARCHIVE PLATFORM</span>
            </div>
            <h1 class="display-5 fw-bold text-dark mb-3">Tentang Galeri Karya Mahasiswa</h1>
            <p class="lead text-secondary mx-auto" style="max-width: 680px; line-height: 1.75;">
                Membangun ekosistem apresiasi digital untuk karya inovasi, desain grafis, sistem perangkat lunak, dan animasi 3D hasil karya akademis mahasiswa Indonesia.
            </p>
        </div>
    </section>

    <!-- Detailed Manifesto & Bento Grid Section -->
    <section class="py-5 bg-neutral-surface">
        <div class="container py-4">
            <!-- Manifesto Row -->
            <div class="row g-5 align-items-center mb-5 pb-4 border-bottom border-neutral">
                <div class="col-lg-6">
                    <span class="editorial-tag text-secondary d-block mb-2">
                        // RUANG PAMER DIGITAL
                    </span>
                    <h2 class="h2 fw-bold text-dark mb-4">
                        Menjembatani Dunia Kampus & Industri Kreatif Profesional
                    </h2>
                    <p class="lead text-secondary mb-4" style="line-height: 1.75;">
                        Galeri Karya Mahasiswa didirikan dengan visi menciptakan etalase terpadu bagi mahasiswa untuk memamerkan proyek akhir, tugas kuliah, dan karya eksperimental mereka ke hadapan publik, praktisi industri, dan rekan akademisi.
                    </p>
                    <p class="text-muted mb-4" style="line-height: 1.7;">
                        Melalui platform ini, setiap karya memiliki ruang portofolio terperinci yang memuat informasi konseptual, teknologi yang digunakan, serta sistem pesan apresiasi langsung dari pengunjung.
                    </p>
                    
                    <div class="d-flex gap-3">
                        <a href="{{ route('home') }}#katalog" class="btn btn-editorial-primary">
                            <span>Jelajahi Katalog Karya</span>
                            <i class="fa-solid fa-arrow-right-long"></i>
                        </a>
                        <a href="{{ route('home') }}" class="btn btn-editorial-secondary">
                            <span>Kembali ke Beranda</span>
                        </a>
                    </div>
                </div>

                <div class="col-lg-6">
                    <!-- Bento Pillars Grid -->
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <div class="pillar-bento-card">
                                <div>
                                    <div class="pillar-bento-icon">
                                        <i class="fa-solid fa-gem"></i>
                                    </div>
                                    <h5 class="fw-bold text-dark mb-2">Kualitas Terkurasi</h5>
                                    <p class="small text-muted mb-0">Menampilkan karya pilihan dengan standar inovasi dan estetika tinggi.</p>
                                </div>
                                <span class="editorial-tag text-muted pt-3 d-block">[ 01 / PILAR ]</span>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="pillar-bento-card">
                                <div>
                                    <div class="pillar-bento-icon">
                                        <i class="fa-solid fa-users"></i>
                                    </div>
                                    <h5 class="fw-bold text-dark mb-2">Akses Terbuka</h5>
                                    <p class="small text-muted mb-0">Memungkinkan publik mengeksplorasi dan memetik inspirasi secara terbuka.</p>
                                </div>
                                <span class="editorial-tag text-muted pt-3 d-block">[ 02 / PILAR ]</span>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="pillar-bento-card">
                                <div>
                                    <div class="pillar-bento-icon">
                                        <i class="fa-solid fa-magnifying-glass"></i>
                                    </div>
                                    <h5 class="fw-bold text-dark mb-2">Pencarian Cerdas</h5>
                                    <p class="small text-muted mb-0">Penemuan karya secara instan tanpa reload halaman dengan filter terpadu.</p>
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
                                    <h5 class="fw-bold text-dark mb-2">Kultur Apresiasi</h5>
                                    <p class="small text-muted mb-0">Media umpan balik konstruktif dan penyemangat bagi mahasiswa.</p>
                                </div>
                                <span class="editorial-tag text-muted pt-3 d-block">[ 04 / PILAR ]</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 4 Disciplines Section -->
            <div class="text-center mb-4">
                <span class="editorial-tag text-secondary d-block mb-1">// DISIPLIN KARYA</span>
                <h3 class="h3 fw-bold text-dark">4 Pilar Disiplin Unggulan</h3>
            </div>

            <div class="row g-3">
                <div class="col-md-3 col-sm-6">
                    <div class="p-4 bg-white border border-neutral rounded-2 text-center h-100">
                        <i class="fa-solid fa-palette fs-3 text-dark mb-3"></i>
                        <h6 class="fw-bold text-dark mb-1">UI/UX & Mobile</h6>
                        <small class="text-muted d-block mb-2">3 Karya Pilihan</small>
                        <p class="small text-secondary mb-0">Perancangan antarmuka aplikasi seluler yang intuitif dan berbasis riset pengguna.</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="p-4 bg-white border border-neutral rounded-2 text-center h-100">
                        <i class="fa-solid fa-code fs-3 text-dark mb-3"></i>
                        <h6 class="fw-bold text-dark mb-1">Web & Software</h6>
                        <small class="text-muted d-block mb-2">3 Karya Pilihan</small>
                        <p class="small text-secondary mb-0">Aplikasi web modern, integrasi IoT, dan kecerdasan buatan terapan.</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="p-4 bg-white border border-neutral rounded-2 text-center h-100">
                        <i class="fa-solid fa-pen-nib fs-3 text-dark mb-3"></i>
                        <h6 class="fw-bold text-dark mb-1">Desain Grafis</h6>
                        <small class="text-muted d-block mb-2">3 Karya Pilihan</small>
                        <p class="small text-secondary mb-0">Eksplorasi visual identitas merek, poster aktivisme, dan seri ilustrasi folklore.</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="p-4 bg-white border border-neutral rounded-2 text-center h-100">
                        <i class="fa-solid fa-cube fs-3 text-dark mb-3"></i>
                        <h6 class="fw-bold text-dark mb-1">Animasi & 3D</h6>
                        <small class="text-muted d-block mb-2">3 Karya Pilihan</small>
                        <p class="small text-secondary mb-0">Visualisasi konsep lingkungan sci-fi 3D, film animasi pendek, dan karakter mecha.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
