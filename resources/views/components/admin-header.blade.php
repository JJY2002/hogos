<nav class="w-full bg-black text-white z-50">
    <div class="max-w-screen-xl mx-auto px-4 py-2 flex items-center justify-between">
        <!-- Logo -->
        <a href="{{ route('order.manage') }}" class="flex-shrink-0">
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
            <a href="{{ route('order.index') }}" class="text-white hover:text-gray-300 font-medium text-decoration-none">Home</a>
            <a href="{{ route('order.manage') }}" class="text-white hover:text-gray-300 font-medium text-decoration-none">Order</a>
            <a href="{{ route('admin.menus.index') }}" class="text-white hover:text-gray-300 font-medium text-decoration-none">Menu</a>
            <a href="{{ route('adminPaymentListIndex') }}" class="text-white hover:text-gray-300 font-medium text-decoration-none">Payment</a>
            <a href="{{ route('reset') }}" class="text-white hover:text-gray-300 font-medium text-decoration-none bg-gray-600 hover:bg-gray-800 px-3 py-2 rounded-2xl">Logout</a>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="md:hidden hidden px-4 pb-4 space-y-2 bg-gray-900">
        <a href="{{ route('order.manage') }}" class="block text-white hover:text-gray-300 font-medium text-decoration-none">Home</a>
        <a href="{{ route('admin.menus.index') }}" class="block text-white hover:text-gray-300 font-medium text-decoration-none">Menu</a>
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
