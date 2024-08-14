<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>{{ $body['title'] }}</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- Favicons -->
  <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">
  <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=EB+Garamond:wght@400;500&family=Inter:wght@400;500&family=Playfair+Display:ital,wght@0,400;0,700;1,400;1,700&display=swap"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">

  <!-- Template Main CSS Files -->
  <link href="{{ asset('assets/css/variables.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/css/app.css') }}" rel="stylesheet">

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

  <!-- Scripts -->
  @vite(['resources/js/app.js'])

</head>

<body style="background-color: #f9fbfe">

  <!-- ======= Header ======= -->
  <header id="header" style="background-color: white" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="{{url('/')}}" class="logo d-flex align-items-center">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="" alt=""> -->
        <h1>Xuan</h1>
        <h1 class="text-info">Hong</h1>
      </a>

      <nav id="navbar" class="navbar">
        <ul>

          <li><a href="{{url('/')}}">Trang Chủ</a></li>

          <li class="dropdown"><a><span>Danh Mục</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
            <ul>
              @foreach ($categories_nav as $category)
              <li class="nav-item">
                <a class="nav-link"
                  href="{{ url('/single-category', [$category->slug]) }}">{{$category->category_name}}</a>
              </li>
              @endforeach
              <li class="nav-item">
                <a class="nav-link"
                  href="{{ url('/all-posts') }}">Tất Cả Bài Viết</a>
              </li>
            </ul>
          </li>
          <li><a href="{{url('about')}}">Giới Thiệu</a></li>
          <li><a href="{{url('contact')}}">Liên Hệ</a></li>
        </ul>
      </nav>

      <div class="position-relative flex">

        @if (Route::has('login'))
        @auth
        <!-- Settings Dropdown -->
        <div class="hidden sm:flex sm:items-center sm:ms-6">
          <x-dropdown align="right" width="48">
            <x-slot name="trigger">
              <button
                class="inline-flex items-center px-3 py-2 text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                <div>{{ Auth::user()->name }}</div>

                <div class="ms-1">
                  <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                      d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                      clip-rule="evenodd" />
                  </svg>
                </div>
              </button>
            </x-slot>

            <x-slot name="content">
              <x-dropdown-link :href="route('profile.edit')">
                {{ __('Thông tin tài khoản') }}
              </x-dropdown-link>

              @auth
              @if (Auth::user()->roles == 'admin')
              <x-dropdown-link :href="route('admin.index')">
                {{ __('Truy cập trang quản trị') }}
              </x-dropdown-link>
              @endif
              @endauth

              <!-- Authentication -->
              <form method="POST" action="{{ route('logout') }}">
                @csrf

                <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                  {{ __('Đăng Xuất') }}
                </x-dropdown-link>
              </form>
            </x-slot>
          </x-dropdown>
        </div>

        @else
        <a href="{{ route('login') }}" class="login-button me-1 px-3 py-2">
          Đăng Nhập
        </a>
        @if (Route::has('register'))
        <a href="{{ route('register') }}" class="register-button mx-2 px-3 py-2">
          Đăng Ký
        </a>
        @endif
        @endauth
        @endif

        <a href="#" class="mx-3 js-search-open" style="line-height: 230%"><span class="bi-search"></span></a>
        <i class="bi bi-list mobile-nav-toggle"></i>

        <!-- ======= Search Form ======= -->
        <div class="search-form-wrap js-search-form-wrap">
          <form action="{{ route('search.results') }}" method="GET" class="search-form">
            <span class="icon bi-search"></span>
            <input type="text" placeholder="Search" name="query" class="form-control" required>
            <button><span class="icon bi-search"></span></button>
            <button class="btn js-search-close"><span class="bi-x"></span></button>
          </form>
        </div><!-- End Search Form -->

      </div>

    </div>

  </header><!-- End Header -->

  {{-- Error Message --}}
  @include('components.errors')
  {{-- End Error Message --}}

  <!-- ======= Main Content ======= -->
  @yield('content')
  <!-- ======= End Main Content  ======= -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">

    <div class="footer-content">
      <div class="container">

        <div class="row g-5">
          <div class="col-lg-4">
            <h3 class="footer-heading">Về XuanHong Blog</h3>
            <p>Xuan Hong là trang tin tức tổng hợp về cuộc sống hằng ngày.</p>
            <p><a href="{{url('about')}}" class="footer-link-more">Xem Thêm</a></p>
          </div>
          <div class="col-6 col-lg-2">
            <h3 class="footer-heading">Menu</h3>
            <ul class="footer-links list-unstyled">
              <li><a href="{{url('/')}}"><i class="bi bi-chevron-right"></i> Trang chủ</a></li>
              <li><a href="{{url('all-posts')}}"><i class="bi bi-chevron-right"></i> Tất cả bài viết</a></li>
              <li><a href="{{url('about')}}"><i class="bi bi-chevron-right"></i> Giới Thiệu</a></li>
              <li><a href="{{url('contact')}}"><i class="bi bi-chevron-right"></i> Liên Hệ</a></li>
            </ul>
          </div>
          <div class="col-6 col-lg-2">
            <h3 class="footer-heading">Danh Mục</h3>
            <ul class="footer-links list-unstyled">
              @foreach ($categories_nav as $category)
              <li class="nav-item">
                <a class="nav-link" href="{{ url('/single-category', [$category->slug]) }}"><i
                    class="bi bi-chevron-right"></i>{{$category->category_name}}</a>
              </li>
              @endforeach
            </ul>
          </div>

          <div class="col-lg-4">
            <h3 class="footer-heading">Bài Viết Mới</h3>

            <ul class="footer-links footer-blog-entry list-unstyled">
              @foreach ($latestPosts as $post)
              <li>
                <a href="{{ url('/single-post',[$post->slug]) }}" class="d-flex align-items-center">
                  <img src="{{ asset($post->preview) }}" alt="" class="img-fluid me-3">
                  <div>
                    <div class="post-meta d-block"><span
                        class="date">{{ \App\Models\Category::find($post->category_id)->category_name }}</span> <span
                        class="mx-1">&bullet;</span>
                      <span>{{ Carbon\Carbon::parse($post->created_at)->translatedFormat('jS F Y') }}</span></div>
                    <span>{{ $post->title }}</span>
                  </div>
                </a>
              </li>
              @endforeach
            </ul>
          </div>
        </div>
      </div>
    </div>

    <div class="footer-legal">
      <div class="container">

        <div class="row justify-content-between">
          <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
            <div class="copyright">
              © Copyright <strong><span class="text-info">XuanHong</span></strong>. All Rights Reserved
            </div>

            {{-- <div class="credits">
              <!-- All the links in the footer should remain intact. -->
              <!-- You can delete the links only if you purchased the pro version. -->
              <!-- Licensing information: https://bootstrapmade.com/license/ -->
              <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/herobiz-bootstrap-business-template/ -->
              Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
            </div> --}}

          </div>

          <div class="col-md-6">
            <div class="social-links mb-3 mb-lg-0 text-center text-md-end">
              <a href="https://www.facebook.com/ohoho.1509/" class="facebook"><i class="bi bi-facebook text-info"></i></a>
            </div>

          </div>

        </div>

      </div>
    </div>

  </footer>

  <a href="#" class="scroll-top d-flex align-items-center justify-content-center bg-info"><i
      class="bi bi-arrow-up-short "></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('assets/js/main.js') }}"></script>


</body>

</html>