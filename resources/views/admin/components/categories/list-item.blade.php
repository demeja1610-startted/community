@php
    $dashes = 0
@endphp

<li class="list-group-item d-flex justify-content-start align-items-center categories-list__item">
    <a href="{{ route(AdminRouterNames()::page_categories_edit, ['category_id' => $category->id]) }}" class="link w-100  text-break mr-2">
        {!! $category->title !!}
    </a>
    <span class="badge badge-primary badge-pill mr-3">{!! $category->article_count + $category->question_count !!}</span>
    <div class="d-flex align-items-center">
        <a href="{{ route(AdminRouterNames()::page_categories_edit, $category) }}" class="btn btn-outline-primary btn-sm mr-2" title="{!! __('Редактировать') !!}">
            <i class="fas fa-edit"></i>
        </a>
        @include('admin.components/confirm/button', [
            'url' => route(AdminRouterNames()::categories_destroy, ['category_id' => $category->id]),
            'title' => __('Удалить категорию'),
            'icon' => '<i class="fas fa-trash-alt"></i>',
            'confirmText' => 'Вы действительно хотите удалить эту категорию?',
            'method' => 'delete',
            'buttonClasses' => 'btn-outline-danger',
        ])
    </div>
</li>

@if (isset($category->childs) && !$category->childs->isEmpty())
    @include('admin.components/categories/child-list', ['childrenCategories' => $category->childs])
@endif
