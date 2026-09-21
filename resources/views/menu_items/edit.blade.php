<!DOCTYPE html>
<html>
<head>
    <title>Edit Menu Item</title>
</head>
<body>
    <h1>Edit Menu Item</h1>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('menu_items.update', $menu_item->id) }}" method="POST">
        @csrf
        @method('PUT')

        <p>
            <label for="name">Name:</label><br>
            <input id="name" type="text" name="name" value="{{ old('name', $menu_item->name) }}"><br><br>
        </p>

        <p>
            <label for="category">Category:</label><br>
            <input id="category" type="text" name="category" value="{{ old('category', $menu_item->category) }}"><br><br>
        </p>

        <p>
            <label for="price">Price:</label><br>
            <input id="price" type="number" step="0.01" min="0" name="price" value="{{ old('price', $menu_item->price) }}"><br><br>
        </p>

        <p>
            <label for="description">Description:</label><br>
            <textarea id="description" name="description">{{ old('description', $menu_item->description) }}</textarea>
        </p>

        <p>
            <label for="availability">Availability:</label><br>
            <select id="availability" name="availability">
                <option value="">Select Option</option>
                <option value="Available" {{ old('availability', $menu_item->availability) == 'Available' ? 'selected' : '' }}>Available</option>
                <option value="Unavailable" {{ old('availability', $menu_item->availability) == 'Unavailable' ? 'selected' : '' }}>Unavailable</option>
            </select>
        </p>

        <button type="submit">Update</button>
        <a href="{{ route('menu_items.index') }}">Cancel</a>
    </form>
</body>
</html>

