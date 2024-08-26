@extends('admins.layouts.main')
@section('title')
    @parent
    Danh sách người dùng
@endsection
@push('styles')
    <link rel="stylesheet" href="{{ asset('admins/assets/libs/dropzone/dropzone.css') }}" type="text/css" />
    <!-- Filepond css -->
    <link rel="stylesheet" href="{{ asset('admins/assets/libs/filepond/filepond.min.cs') }}s" type="text/css" />
    <link rel="stylesheet"
        href="{{ asset('admins/assets/libs/filepond-plugin-image-preview/filepond-plugin-image-preview.min.css') }}">
@endpush
@section('content')
    <div class="mt-3 main-content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title mb-0">Danh Sách Người Dùng</h4>
                    </div><!-- end card header -->
                    <div class="card-header">
                        {{-- <h4 class="card-title mb-0">Danh Sách Người Dùng</h4> --}}
                    </div><!-- end card header -->
                    <div class="card-header">
                        <h4>Export File</h4>
                        <a href="{{ route('admins.excels.exportFile') }}">
                            <button class="btn btn-primary">Export File</button>
                            {{-- <input type="file" name="export" id="export" class="form-control"> --}}
                        </a>
                    </div><!-- end card header -->
                    <div class="card-header">
                        <h4>Import File</h4>
                        <a href="{{ route('admins.excels.importExcelFile') }}">
                            {{-- <button class="btn btn-primary">Export File</button> --}}
                            <input type="file" name="export" id="export" class="form-control">
                        </a>
                    </div><!-- end card header -->

                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <!-- dropzone min -->
    <script src="{{ asset('admins/assets/libs/dropzone/dropzone-min.js') }}"></script>
    <!-- filepond js -->
    <script src="{{ asset('admins/assets/libs/filepond/filepond.min.js') }}"></script>
    <script src="{{ asset('admins/assets/libs/filepond-plugin-image-preview/filepond-plugin-image-preview.min.js') }}">
    </script>
    <script
        src="{{ asset('admins/assets/libs/filepond-plugin-file-validate-size/filepond-plugin-file-validate-size.min.js') }}">
    </script>
    <script
        src="{{ asset('admins/assets/libs/filepond-plugin-image-exif-orientation/filepond-plugin-image-exif-orientation.min.js') }}">
    </script>
    <script src="{{ asset('admins/assets/libs/filepond-plugin-file-encode/filepond-plugin-file-encode.min.js') }}"></script>
    <script src="{{ asset('admins/assets/js/pages/form-file-upload.init.js') }}"></script>
@endpush
