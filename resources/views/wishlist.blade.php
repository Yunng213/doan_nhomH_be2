@extends('home')

@section('content-index')
<div class="container">
    <h1 class="text-center">Danh sách yêu thích</h1>
    @if(!isset($wishlistItems) || $wishlistItems->isEmpty())
        <p class="text-center">Chưa có sản phẩm nào trong danh sách yêu thích.</p>
    @else
        <div class="row">
            @foreach($wishlistItems as $item)
            
            <div class="col-sm-4">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
                            <img src="{{ asset('img/' . $item->product->product_image) }}" alt="{{ $item->product->product_name }}" style="height: 200px; object-fit: contain;" />
                            <h2>{{ $item->product->product_name }}</h2>
                            <p>{{ number_format($item->product->product_price, 0, ',', '.') }} VNĐ</p>
                            <button class="remove-wishlist-btn btn btn-default" data-product-id="{{ $item->product_id }}">Xóa</button>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    @endif
</div>

<style>
    .remove-wishlist-btn {
        background-color: #ff4444;
        color: white;
        border: none;
        padding: 10px 20px;
        margin: 5px;
        border-radius: 5px;
        cursor: pointer;
    }
    .remove-wishlist-btn:hover {
        background-color: #cc0000;
    }
</style>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('.remove-wishlist-btn').on('click', function(e) {
            e.preventDefault();
            var productId = $(this).data('product-id');
            $.ajax({
                url: '{{ route('wishlist.remove', ['productId' => ':id']) }}'.replace(':id', productId),
                type: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    alert(response.message);
                    location.reload();
                },
                error: function(xhr) {
                    alert(xhr.responseJSON.message || 'Đã xảy ra lỗi!');
                }
            });
        });
    });
</script>
@endsection