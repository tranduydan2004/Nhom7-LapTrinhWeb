<?php
include 'connect_database.php';
$conn = connect_database();

// Kiểm tra xem có idgiohang trong POST không
if (isset($_POST['idgiohang'])) {
    $idgiohang = $_POST['idgiohang'];  // Lấy giá trị idgiohang từ POST

    // Kiểm tra nếu idgiohang là số và hợp lệ
    if (is_numeric($idgiohang) && $idgiohang > 0) {

        // Xóa sản phẩm khỏi giỏ hàng
        $sql_delete = "DELETE FROM giohang WHERE idgiohang = ?";
        $stmt_delete = $conn->prepare($sql_delete);
        $stmt_delete->bind_param("i", $idgiohang);
        $stmt_delete->execute();

        // Kiểm tra nếu xóa thành công
        if ($stmt_delete->affected_rows > 0) {
            echo "Item removed";  // Trả về thông báo thành công
        } else {
            echo "Error removing item";  // Trả về thông báo lỗi nếu không có sản phẩm nào bị xóa
        }
    } else {
        echo "Invalid item ID";  // Trả về thông báo nếu idgiohang không hợp lệ
    }
} else {
    echo "Missing item ID";  // Trả về thông báo nếu không nhận được idgiohang từ POST
}
?>