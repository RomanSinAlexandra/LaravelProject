@extends('layouts.app')

@section('content')
<h1 class="text-center mb-4">Каталог патрульних наборів</h1>

<div class="row g-4">
    @foreach($products as $product)
        <div class="col-md-4">
            <div class="card h-100">
                <img src="{{ asset($product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title text-danger">{{ $product->name }}</h5>
                    <p class="card-text flex-grow-1 text-white">{{ $product->description }}</p>
                    <p class="fw-bold text-white">Ціна: {{ number_format($product->price, 2, ',', ' ') }} грн</p>
                    <a href="{{ route('cart.add', $product->id) }}" class="btn btn-warhammer mt-auto">Додати в кошик</a>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection
