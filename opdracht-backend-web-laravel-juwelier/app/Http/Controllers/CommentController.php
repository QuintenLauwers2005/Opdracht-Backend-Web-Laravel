<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NewsItem;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(Request $request, NewsItem $newsItem){

        $validated = $request->validate([
            'content' => 'required|string|min:3|max:1000',
        ], [
            'content.required' => 'Reactie is verplicht',
            'content.min' => 'Reactie moet minimaal 3 karakters bevatten',
        ]);

        $newsItem->comments()->create([
            'user_id' => auth()->id(),
            'content' => $validated['content'],
        ]);

        return redirect()->route('news.show', $newsItem)
            ->with('success', 'Reactie geplaatst!');
    }
}
