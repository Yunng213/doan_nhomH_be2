<?php

namespace App\Http\Controllers;

use App\Models\DonDaDatSession;
use Illuminate\Http\Request;

class DonDaDatController extends Controller
{
    public function storeProductInfo(Request $request)
    {

        $productName = $request->input('product_name');
        $quantity = $request->input('quantity');
        $price = $request->input('price');

        $total = $quantity * $price;

        DonDaDatSession::create([
            'product_name' => $productName,
            'quantity' => $quantity,
            'price' => $price,
            'total' => $total,
        ]);

        return response()->json(['message' => 'Thông tin sản phẩm đã được lưu'], 201);
    }
    public function showProducts()
    {
        $products = DonDaDatSession::all();

        return view('dashboard', ['products' => $products]);
    }
}
