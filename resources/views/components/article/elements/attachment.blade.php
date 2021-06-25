<div class="article-attachment {{ $class ?? '' }}">
    <div class="article-attachment__left">
        <a href="#" class="button button_light button_mini article-attachment__button">Администрирование</a>
    </div>

    @if(!empty($like))
        {{-- выводим лайки только на главной --}}
        <div class="article-attachment__right">
            <div class="article-attachment__like">

                <a href="#" class="article-attachment__like-link">
                    @include('icons.array-down', ['iClass' => 'article-attachment__like-down'])
                </a>

                <div class="article-attachment__like-count">21</div>

                <a href="#" class="article-attachment__like-link">
                    @include('icons.array-top', ['iClass' => 'article-attachment__like-top'])
                </a>

            </div>
        </div>
    @endif
</div>
