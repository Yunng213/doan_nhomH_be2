@extends('app')
@section('content')
<style>
    #star-rating {
        font-size: 2em;
        cursor: pointer;
    }

    .star {
        color: grey;
    }

    .star.selected {
        color: gold;
    }

    textarea {
        width: 100%;
        height: 100px;
        margin-top: 10px;
    }
</style>
<div class="product-big-title-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-bit-title text-center">
                    <h2>Chi Tiết Sản Phẩm</h2>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="single-product-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-content-right">
                    <div class="product-breadcroumb">
                        <a href="">Trang Chủ</a>
                        <a href="">Tóp Khuyến Mãi</a>
                        <a href="{{route('topsellers.product',$topselersproducts->id)}}">{{$topselersproducts->topsale_name}}</a>
                    </div>

                    <div class="row">
                        <div class="col-sm-8" style="border: solid black 1px; border-radius: 10px;height: 440px;margin-top: 15px;">
                            <div class="product-images" style="margin-left: 200px; margin-top: 50px;">
                                <div class="product-main-img" style="width: 350px;height:350px">
                                    <img src="{{asset('img/' . $topselersproducts->topsale_image)}}" alt="">
                                </div>

                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="product-inner">
                                <h2 class="product-name">{{$topselersproducts->topsale_name}}</h2>
                                <div class="product-inner-price">
                                    {{number_format( $topselersproducts->topsale_price,0, ',', '.')}} vnđ
                                </div>
                                @if(!Auth::check())
                                <form action="{{route('cart.add','add')}}" class="cart" method="post">
                                    @csrf
                                    <input type="hidden" name="id" value="">
                                    <div class="quantity">
                                        <input type="number" size="4" class="input-text qty text" title="Qty" value="1" name="quantity" min="1" step="1">
                                    </div>
                                    <button class="add_to_cart_button" type="submit">Thêm Giỏ Hàng</button>
                                </form>
                                @else
                                <form action="{{route('cart.add','add')}}" class="cart" method="post">
                                    @csrf
                                    <input type="hidden" name="id" value="">
                                    <div class="quantity">
                                        <input type="number" size="4" class="input-text qty text" title="Qty" value="1" name="quantity" min="1" step="1">
                                    </div>
                                    <button class="add_to_cart_button" type="submit">Thêm Giỏ Hàng</button>
                                </form>
                                @endif

                                <div class="uudai">
                                    <div class="box-more-promotion-title has-text-black has-text-weight-semibold" style="margin-left: 18px;">ƯU ĐÃI THÊM</div>
                                    <div class="render-promotion fix-ul-height">
                                        <ul>
                                            <li class="item-promotion"><img src="https://cdn2.cellphones.com.vn/insecure/rs:fill:0:0/q:90/plain/https://cellphones.com.vn/media/wysiwyg/Icon/image_1009_1__1.png" loading="lazy">&nbsp;<a href="https://cellphones.com.vn/uu-dai-doi-tac/vnpay">Giảm đến 500K khi người dùng có tài khoản VNPAY và thanh toán qua VNPAY</a></li>
                                        </ul>
                                        <div id="eJOY__extension_root" class="eJOY__extension_root_class"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div role="tabpanel" class="col-sm-8" id="home">
                <h2>Đặc điểm nổi bật</h2>
                <p> {{$topselersproducts->topsale_detail}}</p>
            </div>
            <div class="col-sm-4">
                <div role="tabpanel" class="tab-pane fade in active" id="profile">
                    <h1>Đánh giá sản phẩm</h1>
                    <div class="product-review">

                        <div id="star-rating">
                            <span class="star " data-rating="1">&#9734;</span>
                            <span class="star" data-rating="2">&#9734;</span>
                            <span class="star" data-rating="3">&#9734;</span>
                            <span class="star" data-rating="4">&#9734;</span>
                            <span class="star" data-rating="5">&#9734;</span>
                        </div>
                        <textarea style="width: 310px;" id="review-text" placeholder="Nhập đánh giá của bạn..."></textarea>
                        <button style="margin-top:10px;" onclick="submitReview()">Gửi đánh giá</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


<script>
    document.querySelectorAll('.star').forEach(function(star) {
        star.addEventListener('click', function() {
            let rating = parseInt(this.getAttribute('data-rating'));
            setRating(rating);
        });
    });

    function setRating(rating) {
        document.querySelectorAll('.star').forEach(function(star) {
            let starRating = parseInt(star.getAttribute('data-rating'));
            if (starRating <= rating) {
                star.classList.add('selected');
            } else {
                star.classList.remove('selected');
            }
        });
    }

    function submitReview() {
        const selectedStar = document.querySelector('.star.selected:last-child');
        const rating = selectedStar ? parseInt(selectedStar.getAttribute('data-rating')) : 0;

        console.log("Giá trị rating:", rating);
        let reviewText = document.getElementById('review-text').value;
        const data = {
            product_name: 'hi',
            rating: rating,
            review_text: reviewText
        };

        fetch('http://localhost:3000/submit-review', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(data),
            })
            .then((response) => {
                console.log("HTTP Status:", response.status);
                if (!response.ok) {
                    throw new Error('Không thể gửi đánh giá');
                }
                return response.json();
            })
            .then((data) => {
                console.log('Đánh giá đã được gửi:', data);
                alert('Cảm ơn bạn đã đánh giá sản phẩm!');
            })
            .catch((error) => {
                console.error('Lỗi khi gửi đánh giá:', error);
                alert('Có lỗi xảy ra khi gửi đánh giá');
            });

    }



    function loadReviews(product_name, rating, review_text) {
        console.log("Đang tải đánh giá cho sản phẩm:", product_name, rating, review_text);
        fetch('http://localhost:3000/get-reviews/product_name')
            .then(response => {
                if (!response.ok) {
                    throw new Error('Lỗi khi tải đánh giá');
                }
                return response.json();
            })
            .then(data => {
                console.log("Dữ liệu đánh giá nhận được:", data);
                const reviewContainer = document.getElementById('review-list');
                reviewContainer.innerHTML = '';

                data.forEach(review => {
                    const reviewElement = document.createElement('div');
                    reviewElement.classList.add('review');
                    reviewElement.innerHTML = `
                    <h3>Đánh giá: ${review.rating} sao</h3>
                    <p>${review.review_text}</p>
                `;
                    reviewContainer.appendChild(reviewElement);
                });
            })
            .catch(error => {
                console.error('Lỗi khi tải đánh giá:', error);
            });
    }

    document.addEventListener('DOMContentLoaded', function() {
        loadReviews('hi');
    });
</script>


@endsection