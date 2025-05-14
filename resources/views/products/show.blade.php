@extends('layouts.app_admin')

@section('title', 'Show Product')

@section('contents')
<h1 class="mb-0">Detail Product</h1>
<hr />
<div class="row">
        
    <div class="col-2 mb-3">
        <label class="form-label">Hình ảnh sản phẩm</label>
        <img src="{{asset('img/' . $product->product_image)}}" alt="" width="150px" height="150px">
    </div>
    <div class="col mb-3">
        <label class="form-label">Tên sản phẩm</label>
        <input type="text" name="title" class="form-control" placeholder="Title" value="{{ $product->product_name }}"
            readonly>
    </div>
    <div class="col mb-3">
        <label class="form-label">Số lượng</label>
        <input type="text" name="price" class="form-control" placeholder="Price"
            value="{{ $product->product_quantity }}" readonly>
    </div>
</div>
<div class="row">
    <div class="col mb-3">
        <label class="form-label">Giá sản phẩm</label>
        <input type="text" name="product_code" class="form-control" placeholder="Product Code"
            value="{{ $product->product_price }}" readonly>
    </div>
    <div class="col mb-3">
        <label class="form-label">Chi tiết sản phẩm</label>
        <textarea class="form-control" name="description" placeholder="Descriptoin"
            readonly>{{ $product->product_detail }}</textarea>
    </div>
</div>

<div class="row">
    <div class="col mb-3">
        <label class="form-label">Mã sản phẩm</label>
        <input type="text" name="product_code" class="form-control" placeholder="Product Code"
            value="{{ $product->product_type }}" readonly>
    </div>
    <div class="col mb-3">
        <label class="form-label">Mã </label>
        <input type="text" name="product_code" class="form-control" placeholder="Product Code"
            value="{{ $product->type_name}}" readonly>
    </div>
    <div class="col mb-3">
        <label class="form-label">Mã logo</label>
        <input type="text" name="product_code" class="form-control" placeholder="Product Code"
            value="{{ $product->type_logo }}" readonly>
    </div>
</div>
<div class="row">
    <div class="col mb-3">
        <label class="form-label">Created At</label>
        <input type="text" name="created_at" class="form-control" placeholder="Created At"
            value="{{ $product->created_at }}" readonly>
    </div>
    <div class="col mb-3">
        <label class="form-label">Updated At</label>
        <input type="text" name="updated_at" class="form-control" placeholder="Updated At"
            value="{{ $product->updated_at }}" readonly>
    </div>
</div>
@endsection