<?php

// Import alle benodigde controllers
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\JewelryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\Admin\AdminNewsController;
use App\Http\Controllers\Admin\AdminFaqController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\AdminJewelryController;
use App\Http\Controllers\Admin\AdminContactController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// PUBLIEKE ROUTES (iedereen kan deze pagina's bezoeken)

// Homepage
Route::get('/', [HomeController::class, 'index'])->name('home');

// Nieuwspagina's
Route::get('/nieuws', [NewsController::class, 'index'])->name('news.index');              // Overzicht alle nieuwsberichten
Route::get('/nieuws/{newsItem}', [NewsController::class, 'show'])->name('news.show');     // Detailpagina van één nieuwsbericht

// FAQ pagina
Route::get('/faq', [FaqController::class, 'index'])->name('faq.index');

// Contactpagina's
Route::get('/contact', [ContactController::class, 'create'])->name('contact.create');     // Toon contactformulier
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');      // Verstuur contactformulier

// Juwelen pagina's
Route::get('/juwelen', [JewelryController::class, 'index'])->name('jewelry.index');       // Overzicht alle juwelen
Route::get('/juwelen/{product}', [JewelryController::class, 'show'])->name('jewelry.show'); // Detailpagina van één juweel

// Openbaar profiel bekijken (van andere gebruikers)
Route::get('/profiel/{user}', [ProfileController::class, 'show'])->name('profile.show');

// ROUTES VOOR INGELOGDE GEBRUIKERS
// middleware(['auth']) = je moet ingelogd zijn om deze routes te gebruiken
Route::middleware(['auth'])->group(function () {

    // Eigen profiel bewerken
    Route::get('/profiel-bewerken', [ProfileController::class, 'edit'])->name('profile.edit');   // Toon bewerkformulier
    Route::put('/profiel', [ProfileController::class, 'update'])->name('profile.update');         // Sla wijzigingen op

    // Reactie plaatsen bij een nieuwsbericht
    Route::post('/nieuws/{newsItem}/reacties', [CommentController::class, 'store'])->name('comments.store');
});

// ADMIN ROUTES (alleen voor beheerders)
// middleware(['auth', 'admin']) = je moet ingelogd zijn EN admin zijn
// prefix('admin') = alle routes beginnen met /admin/...
// name('admin.') = alle route namen beginnen met admin....
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {

    // Admin dashboard
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    // CRUD voor nieuwsberichten (7 routes: index, create, store, show, edit, update, destroy)
    Route::resource('news', App\Http\Controllers\Admin\AdminNewsController::class);

    // CRUD voor FAQ (zonder 'show' pagina)
    Route::resource('faq', App\Http\Controllers\Admin\AdminFaqController::class)->except(['show']);

    // CRUD voor gebruikers beheren
    Route::resource('users', App\Http\Controllers\Admin\AdminUserController::class);

    // Extra route: zet gebruiker admin aan/uit
    Route::post('/users/{user}/toggle-admin', [App\Http\Controllers\Admin\AdminUserController::class, 'toggleAdmin'])->name('users.toggle-admin');

    // CRUD voor juwelen beheren
    Route::resource('jewelry', App\Http\Controllers\Admin\AdminJewelryController::class);

    // Contactberichten beheren (alleen bekijken en verwijderen)
    Route::get('/contact', [App\Http\Controllers\Admin\AdminContactController::class, 'index'])->name('contact.index');        // Overzicht
    Route::get('/contact/{message}', [App\Http\Controllers\Admin\AdminContactController::class, 'show'])->name('contact.show'); // Detail
    Route::delete('/contact/{message}', [App\Http\Controllers\Admin\AdminContactController::class, 'destroy'])->name('contact.destroy'); // Verwijder
});

// Laad de standaard Laravel authenticatie routes (login, register, etc.)
require __DIR__.'/auth.php';
