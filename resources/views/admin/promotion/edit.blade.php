@extends('admin.layout')

@section('content')
    <h4>Sửa khuyến mãi</h4>
    <form action="{{ route('admin.promotions.update', $promotion->id) }}" method="POST">
        @csrf @method('PUT')
        @include('admin.promotion.form', ['promotion' => $promotion])
        <button type="submit" class="btn btn-primary">Cập nhật</button>
    </form>
@endsection
