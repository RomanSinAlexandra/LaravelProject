@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2 class="text-danger mb-4">Редагування користувача</h2>

    <form action="{{ route('admin.users.update', $user->id) }}" method="POST" class="card p-4 bg-dark text-light">
        @csrf
        <div class="mb-3">
            <label class="form-label">Ім'я</label>
            <input type="text" name="name" class="form-control" value="{{ $user->name }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
        </div>

        <div class="d-flex justify-content-start">
            <button type="submit" class="btn btn-outline-danger">Зберегти зміни</button>
            <a href="{{ route('admin.products') }}" class="btn btn-outline-light ms-2">Назад</a>
        </div>
    </form>
</div>
@endsection
