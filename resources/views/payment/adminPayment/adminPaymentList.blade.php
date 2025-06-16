<x-app-layout>

<style>
        p {
            margin-top: 0;      /* Remove or customize top margin */
            margin-bottom: 0; /* Customize bottom margin */
            padding: 0;         /* Remove padding */
        }
</style>

@if (session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded mb-3">
        {{ session('success') }}
    </div>
@endif

<head>
  <!-- Tailwind CDN -->
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body style="background-color: #F0F0F0;" class="pb-1">

<div class="w-full  -mt-2  pl-30 pt-1 mb-2">
    <p class="text-black text-2xl font-[Inter] font-bold pt-3">Payments</p>
</div>

    <!--Container for contents-->


            <div class="bg-white w-auto min-w-[600px] mx-25 p-[20px] rounded-2xl mb-3 text-black border-2 border-gray-300">
            <div style="min-width: 400px;">

                <div class="flex items-center justify-between">
                        <p class="text-xl font-[Inter] font-semibold">Payment Order List</p>
                </div>

                    <table class="w-full table-auto font-[Inter] min-w-[500px] font-medium text-left text-sm mt-2">
                            <thead>
                                <tr>
                                    <th>Order Id</th>
                                    <th>Table No</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Order Type</th>
                                    <th>Payment</th>
                                    <th>Quantity</th>
                                    <th>Status</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            <thead>

                            <tbody>
                                @foreach ($payments as $payment)
                                    <tr class="border-t border-gray-300">
                                        <td class="py-2">#{{ $payment->id }}</td>
                                        <td class="py-2">{{ $payment->table_number ?? '-' }}</td>
                                        <td class="py-2">{{ \Carbon\Carbon::parse($payment->created_at)->format('Y-m-d') }}</td>
                                        <td class="py-2">{{ \Carbon\Carbon::parse($payment->created_at)->format('H:i') }}</td>
                                        <td class="py-2">{{ $payment->order_type ?? '-' }}</td>
                                        <td class="py-2">{{ $payment->payment_method }}</td>
                                        <td class="py-2">{{ $payment->total_quantity ?? '1' }} item{{ ($payment->total_quantity ?? 1) > 1 ? 's' : '' }}</td>
                                        <td class="py-2 text-green-600">{{ $payment->payment_status ?? 'Success' }}</td>
                                        <td class="py-2">RM{{ number_format($payment->total, 2) }}</td>
                                        <td>
                                            @if ($payment->payment_status !== 'Cancelled')
                                                <form action="{{ route('admin.payments.cancel', $payment->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to cancel this payment?');">
                                                    @csrf
                                                    <button type="submit" class="text-red-600 font-bold hover:underline">Cancel</button>
                                                </form>
                                            @else
                                                <span class="text-gray-400">Cancelled</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                    </table>

                </div>


            </div>



            <script>
                function handleClick() {
                    //const paymentMethod = "{{ request()->get('payment_method') }}";
                    //window.location.href = "/payment/customerPayment/orderStatus?payment_method=" + encodeURIComponent(paymentMethod);
                    alert("Continue button clicked!");
                    // Or navigate to another page:
                }
            </script>








            </div>





</body>
</x-app-layout>
