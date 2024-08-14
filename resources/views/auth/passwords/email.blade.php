@extends('frontend.layouts.app')

@section('title', 'Quên Mật Khẩu')

@section('content')
<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 text-center mb-5 text">
                <h1>Khôi Phục Mật Khẩu</h1>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12 col-lg-10">
                <div class="wrap d-md-flex">
                    <div class="text-wrap p-4 p-lg-5 text-center d-flex align-items-center order-md-last">
                        <div class="text w-100">
                            <h2>Quên mật khẩu?</h2>
                            <p>Nhập địa chỉ email của bạn để nhận liên kết đặt lại mật khẩu.</p>
                            <a href="{{ route('login') }}" class="btn btn-white btn-outline-white">Quay lại đăng nhập</a>
                        </div>
                    </div>
                    <div class="login-wrap p-4 p-lg-5">
                        <!-- Hiển thị thông báo lỗi -->
                        <x-auth-session-status class="mb-4" :status="session('status')" />

                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf

                            <!-- Địa chỉ email -->
                            <div class="form-group mb-3">
                                <label class="label" for="email">Địa chỉ email</label>
                                <x-text-input id="email" class="form-control" type="email" name="email" placeholder="Nhập Email" :value="old('email')" required autofocus />
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>

                            <div class="form-group">
                                <button type="submit" class="form-control btn btn-primary submit px-3">Gửi liên kết đặt lại mật khẩu</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
