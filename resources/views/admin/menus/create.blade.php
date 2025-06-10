<<<<<<< HEAD

<x-app-layout>
    <div class="container py-5">
        <h2 class="mb-4 fw-bold">Add New Menu Item</h2>

    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Add New Menu Item</h1>

=======
<x-app-layout>
    <div class="container py-5">
        <h2 class="mb-4 fw-bold">Add New Menu Item</h2>
>>>>>>> 9f16536e1212d4a4c6e6317a01b43939b1755507
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
<<<<<<< HEAD
=======


>>>>>>> 9f16536e1212d4a4c6e6317a01b43939b1755507
</x-app-layout>
