<x-app-layout>
    <style>
        p {
            margin-top: 0;
            margin-bottom: 0;
            padding: 0;
        }
    </style>

    <body style="background-color: #F0F0F0;" class="pb-1">
        <div class="bg-[#212328] w-full h-52 -mt-3 -mb-45 pl-20 pt-11">
            <p class="text-white text-2xl font-[Inter] font-bold">Order Status</p>
        </div>

        <!-- Order Status Card -->
        <div class="bg-white w-[450px] mx-auto p-[20px] rounded-2xl flex flex-col mb-3 text-black border-2 border-gray-300 mt-10">

            <!-- Image -->
            <div class="flex justify-center">
                <img src="/assets/images/foodprepare.png" alt="Preparing" class="w-[100px] h-[100px] rounded-full my-3">
            </div>

            <!-- Title -->
            <div class="flex justify-center">
                <p class="text-2xl font-[Inter] mb-3 font-bold">Your Order is Being Prepared</p>
            </div>

            <!-- Message -->
            <div class="text-center">
                <p class="text-base font-[Inter] font-semibold text-[#838383]">
                    Please wait while we prepare your food.
                </p>
                <p class="text-base font-[Inter] font-semibold text-[#838383] mb-3">
                    We'll notify you once it's ready for pickup!
                </p>
            </div>

            <div class="bg-gray-300 h-[2px] -ml-5 my-3.5 w-[447px]"></div>

            <!-- Table Info -->
            <table class="w-full table-auto font-[Inter] font-semibold text-left text-sm">
                <tbody>
                    <tr class="border-b">
                        <td class="py-2 px-2 text-gray-500">Order Number</td>
                        <td class="py-2 px-2 text-right">#{{ session('order_id') ?? 'N/A' }}</td>
                    </tr>
                    <tr class="border-b">
                        <td class="py-2 px-2 text-gray-500">Estimated Time</td>
                        <td class="py-2 px-2 text-right">10 - 15 mins</td>
                    </tr>
                    <tr class="border-b">
                        <td class="py-2 px-2 text-gray-500">Payment Method</td>
                        <td class="py-2 px-2 text-right">{{ request()->get('payment_method') ?? 'N/A' }}</td>
                    </tr>
                    <tr class="border-b">
                        <td class="py-2 px-2 text-gray-500">Status</td>
                        <td class="py-2 px-2 text-right text-yellow-500">In Preparation</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Back Button -->
        <div class="bg-[#6078D4] w-[450px] mx-auto py-[13px] px-[10px] rounded-2xl text-center text-white cursor-pointer mt-3"
            role="button" tabindex="0" onclick="handleClick()">
            <p class="text-base font-[Inter] font-bold">Back to Home</p>
        </div>

        <script>
            function handleClick() {
                window.location.href = "{{ route('reset') }}";
            }
        </script>
    </body>
</x-app-layout>
