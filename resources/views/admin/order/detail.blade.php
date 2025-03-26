@extends('admin.layout')

@section('content')
<div class="container mt-4">
    <h2>Chi tiết đơn hàng #{{ $order->id }}</h2>

    <h4>Thông tin khách hàng</h4>
    <ul>
        <li><strong>Họ tên:</strong> {{ $order->customer_name }}</li>
        <li><strong>Email:</strong> {{ $order->customer_email }}</li>
        <li><strong>Số điện thoại:</strong> {{ $order->customer_phone }}</li>
        <li><strong>Địa chỉ:</strong> {{ $order->customer_address }}</li>
        <li><strong>Phương thức thanh toán:</strong> COD</li>
        <li><strong>Trạng thái:</strong> {{ $order->status }}</li>
        <li><strong>Tổng tiền:</strong> {{ number_format($order->total_price) }} đ</li>
    </ul>

    <h4>Sản phẩm đã đặt</h4>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Sách</th>
                <th>Tác giả</th>
                <th>Hình ảnh</th>
                <th>Giá</th>
                <th>Số lượng</th>
                <th>Thành tiền</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orderItems as $item)
                <tr>
                    <td>{{ $item->book_title }}</td>
                    <td>{{ $item->book_author }}</td>
                    <td><img src="{{ asset('storage/' . $item->book_image) }}" width="50"></td>
                    <td>{{ number_format($item->price) }} đ</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ number_format($item->price * $item->quantity) }} đ</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('admin.orders.index') }}" class="btn btn-secondary">← Quay lại</a>
</div>
@endsection
