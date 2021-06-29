@php
    $dashes = 0
@endphp

<li class="list-group-item d-flex justify-content-start align-items-center categories-list__item">
    <a href="{{ route('page.admin.categories.edit', ['category_id' => $category->id]) }}" class="link w-100">{{ $category->title }}</a>
    <span class="badge badge-primary badge-pill mr-3">{{ $category->article_count + $category->question_count }}</span>
    <div>
        <button
            class="btn btn-outline-primary btn-sm"
            data-toggle="modal"
            data-target="#deleteConfirmModal"
            title="{{ __('Удалить') }}"
            data-href="{{ route('admin.categories.delete', ['category_id' => $category->id]) }}"
        >
            <i class="fas fa-trash-alt"></i>
        </button>
    </div>
</li>

@if (isset($category->childs) && !$category->childs->isEmpty())
    @include('admin.components/categories/child-list', ['childrenCategories' => $category->childs])
@endif
