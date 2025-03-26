<div class="mb-3">
    <label>Tên khuyến mãi</label>
    <input type="text" name="name" class="form-control" value="{{ old('name', $promotion->name ?? '') }}" required>
</div>

<div class="mb-3">
    <label>Giảm giá (%)</label>
    <input type="number" name="discount" class="form-control" min="0" max="100" value="{{ old('discount', $promotion->discount ?? '') }}" required>
</div>

<div class="mb-3">
    <label>Ngày bắt đầu</label>
    <input type="date" name="start_date" class="form-control" value="{{ old('start_date', $promotion->start_date ?? '') }}" required>
</div>

<div class="mb-3">
    <label>Ngày kết thúc</label>
    <input type="date" name="end_date" class="form-control" value="{{ old('end_date', $promotion->end_date ?? '') }}" required>
</div>
