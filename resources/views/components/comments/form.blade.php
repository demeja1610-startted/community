@if (!auth()->check())
    <p class="comments-form_unauthorized">
        {!! __('Чтобы оставить комментарий') !!}
        <a href="{{ route('page.login') }}">{!! __('Войдите') !!}</a>
        {!! __('или') !!}
        <a href="{{ route('page.register') }}">{!! __('Зарегистрируйтесь') !!}</a>
    </p>
@else
    <form class="comments-form" method="POST" action="{{ route('comments.add') }}">
        @csrf
        {{ Form::hidden('commentable_type', Crypt::encrypt(get_class($model))) }}
        {{ Form::hidden('commentable_id', Crypt::encrypt($model->id)) }}
        {{ Form::hidden('parent_id') }}
        <textarea name="body"></textarea>
        @error('body')
            <p class="error">{{ __($message) }}</p>
        @enderror
        <button type="submit">{!! __('Написать') !!}</button>
    </form>
@endif
