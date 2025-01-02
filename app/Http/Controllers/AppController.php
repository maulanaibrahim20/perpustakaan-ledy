<?php

namespace App\Http\Controllers;

use App\Models\book;
use App\Models\Cart;
use App\Models\CartItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppController extends Controller
{
    public function index()
    {
        $data['book'] = book::all();
        return view('landing.layout.home', $data);
    }

    public function cart()
    {
        $data['cart'] = Cart::where('user_id', Auth::user()->id)->first();

        return view('landing.pages.cart.index', $data);
    }

    public function addToCart(Request $request, $id)
    {
        try {
            $cart = Cart::create([
                'user_id' => Auth::user()->id
            ]);

            $cartItem = CartItem::create([
                'cart_id' => $cart->id,
                'book_id' => $id,
                'qty' => 1
            ]);

            return redirect()->back()->with('success', 'Buku berhasil ditambahkan ke keranjang');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }


    public function transaction(Request $request)
    {
        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = env('server_key');
        \Midtrans\Config::$isProduction = false;
        \Midtrans\Config::$isSanitized = true;
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => rand(),
                'gross_amount' => $request->total,
            ),
            'customer_details' => array(
                'first_name' => Auth::user()->name,
                'last_name' => Auth::user()->name,
                'email' => Auth::user()->email,
                'phone' => '08111222333',
            ),
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);

        return response()->json([
            'snapToken' => $snapToken
        ]);
    }
}
