<x-AppLayout>
    <div class="container">
        <h1 class="text-center mb-4">Our Signatures</h1>

        @if($menus->isEmpty())
            <p class="text-center text-muted">No menu items found.</p>
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
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-AppLayout>


