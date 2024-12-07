// Sử dụng jQuery để bắt sự kiện
$(document).ready(function() {

    $("#donhang").on('click', function() {
        window.location.href = "donhang.php";   
    });

    $("#cart-icon").on('click', function() {
        $.ajax({
            url: 'functions/check_login.php',
            type: 'POST',
            success: function(response) {
                const trimmedResponse = response.trim();
                console.log(trimmedResponse);  // Kiểm tra xem kết quả trả về là gì
                if (trimmedResponse === "Logged in") {  // So sánh trực tiếp với chuỗi "Logged in"
                    // Chuyển đến trang giỏ hàng nếu người dùng đã đăng nhập
                    window.location.href = "giohang.php";
                } else {
                    // Hiển thị thông báo nếu chưa đăng nhập
                    alert("Vui lòng đăng nhập để sử dụng chức năng giỏ hàng.");
                }
            },
            error: function() {
                alert("Có lỗi xảy ra. Vui lòng thử lại.");
            }
        });        
    });

    $("#logout").on('click',function(){
        console.log("Nút Đăng xuất đã được nhấn");
        $.ajax({
            url: 'functions/logout.php',  // Đảm bảo đường dẫn đúng
            type: 'POST',
            success: function(response) {
                if (response.trim() === "Logout successful") {
                    window.location.href = "index.php";
                } else {
                    alert("Có lỗi xảy ra khi đăng xuất.");
                }
            },
            error: function() {
                alert("Có lỗi xảy ra. Vui lòng thử lại.");
            }
        });
    });
        
    $('.container__submenu-item').on('click', function() {
        // Lấy ID từ thuộc tính data-id
        var id = $(this).data('id');
        var name = $(this).attr('name');
        window.location.href = 'category.php?category_id=' + id + '&name=' + encodeURIComponent(name);
    });

    $('.category-right-content-item1').click(function() {
        // Lấy ID sản phẩm từ thuộc tính data-id
        var productId = $(this).data('id');
        // Chuyển hướng sang trang chi tiết
        window.location.href = 'chitiet.php?id=' + productId;
    });

    $("#sortSelect").change(function() {
        var sortOption = $(this).val();
        var categoryName = $("#botCategoryName").text().trim(); // Lấy tên danh mục từ phần tử với id 'categoryName'
    
        console.log("Category Name:", categoryName); // Debug: kiểm tra giá trị của categoryName
    
        if (sortOption == "") return;
    
        // Sử dụng encodeURIComponent để đảm bảo tên được truyền đúng
        window.location.href = 'timkiem.php?sort=' + sortOption + '&name=' + encodeURIComponent(categoryName);
    });

    // Xử lý sự kiện khi nhấn Enter trong ô tìm kiếm
    $("#search-box").on("keypress", function(e) {
        if (e.which === 13) { // Mã phím Enter là 13
            searchProduct();
        }
    });

    // Xử lý sự kiện khi nhấn vào biểu tượng kính lúp
    $("#search-icon").on("click", function() {
        searchProduct();
    });

    function searchProduct() {
        var searchTerm = $("#search-box").val().trim(); // Lấy từ khóa tìm kiếm từ ô input
        if (searchTerm) {
            window.location.href = 'timkiem.php?name=' + searchTerm;
        } else {
            alert("Vui lòng nhập từ khóa tìm kiếm.");
        }
    }

    $("#dangnhap").on('click',function() {
    
        // Sử dụng encodeURIComponent để đảm bảo tên được truyền đúng
        window.location.href = 'dangnhap.php?';
    });

});