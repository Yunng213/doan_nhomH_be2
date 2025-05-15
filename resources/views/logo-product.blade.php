@extends('category')
@section('content')
@yield('product-category')
<div class="product-breadcroumb">
    <a href="index"></i>Home</a>
    <a href="{{route('logo.product',$data_category->id)}}">{{$data_category->type_name}}</a>
</div>
@foreach($category_product as $data)
<a href="{{route('logo.product',$data->id)}}" style="margin-top: 20px;" class="add_to_cart_button" data-quantity="1" data-product_sku="" data-product_id="70" rel="nofollow" href="/canvas/shop/?add-to-cart=70">{{$data->type_name}}</a>
@endforeach
<div class="single-product-area">
    <div class="container">
        <div class="row">
            @foreach($product as $data)
            <div class="col-md-3 col-sm-6" style="border-radius: 10px;background-color: #fbfbfb;margin-left: 10px; margin-top: 10px; width: 282px;">
                <div class="single-shop-product">
                    <div class="product-upper">
                        <a href="{{route('single.product',$data->id)}}"> <img src="{{asset('img/' . $data->product_image)}}" alt=""></a>
                    </div>
                    <h2><a href="{{route('single.product',$data->id)}}">{{$data->product_name}}</a></h2>
                    <div class="product-carousel-price">
                        {{number_format( $data->product_price,0, ',', '.')}} vnđ
                    </div>
                    <div style="margin-top: 20px;">
                        {{$data->Promotion}}
                    </div>
                </div>
                <div style="margin: 20px;">
                    <i class="fa fa-star" style="color: #FFD43B;"></i>
                    <i class="fa fa-star" style="color: #FFD43B;"></i>
                    <i class="fa fa-star" style="color: #FFD43B;"></i>
                    <i class="fa fa-star" style="color: #FFD43B;"></i>
                    <i class="fa fa-star" style="color: #FFD43B; margin-right: 40px;"></i>
                    Yêu Thích <a href=""><i class="fa fa-heart" style="color: red;"></i></a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div style="text-align: center;">
        {{$product->links()}}
    </div>
</div>
@endsection