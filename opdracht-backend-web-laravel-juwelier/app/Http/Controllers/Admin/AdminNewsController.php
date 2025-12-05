<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NewsItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminNewsController extends Controller
{
    public function index()
    {
        $newsItems = NewsItem::with('user')->orderBy('publication_date', 'desc')->paginate(10);
        return view('admin.news.index', compact('newsItems'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.news.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'required|image|max:2048',
            'publication_date' => 'required|date',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('news', 'public');
        }

        $validated['user_id'] = auth()->id();
        NewsItem::create($validated);

        return redirect()->route('admin.news.index')
        ->with('success', 'Nieuwsbericht succesvol aangemaakt.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(NewsItem $news)
    {
        return view('admin.news.edit', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, NewsItem $news)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|max:2048',
            'publication_date' => 'required|date',
        ]);

        if ($request->hasFile('image')) {
            if($news->image){
                Storage::disk('public')->delete($news->image);
            }
            $validated['image'] = $request->file('image')->store('news', 'public');
        }

        $news->update($validated);
        return redirect()->route('admin.news.index')
            ->with('success', 'Newsitem bijgewerkt.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(NewsItem $news)
    {
        if($news->image){
            Storage::disk('public')->delete($news->image);
        }

        $news->delete();
        return redirect()->route('admin.news.index')
            ->with('success', 'Newsitem verwijderd.');
    }
}
