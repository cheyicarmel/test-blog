<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Acceuil : Liste des articles (public)
Route::get('/', function () {
    return redirect()->route('articles.index');
});

// Consulter les articles (public aussi)
Route::resource('articles', ArticleController::class);

Route::middleware('auth')->group(function () {

    // Liste des articles de l'utilisateur connecté
    Route::get('/mes-articles', [ArticleController::class, 'myArticles'])
        ->name('articles.my-articles');

    // Pprofil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';