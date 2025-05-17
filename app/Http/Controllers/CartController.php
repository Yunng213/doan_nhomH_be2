<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helper\Cart;
use App\Models\Category;
use App\Models\Latestproduct;
use App\Models\Product;

class CartController extends Controller
{

    public function listproduct(Cart $cart, Product $product)
    {
        $cartItems = $cart->getList();
        $product_cart = Product::paginate(5);
        $data_category = Category::paginate(3);
        return view('cart', compact('cart', 'product_cart', 'data_category', 'product', 'cartItems'));
    }


    public function add(Request $request, Cart $cart)
    {
        $product = Product::find($request->id);
        $quantity = $request->quantity;
        $cart->add($product, $quantity);
        return redirect()->route('cart.product', 'listproduct');
    }

    public function remove($productId)
    {
        $cart = session('cart', []);

        if (array_key_exists($productId, $cart)) {
            unset($cart[$productId]);
            session(['cart' => $cart]);

            return redirect()->back()->with('message', 'Sản phẩm đã được xóa khỏi giỏ hàng');
        }

        return redirect()->back()->with('error', 'Sản phẩm không tồn tại trong giỏ hàng');
    }

    public function showCart()
    {
        $cart = session('cart', []);
        return view('cart', ['cart' => $cart]);
    }
}
