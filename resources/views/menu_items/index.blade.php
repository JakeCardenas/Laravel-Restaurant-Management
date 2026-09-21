<!DOCTYPE html>
<html 
<head>
    <title>Menu Items</title>
</head>
<body>
    <h1>Menu Items</h1>

    @if(session('success'))
        <div style="color: green; margin-bottom: 10px;">
            {{ session('success') }}
        </div>
    @endif

    <p><a href="{{ route('menu_items.create') }}">Add New Menu Item</a></p>

    <table border="1" cellpadding="5" cellspacing="0">
        <thead>
            <tr>
                <th>Name</th>
                <th>Category</th>
                <th>Price</th>
                <th>Description</th>
                <th>Availability</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($menuItems as $menuItem)
                <tr>
                    <td>{{ $menuItem->name }}</td>
                    <td>{{ $menuItem->category }}</td>
                    <td>{{ $menuItem->price }}</td>
                    <td>{{ $menuItem->description }}</td>
                    <td>{{ $menuItem->availability }}</td>
                    <td>
                        <a href="{{ route('menu_items.edit', $menuItem->id) }}">Edit</a> |
                        <form action="{{ route('menu_items.destroy', $menuItem->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Are you sure you want to delete this item?');">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>