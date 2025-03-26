<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Bán Sách</title>

    <!-- Bootstrap CSS -->
    <link href="{{ asset('lib/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('lib/font-fontawesome-ae333ffef2.js') }}" rel="stylesheet">
    {{-- Google Fonts --}}
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f8f9fa;
        }

        .navbar-brand {
            font-weight: bold;
            font-size: 26px;
        }

        .search-bar input {
            border-radius: 20px;
            padding: 5px 15px;
        }

        .search-bar button {
            border-radius: 20px;
            padding: 6px 15px;
        }

        .footer {
            background-color: #212529;
            color: #ccc;
            padding: 50px 0;
        }

        .footer a {
            color: #ccc;
            text-decoration: none;
        }

        .footer a:hover {
            color: #fff;
        }

        .social-icons a {
            color: #ccc;
            margin-right: 10px;
            font-size: 20px;
        }

        .social-icons a:hover {
            color: #fff;
        }

        .hero-banner {
            background: url('https://images.unsplash.com/photo-1544716278-ca5e3f4abd8c') no-repeat center center;
            background-size: cover;
            color: white;
            padding: 120px 0;
            text-align: center;
        }

        .hero-banner h1 {
            font-size: 48px;
            font-weight: bold;
        }

        .hero-banner p {
            font-size: 20px;
        }
        .form-control {
            border-radius: 5px;
        }
        
    </style>

    @yield('head')
</head>
<body>

   {{-- ===== HEADER ===== --}}
<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm sticky-top">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{ route('user.dashboard') }}">
            <i class="fas fa-book-open"></i> BookStore
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
            {{-- Menu bên trái --}}
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('user.dashboard') }}">
                        <i class="fas fa-home"></i> Trang chủ
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fas fa-info-circle"></i> Giới thiệu
                    </a>
                </li>      
                
            </ul>

            {{-- Thông tin liên hệ ở giữa --}}
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link disabled text-light" href="#">
                        0374600215 <i class="fas fa-phone-alt"></i> 
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled text-light" href="#">
                        <i class="fas fa-envelope"></i> feeder20gg@gmail.com
                    </a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('orders.index') }}">
                        <i class="fas fa-file-invoice-dollar"></i> Đơn hàng
                    </a>
                </li>          
            </ul>

            {{-- Giỏ hàng & tài khoản bên phải --}}
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('cart.index') }}">
                        <i class="fas fa-shopping-cart"></i>
                    </a>
                </li>

                @if(session('user'))
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                            <i class="fas fa-user-circle"></i> {{ session('user')['name'] }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="{{ route('account.profile') }}">Tài khoản</a></li>
                            <li>
                                <form action="{{ route('account.logout') }}" method="POST">
                                    @csrf
                                    <button class="dropdown-item" type="submit">Đăng xuất</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('account.login.form') }}">
                            <i class="fas fa-sign-in-alt"></i> Đăng nhập
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('account.register.form') }}">
                            <i class="fas fa-user-plus"></i> Đăng ký
                        </a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>


    {{-- ===== HERO BANNER ===== --}}
    <section class="hero-banner">
        <div class="container">
            <h1>Chào mừng đến với BookStore</h1>
            <p>Khám phá kho tàng sách khổng lồ, giảm giá mỗi ngày!</p>
        </div>
    </section>
    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

@if(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif

    <main class="py-4">
        @yield('content')
    </main>

    {{-- ===== FOOTER ===== --}}
    <footer class="footer mt-5">
        <div class="container">
            <div class="row text-center text-md-start">
                <div class="col-md-4 mb-3">
                    <h5><i class="fas fa-book"></i> BookStore</h5>
                    <p>Website bán sách hàng đầu Việt Nam với hàng ngàn đầu sách chất lượng cao.</p>
                    <div class="social-icons">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>

                <div class="col-md-4 mb-3">
                    <h6>Liên kết nhanh</h6>
                    <ul class="list-unstyled">
                        <li><a href="{{route('user.dashboard')}}">Trang chủ</a></li>
                        <li><a href="#">Danh mục</a></li>
                        <li><a href="#">Giỏ hàng</a></li>
                        <li><a href="#">Tài khoản</a></li>
                    </ul>
                </div>

                <div class="col-md-4 mb-3">
                    <h6>Liên hệ</h6>
                    <p><i class="fas fa-map-marker-alt"></i>Yên Vên, Gia Lâm, Hà Nội</p>
                    <p><i class="fas fa-envelope"></i>feeder20gg@gmail.com</p>
                    <p><i class="fas fa-phone"></i> 0374600215</p>
                </div>
            </div>

            <hr class="text-white">
            <div class="text-center">&copy; {{ date('Y') }} BookStore. All rights reserved.</div>
        </div>
    </footer>

    {{-- JS --}}
    <!-- Bootstrap JS -->
    <script src="{{ asset('lib/bootstrap.bundle.min.js') }}"></script>
    <!-- Font Awesome JS -->
    <script src="{{ asset('lib/font-fontawesome-ae333ffef2.js') }}"></script>

</body>
</html>
