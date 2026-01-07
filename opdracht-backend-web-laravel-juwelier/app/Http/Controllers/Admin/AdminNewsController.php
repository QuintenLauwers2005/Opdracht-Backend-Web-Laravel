<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NewsItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminNewsController extends Controller
{
    // Toon een overzicht van alle nieuwsberichten
    public function index()
    {
        // Haal alle newsitems op met hun auteur (user), sorteer op datum (nieuwste eerst)
        // Paginate(10) = toon 10 items per pagina
        $newsItems = NewsItem::with('user')->orderBy('publication_date', 'desc')->paginate(10);

        // Stuur de data naar de view 'admin.news.index'
        return view('admin.news.index', compact('newsItems'));
    }

    // Toon het formulier om een nieuw nieuwsbericht aan te maken
    public function create()
    {
        return view('admin.news.create');
    }

    // Sla een nieuw nieuwsbericht op in de database
    public function store(Request $request)
    {
        // Controleer of alle verplichte velden correct zijn ingevuld
        $validated = $request->validate([
            'title' => 'required|string|max:255',      // Verplicht, max 255 tekens
            'content' => 'required|string',             // Verplicht, tekst
            'image' => 'required|image|max:2048',       // Verplicht, moet afbeelding zijn, max 2MB
            'publication_date' => 'required|date',      // Verplicht, moet geldige datum zijn
        ]);

        // Als er een afbeelding is geüpload, sla deze op in de 'news' map
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('news', 'public');
        }

        // Voeg de ID van de ingelogde gebruiker toe als auteur
        $validated['user_id'] = auth()->id();

        // Maak het nieuwsbericht aan in de database
        NewsItem::create($validated);

        // Stuur gebruiker terug naar overzichtspagina met succesbericht
        return redirect()->route('admin.news.index')
            ->with('success', 'Nieuwsbericht succesvol aangemaakt.');
    }

    // Toon het formulier om een bestaand nieuwsbericht te bewerken
    public function edit(NewsItem $news)
    {
        // Laravel haalt automatisch het juiste newsitem op via route model binding
        return view('admin.news.edit', compact('news'));
    }

    // Werk een bestaand nieuwsbericht bij in de database
    public function update(Request $request, NewsItem $news)
    {
        // Controleer of alle velden correct zijn ingevuld
        // Let op: 'image' is nu 'nullable' (optioneel bij bewerken)
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|max:2048',      // Optioneel: alleen als je nieuwe foto upload
            'publication_date' => 'required|date',
        ]);

        // Als er een nieuwe afbeelding is geüpload
        if ($request->hasFile('image')) {
            // Verwijder eerst de oude afbeelding als die bestaat
            if($news->image){
                Storage::disk('public')->delete($news->image);
            }
            // Sla de nieuwe afbeelding op
            $validated['image'] = $request->file('image')->store('news', 'public');
        }

        // Werk het nieuwsbericht bij met de nieuwe gegevens
        $news->update($validated);

        // Stuur gebruiker terug naar overzichtspagina met succesbericht
        return redirect()->route('admin.news.index')
            ->with('success', 'Newsitem bijgewerkt.');
    }

    // Verwijder een nieuwsbericht uit de database
    public function destroy(NewsItem $news)
    {
        // Verwijder eerst de gekoppelde afbeelding van de server
        if($news->image){
            Storage::disk('public')->delete($news->image);
        }

        // Verwijder het nieuwsbericht uit de database
        $news->delete();

        // Stuur gebruiker terug naar overzichtspagina met succesbericht
        return redirect()->route('admin.news.index')
            ->with('success', 'Newsitem verwijderd.');
    }
}
