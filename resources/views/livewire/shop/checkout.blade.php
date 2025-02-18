<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <h2 class="text-2xl font-semibold mb-6">Checkout</h2>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        <div>
            <h3 class="text-lg font-semibold mb-4">Shipping Information</h3>
            <form wire:submit.prevent="placeOrder">
                <div class="mb-4">
                    <label for="first_name" class="block text-sm font-medium text-gray-700">First Name</label>
                    <input type="text" id="first_name" wire:model="shippingAddress.first_name" class="mt-1 focus:ring-primary focus:border-primary block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    @error('shippingAddress.first_name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

                <div class="mb-4">
                    <label for="last_name" class="block text-sm font-medium text-gray-700">Last Name</label>
                    <input type="text" id="last_name" wire:model="shippingAddress.last_name" class="mt-1 focus:ring-primary focus:border-primary block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    @error('shippingAddress.last_name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

                <div class="mb-4">
                    <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                    <input type="text" id="address" wire:model="shippingAddress.address" class="mt-1 focus:ring-primary focus:border-primary block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    @error('shippingAddress.address') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

                <div class="mb-4">
                    <label for="city"<div>

                <div class="mb-4">
                    <label for="city" class="block text-sm font-medium text-gray-700">City</label>
                    <input type="text" id="city" wire:model="shippingAddress.city" class="mt-1 focus:ring-primary focus:border-primary block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    @error('shippingAddress.city') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

                <div class="mb-4">
                    <label for="state" class="block text-sm font-medium text-gray-700">State</label>
                    <input type="text" id="state" wire:model="shippingAddress.state" class="mt-1 focus:ring-primary focus:border-primary block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    @error('shippingAddress.state') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

                <div class="mb-4">
                    <label for="postal_code" class="block text-sm font-medium text-gray-700">Postal Code</label>
                    <input type="text" id="postal_code" wire:model="shippingAddress.postal_code" class="mt-1 focus:ring-primary focus:border-primary block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    @error('shippingAddress.postal_code') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

                <div class="mb-4">
                    <label for="country" class="block text-sm font-medium text-gray-700">Country</label>
                    <input type="text" id="country" wire:model="shippingAddress.country" class="mt-1 focus:ring-primary focus:border-primary block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    @error('shippingAddress.country') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

                <div class="mb-4">
                    <label for="phone" class="block text-sm font-medium text-gray-700">Phone</label>
                    <input type="tel" id="phone" wire:model="shippingAddress.phone" class="mt-1 focus:ring-primary focus:border-primary block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    @error('shippingAddress.phone') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

                <h3 class="text-lg font-semibold mb-4 mt-8">Payment Method</h3>
                <div class="mb-4">
                    <label for="payment_method" class="block text-sm font-medium text-gray-700">Select Payment Method</label>
                    <select id="payment_method" wire:model="paymentMethod" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-primary focus:border-primary sm:text-sm">
                        <option value="">Select a payment method</option>
                        <option value="credit_card">Credit Card</option>
                        <option value="paypal">PayPal</option>
                    </select>
                    @error('paymentMethod') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

                <button type="submit" class="w-full bg-primary text-white py-2 px-4 rounded-md hover:bg-primary-dark transition-colors duration-300">
                    Place Order
                </button>
            </form>
        </div>

        <div>
            <h3 class="text-lg font-semibold mb-4">Order Summary</h3>
            <div class="bg-white rounded-lg shadow-md p-6">
                @foreach($cartItems as $productId => $item)
                    <div class="flex justify-between mb-4">
                        <div>
                            <h4 class="text-sm font-medium">{{ $item['name'] }}</h4>
                            <p class="text-xs text-gray-500">Quantity: {{ $item['quantity'] }}</p>
                        </div>
                        <span class="text-sm font-medium">${{ number_format($item['price'] * $item['quantity'], 2) }}</span>
                    </div>
                @endforeach
                <div class="border-t pt-4 mt-4">
                    <div class="flex justify-between">
                        <span class="font-semibold">Total:</span>
                        <span class="font-semibold">${{ number_format($total, 2) }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
