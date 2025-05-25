<x-AppLayout>

<style>
        p {
            margin-top: 0;      /* Remove or customize top margin */
            margin-bottom: 0; /* Customize bottom margin */
            padding: 0;         /* Remove padding */
        }
</style>

<body style="background-color: #F0F0F0;" class="pb-1">

<div class="bg-[#212328] w-full h-52 -mb-35 pl-20 pt-11">
    <p class="text-white text-2xl font-[Inter] font-bold">Receipt</p>
</div>

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
                            <tr class="border-b ">
                                <td class="py-2 px-2 text-gray-500">Order Number</td>
                                <td class="py-2 px-2 text-right">#B0001</td>
                            </tr>
                            <tr class="border-b">
                                <td class="py-2 px-2 text-gray-500">Time / Date</td>
                                <td class="py-2 px-2 text-right">09:25 / 20 Apr 2025</td>
                            </tr>
                            <tr class="border-b">
                                <td class="py-2 px-2 text-gray-500">Payment Method</td>
                                <td class="py-2 px-2 text-right">{{ request()->get('payment_method') }}</td>
                            </tr>

                        </tbody>
                    </table>
                </div>

                <div class="bg-gray-300 h-[2px] -ml-5 my-3.5 w-[447px]"></div>

                <div class="overflow-y-auto" style="max-height: 40vh;">
                    <table class="w-full table-auto font-[Inter] font-semibold text-left text-sm">
                        <tbody class="space-y-2">
                            <tr class="border-b ">
                                <td class="py-2 px-2 text-gray-500">Amount</td>
                                <td class="py-2 px-2 text-right">RM 10.90</td>
                            </tr>
                            <tr class="border-b">
                                <td class="py-2 px-2 text-gray-500">Service Charge</td>
                                <td class="py-2 px-2 text-right">RM 20.90</td>
                            </tr>
                            <tr class="border-b">
                                <td class="py-2 px-2 text-gray-500">Total</td>
                                <td class="py-2 px-2 text-right">RM 20.90</td>
                            </tr>
                            <tr class="border-b">
                                <td class="py-2 px-2 text-gray-500">Status</td>
                                <td class="py-2 px-2 text-right text-green-600">Success</td>
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
</x-AppLayout>
