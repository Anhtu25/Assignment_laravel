@extends('admins.layouts.main')
@section('title')
    @parent
    Danh sách người dùng
@endsection
@section('content')
    <div class="mt-3 main-content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title mb-0">Danh Sách Người Dùng</h4>
                    </div><!-- end card header -->
                    <div class="row mt-3">
                        <div class="col-xl-3 col-md-6">
                            <!-- card -->
                            <div class="card card-animate">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-grow-1 overflow-hidden">
                                            <p class="text-uppercase fw-medium text-muted text-truncate mb-0">Quản lý Người
                                                dùng</p>
                                        </div>
                                        <div class="flex-shrink-0">
                                            <h5 class="text-success fs-14 mb-0">
                                                {{-- <i class="ri-arrow-right-up-line fs-13 align-middle"></i> +16.24 % --}}
                                            </h5>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-end justify-content-between mt-4">
                                        <div>
                                            <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span class="counter-value"
                                                    data-target="{{ $userManagerCount }}">0</span></h4>
                                            <a href="" class="text-decoration-underline">Xem Quản lý Người dùng</a>
                                        </div>
                                        <div class="avatar-sm flex-shrink-0">
                                            <span class="avatar-title bg-success-subtle rounded fs-3">
                                                <i class="bx bx-user-circle text-success"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div><!-- end card body -->
                            </div><!-- end card -->
                        </div><!-- end col -->

                        <div class="col-xl-3 col-md-6">
                            <!-- card -->
                            <div class="card card-animate">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-grow-1 overflow-hidden">
                                            <p class="text-uppercase fw-medium text-muted text-truncate mb-0">Quản lý Admin
                                            </p>
                                        </div>
                                        <div class="flex-shrink-0">
                                            <h5 class="text-danger fs-14 mb-0">
                                                {{-- <i class="ri-arrow-right-down-line fs-13 align-middle"></i> -3.57 % --}}
                                            </h5>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-end justify-content-between mt-4">
                                        <div>
                                            <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span class="counter-value"
                                                    data-target="{{ $adminManagerCount }}">0</span></h4>
                                            <a href="" class="text-decoration-underline">Xem Quản lý Admin</a>
                                        </div>
                                        <div class="avatar-sm flex-shrink-0">
                                            <span class="avatar-title bg-info-subtle rounded fs-3">
                                                <i class="bx bx-user-circle text-info"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div><!-- end card body -->
                            </div><!-- end card -->
                        </div><!-- end col -->

                        <div class="col-xl-3 col-md-6">
                            <!-- card -->
                            <div class="card card-animate">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-grow-1 overflow-hidden">
                                            <p class="text-uppercase fw-medium text-muted text-truncate mb-0">Khách Hàng
                                            </p>
                                        </div>
                                        <div class="flex-shrink-0">
                                            <h5 class="text-success fs-14 mb-0">
                                                <i class="ri-arrow-right-up-line fs-13 align-middle"></i> +29.08 %
                                            </h5>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-end justify-content-between mt-4">
                                        <div>
                                            <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span class="counter-value"
                                                    data-target="183.35">0</span>M </h4>
                                            <a href="" class="text-decoration-underline">Xem Chi Tiết</a>
                                        </div>
                                        <div class="avatar-sm flex-shrink-0">
                                            <span class="avatar-title bg-warning-subtle rounded fs-3">
                                                <i class="bx bx-user-circle text-warning"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div><!-- end card body -->
                            </div><!-- end card -->
                        </div><!-- end col -->

                        <div class="col-xl-3 col-md-6">
                            <!-- card -->
                            <div class="card card-animate">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-grow-1 overflow-hidden">
                                            <p class="text-uppercase fw-medium text-muted text-truncate mb-0"> Số Dư</p>
                                        </div>
                                        <div class="flex-shrink-0">
                                            <h5 class="text-muted fs-14 mb-0">
                                                +0.00 %
                                            </h5>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-end justify-content-between mt-4">
                                        <div>
                                            <h4 class="fs-22 fw-semibold ff-secondary mb-4">$<span class="counter-value"
                                                    data-target="165.89">0</span>k </h4>
                                            <a href="" class="text-decoration-underline">Rút Tiền</a>
                                        </div>
                                        <div class="avatar-sm flex-shrink-0">
                                            <span class="avatar-title bg-primary-subtle rounded fs-3">
                                                <i class="bx bx-wallet text-primary"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div><!-- end card body -->
                            </div><!-- end card -->
                        </div><!-- end col -->
                    </div> <!-- end row-->
                    <div class="card-body">
                        <div class="listjs-table" id="customerList">
                            <div class="row g-4 mb-3">
                                <div class="col-sm-auto">
                                    <div>
                                        <button type="button" class="btn btn-success add-btn" data-bs-toggle="modal"
                                            id="create-btn" data-bs-target="#addUserLabel"><i
                                                class="ri-add-line align-bottom me-1"></i> Thêm mới</button>
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
                                            <th class="sort" data-sort="customer_name">Họ & Tên</th>
                                            <th class="sort" data-sort="email">Email</th>
                                            {{-- <th class="sort" data-sort="image">Image</th> --}}
                                            <th class="sort" data-sort="phone">Ngày Tạo</th>
                                            <th class="sort" data-sort="date">Ngày Cập Nhật</th>
                                            <th class="sort" data-sort="status">Quyền Người Dùng</th>
                                            <th class="sort" data-sort="action">Thao Tác</th>
                                        </tr>
                                    </thead>
                                    <tbody class="list form-check-all">
                                        @foreach ($user as $u)
                                            <tr>
                                                <th scope="row">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="chk_child"
                                                            value="option1">
                                                    </div>
                                                </th>
                                                {{-- <td class="id" style="display:none;"><a href="javascript:void(0);"
                                                class="fw-medium link-primary">#VZ2101</a></td> --}}
                                                <td class="customer_name">{{ $u->name }}</td>
                                                <td class="email">{{ $u->email }}</td>
                                                {{-- <td><img class="img-user" src="/{{ $u->image }}" alt="{{ $u->name }}" width="100px"></td> --}}
                                                <td class="phone">{{ $u->created_at->format('d/m/Y H:i:s') }}</td>
                                                <td class="date">{{ $u->updated_at->format('d/m/Y H:i:s') }}</td>
                                                @if ($u->role == 1)
                                                    <td class="status"><span
                                                            class="badge bg-danger-subtle text-danger text-uppercase">Admin</span>
                                                    </td>
                                                @elseif($u->role == 2)
                                                    <td class="status"><span
                                                            class="badge bg-success-subtle text-success text-uppercase">Khách
                                                            Hàng</span>
                                                    </td>
                                                @endif
                                                <td>
                                                    <div class="d-flex gap-2">
                                                        {{-- <div class="detail">
                                                            <button class="btn btn-sm btn-success edit-item-btn"
                                                                data-bs-toggle="modal" data-bs-target="#detailModel"> Chi
                                                                tiết
                                                            </button>
                                                        </div> --}}
                                                        <div class="edit">
                                                            <button class="btn btn-sm btn-success edit-item-btn"
                                                                data-id="{{ $u->id }}" data-bs-toggle="modal"
                                                                data-bs-target="#editModel"> Sửa
                                                            </button>
                                                        </div>
                                                        <div class="remove">
                                                            <button class="btn btn-sm btn-danger remove-item-btn"
                                                                data-bs-id="{{ $u->id }}" data-bs-toggle="modal"
                                                                data-bs-target="#deleteModel"> Xóa </button>
                                                        </div>
                                                    </div>
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

                            <div class="d-flex justify-content-end">
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
                            </div>


                        </div>
                    </div><!-- end card -->

                </div>
                <!-- end col -->
            </div>
            <!-- end col -->
        </div>

        <!-- Modal Add-->
        <div class="modal fade" id="addUserLabel" tabindex="-1" aria-labelledby="exampleModalLabel"
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

                        <div class="mt-3">
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
        </div>
        <!--end modal -->

    </div>
    <!-- Modal Update-->
    <div class="modal fade" id="editModel" tabindex="-1" aria-labelledby="editModelLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="editModelLabel">Update User</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('admins.users.updateUser') }}" method="post" class="m-3">
                    {{-- @method('PATCH') --}}
                    @csrf
                    <input type="hidden" id="idUserUpdate" name="idUser">
                    <div class="mt-3">
                        <label for="nameUpdate">Name</label>
                        <input class="form-control" type="text" name="name" id="nameUpdate">
                    </div>
                    <div class="mt-3">
                        <label for="emailUpdate">Email</label>
                        <input class="form-control" type="text" name="email" id="emailUpdate">
                    </div>
                    <div class="mt-3">
                        <label for="roleUpdate">Role</label>
                        <select name="role" id="roleUpdate" class="form-control">
                            <option value="1">Admin</option>
                            <option value="2">User</option>
                        </select>
                    </div>
                    <div class="modal-footer mt-3">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                        <button type="submit" class="btn btn-primary">Chỉnh sửa</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!--end modal -->

    {{-- Modal Delete --}}
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
                        <button type="submit" class="btn btn-danger">Xác nhận xóa</button>
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
            var idUser = button.getAttribute('data-bs-id')

            let formDelete = document.getElementById('formDelete')
            formDelete.setAttribute('action', '{{ route('admins.users.delUser') }}?idUser=' + idUser)

        })

        var editModel = document.getElementById('editModel')
        editModel.addEventListener('show.bs.modal', function(event) {
            var button = event.relatedTarget
            var idUser = button.getAttribute('data-id')
            // Call API
            let url = "{{ route('admins.users.detailUser') }}?id=" + idUser;
            fetch(url, {
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }

                })
                .then((response) => response.json())
                .then((data) => {
                    // console.log(data);
                    document.querySelector('#idUserUpdate').value = data.id
                    document.querySelector('#nameUpdate').value = data.name
                    document.querySelector('#emailUpdate').value = data.email
                    document.querySelector('#roleUpdate').value = data.role

                })
        })
    </script>
@endpush
