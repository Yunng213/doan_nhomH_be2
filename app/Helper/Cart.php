<?php

namespace App\Helper;

class Cart
{
    private $items = [];

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
        if (array_key_exists($productId, $this->items)) {
            unset($this->items[$productId]);
            session(['cart' => $this->items]);
            return true;
        }
        return false;
    }
}
