<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        $data_category = Category::all();
        return view('products.index', compact('products', 'data_category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_name' => 'required|string|max:255',
            'product_quantity' => 'required|integer|min:1|max:10000',
            'product_price' => 'required|numeric|min:1000000|max:90000000',
            'product_detail' => 'required|string|max:1200|not_regex:/^\s*$/',
            'product_image' => 'nullable|image',
        ], [
            'product_name.required' => 'Tên sản phẩm là bắt buộc.',
            'product_name.regex' => 'Tên sản phẩm chỉ được chứa chữ cái, khoảng trắng và dấu gạch ngang.',
            'product_name.not_regex' => 'Tên sản phẩm không được chỉ chứa khoảng trắng.',
            'product_name.max' => 'Tên sản phẩm không được vượt quá 255 ký tự.',
            'product_quantity.required' => 'Số lượng là bắt buộc.',
            'product_quantity.integer' => 'Số lượng phải là số nguyên.',
            'product_price.required' => 'Giá sản phẩm là bắt buộc.',
            'product_price.numeric' => 'Giá sản phẩm phải là số.',
            'product_detail.required' => 'Chi tiết sản phẩm là bắt buộc.',
            'product_detail.not_regex' => 'Chi tiết sản phẩm không được chỉ chứa khoảng trắng.',
            'product_detail.max' => 'Chi tiết sản phẩm không được vượt quá 1200 ký tự.',
            'product_image.image' => 'Hình ảnh phải là file ảnh.',
            'product_image.mimes' => 'Hình ảnh phải có định dạng jpeg, png, jpg, svg hoặc gif.',
            'product_image.max' => 'Hình ảnh không được vượt quá 2MB.',
        ]);

        Product::create($request->all());
         return redirect('products.index')->with('success','Thêm sản phẩm thành côngg!!!');
        //return redirect()->route('products')->with('success','Thêm sản phẩm thành côngg!!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         // Tìm sản phẩm theo ID
    $product = Product::find($id);

    
    if (!$product) {
        return view('errors.product-not-found');
    }

    // Trả về view với dữ liệu sản phẩm
    return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('products.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'product_name' => 'required|string|max:255',
            'product_quantity' => 'required|integer|min:1|max:10000',
            'product_price' => 'required|numeric|min:1000000|max:90000000',
            'product_detail' => 'required|string|max:1200|not_regex:/^\s*$/',
            'product_image' => 'nullable|image',
        ], [
            'product_name.required' => 'Tên sản phẩm là bắt buộc.',
            'product_name.regex' => 'Tên sản phẩm chỉ được chứa chữ cái, khoảng trắng.',
            'product_name.not_regex' => 'Tên sản phẩm không được chỉ chứa khoảng trắng.',
            'product_name.max' => 'Tên sản phẩm không được vượt quá 255 ký tự.',
            'product_quantity.required' => 'Số lượng là bắt buộc.',
            'product_quantity.integer' => 'Số lượng phải là số nguyên.',
            'product_price.required' => 'Giá sản phẩm là bắt buộc.',
            'product_price.numeric' => 'Giá sản phẩm phải là số.',
            'product_detail.required' => 'Chi tiết sản phẩm là bắt buộc.',
            'product_detail.not_regex' => 'Chi tiết sản phẩm không được chỉ chứa khoảng trắng.',
            'product_detail.max' => 'Chi tiết sản phẩm không được vượt quá 1200 ký tự.',
            'product_image.image' => 'Hình ảnh phải là file ảnh.',
            'product_image.mimes' => 'Hình ảnh phải có định dạng jpeg, png, jpg, hoặc gif.',
            'product_image.max' => 'Hình ảnh không được vượt quá 2MB.',
        ]);
        $product = Product::find($id);

  
    if (!$product) {
        return redirect()->route('products')->with('error', 'Sản phẩm không tồn tại.');
    }


    if ($product->updated_at != $request->input('updated_at')) {
        return redirect()->route('products.edit', $id)->with('error', 'Dữ liệu đã thay đổi. Vui lòng tải lại trang trước khi cập nhật.');
    }


    $product->update($request->all());

    return redirect()->route('products')->with('success', 'Cập nhật sản phẩm thành công.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         // Kiểm tra xem sản phẩm có tồn tại không
    $product = Product::find($id);

    if (!$product) {
        // Nếu sản phẩm không tồn tại, trả về thông báo lỗi
        return redirect()->route('products')->with('error', 'Sản phẩm không tồn tại hoặc đã bị xóa.');
    }

    // Nếu sản phẩm tồn tại, thực hiện xóa
    $product->delete();

    // Trả về thông báo thành công
    return redirect()->route('products')->with('success', 'Xóa sản phẩm thành công.');
    }

    public function statistics() 
    {
        // Tạo dữ liệu ảo cho thống kê chung
        $statistics = [
            'total_products' => 140,
            'total_value' => 2728540000,
            'avg_price' => 19489571,
            'low_stock' => 12
        ];

        // Tạo dữ liệu ảo cho doanh thu theo tháng
        $monthlyData = [];
        $baseRevenue = 200000000; // 200 triệu
        $baseProducts = 20;
        
        for($i = 1; $i <= 12; $i++) {
            // Tạo số ngẫu nhiên để làm doanh thu tăng/giảm
            $randomFactor = rand(80, 120) / 100;
            $randomProducts = rand(-5, 5);
            
            $monthlyData[] = [
                'month' => $i,
                'revenue' => round($baseRevenue * $randomFactor),
                'total_products' => $baseProducts + $randomProducts
            ];

            // Tăng dần doanh thu cơ bản theo tháng
            $baseRevenue += 10000000; // tăng 10 triệu mỗi tháng
            $baseProducts += 2; // tăng 2 sản phẩm mỗi tháng
        }

        $statistics['monthly_sales'] = $monthlyData;

        // Tạo dữ liệu ảo cho sản phẩm mới nhất
        $statistics['newest_products'] = [
            [
                'id' => 1,
                'product_name' => 'MacBook Pro M2 Pro 2023',
                'product_price' => 82000000,
                'product_image' => 'macbook.jpg',
                'created_at' => Carbon::now()->subDays(2) // Sử dụng Carbon thay vì now()
            ],
            [
                'id' => 2,
                'product_name' => 'iPhone 15 Pro Max',
                'product_price' => 34990000,
                'product_image' => 'iphone.jpg',
                'created_at' => Carbon::now()->subDays(3) // Sử dụng Carbon thay vì now()
            ],
            [
                'id' => 3,
                'product_name' => 'Samsung Galaxy S24 Ultra',
                'product_price' => 29990000,
                'product_image' => 'samsung.jpg',
                'created_at' => Carbon::now()->subDays(4) // Sử dụng Carbon thay vì now()
            ],
            [
                'id' => 4,
                'product_name' => 'iPad Pro M2',
                'product_price' => 25990000,
                'product_image' => 'ipad.jpg',
                'created_at' => Carbon::now()->subDays(5) // Sử dụng Carbon thay vì now()
            ],
            [
                'id' => 5,
                'product_name' => 'AirPods Pro 2',
                'product_price' => 6790000,
                'product_image' => 'airpods.jpg',
                'created_at' => Carbon::now()->subDays(6) // Sử dụng Carbon thay vì now()
            ]
        ];

        // Convert sang object và parse ngày tháng
        $statistics['newest_products'] = collect($statistics['newest_products'])->map(function($item) {
            $item = (object) $item;
            $item->created_at = Carbon::parse($item->created_at);
            return $item;
        });

        // Tạo dữ liệu ảo cho sản phẩm đắt nhất
        $statistics['most_expensive'] = [
            [
                'id' => 1,
                'product_name' => 'MacBook Pro 16 inch M3 Max',
                'product_price' => 95000000,
                'product_image' => 'macbook16.jpg',
                'product_quantity' => 15
            ],
            [
                'id' => 2,
                'product_name' => 'Mac Studio M2 Ultra',
                'product_price' => 89000000,
                'product_image' => 'macstudio.jpg',
                'product_quantity' => 8
            ],
            [
                'id' => 3,
                'product_name' => 'Sony Master Series A95L',
                'product_price' => 85000000,
                'product_image' => 'sony.jpg',
                'product_quantity' => 5
            ],
            [
                'id' => 4,
                'product_name' => 'Samsung Neo QLED 8K',
                'product_price' => 82000000,
                'product_image' => 'qled.jpg',
                'product_quantity' => 7
            ],
            [
                'id' => 5,
                'product_name' => 'LG SIGNATURE OLED M3',
                'product_price' => 79000000,
                'product_image' => 'lg.jpg',
                'product_quantity' => 6
            ]
        ];

        // Convert arrays to objects to match blade template
        $statistics['newest_products'] = json_decode(json_encode($statistics['newest_products']));
        $statistics['most_expensive'] = json_decode(json_encode($statistics['most_expensive']));

        // Thêm dữ liệu ảo cho thống kê đơn hàng
        $statistics['orders_stats'] = [
            'total' => [
                'label' => 'Tổng đơn hàng',
                'value' => 150,
                'color' => '#4e73df'  // blue
            ],
            'completed' => [
                'label' => 'Đã hoàn thành',
                'value' => 95,
                'color' => '#1cc88a'  // green
            ],
            'processing' => [
                'label' => 'Đang xử lý',
                'value' => 45,
                'color' => '#f6c23e'  // yellow
            ],
            'cancelled' => [
                'label' => 'Đã hủy',
                'value' => 10,
                'color' => '#e74a3b'  // red
            ]
        ];

        return view('products.statistics', compact('statistics'));
    }

    public function monthlyRevenue()
    {
        $currentYear = Carbon::now()->year;
        
        $monthlyRevenue = DB::table('products')
            ->select(
                DB::raw('MONTH(created_at) as month'),
                DB::raw('COUNT(*) as total_products'),
                DB::raw('SUM(product_price * product_quantity) as revenue')
            )
            ->whereYear('created_at', $currentYear)
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        $months = [];
        $revenues = [];
        $products = [];

        foreach ($monthlyRevenue as $data) {
            $months[] = 'Tháng ' . $data->month;
            $revenues[] = $data->revenue;
            $products[] = $data->total_products;
        }

        return view('products.monthly-revenue', compact('months', 'revenues', 'products', 'currentYear'));
    }
}