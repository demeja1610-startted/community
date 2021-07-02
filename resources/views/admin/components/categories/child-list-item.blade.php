<li class="list-group-item d-flex justify-content-start align-items-center categories-child-list__item">
    <a href="{{ route(AdminRouterNames()::page_categories_edit, ['category_id' => $childrenCategory->id]) }}" class="link w-100 text-break mr-2">
        @for ($i = 0; $i < $dashes; $i++)
            &mdash;
        @endfor
        {!! $childrenCategory->title !!}
    </a>
    <span class="badge badge-primary badge-pill mr-3">{!! $childrenCategory->article_count + $childrenCategory->question_count !!}</span>
    <div class="d-flex align-items-center">
        <a href="{{ route(AdminRouterNames()::page_categories_edit, $childrenCategory) }}" class="btn btn-outline-primary btn-sm mr-2" title="{!! __('Редактировать') !!}">
            <i class="fas fa-edit"></i>
        </a>
        @include('admin.components/confirm/button', [
            'url' => route(AdminRouterNames()::categories_destroy, ['category_id' => $childrenCategory->id]),
            'title' => __('Удалить категорию'),
            'icon' => '<i class="fas fa-trash-alt"></i>',
            'confirmText' => 'Вы действительно хотите удалить эту категорию?',
            'method' => 'delete',
        ])
    </div>
</li>
@if (isset($childrenCategory->childs) && !$childrenCategory->childs->isEmpty())
    @include('admin.components/categories/child-list', ['childrenCategories' => $childrenCategory->childs])
@endif
