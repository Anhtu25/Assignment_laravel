@extends('admins.layouts.main')
@section('title')
@endsection
@push('styles')
    <style>
        .img-product {
            width: 80px;
            object-fit: cover;
        }
    </style>
@endpush
@section('content')
    <div class="mt-3 main-content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title mb-0">Danh Sách Danh Mục</h4>
                    </div><!-- end card header -->

                    <div class="card-body">
                        <div class="listjs-table" id="customerList">
                            <div class="row g-4 mb-3">
                                <div class="col-sm-auto">
                                    <div>
                                        <a href="{{ route('admins.categories.addCategories') }}"><button type="button"
                                                class="btn btn-success add-btn"><i
                                                    class="ri-add-line align-bottom me-1"></i> Thêm mới</button></a>
                                        <button class="btn btn-soft-danger" onClick="deleteMultiple()"><i
                                                class="ri-delete-bin-2-line"></i></button>
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <div class="d-flex justify-content-sm-end">
                                        <div class="search-box ms-2">
                                            <form action="{{ route('admins.users.userManager') }}" method="GET">
                                                @csrf
                                                <input type="text" class="form-control search"
                                                    placeholder="Tìm Kiếm Người Dùng...">
                                                <i class="ri-search-line search-icon"></i>

                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @if (session('message'))
                                <div class="alert alert-primary" role="alert">
                                    {{ session('message') }}
                                </div>
                            @endif
                            <div class="table-responsive table-card mt-3 mb-1">
                                <table class="table align-middle table-nowrap" id="customerTable">
                                    <thead class="table-light">
                                        <tr>
                                            <th scope="col" style="width: 50px;">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="checkAll"
                                                        value="option">
                                                </div>
                                            </th>
                                            <th scope="sort">STT</th>
                                            <th scope="sort">Tên danh mục</th>
                                            <th scope="sort">Ngày tạo</th>
                                            <th scope="sort">Ngày cập nhật</th>
                                            {{-- <th scope="sort">Danh mục</th> --}}
                                            <th scope="sort">Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody class="list form-check-all">
                                        @foreach ($categories as $key => $value)
                                            <tr>
                                                <th scope="row">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="chk_child"
                                                            value="option1">
                                                    </div>
                                                </th>
                                                <th scope='row'>{{ $key + 1 }}</th>
                                                <td class="customer_name">{{ $value->name }}</td>
                                                <td class="customer_name">{{ $value->created_at->format('d/m/Y H:i:s') }}</td>
                                                <td class="customer_name">{{ $value->updated_at->format('d/m/Y H:i:s') }}</td>

                                                {{-- <td>{{ $value->category->name }}</td> --}}
                                                <td>
                                                    <a href="{{ route('admins.categories.detailCategories', $value->id) }}"
                                                        class="btn btn-primary">Chi tiết</a>
                                                    <a href="{{ route('admins.categories.editCategories', $value->id) }}"
                                                        class="btn btn-warning">Sửa</a>
                                                    <button class="btn btn-danger btn-delete"
                                                        data-bs-id="{{ $value->id }}" data-bs-toggle="modal"
                                                        data-bs-target="#deleteModel">Xóa</button>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                                {{-- {{ $categories->links('pagination::bootstrap-5') }} --}}
                                <div class="noresult" style="display: none">
                                    <div class="text-center">
                                        <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop"
                                            colors="primary:#121331,secondary:#08a88a"
                                            style="width:75px;height:75px"></lord-icon>
                                        <h5 class="mt-2">Sorry! No Result Found</h5>
                                        <p class="text-muted mb-0">We've searched more than 150+ Orders We did not find any
                                            orders for you search.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-end">
                                <div class="pagination-wrap hstack gap-2">
                                    @if ($categories->onFirstPage())
                                        <a class="page-item pagination-prev disabled" href="javascript:void(0);">
                                            Previous
                                        </a>
                                    @else
                                        <a class="page-item pagination-prev" href="{{ $categories->previousPageUrl() }}">
                                            Previous
                                        </a>
                                    @endif

                                    <ul class="pagination listjs-pagination mb-0">
                                        @if ($categories->currentPage() > 1)
                                            <li class="page-item">
                                                <a class="page-link" href="{{ $categories->url(1) }}">1</a>
                                            </li>
                                            @if ($categories->currentPage() > 2)
                                                <li class="page-item disabled"><span class="page-link">...</span></li>
                                            @endif
                                        @endif

                                        <li class="page-item active">
                                            <a class="page-link"
                                                href="javascript:void(0);">{{ $categories->currentPage() }}</a>
                                        </li>

                                        @if ($categories->currentPage() < $categories->lastPage() - 1)
                                            <li class="page-item disabled"><span class="page-link">...</span></li>
                                        @endif

                                        @if ($categories->currentPage() < $categories->lastPage())
                                            <li class="page-item">
                                                <a class="page-link"
                                                    href="{{ $categories->url($categories->lastPage()) }}">{{ $categories->lastPage() }}</a>
                                            </li>
                                        @endif
                                    </ul>

                                    @if ($categories->hasMorePages())
                                        <a class="page-item pagination-next" href="{{ $categories->nextPageUrl() }}">
                                            Next
                                        </a>
                                    @else
                                        <a class="page-item pagination-next disabled" href="javascript:void(0);">
                                            Next
                                        </a>
                                    @endif
                                </div>
                            </div>


                        </div>
                    </div><!-- end card -->

                </div>
                <!-- end col -->
            </div>
            <!-- end col -->
        </div>

    </div>
    {{-- {{ $products->links('pagination::bootstrap-5') }} --}}
    <div class="modal fade" id="deleteModel" tabindex="-1" aria-labelledby="deleteModel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Xác nhận xóa</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="post" id="formDelete">
                    @method('delete')
                    @csrf
                    <div class="modal-body">
                        Bạn có muốn xóa không???
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                        <button type="submit" class="btn btn-primary">Xác nhận xóa</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        var deleteModel = document.getElementById('deleteModel')
        deleteModel.addEventListener('show.bs.modal', function(event) {
            // Button that triggered the modal
            var button = event.relatedTarget
            var id = button.getAttribute('data-bs-id')

            let formDelete = document.getElementById('formDelete')
            formDelete.setAttribute('action', '{{ route('admins.categories.deleteCategories') }}?idCategory=' + id)

        })
    </script>
@endpush
