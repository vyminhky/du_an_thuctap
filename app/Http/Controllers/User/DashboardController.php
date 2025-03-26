<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category;
use App\Models\Promotion;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search'); 
        $categoryId = $request->input('category'); 

        $latestBooks = Book::latest()->take(8)->get();

        $categories = Category::all();

        $promotions = Promotion::latest()->take(3)->get();

        $booksQuery = Book::query();

        if ($search) {
            $booksQuery->where(function ($q) use ($search) {
                $q->where('title', 'like', '%' . $search . '%')
                ->orWhere('author', 'like', '%' . $search . '%')
                ->orWhere('description', 'like', '%' . $search . '%');

            });
        }
        
        
        if ($categoryId) {
        $booksQuery->where('category_id', $categoryId);
        }
        
        $booksAll = $booksQuery->with('category')->paginate(8);
        

        return view('user.dashboard', compact(
            'latestBooks', 'booksAll', 'categories', 'promotions', 'search', 'categoryId'
        ));
    }
}
