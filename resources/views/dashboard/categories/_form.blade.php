<div class="form-group">
    <label for="name">Category Name</label>
    <input type="text" id="name" name="name" @class([
        'form-control',
        'is-invalid' => $errors->has('name'),
        ]) value="{{ old('name', $category->name) }}">
    @error('name')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>

<div class="form-group">
    <label for="parent">Category Parent</label>
    <select id="parent" name="parent_id" @class([
        'form-control',
        'form-select',
        'is-invalid' => $errors->has('parent_id'),
        ])>
        <option value="">Primary Category</option>
        @foreach($parents as $parent)
            <option value="{{ $parent->id }}" @selected(old('parent_id', $category->parent_id) === $parent->id)>{{ $parent->name }}</option>
        @endforeach
    </select>
    @error('parent_id')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>

<div class="form-group">
    <label for="description">Description</label>
    <textarea id="description" name="description" class="form-control">{{ old('description', $category->description) }}</textarea>
</div>

<div class="form-group">
    <label for="image">Image</label>
    <input type="file" id="image" name="image" @class([
        'form-control',
        'is-invalid' => $errors->has('image'),
        ]) accept="image/*">
    @error('image')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror

    @if($category->image)
        <img src="{{ asset('storage/' . $category->image) }}" alt="" height="50px">
    @endif
</div>

<div class="form-group">
    <label>Status</label>
    <div>
        <div class="form-check">
            <input class="form-check-input @error('status') is-invalid @enderror"
                   type="radio"
                   name="status"
                   value="active" @checked(old('status', $category->status) === 'active')>
            <label class="form-check-label">
                Active
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input @error('status') is-invalid @enderror"
                   type="radio"
                   name="status"
                   value="archived" @checked(old('status', $category->status) === 'archived')>
            <label class="form-check-label">
                Archived
            </label>
        </div>
        @error('status')
        <div class="invalid-feedback d-block">
            {{ $message }}
        </div>
        @enderror
    </div>
</div>

<div class="form-group">
    <button type="submit" class="btn btn-primary">{{ $button_label ?? 'Save'}}</button>
</div>
