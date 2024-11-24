document.addEventListener('DOMContentLoaded', function() {
    // Banner Slider Code
    const slides = document.querySelectorAll('.slide');
    const prevBtn = document.querySelector('.prev-btn');
    const nextBtn = document.querySelector('.next-btn');
    let currentSlide = 0;
    const slideCount = slides.length;

    // Hàm chuyển đến slide tiếp theo
    function nextSlide() {
        slides[currentSlide].classList.remove('active');
        currentSlide = (currentSlide + 1) % slideCount;
        slides[currentSlide].classList.add('active');
    }

    // Hàm chuyển đến slide trước
    function prevSlide() {
        slides[currentSlide].classList.remove('active');
        currentSlide = (currentSlide - 1 + slideCount) % slideCount;
        slides[currentSlide].classList.add('active');
    }

    // Thêm sự kiện click cho các nút
    if(prevBtn && nextBtn) {
        nextBtn.addEventListener('click', nextSlide);
        prevBtn.addEventListener('click', prevSlide);

        // Tự động chuyển slide sau 5 giây
        setInterval(nextSlide, 5000);
    }

    // Navbar Scroll Effect Code
    let lastScrollTop = 0;
    const navbar = document.querySelector('.navbar');
    const headerHeight = document.querySelector('.header-top').offsetHeight;
    const scrollThreshold = 100;
    let scrollingUp = false;

    window.addEventListener('scroll', function() {
        let currentScroll = window.pageYOffset || document.documentElement.scrollTop;
        
        // Chỉ xử lý khi scroll qua khỏi header-top
        if (currentScroll > headerHeight) {
            navbar.classList.add('navbar-scroll');
            
            if (currentScroll > lastScrollTop && currentScroll > (headerHeight + scrollThreshold)) {
                // Scrolling down
                scrollingUp = false;
                navbar.classList.add('navbar-hidden');
            } else {
                // Scrolling up
                scrollingUp = true;
                navbar.classList.remove('navbar-hidden');
            }
        } else {
            // Trở về vị trí ban đầu
            navbar.classList.remove('navbar-scroll');
            navbar.classList.remove('navbar-hidden');
        }
        
        lastScrollTop = currentScroll <= 0 ? 0 : currentScroll;
    }, false);

    // Thêm debounce để tối ưu hiệu suất
    let scrollTimeout;
    window.addEventListener('scroll', function() {
        if (scrollTimeout) {
            window.cancelAnimationFrame(scrollTimeout);
        }
        
        scrollTimeout = window.requestAnimationFrame(function() {
            if (scrollingUp && lastScrollTop > (headerHeight + scrollThreshold)) {
                navbar.classList.remove('navbar-hidden');
            }
        });
    });
});

