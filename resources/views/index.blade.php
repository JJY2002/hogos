<x-index-layout>
    <div class="flex items-center justify-center h-screen w-full bg-gray-50">
        <div class="text-center">
            <a href="#"><img src="{{ asset('assets/images/logo.png') }}" alt="logo" width="200px" class="mx-auto block"></a>

            <h1 class="text-4xl font-bold">Welcome to House of Grill</h1>
            <p class="text-lg mt-3">Delicious food served fresh every day.</p>
            <br>
            <h3 class="text-2xl font-semibold">
                Enter your table number to continue
            </h3>
            <form method="POST" action="{{ route('table.set') }}">
                @csrf
                <input class="border-2 rounded-2xl text-center w-[100px] h-[180px] mt-4"
                       style="font-size: 4em;"
                       type="number" name="table_no" id="table_no" maxlength="2" min="1" max="99" value="1">

                <div class="mt-5">
                    <button type="submit" class="bg-blue-600 text-white px-6 py-3 text-lg rounded-2 hover:bg-blue-700 transition">
                        Confirm
                    </button>
                    <a href="#" class="bg-blue-600 text-white px-6 py-3 text-lg rounded-2 hover:bg-blue-700 transition text-decoration-none"
                    id="adminBtn">
                        Continue as Admin
                    </a>
                </div>
            </form>

        </div>
    </div>

    <script type="module">
        $(document).ready(function () {
            var table = '{{ session('table_no') }}';
            if (table !== '') {
                var isContinue = confirm('Continue for table no ' + table + '?');
                if (isContinue) {
                    location.href = '{{ route('menu.menu') }}';
                }
                else {
                    location.href = '{{ route('reset') }}';
                }
            }

            $("#table_no").on("input", function () {
                var val =  $(this).val();
                if (val > 99) {
                    $(this).val(99);
                } else if (val < 1) {
                    $(this).val(1);
                }
            });

            $("#adminBtn").on("click", function () {
                var password = prompt("Enter admin password here:");
                if (password) {
                    window.location.href = "/admin-login?password=" + encodeURIComponent(password);
                }
            });
        });
    </script>
</x-index-layout>
