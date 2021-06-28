<div class="article-attachment {{ $class ?? '' }}">
    <div class="article-attachment__left">
        <a href="#" class="button button_light button_mini article-attachment__button">Новости</a>

        @if(!empty($tags))
            {{-- выводим теги только на индивидуалке --}}
            <div class="article-attachment__tags">
                <a href="#" class="article-attachment__tags-item">#Google</a>
                <a href="#" class="article-attachment__tags-item">#Microsoft</a>
                <a href="#" class="article-attachment__tags-item">#WordPress</a>
                <a href="#" class="article-attachment__tags-item">#SEO</a>
            </div>
        @endif
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
