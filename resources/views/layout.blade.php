<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.header')
</head>
<body>
    <div class="page-wrapper">
        @include('layouts.navbar')
        @yield('content')
        @include('layouts.footer')
    </div>
    @include('layouts.script')
</body>
</html>