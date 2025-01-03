<?php

namespace App\Http\Controllers;

use App\Models\book;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Checkout;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Midtrans\Config;

class AppController extends Controller
{
    public function index()
    {
        $data['book'] = Book::all();
        return view('landing.layout.home', $data);
    }

    public function addToCart(Request $request, $id)
    {
        try {
            $cart = Cart::firstOrCreate(
                ['user_id' => Auth::id(), 'status' => 'unpaid'],
                [
                    'user_id' => Auth::id(),
                    'order_id' => 'TRF-' . time(),
                    'status' => 'unpaid',
                ],
            );

            $cartItem = CartItem::where('cart_id', $cart->id)
                ->where('book_id', $id)
                ->first();

            if ($cartItem) {
                $cartItem->quantity += 1;
                $cartItem->save();
            } else {
                CartItem::create([
                    'cart_id' => $cart->id,
                    'book_id' => $id,
                    'qty' => 1,
                ]);
            }

            return redirect()->back()->with('success', 'Buku berhasil ditambahkan ke keranjang');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
    public function cart(Request $request)
    {
        $cart = Cart::where('user_id', Auth::user()->id)->where('status', 'unpaid')->first();

        $sortOrder = $request->query('sort', 'asc');

        if (!empty($cart) && $cart->cartItem->count() > 0) {
            $cartItems = $cart->cartItem;

            if ($sortOrder === 'asc') {
                $cartItems = $cartItems->sortBy(fn($item) => $item->book->price);
            } elseif ($sortOrder === 'desc') {
                $cartItems = $cartItems->sortByDesc(fn($item) => $item->book->price);
            }

            $cart->cartItem = $cartItems;
        }

        if (!$cart) {
            $cart = (object)[
                'cartItem' => [],
            ];
        }

        $data['cart'] = $cart;

        return view('landing.pages.cart.index', $data);
    }

    public function deleteItemCart(Request $request, $id)
    {
        try {
            $cartItem = CartItem::findOrFail($id);

            $cartId = $cartItem->cart_id;

            $cartItem->delete();

            $remainingItems = CartItem::where('cart_id', $cartId)->count();

            if ($remainingItems === 0) {
                Cart::findOrFail($cartId)->delete();
            }

            return redirect()->back()->with('success', 'Buku berhasil dihapus dari keranjang');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function checkout(Request $request)
    {
        $cart = Cart::where('user_id', Auth::user()->id)->where('order_id', $request->order_id)->first();

        $cartItem = CartItem::where('cart_id', $cart->id)->get();
        Config::$serverKey = env('server_key');
        Config::$isProduction = false;
        Config::$isSanitized = true;
        Config::$is3ds = true;

        $grossAmount = round($request->total);

        $params = array(
            'transaction_details' => array(
                'order_id' => $request->order_id,
                'gross_amount' => $grossAmount,
            ),
            'customer_details' => array(
                'first_name' => $request->name,
                'last_name' => $request->name,
                'email' => $request->email,
                'phone' => '08111222333',
            ),
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);
        return view('landing.pages.transaction.index', compact('snapToken', 'cart', 'cartItem'));
    }


    public function midtransCallback(Request $request)
    {
        $serverKey = env('server_key');
        $hashed = hash('SHA512', $request->order_id . $request->status_code . $request->gross_amount . $serverKey);
        if ($hashed == $request->signature_key) {
            if ($request->transaction_status == 'settlement') {
                $checkout = Cart::where('order_id', $request->order_id)->first();
                $checkout->status = 'paid';
                $checkout->save();
            }
        }
    }
}
