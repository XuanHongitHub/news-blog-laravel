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
        <h2>Tin Mới</h2>
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
        <h2>Công Nghệ</h2>
        <div><a href="{{ url('/single-category', 'cong-nghe') }}" class="more">Các Bài Viết Công Nghệ</a></div>
      </div>

      <div class="row">
        <div class="col-md-9">

          <div class="d-lg-flex post-entry-2">
            <a href="{{ url('/single-post', [$techPost[0]->slug]) }}"
              class="me-4 thumbnail mb-4 mb-lg-0 d-inline-block">
              <img src="{{ $techPost[0]->preview }}" alt="" class="img-fluid">
            </a>
            <div>
              <div class="post-meta"><span class="date">
                  {{ \App\Models\Category::find($techPost[0]->category_id)->category_name }}</span> <span
                  class="mx-1">&bullet;</span>
                <span>{{Carbon\Carbon::parse($techPost[0]->created_at)->translatedFormat('jS F Y')  }}</span></div>
              <h3><a href="{{ url('/single-post', [$techPost[0]->slug]) }}">{{ $techPost[0]->title }}</a>
              </h3>
              <p>{{ $techPost[0]->summary }}</p>

            </div>
          </div>

          <div class="row">
            <div class="col-lg-4">
              <div class="post-entry-1 border-bottom">
                <a href="{{ url('/single-post', [$techPost[1]->slug]) }}"><img src="{{ $techPost[1]->preview }}" alt=""
                    class="img-fluid"></a>
                <div class="post-meta"><span class="date">
                    {{ \App\Models\Category::find($techPost[1]->category_id)->category_name }}</span> <span
                    class="mx-1">&bullet;</span>
                  <span>{{Carbon\Carbon::parse($techPost[1]->created_at)->translatedFormat('jS F Y')  }}</span></div>
                <h2 class="mb-2"><a href="{{ url('/single-post', [$techPost[1]->slug]) }}">{{ $techPost[1]->title }}</a>
                </h2>
                {{-- <span class="author mb-3 d-block">Jenny Wilson</span> --}}
                <p class="mb-4 d-block">{{ $techPost[1]->summary }}</p>
              </div>

              <div class="post-entry-1">
                <div class="post-meta"><span
                    class="date">{{ \App\Models\Category::find($techPost[2]->category_id)->category_name }}</span>
                  <span class="mx-1">&bullet;</span>
                  <span>{{Carbon\Carbon::parse($techPost[2]->created_at)->translatedFormat('jS F Y')  }}</span></div>
                <h2 class="mb-2"><a href="{{ url('/single-post', [$techPost[2]->slug]) }}">{{ $techPost[2]->title }}</a>
                </h2>
                {{-- <span class="author mb-3 d-block">Jenny Wilson</span> --}}
              </div>
            </div>
            <div class="col-lg-8">
              @if (isset($techPost[3]))
                <div class="post-entry-1">
                  <a href="{{ url('/single-post', [$techPost[3]->slug]) }}"><img src="{{ $techPost[3]->preview }}" alt="" class="img-fluid"></a>
                  <div class="post-meta"><span
                      class="date">{{ \App\Models\Category::find($techPost[3]->category_id)->category_name }}</span> <span
                      class="mx-1">&bullet;</span>
                    <span>{{Carbon\Carbon::parse($techPost[3]->created_at)->translatedFormat('jS F Y')  }}</span></div>
                  <h2 class="mb-2"><a href="{{ url('/single-post', [$techPost[3]->slug]) }}">{{ $techPost[3]->title }}</a></h2>
                  {{-- <span class="author mb-3 d-block">Jenny Wilson</span> --}}
                  <p class="mb-4 d-block">{{ $techPost[3]->summary }}</p>
                </div>
              @endif
            </div>
          </div>
        </div>

        <div class="col-md-3">
          <div class="post-entry-1 border-bottom">
            <div class="post-meta"><span class="date">Culture</span> <span class="mx-1">&bullet;</span> <span>Jul 5th
                '22</span></div>
            <h2 class="mb-2"><a href="single-post.html">How to Avoid Distraction and Stay Focused During Video
                Calls?</a></h2>
            <span class="author mb-3 d-block">Jenny Wilson</span>
          </div>

          <div class="post-entry-1 border-bottom">
            <div class="post-meta"><span class="date">Culture</span> <span class="mx-1">&bullet;</span> <span>Jul 5th
                '22</span></div>
            <h2 class="mb-2"><a href="single-post.html">17 Pictures of Medium Length Hair in Layers That Will Inspire
                Your New Haircut</a></h2>
            <span class="author mb-3 d-block">Jenny Wilson</span>
          </div>

          <div class="post-entry-1 border-bottom">
            <div class="post-meta"><span class="date">Culture</span> <span class="mx-1">&bullet;</span> <span>Jul 5th
                '22</span></div>
            <h2 class="mb-2"><a href="single-post.html">9 Half-up/half-down Hairstyles for Long and Medium Hair</a></h2>
            <span class="author mb-3 d-block">Jenny Wilson</span>
          </div>

          <div class="post-entry-1 border-bottom">
            <div class="post-meta"><span class="date">Culture</span> <span class="mx-1">&bullet;</span> <span>Jul 5th
                '22</span></div>
            <h2 class="mb-2"><a href="single-post.html">Life Insurance And Pregnancy: A Working Mom’s Guide</a></h2>
            <span class="author mb-3 d-block">Jenny Wilson</span>
          </div>

          <div class="post-entry-1 border-bottom">
            <div class="post-meta"><span class="date">Culture</span> <span class="mx-1">&bullet;</span> <span>Jul 5th
                '22</span></div>
            <h2 class="mb-2"><a href="single-post.html">The Best Homemade Masks for Face (keep the Pimples Away)</a>
            </h2>
            <span class="author mb-3 d-block">Jenny Wilson</span>
          </div>

          <div class="post-entry-1 border-bottom">
            <div class="post-meta"><span class="date">Culture</span> <span class="mx-1">&bullet;</span> <span>Jul 5th
                '22</span></div>
            <h2 class="mb-2"><a href="single-post.html">10 Life-Changing Hacks Every Working Mom Should Know</a></h2>
            <span class="author mb-3 d-block">Jenny Wilson</span>
          </div>
        </div>
      </div>
    </div>
  </section><!-- End Culture Category Section -->

  <!-- ======= Business Category Section ======= -->
  <section class="category-section">
    <div class="container" data-aos="fade-up">

      <div class="section-header d-flex justify-content-between align-items-center mb-5">
        <h2>Business</h2>
        <div><a href="category.html" class="more">See All Business</a></div>
      </div>

      <div class="row">
        <div class="col-md-9 order-md-2">

          <div class="d-lg-flex post-entry-2">
            <a href="single-post.html" class="me-4 thumbnail d-inline-block mb-4 mb-lg-0">
              <img src="assets/img/post-landscape-3.jpg" alt="" class="img-fluid">
            </a>
            <div>
              <div class="post-meta"><span class="date">Business</span> <span class="mx-1">&bullet;</span> <span>Jul 5th
                  '22</span></div>
              <h3><a href="single-post.html">What is the son of Football Coach John Gruden, Deuce Gruden doing Now?</a>
              </h3>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio placeat exercitationem magni
                voluptates dolore. Tenetur fugiat voluptates quas, nobis error deserunt aliquam temporibus sapiente,
                laudantium dolorum itaque libero eos deleniti?</p>
              <div class="d-flex align-items-center author">
                <div class="photo"><img src="assets/img/person-4.jpg" alt="" class="img-fluid"></div>
                <div class="name">
                  <h3 class="m-0 p-0">Wade Warren</h3>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-4">
              <div class="post-entry-1 border-bottom">
                <a href="single-post.html"><img src="assets/img/post-landscape-5.jpg" alt="" class="img-fluid"></a>
                <div class="post-meta"><span class="date">Business</span> <span class="mx-1">&bullet;</span> <span>Jul
                    5th '22</span></div>
                <h2 class="mb-2"><a href="single-post.html">11 Work From Home Part-Time Jobs You Can Do Now</a></h2>
                <span class="author mb-3 d-block">Jenny Wilson</span>
                <p class="mb-4 d-block">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Vero temporibus
                  repudiandae, inventore pariatur numquam cumque possimus</p>
              </div>

              <div class="post-entry-1">
                <div class="post-meta"><span class="date">Business</span> <span class="mx-1">&bullet;</span> <span>Jul
                    5th '22</span></div>
                <h2 class="mb-2"><a href="single-post.html">5 Great Startup Tips for Female Founders</a></h2>
                <span class="author mb-3 d-block">Jenny Wilson</span>
              </div>
            </div>
            <div class="col-lg-8">
              <div class="post-entry-1">
                <a href="single-post.html"><img src="assets/img/post-landscape-7.jpg" alt="" class="img-fluid"></a>
                <div class="post-meta"><span class="date">Business</span> <span class="mx-1">&bullet;</span> <span>Jul
                    5th '22</span></div>
                <h2 class="mb-2"><a href="single-post.html">How to Avoid Distraction and Stay Focused During Video
                    Calls?</a></h2>
                <span class="author mb-3 d-block">Jenny Wilson</span>
                <p class="mb-4 d-block">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Vero temporibus
                  repudiandae, inventore pariatur numquam cumque possimus</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="post-entry-1 border-bottom">
            <div class="post-meta"><span class="date">Business</span> <span class="mx-1">&bullet;</span> <span>Jul 5th
                '22</span></div>
            <h2 class="mb-2"><a href="single-post.html">How to Avoid Distraction and Stay Focused During Video
                Calls?</a></h2>
            <span class="author mb-3 d-block">Jenny Wilson</span>
          </div>

          <div class="post-entry-1 border-bottom">
            <div class="post-meta"><span class="date">Business</span> <span class="mx-1">&bullet;</span> <span>Jul 5th
                '22</span></div>
            <h2 class="mb-2"><a href="single-post.html">17 Pictures of Medium Length Hair in Layers That Will Inspire
                Your New Haircut</a></h2>
            <span class="author mb-3 d-block">Jenny Wilson</span>
          </div>

          <div class="post-entry-1 border-bottom">
            <div class="post-meta"><span class="date">Business</span> <span class="mx-1">&bullet;</span> <span>Jul 5th
                '22</span></div>
            <h2 class="mb-2"><a href="single-post.html">9 Half-up/half-down Hairstyles for Long and Medium Hair</a></h2>
            <span class="author mb-3 d-block">Jenny Wilson</span>
          </div>

          <div class="post-entry-1 border-bottom">
            <div class="post-meta"><span class="date">Business</span> <span class="mx-1">&bullet;</span> <span>Jul 5th
                '22</span></div>
            <h2 class="mb-2"><a href="single-post.html">Life Insurance And Pregnancy: A Working Mom’s Guide</a></h2>
            <span class="author mb-3 d-block">Jenny Wilson</span>
          </div>

          <div class="post-entry-1 border-bottom">
            <div class="post-meta"><span class="date">Business</span> <span class="mx-1">&bullet;</span> <span>Jul 5th
                '22</span></div>
            <h2 class="mb-2"><a href="single-post.html">The Best Homemade Masks for Face (keep the Pimples Away)</a>
            </h2>
            <span class="author mb-3 d-block">Jenny Wilson</span>
          </div>

          <div class="post-entry-1 border-bottom">
            <div class="post-meta"><span class="date">Business</span> <span class="mx-1">&bullet;</span> <span>Jul 5th
                '22</span></div>
            <h2 class="mb-2"><a href="single-post.html">10 Life-Changing Hacks Every Working Mom Should Know</a></h2>
            <span class="author mb-3 d-block">Jenny Wilson</span>
          </div>
        </div>
      </div>
    </div>
  </section><!-- End Business Category Section -->

  <!-- ======= Lifestyle Category Section ======= -->
  <section class="category-section">
    <div class="container" data-aos="fade-up">

      <div class="section-header d-flex justify-content-between align-items-center mb-5">
        <h2>Lifestyle</h2>
        <div><a href="category.html" class="more">See All Lifestyle</a></div>
      </div>

      <div class="row g-5">
        <div class="col-lg-4">
          <div class="post-entry-1 lg">
            <a href="single-post.html"><img src="assets/img/post-landscape-8.jpg" alt="" class="img-fluid"></a>
            <div class="post-meta"><span class="date">Lifestyle</span> <span class="mx-1">&bullet;</span> <span>Jul 5th
                '22</span></div>
            <h2><a href="single-post.html">11 Work From Home Part-Time Jobs You Can Do Now</a></h2>
            <p class="mb-4 d-block">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Vero temporibus
              repudiandae, inventore pariatur numquam cumque possimus exercitationem? Nihil tempore odit ab minus
              eveniet praesentium, similique blanditiis molestiae ut saepe perspiciatis officia nemo, eos quae cumque.
              Accusamus fugiat architecto rerum animi atque eveniet, quo, praesentium dignissimos</p>

            <div class="d-flex align-items-center author">
              <div class="photo"><img src="assets/img/person-7.jpg" alt="" class="img-fluid"></div>
              <div class="name">
                <h3 class="m-0 p-0">Esther Howard</h3>
              </div>
            </div>
          </div>

          <div class="post-entry-1 border-bottom">
            <div class="post-meta"><span class="date">Lifestyle</span> <span class="mx-1">&bullet;</span> <span>Jul 5th
                '22</span></div>
            <h2 class="mb-2"><a href="single-post.html">The Best Homemade Masks for Face (keep the Pimples Away)</a>
            </h2>
            <span class="author mb-3 d-block">Jenny Wilson</span>
          </div>

          <div class="post-entry-1">
            <div class="post-meta"><span class="date">Lifestyle</span> <span class="mx-1">&bullet;</span> <span>Jul 5th
                '22</span></div>
            <h2 class="mb-2"><a href="single-post.html">10 Life-Changing Hacks Every Working Mom Should Know</a></h2>
            <span class="author mb-3 d-block">Jenny Wilson</span>
          </div>

        </div>

        <div class="col-lg-8">
          <div class="row g-5">
            <div class="col-lg-4 border-start custom-border">
              <div class="post-entry-1">
                <a href="single-post.html"><img src="assets/img/post-landscape-6.jpg" alt="" class="img-fluid"></a>
                <div class="post-meta"><span class="date">Lifestyle</span> <span class="mx-1">&bullet;</span> <span>Jul
                    5th '22</span></div>
                <h2><a href="single-post.html">Let’s Get Back to Work, New York</a></h2>
              </div>
              <div class="post-entry-1">
                <a href="single-post.html"><img src="assets/img/post-landscape-5.jpg" alt="" class="img-fluid"></a>
                <div class="post-meta"><span class="date">Lifestyle</span> <span class="mx-1">&bullet;</span> <span>Jul
                    17th '22</span></div>
                <h2><a href="single-post.html">How to Avoid Distraction and Stay Focused During Video Calls?</a></h2>
              </div>
              <div class="post-entry-1">
                <a href="single-post.html"><img src="assets/img/post-landscape-4.jpg" alt="" class="img-fluid"></a>
                <div class="post-meta"><span class="date">Lifestyle</span> <span class="mx-1">&bullet;</span> <span>Mar
                    15th '22</span></div>
                <h2><a href="single-post.html">Why Craigslist Tampa Is One of The Most Interesting Places On the
                    Web?</a></h2>
              </div>
            </div>
            <div class="col-lg-4 border-start custom-border">
              <div class="post-entry-1">
                <a href="single-post.html"><img src="assets/img/post-landscape-3.jpg" alt="" class="img-fluid"></a>
                <div class="post-meta"><span class="date">Lifestyle</span> <span class="mx-1">&bullet;</span> <span>Jul
                    5th '22</span></div>
                <h2><a href="single-post.html">6 Easy Steps To Create Your Own Cute Merch For Instagram</a></h2>
              </div>
              <div class="post-entry-1">
                <a href="single-post.html"><img src="assets/img/post-landscape-2.jpg" alt="" class="img-fluid"></a>
                <div class="post-meta"><span class="date">Lifestyle</span> <span class="mx-1">&bullet;</span> <span>Mar
                    1st '22</span></div>
                <h2><a href="single-post.html">10 Life-Changing Hacks Every Working Mom Should Know</a></h2>
              </div>
              <div class="post-entry-1">
                <a href="single-post.html"><img src="assets/img/post-landscape-1.jpg" alt="" class="img-fluid"></a>
                <div class="post-meta"><span class="date">Lifestyle</span> <span class="mx-1">&bullet;</span> <span>Jul
                    5th '22</span></div>
                <h2><a href="single-post.html">5 Great Startup Tips for Female Founders</a></h2>
              </div>
            </div>
            <div class="col-lg-4">

              <div class="post-entry-1 border-bottom">
                <div class="post-meta"><span class="date">Lifestyle</span> <span class="mx-1">&bullet;</span> <span>Jul
                    5th '22</span></div>
                <h2 class="mb-2"><a href="single-post.html">How to Avoid Distraction and Stay Focused During Video
                    Calls?</a></h2>
                <span class="author mb-3 d-block">Jenny Wilson</span>
              </div>

              <div class="post-entry-1 border-bottom">
                <div class="post-meta"><span class="date">Lifestyle</span> <span class="mx-1">&bullet;</span> <span>Jul
                    5th '22</span></div>
                <h2 class="mb-2"><a href="single-post.html">17 Pictures of Medium Length Hair in Layers That Will
                    Inspire Your New Haircut</a></h2>
                <span class="author mb-3 d-block">Jenny Wilson</span>
              </div>

              <div class="post-entry-1 border-bottom">
                <div class="post-meta"><span class="date">Lifestyle</span> <span class="mx-1">&bullet;</span> <span>Jul
                    5th '22</span></div>
                <h2 class="mb-2"><a href="single-post.html">9 Half-up/half-down Hairstyles for Long and Medium Hair</a>
                </h2>
                <span class="author mb-3 d-block">Jenny Wilson</span>
              </div>

              <div class="post-entry-1 border-bottom">
                <div class="post-meta"><span class="date">Lifestyle</span> <span class="mx-1">&bullet;</span> <span>Jul
                    5th '22</span></div>
                <h2 class="mb-2"><a href="single-post.html">Life Insurance And Pregnancy: A Working Mom’s Guide</a></h2>
                <span class="author mb-3 d-block">Jenny Wilson</span>
              </div>

              <div class="post-entry-1 border-bottom">
                <div class="post-meta"><span class="date">Lifestyle</span> <span class="mx-1">&bullet;</span> <span>Jul
                    5th '22</span></div>
                <h2 class="mb-2"><a href="single-post.html">The Best Homemade Masks for Face (keep the Pimples Away)</a>
                </h2>
                <span class="author mb-3 d-block">Jenny Wilson</span>
              </div>

              <div class="post-entry-1 border-bottom">
                <div class="post-meta"><span class="date">Lifestyle</span> <span class="mx-1">&bullet;</span> <span>Jul
                    5th '22</span></div>
                <h2 class="mb-2"><a href="single-post.html">10 Life-Changing Hacks Every Working Mom Should Know</a>
                </h2>
                <span class="author mb-3 d-block">Jenny Wilson</span>
              </div>

            </div>
          </div>
        </div>

      </div> <!-- End .row -->
    </div>
  </section><!-- End Lifestyle Category Section -->

</main><!-- End #main -->

@endsection