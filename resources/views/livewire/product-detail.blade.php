<div>
    <main class="max-w-7xl mx-auto px-4 py-8 flex gap-10">
        <!-- Product Gallery -->
        <div class="flex gap-5">
            <aside class="flex flex-col gap-4 w-20">
                @foreach($images as $image)
                    <div class="relative">
                        <img 
                            src="{{ $image }}"
                            alt="Thumbnail" 
                            class="w-full h-20 object-cover rounded-md cursor-pointer transition-all hover:outline hover:outline-2 hover:outline-gray-600 {{ $mainImage === $image ? 'outline outline-2 outline-gray-600' : '' }}"
                            wire:click="$set('mainImage', '{{ $image }}')"
                        >
                    </div>
                @endforeach
            </aside>
            <div class="flex-1 max-w-xl">
                <img src="{{ $mainImage }}" alt="Main Product" class="w-full h-full object-cover rounded-md">
            </div>
        </div>
        <div class="flex-1 max-w-md">
            <div class="text-gray-500 text-sm font-medium mb-2">{{ $product->brand }}</div>
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-2xl font-serif">{{ $product->name }}</h2>
                <button class="w-14 h-14 flex justify-center items-center rounded-full border-2 border-gray-300 shadow-md hover:shadow-lg transition duration-300">
                    <span class="text-xl">☆</span>
                </button>
            </div>

            <!-- Price -->
            <div class="flex items-center gap-4 mb-6">
                <span class="text-xl font-semibold text-red-600">${{ number_format($product->price, 2) }}</span>
                @if($product->original_price)
                    <span class="line-through text-gray-500">${{ number_format($product->original_price, 2) }}</span>
                    <span class="bg-red-600 text-white px-2 rounded-md text-xs">
                        SAVE {{ round((($product->original_price - $product->price) / $product->original_price) * 100) }}%
                    </span>
                @endif
            </div>
            <div class="mb-6">
                <div class="text-sm text-gray-600">Only <strong>{{ $product->stock }}</strong> item(s) left in stock!</div>
                <div class="w-full h-2 bg-gray-300 rounded-md mt-2">
                    <div class="h-full bg-red-600" style="width: {{ min(($product->stock / 100) * 100, 100) }}%"></div>
                </div>
            </div>
            <div class="mb-6">
                <div class="flex justify-between mb-2">
                    <span class="font-medium">Size:</span>
                    <span class="font-medium text-red-600">{{ $selectedSize }}</span>
                </div>
                <div class="flex gap-2">
                    @foreach(['M', 'L', 'XL', 'XXL'] as $size)
                        <div 
                            wire:click="selectSize('{{ $size }}')"
                            class="w-12 h-12 flex items-center justify-center border rounded-md cursor-pointer hover:bg-gray-100 {{ $selectedSize === $size ? 'bg-gray-100 border-red-600' : '' }}"
                        >
                            {{ $size }}
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Color Selector -->
            <div class="mb-6">
                <div class="font-medium mb-2">Color:</div>
                <div class="flex gap-2">
                    @foreach($product->colors as $color)
                        <div 
                            wire:click="selectColor('{{ $color }}')"
                            class="w-8 h-8 rounded-full cursor-pointer border-2 hover:ring-2 {{ $selectedColor === $color ? 'ring-2' : '' }}"
                            style="background-color: {{ $color }}; border-color: {{ $selectedColor === $color ? $color : '#e5e7eb' }};"
                        ></div>
                    @endforeach
                </div>
            </div>

            <!-- Quantity Selector -->
            <div class="mb-6">
                <div class="text-sm font-medium mb-2">Quantity</div>
                <div class="flex gap-4 items-center mb-4">
                    <button 
                        wire:click="decrementQuantity"
                        class="w-8 h-8 bg-gray-200 text-xl rounded-md"
                    >-</button>
                    <input 
                        type="number" 
                        wire:model="quantity"
                        class="w-14 text-center border border-gray-300 rounded-md" 
                        min="1" 
                        max="{{ $product->stock }}"
                    >
                    <button 
                        wire:click="incrementQuantity"
                        class="w-8 h-8 bg-gray-200 text-xl rounded-md"
                    >+</button>
                </div>
                <button 
                    wire:click="addToCart"
                    class="w-full py-3 bg-red-600 text-white rounded-md hover:bg-red-700 transition duration-200"
                >
                    Add to cart
                </button>
            </div>

            <!-- Rest of the template remains the same -->
        </div>
    </main>

    <!-- Flash Message -->
    @if (session()->has('message'))
        <div class="fixed bottom-4 right-4 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg">
            {{ session('message') }}
        </div>
    @endif
</div>