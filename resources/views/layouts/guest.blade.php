<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Warhammer store') }}</title>

        <!-- Подключаем Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

        <style>
        body {
            background-color: #111;
            color: #ddd;
            font-family: 'Segoe UI', sans-serif;
        }

        .navbar {
            background-color: #1a1a1a;
        }

        .card {
            background-color: #222;
            border: 1px solid #333;
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .card:hover {
            transform: scale(1.03);
            box-shadow: 0 0 10px #ff0000;
        }

        .card img {
            object-fit: cover;
            height: 250px;
        }

        .btn-warhammer {
            background-color: #b71c1c;
            color: #fff;
            border: none;
        }

        .btn-warhammer:hover {
            background-color: #ff3b3b;
        }

        footer {
            margin-top: 40px;
            text-align: center;
            padding: 10px;
            color: #777;
            border-top: 1px solid #333;
        }
    </style>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
            <div>
                <a href="/">
                    <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                </a>
            </div>

            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>
        </div>

        <!-- Подключаем Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
