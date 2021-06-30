<div class="article-card">

    {{-- юзер, дата, просмотры --}}
{{--    @include('components.article.elements.info')--}}
    @include('components.question-information.wrap', ['avatar' => URL::asset('/images/no-avatar.svg'), 'name' => 'Александра Черенкова', 'date' => '14 июня в 19:26', 'viewsCount' => '497'])

    <a href="{{ route('page.articles.single', $article) }}" class="article-card__title mrgn12-bottom">{!! $article->title !!}</a>

    {{-- картинка поста --}}
    @include('components.article.elements.thumbnail')

    <div class="article-card__desc mrgn24-bottom">
        По данным издания Search Engine Journal, Google готовит очередную революцию — ПО на базе искусственного интеллекта, которое сможет блокировать до 99% спамных ссылок в поисковой выдаче.
    </div>

    {{-- кнопка-ссылка, лайки --}}
    @include('components.article.elements.attachment', ['like' => true])

</div>
