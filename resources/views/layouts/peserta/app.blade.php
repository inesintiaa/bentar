<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'MyConcert App') | MyConcert APP</title>
    @include('layouts.peserta.meta')
</head>


<body>
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <div class="body-wrapper">
            @include('layouts.peserta.header')
            @yield('content')
            @include('layouts.peserta.footer')
        </div>
    </div>
    @include('layouts.peserta.script')
</body>

</html>
