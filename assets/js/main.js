const navList = document.querySelectorAll('.admlist');

navList.forEach(list => {
    list.addEventListener('click',() => {
        document.querySelector('.active-tab')?.classList.remove('active-tab');
        list.classList.add('active-tab');
    })
})

// Lấy tham chiếu đến các phần tử cần thiết
const commentsInput = document.querySelector('#comments');
const submitButton = document.querySelector('#btnsub');

// Định nghĩa hàm kiểm tra trạng thái của trường nhập liệu và kích hoạt hoặc vô hiệu hóa nút "Gửi" tương ứng
function checkCommentInput() {
    if (commentsInput.value.trim() === '') {
        submitButton.disabled = true; // Nếu trống, vô hiệu hóa nút "Gửi"
    } else {
        submitButton.disabled = false; // Nếu không trống, kích hoạt nút "Gửi"
    }
}

// Gán sự kiện 'input' cho trường nhập liệu bình luận
commentsInput.addEventListener('input', checkCommentInput);

// Kiểm tra ban đầu khi trang được tải
checkCommentInput();
