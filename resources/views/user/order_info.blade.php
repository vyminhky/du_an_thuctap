@extends('user.layout')

@section('content')
<div class="container mt-4">
    <h3>Thông tin đơn hàng #{{ $order->id }}</h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @elseif(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <p><strong>Khách hàng:</strong> {{ $order->customer_name }}</p>
    <p><strong>Email:</strong> {{ $order->customer_email }}</p>
    <p><strong>Điện thoại:</strong> {{ $order->customer_phone }}</p>
    <p><strong>Địa chỉ:</strong> {{ $order->customer_address }}</p>
    <p><strong>Trạng thái:</strong> {{ $order->status }}</p>
    <p><strong>Tổng tiền:</strong> {{ number_format($order->total_price) }} đ</p>

    <hr>
    <h5>Sản phẩm trong đơn hàng</h5>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Ảnh</th>
                <th>Tên sách</th>
                <th>Tác giả</th>
                <th>Số lượng</th>
                <th>Giá</th>
            </tr>
        </thead>
        <tbody>
            @foreach($items as $item)
            <tr>
                <td><img src="{{ asset('storage/' . $item->book_image) }}" width="60"></td>
                <td>{{ $item->book_title }}</td>
                <td>{{ $item->book_author }}</td>
                <td>{{ $item->quantity }}</td>
                <td>{{ number_format($item->price) }} đ</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    @if(in_array($order->status, ['Chờ xác nhận', 'Đã xác nhận']))
        <form method="POST" action="{{ route('orders.cancel', $order->id) }}">
            @csrf
            <button type="submit" class="btn btn-danger mt-2">Hủy đơn hàng</button>
        </form>
    @else
        <div class="alert alert-warning mt-3">
            Không thể hủy đơn hàng ở trạng thái: <strong>{{ $order->status }}</strong>
        </div>
    @endif
</div>
@endsection
