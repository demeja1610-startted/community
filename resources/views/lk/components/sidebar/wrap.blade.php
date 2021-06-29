<aside class="lk-sidebar">
    @include('lk.components.sidebar.header')
    <div class="lk-sidebar__content">
        @include('lk.components.sidebar.item', [
            'title' => 'Закладки',
            'count' => 2,
            'routeName' => 'user.bookmarks'
        ])
        @include('lk.components.sidebar.item', [
       'title' => 'Статьи',
       'count' => 2,
       'routeName' => 'user.articles'
   ])
        @include('lk.components.sidebar.item', [
       'title' => 'Комментарии',
       'count' => 2,
       'routeName' => 'user.comments'
   ])
        @include('lk.components.sidebar.item', [
       'title' => 'Вопросы',
       'count' => 2,
       'routeName' => 'user.questions'
   ])
        @include('lk.components.sidebar.item', [
       'title' => 'Ответы',
       'count' => 2,
       'routeName' => 'user.answers'
   ])
        @include('lk.components.sidebar.item', [
       'title' => 'Подписчики',
       'count' => 2,
       'routeName' => 'user.subscribes'
   ])
        @include('lk.components.sidebar.item', [
      'title' => 'Подписки',
      'count' => 2,
      'routeName' => 'user.subscriptions'
    ])
    </div>
    @include('lk.components.sidebar.footer')
</aside>
