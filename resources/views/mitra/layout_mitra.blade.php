<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts_mitra.header')
</head>
<body>
    <div class="page-wrapper">
        @include('layouts_mitra.navbar')
        @yield('content')
        @include('layouts_mitra.footer')
    </div>
    @include('layouts_mitra.script')
</body>
</html>