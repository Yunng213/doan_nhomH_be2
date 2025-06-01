<?php

namespace App\Http\Controllers;

use App\Helper\Cart;
use App\Models\Categori;
use App\Models\Category;
use App\Models\Product;
use App\Models\TopSeller;
use App\Models\NhanVien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    // Lấy dữ liệu chung cho sản phẩm, danh mục,...
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

    // Trang chính điều hướng theo $page
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

            case 'admin_product':
                return view('admin_product.index', $data);

            case 'users':
                $users = \App\Models\User::all();
                return view('users.index', compact('users'));

            case 'nhanvien':
                $nhanviens = NhanVien::all();
                return view('nhanvien.index', compact('nhanviens'));

            default:
                break;
        }

        return view($page, $data);
    }

    // Chi tiết sản phẩm
    public function product(Product $product)
    {
        $product_cart = Product::paginate(5);
        $data_category = Categori::all();
        return view('single-product', compact('product', 'data_category', 'product_cart'));
    }
    public function topselersproducts(TopSeller $topselersproducts)
    {
        $product_cart = Product::paginate(5);
        $data_category = Categori::all();
        $data_topselersproducts = TopSeller::all();
        return view('topsellers-product', compact('topselersproducts', 'data_category', 'product_cart'));
    }

    // Sản phẩm theo danh mục
    public function categoryproducts($categoryproducts)
    {
        $product_cart = Product::paginate(5);
        $category_product = Category::all();
        $category = Categori::all();
        $data_category = Category::where('id', $categoryproducts)->first();
        $product = Product::where('product_type', $data_category->id)->paginate(8);
        return view('category-product', compact('product', 'data_category', 'category', 'product_cart', 'category_product'));
    }

    // Các chức năng lọc sắp xếp sản phẩm (theo giá)
    public function locsanpham(Request $request)
    {
        $sortOrder = $request->query('sort', 'asc');
        $products = Product::orderBy('product_price', $sortOrder)->paginate(8);
        return view('products.arrange', ['products' => $products]);
    }

    public function locsanphamtimkiem(Request $request)
    {
        $sortOrder = $request->query('sort', 'asc');
        $products = Product::orderBy('product_price', $sortOrder)->paginate(8);
        return view('search.arrange', ['products' => $products]);
    }

    // Hiển thị profile
    protected function showProfile()
    {
        $user = Auth::user();
        return view('profile.edit', compact('user'));
    }

    // Tìm kiếm sản phẩm
    public function searchproduct(Request $req)
    {
        $data_category = Categori::all();
        $product_timkiem = Product::where('product_name', 'like', '%' . $req->key . '%')
            ->orWhere('product_price', $req->key)
            ->get();
        return view('search-product', compact('product_timkiem', 'data_category'));
    }

    // Thanh toán
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

    /*
     * ==========================
     * PHẦN QUẢN LÝ NHÂN VIÊN
     * ==========================
     */

    // Trang thêm nhân viên
    public function nhanvien_create()
    {
        return view('nhanvien.create');
    }

    // Lưu nhân viên mới
    public function nhanvien_store(Request $request)
    {
        $request->validate([
            'TenNV' => 'required|string|max:255',
            'ChucVu' => 'required|string|max:255',
            'NgayNhanViec' => 'required|date',
        ]);

        NhanVien::create($request->all());

        return redirect()->route('nhanvien.index')->with('success', 'Thêm nhân viên thành công!');
    }

    // Trang sửa nhân viên
    public function nhanvien_edit($id)
    {
        $nhanvien = NhanVien::findOrFail($id);
        return view('nhanvien.edit', compact('nhanvien'));
    }

    // Cập nhật nhân viên
    public function nhanvien_update(Request $request, $id)
    {
        $request->validate([
            'TenNV' => 'required|string|max:255',
            'ChucVu' => 'required|string|max:255',
            'NgayNhanViec' => 'required|date',
        ]);

        $nhanvien = NhanVien::findOrFail($id);
        $nhanvien->update($request->all());

        return redirect()->route('nhanvien.index')->with('success', 'Cập nhật nhân viên thành công!');
    }

    // Xóa nhân viên
    public function nhanvien_destroy($id)
    {
        NhanVien::destroy($id);
        return redirect()->route('nhanvien.index')->with('success', 'Xóa nhân viên thành công!');
    }
}
