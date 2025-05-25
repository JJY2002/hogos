<x-AppLayout>

<style>
        p {
            margin-top: 0;      /* Remove or customize top margin */
            margin-bottom: 0; /* Customize bottom margin */
            padding: 0;         /* Remove padding */
        }
</style>

<body style="background-color: #F0F0F0;">

<div class="bg-black w-full h-52 -mb-30 pl-20 pt-11">
    <p class="text-white text-2xl font-[Inter] font-bold">Your Orders</p>
</div>

    <div class="flex space-x-[25px]  px-12">


    <div class="flex-5 text-black">

        <div class="bg-white p-[20px] flex-5 rounded-2xl mb-3  text-black">
            
            <div class="flex items-center justify-between">
                <p class="text-2xl font-[Inter] font-semibold">Table No #</p>
                <p class="text-xl font-[Inter] font-semibold text-black">Dine In</p>
            </div>
            <p style="color: #838383;" class="text-sm font-[Inter] font-semibold mb-3">Order #B000</p>

            <table class="w-full table-auto font-[Inter] font-semibold text-left text-sm">
                <thead>
                    <tr class="text-gray-600">
                        <th class="pb-2">Image</th>
                        <th class="pb-2">Item</th>
                        <th class="pb-2 text-right">Price</th>
                    </tr>
                </thead>
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

                <div class="mt-4 font-semibold flex justify-between">
                    <span>Amount</span>
                    <span>RM 43.60</span>
                </div>
        </div>

        <div class="bg-white p-[20px] flex-5 rounded-2xl   text-black">
            Box 2
        </div>

        </div>




        <div class="bg-white p-[26px] flex-4 rounded-3xl  text-black">
            Box 3
        </div>

    </div>

</body>
</x-AppLayout>
