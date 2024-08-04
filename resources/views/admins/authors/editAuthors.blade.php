@extends('admins.layouts.main')

@section('title')
@endsection

@section('content')
    <div class="mt-3 main-content">
        <div class="page-content">
            <div class="container-fluid">

                <h2>Trang Thêm Danh Mục</h2>
                <div class="pt-3" style="min-height: 400px;">
                    <form action="{{ route('admins.authors.updateAuthors', $authors->id) }}" method="post"
                        enctype="multipart/form-data">
                        @method('patch')
                        @csrf
                        <input type="hidden" id="idAuthor" value="{{ $authors->id }}">
                        <div class="mt-3">
                            <label for="nameAuthor">Tên tác giả</label>
                            <input type="text" name="nameAuthor" id="nameAuthor" class="form-control"
                                value="{{ $authors->name }}">
                            {{-- @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror --}}
                        </div>
                        <div class="d-flex justify-content-center">
                            <a href="{{ route('admins.authors.listAuthors') }}" class="btn btn-primary me-1 mt-3">Quay
                                lại</a>
                            <button class="btn btn-success mt-3" type="submit">Chỉnh sửa</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endsection
