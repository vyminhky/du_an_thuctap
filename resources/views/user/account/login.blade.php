@extends('user.layout')

@section('title', 'Login')

@section('content')
<h2 class="text-center mt-4"><i class="fa fa-sign-in-alt"></i> Login</h2>

@if(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif

@if($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="container mt-5">
    <div class="row justify-content-center">
<form action="{{ route('account.login') }}" method="POST" class="mt-4">
    @csrf

    <div class="mb-3">
        <label class="form-label"><i class="fa fa-envelope"></i> Email</label>
        <input type="email" name="email" class="form-control" value="{{ old('email') }}">
    </div>

    <div class="mb-3">
        <label class="form-label"><i class="fa fa-lock"></i> Password</label>
        <input type="password" name="password" class="form-control">
    </div>

    <button type="submit" class="btn btn-success w-100">
        <i class="fa fa-sign-in-alt"></i> Login
    </button>
</form>

<p class="mt-3 text-center">Don't have an account?
    <a href="{{ route('account.register.form') }}">Register</a>
</p>
</div>
</div>
@endsection
