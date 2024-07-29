@extends('frontend.layouts.master')
@section('content')

<main id="main">
  <section>
    <div class="container">
      <div class="row">

        <div class="col-md-9" data-aos="fade-up">
          <h3 class="category-title">Danh Mục: {{ $category_arr->category_name }}</h3>
          @foreach ($list_news as $news)
          <div class="d-md-flex post-entry-2 half">
            <a href="{{ url('/single-post',[$news->slug]) }}" class="me-4 thumbnail">
              <img src="{{ asset($news->preview) }}" alt="" class="img-fluid">
            </a>
            <div>
              <div class="post-meta"><span class="date">{{ $category_arr->category_name }}</span> <span
                  class="mx-1">&bullet;</span> <span>{{ $news->created_at }}</span></div>
              <h3><a href="{{ url('/single-post',[$news->slug]) }}">{{ $news->title }}</a></h3>
              <p>{{ $news->summary }}</p>
            </div>
          </div>
          @endforeach

          <div class="text-start py-4">
            {{ $list_news->links('components.custom-pagination') }}
          </div>

        </div>

        <div class="col-md-3">
           <!-- ======= Sidebar ======= -->
           @include('components.sidebar')
           <!-- ====== End Sidebar ====-->
        </div>

      </div>
    </div>
  </section>
</main><!-- End #main -->
@endsection