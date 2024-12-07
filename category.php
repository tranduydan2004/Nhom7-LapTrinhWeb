<?php
session_start();
include 'functions/index_func.php';
include 'functions/auth.php';
?>
<!DOCTYPE   html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/category.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Phân loại sản phẩm</title>
    <script src="js/jquery3.7.1.js"></script>
    <script src="js/category.js"></script>
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

    <!----category-->
    <section class="category1">
        <div class="container1">
            <div class="category-top1 row1">
                <a href="index.php" class="no-effect"><p id="trangChu">Trang chủ</p></a> <p>&#8594;</p> <p id="categoryName"><?php printName();?></p> 
            </div>
        </div>
        <div class="container1">
            
            <div class="category-right1 row1">
                <div class="category-right-top-item1">
                    <p id="botCategoryName"><?php printName(); ?></p>
                </div>
                <div class="category-right-top-item1">
                    <select name="sortSelect" id="sortSelect">
                        <option value="">Sắp xếp</option>
                        <option value="desc">Giá cao đến thấp</option>
                        <option value="asc">Giá thấp đến cao</option>
                    </select>
                </div>
            </div>
            <hr class="hr1">
            <div class="category-right-content1 row1" id="product-container">
                <!-- Dữ liệu sản phẩm sẽ được chèn vào đây qua AJAX -->
                <!-- Đoạn php dưới sử lý truyển trang từ trang đầu -->
                <?php
                if ( isset(($_GET['sort'])) ){
                    sort_load();
                }
                else getIdexData(); 
                ?>

            </div>
        </div>
    </section>


</body>
</html>