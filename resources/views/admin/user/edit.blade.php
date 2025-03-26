@extends('admin.layout')

@section('content')
    <h1>Sửa người dùng</h1>
    <form method="POST" action="{{ route('admin.users.update', $user->id) }}">
        @csrf @method('PUT')
        @include('admin.user.form', ['update' => true])
    </form>
@endsection
