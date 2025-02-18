<div class="wrapper space-y-10">
    <div class="text-center space-y-4">
        <h2 class="text-3xl font-bold text-gray-900">
            New Arrivals
        </h2>
        <p class="text-gray-600 max-w-2xl mx-auto">
            Discover our exciting new arrivals, featuring the latest trends and styles to refresh your wardrobe this season.
        </p>
    </div>

    <div class="flex justify-center gap-4">
        @foreach($categories as $category)
            <button
                wire:click="selectCategory('{{ $category->slug }}')"
                class="px-6 py-2 rounded-md text-sm font-medium transition-colors duration-200 {{ $selectedCategory->id === $category->id ? 'bg-red-500 text-white' : 'bg-white text-gray-700 hover:bg-gray-50' }}"
            >
                {{ $category->name }}
            </button>
        @endforeach
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        @foreach($selectedCategory->products->take(8) as $product)
            <div class="bg-white rounded-lg p-6">
                <div class="aspect-square bg-[#f5e6e0] rounded-lg overflow-hidden mb-4">
                    <img 
                        src="{{ asset($product->image) }}" 
                        alt="{{ $product->name }}"
                        class="w-full h-full object-cover"
                    >
                </div>
                <h3 class="text-lg font-medium text-gray-900">{{ $product->name }}</h3>
                <p class="text-sm text-gray-500">{{ $product->brand }}</p>
                <div class="flex items-center gap-2 my-3">
                    <span class="text-lg font-bold">${{ number_format($product->price, 2) }}</span>
                    @if($product->original_price)
                        <span class="text-gray-400 line-through">${{ number_format($product->original_price, 2) }}</span>
                    @endif
                </div>
                <div class="flex gap-2 mb-4">
                    @foreach($product->colors as $color)
                        <button 
                            class="w-6 h-6 rounded-full border-2 border-white shadow-[0_0_0_2px_#e5e7eb]"
                            style="background-color: {{ $color }};"
                        ></button>
                    @endforeach
                </div>
                <button class="w-full border-2 border-red-500 text-red-500 py-2 rounded-lg hover:bg-red-500 hover:text-white transition-colors duration-200 font-medium">
                    Comprar
                </button>
            </div>
        @endforeach
    </div>

    <div class="text-center mt-8">
        <button class="bg-red-500 text-white px-8 py-3 rounded-md hover:bg-red-600 transition-colors duration-200">
            View More
        </button>
    </div>
</div>