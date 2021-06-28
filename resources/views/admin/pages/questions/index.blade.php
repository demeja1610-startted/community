@extends('layouts.admin')

@section('content_header')
    <h1>{{ __('Консоль - вопросы') }}</h1>
@stop

@section('layoutContent')
    <div class="row">
        <div class="card w-100 my-2">
            <div class="card-body p-0">
                <table class="table table-responsive-xl">
                    <thead>
                        <tr>
                            <th class="text-center">{{ __('ID') }}</th>
                            <th class="text-center">{{ __('Название') }}</th>
                            <th class="text-center">{{ __('Автор') }}</th>
                            <th class="text-center">{{ __('Кол-во просмотров') }}</th>
                            <th class="text-center">{{ __('Дата создания') }}</th>
                            <th class="text-center">{{ __('Дата редактирования') }}</th>
                            <th class="text-center">{{ __('Действия') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($questions as $question)
                            <tr>
                                <td class="text-center">{{ $question->id }}</td>
                                <td class="text-center">
                                    <a href="{{ route('page.admin.questions.edit', ['question_id' => $question->id]) }}" class="link text-truncate">
                                        {{ $question->title }}
                                    </a>
                                </td>
                                <td class="text-center">{{ $question->user->name }}</td>
                                <td class="text-center"><span class="badge bg-primary">{{ $question->views }}</span></td>
                                <td class="text-center">{{ $question->created_at }}</td>
                                <td class="text-center">{{ $question->updated_at }}</td>
                                <td class="text-center">
                                    <a
                                        href="{{ route('page.admin.questions.edit', ['question_id' => $question->id]) }}"
                                        class="btn btn-outline-primary btn-sm"
                                        title="{{ __('Редактировать') }}"
                                    >
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <button
                                        class="btn btn-outline-primary btn-sm "
                                        data-toggle="modal"
                                        data-target="#deleteConfirmModal"
                                        title="{{ __('Удалить') }}"
                                        data-href="{{ route('admin.questions.delete', ['question_id' => $question->id]) }}"
                                    >
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </td>
                            </tr>
                        @empty

                        @endforelse
                    </tbody>
                </table>
            </div>
            @if($questions->hasPages())
                <div class="card-footer px-3 pt-3 pb-0">
                    <div class="card-tools d-flex align-center justify-content-end">
                        {!! $questions->links('pagination::bootstrap-4') !!}
                    </div>
                </div>
            @endif
        </div>
    </div>
    @component('admin.components/delete-confirm-modal/wrap')
        @slot('title', __('Удаление вопроса'))
        @slot('content')
            <p class="text">{!! __('Вы действительно хотите удалить этот вопрос?') !!}</p>
        @endslot
    @endcomponent
@endsection
