<x-guest-layout>
    <div class="bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="flex flex-col md:flex-row gap-8">
                <!-- Filtros -->
                <div class="w-full md:w-64 flex-shrink-0">
                    <livewire:shop.product-filters />
                </div>

                <!-- Lista de productos -->
                <div class="flex-1">
                    <div class="flex justify-between items-center mb-6">
                        <h1 class="text-2xl font-bold">Products</h1>
                        <div class="flex items-center gap-4">
                            <label class="text-sm text-gray-600">Sort by:</label>
                            <select class="border-gray-300 rounded-md text-sm focus:ring-red-500 focus:border-red-500">
                                <option>Latest</option>
                                <option>Price: Low to High</option>
                                <option>Price: High to Low</option>
                                <option>Most Popular</option>
                            </select>
                        </div>
                    </div>

                    <livewire:shop.product-list />
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>