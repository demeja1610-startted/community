<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ mix('images/favicon.ico') }}" type="image/x-icon"/>
    <title>@yield('SeoTitle')</title>
    <link rel="stylesheet" href="{{ mix('css/main.css') }}">
</head>
<body class="body-wrap">
@component('components.header.wrap')
    @slot('headerBottom')
        @include('components.header.bottom')
    @endslot
@endcomponent

<div class="container">
    @include('components.notification/wrap')
    <div class="page-wrapper mrgn24-top">

        <main class="page-wrapper__content">
            @yield('content')
        </main>

        <aside class="page-wrapper__sidebar">
            @include('components.sidebar.wrap')
        </aside>

    </div>
</div>
@include('components.mobile-menu.wrap')

<script src="{{ mix('js/main.js') }}"></script>
</body>
</html>
