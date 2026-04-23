<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Policies\ArticlePolicy;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    // Affichage de tous les articles
    public function index()
    {
        $articles = Article::with('user')->latest()->paginate(10);

        return view('articles.index', compact('articles'));
    }

    // Affichage des articles de l'utilisateur connecté
    public function myArticles()
    {
        $articles = Auth::user()->articles()->latest()->paginate(10);

        return view('articles.my-articles', compact('articles'));
    }

    // Formulaire de création d'un article
    public function create()
    {
        return view('articles.create');
    }

    // Création d'un nouvel article
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'body'  => 'required|string',
        ]);

        Auth::user()->articles()->create($validated);

        return redirect()->route('articles.my-articles')
            ->with('success', 'Votre nouvel article a été publié avec succès !');
    }

    // Affichage d'un article de facon détaillée
    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }

    // Formulaire de modification d'un article
    public function edit(Article $article)
    {
        $this->authorize('update', $article);

        return view('articles.edit', compact('article'));
    }

    // Modification d'un article
    public function update(Request $request, Article $article)
    {
        $this->authorize('update', $article);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'body'  => 'required|string',
        ]);

        
        $article->update($validated);

        return redirect()->route('articles.my-articles')
            ->with('success', 'Votre article a été mis à jour !');
    }

    // Suppression d'un article
    public function destroy(Article $article)
    {
        $this->authorize('delete', $article);

        $article->delete();

        return redirect()->route('articles.my-articles')
            ->with('success', 'Votre article a été supprimé.');
    }
}