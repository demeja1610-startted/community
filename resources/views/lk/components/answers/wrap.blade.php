@if($answers->count())
    @dump($answers)
@else
    @component('lk.components.empty')
        @slot('title')
            @currentUser
            У вас пока нет ответов на вопросы пользователей
            @else
                Этот пользователь пока не отвечал на вопросы в Community
            @endif
        @endslot
        @slot('text')
            @currentUser
            Если готовы помочь - смотрите
            <a class="text_link"
               href="{{ route(webRouterNames()::page_questions_index) }}">вопросы</a>, которые задают в Community и отвечайте
            @endif
        @endslot
    @endcomponent
@endif

