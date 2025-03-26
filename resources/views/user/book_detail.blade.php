@extends('user.layout')

@section('content')
<div class="container mt-5">
    <div class="row g-4">
        {{-- Hình ảnh --}}
        <div class="col-lg-5">
            <div class="position-relative shadow rounded overflow-hidden">
                <img src="{{ asset('storage/' . $book->image) }}" class="img-fluid w-100" alt="{{ $book->title }}">
                <span class="badge bg-success position-absolute top-0 start-0 m-2">Còn hàng</span>
                @if($book->category)
                    <span class="badge bg-primary position-absolute top-0 end-0 m-2">{{ $book->category->name }}</span>
                @endif
            </div>
        </div>

        {{-- Nội dung --}}
        <div class="col-lg-7">
            <h2 class="fw-bold mb-2">{{ $book->title }}</h2>
            <p class="text-muted mb-1">Tác giả: <strong>{{ $book->author }}</strong></p>
            <div class="mb-3">
                {{-- Tạm thời gán 4 sao --}}
                <span class="text-warning">
                    <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                    <i class="fas fa-star"></i><i class="far fa-star"></i>
                </span>
                <small class="text-muted ms-2">(24 đánh giá)</small>
            </div>
            <h4 class="text-danger fw-bold">{{ number_format($book->price) }}đ</h4>

            <p class="mt-4 lh-base">{{ $book->description }}</p>

            {{-- Các nút hành động --}}
            <div class="d-flex flex-wrap gap-2 mt-4">
                <a href="{{ route('cart.add', $book->id) }}" class="btn btn-primary px-4 py-2 shadow-sm">
                    <i class="fas fa-cart-plus"></i> Thêm vào giỏ hàng
                </a>
                <a href="{{ route('user.dashboard') }}" class="btn btn-outline-secondary px-4 py-2">
                    <i class="fas fa-arrow-left"></i> Quay về
                </a>
            </div>
        </div>
    </div>

    {{-- Thông tin thêm --}}
    <div class="row mt-5">
        <div class="col-md-12">
            <div class="bg-light p-4 rounded shadow-sm">
                <h5 class="fw-bold text-primary mb-3"><i class="fas fa-info-circle"></i> Thông tin chi tiết</h5>
                <ul class="list-unstyled mb-0">
                    <li><strong>Tên sách:</strong> {{ $book->title }}</li>
                    <li><strong>Tác giả:</strong> {{ $book->author }}</li>
                    <li><strong>Danh mục:</strong> {{ $book->category->name ?? 'Chưa phân loại' }}</li>
                    <li><strong>Giá:</strong> {{ number_format($book->price) }}đ</li>
                    <li><strong>Số lượng còn:</strong> {{ $book->stock }}</li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
