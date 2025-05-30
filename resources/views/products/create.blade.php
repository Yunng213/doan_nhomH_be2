@extends('layouts.app_admin')

@section('title', 'Create Product')

@section('contents')
<h1 class="mb-0">Add Product</h1>
<hr />
@if(Session::has('error'))
    <div class="alert alert-danger" role="alert">
        {{ Session::get('error') }}
    </div>
@endif
<form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row mb-3">
        <div class="col">
            <input type="text" name="product_name" class="form-control" placeholder="Tên sản phẩm" value="{{ old('product_name') }}">
            @error('product_name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col">
            <input type="text" name="product_quantity" class="form-control" placeholder="Số lượng" value="{{ old('product_quantity') }}">
            @error('product_quantity')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="row mb-3">
        <div class="col">
            <input type="text" name="product_price" class="form-control" placeholder="Giá sản phẩm" value="{{ old('product_price') }}">
            @error('product_price')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col">
            <textarea class="form-control" name="product_detail" placeholder="Chi tiết sản phẩm">{{ old('product_detail') }}</textarea>
            @error('product_detail')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-4">
            <input type="text" name="product_type" class="form-control" placeholder="Mã sản phẩm" value="{{ old('product_type') }}">
            @error('product_type')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-4">
            <input type="text" name="type_name" class="form-control" placeholder="Mã" value="{{ old('type_name') }}">
            @error('type_name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-4">
            <input type="text" name="type_logo" class="form-control" placeholder="Mã logo" value="{{ old('type_logo') }}">
            @error('type_logo')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
     <div class="row mb-3 ">
     <div class="col-4 align-items-center">
            <input type="text" name="Promotion" class="form-control" placeholder="Thêm ưu đãi" value="{{ old('Promotion') }}">
            @error('Promotion')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
     </div>
<!-- 
    <div class="row mb-3">
        <div class="col">
            <input type="file" 
                   id="fileInput" 
                   name="product_image" 
                   accept="image/jpeg,image/png,image/jpg,image/gif,image/svg+xml"
                   style="opacity: 0;">
            <label for="fileInput" class="button" style="background: #0450d5;
                    color: white;
                    line-height: 1.2;
                    padding: 10px;
                    border-radius: 4px;
                    position: absolute;
                    left:10px;
                    margin-bottom: 10px;
                    cursor: pointer;">
                Upload Image
            </label>
            @error('product_image')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col">
            <img id="previewImage" 
                 src="#" 
                 alt="Hình ảnh xem trước" 
                 style="display: none; max-width: 200px; max-height: 200px; object-fit: contain;">
        </div>
    </div> -->
    {{-- Product Image --}}
    <div class="mb-3">
            <label for="product_image" class="form-label">Product photo</label>
            <input id="product_image" type="file" name="product_image" class="form-control" required>
            @error('product_image')
                <div class="text-danger small mt-1">{{ $message }}</div>
            @enderror
        </div>

    <div class="row">
        <div class="d-grid">
            <button type="submit" class="btn btn-primary">Submit</button>
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
        // Kiểm tra định dạng file
        var allowedTypes = ['image/jpeg', 'image/png', 'image/jpg', 'image/gif', 'image/svg+xml'];
        if (!allowedTypes.includes(file.type)) {
            alert('Chỉ chấp nhận file hình ảnh có định dạng: JPEG, PNG, JPG, GIF, SVG');
            this.value = '';
            return;
        }

        // Kiểm tra kích thước file (max 2MB)
        if (file.size > 2 * 1024 * 1024) {
            alert('Kích thước file không được vượt quá 2MB');
            this.value = '';
            return;
        }

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