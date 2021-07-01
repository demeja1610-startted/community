@if($subscriptions->count())
    @dump($subscriptions)
@else
    @component('lk.components.empty', ['title' => 'У вас пока нет подписок'])
        @slot('text')
            Читайте <a class="text_link" href="{{ route(webRouterNames()::page_articles_index) }}">статьи</a> и подписывайтесь на понравившихся авторов и интересные темы
        @endslot
    @endcomponent
@endif

