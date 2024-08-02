<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class FavoritesController extends Controller
{
    public function favoriteBook(Request $request)
    {
        try {
            $bookId = $request->input('book_id');

            $favorites = session()->get('favorites', []);

            if (in_array($bookId, $favorites)) {
                return response()->json(['success' => false, 'message' => 'Book is already in your favorites']);
            }

            $favorites[] = $bookId;
            session()->put('favorites', $favorites);

            return response()->json(['success' => true, 'message' => 'Book added to favorites successfully']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }
    public function showFavorites()
    {
        $favoriteIds = session()->get('favorites', []);

        $books = Book::whereIn('id', $favoriteIds)->get();

        return view('favourites/index', compact('books'));
    }
    public function removeFavorite(Request $request)
    {
            $bookId = $request->input('book_id');
            $favorites = session()->get('favorites', []);
            if (($key = array_search($bookId, $favorites)) !== false) {
                unset($favorites[$key]);
                session()->put('favorites', array_values($favorites));  
            }
            return response()->json(['success' => true, 'message' => 'Book removed from favorites successfully']);
    }
}
