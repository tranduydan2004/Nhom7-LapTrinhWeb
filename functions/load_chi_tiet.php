<?php
include 'connect_database.php';

function get_hinh_anh_chi_tiet(){
    if (isset($_GET['id'])) {
        $product_id = $_GET['id'];
        

    // Tạo kết nối
    $conn = connect_database();

    $sql = "
    SELECT 
        s.id, 
        h.img_path 
    FROM 
        sanpham s
    JOIN 
        hinhanhsanpham h ON h.idsp = s.id
    WHERE 
        s.id = ?
";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $product_id);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            $images = [];
    
            // Lấy thông tin sản phẩm và ảnh
            while ($row = $result->fetch_assoc()) {
                $images[] = $row['img_path']; // Lưu tất cả các img_path vào mảng
            }
        }

        // Hiển thị ảnh lớn
        if (!empty($images)) {
            echo '<div class="col-21" data-id="' .$product_id .'">';
            echo '<img src="' . $images[0] . '" id="ProductImg" alt="Ảnh Chính">';
            echo '<div class="small-img-row1">';

            // Hiển thị ảnh nhỏ
            foreach ($images as $image) {
                echo '<div class="small-img-col1">';
                echo '<img src="' . $image . '" class="small-img" alt="Ảnh Nhỏ" onclick="changeImage(this.src)">';
                echo '</div>';
            }

            echo '</div>';
            echo '</div>';
        }
        else {
            echo 'Sản phẩm không tồn tại.';
        }

    }
}

function get_thong_tin_chi_tiet(){
    if (isset($_GET['id'])) {
        $product_id = $_GET['id'];
        
    

    // Tạo kết nối
    $conn = connect_database();

    $sql = "
    SELECT 
    s.id, 
    s.name,
    s.price,
    s.mota,
    s.danhGia,
    s.sodanhgia,
    s.luotxem,
    s.iddm,
    d.name AS category_name  -- Lấy tên danh mục
FROM 
    sanpham s
JOIN 
    danhmuc d ON s.iddm = d.id  -- Kết nối với bảng danh mục
WHERE 
    s.id = ?
";

    // Chuẩn bị truy vấn
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $product_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $product = $result->fetch_assoc();
        
        // Hiển thị thông tin sản phẩm trong HTML
        echo '<div class="container-ngang">';
        echo '<p id="trangchu">Trang chủ</p>';
        echo '<p>\</p>';
        echo '<p id="danhmuc" data-id="'.$product['iddm'].'" name="'.$product['category_name'].'">' . $product['category_name'] . '</p>';
        echo '</div>';

        echo '<h1 id="tensp">' . $product['name'] . '</h1>';

        // Hiển thị đánh giá
        $fullStars = floor($product['danhGia']); // Số sao đầy
        $emptyStars = 5 - $fullStars; // Số sao rỗng
        echo '<div class="rating1">';
        for ($i = 0; $i < $fullStars; $i++) {
            echo '<span class="star1" style="color: #ff523b;">&#9733;</span>'; // Sao đầy
        }
        for ($i = 0; $i < $emptyStars; $i++) {
            echo '<span class="star1" style="color: #ff523b;">&#9734;</span>'; // Sao rỗng
        }
        echo '<span>(' . $product['danhGia'] . ')</span>';
        echo '<br>';
        echo '<span>(số đánh giá: ' . $product['sodanhgia'] . ' / lượt xem: ' . $product['luotxem'] . ')</span>';
        echo '</div>';

        // Hiển thị giá sản phẩm
        echo '<div class="container-ngang">';
        echo '<p><strong>Giá bán:</strong></p>';
        echo '<p id="giatien">' . number_format($product['price'], 0, ',', '.') . ' đ</p>';
        echo '</div>';
    } else {
        echo 'Sản phẩm không tồn tại.';
    }


    

    }
}

function get_mieu_ta_san_pham(){
    if (isset($_GET['id'])) {
        $product_id = $_GET['id'];
        
    // Tạo kết nối
    $conn = connect_database();

    $sql = "
    SELECT 
        s.id, 
        s.mota
    FROM 
        sanpham s
    WHERE 
        s.id = ?
";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $product_id);
        $stmt->execute();
        $result = $stmt->get_result();
        
        while ($row = $result->fetch_assoc()) {
            echo '<p id="chitiet">' .$row['mota'] .'</p>';
        }

    }
}

function tang_luot_xem(){
    if (isset($_GET['id'])) {
        $product_id = $_GET['id'];
        
    // Tạo kết nối
    $conn = connect_database();

    $sql_update_views = "UPDATE sanpham SET luotxem = luotxem + 1 WHERE id = ?";
    $stmt_update = $conn->prepare($sql_update_views);
    $stmt_update->bind_param("i", $product_id);
    $stmt_update->execute();
   
}
}

function get_binh_luan(){
    if (isset($_GET['id'])) {
        $product_id = $_GET['id'];
        
        // Tạo kết nối
        $conn = connect_database();
    
        $sql = "
        SELECT 
            ten, 
            danhgia, 
            binhluan,
            create_at  -- Đảm bảo tên cột chính xác
        FROM 
            binhluan 
        WHERE 
            idsp = ?
        ORDER BY 
            id DESC  -- Đảm bảo sử dụng cùng tên cột
        ";
    
    // Chuẩn bị và thực thi câu truy vấn
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $product_id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    // Duyệt qua các bình luận và lưu vào một mảng
    $comments = [];
    while ($row = $result->fetch_assoc()) {
    $comments[] = $row;
    }
    
    if ( !empty($comments) ){
        foreach ($comments as $comment) {
            echo '
                <div class="comment">
                    <p><strong>' . htmlspecialchars($comment['ten']) . '</strong> <span class="rating">' . str_repeat('★', $comment['danhgia']) . str_repeat('☆', 5 - $comment['danhgia']) . '</span></p>
                    <p>' . htmlspecialchars($comment['binhluan']) . '</p>
                </div>
            ';
        }
    }
    else echo '<P>Không có bình luận</p>';
    
    // Giải phóng bộ nhớ
    $conn ->close();
    $stmt->close();
   
}
}

?>