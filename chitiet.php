<?php 
session_start();
include 'functions/load_chi_tiet.php';
include 'functions/auth.php';
tang_luot_xem();
?>
<!DOCTYPE html>
<html lang="vi">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <link rel="stylesheet" href="css/chitiet.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        <title>Chi tiết sản phẩm</title>
        <script src="js/jquery3.7.1.js"></script>   
        <script src="js/chitiet.js"></script>
        
    </head>
    <body>

    
    <div class="shop7">
        <header class="header">
            <div class="gid">
                <nav class="header__bar">
                        <ul class="header__bar-list">
                            <li class="header__bar-list-items header__bar-list-items-separate"><i class="fa-solid fa-phone"></i></li>
                            <li class="header__bar-list-items header__bar-list-items-separate">Hotline: 0949819714</li>
                        </ul>
                    
                        <ul class="header__bar-list">
                            <li class="header__bar-list-items">
                                <a href="#" class="header__bar-list-items-link">Chính sách khách vip</a>
                            </li>
                            <li class="header__bar-list-items">
                                <a href="#" class="header__bar-list-items-link">Cách chọn Size</a>
                            </li>
                            <li class="header__bar-list-items">
                                <a href="#" class="header__bar-list-items-link">Giới thiệu</a>
                            </li>
                        </ul>
    
                </nav>
                
            </div>
        </header>

        <!--Than Web-->
        <div class="container">
            <nav class="menu">
                <div class="container__menu-logo">
                    <a href="index.php" ><img class="container__menu-logo-photo"  src="image/logo2.jpg"></a>
                </div>
                
                <ul class="container__menu-list">
                        <li class="container__menu-list-items container__menu-list-items-hover">
                            Áo Nam
                            <div class="container__submenu">
                                <div class="container__submenu-item" data-id="1" name="Áo sơ mi">Áo sơ mi</div>
                                <div class="container__submenu-item" data-id="3" name="Áo thun">Áo thun</div>
                                <div class="container__submenu-item" data-id="2" name="Áo Polo & Rugby Shirt">Áo Polo & Rugby Shirt</div>
                                <div class="container__submenu-item" data-id="5" name="Áo Hoodie & Sweatshirt">Áo Hoodie & Sweatshirt</div>
                                <div class="container__submenu-item" data-id="4" name="Áo khoác">Áo khoác</div>
                                <div class="container__submenu-item" data-id="6" name="Áo Vest & Ghi Lê">Áo Vest & Ghi Lê</div>
                                <div class="container__submenu-item" data-id="7" name="Áo len">Áo len</div>
                            </div>
                        </li>
                        <li class="container__menu-list-items container__menu-list-items-hover">
                            Quần Nam
                            <div class="container__submenu">
                                <div class="container__submenu-item" data-id="8" name="Quần jeans">Quần jeans</div>
                                <div class="container__submenu-item" data-id="9" name="Quần tây">Quần tây</div>
                                <div class="container__submenu-item" data-id="10" name="Quần kaki">Quần kaki</div>
                                <div class="container__submenu-item" data-id="11" name="Quần jogger">Quần jogger</div>
                                <div class="container__submenu-item" data-id="12" name="Quần short">Quần short</div>
                                <div class="container__submenu-item" data-id="13" name="Quần lót">Quần lót</div>
                            </div>
                        </li>
                        <li class="container__menu-list-items container__menu-list-items-hover">
                            Phụ Kiện
                            <div class="container__submenu">
                                <div class="container__submenu-item" data-id="14" name="Giày Dép">Giày Dép</div>
                                <div class="container__submenu-item" data-id="15" name="Thắt lưng">Thắt lưng</div>
                                <div class="container__submenu-item" data-id="16" name="Ví da">Ví da</div> 
                                <div class="container__submenu-item" data-id="17" name="Cà Vạt & Nơ">Cà Vạt & Nơ</div>
                                <div class="container__submenu-item" data-id="18" name="Vớ nam">Vớ nam</div>
                                <div class="container__submenu-item" data-id="19" name="Mũ nón">Mũ nón</div>
                                <div class="container__submenu-item" data-id="20" name="Túi xách">Túi xách</div>
                            </div>
                        </li>
                        <?php getAuthList(); ?>
                    </ul>
                
                <div class="container_menu-congcu">
                    <div class="container_menu-congcu-topsearch">
                        <input type="text" id="search-box" placeholder="Tìm kiếm">
                        <i class="fa-solid fa-magnifying-glass" id="search-icon"></i>
                    </div>
                    <div class="container_menu-congcu-package"><i id="cart-icon" class="fa-solid fa-cart-shopping"></i></div>
                </div>
            </nav>

        </div>   
    </div> 

        <div class="main1">
        <div class="smallcontainer1 single-product1">
            <!--hiện thị sp-->
            <div class="row1">
                <!--hiện thị hinh anh sp-->
                <?php get_hinh_anh_chi_tiet(); ?>
                <div class="col-21 ">
                    <?php get_thong_tin_chi_tiet(); ?>
                    <div class="select-container1">
                        <div>
                            <label class="label1" for="size-select">Chọn kích thước:</label>
                            <select id="size-select" class="dai">
                                <option>S</option>
                                <option>M</option>
                                <option>L</option>
                                <option>XL</option>
                                <option>XXL</option>
                            </select>
                        </div>
                        <div>
                            <label class="label1" for="soluong" style="margin-bottom: 24px;">Chọn số lượng:</label>
                            <input id="soluong" type="number" value="1" class="dai" style="padding:0%">
                        </div>
                    </div>
                    
                    <button href="#" class="btn1" id="add-cart-btn">Thêm vào giỏ hàng</button>
                    <h3>Chi tiết sản phẩm <i class="fa fa-indent"></i> </h3>
                    <br>
                    <?php get_mieu_ta_san_pham(); ?>
                </div>
            </div>
            </div>
        </div>


            <!--binh luan-->
        <div class="review-form">
            <h2>Để lại bình luận và đánh giá</h2>
            <form method="POST">
                <div class="form-group">
                    <label for="name">Tên:</label>
                    <input type="text" id="name" name="name" required class="input-field">
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required class="input-field">
                </div>
                <div class="form-group">
                    <label for="rating">Đánh giá:</label>
                    <div class="rating">
                        <span class="star" data-value="1">&#9733;</span>
                        <span class="star" data-value="2">&#9733;</span>
                        <span class="star" data-value="3">&#9733;</span>
                        <span class="star" data-value="4">&#9733;</span>
                        <span class="star" data-value="5">&#9733;</span>
                    </div>
                    <input type="hidden" id="rating" name="rating" value="5">
                </div>
                <div class="form-group">
                    <label for="comment">Bình luận:</label>
                    <textarea id="comment" name="comment" rows="4" required class="input-field"></textarea>
                </div>
                <button type="submit" class="btn1">Gửi bình luận</button>
            </form>

            <!-- Phần bình luận -->
            <div class="comments-section">
                <h2>Bình luận của người khác</h2>
                <div id="comments-list">
                    <!-- Nơi hiển thị bình luận -->
                     <?php get_binh_luan(); ?>
                </div> 
            </div>

        </div>
        </div>
        

        

        
        
        

    </body>
</html>