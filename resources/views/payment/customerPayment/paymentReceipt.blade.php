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
    <p class="text-white text-2xl font-[Inter] font-bold">Receipt</p>
</div>

    <!--Container for contents-->


            <div class="bg-white w-[450px] mx-auto p-[20px] flex-5 rounded-2xl flex flex-col mb-3 text-black border-2 border-gray-400">
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

                        </tbody>
                    </table>
                </div>


            </div>


            





            </div>


        
            




        
        




</body>
</x-AppLayout>
