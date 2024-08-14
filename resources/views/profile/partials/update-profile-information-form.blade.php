<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Thông tin cá nhân') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Cập nhật thông tin hồ sơ và địa chỉ email của tài khoản của bạn.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" enctype="multipart/form-data" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div class="flex items-start space-x-6">
            <!-- Phần thông tin cá nhân -->
            <div class="flex-1">
                <div>
                    <x-input-label for="name" :value="__('Tên')" />
                    <x-text-input id="name" name="name" type="text" class="mt-1 block w-full"
                        :value="old('name', $user->name)" required autofocus autocomplete="name" />
                    <x-input-error class="mt-2" :messages="$errors->get('name')" />
                </div>

                <div class="mt-4">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" name="email" type="email" class="mt-1 block w-full"
                        :value="old('email', $user->email)" required autocomplete="username" />
                    <x-input-error class="mt-2" :messages="$errors->get('email')" />

                    @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                    <div>
                        <p class="text-sm mt-2 text-gray-800">
                            {{ __('Your email address is unverified.') }}

                            <button form="send-verification"
                                class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                {{ __('Click here to re-send the verification email.') }}
                            </button>
                        </p>

                        @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                        @endif
                    </div>
                    @endif
                </div>
            </div>

            <!-- Phần upload ảnh -->
            <div class="avatar-upload-container flex-shrink-0 w-1">
                <x-input-label class="text-center block" for="avatar" :value="__('Ảnh đại diện')" />

                <div class="avatar-upload">
                    <div class="avatar-edit">
                        <input type='file' id="imageUpload" name="avatar" accept=".png, .jpg, .jpeg" />
                        <label for="imageUpload"></label>
                    </div>
                    <div class="avatar-preview">
                        <div id="imagePreview"
                            style="background-image: url('{{ $user->avatar ? asset('storage/' . $user->avatar) : asset('storage/default-avatar.png') }}');">
                        </div>
                    </div>
                </div>
                <x-input-error class="mt-2" :messages="$errors->get('avatar')" />
            </div>

        </div>

        <div class="flex items-center gap-4 mt-4">
            <x-primary-button>{{ __('Lưu') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
            <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                class="text-sm text-gray-600">{{ __('Đã lưu.') }}</p>
            @endif
        </div>
    </form>

</section>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<style>
    /* CSS đã có sẵn */
    .avatar-upload {
        position: relative;
        max-width: 205px;
        margin: auto;
    }

    .avatar-edit {
        position: absolute;
        right: 12px;
        z-index: 1;
        top: 10px;
    }

    .avatar-edit input {
        display: none;
    }

    .avatar-edit label {
        display: inline-block;
        width: 34px;
        height: 34px;
        margin-bottom: 0;
        border-radius: 100%;
        background: #FFFFFF;
        border: 1px solid transparent;
        box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.12);
        cursor: pointer;
        font-weight: normal;
        transition: all .2s ease-in-out;
    }

    .avatar-edit label:after {
        content: "\f040";
        /* Unicode của biểu tượng từ FontAwesome */
        font-family: 'FontAwesome';
        color: #757575;
        position: absolute;
        top: 10px;
        left: 0;
        right: 0;
        text-align: center;
        margin: auto;
    }

    .avatar-preview {
        width: 192px;
        height: 192px;
        position: relative;
        border-radius: 100%;
        border: 6px solid #F8F8F8;
        box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);
    }

    .avatar-preview>div {
        width: 100%;
        height: 100%;
        border-radius: 100%;
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
    }

    /* Flexbox cho form */
    .flex {
        display: flex;
        align-items: flex-start;
    }

    .flex-1 {
        flex: 1;
    }

    .flex-shrink-0 {
        flex-shrink: 0;
    }

    .w-1 {
        width: 40%;
    }

    .space-x-6>*+* {
        margin-left: 1.5rem;
        /* Khoảng cách giữa các phần tử */
    }

    .mt-4 {
        margin-top: 1rem;
        /* Khoảng cách giữa các phần tử */
    }
</style>

<script>
 document.addEventListener('DOMContentLoaded', function() {
    const imageUpload = document.getElementById('imageUpload');
    const imagePreview = document.getElementById('imagePreview');

    imageUpload.addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();

            reader.onload = function(e) {
                // Cập nhật background-image của div#imagePreview với ảnh mới
                imagePreview.style.backgroundImage = `url(${e.target.result})`;
            }

            // Đọc ảnh dưới dạng URL
            reader.readAsDataURL(file);
        }
    });
});
</script>