@extends('user.layout')

@section('title', 'Register')

@section('content')
@if(session('register_success'))
    <script>
        alert("{{ session('register_success') }}");
        window.location.href = "{{ route('account.login.form') }}";
    </script>
@endif

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
            <div class="card shadow rounded">
                <div class="card-body">
                    <h2 class="text-center mb-4">
                        <i class="fa fa-user-plus"></i> Register
                    </h2>

                    <form action="{{ route('account.register') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">
                                <i class="fa fa-user"></i> Name
                            </label>
                            <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">
                                <i class="fa fa-envelope"></i> Email
                            </label>
                            <input type="email" name="email" class="form-control" value="{{ old('email') }}">
                            @error('email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">
                                <i class="fa fa-home"></i> Address
                            </label>
                            <input type="text" name="address" class="form-control" value="{{ old('address') }}">
                            @error('address')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">
                                <i class="fa fa-phone"></i> Phone
                            </label>
                            <input type="text" name="phone" class="form-control" value="{{ old('phone') }}">
                            @error('phone')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">
                                <i class="fa fa-lock"></i> Password
                            </label>
                            <input type="password" name="password" class="form-control">
                            @error('password')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">
                                <i class="fa fa-lock"></i> Confirm Password
                            </label>
                            <input type="password" name="password_confirmation" class="form-control">
                        </div>

                        <button type="submit" class="btn btn-primary w-100">
                            <i class="fa fa-user-plus"></i> Register
                        </button>
                    </form>

                    <p class="mt-3 text-center">
                        Already have an account?
                        <a href="{{ route('account.login.form') }}">Login</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
