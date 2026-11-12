<footer class="footer-editorial">
    <div class="container">
        <div class="row g-4 justify-content-between">
            <div class="col-lg-5 col-md-6">
                <div class="d-flex align-items-center gap-2 mb-3">
                    <div class="brand-badge" style="background-color: #374151;">
                        <i class="fa-solid fa-shapes"></i>
                    </div>
                    <h5 class="text-white mb-0 fw-bold">GALERI KARYA MAHASISWA</h5>
                </div>
                <p class="small pe-lg-4" style="color: var(--tertiary); max-width: 440px; line-height: 1.7;">
                    Platform kurasi dan etalase digital karya inovatif mahasiswa lintas disiplin. Menghadirkan eksplorasi desain, teknologi perangkat lunak, dan seni visual kontemporer.
                </p>
                <div class="d-flex gap-2 mt-3">
                    <a href="https://github.com" target="_blank" class="footer-social-btn" title="GitHub"><i class="fa-brands fa-github"></i></a>
                    <a href="https://behance.net" target="_blank" class="footer-social-btn" title="Behance"><i class="fa-brands fa-behance"></i></a>
                    <a href="https://dribbble.com" target="_blank" class="footer-social-btn" title="Dribbble"><i class="fa-brands fa-dribbble"></i></a>
                    <a href="https://linkedin.com" target="_blank" class="footer-social-btn" title="LinkedIn"><i class="fa-brands fa-linkedin-in"></i></a>
                </div>
            </div>

            <div class="col-lg-2 col-md-3 col-6">
                <h6 class="text-white fw-bold mb-3 small text-uppercase" style="letter-spacing: 0.08em;">Navigasi</h6>
                <ul class="list-unstyled small d-flex flex-column gap-2 mb-0">
                    <li><a href="{{ route('home') }}">Beranda</a></li>
                    <li><a href="{{ request()->routeIs('home') ? '#katalog' : route('home') . '#katalog' }}">Katalog Karya</a></li>
                    <li><a href="{{ request()->routeIs('home') ? '#tentang' : route('about') }}">Tentang Galeri</a></li>
                    <li><a href="{{ route('home') }}#katalog">Kategori Unggulan</a></li>
                </ul>
            </div>

            <div class="col-lg-2 col-md-3 col-6">
                <h6 class="text-white fw-bold mb-3 small text-uppercase" style="letter-spacing: 0.08em;">Kategori</h6>
                <ul class="list-unstyled small d-flex flex-column gap-2 mb-0">
                    <li><a href="{{ route('home') }}#katalog">UI/UX & Mobile</a></li>
                    <li><a href="{{ route('home') }}#katalog">Web & Software</a></li>
                    <li><a href="{{ route('home') }}#katalog">Desain Grafis</a></li>
                    <li><a href="{{ route('home') }}#katalog">Animasi & 3D</a></li>
                </ul>
            </div>

            <div class="col-lg-3 col-md-6">
                <h6 class="text-white fw-bold mb-3 small text-uppercase" style="letter-spacing: 0.08em;">Sekretariat</h6>
                <p class="small mb-2" style="color: var(--tertiary);">
                    <i class="fa-solid fa-location-dot me-2"></i> Gedung Riset & Pusat Kreativitas Mahasiswa
                </p>
                <p class="small mb-2" style="color: var(--tertiary);">
                    <i class="fa-solid fa-envelope me-2"></i> galeri@mahasiswa.ac.id
                </p>
                <p class="small mb-0" style="color: var(--tertiary);">
                    <i class="fa-solid fa-clock me-2"></i> Senin — Jumat: 08.00 — 16.00 WIB
                </p>
            </div>
        </div>

        <div class="footer-bottom-strip">
            <span style="color: var(--tertiary);">
                &copy; {{ date('Y') }} <strong>Galeri Karya Mahasiswa</strong>. Contemporary Editorial Portfolio Exhibition.
            </span>
            <span style="color: var(--tertiary);" class="d-none d-md-inline">
                Curated Student Inventions & Creative Excellence.
            </span>
        </div>
    </div>
</footer>
