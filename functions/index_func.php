<?php
include 'connect_database.php';
function getIdexData(){
    if (isset($_GET['category_id'])) {
        $categoryId = intval($_GET['category_id']);  // Đảm bảo kiểu số nguyên cho id danh mục
        $name = $_GET['name'];
        $page = isset($_GET['page']) ? intval($_GET['page']) : 1;  // Lấy trang hiện tại, mặc định là trang 1
        $limit = 6;  // Số sản phẩm mỗi trang
        $offset = ($page - 1) * $limit;  // Tính toán offset
    
        $conn = connect_database();
    
        // Truy vấn để lấy sản phẩm với LIMIT và OFFSET
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
        LIMIT ? OFFSET ?
        ";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("iii", $categoryId, $limit, $offset);
        $stmt->execute();
        $result = $stmt->get_result();
    
        $products = [];
        while ($row = $result->fetch_assoc()) {
            $products[] = $row;
        }
    
        // Truy vấn để tính tổng số sản phẩm trong danh mục
        $sql_count = "SELECT COUNT(*) AS total FROM sanpham WHERE iddm = ?";
        $stmt_count = $conn->prepare($sql_count);
        $stmt_count->bind_param("i", $categoryId);
        $stmt_count->execute();
        $count_result = $stmt_count->get_result();
        $total_products = $count_result->fetch_assoc()['total'];
        $total_pages = ceil($total_products / $limit);  // Tính tổng số trang
    
        if (!empty($products)) {
            foreach ($products as $product) {
                echo '<div class="category-right-content-item1" data-id="' . $product['id'] . '">';
                echo "<img src='" . $product['first_image'] . "' alt='Product Image'>";
                echo '<h1>' . $product['name'] . '</h1>';
                echo '<p id="price">' . number_format($product['price'], 0, ',', '.') . ' đ</p>';
                echo '</div>';
            }

    
            // Hiển thị nút phân trang
            echo '<div class="pagination">';
            for ($i = 1; $i <= $total_pages; $i++) {
                if ($i == $page) {
                    echo '<a href="?category_id=' . $categoryId . '&name=' . $name . '&page=' . $i . '" style="color: red; font-weight: bold;">' . $i . '</a> ';
                } else {
                    echo '<a href="?category_id=' . $categoryId . '&name=' . $name . '&page=' . $i . '">' . $i . '</a> ';
                }
            }
            echo '</div>';
        } else {
            echo '<p>Không có sản phẩm nào trong danh mục này.</p>';
        }
    
        $conn->close();
        $stmt->close();
        $stmt_count->close();
    }
}

function sort_load(){
    if (isset($_GET['sort']) && isset($_GET['name'])) {
        $sortType = $_GET['sort'];
        $categoryName = $_GET['name'];
        $conn = connect_database();
        $sortOrder = ($sortType == "desc") ? "DESC" : "ASC";
        $itemsPerPage = 6;
    
        // Xác định trang hiện tại, mặc định là 1
        $currentPage = isset($_GET['page']) ? intval($_GET['page']) : 1;
        $offset = ($currentPage - 1) * $itemsPerPage;
    
        // Đếm tổng số sản phẩm trong danh mục này
        $sql_count = "
            SELECT COUNT(*) as total 
            FROM sanpham s 
            JOIN danhmuc d ON s.iddm = d.id 
            WHERE d.name = ?
        ";
        $stmt_count = $conn->prepare($sql_count);
        $stmt_count->bind_param("s", $categoryName);
        $stmt_count->execute();
        $result_count = $stmt_count->get_result();
        $totalItems = $result_count->fetch_assoc()['total'];
        $totalPages = ceil($totalItems / $itemsPerPage);
    
        // Truy vấn sản phẩm có phân trang
        $sql = "
            SELECT 
                s.id, 
                s.name, 
                s.price, 
                (SELECT img_path FROM hinhanhsanpham WHERE idsp = s.id ORDER BY id ASC LIMIT 1) AS first_image,
                d.name AS category_name
            FROM 
                sanpham s
            JOIN 
                danhmuc d ON s.iddm = d.id
            WHERE 
                d.name = ?
            ORDER BY 
                s.price $sortOrder
            LIMIT ? OFFSET ?
        ";
    
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sii", $categoryName, $itemsPerPage, $offset);
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
    
        // Hiển thị nút phân trang
        echo '<div class="pagination">';
        for ($i = 1; $i <= $totalPages; $i++) {
            if ($i != $currentPage) {
                echo '<a href="category.php?name=' . urlencode($categoryName) . '&sort=' . $sortType . '&page=' . $i . '">' . $i . '</a> ';
            } else {
                echo '<a href="category.php?name=' . urlencode($categoryName) . '&sort=' . $sortType . '&page=' . $i . '" style="color: red; font-weight: bold;">' . $i . '</a> ';
            }
        }        
        echo '</div>';
    
        $stmt->close();
        $stmt_count->close();
        $conn->close();
    }    
}

