@extends('backend.layouts.master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="d-inline-block">Thêm và Quản lí Danh Mục</h1>
                </div>
            </div>
        </div>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-11 ml-5">
                    <div class="card card-secondary">
                        <div class="card-header">
                            <h3 class="card-title">Sửa Danh Mục</h3>
                        </div>
                        <form method="POST" action="{{ route('categories.update', $category) }}">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Tên Danh Mục</label>
                                    <input type="text" name="category_name" id="category_name" value="{{ $category->category_name }}"
                                        class="form-control" placeholder="Tên Danh Mục" required="">
                                </div>
                                {{-- <div class="form-group">
                                    <label>Slug</label>
                                    <input type="text" name="slug" id="slug" value="{{ $category->slug }}"
                                        class="form-control" placeholder="Auto-generated from name" required="">
                                </div> --}}
                                <div class="form-group">
                                    <label>Ngôn Ngữ</label>
                                    <select name="language" id="language" class="form-control" required="">
                                        <option value="vi" {{ $category->language == 'vi' ? 'selected' : '' }}>Tiếng Việt</option>
                                        <option value="en" {{ $category->language == 'en' ? 'selected' : '' }}>Tiếng Anh</option>
                                        <option value="fr" {{ $category->language == 'fr' ? 'selected' : '' }}>Tiếng Pháp</option>
                                        <option value="es" {{ $category->language == 'es' ? 'selected' : '' }}>Tiếng Tây Ban Nha</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Thứ tự</label>
                                    <input type="text" name="ordinal" id="ordinal" class="form-control" value="{{ $category->ordinal }}"
                                        placeholder="Thứ Tự" required="">
                                </div>
                                <div class="form-group">
                                    <label>Trạng Thái</label><br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="status" id="status_active" value="1"
                                            {{ $category->status == 1 ? 'checked' : '' }}>
                                        <label class="form-check-label" for="status_active">Hiện</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="status" id="status_inactive" value="0"
                                            {{ $category->status == 0 ? 'checked' : '' }}>
                                        <label class="form-check-label" for="status_inactive">Ẩn</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <p style="display: none" id="img_error_msg" class="alert alert-danger">
                                    </p>
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
    <!-- /.content -->
</div>
<script>
    $(function() {
        $('#categoryTable').DataTable({
            "paging": true,
            "searching": true,
            "ordering": true,
            "responsive": true,
        });
    });
</script>

@endsection