<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;

class OrderController extends Controller
{
    public function updateStatus(Request $request, $id)
{
    $order = Order::findOrFail($id);
    $order->status = $request->status;
    $order->save();

    return response()->json(['success' => true]);
}

    public function index()
    {
        $orders = Order::with('user')->latest()->get();

        return view('admin.order.index', compact('orders'));
    }

    public function show($id)
    {
        $order = Order::with('user')->findOrFail($id);
        $orderItems = OrderItem::where('order_id', $id)->get();

        return view('admin.order.detail', compact('order', 'orderItems'));
    }
}
