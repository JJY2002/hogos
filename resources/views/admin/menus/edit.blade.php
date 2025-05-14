@extends('layouts.app')

@section('content')
    <h2>Edit Menu Item</h2>
    <form method="POST" action="{{ route('menus.update', $menu->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $menu->name) }}">
            @error('name') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control">{{ old('description', $menu->description) }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Price (RM)</label>
            <input type="number" step="0.01" name="price" class="form-control" value="{{ old('price', $menu->price) }}">
            @error('price') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Category</label>
            <input type="text" name="category" class="form-control" value="{{ old('category', $menu->category) }}">
            @error('category') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <button type="submit" class="btn btn-success">Update Menu Item</button>
    </form>
@endsection
