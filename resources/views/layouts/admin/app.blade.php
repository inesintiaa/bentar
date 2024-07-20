<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'MyConcert') | MyConcert APP</title>
    @include('layouts.admin.meta')
</head>


<body>
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <aside class="left-sidebar">
            <div>
                <div class="brand-logo d-flex align-items-center justify-content-between">
                    <a href="{{ route('dashboard') }}"
                        class="text-nowrap logo-img text-decoration-none text-dark d-flex flex-col justify-center align-items-center">
                        <img src="{{ asset('assets/images/logos/logo.png') }}" width="50" alt="" />
                        <h1 class="fs-5">MyConcert</h1>
                    </a>
                    <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                        <i class="ti ti-x fs-8"></i>
                    </div>
                </div>
                @include('layouts.admin.menu')
            </div>
        </aside>
        <div class="body-wrapper">
            @include('layouts.admin.header')
            <div class="container-fluid">
                @yield('content')
            </div>
            @include('layouts.admin.footer')
        </div>
    </div>
    @include('layouts.admin.script')

</body>

</html>
