<x-AppLayout>
    <div style="background-color: #f4f4f4; min-height: 100vh;">
        {{-- Header --}}
        <div class="bg-dark text-white text-center py-4">
            <h2 class="fw-bold mb-0">MENU</h2>
        </div>

        {{-- Category Buttons --}}
        <div class="container my-4">
            <div class="d-flex flex-wrap justify-content-center gap-2">
                @foreach (['Pasta', 'Seafood', 'Lamb', 'Burgers', 'Fresh Juice', 'Coffee', 'Milk Shake'] as $category)
                    <button class="btn btn-outline-dark rounded-pill px-4 py-2 fw-semibold">
                        {{ $category }}
                    </button>
                @endforeach
            </div>

            {{-- Section Title --}}
            <h3 class="fw-bold text-dark mt-5 mb-4">ALL MENU</h3>

            {{-- Menu Items --}}
            <div class="row">
                @forelse ($menus as $menu)
                    <div class="col-md-4 mb-4">
                        <div class="card shadow-sm rounded-4 h-100">
                            <img src="{{ asset($menu->image) }}" class="card-img-top" alt="{{ $menu->name }}" style="height: 250px; object-fit: cover;">
                            <div class="card-body">
                                <h5 class="card-title fw-bold text-uppercase">{{ $menu->name }}</h5>
                                <p class="card-text text-muted small">{{ $menu->description }}</p>
                                <p class="fw-semibold">RM {{ number_format($menu->price, 2) }}</p>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-center text-muted">No menu items found.</p>
                @endforelse
            </div>
        </div>
    </div>
</x-AppLayout>




