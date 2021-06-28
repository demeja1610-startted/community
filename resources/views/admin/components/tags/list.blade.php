<ul class="list-group list-group-flush tags-list">
    @forelse ($tags as $tag)
        @include('admin.components/tags/list-item', ['tag' => $tag])
    @empty
        <p class="text">{{ __('Тегов не найдено') }}</p>
    @endforelse
</ul>
