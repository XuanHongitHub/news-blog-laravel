@extends('backend.layouts.master')
@section('content')
<div class="content-wrapper">
    @include('components.errors-admin')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="d-inline-block">Quản lý Danh Mục</h1>
                </div>
            </div>
        </div>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-5">
                    <div class="card card-secondary">
                        <div class="card-header">
                            <h3 class="card-title">Thêm Danh Mục</h3>
                        </div>
                        <form method="POST" action="{{ route('categories.store') }}">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="category_name">Tên Danh Mục</label>
                                    <input type="text" name="category_name" id="category_name" value="" class="form-control" placeholder="Tên Danh Mục" required="">
                                </div>
                                <div class="form-group">
                                    <label for="language">Ngôn Ngữ</label>
                                    <select name="language" id="language" class="form-control" required="">
                                        <option value="vi">Tiếng Việt</option>
                                        <option value="en">Tiếng Anh</option>
                                        <option value="fr">Tiếng Pháp</option>
                                        <option value="es">Tiếng Tây Ban Nha</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    @php
                                        $maxOrdinal = $categories->max('ordinal');
                                    @endphp
                                    <label for="ordinal">Thứ tự</label>
                                    <input type="text" name="ordinal" id="ordinal" class="form-control" value="{{ $maxOrdinal + 1 }}" placeholder="Thứ Tự" required="">
                                </div>
                                <div class="form-group">
                                    <label>Trạng Thái</label><br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="status" id="status_active" value="1" checked>
                                        <label class="form-check-label" for="status_active">Hiện</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="status" id="status_inactive" value="0">
                                        <label class="form-check-label" for="status_inactive">Ẩn</label>
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
                <div class="col-md-7">
                    <div class="card card-secondary">
                        <div class="card-header">
                            <h3 class="card-title">Danh Mục | <small>View / Update / Delete</small></h3>
                        </div>
                        <div class="card-body">
                            <table aria-describedby="mydesc" class="table-striped table table-bordered table-hover" id="categoriesTable" data-toggle="table" data-click-to-select="true" data-side-pagination="server" data-pagination="true" data-page-list="[5, 10, 20, 50, 100, 200]" data-search="true" data-show-columns="true" data-show-refresh="true" data-fixed-columns="true" data-fixed-number="1" data-fixed-right-number="1" data-trim-on-search="false" data-sort-name="id" data-sort-order="desc" data-mobile-responsive="true" data-maintain-selected="true" data-export-types="[&quot;txt&quot;,&quot;excel&quot;]" data-export-options="{ &quot;fileName&quot;: &quot;category-list-12-07-24&quot; }" data-query-params="queryParams">
                                <thead>
                                    <tr>
                                        <th style="" data-field="id">
                                            <div class="th-inner sortable both desc">ID</div>
                                            <div class="fht-cell"></div>
                                        </th>
                                        <th style="" data-field="category_name">
                                            <div class="th-inner sortable both">Tên</div>
                                            <div class="fht-cell"></div>
                                        </th>
                                        <th style="" data-field="language">
                                            <div class="th-inner ">Ngôn Ngữ</div>
                                            <div class="fht-cell"></div>
                                        </th>
                                        <th style="" data-field="ordinal">
                                            <div class="th-inner ">Thứ tự</div>
                                            <div class="fht-cell"></div>
                                        </th>
                                        <th style="" data-field="status">
                                            <div class="th-inner ">Trạng Thái</div>
                                            <div class="fht-cell"></div>
                                        </th>
                                        <th style="" data-field="actions">
                                            <div class="th-inner ">Hành động</div>
                                            <div class="fht-cell"></div>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($categories as $category)
                                    <tr>
                                        <td>{{ $category->id }}</td>
                                        <td>{{ $category->category_name }}</td>
                                        <td>
                                            {{ $category->language == 'vi' ? 'Việt Nam' : ($category->language == 'en' ? 'Tiếng Anh' : ($category->language == 'fr' ? 'Tiếng Pháp' : ($category->language == 'es' ? 'Tiếng Tây Ban Nha' : 'Không xác định'))) }}
                                        </td>
                                        <td>{{ $category->ordinal }}</td>
                                        <td>
                                            <div class="btn btn-icon btn-sm text-white edit-data {{ $category->status == 1 ? 'btn-success' : 'btn-danger' }}">
                                                {{ $category->status == 1 ? 'Hiện' : 'Ẩn' }}
                                            </div>
                                        </td>
                                        <td>
                                            <div class="row">
                                                <a class="btn btn-icon btn-sm btn-primary text-white edit-data" href="{{ route('categories.edit', ['category' => $category->id]) }}">Sửa</a>
                                                &nbsp;&nbsp;
                                                <form method="POST" action="{{ route('categories.destroy', ['category' => $category->id]) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-icon btn-sm btn-danger text-white delete-data" type="submit" onclick="return confirm('Xác nhận xóa?')">Xóa</button>
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
    $(document).ready(function() {
        $('#categoriesTable').DataTable({
            "paging": true,
            "searching": true,
            "ordering": true,
            "responsive": true,
            "language": {
                "url": "https://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Vietnamese.json"
            },
            "pageLength": 10, // Hiển thị 10 danh mục mỗi trang
            "columnDefs": [{
                "targets": [5], // chỉ số cột Hành động
                "orderable": false, // không cho sắp xếp
                "searchable": false // không cho tìm kiếm
            }]
        });
    });
</script>

@endsection
