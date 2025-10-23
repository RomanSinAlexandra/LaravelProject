@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2 class="text-danger mb-4">Редагування товару</h2>

    <form action="{{ route('admin.products.update', $product->id) }}" method="POST" class="card p-4 bg-dark text-light">
        @csrf
        <div class="mb-3">
            <label class="form-label">Товар</label>
            <input type="text" name="name" class="form-control" value="{{ $product->name }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Ціна</label>
            <input type="price" name="price" class="form-control" value="{{ $product->price }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Опис</label>
            <input type="description" name="description" class="form-control" value="{{ $product->description }}" required>
        </div>

        <div class="d-flex justify-content-start">
            <button type="submit" class="btn btn-outline-danger">Зберегти зміни</button>
            <a href="{{ route('admin.products') }}" class="btn btn-outline-light ms-2">Назад</a>
        </div>
    </form>

</div>
@endsection
