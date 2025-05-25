<x-AppLayout>

<style>
        p {
            margin-top: 0;      /* Remove or customize top margin */
            margin-bottom: 0; /* Customize bottom margin */
            padding: 0;         /* Remove padding */
        }
</style>
<head>
  <!-- Tailwind CDN -->
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body style="background-color: #F0F0F0;" class="pb-1">

<div class="w-full  -mt-2  pl-30 pt-1 mb-2">
    <p class="text-black text-2xl font-[Inter] font-bold">Orders</p>
</div>

    <!--Container for contents-->


            <div class="bg-white w-auto min-w-[600px] mx-25 p-[20px] rounded-2xl mb-3 text-black border-2 border-gray-300">
            <div style="min-width: 400px;">

                <div class="flex items-center justify-between">
                        <p class="text-xl font-[Inter] font-semibold">Order List</p>
                </div>

                    <table class="w-full table-auto font-[Inter] min-w-[500px] font-medium text-left text-sm mt-2">
                            <thead>
                                <tr>
                                    <th>Order Id</th>
                                    <th>Table No</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Customer</th>
                                    <th>Order Type</th>
                                    <th>Payment</th>
                                    <th>Quantity</th>
                                    <th>Status</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            <thead>
                   
                            <tbody>
                            

                            <tr class="border-t border-gray-300">
                                <td class="py-2">#B0002</td>
                                <td class="py-2">20</td>
                                <td class="py-2 ">2025-05-20</td>
                                <td class="py-2 ">12:30</td>
                                <td class="py-2 ">Adli Adli Ikmal</td>
                                <td class="py-2 ">Dine In</td>
                                <td class="py-2 ">Pending</td>
                                <td class="py-2 ">5 item</td>
                                <td class="py-2 ">Unfulfilled</td>
                                <td class="py-2 ">RM12.30</td>
                            </tr>
                            <tr class="border-t border-gray-300">
                                <td class="py-2">#B0002</td>
                                <td class="py-2">20</td>
                                <td class="py-2 ">2025-05-20</td>
                                <td class="py-2 ">12:30</td>
                                <td class="py-2 ">Adli</td>
                                <td class="py-2 ">Dine In</td>
                                <td class="py-2 ">Pending</td>
                                <td class="py-2 ">5 item</td>
                                <td class="py-2 ">Unfulfilled</td>
                                <td class="py-2 ">RM12.30</td>
                            </tr>
                            <tr class="border-t border-gray-300">
                                <td class="py-2">#B0002</td>
                                <td class="py-2">20</td>
                                <td class="py-2 ">2025-05-20</td>
                                <td class="py-2 ">12:30</td>
                                <td class="py-2 ">Adli</td>
                                <td class="py-2 ">Dine In</td>
                                <td class="py-2 ">Pending</td>
                                <td class="py-2 ">5 item</td>
                                <td class="py-2 ">Unfulfilled</td>
                                <td class="py-2 ">RM12.30</td>
                            </tr>

                            @foreach ($orders as $order)
                            <tr class="border-t border-gray-300">
                                <td class="py-2">#{{ $order->id }}</td>
                                <td class="py-2">{{ $order->table }}</td>
                                <td class="py-2">{{ \Carbon\Carbon::parse($order->date)->format('Y-m-d') }}</td>
                                <td class="py-2">{{ \Carbon\Carbon::parse($order->time)->format('H:i') }}</td>
                                <td class="py-2">{{ $order->name }}</td>
                                <td class="py-2">{{ $order->orderType }}</td>
                                <td class="py-2">{{ $order->paymentStatus }}</td>
                                <td class="py-2">{{ $order->itemQuantity }} item{{ $order->quantity > 1 ? 's' : '' }}</td>
                                <td class="py-2">{{ $order->orderStatus }}</td>
                                <td class="py-2">RM{{ number_format($order->totalPrice, 2) }}</td>
                                <td></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="justify-end">
                        <div class="bg-[#6078D4] w-[450px] mx-auto py-[13px] p-[10px] rounded-2xl justify-items-center  text-white" role="button"
                        tabindex="0"
                        onclick="handleClick()">
                            <p class="text-base font-[inter] justify-center font-bold">Continue</p>
                        </div>
                    </div>
                </div>


            </div>



            <script>
                function handleClick() {
                    const paymentMethod = "{{ request()->get('payment_method') }}";
                    window.location.href = "/payment/customerPayment/orderStatus?payment_method=" + encodeURIComponent(paymentMethod);
                    alert("Continue button clicked!");
                    // Or navigate to another page:
                }
            </script>


            





            </div>





</body>
</x-AppLayout>
