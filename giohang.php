<?php
session_start();
include 'functions/auth.php';
include 'functions/cart_func.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ hàng</title>
    <link rel="stylesheet" href="css/styleShoppingCart.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="js/jquery3.7.1.js"></script>
    <script src="js/shoppingCartScript.js"></script>
</head>
<body>

<div class="shop7">
        <header class="header">
            <div class="gid">
                <nav class="header__bar">
                        <ul class="header__bar-list">
                            <li class="header__bar-list-items header__bar-list-items-separate"><i class="fa-solid fa-phone"></i></li>
                            <li class="header__bar-list-items header__bar-list-items-separate">Hotline: 0949819714</li>
                        </ul>
                    
                        <ul class="header__bar-list">
                            <li class="header__bar-list-items">
                                <a href="#" class="header__bar-list-items-link">Chính sách khách vip</a>
                            </li>
                            <li class="header__bar-list-items">
                                <a href="#" class="header__bar-list-items-link">Cách chọn Size</a>
                            </li>
                            <li class="header__bar-list-items">
                                <a href="#" class="header__bar-list-items-link">Giới thiệu</a>
                            </li>
                        </ul>
    
                </nav>
                
            </div>
        </header>

        <!--Than Web-->
        <div class="container">
            <nav class="menu">
                <div class="container__menu-logo">
                    <a href="index.php" ><img class="container__menu-logo-photo"  src="image/logo2.jpg"></a>
                </div>
                
                <ul class="container__menu-list">
                        <li class="container__menu-list-items container__menu-list-items-hover">
                            Áo Nam
                            <div class="container__submenu">
                                <div class="container__submenu-item" data-id="1" name="Áo sơ mi">Áo sơ mi</div>
                                <div class="container__submenu-item" data-id="3" name="Áo thun">Áo thun</div>
                                <div class="container__submenu-item" data-id="2" name="Áo Polo & Rugby Shirt">Áo Polo & Rugby Shirt</div>
                                <div class="container__submenu-item" data-id="5" name="Áo Hoodie & Sweatshirt">Áo Hoodie & Sweatshirt</div>
                                <div class="container__submenu-item" data-id="4" name="Áo khoác">Áo khoác</div>
                                <div class="container__submenu-item" data-id="6" name="Áo Vest & Ghi Lê">Áo Vest & Ghi Lê</div>
                                <div class="container__submenu-item" data-id="7" name="Áo len">Áo len</div>
                            </div>
                        </li>
                        <li class="container__menu-list-items container__menu-list-items-hover">
                            Quần Nam
                            <div class="container__submenu">
                                <div class="container__submenu-item" data-id="8" name="Quần jeans">Quần jeans</div>
                                <div class="container__submenu-item" data-id="9" name="Quần tây">Quần tây</div>
                                <div class="container__submenu-item" data-id="10" name="Quần kaki">Quần kaki</div>
                                <div class="container__submenu-item" data-id="11" name="Quần jogger">Quần jogger</div>
                                <div class="container__submenu-item" data-id="12" name="Quần short">Quần short</div>
                                <div class="container__submenu-item" data-id="13" name="Quần lót">Quần lót</div>
                            </div>
                        </li>
                        <li class="container__menu-list-items container__menu-list-items-hover">
                            Phụ Kiện
                            <div class="container__submenu">
                                <div class="container__submenu-item" data-id="14" name="Giày Dép">Giày Dép</div>
                                <div class="container__submenu-item" data-id="15" name="Thắt lưng">Thắt lưng</div>
                                <div class="container__submenu-item" data-id="16" name="Ví da">Ví da</div> 
                                <div class="container__submenu-item" data-id="17" name="Cà Vạt & Nơ">Cà Vạt & Nơ</div>
                                <div class="container__submenu-item" data-id="18" name="Vớ nam">Vớ nam</div>
                                <div class="container__submenu-item" data-id="19" name="Mũ nón">Mũ nón</div>
                                <div class="container__submenu-item" data-id="20" name="Túi xách">Túi xách</div>
                            </div>
                        </li>
                        <?php getAuthList(); ?>
                    </ul>
                
                <div class="container_menu-congcu">
                    <div class="container_menu-congcu-topsearch">
                        <input type="text" id="search-box"  placeholder="Tìm kiếm">
                        <i class="fa-solid fa-magnifying-glass" id="search-icon"></i>
                    </div>
                    <div class="container_menu-congcu-package"><i id="cart-icon" class="fa-solid fa-cart-shopping"></i></div>
                </div>
            </nav>

        </div>   
    </div> 

    <script src="js/dulieutinhthanh.js"></script>
    <script>
        $(document).ready(function () {
            loadProvinces();

            // Xử lý khi chọn tỉnh thành
            $("#tinh").on("change", function () {
                updateDistricts($(this).val());
            });
        });

        function loadProvinces() {
            const $provinceSelect = $("#tinh");
            for (const province in locations) {
                $provinceSelect.append(`<option value="${province}">${province}</option>`);
            }
        }

        function updateDistricts(selectedProvince) {
            const $districtSelect = $("#huyen");
            $districtSelect.empty().append('<option value="">--- Chọn quận huyện ---</option>');

            if (selectedProvince && locations[selectedProvince]) {
                locations[selectedProvince].forEach(district => {
                    $districtSelect.append(`<option value="${district}">${district}</option>`);
                });
            }
        }
    </script>
    <div class="container1">
        <!--Cần thêm data vào các input field-->
        <div class="checkout-form">
            <h2>Thông tin liên hệ giao hàng</h2>
            <form id="checkout-form">
                <input type="text" id="fullname" placeholder="Họ và tên *" required>
                <input type="email" id="email" placeholder="Email (Không bắt buộc)" maxlength="100">
                <input type="tel" id="phonenumber" placeholder="Số điện thoại *" required maxlength="12">

                <h3>Địa chỉ giao hàng</h3>
                <select required id="tinh" onchange="updateDistricts()">
                    <option value="">--- Chọn tỉnh thành ---</option>
                </select>
                <select required id="huyen">
                    <option value="">--- Chọn quận huyện ---</option>
                </select>

                <input type="text" id="xa" placeholder="Tên phường/Xã *" required>
                <input type="text" id="nha" placeholder="Số nhà, tên đường *" required>
                <textarea placeholder="Ghi chú" id="note"></textarea>
                
                <h3>Hình thức thanh toán</h3>
                <div class="payment-methods">
                    <label>
                        <input class="payment-money" type="radio" id="COD" name="payment" value="COD" required>
                        <div class="payment-option">
                            <div>
                                <div class="main-text">COD</div>
                                <div class="sub-text">Thanh toán khi nhận hàng</div>
                            </div>
                        </div>
                    </label>
                    <br/>
                    <label>
                        <input type="radio" name="payment" id="tienmat" value="cash">
                        <div class="payment-option">
                            <div>
                                <div class="main-text">Tiền mặt</div>
                                <div class="sub-text">Chỉ áp dụng khi mua hàng tại shop</div>
                            </div>
                        </div>
                    </label>
                </div>
                <button id="submit-btn" class="checkout-button"  value="Thanh toán 498K"></button>
            </form>
        </div>

        <!--Cần thay đổi cho phù hợp backend-->
        <div class="cart-summary">
            <h2>Giỏ hàng của bạn</h2>
            <?php get_cart_items(); ?>
            <div class="discount-code">
                <h3>Mã giảm giá (nếu có)</h3>
                <input type="text" placeholder="Nhập mã giảm giá" class="ma-giam-gia" id="magiamgia">
                <button class="apply-button">Áp dụng</button>
            </div>
            <div class="total-summary">
                <p>Số tiền mua sản phẩm: 498.000 ₫</p>
                <p>Phí vận chuyển: Free</p>
                <p class="total">Tổng tiền thanh toán: 498.000 ₫</p>
            </div>
        </div>
    </div>

    <script src="js/giohang.js"></script>
    <script>
    $(document).ready(function() {
        $("#submit-btn").on("click", function (event) {
        event.preventDefault(); // Ngăn chặn gửi mặc định của form

        // Lấy dữ liệu từ các trường và gộp địa chỉ thành một chuỗi
        const fullname = $("#fullname").val().trim();
        const email = $("#email").val().trim();
        const phonenumber = $("#phonenumber").val().trim();
        const tinh = $("#tinh").val().trim();
        const huyen = $("#huyen").val().trim();
        const xa = $("#xa").val().trim();
        const nha = $("#nha").val().trim();
        const address = nha + ", " + xa + ", " + huyen + ", " + tinh; // Gộp thành chuỗi địa chỉ
        const payment = $("input[name='payment']:checked").val();
        const note = $("#note").val().trim();
        const discountCode = $("#magiamgia").val().trim();

        // Kiểm tra nếu các trường bắt buộc bị bỏ trống
        if (!fullname || !email || !phonenumber || !tinh || !huyen || !xa || !nha || !payment) {
            alert("Vui lòng nhập đầy đủ thông tin bắt buộc.");
            return; // Dừng việc gửi dữ liệu
        }

        // Tạo chuỗi dữ liệu với encodeURIComponent để đảm bảo an toàn cho URL
        const formData = "fullname=" + encodeURIComponent(fullname) +
            "&email=" + encodeURIComponent(email) +
            "&phonenumber=" + encodeURIComponent(phonenumber) +
            "&address=" + encodeURIComponent(address) +
            "&payment=" + encodeURIComponent(payment) +
            "&note=" + encodeURIComponent(note) +
            "&discountCode=" + encodeURIComponent(discountCode);

        console.log(formData);

        // Gửi dữ liệu qua AJAX
        $.ajax({
            url: "functions/add_order.php", // Đường dẫn tới file xử lý PHP
            type: "POST",
            data: formData, // Gửi dưới dạng chuỗi
            success: function (response) {
                // Xử lý phản hồi từ server
                if (response.trim() === "Đơn hàng của bạn đã được tạo thành công.") {
                    alert(response); // Hiển thị thông báo thành công
                    window.location.href = "giohang.php";
                } else {
                    alert(response); // Hiển thị thông báo lỗi từ server (nếu có)
                }
            },
            error: function (xhr, status, error) {
                console.error("Error:", error);
                alert("Đã xảy ra lỗi khi gửi dữ liệu.");
            }
        });
    });

    });
    </script>
    
</body>
</html>
