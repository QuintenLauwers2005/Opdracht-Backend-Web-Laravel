<?php

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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/nieuws', [HomeController::class, 'index'])->name('news.index');
Route::get('/nieuws/{newsItem}', [HomeController::class, 'show'])->name('news.show');

Route::get('/faq', [FaqController::class, 'index'])->name('faq.index');

Route::get('/contact', [ContactController::class, 'create'])->name('contact.create');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::get('/juwelen', [JewelryController::class, 'index'])->name('jewelry.index');
Route::get('/juwelen/{product}', [JewelryController::class, 'show'])->name('jewelry.show');

Route::get('/profiel/{user}', [ProfileController::class, 'show'])->name('profile.show');

Route::middleware(['auth'])->group(function () {
    Route::get('/profiel-bewerken', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profiel', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('/nieuws/{newsItem}/reacties', [CommentController::class, 'store'])->name('comments.store');
});

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    Route::resource('news', App\Http\Controllers\Admin\AdminNewsController::class);
    Route::resource('faq', App\Http\Controllers\Admin\AdminFaqController::class)->except(['show']);
    Route::resource('users', App\Http\Controllers\Admin\AdminUserController::class);
    Route::post('/users/{user}/toggle-admin', [App\Http\Controllers\Admin\AdminUserController::class, 'toggleAdmin'])->name('users.toggle-admin');
    Route::resource('jewelry', App\Http\Controllers\Admin\AdminJewelryController::class);

    Route::get('/contact', [App\Http\Controllers\Admin\AdminContactController::class, 'index'])->name('contact.index');
    Route::get('/contact/{message}', [App\Http\Controllers\Admin\AdminContactController::class, 'show'])->name('contact.show');
    Route::delete('/contact/{message}', [App\Http\Controllers\Admin\AdminContactController::class, 'destroy'])->name('contact.destroy');
});

require __DIR__.'/auth.php';
