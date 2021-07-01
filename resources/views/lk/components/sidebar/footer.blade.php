<div class="lk-sidebar__footer">
    <form method="POST" action="{{ route(webRouterNames()::auth_logout) }}">
        @csrf
        <button class="lk-sidebar__item d-flex justify-content-between align-items-center lk-sidebar__logout">
            <span
                class="text_secondary-6">Выход</span>
            @include('icons.exit', ['iconClass' => 'icon-logout'])</button>
    </form>
</div>
