// $(document).ready(function() {
//     // Toggle sidebar
//     $('.hamburger-btn').on('click', function() {
//         $(this).toggleClass('active');
//         $('.sidebar').toggleClass('collapsed');
//         $('#content-wrapper').toggleClass('expanded');
        
//         // Lưu trạng thái vào localStorage
//         localStorage.setItem('sidebarState', $('.sidebar').hasClass('collapsed'));
//     });

//     // Khôi phục trạng thái từ localStorage
//     if(localStorage.getItem('sidebarState') === 'true') {
//         $('.hamburger-btn').addClass('active');
//         $('.sidebar').addClass('collapsed');
//         $('#content-wrapper').addClass('expanded');
//     }

//     // Xử lý hover cho menu items khi sidebar thu gọn
//     $('.nav-item').each(function() {
//         var $item = $(this);
//         var linkText = $item.find('.nav-link span').text();
//         $item.attr('data-title', linkText);
//     });
// }); 