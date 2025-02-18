<div class="bg-white rounded-lg shadow-md overflow-hidden">
    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-48 object-cover">
    <div class="p-4">
        <h3 class="text-lg font-semibold mb-2">{{ $product->name }}</h3>
        <p class="text-gray-600 mb-2">{{ $product->formatted_price }}</p>
        <button wire:click="addToCart" class="w-full bg-primary text-white py-2 px-4 rounded-md hover:bg-primary-dark transition-colors duration-300">
            Add to Cart
        </button>
    </div>
</div>