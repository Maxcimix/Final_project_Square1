<x-guest-layout>
    <div class="wrapper py-8">
        <h1 class="text-3xl font-bold mb-8">Shopping Cart</h1>

        @if($cart->items->count() > 0)
            <div class="space-y-8">
                @foreach($cart->items as $item)
                    <div class="flex items-center gap-6 p-4 border rounded-lg">
                        <img 
                            src="{{ $item->product->images[0] }}" 
                            alt="{{ $item->product->name }}"
                            class="w-24 h-24 object-cover rounded-md"
                        >
                        <div class="flex-1">
                            <h3 class="font-medium">{{ $item->product->name }}</h3>
                            <p class="text-sm text-neutral-500">
                                @if($item->size) Size: {{ $item->size }} @endif
                                @if($item->color) Color: {{ $item->color }} @endif
                            </p>
                            <div class="mt-2 flex items-center gap-4">
                                <span class="text-sm">Quantity: {{ $item->quantity }}</span>
                                <span class="text-sm font-medium">${{ number_format($item->product->price * $item->quantity, 2) }}</span>
                            </div>
                        </div>
                        <form action="{{ route('cart.remove', $item->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="group hover:border-black border border-transparent rounded p-1.5 box-border hover:bg-neutral-100 transition-all">
                                <x-svg-x-mark class="size-5 text-black group-hover:text-primary" />
                            </button>
                        </form>
                    </div>
                @endforeach

                <div class="mt-8 flex justify-between items-center">
                    <div>
                        <p class="text-lg font-medium">Total: ${{ number_format($cart->items->sum(function($item) {
                            return $item->product->price * $item->quantity;
                        }), 2) }}</p>
                    </div>
                    <a href="#" class="btn btn-primary">
                        Proceed to Checkout
                    </a>
                </div>
            </div>
        @else
            <div class="text-center py-12">
                <p class="text-neutral-500">Your cart is empty</p>
                <a href="{{ route('home') }}" class="mt-4 inline-block text-primary hover:text-primary-dark">
                    Continue Shopping
                </a>
            </div>
        @endif
    </div>
</x-guest-layout>