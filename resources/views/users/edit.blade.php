@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">✏️ Chỉnh sửa người dùng</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('users.update', $user) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="name" class="form-label">Tên:</label>
                    <input type="text" id="name" name="name" value="{{ $user->name }}" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" id="email" name="email" value="{{ $user->email }}" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Mật khẩu mới:</label>
                    <input type="password" id="password" name="password" class="form-control" placeholder="Để trống nếu không đổi">
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-success px-4 py-2">
                        💾 Cập nhật
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
