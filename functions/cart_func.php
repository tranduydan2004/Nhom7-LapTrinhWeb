<?php
include 'connect_database.php';

function get_cart_items(){
    $conn = connect_database();
    // Giả sử bạn đã có kết nối $conn đến cơ sở dữ liệu

    // Thay đổi giá trị $user_id với id người dùng cụ thể
    $user_id = $_SESSION['user_id'];

    // Câu truy vấn lấy dữ liệu giỏ hàng theo user_id
    $sql = "
        SELECT 
            giohang.idgiohang,
            sanpham.name AS ten_sp,            -- Tên sản phẩm
            sanpham.price,                     -- Giá sản phẩm
            MIN(hinhanhsanpham.img_path) AS img,    -- Đường dẫn ảnh
            giohang.soluong,
            giohang.kichthuoc
        FROM 
            giohang
        JOIN 
            sanpham ON giohang.idsp = sanpham.id
        JOIN 
            hinhanhsanpham ON giohang.idsp = hinhanhsanpham.idsp
        WHERE 
            giohang.iduser = ?
        GROUP BY 
            giohang.idgiohang, sanpham.name, sanpham.price, giohang.soluong, giohang.kichthuoc
    ";


    // Chuẩn bị và thực thi câu truy vấn
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $user_id); // Thay thế `?` bằng giá trị $user_id
    $stmt->execute();
    $result = $stmt->get_result();

    // Lấy dữ liệu và hiển thị kết quả
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '
            <div class="cart-item" data-id="'.$row['idgiohang'].'">
                <img src="'. $row["img"] .'" alt="Áo Sơ Mi">
                <div class="item-details">
                    <p>'. $row["ten_sp"].'</p>
                    <p>Size:'. $row["kichthuoc"] .'</p>
                    <input type="number" value="'. $row["soluong"] .'" min="1">
                    <p>'. number_format($row["price"], 0, ',', '.') .'đ</p>
                </div>
                <button class="remove-button">Xóa</button>
            </div>
            ';
        }
    } else {
        echo "Không có sản phẩm trong giỏ hàng.";
    }

    $stmt->close();
    }

?>