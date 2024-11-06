document.addEventListener('DOMContentLoaded', function () {
    const emailField = document.getElementById('email');
    const emailCheckMessage = document.getElementById('email-check');
    const nameField = document.getElementById('name');
    const nameCheckMessage = document.getElementById('name-check');
    const passwordField = document.getElementById('password');
    const confirmPasswordField = document.getElementById('password_confirmation');
    const passwordCheckMessage = document.getElementById('password-check');
    const matchCheckMessage = document.getElementById('match-check');
    let isConfirmFieldActive = false;

    // Kiểm tra điều kiện tên người dùng khi nhập
    nameField.addEventListener('input', function () {
        const name = nameField.value;
        
        // Kiểm tra xem tên có ký tự đặc biệt không
        if (/^[a-zA-ZÀ-ỹ\s]+$/.test(name) && name.length > 0) {  // Chỉ cho phép chữ cái và khoảng trắng
            nameField.classList.add('is-valid');
            nameField.classList.remove('is-invalid');
            nameCheckMessage.textContent = 'Tên hợp lệ';
            nameCheckMessage.classList.add('text-success');
            nameCheckMessage.classList.remove('text-danger');
            nameCheckMessage.style.display = 'block';
        } else {
            nameField.classList.add('is-invalid');
            nameField.classList.remove('is-valid');
            nameCheckMessage.textContent = 'Tên không được chứa ký tự đặc biệt.';
            nameCheckMessage.classList.add('text-danger');
            nameCheckMessage.classList.remove('text-success');
            nameCheckMessage.style.display = 'block';
        }
    });

    // Ẩn thông báo tên khi rời khỏi ô nhập
    nameField.addEventListener('blur', function () {
        nameCheckMessage.style.display = 'none';
    });
    // Kiểm tra điều kiện email khi người dùng nhập
    emailField.addEventListener('input', function () {
        const email = emailField.value;
        
        // Kiểm tra xem email có chứa "@" không
        if (/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
            emailField.classList.add('is-valid');
            emailField.classList.remove('is-invalid');
            emailCheckMessage.textContent = 'Email hợp lệ';
            emailCheckMessage.classList.add('text-success');
            emailCheckMessage.classList.remove('text-danger');
        } else {
            emailField.classList.add('is-invalid');
            emailField.classList.remove('is-valid');
            emailCheckMessage.textContent = 'Email không hợp lệ. Vui lòng nhập đúng định dạng.';
            emailCheckMessage.classList.add('text-danger');
            emailCheckMessage.classList.remove('text-success');
        }
    });
    // Ẩn thông báo email khi rời khỏi ô nhập
    emailField.addEventListener('blur', function () {
        emailCheckMessage.style.display = 'none';
    });
    passwordField.addEventListener('blur', function () {
        passwordCheckMessage.style.display = 'none';
    });
    // Kiểm tra điều kiện mật khẩu khi người dùng nhập
    passwordField.addEventListener('input', function () {
        const password = passwordField.value;

        // Kiểm tra độ dài của mật khẩu
        if (password.length >= 6) {
            passwordField.classList.add('is-valid');
            passwordField.classList.remove('is-invalid');
            passwordCheckMessage.textContent = 'Mật khẩu hợp lệ';
            passwordCheckMessage.classList.add('text-success');
            passwordCheckMessage.classList.remove('text-danger');
        } else {
            passwordField.classList.add('is-invalid');
            passwordField.classList.remove('is-valid');
            passwordCheckMessage.textContent = 'Mật khẩu phải ít nhất 6 ký tự, chứa chữ cái và số.';
            passwordCheckMessage.classList.add('text-danger');
            passwordCheckMessage.classList.remove('text-success');
        }
        
        // Chỉ kiểm tra xác nhận mật khẩu nếu người dùng đã nhập vào ô xác nhận
        if (isConfirmFieldActive) {
            checkPasswordMatch();
        }
    });

    // Đánh dấu khi người dùng bắt đầu nhập vào ô xác nhận mật khẩu
    confirmPasswordField.addEventListener('input', function () {
        isConfirmFieldActive = true;
        checkPasswordMatch();
    });

    // Hàm kiểm tra mật khẩu xác nhận
    function checkPasswordMatch() {
        const password = passwordField.value;
        const confirmPassword = confirmPasswordField.value;

        if (password === confirmPassword && password !== "") {
            confirmPasswordField.classList.add('is-valid');
            confirmPasswordField.classList.remove('is-invalid');
            matchCheckMessage.textContent = 'Mật khẩu khớp';
            matchCheckMessage.classList.add('text-success');
            matchCheckMessage.classList.remove('text-danger');
        } else {
            confirmPasswordField.classList.add('is-invalid');
            confirmPasswordField.classList.remove('is-valid');
            matchCheckMessage.textContent = 'Mật khẩu không khớp';
            matchCheckMessage.classList.add('text-danger');
            matchCheckMessage.classList.remove('text-success');
        }
    }
});
