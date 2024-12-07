<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="css/login_4men.css">
    <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
    <script src="js/jquery3.7.1.js"></script>
    <script src="js/dangnhap.js"></script>
    <style>
        /* Đặt ảnh làm nền và điều chỉnh để ảnh phủ toàn màn hình */
        body {
          background-image: url('https://4menshop.com/images/thumbs/slides/banner-top-trang-chu-2-slide-20.png?t=1728149562');
          background-size: cover; /* Giúp ảnh phủ toàn màn hình */
          background-position: center; /* Căn giữa ảnh */
          background-repeat: no-repeat; /* Không lặp lại ảnh */
          margin: 0;
          height: 100vh; /* Chiều cao 100% của cửa sổ trình duyệt */
        }
      </style>
</head>
<body>
    <div class="form" method="POST" >
        <h2>Đăng Nhập</h2>
        <input type="name" name="username" id="username" placeholder="Nhập tên người dùng">
        <input type="password" name="password" id="password" placeholder="Nhập mật khẩu">
        <button type="submit" class="btnn" id="loginButton"><strong>Đăng Nhập</strong></button>

        <p class="link"> Nếu không có tài khoản<br>
        <a href="dangky.php">Đăng ký</a> ở đây<br><br>
        <a href="index.php">Trở về trang chủ</a></p>
        <p class="liw">Đăng nhập với:</p>
        <div id="message" style="color: red; font-weight: bold; font-size: 20px;"></div>
        <div class="icons">
            <a href="#"><ion-icon name="logo-facebook"></ion-icon></a>
            <a href="#"><ion-icon name="logo-instagram"></ion-icon></a>
            <a href="#"><ion-icon name="logo-twitter"></ion-icon></a>
            <a href="#"><ion-icon name="logo-google"></ion-icon></a>
            <a href="#"><ion-icon name="logo-skype"></ion-icon></a>
        </div>
    </div>
</body>


</html>