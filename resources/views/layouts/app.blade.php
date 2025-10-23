<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Warhammer Store</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Пользовательский стиль -->
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
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container d-flex justify-content-between align-items-center">
        <!-- Логотип -->
        <a class="navbar-brand d-flex align-items-center" href="{{ route('home') }}">
            <img src="{{ asset('images/warhammer40000.png') }}" alt="Warhammer Store" height="70" width="70" class="me-2">
            <span class="fw-bold text-light">Store</span>
        </a>

        <!-- Авторизація -->
        <div class="d-flex align-items-center">
            @auth
                <span class="text-light me-3">Вітаємо, {{ Auth::user()->name }}!</span>
                <a class="btn btn-outline-light me-3"
                   href="{{ route('logout') }}"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Вийти
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            @else
                <a class="btn btn-outline-light me-2" href="{{ route('login') }}">Увійти</a>
                <a class="btn btn-warhammer" href="{{ route('register') }}">Реєстрація</a>
            @endauth

            <!-- Кошик -->
            @auth
                <a class="btn btn-warhammer ms-3" href="{{ route('cart.show') }}">
                    <img src="{{ asset('images/icon-shopping.png') }}" alt="Кошик" height="24" class="me-2">
                    Кошик
                </a>
            @else
                
            @endauth
        </div>
    </div>
</nav>

<div class="container mt-4">
    @yield('content')
</div>

<footer>
    <p>© {{ date('Y') }} Warhammer Store. Усі права захищено.</p>
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
