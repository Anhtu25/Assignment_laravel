@extends('admins.layouts.main')

@section('title')
@endsection

@section('content')
    <div class="mt-3 main-content">
        <div class="page-content">
            <div class="container-fluid">

                <h2>Trang Thêm Danh Mục</h2>
                <div class="pt-3" style="min-height: 800px;">
                    <form action="{{ route('admins.categories.updateCategories',$categories->id) }}" method="post" enctype="multipart/form-data">
                        @method('patch')
                        @csrf
                        <input type="hidden" id="idCategory" value="{{ $categories->id }}">
                        <div class="mt-3">
                            <label for="nameCategory">Tên danh mục</label>
                            <input type="text" name="nameCategory" id="nameCategory" class="form-control" value="{{ $categories->name }}" >
                            {{-- @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror --}}
                        </div>
                        <div class="d-flex justify-content-center">
                            <a href="{{ route('admins.categories.listCategories') }}" class="btn btn-primary me-1 mt-3">Quay lại</a>
                            <button class="btn btn-success mt-3" type="submit">Chỉnh sửa</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endsection
