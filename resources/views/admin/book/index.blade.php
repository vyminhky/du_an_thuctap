@extends('admin.layout')

@section('content')
    <h4>Danh sách sách</h4>
    <a href="{{ route('admin.books.create') }}" class="btn btn-primary mb-3">Thêm sách</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Tiêu đề</th>
                <th>Tác giả</th>
                <th>Giá</th>
                <th>Danh mục</th>
                <th>Số lượng</th>
                <th>Ảnh</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach($books as $book)
                <tr>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->author }}</td>
                    <td>{{ number_format($book->price) }} đ</td>
                    <td>{{ $book->category->name ?? 'Không có' }}</td>
                    <td>{{ $book->stock ?? 'Không có' }}</td>

                    <td>
                        @if($book->image)
                            <img src="{{ asset('storage/' . $book->image) }}" width="80">
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.books.edit', $book->id) }}" class="btn btn-sm btn-warning">Sửa</a>
                        <form action="{{ route('admin.books.destroy', $book->id) }}" method="POST" style="display:inline-block;">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger"
                                onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
