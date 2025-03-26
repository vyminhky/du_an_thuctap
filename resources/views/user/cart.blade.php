@extends('user.layout') {{-- Sửa theo layout của bạn --}}

@section('content')
<div class="container mt-4">
    <h2>Giỏ hàng</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    @if($items->isEmpty())
        <p>Giỏ hàng của bạn đang trống.</p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Sách</th>
                    <th>Hình ảnh</th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                    <th>Tổng</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @php $total = 0; @endphp
                @foreach($items as $item)
                    @php
                        $subtotal = $item->book->price * $item->quantity;
                        $total += $subtotal;
                    @endphp
                    <tr>
                        <td>{{ $item->book->title }}</td>
                        <td>
                            <img src="{{ asset('storage/' . $item->book->image) }}" width="60" alt="">
                        </td>
                        <td>{{ number_format($item->book->price) }} đ</td>
                        <td>
                            <form method="POST" action="{{ route('cart.update', $item->id) }}" class="d-flex align-items-center">
                                @csrf
                                @method('PATCH')
                                <input type="number" name="quantity" value="{{ $item->quantity }}" min="1" class="form-control form-control-sm me-2" style="width: 70px;">
                                <button type="submit" class="btn btn-sm btn-outline-primary">Cập nhật</button>
                            </form>
                        </td>
                                                <td>{{ number_format($subtotal) }} đ</td>
                        <td>
                            <form method="POST" action="{{ route('cart.remove', $item->id) }}">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" onclick="return confirm('Xóa sản phẩm này?')">Xóa</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="4" class="text-right"><strong>Tổng cộng:</strong></td>
                    <td colspan="2"><strong>{{ number_format($total) }} đ</strong></td>
                </tr>
            </tbody>
        </table>
        @if(!$items->isEmpty())
        <div class="text-end mt-3">
            <a href="{{ route('order.form') }}" class="btn btn-success">Đặt hàng</a>
        </div>        
    @endif
    

    @endif
</div>
@endsection
