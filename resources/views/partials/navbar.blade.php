<nav class="navbar navbar-expand-lg navbar-custom sticky-top">
    <div class="container">
        <!-- Logo & Editorial Brand -->
        <a class="navbar-brand" href="{{ route('home') }}">
            <div class="brand-badge">
                <i class="fa-solid fa-shapes"></i>
            </div>
            <div class="d-flex align-items-baseline gap-2">
                <span>GALERI KARYA</span>
                <span class="brand-archive-badge d-none d-sm-inline">ARCHIVE // 2024</span>
            </div>
        </a>

        <!-- Mobile Toggle Button -->
        <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Nav Links -->
        <div class="collapse navbar-collapse" id="navbarContent">
            <ul class="navbar-nav ms-auto align-items-lg-center gap-1 mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">
                        Beranda
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ request()->routeIs('home') ? '#katalog' : route('home') . '#katalog' }}">
                        Karya
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}" href="{{ request()->routeIs('home') ? '#tentang' : route('about') }}">
                        Tentang
                    </a>
                </li>
                <li class="nav-item ms-lg-3 mt-2 mt-lg-0">
                    <a class="btn btn-editorial-primary" href="{{ request()->routeIs('home') ? '#katalog' : route('home') . '#katalog' }}">
                        <span>Jelajahi Karya</span>
                        <i class="fa-solid fa-arrow-right-long ms-1"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
