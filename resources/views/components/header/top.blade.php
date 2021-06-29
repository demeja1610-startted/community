<div class="header-top">
    <div class="container">
        <div class="header-top__inner">
            <div class="header-top__left">
                <div class="header-top__hamburger">
                    @include('icons.hamburger')
                </div>
                @include('components.logo.wrap', ['iClasses' => 'header-top__logo'])
                <ul class="header-top__types">
                    <li>
                        <a href="{{ route('page.articles.index') }}" class="text_medium header-top__type {{ RouteHelper::active('page.articles.index') ? 'active' : '' }}">Статьи</a>
                    </li>
                    <li>
                        <a href="{{ route('page.questions.index') }}" class="text_medium header-top__type {{ RouteHelper::active('page.questions.index') ? 'active' : '' }}">Вопросы</a>
                    </li>
                </ul>
            </div>
            <div class="header-top__right">
                @include('components.search.wrap', ['iClasses' => 'header-top__search'])
                <div class="header-top__search-mobile">
                    @include('icons.search')
                </div>
                <div class="header-top__signin-mobile">
                    @include('icons.avatar')
                </div>
                <button class="button button_primary header-top__signin">Войти</button>
            </div>
        </div>
    </div>
</div>
