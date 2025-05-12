@extends('section')
@section('content')

<head>
    <title>Thanh toán</title>
    <link rel="stylesheet" href="https://web.nvnstatic.net/css/fontAwesome/fontawesome-5.0.13.min.css?v=2" type="text/css">
    <link rel="stylesheet" href="https://web.nvnstatic.net/css/bootstrap/bootstrap-3.3.5.min.css?v=2" type="text/css">
    <link rel="stylesheet" href="https://web.nvnstatic.net/js/jquery/fancybox-2.1.5/source/jquery.fancybox.css?v=2" type="text/css">
    <link rel="stylesheet" href="https://web.nvnstatic.net/css/validationEngine.jquery.css?v=2" type="text/css">
    <link rel="stylesheet" href="https://web.nvnstatic.net/css/jqueryUI/jqui.css?v=2" type="text/css">
    <link rel="stylesheet" href="https://web.nvnstatic.net/tp/T0320/css/style.css?v=10" type="text/css">
    <link rel="stylesheet" href="https://web.nvnstatic.net/tp/T0320/css/checkout.css?v=10" type="text/css">
    <link rel="stylesheet" href="css/responsive.css">
    <script defer type="text/javascript" src="https://web.nvnstatic.net/js/jquery/jquery.min.js?v=47"></script>
    <script defer type="text/javascript" src="https://web.nvnstatic.net/js/bootstrap/bootstrap-3.3.5.min.js?v=47"></script>
    <script defer type="text/javascript" src="https://web.nvnstatic.net/js/jquery/jquery.cookie.js?v=47"></script>
    <script defer type="text/javascript" src="https://web.nvnstatic.net/js/jquery/jquery-ui-1.10.3.custom.min.js?v=47"></script>
    <script defer type="text/javascript" src="https://web.nvnstatic.net/js/lib.js?v=47"></script>
    <script src="https://pos.nvnstatic.net/cache/location.vn.js?v=240329_155124" defer></script>
    <script src="https://web.nvnstatic.net/js/lazyLoad/lazysizes.min.js" async></script>
</head>

