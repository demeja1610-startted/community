<div class="article-card">

    {{-- юзер, дата, просмотры --}}
    @include('components.article.elements.info')

    <a href="/articles/{{ $article->slug }}" class="article-card__title mrgn12-bottom">{!! $article->title !!}</a>

    {{-- обсудить, в закладки --}}
    @include('components.article.elements.discuss')

    {{-- картинка поста --}}
    @include('components.article.elements.thumbnail')

    <div class="article-card__desc mrgn24-bottom">
        По данным издания Search Engine Journal, Google готовит очередную революцию — ПО на базе искусственного интеллекта, которое сможет блокировать до 99% спамных ссылок в поисковой выдаче.
    </div>

    {{-- кнопка-ссылка, лайки --}}
    @include('components.article.elements.attachment', ['like' => true])

</div>
