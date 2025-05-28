<nav class="w-full bg-black text-white z-50">
    <div class="max-w-screen-xl mx-auto px-4 py-2 flex items-center justify-between">
        <!-- Logo -->
        <a href="/" class="flex-shrink-0">
            <img src="{{ asset('assets/images/logo.png') }}" alt="Logo" class="h-20 w-auto">
        </a>

        <!-- Hamburger Menu (mobile) -->
        <button id="navbar-toggle" class="md:hidden text-white focus:outline-none">
            <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2"
                 viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                <path d="M4 6h16M4 12h16M4 18h16"/>
            </svg>
        </button>
        <!-- Navigation Links -->
        <div id="navbar-menu" class="hidden md:flex md:items-center md:space-x-6">
            <a href="#" class="text-white hover:text-gray-300 font-medium text-decoration-none bg-gray-600 px-3 py-2 rounded-2xl me-100">Table No: {{ session('table_no') }}</a>
            <a href="/" class="text-white hover:text-gray-300 font-medium text-decoration-none">Home</a>
            <a href="{{ route('menu.menu') }}" class="text-white hover:text-gray-300 font-medium text-decoration-none">Menu</a>
            <a href="{{ route('order.cart') }}" class="relative text-black hover:text-gray-300 font-medium text-decoration-none py-2 px-4 rounded-2xl bg-white">
                <i class="bi bi-basket2-fill text-xl"></i> Finish Order
                @if($cartQuantity > 0)
                    <span class="absolute -top-2 -left-2 bg-red-600 text-white text-xs font-bold rounded-full px-2 py-0.5">
                        {{ $cartQuantity }}
                    </span>
                @endif
            </a>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="md:hidden hidden px-4 pb-4 space-y-2 bg-gray-900">
        <a href="/" class="block text-white hover:text-gray-300 font-medium text-decoration-none">Home</a>
        <a href="{{ route('menu.menu') }}" class="block text-white hover:text-gray-300 font-medium text-decoration-none">Menu</a>
    </div>
</nav>

<script>
    const toggleBtn = document.getElementById('navbar-toggle');
    const menu = document.getElementById('navbar-menu');
    const mobileMenu = document.getElementById('mobile-menu');

    toggleBtn.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
    });
</script>
