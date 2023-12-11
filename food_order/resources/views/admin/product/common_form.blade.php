<input type="hidden" name="status" value="{{ $status }}">
<div class="form-group">
    <label for="name" class="control-label mb-1">Name</label>
    <input id="name" name="name" type="text" value="{{ old('name', $product->name ?? '') }}"
        class="form-control @error('name') is-invalid @enderror" aria-required="true" aria-invalid="false"
        placeholder="Enter product name...">
    @error('name')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>

<div class="form-group">
    <label for="category_id" class="control-label mb-1">Category</label>
    <select name="category_id" id="category_id" class="form-control @error('category_id') is-invalid @enderror">
        <option value="">Choose your category</option>
        @foreach ($categories as $category)
            <option value="{{ $category->id }}"
                {{ old('category_id', $product->category_id ?? '') == $category->id ? 'selected' : '' }}>
                {{ $category->name }}
            </option>
        @endforeach
    </select>
    @error('category_id')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>

<div class="form-group">
    <label for="description" class="control-label mb-1">Description</label>
    <textarea name="description" id="description" cols="30" rows="5"
        class="form-control @error('description') is-invalid @enderror" placeholder="Enter product description">{{ old('description', $product->description ?? '') }}</textarea>
    @error('description')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>

<div class="form-group">
    <label for="price" class="control-label mb-1">Price</label>
    <input id="price" name="price" type="number" value="{{ old('price', $product->price ?? '') }}"
        class="form-control @error('price') is-invalid @enderror" aria-required="true" aria-invalid="false"
        placeholder="Enter price...">
    @error('price')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>
