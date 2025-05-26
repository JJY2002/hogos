<x-AppLayout>
    <div class="container py-4">
        <h1 class="text-center mb-4">Manage Menu Items</h1>

        {{-- Success Message --}}
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        {{-- Add Button --}}
        <div class="text-end mb-3">
            <a href="{{ route('admin.menus.create') }}" class="btn btn-primary">Add Menu Item</a>
        </div>

        {{-- Menu Items --}}
        @if($menus->isEmpty())
            <p class="text-center text-muted">No menu items available.</p>
        @else
            <div class="row">
                @foreach($menus as $menu)
                    <div class="col-md-4">
                        <div class="card mb-4">
                          <img src="{{ asset($menu->image) }}" alt="{{ $menu->name }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $menu->name }}</h5>
                                <p class="card-text">{{ $menu->description }}</p>
                                <p class="fw-bold">RM {{ number_format($menu->price, 2) }}</p>

                                <a href="{{ route('admin.menus.edit', $menu->id) }}" class="btn btn-sm btn-warning">Edit</a>

                                <form action="{{ route('admin.menus.destroy', $menu->id) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Are you sure you want to delete this item?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</x-AppLayout>

