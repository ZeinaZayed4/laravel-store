<div class="form-group">
    <x-form.input
        id="name"
        name="name"
        :value="$category->name"
        label="Category Name"
    />
</div>

<div class="form-group">
    <x-form.select
        id="parent"
        name="parent_id"
        label="Category Parent"
        :options="$parents->pluck('name', 'id')"
        :value="$category->parent_id"
        placeholder="Primary Category"
    />
</div>

<div class="form-group">
    <x-form.textarea
        label="Description"
        id="description"
        name="description"
        :value="$category->description"
    />
</div>

<div class="form-group">
    <x-form.input
        label="Image"
        type="file"
        id="image"
        name="image"
        accept="image/*"
    />

    @if($category->image)
        <img src="{{ asset('storage/' . $category->image) }}" alt="" height="50px" class="mt-2">
    @endif
</div>

<div class="form-group">
    <x-form.radio
        label="Status"
        name="status"
        :options="['active' => 'Active', 'archived' => 'Archived']"
        :selected="$category->status"
    />
</div>

<div class="form-group">
    <x-form.button :label="$button_label ?? 'Save'"/>
</div>
