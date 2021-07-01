<form
    autocomplete="off"
    method="POST"
    action="{{
        isset($article) ?
        route(AdminRouterNames()::page_articles_edit, ['article_id' => $article->id]) :
        route(AdminRouterNames()::page_articles_store) }}"
    class="col-12 {{ $formClasses ?? '' }}"
>
    @csrf

    @method(isset($article) ? 'PATCH' : 'PUT')

    <div class="row">
        <div class="col-12 col-xl-9">
            <div class="card card-secondary w-100">
                <div class="card-header">
                    <h3 class="card-title">{!! isset($article) ? __('Редактирование статьи') : __('Создание статьи') !!}</h3>
                </div>

                <div class="card-body">
                    @include('admin.components/input/text', [
                        'name' => 'title',
                        'placeholder' => 'Новый заголовок',
                        'label' => 'Заголовок',
                        'id' => 'title',
                        'value' => isset($article) ? $article->title : old('title'),
                        'error' => 'title',
                    ])
                    @include('admin.components/input/textarea', [
                        'name' => 'description',
                        'label' => 'Контент статьи',
                        'classes' => 'editor',
                        'id' => 'editor',
                        'value' => isset($article) ? $article->description : old('description'),
                        'error' => 'description',
                    ])
                </div>
            </div>
        </div>

        <div class="col-12 col-xl-3">
            <div class="d-flex flex-column w-100">
                @component('admin.components/form-wigets/save')
                    @slot('title', __('Действия'))

                    @isset($article)
                        @slot('model', $article)
                    @endisset
                @endcomponent

                @component('admin.components/form-wigets/categories')
                    @slot('title', __('Категории'))

                    @isset($article)
                        @slot('model', $article)
                    @endisset

                    @slot('categories', $categories)
                @endcomponent

                @component('admin.components/form-wigets/tags')
                    @slot('title', __('Теги'))

                    @isset($article)
                        @slot('model', $article)
                    @endisset

                    @slot('tags', $tags)
                @endcomponent
            </div>
        </div>
    </div>
</form>
