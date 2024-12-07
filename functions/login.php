<?php
include 'connect_database.php';
session_start();

// Kết nối tới cơ sở dữ liệu
$conn = connect_database();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Tìm kiếm người dùng trong cơ sở dữ liệu
    $stmt = $conn->prepare("SELECT * FROM taikhoan WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        // So sánh mật khẩu trực tiếp
        if ($password === $user['pass']) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['username'];
            echo "Login successful";
            exit; // Dừng script để chuyển hướng thành công
        } else {
            echo "Sai mật khẩu!";
        }
    } else {
        echo "Người dùng không tồn tại!";
    }
}

$conn->close();
?>
