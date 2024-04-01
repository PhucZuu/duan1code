//Drop down tài khoản
// Lấy tham chiếu đến nút dropdown và menu dropdown
const navDropdownMenu = document.getElementById("navDropdownMenu");
const navDropdownButton = document.getElementById("navDropdownButton");
// Bắt sự kiện click vào nút dropdown
navDropdownButton.addEventListener('click', function() {
  // Kiểm tra trạng thái hiện tại của menu dropdown
  const isMenuVisible = navDropdownMenu.classList.contains('hidden');

  // Nếu menu đang ẩn, hiển thị nó. Ngược lại, ẩn nó đi.
  if (isMenuVisible) {
    navDropdownMenu.classList.remove('hidden');
  } else {
    navDropdownMenu.classList.add('hidden');
  }
});

// Bắt sự kiện click bên ngoài menu dropdown để ẩn nó đi
document.addEventListener('click', function(event) {
  const isClickedInsideDropdown = navDropdownButton.contains(event.target) || navDropdownMenu.contains(event.target);

  if (!isClickedInsideDropdown) {
    navDropdownMenu.classList.add('hidden');
  }
});