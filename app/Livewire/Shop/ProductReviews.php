<?php

namespace App\Livewire\Shop;

use App\Models\Product;
use App\Models\Review;
use Livewire\Component;

class ProductReviews extends Component
{
    public Product $product;
    public $rating = 5;
    public $comment = '';

    public function mount(Product $product)
    {
        $this->product = $product;
    }

    public function addReview()
    {
        $this->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|min:10',
        ]);

        $this->product->reviews()->create([
            'user_id' => auth()->id(),
            'rating' => $this->rating,
            'comment' => $this->comment,
        ]);

        $this->rating = 5;
        $this->comment = '';

        session()->flash('message', 'Review added successfully.');
    }

    public function render()
    {
        $reviews = $this->product->reviews()->with('user')->latest()->get();
        return view('livewire.shop.product-reviews', compact('reviews'));
    }
}