@extends('clients.layouts.main')
@section('content')
    {{-- !-- Page Header Start --> --}}
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Thanh toán</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="">Trang chủ</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Thanh toán</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Checkout Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <div class="col-lg-8">
                <form action="{{ route('order.postCheckout') }}" method="post">
                    @csrf
                    <div class="mb-4">
                        <h4 class="font-weight-semi-bold mb-4">Thông tin thanh toán</h4>
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <label>Họ và tên</label>
                                <input class="form-control" type="text" name="name" id="name"
                                    value="{{ $auth->name }}">
                            </div>

                            <div class="col-md-12 form-group">
                                <label>Email</label>
                                <input class="form-control" type="text" name="email" id="email"
                                    value="{{ $auth->email }}">
                            </div>
                            <div class="col-md-12 form-group">
                                <label>Số điện thoại</label>
                                <input class="form-control" type="text" name="phone" id="phone"
                                    value="{{ $auth->phone_number }}">
                            </div>
                            <div class="col-md-12 form-group">
                                <label>Địa chỉ</label>
                                <input class="form-control" type="text" name="address"
                                    id="address"value="{{ $auth->address }}">
                            </div>


                        </div>
                    </div>
                    {{-- <div class="collapse mb-4" id="shipping-address">
                        <h4 class="font-weight-semi-bold mb-4">Shipping Address</h4>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label>First Name</label>
                                <input class="form-control" type="text" placeholder="John">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Last Name</label>
                                <input class="form-control" type="text" placeholder="Doe">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>E-mail</label>
                                <input class="form-control" type="text" placeholder="example@email.com">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Mobile No</label>
                                <input class="form-control" type="text" placeholder="+123 456 789">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Address Line 1</label>
                                <input class="form-control" type="text" placeholder="123 Street">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Address Line 2</label>
                                <input class="form-control" type="text" placeholder="123 Street">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Country</label>
                                <select class="custom-select">
                                    <option selected>United States</option>
                                    <option>Afghanistan</option>
                                    <option>Albania</option>
                                    <option>Algeria</option>
                                </select>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>City</label>
                                <input class="form-control" type="text" placeholder="New York">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>State</label>
                                <input class="form-control" type="text" placeholder="New York">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>ZIP Code</label>
                                <input class="form-control" type="text" placeholder="123">
                            </div>
                        </div>
                    </div> --}}
                    <div class="card-footer border-secondary bg-transparent">
                        <button class="btn btn-lg btn-block btn-danger font-weight-bold my-3 py-3">Place Order</button>
                    </div>
                </form>
            </div>

            <div class="col-lg-4">
                @php
                    $tongTien = 0;
                @endphp
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Số lượng sản phẩm</h4>
                    </div>

                    <div class="card-body">
                        {{-- <h5 class="font-weight-medium mb-3">Sản phẩm</h5> --}}
                        @foreach ($cart->cartDetails as $key => $cartDetail)
                            <div class="d-flex justify-content-between">
                                <p>{{ Illuminate\Support\Str::limit($cartDetail->product->name, 18, '...') }}</p>
                                <p>{{ number_format($cartDetail->product->price_sale) }} VNĐ</p>

                            </div>
                            @php
                                $tongTien += $cartDetail->product->price_sale * $cartDetail->quantity;

                            @endphp
                        @endforeach
                    </div>

                </div>

                <div class="card-footer border-secondary bg-transparent">
                    <div class="d-flex justify-content-between mt-2">
                        <h5 class="font-weight-bold">Tổng tiền</h5>
                        <h5 class="font-weight-bold">{{ number_format($tongTien) }} VNĐ</h5>
                    </div>
                </div>

                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Phương thức thanh toán</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="payment" id="paypal">
                                <label class="custom-control-label" for="paypal">Chuyển khoản</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="payment" id="directcheck">
                                <label class="custom-control-label" for="directcheck">Trả khi nhận hàng</label>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- Checkout End -->
@endsection