function printName(){
    
    // Giả sử bạn đã lấy giá trị của $name từ URL
    $name = isset($_GET['name']) ? htmlspecialchars($_GET['name']) : '';

    // Kiểm tra nếu $name tồn tại và không rỗng
    if (!empty($name)) {
        echo $name; // Hiển thị tên nếu tồn tại
    } else {
        echo "Không có tên sản phẩm."; // Thông báo nếu không có tên
    }
}

function get_hot_sanpham(){

    // Tạo kết nối
    $conn = connect_database();

    $sql = "
    SELECT 
        s.id, 
        s.name, 
        s.price, 
        s.mota, 
        s.luotxem,
        (SELECT GROUP_CONCAT(img_path) FROM hinhanhsanpham WHERE idsp = s.id) AS all_images
    FROM 
        sanpham s
    ORDER BY 
        s.luotxem DESC
    LIMIT 4
";

    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();

    // Xử lý kết quả
    while ($row = $result->fetch_assoc()) {
        // Tách chuỗi all_images thành mảng
        $images = explode(',', $row['all_images']);
        
        // Hiển thị sản phẩm
        // Hiển thị sản phẩm
        echo '<div class="sp">';
        echo '    <div class="anhsp"><a href="chitiet.php?id=' . $row['id'] . '"><img src="' . $images[0] . '" alt="Sản phẩm chính"></a></div>';
        echo '    <div class="spcungloai">';

        // Hiển thị ảnh cùng loại (tất cả ảnh)
        foreach ($images as $image) {
            echo '        <div class="anhspcungloai"><a href="chitiet.php?id=' . $row['id'] . '"><img src="' . $image . '" alt="Sản phẩm" style="max-width: 100px;"></a></div>';
        }
        echo '    </div>';
        echo '    <div class="ten-giasp">';
        echo '        <a href="chitiet.php?id=' . $row['id'] . '" class="tensp">' . $row['name'] . '</a><br/>';
        echo '        <span class="giatien">' . number_format($row['price'], 0, ',', '.') . 'đ</span>';
        echo '    </div>';
        echo '</div>';

    }

    $conn->close();
    $stmt->close();
}

