<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <h2 class="text-2xl font-semibold mb-6">Your Cart</h2>

    @if(count($cartItems) > 0)
        <div class="bg-white rounded-lg shadow-md p-6">
            @foreach($cartItems as $productId => $item)
                <div class="flex items-center justify-between border-b py-4">
                    <div class="flex items-center">
                        <img src="{{ asset('storage/' . $item['image']) }}" alt="{{ $item['name'] }}" class="w-16 h-16 object-cover rounded">
                        <div class="ml-4">
                            <h3 class="text-lg font-semibold">{{ $item['name'] }}</h3>
                            <p class="text-gray-600">{{ $item['price'] }}</p>
                        </div>
                    </div>
                    <div class="flex items-center">
                        <button wire:click="updateQuantity({{ $productId }}, {{ $item['quantity'] - 1 }})" class="text-gray-500 focus:outline-none focus:text-gray-600">
                            <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </button>
                        <span class="text-gray-700 mx-2">{{ $item['quantity'] }}</span>
                        <button wire:click="updateQuantity({{ $productId }}, {{ $item['quantity'] + 1 }})" class="text-gray-500 focus:outline-none focus:text-gray-600">
                            <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </button>
                    </div>
                    <button wire:click="removeFromCart({{ $productId }})" class="text-red-500 hover:text-red-600">
                        <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                    </button>
                </div>
            @endforeach

            <div class="mt-8">
                <div class="flex justify-between">
                    <span class="font-semibold">Total:</span>
                    <span class="font-semibold">{{ $this->getTotal() }}</span>
                </div>
                <a href="{{ route('checkout') }}" class="mt-4 w-full bg-primary text-white py-2 px-4 rounded-md hover:bg-primary-dark transition-colors duration-300 text-center">
                    Proceed to Checkout
                </a>
            </div>
        </div>
    @else
        <p class="text-gray-500">Your cart is empty.</p>
    @endif
</div>