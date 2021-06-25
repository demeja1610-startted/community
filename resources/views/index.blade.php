@extends('layouts.app')

@section('SeoTitle', 'Community - Main page')

@section('content')
   {{-- <div class="container">
        <div class="wrapper" style="display: flex;flex-direction: column">
            @include('components.question-card.wrap', [
                'link' => '#',
                'avatar' => 'https://timeweb.com/ru/community/avatar/c9/c962ae83049ed051e0098196237036e5_thumb.jpg',
                'name' => 'Александра Черенкова',
                'date' => '17 июня в 15:36',
                'viewsCount' => '410',
                'title' => 'Скачивание файлов на локальный компьютер через браузер в ReactJS',
                'descr' => 'Здравствуйте! Не могу понять, почему с сервера на локальный компьютер через браузер скачиваются только файлы *.png (другие расширения, которые я проверял выдают ошибку 404, хотя путь указан верно). У меня на клиенте приложение на React. Я могу скачивать...',
                'categories' => [['link' => '#', 'name' => 'Администрирование']],
                'answersCount' => '1',
            ])
            @include('components.question-card.wrap', [
                'link' => '#',
                'avatar' => 'https://timeweb.com/ru/community/avatar/c9/c962ae83049ed051e0098196237036e5_thumb.jpg',
                'name' => 'Александра Черенкова',
                'date' => '17 июня в 15:36',
                'viewsCount' => '410',
                'title' => 'Скачивание файлов на локальный компьютер через браузер в ReactJS',
                'descr' => 'Здравствуйте! Не могу понять, почему с сервера на локальный компьютер через браузер скачиваются только файлы *.png (другие расширения, которые я проверял выдают ошибку 404, хотя путь указан верно). У меня на клиенте приложение на React. Я могу скачивать...',
                'categories' => [['link' => '#', 'name' => 'CMS']],
                'answersCount' => '1',
            ])
        </div>
    </div>--}}
    {{--@php
        $values = [
    'value1' => [
        'key1' => 1,
        'key2' => 2]
        , 'value2', 'value3', 'value4'];
    @endphp
    <div id="app">
        <example :values="{{ json_encode($values) }}"></example>
        <example2></example2>
    </div>--}}
@endsection
