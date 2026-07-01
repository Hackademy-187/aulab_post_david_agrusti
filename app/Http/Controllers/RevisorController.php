<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Article;

class RevisorController extends Controller
{
    public function dashboard()
    {
        $unrevisedArticles = Article::where('is_accepted', NULL)->get();
        $acceptedArticles = Article::where('is_accepted', true)->get();
        $rejectedArticles = Article::where('is_accepted', false)->get();

        return view('revisor.dashboard', compact('unrevisedArticles', 'acceptedArticles', 'rejectedArticles'));
    }

    public function acceptArticle(Article $article)
    {
        $article->is_accepted = true;
        $article->save();
        return redirect(route('revisor.dashboard'))->with('message', 'Articolo accettato con successo');
    }

    public function rejectArticle(Article $article)
    {
        $article->is_accepted = false;
        $article->save();
        return redirect(route('revisor.dashboard'))->with('message', 'Articolo rifiutato con successo');
    }

    public function undoArticle(Article $article)
    {
        $article->is_accepted = NULL;
        $article->save();
        return redirect(route('revisor.dashboard'))->with('message', 'Articolo riportato in revisione con successo');
    }
}
