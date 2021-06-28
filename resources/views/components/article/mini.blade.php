<div class="article-mini">
    <a href="{{ $link }}" class="text_medium article-mini__title">{!! $title !!}</a>
    <div class="article-mini__bottom">
        <time class="text_small article-mini__date">{!! $date !!}</time>
        <a href="{{ $link }}" class="article-mini__discuss">
            @include('icons.message')
            <span class="text_small article-mini__discuss-title">Обсудить</span>
        </a>
    </div>
</div>
