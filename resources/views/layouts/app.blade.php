<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phi Pari</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    @yield('styles')
</head>

<body>
    <!-- Header -->
    <header>
        <!-- Logo Section -->
        <div class="header-top">
            <div class="container">
                <div class="logo-section">
                    <a class="navbar-brand" href="{{ route('home') }}">
                        <img src="{{ asset('images/logo.jpg') }}" alt="Phi Pari">
                    </a>
                    
                    <!-- Search Box -->
                    <form class="search-box">
                        <input class="form-control" type="search" placeholder="Search products...">
                        <button class="search-btn" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </form>
                    
                    <!-- User Menu & Cart -->
                    <ul class="user-menu">
                        @auth
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                                <i class="fas fa-user"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="{{ route('admin.dashboard') }}">My Profile</a></li>
                                <li><a class="dropdown-item" href="#">Orders</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button class="dropdown-item" type="submit">Logout</button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                        @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">
                                <i class="fas fa-sign-in-alt"></i>
                            </a>
                        </li>
                        @endauth
                        <li class="nav-item">
                            <a class="nav-link cart-icon" href="#">
                                <i class="fas fa-shopping-cart"></i>
                                <span class="cart-count">0</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Main Navigation -->
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <!-- Toggle Button -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Navbar Content -->
                <div class="collapse navbar-collapse" id="navbarContent">
                    <!-- Main Menu -->
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item {{ Request::routeIs('home') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('home') }}">Home</a>
                        </li>
                        <li class="nav-item {{ Request::routeIs('shop.index') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('shop.index') }}">All Products</a>
                        </li>
                        <li class="nav-item {{ Request::routeIs('category.*') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('category.index') }}">Danh Mục</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Banner Slider -->
        @yield('banner')
    </header>

    <!-- Content -->
    <main class="py-4 container">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="footer mt-auto py-5 bg-light">
        <div class="container">
            <div class="row">
                <!-- Hỗ trợ -->
                <div class="col-md-3">
                    <h5 class="footer-title">Hỗ trợ</h5>
                    <ul class="footer-links">
                        <li><a href="#">Hướng dẫn bán hàng</a></li>
                        <li><a href="#">Xác minh danh tính</a></li>
                        <li><a href="#">Các câu hỏi thường gặp</a></li>
                        <li><a href="#">Chính sách bảo vệ người mua</a></li>
                        <li><a href="#">Phản hồi</a></li>
                        <li><a href="#">Quy chế hoạt động</a></li>
                        <li><a href="#">Chính sách giải quyết tranh chấp</a></li>
                    </ul>
                </div>

                <!-- Tài khoản -->
                <div class="col-md-3">
                    <h5 class="footer-title">Tài khoản</h5>
                    <ul class="footer-links">
                        <li><a href="#">Đăng ký</a></li>
                        <li><a href="#">Đăng nhập</a></li>
                        <li><a href="#">Yêu thích</a></li>
                        <li><a href="#">Tin nhắn</a></li>
                    </ul>
                </div>

                <!-- Về OREKA -->
                <div class="col-md-3">
                    <h5 class="footer-title">Về Phi Pari</h5>
                    <ul class="footer-links">
                        <li><a href="#">Giới thiệu Phi Pari</a></li>
                        <li><a href="#">Liên hệ với chúng tôi</a></li>
                        <li><a href="#">Blog</a></li>
                    </ul>
                </div>

                <!-- Chính sách -->
                <div class="col-md-3">
                    <h5 class="footer-title">Chính sách</h5>
                    <ul class="footer-links">
                        <li><a href="#">Chính sách bảo mật</a></li>
                        <li><a href="#">Điều khoản dịch vụ</a></li>
                        <li><a href="#">Những món đồ bị cấm</a></li>
                        <li><a href="#">Hành vi bị cấm</a></li>
                        <li><a href="#">Chính sách giao tiếp</a></li>
                        <li><a href="#">Hướng dẫn an toàn sử dụng</a></li>
                    </ul>
                </div>
            </div>
           
        </div>
        <div class="container text-center">
            <p class="mb-0">&copy; 2024 Phi Pari. All rights reserved.</p>
        </div>

    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    @yield('scripts')
    <script src="{{ asset('js/scrips.js') }}"></script>
</body>

</html>