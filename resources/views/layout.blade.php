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
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">⚙️ Warhammer Store</a>
        <a class="btn btn-warhammer" href="{{ route('cart.show') }}">🛒 Кошик</a>
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
