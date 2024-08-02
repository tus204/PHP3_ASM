<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class CashPaymentController extends Controller
{
    public function cash_payment(Request $request)
    {
        $order = Order::find($request->order_id);
        
        if (!$order) {
            return redirect()->route('orders.index')->with('error', 'Order not found.');
        }

        $order->payment_confirmed = "direct payment"; 
        $order->status = 'paid';
        $order->save();

        return redirect()->route('orders.show', $order->id)->with('success', 'Payment successful!');
    }
}
