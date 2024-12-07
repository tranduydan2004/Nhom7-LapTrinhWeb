$(document).ready(function() {
    $("#loginButton").click(function() {
        $.ajax({
            url: 'functions/login.php',
            type: 'POST',
            data: {
                username: $('#username').val(),
                password: $('#password').val()
            },
            success: function(response) {
                if (response.trim() === "Login successful") {
                    // Chuyển hướng ngay lập tức
                    window.location.href = "index.php";
                } else {
                    // Hiển thị thông báo nếu đăng nhập thất bại
                    $('#message').html(response);
                }
            },
            error: function() {
                $('#message').html("An error occurred. Please try again.");
            }
        });
    });


});