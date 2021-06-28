<ul class="list-group list-group-flush">
    @forelse ($categories as $category)
        @include('admin.pages/categories/table-row', ['category' => $category])
    @empty
        <p class="text">{{ __('Категорий не найдено') }}</p>
    @endforelse
</ul>
