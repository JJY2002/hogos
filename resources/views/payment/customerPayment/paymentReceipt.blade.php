<x-app-layout>

<style>
        p {
            margin-top: 0;      /* Remove or customize top margin */
            margin-bottom: 0; /* Customize bottom margin */
            padding: 0;         /* Remove padding */
        }
</style>

<body style="background-color: #F0F0F0;" class="pb-1">

<div class="bg-[#212328] w-full h-52 -mt-3 -mb-35 pl-20 pt-11">
    <p class="text-white text-2xl font-[Inter] font-bold">Receipt</p>
</div>

@php

    $order = \App\Models\Order::with(['items.menu'])->find(session('order_id'));

    // Time & Date Formatting
    $formattedTime = $order ? $order->updated_at->format('H:i') : '';
    $formattedDate = $order ? $order->updated_at->format('d M Y') : '';

    // Order Items Total
    $subtotal = 0;
    if ($order) {
        foreach ($order->items as $item) {
            $subtotal += $item->quantity * $item->menu->price;
        }
    }

    $serviceCharge = $subtotal * 0.10; // 10% service charge
    $total = $subtotal + $serviceCharge;
@endphp

    <!--Container for contents-->


            <div class="bg-white w-[450px] mx-auto p-[20px] flex-5 rounded-2xl flex flex-col mb-3 text-black border-2 border-gray-300">
                <!--BOX  Content-->
                <img src="/assets/images/greentick.png" alt="Done" class="w-full h-[30px] my-2 object-contain">
                <div class="flex justify-center">
                    <p class="text-2xl font-[inter]  font-bold">Payment Successful</p>

                </div>
                <div class="flex justify-center">
                    <p style="color: #838383;" class="text-base font-[Inter] font-semibold mb-3">Thank you for your order!</p>

                </div>

                <div class="bg-gray-300 h-[2px] -ml-5 my-3.5 w-[447px]"></div>


                <!--<div class="flex items-center justify-between">-->

                <div class="overflow-y-auto" style="max-height: 40vh;">
                    <table class="w-full table-auto font-[Inter] font-semibold text-left text-sm">
                        <tbody class="space-y-2">
                        <tr class="border-b">
                            <td class="py-2 px-2 text-gray-500">Order Number</td>
                            <td class="py-2 px-2 text-right">#{{ session('order_id') }}</td>
                        </tr>
                        <tr class="border-b">
                            <td class="py-2 px-2 text-gray-500">Time / Date</td>
                            <td class="py-2 px-2 text-right">{{ $formattedTime }} / {{ $formattedDate }}</td>
                        </tr>
                        <tr class="border-b">
                            <td class="py-2 px-2 text-gray-500">Payment Method</td>
                            <td class="py-2 px-2 text-right">{{ request()->get('payment_method') ?? 'N/A' }}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>

                <div class="bg-gray-300 h-[2px] -ml-5 my-3.5 w-[447px]"></div>

                <div class="overflow-y-auto" style="max-height: 40vh;">
                    <table class="w-full table-auto font-[Inter] font-semibold text-left text-sm">
                        <tbody class="space-y-2">
                        <tr class="border-b">
                            <td class="py-2 px-2 text-gray-500">Amount</td>
                            <td class="py-2 px-2 text-right">RM {{ number_format($subtotal, 2) }}</td>
                        </tr>
                        <tr class="border-b">
                            <td class="py-2 px-2 text-gray-500">Service Charge</td>
                            <td class="py-2 px-2 text-right">RM {{ number_format($serviceCharge, 2) }}</td>
                        </tr>
                        <tr class="border-b">
                            <td class="py-2 px-2 text-gray-500">Total</td>
                            <td class="py-2 px-2 text-right">RM {{ number_format($total, 2) }}</td>
                        </tr>
                        <tr class="border-b">
                            <td class="py-2 px-2 text-gray-500">Status</td>
                            <td class="py-2 px-2 text-right text-green-600">
                                {{ ucfirst($order->order_status ?? 'Unknown') }}
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>


            </div>

            <div class="bg-[#6078D4] w-[450px] mx-auto py-[13px] p-[10px] rounded-2xl justify-items-center  text-white" role="button"
            tabindex="0"
            onclick="handleClick()">
                <p class="text-base font-[inter] justify-center font-bold">Continue</p>
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
</x-app-layout>
