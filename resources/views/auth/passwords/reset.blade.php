@extends('frontend.layouts.app')

@section('title', 'Đặt Lại Mật Khẩu')

@section('content')
<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 col-lg-10">
                <div class="wrap d-md-flex">
                    <div class="text-wrap p-4 p-lg-5 text-center d-flex align-items-center order-md-last">
                        <div class="text w-100">
                            <h2>Đặt lại mật khẩu</h2>
                            <p>Nhập thông tin để đặt lại mật khẩu của bạn</p>
                            <a href="{{ route('login') }}" class="btn btn-white btn-outline-white">Quay lại đăng nhập</a>
                        </div>
                    </div>
                    <div class="login-wrap p-4 p-lg-5">
                        <div class="d-flex">
                            <div class="w-100">
                                <h3 class="mb-4">Đặt lại mật khẩu</h3>
                            </div>
                        </div>

                        <!-- Hiển thị thông báo lỗi -->
                        <x-auth-session-status class="mb-4" :status="session('status')" />

                        <form method="POST" action="{{ route('password.update') }}">
                            @csrf

                            <!-- Token đặt lại mật khẩu -->
                            <input type="hidden" name="token" value="{{ $token }}">

                            <!-- Địa chỉ email -->
                            <div class="form-group mb-3">
                                <label class="label" for="email">Địa chỉ email</label>
                                <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email', $email)" disabled required autofocus autocomplete="username" />
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>

                            <!-- Mật khẩu mới -->
                            <div class="form-group mb-3">
                                <label class="label" for="password">Mật khẩu mới</label>
                                <x-text-input id="password" class="form-control" type="password" name="password" placeholder="Nhập mật khẩu mới" required autocomplete="new-password" />
                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            </div>

                            <!-- Xác nhận mật khẩu -->
                            <div class="form-group mb-3">
                                <label class="label" for="password_confirmation">Xác nhận mật khẩu</label>
                                <x-text-input id="password_confirmation" class="form-control" type="password" name="password_confirmation" placeholder="Xác nhận mật khẩu" required autocomplete="new-password" />
                                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                            </div>

                            <div class="form-group">
                                <button type="submit" class="form-control btn btn-primary submit px-3">Đặt lại mật khẩu</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
