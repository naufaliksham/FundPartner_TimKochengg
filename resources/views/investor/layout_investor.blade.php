<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts_investor.header')
</head>
<body>
    <div class="page-wrapper">
        @include('layouts_investor.navbar')
        @yield('content')
        @include('layouts_investor.footer')
    </div>
    @include('layouts_investor.script')
</body>
</html>