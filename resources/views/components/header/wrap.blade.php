<header class="header">
    <div class="container">
        <div class="header__inner">
            <div class="header__left">
                <div class="header__hamburger">
                    @include('icons.hamburger')
                </div>
                @include('components.logo.wrap', ['iClasses' => 'header__logo'])
                <ul class="header__types">
                    <li>
                        <a href="{{ route('page.articles.index') }}" class="text_medium header__type active">Статьи</a>
                    </li>
                    <li>
                        <a href="{{ route('page.questions.index') }}" class="text_medium header__type ">Вопросы</a>
                    </li>
                </ul>
            </div>
            <div class="header__right">
                @include('components.search.wrap', ['iClasses' => 'header__search'])
                <div class="header__search-mobile">
                    @include('icons.search')
                </div>
                <div class="header__signin-mobile">
                    @include('icons.avatar')
                </div>
                <button class="button button_primary header__signin">Войти</button>
            </div>
        </div>
    </div>
</header>
