@extends('layouts.admin')

@section('layoutContent')
    <div class="row">
        <div class="col-12">
            @component('admin.components/loop-table/wrap')
                @if (!$users->isEmpty())
                    @slot('headerContent')
                        @component('admin.components/loop-table/header-row')
                            @slot('rowContent')
                                @include('admin.components/loop-table/header-cell', ['cellContent' => __('ID')])
                                @include('admin.components/loop-table/header-cell', ['cellContent' => __('Имя')])
                                @include('admin.components/loop-table/header-cell', ['cellContent' => __('Email')])
                                @include('admin.components/loop-table/header-cell', ['cellContent' => __('Роли')])
                                @include('admin.components/loop-table/header-cell', ['cellContent' => __('Статьи')])
                                @include('admin.components/loop-table/header-cell', ['cellContent' => __('Вопросы')])
                                @include('admin.components/loop-table/header-cell', ['cellContent' => __('Комментарии')])
                                @include('admin.components/loop-table/header-cell', ['cellContent' => __('Голоса')])
                                @include('admin.components/loop-table/header-cell', ['cellContent' => __('Действия')])
                            @endslot
                        @endcomponent
                    @endslot
                @endif

                @slot('tableContent')
                    @forelse ($users as $user)
                        @php
                            $userRoles = $user->roles->map(function($role) {
                                return __('roles.' . $role->name);
                            })->toArray();
                        @endphp
                        @component('admin.components/loop-table/table-row')
                            @slot('rowContent')
                                @include('admin.components/loop-table/table-cell', ['cellContent' => $user->id, 'cellClasses' => 'w-px-10'])
                                @component('admin.components/loop-table/table-cell')
                                    @slot('cellContent')
                                        <a href="{{ route(AdminRouterNames()::page_users_edit, ['user_id' => $user->id]) }}" class="link text-clamp-2">
                                            {!! $user->name !!}
                                        </a>
                                    @endslot
                                @endcomponent
                                @include('admin.components/loop-table/table-cell', ['cellContent' => $user->email, 'cellClasses' => 'w-10'])
                                @include('admin.components/loop-table/table-cell', ['cellContent' => implode(',', $userRoles), 'cellClasses' => 'w-10'])
                                @include('admin.components/loop-table/table-cell', ['cellContent' => $user->articles_count, 'cellClasses' => 'w-10'])
                                @include('admin.components/loop-table/table-cell', ['cellContent' => $user->questions_count, 'cellClasses' => 'w-10'])
                                @include('admin.components/loop-table/table-cell', ['cellContent' => $user->comments_count, 'cellClasses' => 'w-10'])
                                @include('admin.components/loop-table/table-cell', ['cellContent' => $user->voices_count, 'cellClasses' => 'w-10'])
                                @component('admin.components/loop-table/table-cell', ['cellClasses' => 'w-10'])

                                        @slot('cellContent')
                                            <div class="d-flex align--items-center no-wrap w-100 justify-content-center">
                                                @include('admin.components/loop-table/edit-button', [
                                                    'url' => route(AdminRouterNames()::page_users_edit, ['user_id' => $user->id]),
                                                    'title' => __('Редактировать'),
                                                    'buttonClasses' => 'mr-2',
                                                ])
                                                @include('admin.components/confirm/button', [
                                                    'url' => route(AdminRouterNames()::users_destroy, ['user_id' => $user->id]),
                                                    'title' => __('Удалить пользователя'),
                                                    'icon' => '<i class="fas fa-trash-alt"></i>',
                                                    'confirmText' => 'Вы действительно хотите удалить этого пользователя?',
                                                    'method' => 'delete',
                                                ])
                                            </div>
                                        @endslot
                                @endcomponent
                            @endslot
                        @endcomponent
                    @empty
                        @component('admin.components/loop-table/table-row')
                            @slot('rowContent')
                                @component('admin.components/loop-table/table-cell')
                                    @slot('cellContent')
                                        {!! __('Статей не найдено') !!}
                                    @endslot
                                @endcomponent
                            @endslot
                        @endcomponent
                    @endforelse
                @endslot

                @if($users->hasPages())
                    @slot('footerClasses', 'd-flex align-center justify-content-end')
                    @slot('footerContent')
                        {!! $users->links('pagination::bootstrap-4') !!}
                    @endslot
                @endif
            @endcomponent
        </div>
    </div>
    @include('admin.components/confirm/modal')
@endsection
