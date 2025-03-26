@extends('admin.layout')

@section('content')
    <h4>Thêm khuyến mãi</h4>
    <form action="{{ route('admin.promotions.store') }}" method="POST">
        @csrf
        @include('admin.promotion.form')
        <button type="submit" class="btn btn-success">Lưu</button>
    </form>
@endsection
