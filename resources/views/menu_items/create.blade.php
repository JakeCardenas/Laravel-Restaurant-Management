@extends('layouts.app')

@section('title', 'Create Menu Item')
@section('container_class', 'narrow')

@section('content')
    <div class="card">
        <h1>Create Menu Item</h1>

        <form action="{{ route('menu_items.store') }}" method="POST">
            @csrf

            @include('menu_items._form', ['menu_item' => null])

            <div class="form-actions">
                <button type="submit">Submit</button>
                <a class="btn btn-outline" href="{{ route('menu_items.index') }}">Back</a>
            </div>
        </form>
    </div>
@endsection
