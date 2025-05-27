<x-app-layout>

<style>
        p {
            margin-top: 0;
            margin-bottom: 0;
            padding: 0;
        }
</style>

<body style="background-color: #F0F0F0;" class="pb-10">

<div class="bg-black w-full h-52 -mb-30 pl-20 pt-11 ">
    <p class="text-white text-2xl font-[Inter] font-bold">Your Orders</p>
</div>

    <!--Container for contents-->
    <div class="flex space-x-[25px]   px-12 h-full">


        <div class="flex-5 text-black  flex flex-col overflow-hidden  ">

            <div class="bg-white p-[20px] flex-5 rounded-2xl flex flex-col mb-3 text-black">
                <!--BOX 1 Content-->
                <div class="flex items-center justify-between">
                    <p class="text-2xl font-[Inter] font-semibold">Table No #{{ $tableNum }}</p>
                    <p class="text-xl font-[Inter] font-semibold text-black">Dine In</p>
                </div>
                <p style="color: #838383;" class="text-sm font-[Inter] font-semibold mb-3">Order #B000</p>


                <!--<div class="overflow-y-auto" style="max-height: 40vh;">
                    <table class="w-full table-auto font-[Inter] font-semibold text-left text-sm">
                        <tbody class="space-y-2">
                            <tr class="border-b">
                                <td class="py-2">
                                    <img src="/images/spaghetti.jpg" class="w-12 h-12 rounded" alt="">
                                </td>
                                <td class="py-2">2x Spaghetti Carbonara</td>
                                <td class="py-2 text-right">RM 10.90</td>
                            </tr>
                            <tr class="border-b">
                                <td class="py-2">
                                    <img src="/images/pizza.jpg" class="w-12 h-12 rounded" alt="">
                                </td>
                                <td class="py-2">1x Pepperoni Pizza</td>
                                <td class="py-2 text-right">RM 20.90</td>
                            </tr>
                        </tbody>
                    </table>
                </div>-->
                <div class="overflow-y-auto" style="max-height: 40vh;">
                <table class="w-full table-auto font-[Inter] font-semibold text-left text-sm">
                    <tbody class="space-y-2">
                        @foreach($orderedItems as $item)
                        <tr class="border-b">
                            <td class="py-2">
                                <img src="{{ asset($item->image) }}" class="w-12 h-12 rounded" alt="product image">
                            </td>
                            <td class="py-2">{{ $item->quantity }}x {{ $item->menu_name }}</td>
                            <td class="py-2 text-right">RM {{ number_format($item->quantity * $item->item_price, 2) }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>

                    <div class="mt-4 font-semibold font-[Inter] flex justify-between pr-3.5">
                        <span>SubTotal</span>
                        <span>RM {{ number_format($subtotal, 2) }}</span>
                    </div>
            </div>



            <div class="bg-white p-[20px] flex-4  rounded-xl">

                <div class="text-sm font-medium font-[Inter] text-gray-600 flex justify-between pr-3.5">
                    <p class="text-sm font-[Inter]  font-medium text-gray-600">Service Charge 6%</p>
                        <span>{{ number_format($serviceCharge, 2) }}</span>
                </div>

                <div class=" text-sm font-medium font-[Inter] text-gray-600 flex justify-between pr-3.5">
                    <p class="text-sm font-[Inter]  font-medium text-gray-600">Discount Voucher</p>
                    <span>-RM {{ number_format($discount, 2) }}</span>
                </div>

                <div class="mt-2 text-xl font-semibold font-[Inter] flex justify-between pr-3.5">
                    <p class="text-xl font-[Inter]  font-semibold text-black">Total</p>
                    <span>RM {{ number_format($total, 2) }}</span>
                </div>




            </div>
        </div>





        <div class="flex-5 text-black">

            <form action="/payment/customerPayment/paymentReceipt" method="GET" id="paymentForm">

                <div class="bg-white p-[30px] font-[Inter] flex flex-col rounded-2xl text-black h-full">

                            <p class="text-2xl font-semibold mb-3">Select Payment Method</p>
                            <div class="grid grid-cols-3 gap-3 mb-4" id="paymentOptions">

                                <!--<div class="payment-option border p-2 rounded-xl cursor-pointer" data-method="mastercard">
                                    <img src="/assets/images/mastercardlogo.png" alt="Mastercard" class="w-full h-26 object-contain border p-2 rounded-xl">
                                </div>-->

                                <div class="payment-option border p-2 rounded-xl cursor-pointer" data-method="Master Card">
                                    <img src="/assets/images/mastercardlogo.png" alt="Mastercard" class="w-full h-[80px] object-contain">
                                </div>
                                <div class="payment-option border p-2 rounded-xl cursor-pointer" data-method="TouchNGo eWallet">
                                    <img src="/assets/images/tnglogo.png" alt="TouchNGo" class="w-full h-[80px] object-contain">
                                </div>
                                <div class="payment-option border p-2 rounded-xl cursor-pointer" data-method="RHB Bank">
                                    <img src="/assets/images/rhblogo.png" alt="RHB" class="w-full h-[80px] object-contain">
                                </div>

                                <div class="payment-option border p-2 rounded-xl cursor-pointer" data-method="Google Pay">
                                    <img src="/assets/images/googlepaylogo.png" alt="GPay" class="w-full h-[80px] object-contain">
                                </div>
                                <div class="payment-option border p-2 rounded-xl cursor-pointer" data-method="Maybank Bank">
                                    <img src="/assets/images/maybanklogo.png" alt="Maybank" class="w-full h-[80px] object-contain">
                                </div>
                                <div class="payment-option border p-2 rounded-xl cursor-pointer" data-method="Bank Islam">
                                    <img src="/assets/images/bankislamlogo.png" alt="Bank Islam" class="w-full h-[80px] object-contain">
                                </div>

                                <div class="payment-option border p-2 rounded-xl cursor-pointer" data-method="CIMB Bank">
                                    <img src="/assets/images/cimblogo.png" alt="CIMB" class="w-full h-[80px] object-contain">
                                </div>
                                <div class="payment-option border p-2 rounded-xl cursor-pointer" data-method="HSBC Bank">
                                    <img src="/assets/images/hsbclogo.png" alt="HSBC" class="w-full h-[80px] object-contain">
                                </div>
                                <div class="payment-option border p-2 rounded-xl cursor-pointer" data-method="Counter Payment">
                                    <img src="/assets/images/paycounter.png" alt="Counter" class="w-full h-[80px] object-contain">
                                </div>
                            </div>

                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700 mb-1">Voucher Code</label>
                                <input type="text" class="w-full border rounded-xl px-3 py-2" placeholder="Enter Voucher Code">
                            </div>

                            <input type="hidden" name="payment_method" id="selectedPaymentMethod">

                            <button type="submit"
                                class="w-full bg-[#6078D4] hover:bg-[#5569B4] text-white font-bold py-3 rounded-lg">
                                PAY NOW
                            </button>

                </div>
            </form>
            <script>
                const options = document.querySelectorAll('.payment-option');
                const input = document.getElementById('selectedPaymentMethod');

                options.forEach(option => {
                    option.addEventListener('click', () => {
                    // Remove selection from all
                    options.forEach(opt => opt.classList.remove('border-blue-500', 'border-4'));

                    // Add selection to clicked one
                    option.classList.add('border-blue-500', 'border-4');

                    // Store selected method
                    input.value = option.dataset.method;
                    });
                });
            </script>
        </div>





    </div>

</body>
</x-app-layout>
