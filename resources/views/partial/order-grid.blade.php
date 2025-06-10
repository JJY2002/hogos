@foreach ($orders as $order)
    <div class="bg-white rounded-2xl shadow p-4 w-full">
        <h2 class="text-xl font-semibold text-center">Table {{ $order->table_no }}</h2>
        <p class="text-sm text-gray-600 text-center mb-2">Order #{{ $order->id }}</p>

        <div class="mb-3 text-sm text-gray-700">
            @foreach ($order->items as $item)
                {{ $item->quantity }}x {{ $item->menu->name }}<br>
            @endforeach
        </div>

        <div class="text-right text-xs text-gray-500">
            {{ $order->updated_at->format('H:i:s') }}
        </div>
    </div>
@endforeach
