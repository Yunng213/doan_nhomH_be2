<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sản phẩm không tìm thấy</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            background:rgb(118, 132, 143); 
        }

        .container {
            text-align: center;
            background-color:rgb(128, 190, 215); 
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        }

        .container i {
            font-size: 70px;
            color:rgb(35, 76, 96); 
            margin-bottom: 20px;
        }

        h1 {
            color:rgb(28, 70, 92);
            font-size: 30px;
            margin-bottom: 20px;
        }

        p {
            font-size: 18px;
            color: #6c757d;
            margin-bottom: 30px;
        }

        .back-btn {
            display: inline-block;
            padding: 12px 25px;
            background-color: #b2dffc; 
            color: #333;
            border-radius: 8px;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .back-btn:hover {
            background-color: #9cd3f8;
        }

        @media (max-width: 600px) {
            .container {
                padding: 20px;
            }

            h1 {
                font-size: 24px;
            }

            p {
                font-size: 16px;
            }

            .back-btn {
                padding: 10px 20px;
            }
        }
    </style>
</head>
<body>

    <div class="container">
        <i class="fas fa-exclamation-triangle"></i>
        <h1>Không tìm thấy sản phẩm</h1>
        <p>Sản phẩm bạn đang tìm có thể đã bị xóa hoặc không tồn tại.</p>
        <a href="javascript:history.back()" class="back-btn fw-bold">Back</a>
    </div>

</body>
</html>
