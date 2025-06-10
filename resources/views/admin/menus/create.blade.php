<x-app-layout>
    <div class="container py-5">
        <h2 class="mb-4 fw-bold">Add New Menu Item</h2>
        @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
    <form action="{{ route('admin.menus.store') }}" method="POST" enctype="multipart/form-data" class="p-4 border rounded-4 shadow-sm bg-light">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Dish Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Price (RM)</label>
                <input type="number" step="0.01" class="form-control" id="price" name="price" required>
            </div>

            <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <input type="text" class="form-control" id="category" name="category" required>
            </div>

            <div class="mb-4">
                <label for="image" class="form-label">Upload Image</label>
                <input type="file" class="form-control" id="image" name="image" required>
            </div>

            <button type="submit" class="btn btn-primary">Add Item</button>
        </form>
    </div>
</x-app-layout>
