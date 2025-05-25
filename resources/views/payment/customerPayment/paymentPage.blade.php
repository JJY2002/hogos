<x-AppLayout>

<style>
        p {
            margin-top: 0;      /* Remove or customize top margin */
            margin-bottom: 0; /* Customize bottom margin */
            padding: 0;         /* Remove padding */
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
                    <p class="text-2xl font-[Inter] font-semibold">Table No #</p>
                    <p class="text-xl font-[Inter] font-semibold text-black">Dine In</p>
                </div>
                <p style="color: #838383;" class="text-sm font-[Inter] font-semibold mb-3">Order #B000</p>


                <div class="overflow-y-auto" style="max-height: 40vh;">
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
                            <tr class="border-b">
                                <td class="py-2">
                                    <img src="/images/pizza.jpg" class="w-12 h-12 rounded" alt="">
                                </td>
                                <td class="py-2">1x Pepperoni Pizza</td>
                                <td class="py-2 text-right">RM 20.90</td>
                            </tr>
                            <tr class="border-b">
                                <td class="py-2">
                                    <img src="/images/pizza.jpg" class="w-12 h-12 rounded" alt="">
                                </td>
                                <td class="py-2">1x Pepperoni Pizza</td>
                                <td class="py-2 text-right">RM 20.90</td>
                            </tr>
                            <tr class="border-b">
                                <td class="py-2">
                                    <img src="/images/pizza.jpg" class="w-12 h-12 rounded" alt="">
                                </td>
                                <td class="py-2">1x Pepperoni Pizza</td>
                                <td class="py-2 text-right">RM 20.90</td>
                            </tr>
                            <tr class="border-b">
                                <td class="py-2">
                                    <img src="/images/pizza.jpg" class="w-12 h-12 rounded" alt="">
                                </td>
                                <td class="py-2">1x Pepperoni Pizza</td>
                                <td class="py-2 text-right">RM 20.90</td>
                            </tr>
                            <tr class="border-b">
                                <td class="py-2">
                                    <img src="/images/chickenchop.jpg" class="w-12 h-12 rounded" alt="">
                                </td>
                                <td class="py-2">1x Chicken Chop</td>
                                <td class="py-2 text-right">RM 15.00</td>
                            </tr>
                            <tr class="border-b">
                                <td class="py-2">
                                    <img src="/images/steak.jpg" class="w-12 h-12 rounded" alt="">
                                </td>
                                <td class="py-2">3x Steak Ribeye</td>
                                <td class="py-2 text-right">RM 24.30</td>
                            </tr>
                            <tr>
                                <td class="py-2">
                                    <img src="/images/friedrice.jpg" class="w-12 h-12 rounded" alt="">
                                </td>
                                <td class="py-2">5x Fried Rice</td>
                                <td class="py-2 text-right">RM 10.00</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                    <div class="mt-4 font-semibold font-[Inter] flex justify-between pr-3.5">
                        <span>SubTotal</span>
                        <span>RM 43.60</span>
                    </div>
            </div>


            
            <div class="bg-white p-[20px] flex-4  rounded-xl">

                <div class="text-sm font-medium font-[Inter] text-gray-600 flex justify-between pr-3.5">
                    <p class="text-sm font-[Inter]  font-medium text-gray-600">Service Charge 6%</p>
                        <span>RM 43.60</span>
                </div>

                <div class=" text-sm font-medium font-[Inter] text-gray-600 flex justify-between pr-3.5">
                    <p class="text-sm font-[Inter]  font-medium text-gray-600">Service Charge 6%</p>
                    <span>RM 43.60</span>
                </div>

                <div class=" text-sm font-medium font-[Inter] text-gray-600 flex justify-between pr-3.5">
                    <p class="text-sm font-[Inter]  font-medium text-gray-600">Discount Voucher</p>
                    <span>-RM 43.60</span>
                </div>

                <div class="mt-2 text-xl font-semibold font-[Inter] flex justify-between pr-3.5">
                    <p class="text-xl font-[Inter]  font-semibold text-black">Total</p>
                    <span>-RM 43.60</span>
                </div>




            </div>
        </div>

        
            


        <div class="flex-5 text-black">
          
                <div class="bg-white p-[30px] font-[Inter] flex flex-col rounded-2xl text-black h-full">

                            <h2 class="text-lg font-semibold mb-4">Select Payment Method</h2>
                            <div class="grid grid-cols-3 gap-3 mb-4">
                                <img src="/assets/images/mastercardlogo.png" alt="Mastercard" class="w-full h-26 object-contain border p-2 rounded-xl">
                                <img src="/assets/images/tnglogo.png" alt="TouchNGo" class="w-full h-26 object-contain border-2 border p-2 rounded-xl">
                                <img src="/assets/images/rhblogo.png" alt="RHB" class="w-full h-26 object-contain border p-2 rounded-xl">

                                <img src="/assets/images/googlepaylogo.png" alt="GPay" class="w-full h-26 object-contain border p-2 rounded-xl">
                                <img src="/assets/images/maybanklogo.png" alt="Maybank" class="w-full h-26 object-contain border p-2 rounded-xl">
                                <img src="/assets/images/bankislamlogo.png" alt="Bank Islam" class="w-full h-26 object-contain border p-2 rounded-xl">

                                <img src="/assets/images/cimblogo.png" alt="CIMB" class="w-full h-26 object-contain border p-2 rounded-xl">
                                <img src="/assets/images/hsbclogo.png" alt="HSBC" class="w-full h-26 object-contain border p-2 rounded-xl">
                                <img src="/assets/images/paycounter.png" alt="Counter" class="w-full h-26 object-contain border p-2 rounded-xl">
                            </div>

                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700 mb-1">Voucher Code</label>
                                <input type="text" class="w-full border rounded-xl px-3 py-2" placeholder="Enter Voucher Code">
                            </div>

                            <button class="w-full bg-[#6078D4] hover:bg-[#5569B4] text-white font-bold py-3 rounded-lg">PAY NOW</button>
                        
                </div>
        
        </div>

        
        


    </div>

</body>
</x-AppLayout>
