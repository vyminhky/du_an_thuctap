@extends('admin.layout')

@section('content')
    <h4>Cập nhật danh mục</h4>

    <form action="{{ route('admin.categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name">Tên danh mục</label>
            <input type="text" name="name" class="form-control" value="{{ $category->name }}" required>
        </div>

        <div class="mb-3">
            <label for="image">Hình ảnh hiện tại</label><br>
            @if($category->image)
                <img src="{{ asset('storage/' . $category->image) }}" width="100">
            @endif
        </div>

        <div class="mb-3">
            <label for="image">Hình ảnh mới</label>
            <input type="file" name="image" class="form-control">
        </div>

        <button class="btn btn-primary">Cập nhật</button>
        <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">Quay lại</a>
    </form>
@endsection
