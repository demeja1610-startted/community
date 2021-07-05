<div class="question-card">
    <a href="{{ route(webRouterNames()::page_questions_single, $question) }}" class="question-card__link"></a>
    @include('components.question-information.wrap', [
    'avatar' => $question->user->avatar ? $question->user->avatar->url : URL::asset('/images/no-avatar.svg'),
    'alt' => $question->user->avatar ? $question->user->avatar->alt : 'avatar',
    'name' => $question->user->name,
    'date' => $question->created_at,
    'viewsCount' => $question->views])
    <h3 class="title_small question-card__title">{!! $question->title !!}</h3>
    <p class="text_big question-card__descr">{!! $question->description !!}</p>
    <div class="question-card__bottom">
        <div class="question-card__categories">
            @foreach($question->categories as $category)
                <a href="#" class="button button_light button_large text_medium question-card__category">{!! $category->title !!}</a>
            @endforeach
        </div>
        @include('components.post-actions.wrap', ['answersCount' => $question->comments_count])
    </div>
</div>
