<div class="mb-3">
    <label class="form-label">Người dùng</label>
    <select name="user_id" class="form-select" required>
        @foreach ($users as $user)
            <option value="{{ $user->id }}" {{ old('user_id', $review->user_id ?? '') == $user->id ? 'selected' : '' }}>
                {{ $user->name }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label class="form-label">Sách</label>
    <select name="book_id" class="form-select" required>
        @foreach ($books as $book)
            <option value="{{ $book->id }}" {{ old('book_id', $review->book_id ?? '') == $book->id ? 'selected' : '' }}>
                {{ $book->title }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label class="form-label">Đánh giá (1 - 5 sao)</label>
    <input type="number" name="rating" class="form-control" min="1" max="5" value="{{ old('rating', $review->rating ?? '') }}" required>
</div>

<div class="mb-3">
    <label class="form-label">Bình luận</label>
    <textarea name="comment" class="form-control">{{ old('comment', $review->comment ?? '') }}</textarea>
</div>

<button type="submit" class="btn btn-success">{{ $update ? 'Cập nhật' : 'Tạo mới' }}</button>
<a href="{{ route('admin.reviews.index') }}" class="btn btn-secondary">Quay lại</a>
