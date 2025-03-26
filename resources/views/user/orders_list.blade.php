@extends('user.layout')

@section('content')
@if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

@if (session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif

<div class="container mt-4">
    <h3>Danh sách đơn hàng của bạn</h3>

    @forelse ($orders as $order)
        <div class="card mb-4">
            <div class="card-header bg-primary text-white">
                <strong>Đơn hàng #{{ $order->id }}</strong> - {{ $order->created_at->format('d/m/Y H:i') }}
            </div>
            <div class="card-body">
                <p><strong>Người nhận:</strong> {{ $order->customer_name }}</p>
                <p><strong>Điện thoại:</strong> {{ $order->customer_phone }}</p>
                <p><strong>Email:</strong> {{ $order->customer_email }}</p>
                <p><strong>Địa chỉ:</strong> {{ $order->customer_address }}</p>
                <p><strong>Phương thức thanh toán:</strong> COD</p>
                <p><strong>Trạng thái:</strong> {{ $order->status }}</p>
                <p><strong>Tổng tiền:</strong> {{ number_format($order->total_price) }} đ</p>

                <hr>
                <h5>Chi tiết sản phẩm:</h5>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Hình ảnh</th>
                            <th>Tên sách</th>
                            <th>Tác giả</th>
                            <th>Số lượng</th>
                            <th>Giá</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order->orderItems as $item)
                            <tr>
                                <td><img src="{{ asset('storage/' . $item->book_image) }}" width="60" /></td>
                                <td>{{ $item->book_title }}</td>
                                <td>{{ $item->book_author }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td>{{ number_format($item->price) }} đ</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- Các nội dung khác... -->
@php
$canCancel = in_array($order->status, ['Chờ xác nhận', 'Đã xác nhận']);
@endphp

@if ($canCancel)
<form action="{{ route('user.order.cancel', $order->id) }}" method="POST" onsubmit="return confirm('Bạn có chắc muốn hủy đơn hàng này?');">
    @csrf
    <button type="submit" class="btn btn-danger">Hủy đơn hàng</button>
</form>
@elseif ($order->status === 'Đã giao hàng')
<form action="{{ route('user.order.received', $order->id) }}" method="POST" onsubmit="return confirm('Xác nhận bạn đã nhận được hàng?');">
    @csrf
    <button type="submit" class="btn btn-success">Đã nhận được hàng</button>
</form>
@endif

    @empty
        <p>Bạn chưa có đơn hàng nào.</p>
    @endforelse
</div>
@endsection
