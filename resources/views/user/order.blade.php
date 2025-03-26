@extends('user.layout')

@section('content')
<div class="container mt-4">
    <h2>Thông tin đặt hàng</h2>

    <form method="POST" action="{{ route('order.place') }}">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Họ tên</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $user['name'] }}">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Địa chỉ Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $user['email'] ?? '' }}">
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Số điện thoại</label>
            <input type="text" class="form-control" id="phone" name="phone" value="{{ $user['phone'] ?? '' }}">
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Địa chỉ</label>
            <input type="text" class="form-control" id="address" name="address" value="{{ $user['address'] ?? '' }}">
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Phương thức thanh toán</label>
            <input type="text" class="form-control" id="address" name="address" value="COD" disabled>
        </div>
        <h4>Danh sách sản phẩm</h4>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Sách</th>
                    <th>Hình ảnh</th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                    <th>Tổng</th>
                </tr>
            </thead>
            <tbody>
                @foreach($items as $item)
                    <tr>
                        <td>{{ $item->book->title }}</td>
                        <td><img src="{{ asset('storage/' . $item->book->image) }}" width="50"></td>
                        <td>{{ number_format($item->book->price) }} đ</td>
                        <td>{{ $item->quantity }}</td>
                        <td>{{ number_format($item->book->price * $item->quantity) }} đ</td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="4" class="text-end"><strong>Tổng cộng:</strong></td>
                    <td><strong>{{ number_format($total) }} đ</strong></td>
                </tr>
            </tbody>
        </table>

        <button type="submit" class="btn btn-primary">Xác nhận đặt hàng</button>
    </form>
</div>
@endsection
