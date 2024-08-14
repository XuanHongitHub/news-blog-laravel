@extends('backend.layouts.master')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Sửa Bình Luận</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-secondary">
                        <div class="card-header">
                            <h3 class="card-title">Chỉnh Sửa Bình Luận</h3>
                        </div>
                        <form method="POST" action="{{ route('comments.update', $comment->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="comment_content">Nội Dung Bình Luận</label>
                                    <textarea class="form-control" id="comment_content" name="comment_content" disabled>{{ $comment->comment_content }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="comment_status">Trạng Thái</label>
                                    <select class="form-control" id="comment_status" name="comment_status" required>
                                        <option value="1" {{ $comment->comment_status == 1 ? 'selected' : '' }}>Hiển Thị</option>
                                        <option value="0" {{ $comment->comment_status == 0 ? 'selected' : '' }}>Ẩn</option>
                                    </select>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Cập Nhật</button>
                                <a href="{{ route('comments.index') }}" class="btn btn-secondary">Hủy</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
