@if($subscribers->count())
    @dump($subscribers)
@else
    @component('lk.components.empty', ['title' => 'У вас пока нет подписчиков'])
        @slot('text')
            Публикуйте интересные статьи и на вас будут подписываться другие авторы и пользователи
            <a class="d-flex button_center button button_maxContent mt-4 button_light" href="">Написать статью</a>
        @endslot
    @endcomponent
@endif
