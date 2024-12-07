<?php
include 'connect_database.php';
if ( isset($_GET['category_id']) ){

    $categoryId = intval($_GET['category_id']); // Đảm bảo kiểu số nguyên cho id danh mục


    // Tạo kết nối
    $conn = connect_database();

    $sql = "
    SELECT 
        s.id, 
        s.name, 
        s.price, 
        (SELECT img_path FROM hinhanhsanpham WHERE idsp = s.id ORDER BY id ASC LIMIT 1) AS first_image
    FROM 
        sanpham s
    WHERE 
        s.iddm = ?
";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $categoryId);
    $stmt->execute();
    $result = $stmt->get_result();

    $products = [];
    while ($row = $result->fetch_assoc()) {
        $products[] = $row;
    }

    if (!empty($products)) {
        foreach ($products as $product) {
            echo '<div class="category-right-content-item1" data-id="' . $product['id'] . '">';
                echo "<img src='" . $product['first_image'] . "' alt='Product Image'>";
                echo '<h1>' . $product['name'] . '</h1>';
                echo '<p id="price">' . number_format($product['price'], 0, ',', '.') . ' đ</p>';
                echo '</div>';
        }
    } else {
        echo '<p>Không có sản phẩm nào trong danh mục này.</p>';
    }

    $conn->close();
    $stmt->close();
}

?>