@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Thêm nhân viên</h2>
    <form action="{{ route('nhanvien.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>Tên nhân viên</label>
            <input type="text" name="TenNV" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Chức vụ</label>
            <input type="text" name="ChucVu" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Ngày nhận việc</label>
            <input type="date" name="NgayNhanViec" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Lưu</button>
    </form>
</div>
@endsection
