@extends('admin.layout')

@section('content')
    <h4>Thêm sách mới</h4>
    <form action="{{ route('admin.books.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        @include('admin.book.form')

        <button type="submit" class="btn btn-success">Lưu</button>
    </form>
@endsection
