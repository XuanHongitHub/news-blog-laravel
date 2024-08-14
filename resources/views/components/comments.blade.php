<!-- resources/views/components/comment.blade.php -->
<div class="comment d-flex mb-4">
    <div class="flex-shrink-0">
      <div class="avatar avatar-sm rounded-circle">
        <img class="avatar-img" src="{{ asset('storage/' . $comment->user->avatar) }}" alt="Avatar của {{ $comment->user->name }}" class="img-fluid">
      </div>
    </div>
    <div class="flex-grow-1 ms-2 ms-sm-3">
      <div class="comment-meta d-flex align-items-baseline">
        <h6 class="me-2">{{ $comment->user->name }}</h6>
        <span class="text-muted">{{ $comment->created_at->diffForHumans() }}</span>
      </div>
      <div class="comment-body">
        {{ $comment->comment_content }}
      </div>
    </div>
  </div>
  