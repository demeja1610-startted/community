<aside class="lk-sidebar">
    @include('lk.components.sidebar.header')
    <div class="lk-sidebar__content">
        @include('lk.components.sidebar.item', [
            'title' => 'Закладки',
            'count' => 2,
        ])
    </div>
    @include('lk.components.sidebar.footer')
</aside>
