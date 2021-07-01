@if($questions->count())
    @dump($questions)
@else
    @component('lk.components.empty', ['title' => 'У вас пока нет ни одного вопроса'])
        @slot('text')
            В Community всегда готовы помочь, поэтому не стесняйтесь и спрашивайте
            <a class="d-flex button_center button button_maxContent mt-4 button_light" href="">Задать вопрос</a>
        @endslot
    @endcomponent
@endif

