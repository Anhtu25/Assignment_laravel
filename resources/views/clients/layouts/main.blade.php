<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Book Shop</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    @include('clients.layouts.style')
</head>

<body>
    <!-- Sidebar Start -->
    <div class="container-fluid">
        @include('clients.layouts.sidebar')
    </div>
    <!-- Sidebar End -->
    <!-- Header Navbar Start -->
    @include('clients.layouts.header')
    <!-- Header Navbar End -->



    @yield('content')

    <!-- Footer Start -->
    @include('clients.layouts.footer')
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


    @include('clients.layouts.js')
</body>

</html>
