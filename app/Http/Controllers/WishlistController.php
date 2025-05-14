<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    // Thêm sản phẩm vào wishlist
    public function add(Request $request, $productId)
{
    if (!Auth::check()) {
        return response()->json(['message' => 'Vui lòng đăng nhập!'], 401);
    }

    $wishlist = Wishlist::where('user_id', Auth::id())->where('product_id', $productId)->first();
    if (!$wishlist) {
        Wishlist::create([
            'user_id' => Auth::id(),
            'product_id' => $productId,
        ]);
        
        return response()->json(['message' => 'Đã thêm vào danh sách yêu thích!']);
    }
    return response()->json(['message' => 'Sản phẩm đã có trong danh sách yêu thích!']);
}

    // Hiển thị danh sách yêu thích
    public function index()
{
    if (!Auth::check()) {
        return redirect()->route('login')->with('error', 'Vui lòng đăng nhập để xem danh sách yêu thích!');
    }

    $userId = Auth::id();
    $wishlistItems = Wishlist::where('user_id', $userId)
                         ->with(['product' => function ($query) {
                             $query->select('id', 'product_name', 'product_image', 'product_price');
                         }])
                         ->get();
                        dd($wishlistItems);
    return view('wishlist', compact('wishlistItems'));
}
    // (Tùy chọn) Xóa sản phẩm khỏi wishlist
    public function remove($productId)
    {
        if (!Auth::check()) {
            return response()->json(['message' => 'Vui lòng đăng nhập trước!'], 401);
        }

        $userId = Auth::id();
        Wishlist::where('user_id', $userId)->where('product_id', $productId)->delete();

        return response()->json(['message' => 'Đã xóa sản phẩm khỏi danh sách yêu thích!']);
    }
}