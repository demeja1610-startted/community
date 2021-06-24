<div class="article-card">

    {{-- юзер, дата, просмотры --}}
    @include('components.article.elements.info')

    {{-- картинка поста --}}
    @include('components.article.elements.thumbnail')

    <p class="article-card__title">{!! $article->title !!}</p>
</div>
