document.addEventListener("DOMContentLoaded", function () {
    const quantityInputs = document.querySelectorAll(".cart-item input[type='number']");
    const originalTotalElement = document.querySelector(".total-summary p:first-of-type");
    const totalElement = document.querySelector(".total");
    const checkoutButton = document.querySelector(".checkout-button");
    const removeButtons = document.querySelectorAll(".remove-button");
    const applyButton = document.querySelector(".apply-button");
    const discountInput = document.querySelector(".ma-giam-gia");
    let discountAmount = 0;

    // Thêm event listenters vào nhập số lượng
    quantityInputs.forEach(input => {
        input.addEventListener("change", updateTotal);
    });

    // Thêm event listeners cho nút 'xóa'
    removeButtons.forEach(button => {
        button.addEventListener("click", removeItem);
    });


    // Cần thay đổi để phù hợp backend
    // Mã code giảm giá hợp lệ
    const discountCodes = {
        "DISCOUNT10": { amount: 10, expiration: "2024-12-31" }, // 10% discount
        "SAVE50": { amount: 50, expiration: "2024-11-30" },     // 50% discount
        "20THANG10": { amount: 30, expiration: "2024-10-17" }, // 30% discount
    };

    // Thêm event listener để áp dụng nút của mã giảm giá
    applyButton.addEventListener("click", applyDiscount);
    
    function updateTotal() {
        let originalTotal = 0;
        let finalTotal = 0;
        const cartItems = document.querySelectorAll(".cart-item");
        cartItems.forEach(item => {
            const price = parseInt(item.querySelector(".item-details p:last-of-type").textContent.replace(/\D/g, ""));
            const quantity = parseInt(item.querySelector("input[type='number']").value);
            originalTotal += price * quantity;
        });

        finalTotal = originalTotal;

        // Áp dụng mã (nếu có)
        if (discountAmount > 0) {
            finalTotal -= (discountAmount >= 100) ? discountAmount : (finalTotal * discountAmount / 100);
        }

        originalTotalElement.textContent = `Số tiền mua sản phẩm: ${originalTotal.toLocaleString()} ₫`;
        totalElement.textContent = `Tổng tiền thanh toán: ${finalTotal.toLocaleString()} ₫`;

        // Cập nhật giá trị của nút thanh toán
        checkoutButton.textContent = `Thanh toán ${finalTotal.toLocaleString()} ₫`;
    }

    // Cần thay đổi để phù hợp với backend
    // Hàm để xóa 1 item từ giỏ hàng
    function removeItem(event) {
        const buttonClicked = event.target;
        

        const cartItem = buttonClicked.closest(".cart-item");
        const cartItemId = cartItem.getAttribute("data-id");

        // Gửi yêu cầu xóa qua AJAX
        $.ajax({
            url: 'functions/remove_sp.php', // Đường dẫn tới file PHP xử lý xóa
            type: 'POST',
            data: {
                idgiohang: cartItemId  // Truyền ID của giỏ hàng cần xóa
            },
            success: function(response) {
                console.log(response); // Kiểm tra phản hồi từ server
                if (response.trim() === "Item removed") {
                    cartItem.remove(); // Xóa sản phẩm khỏi giao diện
                    updateTotal(); // Cập nhật lại tổng tiền sau khi xóa
                } else {
                    alert("Không thể xóa sản phẩm.");
                }
            },
            error: function() {
                alert("Có lỗi xảy ra khi xóa sản phẩm.");
            }
        });
    }

    

    // Hàm để áp dụng mã giảm giá
    function applyDiscount() {
        const code = discountInput.value.trim().toUpperCase();
        $.ajax({
            url: 'functions/check_discount.php',  // Đường dẫn đến file PHP
            type: 'POST',
            data: { code: code },
            success: function(response) {
                const data = JSON.parse(response);
                if (data.status === "valid") {
                    discountAmount = data.amount;
                    alert(`Mã giảm giá hợp lệ! Giảm ${discountAmount >= 100 ? discountAmount + "K" : discountAmount + "%"}.`);
                } else if (data.status === "expired") {
                    alert("Mã giảm giá đã hết hạn.");
                } else {
                    alert("Mã giảm giá không hợp lệ.");
                }
                updateTotal();  // Cập nhật tổng giá
            },
            error: function() {
                alert("Có lỗi xảy ra. Vui lòng thử lại.");
            }
        });
    }
    

    // Khởi tạo tính tổng
    updateTotal();
});
