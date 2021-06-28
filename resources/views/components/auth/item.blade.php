@extends('components.popup.wrap', ['class' => "popup_auth $authClass"   ])
@section('popup')
    <h3 class="popup__title title">{{ $title ?? '' }}</h3>
    <div class="popup__cross" data-popup="{{ $authClass }}">@include('icons.cross', ['iconClass' => 'popup__cross-item'])</div>
    {!! $form ?? '' !!}
@endsection
