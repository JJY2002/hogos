<x-AppLayout>
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Edit Menu Item</h1>

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
                <label for="image" class="form-label">Dish Image</label>
                <input type="file" class="form-control" id="image" name="image">
                <img src="{{ asset('storage/' . $menu->image) }}" alt="Current Image" class="img-thumbnail mt-2" width="150">
            </div>

            <button type="submit" class="btn btn-primary">Update Menu Item</button>
        </form>
    </div>
</x-AppLayout>
