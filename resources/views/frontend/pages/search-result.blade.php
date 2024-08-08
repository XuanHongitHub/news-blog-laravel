@extends('frontend.layouts.master')
@section('content')

<main id="main">
  {{-- {{ route('news.single_post', ['id' => $news->id]) }} --}}
  {{-- {{ route('news.single_post', ['id' => $news->id]) }} --}}
  <!-- ======= Search Results ======= -->
  <section id="search-result" class="search-result">
    <div class="container">
      <div class="row">
        <div class="col-md-9">
          <h5 class="fw-700 fw-bold mb-3">Kết quả tìm kiếm của từ khóa "{{ $data['query'] }}"</h5>
          @if($data['results']->isEmpty())
          <p>Không tìm thấy kết quả nào cho từ khóa "{{ $data['query'] }}".</p>
          @else
          @foreach($data['results'] as $news)
          <div class="d-md-flex post-entry-2 half">
            <a href="{{ url('/single-post',[$news->slug]) }}" class="me-4 thumbnail">
              <img src="{{ asset($news->preview) }}" alt="" class="img-fluid">
            </a>
            <div>
              <div class="post-meta"><span class="date">{{ $news->category_name }}</span> <span
                  class="mx-1">&bullet;</span> <span>{{ $news->created_at }}</span></div>
              <h3><a href="{{ url('/single-post',[$news->slug]) }}">{{ $news->title }}</a></h3>
              <p>{{ $news->summary }}</p>
            </div>
          </div>
          @endforeach
          @endif

          <!-- Paging -->
          <div class="text-start py-4">
            <div class="custom-pagination">
              <a href="#" class="prev">Prevous</a>
              <a href="#" class="active">1</a>
              <a href="#">2</a>
              <a href="#">3</a>
              <a href="#">4</a>
              <a href="#">5</a>
              <a href="#" class="next">Next</a>
            </div>
          </div><!-- End Paging -->

        </div>

        <div class="col-md-3">
          <!-- ======= Sidebar ======= -->
          @include('components.sidebar')
          <!-- ====== End Sidebar ====-->

        </div>

      </div>
    </div>
  </section> <!-- End Search Result -->

</main><!-- End #main -->

@endsection