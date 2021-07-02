<article class="article-single">

    {{-- юзер, дата, просмотры --}}
    @include('components.article.elements.info', [
        'avatar' => $article->user->avatar ? $article->user->avatar->url : URL::asset('/images/no-avatar.svg'),
        'alt' => $article->user->avatar ? $article->user->avatar->url : 'avatar',
        'name' => $article->user->name,
        'date' => $article->created_at,
        'viewsCount' => $article->views
    ])

    <h1 class="title_single mrgn16-bottom">{!! $article->title !!}</h1>

    {{-- обсудить, в закладки --}}
    @include('components.article.elements.discuss')

    {{-- картинка поста --}}
    @include('components.article.elements.thumbnail')

    {{-- кнопка-ссылка, лайки --}}
    @include('components.article.elements.attachment', ['class' => 'mrgn24-bottom', 'tags' => true])

</article>
@include('components.comments.wrap', ['model' => $article, 'max_depth' => $max_depth, 'comments' => $comments])
