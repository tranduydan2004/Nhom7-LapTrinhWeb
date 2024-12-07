<?php
session_start();
include 'connect_database.php';
// Kiểm tra đăng nhập
if (!isset($_SESSION['user_id'])) {
    echo "Not logged in";
    exit;
}

// Nhận dữ liệu từ AJAX
$idsp = isset($_POST['id']) ? $_POST['id'] : null;
$size = isset($_POST['size']) ? $_POST['size'] : null;
$quantity = isset($_POST['quantity']) ? $_POST['quantity'] : null;
$iduser = $_SESSION['user_id'];  // Lấy id người dùng từ session

// Kiểm tra và xử lý dữ liệu
if ($idsp && $size && $quantity) {
    // Kiểm tra xem sản phẩm đã có trong giỏ hàng chưa
    $conn = connect_database();
    $sql_check = "SELECT * FROM giohang WHERE iduser = ? AND idsp = ? AND kichthuoc = ?";
    $stmt_check = $conn->prepare($sql_check);
    $stmt_check->bind_param("iis", $iduser, $idsp, $size);
    $stmt_check->execute();
    $result = $stmt_check->get_result();

    if ($result->num_rows > 0) {
        // Nếu sản phẩm đã có trong giỏ hàng, cập nhật lại số lượng và kích thước
        $row = $result->fetch_assoc();
        $new_quantity = $row['soluong'] + $quantity;  // Cộng số lượng

        $sql_update = "UPDATE giohang SET soluong = ?, kichthuoc = ? WHERE iduser = ? AND idsp = ? AND kichthuoc = ?";
        $stmt_update = $conn->prepare($sql_update);
        $stmt_update->bind_param("iisii", $new_quantity, $size, $iduser, $idsp, $size);
        $stmt_update->execute();
    } else {
        // Nếu sản phẩm chưa có trong giỏ hàng, thêm mới vào
        $sql_insert = "INSERT INTO giohang (idsp, iduser, soluong, kichthuoc) VALUES (?, ?, ?, ?)";
        $stmt_insert = $conn->prepare($sql_insert);
        $stmt_insert->bind_param("iiis", $idsp, $iduser, $quantity, $size);
        $stmt_insert->execute();
    }

    echo "Logged in";
} else {
    echo "Missing data";
}
?>
