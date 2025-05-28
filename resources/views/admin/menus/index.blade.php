<<<<<<< HEAD
<x-AppLayout>
       <div style="background-color: #f4f4f4; min-height: 100vh;">
    <div class="container py-5">
=======

    <div class="container py-4">
        <h1 class="text-center mb-4">Manage Menu Items</h1>


        {{-- Header --}}
        <div class="bg-gray-900 text-white py-6 text-center">
            <h2 class="text-3xl font-bold">MENU</h2>
        </div>
         {{-- Header --}}
        <div class="bg-gray-900 text-white py-6 text-center">
            <h2 class="text-3xl font-bold">MENU</h2>
        </div>
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold">Manage Menu Items</h2>
            <a href="{{ route('admin.menus.create') }}" class="btn btn-success">+ Add New Menu Item</a>
        </div>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="row g-4">
            @foreach($menus as $menu)
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm rounded-4 border-0">
                        <img src="{{ asset($menu->image) }}" class="card-img-top rounded-top-4" alt="{{ $menu->name }}">
                        <div class="card-body">
                            <h5 class="card-title fw-bold">{{ $menu->name }}</h5>
                            <p class="card-text text-muted">{{ $menu->description }}</p>
                            <p class="fw-semibold text-primary">RM {{ number_format($menu->price, 2) }}</p>

                            <div class="d-flex justify-content-between">
                                <a href="{{ route('admin.menus.edit', $menu->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('admin.menus.destroy', $menu->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Delete this item?')">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
<<<<<<< HEAD
</x-AppLayout>
=======

