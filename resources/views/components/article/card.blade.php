<div class="article-card">

    {{-- юзер, дата, просмотры --}}
{{--    @include('components.article.elements.info')--}}
    @include('components.question-information.wrap', [
    'avatar' => $article->user->avatar ? $article->user->avatar->url : URL::asset('/images/no-avatar.svg'),
    'name' => $article->user->name,
    'date' => $article->created_at,
    'viewsCount' => $article->views])

    <a href="{{ route('page.articles.single', $article) }}" class="article-card__title mrgn12-bottom">{!! $article->title !!}</a>

    {{-- картинка поста --}}
    @include('components.article.elements.thumbnail')

    <div class="article-card__desc mrgn24-bottom">
        {!! Str::words($article->description, 50, '...') !!}
    </div>

    {{-- кнопка-ссылка, лайки --}}
    @include('components.article.elements.attachment', ['like' => true])

</div>
