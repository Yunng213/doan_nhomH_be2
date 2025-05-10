<?php

namespace App\Http\Controllers;

use App\Helper\Cart;
use App\Helper\SoSanh;
use App\Models\Categori;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class SoSanhControlle extends Controller
{
    public function listproduct(SoSanh $soSanh, Product $product)
    {
        $sosanhItems = $soSanh->getList();
        $product_cart = Product::paginate(5);
        $data_category = Categori::all();
        return view('sosanh', compact('soSanh', 'product_cart', 'data_category', 'product', 'sosanhItems'));
    }


    public function sosanh(Request $request, SoSanh $soSanh)
    {
        $product = Product::find($request->id);
        $soSanh->sosanh($product);
        return redirect()->route('sosanh.product', 'listproduct');
    }

    public function removesosanh($productId)
    {
        $sosanh = session('sosanh', []);

        if (array_key_exists($productId, $sosanh)) {
            unset($sosanh[$productId]);
            session(['sosanh' => $sosanh]);

            return redirect()->back()->with('message', 'Sản phẩm đã được xóa khỏi so sánh');
        }

        return redirect()->back()->with('error', 'Sản phẩm không tồn tại');
    }
}
