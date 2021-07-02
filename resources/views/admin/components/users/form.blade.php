<form
    autocomplete="off"
    method="POST"
    action="{{
        isset($user) ?
        route(AdminRouterNames()::page_users_edit, ['user_id' => $user->id]) :
        route(AdminRouterNames()::users_store) }}"
    class="col-12 {{ $formClasses ?? '' }}"
>
    @csrf

    @method(isset($user) ? 'PATCH' : 'PUT')

    <div class="row">
        <div class="col-12 col-xl-9">
            <div class="card card-secondary w-100">
                <div class="card-header">
                    <h3 class="card-title">{!! isset($user) ? __('Редактирование пользователя') : __('Создание пользователя ') !!}</h3>
                </div>

                <div class="card-body">
                    @include('admin.components/input/text', [
                        'name' => 'name',
                        'placeholder' => 'Евгений Акакиевич',
                        'label' => 'Имя пользователя',
                        'id' => 'name',
                        'value' => isset($user) ? $user->name : old('name'),
                        'error' => 'name',
                    ])
                    @include('admin.components/input/text', [
                        'name' => 'email',
                        'placeholder' => 'akakievich@example.com',
                        'label' => 'Email пользователя',
                        'id' => 'email',
                        'value' => isset($user) ? $user->email : old('email'),
                        'error' => 'email',
                    ])
                    @include('admin.components/input/text', [
                        'name' => 'password',
                        'placeholder' => '',
                        'label' => isset($user) ? 'Пароль пользователя (необязательно)' : 'Пароль пользователя',
                        'id' => 'password',
                        'value' => old('password'),
                        'error' => 'password',
                    ])
                    @include('admin.components/input/text', [
                        'name' => 'password_confirmation',
                        'placeholder' => '',
                        'label' => 'Повторите пароль',
                        'id' => 'password_confirmation',
                        'value' => '',
                        'error' => 'password',
                    ])
                    @include('admin.components/input/textarea', [
                        'name' => 'about',
                        'label' => 'О пользователе',
                        'classes' => 'editor',
                        'id' => 'editor',
                        'value' => isset($user) ? $user->about : old('about'),
                        'error' => 'about',
                    ])
                </div>
            </div>
        </div>

        <div class="col-12 col-xl-3">
            <div class="d-flex flex-column w-100">
                @component('admin.components/form-wigets/save')
                    @slot('title', __('Действия'))

                    @isset($user)
                        @slot('model', $user)
                        @slot('publishButtonText', 'Сохранить')
                    @endisset
                @endcomponent

                @isset($roles)
                    @component('admin.components/form-wigets/roles')
                        @slot('title', __('Роли'))
                        @slot('roles', $roles)

                        @isset($user)
                            @slot('model', $user)
                        @endisset
                    @endcomponent
                @endisset

                @isset($permissions)
                    @component('admin.components/form-wigets/permissions')
                        @slot('title', __('Дополнительные права'))
                        @slot('permissions', $permissions)

                        @isset($user)
                            @slot('model', $user)
                        @endisset
                    @endcomponent
                @endisset
            </div>
        </div>
    </div>
</form>
