@if($comments->count())
    @dump($comments)
@else
    @component('lk.components.empty', ['title' => 'У вас пока нет комментариев'])
        @slot('text')
            Читайте <a class="text_link" href="{{ route(webRouterNames()::page_articles_index) }}">статьи</a> и оставляйте свои комментарии
        @endslot
    @endcomponent
@endif

