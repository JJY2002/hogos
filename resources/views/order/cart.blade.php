<x-app-layout>

    <style>
        p {
            margin-top: 0;
            margin-bottom: 0;
            padding: 0;
        }
    </style>

    <body style="background-color: #F0F0F0;" class="pb-10">

    <!-- Header -->
    <div class="bg-black w-full h-52 -mb-30 pl-20 pt-11 ">
        <p class="text-white text-2xl font-[Inter] font-bold">Order Cart</p>
    </div>

    <!-- Main 2-column layout -->
    <div class="flex space-x-[25px] px-12 h-full">

        <div class="flex-7 text-black  flex flex-col overflow-hidden  ">
            <div>
                <div class="bg-white p-[20px] flex-5 rounded-2xl flex flex-col mb-3 text-black overflow-y-auto" style="max-height: 70vh;">
                    @foreach($order->items as $item)
                        <div class="flex border-b pb-2">
                            <!-- Image -->
                            <div class="h-40 w-40 mr-4 py-2">
                                <img src="{{ asset($item->menu->image) }}" class="rounded w-full h-auto" alt="product image">
                            </div>

                            <!-- Info -->
                            <div class="flex-1">
                                <p class="font-bold text-2xl">{{ $item->menu->name }}</p>
                                <div class="w-32">
                                    <div class="qty-group input-group flex items-center mt-2">
                                        <button type="button" class="btn btn-outline-secondary minus-btn">-</button>
                                        <input type="number"
                                               class="form-control text-center order-qty"
                                               id="orderQty{{ $item->id }}"
                                               data-id="{{ $item->id }}"
                                               data-name="{{ $item->menu->name }}"
                                               data-price="{{ $item->menu->price }}"
                                               value="{{ $item->quantity }}"
                                               readonly>
                                        <button type="button" class="btn btn-outline-secondary add-btn">+</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Right Column -->
        <div class="flex-3 text-black">
            <div class="bg-white p-[30px] font-[Inter] flex flex-col rounded-2xl text-black h-full">
                <div class="flex items-center justify-between">
                    <p class="text-2xl font-[Inter] font-semibold">Table No #{{ $order->id }}</p>
                </div>
                <p class="text-xl mb-3">Ordered Items</p>
                <div class="overflow-y-auto mb-3" style="max-height: 20vh;">
                    <div id="orderedItems">
                        @foreach($order->items as $item)
                            <div class="flex justify-between mb-2" data-id="{{ $item->id }}">
                                <span class="ordered-text">{{ $item->quantity }} x {{ $item->menu->name }}</span>
                                <span class="ordered-price">RM {{ number_format($item->quantity * $item->menu->price, 2) }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>
                <form action="{{ route('order.updateOrder') }}" method="post">
                    @csrf
                    <p class="text-xl mb-3">Order Type</p>
                    <input type="hidden" name="table_no" value="{{ $order->table_no }}">
                    <input type="hidden" name="id" value="{{ $order->id }}">
                    <div class="flex items-center justify-between mb-3">
                        <div class="btn-group w-50 me-1">
                            <input type="radio" name="orderType" id="orderType1" class="btn-check" autocomplete="off" value="Dine in" checked>
                            <label class="btn btn-outline-primary" for="orderType1">Dine in</label>
                        </div>
                        <div class="btn-group w-50 ms-1">
                            <input type="radio" name="orderType" id="orderType2" class="btn-check" autocomplete="off" value="Takeaway">
                            <label class="btn btn-outline-primary" for="orderType2">Takeaway</label>
                        </div>
                    </div>
                    <button type="submit" id="btnConfirm"
                            class="w-full bg-[#6078D4] hover:bg-[#5569B4] text-white font-bold py-3 rounded-2">
                        Confirm Order
                    </button>
                </form>
            </div>
        </div>

    </div>

    </body>
    <script type="module">
        $(document).on("click", ".add-btn", function () {
            $("#btnConfirm").prop("disabled", true);
            const container = $(this).closest(".qty-group");
            const input = container.find(".order-qty");
            let current = parseInt(input.val()) || 1;

            if (current < 99) {
                const newQty = current + 1;
                const orderMenuId = input.data("id");

                // Update input value immediately for UI feedback
                input.val(newQty);
                // Send AJAX to update quantity in DB
                $.ajax({
                    url: '{{ route('order.updateQuantity') }}', // your route to handle update
                    method: 'POST',
                    data: {
                        order_menu_id: orderMenuId,
                        quantity: newQty,
                        _token: $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        // Optionally handle success feedback here
                        console.log('Quantity updated successfully');
                        location.reload();
                    },
                    error: function(xhr) {
                        // Optionally handle error and rollback UI
                        alert('Failed to update quantity');
                        input.val(current); // rollback to old value
                    }
                });
            }
        });

        $(document).on("click", ".minus-btn", function () {
            $("#btnConfirm").prop("disabled", true);
            const container = $(this).closest(".qty-group");
            const input = container.find(".order-qty");
            let current = parseInt(input.val()) || 1;

            if (current > 1) {
                const newQty = current - 1;
                const orderMenuId = input.data("id");

                // Update input value immediately for UI feedback
                input.val(newQty);

                // Send AJAX to update quantity in DB
                $.ajax({
                    url: '{{ route('order.updateQuantity') }}', // your route to handle update
                    method: 'POST',
                    data: {
                        order_menu_id: orderMenuId,
                        quantity: newQty,
                        _token: $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        console.log('Quantity updated successfully');
                        location.reload();
                    },
                    error: function(xhr) {
                        alert('Failed to update quantity');
                        input.val(current);
                    }
                });
            }
        });

    </script>

</x-app-layout>
