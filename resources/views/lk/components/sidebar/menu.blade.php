<div class="lk-sidebar__content">
    @include('lk.components.sidebar.item', [
        'title' => 'Закладки',
        'count' => $user->bookmarks_count,
        'routeName' => 'user.bookmarks',
    ])

    @include('lk.components.sidebar.item', [
        'title' => 'Статьи',
        'count' => $user->articles_count,
        'routeName' => 'user.articles',
    ])

    @include('lk.components.sidebar.item', [
       'title' => 'Комментарии',
       'count' => $user->articleComments_count,
       'routeName' => 'user.comments',
   ])

    @include('lk.components.sidebar.item', [
       'title' => 'Вопросы',
       'count' => $user->questions_count,
       'routeName' => 'user.questions',
   ])

    @include('lk.components.sidebar.item', [
       'title' => 'Ответы',
       'count' => $user->answers_count,
       'routeName' => 'user.answers',
   ])

    @include('lk.components.sidebar.item', [
       'title' => 'Подписки',
       'count' => $user->subscribers_count,
       'routeName' => 'user.subscribers',
   ])

    @include('lk.components.sidebar.item', [
     'title' => 'Подписчики',
     'count' => $user->subscriptions_count,
     'routeName' => 'user.subscriptions',
 ])

</div>
