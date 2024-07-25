@extends('backend.layouts.master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="d-inline-block">Vai Trò Người Dùng</h1>
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
                            <h3 class="card-title">Sửa Vai Trò</h3>
                        </div>
                        <form method="POST" action="{{ route('users.update', $user) }}">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Vai Trò</label>
                                    <select name="roles" id="roles" class="form-control" required="">
                                        <option value="user" {{ $user->roles == 'user' ? 'selected' : '' }}>Người Dùng
                                        </option>
                                        <option value="admin" {{ $user->roles == 'admin' ? 'selected' : '' }}>Admin
                                            (Quản Trị)</option>
                                    </select>
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