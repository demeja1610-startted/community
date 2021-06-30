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
@include('components.header.wrap')
<div class="container">
    @include('components.notification/wrap')
    <div class="lk">
        @include('lk.components.sidebar.wrap')
        <main class="lk__content">
            @yield('content')
        </main>
    </div>
</div>
@include('components.mobile-menu.wrap')

<script src="{{ mix('js/main.js') }}"></script>
</body>
</html>
