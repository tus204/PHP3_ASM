<?php
namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    //So danh sach don hang
    public function index()
    {
        $userId = auth()->id();
        $orders = Order::where('user_id', $userId)->orderBy('created_at', 'desc')->get();

        return view('orders.index', compact('orders'));
    }
    //Hien thi chi tiet don hang
    public function show(Order $order)
    {
        
        $orderItems = $order->items()->with('book')->get();

        return view('orders.show', compact('order', 'orderItems'));
    }

    public function customerInfo()
    {
        $userId = auth()->id();
        $cartItems = Cart::with('book')->where('user_id', $userId)->get();
        $totalPrice = $cartItems->sum(function ($item) {
            return $item->quantity * $item->book->price;
        });

        $discount = session('discount', 0);
        $vat = $totalPrice * 0.05;
        $finalTotal = $totalPrice - $discount + $vat;

        return view('orders.customer_info', compact('cartItems', 'totalPrice', 'discount', 'vat', 'finalTotal'));
    }

    public function storeCartTemp(Request $request)
    {
        $userId = auth()->id();
        $cartItems = Cart::with('book')->where('user_id', $userId)->get();

        $cartData = $cartItems->map(function ($item) {
            return [
                'id' => $item->book->id,
                'name' => $item->book->name,
                'quantity' => $item->quantity,
                'price' => $item->book->price,
            ];
        });

        session(['cartItems' => $cartData->toArray()]);
        session(['discount' => $request->input('discount', session('discount', 0))]);

        return redirect()->route('orders.customer_info')->with('success', 'Thông tin giỏ hàng đã được lưu.');
    }

    public function placeOrder(Request $request)
    {
        $userId = auth()->id();
        $cartItems = session('cartItems', []);
        $discount = session('discount', 0);
    
        if (empty($cartItems)) {
            return redirect()->route('cart.index')->withErrors('Giỏ hàng của bạn rỗng.');
        }
    
        DB::beginTransaction();
    
        try {
            $order = Order::create([
                'user_id' => $userId,
                'name' => $request->input('name'),
                'phone' => $request->input('phone'),
                'address' => $request->input('address'),
                'total_price' => 0,
                'discount' => $discount,
                'status' => 'pending',
                'payment_confirmed' => 'none', 
                'delivery_confirmed' => 'none',
            ]);
    
            $totalPrice = 0;
    
            foreach ($cartItems as $cartItem) {
                $book = Book::find($cartItem['id']);
                if ($book) {
                    $quantity = $cartItem['quantity'];
                    $price = $book->price;
                    $total = $quantity * $price;
                    $totalPrice += $total;
    
                    OrderItem::create([
                        'order_id' => $order->id,
                        'book_id' => $book->id,
                        'quantity' => $quantity,
                        'price' => $price,
                        'total' => $total
                    ]);
                }
            }
    
            $vat = $totalPrice * 0.05;
            $finalTotal = $totalPrice - $discount + $vat;
    
            $order->update(['total_price' => $finalTotal]);
    
            // Xoa session
            session()->forget('cartItems');
            session()->forget('discount');
            // Xoa gio hang db
            Cart::where('user_id', $userId)->delete();
    
            DB::commit();
    
            return redirect()->route('orders.show', $order->id)->with('success', 'Đơn hàng đã được đặt thành công!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('orders.customer_info')->withErrors('Đã có lỗi xảy ra khi xử lý đơn hàng. Vui lòng thử lại.');
        }
    }
    //XOa ma giam gia
    public function clearDiscount()
    {
        session()->forget('discount');
        return response()->json(['success' => true]);
    }
    //Xac nhan thanh toan
    public function confirmPayment($id)
    {
        $order = Order::find($id);
        if ($order && $order->status == 'pending') {
            $order->payment_confirmed = true;
            $order->save();
            return redirect()->route('orders.show', $id)->with('success', 'Payment confirmed successfully.');
        }
        return redirect()->route('orders.show', $id)->with('error', 'Unable to confirm payment.');
    }
    public function complete(Order $order)
    {
        $order->update(['status' => 'complete']);
        return redirect()->route('orders.show', $order->id)->with('success', 'Đơn hàng đã được hoàn thành');
    }
    // public function cancel(Order $order)
    // {
    //     $order->update(['status' => 'cancelled by used']);
    //     return redirect()->route('orders.show', $order->id)->with('success', 'Bạn đã hủy đơn hàng');
    // }

   
}

