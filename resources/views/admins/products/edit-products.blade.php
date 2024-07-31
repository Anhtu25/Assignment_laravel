@extends('admins.layouts.main')
@section('title')
@endsection
@section('content')
    <div class="mt-3 main-content">
        <div class="page-content">
            <div class="container-fluid">
                <p class="text-center h1">Sửa sản phẩm</p>
                <div class="pt-3" style="min-height: 800px;">
                    <form action="{{ route('admins.products.updateProducts', $product->id) }}" method="post"
                        enctype="multipart/form-data">
                        @method('patch')
                        @csrf
                        <input type="hidden" name="idProduct" value="{{ $product->id }}">
                        <div class="mt-3">
                            <label for="nameProduct">Tên sản phẩm</label>
                            <input type="text" name="nameProduct" id="nameProduct" class="form-control"
                                value="{{ $product->name }}" required>
                        </div>
                        <div class="mt-3">
                            <label for="priceProduct">Giá sản phẩm</label>
                            <input type="number" name="priceProduct" id="priceProduct" class="form-control"
                                value="{{ $product->price }}" required>
                        </div>
                        <div class="mt-3">
                            <label for="authorProduct">Tên tác giả</label>
                            <select name="authorProduct" class="form-control" id="authorProduct">
                                @foreach ($authorProduct as $value)
                                    <option value="{{ $value->id }}"
                                        {{ $product->author->id == $value->id ? 'selected' : '' }}>
                                        {{ $value->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mt-3">
                            <label for="publisherProduct">Nhà xuất bản</label>
                            <select name="publisherProduct" class="form-control" id="publisherProduct">
                                @foreach ($publisherProduct as $value)
                                    <option value="{{ $value->id }}"
                                        {{ $product->publisher->id == $value->id ? 'selected' : '' }}>{{ $value->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mt-3">
                            <label for="yearPublishedProduct">Năm sản xuất</label>
                            <input type="number" name="yearPublishedProduct" id="yearPublishedProduct" class="form-control"
                                value="{{ $product->year_published }}" required>
                        </div>
                        <div class="mt-3">
                            <label for="imageProduct">Ảnh</label>
                            <input type="file" name="imageProduct" id="imageProduct" accept="image/*"
                                class="form-control">
                            <img src="{{ asset($product->image) }}" width="300px" alt="">
                        </div>
                        <div class="mt-3">
                            <label for="descriptionProduct">Mô tả</label>
                            <input type="text" name="descriptionProduct" id="descriptionProduct" class="form-control"
                                value="{{ $product->description }}">
                        </div>
                        <div class="mt-3">
                            <label for="categoryProduct">Danh mục</label>
                            <select name="categoryProduct" class="form-control" id="categoryProduct">
                                @foreach ($categoryProduct as $value)
                                    <option value="{{ $value->id }}"
                                        {{ $product->category->id == $value->id ? 'selected' : '' }}>{{ $value->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="d-flex justify-content-center">
                            <a href="{{ route('admins.products.listProducts') }}"><button class="btn btn-primary me-1 mt-3"
                                    type="button">Quay lại</button></a>

                            <button class="btn btn-success mt-3 " type="submit">Chỉnh sửa</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
