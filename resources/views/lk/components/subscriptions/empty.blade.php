@component('lk.components.empty')
    @slot('title')
        @currentUser
        У вас пока нет подписок
        @else
            У пользователя {!! $user->name !!} нет подписок
        @endif
    @endslot

    @slot('text')
        @currentUser
        Читайте <a class="text_link"
                   href="{{ route(webRouterNames()::page_articles_index) }}">статьи</a> и подписывайтесь на понравившихся авторов и интересные темы
        @endif
    @endslot
@endcomponent
