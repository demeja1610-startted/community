<div class="question-information__head">
    <div class="question-information__author">
        <img src="{{ $avatar }}" alt="{{ isset($alt) ? $alt : 'avatar' }}" class="question-information__avatar">
        <a href="#" class="text_small question-information__name">{!! $name !!}</a>
    </div>
    <time class="text_small question-information__date">{!! date_format($date, 'j F \в H:i') !!}</time>
    @isset($viewsCount)
        <div class="question-information__views">
            @include('icons.eye')
            <span class="text_small question-information__views-count">{!! $viewsCount !!}</span>
        </div>
    @endif
</div>
