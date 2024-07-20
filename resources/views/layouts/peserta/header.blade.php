<style>
    .nav-link.active {
        background-color: rgba(255, 255, 255, 0.2);
        border-radius: 5px;
    }
</style>
<header class="app-header bg-primary">
    <nav class="container navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('dashboard') }}" class="text-nowrap logo-img">
                <div class="brand-logo d-flex align-items-center justify-content-between">
                    <a href="{{ route('dashboard') }}"
                        class="text-nowrap logo-img text-decoration-none text-white d-flex flex-col justify-center align-items-center">
                        <img src="{{ asset('assets/images/logos/logo.png') }}" width="50" alt="" />
                        <h1 class="fs-5">MyConcert</h1>
                    </a>
                    <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                        <i class="ti ti-x fs-8"></i>
                    </div>
                </div>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('user.konser*', 'dashboard') ? 'active' : '' }} text-white"
                            aria-current="page" href="{{ route('user.konser') }}">Konser</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('user.riwayat*') ? 'active' : '' }} text-white"
                            href="{{ route('user.riwayat') }}">Riwayat</a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <form action="{{ route('auth.logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-danger">Logout</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
