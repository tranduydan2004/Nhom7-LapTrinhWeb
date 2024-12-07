<?php

function connect_database(){
    $servername = "localhost";  // Máy chủ MySQL, mặc định là localhost
    $username = "root";         // Tên đăng nhập MySQL, mặc định là "root" trong XAMPP
    $password = "";             // Mật khẩu MySQL, mặc định là trống trong XAMPP
    $dbname = "web_do_an";      // Tên cơ sở dữ liệu

    // Tạo kết nối
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Kết nối thất bại: " . $conn->connect_error);
    }

    return $conn;
}

?>