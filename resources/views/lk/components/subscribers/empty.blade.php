@component('lk.components.empty')
    @slot('title')
        @currentUser
        У вас пока нет подписчиков
        @else
            У пользователя  {!! $user->name !!} пока что нет подписчиков
        @endif
    @endslot
    @slot('text')
        @currentUser
        Публикуйте интересные статьи и на вас будут подписываться другие авторы и пользователи
        <a class="d-flex button_center button button_maxContent mt-4 button_light" href="">Написать статью</a>
        @else
            <form action="">
                <button class="button button_primary">Подписаться</button>
            </form>
        @endif
    @endslot
@endcomponent
