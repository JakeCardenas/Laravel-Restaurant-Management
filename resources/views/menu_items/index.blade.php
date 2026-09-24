<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Menu Items</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="topbar">Menu Manager</div>

    <div class="container">
        <div class="page-header">
            <h1>Menu Items</h1>
            <a class="btn" href="{{ route('menu_items.create') }}">+ Add New Menu Item</a>
        </div>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="card table-wrap">
            <table>
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
                    @forelse($menuItems as $menuItem)
                        <tr>
                            <td>{{ $menuItem->name }}</td>
                            <td>{{ $menuItem->category }}</td>
                            <td>{{ $menuItem->price }}</td>
                            <td>{{ $menuItem->description }}</td>
                            <td>
                                <span class="badge {{ $menuItem->availability == 'Available' ? 'badge-available' : 'badge-unavailable' }}">
                                    {{ $menuItem->availability }}
                                </span>
                            </td>
                            <td class="actions">
                                <a class="btn btn-outline btn-sm" href="{{ route('menu_items.edit', $menuItem->id) }}">Edit</a>
                                <form action="{{ route('menu_items.destroy', $menuItem->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this item?');">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="empty">No menu items yet.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
