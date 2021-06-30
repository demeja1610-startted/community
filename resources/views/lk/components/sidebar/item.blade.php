<a href="{!! route($routeName,  ['user_id' => $user->id]) !!}" class="lk-sidebar__item @routeActive($routeName)">
    <h4 class="lk-sidebar__title">{!! $title ?? '' !!}</h4>
    <div class="lk-sidebar__count">{!! $count ?? '' !!}</div>
</a>
