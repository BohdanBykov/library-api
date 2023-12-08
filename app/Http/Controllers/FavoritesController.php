<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function addFavorite(Request $request, $bookId)
    {
        $user = Auth::user();

        $book = Book::find($bookId);

        if (!$book) {
            return response()->json(['error' => 'Book not found'], 404);
        }

        $user->favoriteBooks()->attach($bookId);

        return response()->json(['message' => 'Book added to favorites successfully'], 200);
    }

    public function removeFavorite(Request $request, $bookId)
    {
        $user = Auth::user();

        $book = Book::find($bookId);

        if (!$book) {
            return response()->json(['error' => 'Book not found'], 404);
        }

        $user->favoriteBooks()->detach($bookId);

        return response()->json(['message' => 'Book removed from favorites successfully'], 200);
    }

    public function getUserFavorites(Request $request)
    {
        $user = Auth::user();

        $favoriteBooks = $user->favoriteBooks;

        return response()->json(['favorite_books' => $favoriteBooks], 200);
    }
}
