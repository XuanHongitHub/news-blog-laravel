<div class="aside-block">

    <ul class="nav nav-pills custom-tab-nav mb-4" id="pills-tab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="pills-popular-tab" data-bs-toggle="pill" data-bs-target="#pills-popular"
                type="button" role="tab" aria-controls="pills-popular" aria-selected="true">Phổ Biến</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="pills-trending-tab" data-bs-toggle="pill" data-bs-target="#pills-trending"
                type="button" role="tab" aria-controls="pills-trending" aria-selected="false">Xu Hướng</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="pills-latest-tab" data-bs-toggle="pill" data-bs-target="#pills-latest"
                type="button" role="tab" aria-controls="pills-latest" aria-selected="false">Mới Nhất</button>
        </li>
    </ul>

    <div class="tab-content" id="pills-tabContent">

        <!-- Popular -->
        <div class="tab-pane fade show active" id="pills-popular" role="tabpanel" aria-labelledby="pills-popular-tab">
            @foreach ($popularPosts as $post)
            <div class="post-entry-1 border-bottom">
                <div class="post-meta"><span
                        class="date">{{ App\Models\Category::find($post->category_id)->category_name }}</span> <span
                        class="mx-1">&bullet;</span>
                    <span>{{Carbon\Carbon::parse($post->created_at)->translatedFormat('jS F Y')  }}</span></div>
                <h2 class="mb-2"><a href="{{ url('/single-post',[$post->slug]) }}">{{ $post->title }}</a></h2>
                <span class="author mb-3 d-block">{{ $post->author }}</span>
            </div>
            @endforeach
        </div> <!-- End Popular -->

        <!-- Trending -->
        <div class="tab-pane fade" id="pills-trending" role="tabpanel" aria-labelledby="pills-trending-tab">
            @foreach ($trendingPosts as $post)
            <div class="post-entry-1 border-bottom">
                <div class="post-meta"><span
                        class="date">{{ App\Models\Category::find($post->category_id)->category_name }}</span> <span
                        class="mx-1">&bullet;</span>
                    <span>{{Carbon\Carbon::parse($post->created_at)->translatedFormat('jS F Y')  }}</span></div>
                <h2 class="mb-2"><a href="{{ url('/single-post',[$post->slug]) }}">{{ $post->title }}</a></h2>
                <span class="author mb-3 d-block">{{ $post->author }}</span>
            </div>
            @endforeach
        </div> <!-- End Trending -->

        <!-- Latest -->
        <div class="tab-pane fade" id="pills-latest" role="tabpanel" aria-labelledby="pills-latest-tab">
            @foreach ($latestPosts as $post)
            <div class="post-entry-1 border-bottom">
                <div class="post-meta"><span
                        class="date">{{ App\Models\Category::find($post->category_id)->category_name }}</span> <span
                        class="mx-1">&bullet;</span>
                    <span>{{Carbon\Carbon::parse($post->created_at)->translatedFormat('jS F Y')  }}</span></div>
                <h2 class="mb-2"><a href="{{ url('/single-post',[$post->slug]) }}">{{ $post->title }}</a></h2>
                <span class="author mb-3 d-block">{{ $post->author }}</span>
            </div>
            @endforeach
        </div> <!-- End Latest -->

    </div>
</div>

<div class="aside-block">
    <h3 class="aside-title">Danh Mục</h3>
    <ul class="aside-links list-unstyled">
        @foreach ($categories_sidebar as $category)
        <li><a href="{{ $category->slug }}"><i class="bi bi-chevron-right"></i> {{ $category->category_name }}</a></li>
        @endforeach
    </ul>
</div><!-- End Categories -->

<div class="aside-block">
    <h3 class="aside-title">Tags</h3>
    <ul class="aside-tags list-unstyled">
        @if (!empty($news->tags))
        @php
        $tags = explode(',', $news->tags);
        @endphp
        @foreach ($tags as $tag)
        <li><a href="{{ url('/single-post',[$post->slug]) }}">{{ trim($tag) }}</a></li>
        @endforeach
        @endif
    </ul>
</div><!-- End Tags -->