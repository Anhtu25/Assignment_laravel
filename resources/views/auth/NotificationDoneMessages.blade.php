@extends('auth.Main')
@section('contentInHere')
    <div class="auth-page-content">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card mt-4">
                        <div class="card-body p-4 text-center">
                            <div class="avatar-lg mx-auto mt-2">
                                <div class="avatar-title bg-light text-success display-3 rounded-circle">
                                    <i class="ri-checkbox-circle-fill"></i>
                                </div>
                            </div>
                            <div class="mt-4 pt-2">
                                <h4>Well done !</h4>
                                <p class="text-muted mx-4">Aww yeah, you successfully read this important message.</p>
                                <div class="mt-4">
                                    <a href="{{ route('PasswordChange') }}" class="btn btn-success w-100">Back to Dashboard</a>
                                </div>
                            </div>
                        </div>
                        <!-- end card body -->
                    </div>
                    <!-- end card -->

                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
@endsection
