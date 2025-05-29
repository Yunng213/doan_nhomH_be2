<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::orderBy('created_at','DESC')->get();
        return view('products.index')->with('product',$product);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_name' => 'required|string|max:255|regex:/^[\pL\s\-]+$/u|not_regex:/^\s*$/',
            'product_quantity' => 'required|integer|min:1|max:10000',
            'product_price' => 'required|numeric|min:1000000|max:90000000',
            'product_detail' => 'required|string|max:1200|not_regex:/^\s*$/',
            'product_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ], [
            'product_name.required' => 'Tên sản phẩm là bắt buộc.',
            'product_name.regex' => 'Tên sản phẩm chỉ được chứa chữ cái, khoảng trắng và dấu gạch ngang.',
            'product_name.not_regex' => 'Tên sản phẩm không được chỉ chứa khoảng trắng.',
            'product_name.max' => 'Tên sản phẩm không được vượt quá 255 ký tự.',
            'product_quantity.required' => 'Số lượng là bắt buộc.',
            'product_quantity.integer' => 'Số lượng phải là số nguyên.',
            'product_price.required' => 'Giá sản phẩm là bắt buộc.',
            'product_price.numeric' => 'Giá sản phẩm phải là số.',
            'product_detail.required' => 'Chi tiết sản phẩm là bắt buộc.',
            'product_detail.not_regex' => 'Chi tiết sản phẩm không được chỉ chứa khoảng trắng.',
            'product_detail.max' => 'Chi tiết sản phẩm không được vượt quá 1200 ký tự.',
            'product_image.image' => 'Hình ảnh phải là file ảnh.',
            'product_image.mimes' => 'Hình ảnh phải có định dạng jpeg, png, jpg, svg hoặc gif.',
            'product_image.max' => 'Hình ảnh không được vượt quá 2MB.',
        ]);

        Product::create($request->all());
        // return redirect('products.index')->with('success','Thêm sản phẩm thành côngg!!!');
        return redirect()->route('products')->with('success','Thêm sản phẩm thành côngg!!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         // Tìm sản phẩm theo ID
    $product = Product::find($id);

    
    if (!$product) {
        return view('errors.product-not-found');
    }

    // Trả về view với dữ liệu sản phẩm
    return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('products.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'product_name' => 'required|string|max:255|regex:/^[\pL\pN\s\-]+$/u|not_regex:/^\s*$/',
            'product_quantity' => 'required|integer|min:1|max:10000',
            'product_price' => 'required|numeric|min:1000000|max:90000000',
            'product_detail' => 'required|string|max:1200|not_regex:/^\s*$/',
            'product_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ], [
            'product_name.required' => 'Tên sản phẩm là bắt buộc.',
            'product_name.regex' => 'Tên sản phẩm chỉ được chứa chữ cái, khoảng trắng.',
            'product_name.not_regex' => 'Tên sản phẩm không được chỉ chứa khoảng trắng.',
            'product_name.max' => 'Tên sản phẩm không được vượt quá 255 ký tự.',
            'product_quantity.required' => 'Số lượng là bắt buộc.',
            'product_quantity.integer' => 'Số lượng phải là số nguyên.',
            'product_price.required' => 'Giá sản phẩm là bắt buộc.',
            'product_price.numeric' => 'Giá sản phẩm phải là số.',
            'product_detail.required' => 'Chi tiết sản phẩm là bắt buộc.',
            'product_detail.not_regex' => 'Chi tiết sản phẩm không được chỉ chứa khoảng trắng.',
            'product_detail.max' => 'Chi tiết sản phẩm không được vượt quá 1200 ký tự.',
            'product_image.image' => 'Hình ảnh phải là file ảnh.',
            'product_image.mimes' => 'Hình ảnh phải có định dạng jpeg, png, jpg, hoặc gif.',
            'product_image.max' => 'Hình ảnh không được vượt quá 2MB.',
        ]);
        $product = Product::find($id);

  
    if (!$product) {
        return redirect()->route('products')->with('error', 'Sản phẩm không tồn tại.');
    }


    if ($product->updated_at != $request->input('updated_at')) {
        return redirect()->route('products.edit', $id)->with('error', 'Dữ liệu đã thay đổi. Vui lòng tải lại trang trước khi cập nhật.');
    }


    $product->update($request->all());

    return redirect()->route('products')->with('success', 'Cập nhật sản phẩm thành công.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         // Kiểm tra xem sản phẩm có tồn tại không
    $product = Product::find($id);

    if (!$product) {
        // Nếu sản phẩm không tồn tại, trả về thông báo lỗi
        return redirect()->route('products')->with('error', 'Sản phẩm không tồn tại hoặc đã bị xóa.');
    }

    // Nếu sản phẩm tồn tại, thực hiện xóa
    $product->delete();

    // Trả về thông báo thành công
    return redirect()->route('products')->with('success', 'Xóa sản phẩm thành công.');
    }
}
