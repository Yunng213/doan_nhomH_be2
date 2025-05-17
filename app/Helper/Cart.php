<?php

namespace App\Helper;

class Cart
{
    private $items = [];
    private $total_quantity = 0;
    private $total_price = 0;

    public function __construct()
    {

        $this->items = session('cart') ? session('cart') : [];
    }

    public function getList()
    {
        return $this->items;
    }

    public function add($product, $quantity = 1)
    {
        $item = [
            'productId' => $product->id,
            'product_name' => $product->product_name,
            'product_price' => $product->product_price,
            'product_image' => $product->product_image,
            'quantity' => $quantity
        ];
        $this->items[$product->id] = $item;
        session(['cart' => $this->items]);
    }

    public function getTotalPrice()
    {
        $totalprice = 0;
        foreach ($this->items as $item) {
            $totalprice += $item['product_price'] * $item['quantity'];
        }
        return $totalprice;
    }
    
    public function getTotalQuantity()
    {
        $totalQuantity = 0;
        foreach ($this->items as $item) {
            $totalQuantity += $item['quantity'];
        }
        return $totalQuantity;
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
}
