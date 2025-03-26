<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Quản trị Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Bootstrap CSS -->
    <link href="{{ asset('lib/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('lib/font-fontawesome-ae333ffef2.js') }}" rel="stylesheet">

    <style>
          body {
        min-height: 100vh;
        background-color: #e9f1fb;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        transition: background-color 0.3s ease;
    }

    .sidebar {
        width: 250px;
        height: 100vh;
        position: fixed;
        background: linear-gradient(180deg, #0d47a1, #1565c0);
        color: white;
        box-shadow: 2px 0 8px rgba(0, 0, 0, 0.1);
        transition: background 0.3s ease;
    }

    .sidebar h4 {
        margin: 0;
        padding: 20px;
        font-size: 20px;
        background-color: #0b3c91;
        text-align: center;
        border-bottom: 1px solid #0d47a1;
        border-radius: 0 0 10px 10px;
    }

    .sidebar a {
        color: #e3f2fd;
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 14px 22px;
        text-decoration: none;
        font-size: 16px;
        transition: all 0.3s ease;
    }

    .sidebar a:hover,
    .sidebar a.active {
        background-color: rgba(255, 255, 255, 0.15);
        color: #fff;
        border-left: 4px solid #90caf9;
        padding-left: 18px;
    }

    .content {
        margin-left: 250px;
        padding: 20px;
        transition: margin 0.3s ease;
    }

    .header {
        background-color: #ffffff;
        padding: 15px 25px;
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(33, 150, 243, 0.1);
        display: flex;
        justify-content: space-between;
        align-items: center;
        transition: box-shadow 0.3s ease;
    }

    .header h5 {
        margin: 0;
        font-weight: bold;
        color: #0d47a1;
    }

    .main {
        margin-top: 20px;
        background: #ffffff;
        padding: 30px;
        border-radius: 15px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        transition: all 0.3s ease;
    }

    /* Hiệu ứng icon */
    .sidebar i {
        transition: transform 0.2s ease;
    }

    .sidebar a:hover i {
        transform: scale(1.1);
    }

    /* Responsive (nếu muốn sau này) */
    @media (max-width: 768px) {
        .sidebar {
            width: 100%;
            height: auto;
            position: relative;
        }
        .content {
            margin-left: 0;
        }
    }
    </style>
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <h4><i class="fas fa-cogs me-2"></i> Quản trị</h4>
        <a href="{{ route('admin.categories.index') }}" 
   class="{{ request()->routeIs('admin.categories.*') ? 'active' : '' }}">
    <i class="fas fa-list"></i> Danh mục
</a>

<a href="{{ route('admin.books.index') }}" 
   class="{{ request()->routeIs('admin.books.*') ? 'active' : '' }}">
    <i class="fas fa-book"></i> Sách
</a>

<a href="{{ route('admin.promotions.index') }}" 
   class="{{ request()->routeIs('admin.promotions.*') ? 'active' : '' }}">
    <i class="fas fa-tags"></i> Khuyến mãi
</a>

<a href="{{ route('admin.users.index') }}" 
   class="{{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
    <i class="fas fa-users"></i> Tài khoản
</a>

        <a href="{{route('admin.orders.index')}}"><i class="fas fa-file-invoice-dollar"></i> Hóa đơn</a>
        <a href="#"><i class="fas fa-image"></i> Banner</a>
        <a href="#"><i class="fas fa-sign-out-alt"></i> Đăng xuất</a>
    </div>

    <!-- Main Content -->
    <div class="content">
        <div class="header">
            <h5><i class="fas fa-user-shield me-2"></i>Trang quản trị</h5>
            <div>
                <i class="fas fa-user-circle me-1"></i> Admin
            </div>
        </div>

        <div class="main">
            @yield('content')
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="{{ asset('lib/bootstrap.bundle.min.js') }}"></script>
    <!-- Font Awesome JS -->
    <script src="{{ asset('lib/font-fontawesome-ae333ffef2.js') }}"></script>
</body>
</html>
