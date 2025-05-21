<x-app-layout>
    <div class="container mx-auto p-4">
        <h1 class="text-center text-2xl font-bold mb-6">Manage Menu Items</h1>

        <a href="{{ route('admin.menus.create') }}" class="btn btn-primary mb-4">Add New Menu Item</a>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="row">
            @foreach($menus as $menu)
                <div class="col-md-4">
                    <div class="card mb-4">
                        <img src="{{ asset($menu->image) }}" class="card-img-top" alt="{{ $menu->name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $menu->name }}</h5>
                            <p class="card-text">{{ $menu->description }}</p>
                            <p class="font-weight-bold">RM {{ number_format($menu->price, 2) }}</p>

                            <a href="{{ route('admin.menus.edit', $menu->id) }}" class="btn btn-warning">Edit</a>

                            <form action="{{ route('admin.menus.destroy', $menu->id) }}" method="POST" class="d-inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
