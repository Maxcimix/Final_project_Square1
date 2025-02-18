<?php

namespace App\Livewire\Shop;

use App\Models\Order;
use App\Models\OrderItem;
use Livewire\Component;

class Checkout extends Component
{
    public $cartItems = [];
    public $total = 0;
    public $firstName;
    public $lastName;
    public $email;
    public $address;
    public $city;
    public $country;
    public $postalCode;

    protected $rules = [
        'firstName' => 'required|min:2',
        'lastName' => 'required|min:2',
        'email' => 'required|email',
        'address' => 'required',
        'city' => 'required',
        'country' => 'required',
        'postalCode' => 'required',
    ];

    public function mount()
    {
        $this->cartItems = session()->get('cart', []);
        $this->calculateTotal();
    }

    public function calculateTotal()
    {
        $this->total = array_reduce($this->cartItems, function ($total, $item) {
            return $total + ($item['price'] * $item['quantity']);
        }, 0);
    }

    public function placeOrder()
    {
        $this->validate();

        $order = Order::create([
            'user_id' => auth()->id(),
            'total_amount' => $this->total,
            'status' => 'pending',
            'payment_status' => 'pending',
        ]);

        foreach ($this->cartItems as $productId => $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $productId,
                'quantity' => $item['quantity'],
                'price' => $item['price'],
            ]);
        }

        session()->forget('cart');
        return redirect()->route('order.confirmation', $order);
    }

    public function render()
    {
        return view('livewire.shop.checkout');
    }
}