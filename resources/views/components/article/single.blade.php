<article class="article-single">

    <div class="article-single__info">
        Inje
        Вчера в 14:49
        269
    </div>

    <h1 class="article-single__title mrgn16-bottom">{!! $article->title !!}</h1>
    <img src="{!! $article->images->first()->url !!}" alt="{{ $article->images->first()->alt }}">
</article>

@include('components.comments.wrap', ['model' => $article, 'max_depth' => $max_depth, 'comments' => $comments])
