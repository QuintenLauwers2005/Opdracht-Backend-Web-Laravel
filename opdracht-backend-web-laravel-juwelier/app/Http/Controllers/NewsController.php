<?php

namespace App\Http\Controllers;

use App\Models\NewsItem;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $newsItems = NewsItem::with('user')
            ->orderBy('publication_date', 'desc')
            ->paginate(6);

        return view('news.index', compact('newsItems'));
    }

    public function show(NewsItem $newsItem)
    {
        $newsItem->load('user', 'comments.user');

        return view('news.show', compact('newsItem'));
    }
}
