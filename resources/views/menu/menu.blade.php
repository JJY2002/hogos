<x-app-layout>
    <div class="container mt-2">
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
                            <button id="{{ $menu->id }}" class="btn btn-primary float-right add-item" {{--data-bs-toggle="modal" data-bs-target="#addToCartModal"--}}>Add to Order</button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <!-- Add to Cart Modal -->
    <div class="modal fade" id="addToCartModal" tabindex="-1" aria-labelledby="addToCartLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <img src="" alt="" id="itemImg" class="img-fluid mb-3 rounded mx-auto block">
                    <strong id="modalItemName" class="text-2xl"></strong>
                    <div class="input-group mb-2 mt-3 px-40">
                        <button class="btn btn-outline-secondary" type="button" id="minusBtn">-</button>
                        <input id="orderAmt" type="number" class="form-control" placeholder="1" min="1" maxlength="2" value="1" readonly>
                        <button class="btn btn-outline-secondary" type="button" id="addBtn">+</button>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <form id="addToCartForm" method="POST" data-url="{{ route('order.storeItem') }}">
                        @csrf
                        <input type="hidden" name="menu_id" id="modalMenuId">
                        <input type="hidden" name="quantity" id="modalQuantity">
                        <button type="submit" class="btn btn-primary">Add to Order</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script type="module">
        $(".add-item").on("click", function () {
            const menuId = $(this).attr("id");
            const card = $(this).closest(".card");
            const itemName = card.find(".card-title").text();
            const itemImg = card.find("img").attr("src");

            // Set modal content
            $("#modalMenuId").val(menuId);
            $("#modalItemName").text(itemName);
            $("#itemImg").attr("src", itemImg).attr("alt", itemName);

            // Fetch current quantity from backend and update modal
            $.ajax({
                url: `/order/get-item-quantity/${menuId}`,
                method: 'GET',
                success: function(response) {
                    const qty = response.quantity || 1; // default to 1 if 0
                    $("#orderAmt").val(qty > 0 ? qty : 1);
                },
                error: function() {
                    $("#orderAmt").val(1); // fallback quantity
                }
            });

            // Show modal
            const modal = new bootstrap.Modal(document.getElementById('addToCartModal'));
            modal.show();
        });


        // Quantity controls
        $("#addBtn").on("click", function () {
            let current = parseInt($("#orderAmt").val());
            if (current < 99) $("#orderAmt").val(current + 1);
        });

        $("#minusBtn").on("click", function () {
            let current = parseInt($("#orderAmt").val());
            if (current > 1) $("#orderAmt").val(current - 1);
        });

        // Handle AJAX form submission
        $("#addToCartForm").on("submit", function (e) {
            e.preventDefault();

            let form = $(this);
            let url = form.data("url");
            let menuId = $("#modalMenuId").val();
            let quantity = $("#orderAmt").val();

            // Set quantity in hidden input
            $("#modalQuantity").val(quantity);

            $.ajax({
                url: url,
                type: "POST",
                data: {
                    _token: form.find("input[name='_token']").val(),
                    menu_id: menuId,
                    quantity: quantity
                },
                success: function (response) {
                    // Close modal and show a success message (optional)
                    bootstrap.Modal.getInstance(document.getElementById('addToCartModal')).hide();
                    alert("Item added to order!");
                },
                error: function (xhr) {
                    alert("Error adding item to order. Please try again.");
                }
            });
        });
    </script>
</x-app-layout>


