<?php
session_start();
include 'connect_database.php'; // File chứa kết nối tới database

// Kiểm tra xem có phải là POST request không
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy dữ liệu từ form
    $fullname = isset($_POST['fullname']) ? $_POST['fullname'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $phonenumber = isset($_POST['phonenumber']) ? $_POST['phonenumber'] : '';
    $address = isset($_POST['address']) ? $_POST['address'] : '';
    $payment_method = isset($_POST['payment']) ? $_POST['payment'] : '';
    $note = isset($_POST['note']) ? $_POST['note'] : '';
    $discountCode = isset($_POST['discountCode']) ? strtoupper($_POST['discountCode']) : '';

    // Lấy id người dùng từ session
    $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 0;

    // Kiểm tra session
    if ($user_id == 0) {
        echo "Bạn cần đăng nhập để đặt hàng.";
        exit;
    }

    $conn = connect_database();

    // Truy vấn thông tin giỏ hàng của người dùng
    $product_info = '';
    $total_amount = 0;

    $query = "SELECT giohang.idsp, giohang.soluong, giohang.kichthuoc, sanpham.name, sanpham.price
              FROM giohang
              JOIN sanpham ON giohang.idsp = sanpham.id
              WHERE giohang.iduser = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Xử lý thông tin sản phẩm
    while ($row = $result->fetch_assoc()) {
        $name = $row['name'];
        $quantity = $row['soluong'];
        $size = $row['kichthuoc'];
        $price = $row['price'];
        $subtotal = $price * $quantity;

        // Tạo chuỗi thông tin sản phẩm
        $product_info .= "$name, Số lượng: $quantity, Kích thước: $size, Giá: " . number_format($subtotal, 0, ',', '.') . "đ\n";
        $total_amount += $subtotal;
    }

    // Kiểm tra nếu giỏ hàng trống
    if (empty($product_info)) {
        echo "Giỏ hàng của bạn trống.";
        exit;
    }

    // Kiểm tra mã giảm giá
    if (!empty($discountCode)) {
        $sql_discount = "SELECT amount FROM discount_codes WHERE code = ? and is_active = 1";
        $stmt_discount = $conn->prepare($sql_discount);
        $stmt_discount->bind_param("s", $discountCode);
        $stmt_discount->execute();
        $result_discount = $stmt_discount->get_result();

        if ($result_discount->num_rows > 0) {
            $discount = $result_discount->fetch_assoc();
            $discountValue = $discount['amount'];
            $total_amount -= (($discountValue/100)*$total_amount); // Áp dụng giảm giá
        }
    }

    // Thêm đơn hàng vào bảng order_info
    $order_query = "INSERT INTO order_info (fullname, email, phone_number, address, products, notes, payment_method, discount_code, total_amount, created_at, iduser)
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, NOW(), ?)";
    $order_stmt = $conn->prepare($order_query);
    $order_stmt->bind_param("ssssssssdi", $fullname, $email, $phonenumber, $address, $product_info, $note, $payment_method, $discountCode, $total_amount, $user_id);

    if ($order_stmt->execute()) {
        // Xóa dữ liệu giỏ hàng sau khi đã tạo đơn hàng thành công
        $delete_query = "DELETE FROM giohang WHERE iduser = ?";
        $delete_stmt = $conn->prepare($delete_query);
        $delete_stmt->bind_param("i", $user_id);
        $delete_stmt->execute();

        echo "Đơn hàng của bạn đã được tạo thành công.";
    } else {
        echo "Đã xảy ra lỗi khi tạo đơn hàng. Vui lòng thử lại.";
    }
} else {
    echo "Dữ liệu không hợp lệ.";
}
?>
