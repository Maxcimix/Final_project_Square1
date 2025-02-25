<x-guest-layout>

  <main class="max-w-7xl mx-auto px-4 py-8 flex gap-10">
    <!-- Product Gallery -->
    <div class="flex gap-5">
      <aside class="flex flex-col gap-4 w-20">
        <template x-for="(image, index) in images" :key="index">
          <div class="relative">
            <img 
              :src="image" 
              alt="Thumbnail" 
              class="w-full h-20 object-cover rounded-md cursor-pointer transition-all hover:outline hover:outline-2 hover:outline-gray-600" 
              x-on:click="mainImage = image">
          </div>
        </template>
      </aside>

      <!-- Main Image -->
      <div class="flex-1 max-w-xl">
        <img :src="mainImage" alt="Main Product" class="w-full h-full object-cover rounded-md">
      </div>
    </div>

    <!-- Product Info -->
    <div class="flex-1 max-w-md">
      <div class="text-gray-500 text-sm font-medium mb-2">FASCO</div>
      <div class="flex justify-between items-center mb-4">
        <h2 class="text-2xl font-serif">Denim Jacket</h2>
        <button class="w-14 h-14 flex justify-center items-center rounded-full border-2 border-gray-300 shadow-md hover:shadow-lg transition duration-300">
          <span class="text-xl">☆</span>
        </button>
      </div>

      <!-- Rating -->
      <div class="flex items-center gap-2 mb-4">
        <span class="text-yellow-500">★★★★☆</span>
        <span class="text-gray-400">(3)</span>
      </div>

      <!-- Price -->
      <div class="flex items-center gap-4 mb-6">
        <span class="text-xl font-semibold text-red-600">$39.00</span>
        <span class="line-through text-gray-500">$59.00</span>
        <span class="bg-red-600 text-white px-2 rounded-md text-xs">SAVE 33%</span>
      </div>

      <!-- Viewers -->
      <div class="flex items-center gap-2 text-gray-600 mb-6">
        <span>👁</span>
        <span>24 people are viewing this right now</span>
      </div>

      <!-- Sale Countdown -->
      <div class="bg-red-100 p-4 rounded-md text-center mb-6">
        <div class="font-serif text-red-600 text-lg">Hurry up! Sale ends in:</div>
        <div class="text-2xl font-bold text-red-600">00 : 05 : 59 : 47</div>
      </div>

      <!-- Stock Info -->
      <div class="mb-6">
        <div class="text-sm text-gray-600">Only <strong>9</strong> item(s) left in stock!</div>
        <div class="w-full h-2 bg-gray-300 rounded-md mt-2">
          <div class="h-full bg-red-600" style="width: 30%"></div>
        </div>
      </div>

      <!-- Size Selector -->
      <div class="mb-6">
        <div class="flex justify-between mb-2">
          <span class="font-medium">Size:</span>
          <span class="font-medium text-red-600">M</span>
        </div>
        <div class="flex gap-2">
          <div class="w-12 h-12 flex items-center justify-center border rounded-md cursor-pointer hover:bg-gray-100">M</div>
          <div class="w-12 h-12 flex items-center justify-center border rounded-md cursor-pointer hover:bg-gray-100">L</div>
          <div class="w-12 h-12 flex items-center justify-center border rounded-md cursor-pointer hover:bg-gray-100">XL</div>
          <div class="w-12 h-12 flex items-center justify-center border rounded-md cursor-pointer hover:bg-gray-100">XXL</div>
        </div>
      </div>

      <!-- Color Selector -->
      <div class="mb-6">
        <div class="font-medium mb-2">Color:</div>
        <div class="flex gap-2">
          <div class="w-8 h-8 rounded-full cursor-pointer bg-blue-500 border-2 border-gray-200 hover:ring-2 hover:ring-blue-400"></div>
          <div class="w-8 h-8 rounded-full cursor-pointer bg-black border-2 border-gray-200 hover:ring-2 hover:ring-black"></div>
          <div class="w-8 h-8 rounded-full cursor-pointer bg-pink-300 border-2 border-gray-200 hover:ring-2 hover:ring-pink-400"></div>
        </div>
      </div>

      <!-- Quantity Selector -->
      <div class="mb-6">
        <div class="text-sm font-medium mb-2">Quantity</div>
        <div class="flex gap-4 items-center mb-4">
          <button class="w-8 h-8 bg-gray-200 text-xl rounded-md">-</button>
          <input type="number" class="w-14 text-center border border-gray-300 rounded-md" value="1" min="1" max="99">
          <button class="w-8 h-8 bg-gray-200 text-xl rounded-md">+</button>
        </div>
        <button class="w-full py-3 bg-red-600 text-white rounded-md hover:bg-red-700 transition duration-200">Add to cart</button>
      </div>

      <!-- Product Actions -->
      <div class="flex gap-6 mb-6">
        <button class="flex items-center gap-2 text-gray-600 hover:text-red-600">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3 7.5L7.5 3m0 0L12 7.5M7.5 3v13.5m13.5 0L16.5 21m0 0L12 16.5m4.5 4.5V7.5" />
          </svg>
          Compare
        </button>
        <button class="flex items-center gap-2 text-gray-600 hover:text-red-600">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 5.25h.008v.008H12v-.008Z" />
          </svg>
          Ask a question
        </button>
        <button class="flex items-center gap-2 text-gray-600 hover:text-red-600">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M7.217 10.907a2.25 2.25 0 1 0 0 2.186m0-2.186c.18.324.283.696.283 1.093s-.103.77-.283 1.093m0-2.186 9.566-5.314m-9.566 7.5 9.566 5.314m0 0a2.25 2.25 0 1 0 3.935 2.186 2.25 2.25 0 0 0-3.935-2.186Zm0-12.814a2.25 2.25 0 1 0 3.933-2.185 2.25 2.25 0 0 0-3.933 2.185Z" />
          </svg>
          Share
        </button>
      </div>

      <!-- Shipping Info -->
      <div class="border-t border-b py-4 mb-6 text-gray-600">
        <p><span class="text-xl">🚚</span> <strong>Estimated Delivery:</strong> Jul 30 - Aug 03</p>
        <p><span class="text-xl">📦</span> <strong>Free Shipping & Returns:</strong> On all orders over $75</p>
      </div>

      <!-- Payment Section -->
      <div class="text-center">
        <div class="mb-4">
          <img src="assets/images/product/tarjetas.png" alt="Payment Methods" class="w-64 mx-auto">
        </div>
        <div class="text-gray-600 font-semibold">Guarantee safe & secure checkout</div>
      </div>
    </div>
  </main>
</x-guest-layout>
