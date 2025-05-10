<!DOCTYPE html>
<!--
	ustora by freshdesignweb.com
	Twitter: https://twitter.com/freshdesignweb
	URL: https://www.freshdesignweb.com/ustora/
-->
<html lang="en">

<head>
    <base href="/">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Shop Page- Ustora</title>

    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
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

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
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
                <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                @endif
                @endauth
            </div>
            @endif
        </div>
    </div> <!-- End header area -->

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
    </div> <!-- End site branding area -->

    <div class="mainmenu-area">
        <div class="container">
            <div class="row">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="index">Trang Chủ</a>
                    </li>
                    <li><a href="shop">Sản Phẩm</a></li>
                    <li>
                        <div class="dropdown">
                            <button class="dropbtn">Danh Mục</button>
                            <div class="dropdown-content">
                                @foreach($category as $data)
                                <a href="{{route('category',$data->id)}}" class="menu_categories">{{$data->name}}</a>
                                @endforeach
                            </div>
                        </div>
                    </li>
                    <!--Thêm Nav -->
                    <li>
                        <form role="timkiem" action="{{ route('timkiem.product', 'searchproduct') }}" method="get">
                            <input style="border-radius: 10px; margin-top: 10px; margin-left: 180px; width:300px;" name="key" type="text" placeholder="Search products...">
                            <button style="border-radius: 10px; width:80px; height: 45px; margin-left: 10px;">Search</button>
                        </form>
                    </li>
                    </li>
                    <li style="margin-left: 190px;">
                        <a href="{{ route('cart.product','listproduct') }}"><i class="fa fa-shopping-cart"></i> <span class="product-count"></span></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    </div> <!-- End mainmenu area -->

    @yield('content')

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
                            @foreach($category as $data)
                            <a style="margin-left: 100px;" href="{{route('category',$data->id)}}" class="menu_categories">{{$data->name}}</a>
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
                        <iframe src="https://www.google.com/maps?q=Điện+thoại+di+động+Ustora,+21/2A+Phan+Huy+Ích,+Phường+12,+Gò+Vấp,+Thành+phố+Hồ+Chí+Minh,+Việt+Nam&output=embed" width="100%" height="260" frameborder="0" style="border:0" allowfullscreen=""></iframe>
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
                        <p>&copy; 2024 All Rights Reserved.</p>
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

    <!-- Latest jQuery form server -->
    <script src="https://code.jquery.com/jquery.min.js"></script>

    <!-- Bootstrap JS form CDN -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

    <!-- jQuery sticky menu -->
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.sticky.js"></script>

    <!-- jQuery easing -->
    <script src="js/jquery.easing.1.3.min.js"></script>

    <!-- Main Script -->
    <script src="js/main.js"></script>
</body>

</html>