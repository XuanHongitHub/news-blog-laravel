@if ($errors->any())
<div class="m-3 alert alert-danger">
    <ul class="mb-0">
        @foreach ($errors->all() as $error)
        <li>Lỗi: {{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
