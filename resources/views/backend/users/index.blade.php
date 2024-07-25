@extends('backend.layouts.master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="d-inline-block">Quản lý Người Dùng</h1>
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
                            <h3 class="card-title">Users <small> View </small></h3>
                        </div>
                        <div class="card-body">
                            <table aria-describedby="mydesc" class="table-striped table table-bordered table-hover"
                                id="usersTable" data-toggle="table" data-click-to-select="true"
                                data-side-pagination="server" data-pagination="true"
                                data-page-list="[5, 10, 20, 50, 100, 200]" data-search="true" data-show-columns="true"
                                data-show-refresh="true" data-fixed-columns="true" data-fixed-number="1"
                                data-fixed-right-number="1" data-trim-on-search="false" data-sort-name="id"
                                data-sort-order="desc" data-mobile-responsive="true" data-maintain-selected="true"
                                data-export-types="[&quot;txt&quot;,&quot;excel&quot;]"
                                data-export-options="{ &quot;fileName&quot;: &quot;user-list-12-07-24&quot; }"
                                data-query-params="queryParams">
                                <thead>
                                    <tr>
                                        <th style="" data-field="id">
                                            <div class="th-inner sortable both desc">ID</div>
                                            <div class="fht-cell"></div>
                                        </th>
                                        <th style="" data-field="name">
                                            <div class="th-inner sortable both">Tên
                                            </div>
                                            <div class="fht-cell"></div>
                                        </th>
                                        <th style="" data-field="email">
                                            <div class="th-inner ">Email</div>
                                            <div class="fht-cell"></div>
                                        </th>
                                        <th style="" data-field="role">
                                            <div class="th-inner ">Vai Trò</div>
                                            <div class="fht-cell"></div>
                                        </th>
                                        <th style="" data-field="created_at">
                                            <div class="th-inner ">Ngày</div>
                                            <div class="fht-cell"></div>
                                        </th>
                                        <th style="" data-field="actions">
                                            <div class="th-inner ">Hành động</div>
                                            <div class="fht-cell"></div>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->roles }}</td>
                                        <td>{{ $user->created_at }}</td>
                                        <td>
                                            <a class="btn btn-icon btn-sm btn-primary text-white edit-data"
                                                href="{{ route('users.edit', ['user' => $user->id]) }}">Sửa</a>
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
        $('#usersTable').DataTable({
            "paging": true,
            "searching": true,
            "ordering": true,
            "responsive": true,
            "language": {
                "url": "https://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Vietnamese.json"
            },
            "columnDefs": [{
                "targets": [5], // chỉ số cột Hành động
                "orderable": false, // không cho sắp xếp
                "searchable": false // không cho tìm kiếm
            }]
        });
    });
</script>

@endsection