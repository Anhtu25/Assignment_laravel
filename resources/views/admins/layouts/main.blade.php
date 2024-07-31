<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">

<head>

    <meta charset="utf-8" />
    <title>
        @section('title')
            Home admin |
        @endsection
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('admins.layouts.style')
    @stack('styles')
</head>

<body>

    <!-- Header -->
    <div id="layout-wrapper">
        @include('admins.layouts.header')
        @include('admins.layouts.sidebar')
    @yield('content')

    <!-- JAVASCRIPT -->
    @include('admins.layouts.js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    @stack('scripts')
</body>

</html>
