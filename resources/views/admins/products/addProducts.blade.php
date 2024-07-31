@extends('admins.layouts.main')
@section('title')
@endsection
@section('content')
    <div class="mt-3 main-content">
        <div class="page-content">
            <div class="container-fluid">

                <h2>Thêm sản phẩm</h2>
                <div class="pt-3" style="min-height: 800px;">
                    <form action="{{ route('admins.products.postProducts') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mt-3">
                            <label for="nameProduct">Tên sản phẩm</label>
                            <input type="text" name="nameProduct" id="nameProduct" class="form-control">
                        </div>
                        <div class="mt-3">
                            <label for="priceProduct">Giá sản phẩm</label>
                            <input type="number" name="priceProduct" id="priceProduct" class="form-control">
                        </div>
                        <div class="mt-3">
                            <label for="authorProduct">Tên tác giả</label>
                            <select name="authorProduct" class="form-control" id="">
                                @foreach ($authorProduct as $value)
                                    <option value="{{ $value->id }}">{{ $value->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mt-3">
                            <label for="publisherProduct">Nhà xuất bản</label>
                            <select name="publisherProduct" class="form-control" id="">
                                @foreach ($publisherProduct as $value)
                                    <option value="{{ $value->id }}">{{ $value->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mt-3">
                            <label for="yearPublishedProduct">Năm sản xuất</label>
                            <input type="year" name="yearPublishedProduct" id="yearPublishedProduct"
                                class="form-control">
                        </div>
                        <div class="mt-3">
                            <label for="imageProduct">Ảnh</label>
                            <input type="file" name="imageProduct" id="imageProduct" accept="image/*"
                                class="form-control">
                        </div>
                        <div class="mt-3">
                            <label for="descriptionProduct">Mô tả</label>
                            <textarea type="text" name="descriptionProduct" id="descriptionProduct" class="form-control"></textarea>
                        </div>
                        <div class="mt-3">
                            <label for="categoryProduct">Danh mục</label>
                            <select name="categoryProduct" class="form-control" id="">
                                @foreach ($categoryProduct as $value)
                                    <option value="{{ $value->id }}">{{ $value->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="d-flex justify-content-center">
                            <a href="{{ route('admins.products.listProducts') }}"><button class="btn btn-primary me-1 mt-3"
                                    type="button">Quay lại</button></a>
                            <button class="btn btn-success mt-3 " type="submit">Thêm mới</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endsection
