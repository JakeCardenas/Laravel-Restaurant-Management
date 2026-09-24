@extends('layouts.app')

@section('title', 'Edit Menu Item')
@section('container_class', 'narrow')

@section('content')
    <div class="card">
        <h1>Edit Menu Item</h1>

        <form action="{{ route('menu_items.update', $menu_item) }}" method="POST">
            @csrf
            @method('PUT')

            @include('menu_items._form')

            <div class="form-actions">
                <button type="submit">Update</button>
                <a class="btn btn-outline" href="{{ route('menu_items.index') }}">Cancel</a>
            </div>
        </form>
    </div>
@endsection
