<div class="lk-sidebar__content">
    @include('lk.components.sidebar.item', [
    'title' => 'Закладки',
    'count' => $user->bookmarks_count,
    'routeName' => lkRouterNames()::page_index,
])

    @include('lk.components.sidebar.item', [
        'title' => 'Статьи',
        'count' => $user->articles_count,
        'routeName' => lkRouterNames()::page_articles_index,
    ])

    @include('lk.components.sidebar.item', [
       'title' => 'Комментарии',
       'count' => $user->article_comments_count,
       'routeName' => lkRouterNames()::page_comments_index,
   ])

    @include('lk.components.sidebar.item', [
       'title' => 'Вопросы',
       'count' => $user->questions_count,
       'routeName' => lkRouterNames()::page_questions_index,
   ])

    @include('lk.components.sidebar.item', [
       'title' => 'Ответы',
       'count' => $user->answers_count,
       'routeName' => lkRouterNames()::page_answers_index,
   ])

    @include('lk.components.sidebar.item', [
       'title' => 'Подписки',
       'count' => $user->subscribers_count,
       'routeName' => lkRouterNames()::page_subscriptions_index,
   ])

    @include('lk.components.sidebar.item', [
     'title' => 'Подписчики',
     'count' => $user->subscriptions_count,
     'routeName' => lkRouterNames()::page_subscribers_index,
 ])
</div>
