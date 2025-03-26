<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Book;

class CartController extends Controller
{
    public function add(Request $request, $bookId)
{
    if (!$request->session()->has('user')) {
        return redirect()->route('account.login.form')->with('error', 'Vui lòng đăng nhập để thêm vào giỏ hàng.');
    }

    $userId = $request->session()->get('user.id');

    $book = Book::findOrFail($bookId);

    $cart = Cart::firstOrCreate(['user_id' => $userId]);

    $item = CartItem::where('cart_id', $cart->id)->where('book_id', $bookId)->first();

    if ($item) {
        if ($item->quantity + 1 > $book->stock) {
            return back()->with('error', 'Sản phẩm chỉ còn ' . $book->stock . ' trong kho.');
        }

        $item->quantity += 1;
        $item->save();
    } else {
        if ($book->stock < 1) {
            return back()->with('error', 'Sản phẩm đã hết hàng.');
        }

        CartItem::create([
            'cart_id' => $cart->id,
            'book_id' => $bookId,
            'quantity' => 1,
        ]);
    }

    return redirect()->route('cart.index')->with('success', 'Đã thêm vào giỏ hàng!');
}
public function index(Request $request)
{
    $userId = session('user.id');

    $cart = Cart::where('user_id', $userId)->first();

    $items = $cart ? CartItem::with('book')->where('cart_id', $cart->id)->get() : collect();

    return view('user.cart', compact('items'));
}

public function remove($itemId)
{
    $userId = session('user.id');

    $item = CartItem::findOrFail($itemId);

    if ($item->cart->user_id != $userId) {
        return back()->with('error', 'Bạn không có quyền xóa sản phẩm này.');
    }

    $item->delete();

    return back()->with('success', 'Đã xóa sản phẩm khỏi giỏ hàng.');
}
public function update(Request $request, $itemId)
{
    $request->validate([
        'quantity' => 'required|integer|min:1'
    ]);

    $userId = session('user.id');
    $item = CartItem::findOrFail($itemId);

    if ($item->cart->user_id != $userId) {
        return back()->with('error', 'Bạn không có quyền sửa sản phẩm này.');
    }

    $book = $item->book;

    if ($request->quantity > $book->stock) {
        return back()->with('error', 'Số lượng yêu cầu vượt quá số lượng tồn kho.');
    }

    $item->quantity = $request->quantity;
    $item->save();

    return back()->with('success', 'Đã cập nhật số lượng sản phẩm.');
}

}
