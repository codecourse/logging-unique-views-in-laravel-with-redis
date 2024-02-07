<?php

use App\Models\Article;
use App\Models\Discussion;
use Illuminate\Support\Facades\Route;

request()->server->add(['REMOTE_ADDR' => '127.0.0.3']);

Route::get('/', function () {
    return view('articles.index', [
        'articles' => Article::query()
            ->orderBy('view_count', 'desc')
            ->get(),
    ]);
});

Route::get('/articles/{article}', function (Article $article) {
    $article->logView();

    return view('articles.show', [
        'article' => $article
    ]);
})->name('articles.show');

Route::get('/discussions/{discussion}', function (Discussion $discussion) {
    $discussion->logView();

    dd($discussion->getViewCount());
});
