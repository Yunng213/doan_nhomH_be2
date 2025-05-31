@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Danh sách nhân viên</h2>
    <a href="{{ route('nhanvien.create') }}" class="btn btn-success mb-3">Thêm nhân viên</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Tên</th>
            <th>Chức vụ</th>
            <th>Ngày nhận việc</th>
            <th>Hành động</th>
        </tr>
        @foreach ($nhanviens as $nv)
        <tr>
            <td>{{ $nv->id }}</td>
            <td>{{ $nv->TenNV }}</td>
            <td>{{ $nv->ChucVu }}</td>
            <td>{{ $nv->NgayNhanViec }}</td>
            <td>
                <a href="{{ route('nhanvien.edit', $nv->id) }}" class="btn btn-warning btn-sm">Sửa</a>
                <form action="{{ route('nhanvien.destroy', $nv->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc muốn xóa?')">Xóa</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection
