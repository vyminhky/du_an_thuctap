@extends("user.layout")

@section('content')
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">

<style>
    body {
    font-family: 'Roboto', sans-serif;
    background-color: #f5f5f5;
}

/* Khối sách mới nhất */
.latest-books-wrapper {
    background: linear-gradient(135deg, #e3f2fd, #ffffff);
    border-left: 8px solid #0d6efd;
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
}

/* Hiệu ứng hover */
.card-hover {
    transition: all 0.3s ease;
}
.card-hover:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 22px rgba(0, 0, 0, 0.15);
}

/* Hình ảnh sản phẩm */
.product-img {
    height: 200px;
    width: 100%;
    object-fit: contain;
    background-color: #f8f9fa;
    padding: 10px;
    border-top-left-radius: 0.5rem;
    border-top-right-radius: 0.5rem;
}

/* Nhãn thể loại */
.category-badge {
    font-size: 0.75rem;
    background-color: #17a2b8;
    color: #fff;
    padding: 2px 8px;
    border-radius: 12px;
    display: inline-block;
    white-space: nowrap;
    overflow: hidden;
}

/* Card body */
.card-body {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    height: 200px;
}

.card-title {
    font-size: 0.95rem;
    font-weight: bold;
    line-height: 1.2rem;
    max-height: 2.4rem;
    overflow: hidden;
    text-overflow: ellipsis;
}

.card-body small {
    color: #6c757d;
    font-size: 0.8rem;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}

.card-body p {
    font-size: 0.9rem;
    margin-bottom: 0.5rem;
}

.btn-sm, .btn {
    font-size: 0.8rem;
    padding: 6px 10px;
    white-space: nowrap;
}

/* Carousel control tùy biến */
#bookCarousel .carousel-control-prev,
#bookCarousel .carousel-control-next {
    width: 40px;
    height: 40px;
    background-color: rgba(0, 0, 0, 0.5);
    top: 50%;
    transform: translateY(-50%);
    border-radius: 50%;
    z-index: 2;
}

#bookCarousel .carousel-control-prev-icon,
#bookCarousel .carousel-control-next-icon {
    background-size: 50% 50%;
}

/* Nhãn “Mới” */
.badge.bg-warning {
    font-size: 0.75rem;
    padding: 5px 8px;
    font-weight: 600;
    border-radius: 0.5rem;
}

</style>


<div class="container py-4">
    <h2 class="mb-4 fw-bold"><i class="fas fa-user-circle"></i> Chào mừng, người dùng!</h2>

    {{-- Thông tin nhanh --}}
    <div class="row g-4 mb-2">
        <div class="col-md-4">
            <div style="height: 100px" class="card border-0 shadow-sm text-white bg-primary card-hover">
                <div class="card-body">
                    <h5 class="card-title"><i class="fas fa-book"></i> Tổng số sách</h5>
                    <p class="display-6">{{ App\Models\Book::count() }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div style="height: 100px" class="card border-0 shadow-sm text-white bg-success card-hover">
                <div class="card-body">
                    <h5 class="card-title"><i class="fas fa-tags"></i> Danh mục</h5>
                    <p class="display-6">{{ App\Models\Category::count() }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div style="height: 100px" class="card border-0 shadow-sm text-white bg-warning card-hover">
                <div class="card-body">
                    <h5 class="card-title"><i class="fas fa-bolt"></i> Khuyến mãi</h5>
                    <p class="display-6">{{ App\Models\Promotion::count() }}</p>
                </div>
            </div>
        </div>
    </div>

    {{-- 
    <div class="bg-light p-4 rounded mb-5">
        <h4 class="mb-3 fw-bold"><i class="fas fa-list"></i> Duyệt sách theo danh mục</h4>
        <div class="d-flex flex-wrap gap-2">
            @foreach ($categories as $cat)
                <a href="{{ route('books.byCategory', $cat->id) }}" class="btn btn-outline-info btn-sm">{{ $cat->name }}</a>
            @endforeach
        </div>
    </div> --}}

    <div class="bg-white p-4 shadow-sm rounded mb-5">
        <h4 class="mb-3 fw-bold"><i class="fas fa-search"></i> Tìm kiếm sách</h4>
        <form action="{{ route('user.dashboard') }}" method="GET">
            <div class="row g-2">
                <div class="col-md-6">
                    <input type="text" name="search" class="form-control" placeholder="Tìm sách..." value="{{ request('search') }}">
                </div>
                <div class="col-md-4">
                    <select name="category" class="form-select">
                        <option value="">Tất cả danh mục</option>
                        @foreach($categories as $cat)
                            <option value="{{ $cat->id }}" {{ request('category') == $cat->id ? 'selected' : '' }}>
                                {{ $cat->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary w-100"><i class="fas fa-search"></i> Tìm</button>
                </div>
            </div>
        </form>
    </div>

    @if(!request('search') && !request('category'))
    <div class="latest-books-wrapper p-4 rounded shadow-sm mb-5 position-relative">
        <h4 class="fw-bold mb-4 text-primary">
            <i class="fas fa-star text-warning"></i> Sách mới nhất
        </h4>

        <div id="bookCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                @foreach ($latestBooks->chunk(4) as $chunkIndex => $bookChunk)
                    <div class="carousel-item {{ $chunkIndex == 0 ? 'active' : '' }}">
                        <div class="row g-4">
                            @foreach ($bookChunk as $book)
                                <div class="col-md-3">
                                    <div class="card shadow-sm card-hover h-100 border-start border-1 border-primary position-relative">
                                        <span class="badge bg-warning text-dark position-absolute top-0 start-0 m-2">Mới</span>
                                        <img src="{{ asset('storage/' . $book->image) }}" class="card-img-top product-img" alt="{{ $book->title }}">
                                        <div class="card-body d-flex flex-column">
                                            <span class="category-badge mb-1">{{ $book->category->name ?? 'Chưa phân loại' }}</span>
                                            <h6 class="card-title">{{ $book->title }}</h6>
                                            <small class="text-muted">{{ $book->author }}</small>
                                            <p class="mt-2 mb-2 fw-bold text-primary">{{ number_format($book->price) }}đ</p>
                                            
                                            <div class="d-flex gap-2 mt-auto">
                                                <a href="{{ route('book.show', $book->id) }}" class="btn btn-primary btn-sm w-50">
                                                    <i class="fas fa-info-circle"></i> Xem chi tiết
                                                </a>
                                                <a href="{{ route('cart.add', $book->id) }}" class="btn btn-outline-primary btn-sm w-50">
                                                    <i class="fas fa-cart-plus"></i> Thêm vào giỏ
                                                </a>
                                            </div>
                                            
                                            
                                            </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#bookCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Trước</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#bookCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Tiếp</span>
            </button>
        </div>
    </div>
@endif

    <div class="bg-white p-4 rounded shadow-sm">
        <h4 class="fw-bold mb-4"><i class="fas fa-book-open"></i> Tất cả sách</h4>
        <div class="row g-4">
            @forelse ($booksAll as $book)
                <div class="col-md-3">
                    <div class="card h-100 card-hover">
                        <img src="{{ asset('storage/' . $book->image) }}" class="card-img-top product-img" alt="{{ $book->title }}">
                        <div class="card-body d-flex flex-column">
                            <span class="category-badge mb-1">{{ $book->category->name ?? 'Chưa phân loại' }}</span>
                            <h6 class="card-title">{{ $book->title }}</h6>
                            <small class="text-muted">{{ $book->author }}</small>
                            <p class="mt-2 mb-2 fw-bold text-primary">{{ number_format($book->price) }}đ</p>
                            
                            <div class="d-flex gap-2 mt-auto">
                                <a href="{{ route('book.show', $book->id) }}" class="btn btn-primary btn-sm w-50">
                                    <i class="fas fa-info-circle"></i> Xem chi tiết
                                </a>
                                <a href="{{ route('cart.add', $book->id) }}" class="btn btn-outline-primary btn-sm w-50">
                                    <i class="fas fa-cart-plus"></i> Thêm vào giỏ
                                </a>
                            </div>
                            
                            </div>
                    </div>
                </div>
            @empty
                <p class="text-muted">Không có sách nào.</p>
            @endforelse
        </div>

        <div class="mt-4">
            {{ $booksAll->links('pagination::bootstrap-5') }}
        </div>
    </div>

    {{-- Khuyến mãi
    <div class="mt-5">
        <h4 class="fw-bold mb-3"><i class="fas fa-gift"></i> Ưu đãi hấp dẫn</h4>
        <div class="row g-4">
            @foreach($promotions as $promo)
                <div class="col-md-3">
                    <div class="card border-0 shadow-sm h-100 card-hover bg-light">
                        <div class="card-body text-center">
                            <h6 class="fw-bold text-success">{{ $promo->ten_khuyen_mai }}</h6>
                            <p class="mb-1">Sản phẩm: <strong>{{ $promo->product->title ?? 'N/A' }}</strong></p>
                            <p class="mb-0">Giảm: <span class="text-danger fw-bold">{{ $promo->gia_tri }}%</span></p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div> --}}
</div>
@endsection
