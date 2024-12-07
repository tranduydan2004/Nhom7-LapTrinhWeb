<?php
// Bắt đầu session nếu chưa có
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Xóa tất cả session
session_unset();

// Hủy session
session_destroy();

// Trả về thông báo đăng xuất thành công
echo "Logout successful";
?>
