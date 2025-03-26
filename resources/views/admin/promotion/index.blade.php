@extends('admin.layout')

@section('content')
    <h4>Danh sách khuyến mãi</h4>
    <a href="{{ route('admin.promotions.create') }}" class="btn btn-primary mb-3">Thêm khuyến mãi</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Tên</th>
                <th>Giảm (%)</th>
                <th>Ngày bắt đầu</th>
                <th>Ngày kết thúc</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach($promotions as $promo)
                <tr>
                    <td>{{ $promo->name }}</td>
                    <td>{{ $promo->discount }}%</td>
                    <td>{{ $promo->start_date }}</td>
                    <td>{{ $promo->end_date }}</td>
                    <td>
                        <a href="{{ route('admin.promotions.edit', $promo->id) }}" class="btn btn-sm btn-warning">Sửa</a>
                        <form action="{{ route('admin.promotions.destroy', $promo->id) }}" method="POST" style="display:inline-block;">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Xóa?')">Xóa</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
