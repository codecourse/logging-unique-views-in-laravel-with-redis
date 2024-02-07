<div>
    @foreach ($articles as $article)
        <div>
            <a href="{{ route('articles.show', $article) }}">{{ $article->title }}</a>
        </div>
    @endforeach
</div>
