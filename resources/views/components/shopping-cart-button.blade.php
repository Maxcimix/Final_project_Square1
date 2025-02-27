<a href="/cart" class="relative inline-block">
    <x-svg-shopping-cart class="size-6 text-black hover:text-primary" />
    @if(isset($cartItemsCount) && $cartItemsCount > 0)
        <span class="absolute -top-2 -right-2 bg-red-600 text-white text-xs w-5 h-5 flex items-center justify-center rounded-full">
            {{ $cartItemsCount }}
        </span>
    @endif
</a>