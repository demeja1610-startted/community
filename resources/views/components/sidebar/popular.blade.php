<div class="sidebar__item sidebar-popular">
    <div class="sidebar-popular__top">
        <h4 class="text_big sidebar__title">Популярно сейчас</h4>
        @include('icons.fire')
    </div>
    @foreach($popularArticles as $article)
        @include('components.article.mini', ['title' => $article->title, 'link' => route('page.articles.single', $article), 'date' => $article->created_at, 'commentsCount' => $article->comments_count])
    @endforeach
</div>
