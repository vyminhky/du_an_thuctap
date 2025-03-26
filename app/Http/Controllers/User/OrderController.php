<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Book;
use App\Models\User;


class OrderController extends Controller
{
    public function showForm(Request $request)
{
    $userSession = session('user');

    if (!$userSession) {
        return redirect()->route('home')->with('error', 'Bạn cần đăng nhập để đặt hàng.');
    }

    // Lấy thông tin đầy đủ của người dùng từ bảng users
    $user = User::find($userSession['id']);

    if (!$user) {
        return redirect()->route('home')->with('error', 'Không tìm thấy thông tin người dùng.');
    }

    // Lấy giỏ hàng mới nhất
    $cart = Cart::where('user_id', $user->id)->latest()->first();

    if (!$cart) {
        return redirect()->back()->with('error', 'Giỏ hàng không tồn tại.');
    }

    $items = CartItem::where('cart_id', $cart->id)->with('book')->get();

    $total = 0;
    foreach ($items as $item) {
        $total += $item->book->price * $item->quantity;
    }

    return view('user.order', [
        'user' => $user,
        'items' => $items,
        'total' => $total
    ]);
}

    public function placeOrder(Request $request)
    {
        $user = session('user');

        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'address' => 'required|string',
        ]);

        $cart = Cart::where('user_id', $user['id'])->latest()->first();
        $items = CartItem::where('cart_id', $cart->id)->with('book')->get();

        if ($items->isEmpty()) {
            return redirect()->back()->with('error', 'Giỏ hàng trống!');
        }

        $total = 0;
        foreach ($items as $item) {
            $total += $item->book->price * $item->quantity;
        }

        $order = Order::create([
                'user_id' => $user['id'],
                'customer_name' => $request->name,
                'customer_email' => $request->email,
                'customer_phone' => $request->phone,
                'customer_address' => $request->address, // thêm dòng này
                'status' => 'Chờ xác nhận',
                'total_price' => $total,
        ]);

        foreach ($items as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'book_id' => $item->book->id,
                'book_title' => $item->book->title,
                'book_author' => $item->book->author,
                'book_image' => $item->book->image,
                'quantity' => $item->quantity,
                'price' => $item->book->price,
            ]);
        }

        $cart->delete();

        return redirect()->route('user.dashboard')->with('success', 'Đặt hàng thành công!');
    }

    public function index(Request $request)
{
    if (!$request->session()->has('user')) {
        return redirect()->route('account.login.form')
                         ->with('error', 'Vui lòng đăng nhập để xem đơn hàng của bạn.');
    }
    $user = session('user');

    $orders = Order::with('orderItems')->where('user_id', $user['id'])
        ->orderBy('created_at', 'desc')->get();

    return view('user.orders_list', compact('orders'));
}

    public function show($id)
    {
        $user = session('user');

        // Tìm đơn hàng theo id và user_id (bảo mật)
        $order = Order::where('id', $id)->where('user_id', $user['id'])->firstOrFail();

        $items = $order->orderItems; // nếu bạn đã khai quan hệ

        return view('user.order_info', compact('order', 'items'));
    }

    public function cancel(Request $request, $id)
    {
        $user = session('user');
        $order = Order::where('id', $id)->where('user_id', $user['id'])->firstOrFail();

        if (in_array($order->status, ['Chờ xác nhận', 'Đã xác nhận'])) {
            $order->status = 'Hủy đơn hàng';
            $order->save();
            return redirect()->back()->with('success', 'Đơn hàng đã được hủy.');
        }

        return redirect()->back()->with('error', 'Không thể hủy đơn hàng ở trạng thái hiện tại.');
    }
    public function cancelOrder($id, Request $request)
{
    $user = session('user');

    $order = Order::where('id', $id)->where('user_id', $user['id'])->first();

    if (!$order) {
        return back()->with('error', 'Không tìm thấy đơn hàng.');
    }

    if (in_array($order->status, ['Chờ xác nhận', 'Đã xác nhận'])) {
        $order->status = 'Đã hủy';
        $order->save();

        return back()->with('success', 'Đơn hàng đã được hủy thành công.');
    }

    return back()->with('error', 'Đơn hàng không thể hủy ở trạng thái hiện tại.');
}

public function markAsReceived($id, Request $request)
{
    $user = session('user');

    $order = Order::where('id', $id)->where('user_id', $user['id'])->first();

    if (!$order) {
        return back()->with('error', 'Không tìm thấy đơn hàng.');
    }

    if ($order->status === 'Đã giao hàng') {
        $order->status = 'Đã nhận hàng';
        $order->save();

        return back()->with('success', 'Cảm ơn bạn đã xác nhận.');
    }

    return back()->with('error', 'Đơn hàng không thể xác nhận nhận hàng ở trạng thái hiện tại.');
}
}
