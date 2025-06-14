<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'My Laravel Project')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Roboto+Slab:wght@100..900&family=Rubik:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    @include('partials.header')

    <div class="content">
        @yield('content')
    </div>

    @include('partials.footer')

    <script src="JS/masterLayout.js"></script>

</body>
</html>
