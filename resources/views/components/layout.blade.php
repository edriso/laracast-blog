<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">

    <title>{{ $title ?? 'Preview Post' }}</title>
</head>
<body>
    {{-- $slot is the default slot between the opening and closing tags --}}
    {{ $slot }}

    {{-- {{ $content }} --}}
</body>
</html>
