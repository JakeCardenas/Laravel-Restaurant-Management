<!DOCTYPE html>
<html>
<head>
    <title>Create Menu Item</title>
</head>
<body>
    <h1>Create Menu Item</h1>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('menu_items.store') }}" method="POST">
        @csrf

        <p>
            <label for="name">Name:</label><br>
            <input id="name" type="text" name="name" value="{{ old('name') }}">
        </p>

        <p>
            <label for="category">Category:</label><br>
            <input id="category" type="text" name="category" value="{{ old('category') }}">
        </p>

        <p>
            <label for="price">Price:</label><br>
            <input id="price" type="number" step="0.01" min="0" name="price" value="{{ old('price') }}">
        </p>

        <p>
            <label for="description">Description:</label><br>
            <textarea id="description" name="description">{{ old('description') }}</textarea>
        </p>

        <p>
            <label for="availability">Availability:</label><br>
            <select id="availability" name="availability">
                <option value="">Select Option</option>
                <option value="Available" {{ old('availability') == 'Available' ? 'selected' : '' }}>Available</option>
                <option value="Unavailable" {{ old('availability') == 'Unavailable' ? 'selected' : '' }}>Unavailable</option>
            </select>
        </p>

        <button type="submit">Submit</button>
        <a href="{{ route('menu_items.index') }}">Back</a>
    </form>
</body>
</html>

