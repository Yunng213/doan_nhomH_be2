<?php

namespace App\Helper;
class SoSanh{
    private $items = [];
    public function __construct()
    {

        $this->items = session('sosanh') ? session('sosanh') : [];
    }

    public function getList()
    {
        return $this->items;
    }

    public function sosanh($product)
    {
        $item = [
            'productId' => $product->id,
            'product_name' => $product->product_name,
            'product_price' => $product->product_price,
            'product_image' => $product->product_image,
            'Promotion' => $product->Promotion
        ];
        $this->items[$product->id] = $item;
        session(['sosanh' => $this->items]);
    }

    public function remove($productId)
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