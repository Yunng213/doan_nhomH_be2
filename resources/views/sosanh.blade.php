@extends('app')
@section('content')
<div class="product-breadcroumb">
    <a href="index">Home</a>
    <a href="cart">SoSanh</a>
</div>
<div class="product-big-title-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-bit-title text-center">
                    <h2>So Sánh</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="single-product-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
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
                                        <th class="product-name">Ưu Đãi Đi Kèm</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($sosanhItems as $key => $value)
                                    <tr class="cart_item">
                                        <td class="product-remove">
                                            <a href="{{ route('sosanh.remove', ['productId' => $value['productId']]) }}" type="submit" title="Remove this item">×</a>
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

                                        <td class="product-name">
                                            <h4>{{$value['Promotion']}}</h4>
                                        </td>
                                    </tr>
                                    @endforeach
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