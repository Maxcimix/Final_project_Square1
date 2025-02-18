<div>
    <h2 class="text-2xl font-semibold mb-4">Customer Reviews</h2>

    @auth
        <form wire:submit.prevent="addReview" class="mb-8">
            <div class="mb-4">
                <label for="rating" class="block text-sm font-medium text-gray-700">Rating</label>
                <select wire:model="rating" id="rating" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-primary focus:border-primary sm:text-sm">
                    <option value="5">5 Stars</option>
                    <option value="4">4 Stars</option>
                    <option value="3">3 Stars</option>
                    <option value="2">2 Stars</option>
                    <option value="1">1 Star</option>
                </select>
            </div>
            <div class="mb-4">
                <label for="comment" class="block text-sm font-medium text-gray-700">Comment</label>
                <textarea wire:model="comment" id="comment" rows="3" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-primary focus:border-primary sm:text-sm"></textarea>
            </div>
            <button type="submit" class="bg-primary text-white py-2 px-4 rounded-md hover:bg-primary-dark transition-colors duration-300">
                Submit Review
            </button>
        </form>
    @else
        <p class="mb-4">Please <a href="{{ route('login') }}" class="text-primary hover:underline">log in</a> to leave a review.</p>
    @endauth

    <div class="space-y-4">
        @foreach ($reviews as $review)
            <div class="bg-white p-4 rounded-lg shadow">
                <div class="flex items-center justify-between mb-2">
                    <div class="flex items-center">
                        <span class="font-semibold mr-2">{{ $review->user->name }}</span>
                        <div class="flex items-center">
                            @for ($i = 1; $i <= 5; $i++)
                                <svg class="w-5 h-5 {{ $i <= $review->rating ? 'text-yellow-400' : 'text-gray-300' }}" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                </svg>
                            @endfor
                        </div>
                    </div>
                    <span class="text-sm text-gray-500">{{ $review->created_at->diffForHumans() }}</span>
                </div>
                <p class="text-gray-700">{{ $review->comment }}</p>
            </div>
        @endforeach
    </div>
</div>