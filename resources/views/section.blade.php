<!DOCTYPE html>
<html lang="en">

<head>
    <base href="/">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Shop Page - Techzone</title>

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

</head>

<body>

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
                        <p>Điện tử TechZone, VQJ9+7JV, Hẻm 170, Linh Xuân, Thủ Đức, Hồ Chí Minh</p>
                        <p>0234 678 678</p>
                        <p>dientutechzone@gmail.com</p>
                        <div class="footer-social" >
                            <a href="#"><i class="fab fa-facebook"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-youtube"></i></a>
                            <a href="#"><i class="fab fa-linkedin"></i></a>
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
                    <div class="footer-newsletter" style="">
                        <h2 class="footer-wid-title">Chính sách công ty</h2>
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
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d291.213893467201!2d106.76902755472202!3d10.880644586216379!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3174d90022426c6d%3A0x438eaf5d0afb4c6!2zxJBp4buHbiB04butIFRlY2hab25l!5e0!3m2!1sen!2s!4v1744773852067!5m2!1sen!2s" width="350" height="350" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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
                        <i class="fab fa-cc-discover"></i>
                        <i class="fab fa-cc-mastercard"></i>
                        <i class="fab fa-cc-paypal"></i>
                        <i class="fab fa-cc-visa"></i>
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