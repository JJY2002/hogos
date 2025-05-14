@extends('layouts.app')
@section('content')
<h2>Admin - Manage Menu</h2>
<a href="{{ route('admin.menus.create') }}" class="btn btn-primary mb-2">Add New Item</a>
<table class="table">
    <thead>
        <tr><th>Name</th><th>Price</th><th>Category</th><th>Actions</th></tr>
    </thead>
    <tbody>
        @foreach($menus as $menu)
        <tr>
            <td>{{ $menu->name }}</td>
            <td>RM {{ $menu->price }}</td>
            <td>{{ $menu->category }}</td>
            <td>
                <a href="{{ route('admin.menus.edit', $menu->id) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('admin.menus.destroy', $menu->id) }}" method="POST" style="display:inline">
                    @csrf @method('DELETE')
                    <button class="btn btn-sm btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
