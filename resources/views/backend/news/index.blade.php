@extends('backend.layouts.master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="d-inline-block">Quản lý Bài Viết</h1>
                </div>
            </div>
        </div>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-secondary">
                        <div class="card-header">
                            <h3 class="card-title">Thêm Bài Viết</h3>
                        </div>
                        <form method="POST" action="{{ route('news.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group row">
                                    <div class="col-sm-6 col-md-6">
                                        <label>Tiêu Đề</label>
                                        <input type="text" name="title" class="form-control" placeholder="Tiêu Đề"
                                            required="">
                                    </div>
                                    <div class="col-sm-6 col-md-5">
                                        <label>Danh Mục</label>
                                        <select id="category_id" name="category_id" class="form-control" required="">
                                            <option value="" selected="" disabled="">Chọn Danh Mục</option>
                                            @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                {{ old('category_id') == $category->category_name ? 'selected' : '' }}>
                                                {{ $category->category_name }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>

                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 col-md-6">
                                        <label for="summary">Tóm Tắt</label>
                                        <input type="text" name="summary" class="form-control" placeholder="Tóm Tắt"
                                            required="">
                                    </div>
                                    <div class="form-group col-sm-6 col-md-5">
                                        <label>Tags</label>
                                        <input type="text" id="tags" name="tags" value="" class="form-control mb-2"
                                            placeholder="Tags">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="form-group col-sm-6 col-md-7">
                                        <label>Ảnh Nổi Bật <small class="text-danger">Chỉ png, jpg, webp, gif and jpeg
                                                image allow</small></label>
                                        <div class="custom-file">
                                            <input name="file" type="file" accept="image/*" class="custom-file-input"
                                                required>
                                            <label class="custom-file-label" id="image" for="customFile">Chọn
                                                tệp</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Trạng Thái</label><br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="status" id="status_active"
                                            value="1" checked>
                                        <label class="form-check-label" for="status_active">Hiện</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="status" id="status_inactive"
                                            value="0">
                                        <label class="form-check-label" for="status_inactive">Ẩn</label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <label>Nội Dung</label>
                                        <textarea id="summernote" name="content" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <p style="display: none" id="img_error_msg" class="alert alert-danger"></p>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Thêm</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card card-secondary">
                        <div class="card-header">
                            <h3 class="card-title">Danh Mục | <small>View / Update / Delete</small></h3>
                        </div>
                        <div class="card-body">
                            <table id="newsTable" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Danh Mục</th>
                                        <th>Tiêu Đề</th>
                                        <th>Tóm Tắt</th>
                                        <th>Ảnh Nổi Bật</th>
                                        <th>Trạng Thái</th>
                                        <th>Thao Tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($news as $new)
                                    <tr>
                                        <td>{{ $new->id }}</td>
                                        <td>{{ \App\Models\Category::find($new->category_id)->category_name }}</td>
                                        <td class="summary-ellipsis col-title">{{ $new->title }}</td>
                                        <td class="summary-ellipsis col-summary">{{ $new->summary }}</td>

                                        <td>
                                            <img src="{{ asset($new->preview) }}" height="64" alt="">
                                        </td>
                                        <td>
                                            <div
                                                class="btn btn-icon btn-sm text-white {{ $new->news_status == 1 ? 'btn-success' : 'btn-danger' }}">
                                                {{ $new->news_status == 1 ? 'Hiện' : 'Ẩn' }}
                                            </div>
                                        </td>
                                        <td>
                                            <div class="row">
                                                <a class="btn btn-icon btn-sm btn-primary text-white"
                                                    href="{{ route('news.edit', $new->id) }}">Sửa</a>
                                                &nbsp;&nbsp;
                                                <form method="POST"
                                                    action="{{ route('news.destroy', ['news' => $new->id]) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-icon btn-sm btn-danger text-white"
                                                        type="submit"
                                                        onclick="return confirm('Xác nhận xóa?')">Xóa</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
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
            tagsInput.value = selectedOption.textContent.trim();
        });
    });
    $(document).ready(function() {
        $('#newsTable').DataTable({
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
    /* Định nghĩa chung cho các cột bị cắt ngắn */
    .summary-ellipsis {
        white-space: nowrap;
        /* Ngăn không cho văn bản xuống dòng */
        overflow: hidden;
        /* Ẩn văn bản vượt quá chiều rộng của phần tử */
        text-overflow: ellipsis;
        /* Thêm dấu ... khi văn bản bị cắt */
    }

    /* Định nghĩa chiều rộng cho các cột cụ thể */
    .col-title,
    .col-summary {
        max-width: 250px;
        /* Chiều rộng tối đa của cột */
        min-width: 50px;
        /* Chiều rộng tối thiểu của cột */
    }

    /* Đảm bảo các cột có thể phản hồi trên các màn hình nhỏ */
    @media (max-width: 768px) {

        .col-title,
        .col-summary {
            max-width: 150px;
            /* Giảm chiều rộng tối đa trên màn hình nhỏ */
        }
    }

    @media (max-width: 576px) {

        .col-title,
        .col-summary {
            max-width: 100px;
            /* Giảm chiều rộng tối đa hơn nữa trên màn hình rất nhỏ */
        }
    }
</style>
@endsection