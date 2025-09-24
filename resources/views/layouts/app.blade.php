<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>@yield('title', 'TU Kenya WebDev')</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">
    <main class="py-6">
        @yield('content')
    </main>
</body>
</html>
