<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create Menu Item</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="topbar">Menu Manager</div>

    <div class="container narrow">
        <div class="card">
            <h1>Create Menu Item</h1>

            @if ($errors->any())
                <div class="alert alert-error">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('menu_items.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="name">Name</label>
                    <input id="name" type="text" name="name" value="{{ old('name') }}">
                </div>

                <div class="form-group">
                    <label for="category">Category</label>
                    <input id="category" type="text" name="category" value="{{ old('category') }}">
                </div>

                <div class="form-group">
                    <label for="price">Price</label>
                    <input id="price" type="number" step="0.01" min="0" name="price" value="{{ old('price') }}">
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea id="description" name="description">{{ old('description') }}</textarea>
                </div>

                <div class="form-group">
                    <label for="availability">Availability</label>
                    <select id="availability" name="availability">
                        <option value="">Select Option</option>
                        <option value="Available" {{ old('availability') == 'Available' ? 'selected' : '' }}>Available</option>
                        <option value="Unavailable" {{ old('availability') == 'Unavailable' ? 'selected' : '' }}>Unavailable</option>
                    </select>
                </div>

                <div class="form-actions">
                    <button type="submit">Submit</button>
                    <a class="btn btn-outline" href="{{ route('menu_items.index') }}">Back</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
