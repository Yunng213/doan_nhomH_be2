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
        // $valid  = $request->validate([
        //     'product_name' => 'required|string|max:255',
        //     'product_type' => 'required|string|max:255',
        //     'product_quantity' => 'required|int',
        //     'product_price' => 'required|string|max:255',
        //     'product_detail' =>  'required|string|max:1000',
        //     'product_image' => 'required|string|max:255',
        //     'type_name'=>'required|string|max:255',
        //     'type_logo'=>'required|string|max:255'
        // ]);
      
   
        //  Product::create([
        //     'product_name' => $valid['product_name'],
        //     'product_type' => $valid['product_type'],
        //     'product_quantity' => $valid['product_quantity'],
        //     'product_price' => $valid['product_price'],
        //     'product_detail' => $valid['product_detail'],
        //     'product_image' => $valid['product_image'],
        //     'type_name'=>$valid['type_name'],
        //     'type_logo'=>$valid['type_logo']
        // ]);

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
        $product = Product::findOrFail($id);
        return view('products.show',compact('product'));
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
        $product = Product::findOrFail($id);
        $product->update($request->all());
        return redirect()->route('products')->with('success','Update thành cônggg');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('products')->with('success','Xóa thành cônggg');
    }
}
