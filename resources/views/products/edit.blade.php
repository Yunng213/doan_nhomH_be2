
@extends('layouts.app_admin')

@section('contents')
<h1 class="mb-0">Edit Product</h1>
<hr />
@if(Session::has('error'))
    <div class="alert alert-danger" role="alert">
        {{ Session::get('error') }}
    </div>
@endif
<form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
   
    <input type="hidden" name="updated_at" value="{{ $product->updated_at }}">

    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Tên sản phẩm</label>
            <input type="text" name="product_name" class="form-control" placeholder="Tên sản phẩm"
                value="{{ old('product_name', $product->product_name) }}">
            @error('product_name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col mb-3">
            <label class="form-label">Số lượng</label>
            <input type="text" name="product_quantity" class="form-control" placeholder="Số lượng"
                value="{{ old('product_quantity', $product->product_quantity) }}">
            @error('product_quantity')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col mb-3">
            <label class="form-label">Giá sản phẩm</label>
            <input type="text" name="product_price" class="form-control" placeholder="Giá sản phẩm"
                value="{{ old('product_price', $product->product_price) }}">
            @error('product_price')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Chi tiết sản phẩm</label>
            <textarea class="form-control" name="product_detail" placeholder="Chi tiết sản phẩm">{{ old('product_detail', $product->product_detail) }}</textarea>
            @error('product_detail')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="row">
        <div class="col-2 mb-3">
            <label class="form-label">Hình ảnh sản phẩm</label>
            <img src="{{ asset('img/' . $product->product_image) }}" alt="Hình ảnh sản phẩm" width="160px" height="160px" id="previewImage">
        </div>
        <div class="col mb-3">
            <input type="file" id="fileInput" style="opacity: 0;" name="product_image">
            <label for="file" class="button" onclick="chooseFile()" style="background: #0450d5;
             color: white;
             line-height: 1.2;
             padding: 10px;
             border-radius: 4px;
             position: absolute;
             left:10px;
             top:50%;
             margin-bottom: 10px;
             cursor: pointer;">
                Upload Image
            </label>
            @error('product_image')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="row">
        <div class="d-grid">
            <button class="btn btn-warning">Update</button>
        </div>
    </div>
</form>

<script>
function chooseFile() {
    document.getElementById('fileInput').click();
}

document.getElementById('fileInput').addEventListener('change', function() {
    var file = this.files[0];
    if (file) {
        var reader = new FileReader();
        reader.onload = function(event) {
            var imgElement = document.getElementById('previewImage');
            imgElement.src = event.target.result;
            imgElement.style.display = 'block';
        };
        reader.readAsDataURL(file);
    }
});
</script>
@endsection