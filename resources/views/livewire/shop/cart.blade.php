<div class="container mx-auto px-4 py-8">
    <h1 class="text-4xl font-serif text-center mb-4">Shopping Cart</h1>
    <div class="text-center text-gray-600 mb-8">
        Home > Your Shopping Cart
    </div>

    @if(empty($cartItems))
        <div class="text-center py-12">
            <p class="text-gray-500 text-lg mb-4">Your cart is empty</p>
            <a href="{{ route('home') }}" class="inline-block bg-red-600 text-white px-6 py-2 rounded-lg hover:bg-red-700">
                Continue Shopping
            </a>
        </div>
    @else
        <table class="cart-table w-full">
            <thead>
                <tr>
                    <th class="text-left py-4">Product</th>
                    <th class="text-left py-4">Price</th>
                    <th class="text-left py-4">Quantity</th>
                    <th class="text-right py-4">Total</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach($cartItems as $productId => $item)
                    <tr>
                        <td class="py-6">
                            <div class="product-info flex gap-4">
                                @if(isset($item['image']))
                                    <img 
                                        src="{{ asset($item['image']) }}" 
                                        alt="{{ $item['name'] ?? 'Product' }}" 
                                        class="product-image w-[168px] h-[225px] object-cover rounded"
                                    >
                                @endif
                                <div class="product-details">
                                    <h5 class="text-xl font-serif mb-2">{{ $item['name'] ?? 'Product' }}</h5>
                                    @if(isset($item['color']))
                                        <p class="product-color text-gray-600">Color: {{ $item['color'] }}</p>
                                    @endif
                                    <button 
                                        wire:click="removeFromCart({{ $productId }})"
                                        class="remove-link text-gray-500 hover:text-red-600"
                                    >
                                        Remove
                                    </button>
                                </div>
                            </div>
                        </td>
                        <td class="price-text py-6">${{ number_format($item['price'] ?? 0, 2) }}</td>
                        <td class="py-6">
                            <div class="quantity-selector inline-flex border rounded">
                                <button 
                                    wire:click="updateCartItemQuantity({{ $productId }}, {{ ($item['quantity'] ?? 1) - 1 }})"
                                    class="quantity-btn px-3 py-1 hover:bg-gray-100"
                                >-</button>
                                <span class="quantity-input px-3 py-1">{{ sprintf("%02d", $item['quantity'] ?? 1) }}</span>
                                <button 
                                    wire:click="updateCartItemQuantity({{ $productId }}, {{ ($item['quantity'] ?? 1) + 1 }})"
                                    class="quantity-btn px-3 py-1 hover:bg-gray-100"
                                >+</button>
                            </div>
                        </td>
                        <td class="price-text text-right py-6">
                            ${{ number_format(($item['price'] ?? 0) * ($item['quantity'] ?? 1), 2) }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="checkout-section max-w-md ml-auto mt-8">
            <div class="table_subtotal flex justify-between mb-4">
                <p class="subtotal text-lg font-serif">Subtotal:</p>
                <p class="subtotal text-lg font-serif">
                    ${{ number_format(array_reduce($cartItems, function($total, $item) {
                        return $total + (($item['price'] ?? 0) * ($item['quantity'] ?? 1));
                    }, 0), 2) }}
                </p>
            </div>
            <button 
                wire:click="$dispatch('checkout')"
                class="checkout-btn w-full bg-red-600 text-white py-3 rounded-lg hover:bg-red-700 transition-colors mb-4"
            >
                Checkout
            </button>
            <a 
                href="{{ route('home') }}" 
                class="view-cart-btn block text-center text-gray-600 hover:text-red-600 font-serif"
            >
                Continue Shopping
            </a>
        </div>
    @endif
</div>