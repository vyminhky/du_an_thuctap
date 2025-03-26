@extends('admin.layout')

@section('content')
    <h4>Sửa sách</h4>
    <form action="{{ route('admin.books.update', $book->id) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')

        @include('admin.book.form', ['book' => $book])

        <button type="submit" class="btn btn-primary">Cập nhật</button>
    </form>
@endsection
