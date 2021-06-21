<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ mix('images/favicon.png') }}" type="image/x-icon"/>
    <title>@yield('SeoTitle')</title>
    <link rel="stylesheet" href="{{ mix('css/main.css') }}">
</head>
<body>
    @include('components.notification/wrap')
    @yield('content')

    <script src="{{ mix('js/main.js') }}"></script>
</body>
</html>