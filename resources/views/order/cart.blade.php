<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Simple Order Cart</title>
    <script>
        let items = [];

        function addItem() {
            const name = document.getElementById('menu_name').value;
            const quantity = parseInt(document.getElementById('quantity').value);
            const price = parseFloat(document.getElementById('price').value);

            if (name && quantity > 0 && price > 0) {
                items.push({ menu_name: name, quantity, price });

                renderCart();
                document.getElementById('menu_name').value = '';
                document.getElementById('quantity').value = '';
                document.getElementById('price').value = '';
            }
        }

        function renderCart() {
            const cartDiv = document.getElementById('cart');
            cartDiv.innerHTML = '';

            items.forEach((item, index) => {
                const itemDiv = document.createElement('div');
                itemDiv.innerText = `${item.menu_name} x${item.quantity} - RM ${item.price.toFixed(2)}`;
                cartDiv.appendChild(itemDiv);
            });

            document.getElementById('order_items').value = JSON.stringify(items);
        }
    </script>
</head>
<body>
    <h2>Simple Order Cart</h2>

    <form method="POST" action="{{ route('order.store') }}">
        @csrf

        <label>Name:</label><br>
        <input type="text" name="name" required><br><br>

        <label>Table:</label><br>
        <input type="text" name="table" required><br><br>

        <label>Order Type:</label><br>
        <select name="orderType" required>
            <option value="Dine-In">Dine-In</option>
            <option value="Takeaway">Takeaway</option>
        </select><br><br>

        <h3>Add Item</h3>
        <input type="text" id="menu_name" placeholder="Menu name">
        <input type="number" id="quantity" placeholder="Qty">
        <input type="number" step="0.01" id="price" placeholder="Price">
        <button type="button" onclick="addItem()">Add to Cart</button><br><br>

        <h4>Cart Items:</h4>
        <div id="cart"></div><br>

        <input type="hidden" name="items" id="order_items">

        <button type="submit">Place Order</button>
    </form>
</body>
</html>

