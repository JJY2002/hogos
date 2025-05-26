<x-app-layout>
    <div class="container">
        <h1 class="text-center mb-4">Edit Menu Item</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('admin.menus.update', $menu->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Dish Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $menu->name }}" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3" required>{{ $menu->description }}</textarea>
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" step="0.01" class="form-control" id="price" name="price" value="{{ $menu->price }}" required>
            </div>

            <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <input type="text" class="form-control" id="category" name="category" value="{{ $menu->category }}" required>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Dish Image</label>
                <input type="file" class="form-control" id="image" name="image">
                <img src="{{ asset($menu->image) }}" alt="Current Image" class="img-thumbnail mt-2" width="150">
            </div>

            <button type="submit" class="btn btn-success">Update Menu Item</button>
        </form>
    </div>
</x-app-layout>

