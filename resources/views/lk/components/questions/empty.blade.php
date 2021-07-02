@component('lk.components.empty')
    @slot('title')
        @currentUser
        У вас пока нет ни одного вопроса
        @else
            Этот пользователь пока что не задал ни одного вопроса
        @endif
    @endslot
    @slot('text')
        @currentUser
        В Community всегда готовы помочь, поэтому не стесняйтесь и спрашивайте
        <a class="d-flex button_center button button_maxContent mt-4 button_light" href="">Задать вопрос</a>
        @endif
    @endslot
@endcomponent
