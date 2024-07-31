@extends('admins.layouts.main')
@section('title')
@endsection
@push('styles')
    <style>
        .img-product{
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
                        <h4 class="card-title mb-0">Danh Sách Sản Phẩm</h4>
                    </div><!-- end card header -->

                    <div class="card-body">
                        <div class="listjs-table" id="customerList">
                            <div class="row g-4 mb-3">
                                <div class="col-sm-auto">
                                    <div>
                                        <a href="{{ route('admins.products.addProducts') }}"><button type="button"
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
                                            <th class="text-center" scope="col">STT</th>
                                            <th class="text-center" scope="col">Tên sản phẩm</th>
                                            <th class="text-center" scope="col">Ảnh</th>
                                            <th class="text-center" scope="col">Tên tác giả</th>
                                            <th class="text-center" scope="col">Nhà xuất bản</th>
                                            <th class="text-center" scope="col">Năm xuất bản</th>
                                            <th class="text-center" scope="col">Giá sản phẩm</th>
                                            <th class="text-center" scope="col">Mô tả</th>
                                            {{-- <th class="text-center" scope="col">Danh mục</th> --}}
                                            <th class="text-center" scope="col">Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody class="list form-check-all">
                                        @foreach ($products as $key => $value)
                                            <tr>
                                                <td></td>
                                                <th scope='row'>{{ $key + 1 }}</th>
                                                <td class="customer_name">{{ $value->name }}</td>
                                                <td><img class="img-product" src="{{ asset($value->image) }}"
                                                        alt="{{ $value->name }}"></td>
                                                <td class="author">{{ $value->author->name }}</td>
                                                <td>{{ $value->publisher->name }}</td>
                                                <td>{{ $value->year_published }}</td>
                                                <td>{{ $value->price }}</td>
                                                <td>{{ $value->description }}</td>
                                                {{-- <td>{{ $value->category->name }}</td> --}}
                                                <td>
                                                    <a href="{{ route('admins.products.detailProducts', $value->id) }}"><button
                                                            class="btn btn-primary">Chi tiết</button></a>
                                                    <a href="{{ route('admins.products.editProducts',$value->id) }}" class="btn btn-warning">Sửa</a>
                                                    <button class="btn btn-danger btn-delete" data-bs-id="{{ $value->id }}" data-bs-toggle="modal"
                                                        data-bs-target="#deleteModel">Xóa</button>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
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

                            {{-- <div class="d-flex justify-content-end">
                                <div class="pagination-wrap hstack gap-2">
                                    @if ($user->onFirstPage())
                                        <a class="page-item pagination-prev disabled" href="javascript:void(0);">
                                            Previous
                                        </a>
                                    @else
                                        <a class="page-item pagination-prev" href="{{ $user->previousPageUrl() }}">
                                            Previous
                                        </a>
                                    @endif

                                    <ul class="pagination listjs-pagination mb-0">
                                        @if ($user->currentPage() > 1)
                                            <li class="page-item">
                                                <a class="page-link" href="{{ $user->url(1) }}">1</a>
                                            </li>
                                            @if ($user->currentPage() > 2)
                                                <li class="page-item disabled"><span class="page-link">...</span></li>
                                            @endif
                                        @endif

                                        <li class="page-item active">
                                            <a class="page-link"
                                                href="javascript:void(0);">{{ $user->currentPage() }}</a>
                                        </li>

                                        @if ($user->currentPage() < $user->lastPage() - 1)
                                            <li class="page-item disabled"><span class="page-link">...</span></li>
                                        @endif

                                        @if ($user->currentPage() < $user->lastPage())
                                            <li class="page-item">
                                                <a class="page-link"
                                                    href="{{ $user->url($user->lastPage()) }}">{{ $user->lastPage() }}</a>
                                            </li>
                                        @endif
                                    </ul>

                                    @if ($user->hasMorePages())
                                        <a class="page-item pagination-next" href="{{ $user->nextPageUrl() }}">
                                            Next
                                        </a>
                                    @else
                                        <a class="page-item pagination-next disabled" href="javascript:void(0);">
                                            Next
                                        </a>
                                    @endif
                                </div>
                            </div> --}}


                        </div>
                    </div><!-- end card -->

                </div>
                <!-- end col -->
            </div>
            <!-- end col -->
        </div>

        <!-- Modal Add-->
        {{-- <div class="modal fade" id="addUserLabel" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content ">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Thêm mới User</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('admins.users.addUsers') }}" method="post" class="m-3">
                    @csrf
                    <div class="mt-3">
                        <label for="name">Name</label>
                        <input class="form-control" type="text" name="name" id="name">
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        @if (session('messageError'))
                            <span class="text-danger">{{ session('messageError') }}</span>
                        @endif
                    </div>

                    <div class="mt-3">
                        <label for="email">Email</label>
                        <input class="form-control" type="text" name="email" id="email">
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        @if (session('messageError'))
                            <span class="text-danger">{{ session('messageError') }}</span>
                        @endif
                    </div>
                    {{-- <div class="mt-3">
                        <label for="text">Image</label>
                        <input class="form-control" type="file" name="imageUser" id="imageUser" accept="admins/assets/images/*">
                        @error('imageUser')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        @if (session('messageError'))
                            <span class="text-danger">{{ session('messageError') }}</span>
                        @endif
                    </div> --}}

        {{-- <div class="mt-3">
                        <label for="password">Password</label>
                        <input class="form-control" type="text" name="password" id="password">
                        @error('password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        @if (session('messageError'))
                            <span class="text-danger">{{ session('messageError') }}</span>
                        @endif
                    </div>
                    <div class="mt-3">
                        <label for="role">Role</label>
                        <select name="role" id="role" class="form-control">
                            <option value="1">Admin</option>
                            <option value="2">User</option>
                        </select>

                    </div>
                    <div class="modal-footer mt-3">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                        <button type="submit" class="btn btn-primary">Thêm mới</button>
                    </div>
                </form>
            </div>
        </div>
    </div> --}}
        <!--end modal -->

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
            formDelete.setAttribute('action','{{ route("admins.products.deleteProduct") }}?idProduct='+id)

        })
    </script>
@endpush