<body class="body--custom-background-color" style>
    <input type="hidden" id="storeId" value="97757">
    <script defer type="text/javascript" src="https://web.nvnstatic.net/js/jquery/jquery.validationEngine.js?v=22"></script>
    <script defer type="text/javascript" src="https://web.nvnstatic.net/js/jquery/jquery.validationEngine-vi.js?v=22"></script>
    <script defer type="text/javascript" src="https://web.nvnstatic.net/js/jquery/fancybox-2.1.5/source/jquery.fancybox.js?v=22"></script>
    <script defer type="text/javascript" src="https://web.nvnstatic.net/js/jquery/jquery.number.min.js?v=22"></script>
    <script defer type="text/javascript" src="https://web.nvnstatic.net/js/jquery/slimscroll.min.js?v=22"></script>
    <script defer type="text/javascript" src="https://web.nvnstatic.net/tp/T0320/js/orders.js?v=20"></script>
    <link rel="stylesheet" href="https://web.nvnstatic.net/css/validationEngine.jquery.css?v=2" type="text/css">
    <link rel="stylesheet" href="https://web.nvnstatic.net/js/jquery/fancybox-2.1.5/source/jquery.fancybox.css?v=2" type="text/css">


    <div class="container">
        <form id="formCheckout" class="validate content stateful-form formCheckout" method="post">
            <div class="wrap">
                <div class="sidebar" style="margin-top: 140px;">
                    <div class="sidebar_header">
                        <h2>
                            <label class="control-label">Đơn hàng</label>
                            <label class="control-label"></label>
                        </h2>
                        <hr class="full_width">
                    </div>
                    <div class="sidebar__content">

                        <div class="order-summary order-summary--discount">
                            <div class="summary-section">
                                <div class="form-group m0">
                                    <div class="field__input-btn-wrapper">
                                        <div class="field__input-wrapper">
                                            <input type="text" name="couponCode" id="couponCode" class="form-control discount_code" placeholder="Nhập mã giảm giá" value>
                                        </div>
                                        <button id="getCoupon" class="btn btn-danger event-voucher-apply tp_button" type="button">
                                            Áp dụng </button>
                                    </div>
                                </div>
                                <div class="inValidCode mt10 hide">
                                    Mã khuyến mãi không hợp lệ
                                </div>
                            </div>
                            <hr class="m0">
                        </div>
                        <div class="order-summary order-summary--total-lines">
                            <div class="summary-section border-top-none--mobile">
                                <div class="total-line total-line-subtotal clearfix">
                                    <span class="total-line-name pull-left">
                                        Tạm tính</span>
                                    <span class="total-line-subprice pull-right">{{number_format($totalPrice,0, ',', '.')}} vnđ</span>
                                </div>
                                <div class="total-line total-line-shipping clearfix">
                                    <span class="total-line-name pull-left">
                                        Giảm giá </span>
                                    <span id="moneyCoupon" class="pull-right" value="0">₫</span>
                                </div>
                                <div class="total-line total-line-total clearfix">
                                    <span class="total-line-name pull-left">
                                        Tổng cộng </span>
                                    <span id="totalMoney" class="total-line-price pull-right" value="4050000" name="product_name">
                                        {{number_format($totalPrice,0, ',', '.')}} vnđ
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group clearfix hidden-sm hidden-xs">
                            <div class="field__input-btn-wrapper mt10" style="margin-left: 70px;">
                                <form action="{{ route('pay','store') }}" method="post">
                                    @csrf
                                    <button name="redirect" class="btn btn-success btn-checkout tp_button" type="submit">Đặt hàng</button>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="main" role="main">
                    <div class="main_header">
                        <div class="shop logo logo--left ">
                            <h1 class="shop__name">
                                <h1><a href="./"><img src="img/logo.png"></a></h1>
                            </h1>
                        </div>
                    </div>
                    <div class="main_content">
                        <div class="row">
                            <div class="col-md-8 col-lg-8">
                                <div class="section">
                                    <div class="section__header">
                                        <div class="layout-flex layout-flex--wrap">
                                            <h2 class="section__title layout-flex__item layout-flex__item--stretch">
                                                <i class="fa fa-id-card-o fa-lg section__title--icon hidden-md hidden-lg" aria-hidden="true"></i>
                                                <label class="control-label">Thông
                                                    tin khách hàng</label>
                                            </h2>
                                        </div>
                                    </div>
                                    <div class="section__content">
                                        <in class="billing">
                                            <div class="form-group">
                                                <div class="field__input-wrapper">
                                                    <div class="customerNameformError parentFormformCheckout formError" style="opacity: 0.87; position: absolute; top: 0px; left: 273.6px; margin-top: -60px;">
                                                        <div class="formErrorContent">*
                                                            Trường này bắt
                                                            buộc<br></div>
                                                        <div class="formErrorArrow">
                                                            <div class="line10"><!-- --></div>
                                                            <div class="line9"><!-- --></div>
                                                            <div class="line8"><!-- --></div>
                                                            <div class="line7"><!-- --></div>
                                                            <div class="line6"><!-- --></div>
                                                            <div class="line5"><!-- --></div>
                                                            <div class="line4"><!-- --></div>
                                                            <div class="line3"><!-- --></div>
                                                            <div class="line2"><!-- --></div>
                                                            <div class="line1"><!-- --></div>
                                                        </div>
                                                    </div><input type="text" name="customerName" id="customerName" required class="field__input form-control validate[required]" value placeholder="Họ và tên">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="field__input-wrapper">
                                                    <input name="customerMobile" id="customerMobile" type="text" class="field__input form-control validate[required,custom[phone]]" value placeholder="Điện thoại">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="field__input-wrapper">
                                                    <input name="customerAddress" id="customerAddress" type="text" class="field__input form-control validate[required]" value placeholder=" Địa chỉ">
                                                </div>
                                            </div>
                                            <div class="form-group city">
                                                <div class="field__input-wrapper field__input-wrapper--select">
                                                    <select class="field__input field__input--select form-control validate[required]" name="customerCityId" id="customerCityId" required>
                                                        <option value>---
                                                            Chọn Tỉnh/ thành
                                                            phố ---</option>
                                                        <option value="254">Hà
                                                            Nội</option>
                                                        <option value="255">Hồ
                                                            Chí
                                                            Minh</option>
                                                        <option value="256">An
                                                            Giang</option>
                                                        <option value="257">Bà
                                                            Rịa - Vũng
                                                            Tàu</option>
                                                        <option value="258">Bắc
                                                            Ninh</option>
                                                        <option value="259">Bắc
                                                            Giang</option>
                                                        <option value="260">Bình
                                                            Dương</option>
                                                        <option value="261">Bình
                                                            Định</option>
                                                        <option value="262">Bình
                                                            Phước</option>
                                                        <option value="263">Bình
                                                            Thuận</option>
                                                        <option value="264">Bến
                                                            Tre</option>
                                                        <option value="265">Bắc
                                                            Cạn</option>
                                                        <option value="266">Cần
                                                            Thơ</option>
                                                        <option value="267">Khánh
                                                            Hòa</option>
                                                        <option value="268">Thừa
                                                            Thiên
                                                            Huế</option>
                                                        <option value="269">Lào
                                                            Cai</option>
                                                        <option value="270">Quảng
                                                            Ninh</option>
                                                        <option value="271">Đồng
                                                            Nai</option>
                                                        <option value="272">Nam
                                                            Định</option>
                                                        <option value="273">Cà
                                                            Mau</option>
                                                        <option value="274">Cao
                                                            Bằng</option>
                                                        <option value="275">Gia
                                                            Lai</option>
                                                        <option value="276">Hà
                                                            Giang</option>
                                                        <option value="277">Hà
                                                            Nam</option>
                                                        <option value="278">Hà
                                                            Tĩnh</option>
                                                        <option value="279">Hải
                                                            Dương</option>
                                                        <option value="280">Hải
                                                            Phòng</option>
                                                        <option value="281">Hòa
                                                            Bình</option>
                                                        <option value="282">Hưng
                                                            Yên</option>
                                                        <option value="283">Kiên
                                                            Giang</option>
                                                        <option value="284">Kon
                                                            Tum</option>
                                                        <option value="285">Lai
                                                            Châu</option>
                                                        <option value="286">Lâm
                                                            Đồng</option>
                                                        <option value="287">Lạng
                                                            Sơn</option>
                                                        <option value="288">Long
                                                            An</option>
                                                        <option value="289">Nghệ
                                                            An</option>
                                                        <option value="290">Ninh
                                                            Bình</option>
                                                        <option value="291">Ninh
                                                            Thuận</option>
                                                        <option value="292">Phú
                                                            Thọ</option>
                                                        <option value="293">Phú
                                                            Yên</option>
                                                        <option value="294">Quảng
                                                            Bình</option>
                                                        <option value="295">Quảng
                                                            Nam</option>
                                                        <option value="296">Quảng
                                                            Ngãi</option>
                                                        <option value="297">Quảng
                                                            Trị</option>
                                                        <option value="298">Sóc
                                                            Trăng</option>
                                                        <option value="299">Sơn
                                                            La</option>
                                                        <option value="300">Tây
                                                            Ninh</option>
                                                        <option value="301">Thái
                                                            Bình</option>
                                                        <option value="302">Thái
                                                            Nguyên</option>
                                                        <option value="303">Thanh
                                                            Hóa</option>
                                                        <option value="304">Tiền
                                                            Giang</option>
                                                        <option value="305">Trà
                                                            Vinh</option>
                                                        <option value="306">Tuyên
                                                            Quang</option>
                                                        <option value="307">Vĩnh
                                                            Long</option>
                                                        <option value="308">Vĩnh
                                                            Phúc</option>
                                                        <option value="309">Yên
                                                            Bái</option>
                                                        <option value="310">Đắk
                                                            Lắk</option>
                                                        <option value="311">Đồng
                                                            Tháp</option>
                                                        <option value="312">Đà
                                                            Nẵng</option>
                                                        <option value="313">Đắc
                                                            Nông</option>
                                                        <option value="314">Hậu
                                                            Giang</option>
                                                        <option value="315">Bạc
                                                            Liêu</option>
                                                        <option value="316">Điện
                                                            Biên</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group district">
                                                <div class="field__input-wrapper field__input-wrapper--select">
                                                    <select class="field__input field__input--select form-control validate[required]" name="customerDistrictId" id="customerDistrictId">
                                                        <option value>---
                                                            Chọn Quận/ Huyện
                                                            ---</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group district">
                                                <div class="field__input-wrapper field__input-wrapper--select">
                                                    <select class="field__input field__input--select form-control validate[required]" name="customerWardId" id="customerWardId">
                                                        <option value>---
                                                            Chọn Phường/ Xã
                                                            ---</option>
                                                    </select>
                                                    <input type="hidden" name="selectIdWard">
                                                </div>
                                            </div>
                                        </in>
                                    </div>
                                </div>
                                <div class="section pt10">
                                    <div class="section__content">
                                        <div class="form-group m0">
                                            <textarea name="description" class="field__input form-control m0" placeholder="Ghi chú"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-lg-4">
                                <div class="section__header">
                                    <div class="layout-flex layout-flex--wrap">
                                        <h2 class="section__title layout-flex__item layout-flex__item--stretch">
                                            <i class="fa fa-id-card-o fa-lg section__title--icon hidden-md hidden-lg" aria-hidden="true"></i>
                                            <label class="control-label">Sản phẩm</label>
                                        </h2>
                                    </div>
                                </div>
                                <div class="summary-body summary-section summary-product" style="width: 350px;">
                                    <div class="summary-product-list">
                                        <table class="product-table" >
                                            <tbody>
                                                @foreach ($cartItems as $item)
                                                <tr class="product product-has-image clearfix" >
                                                    <td>
                                                        <div class="product-thumbnail">
                                                            <div class="product-thumbnail__wrapper">
                                                                <img src="{{asset('img')}}/{{$item['product_image']}}" class="product-thumbnail__image">
                                                            </div>
                                                            <span id="booking_quantity" class="product-thumbnail__quantity" aria-hidden="true" name="product_quantity">{{ $item['quantity']}}</span>
                                                        </div>
                                                    </td>
                                                    <td class="product-info">
                                                        <span class="product-info-name" name="product_name">{{ $item['product_name'] }}</span>
                                                    </td>
                                                    <td class="product-price text-right" name="product_price">
                                                        {{number_format($item['product_price'],0, ',', '.')}} vnđ
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>
@endsection