@extends('frontend.layouts.master')
@section('content')

<main id="main">
    <section class="single-post-content">
        <div class="container">
            <div class="row">
                <div class="col-md-9 post-content" data-aos="fade-up">
                    <!-- ======= Single Post Content ======= -->
                    <div class="single-post">
                        <div class="post-meta">
                            <span class="date">{{ $category_arr->category_name }}</span>
                            <span class="mx-1">&bullet;</span>
                            <span>{{ Carbon\Carbon::parse($news->created_at)->translatedFormat('jS F Y') }}</span>
                        </div>
                        <h1 class="mb-5">{{ $news->title }}</h1>
                        <h6 class="fw-bold mb-2">{{ $news->summary }}</h6>
                        <div class="content mb-5">
                            {!! $news->content !!}
                        </div>

                        <!-- ======= Bình Luận ======= -->
                        <div class="comments">
                            <h5 class="comment-title pt-4 fw-bold">{{ $comments->count() }} Bình Luận</h5>
                            <div class="mb-5">
                                <!-- ======= Bình Luận Form ======= -->
                                @auth
                                <div class="row justify-content-center mt-5">
                                    <div class="col-lg-12">
                                        <form id="comment-form" method="POST">
                                            @csrf
                                            <input type="hidden" name="news_id" value="{{ $news->id }}">
                                            <input type="hidden" id="parent_id" name="parent_id" value="">

                                            <div class="d-flex align-items-start mb-3">
                                                <div class="avatar me-3">
                                                    <img class="avatar-img rounded-circle"
                                                        src="{{ asset('storage/' . (auth()->user()->avatar ?? 'default-avatar.png')) }}"
                                                        alt="Avatar" style="width: 50px; height: 50px;">
                                                </div>
                                                <div class="flex-grow-1">
                                                    <textarea class="form-control" id="comment-message"
                                                        name="comment_content" placeholder="Nhập nội dung bình luận"
                                                        rows="2" required></textarea>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <button type="submit" class="btn btn-primary">Đăng bình luận</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                @else
                                <div class="row justify-content-center mt-5">
                                    <div class="col-lg-12">
                                        <p>Vui lòng <a class="text-info fw-bold" href="{{ route('login') }}">đăng
                                                nhập</a> để bình luận.</p>
                                    </div>
                                </div>
                                @endauth
                                <!-- End Bình Luận Form -->
                            </div>
                            <!-- Bình luận và phản hồi -->
                            <div id="comments-list">
                                @foreach ($comments as $comment)
                                <div class="comment d-flex mb-4" id="comment-{{ $comment->id }}">
                                    <div class="flex-shrink-0">
                                        <div class="avatar avatar-sm rounded-circle">
                                            <img class="avatar-img"
                                                src="{{ asset('storage/' . $comment->user->avatar) }}" alt="Avatar"
                                                class="img-fluid">
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 ms-2 ms-sm-3">
                                        <div class="comment-meta d-flex align-items-baseline">
                                            <h6 class="me-2">{{ $comment->user->name }}</h6>
                                            <span class="text-muted">{{ $comment->created_at->diffForHumans() }}</span>
                                            @auth
                                            @if (auth()->id() === $comment->user_id || auth()->user()->roles ===
                                            'admin')
                                            <button class="btn delete-comment ms-1 btn-sm"
                                                data-comment-id="{{ $comment->id }}">
                                                <i class="bi bi-trash-fill"></i>
                                            </button>
                                            @endif
                                            <button class="reply-button m-1 btn-sm" data-parent-id="{{ $comment->id }}">
                                                <i class="bi bi-reply-fill"></i> Phản hồi
                                            </button>
                                            @else
                                            <button class="reply-button m-1 btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#loginModal">
                                                <i class="bi bi-reply-fill"></i> Phản hồi
                                            </button>
                                            @endauth
                                        </div>
                                        <div class="comment-body">
                                            {{ $comment->comment_content }}
                                        </div>
                                        @if ($comment->replies->count())
                                        <div class="comment-replies bg-light p-3 mt-3 rounded"
                                            id="replies-container-{{ $comment->id }}">
                                            <h6 class="comment-replies-title mb-4 text-muted text-uppercase">
                                                {{ $comment->replies->count() }} Phản hồi
                                            </h6>

                                            <div id="replies-list-{{ $comment->id }}">
                                                @foreach ($comment->replies->take(3) as $reply)
                                                <div class="reply d-flex mb-4">
                                                    <div class="flex-shrink-0">
                                                        <div class="avatar avatar-sm rounded-circle">
                                                            <img class="avatar-img"
                                                                src="{{ asset('storage/' . $reply->user->avatar) }}"
                                                                alt="Avatar của {{ $reply->user->name }}"
                                                                class="img-fluid">
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1 ms-2 ms-sm-3">
                                                        <div class="reply-meta d-flex align-items-baseline">
                                                            <h6 class="mb-0 me-2">{{ $reply->user->name }}</h6>
                                                            <span
                                                                class="text-muted">{{ $reply->created_at->diffForHumans() }}</span>
                                                            @auth
                                                            @if (auth()->id() === $reply->user_id ||
                                                            auth()->user()->roles === 'admin')
                                                            <button class="btn delete-reply ms-1 btn-sm"
                                                                data-reply-id="{{ $reply->id }}">
                                                                <i class="bi bi-trash-fill"></i>
                                                            </button>
                                                            @endif
                                                            @endauth
                                                        </div>
                                                        <div class="reply-body">
                                                            {{ $reply->comment_content }}
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>

                                            @if ($comment->replies->count() > 3)
                                            <button class="btn btn-secondary load-more-replies"
                                                data-comment-id="{{ $comment->id }}" data-current-page="1">
                                                Tải thêm phản hồi
                                            </button>
                                            @endif
                                        </div>
                                        @endif

                                        <!-- Form trả lời -->
                                        @auth
                                        <div class="reply-form-container mt-3 d-none"
                                            id="reply-form-{{ $comment->id }}">
                                            <form class="reply-form" method="POST">
                                                @csrf
                                                <input type="hidden" name="news_id" value="{{ $news->id }}">
                                                <input type="hidden" name="parent_id" value="{{ $comment->id }}">

                                                <div class="col-12 mb-3">
                                                    <label for="reply-message-{{ $comment->id }}">Nội dung</label>
                                                    <textarea class="form-control" id="reply-message-{{ $comment->id }}"
                                                        name="comment_content" placeholder="Nhập nội dung trả lời"
                                                        cols="30" rows="3" required></textarea>
                                                </div>

                                                <div class="col-12">
                                                    <button type="submit" class="btn btn-primary">Đăng trả lời</button>
                                                </div>
                                            </form>
                                        </div>
                                        @endauth
                                        <!-- End Form trả lời -->

                                    </div>
                                </div>
                                @endforeach

                                <!-- Hiển thị phân trang bình luận -->
                                {{ $comments->links('components.custom-pagination') }}
                            </div>
                            <!-- End Bình Luận -->

                        </div><!-- End Single Post -->
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

