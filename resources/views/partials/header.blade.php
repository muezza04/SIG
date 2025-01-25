<header class="bg-blue-500 text-white shadow">
    <div class="container mx-auto px-4 py-3 flex justify-between items-center">
        <!-- Logo -->
        <a href="/" class="text-2xl font-bold">
            Bogor Kota
        </a>

        <!-- Navigation for Desktop -->
        <nav class="hidden md:flex space-x-6">
            <a href="/" class="hover:text-gray-300">Home</a>
            <a href="/alltematik" class="hover:text-gray-300">Tematik</a>
            <a href="/about" class="hover:text-gray-300">About</a>
            
        </nav>

        <!-- Hamburger Menu for Mobile -->
        <button id="menu-toggle" class="block md:hidden">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16m-7 6h7" />
            </svg>
        </button>
    </div>

    <!-- Mobile Navigation -->
    <nav id="mobile-menu" class="hidden md:hidden bg-blue-600">
        <ul class="space-y-4 p-4">
            <li><a href="/" class="block hover:text-gray-300">Home</a></li>
            <li><a href="/alltematik" class="block hover:text-gray-300">Tematik</a></li>
            <li><a href="/about" class="block hover:text-gray-300">About</a></li>
        </ul>
    </nav>
</header>

<script>
    // Script to toggle mobile menu
    const menuToggle = document.getElementById('menu-toggle');
    const mobileMenu = document.getElementById('mobile-menu');

    menuToggle.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
    });
</script>
