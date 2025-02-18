<div>
    <h3 class="text-lg font-semibold mb-4">Filters</h3>
    
    <div class="mb-4">
        <label for="category" class="block text-sm font-medium text-gray-700">Category</label>
        <select wire:model="selectedCategory" id="category" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-primary focus:border-primary sm:text-sm rounded-md">
            <option value="">All Categories</option>
            @foreach($categories as $category)
                <option value="{{ $category->slug }}">{{ $category->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-4">
        <label for="minPrice" class="block text-sm font-medium text-gray-700">Min Price</label>
        <input type="number" wire:model="minPrice" id="minPrice" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary sm:text-sm">
    </div>

    <div class="mb-4">
        <label for="maxPrice" class="block text-sm font-medium text-gray-700">Max Price</label>
        <input type="number" wire:model="maxPrice" id="maxPrice" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary sm:text-sm">
    </div>

    <button wire:click="applyPriceFilter" class="w-full bg-primary text-white py-2 px-4 rounded-md hover:bg-primary-dark transition-colors duration-300">
        Apply Filters
    </button>
</div>