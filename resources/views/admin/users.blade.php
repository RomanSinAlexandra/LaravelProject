@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h1 class="text-danger mb-4">Користувачі</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-dark table-striped table-hover align-middle">
        <thead class="table-dark text-light">
            <tr>
                <th>#</th>
                <th>Ім'я</th>
                <th>Email</th>
                <th>Дії</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-sm btn-warhammer">Редагувати</a>
                        <form action="{{ route('admin.users.delete', $user->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-warhammer" onclick="return confirm('Видалити користувача?')">Видалити</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="card-footer text-center mt-4">
        <a href="{{ route('admin.index') }}" class="btn btn-warhammer">
            Повернутись до адмін-панелі
        </a>
    </div>
</div>
@endsection
