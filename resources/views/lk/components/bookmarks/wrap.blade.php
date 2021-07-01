@if($bookmarks->count())
    @dump($bookmarks)
@else
    @component('lk.components.empty', ['title' => 'У вас пока нет закладок'])
        @slot('text')
            Читайте <a class="text_link"
                       href="{{ route(webRouterNames()::page_articles_index) }}">статьи</a> и смотрите какие
            <a class="text_link"
               href="{{ route(webRouterNames()::page_questions_index) }}">вопросы</a> задают в Community и добавляйте их в закладки
        @endslot
    @endcomponent
@endif

