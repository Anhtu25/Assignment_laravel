@extends('admins.layouts.main')
@section('title')
@endsection
@section('content')
    <div class="mt-3 main-content">
        <div class="page-content">
            <div class="container-fluid">
                <h2>Thêm sản phẩm</h2>
                <div class="pt-4" style="min-height: 800px;">
                    <form action="" method="post" enctype="multipart/form-data">

                        <input type="hidden" id="idProduct" value="{{ $product->id }}">
                        <div class="mt-3">
                            <label for="nameProduct">Tên sản phẩm</label>
                            {{-- <input type="text" name="nameProduct" id="nameProduct" class="form-control"> --}}
                            <span disabled class="font-weight-bold form-control">{{ $product->name }}</span>
                        </div>
                        <div class="mt-3">
                            <label for="priceProduct">Giá sản phẩm</label>
                            {{-- <input type="number" name="priceProduct" id="priceProduct" class="form-control"> --}}
                            <span disabled class="font-weight-bold form-control">{{ $product->price }}</span>
                        </div>
                        <div class="mt-3">
                            <label for="priceSaleProduct">Giá bán sản phẩm</label>
                            {{-- <input type="number" name="priceProduct" id="priceProduct" class="form-control"> --}}
                            <span disabled class="font-weight-bold form-control">{{ $product->price_sale }}</span>
                        </div>
                        <div class="mt-3">
                            <label for="authorProduct">Tên tác giả</label>
                            {{-- <select name="authorProduct" class="form-control" id="">
                            @foreach ($authorProduct as $value)
                            <option value="{{ $value->id }}">{{ $value->name }}</option>
                            @endforeach
                        </select> --}}
                            <span class="font-weight-bold form-control">{{ $product->author->name }}</span>
                        </div>
                        <div class="mt-3">
                            <label for="publisherProduct">Nhà xuất bản</label>
                            {{-- <select name="publisherProduct" class="form-control" id="">
                            @foreach ($publisherProduct as $value)
                            <option value="{{ $value->id }}">{{ $value->name }}</option>
                            @endforeach
                        </select> --}}
                            <span class="font-weight-bold form-control">{{ $product->publisher->name }}</span>
                        </div>
                        <div class="mt-3">
                            <label for="yearPublishedProduct">Năm sản xuất</label>
                            {{-- <input type="year" name="yearPublishedProduct" id="yearPublishedProduct" class="form-control"> --}}
                            <span class="font-weight-bold form-control">{{ $product->year_published }}</span>
                        </div>

                        <div class="mt-3">
                            <label for="imageProduct">Ảnh</label>
                            {{-- <input type="file" name="imageProduct" id="imageProduct" accept="image/*" class="form-control"> --}}
                            <img src="{{ Storage::url($product->image) }}" width="300px" alt="">
                        </div>
                        <div class="mt-3">
                            <label for="shortDescriptionProduct">Mô tả ngắn</label>
                            {{-- <input type="text" name="descriptionProduct" id="descriptionProduct" class="form-control"> --}}
                            <span class="font-weight-bold form-control">{{ $product->short_description }}</span>
                        </div>
                        <div class="mt-3">
                            <label for="descriptionProduct">Mô tả</label>
                            {{-- <input type="text" name="descriptionProduct" id="descriptionProduct" class="form-control"> --}}
                            <span class="font-weight-bold form-control">{{ $product->description }}</span>
                        </div>
                        <div class="mt-3">
                            <label for="categoryProduct">Danh mục</label>
                            {{-- <select name="categoryProduct" class="form-control" id="">
                            @foreach ($categoryProduct as $value)
                            <option value="{{ $value->id }}">{{ $value->name }}</option>
                            @endforeach
                        </select> --}}
                            <span class="font-weight-bold form-control">{{ $product->category->name }}</span>
                        </div>
                        <a href="{{ route('admins.products.listProducts') }}"><button class="btn btn-success mt-3"
                                type="button">Quay lại</button></a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
