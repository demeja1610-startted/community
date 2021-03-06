<div class="article-mini">
    <a href="{{ $link }}" class="text_medium article-mini__title">{!! $title !!}</a>
    <div class="article-mini__bottom">
        <time class="text_small article-mini__date">{!!  date_format($date, 'j F \в H:i') !!}</time>
        <a href="{{ $link }}" class="article-mini__discuss">
            @include('icons.message')
            <span class="text_small article-mini__discuss-title">{!! $commentsCount > 0 ? $commentsCount : 'Обсудить' !!}</span>
        </a>
    </div>
</div>
