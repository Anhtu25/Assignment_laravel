@extends('clients.layouts.main')
@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 100px">
            <h5>Giỏ hàng (<span class="counter-value" data-target="{{ $cartQuantity }}">{{ $cartQuantity }} Sản phẩm</span> )
            </h5>
        </div>

    </div>
    <!-- Page Header End -->

    @if (session('message'))
        <div class="alert alert-success" role="alert">
            {{ session('message') }}
        </div>
    @endif

    <!-- Cart Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <div class="col-lg-12 table-responsive mb-5">
                <table class="table table-bordered text-center mb-0">
                    <thead class="bg-secondary text-dark">
                        <tr>
                            <th>Sản phẩm</th>
                            <th>Ảnh</th>
                            <th>Giá bán</th>
                            <th>Số lượng</th>
                            <th>Tổng tiền</th>
                            <th>Chức năng </th>
                        </tr>
                    </thead>

                    @if (count($cart->cartDetails) != 0)
                        <form action="{{ route('clients.updateCart') }}" method="post">
                            @method('patch')
                            @csrf
                            <tbody class="align-middle">
                                @php
                                    $tongTien = 0;
                                @endphp
                                @foreach ($cart->cartDetails as $key => $cartDetail)
                                    <tr>

                                        <td class="align-middle">
                                            {{ Illuminate\Support\Str::limit($cartDetail->product->name, 18, '...') }}</td>
                                        <td class="align-middle">
                                            <img src="{{ Storage::url($cartDetail->product->image) }}" width="100"
                                                alt="" style="width: 100px;">
                                        </td>
                                        <td class="align-middle">{{ number_format($cartDetail->product->price_sale) }} VNĐ
                                        </td>
                                        <td class="align-middle">
                                            <div class="input-group quantity mx-auto" style="width: 100px;">
                                                <div class="input-group-btn">
                                                    <button class="btn btn-sm btn-primary btn-minus">
                                                        <i class="fa fa-minus"></i>
                                                    </button>
                                                </div>
                                                <input type="text" name="quantity[{{ $cartDetail->id }}]"
                                                    class="form-control form-control-sm bg-secondary text-center"
                                                    value="{{ $cartDetail->quantity }}">
                                                <div class="input-group-btn">
                                                    <button class="btn btn-sm btn-primary btn-plus">
                                                        <i class="fa fa-plus"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </td>

                                        <td class="align-middle">
                                            {{ number_format($cartDetail->product->price_sale * $cartDetail->quantity) }}
                                            VNĐ
                                        </td>
                                        <td class="align-middle">
                                            <button type="button" data-bs-toggle="modal" data-bs-target="#deleteModel"
                                                data-bs-id="{{ $cartDetail->id }}"class="text-bold btn btn-sm btn-danger">
                                                Xóa

                                            </button>
                                        </td>
                                    </tr>
                                    @php
                                        $tongTien += $cartDetail->product->price_sale * $cartDetail->quantity;

                                    @endphp
                                @endforeach
                                <tr>
                                    <td colspan="3" class="text-right">Tổng tiền:</td>
                                    <td colspan="2">{{ number_format($tongTien) }} VNĐ</td>
                                    <td colspan="2"> <a href="{{ route('order.checkout') }}" class="btn btn-block btn-primary text-white">Thanh
                                            toán</a></td>
                                </tr>
                            </tbody>
                        </form>
                    @else
                        <tbody>
                            <tr>
                                <td colspan="6">Bạn chưa có sản phẩm trong giỏ hàng</td>
                                <td>
                                    <a href="{{ route('clients.index') }}" class="btn btn-success">Tiếp tục mua hàng</a>
                                </td>
                            </tr>
                        </tbody>
                    @endif

                </table>
            </div>

        </div>
    </div>
    <!-- Cart End -->
    <div class="modal fade" id="deleteModel" tabindex="-1" aria-labelledby="deleteModel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="h3 fs-5" id="exampleModalLabel">Xác nhận xóa</h1>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        var deleteModel = document.getElementById('deleteModel');
        deleteModel.addEventListener('show.bs.modal', function(event) {
            // Button that triggered the modal
            var button = event.relatedTarget;
            var cartDetailId = button.getAttribute('data-bs-id');

            let formDelete = document.getElementById('formDelete');
            formDelete.setAttribute('action', '{{ route('clients.deleteCart') }}?cartDetailId=' + cartDetailId);
        });
    </script>
@endpush
