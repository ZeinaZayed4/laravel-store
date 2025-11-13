@php use
  App\Models\Category;
@endphp
    <div class="form-group">
        <x-form.input label="Product Name" class="form-control-lg" role="input" id="name" name="name"
                      :value="$product->name"/>
    </div>
    <div class="form-group">
        <x-form.select label="Category"
                       name="category_id"
                       id="category_id"
                       :options="Category::pluck('name', 'id')"
                       :value="$product->category_id"
                       placeholder="Primary Category"/>
    </div>
    <div class="form-group">
        <x-form.textarea label="Description" id="description" name="description" :value="$product->description" />
    </div>
    <div class="form-group">
        <x-form.input id="image" label="Image" type="file" name="image" accept="image/*" />
        @if ($product->image)
            <img src="{{ asset('storage/' . $product->image) }}" alt="" height="60">
        @endif
    </div>
    <div class="form-group">
        <x-form.input label="Price" id="price" name="price" :value="$product->price" />
    </div>
    <div class="form-group">
        <x-form.input label="Compare Price" id="compare_price" name="compare_price" :value="$product->compare_price" />
    </div>
    <div class="form-group">
        <x-form.input label="Tags" id="tags" name="tags" :value="$tags"/>
    </div>
    <div class="form-group">
        <x-form.radio label="Status" id="status" name="status" :selected="$product->status"
                      :options="['active' => 'Active', 'draft' => 'Draft', 'archived' => 'Archived']" />
    </div>
    <div class="form-group">
        <x-form.button>Update</x-form.button>
    </div>

@push('styles')
    <link href="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.css" rel="stylesheet" type="text/css" />
@endpush

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify"></script>
    <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.polyfills.min.js"></script>
    <script>
        var inputElm = document.querySelector('[name=tags]'),
            tagify = new Tagify (inputElm);
    </script>
@endpush
