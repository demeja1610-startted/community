<div class="article-info mrgn16-bottom">

    <div class="article-info__avatar">
        <img src="{{ $avatar }}" alt="{{ $alt }}" class="article-info__avatar-image">
    </div>

    <a href="#" class="article-info__user">{!! $name !!}</a>

    <div class="article-info__date">{!!  date_format($date, 'j F \в H:i') !!}</div>

    <div class="article-info__views">
        @include('icons.eye')
        {!! $viewsCount !!}
    </div>

</div>
