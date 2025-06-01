@extends('layouts.app')

@section('content')
<div class="container-fluid py-4 px-5">
    @if (session('success'))
        <div class="alert alert-success text-center">
            {{ session('success') }}
        </div>
    @endif

    <h2 class="mb-4 fw-bold">📋 Quản lý người dùng</h2>

    <div class="card shadow border">
        <div class="card-body p-0">
            <table class="table table-bordered table-striped table-hover w-100 text-center align-middle mb-0">
                <thead class="table-primary">
                    <tr>
                        <th class="fw-bold border">ID</th>
                        <th class="fw-bold border">Tên</th>
                        <th class="fw-bold border">Email</th>
                        <th class="fw-bold border">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $user)
                    <tr>
                        <td class="border">{{ $user->id }}</td>
                        <td class="border">{{ $user->name }}</td>
                        <td class="border">{{ $user->email }}</td>
                        <td class="border">
                            <a href="{{ route('users.edit', $user) }}" class="btn btn-outline-warning btn-sm me-2 action-button">
                                ✏️ Sửa
                            </a>
                            <form action="{{ route('users.destroy', $user) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-outline-danger btn-sm action-button" onclick="return confirm('Xóa người dùng này?')">
                                    🗑️ Xóa
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="border">Không có người dùng nào.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<style>
    .action-button {
        font-size: 1rem;
        padding: 6px 12px;
        transition: all 0.2s ease-in-out;
        border-radius: 6px;
    }

    .btn-outline-warning:hover {
        background-color: #ffc107 !important;
        color: white !important;
        border-color: #ffc107 !important;
    }

    .btn-outline-danger:hover {
        background-color: #dc3545 !important;
        color: white !important;
        border-color: #dc3545 !important;
    }
</style>
@endsection
@push('scripts')
<script>
    // Lắng nghe sự kiện xóa (như trước)
    Echo.channel('users')
        .listen('UserDeleted', (e) => {
            document.getElementById('user-' + e.userId)?.remove();
        })
        // Lắng nghe sự kiện cập nhật
        .listen('UserUpdated', (e) => {
            const row = document.getElementById('user-' + e.user.id);
            if (row) {
                row.querySelector('td:nth-child(2)').textContent = e.user.name; // Cập nhật tên
                row.querySelector('td:nth-child(3)').textContent = e.user.email; // Cập nhật email
            }
        });
</script>
@endpush
