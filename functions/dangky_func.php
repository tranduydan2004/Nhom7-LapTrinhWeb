<?php
include 'connect_database.php'; // Kết nối với database
$conn = connect_database();

// Nhận dữ liệu từ AJAX
$name = isset($_POST['name']) ? $_POST['name'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$sodienthoai = isset($_POST['sodienthoai']) ? $_POST['sodienthoai'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';

// Kiểm tra dữ liệu
if (empty($name) || empty($email) || empty($sodienthoai) || empty($password)) {
    echo "Vui lòng điền đầy đủ thông tin.";
    exit;
}

// Kiểm tra tên người dùng hoặc email đã tồn tại
$sql_check = "SELECT * FROM taikhoan WHERE username = ? OR email = ?";
$stmt_check = $conn->prepare($sql_check);
$stmt_check->bind_param("ss", $name, $email);
$stmt_check->execute();
$result = $stmt_check->get_result();

if ($result->num_rows > 0) {
    echo "Tên người dùng hoặc email đã được đăng ký.";
    exit;
}

// Thêm người dùng vào cơ sở dữ liệu
$sql_insert = "INSERT INTO taikhoan (username, pass, email, tel) VALUES (?, ?, ?, ?)";
$stmt_insert = $conn->prepare($sql_insert);
$stmt_insert->bind_param("ssss", $name, $password, $email, $sodienthoai);

if ($stmt_insert->execute()) {
    echo "Success";
} else {
    echo "Có lỗi xảy ra khi đăng ký. Vui lòng thử lại.";
}

$conn->close();
?>
