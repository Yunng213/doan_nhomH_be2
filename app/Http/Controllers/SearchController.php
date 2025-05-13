<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function autocomplete(Request $request)
    {
        $query = $request->input('query');
        $products = Product::where('product_name', 'LIKE', "%{$query}%")
            ->take(5) // Giới hạn 5 sản phẩm gợi ý
            ->get(['id', 'product_name', 'product_price', 'product_image']);
        
        return response()->json($products);
    }
}
