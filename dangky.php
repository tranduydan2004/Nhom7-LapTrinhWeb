<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký</title>
    <link rel="stylesheet" href="css/login_4men.css">
    <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
    <script src="js/jquery3.7.1.js"></script>
    <script>
    $(document).ready(function () {
        $("#register-btn").on("click", function (e) {
            e.preventDefault(); // Ngăn form tải lại trang

            // Lấy giá trị từ các trường
            const name = $("#name").val();
            const email = $("#email").val();
            const sodienthoai = $("#sodienthoai").val();
            const pass1 = $("#pass1").val();
            const pass2 = $("#pass2").val();

            // Kiểm tra mật khẩu nhập lại có khớp không
            if (pass1 !== pass2) {
                alert("Mật khẩu nhập lại không khớp.");
                return;
            }

            // Gửi dữ liệu qua AJAX
            $.ajax({
                url: 'functions/dangky_func.php',
                type: 'POST',
                data: {
                    name: name,
                    email: email,
                    sodienthoai: sodienthoai,
                    password: pass1
                },
                success: function (response) {
                    const trimmedResponse = response.trim();
                    if (trimmedResponse === "Success") {
                        alert("Đăng ký thành công!");
                        window.location.href = "dangnhap.php"; // Chuyển tới trang đăng nhập
                    } else {
                        alert(trimmedResponse); // Hiển thị lỗi từ server
                    }
                },
                error: function () {
                    alert("Có lỗi xảy ra. Vui lòng thử lại.");
                }
            });
        });
    });
    </script>
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
    <div class="form">
        <h2>Đăng ký</h2>
        <input type="name" name="name" id="name" placeholder="Nhập tên người dùng">
        <input type="email" name="email" id="email" placeholder="Nhập Email của bạn">
        <input type="text" name="sodienthoai" id="sodienthoai" placeholder="Nhập số của bạn">
        <input type="password" name="password" id="pass1"  placeholder="Nhập mật khẩu">
        <input type="password" name="password" id="pass2"  placeholder="Nhập lại mật khẩu">
        <button class="btnn" id="register-btn"><strong>Đăng ký</strong></button>

        <p class="link"> Nếu có tài khoản<br>
        <a href="dangnhap.php">Đăng Nhập</a> ở đây<br><br>
        <a href="index.php">Trở về trang chủ</a></p>
    </div>
    
</body>
</html>