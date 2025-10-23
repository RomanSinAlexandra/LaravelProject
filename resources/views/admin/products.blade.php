@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h1 class="text-center mb-4 text-white">Товари</h1>

    <div class="table-responsive">
        <table class="table table-dark table-striped table-hover align-middle">
            <thead class="table-dark text-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Назва</th>
                    <th scope="col">Ціна</th>
                    <th>Дії</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->price }}</td>
                        <td>
                        <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-sm btn-warhammer">Редагувати</a>
                        <form action="{{ route('admin.products.delete', $product->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-warhammer" onclick="return confirm('Видалити користувача?')">Видалити</button>
                        </form>
                    </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="card-footer text-center mt-4">
        <a href="{{ route('admin.index') }}" class="btn btn-warhammer">
            Повернутись до адмін-панелі
        </a>
    </div>
</div>
@endsection
