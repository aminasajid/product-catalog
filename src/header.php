<header class="bg-white">
  <nav class="mx-auto flex max-w-7xl items-center justify-between p-6 lg:px-8" aria-label="Global">
    <div class="flex lg:flex-1">
      <a href="#" class="-m-1.5 p-1.5">
        <span class="logo logo-color text-3xl">Décor Haven</span>
      </a>
    </div>

    <!-- Mobile menu button -->
    <div class="flex lg:hidden">
      <button type="button" id="mobile-menu-button" class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700">
        <span class="sr-only">Open main menu</span>
        <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
          <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
        </svg>
      </button>
    </div>

    <!-- Desktop Menu -->
    <div class="hidden lg:flex lg:gap-x-12">
      <a href="index.php" class="text-sm font-semibold text-gray-900">Home</a>
      <a href="#newArrivals" class="text-sm font-semibold text-gray-900">New Arrivals</a>
      <a href="#contact" class="text-sm font-semibold text-gray-900">Contact Us</a>
      <a href="./viewProducts.php" class="text-sm font-semibold text-gray-900">Products</a>
    </div>


    <div class="hidden lg:flex lg:flex-1 lg:justify-end">
      <a href="#" class="text-sm font-semibold text-gray-900">Log in <span aria-hidden="true">&rarr;</span></a>
    </div>
  </nav>

  <!-- Mobile Menu (Hidden by default) -->
  <div id="mobile-menu" class="lg:hidden hidden fixed inset-0 z-10 bg-white px-6 py-6 sm:max-w-sm sm:ring-1 sm:ring-gray-900/10">
    <div class="flex items-center justify-between">
      <a href="#" class="-m-1.5 p-1.5">
        <span class="logo text-xl">Décor Haven</span>
      </a>
      <button type="button" id="close-menu-button" class="-m-2.5 rounded-md p-2.5 text-gray-700">
        <span class="sr-only">Close menu</span>
        <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
          <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
        </svg>
      </button>
    </div>

    <!-- Mobile Menu Links -->
    <div class="mt-6 flow-root">
      <div class="-my-6 divide-y divide-gray-500/10">
        <div class="space-y-2 py-6">
          <a href="index.php" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold text-gray-900 hover:bg-gray-50">Home</a>
          <a href="#newArrivals" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold text-gray-900 hover:bg-gray-50">New Arrivals</a>
          <a href="#contact" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold text-gray-900 hover:bg-gray-50">Contact Us</a>
          <a href="./viewProducts.php" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold text-gray-900 hover:bg-gray-50">Products</a>
        </div>

        <div class="py-6">
          <a href="#" class="-mx-3 block rounded-lg px-3 py-2.5 text-base font-semibold text-gray-900 hover:bg-gray-50">Log in</a>
        </div>
      </div>
    </div>
  </div>
</header>

<script>
  //  to handle opening and closing the mobile menu
  const mobileMenuButton = document.getElementById('mobile-menu-button');
  const closeMenuButton = document.getElementById('close-menu-button');
  const mobileMenu = document.getElementById('mobile-menu');


  mobileMenuButton.addEventListener('click', () => {
    mobileMenu.classList.remove('hidden');
  });


  closeMenuButton.addEventListener('click', () => {
    mobileMenu.classList.add('hidden');
  });
</script>
