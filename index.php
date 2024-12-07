<?php 
session_start(); // Phải được gọi trước bất kỳ HTML nào
include 'functions/index_func.php'; 
include 'functions/auth.php'; 
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="js/jquery3.7.1.js"></script>
    <script src="/icon/fontawesome-free-6.6.0-web/js/all.js"></script>
    <script src="js/slideshow.js" defer></script>
    <script src="js/index.js"></script>
    <title>7 Shop</title>
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
                    <div class="container_menu-congcu-package"><i id="cart-icon" class="fa-solid fa-cart-shopping" ></i></div>
                </div>
            </nav>
            <div class="slideShow">
                <div class="mySlides fade" style="display: block;"> <!-- Hiển thị slide đầu tiên -->
                    <img src="https://4menshop.com/images/thumbs/slides/banner-top-trang-chu-1-slide-19.png?t=1728066322" style="width:100%">
                </div>
                <div class="mySlides fade"> <!-- Slide thứ hai -->
                    <img src="https://4menshop.com/images/thumbs/slides/banner-top-trang-chu-2-slide-20.png?t=1728149562" style="width:100%">
                </div>

                <!-- Các nút điều khiển -->
                <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                <a class="next" onclick="plusSlides(1)">&#10095;</a>
            </div>
            <!--hot fashion-->
            <div class="hot_fashion">
                <h5>THỜI TRANG HOT NHẤT</h5>
                <div class="sphotnhat">
                    <!----lấy sản phẩm nhiều view-->
                    <?php get_hot_sanpham(); ?>
                </div>    
            </div>
            <!--New sanpham-->
            <div class="new_fashion">
                <h5>THỜI TRANG MỚI NHẤT</h5>
                <div class="spmoinhat">
                    <!----lấy sản phẩm nhiều view-->
                    <?php get_last_sanpham(); ?>
                </div> 
            </div>

            <hr style="border: 1px solid rgb(244, 235, 235)">

            <!--San pham ban chay-->
            <div class="sale_off">
                <h5>Đánh giá cao</h5>
                <div class="spbannhieu">
                    <?php get_high_rate_sanpham(); ?>
                </div> 
            </div>
 <!--===================Chính sách=================================-->
            <div class="policy_shop">
                <div class="policy_shop-khung policy_shop-thanhtoan+giaohang">
                    <h4>THANH TOÁN & GIAO HÀNG</h4>
                    <p>
                        Miễn phí vận chuyển cho đơn hàng trên 399.000 VNĐ<br/>
                        -Giao hàng và thu tiền tận nơi<br/>
                        -Chuyển khoản và giao hàng<br/>
                        -Mua hàng tại shop
                    </p>
                </div>
                <div class="policy_shop-khung policy_shop-thethanhvien">
                    <h4>THẺ THÀNH VIÊN</h4>
                    <p>
                        Chế độ ưu đãi thành viên VIP:<br/>
                        -5% cho thành viên Bạc<br/>
                        -10%cho thành viên Vàng<br/>
                        -15% cho thành viên Kim Cương
                    </p>
                    
                </div>
                <div class="policy_shop-khung policy_shop-giomocua">
                    <h4>GIỜ MỞ CỬA</h4>
                    <p>
                        <b>8h30 đến 22:00</b><br/>
                        -Tất cả ngày trong tuần<br/>
                        -Áp dụng cho tất cả các chi nhánh hệ thoóng cửa hàng 7SHOP
                    </p>
                </div>
                <div class="policy_shop-khung policy_shop-hotro24/7">
                    <h4>HỔ TRỢ 24/7</h4>
                    <p>
                        Gọi ngay cho chúng tôi khi bạn có thắc mắc<br/>
                        -0868.444.644
                    </p>
                </div>
            </div>
        </div>

        <!--Chan Web-->
        <footer class="footer">
            <footer>

                <div class="container">
                    <div class="row">
                        <div class="col-md-3 col-sm-4 widget-footer">
                        	
                        	  <h4 class="accordion-toggle">KẾT NỐI VỚI 4MEN</h4>
                        	<ul class="f-social clf clf-media">
                                <li>
                                	<a href="#" class="facebook" title="facebook page" rel="noreferrer" target="_blank" track="Action-Footer-Link-Facebook"><i class="fa-brands fa-square-facebook"></i></a>
                                </li>
                                 <li>
                                	<a href="#" class="instagram" title="instagram page" rel="noreferrer" target="_blank" track="Action-Footer-Link-Instagram"><i class="fa-brands fa-square-instagram"></i></a>
                                </li>
                                <li>
                                	<a href="#" class="youtube" title="youtube page" rel="noreferrer" target="_blank" track="Action-Footer-Link-Youtube"><i class="fa-brands fa-square-youtube"></i></a>
                                </li>
                                <li>
                                    <div class="fb-like fb_iframe_widget" data-href="https://4men.com.vn/" data-send="false" data-layout="button_count" data-width="100" data-show-faces="true" data-font="arial" fb-xfbml-state="rendered" fb-iframe-plugin-query="app_id=&amp;container_width=0&amp;font=arial&amp;href=https%3A%2F%2F4men.com.vn%2F&amp;layout=button_count&amp;locale=vi_VN&amp;sdk=joey&amp;send=false&amp;show_faces=true&amp;width=100"><span style="vertical-align: bottom; width: 90px; height: 28px;"><iframe name="f2ac0347f53f2c16a" width="100px" height="1000px" data-testid="fb:like Facebook Social Plugin" title="fb:like Facebook Social Plugin" frameborder="0" allowtransparency="true" allowfullscreen="true" scrolling="no" allow="encrypted-media" src="https://web.facebook.com/v15.0/plugins/like.php?app_id=&amp;channel=https%3A%2F%2Fstaticxx.facebook.com%2Fx%2Fconnect%2Fxd_arbiter%2F%3Fversion%3D46%23cb%3Dfef399e458c114538%26domain%3D4men.com.vn%26is_canvas%3Dfalse%26origin%3Dhttps%253A%252F%252F4men.com.vn%252Ff8d478247475c3dbb%26relation%3Dparent.parent&amp;container_width=0&amp;font=arial&amp;href=https%3A%2F%2F4men.com.vn%2F&amp;layout=button_count&amp;locale=vi_VN&amp;sdk=joey&amp;send=false&amp;show_faces=true&amp;width=100" style="border: none; visibility: visible; width: 90px; height: 28px;" class=""></iframe></span></div>
                                </li>
							</ul>
                            <div class="hidden-xs">
                                <form class="newsletter" action="https://4men.com.vn/dang-ky-nhan-mail-khuyen-mai.html" method="post">
                                    <label> 
                                         <span class="hidden-xs lable">Nhận email từ chúng tôi</span>
                                        <input type="text" placeholder="Email của bạn" name="email">
                                        <button type="submit">Đăng ký</button>
                                    </label>
                                </form>
                            </div>
                            
                          
                        </div>
                           <div class="col-md-3 col-sm-4 widget-footer">
                        	 
                            <h4 class="accordion-toggle">THƯƠNG HIỆU THỜI TANG NAM 4MEN® </h4>
                            <ul class="list-footer-contact no-fa clf">
                             <li>
                               Email mua hàng: saleonline@4men.com.vn
                            </li>
                            <li>
                               Hotline:
                              	 <a href="tel:0868444644" rel="nofollow" title="hotline 4men" track="Phone-Footer-0868.444.644">0868.444.644</a>
                            </li>
                           
                             <li class="hidden-xs">
                                <a href="https://4men.com.vn/cua-hang.html" rel="nofollow" title="he thong cua hang" track="Action-Footer-ViewMap">Tìm địa chỉ CỬA HÀNG gần bạn</a>
                            </li>
                        	</ul>
                        </div>
                          
                          
                        <div class="col-3 col-md-3 col-sm-4 widget-footer footer-accordion">
                            <h4 class="accordion-toggle">VỀ CHÚNG TÔI</h4>
                            <ul class="list-footer-contact accordion-content">
                            	<li>
                                   <a href="https://4men.com.vn/gioi-thieu.html" rel="nofollow" title="gioi thieu 4MEN">Giới thiệu 4MEN</a>
                                </li>
                                <li>
                                   <a href="https://4men.com.vn/lien-he.html" rel="nofollow" title="lien he 4MEN">Liên hệ </a>
                                </li>
                               
                                <li>
                                   <a href="https://4men.com.vn/tuyen-dung.html" rel="nofollow" title="tuyen dung">Tuyển dụng</a>
                                </li>
                                 <li>
                                   <a href="https://4men.com.vn/tin-tuc-4men.html" rel="nofollow" title="tin tuc 4MEN">Tin tức 4MEN </a>
                                </li>
                            </ul>
                                                    </div>
                         <div class="col-4 col-md-3 col-sm-4 widget-footer footer-accordion">
                            <h4 class="accordion-toggle">TRỢ GIÚP</h4>
                            <ul class="list-footer-contact accordion-content">
                            	 <li>
                                   <a href="https://4men.com.vn/huong-dan-mua-hang.html" rel="nofollow" title="huong dan mua hang">Hướng dẫn mua hàng</a>
                                </li>
                                <li>
                                    <a href="https://4men.com.vn/huong-dan-chon-size.html" title="huong dan chon size">Hướng dẫn chọn size</a>
                                </li>
                              
                               <li>
                                   <a href="https://4men.com.vn/cau-hoi-thuong-gap.html" rel="nofollow" title="cau hoi thuong gap">Câu hỏi thường gặp</a>
                                </li>
                             
                            </ul>
                                                    </div>
                         <div class="col-5 col-md-3 col-sm-4 widget-footer footer-accordion">
                         	
                            <h4 class="accordion-toggle">CHÍNH SÁCH</h4>
                            <ul class="list-footer-contact accordion-content">
                             	<li>
                                   <a href="https://4men.com.vn/chinh-sach-khach-vip.html" title="chinh sach khach vip">Chính sách khách VIP</a>
                                </li>
                                 <li>
                                   <a href="https://4men.com.vn/chinh-sach-thanh-toan-giao-hang.html" title="chinh sach giao hang">Thanh toán - Giao hàng</a>
                                </li>
                                 <li>
                                  <a href="https://4men.com.vn/chinh-sach-doi-hang.html" title="chinh sach doi hang">Chính sách đổi hàng</a>
                                  
                                </li>
                              
                            </ul>
                            
                         </div>
                      
                    </div>
                </div>
            </footer>
        </footer>
        
    </div>
    
</body>
</html>
