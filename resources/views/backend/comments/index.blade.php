@extends('backend.layouts.master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="d-inline-block">Quản lý Bình Luận</h1>
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
                            <h3 class="card-title">Danh Sách Bình Luận</h3>
                        </div>
                        <div class="card-body">
                            <table id="commentsTable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nội Dung</th>
                                        <th>Bài Viết</th>
                                        <th>Trạng Thái</th>
                                        <th>Người Bình Luận</th>
                                        <th>Ngày Tạo</th>
                                        <th>Hành Động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($comments as $comment)
                                    <tr>
                                        <td>{{ $comment->id }}</td>
                                        <td>{{ $comment->comment_content }}</td>
                                        <td>{{ $comment->news_id }}</td>
                                        <td>
                                            <div class="btn btn-sm {{ $comment->comment_status == 1 ? 'btn-success' : 'btn-danger' }}">
                                                {{ $comment->comment_status == 1 ? 'Hiện' : 'Ẩn' }}
                                            </div>
                                        </td>
                                        <td>{{ $comment->user->name }}</td>
                                        <td>{{ $comment->created_at }}</td>
                                        <td>
                                            <a class="btn btn-sm btn-primary" href="{{ route('comments.edit', ['comment' => $comment->id]) }}">Sửa</a>
                                            <form action="{{ route('comments.destroy', ['comment' => $comment->id]) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa bình luận này?')">Xóa</button>
                                            </form>
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
        $('#commentsTable').DataTable({
            "paging": true,
            "searching": true,
            "ordering": true,
            "responsive": true,
            "language": {
                "url": "https://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Vietnamese.json"
            },
            "columnDefs": [{
                "targets": [6], // chỉ số cột Hành động
                "orderable": false, // không cho sắp xếp
                "searchable": false // không cho tìm kiếm
            }]
        });
    });
</script>
@endsection