function get_last_sanpham(){

    // Tạo kết nối
    $conn = connect_database();

    $sql = "
    SELECT 
        s.id, 
        s.name, 
        s.price, 
        (SELECT GROUP_CONCAT(img_path) FROM hinhanhsanpham WHERE idsp = s.id) AS all_images
    FROM 
        sanpham s
    ORDER BY 
        s.id DESC  -- Sắp xếp theo id giảm dần
    LIMIT 4
";



    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();

    // Xử lý kết quả
    while ($row = $result->fetch_assoc()) {
        // Tách chuỗi all_images thành mảng
        $images = explode(',', $row['all_images']);
        
       // Hiển thị sản phẩm
        echo '<div class="sp">';
        echo '    <div class="anhsp"><a href="chitiet.php?id=' . $row['id'] . '"><img src="' . $images[0] . '" alt="Sản phẩm chính"></a></div>';
        echo '    <div class="spcungloai">';

        // Hiển thị ảnh cùng loại (tất cả ảnh)
        foreach ($images as $image) {
            echo '        <div class="anhspcungloai"><a href="chitiet.php?id=' . $row['id'] . '"><img src="' . $image . '" alt="Sản phẩm" style="max-width: 100px;"></a></div>';
        }

        echo '    </div>';
        echo '    <div class="ten-giasp">';
        echo '        <a href="chitiet.php?id=' . $row['id'] . '" class="tensp">' . $row['name'] . '</a><br/>';
        echo '        <span class="giatien">' . number_format($row['price'], 0, ',', '.') . 'đ</span>';
        echo '    </div>';
        echo '</div>';

    }

    $conn->close();
    $stmt->close();
}

function get_high_rate_sanpham(){

    // Tạo kết nối
    $conn = connect_database();

    $sql = "
    SELECT 
        s.id, 
        s.name, 
        s.price, 
        s.mota, 
        s.luotxem,
        (SELECT GROUP_CONCAT(img_path) FROM hinhanhsanpham WHERE idsp = s.id) AS all_images
    FROM 
        sanpham s
    ORDER BY 
        s.danhGia DESC
    LIMIT 4
";

    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();

    // Xử lý kết quả
    while ($row = $result->fetch_assoc()) {
        // Tách chuỗi all_images thành mảng
        $images = explode(',', $row['all_images']);
        
        // Hiển thị sản phẩm
        // Hiển thị sản phẩm
        echo '<div class="sp">';
        echo '    <div class="anhsp"><a href="chitiet.php?id=' . $row['id'] . '"><img src="' . $images[0] . '" alt="Sản phẩm chính"></a></div>';
        echo '    <div class="spcungloai">';

        // Hiển thị ảnh cùng loại (tất cả ảnh)
        foreach ($images as $image) {
            echo '        <div class="anhspcungloai"><a href="chitiet.php?id=' . $row['id'] . '"><img src="' . $image . '" alt="Sản phẩm" style="max-width: 100px;"></a></div>';
        }
        echo '    </div>';
        echo '    <div class="ten-giasp">';
        echo '        <a href="chitiet.php?id=' . $row['id'] . '" class="tensp">' . $row['name'] . '</a><br/>';
        echo '        <span class="giatien">' . number_format($row['price'], 0, ',', '.') . 'đ</span>';
        echo '    </div>';
        echo '</div>';

    }

    $conn->close();
    $stmt->close();
}



