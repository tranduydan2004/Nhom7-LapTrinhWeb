<?php
include 'connect_database.php';
// Kết nối tới cơ sở dữ liệu
$conn = connect_database();

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối không thành công: " . $conn->connect_error);
}

// Lấy dữ liệu từ request
$name = $_POST['name'];
$email = $_POST['email'];
$rating = (int)$_POST['rating']; // Chuyển sang số nguyên
$comment = $_POST['comment'];
$idsp = (int)$_POST['idsp']; // Chuyển ID sản phẩm sang số nguyên

// Kiểm tra giá trị của rating
if ($rating < 1 || $rating > 5) {
    echo json_encode(['success' => false, 'message' => 'Đánh giá phải nằm trong khoảng từ 1 đến 5.']);
    exit; // Dừng thực hiện mã
}

// Thêm bình luận vào cơ sở dữ liệu
$insertSql = "INSERT INTO binhluan (ten, email, danhgia, binhluan, idsp, create_at) VALUES (?, ?, ?, ?, ?, NOW())";
$stmtInsert = $conn->prepare($insertSql);
$stmtInsert->bind_param("ssisi", $name, $email, $rating, $comment, $idsp);

if ($stmtInsert->execute()) {
    // Lấy số lượng đánh giá hiện tại và giá trị đánh giá trung bình
    $sql = "SELECT sodanhgia, danhGia FROM sanpham WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $idsp);
    $stmt->execute();
    $result = $stmt->get_result();
    $product = $result->fetch_assoc();

    if ($product) {
        $currentCount = $product['sodanhgia'];
        $currentRating = $product['danhGia'];

        // Cập nhật số lượng đánh giá
        $newCount = $currentCount + 1;

        // Tính toán giá trị đánh giá trung bình mới
        $totalRating = ($currentRating * $currentCount) + $rating; // Tổng số điểm
        $newAverageRating = $totalRating / $newCount; // Tính giá trị trung bình

        // Cập nhật bảng sản phẩm
        $updateSql = "UPDATE sanpham SET sodanhgia = ?, danhGia = ? WHERE id = ?";
        $updateStmt = $conn->prepare($updateSql);
        $updateStmt->bind_param("idi", $newCount, $newAverageRating, $idsp); // 'i' cho số nguyên và 'd' cho số thực
        $updateStmt->execute();
    }

    // Gửi phản hồi về phía client
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'message' => 'Lỗi khi thêm bình luận.']);
}

// Đóng kết nối
$stmtInsert->close();
$stmt->close();
$updateStmt->close();
$conn->close();
?>
