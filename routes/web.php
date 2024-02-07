<?php

use App\Models\Article;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('articles.index', [
        'articles' => Article::query()
            ->orderBy('view_count', 'desc')
            ->get(),
    ]);
});

Route::get('/{article}', function (Article $article) {
    return view('articles.show', [
        'article' => $article
    ]);
})->name('articles.show');
