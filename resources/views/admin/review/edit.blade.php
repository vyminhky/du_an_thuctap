@extends('admin.layout')

@section('content')
    <div class="container mt-4">
        <h2>Chỉnh sửa đánh giá</h2>
        <form action="{{ route('admin.reviews.update', $review->id) }}" method="POST">
            @csrf
            @method('PUT')
            @include('admin.review._form', ['update' => true])
        </form>
    </div>
@endsection
