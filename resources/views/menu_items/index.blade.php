@extends('layouts.app')

@section('title', 'Menu Items')

@section('content')
    <div class="page-header">
        <div>
            <h1>Menu Items</h1>
            <p class="subtitle">{{ $menuItems->count() }} {{ Str::plural('item', $menuItems->count()) }}</p>
        </div>
        <a class="btn" href="{{ route('menu_items.create') }}">+ Add New Menu Item</a>
    </div>

    @if (session('success'))
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
                    <th class="num">Price</th>
                    <th>Description</th>
                    <th>Availability</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($menuItems as $menuItem)
                    <tr>
                        <td class="name">{{ $menuItem->name }}</td>
                        <td>{{ $menuItem->category }}</td>
                        <td class="num">₱{{ number_format($menuItem->price, 2) }}</td>
                        <td class="description">{{ $menuItem->description ?: '—' }}</td>
                        <td>
                            <span class="badge {{ $menuItem->availability === 'Available' ? 'badge-available' : 'badge-unavailable' }}">
                                {{ $menuItem->availability }}
                            </span>
                        </td>
                        <td class="actions">
                            <a class="btn btn-outline btn-sm" href="{{ route('menu_items.edit', $menuItem) }}">Edit</a>
                            <form action="{{ route('menu_items.destroy', $menuItem) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this item?');">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="empty">
                            No menu items yet. <a href="{{ route('menu_items.create') }}">Add the first one</a>.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
