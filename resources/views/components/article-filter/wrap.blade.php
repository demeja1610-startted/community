<form method="GET" action="{{ route(webRouterNames()::page_articles_index) }}" class="article-filter">
    <select name="filter" class="article-filter__select">
        <option @if(request()->input('filter') == 'new') selected @endif value="new">Свежее</option>
        <option @if(request()->input('filter') == 'popular') selected @endif value="popular">Популярное</option>
    </select>
    @if($question)
        <div class="article-filter__answer">
            <span class="article-filter__answer-text">Только без ответа</span>
            <div class="forms_checkbox">
                <input type="checkbox" name="answered" class="forms_checkbox-input">
                <span class="forms_checkbox-span"></span>
            </div>
        </div>
    @endif
</form>
