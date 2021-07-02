<form method="GET" action="@currentRoute(webRouterNames()::page_articles_index){{ route(webRouterNames()::page_articles_index) }} @endif @currentRoute(webRouterNames()::page_questions_index){{ route(webRouterNames()::page_questions_index) }} @endif " class="article-filter">

    <select name="filter" class="article-filter__select">
        <option @if(request()->input('filter') == 'new') selected @endif value="new">Свежее</option>
        <option @if(request()->input('filter') == 'popular') selected @endif value="popular">Популярное</option>
    </select>
    @if($question)
        <div class="article-filter__answer">
            <span class="article-filter__answer-text">Только без ответа</span>
            <div class="forms_checkbox">
                <input @if(request()->input('answered') == 'on') checked @endif type="checkbox" name="answered" class="forms_checkbox-input article-filter__answer-input">
                <span class="forms_checkbox-span"></span>
            </div>
        </div>
    @endif
</form>
