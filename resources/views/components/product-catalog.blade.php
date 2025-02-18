<section class="bg-[#f7f2ed] py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-gray-900 mb-2">New arrivals</h1>
            <p class="text-gray-600">Discover our exciting new arrivals, featuring the latest trends and styles to refresh your wardrobe this season.</p>
        </div>

        <x-product-categories />

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($products as $product)
                <x-product-card :product="$product" />
            @endforeach
        </div>

        <div class="text-center mt-10">
            <button class="bg-primary text-white px-8 py-3 rounded hover:bg-primary-dark transition duration-300">
                View More
            </button>
        </div>
    </div>
</section>