<div class="container-fluid mb-5">
    <div class="row border-top px-xl-5">
        <div class="col-lg-3 d-none d-lg-block">
            <a class="btn shadow-none d-flex align-items-center justify-content-between bg-primary text-white w-100"
                data-toggle="collapse" href="#navbar-vertical" data-target="#navbar-vertical" style="height: 65px; margin-top: -1px; padding: 0 30px;">
                <h6 class="m-0">Danh mục</h6>
                <i class="fa fa-angle-down text-dark"></i>
            </a>
            <nav class="collapse {{ Route::is('clients.index') ? 'show' : '' }} navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0 bg-light"
                id="navbar-vertical" style="width: calc(100% - 30px); z-index: 1;">
                <div class="navbar-nav w-100 overflow-hidden" style="height: 410px">
                    @foreach ($homeCategories as $key => $value)
                        <a href=""
                            class="nav-item nav-link">{{ $value->name }}</a>
                    @endforeach
                </div>
            </nav>


        </div>
        <div class="col-lg-9">
            <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                {{-- <a href="" class="text-decoration-none d-block d-lg-none">
                    <h1 class="m-0 display-5 font-weight-semi-bold"><span
                            class="text-primary font-weight-bold border px-3 mr-1">E</span>Shopper</h1>
                </a> --}}
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">

                    <div class="navbar-nav mr-auto py-0">

                        <a href="{{ route('clients.index') }}" class="nav-item nav-link">Trang chủ</a>
                        <a href="{{ route('clients.shopProducts') }}" class="nav-item nav-link active">Sản phẩm</a>
                        {{-- <a href="" class="nav-item nav-link">Shop Detail</a> --}}
                        {{-- <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Pages</a>
                            <div class="dropdown-menu rounded-0 m-0">
                                <a href="{{ route('clients.cart') }}" class="dropdown-item">Shopping Cart</a>
                                <a href="{{ route('clients.checkOut') }}" class="dropdown-item">Checkout</a>
                            </div>
                        </div> --}}
                        <a href="{{ route('clients.contact') }}" class="nav-item nav-link">Liên hệ</a>
                    </div>

                    <div class="navbar-nav ml-auto py-0">

                        @guest
                            <!-- Hiển thị liên kết đăng nhập và đăng ký nếu người dùng chưa đăng nhập -->
                            <a href="{{ route('authors.login') }}" class="nav-item nav-link">Đăng nhập</a>
                            <a href="{{ route('authors.register') }}" class="nav-item nav-link">Đăng ký</a>
                        @else
                            <!-- Hiển thị tên người dùng và nút đăng xuất nếu người dùng đã đăng nhập -->
                            <span class="nav-item nav-link">Xin chào, {{ Auth::user()->name }}</span>
                            <a href="{{ route('authors.logout') }}" class="nav-item nav-link">
                                Đăng Xuất
                            </a>

                        @endguest
                    </div>

                </div>
            </nav>
            @if (route::is('clients.index'))
                <div id="header-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active" style="height: 400px;">
                            <img class="img-fluid" src="assets/img/carousel-1.png" alt="Image">
                            {{-- <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px;">
                                    <h4 class="text-light text-uppercase font-weight-medium mb-3">10% Off Your First
                                        Order</h4>
                                    <h3 class="display-4 text-white font-weight-semi-bold mb-4">Fashionable Dress</h3>
                                    <a href="" class="btn btn-light py-2 px-3">Shop Now</a>
                                </div>
                            </div> --}}
                        </div>
                        <div class="carousel-item" style="height: 410px;">
                            <img class="img-fluid" src="assets/img/carousel-2.png" alt="Image">
                            {{-- <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px;">
                                    <h4 class="text-light text-uppercase font-weight-medium mb-3">10% Off Your First
                                        Order</h4>
                                    <h3 class="display-4 text-white font-weight-semi-bold mb-4">Reasonable Price</h3>
                                    <a href="" class="btn btn-light py-2 px-3">Shop Now</a>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
                        <div class="btn btn-dark" style="width: 45px; height: 45px;">
                            <span class="carousel-control-prev-icon mb-n2"></span>
                        </div>
                    </a>
                    <a class="carousel-control-next" href="#header-carousel" data-slide="next">
                        <div class="btn btn-dark" style="width: 45px; height: 45px;">
                            <span class="carousel-control-next-icon mb-n2"></span>
                        </div>
                    </a>
                </div>
            @endif
        </div>
    </div>
</div>
<!-- Navbar End -->
