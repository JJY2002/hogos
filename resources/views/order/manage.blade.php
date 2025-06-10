<x-app-layout>
    <div class="container pt-5">
        <div class="row">
            <div class="col">
                <h1>Manage Order</h1>
            </div>
            <div class="col">
                <a href="{{ route('order.create') }}" class="rounded-xl px-4 py-2 bg-blue-600 hover:bg-blue-800 text-white text-decoration-none float-end">
                    Add Order
                </a>
            </div>
        </div>

        <table id="ordersTable" class="table table-striped table-hover mt-4">
            <thead>
            <tr class="text-center">
                <th>Order Id</th>
                <th>Table No</th>
                <th>Food Orders</th>
                <th>Status</th>
                <th>Time</th>
                <th>Date</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($orders as $order)
                <tr>
                    <td>#{{ $order->id }}</td>
                    <td class="text-center">{{ $order->table_no }}</td>
                    <td>
                        @foreach($order->items as $item)
                            {{ $item->quantity . "x " . $item->menu->name . "," }}
                        @endforeach
                    </td>
                    <td class="text-center">{{ strtoupper($order->order_status) }}</td>
                    <td class="text-center">{{ $order->updated_at->format('H:i:s') }}</td>
                    <td class="text-center">{{ $order->updated_at->format('Y-m-d') }}</td>
                    <td class="text-center"><a href="/order/edit/{{ $order->id }}" class="btn btn-primary">Edit</a></td>
                </tr>
            @endforeach

            {{--<tr>
                <td colspan="6">No data found!</td>
            </tr>--}}
            </tbody>
        </table>
    </div>

    @section('scripts')
        <script type="module">
            $(document).ready(function () {
                $('#ordersTable').DataTable({
                    responsive: true
                });
            });
        </script>
    @endsection
</x-app-layout>
