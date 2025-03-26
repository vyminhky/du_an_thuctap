@php $update = $update ?? false; @endphp

<div class="container mt-4">
    <div class="card shadow">
        <div class="card-body">
            <div class="mb-3">
                <label for="name" class="form-label">Tên:</label>
                <input type="text" id="name" name="name" class="form-control" 
                       value="{{ old('name', $user->name ?? '') }}" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" id="email" name="email" class="form-control"
                       value="{{ old('email', $user->email ?? '') }}" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">
                    Mật khẩu: @if($update)<small class="text-muted">(để trống nếu không đổi)</small>@endif
                </label>
                <input type="password" id="password" name="password" class="form-control">
            </div>

            <div class="mb-3">
                <label for="phone" class="form-label">Điện thoại:</label>
                <input type="text" id="phone" name="phone" class="form-control"
                       value="{{ old('phone', $user->phone ?? '') }}">
            </div>

            <div class="mb-3">
                <label for="address" class="form-label">Địa chỉ:</label>
                <input type="text" id="address" name="address" class="form-control"
                       value="{{ old('address', $user->address ?? '') }}">
            </div>

            <div class="mb-3">
                <label for="role" class="form-label">Vai trò:</label>
                <select name="role" id="role" class="form-select" required>
                    <option value="user" {{ old('role', $user->role ?? '') == 'user' ? 'selected' : '' }}>User</option>
                    <option value="admin" {{ old('role', $user->role ?? '') == 'admin' ? 'selected' : '' }}>Admin</option>
                </select>
            </div>

            <button type="submit" class="btn btn-success">{{ $update ? 'Cập nhật' : 'Tạo mới' }}</button>
            <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Quay lại</a>
        </div>
    </div>
</div>
