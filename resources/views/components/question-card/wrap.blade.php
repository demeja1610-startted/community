<div class="question-card">
    <a href="{{ $link }}" class="question-card__link"></a>
    @include('components.question-information.wrap', ['avatar' => $avatar, 'name' => $name, 'date' => $date, 'viewsCount' => $viewsCount])
    <h3 class="title_small question-card__title">{!! $title !!}</h3>
    <p class="text_big question-card__descr">{!! $descr !!}</p>
    <div class="question-card__bottom">
        <div class="question-card__categories">
            @foreach($categories as $category)
                <a href="{{ $category['link'] }}" class="button button_light text_medium question-card__category">{!! $category['name'] !!}</a>
            @endforeach
        </div>
        @include('components.post-actions.wrap', ['answersCount' => $answersCount])
    </div>
</div>
