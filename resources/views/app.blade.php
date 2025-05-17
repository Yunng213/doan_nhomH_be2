<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>TechZone</title>

    <title>Shop Page- Ustora</title>


    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="css/font-awesome.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/responsive.css">

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f7f9fb;
            color: #333;
        }
        .logo img {
            height: 60px;
            object-fit: contain;
        }
        .mainmenu-area {
            background-color: #1e2a38;
            padding: 10px 0;
        }
        .mainmenu-area .nav li a {
            color: white !important;
            font-weight: 500;
            padding: 10px 20px;
            transition: background 0.3s ease;
        }
        .mainmenu-area .nav li a:hover {
            background-color: #00bcd4;
            border-radius: 5px;
        }
        .mainmenu-area form input[type="text"] {
            padding: 5px 10px;
            border-radius: 20px;
            border: none;
            width: 180px;
        }
        .mainmenu-area form button {
            background-color: #00bcd4;
            border: none;
            padding: 6px 12px;
            border-radius: 20px;
            color: white;
            margin-left: 10px;
        }
        .slider-area img {
            width: 100%;
            height: auto;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }
        .footer-top-area {
            background-color: #1e2a38;
            color: white;
            padding: 40px 0;
        }
        .footer-top-area a, .footer-top-area p {
            color: #ddd;
        }
        .footer-wid-title {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 20px;
        }
        .footer-social a {
            color: white;
            margin-right: 10px;
            font-size: 20px;
        }
        .footer-bottom-area {
            background-color: #151d27;
            padding: 20px 0;
            color: #ccc;
        }
        .footer-card-icon i {
            font-size: 24px;
            margin-right: 10px;
            color: white;
        }
    </style>
</head>

<body>
    <!-- Header -->
    <div class="header-area">
        <div class="container text-end py-2">
            @if (Route::has('login'))
                <div class="login">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-white me-2">{{ Auth::user()->name }}</a>
                    @else
                        <a href="{{ route('login') }}" class="text-white me-2">Đăng nhập</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="text-white">Đăng ký</a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>
    </div>

    <!-- Logo -->
    <div class="site-branding-area py-3">
        <div class="container text-center">
            <a href="./">
                <img src="img/logo.png" alt="TechZone Logo">
            </a>
        </div>
    </div>

    <!-- Main Menu -->
    <div class="mainmenu-area">
        <div class="container">
            <ul class="nav navbar-nav d-flex justify-content-center align-items-center">
                <li><a href="index">Trang Chủ</a></li>
                <li><a href="shop">Sản Phẩm</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Danh Mục <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        @foreach($data_category as $data)
                            <li><a href="{{ route('category.product', $data->id) }}">{{ $data->name }}</a></li>
                        @endforeach
                    </ul>
                </li>
                <li>
                    <form class="d-flex" action="{{ route('search.product') }}" method="get">
                        <input name="key" type="text" placeholder="Tìm kiếm sản phẩm...">
                        <button type="submit">Tìm</button>
                    </form>
                </li>
                <li class="ms-auto">
                    <a href="{{ route('cart.product','listproduct') }}"><i class="fa fa-shopping-cart"></i></a>
                </li>
            </ul>
        </div>
    </div>

    <!-- Slider -->
    <div class="slider-area">
        <div class="block-slider block-slider4">
            <ul id="bxslider-home4">
                <li><img src="img/samsunggalaxyslidings24.png" alt="Samsung Galaxy S24"></li>
                <li><img src="img/iphone_15.png" alt="iPhone 15"></li>
                <li><img src="img/Macair13.png" alt="MacBook Air 13"></li>
                <li><img src="img/xiaomi_14.png" alt="Xiaomi 14"></li>
            </ul>
        </div>
    </div>

    @yield('content-index')

    <!-- Footer -->
    <div class="footer-top-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4">

                    <img src="img/logo.png" style="height: 60px;">
                    <p>Điện tử TechZone, VQJ9+7JV, Hẻm 170, Linh Xuân, Thủ Đức, Hồ Chí Minh</p>
                    <p>0234 678 678</p>
                    <p>dientutechzone@gmail.com</p>
                    <div class="footer-social">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-youtube"></i></a>
                        <a href="#"><i class="fa fa-linkedin"></i></a>

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
                            <a style="margin-left: 100px;" href="{{route('category',$data->id)}}" class="menu_categories">{{$data->name}}</a>
                            @endforeach
                        </ul>

                    </div>
                </div>
                <div class="col-lg-3 col-md-4">
                    <h2 class="footer-wid-title">Danh mục nổi bật</h2>
                    <ul>
                        @foreach($data_category as $data)
                            <li><a href="{{ route('category.product', $data->id) }}">{{ $data->name }}</a></li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-lg-3 col-md-4">
                    <h2 class="footer-wid-title text-center">Chính sách</h2>
                    <div style="margin-left: 40px;">
                        <p><a href="#">Chính sách bán hàng</a></p>
                        <p><a href="#">Liên hệ chúng tôi</a></p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4">
                    <h2 class="footer-wid-title text-center">Bản đồ</h2>
                    <iframe src="https://www.google.com/maps/embed?..." width="100%" height="260" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-bottom-area">
        <div class="container d-flex justify-content-between">
            <p>&copy; 2024 TechZone. All rights reserved.</p>
            <div class="footer-card-icon">
                <i class="fa fa-cc-discover"></i>
                <i class="fa fa-cc-mastercard"></i>
                <i class="fa fa-cc-paypal"></i>
                <i class="fa fa-cc-visa"></i>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/jquery.easing.1.3.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/bxslider.min.js"></script>
    <script src="js/script.slider.js"></script>
</body>

</html>
