
<link rel="stylesheet" href="style.css">
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Đơn hàng đã đặt') }}
        </h2>
    </x-slot>

    <div class="single-product-area">
        <div class="container">
            <div class="col-md-8">
                <div class="product-content-right">
                    <div class="woocommerce">
                        <form method="post" action="#">
                            <table cellspacing="0" class="shop_table cart">
                                <thead>
                                    <tr>
                                        <th class="product-name">Tên Sản Phẩm</th>
                                        <th class="product-quantity">Số Lượng</th>
                                        <th class="product-price">Giá</th>
                                        <th class="product-subtotal">Tổng Tiền</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="cart_item">
                                        <td class="product-name">
                                            <a href=""></a>
                                        </td>

                                        <td class="product-price">
                                            <span class="amount"></span>
                                        </td>

                                        <td class="product-quantity">
                                            
                                        </td>

                                        <td class="product-subtotal">
                                            <span class="amount"></span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>