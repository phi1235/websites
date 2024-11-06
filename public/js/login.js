console.log("login.js loaded");

document.addEventListener('DOMContentLoaded', function () {
    // Tự động ẩn thông báo sau 5 giây
    setTimeout(function () {
        var successAlert = document.getElementById('success-alert');
        if (successAlert) {
            successAlert.style.display = 'none';
        }

        var errorAlert = document.getElementById('error-alert');
        if (errorAlert) {
            errorAlert.style.display = 'none';
        }
    }, 10000); // 5000 milliseconds = 5 seconds
});

