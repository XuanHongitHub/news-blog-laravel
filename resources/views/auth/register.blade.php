<!-- resources/views/auth/register.blade.php -->
@extends('frontend.layouts.app')

@section('title', 'Đăng Ký')

@section('content')
<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 col-lg-10">
                <div class="wrap d-md-flex">
                    <div class="text-wrap p-4 p-lg-5 text-center d-flex align-items-center order-md-last">
                        <div class="text w-100">
                            <h2>Chào mừng bạn đến với trang đăng ký</h2>
                            <p>Đã có tài khoản?</p>
                            <a href="{{ route('login') }}" class="btn btn-white btn-outline-white">Đăng nhập</a>
                        </div>
                    </div>
                    <div class="login-wrap p-4 p-lg-5">
                        <div class="d-flex">
                            <div class="w-100">
                                <h3 class="mb-4">Đăng ký tài khoản</h3>
                            </div>
                        </div>

                        <!-- Hiển thị thông báo session -->
                        <x-auth-session-status class="mb-4" :status="session('status')" />

                        <!-- Form đăng ký -->
                        <form method="POST" action="{{ route('register') }}" class="signin-form">
                            @csrf
                            <div class="form-group mb-3">
                                <label class="label" for="name">Tên Người Dùng</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="Tên của bạn" value="{{ old('name') }}" required autofocus>
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>
                            <div class="form-group mb-3">
                                <label class="label" for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="Email của bạn" value="{{ old('email') }}" required>
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>
                            <div class="form-group mb-3">
                                <label class="label" for="password">Mật khẩu</label>
                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="Mật khẩu" required>
                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            </div>
                            <div class="form-group mb-3">
                                <label class="label" for="password_confirmation">Xác nhận mật khẩu</label>
                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"
                                    placeholder="Xác nhận mật khẩu" required>
                                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                            </div>
                            <div class="form-group">
                                <button type="submit" class="form-control btn btn-primary submit px-3">Đăng ký</button>
                            </div>
                            <div class="form-group d-md-flex">
                                <div class="w-50 text-left">
                                    <!-- Optionally you can add something here if needed -->
                                </div>
                                <div class="w-100 text-md-right">
                                    <a href="{{ route('login') }}" class="btn-highlight">Đã có tài khoản? <span class="highlight-text">Đăng nhập</span></a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
