@extends('app')

@section('content')
<div class="container px-4 py-5 bg-light">
    <!-- Header -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card bg-primary text-white shadow-lg rounded-lg">
                <div class="card-body p-4">
                    <h2 class="h4 mb-1">Thống Kê Tổng Quan</h2>
                    <p class="small mb-0">Cập nhật lúc: {{ date('H:i d/m/Y') }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="row g-4 mb-4">
        @php
            $cards = [
                ['label' => 'Tổng Sản Phẩm', 'value' => $statistics['total_products'], 'icon' => 'fas fa-box', 'bg' => 'primary'],
                ['label' => 'Tổng Giá Trị', 'value' => number_format($statistics['total_value']) . ' VNĐ', 'icon' => 'fas fa-dollar-sign', 'bg' => 'success'],
                ['label' => 'Giá Trung Bình', 'value' => number_format($statistics['avg_price']) . ' VNĐ', 'icon' => 'fas fa-tags', 'bg' => 'info'],
                ['label' => 'Sắp Hết Hàng', 'value' => $statistics['low_stock'], 'icon' => 'fas fa-exclamation-triangle', 'bg' => 'warning'],
            ];
        @endphp

        @foreach($cards as $card)
        <div class="col-xl-3 col-md-6">
            <div class="card border-0 shadow-sm rounded-lg h-100">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center">
                        <div class="stats-icon bg-{{ $card['bg'] }} text-white rounded-circle p-3">
                            <i class="{{ $card['icon'] }}"></i>
                        </div>
                        <div class="ms-3">
                            <h6 class="text-muted mb-0">{{ $card['label'] }}</h6>
                            <h3 class="mb-0">{{ $card['value'] }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Monthly Revenue Section -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card border-0 shadow-sm rounded-lg">
                <div class="card-header bg-white border-0 pt-4 pb-2">
                    <h5 class="mb-0">Doanh Thu Theo Tháng</h5>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead class="bg-light">
                                <tr>
                                    <th class="px-4">Tháng</th>
                                    <th class="px-4 text-center">Số Đơn Hàng</th>
                                    <th class="px-4 text-end">Doanh Thu</th>
                                    <th class="px-4 text-end">Tỷ Lệ</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($statistics['monthly_sales'] as $data)
                                <tr>
                                    <td class="px-4">Tháng {{ $data['month'] }}</td>
                                    <td class="px-4 text-center">{{ $data['total_products'] }}</td>
                                    <td class="px-4 text-end">{{ number_format($data['revenue']) }} VNĐ</td>
                                    <td class="px-4 text-end">
                                        <div class="d-flex align-items-center justify-content-end">
                                            <div class="progress flex-grow-1 me-2" style="height: 6px;">
                                                <div class="progress-bar bg-primary" 
                                                     style="width: {{ ($data['revenue'] / max(array_column($statistics['monthly_sales'], 'revenue'))) * 100 }}%">
                                                </div>
                                            </div>
                                            <span class="text-muted small">
                                                {{ number_format(($data['revenue'] / array_sum(array_column($statistics['monthly_sales'], 'revenue'))) * 100, 1) }}%
                                            </span>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot class="bg-light fw-bold">
                                <tr>
                                    <td class="px-4">Tổng cộng</td>
                                    <td class="px-4 text-center">{{ array_sum(array_column($statistics['monthly_sales'], 'total_products')) }}</td>
                                    <td class="px-4 text-end">{{ number_format(array_sum(array_column($statistics['monthly_sales'], 'revenue'))) }} VNĐ</td>
                                    <td class="px-4 text-end">100%</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Order Stats Section -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card border-0 shadow-sm rounded-lg">
                <div class="card-header bg-white border-0 pt-4 pb-2">
                    <h5 class="mb-0">Thống Kê Đơn Hàng</h5>
                </div>
                <div class="card-body">
                    <div class="row g-4">
                        @foreach($statistics['orders_stats'] as $key => $stat)
                        <div class="col-md-3">
                            <div class="stat-card p-3 rounded-3" style="background-color: {{ $stat['color'] }}15">
                                <h3 class="h2 mb-2">{{ number_format($stat['value']) }}</h3>
                                <p class="mb-0 text-muted">{{ $stat['label'] }}</p>
                                <div class="progress mt-3" style="height: 4px;">
                                    <div class="progress-bar" 
                                         style="width: {{ ($stat['value'] / $statistics['orders_stats']['total']['value']) * 100 }}%; background-color: {{ $stat['color'] }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Tables Section -->
    <div class="row g-4">
        @php
            $tables = [
                ['title' => 'Sản Phẩm Mới Nhất', 'items' => $statistics['newest_products'], 'cols' => ['Giá', 'Ngày tạo'], 'type' => 'newest'],
                ['title' => 'Sản Phẩm Đắt Nhất', 'items' => $statistics['most_expensive'], 'cols' => ['Giá', 'Số lượng'], 'type' => 'expensive'],
            ];
        @endphp

        @foreach($tables as $table)
        <div class="col-lg-6">
            <div class="card border-0 shadow-sm rounded-lg">
                <div class="card-header bg-white border-0 pt-4 pb-2 d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">{{ $table['title'] }}</h5>
                    <button class="btn btn-sm btn-light" onclick="location.reload()">
                        <i class="fas fa-sync-alt"></i>
                    </button>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="bg-light">
                                <tr>
                                    <th class="border-0 px-4">Sản phẩm</th>
                                    @foreach($table['cols'] as $col)
                                        <th class="border-0 text-center px-4">{{ $col }}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($table['items'] as $product)
                                <tr>
                                    <td class="px-4">
                                        <div class="d-flex align-items-center">
                                            <img src="{{ asset('img/' . $product->product_image) }}"
                                                 class="rounded-circle" width="40" height="40"
                                                 onerror="this.src='{{ asset('img/default-product.jpg') }}'">
                                            <div class="ms-3">
                                                <h6 class="mb-0">{{ $product->product_name }}</h6>
                                                <small class="text-muted">ID: #{{ $product->id }}</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center px-4">
                                        <span class="badge bg-success px-2 py-1">
                                            {{ number_format($product->product_price) }} VNĐ
                                        </span>
                                    </td>
                                    <td class="text-center px-4">
                                        @if($table['type'] === 'newest')
                                            {{ \Carbon\Carbon::parse($product->created_at)->format('d/m/Y') }}
                                        @else
                                            {{ $product->product_quantity }}
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<style>
.stats-icon {
    width: 48px;
    height: 48px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.card {
    transition: transform 0.2s;
}

.card:hover {
    transform: translateY(-3px);
}

.progress {
    border-radius: 10px;
    overflow: hidden;
}

.stat-card {
    border: 1px solid rgba(0,0,0,.05);
    transition: transform 0.2s;
}

.stat-card:hover {
    transform: translateY(-3px);
}

.table-responsive::-webkit-scrollbar {
    height: 6px;
}

.table-responsive::-webkit-scrollbar-thumb {
    background: #888;
    border-radius: 3px;
}
</style>
@endsection
