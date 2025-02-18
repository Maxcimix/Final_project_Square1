<div x-data="{ open: false }" @click.away="open = false" class="relative">
    <button @click="open = !open" class="flex items-center space-x-1 text-gray-700 hover:text-gray-900">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
        </svg>
        <span>{{ count($cartItems) }}</span>
    </button>

    <div x-show="open" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95" class="absolute right-0 w-80 mt-2 bg-white rounded-md shadow-lg z-50">
        <div class="p-4">
            <h3 class="text-lg font-semibold mb-2">Cart</h3>
            @if(count($cartItems) > 0)
                @foreach($cartItems as $productId => $item)
                    <div class="flex items-center justify-between py-2 border-b">
                        <div>
                            <h4 class="text-sm font-medium">{{ $item['name'] }}</h4>
                            <p class="text-xs text-gray-500">{{ $item['quantity'] }} x ${{ number_format($item['price'], 2) }}</p>
                        </div>
                        <button wire:click="$emit('removeFromCart', {{ $productId }})" class="text-red-500 hover:text-red-600">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                @endforeach
                <div class="mt-4">
                    <div class="flex justify-between mb-2">
                        <span class="font-semibold">Total:</span>
                        <span>${{ number_format($cartTotal, 2) }}</span>
                    </div>
                    <a href="{{ route('cart') }}" class="block w-full bg-primary text-white text-center py-2 px-4 rounded-md hover:bg-primary-dark transition-colors duration-300">
                        View Cart
                    </a>
                </div>
            @else
                <p class="text-gray-500">Your cart is empty.</p>
            @endif
        </div>
    </div>
</div>