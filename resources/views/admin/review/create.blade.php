@extends('admin.layout')

@section('content')
    <div class="container mt-4">
        <h2>Thêm đánh giá</h2>
        <form action="{{ route('admin.reviews.store') }}" method="POST">
            @csrf
            @include('admin.review._form', ['update' => false])
        </form>
    </div>
@endsection
