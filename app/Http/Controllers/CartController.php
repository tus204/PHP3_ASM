<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Cart;
use App\Models\Voucher;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CartController extends Controller

{
    public function show()
    {
        $userId = auth()->id();
        $allCartItems = Cart::with('book')->where('user_id', $userId)->get();
    
        $totalPrice = $allCartItems->sum(function ($item) {
            return $item->quantity * $item->book->price;
        });
    
        $cartItems = Cart::with('book')->where('user_id', $userId)->paginate(2);
    
        return view('billcart', compact('cartItems', 'totalPrice'));
    }
    //Ajajax   uodate so luong
    public function updateCartQuantity(Request $request)
    {
        $cartItem = Cart::find($request->id);

        if ($cartItem) {
            $cartItem->quantity = $request->quantity;
            $cartItem->save();

            $newPrice = $cartItem->quantity * $cartItem->book->price;

            $totalPrice = Cart::where('user_id', auth()->id())->get()->sum(function ($item) {
                return $item->quantity * $item->book->price;
            });

            return response()->json([
                'success' => true,
                'newPrice' => $newPrice,
                'totalPrice' => $totalPrice
            ]);
        }

        return response()->json(['success' => false], 400);
    }

    public function deleteCartItem(Request $request)
    {
        $cartItem = Cart::find($request->id);

        if ($cartItem) {
            $cartItem->delete();

            $totalPrice = Cart::where('user_id', auth()->id())->get()->sum(function ($item) {
                return $item->quantity * $item->book->price;
            });

            return response()->json([
                'success' => true,
                'totalPrice' => $totalPrice
            ]);
        }

        return response()->json(['success' => false], 400);
    }


    //Luu vao gio hang
    public function addToCart(int $id, int $user_id)
    {

        $book = Book::findOrFail($id);
        $cartItem = Cart::where('user_id', $user_id)->where('book_id', $id)->first();

        if ($cartItem) {
            $cartItem->quantity++;
        } else {
            $cartItem = new Cart([
                'user_id'  => $user_id,
                'book_id'  => $id,
                'quantity' => 1
            ]);
        }

        $cartItem->save();

        return response()->json(['success' => true]);
    }
    //Goi gio hang tu user_id
    public function getCartItems(int $user_id)
    {
        $cartItems = Cart::where('user_id', $user_id)->with('book')->get();
        return response()->json($cartItems);
    }
    public function delete($id)
    {
        $cart = Cart::where('user_id', auth()->id())->where('book_id', $id)->first();

        if ($cart) {
            $cart->delete();
            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false]);
    }

    //Luu thanh danh sach tam thoi truoc khi thanh toán
    public function storeCartTemp(Request $request)
{
    // Lưu giỏ hàng vào session
    $cartItems = $request->input('cartItems');
    session(['cartItems' => $cartItems]);

    return redirect()->route('checkout.customer_info');
}

public function storeDiscount(Request $request)
{
    session(['discount' => $request->input('discount')]);
    return response()->json(['success' => true]);
}

   
}


