let slideIndex = 0;
let slideInterval; // Biến để lưu trữ ID của setInterval
showSlides();

// Hàm hiển thị slide
function showSlides() {
    let i;
    let slides = document.getElementsByClassName("mySlides");
    if (slides.length === 0) return; // Kiểm tra nếu không có slide nào

    // Ẩn tất cả các slide
    for (i = 0; i < slides.length; i++) {
        slides[i].classList.remove("show"); // Xóa lớp show
    }

    // Tăng chỉ số slide
    slideIndex++;
    if (slideIndex > slides.length) {slideIndex = 1}    

    // Hiển thị slide hiện tại
    slides[slideIndex - 1].classList.add("show"); // Thêm lớp show

    // Tự động chuyển slide sau mỗi 3 giây
    slideInterval = setTimeout(showSlides, 3000); // Thay đổi slide mỗi 3 giây
}

// Hàm điều khiển slide
function plusSlides(n) {
    clearTimeout(slideInterval); // Dừng tự động chuyển slide khi người dùng bấm nút
    slideIndex += n;
    let slides = document.getElementsByClassName("mySlides");
    if (slides.length === 0) return; // Kiểm tra nếu không có slide nào

    if (slideIndex > slides.length) {slideIndex = 1}
    if (slideIndex < 1) {slideIndex = slides.length}
    showSlidesManually();
}

// Hiển thị slide theo cách thủ công
function showSlidesManually() {
    let i;
    let slides = document.getElementsByClassName("mySlides");
    if (slides.length === 0) return; // Kiểm tra nếu không có slide nào

    for (i = 0; i < slides.length; i++) {
        slides[i].classList.remove("show"); // Xóa lớp show
    }
    slides[slideIndex - 1].classList.add("show"); // Thêm lớp show

    // Bắt đầu lại tự động chuyển slide
    slideInterval = setTimeout(showSlides, 3000); // Thay đổi slide mỗi 3 giây
}
