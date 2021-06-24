<form action="get" class="search-form {{ isset($iClasses) ? $iClasses : '' }}">
    <div class="search-form__inner">
        @include('icons.search', ['iClasses' => 'search-form__icon'])
        <input type="text" placeholder="Поиск" class="forms_input forms_input_mini">
    </div>
</form>
