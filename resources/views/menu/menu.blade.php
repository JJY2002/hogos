<x-app-layout>
    <div style="background-color: #f4f4f4; min-height: 100vh;">
        <!-- Header -->
        <div class="bg-dark text-white text-center py-4">
            <h2 class="fw-bold mb-0">MENU</h2>
        </div>

        <!-- Menu Content -->
        <div class="container mt-2">
            <h1 class="text-center mb-4">Our Signatures</h1>

            <!-- Category Buttons -->
            <div class="d-flex flex-wrap justify-content-center gap-2 mb-4">
                @foreach (['Pasta', 'Seafood', 'Lamb', 'Burgers', 'Fresh Juice', 'Coffee', 'Milk Shake'] as $category)
                    <button class="btn btn-outline-dark rounded-pill px-4 py-2 fw-semibold">{{ $category }}</button>
                @endforeach
            </div>

            <!-- Menu Items -->
            <div class="row">
                @forelse ($menus as $menu)
                    <div class="col-md-4 mb-4">
                        <div class="card shadow-sm rounded-4 h-100">
                            <img src="{{ asset($menu->image) }}" class="card-img-top" alt="{{ $menu->name }}" style="height: 250px; object-fit: cover;">
                            <div class="card-body">
                                <h5 class="card-title fw-bold text-uppercase">{{ $menu->name }}</h5>
                                <p class="card-text text-muted small">{{ $menu->description }}</p>
                                <p class="fw-semibold">RM {{ number_format($menu->price, 2) }}</p>
                                <button id="{{ $menu->id }}" class="btn btn-primary float-end add-item">Add to Order</button>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-center text-muted">No menu items found.</p>
                @endforelse
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




