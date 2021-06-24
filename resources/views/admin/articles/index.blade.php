@extends('layouts.admin')

@section('content_header')
    <h1>{{ __('Консоль - статьи') }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Список статей</h3>

            <div class="card-tools">
                {!! $articles->links('pagination::bootstrap-4') !!}
            </div>
        </div>
        <div class="card-body p-0">
            <table class="table">
                <thead>
                    <tr>
                        <th>{{ __('ID') }}</th>
                        <th>{{ __('Название') }}</th>
                        <th>{{ __('Автор') }}</th>
                        <th>{{ __('Кол-во просмотров') }}</th>
                        <th>{{ __('Дата создания') }}</th>
                        <th>{{ __('Дата редактирования') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($articles as $article)
                        <tr>
                            <td>{{ $article->id }}</td>
                            <td>{{ $article->title }}</td>
                            <td>{{ $article->user->name }}</td>
                            <td><span class="badge bg-primary">{{ $article->views }}</span></td>
                            <td>{{ $article->created_at }}</td>
                            <td>{{ $article->updated_at }}</td>
                            {{-- <td></td> --}}
                        </tr>
                    @empty

                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