<style>
    /* CSS cho nút trả lời */
    .reply-button {
        font-size: 0.8rem;
        /* Giảm kích thước chữ của nút */
        padding: 0.2rem 0.4rem;
        /* Điều chỉnh padding để phù hợp với kích thước chữ */
    }

    .reply-button i {
        font-size: 1rem;
    }

    .delete-comment {
        font-size: 0.8rem;
        padding: 0.2rem 0.4rem;
        border: none;
        background-color: transparent;
        color: #000;
        transition: color 0.3s ease, background-color 0.3s ease;
        cursor: pointer;
    }

    .delete-comment:hover {
        color: #313131;
        background-color: transparent;
    }

    .delete-comment i {
        font-size: 1rem;
    }
</style>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('.delete-comment').on('click', function() {
            var commentId = $(this).data('comment-id');
            var $commentElement = $('#comment-' + commentId); // Lấy phần tử bình luận cần xóa
            if (confirm('Bạn có chắc chắn muốn xóa bình luận này?')) {
                $.ajax({
                    url: '/comment/' + commentId,
                    type: 'DELETE',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        if (response.success) {
                            // Xóa bình luận khỏi DOM
                            $commentElement.remove();
                            alert(response.message);
                        } else {
                            alert(response.message);
                        }
                    },
                    error: function(xhr) {
                        alert('Có lỗi xảy ra. Vui lòng thử lại.');
                    }
                });
            }
        });
    });
    $('.delete-reply').on('click', function() {
        var replyId = $(this).data('reply-id');
        var $button = $(this);
        console.log('Reply ID:', replyId); // Kiểm tra giá trị replyId
        if (confirm('Bạn có chắc chắn muốn xóa phản hồi này?')) {
            $.ajax({
                url: '/comment/reply/' + replyId,
                type: 'DELETE',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    if (response.success) {
                        $button.closest('.reply').remove();
                        alert(response.message);
                    } else {
                        alert(response.message);
                    }
                },
                error: function(xhr) {
                    alert('Có lỗi xảy ra. Vui lòng thử lại.');
                }
            });
        }
    });
    document.addEventListener('DOMContentLoaded', function() {
        const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        document.querySelectorAll('.load-more-replies').forEach(function(button) {
            button.addEventListener('click', function() {
                const commentId = this.getAttribute('data-comment-id');
                const replyContainer = document.getElementById(`replies-list-${commentId}`);
                const currentPage = this.getAttribute('data-current-page');
                const nextPage = parseInt(currentPage) + 1;
                button.disabled = true;
                button.textContent = 'Đang tải...';
                fetch(`/comment/${commentId}/replies?page=${nextPage}`, {
                        method: 'GET',
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest',
                            'X-CSRF-TOKEN': token
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            if (data.replies.data.length) {
                                data.replies.data.forEach(reply => {
                                    const avatarUrl = reply.user && reply.user
                                        .avatar ?
                                        `{{ asset('storage/') }}/${reply.user.avatar}` :
                                        'default-avatar.png';
                                    const newReply = document.createElement('div');
                                    newReply.className = 'reply d-flex mb-4';
                                    newReply.innerHTML = `
                                    <div class="flex-shrink-0">
                                        <div class="avatar avatar-sm rounded-circle">
                                            <img class="avatar-img" src="${avatarUrl}" alt="Avatar của ${reply.user ? reply.user.name : 'Người dùng'}" class="img-fluid">
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 ms-2 ms-sm-3">
                                        <div class="reply-meta d-flex align-items-baseline">
                                            <h6 class="mb-0 me-2">${reply.user ? reply.user.name : 'Tên người dùng'}</h6>
                                            <span class="text-muted">${new Date(reply.created_at).toLocaleString()}</span>
                                        </div>
                                        <div class="reply-body">
                                            ${reply.comment_content}
                                        </div>
                                    </div>
                                `;
                                    replyContainer.appendChild(newReply);
                                });
                                button.setAttribute('data-current-page', nextPage);
                                button.disabled = false;
                                button.textContent = 'Tải thêm phản hồi';
                                if (!data.replies.has_more_pages) {
                                    button.style.display = 'none';
                                }
                            } else {
                                button.style.display = 'none';
                            }
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        button.disabled = false;
                        button.textContent = 'Tải thêm phản hồi';
                    });
            });
        });
        document.querySelector('#comments-list').addEventListener('click', function(event) {
            if (event.target.closest('.reply-button')) {
                const button = event.target.closest('.reply-button');
                const parentId = button.getAttribute('data-parent-id');
                const replyFormContainer = document.getElementById(`reply-form-${parentId}`);
                if (replyFormContainer) {
                    replyFormContainer.classList.toggle('d-none');
                }
            }
        });
        document.getElementById('comment-form').addEventListener('submit', function(e) {
            e.preventDefault();
            const form = e.target;
            const formData = new FormData(form);
            const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            fetch('{{ route('comment.store') }}', {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest',
                            'X-CSRF-TOKEN': token
                        }
                    })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        const commentsList = document.getElementById('comments-list');
                        const newComment = document.createElement('div');
                        newComment.className = 'comment d-flex mb-4';
                        newComment.id = `comment-${data.comment.id}`;
                        newComment.innerHTML = `
                <div class="flex-shrink-0">
                    <div class="avatar avatar-sm rounded-circle">
                        <img class="avatar-img" src="{{ asset('storage/') }}/${data.comment.user.avatar || 'default-avatar.png'}" alt="Avatar của ${data.comment.user.name}" class="img-fluid">
                    </div>
                </div>
                <div class="flex-grow-1 ms-2 ms-sm-3">
                    <div class="comment-meta d-flex align-items-baseline">
                        <h6 class="me-2">${data.comment.user.name}</h6>
                        <span class="text-muted">${new Date(data.comment.created_at).toLocaleString()}</span>
                        @auth
                        <button class="reply-button m-1 btn-sm" data-parent-id="${data.comment.id}">
                            <i class="bi bi-reply-fill"></i> Phản hồi
                        </button>
                        @else
                        <button class="reply-button mx-1 btn-sm" data-bs-toggle="modal" data-bs-target="#loginModal">
                            <i class="bi bi-reply-fill"></i> Phản hồi
                        </button>
                        @endauth
                    </div>
                    <div class="comment-body">
                        ${data.comment.comment_content}
                    </div>
                    @auth
                    <div class="reply-form-container mt-3 d-none" id="reply-form-${data.comment.id}">
                        <form class="reply-ajax-form" method="POST">
                            @csrf
                            <input type="hidden" name="news_id" value="{{ $news->id }}">
                            <input type="hidden" name="parent_id" value="${data.comment.id}">

                            <div class="col-12 mb-3">
                                <label for="reply-message-${data.comment.id}">Nội dung</label>
                                <textarea class="form-control" id="reply-message-${data.comment.id}"
                                    name="comment_content" placeholder="Nhập nội dung trả lời"
                                    cols="30" rows="3" required></textarea>
                            </div>

                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Đăng trả lời</button>
                            </div>
                        </form>
                    </div>
                    @endauth
                </div>
            `;
                        commentsList.insertAdjacentElement('afterbegin', newComment);
                        form.reset();
                    } else {
                        console.error(data.error);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        });
        document.querySelectorAll('.reply-form').forEach(function(form) {
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                const formData = new FormData(form);
                fetch('{{ route('comment.reply.store') }}', {
                            method: 'POST',
                            body: formData,
                            headers: {
                                'X-Requested-With': 'XMLHttpRequest',
                                'X-CSRF-TOKEN': token
                            }
                        })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            if (data.comment && data.comment.user && data.comment.user
                                .avatar) {
                                let replyContainer = document.getElementById(
                                    `replies-list-${data.comment.parent_id}`);
                                if (!replyContainer) {
                                    const commentContainer = document.getElementById(
                                        `comment-${data.comment.parent_id}`);
                                    replyContainer = document.createElement('div');
                                    replyContainer.id =
                                        `replies-list-${data.comment.parent_id}`;
                                    replyContainer.className =
                                        'comment-replies bg-light p-3 mt-3 rounded';
                                    commentContainer.appendChild(replyContainer);
                                }
                                const newReply = document.createElement('div');
                                newReply.className = 'reply d-flex mb-4';
                                newReply.innerHTML = `
                            <div class="flex-shrink-0">
                                <div class="avatar avatar-sm rounded-circle">
                                    <img class="avatar-img" src="{{ asset('storage/') }}/${data.comment.user.avatar || 'default-avatar.png'}" alt="Avatar" class="img-fluid">
                                </div>
                            </div>
                            <div class="flex-grow-1 ms-2 ms-sm-3">
                                <div class="reply-meta d-flex align-items-baseline">
                                    <h6 class="mb-0 me-2">${data.comment.user.name}</h6>
                                    <span class="text-muted">${new Date(data.comment.created_at).toLocaleString()}</span>
                                </div>
                                <div class="reply-body">
                                    ${data.comment.comment_content}
                                </div>
                            </div>
                        `;
                                replyContainer.appendChild(newReply);
                                form.reset();
                            } else {
                                console.error('Dữ liệu phản hồi không hợp lệ:', data
                                    .comment);
                            }
                        } else {
                            console.error(data.error);
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
            });
        });
        document.addEventListener('submit', function(event) {
            if (event.target.classList.contains('reply-ajax-form')) {
                event.preventDefault();
                const form = event.target;
                const formData = new FormData(form);
                const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                fetch('/comment/reply-ajax', {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest',
                            'X-CSRF-TOKEN': token
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            // Tạo phần tử phản hồi mới ngay lập tức
                            const newReply = document.createElement('div');
                            newReply.className = 'comment d-flex mb-4';
                            newReply.innerHTML = `
                    <div class="flex-shrink-0">
                        <div class="avatar avatar-sm rounded-circle">
                            <img class="avatar-img" src="{{ asset('storage/') }}/${data.comment.user.avatar || 'default-avatar.png'}" alt="Avatar của ${data.comment.user.name}" class="img-fluid">
                        </div>
                    </div>
                    <div class="flex-grow-1 ms-2 ms-sm-3">
                        <div class="comment-meta d-flex align-items-baseline">
                            <h6 class="me-2">${data.comment.user.name}</h6>
                            <span class="text-muted">${new Date(data.comment.created_at).toLocaleString()}</span>
                            @auth
                            <button class="reply-button m-1 btn-sm" data-parent-id="${data.comment.id}">
                                <i class="bi bi-reply-fill"></i> Phản hồi
                            </button>
                            @else
                            <button class="reply-button mx-1 btn-sm" data-bs-toggle="modal" data-bs-target="#loginModal">
                                <i class="bi bi-reply-fill"></i> Phản hồi
                            </button>
                            @endauth
                        </div>
                        <div class="comment-body">
                            ${data.comment.comment_content}
                        </div>
                        @auth
                        <div class="reply-form-container mt-3 d-none" id="reply-form-${data.comment.id}">
                            <form class="reply-ajax-form" method="POST">
                                @csrf
                                <input type="hidden" name="news_id" value="{{ $news->id }}">
                                <input type="hidden" name="parent_id" value="${data.comment.id}">

                                <div class="col-12 mb-3">
                                    <label for="reply-message-${data.comment.id}">Nội dung</label>
                                    <textarea class="form-control" id="reply-message-${data.comment.id}"
                                        name="comment_content" placeholder="Nhập nội dung trả lời"
                                        cols="30" rows="3" required></textarea>
                                </div>

                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary">Đăng trả lời</button>
                                </div>
                            </form>
                        </div>
                        @endauth
                    </div>
                `;
                            // Xác định vị trí chèn phản hồi mới
                            const parentId = formData.get('parent_id');
                            const parentComment = document.querySelector(`#comment-${parentId}`);
                            if (parentComment) {
                                const replyContainer = parentComment.querySelector(
                                    '.reply-form-container');
                                replyContainer.classList.remove('d-none');
                                replyContainer.insertAdjacentElement('beforebegin', newReply);
                            }
                            // Ẩn form phản hồi sau khi gửi
                            form.reset();
                            form.parentElement.classList.add('d-none');
                        } else {
                            console.error('Có lỗi xảy ra:', data.message);
                        }
                    })
                    .catch(error => {
                        console.error('Lỗi:', error);
                    });
            }
        });
    });
</script>

@endsection