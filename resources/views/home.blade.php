<!DOCTYPE html>
<!--
	ustora by freshdesignweb.com
	Twitter: https://twitter.com/freshdesignweb
	URL: https://www.freshdesignweb.com/ustora/
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TechZone</title>

    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet'
        type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="css/font-awesome.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/responsive.css">

    <!-- CSS cho tìm kiếm -->
    <style>
    /* Style cho container tìm kiếm */
    .search-container {
        position: relative;
        display: inline-block;
        margin-top: 10px;
    }

    /* Style cho form tìm kiếm */
    .search-form {
        display: flex;
        align-items: center;
        background-color: #0000;
        border-radius: 25px;
        border: 1px solid;
        overflow: hidden;
    }

    .search-form input[type="text"] {
        flex: 1;
        border: none;
        background: none;
        padding: 10px;
        font-size: 14px;
        outline: none;
        width: 200px;
    }

    .search-form button {
        border: none;
        background: none;
        padding: 10px 15px;
        cursor: pointer;
        font-size: 14px;
        color: #333;
    }

    .search-form button:hover {
        background-color: #0000;
    }

    /* Style cho dropdown kết quả tìm kiếm */
    .search-result {
        position: absolute;
        top: 100%;
        left: 0;
        width: 300px;
        background-color: #fff;
        border: 1px solid #ddd;
        border-radius: 5px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        z-index: 1000;
        display: none;
        margin-top: 5px;
    }

    .search-result.active {
        display: block;
    }

    /* Style cho danh sách gợi ý */
    .suggest_search {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .suggest_search li {
        padding: 8px 12px;
        border-bottom: 1px solid #eee;
    }

    .suggest_search li:last-child {
        border-bottom: none;
    }

    .suggest_search .title {
        display: flex;
        justify-content: space-between;
        align-items: center;
        font-weight: bold;
        color: #333;
        padding: 10px;
        background-color: #f9f9f9;
    }

    .suggest_search .btn-close {
        text-decoration: none;
        color: #999;
        font-size: 16px;
    }

    .suggest_search .btn-close:hover {
        color: #333;
    }

    .suggest_search a {
        text-decoration: none;
        color: #555;
        display: block;
    }

    .suggest_search a:hover {
        color: #000;
        background-color: #f5f5f5;
    }

    /* Style cho danh sách gợi ý sản phẩm */
    .suggest_products {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .suggest_products li {
        padding: 8px 12px;
        border-bottom: 1px solid #eee;
    }

    .suggest_products li:last-child {
        border-bottom: none;
    }

    .suggest_products .title {
        font-weight: bold;
        color: #333;
        padding: 10px;
        background-color: #f9f9f9;
    }

    .suggest_products .product-item {
        display: flex;
        align-items: center;
        cursor: pointer;
    }

    .suggest_products .product-item img {
        width: 40px;
        height: 40px;
        margin-right: 10px;
        border-radius: 5px;
    }

    .suggest_products .product-item:hover {
        background-color: #f5f5f5;
    }
    </style>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <div class="header-area">
        <div class="container">
            @if (Route::has('login'))
            <div class="login">
                @auth
                <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">
                    <div>{{ Auth::user()->name }}</div>
                </a>
                @else
                <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>
                @if (Route::has('register'))
                <a href="{{ route('register') }}"
                    class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                @endif
                @endauth
            </div>
            @endif
        </div>
    </div>
    <!-- End header area -->

    <div class="site-branding-area">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="logo">
                        <h1><a href="./"><img src="img/logo.png"></a></h1>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mainmenu-area">
        <div class="container">
            <div class="row">
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class="active">
                            <a href="index">TRANG CHỦ</a>
                        </li>
                        <li><a href="shop">SẢN PHẨM</a></li>
                        <li>
                            <div class="dropdown">
                                <button class="dropbtn">DANH MỤC</button>
                                <div class="dropdown-content">
                                    @foreach($data_category as $data)
                                    <a href="{{ route('category', $data->id) }}"
                                        class="menu_categories">{{ $data->name }}</a>
                                    @endforeach
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="search-container">
                                <form action="{{ route('timkiem.product', 'searchproduct') }}" method="get"
                                    class="search-form">
                                    <input id="search" name="key" type="text" placeholder="Bạn tìm..."
                                        autocomplete="off">
                                    <button type="submit">Search</button>
                                </form>
                                <div id="search-result" class="search-result">
                                    <ul class="suggest_search">
                                        <li class="title">
                                            <span>Tìm kiếm gần đây</span>
                                            <a href="javascript:void(0);" class="btn-close">×</a>
                                        </li>
                                    </ul>
                                    <ul id="product-suggestions" class="suggest_products">
                                        <li class="title">
                                            <span>Gợi ý sản phẩm</span>
                                        </li>
                                        <!-- Gợi ý sản phẩm sẽ được thêm bằng JavaScript -->
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <li style="margin-left: 190px;">
                            <a href="{{ route('cart.product', 'listproduct') }}"><i class="fa fa-shopping-cart"></i>
                                <span class="product-count"></span></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="slider-area">
        <div class="block-slider block-slider4">
            <ul class="" id="bxslider-home4">
                <li><img src="img/samsunggalaxyslidings24.png" alt="Slide"></li>
                <li><img src="img/iphone_15.png" alt="Slide"></li>
                <li><img src="img/Macair13.png" alt="Slide"></li>
                <li><img src="img/xiaomi_14.png" alt="Slide"></li>
            </ul>
        </div>
    </div>

    @yield('content-index')

    <div class="footer-top-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4">
                    <div class="footer-menu">
                        <div style="margin-bottom: 20px;margin-top: -30px;">
                            <a href="./"><img src="img/logo.png"></a>
                        </div>
                        <p>21/2A Phan Huy Ích, Phường 12, Gò Vấp, Thành phố Hồ Chí Minh, Việt Nam</p>
                        <p>0234 678 678</p>
                        <p>didongustors@gmail.com</p>
                        <div class="footer-social">
                            <a href="#" target="_blank"><i class="fa fa-facebook"></i></a>
                            <a href="#" target="_blank"><i class="fa fa-twitter"></i></a>
                            <a href="#" target="_blank"><i class="fa fa-youtube"></i></a>
                            <a href="#" target="_blank"><i class="fa fa-linkedin"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4">
                    <div class="footer-menu">
                        <h2 class="footer-wid-title">Danh mục nổi bật</h2>
                        <ul>
                            @foreach($data_category as $data)
                            <a style="margin-left: 100px;" href="{{ route('category', $data->id) }}"
                                class="menu_categories">{{ $data->name }}</a>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4">
                    <div class="footer-newsletter">
                        <h2 class="footer-wid-title" style="text-align: center;">Chính sách công ty</h2>
                        <div style="margin-left: 40px;">
                            <p href="#">Chính sách bán hàng</p>
                            <p href="#">Liên hệ chúng tôi</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4">
                    <div class="footer-newsletter">
                        <h2 class="footer-wid-title" style="text-align: center;">Map</h2>
                    </div>
                    <div class="footer-map">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d291.213893467201!2d106.76902755472202!3d10.880644586216379!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3174d90022426c6d%3A0x438eaf5d0afb4c6!2zxJBp4buHbiB04butIFRlY2hab25l!5e0!3m2!1sen!2s!4v1744773852067!5m2!1sen!2s"
                            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="copyright">
                        <p>© 2024 All Rights Reserved.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="footer-card-icon">
                        <i class="fa fa-cc-discover"></i>
                        <i class="fa fa-cc-mastercard"></i>
                        <i class="fa fa-cc-paypal"></i>
                        <i class="fa fa-cc-visa"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Latest jQuery -->
    <script src="https://code.jquery.com/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/jquery.easing.1.3.min.js"></script>
    <script src="js/main.js"></script>
    <script type="text/javascript" src="js/bxslider.min.js"></script>
    <script type="text/javascript" src="js/script.slider.js"></script>

    <!-- JavaScript cho tìm kiếm -->
    <script>
    $(document).ready(function() {
        // Hàm lưu từ khóa vào localStorage
        function saveSearchQuery(query) {
            let history = JSON.parse(localStorage.getItem('searchHistory') || '[]');
            if (!history.includes(query)) {
                history.unshift(query); // Thêm từ khóa mới vào đầu mảng
                if (history.length > 5) history.pop(); // Giới hạn tối đa 5 từ khóa
                localStorage.setItem('searchHistory', JSON.stringify(history));
            }
        }

        // Hàm hiển thị lịch sử tìm kiếm
        function loadSearchHistory() {
            let history = JSON.parse(localStorage.getItem('searchHistory') || '[]');
            let historyList = $('.suggest_search');
            historyList.empty();
            historyList.append(
                '<li class="title"><span>Tìm kiếm gần đây</span><a href="javascript:void(0);" class="btn-close">×</a></li>'
            );
            history.forEach(item => {
                historyList.append(
                    `<li><a href="{{ route('timkiem.product', 'searchproduct') }}?key=${encodeURIComponent(item)}">${item}</a></li>`
                );
            });
        }
        // Hàm hiển thị gợi ý sản phẩm
    function loadProductSuggestions(query) {
        $.ajax({
            url: "{{ route('autocomplete') }}",
            type: "GET",
            data: { query: query },
            success: function(data) {
                let suggestionList = $('#product-suggestions');
                suggestionList.empty();
                suggestionList.append('<li class="title"><span>Gợi ý sản phẩm</span></li>');
                if (data.length > 0) {
                    data.forEach(product => {
                        suggestionList.append(`
                            <li class="product-item" onclick="window.location.href='/single-product/${product.id}'">
                                <img src="{{ asset('img') }}/${product.product_image}" alt="${product.product_name}">
                                <div>
                                    <span>${product.product_name}</span><br>
                                    <span>${new Intl.NumberFormat('vi-VN').format(product.product_price)} VNĐ</span>
                                </div>
                            </li>
                        `);
                    });
                } else {
                    suggestionList.append('<li>Không tìm thấy sản phẩm</li>');

                }
            },
            error: function(xhr, status, error) {
                console.log('Lỗi AJAX: ', error);
                console.log('Trạng thái: ', xhr.status);
                console.log('Phản hồi: ', xhr.responseText);
            }
        });
    }   
        // Gọi khi nhập liệu
        $('#search').on('input', function() {
            let query = $(this).val().trim();
            if (query.length > 0) {
                $('#search-result').addClass('active');
                loadSearchHistory(); // Hiển thị lịch sử khi nhập
                loadProductSuggestions(query); // Gọi gợi ý sản phẩm
            } else {
                $('#search-result').removeClass('active');
                $('#product-suggestions').empty();
                $('#product-suggestions').append('<li class="title"><span>Gợi ý sản phẩm</span></li>');
            }
        });

        // Lưu từ khóa khi submit form
        $('.search-form').on('submit', function(e) {
            let query = $('#search').val().trim();
            if (query) {
                saveSearchQuery(query);
                loadSearchHistory(); // Cập nhật lịch sử sau khi lưu
            }
        });

        // Ẩn dropdown khi click nút đóng
        $('.btn-close').on('click', function() {
            $('#search-result').removeClass('active');
        });

        // Ẩn dropdown khi click ra ngoài
        $(document).click(function(event) {
            if (!$(event.target).closest('.search-container').length) {
                $('#search-result').removeClass('active');
            }
        });

        // Tải lịch sử khi trang load
        loadSearchHistory();
    });
    </script>
</body>

</html>