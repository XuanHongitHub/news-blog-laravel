<!-- resources/views/auth/login.blade.php -->
@extends('frontend.layouts.app')

@section('title', 'Đăng Nhập')

@section('content')
<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 col-lg-10">
                <div class="wrap d-md-flex">
                    <div class="text-wrap p-4 p-lg-5 text-center d-flex align-items-center order-md-last">
                        <div class="text w-100">
                            <h2>Chào mừng bạn đến với trang đăng nhập</h2>
                            <p>Chưa có tài khoản?</p>
                            <a href="{{ route('register') }}" class="btn btn-white btn-outline-white">Đăng ký</a>
                        </div>
                    </div>
                    <div class="login-wrap p-4 p-lg-5">
                        <div class="d-flex">
                            <div class="w-100">
                                <h3 class="mb-4">Đăng nhập</h3>
                            </div>
                        </div>

                        <!-- Hiển thị thông báo session -->
                        <x-auth-session-status class="mb-4" :status="session('status')" />

                        <!-- Form đăng nhập -->
                        <form method="POST" action="{{ route('login') }}" class="signin-form">
                            @csrf
                            <div class="form-group mb-3">
                                <label class="label" for="email">Tên đăng nhập</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="Tên đăng nhập" value="{{ old('email') }}" required autofocus>
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>
                            <div class="form-group mb-3">
                                <label class="label" for="password">Mật khẩu</label>
                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="Mật khẩu" required>
                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            </div>
                            <div class="form-group">
                                <button type="submit" class="form-control btn btn-primary submit px-3">Đăng nhập</button>
                            </div>
                            <div class="form-group d-md-flex">
                                <div class="w-50 text-left">
                                    <label class="checkbox-wrap checkbox-primary mb-0">Nhớ tài khoản
                                        <input type="checkbox" name="remember" id="remember_me" checked>
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="w-50 text-md-right">
                                    @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}">Quên mật khẩu?</a>
                                    @endif
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
