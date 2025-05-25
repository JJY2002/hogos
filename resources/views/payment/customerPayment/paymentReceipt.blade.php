<x-AppLayout>

<div>
    <div class="flex flex-col md:flex-row p-6 bg-gray-100 min-h-screen">

        Orders Section 
        <div class="md:w-1/2 p-4">
            <div class="bg-white rounded-2xl shadow p-6">
                <div class="flex justify-between items-center mb-4">
                    <div>
                        <h2 class="text-xl font-bold">Table No #12</h2>
                        <p class="text-sm text-gray-500">Order #B0142</p>
                    </div>
                    <span class="bg-purple-100 text-purple-800 text-xs px-3 py-1 rounded-full">Dine In</span>
                </div>


                <ul class="space-y-3">
                    <li class="flex justify-between items-center">
                        <div class="flex items-center gap-2">
                            <img src="/images/spaghetti.jpg" class="w-10 h-10 rounded" alt="">
                            <span>2x Spaghetti Cabonara</span>
                        </div>
                        <span>RM 10.90</span>
                    </li>
                    <li class="flex justify-between items-center">
                        <div class="flex items-center gap-2">
                            <img src="/images/pizza.jpg" class="w-10 h-10 rounded" alt="">
                            <span>1x Papperoni Pizza</span>
                        </div>
                        <span>RM 20.90</span>
                    </li>
                    <li class="flex justify-between items-center">
                        <div class="flex items-center gap-2">
                            <img src="/images/chickenchop.jpg" class="w-10 h-10 rounded" alt="">
                            <span>1x Chicken Chop</span>
                        </div>
                        <span>RM 15.00</span>
                    </li>
                    <li class="flex justify-between items-center">
                        <div class="flex items-center gap-2">
                            <img src="/images/steak.jpg" class="w-10 h-10 rounded" alt="">
                            <span>3x Steak Ribeye</span>
                        </div>
                        <span>RM 24.30</span>
                    </li>
                    <li class="flex justify-between items-center">
                        <div class="flex items-center gap-2">
                            <img src="/images/friedrice.jpg" class="w-10 h-10 rounded" alt="">
                            <span>5x Fried Rice</span>
                        </div>
                        <span>RM 10.00</span>
                    </li>
                </ul>

                <div class="mt-4 font-semibold flex justify-between">
                    <span>Amount</span>
                    <span>RM 43.60</span>
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow p-6 mt-4 text-sm">
                <div class="flex justify-between mb-1">
                    <span>Service Charge</span>
                    <span>RM 5.00</span>
                </div>
                <div class="flex justify-between mb-1">
                    <span>5% Tax</span>
                    <span>RM 2.60</span>
                </div>
                <div class="flex justify-between mb-1 text-green-600">
                    <span>Discount Voucher</span>
                    <span>-RM 4.60</span>
                </div>
                <div class="flex justify-between font-bold mt-2">
                    <span>Total</span>
                    <span>RM 50.90</span>
                </div>
            </div>
        </div>


        <div class="md:w-1/2 p-4">
            <div class="bg-white rounded-2xl shadow p-6">
                <h2 class="text-lg font-semibold mb-4">Select Payment Method</h2>
                <div class="grid grid-cols-3 gap-4 mb-4">
                    <img src="/images/mc.png" alt="Mastercard" class="w-20 h-12 object-contain border p-2 rounded">
                    <img src="/images/tng.png" alt="TouchNGo" class="w-20 h-12 object-contain border-2 border-green-500 p-2 rounded">
                    <img src="/images/rhb.png" alt="RHB" class="w-20 h-12 object-contain border p-2 rounded">

                    <img src="/images/gpay.png" alt="GPay" class="w-20 h-12 object-contain border p-2 rounded">
                    <img src="/images/maybank.png" alt="Maybank" class="w-20 h-12 object-contain border p-2 rounded">
                    <img src="/images/bankislam.png" alt="Bank Islam" class="w-20 h-12 object-contain border p-2 rounded">

                    <img src="/images/cimb.png" alt="CIMB" class="w-20 h-12 object-contain border p-2 rounded">
                    <img src="/images/hsbc.png" alt="HSBC" class="w-20 h-12 object-contain border p-2 rounded">
                    <img src="/images/counter.png" alt="Counter" class="w-20 h-12 object-contain border p-2 rounded">
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Voucher Code</label>
                    <input type="text" class="w-full border rounded-lg px-3 py-2" placeholder="Enter Voucher Code">
                </div>

                <button class="w-full bg-blue-500 hover:bg-blue-600 text-white font-bold py-3 rounded-lg">PAY NOW</button>
            </div>
        </div>

    </div>
</div>
</x-AppLayout>