<?php
session_start(); // Bắt đầu phiên làm việc

// Kiểm tra nếu người dùng đã đăng nhập và có session 'user_id'
if (!isset($_SESSION['user_id'])) {
    die('Bạn chưa đăng nhập. Vui lòng đăng nhập trước.');
}

include 'functions/connect_database.php';
$conn = connect_database();

// Lấy iduser từ session
$iduser = $_SESSION['user_id'];

// Lấy thông tin đơn hàng từ cơ sở dữ liệu
$sql_select = "SELECT * FROM order_info WHERE iduser = '$iduser' ORDER BY created_at DESC";
$result = $conn->query($sql_select);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin đơn hàng</title>
    <style>
        .back-button {
            padding: 10px 20px;
            background-color: #28a745;
            color: white;
            text-decoration: none;
            border: none;
            cursor: pointer;
            display: inline-block;
            margin: 20px 0;
        }
        .back-button:hover {
            background-color: #218838;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
    </style>
</head>
<body>

    <!-- Nút quay lại trang chủ -->
    <a href="index.php" class="back-button">Quay lại Trang Chủ</a>

    <h2>Thông tin đơn hàng</h2>

    <!-- Bảng hiển thị thông tin đơn hàng -->
    <table>
        <thead>
            <tr>
                <th>Họ và tên</th>
                <th>Email</th>
                <th>Số điện thoại</th>
                <th>Địa chỉ</th>
                <th>Sản phẩm</th>
                <th>Ghi chú</th>
                <th>Hình thức thanh toán</th>
                <th>Mã giảm giá</th>
                <th>Tổng tiền</th>
                <th>Ngày tạo</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                        <td>" . $row['fullname'] . "</td>
                        <td>" . $row['email'] . "</td>
                        <td>" . $row['phone_number'] . "</td>
                        <td>" . $row['address'] . "</td>
                        <td>" . $row['products'] . "</td>
                        <td>" . $row['notes'] . "</td>
                        <td>" . $row['payment_method'] . "</td>
                        <td>" . $row['discount_code'] . "</td>
                        <td>" . number_format($row['total_amount'], 0, ',', '.') . "đ</td>
                        <td>" . $row['created_at'] . "</td>
                    </tr>";
                }
            } else {
                echo "<tr><td colspan='11'>Không có đơn hàng nào.</td></tr>";
            }
            ?>
        </tbody>
    </table>

</body>
</html>

<?php
// Đóng kết nối cơ sở dữ liệu
$conn->close();
?>
