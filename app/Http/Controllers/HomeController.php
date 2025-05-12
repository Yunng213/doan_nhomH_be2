<?php

namespace App\Http\Controllers;

use App\Helper\Cart;
use App\Models\Categori;
use App\Models\Category;
use App\Models\Latestproduct;
use App\Models\Product;
use App\Models\TopSale;
use App\Models\TopSeller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{

    public static function getProductData()
    {
        $product = Product::paginate(8);
        $data_product_admin = Product::all();
        $product_cart = Product::paginate(5);
        $data_product = Product::paginate(3);
        $data_category = Categori::all();
        $category = Category::all();
        $topseller = TopSeller::paginate(3);
        return compact('product', 'data_category', 'data_product', 'product_cart', 'category', 'topseller', 'data_product_admin');
    }


    public function index($page = "index")
    {


        $data = self::getProductData();
        switch ($page) {
            case 'login':
                return view('auth.login');
            case 'forgot-password':
                return view('auth.forgot-password');
            case 'register':
                return view('auth.register');

            case 'profile':
                return $this->showProfile();
            case 'products':
                $product = Product::orderBy('created_at', 'DESC')->get();
                return view('products.index')->with('product', $product);
            case 'profile_admin':
                return view('layouts.profile_admin');

            case 'profile':
                return $this->showProfile();
            case 'admin_product':
                return view('admin_product.index', $data);

            default:

                break;
        }
        return view($page, $data);
    }

    public function product(Product $product)
    {
        $product_cart = Product::paginate(5);
        $data_category = Categori::all();
        return view('single-product', compact('product', 'data_category', 'product_cart'));
    }

    public function categoryproducts($categoryproducts)
    {
        $product_cart = Product::paginate(5);
        $category_product = Category::all();
        $category = Categori::all();
        $data_category = Category::where('id', $categoryproducts)->first();
        $product = Product::where('product_type', $data_category->id)->paginate(8);
        return view('category-product', compact('product', 'data_category', 'category', 'product_cart', 'category_product'));
    }

    public function productcategory($categoryproducts)
    {
        $category = Categori::all();
        $category_product = Category::all();
        $data_category = Category::where('type_id', $categoryproducts)->first();
        $product = Product::where('type_name', $data_category->type_id)->paginate(8);
        return view('product-category', compact('category_product', 'product', 'data_category', 'category'));
    }
    public function logoproduct($categoryproducts)
    {
        $category = Categori::all();
        $category_product = Category::all();
        $data_category = Category::where('type_idlogo', $categoryproducts)->first();
        $product = Product::where('type_logo', $data_category->type_id)->paginate(8);
        return view('logo-product', compact('product', 'data_category', 'category', 'category_product'));
    }

    public function topselersproducts(TopSeller $topselersproducts)
    {
        $product_cart = Product::paginate(5);
        $data_category = Categori::all();
        $data_topselersproducts = TopSeller::all();
        return view('topsellers-product', compact('topselersproducts', 'data_category', 'product_cart'));
    }

    protected function showProfile()
    {
        $user = Auth::user();
        return view('profile.edit', compact('user'));
    }


    public function searchproduct(Request $req)
    {
        $data_category = Categori::all();
        $product_timkiem = Product::where('product_name', 'like', '%' . $req->key . '%')
            ->orWhere('product_price', $req->key)
            ->get();
        return view('search-product', compact('product_timkiem', 'data_category'));
    }
    public function checkout(Cart $cart)
    {
        $data_category = Categori::all();
        $cartItems = $cart->getList();
        $totalQuantity = $cart->getTotalQuantity();
        $totalPrice = $cart->getTotalPrice();

        return view('pay', [
            'cartItems' => $cartItems,
            'totalQuantity' => $totalQuantity,
            'totalPrice' => $totalPrice
        ], compact('data_category'));
    }

    public function locsanpham(Request $request)
    {
        $sortOrder = $request->query('sort', 'asc');
        $products = Product::orderBy('product_name', $sortOrder)->paginate(8);
        return view('products.arrange', ['products' => $products]);
    }

    public function locsanphamtimkiem(Request $request)
    {
        $sortOrder = $request->query('sort', 'asc');
        $products = Product::orderBy('product_name', $sortOrder)->paginate(8);

        return view('search.arrange', ['products' => $products]);
    }

}
