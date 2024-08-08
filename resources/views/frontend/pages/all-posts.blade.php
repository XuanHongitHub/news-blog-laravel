@extends('frontend.layouts.master')
@section('content')

<main id="main">
    <section>
        <div class="container">
            <div class="row">

                <div class="col-md-9" data-aos="fade-up">
                    <h3 class="category-title">Tất Cả Bài Viết</h3>
                    @foreach ($list_news as $news)
                    <div class="d-md-flex post-entry-2 half">
                        <a href="{{ url('/single-post',[$news->slug]) }}" class="me-4 thumbnail">
                            <img src="{{ asset($news->preview) }}" alt="" class="img-fluid">
                        </a>
                        <div>
                            <div class="post-meta"><span
                                    class="date">{{ $news->category->category_name ?? 'Không xác định' }}</span> <span
                                    class="mx-1">&bullet;</span> <span>{{ $news->created_at->format('d/m/Y') }}</span>
                            </div>
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
</main>

@endsection