function get_ket_qua() {
    if (isset($_GET['name'])) {
        $name = $_GET['name'];
        $conn = connect_database();

        $itemsPerPage = 6;

        // Xác định trang hiện tại, mặc định là trang 1
        $currentPage = isset($_GET['page']) ? intval($_GET['page']) : 1;
        $offset = ($currentPage - 1) * $itemsPerPage;

        // Tính tổng số sản phẩm cho từ khóa tìm kiếm
        $sql_count = "
            SELECT COUNT(*) as total 
            FROM sanpham s 
            WHERE s.name LIKE ?
        ";
        $stmt_count = $conn->prepare($sql_count);
        $searchTerm = '%' . $name . '%';
        $stmt_count->bind_param("s", $searchTerm);
        $stmt_count->execute();
        $result_count = $stmt_count->get_result();
        $totalItems = $result_count->fetch_assoc()['total'];
        $totalPages = ceil($totalItems / $itemsPerPage);

        // Truy vấn sản phẩm có phân trang
        $sql = "
            SELECT 
                s.id, 
                s.name, 
                s.price, 
                (SELECT img_path FROM hinhanhsanpham WHERE idsp = s.id ORDER BY id ASC LIMIT 1) AS first_image
            FROM 
                sanpham s
            WHERE 
                s.name LIKE ?
            LIMIT ? OFFSET ?
        ";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sii", $searchTerm, $itemsPerPage, $offset);
        $stmt->execute();
        $result = $stmt->get_result();

        $products = [];
        while ($row = $result->fetch_assoc()) {
            $products[] = $row;
        }

        
        if (count($products) > 0) {
            $productsToShow = count($products) < $itemsPerPage ? array_slice($products, 0, 3) : $products;

            foreach ($productsToShow as $product) {
                echo '<div class="category-right-content-item1" data-id="' . $product['id'] . '">';
                echo "<img src='" . $product['first_image'] . "' alt='Product Image'>";
                echo '<h1>' . $product['name'] . '</h1>';
                echo '<p id="price">' . number_format($product['price'], 0, ',', '.') . ' đ</p>';
                echo '</div>';
            }
        } else {
            echo '<p>Không có sản phẩm nào phù hợp với từ khóa tìm kiếm.</p>';
        }

        if ( $totalPages != 1 ){
        // Hiển thị nút phân trang
        echo '<div class="pagination">';
        for ($i = 1; $i <= $totalPages; $i++) {
            if ($i == $currentPage) {
                echo '<a href="?name=' . urlencode($name) . '&page=' . $i . '" style="color: red; font-weight: bold;">' . $i . '</a> ';
            } else {
                echo '<a href="?name=' . urlencode($name) . '&page=' . $i . '">' . $i . '</a> ';
            }
        }
        echo '</div>';
        }

        $stmt->close();
        $stmt_count->close();
        $conn->close();
    }
}



function sort_load_tim_kiem() {
    if (isset($_GET['sort']) && isset($_GET['name'])) {
        $sortType = $_GET['sort'];
        $name = $_GET['name'];
        
        $conn = connect_database();
        
        $itemsPerPage = 6;
        $currentPage = isset($_GET['page']) ? intval($_GET['page']) : 1;
        $offset = ($currentPage - 1) * $itemsPerPage;
        
        $sortOrder = ($sortType == "desc") ? "DESC" : "ASC";
        
        // Tính tổng số sản phẩm cho tìm kiếm và sắp xếp
        $sql_count = "
            SELECT COUNT(*) as total 
            FROM sanpham s
            WHERE s.name LIKE ?
        ";
        $stmt_count = $conn->prepare($sql_count);
        $searchTerm = '%' . $name . '%';
        $stmt_count->bind_param("s", $searchTerm);
        $stmt_count->execute();
        $result_count = $stmt_count->get_result();
        $totalItems = $result_count->fetch_assoc()['total'];
        $totalPages = ceil($totalItems / $itemsPerPage);
        
        // Truy vấn sản phẩm có phân trang và sắp xếp
        $sql = "
            SELECT 
                s.id, 
                s.name, 
                s.price, 
                (SELECT img_path FROM hinhanhsanpham WHERE idsp = s.id ORDER BY id ASC LIMIT 1) AS first_image
            FROM 
                sanpham s
            WHERE 
                s.name LIKE ?
            ORDER BY 
                s.price $sortOrder
            LIMIT ? OFFSET ?
        ";
        
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sii", $searchTerm, $itemsPerPage, $offset);
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
            echo '<p>Không có sản phẩm nào phù hợp với từ khóa tìm kiếm.</p>';
        }
        
        // Hiển thị các nút chuyển trang
        echo '<div class="pagination">';
        for ($i = 1; $i <= $totalPages; $i++) {
            if ( $i == $currentPage ) echo '<a href="?name=' . urlencode($name) . '&sort=' . $sortType . '&page=' . $i . '" style="color: red; font-weight: bold;">' . $i . '</a> ';
            else echo '<a href="?name=' . urlencode($name) . '&sort=' . $sortType . '&page=' . $i . '">' . $i . '</a> ';
        }
        echo '</div>';
        
        $stmt->close();
        $stmt_count->close();
        $conn->close();
    }
}


?>

