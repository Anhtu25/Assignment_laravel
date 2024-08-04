@extends('admins.layouts.main')

@section('title')
@endsection

@section('content')
    <div class="mt-3 main-content">
        <div class="page-content">
            <div class="container-fluid">

                <h2>Trang Thêm Tác Giả</h2>
                <div class="pt-3" style="min-height: 400px;">
                    <form action="{{ route('admins.authors.storeAuthors') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mt-3">
                            <label for="nameAuthor">Tên tác giả</label>
                            <input type="text" name="nameAuthor" id="nameAuthor" class="form-control">
                            @error('nameAuthor')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="d-flex justify-content-center">
                            <a href="{{ route('admins.authors.listAuthors') }}" class="btn btn-primary me-1 mt-3">Quay lại</a>
                            <button class="btn btn-success mt-3" type="submit">Thêm mới</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endsection
