<div class="mb-3">
    <label>Tiêu đề</label>
    <input type="text" name="title" class="form-control" value="{{ old('title', $book->title ?? '') }}" required>
</div>

<div class="mb-3">
    <label>Tác giả</label>
    <input type="text" name="author" class="form-control" value="{{ old('author', $book->author ?? '') }}" required>
</div>

<div class="mb-3">
    <label>Giá</label>
    <input type="number" name="price" class="form-control" value="{{ old('price', $book->price ?? '') }}" required>
</div>

<div class="mb-3">
    <label>Mô tả</label>
    <textarea name="description" class="form-control">{{ old('description', $book->description ?? '') }}</textarea>
</div>
<div class="mb-3">
    <label>Số lượng</label>
    <input type="number" name="stock" class="form-control" min="0" value="{{ old('stock', $book->stock ?? 0) }}" required>
</div>


<div class="mb-3">
    <label>Danh mục</label>
    <select name="category_id" class="form-control" required>
        <option value="">-- Chọn danh mục --</option>
        @foreach($categories as $category)
            <option value="{{ $category->id }}"
                {{ (old('category_id', $book->category_id ?? '') == $category->id) ? 'selected' : '' }}>
                {{ $category->name }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label>Ảnh</label>
    <input type="file" name="image" class="form-control">
    @if(isset($book) && $book->image)
        <img src="{{ asset('storage/' . $book->image) }}" width="100" class="mt-2">
    @endif
</div>
