<x-AppLayout>
       <div style="background-color: #f4f4f4; min-height: 100vh;">
    <div class="container py-5">
        <h2 class="mb-4 fw-bold">Edit Menu Item</h2>

        <form action="{{ route('admin.menus.update', $menu->id) }}" method="POST" enctype="multipart/form-data" class="p-4 border rounded-4 shadow-sm bg-light">
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
                <label for="price" class="form-label">Price (RM)</label>
                <input type="number" step="0.01" class="form-control" id="price" name="price" value="{{ $menu->price }}" required>
            </div>

            <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <input type="text" class="form-control" id="category" name="category" value="{{ $menu->category }}" required>
            </div>

            <div class="mb-4">
                <label for="image" class="form-label">Upload New Image (optional)</label>
                <input type="file" class="form-control" id="image" name="image">
                <small class="text-muted">Leave blank to keep existing image.</small>
            </div>

            <button type="submit" class="btn btn-success">Update Item</button>
        </form>
    </div>
</x-AppLayout>
