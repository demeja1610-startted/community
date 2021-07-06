@extends('layouts.admin')

@section('layoutContent')
    <div class="row mt-2">
        <div class="col-12 mb-2">
            @include('admin.components/input/file', [
                'labelText' => 'Выбрать',
                'inputText' => 'Добавить изображение',
                'id' => 'images',
                'name' => 'images[]',
                'multiple' => true,
                'inputClasses' => 'a-gallery-image-upload',
                'url' => route(apiAdminRouterNames()::gallery_store),
                'csrf' => csrf_token(),
            ])
        </div>

        @component('admin.components/gallery/wrap')
            @slot('images', $images)
        @endcomponent

        @include('admin.components/gallery/overlay')
    </div>
@endsection
