@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Sửa nhân viên</h2>
    <form action="{{ route('nhanvien.update', $nhanvien->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label>Tên nhân viên</label>
            <input type="text" name="TenNV" class="form-control" value="{{ $nhanvien->TenNV }}" required>
        </div>
        <div class="form-group">
            <label>Chức vụ</label>
            <input type="text" name="ChucVu" class="form-control" value="{{ $nhanvien->ChucVu }}" required>
        </div>
        <div class="form-group">
            <label>Ngày nhận việc</label>
            <input type="date" name="NgayNhanViec" class="form-control" value="{{ $nhanvien->NgayNhanViec }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Cập nhật</button>
    </form>
</div>
@endsection
