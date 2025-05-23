<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        if (empty($cart)) {
            return redirect('/')->with('error', 'Your cart is empty!');
        }
        return view('checkout', compact('cart'));
    }

    public function store(Request $request)
    {
        $cart = session()->get('cart', []);
        if (empty($cart)) {
            return redirect('/')->with('error', 'Your cart is empty!');
        }

        $request->validate([
            'customer_name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:255',
        ]);

        DB::transaction(function() use ($request, $cart) {
            $total = array_sum(array_map(fn($item) => $item['price'] * $item['quantity'], $cart));
            $order = Order::create([
                'customer_name' => $request->customer_name,
                'phone' => $request->phone,
                'address' => $request->address,
                'total' => $total,
            ]);

            foreach ($cart as $id => $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $id,
                    'quantity' => $item['quantity'],
                    'price' => $item['price'],
                ]);
            }
            session()->forget('cart');
            session()->put('order_id', $order->id);
        });

        return redirect()->route('order.confirmation');
    }

    public function confirmation()
    {
        $order = null;
        if(session()->has('order_id')) {
            $order = Order::with('items.product')->find(session()->pull('order_id'));
        }
        return view('order_confirmation', compact('order'));
    }
}