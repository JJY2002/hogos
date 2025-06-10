<x-app-layout>
    <div class="container mt-5">
        <h2>Create New Order</h2>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('order.store') }}" method="POST" id="orderForm">
            @csrf

            <div class="mb-3">
                <label for="table_no" class="form-label">Table Number</label>
                <input type="number" class="form-control" name="table_no" id="table_no" min="1" required>
            </div>

            <div class="form-group my-3">
                <label for="order_status">Order Status</label>
                <select name="order_status" class="form-control" required>
                    <option value="Pending">Pending</option>
                    <option value="Confirmed">Confirmed</option>
                    <option value="Canceled">Canceled</option>
                </select>
            </div>

            <div class="mb-3">
                <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#menuModal">
                    Add Menu Items
                </button>
            </div>

            <!-- Table of added items -->
            <table class="table table-bordered" id="itemsTable">
                <thead>
                <tr>
                    <th>Menu Item</th>
                    <th>Quantity</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody></tbody>
            </table>

            <input type="hidden" name="items_json" id="items_json">

            <button type="submit" class="btn btn-success mt-3">Submit Order</button>
        </form>
    </div>

    <!-- Menu Modal -->
    <div class="modal fade" id="menuModal" tabindex="-1" aria-labelledby="menuModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Select Menu Items</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>Item</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Add</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($menus as $menu)
                            <tr>
                                <td>{{ $menu->name }}</td>
                                <td>RM {{ number_format($menu->price, 2) }}</td>
                                <td>
                                    <input dusk="quantity-{{ $menu->id }}" type="number" class="form-control quantity-input" data-id="{{ $menu->id }}" data-name="{{ $menu->name }}" min="1" value="1">
                                </td>
                                <td>
                                    <button dusk="add-{{ $menu->id }}" type="button" class="btn btn-primary btn-sm add-menu"
                                            data-id="{{ $menu->id }}" data-name="{{ $menu->name }}">
                                        Add
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script type="module">
        let items = [];

        $(document).on('click', '.add-menu', function () {
            const id = $(this).data('id');
            const name = $(this).data('name');
            const qtyInput = $('.quantity-input[data-id="' + id + '"]');
            const quantity = parseInt(qtyInput.val());

            if (!quantity || quantity < 1) {
                alert('Please enter a valid quantity.');
                return;
            }

            // Prevent duplicate entries
            const existing = items.find(item => item.id === id);
            if (existing) {
                existing.quantity += quantity;
            } else {
                items.push({ id, name, quantity });
            }

            renderItems();
            $('#items_json').val(JSON.stringify(items));
        });

        function renderItems() {
            const tbody = $('#itemsTable tbody');
            tbody.empty();
            items.forEach((item, index) => {
                tbody.append(`
                    <tr>
                        <td>${item.name}</td>
                        <td>${item.quantity}</td>
                        <td><button type="button" class="btn btn-danger btn-sm remove-item" data-index="${index}">Remove</button></td>
                    </tr>
                `);
            });
        }

        $(document).on('click', '.remove-item', function () {
            const index = $(this).data('index');
            items.splice(index, 1);
            renderItems();
            $('#items_json').val(JSON.stringify(items));
        });
    </script>
</x-app-layout>
