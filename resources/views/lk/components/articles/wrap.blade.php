@if($articles->count())
    @dump($articles)
@else
    @component('lk.components.empty', ['title' => 'У вас пока нет ни одной статьи'])
        @slot('text')
            Но если хотите чем-то поделиться в Community, то быстрее жмите кнопку ниже
            <a class="d-flex button_center button button_maxContent mt-4 button_light" href="">Написать статью</a>
        @endslot
    @endcomponent
@endif

