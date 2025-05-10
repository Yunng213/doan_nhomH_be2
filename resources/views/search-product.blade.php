@extends('category-timkiem')
@section('content')
<div class="product-breadcroumb">
    <a href="index"></i>Home</a>
</div>
<h2 style="text-align: center;">Kết quả tìm kiếm</h2>
<h3>Tìm thấy {{count($product_timkiem)}} sản phẩm</h3>
<div class="row">
    <div class="col-md-4">
        <label for="">Sắp Xếp Theo</label>
        <form action="">
            @csrf
            <select name="sort" id="sort">
                <option value="">--Lọc--</option>
                <option value="">Sắp xếp theo tên A - Z</option>
                <option value="">Sắp xếp theo tên Z - A</option>
            </select>
        </form>
    </div>
</div>
<div class="single-product-area">
    <div class="container">
        <div class="row">
            @foreach($product_timkiem as $data)
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
</div>
@endsection