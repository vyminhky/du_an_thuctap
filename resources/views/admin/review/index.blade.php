@extends('admin.layout')

@section('content')
    <div class="container mt-4">
        <h2>Danh sách đánh giá</h2>
        <a href="{{ route('admin.reviews.create') }}" class="btn btn-primary mb-3">Thêm đánh giá</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th><th>Người dùng</th><th>Sách</th><th>Rating</th><th>Bình luận</th><th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reviews as $review)
                    <tr>
                        <td>{{ $review->id }}</td>
                        <td>{{ $review->user->name ?? '' }}</td>
                        <td>{{ $review->book->title ?? '' }}</td>
                        <td>{{ $review->rating }}</td>
                        <td>{{ $review->comment }}</td>
                        <td>
                            <a href="{{ route('admin.reviews.edit', $review->id) }}" class="btn btn-sm btn-warning">Sửa</a>
                            <form action="{{ route('admin.reviews.destroy', $review->id) }}" method="POST" style="display:inline;">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-danger" onclick="return confirm('Xóa đánh giá này?')">Xóa</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
