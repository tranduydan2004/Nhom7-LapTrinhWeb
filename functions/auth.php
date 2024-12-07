<?php
// Hàm kiểm tra xem người dùng đã đăng nhập chưa
function checkLoginStatus() {
    if (isset($_SESSION['user_id'])) {
        return true; // Người dùng đã đăng nhập
    } else {
        return false; // Người dùng chưa đăng nhập
    }
}

// Hàm để lấy tên người dùng
function getAuthList() {
    if ( checkLoginStatus() ){
        echo 
        '
        <li class="container__menu-list-items container__menu-list-items-hover">
                            '.$_SESSION['user_name'].'
                            <div class="container__submenu">
                                <div class="container__submenu-item2" id="donhang" name="donhang" >Đơn Hàng</div>
                                <div class="container__submenu-item2" id="logout" name="Logout" >Đăng xuất</div>
                            </div>
        </li>
        ';
    }
    else{
        echo '<li class="container__menu-list-items" id="dangnhap">Đăng Nhập</li>';
    }
}

?>