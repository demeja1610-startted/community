<aside class="lk-sidebar">
    @include('lk.components.sidebar.header')
    <div class="lk-sidebar__content">
        @include('lk.components.sidebar.item', [
            'title' => 'Закладки',
            'count' => $user->bookmarks_count,
            'routeName' => 'user.bookmarks',
        ])

    </div>
    @include('lk.components.sidebar.footer')
</aside>
