<ul class="list-group list-group-flush categories-list">
    @forelse ($categories as $category)
        @include('admin.components/categories/list-item', ['category' => $category])
    @empty
        <p class="text">{!! __('Категорий не найдено') !!}</p>
    @endforelse
</ul>
