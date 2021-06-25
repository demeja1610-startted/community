<article class="article-single">

    {{-- юзер, дата, просмотры --}}
    @include('components.article.elements.info')

    <h1 class="article-single__title mrgn16-bottom">{!! $article->title !!}</h1>

    {{-- картинка поста --}}
    @include('components.article.elements.thumbnail')

</article>

@include('components.comments.wrap', ['model' => $article, 'max_depth' => $max_depth, 'comments' => $comments])
