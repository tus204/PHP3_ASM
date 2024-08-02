<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class AdminOrderController extends Controller
{
    public function index()
    {
        $orders = Order::orderBy('created_at', 'desc')->get();
        return view('admin.orders.index', compact('orders'));
    }

    public function confirm(Order $order)
    {
        $order->update(['status' => 'confirmed']);
        return redirect()->route('admin.orders.index')->with('success', 'Đơn hàng đã được xác nhận.');
    }

    public function cancel(Order $order)
    {
        $order->update(['status' => 'cancelled']);
        return redirect()->route('admin.orders.index')->with('success', 'Đơn hàng đã bị hủy.');
    }
    public function ship(Order $order)
    {
        $order->update(['status' => 'shipped']);
        return redirect()->route('admin.orders.index')->with('success', 'Đơn hàng đã được vận chuyển');
    }
   
}
