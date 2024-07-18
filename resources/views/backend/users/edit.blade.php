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
                            <input type="hidden" name="csrf_test_name" value="7b70748c788d50122e2e44e88cde0708">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="category_name" id="category_name" value="{{ $category->category_name }}" class="form-control" placeholder="category name"
                                        required="">
                                </div>
                                <!-- //------------------------------------- -->
                                {{-- <div class="form-group">
                                    <label>Image <small class="text-danger">Only png, jpg, webp, gif and jpeg image
                                            allow</small></label>
                                    <div class="custom-file">
                                        <input name="file" type="file" accept="image/*" class="custom-file-input"
                                            id="exampleInputFile1" required="">
                                        <label class="custom-file-label" for="customFile">Choose
                                            file</label>
                                    </div>
                                </div> --}}
                                <div class="form-group">
                                    <p style="display: none" id="img_error_msg" class="alert alert-danger">
                                    </p>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
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