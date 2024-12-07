<?php
include 'connect_database.php';  // Kết nối với cơ sở dữ liệu
$conn = connect_database();

// Nhận mã giảm giá từ yêu cầu AJAX
$code = isset($_POST['code']) ? strtoupper(trim($_POST['code'])) : '';

// Kiểm tra mã giảm giá trong cơ sở dữ liệu
$sql = "SELECT amount, expiration FROM discount_codes WHERE code = ? AND is_active = 1";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $code);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $discount = $result->fetch_assoc();
    $expirationDate = new DateTime($discount['expiration']);
    $currentDate = new DateTime();

    if ($currentDate <= $expirationDate) {
        echo json_encode([
            "status" => "valid",
            "amount" => $discount['amount']
        ]);
    } else {
        echo json_encode(["status" => "expired"]);
    }
} else {
    echo json_encode(["status" => "invalid"]);
}

$conn->close();
?>
