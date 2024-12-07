$(document).ready(function() {
    // Lấy idsp từ URL
    const urlParams = new URLSearchParams(window.location.search);
    const idsp = parseInt(urlParams.get('id'), 10); // Chuyển đổi idsp thành số nguyên


    $('form').on('submit', function(event) {
    
        const name = $('#name').val();
        const email = $('#email').val();
        const rating = $('#rating').val();
        const comment = $('#comment').val();
    
        // Log dữ liệu gửi lên
        console.log("Dữ liệu gửi lên:", { name, email, rating, comment, idsp });
    
        $.ajax({
            url: 'functions/submit_comments.php',
            method: 'POST',
            data: {
                name: name,
                email: email,
                rating: rating,
                comment: comment,
                idsp: idsp // Gửi idsp cùng với dữ liệu bình luận
            },
            success: function(response) {
    
                // Xử lý phản hồi tại đây
                if (response.success) {
                    $('#comments-list').load('functions/load_comments.php');
                }
    
                // Xóa dữ liệu nhập sau khi gửi
                $('#name').val('');
                $('#email').val('');
                $('#rating').val(5);
                $('#comment').val('');
                $('.star').css('color', '#ccc');
            },
        });
    });
    

    $('.star').on('click', function() {
        var rating = $(this).data('value');
        $('#rating').val(rating);

        $('.star').css('color', '#ccc');
        for (var i = 0; i < rating; i++) {
            $('.star').eq(i).css('color', '#ff523b');
        }
    });

    $('#trangchu').click(function() {
        // Lấy ID sản phẩm từ thuộc tính data-id
        // Chuyển hướng sang trang chi tiết
        window.location.href = 'index.php';
    });
    $('#danhmuc').click(function() {
        // Lấy ID từ thuộc tính data-id
        var id = $(this).data('id');
        var name = $(this).attr('name');
        
        // Chuyển hướng đến trang khác và truyền ID qua query string
        window.location.href = 'category.php?category_id=' + id+ '&name=' + encodeURIComponent(name);
    });

    $('.container__submenu-item').on('click', function() {
        // Lấy ID từ thuộc tính data-id
        var id = $(this).data('id');
        var name = $(this).attr('name');
        window.location.href = 'category.php?category_id=' + id + '&name=' + encodeURIComponent(name);
    });

    $('.small-img').click(function() {
        const newSrc = $(this).attr('src');
        console.log("Selected image source:", newSrc); // Kiểm tra src của ảnh nhỏ
        $('#ProductImg').attr('src', newSrc);
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

    $("#add-cart-btn").on('click', function() {
        const urlParams = new URLSearchParams(window.location.search);
        const id = urlParams.get('id');  // Lấy giá trị `id` từ URL
        const size = $("#size-select").val();  // Lấy giá trị kích thước
        const quantity = $("#soluong").val();  // Lấy giá trị số lượng
        $.ajax({
            url: 'functions/add_sp.php',
            type: 'POST',
            data: {
                id: id,
                size: size,
                quantity: quantity
            },
            success: function(response) {
                console.log(response.trim());
                if ( response.trim() === "Logged in") {  // So sánh trực tiếp với chuỗi "Logged in"
                    alert("Đã thêm sản phẩm vào giỏ hàng.");
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

    $("#donhang").on('click', function() {
        window.location.href = "donhang.php";   
    });


});

