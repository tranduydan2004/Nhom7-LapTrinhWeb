<?php
include 'connect_database.php';
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
        create_at DESC  -- Đảm bảo sử dụng cùng tên cột
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
?>