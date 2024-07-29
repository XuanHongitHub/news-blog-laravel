@extends('backend.layouts.master')
@section('content')
<div class="content-wrapper">
    @include('components.errors-admin')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="d-inline-block">Chỉnh Sửa Bài Viết</h1>
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
                            <h3 class="card-title">Sửa Bài Viết</h3>
                        </div>
                        <form method="POST" action="{{ route('news.update', ['news' => $news->id]) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group row">
                                    <div class="col-sm-6 col-md-6">
                                        <label>Tiêu Đề</label>
                                        <input type="text" name="title" class="form-control" placeholder="Tiêu Đề" value="{{ $news->title }}" required="">
                                    </div>
                                    <div class="col-sm-6 col-md-5">
                                        <label>Danh Mục</label>
                                        <select id="category_id" name="category_id" class="form-control" required="">
                                            <option value="" selected="" disabled="">Chọn Danh Mục</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}" {{ $news->category_id == $category->id ? 'selected' : '' }}>
                                                    {{ $category->category_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 col-md-6">
                                        <label for="summary">Tóm Tắt</label>
                                        <input type="text" name="summary" class="form-control" placeholder="Tóm Tắt" value="{{ $news->summary }}" required="">
                                    </div>
                                    <div class="form-group col-sm-6 col-md-5">
                                        <label>Tags</label>
                                        <input type="text" id="tags" name="tags" value="{{ $news->tags }}" class="form-control mb-2" placeholder="Tags">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="form-group col-sm-6 col-md-7">
                                        <label>Ảnh Nổi Bật <small class="text-danger">Chỉ png, jpg, webp, gif và jpeg image allow</small></label>
                                        <div class="custom-file">
                                            <input name="file" type="file" accept="image/*" class="custom-file-input">
                                            <label class="custom-file-label" id="image" for="customFile">Chọn tệp</label>
                                        </div>
                                        @if ($news->preview)
                                            <img src="{{ asset($news->preview) }}" height="64" alt="Current Image">
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Trạng Thái</label><br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="status" id="status_active" value="1" {{ $news->news_status == 1 ? 'checked' : '' }}>
                                        <label class="form-check-label" for="status_active">Hiện</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="status" id="status_inactive" value="0" {{ $news->news_status == 0 ? 'checked' : '' }}>
                                        <label class="form-check-label" for="status_inactive">Ẩn</label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <label>Nội Dung</label>
                                        <textarea id="summernote" name="content" class="form-control">{{ $news->content }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <p style="display: none" id="img_error_msg" class="alert alert-danger"></p>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Cập Nhật</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script src="https://code.jquery.com/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const categorySelect = document.getElementById('category_id');
        const tagsInput = document.getElementById('tags');
        categorySelect.addEventListener('change', function() {
            const selectedOption = categorySelect.options[categorySelect.selectedIndex];
            tagsInput.value = selectedOption.value;
        });
    });
    $(document).ready(function() {
        $('#postsTable').DataTable({
            "paging": true,
            "searching": true,
            "ordering": true,
            "responsive": true,
            "language": {
                "url": "https://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Vietnamese.json"
            },
            "pageLength": 10, // Hiển thị 10 danh mục mỗi trang
            "columnDefs": [{
                "targets": [6], // chỉ số cột Hành động
                "orderable": false, // không cho sắp xếp
                "searchable": false // không cho tìm kiếm
            }]
        });
    });
</script>
<style>
    .summary-ellipsis {
        white-space: nowrap;
        /* Ngăn không cho văn bản xuống dòng */
        overflow: hidden;
        /* Ẩn văn bản vượt quá chiều rộng của phần tử */
        text-overflow: ellipsis;
        /* Thêm dấu ... khi văn bản bị cắt */
    }
</style>
@endsection
