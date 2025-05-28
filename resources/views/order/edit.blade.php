<x-app-layout>
    <div class="container mt-5">
        <h2>Edit Order #{{ $order->id }}</h2>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('order.update', $order->id) }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label">Table Number</label>
                <input type="number" name="table_no" class="form-control" value="{{ $order->table_no }}" min="1" max="99" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Order Status</label>
                <select name="order_status" class="form-control">
                    <option value="Pending" {{ $order->order_status === 'Pending' ? 'selected' : '' }}>Pending</option>
                    <option value="Completed" {{ $order->order_status === 'Completed' ? 'selected' : '' }}>Completed</option>
                    <option value="Canceled" {{ $order->order_status === 'Canceled' ? 'selected' : '' }}>Canceled</option>
                </select>
            </div>

            <h4>Items</h4>
            @foreach($order->items as $item)
                <div class="row mb-2">
                    <div class="col-6">
                        <input type="text" class="form-control" value="{{ $item->menu->name }}" readonly>
                        <input type="hidden" name="items[{{ $loop->index }}][id]" value="{{ $item->id }}">
                    </div>
                    <div class="col-3">
                        <input type="number" name="items[{{ $loop->index }}][quantity]" class="form-control" value="{{ $item->quantity }}" min="1">
                    </div>
                </div>
            @endforeach

            <button type="submit" class="btn btn-success mt-3">Update Order</button>
        </form>
    </div>
</x-app-layout>
