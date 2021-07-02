@component('lk.components.empty')
    @slot('title')
        @currentUser
        У вас пока нет ни одной статьи
        @else
            У этого пользователя пока нет ни одной публикации
        @endif
    @endslot
    @slot('text')
        @currentUser
        Но если хотите чем-то поделиться в Community, то быстрее жмите кнопку ниже
        <a class="d-flex button_center button button_maxContent mt-4 button_light" href="">Написать статью</a>
        @else
            Но не переживайте на Community есть много чего <a class="text_link"
                                                              href="{{ route(webRouterNames()::page_articles_index) }}">почитать</a>
        @endif
    @endslot
@endcomponent
