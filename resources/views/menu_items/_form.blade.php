{{-- Shared fields for create and edit. $menu_item is null on create. --}}
@if ($errors->any())
    <div class="alert alert-error">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="form-group">
    <label for="name">Name</label>
    <input id="name" type="text" name="name" maxlength="150" required
           value="{{ old('name', $menu_item?->name) }}">
</div>

<div class="form-row">
    <div class="form-group">
        <label for="category">Category</label>
        <input id="category" type="text" name="category" required
               value="{{ old('category', $menu_item?->category) }}">
    </div>

    <div class="form-group">
        <label for="price">Price</label>
        <input id="price" type="number" step="0.01" min="0" name="price" required
               value="{{ old('price', $menu_item?->price) }}">
    </div>
</div>

<div class="form-group">
    <label for="description">Description <span class="optional">(optional)</span></label>
    <textarea id="description" name="description">{{ old('description', $menu_item?->description) }}</textarea>
</div>

<div class="form-group">
    <label for="availability">Availability</label>
    <select id="availability" name="availability" required>
        <option value="">Select Option</option>
        @foreach (['Available', 'Unavailable'] as $option)
            <option value="{{ $option }}" @selected(old('availability', $menu_item?->availability) === $option)>{{ $option }}</option>
        @endforeach
    </select>
</div>
