<nav class="sidebar-nav scroll-sidebar p-2" data-simplebar="">
    <ul id="sidebarnav" style="padding: 5px">
        <li class="nav-small-cap">
            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
            <span class="hide-menu">Home</span>
        </li>
        <li class="sidebar-item">
            <a class="sidebar-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}"
                aria-expanded="false" style="text-decoration: none">
                <span>
                    <i class="ti ti-layout-dashboard"></i>
                </span>
                <span class="hide-menu">Dashboard</span>
            </a>
        </li>
        <li class="nav-small-cap">
            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
            <span class="hide-menu">Pengguna</span>
        </li>
        <li class="sidebar-item">
            <a class="sidebar-link {{ request()->routeIs('admin.peserta.*') ? 'active' : '' }}"
                href="{{ route('admin.peserta') }}" aria-expanded="false" style="text-decoration: none">
                <span>
                    <i class="ti ti-article"></i>
                </span>
                <span class="hide-menu">Peserta</span>
            </a>
        </li>
        <li class="nav-small-cap">
            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
            <span class="hide-menu">Konser</span>
        </li>
        <li class="sidebar-item">
            <a class="sidebar-link {{ request()->routeIs('admin.konser.*') ? 'active' : '' }}"
                href="{{ route('admin.konser') }}" aria-expanded="false" style="text-decoration: none">
                <span>
                    <i class="ti ti-article"></i>
                </span>
                <span class="hide-menu">Konser</span>
            </a>
        </li>
        <li class="nav-small-cap">
            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
            <span class="hide-menu">Tiket</span>
        </li>
        <li class="sidebar-item">
            <a class="sidebar-link {{ request()->routeIs('admin.tiket.*') ? 'active' : '' }}"
                href="{{ route('admin.tiket') }}" aria-expanded="false" style="text-decoration: none">
                <span>
                    <i class="ti ti-article"></i>
                </span>
                <span class="hide-menu">Tiket</span>
            </a>
        </li>
        <li class="nav-small-cap">
            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
            <span class="hide-menu">Transaksi</span>
        </li>
        <li class="sidebar-item">
            <a class="sidebar-link {{ request()->routeIs('admin.transaksi.*') ? 'active' : '' }}"
                href="{{ route('admin.transaksi') }}" aria-expanded="false" style="text-decoration: none">
                <span>
                    <i class="ti ti-article"></i>
                </span>
                <span class="hide-menu">Transaksi</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a class="sidebar-link {{ request()->routeIs('admin.riwayat.*') ? 'active' : '' }}"
                href="{{ route('admin.riwayat') }}" aria-expanded="false" style="text-decoration: none">
                <span>
                    <i class="ti ti-article"></i>
                </span>
                <span class="hide-menu">Riwayat Transaksi</span>
            </a>
        </li>
    </ul>
</nav>
