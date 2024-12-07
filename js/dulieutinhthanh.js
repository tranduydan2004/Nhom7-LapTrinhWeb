// Dữ liệu các tỉnh thành và quận huyện
const locations = {
    "Hà Nội": ["Ba Đình", "Hoàn Kiếm", "Đống Đa", "Cầu Giấy", "Thanh Xuân", "Hà Đông", "Tây Hồ", "Long Biên", "Hoàng Mai", "Nam Từ Liêm", "Bắc Từ Liêm", "Sóc Sơn", "Đông Anh", "Gia Lâm", "Thanh Trì", "Thạch Thất", "Quốc Oai", "Chương Mỹ", "Đan Phượng", "Hoài Đức", "Mê Linh", "Ba Vì", "Phúc Thọ"],
    "TP. Hồ Chí Minh": ["Quận 1", "Quận 2", "Quận 3", "Quận 4", "Quận 5", "Quận 6", "Quận 7", "Quận 8", "Quận 9", "Quận 10", "Quận 11", "Quận 12", "Gò Vấp", "Bình Thạnh", "Tân Bình", "Tân Phú", "Phú Nhuận", "Thủ Đức", "Bình Tân", "Hóc Môn", "Bình Chánh", "Nhà Bè", "Củ Chi"],
    "Đà Nẵng": ["Hải Châu", "Thanh Khê", "Sơn Trà", "Ngũ Hành Sơn", "Cẩm Lệ", "Liên Chiểu", "Hòa Vang", "Hoàng Sa"],
    "Hải Phòng": ["Hồng Bàng", "Ngô Quyền", "Lê Chân", "Hải An", "Kiến An", "Đồ Sơn", "Dương Kinh", "Thủy Nguyên", "An Dương", "Tiên Lãng", "Vĩnh Bảo", "Cát Hải", "Bạch Long Vĩ"],
    "Cần Thơ": ["Ninh Kiều", "Bình Thủy", "Cái Răng", "Ô Môn", "Thốt Nốt", "Phong Điền", "Cờ Đỏ", "Vĩnh Thạnh", "Thới Lai"]
};

// Tải danh sách tỉnh thành vào select
const provinceSelect = document.getElementById("tinh");
const districtSelect = document.getElementById("huyen");

function loadProvinces() {
    for (const province in locations) {
        const option = document.createElement("option");
        option.value = province;
        option.textContent = province;
        provinceSelect.appendChild(option);
    }
}

// Cập nhật danh sách quận huyện khi chọn tỉnh
function updateDistricts() {
    const selectedProvince = provinceSelect.value;
    districtSelect.innerHTML = '<option value="">--- Chọn quận huyện ---</option>';

    if (selectedProvince && locations[selectedProvince]) {
        const districts = locations[selectedProvince];
        districts.forEach(district => {
            const option = document.createElement("option");
            option.value = district;
            option.textContent = district;
            districtSelect.appendChild(option);
        });
    }
}

// Gọi hàm khi trang được tải
loadProvinces();