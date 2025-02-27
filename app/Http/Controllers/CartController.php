<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cart = Cart::firstOrCreate([
            'session_id' => session()->getId()
        ]);

        return view('cart.index', [
            'cart' => $cart->load('items.product')
        ]);
    }

    public function add(Request $request, Product $product)
    {
        $cart = Cart::firstOrCreate([
            'session_id' => session()->getId()
        ]);

        $cart->items()->create([
            'product_id' => $product->id,
            'quantity' => $request->quantity ?? 1,
            'size' => $request->size,
            'color' => $request->color
        ]);

        return back()->with('success', 'Product added to cart successfully!');
    }

    public function remove($cartItem)
    {
        $cart = Cart::where('session_id', session()->getId())->firstOrFail();
        $cart->items()->where('id', $cartItem)->delete();

        return back()->with('success', 'Product removed from cart successfully!');
    }
}