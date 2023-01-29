<style>
    .text-lg {
        font-size: 1.2rem;
        color: #1a202c;
        font-weight: bold;
    }

    h2 {
        font-size: 2rem;
    }
</style>

<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">

            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="/clients">
                        <h2>INTERGAZ</h2>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('clients')" :active="request()->routeIs('clients')">
                        <div class="text-lg"> Client List</div>
                    </x-nav-link>
                </div>

                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('delivery-types')" :active="request()->routeIs('delivery-types')">
                        <div class="text-lg"> Product Delivery Types</div>
                    </x-nav-link>
                </div>

                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('last-deliveries')" :active="request()->routeIs('last-deliveries')">
                        <div class="text-lg"> Last Deliveries</div>
                    </x-nav-link>
                </div>

                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('inactive-clients')" :active="request()->routeIs('inactive-clients')">
                        <div class="text-lg"> Inactive Client List</div>
                    </x-nav-link>
                </div>
            </div>

        </div>
    </div>
</nav>
