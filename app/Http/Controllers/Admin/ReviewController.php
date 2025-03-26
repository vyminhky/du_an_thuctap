<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\User;
use App\Models\Book;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::with('user', 'book')->get();
        return view('admin.review.index', compact('reviews'));
    }

    public function create()
    {
        $users = \App\Models\User::all();
        $books = \App\Models\Book::all();
        return view('admin.review.create', compact('users', 'books'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'book_id' => 'required|exists:books,id',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string',
        ]);

        Review::create($request->all());
        return redirect()->route('admin.reviews.index')->with('success', 'Thêm đánh giá thành công!');
    }

    public function edit($id)
    {
        $review = Review::findOrFail($id);
        $users = \App\Models\User::all();
        $books = \App\Models\Book::all();
        return view('admin.review.edit', compact('review', 'users', 'books'));
    }

    public function update(Request $request, $id)
    {
        $review = Review::findOrFail($id);
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'book_id' => 'required|exists:books,id',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string',
        ]);

        $review->update($request->all());
        return redirect()->route('admin.reviews.index')->with('success', 'Cập nhật đánh giá thành công!');
    }

    public function destroy($id)
    {
        Review::destroy($id);
        return redirect()->route('admin.reviews.index')->with('success', 'Xóa đánh giá thành công!');
    }
}
