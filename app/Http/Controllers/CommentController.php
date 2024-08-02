<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function storeAjax(Request $request, $book_id)
    {
        $validatedData = $request->validate([
            'rate' => 'required|integer',
            'content' => 'required|max:255',
        ], [
            'rate.required' => 'Rate is required',
            'rate.integer' => 'Rate must be a number',
            'content.required' => 'Comment is required',
            'content.max' => 'Maximum character set is 255 characters',
        ]);

        $userPhoto = auth()->user()->photo ? auth()->user()->photo : 'default-avatar.jpg';
        $comment = new Comment([
            'book_id' => $book_id,
            'account_id' => auth()->id(),
            'username' => auth()->user()->name,
            'photo' => $userPhoto,
            'rate' => $request->input('rate'),
            'content' => $request->input('content')
        ]);

        $comment->save();

        return response()->json(['success' => true, 'comment' => $comment]);
    }

    public function list($book_id)
    {
        $comments = Comment::where('book_id', $book_id)->with('user')->get();
        return response()->json($comments);
    }

    public function destroy(Comment $comment)
    {
        if (auth()->id() !== $comment->account_id) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $comment->delete();

        return response()->json(['success' => true]);
    }
}
