@extends('frontend.layouts.master')
@section('content')

<main id="main">

  <!-- ======= Hero Slider Section ======= -->
  <section id="hero-slider" class="hero-slider">
    <div class="container-md" data-aos="fade-in">
      <div class="row">
        <div class="col-12">
          <div class="swiper sliderFeaturedPosts">
            <div class="swiper-wrapper">
              @foreach ($latestPosts as $post)
              <div class="swiper-slide">
                <a href="{{ url('/single-post',[$post->slug]) }}" class="img-bg d-flex align-items-end"
                  style="background-image: url('{{ asset($post->preview) }}');">
                  <div class="img-bg-inner">
                    <h2>{{ $post->title }}</h2>
                    <p>{{ $post->summary }}</p>
                  </div>
                </a>
              </div>
              @endforeach
            </div>
            <div class="custom-swiper-button-next">
              <span class="bi-chevron-right"></span>
            </div>
            <div class="custom-swiper-button-prev">
              <span class="bi-chevron-left"></span>
            </div>

            <div class="swiper-pagination"></div>
          </div>
        </div>
      </div>
    </div>
  </section><!-- End Hero Slider Section -->

  <!-- ======= Post Grid Section ======= -->
  <section id="posts" class="posts">
    <div class="container" data-aos="fade-up">
      <div class="section-header d-flex justify-content-between align-items-center mb-5">
        <a href="{{ url('/all-posts') }}">
          <h2>Tin Mới</h2>
        </a> 
        <div><a href="{{ url('/all-posts') }}" class="more">Xem Thêm</a></div>
      </div>
      <div class="row g-5">
        <div class="col-lg-4">
          <div class="row">
            <div class="post-entry-1 lg">
              <a href="{{ url('/single-post',[$mainPost->slug]) }}"><img src="{{ asset($mainPost->preview) }}" alt=""
                  class="img-fluid"></a>
              <div class="post-meta"><span
                  class="date">{{ \App\Models\Category::find($mainPost->category_id)->category_name }}</span> <span
                  class="mx-1">&bullet;</span>
                <span>{{ Carbon\Carbon::parse($mainPost->created_at)->translatedFormat('jS F Y') }}</span></div>
              <h2><a href="{{ url('/single-post',[$mainPost->slug]) }}">{{ $mainPost->title }}</a></h2>
              <p class="mb-4 d-block">{{ $mainPost->summary }}</p>
            </div>
            @foreach ($lifePosts->skip(1)->take(2) as $post)
            <div class="post-entry-1 border-bottom">
              <div class="post-meta">
                <span class="date">{{ \App\Models\Category::find($post->category_id)->category_name }}</span>
                <span class="mx-1">&bullet;</span>
                <span>{{ \Carbon\Carbon::parse($post->created_at)->translatedFormat('M jS, Y') }}</span>
              </div>
              <h2 class="mb-2"><a href="{{ url('/single-post', [$post->slug]) }}">{{ $post->title }}</a></h2>
              <span class="author mb-3 d-block">{{ $post->user->name }}</span>
            </div>
          @endforeach
          </div>

        </div>
        <div class="col-lg-8">
          <div class="row ">
            <div class="col-lg-8">
              <div class="row g-5">
                <div class="col-lg-6 border-start custom-border">
                  @foreach($subPostsFirstPart as $post)

                  <div class="post-entry-1">
                    <a href="{{ url('/single-post',[$post->slug]) }}"><img src="{{ asset($post->preview) }}"
                        class="img-fluid subpost-img" alt=""></a>
                    <div class="post-meta"><span
                        class="date">{{ \App\Models\Category::find($post->category_id)->category_name }}</span> <span
                        class="mx-1">&bullet;</span>
                      <span>{{ Carbon\Carbon::parse($post->created_at)->translatedFormat('jS F Y') }}
                      </span></div>
                    <h2><a href="{{ url('/single-post',[$post->slug]) }}">{{ $post->title }}</a></h2>
                  </div>
                  @endforeach

                </div>
                <div class="col-lg-6 border-start custom-border">
                  @foreach($subPostsSecondPart as $post)

                  <div class="post-entry-1">
                    <a href="{{ url('/single-post',[$post->slug]) }}"><img src="{{ asset($post->preview) }}"
                        class="img-fluid subpost-img" alt="" class="img-fluid"></a>
                    <div class="post-meta"><span
                        class="date">{{ \App\Models\Category::find($post->category_id)->category_name }}</span> <span
                        class="mx-1">&bullet;</span>
                      <span>{{Carbon\Carbon::parse($post->created_at)->translatedFormat('jS F Y')  }}
                      </span></div>
                    <h2><a href="{{ url('/single-post',[$post->slug]) }}">{{ $post->title }}</a></h2>
                  </div>
                  @endforeach
                </div>
              </div>
            </div>
            <!-- Trending Section -->
            <div class="col-lg-4">
              <div class="trending">
                <h3>Xu Hướng</h3>
                <ul class="trending-post">
                  @foreach($trendingPosts as $index => $post)
                  <li>
                    <a href="{{ url('/single-post',[$post->slug]) }}">
                      <span class="number">{{ $index + 1 }}</span>
                      <h3>{{ $post->title }}</h3>
                      <span
                        class="date">{{Carbon\Carbon::parse($post->created_at)->translatedFormat('jS F Y')  }}</span>
                    </a>
                  </li>
                  @endforeach
                </ul>
              </div>
            </div>
            <!-- End Trending Section -->
          </div>
        </div>

      </div> <!-- End .row -->
    </div>
  </section> <!-- End Post Grid Section -->
  <!-- ======= Danh Mục Công Nghệ Section ======= -->
  <section class="category-section">
    <div class="container" data-aos="fade-up">

      <div class="section-header d-flex justify-content-between align-items-center mb-5">
        <a href="{{ url('single-category', 'cong-nghe') }}">
          <h2>Công Nghệ</h2>
        </a> 
        <div><a href="{{ url('/single-category', 'cong-nghe') }}" class="more">Xem Thêm</a></div>
      </div>

      <div class="row">
        <div class="col-md-9">

          <div class="d-lg-flex post-entry-2">
            <a href="{{ url('/single-post', [$techPosts[0]->slug]) }}"
              class="me-4 thumbnail mb-4 mb-lg-0 d-inline-block">
              <img src="{{ $techPosts[0]->preview }}" alt="" class="img-fluid">
            </a>
            <div>
              <div class="post-meta"><span class="date">
                  {{ \App\Models\Category::find($techPosts[0]->category_id)->category_name }}</span> <span
                  class="mx-1">&bullet;</span>
                <span>{{Carbon\Carbon::parse($techPosts[0]->created_at)->translatedFormat('jS F Y')  }}</span></div>
              <h3><a href="{{ url('/single-post', [$techPosts[0]->slug]) }}">{{ $techPosts[0]->title }}</a>
              </h3>
              <p>{{ $techPosts[0]->summary }}</p>
              <div class="d-flex align-items-center author">
                <div class="photo"><img src="{{ asset('storage/' . $techPosts[0]->user->avatar) }}" alt="" class="img-fluid"></div>
                <div class="name">
                  <h3 class="m-0 p-0">{{ $techPosts[0]->user->name }}</h3>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-4">
              <div class="post-entry-1 border-bottom">
                <a href="{{ url('/single-post', [$techPosts[1]->slug]) }}"><img src="{{ $techPosts[1]->preview }}" alt=""
                    class="img-fluid"></a>
                <div class="post-meta"><span class="date">
                    {{ \App\Models\Category::find($techPosts[1]->category_id)->category_name }}</span> <span
                    class="mx-1">&bullet;</span>
                  <span>{{Carbon\Carbon::parse($techPosts[1]->created_at)->translatedFormat('jS F Y')  }}</span></div>
                <h2 class="mb-2"><a href="{{ url('/single-post', [$techPosts[1]->slug]) }}">{{ $techPosts[1]->title }}</a>
                </h2>
                {{-- <span class="author mb-3 d-block">Jenny Wilson</span> --}}
                <p class="mb-4 d-block">{{ $techPosts[1]->summary }}</p>
              </div>

              <div class="post-entry-1">
                <div class="post-meta"><span
                    class="date">{{ \App\Models\Category::find($techPosts[2]->category_id)->category_name }}</span>
                  <span class="mx-1">&bullet;</span>
                  <span>{{Carbon\Carbon::parse($techPosts[2]->created_at)->translatedFormat('jS F Y')  }}</span></div>
                <h2 class="mb-2"><a href="{{ url('/single-post', [$techPosts[2]->slug]) }}">{{ $techPosts[2]->title }}</a>
                </h2>
                {{-- <span class="author mb-3 d-block">Jenny Wilson</span> --}}
              </div>
            </div>
            <div class="col-lg-8">
              @if (isset($techPosts[3]))
              <div class="post-entry-1">
                <a href="{{ url('/single-post', [$techPosts[3]->slug]) }}"><img src="{{ $techPosts[3]->preview }}" alt=""
                    class="img-fluid"></a>
                <div class="post-meta"><span
                    class="date">{{ \App\Models\Category::find($techPosts[3]->category_id)->category_name }}</span> <span
                    class="mx-1">&bullet;</span>
                  <span>{{Carbon\Carbon::parse($techPosts[3]->created_at)->translatedFormat('jS F Y')  }}</span></div>
                <h2 class="mb-2"><a href="{{ url('/single-post', [$techPosts[3]->slug]) }}">{{ $techPosts[3]->title }}</a>
                </h2>
                {{-- <span class="author mb-3 d-block">Jenny Wilson</span> --}}
                <p class="mb-4 d-block">{{ $techPosts[3]->summary }}</p>
              </div>
              @endif
            </div>
          </div>
        </div>

        <div class="col-md-3">
          @foreach ($techPosts->skip(9)->take(5) as $post)
          <div class="post-entry-1 border-bottom">
            <div class="post-meta">
              <span class="date">{{ \App\Models\Category::find($post->category_id)->category_name }}</span>
              <span class="mx-1">&bullet;</span>
              <span>{{ \Carbon\Carbon::parse($post->created_at)->translatedFormat('M jS, Y') }}</span>
            </div>
            <h2 class="mb-2"><a href="{{ url('/single-post', [$post->slug]) }}">{{ $post->title }}</a></h2>
            <span class="author mb-3 d-block">{{ $post->user->name }}</span>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </section><!-- End Culture Category Section -->

  <!-- ======= Du Lịch Category Section ======= -->
  <section class="category-section">
    <div class="container" data-aos="fade-up">

      <div class="section-header d-flex justify-content-between align-items-center mb-5">
        <a href="{{ url('single-category', 'du-lich') }}">
          <h2>Du Lịch</h2>
        </a>      
        <div><a href="{{ url('single-category', 'du-lich') }}" class="more">Xem Thêm</a></div>
      </div>

      <div class="row">
        <div class="col-md-9 order-md-2">

          @if ($travelPosts->count())
          <div class="d-lg-flex post-entry-2">
            <a href="{{ url('/single-post', [$travelPosts[0]->slug]) }}"
              class="me-4 thumbnail mb-4 mb-lg-0 d-inline-block">
              <img src="{{ $travelPosts[0]->preview }}" alt="" class="img-fluid">
            </a>
            <div>
              <div class="post-meta">
                <span class="date">{{ \App\Models\Category::find($travelPosts[0]->category_id)->category_name }}</span>
                <span class="mx-1">&bullet;</span>
                <span>{{ \Carbon\Carbon::parse($travelPosts[0]->created_at)->translatedFormat('jS F Y') }}</span>
              </div>
              <h3><a href="{{ url('/single-post', [$travelPosts[0]->slug]) }}">{{ $travelPosts[0]->title }}</a></h3>
              <p>{{ $travelPosts[0]->summary }}</p>
              <div class="d-flex align-items-center author">
                <div class="photo"><img src="{{ asset('storage/' . $travelPosts[0]->user->avatar) }}" alt="" class="img-fluid"></div>
                <div class="name">
                  <h3 class="m-0 p-0">{{ $travelPosts[0]->user->name }}</h3>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            @foreach ($travelPosts->skip(1)->take(3) as $post)
            <div class="col-lg-4">
              <div class="post-entry-1 border-bottom">
                <a href="{{ url('/single-post', [$post->slug]) }}"><img src="{{ $post->preview }}" alt=""
                    class="img-fluid"></a>
                <div class="post-meta">
                  <span class="date">{{ \App\Models\Category::find($post->category_id)->category_name }}</span>
                  <span class="mx-1">&bullet;</span>
                  <span>{{ \Carbon\Carbon::parse($post->created_at)->translatedFormat('jS F Y') }}</span>
                </div>
                <h2 class="mb-2"><a href="{{ url('/single-post', [$post->slug]) }}">{{ $post->title }}</a></h2>
                <span class="author mb-3 d-block">{{ \App\Models\User::find($post->user_id)->name  }}</span>
                <p class="mb-4 d-block">{{ $post->summary }}</p>
              </div>
            </div>
            @endforeach

          </div>
          @endif
        </div>
        <div class="col-md-3">
          @foreach ($travelPosts->skip(4) as $post)
          <div class="post-entry-1 border-bottom">
            <div class="post-meta">
              <span class="date">{{ \App\Models\Category::find($post->category_id)->category_name }}</span>
              <span class="mx-1">&bullet;</span>
              <span>{{ \Carbon\Carbon::parse($post->created_at)->translatedFormat('jS F Y') }}</span>
            </div>
            <h2 class="mb-2"><a href="{{ url('/single-post', [$post->slug]) }}">{{ $post->title }}</a></h2>
            <span class="author mb-3 d-block">{{ \App\Models\User::find($post->user_id)->name  }}</span>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </section><!-- End Du Lịch Category Section -->

  <!-- ======= Đời Sống Category Section ======= -->
  <section class="category-section">
    <div class="container" data-aos="fade-up">

      <div class="section-header d-flex justify-content-between align-items-center mb-5">
        <a href="{{ url('single-category', 'doi-song') }}">
          <h2>Đời Sống</h2>
        </a> 
        <div><a href="{{ url('single-category', 'doi-song') }}" class="more">Xem Thêm</a></div>
      </div>
      <div class="row g-5">
        <div class="col-lg-4">
          <div class="post-entry-1 lg">
            <a href="{{ url('/single-post', [$lifePosts[0]->slug]) }}">
              <img src="{{ $lifePosts[0]->preview }}" alt="" class="img-fluid">
            </a>
            <div class="post-meta">
              <span class="date">{{ \App\Models\Category::find($lifePosts[0]->category_id)->category_name }}</span>
              <span class="mx-1">&bullet;</span>
              <span>{{ \Carbon\Carbon::parse($lifePosts[0]->created_at)->translatedFormat('M jS, Y') }}</span>
            </div>
            <h2><a href="{{ url('/single-post', [$lifePosts[0]->slug]) }}">{{ $lifePosts[0]->title }}</a></h2>
            <p class="mb-4 d-block">{{ $lifePosts[0]->summary }}</p>
  
            <div class="d-flex align-items-center author">
              <div class="photo">
                <img src="{{ asset('storage/' .  $lifePosts[0]->user->avatar) }}" alt="" class="img-fluid">
              </div>
              <div class="name">
                <h3 class="m-0 p-0">{{ $lifePosts[0]->user->name }}</h3>
              </div>
            </div>
          </div>

           @foreach ($lifePosts->skip(1)->take(2) as $post)
            <div class="post-entry-1 border-bottom">
              <div class="post-meta">
                <span class="date">{{ \App\Models\Category::find($post->category_id)->category_name }}</span>
                <span class="mx-1">&bullet;</span>
                <span>{{ \Carbon\Carbon::parse($post->created_at)->translatedFormat('M jS, Y') }}</span>
              </div>
              <h2 class="mb-2"><a href="{{ url('/single-post', [$post->slug]) }}">{{ $post->title }}</a></h2>
              <span class="author mb-3 d-block">{{ $post->user->name }}</span>
            </div>
          @endforeach

        </div>

        <div class="col-lg-8">
          <div class="row g-5">
            <div class="col-lg-4 border-start custom-border">
              @foreach ($lifePosts->skip(3)->take(3) as $post)
                <div class="post-entry-1">
                  <a href="{{ url('/single-post', [$post->slug]) }}">
                    <img src="{{ asset($post->preview) }}" alt="" class="img-fluid">
                  </a>
                  <div class="post-meta">
                    <span class="date">{{ \App\Models\Category::find($post->category_id)->category_name }}</span>
                    <span class="mx-1">&bullet;</span>
                    <span>{{ \Carbon\Carbon::parse($post->created_at)->translatedFormat('M jS, Y') }}</span>
                  </div>
                  <h2><a href="{{ url('/single-post', [$post->slug]) }}">{{ $post->title }}</a></h2>
                </div>
              @endforeach
            </div>
            <div class="col-lg-4 border-start custom-border">
              @foreach ($lifePosts->skip(6)->take(3) as $post)
              <div class="post-entry-1">
                <a href="{{ url('/single-post', [$post->slug]) }}">
                  <img src="{{ asset($post->preview) }}" alt="" class="img-fluid">
                </a>
                <div class="post-meta">
                  <span class="date">{{ \App\Models\Category::find($post->category_id)->category_name }}</span>
                  <span class="mx-1">&bullet;</span>
                  <span>{{ \Carbon\Carbon::parse($post->created_at)->translatedFormat('M jS, Y') }}</span>
                </div>
                <h2><a href="{{ url('/single-post', [$post->slug]) }}">{{ $post->title }}</a></h2>
              </div>
            @endforeach
            </div>
            <div class="col-lg-4">

              @foreach ($lifePosts->skip(9)->take(5) as $post)
              <div class="post-entry-1 border-bottom">
                <div class="post-meta">
                  <span class="date">{{ \App\Models\Category::find($post->category_id)->category_name }}</span>
                  <span class="mx-1">&bullet;</span>
                  <span>{{ \Carbon\Carbon::parse($post->created_at)->translatedFormat('M jS, Y') }}</span>
                </div>
                <h2 class="mb-2"><a href="{{ url('/single-post', [$post->slug]) }}">{{ $post->title }}</a></h2>
                <span class="author mb-3 d-block">{{ $post->user->name }}</span>
              </div>
              @endforeach

            </div>
          </div>
        </div>

      </div> <!-- End .row -->
    </div>
  </section><!-- End Lifestyle Category Section -->

</main><!-- End #main -->

@endsection