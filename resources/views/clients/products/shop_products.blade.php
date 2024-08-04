@extends('clients.layouts.main')
@push('style')
    <style>
        .product-img img {
            height: 350px;
            width: 150px;
            /* Chiều cao cố định */
            object-fit: cover;
            /* Đảm bảo ảnh không bị méo */
        }
    </style>
@endpush
@section('content')

    <!-- Page Header Start -->
    {{-- <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Our Shop</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Shop</p>
            </div>
        </div>
    </div> --}}
    <!-- Page Header End -->


    <!-- Shop Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <!-- Shop Sidebar Start -->
            <div class="col-lg-3 col-md-12">
                <!-- Category Start -->
                <div class="border-bottom mb-4 pb-4">
                    <h5 class="font-weight-semi-bold mb-4">Filter by Category</h5>
                    <form method="GET" action="{{ route('clients.search') }}">
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" name="categories[]" value="all"
                                id="category-all">
                            <label class="custom-control-label" for="category-all">All Categories</label>
                        </div>
                        @foreach ($homeCategories as $category)
                            <div
                                class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                                <input type="checkbox" class="custom-control-input" name="categories[]"
                                    value="{{ $category->id }}" id="category-{{ $category->id }}">
                                <label class="custom-control-label"
                                    for="category-{{ $category->id }}">{{ $category->name }}</label>
                            </div>
                        @endforeach
                        <button type="submit" class="btn btn-primary mt-3">Filter</button>
                    </form>
                </div>
                <!-- Category End -->

                {{-- <!-- Color Start -->
                <div class="bo            rder-bottom mb-4 pb-4">
                    <h5 class="font-weight-semi-bold mb-4">Filter by color</h5>
                    <form>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" checked id="color-all">
                            <label class="custom-control-label" for="price-all">All Color</label>
                            <span class="badge border font-weight-normal">1000</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="color-1">
                            <label class="custom-control-label" for="color-1">Black</label>
                            <span class="badge border font-weight-normal">150</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="color-2">
                            <label class="custom-control-label" for="color-2">White</label>
                            <span class="badge border font-weight-normal">295</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="color-3">
                            <label class="custom-control-label" for="color-3">Red</label>
                            <span class="badge border font-weight-normal">246</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="color-4">
                            <label class="custom-control-label" for="color-4">Blue</label>
                            <span class="badge border font-weight-normal">145</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between">
                            <input type="checkbox" class="custom-control-input" id="color-5">
                            <label class="custom-control-label" for="color-5">Green</label>
                            <span class="badge border font-weight-normal">168</span>
                        </div>
                    </form>
                </div>
                <!-- Color End -->

                <!-- Size Start -->
                <div class="mb-5">
                    <h5 class="font-weight-semi-bold mb-4">Filter by size</h5>
                    <form>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" checked id="size-all">
                            <label class="custom-control-label" for="size-all">All Size</label>
                            <span class="badge border font-weight-normal">1000</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="size-1">
                            <label class="custom-control-label" for="size-1">XS</label>
                            <span class="badge border font-weight-normal">150</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="size-2">
                            <label class="custom-control-label" for="size-2">S</label>
                            <span class="badge border font-weight-normal">295</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="size-3">
                            <label class="custom-control-label" for="size-3">M</label>
                            <span class="badge border font-weight-normal">246</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="size-4">
                            <label class="custom-control-label" for="size-4">L</label>
                            <span class="badge border font-weight-normal">145</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between">
                            <input type="checkbox" class="custom-control-input" id="size-5">
                            <label class="custom-control-label" for="size-5">XL</label>
                            <span class="badge border font-weight-normal">168</span>
                        </div>
                    </form>
                </div>
                <!-- Size End --> --}}
            </div>
            <!-- Shop Sidebar End -->


            <!-- Shop Product Start -->
            <div class="col-lg-9 col-md-12">
                <div class="row pb-3">
                    <div class="col-12 pb-1">
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <form action="{{ route('clients.search') }}" class="form-control">
                                <div class="input-group">
                                    <input type="text" class="form-control" method="get" name="nameSearch"
                                        placeholder="Search by name">
                                    <div class="input-group-append">
                                        <button class=" btn input-group-text bg-transparent text-primary" type="submit">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                            <div class="dropdown ml-4">
                                <button class="btn border dropdown-toggle" type="button" id="triggerId"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Sort by
                                </button>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="triggerId">
                                    <a class="dropdown-item" href="#">Latest</a>
                                    <a class="dropdown-item" href="#">Popularity</a>
                                    <a class="dropdown-item" href="#">Best Rating</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @foreach ($products as $key => $value)
                        <div class="col-lg-4 col-md-6 col-sm-12 pb-1">
                            <div class="card product-item border-0 mb-4">
                                <a href="{{ route('clients.productDetails', ['idProduct' => $value->id]) }}"
                                    class="link-underline-dark">
                                    <div
                                        class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                        <img class="img-fluid w-100" src="{{ asset($value->image) }}"
                                            alt="{{ $value->name }}">
                                    </div>
                                </a>
                                <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                    <h6 class="text-truncate mb-3">{{ $value->name }}</h6>
                                    <div class="d-flex justify-content-center">
                                        <h6 class="text-danger">{{ number_format($value->price_sale, 0, ',', '.') }}đ</h6>
                                        <h6 class="text-muted ml-2">
                                            <del>{{ number_format($value->price, 0, ',', '.') }}đ</del>
                                        </h6>
                                    </div>
                                </div>
                                <div class="card-footer d-flex justify-content-between bg-light border">
                                    <a href="{{ route('clients.productDetails', ['idProduct' => $value->id]) }}"
                                        class="btn btn-sm text-dark p-0 link-underline-dark">
                                        <i class="fas fa-eye text-primary mr-1"></i>View Detail
                                    </a>
                                    <a href="" class="btn btn-sm text-dark p-0">
                                        <i class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    <div class="col-12 pb-1">
                        <nav aria-label="Page navigation">
                            <ul class="pagination justify-content-center mb-3">
                                @if ($products->onFirstPage())
                                    <a class="page-item pagination-prev disabled  mt-2" href="javascript:void(0);">
                                        Previous
                                    </a>
                                @else
                                    <a class="page-item pagination-prev mt-2" href="{{ $products->previousPageUrl() }}">
                                        Previous
                                    </a>
                                @endif

                                <ul class="pagination listjs-pagination mb-0 mx-3">
                                    @if ($products->currentPage() > 1)
                                        <li class="page-item">
                                            <a class="page-link" href="{{ $products->url(1) }}">1</a>
                                        </li>
                                        @if ($products->currentPage() > 2)
                                            <li class="page-item disabled"><span class="page-link">...</span></li>
                                        @endif
                                    @endif

                                    <li class="page-item active">
                                        <a class="page-link" href="javascript:void(0);">{{ $products->currentPage() }}</a>
                                    </li>

                                    @if ($products->currentPage() < $products->lastPage() - 1)
                                        <li class="page-item disabled"><span class="page-link">...</span></li>
                                    @endif

                                    @if ($products->currentPage() < $products->lastPage())
                                        <li class="page-item">
                                            <a class="page-link"
                                                href="{{ $products->url($products->lastPage()) }}">{{ $products->lastPage() }}</a>
                                        </li>
                                    @endif
                                </ul>

                                @if ($products->hasMorePages())
                                    <a class="page-item pagination-next mt-2" href="{{ $products->nextPageUrl() }}">
                                        Next
                                    </a>
                                @else
                                    <a class="page-item pagination-next disabled mt-2" href="javascript:void(0);">
                                        Next
                                    </a>
                                @endif
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
            <!-- Shop Product End -->
        </div>
    </div>
    <!-- Shop End -->
@endsection
