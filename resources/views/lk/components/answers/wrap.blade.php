@if($answers->count())
    @dump($answers)
@else
    @component('lk.components.empty', ['title' => 'У вас пока нет ответов на вопросы пользователей'])
        @slot('text')
            Если готовы помочь - смотрите
            <a class="text_link"
               href="{{ route(webRouterNames()::page_questions_index) }}">вопросы</a>, которые задают в Community и отвечайте
        @endslot
    @endcomponent
@endif

