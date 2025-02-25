<x-guest-layout>
    <div class="min-h-screen bg-white">
        <!-- Main Content -->
        <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <div class="flex flex-col md:flex-row gap-8">
                <!-- Filters Sidebar -->
                <div class="w-full md:w-64 flex-shrink-0">
                    <div class="space-y-6">
                        <div>
                            <h3 class="text-lg font-medium text-gray-900">Filters</h3>
                            <div class="mt-4 space-y-4">
                                <div>
                                    <label class="text-sm font-medium text-gray-900">Category</label>
                                    <select class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-gray-500 focus:ring-gray-500">
                                        <option>Men's Fashion</option>
                                        <option>Women's Fashion</option>
                                        <option>Accessories</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="text-sm font-medium text-gray-900">Min Price</label>
                                    <input type="number" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-gray-500 focus:ring-gray-500" placeholder="0">
                                </div>
                                <div>
                                    <label class="text-sm font-medium text-gray-900">Max Price</label>
                                    <input type="number" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-gray-500 focus:ring-gray-500" placeholder="1000">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Products Grid -->
                <div class="flex-1">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-2xl font-bold text-gray-900">Products</h2>
                        <div class="flex items-center space-x-4">
                            <span class="text-sm text-gray-700">Sort by:</span>
                            <select class="rounded-md border-gray-300 shadow-sm focus:border-gray-500 focus:ring-gray-500">
                                <option>Price: Low to High</option>
                                <option>Price: High to Low</option>
                                <option>Newest</option>
                            </select>
                        </div>
                    </div>

                    <!-- Product Grid will go here -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        <!-- Product cards will be rendered here -->
                    </div>
                </div>
            </div>
        </main>
    </div>
</x-guest-layout>