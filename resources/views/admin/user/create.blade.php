@extends('admin.layout')

@section('content')
    <h1>Thêm người dùng</h1>
    <form method="POST" action="{{ route('admin.users.store') }}">
        @csrf
        @include('admin.user.form')
    </form>
@endsection
