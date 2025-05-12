@extends('app')
@section('content')
<div class="product-breadcroumb">
    <a href="index">Home</a>
    <a href="cart">Cart</a>
</div>
<div class="product-big-title-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-bit-title text-center">
                    <h2>Giỏ Hàng</h2>
                </div>
            </div>
        </div>
    </div>
</div> <!-- End Page title area -->


<div class="single-product-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="single-sidebar">
                    <h2 class="sidebar-title">Tìm Kiếm</h2>
                    <form role="timkiem" action="{{ route('timkiem.product', 'searchproduct') }}" method="get">
                        <input type="text" placeholder="Tìm Kiếm Sản Phẩm..." name="key">
                        <button style="border-radius: 10px;" type="submit">Tìm Kiếm</button>
                    </form>
                </div>

                <div class="single-sidebar">
                    <h2 class="sidebar-title">Sản Phẩm Mới</h2>
                    @foreach($product_cart as $data )
                    <div class="thubmnail-recent">
                        <a href="{{route('single.product',$data->id)}}"><img src="{{asset('img/' . $data->product_image)}}" class="recent-thumb" alt=""></a>
                        <h2><a href="{{route('single.product',$data->id)}}">{{$data->product_name}}</a></h2>
                        <div class="product-sidebar-price">
                            {{number_format( $data->product_price,0, ',', '.')}} vnđ
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="col-md-8">
                <div class="product-content-right">
                    <div class="woocommerce">
                        <form method="post" action="#">
                            <table cellspacing="0" class="shop_table cart">
                                <thead>
                                    <tr>
                                        <th class="product-remove">&nbsp;</th>
                                        <th class="product-thumbnail">&nbsp;</th>
                                        <th class="product-name">Tên Sản Phẩm</th>
                                        <th class="product-price">Giá</th>
                                        <th class="product-quantity">Số Lượng</th>
                                        <th class="product-subtotal">Tổng Tiền</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($cartItems as $key => $value)
                                    <tr class="cart_item">
                                        <td class="product-remove">
                                            <a href="{{ route('cart.remove', ['productId' => $value['productId']]) }}" onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?');" type="submit" title="Remove this item">×</a>
                                        </td>

                                        <td class="product-thumbnail">
                                            <a href="{{route('single.product','product')}}"><img width="145" height="145" alt="poster_1_up" class="shop_thumbnail" src="{{asset('img')}}/{{$value['product_image']}}"></a>
                                        </td>

                                        <td class="product-name">
                                            <a href="{{route('single.product','product')}}">{{$value['product_name']}}</a>
                                        </td>

                                        <td class="product-price">
                                            <span class="amount">{{number_format( $value['product_price'],0, ',', '.')}} vnđ</span>
                                        </td>

                                        <td class="product-quantity">
                                            <div class="quantity buttons_added">
                                                <input id="quantityInput" style="text-align: center;" type="number" class="input-text qty text" title="Qty" value="{{$value['quantity']}}" min="0" step="1">
                                            </div>
                                        </td>

                                        <td class="product-subtotal">
                                            <span class="amount">{{number_format( $value['product_price'] * $value['quantity'],0, ',', '.')}} vnđ</span>
                                        </td>
                                    </tr>
                                    <script>
                                        document.getElementById('quantityInput').addEventListener('input', function() {
                                            var quantity = parseInt(this.value);
                                            var price = parseFloat("{{$value['product_price']}}");
                                            var subtotal = quantity * price;
                                            document.getElementById('subtotal').textContent = formatCurrency(subtotal);
                                        });

                                        function formatCurrency(amount) {
                                            return amount.toFixed(0).replace(/\d(?=(\d{3})+$)/g, '$&,');
                                        }
                                    </script>
                                    @endforeach
                                    <tr>
                                        @if (count($cartItems) > 0)
                                        <td colspan="6">
                                            <h4 style=" margin-bottom: -15px; margin-top: 10px;">Tổng tiền thanh toán ({{count($cartItems)}} sản phẩm): {{number_format($cart->getTotalPrice() ,0, ',', '.')}} vnđ</h4>
                                            <a href="{{ route('checkout','checkout') }}" style="border-radius: 10px; margin-right: -600px; margin-top: -600px;" type="submit" class="add_to_cart_button">Thanh Toán</a>
                                        </td>
                                        @else
                                        <td colspan="6">
                                            <h4 style=" margin-bottom: -15px; margin-top: 10px;">Tổng tiền thanh toán ({{count($cartItems)}} sản phẩm): {{number_format($cart->getTotalPrice() ,0, ',', '.')}} vnđ</h4>
                                            <a onclick="return confirm('Chưa có sản phẩm nào trong giỏ hàng!');" style="border-radius: 10px; margin-right: -580px;margin-top: -50px;" type="submit" class="add_to_cart_button">Thanh Toán</a>
                                        </td>
                                        @endif
                                        
                                    </tr>
                                </tbody>
                            </table>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection