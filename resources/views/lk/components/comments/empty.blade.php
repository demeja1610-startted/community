@component('lk.components.empty')
    @slot('title')
        @currentUser
            У вас пока нет комментариев
        @else
            Этот пользователь пока не оставлял комментариев
        @endif
    @endslot
    @slot('text')
        @currentUser
        Читайте <a class="text_link"
                   href="{{ route(webRouterNames()::page_articles_index) }}">статьи</a> и оставляйте свои комментарии
        @endif
    @endslot
@endcomponent
